<?php
/**
 * Шаблон главной страницы
 * =======================
 */

foreach ($articles as $article): ?>
    <article>
        <h3><a href="./article.php?ctrl=Page&id=<?= $article->id_article ?>"><?= $article->title ?></a></h3>
        <em>Опубликовано: <?= $article->date ?> | Просмотров: <?= $article->views ?></em>
        <br>
    </article>
<?php endforeach; ?>