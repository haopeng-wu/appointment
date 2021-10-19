<x-a-master>
    <article class="book">
        <h4></h4>
        <div>

        </div>
    </article>
    <article class="slot-configure">
        <h4>
            Configure Slots
        </h4>
        <div>
            <!--
            $table->time('start_at')->nullable()->default(Carbon::createFromTime(0,0));
            $table->time('end_at')->nullable()->default(Carbon::createFromTime(0,0));
            $table->string('duration')->nullable()->default(Carbon::createFromTime(0,0));
            $table->integer('price')->nullable()->default(20000);
            $table->string('currency')->nullable()->default('SEK');
            $table->boolean('is_valid')->nullable()->default(false);
            -->
            <form action="/slots/update" method="post">
                @csrf
                @foreach($slots as $slot)
                    <div>
                        <input type="hidden" name="id" value="{{$slot->id}}">
                        <label for="start_at">Starts at: </label>
                        <input name="start_at" type="time" value="{{$slot->start_at}}">
                        <label for="end_at">Ends by: </label>
                        <input name="end_at" type="time" value="{{$slot->end_at}}">
                        <label for="price">Price: </label>
                        <input type="number" name="price" value="{{$slot->price}}">
                    </div>
                @endforeach
            </form>
        </div>
    </article>
</x-a-master>