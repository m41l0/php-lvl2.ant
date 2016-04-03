<?php
/**
 * Шаблон главной страницы
 * =======================
 * $text - текст
 */
//?>
<!---->
<?//=nl2br($text)?>



<?php foreach ($articles as $article): ?>
    <article>
        <h3><?= $article->title ?></h3>
        <em>Опубликовано: <?= $article->date ?> | Просмотров: <?= $article->views ?></em>
        <br>
    </article>
<?php endforeach; ?>