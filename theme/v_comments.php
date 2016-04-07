<?php foreach ($comments as $comment): ?>
    <div class="comment">
        <small>Автор: <?= $comment->autor ?> | Дата: <?= $comment->date ?> </small>
        <p><?= $comment->text ?></p>
    </div>
<?php endforeach;?>
<div>
    <form method="post">
        Ваше имя:
        <br>
        <input type="text" name="autor" size="70" required>
        <br>
        <br>
        Комментарий:
        <br>
        <textarea name="text" cols="80" rows="8" required></textarea>
        <br>
        <input type="submit" value="Добавить комментарий">
    </form>
</div>