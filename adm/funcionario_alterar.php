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
			update funcionario set
				nome_funcionario	=	:nome_funcionario,
				usuario_funcionario	=	:usuario_funcionario,
				senha_funcionario	=	:senha_funcionario,
				obs_funcionario		=	:obs_funcionario,
				status_funcionario	=	:status_funcionario
			where 
				id_funcionario	=	:id_funcionario
		');
			
		$sql->execute
		(
			array
			(
				':id_funcionario' => $id_funcionario,
				':nome_funcionario' => $nome_funcionario,
				':usuario_funcionario' => $usuario_funcionario,
				':senha_funcionario' => $senha_funcionario,
				':obs_funcionario' => $obs_funcionario,
				':status_funcionario' => $status_funcionario
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo 'Cadastro alterado com sucesso<br>';
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