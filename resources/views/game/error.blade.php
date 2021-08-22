<x-master>
    <div class="h-screen">
        <div style="height: 35vh;
                background-image: url({!! asset('images/error-wolf.jpg') !!});
                background-size:cover;
                background-position: center;
                ">
        </div>
        <div

                style="font-size: 2em;
                        color: red;
                        display: flex; justify-content: space-around; margin-top:1em; margin-bottom: 1em;"
        >
            @isset($error)
                <h2 style="font-family:'KaiTi';">{{$error}}</h2>
            @else
                <h2>您没有输入房间编号！</h2>
            @endisset
        </div>
        <div style="display: flex;">
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
</x-master>
