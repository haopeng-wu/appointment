<x-master>
    <main class="landing-page">
        @if( session()->has('message-type') == 'TokenMismatchException')
            <div class="message">
                {{ session()->get('message')}}
            </div>
        @endif
        <article class="promote first">
            <img class="cozy-home-pic" src="{{asset('images/home-center.png')}}" alt="home cozy picture">
            <header>
                <h1>Serious about saving or improving your relationship?</h1>
            </header>
            <div>
                <div class="card">
                    <p>
                        Get professional therapy from a licensed therapist
                        anytime anywhere at the cozy of your home online.
                    </p>
                    <a href="{{route('fill-form')}}">
                        <button class="go-to-form">
                            Komma igång
                        </button>
                    </a>
                </div>

            </div>
        </article>


        <article class="promote">
            <header>
                <h1>
                    Familjerådgivning/ parterapi
                </h1>
            </header>
            <div>
                <ul>
                    <li>Svårt att prata med varandra</li>
                    <li>Upptrappade konflikter eller långvarig tystnad mellan er</li>
                    <li>Familjebildningproblematik</li>
                    <li>Känslorna har förändrats</li>
                    <li>Någon av er har träffat en annan</li>
                    <li>Otrohet</li>
                    <li>Tankar på separation</li>
                    <li>Sexuella svårigheter</li>
                    <li>Svårt få ihop sin bonusfamilj</li>
                    <li>Svårigheter i relationen mellan vuxna syskon, till en förälder, svärförälder</li>
                </ul>
            </div>
        </article>

        <a href="{{route('fill-form')}}">
            <button class="go-to-form">
                Vi är redo
            </button>
        </a>

        <article>
            <header>
                <h1>
                    Krisbearbetning
                </h1>
            </header>
            <div>
                <ul>
                    <li>Ålders/utveckligskris</li>
                    <li>Depression</li>
                    <li>Allvarlig fysisk sjukdom</li>
                    <li>Separation</li>
                    <li>Anhörigs död</li>
                </ul>
            </div>
        </article>

        <a href="{{route('fill-form')}}">
            <button class="go-to-form">
                Komma igång
            </button>
        </a>

        <article>
            <header>
                <h1>Samtalsterapi/ KBT/ fobiträning</h1>
            </header>
            <div>
                <ul>
                    <li>Bearbetning av känslor och tankemönster som leder till oönskade</li>
                    <li>reaktioner, handlingar, undvikanden.</li>
                    <li>Aggressionsproblematik</li>
                    <li>Olika former av fobier</li>
                </ul>
            </div>
        </article>

        <article>
            <header>
                <h1>Utbildning</h1>
            </header>
            <div>
                <ul>
                    <li>Socionom</li>
                    <li>Kognitiv psykoterapi</li>
                    <li>Sexologi</li>
                </ul>
            </div>
        </article>

        <article>
            <header>
                <h1>Lång arbetslivserfarenhet som</h1>
            </header>
            <div>
                <ul>
                    <li>Behandlare beroendeproblematik</li>
                    <li>Socionom slutenvårdspsykiatri</li>
                    <li>Kurator på vårdcentral</li>
                    <li>Auktoriserad familjerådgivare</li>
                </ul>
            </div>
        </article>
    </main>
</x-master>