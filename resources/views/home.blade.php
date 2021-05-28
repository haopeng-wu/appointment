<x-master>
    <h1>Home</h1>
    <div class="text-xl">
        <a href="/game/create">建房</a>
    </div>

    <form method="post" action="/game/enter">
        @csrf
        <label for="roomId">请输入房间编号：</label>
        <input type="string" name="roomId" class="border border-blue-500 shadow">
        <button type='submit' class='bg-blue-500 rounded-full shadow py-2 px-4 text-white'>
            进入房间
        </button >
    </form>
</x-master>