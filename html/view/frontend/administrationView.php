<?php $title = 'Administration - Mon Blog';
session_start();
?>

<?php ob_start();  ?>

<?php if (!empty($_SESSION))
{ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->

  <h1>Bienvenu sur la Page d'Administration</h1>
  <div class="col-md-12 alignMenu">
    <ul>
        <li>
            <a href="index.php?action=lastThreePosts">Voir les 3 Derniers Posts.</a>
        </li>
        <li>
            <a href="index.php?action=allPosts">Voir tous les Posts.</a>
        </li>
        <li>
            <a href="index.php?action=allCommentsSignaled">Voir les Commentaires Signaler.</a>
        </li>
        <li>
            <a href="index.php?action=allComments">Voir tous les commentaires.</a>
        </li>
    </ul>
  </div>

  <input class="buttonCenter" type="button" value="Ajouter un Post" onclick="javascript:location.href='index.php?action=addPost'">

<?php
  }
  else
  {
    echo "vous n'etes pas connecté";
  }
?>

<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
