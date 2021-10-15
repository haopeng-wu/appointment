<!DOCTYPE html>
<html lang="en">
<head>
    <title>appointment</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/admin-custom.css')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"
          rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<nav>
    <ul>

            <li>Schedules</li>


            <li>Dashboard</li>


            <li>Klarna Portal</li>

    </ul>
</nav>
<main>
    {{$slot}}
</main>
<footer>

</footer>
<script type="text/javascript"
        src="{{asset('js/custom.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>
</body>
</html>