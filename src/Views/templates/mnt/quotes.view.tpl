<h1>Listado de Citas</h1>
<table class="table">
  <thead>
    <tr>
      <th>Código</th>
      <th>Cita</th>
      <th>Autor</th>
      <th>Estado</th>
      <th>Creado</th>
      <th><a href="index.php?page=Mnt-Quote&mode=INS" class="btn">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach quotes}}
    <tr>
      <td>{{quoteId}}</td>
      <td>{{quote}}</td>
      <td>{{author}}</td>
      <td>{{status}}</td>
      <td>{{created}}</td>
      <td>
        <a href="index.php?page=Mnt-Quote&mode=UPD&quoteId={{quoteId}}">Editar</a>
      </td>
    </tr>
    {{endfor quotes}}
  </tbody>
</table>
