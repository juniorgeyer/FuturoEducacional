<?php
include('connectJS.php');


// Verifica se foi solicitado uma consulta para o autocomplete

	$sql = "SELECT valor_media_geral AS MediaGeral FROM media_geral";
	$stm = $conexao->prepare($sql);
//	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;

?>