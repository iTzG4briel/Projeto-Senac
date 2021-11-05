<?php include "funcionario_pesquisar.php" ?>
<h1>Formulário de Funcionarios</h1>
<hr>
<form name="frmfuncionario" id="frmfuncionario" method="post">
<div class="form-group">
	<p>
		<label for="txtID">ID</label><br />
		<input class="form-control" type="text" name="txtID" id="txtID" value="<?php echo $id_funcionario ?>"/>
	</p>
	<p>
		<label for="txtNome">Nome</label><br />
		<input class="form-control" type="text" name="txtNome" id="txtNome" value="<?php echo $nome_funcionario ?>"/>
	</p>
	<p>
		<label for="txtUsuario">Usuário</label><br />
		<input class="form-control" type="text" name="txtUsuario" id="txtUsuario" value="<?php echo $usuario_funcionario ?>"/>
	</p>
	<p>
		<label for="txtSenha">Senha</label><br />
		<input class="form-control" type="text" name="txtSenha" id="txtSenha" value="<?php echo $senha_funcionario ?>"/>
	</p>
	<p>
		<label for="txtObs">Obs</label><br />
		<textarea class="form-control" type="text" name="txtObs" id="txtObs"><?php echo $obs_funcionario ?></textarea>
	</p>
	<p>
		<label for="txtStatus">Status</label><br />
		<input class="form-control" type="text" name="txtStatus" id="txtStatus" value="<?php echo $status_funcionario ?>" />
	</p>
</div>
	<button name="btoCadastrar" class="btn btn-primary " id="btoCadastrar" formaction="funcionario_cadastrar.php">Cadastrar</button>
	
	<button name="btoPesquisar" class="btn btn-primary" id="btoPesquisar" formaction="sistema.php?tela=funcionario">Pesquisar</button>
	
	<button name="btoAlterar" class="btn btn-primary" id="btoAlterar" formaction="funcionario_alterar.php">Alterar</button>
	
	<button name="btoExcluir" class="btn btn-primary" id="btoExcluir" formaction="funcionario_excluir.php">Excluir</button>
</form>
<hr>
