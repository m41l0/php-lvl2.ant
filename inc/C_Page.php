<?php
//
// Конттроллер страницы чтения.
//
include_once __DIR__ . '/../models/Articles.php';
include_once __DIR__ . '/C_Base.php';

class C_Page extends C_Base
{
    //
    // Конструктор.
    //
    public function __construct(){
        parent::__construct();
    }

    public function action_index(){
        $this->title .= '::Чтение';
        $articles = Articles::getAll();
//        var_dump($articles);die;
        $this->content = $this->template('theme/v_index.php', array('articles' => $articles));
    }

    public function action_edit(){
        $this->title .= '::Редактирование';

        if($this->isPost())
        {
            text_set($_POST['text']);
            header('location: index.php');
            exit();
        }

        $text = text_get();
        $this->content = $this->template('theme/v_edit.php', array('text' => $text));
    }
}
