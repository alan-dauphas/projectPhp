<?php $title = $post->getTitle(); ?>

<?php ob_start(); ?>

	<h1>Mon super blog !</h1>

	<div class="news">
    	<h3>
    	<?= $post->getTitle(); ?>
		</h3>
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

	<h2>Commentaires</h2>

	<?php foreach ($comments as $comment):?>

			<p><strong><?= $comment->getAuthor(); ?></strong> le <?= $comment->getCommentDateFr(); ?></p>
			<p><?= $comment->getComment(); ?></p>
			<?php if($comment->isSignaled()): ?>
				<p>Commentaire signaler</p>
			<?php else:  ?>
					<a href="index.php?action=reporting&id=<?= $post->getId() . '&comment_id=' . $comment->getId()?>">Signaler</a>
			<?php endif; ?>

	<?php endforeach; ?>

<hr>


    <div class="row">
			<div class="col-md-offset-2 col-md-8 jumbotron" >
			   <form action="index.php?action=addComment&amp;id=<?= $_GET['id']; ?>" method="post">

						<label for="author">Auteur</label>
							<input type="varchar" class="text-center" id="author" name="author" value="<?php if($_SESSION){echo $_SESSION['pseudo'];} ?>"/><br />

							<hr>

						<label for="comment">Commentaire</label>
							<textarea type="text" cols="70" rows="5" class="comment" name="comment"></textarea>
							<br />

						<input type="submit" value="Confirmer" />
				</form>
			</div>
		</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
