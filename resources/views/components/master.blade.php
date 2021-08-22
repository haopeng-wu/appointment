<!DOCTYPE html>
<html lang="en">
<head>
    <title>Werewolf</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://cdn.repository.webfont.com/wwwroot/js/wf/youziku.api.min.js"></script>
    <script type="text/javascript">
        $webfont.load("body", "4c1bc821e8814f8783bafc16e47f6697", "jdzhonyuanjian");
        /*$webfont.load("#id1,.class1,h1", "4c1bc821e8814f8783bafc16e47f6697", "jdzhonyuanjian");*/
        /*．．．*/
        $webfont.draw();
    </script>
</head>
<body class="">
    <div class="bg-blue-300 flex justify-between"
    style="height: 1.75rem; line-height: 1.75rem;">
        <a class="flex" href="/"><h2>Home</h2></a>
        @if($user_id = session('user_id'))
            <h2 class="flex">您的编号是 <span class="text-red-700 font-bold">{{$user_id}}</span>
                @if($roomId=session('room_id'))，当前活跃房间号为<span class="text-red-700 font-bold">{{$roomId}}</span>@endif
            </h2>
        @endif
        <h2 class="flex">Werewolf</h2>
    </div>
    {{$slot}}
</body>
</html>
