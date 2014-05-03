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
      <?php if(isset($_GET['id']) && intval($_GET['id']) > 0) {
        $id = intval($_GET['id']);
        foreach ($sections as $section) {
          if ($section["id"] == $id) {
            break;
          }
        }
        ?>
        <h2>Éditer une Section</h2>
        <form method="post" action="/admin/post">
          <fieldset>
            <label>Nom de la section : </label>
            <input type="text" name="name" value ="<?php echo $section['name']; ?>" /><br>
          </fieldset>
          <fieldset>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="action" value="editSection">Éditer</button>
          </fieldset>
        </form>
      <?php } else { ?>
        <h2>selectionnez la section à éditer </h2>
        <div>
          <?php
          foreach ($sections as $section) { ?>
          <a href="?id=<?php echo $section["id"]; ?>">&nbsp;<?php echo $section["name"]; ?></a><br>
          <?php }
          ?>
        </div>
      <?php } ?>
      </div>
    </div>
  </body>
</html>
