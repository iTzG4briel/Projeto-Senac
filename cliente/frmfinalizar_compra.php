<?php 

include_once("conexao.php");

if(isset($_GET['idVenda']))
{
	$idVenda = $_GET['idVenda'];
	$total = 0;
	
	echo '<h1>Venda '.$idVenda.'</h1>';
	echo '<hr>';
	
	echo'
	
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produto</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>';

  try
	{
		$sql = $conn->query("select * from item where id_venda_item = ".$idVenda);

	    $total = 0;
	  
		if($sql->rowCount() != 0)
		{
			foreach($sql as $row)
			{
				echo '<tr>';
					echo '<th scope="row">'.$row[0].'</th>';
					echo '<td>'.$row[2].'</td>';
					echo '<td>'.$row[3].'</td>';
				echo '</tr>';
				
				$total = $total + $row[3];
			}
		}else{
			echo 'Funcionário não existe<br>';
		}

	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}
  ?>
  </tbody>
</table>

<?php
	
}else{
	echo "Erro";
}

?>

<hr>

<form name="frmvenda" id="frmvenda" method="post">
<div class="form-group">
	<p>
		<label for="txtID">Venda</label><br />
		<input class="form-control" type="text" name="txtID" id="txtID" value="<?php echo $idVenda ?>" readonly/>
	</p>
	<p>
		<label for="txtTotal">Total</label><br />
		<input class="form-control" type="text" name="txtTotal" id="txtTotal" value="<?php echo $total ?>" readonly/>
	</p>
	<p>
		<label for="txtTipo">Tipo Pagamento</label><br />
		<select class="form-control" name="txtTipo" id="txtTipo">
			<option value="Dinheiro">Dinheiro</option>
			<option value="Credito">Cartão Crédito</option>
			<option value="Debito">Cartão Débito</option>
		</select>
	</p>
	<p>
		<label for="txtObs">Obs</label><br />
		<textarea class="form-control" type="text" name="txtObs" id="txtObs"></textarea>
	</p>
</div>
	<button name="btoCadastrar" class="btn btn-success" id="btoCadastrar" formaction="finalizar_compra.php">Finalizar Compra</button>

</form>


