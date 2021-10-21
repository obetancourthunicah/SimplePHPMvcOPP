<h1>Listado de Hero Items para el Index</h1>
<section class="WWList container-m">
<table>
  <thead>
    <tr>
          <th>#</th>
          <th>Panel</th>
          <th class="hidden-s">Url</th>
          <th class="hidden-s">Html</th>
          <th class="hidden-s">Orden</th>
          <th>Estado</th>
          <th><a href="index.php?page=mnt_heroe&mode=INS" class="button">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach heroes}}
    <tr>
      <td>{{rownum}}</td>
      <td><a href="index.php?page=mnt_heroe&mode=DSP&id={{heroItemid}}">{{heroname}}</a></td>
      <td class="hidden-s">{{heroimgurl}}</td>
      <td class="hidden-s">{{heroaction}}</td>
      <td class="hidden-s">{{heroorder}}</td>
      <td>{{heroest}}</td>
      <td class="center">
        <a href="index.php?page=mnt_heroe&mode=UPD&id={{heroItemid}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt_heroe&mode=DEL&id={{heroItemid}}">Eliminar</a>
      </td>
    </tr>
    {{endfor heroes}}

  </tbody>
</table>
</section>
