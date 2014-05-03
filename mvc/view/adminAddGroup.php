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
        <h2>Ajouter une collection</h2>
        <form method="post" action="/admin/post">
          <fieldset>
            <label>Nom de la collection : </label>
            <input type="text" name="name" /><br>

            <label>Section : </label>
            <span class="tooltip" title="Si la section n'est pas présente dans la liste il faut la créer.">?</span>
            <select name="section">
              <?php
              foreach ($sections as $section) { ?>
              <option value="<?php echo $section["alias"]; ?>"><?php echo $section["name"]; ?></option>
              <?php }
              ?>
            </select>
          </fieldset>
          <fieldset>
            <button type="submit" name="action" value="addGroup">Ajouter</button>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
