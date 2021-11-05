<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/estilologin.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="css/bootstrap.js"></script>
<script src="css/jquery-3.js"></script>
<title>Login</title>
</head>

<body>
	<div class="wrapper fadeInDown">
	  <div id="formContent">
		<!-- Tabs Titles -->
		  <style>Body{background-color: aqua}</style>
		<!-- Icon -->
		<div class="fadeIn first">
		 
		</div>

		<!-- Login Form -->
		<form method="post" action="login.php">
			
		  <input type="text" id="txtFuncionario" class="fadeIn second" name="txtFuncionario" placeholder="login">
			
		  <input type="text" id="txtSenha" class="fadeIn third" name="txtSenha" placeholder="password">
			
		  <input type="submit" class="fadeIn fourth" value="Log In">
			
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
		
		$usuario = $_POST['txtFuncionario'];
		$senha = $_POST['txtSenha'];
	
		try
		{
			$sql = $conn->query("select * from funcionario where
				usuario_funcionario='".$usuario."' and
				senha_funcionario='".$senha."'
			");

			if($sql->rowCount() == 1)
			{
				
				echo 'seja bem vindo<br>';
				
				session_start();
				
				foreach($sql as $row)
				{
					$_SESSION['idFuncionario'] = $row[0];
					$_SESSION['usuarioFuncionario'] = $row[2];		
					$_SESSION['nomeFuncionario'] = $row[1];
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