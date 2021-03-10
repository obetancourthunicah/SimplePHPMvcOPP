<section>
  <h1>Crea tu cuenta</h1>
</section>
<section>
  <form method="post" action="index.php?page=sec_register">
    <div>
      <label for="txtEmail">Correo Electrónico</label>
      <input type="email" id="txtEmail" name="txtEmail" value="{{txtEmail}}" />
      {{if errorEmail}}
        <div class="error">{{errorEmail}}</div>
      {{endif errorEmail}}
    </div>
    <div>
      <label for="txtPswd">Contraseña</label>
      <input type="password" id="txtPswd" name="txtPswd" value="{{txtPswd}}" />
      {{if errorPswd}}
          <div class="error">{{errorPswd}}</div>
      {{endif errorPswd}}
    </div>
    <div>
      <button id="btnSignin" type="submit">Crear Cuenta</button>
    </div>
  </form>
</section>
