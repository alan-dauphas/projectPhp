<?php
$title = "Page Erreur";

ob_start();
?>

<h1>L'erreur est :</h1>
<p><?= $errorMessage ?></p>

<?php
$content = ob_get_clean();

require('/view/frontend/template.php');
?>
