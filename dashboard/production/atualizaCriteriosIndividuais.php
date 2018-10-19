<?php
include('connect.php');
mysqli_set_charset($conexao, "utf8");

define('SERVER', '127.0.0.1');
define('USER', 'admin');
define('PASSWORD','admin');
define('DBNAME', 'futuro');

// Recebe os parâmetros enviados via GET
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';
$adicionarId = (isset($_GET['adicionarId'])) ? $_GET['adicionarId'] : '';
$adicionarValor = (isset($_GET['adicionarValor'])) ? $_GET['adicionarValor'] : '';


// Configura uma conexão com o banco de dados
      
       $query = "INSERT INTO criterios_usuarios(id_usuario,id_criterio,valor_criterio_usuario) VALUES ('$parametro','$adicionarId','$adicionarValor')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
        }else{
        }
      
?>