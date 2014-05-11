<?php

if (isset($_GET['n']) && !isset($newImageName)) {
  $newImageName =  $_GET['n'];
} else if(!isset($newImageName)) {
  exit();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Administation</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/imgareaselect-default.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css" />

    <!-- Javascript Library / Framework -->
    <script type="text/javascript" src="/assets/js/libs/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/libs/jquery.imgareaselect.pack.js"></script>
    <script type="text/javascript" src="/assets/js/resize.js"></script>

  </head>
  <body>
    <div id="container">
      <h1>Laurence Snackers : Adminisration</h1>
      <div id="resize">
        <h2>Miniature</h2>

        <div>
          <img class="preview" src="/gallery/big/<?php echo $newImageName ?>.jpg" />
        <div>
        <div>
          <img class="img" src="/gallery/big/<?php echo $newImageName ?>.jpg" />
        <div>

      </div>
    </div>
  </body>
</html>
