<!DOCTYPE html>
<html lang="en">
<head>
    <title>Relationsutveckling</title>
    <meta charset="UTF-8">
    <meta name="description"
          content="Välkommen till Relationsutveckling.se – Förbättra din relation idag – Familjerådgivning online">
    <link href="{{ asset('css/custom.css')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">

    <link rel="apple-touch-icon" sizes="120x120"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon-16x16.png">
    <link rel="manifest" href="https://www.relationsutveckling.se/images/favicon_package_v0/site.webmanifest">
    <link rel="mask-icon" href="https://www.relationsutveckling.se/images/favicon_package_v0/safari-pinned-tab.svg"
          color="#5bbad5">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://www.relationsutveckling.se/images/favicon_package_v0/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config"
          content="https://www.relationsutveckling.se/images/favicon_package_v0/browserconfig.xml">
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

        <div class="hamburger-wrapper dropdown"
             data-dropdown>

            <img class="hamburger-icon"
                 data-dropdown-button
                 src="{{asset('images/radix-icons_hamburger-menu.png')}}"
                 alt="radix-icons_hamburger-menu">

            <div class="dropdown-menu">
                <hr>
{{--                <div class="menu-top-bar flex">--}}
{{--                    <img src="{{asset('images/white-filled-logo.svg')}}" alt="logo">--}}
{{--                    <span class="x-mark">X</span>--}}
{{--                </div>--}}
{{--                <hr>--}}
                <div class="menu-items">
                    <div><a href="/customer-service">Customer Service</a></div>
                    <hr>
                    <div><a href="/q-and-a">Questions and Answers</a></div>
                    <hr>
                    <div><a href="/about-us">About us</a></div>
                </div>
            </div>
        </div>

        <ul class="wrapper">
            <li><a href="/customer-service">Customer Service</a></li>
            <li><a href="/q-and-a">Questions and Answers</a></li>
            <li><a href="/about-us">About us</a></li>
        </ul>

    </div>
</nav>
{{$slot}}
<footer>

</footer>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script type="text/javascript"
        src="{{asset('js/ru.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>


<script type="text/javascript"
        src="{{asset('js/custom.js')}}?v={{getdate()['mon'].getdate()['mday'].getdate()['hours'].getdate()['minutes']}}"></script>
</body>
</html>