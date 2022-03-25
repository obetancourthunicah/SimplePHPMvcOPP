<h1>{{modeDsc}}</h1>
<hr>
<section class="container-m">
  <form action="index.php?page=mnt.almacenes.almacen&mode={{mode}}&almcod={{almcod}}" method="post">
    <input type="hidden" name="crsxToken" value="{{crsxToken}}" />
    {{ifnot isInsert}}
    <fieldset class="row flex-center align-center">
      <label for="almcod" class="col-5">Código</label>
      <input class="col-7" id="almcod" name="almcod" value="{{almcod}}" placeholder="" type="text">
    </fieldset>
    {{endifnot isInsert}}
    <fieldset class="row flex-center align-center">
      <label class="col-5" for="almdsc">Almacen</label>
      <input class="col-7" id="almdsc" name="almdsc" value="{{almdsc}}" placeholder="" type="text">
    </fieldset>
    <fieldset class="row flex-center align-center">
      <label class="col-5" for="almtip">Tipo</label>
      <select class="col-7" name="almtip" id="almtip">
        {{foreach almtipOptions}}
        <option value="{{value}}" {{selected}}>{{text}}</option>
        {{endfor almtipOptions}}
      </select>
    </fieldset>
    <fieldset class="row flex-center align-center">
      <label class="col-5" for="almest">Estado</label>
      <select class="col-7" name="almest" id="almest">
        {{foreach almestOptions}}
        <option value="{{value}}" {{selected}}>{{text}}</option>
        {{endfor almestOptions}}
      </select>
    </fieldset>
    <fieldset class="row flex-end align-center">
      <button type="submit" name="btnConfirmar" class="btn primary">Confirmar</button>
      &nbsp;<button type="button" id="btnCancelar" class="btn secondary">Cancelar</button>
      &nbsp;
    </fieldset>
  </form>
</section>
<script>
  /* */
  document.addEventListener("DOMContentLoaded", (e) => {
    document.getElementById("btnCancelar").addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=mnt.almacenes.almacenes");
    })
  });
</script>
