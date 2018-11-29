<?php $title = 'Administration - Mon Blog';
session_start();
?>

<?php ob_start();  ?>

<?php if (!empty($_SESSION))
{ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->


  <h1>Bienvenu sur la Page d'Administration</h1>
  <input class="buttonCenter" type="button" value="Ajouter un Post" onclick="javascript:location.href='index.php?action=addPost'">

  <h3>Dernier Post</h3>

<?php foreach ($posts as $post):?>
  <h3>
      <?= $post->getTitle(); ?>
  </h3>

  <p>
      <?= $post->getCreationDateFr(); ?>
  </p>

  <p>
      <?= $post->getContent() . "..."; ?>
  </p>

  <em><a href="index.php?action=post&amp;id=<?= $post->getId(); ?>">Commentaires...</a></em>
  <input class="btn btn-warning buttonCenter" type="button" value="Modifier" onclick="javascript:location.href='index.php?action=modifPost&postId=<?= $post->getId(); ?>'">

  -

  <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deletePost&id=<?= $post->getId(); ?>'">

<?php endforeach; ?>

  <h3>Derniers Commentaires du Blog</h3>

<?php foreach ($comments as $comment):?>
  <em> <?= $comment->getAuthor(); ?></em>

  <p> <?= $comment->getCommentDateFr(); ?> </p>

  <p> <?= $comment->getComment(); ?> </p>

  <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deleteComm&id=<?= $comment->getId();?>'">

<?php endforeach; ?>

<?php
  }
  else
  {
    echo "vous n'etes pas connecté";
  }
?>

<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
