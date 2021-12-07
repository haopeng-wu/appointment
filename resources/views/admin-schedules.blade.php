<x-a-master>
    <div class="search-bar wrapper">
        <input type="text" name="search" placeholder="enter an email or a date">
        <div class="icon">
            <img src="{{asset('images/search_icon.png')}}" alt="search icon">
        </div>
    </div>
    <article class="today schedules">
        <div class="schedule">
            <table>
                <caption>Schedules for Today:</caption>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time slot</th>
                    <th>Duration</th>
                    <th>Details</th>
                    <th>Link</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($todays as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Click</a></td>
                        <td>Link</td>
                        <td>@if($item->payment_status)Paid@else Unpaid @endif</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </article>
    <article class="tomorrow schedules">
        <div class="schedule">
            <table>
                <caption>Schedules for Tomorrow:</caption>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time slot</th>
                    <th>Duration</th>
                    <th>Details</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tomorrows as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Click</a></td>
                        <td>Link</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </article>
    <article class="the-day-after-tomorrow schedules">
        <div class="schedule">
            <table>
                <caption>Schedules for the Day after Tomorrow:</caption>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time slot</th>
                    <th>Duration</th>
                    <th>Details</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($theDayAfterTomorrows as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Click</a></td>
                        <td>Link</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </article>

    <article class="latest-20 schedules">
        <div class="schedule">
            <table>
                <caption>Lastest 20 orders:</caption>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time slot</th>
                    <th>Duration</th>
                    <th>Created at</th>
                    <th>Details</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($latest as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td>{{$item->created_at}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Click</a></td>
                        <td>Link</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </article>

    <article class="all-the-orders schedules">
        <div class="schedule">
            <table>
                <caption>All the orders:</caption>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time slot</th>
                    <th>Duration</th>
                    <th>Created at</th>
                    <th>Details</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->start_end_time}}</td>
                        <td>{{$item->duration}}</td>
                        <td>{{$item->created_at}}</td>
                        <td><a href="/appointment/{{$item->id}}/details">Click</a></td>
                        <td>Link</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </article>
</x-a-master>