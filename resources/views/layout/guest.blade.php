<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{config('seo.title')}}</title>
<meta name="description" content="{{config('seo.description')}}">
<meta property="og:title" content="{{config('seo.title')}}">
<meta property="og:description" content="{{config('seo.description')}}">
<meta property="og:url" content="https://www.bambole.ch">
<meta property="og:site_name" content="{{config('seo.title')}}">
@include('partials.misc.favicon')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="format-detection" content="telephone=no">
<link href="{{ mix('assets/css/app.css') }}" rel="stylesheet">
<script src="/assets/js/modernizr.js"></script>
</head>
<body class="auth">
<main role="main" class="site">
  <div>
    <section class="mx-auto">
      @yield('content')
    </section>
  </div>
</main>
<script src="{{ mix('assets/js/app.js') }}" type="text/javascript"></script>
</body>
<!-- made with ❤ by atelier-falk.ch & marceli.to -->
</html>