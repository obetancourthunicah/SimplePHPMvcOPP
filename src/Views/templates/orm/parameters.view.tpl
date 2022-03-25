<h1>Generador de CRUD 1.0</h1>
<hr>
<form action="index.php?page=orm.parameters" method="post">
  <label for="table">
    <input id="table" name="table" value="{{table}}" placeholder="table" type="text">
  </label>
  <label for="namespace">
    <input id="namespace" name="namespace" value="{{namespace}}" placeholder="namespace" type="text">
  </label>
  <label for="entity">
    <input id="entity" name="entity" value="{{entity}}" placeholder="entity" type="text">
  </label>
  <button type="submit" name="btnSubmit">Generar</button>
</form>

{{if listController}}
  <h2>ListController</h2>
  <pre>
{{listController}}
  </pre>

{{endif listController}}
