<?php 

session_start();

$idCliente = "";

if(isset($_SESSION['idCliente']))
{
	echo '<b> Usuário logado:</b> '.$_SESSION['nomeCliente'];
	echo "-";
	echo '<a href="cliente/logoff.php">Sair</a><br>';
}
?>
