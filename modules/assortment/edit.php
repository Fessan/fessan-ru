<?php
Core::$META['title'] = 'Редактирование Товара';


if(isset($_POST['add'], $_POST['title'],$_POST['code'],$_POST['nal'],$_POST['cat'],$_POST['price'],$_POST['description'],$_POST['text'])){

	$errors = [];
	if(empty($_POST['title'])){
		$errors['title']          = 'Вы не заполнили название';
	}if(empty($_POST['code'])){
		$errors['code']           = 'Вы не заполнили код товара';
	}if(empty($_POST['price']) ){
		$errors['price']          = 'Вы не заполнили цену товара';
	}if(empty($_POST['description'])){
		$errors['description']    = 'Вы не заполнили описание';
	}if(empty($_POST['text'])){
		$errors['text']           = 'Вы не заполнили описание';
	}
	foreach($_POST as $k =>$v){
		$_POST[$k] = trim($v);
	}

	if(!count($errors)) {
		q( "
	 UPDATE `assortment` SET 
	 	`title`	      = '".es( $_POST['title'])."',
	 	`code` 	      = '".es($_POST['code'])."',
	    `nal`         = '".es( $_POST['nal'])."',
	    `cat`         = '".es( $_POST['cat'])."',
	    `price`       = '".es( $_POST['price'])."',
	    `description` = '".es( $_POST['description'])."',
	    `text`        = '".es($_POST['text'])."'
		WHERE `id`    = ".(int)$_GET['key1']."
  		LIMIT 1
	 ") ;

		$_SESSION['info'] = 'Запись была добавлена';
		header('Location:/assortment');
		exit();
	}
	DB::close();
}

$assortment = q("
	SELECT *
	FROM `assortment`
	WHERE `id` = ".(int)$_GET['key1']."
  	LIMIT 1
") ;
DB::close();
if(!$assortment->num_rows){

	$_SESSION['info'] = 'Данного товара не существует!';
	header('Location: /assortment');
	exit();

}

$row = $assortment->fetch_assoc();


