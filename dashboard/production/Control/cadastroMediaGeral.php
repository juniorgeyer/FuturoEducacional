<?php 
 session_start();
include('connect.php');

  $maior_que = mysqli_real_escape_string($conexao, $_POST['maior_que']);
  $menor_que = mysqli_real_escape_string($conexao, $_POST['menor_que']);
  $valor_bonificacao = mysqli_real_escape_string($conexao, $_POST['valor_bonificacao']);
  
        
       $query = "INSERT INTO media_geral(menor_que,maior_que,valor_bonificacao) VALUES ('$menor_que','$maior_que','$valor_bonificacao')";
       $insert = mysqli_query($conexao,$query);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Condição adicionada com sucesso!');</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa Condição');</script>";
        }
                    
         
      
    
?>