<?php include "categoria_pesquisar.php" ?>
<h1>Formulário de categorias</h1>
<hr>
<form name="frmcategoria" id="frmcategoria" method="post">
<div class="form-group">
	<p>
		<label for="txtID">ID</label><br />
		<input class="form-control" type="text" name="txtID" id="txtID" value="<?php echo $id_categoria ?>"/>
	</p>
	<p>
		<label for="txtNome">Nome</label><br />
		<input class="form-control" type="text" name="txtNome" id="txtNome" value="<?php echo $nome_categoria ?>"/>
	</p>
	<p>
		<label for="txtObs">Obs</label><br />
		<textarea class="form-control" type="text" name="txtObs" id="txtObs"><?php echo $obs_categoria ?></textarea>
	</p>
	<p>
		<label for="txtStatus">Status</label><br />
		<input class="form-control" type="text" name="txtStatus" id="txtStatus" value="<?php echo $status_categoria ?>" />
	</p>
</div>
	<button name="btoCadastrar" class="btn btn-primary" id="btoCadastrar" formaction="categoria_cadastrar.php">Cadastrar</button>
	
	<button name="btoPesquisar" class="btn btn-primary" id="btoPesquisar" formaction="sistema.php?tela=categoria">Pesquisar</button>
	
	<button name="btoAlterar" class="btn btn-primary" id="btoAlterar" formaction="categoria_alterar.php">Alterar</button>
	
	<button name="btoExcluir" class="btn btn-primary" id="btoExcluir" formaction="categoria_excluir.php">Excluir</button>
</form>
<hr>
