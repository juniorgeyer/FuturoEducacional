<?php 
 
session_start();
include('connect.php');
mysqli_set_charset($conexao, "utf8");

  $login = mysqli_real_escape_string($conexao, $_POST['login']);
  $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
  $nome =  mysqli_real_escape_string($conexao, $_POST['nome']);
  $nome_categoria =  mysqli_real_escape_string($conexao, $_POST['nome_categoria']);
  $meta_individual =  mysqli_real_escape_string($conexao, $_POST['meta_individual']);
  
      //PROCURA SE LOGIN JÁ EXISTE    
      $query_select = "SELECT * FROM usuarios WHERE login = '$login'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['login'];
      if($logarray == $login){
            
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='addPessoas.php';</script>";
        die();
 
      }

else{
       $query = "INSERT INTO usuarios(login,senha,nome,categoria,meta_individual) VALUES ('$login','$senha','$nome','$nome_categoria', '$meta_individual')";
       $insert = mysqli_query($conexao,$query);
        if($insert){
         echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='addPessoas.php'</script>";

        }else{
         echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='addPessoas.php'</script>";
        }

      //IRÁ PEGAR O ID DO USUÁRIO PARA ADICIONAR ESSE ID NA TABELA CRITERIOS_USUARIOS, QUE DEVE COMEÇAR COM TODOS OS VALORES 1
      $query_select = "SELECT * FROM usuarios WHERE login = '$login'";
      $select = mysqli_query($conexao,$query_select);
      $array = mysqli_fetch_array($select);
      $logarray = $array['login'];
      if($logarray == $login){
          $id_user= $array['id'];

          $tabela_usuarios = "SELECT * FROM criterio ";      
          $resul = mysqli_query($conexao, $tabela_usuarios);
          $regs = mysqli_num_rows($resul);
          while($row = $resul->fetch_array(MYSQLI_ASSOC)){
              $data[] = array(
              'id' => $row['id'],
              );
                $id_crit = $row['id'];
               $query = "INSERT INTO criterios_usuarios(id_usuario,id_criterio,valor_criterio_usuario) VALUES ('$id_user','$id_crit','1')";
               $insert = mysqli_query($conexao,$query);
              }

            if($select){

            $result = json_encode($data);             
            }
            else {
            $result = "{'success':false}";
            }

            }
        
            } 
      
    
?>