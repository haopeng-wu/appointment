<x-master>
    <article>
        <h2>
            Congratulations, {{$appt->customer_name}}! Your appointment has been successfully made!
        </h2>
        <div>
            <p>
                On {{$appt->date}}, from {{$start_end[0]}} to {{$start_end[1]}}, through Google Meeting.
            </p>

        </div>
    </article>
</x-master>
