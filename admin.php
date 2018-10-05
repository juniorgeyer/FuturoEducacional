<?php
session_start();
include('verifica_login.php');
?>

<h2><?php echo $_SESSION['categoria'], $_SESSION['id'], $_SESSION['login'];?></h2><br>

<h2> <a href="logout.php">Sair </a></h2>

