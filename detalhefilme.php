	<?php 
	if(isset($_GET['idFilme'])){
		include_once("adm/conexao.php");
		
		try
		{
			$sql = $conn->query("select * from filme where id_filme = ".$_GET['idFilme']);

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
	}
	?>
<div class="col-xl-4 text-center">
	<img src="adm/imagem/<?php echo $id_filme?>/<?php echo $foto_filme?>" alt="" class="img-fluid">
</div>
<div class="col-xl-6">
	<h2><?php echo $nome_filme?></h2>
	<hr>
	<p><?php echo $desc_filme?></p>
</div>

<div class="col-xl-2 text-center">
	<br>
	<p>Avaliação Geral - <?php echo $nota_filme?></p>
	<br>
	<a href="cliente/sistema.php?tela=carrinho&idFilme=<?php echo $id_filme?>&acao=ADD" class="btn btn-danger"> R$ <?php echo $valor_filme?></a>
	<br>
	<br>
</div>




