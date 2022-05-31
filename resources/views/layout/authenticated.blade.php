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
<meta name="color-scheme" content="dark light">
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
