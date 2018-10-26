<?php
include('connectJS.php');


// Verifica se foi solicitado uma consulta para o autocomplete

	$sql = "SELECT count(*) AS QuantidadeHomens FROM usuarios WHERE sexo='Masculino'";
	$stm = $conexao->prepare($sql);
//	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;

?>