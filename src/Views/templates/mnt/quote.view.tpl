<h1>{{mode_dsc}}</h1>
<form action="index.php?page=Mnt-Quote&mode={{mode}}&quoteId={{quoteId}}" method="post" class="row col-6 offset-3">
    <section class="row my-2 align-center">
      <label for="quote" class="col-4">Cita</label>
      <input type="text" class="col-8" name="quote" id="quote" {{if readonly}}disabled {{endif readonly}} value="{{quote}}">
    </section>
    <section class="row my-2 align-center">
      <label for="author" class="col-4">Autor</label>
      <input type="text" class="col-8" name="author" id="author" {{if readonly}}disabled {{endif readonly}} value="{{author}}">
    </section>
    <section class="row my-2 align-center">
      <label for="status" class="col-4">Estado</label>
      <select name="status" class="col-8" id="status" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if act_selected}}selected{{endif act_selected}}>Activo</option>
        <option value="INA" {{if ina_selected}}selected{{endif ina_selected}}>Inactivo</option>
      </select>
    </section>
    <br/><br/>
    <section class="row flex-end my-2">
      {{if showSaveBtn}}
      <button class="mx-2 primary"  type="submit" name="btnGuardar">Guardar</button>
      {{endif showSaveBtn}}
      <button id="btnCancelar">Cancelar</button>
    </section>
    <script>
      document.getElementById("btnCancelar").addEventListener("click", function(event){
        event.preventDefault();
        window.location.href = "index.php?page=Mnt-Quotes";
      });
    </script>
</form>
