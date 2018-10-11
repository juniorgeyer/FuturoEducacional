<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $nome_turma = mysqli_real_escape_string($conexao, $_POST['nome_turma']);
  
  
 $query_select = "SELECT nome_turma FROM turma WHERE nome_turma = '$nome_turma'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['nome_turma'];
      if($logarray == $nome_turma){
 
        echo"<script language='javascript' type='text/javascript'>alert('Essa turma já existe');window.location.href='addTurma.php';</script>";
        die();
 
      }else{
       $query = "INSERT INTO turma(nome_turma) VALUES ('$nome_turma')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Turma cadastrada com sucesso!');window.location.href='addTurma.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa turma');window.location.href='addTurma.php'</script>";
        }
      }
    
?>