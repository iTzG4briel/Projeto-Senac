<?php 

include_once("conexao.php");

$id_funcionario = "";
$nome_funcionario = "";
$usuario_funcionario = "";
$senha_funcionario = "";
$obs_funcionario = "";
$status_funcionario = "Ativo";

if($_POST || isset($_GET['txtID'])){
	
	if($_POST)
		$id_funcionario = $_POST['txtID'];
	
	if(isset($_GET['txtID']))
		$id_funcionario = $_GET['txtID'];
	
	
	
	try
	{
		$sql = $conn->query("select * from funcionario where id_funcionario = ".$id_funcionario);
		
		if($sql->rowCount() == 1)
		{
			foreach($sql as $row)
			{
			 	$id_funcionario = $row[0];
				$nome_funcionario = $row[1];
				$usuario_funcionario =$row[2];
				$senha_funcionario = $row[3];
				$obs_funcionario = $row[4];
				$status_funcionario = $row[5];
			}
		}else{
			echo 'Funcionário não existe<br>';
		}

	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}
	
}

?>