@extends('layout.web')
@section('content')
@include('partials.content.intro')
  <section class="content masonry">
    @include('partials.content.bands')
    @include('partials.content.participate', ['duties' => $duties])
    @include('partials.content.donate')
    @include('partials.content.manifest')
    @include('partials.content.bambolini')
    @include('partials.content.contact')
    <div class="masonry-col"></div>
    <div class="masonry-col"></div>
  </section>
@endsection