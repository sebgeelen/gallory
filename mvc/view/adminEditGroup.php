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
        foreach ($groups as $group) {
          if ($group["id"] == $id) {
            break;
          }
        }
        ?>
        <h2>Éditer une collection</h2>
        <form method="post" action="/admin/post">
          <fieldset>
            <label>Nom de la collection : </label>
            <input type="text" name="name" value ="<?php echo $group['name']; ?>" /><br>
            <label>Section : </label>
            <select name="section">
              <?php
              foreach ($sections as $section) { ?>
              <option value="<?php echo $section["alias"]; ?>"<?php if($group["parentId"] == $section["id"]) { echo ' selected';} ?> ><?php echo $section["name"]; ?></option>
              <?php }
              ?>
            </select>
          </fieldset>
          <fieldset>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="action" value="editGroup">Éditer</button>
          </fieldset>
        </form>
      <?php } else { ?>
        <h2>selectionnez la collection à éditer </h2>
        <div>
          <?php
          foreach ($groups as $group) { ?>
          <a href="?id=<?php echo $group["id"]; ?>">&nbsp;<?php echo $group["name"]; ?></a><br>
          <?php }
          ?>
        </div>
      <?php } ?>
      </div>
    </div>
  </body>
</html>
