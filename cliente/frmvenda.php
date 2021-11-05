<?php 
include_once("conexao.php");

echo'

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Total</th>
      <th scope="col">Tipo</th>
    </tr>
  </thead>
  <tbody>
  
  ';
	
	try
	{
		$sql = $conn->query("select * from venda where id_cliente_venda = ".$idCliente." and status_venda='Finalizado'");

		if($sql->rowCount() != 0)
		{
			foreach($sql as $row)
			{
				echo '<tr>';
					echo '<th scope="row">'.$row[0].'</th>';
					echo '<td>'.$row[3].'</td>';
					echo '<td>'.$row[2].'</td>';
					echo '<td>'.$row[4].'</td>';
					
				echo '</tr>';
			}
		}else{
			echo 'Categoria não existe<br>';
		}

	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}
?>