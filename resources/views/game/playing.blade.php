<x-master>
    @foreach($dist as $player_id => $role)
        <p><span class="text-red-600">{{$player_id}}</span> plays <span class="text-red-600">{{$role}}</span></p>
    @endforeach
</x-master>
