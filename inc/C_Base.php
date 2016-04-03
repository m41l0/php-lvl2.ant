<?php

include_once __DIR__ . '/Controller.php';

//
// Базовый контроллер сайта.
//
abstract class C_Base extends Controller
{
    protected $title;		// заголовок страницы
    protected $content;		// содержание страницы

    //
    // Конструктор.
    //
    public function __construct()
    {
        $this->title = 'Название сайта';
        $this->content = '';
    }

    //
    // Генерация базового шаблонаы
    //	
    public function render()
    {
        $vars = array('title' => $this->title, 'content' => $this->content);
        $page = $this->template('theme/v_main.php', $vars);
        echo $page;
    }
}