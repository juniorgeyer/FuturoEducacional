<?php
// começar ou retomar uma sessão
define('HOST', '127.0.0.1');
define('USUARIO', 'admin');
define('SENHA','admin');
define('DB', 'futuro');

$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) or die('Nao foi possivel conectar');