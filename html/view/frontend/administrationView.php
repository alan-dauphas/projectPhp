<?php $title = 'Administration - Mon Blog'; ?>

<?php ob_start(); ?>

    <?php if (!empty($_SESSION) && ($_SESSION['admin'] || $_SESSION['admin'] == 0)):?>

        <h1>Bienvenu sur la Page d'Administration</h1>

        <div class="col-md-12 alignMenu">
            <ul class="col-sm-12">
                <li class="col-sm-12">
                    <a href="index.php?action=lastThreePosts">Voir les 3 Derniers Posts.</a>
                </li>
                <li class="col-sm-12">
                    <a href="index.php?action=allPosts">Voir tous les Posts.</a>
                </li>
                <li class="col-sm-12">
                    <a href="index.php?action=allCommentsSignaled">Voir les Commentaires Signaler.</a>
                </li>
                <li class="col-sm-12">
                    <a href="index.php?action=allComments">Voir tous les commentaires.</a>
                </li>
            </ul>
        </div>

        <?php if ($_SESSION['admin']): ?>
            <input class="buttonCenter" type="button" value="Ajouter un Post" onclick="javascript:location.href='index.php?action=addPost'">
        <?php endif; ?>

    <?php endif ; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
