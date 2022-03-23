@extends('layout.web')
@section('content')
  <section class="intro">
    <h1>Äs Fäscht mit gueter Musig, feinem Food und friedliche Lüüt in Winti</h1>
    <h2>Mir gsehd üs am Füfte Sechste Achte!</h2>
    <p>Das <strong>Bambole</strong> ist zurück! Am 5. und 6. August 2022 gibt es auf dem Radhof in Winterthur-Wülflingen wieder das volle Programm. Diesmal hat das Bambole sogar Nachwuchs dabei: Mit dem Bambolini erwartet euch ein neues Kinderprogramm!</p>
    <p>Weitere News folgen in den nächsten Wochen auf dieser Homepage und noch regelmässiger auf unserer <a href="https://www.instagram.com/openair_bamboler" target="_blank" title="Bamoble on Instagram">Insta-</a> oder <a href="https://www.facebook.com/bamboleopenair" target="_blank" title="Bamoble on Facebook">Facebookseite</a>.</p>
    <p>Was Du aber bereits jetzt tun kannst: Klick doch auf Mach mit! und werde Teil des Bambole-Teams! Na mach! Es lohnt sich, versprochen.</p>
  </section>
  <section class="content masonry">
    <article class="theme-medium has-overlap masonry-item">
      <div>
        <h1>Bands</h1>
        <p>Das Line-Up wird voraussichtlich Ende Mai / Anfang Juni bekannt.</p>
        <p>Noch können sich interessierte Bands bewerben. Mailt an booking@bambole.ch.</p>
      </div>
    </article>
    @include('partials.content.participate')

    <article class="theme-light masonry-item">
      <h1>Jetzt Spenden</h1>
      <p>Das Bambole verlangt weiterhin keinen Eintritt. Wie Du Dir aber sicher vorstellen kannst, stehen diesem Grundsatzentscheid hohe Kosten gegenüber.<br>Unterstütze uns daher vor Ort mit einer Kollektenspende oder bereits jetzt per Twint auf die Telefonnummer: <a href="tel:0000000" class="nobr">079 774 74 74</a><br>Viel Liebe für Dich!</p>
    </article>
    <article class="theme-medium masonry-item">
      <h2 class="text-light">Das Bambole vertritt klare Werte, die für die Organisator:innen und Helfer:innen genauso gelten wie für die Besucher:innen. Lade hier <a href="">unser Manifest</a> als PDF herunter</h2>
    </article>
    <article class="theme-light masonry-item">
      <h1>Bambolini</h1>
      <h2>Kinderprogramm</h2>
      <p>Das Bambolini ist das neue Kinderprogramm am Openair Bambole! Mehr Infos dazu folgen. Für Familien lohnt es sich aber, bereits den Bambole-Besuch in den Sommerferien einzuplanen. Es wird sehr lässig!</p>
    </article>
  </section>
@endsection