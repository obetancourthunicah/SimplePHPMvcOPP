<section class="container-m row depth-1 px-4 py-4">
  <h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
  <form action="index.php?page=mnt_heroe" method="POST" class="col-12 col-m-8 offset-m-2">
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroItemid">Código</label>
      <input class="col-12 col-m-9" type="text" name="heroItemid" id="heroItemid" placehoder="Código" value="{{heroItemid}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroname">Panel</label>
      <input class="col-12 col-m-9" type="text" name="heroname" id="heroname" placehoder="Panel" value="{{heroname}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroimgurl">Url Imágen</label>
      <input class="col-12 col-m-9" type="" name="heroimgurl" id="heroimgurl" placehoder="Url Imágen" value="{{heroimgurl}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroaction">Html a Mostrar en Hero</label>
      <textarea class="col-12 col-m-9" name="heroaction" id="heroaction" placehoder="Html en Hero" />{{heroaction}}</textarea>
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroorder">Orden a Mostrar</label>
      <input class="col-12 col-m-9" type="number" name="heroorder" id="heroorder" placehoder="" value="{{heroorder}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroest">Estado</label>
      <select name="heroest" id="heroest" class="col-12 col-m-9">
        <option value="ACT" {{if heroest_act}}selected{{endif heroest_act}}>Mostrar</option>
        <option value="INA" {{if heroest_ina}}selected{{endif heroest_ina}}>Ocultar</option>
      </select>
    </div>
    <div class="row my-4 align-center flex-end">
      <button class="primary col-12 col-m-2" type="submit" name="btnConfirmar">Confirmar</button>
      &nbsp;<button class="col-12 col-m-2"type="button" id="btnCancelar">Cancelar</button>
    </div>
    </div>
  </form>
</section>


<script>
  document.addEventListener("DOMContentLoaded", ()=>{
    const btnCancelar = document.getElementById("btnCancelar");
    btnCancelar.addEventListener("click", (e)=>{
      e.preventDefault();
      e.stopPropagation();
      window.location.assign("index.php?page=mnt_heroes");
    });
  });
</script>
