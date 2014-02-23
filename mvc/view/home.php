<!DOCTYPE html>
<html>
  <head>
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
        <h2>Home</h2>
          <?php
          foreach ($sections as $section) { ?>
          <a href="/<?php echo $section["alias"]; ?>"><?php echo $section["name"]; ?></a><br/>
          <?php }
          ?>
      </div>
    </div>
  </body>
</html>
