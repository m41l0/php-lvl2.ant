<?php
/**
 * Основной шаблон
 * ===============
 */
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="inner">
	<div id="header">
		<h1><?= $title ?></h1>
	</div>

	<div id="menu">
		<a href="index.php">Статьи</a> |
		<a href="index.php?act=add">Добавить статью</a>
	</div>

	<div id="content">
		<?= $content ?>
	</div>

	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
</div>
</body>
</html>