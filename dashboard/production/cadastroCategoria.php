<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $nome_categoria = mysqli_real_escape_string($conexao, $_POST['nome_categoria']);
  
  
 $query_select = "SELECT nome_categoria FROM categoria WHERE nome_categoria = '$nome_categoria'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['nome_categoria'];
      if($logarray == $nome_categoria){
 
        echo"<script language='javascript' type='text/javascript'>alert('Essa categoria já existe');window.location.href='addcategoria.php';</script>";
        die();
 
      }else{
       $query = "INSERT INTO categoria(nome_categoria) VALUES ('$nome_categoria')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Categoria cadastrada com sucesso!');window.location.href='addcategoria.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='addcategoria.php'</script>";
        }
      }
    
?>