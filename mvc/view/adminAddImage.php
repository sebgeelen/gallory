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
        <h2>Sélectionnez l'image à ajouter.</h2>
        <form method="post" action="/admin/post" enctype="multipart/form-data">
          <fieldset>
            <label>Nom de la peinture : </label>
            <input type="text" name="name" /><br>

            <label>collection : </label>
            <span class="tooltip" title="Si la collection n'est pas présente dans la liste il faut la créer.">?</span>
            <select name="group">
              <?php
              foreach ($groups as $group) { ?>
              <option value="<?php echo $group["alias"]; ?>"><?php echo $group["name"]; ?></option>
              <?php }
              ?>
            </select>
          </fieldset>
          <fieldset>
            <input type="file" name="img" />
          </fieldset>
          <fieldset>
            <button type="submit" name="action" value="addImage">Ajouter</button>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
