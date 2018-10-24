<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $categoria_funcionario = mysqli_real_escape_string($conexao, $_POST['nome_categoria']);
  $nome_funcionarios = mysqli_real_escape_string($conexao, $_POST['nome_profissionais']);
  $turma =  mysqli_real_escape_string($conexao, $_POST['turma']);
  $disciplina_funcionario =  mysqli_real_escape_string($conexao, $_POST['nome_disciplina']);
  
      
      
       $query = "INSERT INTO vinculo(categoria_funcionario,nome_funcionarios,turma,disciplina_funcionario) VALUES ('$categoria_funcionario','$nome_funcionarios','$turma','$disciplina_funcionario')";
       $insert = mysqli_query($conexao,$query);
        if($insert){
         echo"<script language='javascript' type='text/javascript'>alert('Vinculo cadastrado com sucesso!');window.location.href='../addVinculo.php'</script>";

        }else{
         echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse Vinculo');window.location.href='../addVinculo.php'</script>";
        }

            
        
             
      
    
?>