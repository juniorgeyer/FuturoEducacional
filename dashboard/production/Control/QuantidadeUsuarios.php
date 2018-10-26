<?php

include('connectJS.php');

// Configura uma conexão com o banco de dados


// Verifica se foi solicitado uma consulta para o autocomplete

	$sql = "SELECT count(*) AS MediaGeral FROM usuarios";
	$stm = $conexao->prepare($sql);
//	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;

?>