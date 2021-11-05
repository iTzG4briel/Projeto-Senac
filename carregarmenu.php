<?php 

include_once("adm/conexao.php");

try
{
	$sql = $conn->query("select * from categoria");
	
	foreach($sql as $row)
	{
		echo'
			<div class="col-sm itemMenu">
				  <a href="index.php?idCat='.$row[0].'">'.$row[1].'</a>
			</div>
		';
	}
	
}catch( PDOException $erro ){
	echo $erro->getMessage();
}

?>