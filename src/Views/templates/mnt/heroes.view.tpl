<h1>Listado de Hero Items para el Index</h1>

<table>
  <thead>
    <tr>
          <th>heroItemid</th>
          <th>heroname</th>
          <th>heroimgurl</th>
          <th>heroaction</th>
          <th>heroorder</th>
          <th>heroest</th>
    </tr>
  </thead>
  <tbody>
    {{foreach heroes}}
    <tr>
      <td>{{heroItemid}}</td>
      <td>{{heroname}}</td>
      <td>{{heroimgurl}}</td>
      <td>{{heroaction}}</td>
      <td>{{heroorder}}</td>
      <td>{{heroest}}</td>
    </tr>
    {{endfor heroes}}

  </tbody>
</table>
