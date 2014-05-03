<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Administation</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css" />

    <!-- Javascript Library / Framework -->
    <script src="/assets/js/libs/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/admin.js"></script>

  </head>
  <body>
    <div id="container">
      <h1>Laurence Snackers : Adminisration</h1>
      <div>
        <h2>Ajouter une Section</h2>
        <p class="warning">Attention, ajouter une nouvelle section peut affecter l'affichage de la page d'accueil du site.<p>
        <form method="post" action="/admin/post">
          <fieldset>
            <label>Nom de la section : </label>
            <input type="text" name="name" /><br>
          </fieldset>
          <fieldset>
            <button type="submit" name="action" value="addSection">Ajouter</button>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
