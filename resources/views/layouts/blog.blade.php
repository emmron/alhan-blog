<!doctype html>
<html lang="{{ app()->getLocale() }}" @isset($amp) ⚡ @endisset>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        @isset($amp) <script async src="https://cdn.ampproject.org/v0.js"></script> @endisset
        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="amphtml" href="{{ url()->current() }}?amp=1">
        <meta name="description" content="@yield('description')">
        <meta name="robots" content="{{ app()->env == 'production' ? 'index, follow' : 'noindex, nofollow' }}">
        <link rel="shortcut icon" href="data:image/x-icon;" type="image/x-icon">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @isset($amp)<meta name="viewport" content="width=device-width,minimum-scale=1">@else <meta name="viewport" content="width=device-width, initial-scale=1">@endisset
        @isset($amp)
        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
        @else
        <link rel="preload" as="font" crossorigin="crossorigin" type="font/woff2" href="https://fonts.gstatic.com/s/lora/v12/0QIgMX1D_JOuO7HeNtxumtus-7w.woff2"> 
        <style>{!! $css !!}</style>
        @endisset
    </head>
    <body>
        <div id="app" class="container">
            <div class="pad-5">
                <div class="h3"><a href="/">Home</a></div>
            </div>
            @if (Auth::check())
            <div class="mb-2">
                @yield('admin-tools')
            </div>
            @endif
            @yield('content')
            <div class="pad-5">
                    <a href="/privacy">Privacy</a>
            </div>
        </div>
        @isset($amp) @else<script async src="/js/app.js"></script>@endisset
    </body>
</html>