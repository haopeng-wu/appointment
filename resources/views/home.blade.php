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
                            <input type="radio" id="slot-1" name="time-slot" value="slot-1">
                            <label for="slot-1">8:30~10:00</label>

                            <input type="radio" id="slot-2" name="time-slot" value="slot-2">
                            <label for="slot-2">10:30~12:00</label>

                            <input type="radio" id="slot-3" name="time-slot" value="slot-3">
                            <label for="slot-3">14:30~16:00</label>

                            <input type="radio" id="slot-4" name="time-slot" value="slot-4">
                            <label for="slot-4">16:30~18:00</label>
                        </div>

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
