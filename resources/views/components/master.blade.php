<!DOCTYPE html>
<html lang="en">
<head>
    <title>appointment</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/custom.css')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<nav class="wrapper">
    <div class="wrapper">
        <div class="nav-logo">
            <a href="/">
                <img src="{{asset('images/two-line-text-icon.svg')}}" alt="the site logo">
            </a>
        </div>
        <ul class="wrapper">
            <li>Link 1</li>
            <li>Link 2</li>
            <li>Link 3</li>
        </ul>
    </div>
</nav>
{{$slot}}
<footer>

</footer>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript"
        src="{{asset('js/custom.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>
</body>
</html>