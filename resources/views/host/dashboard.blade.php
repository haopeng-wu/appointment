<x-master>
    <div>

        <h1>欢迎主持人<span class="text-red-600 font-bold ml-1">{{$user->id}}</span>进入房间
            <span class="text-red-600 font-bold ml-1">{{$room->id}}</span></h1>
        <div>

            <?php
            $card_types = ['villager', 'wolf', 'prophet', 'guardian', 'hunter',
                'witch', 'knight', 'wolf-king', 'white-wolf-king'];
            $card_names = ['村名', '狼人', '预言家', '守卫', '猎人',
                '女巫', '骑士', '狼王', '白狼王'];
            ?>
            <div>
                <h1 class="mb-2">房间配置：</h1>
                <h2 class="mb-2">玩家数：<span>{{$room->total}}</span>人</h2>
                @foreach($card_types as $index => $attr)
                    @if($room[$attr] != 0)
                        <li>{{$card_names[$index]}}数：<span>{{$room[$attr]}}</span>人</li>
                    @endif
                @endforeach
            </div>
            @if($dist = session('distribution'))
                <div>
                    <h1>当前玩家身份</h1>
                    @foreach($dist as $player_id => $role)
                        <p><span class="text-red-600">玩家{{$player_id}}</span> 是 <span
                                    class="text-red-600">{{$role}}</span></p>
                    @endforeach
                </div>
            @endif


        </div>
        <div class="flex">
            <div>
                <form method="post"
                      action="/game/shuffle-cards">
                    @csrf
                    <input type="hidden" name="_roomId" value="{{$room->id}}">
                    <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                        hover:shadow hover:bg-blue-600 focus-within:outline-none mr-3'
                            style="min-width:100px;"
                            type='submit'>
                        发身份牌
                    </button>
                </form>
            </div>

            <div>
                <form method="post"
                      action="/game/host-resign">
                    @csrf
                    <input type="hidden" name="_roomId" value="{{$room->id}}">
                    <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                        hover:shadow hover:bg-blue-600 focus-within:outline-none'
                            style="min-width:100px;"
                            type='submit'>
                        卸任主持
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-master>