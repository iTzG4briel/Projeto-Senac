<?php 

include_once("conexao.php");

$id_filme = "";
$id_categoria = "";
$nome_filme = "";
$valor_filme = "";
$desc_filme = "";
$foto_filme = "";
$datacad_filme = "";
$nota_filme = "";
$obs_filme = "";
$status_filme = "";


if($_POST || isset($_GET['txtID'])){

	if($_POST)
		$id_filme = $_POST['txtID'];
	
	if(isset($_GET['txtID']))
		$id_filme = $_GET['txtID'];
	
	try
	{
		$sql = $conn->query("select * from filme where id_filme = ".$id_filme);
		
		if($sql->rowCount() == 1)
		{
			foreach($sql as $row)
			{
				$id_filme = $row[0];
				$id_categoria = $row[1];
				$nome_filme = $row[2];
				$valor_filme = $row[3];
				$desc_filme = $row[4];
				$foto_filme = $row[5];
				$datacad_filme = $row[6];
				$nota_filme = $row[7];
				$obs_filme = $row[8];
				$status_filme = $row[9];
			}
		}else{
			echo 'filme não existe<br>';
		}

	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}
	
}
?>