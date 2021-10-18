<x-master>
    <article>
        <h2>

        </h2>
        <div>
            <p>
                On {{$appt->date}}, from {{$start_end[0]}} to {{$start_end[1]}}, through Google Meeting.
            </p>
            {!! $html_snippet !!}
        </div>
    </article>
</x-master>
