<?php 

session_start();

$idFuncionario = "";
$nomeFuncionario = "";
$usuarioFuncionario = "";

if(isset($_SESSION['idFuncionario']))
{
	echo '<b>ID Usuário: </b>'.$_SESSION['idFuncionario'].'<br>';
	echo '<b>Nome Usuário: </b>'.$_SESSION['nomeFuncionario'].'<br>';
	echo '<b>Usuário Logado: </b>'.$_SESSION['usuarioFuncionario'].'<hr>';
}else{
	echo 'Para acessar essa tela, o usuário deve estar logado!';
	header('Location:login.php');
}
?>
<a href="logoff.php">Sair</a><br>
<a href="../index.php">Home</a>
