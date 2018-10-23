<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $valor_media = mysqli_real_escape_string($conexao, $_POST['valor_media']);
  
  
 $query_select = "SELECT * FROM media_geral";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $regs = mysqli_num_rows($select);
      if($regs==0){
       $query = "INSERT INTO media_geral(valor_media_geral) VALUES ('$valor_media')";
       $insert = mysqli_query($conexao,$query);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Meta adicionada com sucesso!');</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa meta');</script>";
        }
      }              
      

      else{
       $query = "UPDATE media_geral SET valor_media_geral= '$valor_media'";
       $insert = mysqli_query($conexao,$query);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Meta atualizada com sucesso!');window.location.href='addCriterios.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar essa meta');window.location.href='addCriterios.php'</script>";
        }
      }
      
    
?>