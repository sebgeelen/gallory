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
        <h2>Supprimer une image</h2>
        <form method="post" action="/admin/post">
          <fieldset>
            <label>selectionnez la ou les image(s) à supprimer </label><br>
              <?php
              foreach ($images as $image) { ?>
              <input type="checkbox" name="id" value="<?php echo $image["id"]; ?>">&nbsp;<?php echo $image["name"]; ?><br>
              <?php }
              ?>
          </fieldset>
          <fieldset>
            <button type="submit" name="action" value="delImage">Supprimer</button>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
