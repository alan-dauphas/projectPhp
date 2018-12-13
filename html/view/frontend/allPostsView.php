<?php $title = 'All Posts';
session_start();
?>

<?php ob_start();  ?>

<?php if (!empty($_SESSION))
{ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->

  <h1>Liste de tous les Posts</h1>

  <?php foreach ($posts as $post):?>
    <h3>
        <?= $post->getTitle(); ?>
    </h3>
    <div class="alignPost">
      <p>
          <?= $post->getCreationDateFr(); ?>
      </p>

      <p>
          <?= $post->getContent() . "..."; ?>
      </p>
      <p>
        <em><a href="index.php?action=post&amp;id=<?= $post->getId(); ?>">Commentaires...</a></em>
      </p>
    </div>

    <input class="btn btn-warning buttonCenter" type="button" value="Modifier" onclick="javascript:location.href='index.php?action=modifPost&postId=<?= $post->getId(); ?>'">

    -

    <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deletePost&id=<?= $post->getId(); ?>'">

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
