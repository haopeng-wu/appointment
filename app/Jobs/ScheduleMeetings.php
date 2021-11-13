<?php

namespace App\Jobs;

use App\Models\Appointment;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Http;


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

        $response = Http::withHeaders([
                'Authorization' => "Bearer" . $this->getZoomAccessToken()
            ]
        )->post($base_uri, [
            'topic' => "relationsutveckling",
            'type' => 2,
            'start_time' => $this->appointment->date,
            'duration' => $this->appointment->duration,
            "password" => $this->genRandomPass(),
        ]);
        Log::debug($response->status());
        $data = json_decode($response->getBody());
        Log::debug("Join URL: " . $data->join_url);
        Log::debug("<br>");
        Log::debug("Meeting Password: " . $data->password);
    }

    protected function genRandomPass()
    {
        return substr(str_shuffle(MD5(microtime())), 0, 6);
    }
}