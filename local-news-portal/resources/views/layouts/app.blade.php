<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'News Narayanganj | নারায়ণগঞ্জের সংবাদ সারথি')</title>
    
    <meta property="fb:pages" content="321490341238445" />
    <meta name="facebook-domain-verification" content="0ixjwgx8dd33qumi0y97mtio5zj5l9" />
    <meta property="og:site_name" content="দ্যা নিউজ নারায়ণগঞ্জ ডটকম">
    <meta property="og:title" content="@yield('og_title', 'News Narayanganj')">
    <meta property="og:description" content="@yield('og_description', 'আমাদের সীমাবদ্ধতা অনেক, তবুও সত্য লেখার চেষ্টা অবিরাম। খবর এবং খবরের পিছনের ঘটনা জানুন। আমাদের সঙ্গে থাকুন, আপনাদের সঙ্গেই রাখুন।')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="@yield('og_image', asset('media/common/newsnarayanganj24.jpg'))">
    <meta name="robots" content="all">
    
    <!-- Favicon -->
    <link href="{{ asset('media/common/fav-new.png') }}" rel="shortcut icon" type="image/png">
    
    <!--==== BASE CSS ====-->
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
    <!--==== FOR TOP NAV CSS ====-->
    <link href="{{ asset('asset/css/bootsnav.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/modern-megamenu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/modern-megamenu-responsive.css') }}" rel="stylesheet" type="text/css">
    
    <!--==== FOR VIDEO GALLERY SLIDER AND PHOTO GALLERY CSS ====-->
    <link href="{{ asset('asset/css/lightbox.css') }}" rel="stylesheet" type="text/css">
    
    <!--==== CUSTOM CSS ====-->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/responsive.css') }}" rel="stylesheet" type="text/css">
    
    <style media="screen">
        .all-news-wrapper {width: 100%;}
        .all-news-wrapper a {background: #1da255;width: 100%;font-size: 22px;transition: 0.5s;text-align: center;color: #fff;cursor: pointer;padding: 5px 25px;display: block;}
        .all-news-wrapper a:hover {background: #008854;}
        .least-news-ul .least-news-right {text-align: left;}
    </style>
    
    @stack('styles')
</head>

<body>
    <!-- Back To Top -->
    <div class="scrollup">
        <i aria-hidden="true" class="fa fa-chevron-up"></i>
    </div>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!--==== BASE JS ====-->
    <script src="{{ asset('asset/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootsnav.js') }}"></script>
    <script src="{{ asset('asset/js/modern-megamenu.js') }}"></script>
    <script src="{{ asset('asset/js/lightbox.js') }}"></script>
    <script src="{{ asset('asset/js/custom.js') }}"></script>
    
    @stack('scripts')
</body>
</html>