<?php
//
// Конттроллер страницы чтения.
//
include_once('inc/model.php');
include_once('inc/C_Base.php');

class C_Page extends C_Base
{
	//
	// Конструктор.
	//
	function __construct(){		
		parent::__construct();
	}
	
	public function action_index(){
		$this->title .= '::Чтение';
		$text = text_get();
		$this->content = $this->Template('theme/v_index.php', array('text' => $text));	
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
		$this->content = $this->Template('theme/v_edit.php', array('text' => $text));		
	}
}
