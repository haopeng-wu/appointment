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
            @foreach($slots as $slot)
                <form action="/slots/update" method="post">
                    <table>
                        <thead>
                        <tr>
                            <th>Starts at</th>
                            <th>Ends by</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @csrf
                        <input type="hidden" name="id" value="{{$slot->id}}">
                        @error("id")
                        <p class="error">{{$message}}</p>
                        @enderror
                        <tr>
                            <td><input name="start_at" type="time" value="{{$slot->start_at}}"></td>
                            @error("start_at")
                            <p class="error">{{$message}}</p>
                            @enderror
                            <td><input name="end_at" type="time" value="{{$slot->end_at}}"></td>
                            @error("end_at")
                            <p class="error">{{$message}}</p>
                            @enderror
                            <td><input name="price" type="number" value="{{$slot->price}}"></td>
                            @error("price")
                            <p class="error">{{$message}}</p>
                            @enderror
                            <td>
                                <button type="submit">modify</button>
                            </td>
                        </tr>
                    </table>
                </form>
                @endforeach
                </tbody>

        </div>
    </article>
</x-a-master>