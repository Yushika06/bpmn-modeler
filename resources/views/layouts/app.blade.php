<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AlurKerja</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3425WT64XJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "G-3425WT64XJ");
    </script>
</head>

<body>
    <div class="min-h-screen">
        <div class="dark-mode:bg-gray-900 antialiased">
            <!-- NAVBAR -->
            @include('partials.navbar')
            <!-- END NAVBAR -->

            <!-- Main Content -->
            @yield('content')
            @yield('scripts')
            <!-- End Main Content -->

            <!-- FOOTER -->
            @include('partials.footer')
            <!-- END FOOTER -->
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
