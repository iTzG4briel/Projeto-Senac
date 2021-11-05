<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Area Cliente</title>
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="css/bootstrap.js"></script>
<script src="css/jquery-3.js"></script>
</head>

<body>
	<div class="container-lg">
		<div class="row" id="topo">
			<div class="col-12">
				<h1 class="text-center">Área do Cliente </h1>
			</div>
		</div>
		<div class="row">
			<div class="col-3" id="menu">
				<?php include("adm-menu.php")?>
			</div>
			<div class="col-9" id="cont">
				<?php 
				
				if(isset($_GET['tela']))
				{
					if($_GET['tela'] == 'cliente'){
						include_once('frmcliente.php');
					}
					if($_GET['tela'] == 'venda'){
						include_once('frmvenda.php');
					}
					if($_GET['tela'] == 'filmes'){
						include_once('frmfilme.php');
					}
					if($_GET['tela'] == 'carrinho'){
						include_once('frmcarrinho.php');
					}
					if($_GET['tela'] == 'finalizar'){
						include_once('frmfinalizar_compra.php');
					}
				}
				
				?>
			</div>
		</div>
	</div>
</body>
</html>