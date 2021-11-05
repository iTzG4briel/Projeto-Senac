<?php include_once("filme_pesquisar.php")?>
<h1>Formulário de Filmes</h1>
<hr>
<form name="frmFilme" id="frmFilme" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<p>
			<label for="txtID">ID</label><br />
			<input class="form-control" type="text" name="txtID" id="txtID" value="<?php echo $id_filme?>"/>
		</p>
		<p>
			<label for="txtIDCategoria">ID Categoria</label><br />
			<select class="form-control" name="txtIDCategoria" id="txtIDCategoria" >
				<?php include_once("carregar_categoria_filme.php")?>
			</select>
			
		</p>
		<p>
			<label for="txtNome">Nome</label><br />
			<input class="form-control" type="text" name="txtNome" id="txtNome" value="<?php echo $nome_filme?>"/>
		</p>
		<p>
			<label for="txtValor">Valor</label><br />
			<input class="form-control" type="text" name="txtValor" id="txtValor" value="<?php echo $valor_filme?>"/>
		</p>
		<p>
			<label for="txtDescricao">Descrição</label><br />
			<textarea class="form-control" name="txtDescricao" id="txtDescricao" rows="5"><?php echo $desc_filme?></textarea>
		</p>
		<p>
			<label for="txtFoto">Foto</label><br />
			<input class="form-control" type="file" name="txtFoto" id="txtFoto"/>
		</p>
		<p>
			<label for="txtDataCad">Data Cadastro</label><br />
			<input class="form-control" type="text" name="txtDataCad" id="txtDataCad"  value="<?php echo $datacad_filme?>"/>
		</p>
		<p>
			<label for="txtNota">Nota</label><br />
			<input class="form-control" type="text" name="txtNota" id="txtNota" value="<?php echo $nota_filme?>"/>
		</p>
		<p>
			<label for="txtObs">Obs</label><br />
			<input class="form-control" type="text" name="txtObs" id="txtObs" value="<?php echo $obs_filme?>"/>
		</p>
		<p>
			<label for="txtStatus">Status</label><br />
			<input class="form-control" type="text" name="txtStatus" id="txtStatus" value="<?php echo $status_filme?>"/>
		</p>
	</div>
	<button name="btoCadastrar" class="btn btn-success" id="btoCadastrar" formaction="filme_cadastrar.php">Cadastrar</button>
	
	<button name="btoPesquisar" class="btn btn-primary" id="btoPesquisar" formaction="sistema.php?tela=filmes">Pesquisar</button>
	
	<button name="btoAlterar" class="btn btn-warning" id="btoAlterar" formaction="filme_alterar.php">Alterar</button>
	
	<button name="btoExcluir" class="btn btn-danger" id="btoExcluir" formaction="filme_excluir.php">Excluir</button>
</form>
<hr>
