<x-master>
    <article>
        <h2>
            Congratulations, {{$appt->customer_name}}! Your appointment has been successfully made!
        </h2>
        <div>
            <p>
                @php
                dd($start_end)
                @endphp
                On {{$appt->date}}, from {{$start_end[0]}} to {{$start_end[1]}}, through Google Meeting.
            </p>
            <p>
                It's 300kr.
            </p>
            <form action="/to_pay" method="post">
                @csrf
                <button class="to-pay-button" type="submit">
                    Pay
                </button>
            </form>
        </div>
    </article>
</x-master>
