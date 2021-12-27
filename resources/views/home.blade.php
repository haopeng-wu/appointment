<x-master>
    <main>
        @if( session()->has('message-type') == 'TokenMismatchException')
        <div class="message">
            {{ session()->get('message')}}
        </div>
        @endif
        <article class="fill-form">
            <header>
                <h1 id="fill-form">Boka rådgivning med oss</h1>
                <h1 id="now">Nu</h1>
            </header>
            <form method="post" class="appointment" action="/appointment">
                @csrf
                <div class="date flex-center">
                    <input id="date" placeholder="välj ett datum" name="date" type="date"
                           value="{{old('date')}}">
                </div>
                <div class="flex-center">
                    @error("date")
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="appointment flex-center">
                    <div class="schedule">
                        <div class="time-slots">
                            @foreach($slots as $key => $slot)
                                <div>
                                    <input class="time_slot" type="radio" id="{{'slot-'.$key}}"
                                           name="which_slot" value="{{$key}}">
                                    <label class="" for="{{'slot-'.$key}}">{{$slot}}</label>
                                </div>
                            @endforeach
                            @error("which_slot")
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit">Boka</button>
            </form>
        </article>


        <section class="promote">
        </section>
        <section class="introduction">
        </section>
    </main>
    <script type="text/javascript">
        let availableWeekdays = {{json_encode($availableWeekdays)}};
        let allFutureBooked = {!! json_encode($allFutureBooked) !!};
        let all_slots = {!! json_encode($slots) !!};
    </script>
</x-master>
