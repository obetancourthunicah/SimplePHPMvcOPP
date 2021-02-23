<h1>Gestión de Categorías</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Categoría</th>
        <th>Estado</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{catid}}</td>
        <td>{{catnom}}</td>
        <td>{{catest}}</td>
        <td></td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>
