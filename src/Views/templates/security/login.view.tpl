<section>
  <h1>Iniciar Sesión</h1>
</section>
<section>
  <form method="post" action="index.php?page=sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
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
    {{if generalError}}
      <div>
        {{generalError}}
      </div>
    {{endif generalError}}
    <div>
      <button id="btnLogin" type="submit">Iniciar Sesión</button>
    </div>
  </form>
</section>
{{redirto}}
