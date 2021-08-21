<x-master>
    <div class="mx-auto h-screen max-w-xs">
        <div style="height: 35vh;
                background-image: url({!! asset('images/error-wolf.jpg') !!});
                background-size:cover;
                background-position: center;
                ">
        </div>
        <div>
            @isset($error)
                <div>
                    <h2 class="text-red-600">{{$error}}</h2>
                </div>
            @else
                <div>
                    <h2 class="text-red-600">您没有输入房间编号！</h2>
                </div>
            @endisset

            <div class="flex">
                @if(session("room_id"))
                    <a href="/room">
                        <div class='bg-blue-500 rounded-full py-2 px-4 text-white
                    hover:shadow hover:bg-blue-600 focus-within:outline-none mr-2
                    flex justify-center'
                             style="min-width:100px;"
                        >
                            返回房间
                        </div>
                    </a>
                @endif
                <a href="/">
                    <div class='bg-blue-500 rounded-full py-2 px-4 text-white
                    hover:shadow hover:bg-blue-600 focus-within:outline-none
                    flex justify-center'
                         style="min-width:100px;"
                    >
                        返回首页
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-master>
