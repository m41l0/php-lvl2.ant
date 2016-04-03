<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
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
		<a href="index.php">Читать текст</a> |
		<a href="edit.php">Редактировать текст</a>
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