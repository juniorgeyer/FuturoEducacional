<?php 
 
session_start();
include('connect.php');

  $login = mysqli_real_escape_string($conexao, $_POST['login']);
  $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
  $nome =  mysqli_real_escape_string($conexao, $_POST['nome']);
  $categoria = "Administrador";
  
 
       $query = "INSERT INTO usuarios(login,senha,nome,categoria) VALUES ('$login','$senha','$nome','$categoria')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='formProf.php'</script>";
        }
      
    
?>