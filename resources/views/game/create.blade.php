<x-master>
    <h2 class="uppercase text-2xl mb-4">Let's create a game:</h2>
    <div style="display: grid; grid-template-rows: repeat(7, 1fr); height:100vh;">
        <img src="{!! asset("images/blue_moon.jpg") !!}" alt=""
             style="display: block; object-fit: cover; height: 100%;
                 grid-row:1/4; margin-bottom: 5px;">
        <form class="text-xl ml-10" method="post"
              action="/game/store"
              style="grid-row:5/9;">
            @csrf
            <div class="mb-8 text-3xl">
                <label for="total">玩家总数:</label>
                <input class="border border-gray-400 w-10 ml-2" type="string" name="total">
                @error('total')
                <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="villager">村名数:</label>
                <input class="border border-gray-400 w-8 ml-2" type="string" name="villager">
                @error('villager')
                <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                女巫<input class="mr-2 ml-1" type="checkbox" name="witch" value="1">
                预言家<input class="mr-2 ml-1" type="checkbox" name="prophet" value="1">
                猎人<input class="mr-2 ml-1" type="checkbox" name="hunter" value="1">
                守卫<input class="mr-2 ml-1" type="checkbox" name="guardian" value="1">
                骑士<input class="mr-2 ml-1" type="checkbox" name="knight" value="1">
                狼王<input class="mr-2 ml-1" type="checkbox" name="wolf-king" value="1">
                白狼王<input class="mr-2 ml-1" type="checkbox" name="white-wolf-king" value="1">
            </div>
            <div class="mb-4">
                <label for="wolf">狼人数:</label>
                <input class="border border-gray-400 w-8 ml-2" type="string" name="wolf">
                @error('wolf')
                <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
                @enderror
            </div>

            <button type='submit' class='bg-blue-500 rounded shadow py-2 px-4 text-white'>
                创建
            </button>
        </form>
    </div>
</x-master>