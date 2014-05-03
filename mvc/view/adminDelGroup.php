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
        <h2>Supprimer une collection</h2>
        <p class="warning">Attention, supprimer une collection supprime toute les peintures contenue dans cette collection.<p>
        <form method="post" action="/admin/post">
          <fieldset>
            <label>selectionnez la ou les collection(s) à supprimer </label><br>
              <?php
              foreach ($groups as $group) { ?>
              <input type="checkbox" name="group" value="<?php echo $group["alias"]; ?>">&nbsp;<?php echo $group["name"]; ?><br>
              <?php }
              ?>
          </fieldset>
          <fieldset>
            <button type="submit" name="action" value="delGroup">Supprimer</button>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
