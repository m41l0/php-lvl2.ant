<?php

class Some
{
	public $name;
	
	public function __construct($name){
		$this->name = $name;
	}
	
	public function view(){
		echo "<h1>$this->name</h1>";
	}
	
	public function __get($name){
		return null;
	}
	
	public function __set($name, $value){
		$this->$name = $value;
	}
	
	public function __call($name, $params){
		die("У этого класса нет метода $name, принимающего параметры $params");
	}
}

$some = new Some('aaa');
$some->name = 'bbb';
$some->view();

echo $some->a; // обращение к свойству, которого нет
$some->b = 'ccc'; // установка свойства, которого нет

$some->what(); // обращение к методу, которого нет
