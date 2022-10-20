<head>
  <h1>Tutores Disponibles</h1>
</head>
<main>
  <h2>Listado de Tutores</h2>
  <span>Viendo {{totalTutores}}.</span>
  <section class="cardHolder">
    {{foreach misTutores}}
    <div class="card">
      <span>Nombre {{nombre}}</span>
      <div class="imgCircle">
        <img src="{{img}}" alt="abc">
      </div>
      <button>Ver</button>
    </div>
    {{endfor misTutores}}
  </section>
</main>
<style>
  .cardHolder {
    display:flex;
    justify-content: center;
    flex-wrap: wrap;
  }
  .card {
    margin:1rem;
    width: 320px;
    height: 320px;
    padding: 1rem;
    border-radius: 7px;
    box-shadow: 1px 1px 3px #000;
  }
</style>
