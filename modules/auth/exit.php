<?php
if((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['email']) && !empty($_POST['email']))){
	$login = $_POST['login'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	setcookie('login', $login, time() - 3600 * 24 *
	30, '/');
	setcookie('password', $password, time() - 3600
	* 24 * 30, '/');
	setcookie('email', $email, time() - 3600 * 24 *
	30, '/');


}else $login = 'Гость';