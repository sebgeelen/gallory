<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Laurence Snackers Peintre | laurencesnackers.be</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">

    <!-- Javascript Library / Framework -->
    <script src="/assets/js/libs/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>

  </head>
  <body>
    <div id="container">
      <h1>Laurence Snackers</h1>
      <div id="section-container" class="section">
          <?php
          $cssWidth = floor( (100 / count($sections) ) * 1000 ) / 1000;

          foreach ($sections as $section) {
          ?><a href="/<?php echo $section["alias"]; ?>" class="link-section link-section-<?php echo $section["id"]; ?>" style="width:<?php echo $cssWidth; ?>%">
            <div class="descr-c">
              <h2><?php echo $section["name"]; ?></h2>
              <div class="descr tr-opacity">
                <?php echo $section["htmlText"]; ?>
              </div>
            </div>
          </a><?php }
          ?>
      </div>
    </div>
  </body>
</html>
