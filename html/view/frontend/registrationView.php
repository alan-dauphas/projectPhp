<?php $title = "Inscription" ; ?>

<?php ob_start(); ?>
    <h1>Inscription</h1>

    <hr>

    <div class="col-md-4 col-md-offset-4 text-left">
        <form action="index.php?action=registration&amp;confirmation=confirm" method="post">
            <div class="formInscription">
                <label for="name">Nom :</label><input type="varchar" name="name" id="name" required="required"><br />
            </div>

            <div class="formInscription">
                <label for="pseudo">Pseudo :</label><input type="varchar" name="pseudo" id="pseudo" required="required"><br />
            </div>

            <div class="formInscription">
                <label for="email">Mail :</label><input type="email" name="email" id="email" required="required"><br />
            </div>

            <div class="formInscription">
                <label for="pass">Mot de passe :</label><input type="password" name="pass" id="pass" required="required"><br />
            </div>

            <div class="formInscription">
                <label for="pass_confirm">Confirmer mot de passe :</label><input type="password" name="pass_confirm" id="pass_confirm" required="required"><br />
            </div>


            <div class="formInscription">
                <input type="submit" value="Confirmation">
            </div>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
