<?php
include_once('inc/model.php');
include_once('inc/view.php');

// Обработка отправки формы.
if (!empty($_POST))
{
	$text = $_POST['text'];
	text_set($text);
	header('Location: index.php');
	die();
}

// Информация для отображения.
$title = 'Название сайта::Редактирование';
$text = text_get();

// Внутренний шаблон.
$content = view_include(
	'theme/v_edit.php', 
	array('text' => $text));

// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;
