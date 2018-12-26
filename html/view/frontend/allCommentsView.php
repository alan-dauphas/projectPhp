<?php $title = 'All Comments'; ?>

<?php ob_start(); ?>

<?php if (!empty($_SESSION)): ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->

  <h1>Liste de tous les Commentaires</h1>

  <?php foreach ($comments as $comment):?>
    <div class="comments">
        <?php if($comment->isSignaled()): ?>
            <div class="isSignaled">
                <p>Commentaire SIGNALER .</p>
            </div>
        <?php endif; ?>

        <p> Le <?= $comment->getCommentDateFr(); ?> </p>

        <em> Auteur : <?= $comment->getAuthor(); ?></em>

        <p> <?= $comment->getComment(); ?> </p>

        <?php if($_SESSION['admin']): ?>

          <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deleteComm&id=<?= $comment->getId();?>'">

        <?php endif; ?>
    </div>

    <hr>

  <?php endforeach; ?>

<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
