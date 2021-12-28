<!DOCTYPE html>
<html lang="en">
<head>
    <title>Relationsutveckling</title>
    <meta charset="UTF-8">
    <meta name="description" content="Relationsutveckling provides professional family counselling service to couples and family members.">
    <link href="{{ asset('css/custom.css')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"
          rel="stylesheet">
    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    -->
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">

    <link rel="apple-touch-icon" sizes="120x120" href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon-16x16.png">
    <link rel="manifest" href="https://www.relationsutveckling.se/images/favicon_package_v0/site.webmanifest">
    <link rel="mask-icon" href="https://www.relationsutveckling.se/images/favicon_package_v0/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="https://www.relationsutveckling.se/images/favicon_package_v0/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<nav class="wrapper">
    <div class="nav-wrapper">
        <div class="nav-logo">
            <a href="/">
                <img src="{{asset('images/one-line-text-icon.svg')}}" alt="the site logo">
            </a>
        </div>
        <div class="hamburger-wrapper">
            <!--
            <img class="hamburger-icon" src="{{asset('images/radix-icons_hamburger-menu.png')}}" alt="radix-icons_hamburger-menu">
            -->

        </div>
        <!--
        <ul class="wrapper">
            <li>Link 1</li>
            <li>Link 2</li>
            <li>Link 3</li>
        </ul>
        -->
    </div>
</nav>
{{$slot}}
<footer>

</footer>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script type="text/javascript" src="{{asset('js/ru.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>

<!--

<script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
-->

<script type="text/javascript"
        src="{{asset('js/custom.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>
</body>
</html>