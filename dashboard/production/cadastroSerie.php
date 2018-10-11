<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $nome_serie = mysqli_real_escape_string($conexao, $_POST['nome_serie']);
  $nome_segmentos = mysqli_real_escape_string($conexao, $_POST['nome_segmentos']);
  $nome_turma = mysqli_real_escape_string($conexao, $_POST['nome_turma']);

 $query_select = "SELECT nome_serie FROM serie WHERE nome_serie = '$nome_serie'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['nome_serie'];
      if($logarray == $nome_serie){
 
        echo"<script language='javascript' type='text/javascript'>alert('Essa série já existe');window.location.href='addSerie.php';</script>";
        die();
 
      }else{
       $query = "INSERT INTO serie(nome_serie,segmento_serie,nome_turma) VALUES ('$nome_serie', '$nome_segmentos', '$nome_turma')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Série cadastrada com sucesso!');window.location.href='addSerie.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa série');window.location.href='addSerie.php'</script>";
        }
      }
    
?>