<h1>Ingreso de una Cita</h1>
<form action="index.php?page=Mnt-Quote" method="post" class="row">
    <fieldset class="row">
      <label for="quote" class="col-4">Cita</label>
      <input type="text" name="quote" id="quote" value="{{quote}}">
    </fieldset>
    <fieldset class="row">
      <label for="author" class="col-4">Autor</label>
      <input type="text" name="author" id="author" value="{{author}}">
    </fieldset>
    <fieldset class="row">
      <label for="status" class="col-4">Estado</label>
      <select name="status" id="status">
        <option value="ACT" {{if act_selected}}selected{{endif act_selected}}>Activo</option>
        <option value="INA" {{if ina_selected}}selected{{endif ina_selected}}>Inactivo</option>
      </select>
    </fieldset>
    <br/><br/>
    <fieldset class="row">
      <button type="submit" name="btnGuardar">Guardar</button>
    </fieldset>
    
</form>
