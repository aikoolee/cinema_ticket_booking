<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cinema')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/themetoggle.js'])

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body > .pt-0 {
            flex: 1;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body class="bg-gray-200 dark:bg-gray-700 transition-colors duration-300">
    @include('includes.header')

    <div class="pt-0">
        @yield('content')
    </div>

    @include('includes.footer')

    <div class="hidden lg:flex-1 lg:justify-end">
        <button id="theme-toggle" class="test-sm font-semibold leading-6 text-gray-900 dark:text-white">
            <span id="theme-icon"></span> Theme Toggle
        </button>
        <button id="theme-toggle-mobile" class="lg:hidden test-sm font-semibold leading-6 text-gray-900 dark:text-white">
            <span id="theme-icon-mobile"></span> Theme Toggle
        </button>
    </div>
</body>
</html>  
