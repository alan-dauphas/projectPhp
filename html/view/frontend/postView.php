<?php $title = $post->getTitle();
var_dump($post->getId());
session_start();
?>

	<?php ob_start(); ?>

		<h1>Mon super blog !</h1>

		<div class="news">
      	<h3>
      	<?= $post->getTitle(); ?>
      		<em>le <?= $post->getCreationDateFr(); ?></em>
      	</h3>

      			<p>
      			<?= $post->getContent() ?>
      			</p>
		</div>


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


												-----
            <div class="row">
							<div class="col-md-offset-2 col-md-8" >
							   <form action="index.php?action=addComment&amp;id=<?= $_GET['id']; ?>" method="post">

										<label for="author">Auteur</label><br />
											<input type="varchar" id="author" name="author" value="<?php if($_SESSION){echo $_SESSION['pseudo'];} ?>"/><br />

										<label for="comment">Commentaire</label><br />
											<textarea type="text" id="comment" name="comment"></textarea>

										<input type="submit" value="Confirmer" />
								</form>
							</div>
						</div>

<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
