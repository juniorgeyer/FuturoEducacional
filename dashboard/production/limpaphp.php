    <?php
                              include('connect.php');
                              $query = "select * from criterios";
                              $result= mysqli_query($conexao, $query);
                              mysqli_set_charset($conexao, 'utf8');
                                if (mysqli_num_rows($result) > 0) {
                                  while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                    $nome_criterios = $row['nome_criterios'];
  
  									echo utf8_encode($nome_criterios);                             
}}
                              ?>