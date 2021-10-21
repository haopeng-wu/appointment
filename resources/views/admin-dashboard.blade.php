<x-a-master>
    <article class="book">
        <h4></h4>
        <div>

        </div>
    </article>
    <article class="slot-configure">
        <h4>Configure Slots
        </h4>
        <div>
            @foreach($slots as $slot)
                <form action="/slots/update" method="post">
                    <table>
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
                        </tbody>
                    </table>
                </form>
            @endforeach
        </div>
    </article>
    <article>
        <h4>Change Bookable Weekdays</h4>
        <div class="weekdays">
            <form action="" method="post">
                @csrf
                <div class="grid">
                    <input type="checkbox" name="Monday" id="d2">
                    <label for="d2">Monday</label>
                    <input type="checkbox" name="Tuesday" id="d3">
                    <label for="d3">Tuesday</label>
                    <input type="checkbox" name="Wednesday" id="d4">
                    <label for="d4">Wednesday</label>
                    <input type="checkbox" name="Thursday" id="d5">
                    <label for="d5">Thursday</label>
                    <input type="checkbox" name="Friday" id="d6">
                    <label for="d6">Friday</label>
                    <input type="checkbox" name="Saturday" id="d7">
                    <label for="d7">Saturday</label>
                    <input type="checkbox" name="Sunday" id="d1">
                    <label for="d1">Sunday</label>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </article>
    <script type="text/javascript">
        let bookableFlags = {!! json_encode($bookableFlags) !!};
    </script>
</x-a-master>