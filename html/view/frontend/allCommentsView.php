<?php $title = 'All Comments';
session_start();
?>

<?php ob_start();  ?>

<?php if (!empty($_SESSION))
{ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->

  <h1>Liste de tous les Commentaires</h1>

  <?php foreach ($comments as $comment):?>
    <div class="comments">
        <?php if($comment->isSignaled()){ ?>
            <div class="isSignaled">
                <p>Commentaire SIGNALER .</p>
            </div>

              <em> <?= $comment->getAuthor(); ?></em>

              <p> <?= $comment->getCommentDateFr(); ?> </p>

              <p> <?= $comment->getComment(); ?> </p>
          <?php }
          else {?>
            <em> <?= $comment->getAuthor(); ?></em>

            <p> <?= $comment->getCommentDateFr(); ?> </p>

            <p> <?= $comment->getComment(); ?> </p>
          <?php } ?>

          <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deleteComm&id=<?= $comment->getId();?>'">
          --------------
              </div>

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
