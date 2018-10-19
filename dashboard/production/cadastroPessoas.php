<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $login = mysqli_real_escape_string($conexao, $_POST['login']);
  $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
  $nome =  mysqli_real_escape_string($conexao, $_POST['nome']);
  $nome_categoria =  mysqli_real_escape_string($conexao, $_POST['nome_categoria']);
  $meta_individual =  mysqli_real_escape_string($conexao, $_POST['meta_individual']);
  
      
      $query_select = "SELECT login FROM usuarios WHERE login = '$login'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['login'];
      if($logarray == $login){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='addPessoas.php';</script>";
        die();
 
      }else{

       $query = "INSERT INTO usuarios(login,senha,nome,categoria,meta_individual) VALUES ('$login','$senha','$nome','$nome_categoria', '$meta_individual')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
         // echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='addPessoas.php'</script>";
        }else{
          //echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='addPessoas.php'</script>";
        }
      


          $query_select = "SELECT * FROM criterio";
          $select = mysqli_query($conexao,$query_select);
          $array = mysqli_fetch_array($select);
          $logarray = $array['id'];
          for($i = 0; $i < sizeof($logarray); ++$i)
              echo "af";
               echo"<script language='javascript' type='text/javascript'>alert('Numero de criterios!');</script>";
      }
      
    
?>