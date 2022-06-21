<h1>{{mode_desc}}</h1>
<section>
  <form action="index.php?page=mnt_producto" method="post">
    <input type="hidden" name="mode" value="{{mode}}" />
    <input type="hidden" name="crsf" value="{{crsf_token}}" />
    <input type="hidden" name="invPrdId" value="{{invPrdId}}" />
    <fieldset>
      <label for="invPrdBrCod">Código de Barra</label>
      <input type="text" id="invPrdBrCod" name="invPrdBrCod" placeholder="Código de Barra" value="{{invPrdBrCod}}"/>
      {{if error_invPrdBrCod}}
        {{foreach error_invPrdBrCod}}
          <div class="error">{{this}}</div>
        {{endfor error_invPrdBrCod}}
      {{endif error_invPrdBrCod}}
    </fieldset>
    <fieldset>
      <label for="invPrdCodInt">SKU</label>
      <input type="text" id="invPrdCodInt" name="invPrdCodInt" placeholder="SKU" value="{{invPrdCodInt}}" />
      {{if error_invPrdCodInt}}
        {{foreach error_invPrdCodInt}}
          <div class="error">{{this}}</div>
        {{endfor error_invPrdCodInt}}
      {{endif error_invPrdCodInt}}
    </fieldset>
    <fieldset>
      <label for="invPrdDsc">Descripción</label>
      <input type="text" id="invPrdDsc" name="invPrdDsc" placeholder="Descripción" value="{{invPrdDsc}}" />
      {{if error_invPrdDsc}}
          {{foreach error_invPrdDsc}}
            <div class="error">{{this}}</div>
          {{endfor error_invPrdDsc}}
      {{endif error_invPrdDsc}}
    </fieldset>
    <fieldset>
      <label for="invPrdTip">Tipo de Producto</label>
      <select name="invPrdTip" id="invPrdTip">
        {{foreach invPrdTipArr}}
          <option value="{{value}}" {{selected}}>{{text}}</option>
        {{endfor invPrdTipArr}}
      </select>
    </fieldset>
    <fieldset>
      <label for="invPrdEst">Estado</label>
      <select name="invPrdEst" id="invPrdEst">
        {{foreach invPrdEstArr}}
        <option value="{{value}}" {{selected}}>{{text}}</option>
        {{endfor invPrdEstArr}}
      </select>
    </fieldset>
    <fieldset>
      <label for="invPrdVnd">Es Vendible</label>
      <select name="invPrdVnd" id="invPrdVnd">
        {{foreach invPrdVndArr}}
        <option value="{{value}}" {{selected}}>{{text}}</option>
        {{endfor invPrdVndArr}}
      </select>
    </fieldset>
    <fieldset>
      <button type="submit" name="btnEnviar">{{btnEnviarText}}</button>
      &nbsp;
      <button name="btnCancelar" id="btnCancelar">Cancelar</button>
    </fieldset>
  </form>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('btnCancelar').addEventListener('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      window.location.href = 'index.php?page=mnt_productos';
    });
  });
</script>
