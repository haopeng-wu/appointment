<x-master>
    <main>
        <section class="appointment">
            <form method="post" class="appointment" action="/appointment">
                @csrf
                <div class="wrapper">
                    <article class="schedule">

                        <div class="date">
                            <label for="date">Which day would you like to schedule?</label>
                            <input id="date" name="date" type="date">
                        </div>

                        <div class="time-slots">
                            <div>
                                <input class="time_slot" type="radio" id="slot-1" name="which_slot" value="1">
                                @error("which_slot")
                                <p>{{$message}}</p>
                                @enderror
                                <label class="unchecked" for="slot-1">08:30~10:00</label>
                            </div>
                            <div>
                                <input class="time_slot" type="radio" id="slot-2" name="which_slot" value="2">
                                @error("which_slot")
                                <p>{{$message}}</p>
                                @enderror
                                <label class="unchecked" for="slot-2">10:30~12:00</label>
                            </div>
                            <div>
                                <input class="time_slot" type="radio" id="slot-3" name="which_slot" value="3">
                                @error("which_slot")
                                <p>{{$message}}</p>
                                @enderror
                                <label class="unchecked" for="slot-3">14:30~16:00</label>
                            </div>
                            <div>
                                <input class="time_slot" type="radio" id="slot-4" name="which_slot" value="4">
                                @error("which_slot")
                                <p>{{$message}}</p>
                                @enderror
                                <label class="unchecked" for="slot-4">16:30~18:00</label>
                            </div>
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
                                <input name="customer_name" type="text" id="customer_name">
                                @error("customer_name")
                                <p>{{$message}}</p>
                                @enderror
                                <input name="email" type="email" id="email">
                                @error("email")
                                <p>{{$message}}</p>
                                @enderror
                                <input name="tel" type="text" id="tel">
                                @error("tel")
                                <p>{{$message}}</p>
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


    <footer>

    </footer>
</x-master>
