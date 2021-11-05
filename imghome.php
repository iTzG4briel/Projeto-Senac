<?php 

include_once("adm/conexao.php");

try
{
	$sql = $conn->query("select * from filme");
	
	foreach($sql as $row)
	{
		echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 text-center filmeHome border">';
		echo '
			<a href="index.php?idFilme='.$row[0].'" >
				<p><img src="adm/imagem/'.$row[0].'/'.$row[5].'" class="img-fluid" /></p>
				<br>
				<p><b>'.$row[2].'</b></p>
				<p><b>Nota: '.$row[7].'</b></p>
				<p><b>Valor: R$ '.number_format($row[3],2,",",".").'</b></p>
			</a>
		';
		echo '</div>';
	}
	
}catch( PDOException $erro ){
	echo $erro->getMessage();
}

?>