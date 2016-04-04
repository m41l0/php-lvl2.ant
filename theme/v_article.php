<article>
    <h3><?= $article->title ?></h3>
    <em>Опубликовано: <?= $article->date ?> | Просмотров: <?= ++$article->views ?></em>
    <p><?= $article->content ?></p>
    <a href="edit.php?ctrl=Page&act=edit&id=<?= $article->id_article ?>">Редактировать</a> |
    <a href="delete.php?ctrl=Page&act=delete&id=<?= $article->id_article ?>">Удалить</a>
</article>