<style>
	*{font-family: arial;}
	#resultadoCadastro{
		width: 400px;
		height: 200px;
		background-color: chartreuse;
		text-align: center;
		line-height: 60px;
		margin: auto;
		margin-top: 200px;
		padding: 10px;
		border-radius: 10px;
	}
	
</style>

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
			insert into categoria
				(nome_categoria,obs_categoria,status_categoria)
			values
				(:nome_categoria,:obs_categoria,:status_categoria)
		');
			
		$sql->execute
		(
			array
			(
				':nome_categoria' => $nome_categoria,
				':obs_categoria' => $obs_categoria,
				':status_categoria' => $status_categoria
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo '<div id="resultadoCadastro">';
			echo 'Cadastro realizado com sucesso<br>';
			echo 'ID Gerado: '. $conn->lastInsertId();
			echo "<br><a href='sistema.php?tela=categoria'>Voltar</a>";
			echo "</div>";
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}else{
	echo "É necessário enviar as informção para fazer o cadastro!<br>";
	echo "<a href='sistema.php?tela=categoria'>Voltar</a>";
}
?>