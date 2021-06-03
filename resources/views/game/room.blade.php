<x-master>
    <div>
        <h1>欢迎玩家<span>{{$user_id}}</span>进入房间
        <span class="text-red-600 font-bold ml-1">{{$roomId}}</span></h1>
        <div class="flex">
            <a href="/game/role" >
                <div class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none mr-3'
                     style="min-width:100px;"
                     >
                    查看身份
                </div>

            </a>
            <form method="post"
                  action="/game/shuffle-cards">
                @csrf
                <input type="hidden" name="_roomId" value="{{$roomId}}">
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>
                    发身份牌
                </button >
            </form>
        </div>
    </div>
</x-master>
