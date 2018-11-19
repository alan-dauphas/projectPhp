<?php
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="refresh" content="200">
<!-- raffraichis la page toutes les X secondes -->
        <title><?= $title ?></title>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1">
                      <a href="index.php">  <img id="logo" src="public/picture/img/plumeNoir.png"></a>
                    </div>

                    <div class="col-md-offset-2 col-md-6 text-center">
                        <h1>Jean Forteroche : Billet simple pour l'Alaska</h1>
                    </div>



                      <?php
                      if (!empty($_SESSION)){ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->
                        <div class="col-md-offset-1 col-md-2 text-right">
                          <div class="loginForm">
                              <a href="index.php?action=administration">Administration</a>
                              <a href="index.php?action=deconnection">Déconnexion</a>
                          </div>
                        </div>
                      <?php }
                      elseif (empty($_GET['action']) && empty($_SESSION)){ ?>

                      <!-- Si aucune session, alors cela affiche le formulaire de connexion, uniquement sur la page d'acceuil du site -->
                      <div class="col-md-offset-1 col-md-2">


                      <form action="index.php?action=connection" method="post" id="loginForm">
                      <label>Pseudo</label> :<br /><input type="text" name="pseudonyme" size="15" />
                      <br />
                      <label>Mot de passe</label> :<br /><input type="password" name="passConnection" size="15" />
                      <input id="validateButton" type="submit" />
                      </form>
                      <?php } ?>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-offset-4 col-md-4">
                    <nav class="navbar navbar-header navbar-inverse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Acceuil</a></li>
                            <?php if (empty($_SESSION)){ ?>
                                  <li><a href="index.php?action=registration">Inscription</a></li>
                            <?php } ?>
                            <li><a href="index.php?action=test">Page de Test</a></li>
                            <li><a href="https://www.google.fr">Recherche Google</a></li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </div>
        </header>


        <div class="container-fluid">
            <div class="row">
                <section id="imgPen">
                    <div class="col-md-offset-2 col-md-8 titleSecondary">
                        <h2>"Billet simple pour l'Alaska"<br />écrit par :<br />Jean Forteroche</h2>
                    </div>
                </section>
            </div>

            <div class="row">
                <section>
                    <div class="col-md-offset-2 col-md-8">
                        <?= $content ?>
                    </div>
                </section>
            </div>
        </div>



    </body>
</html>
