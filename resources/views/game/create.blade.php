<x-master>
<h2>Let's create a game:</h2>
<form method="post" action="/game/store">
    <div class="mb-2">
        <label for="total-player">玩家数:</label>
        <input type="string" name="total-player">
        @error('total-player')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
    <div class="mb-2">
        <label for="total-player">村名数:</label>
        <input type="string" name="total-player">
        @error('total-player')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
    <div class="mb-2">
        女巫<input class="mb-2" type="checkbox" name="special" value="witch">
        预言家<input class="mb-2" type="checkbox" name="special" value="prophet">
        猎人<input class="mb-2" type="checkbox" name="special" value="hunter">
        守卫<input class="mb-2" type="checkbox" name="special" value="guardian">
        骑士<input class="mb-2" type="checkbox" name="special" value="knight">
        狼王<input class="mb-2" type="checkbox" name="special" value="wolf-king">
        白狼王<input class="mb-2" type="checkbox" name="special" value="white-wolf-king">
    </div>
    <div class="mb-2">
        <label for="total-player">狼人数:</label>
        <input type="string" name="total-player">
        @error('total-player')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
</form>
</x-master>