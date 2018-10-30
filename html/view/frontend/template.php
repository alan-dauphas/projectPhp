<?php
session_start();
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
      <p>Template Ok</p>
        <?= $content ?>
    </body>
</html>
