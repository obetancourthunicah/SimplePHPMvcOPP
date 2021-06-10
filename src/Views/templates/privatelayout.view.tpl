<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{SITE_TITLE}}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/appstyle.css" />
  {{foreach SiteLinks}}
  <link rel="stylesheet" href="{{this}}" />
  {{endfor SiteLinks}}
  {{foreach BeginScripts}}
  <script src="{{this}}"></script>
  {{endfor BeginScripts}}
</head>

<body>
  <header>
    <h1>{{SITE_TITLE}}</h1>
    <nav>
      <ul>
        {{with login}}
          <li><span>{{userName}}</span></li>
        {{endwith login}}
        <li><a href="index.php?page=admin_admin">Inicio</a></li>
        {{foreach NAVIGATION}}
            <li><a href="{{nav_url}}">{{nav_label}}</a></li>
        {{endfor NAVIGATION}}
        <li><a href="index.php?page=sec_logout">Salir</a></li>
      </ul>
    </nav>
  </header>
  <main>
    {{{page_content}}}
  </main>
  <footer>
    <div>Todo los Derechos Reservados 2021 &copy;</div>
  </footer>
  {{foreach EndScripts}}
  <script src="{{this}}"></script>
  {{endfor EndScripts}}
</body>
</html>
