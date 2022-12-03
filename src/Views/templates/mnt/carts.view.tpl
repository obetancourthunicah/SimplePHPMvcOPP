{{foreach productos}}
  <div>
    <h3>{{nombre}}</h3>
    <p>{{precio}}</p>
    <p>{{cantidad}}</p>
    {{if enCarretilla}}
      <a href="/carts/{{id}}/remove">Remove from cart</a
    {{endif enCarretilla}}
    {{ifnot enCarretilla}}
      <a href="/carts/{{id}}/add">Add to cart</a>
    {{endifnot enCarretilla}}
  </div>
{{endfor productos}}
