<?php
require_once('model/Article.php');

$article_1 = new Article();
$article;

$article_1->setId(25);
$article_1->setTitle("<strong>blabla</strong>");

echo $article_1->getId();
echo $article_1->getTitle();


var_dump($article_1);
var_dump($row['id']);
var_dump($posts);



?>
<div class="news">
    <h3>
        <?= $post->getId($row['id']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($posts['content'])) ?>
    </p>
</div>
