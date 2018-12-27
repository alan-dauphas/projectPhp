<?php $title = htmlspecialchars($post->getTitle()); ?>

<?php ob_start(); ?>

<?php if(isset($_SESSION) && ($_SESSION['admin'] || $_SESSION['admin'] == 0)): ?>

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
    <div class="col-md-offset-1 col-md-10" style="text-align : center;">
      <div id="child-text">
        <form action="index.php?action=updatePost&postId=<?= $_GET['postId']; ?>&modification=confirm" method="post">

          <textarea class="textareaTitle" name="title"><?= $post->getTitle() ?></textarea><br/>

          <textarea id="mytextarea" name="content"><?= $post->getContent() ?></textarea>

          <input type="submit" value="valider">

        </form>
      </div>
    </div>
  </div>
</div>


<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
