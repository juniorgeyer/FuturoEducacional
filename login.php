<?php

session_start();

include('connect.php');

if(empty($_POST['login']) ||empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

  $login = mysqli_real_escape_string($conexao, $_POST['login']);
  $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id, login, categoria from usuarios where login='{$login}' and senha= '{$senha}'";
$result= mysqli_query($conexao, $query);
//$row = mysqli_num_rows($result);




      if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
           $categoria = $row['categoria'];
          $id = $row['id'];

    
   $_SESSION['categoria']= $categoria;
   $_SESSION['login']= $login;
   $_SESSION['id']= $id;
    header('Location: dashboard/production/index.php');
exit();
}}

else{
  $_SESSION['nao_autorizado'] = true;
    header('Location: index.php');
  exit();
}


?>