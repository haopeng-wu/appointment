<x-master>
    <main>
        <section class="appointment">
            <form method="post" class="appointment" action="/appointment">
                @csrf
                <div class="wrapper">
                    <article class="schedule">

                        <div class="date">
                            <label for="date">Which day would you like to schedule?</label>
                            <input id="date" name="date" type="date" value="{{old('date')}}">
                            @error("date")
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="time-slots">
                            @error("which_slot")
                            <p class="error">{{$message}}</p>
                            @enderror
                            @foreach($slots as $key => $slot)
                                <div>
                                    <input class="time_slot" type="radio" id="{{'slot-'.$key}}"
                                           name="which_slot" value="{{$key}}">
                                    <label class="" for="{{'slot-'.$key}}">{{$slot}}</label>
                                </div>
                            @endforeach
                        </div>
                    </article>
                    <article class="custom-info">
                        <div class="wrapper">
                            <div class="labels">
                                <label for="customer_name">Your name: </label>
                                <label for="email">Email: </label>
                                <label for="tel">Tel: </label>
                            </div>
                            <div class="inputs">
                                <input name="customer_name" type="text" id="customer_name"
                                       value="{{old('customer_name')}}">
                                @error("customer_name")
                                <p class="error">{{$message}}</p>
                                @enderror
                                <input name="email" type="email" id="email" value="{{old('email')}}">
                                @error("email")
                                <p class="error">{{$message}}</p>
                                @enderror
                                <input name="tel" type="text" id="tel" value="{{old('tel')}}">
                                @error("tel")
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </article>
                </div>

                <button type="submit">Make this appointment now</button>
            </form>
        </section>
        <section class="promote">

        </section>
        <section class="introduction">

        </section>
    </main>
    <script type="text/javascript">
        let availableWeekdays = {{json_encode($availableWeekdays)}};
        let allFutureBooked = {!! json_encode($allFutureBooked) !!};
    </script>
</x-master>
