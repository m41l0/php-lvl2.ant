<?php

//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
    protected $title;		// заголовок страницы
    protected $content;		// содержание страницы

    //
    // Конструктор.
    //
    public function __construct()
    {
    }

    protected function before()
    {
        $this->title = 'Блог';
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