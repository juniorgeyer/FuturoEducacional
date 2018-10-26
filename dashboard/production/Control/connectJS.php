<?php
// começar ou retomar uma sessão
define('HOST', '127.0.0.1');
define('USUARIO', 'admin');
define('SENHA','admin');
define('DB', 'futuro');

$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=".HOST."; dbname=".DB, USUARIO, SENHA, $opcoes);