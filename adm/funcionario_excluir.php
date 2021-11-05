<?php 

include_once("conexao.php");

if($_POST || isset($_GET['txtID'])){
	
	if($_POST)
		$id_funcionario = $_POST['txtID'];
	
	if(isset($_GET['txtID']))
		$id_funcionario = $_GET['txtID'];

	try
	{
		$sql = $conn->prepare('delete from funcionario where id_funcionario=:id_funcionario');
			
		$sql->execute
		(
			array
			(
				':id_funcionario' => $id_funcionario,
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo 'Cadastro excluido com sucesso<br>';
			echo "<br><a href='sistema.php?tela=funcionario'>Voltar</a>";
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}else{
	echo "É necessário enviar as informção para fazer o cadastro!<br>";
	echo "<a href='sistema.php?tela=funcionario'>Voltar</a>";
}
?>