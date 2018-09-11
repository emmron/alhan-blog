<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="robots" content="{{ app()->env == 'production' ? 'index, follow' : 'noindex, nofollow' }}">
        <meta name="description" content="">
        <link rel="shortcut icon" href="data:image/x-icon;" type="image/x-icon"> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <link rel="preload" as="font" crossorigin="crossorigin" type="font/woff2" href="https://fonts.gstatic.com/s/lora/v12/0QIgMX1D_JOuO7HeNtxumtus-7w.woff2">
        <style>
                @if (!isset($css)) 
                    @php
                        $css = Cache::remember('css', 22*60, function() {
                            return Storage::disk('public')->get('/css/app.css');
                        }); 
                    @endphp
                @endif
                {!! $css !!}
        </style>
    </head>
    <body>
        <div class="page">
            <div class="container header">
                <div class="logo"><a href="/">alhan.co</a></div>
            </div>
            @if (Auth::check())
            <div class="container admin-tools mb-2">
                @yield('admin-tools')
            </div>
            @endif
            @yield('content')
        </div>
    </body>
</html>