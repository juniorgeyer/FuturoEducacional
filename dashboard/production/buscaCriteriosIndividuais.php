<?php

define('SERVER', '127.0.0.1');
define('USER', 'admin');
define('PASSWORD','admin');
define('DBNAME', 'futuro');

// Recebe os parâmetros enviados via GET
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';


// Configura uma conexão com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=".SERVER."; dbname=".DBNAME, USER, PASSWORD, $opcoes);


if($acao == 'consulta'):
  $sql = "SELECT * FROM criterios_usuarios WHERE id_usuario='$parametro'";

	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;
endif;

?>