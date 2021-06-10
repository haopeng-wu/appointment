<x-master>
    @isset($error)
        <div>
            <h2 class="text-red-600">{{$error}}</h2>
        </div>
    @else
    <div>
        <h2 class="text-red-600">您没有输入房间编号！</h2>
    </div>
    @endisset
</x-master>
