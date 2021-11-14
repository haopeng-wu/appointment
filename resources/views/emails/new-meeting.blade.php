<x-email>
    <p>
        Hello Our Counsellor,
        <br>
    </p>
    <p>
        Good news! A new customer has successfully made an appointment with you
        from {{$start_end[0]}} to {{$start_end[1]}} on {{$appointment->date}}.
        <br>
    </p>
    <p>
        The start url is {{$start_url}}, which you should use to start the meeting 5 minutes before the start time.
        The join url is {{$join_url}}, which our customer will use to join the meeting.
        The password of the meeting is {{$password}}. Please join it on time.
        <br>
    </p>
    <p>
        Best regards,
    </p>
    <p>
        relationsutveckling
    </p>
</x-email>
