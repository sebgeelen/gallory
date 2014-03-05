<?php
header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> 404 | Laurence Snackers Peintre | laurencesnackers.be</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" />

  </head>
  <body>
    <div id="container">
      <h1>404 Page not found</h1>
      <em><?php echo $_GET["q"]; ?></em>
    </div>
  </body>
</html>
