<x-a-master>
    <div class="search-bar wrapper">
        <input type="text" name="search" placeholder="enter an email or a date">
        <div class="icon">
            <img src="{{asset('images/search_icon.png')}}" alt="search icon">
        </div>
    </div>
    <div class="today">
        <h4>Schedules for Today:</h4>
    </div>
    <div class="tomorrow">
        <h4>Schedules for Tomorrow:</h4>
    </div>
    <div class="latest-20">
        <h4>Latest 20 Orders:</h4>
    </div>
</x-a-master>