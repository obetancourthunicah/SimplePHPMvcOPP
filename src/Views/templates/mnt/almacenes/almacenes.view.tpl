<h1>Almacenes</h1>
<hr>
<table>
  <thead>
    <tr>
      <td>Código</td>
      <td>Almacen</td>
      <td>Tipo</td>
      <td>Estado</td>
      <td><a href="index.php?page=mnt.almacenes.almacen&mode=INS&almcod=0">Nuevo</a></td>
    </tr>
  </thead>
  <tbody>
    {{foreach almacenes}}
    <tr>
      <td>{{almcod}}</td>
      <td>
        <a href="index.php?page=mnt.almacenes.almacen&mode=DSP&almcod={{almcod}}">{{almdsc}}</a>
      </td>
      <td>{{almtip}}</td>
      <td>{{almest}}</td>
      <td>
        <a href="index.php?page=mnt.almacenes.almacen&mode=UPD&almcod={{almcod}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt.almacenes.almacen&mode=DEL&almcod={{almcod}}">Eliminar</a>
      </td>
    </tr>
    {{endfor almacenes}}
  </tbody>
</table>
