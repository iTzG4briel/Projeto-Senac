<?php 

include_once("conexao.php");

if($_POST){

	$id_venda = $_POST['txtID'];
	$total_venda= $_POST['txtTotal'];
	$obs_venda= $_POST['txtObs'];
	$tipo_venda= $_POST['txtTipo'];

	try
	{
		$sql = $conn->prepare
		('
			update venda set
				tipo_pagamento_venda	=	:tipo_venda,
				total_venda				=	:total_venda,
				obs_venda				=	:obs_venda,
				status_venda			=	:status_venda
			where 
				id_venda				=	:id_venda');
			
		$sql->execute
		(
			array
			(
				':id_venda' => $id_venda,
				':tipo_venda' => $tipo_venda,
				':total_venda' => $total_venda,
				':obs_venda' => $obs_venda,
				':status_venda' => "Finalizado")
		);
		
		if($sql->rowCount() == 1)
		{
			echo 'Compra realizada com sucesso<br>';
			echo "<br><a href='sistema.php?tela=venda'>Voltar</a>";
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}else{
	header("Location:sistema.php?tela=venda");
}
?>