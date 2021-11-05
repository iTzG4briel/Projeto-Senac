<?php 

include_once("conexao.php");

$id_categoria = "";
$nome_categoria = "";
$obs_categoria = "";
$status_categoria = "Ativo";

if($_POST || isset($_GET['txtID'])){

	if($_POST)
		$id_categoria = $_POST['txtID'];
	
	if(isset($_GET['txtID']))
		$id_categoria = $_GET['txtID'];

	   
	try
	{
		$sql = $conn->query("select * from categoria where id_categoria = ".$id_categoria);
		
		if($sql->rowCount() == 1)
		{
			foreach($sql as $row)
			{
			 	$id_categoria = $row[0];
				$nome_categoria = $row[1];
				$obs_categoria = $row[2];
				$status_categoria = $row[3];
			}
		}else{
			echo 'Categoria não existe<br>';
		}

	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}
	
}

?>