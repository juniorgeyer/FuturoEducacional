<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $nome_criterios = mysqli_real_escape_string($conexao, $_POST['nome_criterios']);
  $valor_criterios = mysqli_real_escape_string($conexao, $_POST['valor_criterios']);
  
 $query_select = "SELECT nome_criterios FROM criterio WHERE nome_criterios = '$nome_criterios'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['nome_criterios'];
      if($logarray == $nome_criterios){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse critério já existe');window.location.href='addCriterios.php';</script>";
        die();
 
      }else{
       $query = "INSERT INTO criterio(nome_criterios, valor_criterios) VALUES ('$nome_criterios','$valor_criterios')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Critério cadastrado com sucesso!');window.location.href='addCriterios.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse critério');window.location.href='addCriterios.php'</script>";
        }
      }
    
?>