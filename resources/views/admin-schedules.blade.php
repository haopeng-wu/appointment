<x-a-master>
    <div class="search-bar wrapper">
        <input type="text" name="search" placeholder="enter an email or a date">
        <div class="icon">
            <img src="{{asset('images/search_icon.png')}}" alt="search icon">
        </div>
    </div>
    <article class="today schedule">
        <div class="schedule">
            <table>
                <th>Schedules for Today:</th>
                @foreach($todays as $item)
                    <tr>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Details</a></td>
                        <td>type</td>
                        <td>Link</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </article>

    <article class="tomorrow schedule">
        <div class="schedule">
            <table>
                <th>Schedules for Tomorrow:</th>
                @foreach($tomorrows as $item)
                    <tr>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Details</a></td>
                        <td>type</td>
                        <td>Link</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </article>

    <article class="the-day-after-tomorrow schedule">
        <div class="schedule">
            <table>
                <th>Schedules for the Day after Tomorrow:</th>
                @foreach($theDayAfterTomorrows as $item)
                    <tr>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Details</a></td>
                        <td>type</td>
                        <td>Link</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </article>

    <article class="latest-20">
        <h4>Latest 20 Orders:</h4>
    </article>
</x-a-master>