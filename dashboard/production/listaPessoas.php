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

if($acao == 'autocomplete'):
  $sql = "SELECT * FROM cr WHERE categoria LIKE '%$parametro%'";

  $stm = $conexao->prepare($sql);
//  $stm->bindValue(1, '%'.$parametro.'%');
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);
  $json = json_encode($dados);
  echo $json;
endif;

if($acao == 'consulta'):
  $sql = "SELECT * FROM criterio";

  $stm = $conexao->prepare($sql);
  //$stm->bindValue(1, $parametro.'%');
  $stm->execute();
  $dados = $stm->fetchAll(PDO::FETCH_OBJ);
  $json = json_encode($dados);
  echo $json;
endif;

?>