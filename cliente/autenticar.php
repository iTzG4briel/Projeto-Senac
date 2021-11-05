<?php 

session_start();

$idCliente = "";
$nomeCliente = "";
$usuarioCliente = "";

if(isset($_SESSION['idCliente']))
{
	$idCliente = $_SESSION['idCliente'];
	$nomeCliente = $_SESSION['nomeCliente'];
	$usuarioCliente = $_SESSION['usuarioCliente'];
	
	echo '<b>ID Usuário: </b>'.$_SESSION['idCliente'].'<br>';
	echo '<b>Nome Usuário: </b>'.$_SESSION['nomeCliente'].'<br>';
	echo '<b>Usuário Logado: </b>'.$_SESSION['usuarioCliente'].'<hr>';
}else{
	echo 'Para acessar essa tela, o usuário deve estar logado!';
	header('Location:login.php');
}
?>
<a href="logoff.php">Sair</a><br>
<a href="../index.php">Home</a>
