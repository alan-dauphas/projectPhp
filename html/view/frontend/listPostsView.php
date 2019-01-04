<?php $title = 'Acceuil - Mon blog'; ?>

<?php ob_start(); ?>

    <h1>Mon super blog !</h1>

    <h2>Derniers billets du blog :</h2>

    <div class="news">
        <?php foreach ($posts as $post):?>

            <h3> <?= $post->getTitle(); ?> </h3>

            <div class="creationDateFr">
                <p>Le <?= $post->getCreationDateFr(); ?> </p>
            </div>

            <div class="content">
                <a class="no_underline" href="index.php?action=post&id=<?= $post->getId();?>" >
                    <p><?= $post->getResumeContent() . "..."; ?></p>
                </a>
            </div>

            <div class="text-center">
                <a href="index.php?action=post&id=<?= $post->getId();?>">Voir plus...</a>
            </div>

            <hr>

        <?php endforeach; ?>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
