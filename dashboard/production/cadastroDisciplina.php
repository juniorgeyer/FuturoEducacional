<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $nome_disciplina = mysqli_real_escape_string($conexao, $_POST['nome_disciplina']);
  
  
 $query_select = "SELECT nome_disciplina FROM disciplina WHERE nome_disciplina = '$nome_disciplina'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['nome_disciplina'];
      if($logarray == $nome_disciplina){
 
        echo"<script language='javascript' type='text/javascript'>alert('Essa disciplina já existe');window.location.href='addDisciplina.php';</script>";
        die();
 
      }else{
       $query = "INSERT INTO disciplina(nome_disciplina) VALUES ('$nome_disciplina')";
       $insert = mysqli_query($conexao,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Disciplina cadastrada com sucesso!');window.location.href='addDisciplina.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa disciplina');window.location.href='addDisciplina.php'</script>";
        }
      }
    
?>