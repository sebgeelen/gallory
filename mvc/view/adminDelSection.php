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
        <h2>Supprimer une section</h2>
        <p class="warning">Attention, supprimer une section supprime toute les collections et peintures contenue dans cette section.<p>
        <p class="warning">De plus, supprimer une section peut affecter l'affichage de la page d'accueil du site.<p>
        <form method="post" action="/admin/post">
          <fieldset>
            <label>selectionnez la ou les section(s) à supprimer </label><br>
              <?php
              foreach ($sections as $section) { ?>
              <input type="checkbox" name="id" value="<?php echo $section["id"]; ?>">&nbsp;<?php echo $section["name"]; ?><br>
              <?php }
              ?>
          </fieldset>
          <fieldset>
            <button type="submit" name="action" value="delSection">Supprimer</button>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
