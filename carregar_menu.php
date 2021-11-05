<?php 

include_once("adm/conexao.php");

try
{
	$ativar = "";
	
	$sql = $conn->query("select * from categoria");
	
	foreach($sql as $row)
	{
		echo '<a href="index.php?idCat='.$row[0].'" class="dropdown-item">'.$row[1].'</a>';
	}
	
}catch( PDOException $erro ){
	echo $erro->getMessage();
}

?>