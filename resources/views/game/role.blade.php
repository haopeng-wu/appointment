<x-master>
    <div class="h-screen">
        <div class="hidden"><h2>你的身份是：<span class="text-red-600 mb-3">{{$role->chinese_name}}</span>。</h2>
        </div>

        <div class="">
            <img class="mx-auto" src="{!! $role->portrait !!}" alt="{{$role->chinese_name}}">
        </div>

        <a href="/role">
            <div class="bg-blue-500 hover:shadow hover:bg-blue-600
                        text-white text-xl mb-5 py-2 flex justify-center">
                <h2>刷新身份</h2>
            </div>
        </a>
    </div>
</x-master>