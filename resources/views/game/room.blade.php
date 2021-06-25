<x-master>

    <div style="display: grid; grid-template-rows: repeat(10, 1fr)">
        <div style="grid-row: 1/10">
            <img src="{!! asset('images/u=2463211854,2553144130&fm=26&gp=0.jpeg') !!}" alt=""
                 style="object-fit: cover; width:100%">
        </div>
        <div style="grid-row: 10/11">
            @if((! $room->host) or $room->host != $user)
                <h1>欢迎玩家<span class="text-red-600 font-bold ml-1 mr-3">{{$user->id}}</span>进入房间
                    <span class="text-red-600 font-bold ml-1">{{$room->id}}</span></h1>
                <div class="flex">
                    <a href="/role">
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
        </div>
    </div>


</x-master>
