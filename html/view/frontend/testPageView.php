<a href="index.php">ACCEUIL</a>

<div class="news">

      <?php foreach ($posts as $post):?>
    <h3>
        <em> le <?= $post->getTitle(); ?></em>
    </h3>
    <p>
        <?= $post->getCreationDateFr(); ?>
    </p>

    <p>
        <?= $post->getContent(); ?>
    </p>


    <a href="index.php?action=post&id=<?= $post->getId();?>">Lien</a>
      <?php endforeach; ?>
</div>
