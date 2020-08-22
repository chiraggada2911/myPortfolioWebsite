<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('404 Page') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('uploads/img/dummy/blue.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('uploads/img/dummy/blue.png') }}" sizes="128x128" rel="shortcut icon" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/404.css') }}" />

</head>
<body>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>{{ __('content.oops') }}</h1>
            <h2>{{ __('content.page_not_found') }}</h2>
        </div>
        <a href="{{ url('/') }}">{{ __('content.go_to_homepage') }}</a>
    </div>
</div>

</body>
</html>
