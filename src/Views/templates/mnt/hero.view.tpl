<h1>{{ModalTitle}}</h1>

<form action="index.php?page=mnt_heroe" method="POST">
  <div>
    <label for="heroItemid">Código</label>
    <input type="text" name="heroItemid" id="heroItemid" placehoder="Código" value="{{heroItemid}}" />
  </div>
  <div>
    <label for="heroname">Panel</label>
    <input type="text" name="heroname" id="heroname" placehoder="Panel" value="{{heroname}}" />
  </div>
  <div>
    <label for="heroimgurl">Url Imágen</label>
    <input type="" name="heroimgurl" id="heroimgurl" placehoder="Url Imágen" value="{{heroimgurl}}" />
  </div>
  <div>
    <label for="heroaction">Html a Mostrar en Hero</label>
    <textarea name="heroaction" id="heroaction" placehoder="Html en Hero"/>{{heroaction}}</textarea>
  </div>
  <div>
    <label for="heroorder">Orden a Mostrar</label>
    <input type="number" name="heroorder" id="heroorder" placehoder="" value="{{heroorder}}" />
  </div>
  <div>
    <label for="heroest">Estado</label>
    <select name="heroest" id="heroest">
        <option value="ACT" {{if heroest_act}}selected{{endif heroest_act}}>Mostrar</option>
        <option value="INA" {{if heroest_ina}}selected{{endif heroest_ina}}>Ocultar</option>
    </select>
  </div>
  <div>
    <button type="submit" name="btnConfirmar">Confirmar</button>
    &nbsp;
    <button type="button" id="btnCancelar">Cancelar</button>
  </div>
</form>
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
