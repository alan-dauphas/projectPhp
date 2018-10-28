<?php $title = "Inscription"; ?>

<?php ob_start(); ?>

<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

<label>Pseudonyme</label> :<br />
<input type="text" name="pseudo" size="15" />
<br />
<label>Mot de passe</label> :<br />
<input type="password" name="pass" size="15" /></br>
<input id="validateButton" type ="submit" />

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php $content = ob_get_clean(); ?>

<?php require('/view/frontend/template.php'); ?>
