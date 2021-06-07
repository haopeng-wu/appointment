<x-master>
        <div>
            @foreach($dist as $player_id => $role)
                <p><span class="text-red-600">{{$player_id}}</span> plays <span class="text-red-600">{{$role}}</span></p>
            @endforeach
        </div>
        <div>
                <h3>请提醒玩家查看身份或刷新身份！</h3>
        </div>
</x-master>
