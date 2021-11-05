<?php 

include_once("conexao.php");

try
{
	$ativar = "";
	
	$sql = $conn->query("select * from categoria");
	
	foreach($sql as $row)
	{
		if($row[0] == $id_categoria){
			$ativar = "selected";
		}else{
			$ativar = "";
		}
		echo '<option value="'.$row[0].'" '.$ativar.'>'.$row[1].'</option>';
	}
	
}catch( PDOException $erro ){
	echo $erro->getMessage();
}

?>