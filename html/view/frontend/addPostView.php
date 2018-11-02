<?php $title = "New Post";
session_start();

ob_start();
?>

<p><a href="index.php">Retour à la liste des billets</a></p>


<?php if (!empty($_SESSION)){ ?> <!-- Si une session est ouvert, alors cela affiche le lien de déconnexion -->

<p>Bienvenu <?= $_SESSION['pseudo'];?></p>

<h1>Ajouter un Post</h1>
<form action="index.php?action=addPost&newPost=confirm" method="post">

  <div>
    <label>Titre :</label><input type="text" name="title" placeholder="Titre du Post"></input>
  </div>
  <div>
    <label>Contenu :</label><textarea name="content" placeholder="Contenu du Post"></textarea>
  </div>

  <input type="submit" value="valider">

</form>

<?php }
else {
  echo "Vous n'etes pas connecté";
} ?>


<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
