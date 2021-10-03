<!DOCTYPE html>
<html lang="en">
<head>
    <title>appointment</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/custom.css')}}v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    {{$slot}}
</body>
</html>
