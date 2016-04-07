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
            $comments = M_Comments::getAll($id);
            $this->comments = $this->template('theme/v_comments.php', array('comments' => $comments));
            $this->content = $this->template('theme/v_article.php', array('article' => $article, 'commentsBlock' => $this->comments));
            M_Articles::counter($id);
        }

        // Обработка отправки формы.
        if ($this->IsPost()) {
            if (M_Comments::addComment($_GET['id'], $_POST['autor'], $_POST['text'])) {
                header('Location: index.php');
                die();
            }

//            $titl = $_POST['title'];
//            $content = $_POST['content'];
//            $error = true;
        } else {
//            $titl = '';
//            $content = '';
//            $error = false;
        }

    }

    // Интро статьи
    public static function articleIntro($content, $max_words = 10)
    {
        $words = explode(' ', $content);

        if (count($words) > $max_words && $max_words > 0) {
            $content = implode(' ', array_slice($words, 0, $max_words)) . '...';
        }

        return $content;
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