<a class="left" href="./index.php?action=add"><button>Добавить статью</button></a>
<?php foreach ($articles as $article): ?>
<article>
    <h3><a href="./index.php?action=read&id=<?= $article['id_article'] ?>"><?= $article['title'] ?></a></h3>
    <em>Опубликовано: <?= $article['date'] ?> | Просмотров: <?= $article['views'] ?></em>
    <br>
    <p><?= article_intro($article['content'], 30); ?></p>
    <a href="./index.php?action=read&id=<?= $article['id_article'] ?>">Читать статью</a> |
    <a href="./index.php?action=edit&id=<?= $article['id_article'] ?>">Редактировать статью</a> |
    <a href="./index.php?action=delete&id=<?= $article['id_article'] ?>">Удалить статью</a>
</article>
<?php endforeach; ?>
<br>
