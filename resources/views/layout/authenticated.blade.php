<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@if(trim($__env->yieldContent('seo_title')))@yield('seo_title') &bull; {{config('seo.title')}}@else{{config('seo.title')}}@endif</title>
@include('partials.misc.favicon')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="format-detection" content="telephone=no">
<link href="{{ mix('assets/css/cms/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
  <app-component />
</div>
<script src="{{ mix('assets/js/cms/app.js') }}" defer></script>
</body>
</html>
