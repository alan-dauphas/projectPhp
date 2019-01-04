<?php $title = "New Post"; ?>

<?php ob_start(); ?>

    <?php if (!empty($_SESSION)){ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->

        <p>Bienvenu <?= $_SESSION['pseudo'];?></p>

        <h1>Ajouter un Post</h1>

       <div class="container">
           <div class="row">
               <div class="col-md-12 parent-text" style="text-align : center;">
                   <div id="child-text">
                        <form action="index.php?action=addPost&newPost=confirm" method="post">
                            <textarea class="textareaTitle" name='title' placeholder="Ecrivez ici un titre"></textarea><br />
                            <textarea class"textareaContent" id="mytextarea" name="content" placeholder="Ecrivez ici votre nouvelle article"></textarea><br />
                            <input type="submit" value="valider">
                        </form>
                   </div>
               </div>
           </div>
       </div>


    <?php } else {
      echo "Vous n'etes pas connecté";
    } ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
