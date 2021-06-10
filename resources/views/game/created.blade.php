<x-master>
    <div>
        <div class="mb-5">
            <h1>房间创建成功！房间号为: <span class="font-bold text-red-700 text-xl rounded">{{$gameId}}</span>。</h1>
        </div>
        <div>
            <form action="/game/enter"
                  method="post"
            >
                @csrf
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>进入房间</button>
            </form>
        </div>
    </div>

</x-master>