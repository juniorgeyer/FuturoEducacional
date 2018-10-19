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


$sql = "DELETE FROM criterios_usuarios WHERE id_usuario = '$parametro'";

if ($conexao->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
      
      
?>