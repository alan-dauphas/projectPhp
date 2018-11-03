<?php $title = htmlspecialchars($post['title']);

session_start();

ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<h1>Vu actuel du post</h1>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>



<h1>Modifier le post</h1>
<form action="index.php?action=modifPost&postId=<?= $post['id'] ?>&modification=confirm" method="post">

  <div>
    <label>Titre :</label><textarea name="title"><?= htmlspecialchars($post['title']) ?></textarea>
  </div>
  <div>
    <label>Contenu :</label><textarea name="content"><?= nl2br(htmlspecialchars($post['content'])) ?></textarea>
  </div>

  <input type="submit" value="valider">

</form>

<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
