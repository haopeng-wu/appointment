<x-master>

    @if(! $room->host or ! $room->host == $user->id)
        <h1>欢迎玩家<span class="text-red-600 font-bold ml-1 mr-3">{{$user->id}}</span>进入房间
            <span class="text-red-600 font-bold ml-1">{{$room->id}}</span></h1>
        <div class="flex">
            <a href="/game/role">
                <div class='bg-blue-500 rounded-full py-2 px-4 text-white
                    hover:shadow hover:bg-blue-600 focus-within:outline-none mr-3'
                     style="min-width:100px;"
                >
                    查看身份
                </div>
            </a>

            <form action="/game/host"
                  method="post"
            >
                @csrf
                <input type="hidden" name="_roomId" value="{{$room->id}}">
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                        hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>
                    主持游戏
                </button>
            </form>
        </div>
    @endif

    @if($room->host and $room->host == $user->id)
        <h1>欢迎主持人<span class="text-red-600 font-bold ml-1">{{$user->id}}</span>进入房间
            <span class="text-red-600 font-bold ml-1">{{$room->id}}</span></h1>
        <div>
            <form method="post"
                  action="/game/shuffle-cards">
                @csrf
                <input type="hidden" name="_roomId" value="{{$room->id}}">
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                        hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>
                    发身份牌
                </button>
            </form>
        </div>
    @endif


</x-master>
