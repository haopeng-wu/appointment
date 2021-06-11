<!DOCTYPE html>
<html lang="en">
<head>
    <title>Werewolf</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div class="bg-blue-300 flex">
    <h2 class="flex-1">Werewolf</h2>
    <a class="flex-1" href="/"><h2>Home</h2></a>
</div>
{{$slot}}
</body>
</html>
