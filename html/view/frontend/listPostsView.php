<?php
  $title = 'Acceuil - Mon blog';
  session_start();
?>

<?php
  ob_start();
?>

<h1>Mon super blog !</h1>
<h2>Derniers billets du blog :</h2>
<div class="news">

    <?php foreach ($posts as $post):?>
        <h3>
            <?= $post->getTitle(); ?>
        </h3>
    <p>
        <?= $post->getCreationDateFr(); ?>
    </p>

    <p>
        <?= $post->getContent(); ?>
    </p>

    <div class="text-center">

    <a href="index.php?action=post&id=<?= $post->getId();?>">Lien</a>
  </div>
      <?php endforeach; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
