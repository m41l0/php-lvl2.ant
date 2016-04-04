<?php
/**
 * Шаблон главной страницы
 * =======================
 */

foreach ($articles as $article): ?>
    <article>
        <h3><a href="./index.php?ctrl=Page&act=article&id=<?= $article->id_article ?>"><?= $article->title ?></a></h3>
        <em>Опубликовано: <?= $article->date ?> | Просмотров: <?= $article->views ?></em>
        <br>
    </article>
<?php endforeach; ?>