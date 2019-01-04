<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1 col-sm-2 text-center">
                        <a href="index.php">  <img id="logo" src="public/picture/img/plumeNoir.png"></a>
                    </div>

                    <div class="col-md-offset-2 col-md-6 col-sm-10 text-center">
                        <h1>Jean Forteroche : Billet simple pour l'Alaska</h1>
                    </div>

                    <?php if (!empty($_SESSION)){ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->
                        <div class="col-md-offset-2 col-md-1 col-sm-12 text-center">
                            <div class="loginForm">
                                <a href="index.php?action=deconnection">Déconnexion</a><br />
                                <p>Bienvenu <?= $_SESSION['pseudo']?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (empty($_GET['action']) && empty($_SESSION)){ ?>
                    <!-- Si aucune session, alors cela affiche le formulaire de connexion, uniquement sur la page d'acceuil du site -->
                        <div class="col-md-offset-2 col-md-1 col-sm-12">
                            <form action="index.php?action=connection" method="post" id="loginForm">
                                <label>Pseudo :</label><input type="text" name="pseudonyme" size="15" />
                                <br />
                                <label>Mot de passe :</label><input type="password" name="passConnection" size="15" />
                                <br /><br />
                                <input id="validateButton" type="submit" value="Connexion"/>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-sm-12" id="lienMenu">
                        <nav class="navbar navbar-header navbar-inverse">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Acceuil</a></li>
                                <?php if (empty($_SESSION)){ ?>
                                    <li><a href="index.php?action=registration">Inscription</a></li>
                                <?php } elseif ($_SESSION['admin'] === '1' || $_SESSION['admin'] === '0') { ?>
                                    <li><a href="index.php?action=administration">Administration</a></li>
                                    <li><a href="index.php?action=addPost">Ajouter un Post</a></li>
                                <?php } ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section>
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
                        <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                            <?= $content ?>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
           <script>
             tinymce.init({
               selector: '#mytextarea',
               height: 350,
               menubar: false,
               toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
             });
           </script>
    </body>
</html>
