<h1>Trabajar con Productos</h1>
<section>

</section>
<section>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Vendible</th>
        <th><a href="index.php?page=Mnt-Producto&mode=INS">Nuevo</a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach Productos}}
      <tr>
        <td>{{invPrdCodInt}}</td>
        <td> <a href="index.php?page=Mnt-Producto&mode=DSP&id={{invPrdId}}">{{invPrdDsc}}</a></td>
        <td>{{invPrdTip}}</td>
        <td>{{invPrdEst}}</td>
        <td>{{invPrdVnd}}</td>
        <td>
          <a href="index.php?page=Mnt-Producto&mode=UPD&id={{invPrdId}}">Editar</a>
          &NonBreakingSpace;
          <a href="index.php?page=Mnt-Producto&mode=DEL&id={{invPrdId}}">Eliminar</a>
        </td>
      </tr>
      {{endfor Productos}}
    </tbody>
  </table>
</section>
