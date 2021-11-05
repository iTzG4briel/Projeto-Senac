<?php 

include_once("conexao.php");

if($_POST || isset($_GET['txtID'])){

	if($_POST)
		$id_categoria = $_POST['txtID'];
	
	if(isset($_GET['txtID']))
		$id_categoria = $_GET['txtID'];

	try
	{
		$sql = $conn->prepare('delete from categoria where id_categoria=:id_categoria');
			
		$sql->execute
		(
			array
			(
				':id_categoria' => $id_categoria,
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo 'Cadastro excluido com sucesso<br>';
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