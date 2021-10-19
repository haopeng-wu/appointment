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
            <table>
                <thead>
                <tr>
                    <th>Starts at</th>
                    <th>Ends by</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slots as $slot)
                    <form action="/slots/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$slot->id}}">
                        <tr>
                            <td><input name="start_at" type="time" value="{{$slot->start_at}}"></td>
                            <td><input name="end_at" type="time" value="{{$slot->end_at}}"></td>
                            <td><input name="price" type="number" value="{{$slot->price}}"></td>
                            <td>
                                <button type="submit">modify</button>
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </article>
</x-a-master>