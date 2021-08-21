<x-master>
    <div class="container mx-auto h-screen justify-center flex flex-col max-w-xs">
        <div style="height: 35vh; width: 100vw;
                background-image: url({!! asset('error-wolf.jpg') !!});
                background-size:cover;
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
