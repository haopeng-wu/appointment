<x-email>
    <p>
        Hello {{$appointment->given_name}},
        <br>
    </p>
    <p>
        Congratulations! You have successfully made an appointment with our most trustworthy counsellor
        from {{$start_end[0]}} to {{$start_end[1]}} on {{$appointment->date}}.
        <br>
    </p>
    <p>
        The meeting is at www.zoom.com.
        <br>
    </p>
    <p>
        Best regards,
    </p>
    <p>
        relationsutveckling
    </p>
</x-email>
