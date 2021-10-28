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
        <a href="{{route('admin')}}"><li>Schedules</li></a>
        <a href="{{route('dashboard')}}"><li>Dashboard</li></a>
        <a href=""><li>Klarna Portal</li></a>
    </ul>
</nav>
<main>
    {{$slot}}
</main>
<footer>

</footer>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript" src="{{ asset('js/admin-custom.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>
</body>
</html>