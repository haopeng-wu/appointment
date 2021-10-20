<x-master>
    <main>
        <section class="appointment">
            <form method="post" class="appointment" action="/appointment">
                @csrf
                <div class="wrapper">
                    <article class="schedule">

                        <div class="date">
                            <label for="date">Which day would you like to schedule?</label>
                            <input id="date" name="date" type="date" value="{{old('date')}}"
                            min="2021-10-20" step="2">
                        </div>

                        <div class="time-slots">
                            @error("which_slot")
                            <p class="error">{{$message}}</p>
                            @enderror
                            @foreach($slots as $slot)
                                <div>
                                    <input class="time_slot" type="radio" id="{{'slot-'.($loop->index+1)}}"
                                           name="which_slot" value="{{$loop->index+1}}">
                                    <label class="unchecked" for="{{'slot-'.($loop->index+1)}}">{{$slot}}</label>
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
                                <input name="customer_name" type="text" id="customer_name" value="{{old('customer_name')}}">
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


</x-master>
