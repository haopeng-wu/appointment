<!DOCTYPE html>
<html lang="en">
<head>
    <title>Werewolf</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="">

    <div class="container lg:mx-auto h-screen justify-center flex flex-col lg:max-w-xs"
         style="background-image: url({!! asset('images/u=304344891,2514493180&fm=26&gp=0.jpeg') !!});
                 background-repeat: no-repeat;
                 background-position: center;
                 background-size: cover;
                 ">
        <div class>
            <a class="" href="/game/create">
                <div class="bg-blue-500 rounded-full hover:shadow hover:bg-blue-600
                text-white text-xl mb-5 py-2 flex justify-center items-center" style="height:40px;">
                    建房
                </div>
            </a>
            <form class="flex flex-row justify-between bg-gray-200 rounded-full"
                  method="post"
                  action="/game/enter">
                @csrf
                <input class="w-full bg-transparent focus-within:outline-none px-4"
                       type="number" name="roomId" placeholder="请输入房间号"
                       required>
                <button class='bg-blue-500 rounded-full py-2 px-4 text-white
                hover:shadow hover:bg-blue-600 focus-within:outline-none'
                        style="min-width:100px;"
                        type='submit'>
                    进入房间
                </button>
            </form>
        </div>
    </div>
    </body>
    </html>