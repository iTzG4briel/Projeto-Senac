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

	$id_cliente = $_POST['txtID'];
	$nome_cliente = $_POST['txtNome'];
	$email_cliente = $_POST['txtEmail'];
	$cpf_cliente = $_POST['txtCPF'];
	$usuario_cliente = $_POST['txtUsuario'];
	$senha_cliente = $_POST['txtSenha'];
	$obs_cliente = $_POST['txtObs'];
	$status_cliente = $_POST['txtStatus'];

	try
	{
		$sql = $conn->prepare
		('
			insert into cliente
				(nome_cliente,email_cliente,cpf_cliente,usuario_cliente,senha_cliente,obs_cliente,status_cliente)
			values
				(:nome_cliente,:email_cliente,:cpf_cliente,:usuario_cliente,:senha_cliente,:obs_cliente,:status_cliente)
		');
			
		$sql->execute
		(
			array
			(
				':nome_cliente' => $nome_cliente,
				':usuario_cliente' => $usuario_cliente,
				':email_cliente' => $email_cliente,
				':cpf_cliente' => $cpf_cliente,
				':senha_cliente' => $senha_cliente,
				':obs_cliente' => $obs_cliente,
				':status_cliente' => $status_cliente
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo '<div id="resultadoCadastro">';
			echo 'Cadastro realizado com sucesso<br>';
			echo 'ID Gerado: '. $conn->lastInsertId();
			echo "<br><a href='login.php'>Voltar</a>";
			echo "</div>";
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}
?>
