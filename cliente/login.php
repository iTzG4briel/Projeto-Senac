<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/estilologin.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="css/bootstrap.js"></script>
<script src="css/jquery-3.js"></script>
<title>Área administrativa do Cliente</title>
</head>

<body>
	<div class="wrapper fadeInDown">
	  <div id="formContent">
		

<style>Body{background-color: aqua}</style>
		<div class="fadeIn first">
		  <br><h1></h1>
		</div>

		
		<form method="post">
			
		  <input type="text" id="txtCliente" class="fadeIn second" name="txtCliente" placeholder="login">
			
		  <input type="text" id="txtSenha" class="fadeIn third" name="txtSenha" placeholder="password">

			<p></p>
			
		  <button type="submit" class="btn btn-primary" formaction="login.php">Entrar</button>
		 
			
			<p></p>

		</form>

		<!-- Remind Passowrd -->
		<div id="formFooter">
	
		</div>

	  </div>
	</div>
	<?php 
	
	//print_r($_POST);
	
	if($_POST)
	{
		include_once("conexao.php");
		
		$usuario = $_POST['txtCliente'];
		$senha = $_POST['txtSenha'];
	
		try
		{
			$sql = $conn->query("select * from cliente where
				usuario_cliente='".$usuario."' and
				senha_cliente='".$senha."'
			");

			if($sql->rowCount() == 1)
			{
				
				echo 'seja bem vindo<br>';
				
				session_start();
				
				foreach($sql as $row)
				{
					$_SESSION['idCliente'] = $row[0];
					$_SESSION['usuarioCliente'] = $row[2];		
					$_SESSION['nomeCliente'] = $row[1];
					header('Location:sistema.php');
				}
			}else{
				echo '<center>Usuário ou senha inválidos<br></center>';
			}

		}catch( PDOException $erro ){
			echo $erro->getMessage();
		}
	}
	
	?>
</body>
</html>