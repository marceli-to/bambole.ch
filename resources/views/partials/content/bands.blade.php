<article class="theme-medium overlap masonry-item bands" id="konzert">
  <div>
    <h1>Samstag</h1>
    <h2>9. September 2023</h2>
    @foreach($bands as $band)
      <article class="band-teaser" id="{{ \Str::slug($band->name) }}">
        <figure>
          @if ($band->image)
            <img 
              data-src="/img/cache/{{ $band->image->name }}/600/{{ $band->image->coords }}/1x1" 
              width="600" 
              height="600"
              title="{{ $band->name }}"
              class="is-responsive lazy">
          @endif          
        </figure>
        <div>
          <a href="{{ route('page.show', ['band' => $band->id, 'slug' => \Str::slug($band->name)]) }}" class="btn-band" title="{{$band->name}}">
            <h4>Samstag ab {{$band->time_start_full}} Uhr</h4>
            {{-- <span>{{$band->stage->name}}</span> --}}
            <h3>{{$band->name}}</h3>
          </a>
          @if ($band->website || $band->youtube)
            <div class="band-teaser__links">
              <div>
                @if ($band->website)
                  <a href="{{$band->website}}" class="icon-band" target="_blank" title="Webseite {{$band->name}}">
                    <img src="/assets/img/website.svg" height="40" width="40" alt="">
                  </a>
                @endif
                @if ($band->youtube)
                  <a href="{{$band->youtube}}" class="icon-band is-youtube" target="_blank" title="Webseite {{$band->youtube}}">
                    <img src="/assets/img/sound.svg" height="40" width="40" alt="">
                  </a>
                @endif
              </div>
            </div>
          @endif
        </div>
      </article>
    @endforeach
  </div>
</article>