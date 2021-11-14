<?php

namespace App\Jobs;

use App\Mail\AppointmentConfirmation;
use App\Mail\NewMeeting;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;


class ScheduleMeetings implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $appointment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug('in ScheduleMeetings\' handle');
        $this->createZoomMeeting();
    }

    protected function getZoomAccessToken()
    {
        $key = env('ZOOM_API_SECRET');
        $payload = array(
            "iss" => env('ZOOM_API_KEY'),
            'exp' => time() + 3600,
        );
        return JWT::encode($payload, $key);
    }

    protected function createZoomMeeting()
    {
        $base_uri = 'https://api.zoom.us/v2/users/me/meetings';

        // get duration in minutes
        $tmp = explode(':', $this->appointment->duration);
        $h = $tmp[0];
        $m = $tmp[1];
        $totalMinutes = (int)(((int)$h) * 60 + $m);

        // get start time
        $startTime = explode(' - ', $this->appointment->start_end_time)[0];

        $response = Http::withHeaders([
                'Authorization' => "Bearer" . $this->getZoomAccessToken()
            ]
        )->post($base_uri, [
            'topic' => "relationsutveckling",
            'type' => 2,
            'timezone' => 'Europe/Stockholm',
            'start_time' => $this->appointment->date . 'T' . $startTime,
            'duration' => $totalMinutes,
            "password" => $this->genRandomPass(),
            "settings" => [
                'auto_recording' => 'none',
                'waiting_room' => 'true',
                'host_video' => 'true',
                'participant_video' => 'false',
                'join_before_host' => 'false',
            ]
        ]);
        Log::debug("date and duration");
        Log::debug($this->appointment->date . 'T' . $startTime);
        Log::debug($totalMinutes);
        Log::debug($response->status());

        if ($response->ok()) {
            $data = json_decode($response->getBody());

            Log::debug("Start URL: " . $data->start_url);
            Log::debug("Join URL: " . $data->join_url);
            Log::debug("<br>");
            Log::debug("Meeting Password: " . $data->password);
            Log::debug(json_encode($data));

            $start_url = $data->start_url;
            $join_url = $data->join_url;
            $meeting_pw = $data->password;

            // Save the zoom information to the appointment model
            $this->appointment->zoom_start_url = $start_url;
            $this->appointment->zoom_join_url = $join_url;
            $this->appointment->zoom_meeting_pw = $meeting_pw;

            // Save to the database and refresh the model
            $this->appointment->save();
            $this->appointment->refresh();

            // send meeting email to our counsellor and administrators
            foreach([
                'haopeng_wu@qq.com',
                // 'markus.nyberg.andersson@lexly.com',
                // 'markus.n.a@live.se',
                    ] as $recipient){
                Mail::to($recipient)->queue(new NewMeeting($this->appointment));
            }

            // send confirmation email to user
            $user = User::find($this->appointment->customer_id);
            Mail::to($user)->queue(new AppointmentConfirmation($this->appointment));
        }
    }

    protected function genRandomPass()
    {
        return substr(str_shuffle(MD5(microtime())), 0, 6);
    }
}
