<?php include_once("topo.php")?>
<?php include_once("menu.php")?>

<div class="container-sm" id="conteudo">
	<br>
	<div class="row">
		<!--Inicio do Conteudo-->
		<?php
		if(isset($_GET['idCat']))
		{
			include_once("filtroCategoria.php");
		}elseif(isset($_GET['cadastroCliente']))
		{
			include_once("cliente/frmcliente.php");
		}elseif(isset($_GET['idFilme']))
		{
			include_once("detalhefilme.php");
		}else{
			include_once("imghome.php");
		}
		?>
		<!--Fim do Conteudo-->

	</div>
</div>
<?php include_once("rodape.php")?>