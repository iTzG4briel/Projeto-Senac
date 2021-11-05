<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Area Administrativa</title>
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="css/bootstrap.js"></script>
<script src="css/jquery-3.js"></script>
</head>

<body>
	<div class="container-lg">
		<div class="row" id="topo">
			<div class="col-12">
				<h1 class="text-center">Área administrativa </h1>
			</div>
			Selecione uma Categoria
		</div>
		<div class="row">
			<div class="col-3" id="menu">
				<?php include("adm-menu.php")?>
			</div>
			<div class="col-9" id="cont">
				<?php 
				echo '<hr>';
					include_once("_tabela.php");
				echo '<hr>';
				
				if(isset($_GET['tela']))
				{
					if($_GET['tela'] == 'funcionario'){
						include_once('frmfuncionario.php');
					}
					if($_GET['tela'] == 'categoria'){
						include_once('frmcategoria.php');
					}
					if($_GET['tela'] == 'cliente'){
						include_once('frmcliente.php');
					}
					if($_GET['tela'] == 'venda'){
						include_once('frmvenda.php');
					}
					
					
					if($_GET['tela'] == 'filmes'){
						include_once('frmfilme.php');
					}
				}
				
				?>
			</div>
		</div>
	</div>
</body>
</html>