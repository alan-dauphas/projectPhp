<?php $title = $post->getTitle();

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
									<a href='index.php?action=reporting&id=<?= $comment->getId();?>'>Signaler</a>
									<?php endif; ?>

										<?php endforeach; ?>
										<p>

												-----

	   <form action="index.php?action=addComment&amp;id=<?= $_GET['id']; ?>" method="post">

				<label for="author">Auteur</label><br />
					<input type="varchar" id="author" name="author" value="<?php if($_SESSION){echo $_SESSION['pseudo'];} ?>"/><br />

				<label for="comment">Commentaire</label><br />
					<textarea type="text" id="comment" name="comment"></textarea>

					<input type="submit" value="Confirmer" />

		</form>
</p>
<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
