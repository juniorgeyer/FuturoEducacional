<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $nome_segmentos = mysqli_real_escape_string($conexao, $_POST['nome_segmento']);
  
  
 $query_select = "SELECT nome_segmentos FROM segmentos WHERE nome_segmentos = '$nome_segmentos'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['nome_segmentos'];
      if($logarray == $nome_segmentos){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse segmento já existe');window.location.href='addSegmentos.php';</script>";
        die();
 
      }else{
       $query = "INSERT INTO segmentos(nome_segmentos) VALUES ('$nome_segmentos')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Segmento cadastrado com sucesso!');window.location.href='addSegmentos.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse segmento');window.location.href='addSegmentos.php'</script>";
        }
      }
    
?>