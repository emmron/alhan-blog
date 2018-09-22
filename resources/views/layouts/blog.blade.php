<!doctype html>
<html lang="{{ app()->getLocale() }}" @isset($amp) ⚡ @endisset>
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="{{ app()->env == 'production' ? 'index, follow' : 'noindex, nofollow' }}">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="amphtml" href="{{ url()->current() }}?amp=1">
        @isset($amp) 
            <meta name="viewport" content="width=device-width,minimum-scale=1">
            <script async src="https://cdn.ampproject.org/v0.js"></script> 
            <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
            <style amp-custom>@php echo Storage::disk('public')->get('/css/app.css'); @endphp;</style>
        @else 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>@php echo Storage::disk('public')->get('/css/app.css'); @endphp;</style>
        @endisset
        <link rel="shortcut icon" href="data:image/x-icon;" type="image/x-icon">
        @if (Auth::check())
            <meta name="csrf-token" content="{{ csrf_token() }}">
        @endif
    </head>
    <body>
        <div id="app" class="container">
            <div class="pad-5">
                <div class="h3"><a href="/">HOME</a></div>
            </div>
            @if (Auth::check())
            <div class="mb-2">
                @yield('admin-tools')
            </div>
            @endif
                
            @if (Auth::check())
                @yield('content-editable')
            @endif

            @yield('content')
            
            <div class="pad-5">
                    <a href="/privacy">Privacy</a>
            </div>
        </div>
        @isset($amp)
        @else 
            
            @if (Auth::check())
                <script>
                    var post = false;
                    var isEditor = false;
                </script>
                @yield('footer-scripts')
                <script async src="/js/app.js"></script>
            @endif
            @component('components.inline-scripts')
            @endcomponent
        @endisset
    </body>
</html>
