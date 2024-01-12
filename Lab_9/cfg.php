<?php

// plik cfg.php zawierający zmienne wykorzystywane do łączenia się z bazą danych,
// wysyłania maila (PHPMailer) oraz logowania do panelu admina

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'moja_strona';

$login = 'mulffy';
$pass = '123';

$config = array(
	'smtp_host' => 'smtp.gmail.com',
	'smtp_auth' => true,
	'smtp_username' => 'mulffyp@gmail.com',
	'smtp_password' => 'aphy mcyw ckev zcsb',
	'smtp_secure' => 'tls',
	'smtp_port' => 587,
);

$link = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$link) echo '<b>przerwane połączenie </b>';
if (!mysqli_select_db($link, $baza)) echo 'nie wybrano bazy';
