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
                            Kom igång
                        </button>
                    </a>
                </div>

            </div>
        </article>
            <hr>
        <article class="box fade-in">
            <h1>Krisbearbetning</h1>

            <ul>
                <li><span style="font-size:16px">&Aring;lders/utveckligskris</span></li>
                <li><span style="font-size:16px">Depression</span></li>
                <li><span style="font-size:16px">Allvarlig fysisk sjukdom</span></li>
                <li><span style="font-size:16px">Separation</span></li>
                <li><span style="font-size:16px">Anh&ouml;rigs d&ouml;d</span></li>
            </ul>
        </article>
        <article class="box green fade-in">
            <h1>Samtalsterapi / KBT / fobitr&auml;ning</h1>

            <ul>
                <li><span style="font-size:16px">Bearbetning av k&auml;nslor och tankem&ouml;nster som leder till o&ouml;nskade reaktioner, handlingar, undvikanden.</span>
                </li>
                <li><span style="font-size:16px">Aggressionsproblematik</span></li>
                <li><span style="font-size:16px">Olika former av fobier</span></li>
            </ul>
        </article>
    </main>
</x-master>
