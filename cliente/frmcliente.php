<hr>
<div class="col-sm-12">

<h1>Cadastro de Clientes</h1>
<hr>
<form name="frmcliente" id="frmcliente" method="post">
	<div class="form-group">
		<p>
			<label for="txtID">ID</label><br />
			<input class="form-control" type="text" name="txtID" id="txtID" value=""/>
		</p>
		<p>
			<label for="txtNome">Nome</label><br />
			<input class="form-control" type="text" name="txtNome" id="txtNome" value=""/>
		</p>
		<p>
			<label for="txtEmail">Email</label><br />
			<input class="form-control" type="text" name="txtEmail" id="txtEmail" value=""/>
		</p>
		<p>
			<label for="txtCPF">CPF</label><br />
			<input class="form-control" type="text" name="txtCPF" id="txtCPF" value=""/>
		</p>
		<p>
			<label for="txtUsuario">Usuário</label><br />
			<input class="form-control" type="text" name="txtUsuario" id="txtUsuario" value=""/>
		</p>
		<p>
			<label for="txtSenha">Senha</label><br />
			<input class="form-control" type="text" name="txtSenha" id="txtSenha" value=""/>
		</p>
		<p>
			<label for="txtObs">Obs</label><br />
			<textarea class="form-control" type="text" name="txtObs" id="txtObs"></textarea>
		</p>
		<p>
			<label for="txtStatus">Status</label><br />
			<input class="form-control" type="text" name="txtStatus" id="txtStatus" value="Ativo" readonly/>
		</p>
	</div>
	<button name="btoCadastrar" class="btn btn-success" id="btoCadastrar" formaction="cliente/cliente_cadastrar.php">Cadastrar</button>

</form>
	<hr>
</div>