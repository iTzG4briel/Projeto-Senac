<?php 

include_once("conexao.php");


$idVenda = 0;

/*INICIO carrega o ID da venda ou cria uma venda Nova*/
try
{
	$sql = $conn->query("select * from venda
					where id_cliente_venda = ".$idCliente." and status_venda = 'Aberto'");

	if($sql->rowCount() == 1)
	{
		foreach($sql as $row)
		{
			$idVenda = $row[0];
			echo "Venda aberta ".$idVenda;
		}
	}else{

		$sql2 = $conn->prepare
		('
			insert into venda
				(id_cliente_venda,status_venda)
			values
				(:id_cliente_venda,:status_venda)
		');

		$sql2->execute
		(
			array
			(
				':id_cliente_venda' => $idCliente,
				':status_venda' => "Aberto"
			)
		);

		if($sql2->rowCount() == 1)
		{
			$idVenda = $conn->lastInsertId();
			echo "Venda Nova ".$idVenda;
		}

	}

}catch( PDOException $erro ){
	echo $erro->getMessage();
}

/* FIM carrega o ID da venda ou cria uma venda Nova*/

/* INICIO Inicia a inserção do ID FILME na Tabela Item*/

if(isset($_GET['idFilme']))
{

	$idFilmeCarrinho = $_GET['idFilme'];

	echo "ID Filme - ".$idFilmeCarrinho;
	echo '<hr>';


	try
	{
		$sql = $conn->query("select * from filme where id_filme = ".$idFilmeCarrinho);

		foreach($sql as $row)
		{
			$id_filme = $row[0];
			$id_categoria_filme = $row[1];
			$nome_filme = $row[2];
			$valor_filme = $row[3];
			$desc_filme = $row[4];
			$foto_filme = $row[5];
			$datacad_filme = $row[6];
			$nota_filme = $row[7];
			$obs_filme = $row[8];
			$status_filme = $row[9];
		}

	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

	try
	{
		$sql = $conn->prepare
		('
			insert into item
				(id_venda_item,id_filme_item,valor_item,status_item)
			values
				(:id_venda_item,:id_filme_item,:valor_item,:status_item)
		');

		$sql->execute
		(
			array
			(
				':id_venda_item' => $idVenda,
				':id_filme_item' => $idFilmeCarrinho,
				':valor_item' => $valor_filme,
				':status_item' => "Ativo"
			)
		);

		if($sql->rowCount() == 1)
		{
			echo '<hr>filme cadastrado no carrinho com sucesso<br>';
		}

	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}
}
/* FIM Inicia a inserção do ID FILME na Tabela Item*/

?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produto</th>
      <th scope="col">Valor</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php 
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
					echo '<td>
						<a href="sistema.php?tela=funcionario&txtID='.$row[0].'"><button>...</button></a>
						<a href="funcionario_excluir.php?txtID='.$row[0].'"><button>X</button></a>
					</td>';
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
    <tr>
      <th scope="col"></th>
      <th scope="col">Total</th>
      <th scope="col"><?php echo $total; ?></th>
      <th scope="col"></th>
    </tr>
	  
  </tbody>
</table>

<a href="sistema.php?idVenda=<?php echo $idVenda; ?>&tela=finalizar" class="btn btn-success my-2 my-sm-0">Finalizar Compra</a>

<?php 

	if(isset($_GET['acao'])){
		header("Location:sistema.php?tela=carrinho");
	}
?>



