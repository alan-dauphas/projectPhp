<?php $title = "Inscription" ?>
<?php

ob_start(); ?>

<h1>Inscription <br /> Sur <br /> Mon Super Blog</h1>


<form action="index.html?action=registration&amp;confirmation=confirm" method="POST">

  <div>
    <label for="name">Nom :</label>
    <input type="varchar" name="name" id="name" required="required">
  </div>

  <div>
    <label for="pseudo">Pseudo :</label>
    <input type="varchar" name="pseudo" id="pseudo" required="required">
  </div>

  <div>
    <label for="mail">Mail :</label>
    <input type="mail" name="mail" id="mail" required="required">
  </div>

  <div>
    <label for="pass">Mot de passe :</label>
    <input type="password" name="pass" id="pass" >
  </div>

  <input type="submit" name="" value="Confirmation">

</form>


<?php $content = ob_get_clean(); ?>
<?php require('/view/frontend/template.php'); ?>
