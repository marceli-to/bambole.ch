@extends('layout.web')
@section('content')
@include('partials.content.intro')
  <section class="content masonry">

    @include('partials.content.participate')
    {{-- @include('partials.content.bands-dayone')
    @include('partials.content.bands-daytwo') --}}
    @include('partials.content.bambolini')

    @include('partials.content.jobs')

    @include('partials.content.donate')
    @include('partials.content.manifest')
    @include('partials.content.art')
    @include('partials.content.contact')
    @include('partials.content.faq')
    @include('partials.content.awarness')
    @include('partials.content.mediapartner')
    <div class="masonry-col"></div>
    <div class="masonry-col"></div>
  </section>
  @include('partials.content.imprint')
@endsection