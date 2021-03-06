<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Laurence Snackers Peintre | laurencesnackers.be</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" />

    <!-- Javascript Library / Framework -->
    <script src="/assets/js/libs/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>

  </head>
  <body>
    <div id="container">
      <h1>Laurence Snackers</h1>
      <div id="section-1" class="section">
        <h2><?php echo $section["name"]; ?> : <?php echo $group["name"]; ?></h2>
        <h3><?php echo $image["name"] ?></h3>
        <img src="/gallery/big/<?php echo $image["alias"]; ?>.jpg">
      </div>
    </div>
  </body>
</html>
