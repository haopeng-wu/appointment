<x-master>
<h2>Let's create a game:</h2>
<form method="post" action="/game/store">
    <div class="mb-6">
        <label for="total-player">玩家数:</label>
        <input type="string" name="total-player">
        @error('total-player')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="total-player">村名数:</label>
        <input type="string" name="total-player">
        @error('total-player')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <input type="checkbox" name="special" value="witch">女巫<br>
        <input type="checkbox" name="special" value="prophet">预言家<br>
        <input type="checkbox" name="special" value="hunter">猎人<br>
        <input type="checkbox" name="special" value="guardian">守卫<br>
    </div>
    <div class="mb-6">
        <label for="total-player">狼人数:</label>
        <input type="string" name="total-player">
        @error('total-player')
        <p class='text-red-500 text-xs mt-2'>{{$message}}</p>
        @enderror
    </div>
</form>
</x-master>