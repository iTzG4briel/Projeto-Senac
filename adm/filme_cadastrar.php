	<?php 

include_once("conexao.php");

if($_POST){

	$id_filme = $_POST['txtID'];
	$id_categoria = $_POST['txtIDCategoria'];
	$nome_filme = strtoupper($_POST['txtNome']);
	$valor_filme = $_POST['txtValor'];
	$desc_filme = strtoupper($_POST['txtDescricao']);
	$foto_filme = "";
	$datacad_filme = $_POST['txtDataCad'];
	$nota_filme = $_POST['txtNota'];
	$obs_filme = $_POST['txtObs'];
	$status_filme = "ATIVO";
	
	if(isset($_FILES['txtFoto']))
	{
		$arquivo = $_FILES['txtFoto'];
	
	}else{
		echo "Imagem deve ser informada";
		return;
	}
	
	try
	{
		$sql = $conn->prepare
		('
		insert into filme
			(id_categoria_filme,nome_filme,valor_filme,desc_filme,foto_filme,nota_filme,obs_filme,status_filme)
		values
			(:id_categoria,:nome_filme,:valor_filme,:desc_filme,:foto_filme,:nota_filme,:obs_filme,:status_filme)
		');
			
		$sql->execute
		(
			array
			(
				':id_categoria' => $id_categoria,
				':nome_filme' => $nome_filme,
				':valor_filme' => $valor_filme,
				':desc_filme' => $desc_filme,
				':foto_filme' => $arquivo["name"],
				':nota_filme' => $nota_filme,
				':obs_filme' => $obs_filme,
				':status_filme' => $status_filme
			)
		);
		
		if($sql->rowCount() == 1)
		{
			echo 'Cadastro realizado com sucesso<br>';
			echo 'ID Gerado: '. $conn->lastInsertId();
			echo "<br><a href='sistema.php?tela=filmes'>Voltar</a>";
			
			$pasta_dir = 'imagem/'.$conn->lastInsertId().'/';
			
			if(!file_exists($pasta_dir))
			{
				mkdir($pasta_dir);
			}

			$foto_filme = $pasta_dir . $arquivo["name"];

			move_uploaded_file($arquivo["tmp_name"],$foto_filme);
			
		}
			
	}catch( PDOException $erro ){
		echo $erro->getMessage();
	}

}
?>