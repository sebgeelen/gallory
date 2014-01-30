<!DOCTYPE html>
<html>
<head>
  <title> Laurence Snackers Peintre | laurencesnackers.be</title>
</head>
<body>
<h1>Laurence Snackers</h1>

<?php if ($handle = opendir('./public/uploads')) { ?>
  <hr />
  <h2>Directory handle: <? echo $handle ?></h2>
  <ul>
    <?php
    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) { ?>
        <li><? echo $entry ?></li>
    <?php } ?>
  </ul>
  <?php
  closedir($handle);
} ?>
</body>
</html>
