<!-- Affichage -->


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>


        <?php
        while ($data = $req->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']); ?>
                <em>le <?= $data['date_creation_fr']; ?></em>
            </h3>

            <p>
            <?php
            echo nl2br(htmlspecialchars($data['content']));
            ?>
            <br />
            <em><a href="#">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>
