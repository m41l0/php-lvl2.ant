<?php
//
// Конттроллер страницы чтения.
//

class C_Page extends C_Base
{
    //
    // Конструктор.
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function action_index()
    {
        $this->title .= '::Чтение';
        $articles = M_Articles::getAll();
        $this->content = $this->template('theme/v_index.php', array('articles' => $articles));
    }

    public function action_article()
    {
        $this->title .= '::Статья';
        if ($this->IsGet()) {
            $id = $_GET['id'];
            $article = M_Articles::getOne($id);
            $this->content = $this->template('theme/v_article.php', array('article' => $article));
        }
    }

    public function action_add()
    {
        $this->title .= '::Добавление';

        // Обработка отправки формы.
        if ($this->IsPost()) {
            if (M_Articles::articleAdd($_POST['title'], $_POST['content'])) {
                header('Location: index.php');
                die();
            }

            $titl = $_POST['title'];
            $content = $_POST['content'];
            $error = true;
        } else {
            $titl = '';
            $content = '';
            $error = false;
        }

        // Кодировка
        header('Content-type: text/html; charset=utf-8');

        $this->content = $this->template('theme/v_add.php', array('error' => $error, 'titl' => $titl, 'content' => $content));
    }

    public function action_edit()
    {
        $this->title .= '::Редактирование';

        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
            $article = M_Articles::getOne($id);
            if (!empty($_POST)) {
                $title = $_POST['title'];
                $content = $_POST['content'];

                M_Articles::articleEdit($id, $title, $content);
                header('Location: index.php');
            }
        } else header('Location: index.php');

        $this->content = $this->template('theme/v_edit.php', array('article' => $article));
    }

    public function action_delete()
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
            M_Articles::articleDelete($id);
            header('Location: index.php');
        } else echo 'Упс! Какая-то ошибка!';
    }
}