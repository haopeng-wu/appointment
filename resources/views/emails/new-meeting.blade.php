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
        The start url(very long) is <br> {{$start_url}} <br>, which you should use to start the meeting 5 minutes before the start time.
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
