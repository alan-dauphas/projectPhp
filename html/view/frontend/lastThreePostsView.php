<?php $title = 'Last Three Posts'; ?>

<?php ob_start(); ?>

    <h1>Liste de tous les Posts</h1>

    <?php foreach ($posts as $post):?>
        <h3>
            <?= $post->getTitle(); ?>
        </h3>

        <div class="creationDateFr">
            <p>Le <?= $post->getCreationDateFr(); ?> </p>
        </div>

        <div class="content">
            <p><?= $post->getResumeContent() . "..."; ?></p>
        </div>

        <p>
            <em><a href="index.php?action=post&amp;id=<?= $post->getId(); ?>">Commentaires...</a></em>
        </p>


        <input class="btn btn-warning buttonCenter" type="button" value="Modifier" onclick="javascript:location.href='index.php?action=updatePost&postId=<?= $post->getId(); ?>'">

        -

        <?php if($_SESSION['admin']): ?>
            <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deletePost&id=<?= $post->getId(); ?>'">
        <?php endif; ?>

        <hr>
    <?php endforeach; ?>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
