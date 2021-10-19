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
                        <input type="hidden" name="id" value="{{$slot->id}}">
                        <tr>
                            <td><input name="{{'slot_'.$slot->id.'_start_at'}}" type="time" value="{{$slot->start_at}}"></td>
                            <td><input name="{{'slot_'.$slot->id.'_end_at'}}" type="time" value="{{$slot->end_at}}"></td>
                            <td><input type="{{'slot_'.$slot->id.'_price'}}" name="price" value="{{$slot->price}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <button type="submit">Submit</button>
            </form>
        </div>
    </article>
</x-a-master>