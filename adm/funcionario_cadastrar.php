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

	$id_funcionario = $_POST['txtID'];
	$nome_funcionario = $_POST['txtNome'];
	$usuario_funcionario = $_POST['txtUsuario'];
	$senha_funcionario = $_POST['txtSenha'];
	$obs_funcionario = $_POST['txtObs'];
	$status_funcionario = $_POST['txtStatus'];

	try
	{
		$sql = $conn->prepare
		('
			insert into funcionario
				(nome_funcionario,usuario_funcionario,senha_funcionario,obs_funcionario,status_funcionario)
			values
				(:nome_funcionario,:usuario_funcionario,:senha_funcionario,:obs_funcionario,:status_funcionario)
		');
			
		$sql->execute
		(
			array
			(
				':nome_funcionario' => $nome_funcionario,
				':usuario_funcionario' => $usuario_funcionario,
				':senha_funcionario' => $senha_funcionario,
				':obs_funcionario' => $obs_funcionario,
				':status_funcionario' => $status_funcionario
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo '<div id="resultadoCadastro">';
			echo 'Cadastro realizado com sucesso<br>';
			echo 'ID Gerado: '. $conn->lastInsertId();
			echo "<br><a href='sistema.php?tela=funcionario'>Voltar</a>";
			echo "</div>";
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}else{
	echo "É necessário enviar as informção para fazer o cadastro!<br>";
	echo "<a href='sistema.php?tela=funcionario'>Voltar</a>";
}
?>