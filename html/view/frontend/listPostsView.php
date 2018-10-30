<?php

$title = 'Acceuil - Mon blog'; ?>

<?php ob_start();  ?>
<nav>
 <a href="index.php?action=registration">Inscription</a>

<?php
if (isset($_SESSION) == true) {?>
  <a href="index.php?action=deconnection">Deconnection</a>
<?php }
 ?>
<form action="index.php?action=connection" method="post">
  <label>Pseudonyme</label> :<br /><input type="text" name="pseudonyme" size="15" />
  <br />
  <label>Mot de passe</label> :<br /><input type="password" name="passConnection" size="15" />
  </br>
  <input id="validateButton" type="submit" />
</form>

</nav>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
