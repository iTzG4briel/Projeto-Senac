<?php 

include_once("conexao.php");

if($_POST){

	$id_filme = $_POST['txtID'];
	$id_categoria_filme = $_POST['txtIDCategoria'];
	$nome_filme = $_POST['txtNome'];
	$valor_filme = $_POST['txtValor'];
	$desc_filme = $_POST['txtDescricao'];
	$foto_filme = "";
	$nota_filme = $_POST['txtNota'];
	$obs_filme = $_POST['txtObs'];
	$status_filme = $_POST['txtStatus'];
	$sql = "";
	
	if(isset($_FILES['txtFoto']))
	{
		$arquivo = $_FILES['txtFoto'];
	}
	
	if($arquivo["name"] =="")
	{
		$sql = '
			update filme set
				id_categoria_filme=:id_categoria_filme,
				nome_filme=:nome_filme,
				valor_filme=:valor_filme,
				desc_filme=:desc_filme,
				nota_filme=:nota_filme,
				obs_filme=:obs_filme,
				status_filme=:status_filme				
			where 
				id_filme	=	:id_filme
		';
	}else{
		$sql = '
			update filme set
				id_categoria_filme=:id_categoria_filme,
				nome_filme=:nome_filme,
				valor_filme=:valor_filme,
				desc_filme=:desc_filme,
				foto_filme=:foto_filme,
				nota_filme=:nota_filme,
				obs_filme=:obs_filme,
				status_filme=:status_filme				
			where 
				id_filme	=	:id_filme
		';
	}
	
	try
	{
		$sql = $conn->prepare($sql);
			
		if($arquivo["name"] == "")
		{
			//echo "está sem o nome";
			$sql->execute
			(
				array
				(
					':id_filme' => $id_filme,
					':id_categoria_filme' => $id_categoria_filme,
					':nome_filme' => $nome_filme,
					':valor_filme' => $valor_filme,
					':desc_filme' => $desc_filme,
					':nota_filme' => $nota_filme,
					':obs_filme' => $obs_filme,
					':status_filme' => $status_filme
				)
			);
		}else{
			//echo "está com o nome ".$arquivo["name"];
			$sql->execute
			(
				array
				(
					':id_filme' => $id_filme,
					':id_categoria_filme' => $id_categoria_filme,
					':nome_filme' => $nome_filme,
					':valor_filme' => $valor_filme,
					':desc_filme' => $desc_filme,
					':foto_filme' => $arquivo["name"],
					':nota_filme' => $nota_filme,
					':obs_filme' => $obs_filme,
					':status_filme' => $status_filme
				)
			);
		}
		
		if($sql->rowCount() == 1)
		{
			echo 'Alteração realizado com sucesso<br>';
			echo "<br><a href='sistema.php?tela=filmes'>Voltar</a>";
			
			$pasta_dir = 'imagem/'.$id_filme.'/';
			
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