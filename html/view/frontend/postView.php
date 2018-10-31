<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des billets</a></p>

<h1>Mon super blog !</h1>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="varchar" id="author" name="author"/>
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea type="text" id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Confirmer" />
    </div>
</form>


<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars(ucfirst($comment['author'])) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(ucfirst(strip_tags($comment['comment']))) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
