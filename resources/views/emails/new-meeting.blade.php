<x-email>
    <p>
        Hello Dear Counsellor,
        <br>
    </p>
    <p>
        A new customer has successfully made an appointment with you
        from {{$start_end[0]}} to {{$start_end[1]}} on {{$appointment->date}}.
        <br>
    </p>
    <p>
        Click <a href="{{$start_url}}"> here</a> to start the meeting, which you'd better do 5 minutes before the meeting start time.
        <br>The join url is {{$join_url}}, which our customer will use to join the meeting.
        <br>The password of the meeting is {{$password}}. Please join it on time.
        <br>
    </p>
    <p>
        Best regards,
    </p>
    <p>
        relationsutveckling
    </p>
</x-email>
