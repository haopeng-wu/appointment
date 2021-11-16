<x-master>
    <main>
        <section class="center-pic">
            <img src="{{asset('images/home-center.png')}}" alt="home cozy picture">
        </section>
        <article class="appointment">
            <form method="post" class="appointment" action="/appointment">
                @csrf
                <div class="wrapper">
                    <article class="schedule">
                        <div class="time-slots">
                            <div class="date">
                                <input id="date" placeholder="Select a date" name="date" type="date"
                                       value="{{old('date')}}">
                                @error("date")
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
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
                        <button type="submit">Make the Appointment</button>
                    </article>
                </div>
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
