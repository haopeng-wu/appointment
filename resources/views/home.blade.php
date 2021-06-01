<x-master>
    <div class="container mx-auto h-screen justify-center flex flex-col max-w-xs">
        <div class>
            <div class="bg-blue-500 rounded-full hover:shadow hover:bg-blue-600
            text-white text-xl mb-5 py-2 flex justify-center">
                <a class="" href="/game/create">建房</a>
            </div>
            <form class="flex flex-row justify-between bg-gray-200 rounded-full"
                  method="post" action="/game/enter">
                @csrf
                <input class="w-full bg-transparent focus-within:outline-none px-4"
                       type="string" name="roomId" placeholder="请输入房间编号">
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600'
                        style="min-width:100px;"
                        type='submit'>
                    进入房间
                </button >
            </form>
        </div>
    </div>
</x-master>