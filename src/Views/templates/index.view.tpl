<h1>{{page}}</h1>
<h2>{{algoMas}}</h2>

<section>
  {{foreach heroes}}
    <section class="hero">
      <img src="/{{~BASE_DIR}}/{{heroimgurl}}">
      <section class="action">
          {{heroname}}
          <br/>
          {{heroaction}}
      </section>
      <hr/>
    </section>
  {{endfor heroes}}
</section>
<section>
  Top 5 Pianos a la venta
</section>

<section>
  Top 5 Partituras
</section>
