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

           
            </a>
        </article>
    </main>
</x-master>
