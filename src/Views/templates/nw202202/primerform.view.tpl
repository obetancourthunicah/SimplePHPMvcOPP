<h1>Este es mi primer Form</h1>
<form action="index.php?page=NW202202_PrimerForm" method="post" class="row offset-3 col-6">
    <fieldset class="row">
      <label class="col-4" for="nombre">Nombre:</label>
      <input class="col-8" type="text" name="nombre" id="nombre" value="{{txtNombre}}"/>
    </fieldset>
    <fieldset class="row">
      <label class="col-4" for="apellido">Apellido:</label>
      <input class="col-8" type="text" name="apellido" id="apellido" value="{{txtApellido}}" />
    </fieldset>
    <fieldset class="row">
      <button type="submit" name="btnEnviar">Enviar</button>
    </fieldset>
</form>
