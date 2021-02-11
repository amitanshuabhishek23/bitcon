<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Hubifyapps</title>
        <link rel="icon" href="{{ asset('app/images/icons/favicon_icn.png') }}" type="image/png"/>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/app/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/app/css/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/app/css/custom.css') }}">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y85ZNSMT4R"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-Y85ZNSMT4R');
        </script>
    </head>
    <body class="hubify_apps light-themes">
        <div id="app">
        <input type="hidden" name="BS_URL_ASSET" value="{{ URL::asset('/') }}">
          <router-view></router-view>
        </div>
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/app/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/app/js/grids.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/app/js/datatables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/app/js/custom.js') }}"></script>
    </body>
</html>