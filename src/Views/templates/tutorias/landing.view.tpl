<h2>Tutorias Landing Page</h2>
<h3>Categoria {{catnom}} - ( {{catid}} )</h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    {{foreach tableElements}}
    <tr>
      <td>{{col1}}</td>
      <td>{{col2}}</td>
      <td>{{col3}}</td>
      <td>{{col4}}</td>
      <td>{{col5}}</td>
      <td><button>Buscar Col1: {{col1}} en Cat: {{~catid}} </button></td>
    </tr>
    {{endfor tableElements}}
  </tbody>
</table>
