
<?php $title = 'Administration - Moon Blog';

session_start();
?>


<?php ob_start();  ?>



<?php if (!empty($_SESSION)){ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->


  <h1>Bienvenu sur la Page d'Administration</h1>
  <input class="buttonCenter" type="button" value="Ajouter un Post" onclick="javascript:location.href='index.php?action=addPost'">

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
              <em><a href="index.php?action=post&amp;postId=<?= $data['id'] ?>">Commentaires...</a></em>
          </p>
      </div>


      <input class="btn btn-warning buttonCenter" type="button" value="Modifier" onclick="javascript:location.href='index.php?action=modifPost&postId=<?= $data['id']?>'"> -
      <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deletePost&id=<?= $data['id']?>'">

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
            <input class="btn btn-danger buttonCenter" type="button" value="Supprimer" onclick="javascript:location.href='index.php?action=deleteComm&id=<?= $comment['id']?>'">

      ------
  <?php
  }
}
else {
  echo "vous n'etes pas connecté";
}
  ?>




<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
