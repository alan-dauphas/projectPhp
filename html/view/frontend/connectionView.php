<?php $title = "Inscription" ;

ob_start(); ?>

<label>Pseudonyme</label> :<br />
<input type="text" name="pseudo" size="15" />
<br />
<label>Mot de passe</label> :<br />
<input type="password" name="pass" size="15" /></br>
<input id="validateButton" type ="submit" />

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
require('controller/frontend.php');
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
