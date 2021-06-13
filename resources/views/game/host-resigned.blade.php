<x-master>
    <div>
        <a class="" href="/">
            <div class="bg-blue-500 rounded-full hover:shadow hover:bg-blue-600
                text-white text-xl mb-5 py-2 flex justify-center items-center" style="height:40px;">
                返回首页
            </div>
        </a>
        <form class="flex flex-row justify-between bg-gray-200 rounded-full"
              method="post"
              action="/game/enter">
            @csrf
            <input type="hidden" name="roomId" value="{{$room->id}}">
            <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                    style="min-width:100px;"
                    type='submit'>
                进入该房间进行游戏
            </button>
        </form>
    </div>
</x-master>