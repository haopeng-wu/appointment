<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMeeting extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $appointment;
    public $start_end;
    public $start_url;
    public $join_url;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->start_end = explode('-', $appointment->start_end_time);
        $this->appointment = $appointment;
        $this->start_url = $appointment->zoom_start_url;
        $this->join_url = $appointment->zoom_join_url;
        $this->password = $appointment->zoom_meeting_pw;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('service@relationsutveckling.se', 'relationsutveckling')
            ->subject('Meeting Scheduled')
            ->view('emails.new-meeting');
    }
}
