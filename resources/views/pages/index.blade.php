@extends('layout.web')
@section('content')
@include('partials.content.intro')
  <section class="content masonry">

    @include('partials.content.participate')
    @include('partials.content.bands-day', ['bands' => $bands_dayone, 'weekday' => 'Donnerstag', 'date' => '30. Juli 2026', 'anchor' => true])
    @include('partials.content.bands-day', ['bands' => $bands_daytwo, 'weekday' => 'Freitag', 'date' => '31. Juli 2026'])
    @include('partials.content.bands-day', ['bands' => $bands_daythree, 'weekday' => 'Samstag', 'date' => '1. August 2026', 'sectionClass' => 'pb-6x md:pb-8x'])
    {{-- @include('partials.content.bambolini') --}}

    {{-- @include('partials.content.jobs') --}}

    @include('partials.content.donate')
    {{-- @include('partials.content.manifest') --}}
    {{-- @include('partials.content.art') --}}
    @include('partials.content.contact')
    @include('partials.content.faq')
    @include('partials.content.awarness')
    {{-- @include('partials.content.mediapartner') --}}
    <div class="masonry-col"></div>
    <div class="masonry-col"></div>
  </section>
  @include('partials.content.imprint')
@endsection