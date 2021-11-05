<?php 

include_once("conexao.php");

if($_POST || isset($_GET['txtID'])){

	if($_POST)
		$id_filme = $_POST['txtID'];
	
	if(isset($_GET['txtID']))
		$id_filme = $_GET['txtID'];
	
	try
	{
		$sql = $conn->prepare('delete from filme where id_filme=:id_filme');
			
		$sql->execute
		(
			array
			(
				':id_filme' => $id_filme,
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo 'Cadastro excluido com sucesso<br>';
			echo "<br><a href='sistema.php?tela=filme'>Voltar</a>";
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}else{
	echo "É necessário enviar as informção para fazer o cadastro!<br>";
	echo "<a href='sistema.php?tela=filme'>Voltar</a>";
}
?>