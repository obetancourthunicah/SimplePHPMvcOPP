<section class="herocontainer">
  {{foreach heroes}}
    <section class="hero">
      <img src="/{{~BASE_DIR}}/{{heroimgurl}}">
      <section class="action depth-1">
          {{heroname}}
          <br/>
          {{heroaction}}
      </section>
      <hr/>
    </section>
  {{endfor heroes}}
</section>
