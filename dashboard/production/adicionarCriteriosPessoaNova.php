<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

$tabela_usuarios = "SELECT * FROM criterio ";

$resul = mysqli_query($conexao, $tabela_usuarios);
$regs = mysqli_num_rows($resul);
      echo $regs
    
?>