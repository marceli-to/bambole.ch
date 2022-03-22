<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ (request()->routeIs('page.index')) ? 'has-intro' : '' }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title>@if(trim($__env->yieldContent('seo_title')))@yield('seo_title') &bull; {{config('seo.title')}}@else{{config('seo.title')}}@endif</title>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="format-detection" content="telephone=no">
<link href="{{ mix('assets/css/app.css') }}" rel="stylesheet">
<script src="/assets/js/modernizr.js"></script>
</head>
<body class="auth">
<main role="main" class="site">
  <div>
    <section class="mx-auto">
      @include('partials.logo')
      @yield('content')
    </section>
  </div>
</main>
<script src="{{ mix('assets/js/app.js') }}" type="text/javascript"></script>
</body>
<!-- made with ❤ by atelier-falk.ch & marceli.to -->
</html>