<h1>{{SITE_TITLE}}</h1>
<img src="public/imgs/hero/1.jpg" alt="hero 1" />

<ul>
  {{foreach atomicArray}}
    <li>{{this}}</li>
  {{endfor atomicArray}}
</ul>
<table>
  <tr>
    <th>Codigo</th>
    <th>Descripcion</th>
    <th>Datos de Raiz</th>
  </tr>
  {{foreach Fechas}}
  <tr>
    <td>{{id}}</td>
    <td>{{desc}}</td>
    <td>
      <select name="" id="">
        {{foreach ~atomicArray}}
          <option value="{{this}}">{{this}}</option>
          {{endfor ~atomicArray}}
      </select>
    </td>
  </tr>
  {{endfor Fechas}}
</table>

<hr/>
{{if estaAutorizadoVer}}
  <h2>Esto solo se ve si esta autorizado</h2>
{{endif estaAutorizadoVer}}
{{ifnot estaAutorizadoVer}}
  <h2>Esto solo se ve si no esta autorizado</h2>
{{endifnot estaAutorizadoVer}}

<hr>
{{with UserData}}
  Usuario: ({{codigo}}) {{descripcion}}
{{endwith UserData}}
