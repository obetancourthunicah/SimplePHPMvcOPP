<section class="depth-1">
  <h1>Trabajar con Usuarios</h1>
</section>
<section class="WWList">
  <table >
    <thead>
      <tr>
      <th>Código</th>
      <th>Correo</th>
      <th>Estado</th>
      <th>
        {{if CanInsert}}
        <a href="index.php?page=mnt_usuario&mode=INS&id=0">Nuevo</a>
        {{endif CanInsert}}
      </th>
      </tr>
    </thead>
    <tbody>
      {{foreach Usuarios}}
      <tr>
        <td>{{usercod}}</td>
        <td>
          {{if ~CanView}}
          <a href="index.php?page=mnt_usuario&mode=DSO&id={{usercod}}">{{useremail}}</a>
          {{endif ~CanView}}

          {{ifnot ~CanView}}
              {{useremail}}
          {{endifnot ~CanView}}
        </td>
        <td>{{userest}}</td>
        <td>
          {{if ~CanUpdate}}
          <a href="index.php?page=mnt_usuario&mode=UPD&id={{usercod}}"
            class="btn depth-1 w48" title="Editar">
            <i class="fas fa-edit"></i>
          </a>
          {{endif ~CanUpdate}}
          &nbsp;
          {{if ~CanDelete}}
          <a href="index.php?page=mnt_usuario&mode=DEL&id={{usercod}}"
            class="btn depth-1 w48" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
          </a>
          {{endif ~CanDelete}}
        </td>
      </tr>
      {{endfor Usuarios}}
    </tbody>
  </table>
</section>
