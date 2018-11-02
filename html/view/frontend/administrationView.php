<?php $title = 'Administration - Moon Blog';

session_start();
?>


<?php ob_start();  ?>


<p><a href="index.php">Retour à la liste des billets</a></p>

<?php if (!empty($_SESSION)){ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->


  <h1>Page d'Administration</h1>
  <a href="index.php?action=addPost">Ajouter un Post</a>
  <h3>Dernier Post</h3>



  <?php
  while ($data = $postAdmin->fetch()){
  ?>
      <div class="news">

          <h3>
              <?= htmlspecialchars($data['title']) ?>
              <em>le <?= $data['creation_date_fr'] ?></em>
          </h3>

          <p>
              <?= substr(nl2br(htmlspecialchars($data['content'])),0,250) . "..." ?>
              <br />
              <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
          </p>
      </div>
      <a href="index.php?action=modifPost&id=<?= $data['id']?>">Lien qui renvoie vers une nouvelle page pour MODIFIER ce chapitre non fonctionnel pour le moment</a><br/>
      <a href="index.php?action=deletePost&id=<?= $data['id']?>">Lien qui SUPPRIME ce chapitre non fonctionnel pour le moment</a><br/>

  <?php
  }
  ?>



  <h3>Derniers Commentaires du Blog</h3>

  <?php
  while ($comment = $commentsAdmin->fetch()){
  ?>
      <p>Commentaire sur le Chapitre : <strong><?= htmlspecialchars($comment['post_id']) ?></strong> <br />
        Auteur : <strong><?= htmlspecialchars(ucfirst($comment['author'])) ?></strong> <br />
        Le <?= $comment['comment_date_fr'] ?></p>
      <p><?= nl2br(ucfirst(strip_tags($comment['comment']))) ?></p>
      <a href="#">Lien pour supprimer un commentaires non fonctionnel pour le moment</a>
      <br/>

      ------
  <?php
  }
} else {
  echo "vous n'etes pas connecté";
}
  ?>




<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
