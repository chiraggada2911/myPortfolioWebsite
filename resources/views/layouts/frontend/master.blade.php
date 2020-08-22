<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@if (isset($seo)){{$seo->site_name}} @endif">
    <meta name="description" content="@if (isset($seo)){{ $seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($seo)){{ $seo->site_keywords }} @endif">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($seo)){{ $seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($seo)){{ $seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($seo)){{ $seo->site_desc }} @endif">
    <meta property="og:image" content="@if (isset($site_info)){{ asset('uploads/img/icon/'.$site_info->favicon) }} @endif">
    <meta itemprop="image" content="@if (isset($site_info)){{ asset('uploads/img/icon/'.$site_info->favicon) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (isset($site_info)){{ asset('uploads/img/icon/'.$site_info->favicon) }} @endif">
    <meta property="twitter:title" content="@if (isset($seo)){{ $seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($seo)){{ $seo->site_desc }} @endif">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (request()->is('/')) {{ __('frontend.home') }}
        @elseif(request()->is('about')) {{ __('frontend.about') }}
        @elseif(request()->is('portfolio')) {{ __('frontend.portfolio') }}
        @elseif(request()->is('contact')) {{ __('frontend.contact') }}
        @elseif(request()->is('blog')) {{ __('frontend.blog') }}
        @elseif(request()->is('blog/*')) {{ __('frontend.blog_post') }}
        @endif
        @if (isset($seo)) - {{ $seo->site_name }} @endif
    </title>

    <!-- Favicon -->
    @if(!empty($site_info->favicon))
        <link href="{{ asset('uploads/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <link href="{{ asset('uploads/img/dummy/blue.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/blue.png') }}" sizes="128x128" rel="shortcut icon" />
@endif

    <!-- Template Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700" rel="stylesheet">

    <!-- Template CSS Files -->
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    @if ($section_arr['preloader'] == 1)
        <link href="{{ asset('assets/frontend/css/preloader.min.css') }}" rel="stylesheet">
        @endif
    <link href="{{ asset('assets/frontend/css/circle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/fm.revealator.jquery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

    <!-- CSS Skin File -->
    @if (isset($color))
        <style>
            /* =================================================================== */
            /* Custom Color
            ====================================================================== */

            .home h1,
            .about .box-stats h3,
            .title-section h1 span,
            #menu li.active a,
            body.light #menu li.active a,
            .blog .post-container:hover .post-content .entry-header h3 a,
            .blog .post-content .entry-header h3 a:hover,
            .contact .custom-span-contact i,
            .portfolio .slideshow figcaption h3,
            .portfolio .slideshow a,
            .portfolio .grid figure:hover figcaption,
            .blog-post .meta i{
                color: {{ $color->color_code }};
            }
            .about .resume-box .icon,
            .contact ul.social li a:hover,
            body.light.contact ul.social li a:hover,
            .preloader .loader,
            .blog .page-link:hover,
            .blog .page-item.active .page-link,
            body.light.blog .page-link:hover,
            body.light.blog .page-item.active .page-link,
            .portfolio .grid li figure div,
            .header ul.icon-menu li.icon-box.active, .header ul.icon-menu li.icon-box:hover,
            body.light .header ul.icon-menu li.icon-box.active, body.light  .header ul.icon-menu li.icon-box:hover,
            .btn,
            .header .icon-box h2,
            .home .color-block,
            .title-section hr,
            .portfolio .slideshow .carousel-indicators li.active {
                background-color: {{ $color->color_code }};
            }
            .contact .contactform input[type=text]:focus,
            .contact .contactform input[type=email]:focus,
            .contact .contactform textarea:focus,
            body.light.contact .contactform input[type=text]:focus,
            body.light.contact .contactform input[type=email]:focus,
            body.light.contact .contactform textarea:focus,
            .blog .page-item.active .page-link,
            .blog .page-link:hover,
            body.light.blog .page-item.active .page-link,
            body.light.blog .page-link:hover{
                border: 1px solid {{ $color->color_code }};
            }
            .blog .post-thumb {
                border-bottom: 5px solid {{ $color->color_code }};
            }
            .pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill {
                border: 0.08em solid {{ $color->color_code }};
            }


        </style>
    @else

        @if (isset($homepage_version))

            @if ($homepage_version->color == 0)

                <link href="{{ asset('assets/frontend/css/skins/yellow.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 1)

                <link href="{{ asset('assets/frontend/css/skins/purple.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 2)

                <link href="{{ asset('assets/frontend/css/skins/red.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 3)

                <link href="{{ asset('assets/frontend/css/skins/blueviolet.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 4)

                <link href="{{ asset('assets/frontend/css/skins/blue.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 5)

                <link href="{{ asset('assets/frontend/css/skins/goldenrod.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 6)

                <link href="{{ asset('assets/frontend/css/skins/magenta.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 7)

                <link href="{{ asset('assets/frontend/css/skins/yellowgreen.css') }}" rel="stylesheet">

            @elseif ($homepage_version->color == 8)

                <link href="{{ asset('assets/frontend/css/skins/orange.css') }}" rel="stylesheet">

            @else

                <link href="{{ asset('assets/frontend/css/skins/green.css') }}" rel="stylesheet">

            @endif

        @else

            <link href="{{ asset('assets/frontend/css/skins/yellow.css') }}" rel="stylesheet">

        @endif

    @endif

    <!-- Modernizr JS File -->
    <script src="{{ asset('assets/frontend/js/modernizr.custom.js') }}"></script>

    @if (isset($google_analytic))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif

</head>
<body class="@if (request()->is('/')) home
             @elseif(request()->is('about')) about
             @elseif(request()->is('portfolio')) portfolio
             @elseif(request()->is('contact')) contact
             @elseif(request()->is('blog')) blog
             @elseif(request()->is('blog/*')) blog-post
             @endif
@if (isset($homepage_version))
@if ($homepage_version->choose_version == 1)
        light
        @endif
@endif"


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyD2VUIIVIbx_3vBQrj_MHdYzC_Zrp6MJBo",
    authDomain: "chiraggada-co.firebaseapp.com",
    databaseURL: "https://chiraggada-co.firebaseio.com",
    projectId: "chiraggada-co",
    storageBucket: "chiraggada-co.appspot.com",
    messagingSenderId: "230085283647",
    appId: "1:230085283647:web:75f3203f4f0b144a914d8a",
    measurementId: "G-FM7VH5G341"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
>

<!-- Header Starts -->
<header class="header" id="navbar-collapse-toggle">
    <!-- Fixed Navigation Starts -->
    <ul class="icon-menu d-none d-lg-block revealator-slideup revealator-once revealator-delay1">
        <li class="icon-box @if (request()->is('/')) active @endif">
            <i class="fa fa-home"></i>
            <a href="{{ url('/') }}">
                <h2>{{ __('frontend.home') }}</h2>
            </a>
        </li>
        @if ($section_arr['about_page'] == 1)
            <li class="icon-box @if (request()->is('about')) active @endif">
                <i class="fa fa-user"></i>
                <a href="{{ url('about') }}">
                    <h2>{{ __('frontend.about') }}</h2>
                </a>
            </li>
            @endif
       @if ($section_arr['portfolio_page'] == 1)
            <li class="icon-box @if (request()->is('portfolio')) active @endif">
                <i class="fa fa-briefcase"></i>
                <a href="{{ url('portfolio') }}">
                    <h2>{{ __('frontend.portfolio') }}</h2>
                </a>
            </li>
           @endif
        @if ($section_arr['contact_page'] == 1)
            <li class="icon-box @if (request()->is('contact')) active @endif">
                <i class="fa fa-envelope-open"></i>
                <a href="{{ url('contact') }}">
                    <h2>{{ __('frontend.contact') }}</h2>
                </a>
            </li>
            @endif
       @if ($section_arr['blog_page'] == 1)
            <li class="icon-box @if (request()->is('blog') || request()->is('blog/*')) active @endif">
                <i class="fa fa-comments"></i>
                <a href="{{ url('blog') }}">
                    <h2>{{ __('frontend.blog') }}</h2>
                </a>
            </li>
           @endif
    </ul>
    <!-- Fixed Navigation Ends -->
    <!-- Mobile Menu Starts -->
    <nav role="navigation" class="d-block d-lg-none">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul class="list-unstyled" id="menu">
                <li class="@if (request()->is('/')) active @endif"><a href="{{ url('/') }}"><i class="fa fa-home"></i><span>{{ __('frontend.home') }}</span></a></li>
                @if ($section_arr['about_page'] == 1)
                    <li class="@if (request()->is('about')) active @endif"><a href="{{ url('about') }}"><i class="fa fa-user"></i><span>{{ __('frontend.about') }}</span></a></li>
                @endif
                @if ($section_arr['portfolio_page'] == 1)
                    <li class="@if (request()->is('portfolio')) active @endif"><a href="{{ url('portfolio') }}"><i class="fa fa-folder-open"></i><span>{{ __('frontend.portfolio') }}</span></a></li>
                @endif
                @if ($section_arr['contact_page'] == 1)
                    <li class="@if (request()->is('contact')) active @endif"><a href="{{ url('contact') }}"><i class="fa fa-envelope-open"></i><span>{{ __('frontend.contact') }}</span></a></li>
                @endif
                @if ($section_arr['blog_page'] == 1)
                    <li class="@if (request()->is('blog')) active @endif"><a href="{{ url('blog') }}"><i class="fa fa-comments"></i><span>{{ __('frontend.blog') }}</span></a></li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Mobile Menu Ends -->
</header>
<!-- Header Ends -->



<main>
    @yield('content')
</main>



<!-- Template JS Files -->
<script src="{{ asset('assets/frontend/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/preloader.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/fm.revealator.jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/classie.js') }}"></script>
<script src="{{ asset('assets/frontend/js/cbpGridGallery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.hoverdir.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

</body>
</html>
