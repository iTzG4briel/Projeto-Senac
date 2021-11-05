<?php 

include_once("conexao.php");

if($_POST){

	$id_categoria = $_POST['txtID'];
	$nome_categoria = $_POST['txtNome'];
	$obs_categoria = $_POST['txtObs'];
	$status_categoria = $_POST['txtStatus'];

	try
	{
		$sql = $conn->prepare
		('
			update categoria set
				nome_categoria	=	:nome_categoria,
				obs_categoria		=	:obs_categoria,
				status_categoria	=	:status_categoria
			where 
				id_categoria	=	:id_categoria
		');
			
		$sql->execute
		(
			array
			(
				':id_categoria' => $id_categoria,
				':nome_categoria' => $nome_categoria,
				':obs_categoria' => $obs_categoria,
				':status_categoria' => $status_categoria
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo 'Cadastro alterado com sucesso<br>';
			echo "<br><a href='sistema.php?tela=categoria'>Voltar</a>";
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}else{
	echo "É necessário enviar as informção para fazer o cadastro!<br>";
	echo "<a href='sistema.php?tela=categoria'>Voltar</a>";
}
?>