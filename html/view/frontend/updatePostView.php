<?php $title = htmlspecialchars($post->getTitle()); ?>

<?php ob_start(); ?>

<?php if($_SESSION['admin']): ?>

<h1>Vu actuel du post</h1>

<div class="news">
  <h3> <?= $post->getTitle(); ?> </h3>

  <div class="creationDateFr">
    <p>Le <?= $post->getCreationDateFr(); ?> </p>
  </div>

    <div class="content">
      <p>
        <?= $post->getContent() ?>
      </p>
    </div>
</div>

<hr>

<h1>Modifier le post</h1>

<div class="container">
  <div class="row">
    <div class="col-md-offset-1 col-md-10 parent-text" style="text-align : center;">
      <div id="child-text">
        <form action="index.php?action=updatePost&postId=<?= $_GET['postId']; ?>&modification=confirm" method="post">

          <label>Titre :</label><textarea class="textareaTitle" name="title"><?= $post->getTitle() ?></textarea><br/>

          <label>Contenu :</label><textarea id="mytextarea" name="content"><?= $post->getContent() ?></textarea>

          <input type="submit" value="valider">

        </form>
      </div>
    </div>
  </div>
</div>

<?php else: echo "accés refusé" ?>

<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
