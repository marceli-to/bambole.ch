@component('mail::message')
<h1>Anmeldung Helfer</h1>
<div>
Name: {{$backer['name']}}<br>
Telefon: {{$backer['phone']}}<br>
E-Mail: {{$backer['email']}}<br>
Funktion: {{$backer['duty']['description']}}
</div>
@endcomponent