<!DOCTYPE html>
<html lang="en">
<head>
    <title>Relationsutveckling</title>
    <meta charset="UTF-8">

    <link href="{{ asset('css/email.css')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"
          rel="stylesheet">
    <link rel="icon" href="{{asset('images/icon.svg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
{{$slot}}
<footer>

</footer>
</body>
</html>