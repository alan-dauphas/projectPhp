<?php $title = "Page Erreur"; ?>

<?php ob_start(); ?>

    <div style="text-align:center">
        <img src="public/picture/error.jpg" alt="image d'erreur">
    </div>

    <h2 align="center"><?= $errorMessage ?></h2>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
