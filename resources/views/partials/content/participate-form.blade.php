<h2>Melde dich an!</h2>
<form>
  @csrf
  <x-text-field type="text" name="name" placeholder="Name*" />
  <x-text-field type="email" name="email" placeholder="E-Mail*" />
  <x-text-field type="tel" name="phone" placeholder="Telefon*" />
  <div class="form-group">
    <div class="select-wrapper">
      <select placeholder="Funktion*">
        <option>Funktion wählen...*</option>
        <option>Helfer 3</option>
      </select>
    </div>
  </div>
</form>