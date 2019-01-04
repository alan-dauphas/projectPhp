<?php $title = 'All Comments Signaled'; ?>

<?php ob_start(); ?>

    <h1>Liste de tous les commentaires signaler</h1>

    <?php foreach ($comments as $comment):?>

        <div class="comments">
            <em><?= $comment->getAuthor(); ?></em>

            <p><?= $comment->getCommentDateFr(); ?></p>

            <p><?= $comment->getComment(); ?></p>

            <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deleteComm&id=<?= $comment->getId();?>'">
        </div>

        <hr>

    <?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
