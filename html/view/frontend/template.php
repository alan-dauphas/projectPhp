<?php

echo "Template chargée<br/><br/>";
echo "Test de session :";

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
      <a href="index.php?action=test">Test</a><br />

      <?php
      if (!empty($_SESSION)){ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->
        <a href="index.php?action=deconnection">Déconnexion</a>
        <a href="index.php?action=administration">Administration</a>
      <?php }
      elseif (empty($_GET['action'])){ ?> <!-- Si aucune session, alors cela affiche le formulaire de connexion, uniquement sur la page d'acceuil du site -->

        <a href="index.php?action=registration">Inscription</a>
      <form action="index.php?action=connection" method="post">
        <label>Pseudo</label> :<br /><input type="text" name="pseudonyme" size="15" />
        <br />
        <label>Mot de passe</label> :<br /><input type="password" name="passConnection" size="15" />
        </br>
        <label>Connexion Automatique</label> : <input type="checkbox" name="connectionAuto" />
        </br>
        <input id="validateButton" type="submit" />
      </form>
      <?php } ?>




      <p>Template Ok</p>
        <?= $content ?>
    </body>
</html>
