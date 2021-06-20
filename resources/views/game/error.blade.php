<x-master>
    @isset($error)
        <div>
            <h2 class="text-red-600">{{$error}}</h2>
        </div>
    @else
        <div>
            <h2 class="text-red-600">您没有输入房间编号！</h2>
        </div>
    @endisset
    <a href="/">
        <div class='bg-blue-500 rounded-full py-2 px-4 text-white
                    hover:shadow hover:bg-blue-600 focus-within:outline-none'
             style="min-width:100px;"
        >
            返回首页
        </div>
    </a>
</x-master>
