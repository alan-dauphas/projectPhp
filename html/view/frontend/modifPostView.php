<?php $title = htmlspecialchars($post->getTitle());

session_start();

ob_start(); ?>


<!-- <h1>Vu actuel du post</h1>

<div class="news">
    <h3>
        <?= $post->getTitle() ?>
        <em>le <?= $post->getCreationDateFr(); ?></em>
    </h3>

    <p>
        <?= $post->getContent() ?>
    </p>
</div>
 -->

<h1>Modifier le post</h1>

<div class="container">
  <div class="row">
    <div class="col-md-12 parent-text" style="text-align : center;">
      <div id="child-text">
        <form action="index.php?action=modifPost&postId=<?= $_GET['postId']; ?>&modification=confirm" method="post">

          <label>Titre :</label><textarea class="textareaTitle" name="title"><?= $post->getTitle() ?></textarea>

          <label>Contenu :</label><textarea id="mytextarea" name="content"><?= $post->getContent() ?></textarea>

          <input type="submit" value="valider">

        </form>
      </div>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
