<x-master>
    <nav>

    </nav>


    <main>
        <section class="appointment">
            <form action="/appointment">
                <div class="wrapper">
                    <article class="schedule">

                        <div class="date">
                            <label for="date">Which day would you like to schedule?</label>
                            <input id="date" name="date" type="date">
                        </div>

                        <div class="time-slots">
                            <div>
                                <input type="radio" id="slot-1" name="time-slot" value="slot-1">
                                <label class="unchecked" for="slot-1">08:30~10:00</label>
                            </div>
                            <div>
                                <input type="radio" id="slot-2" name="time-slot" value="slot-2">
                                <label class="unchecked" for="slot-2">10:30~12:00</label>
                            </div>
                            <div>
                                <input type="radio" id="slot-3" name="time-slot" value="slot-3">
                                <label class="unchecked" for="slot-3">14:30~16:00</label>
                            </div>
                            <div>
                                <input type="radio" id="slot-4" name="time-slot" value="slot-4">
                                <label class="unchecked" for="slot-4">16:30~18:00</label>
                            </div>
                        </div>
                    </article>
                    <article class="cus-info">
                        <label for="name">Your name: </label>
                        <input type="text" id="name">

                        <label for="email">Email: </label>
                        <input type="email" id="email">

                        <label for="tel">Tel: </label>
                        <input type="text" id="tel">
                    </article>
                    <article class="custom-info">

                    </article>
                </div>

                <div>
                    <button type="submit">Schedule</button>
                </div>
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
