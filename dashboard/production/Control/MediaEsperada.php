<?php
include('connectJS.php');


// Verifica se foi solicitado uma consulta para o autocomplete

	$sql = "SELECT *, SUM(valor_criterios) AS MediaGeral FROM criterio";


	$stm = $conexao->prepare($sql);
//	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;

?>