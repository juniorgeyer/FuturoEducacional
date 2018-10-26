<?php
include('connectJS.php');


// Verifica se foi solicitado uma consulta para o autocomplete

	$sql = "SELECT format (AVG(criterios_individuais),2) AS MediaGeral FROM usuarios";
	$stm = $conexao->prepare($sql);
//	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;

?>