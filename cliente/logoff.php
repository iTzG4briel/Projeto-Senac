<?php 

session_start();

$_SESSION['idCliente'] = "";
$_SESSION['usuarioCliente'] = "";		
$_SESSION['nomeCliente'] = "";

unset($_SESSION['idCliente']);
unset($_SESSION['usuarioCliente']);
unset($_SESSION['nomeCliente']);

unset($_SESSION);

session_destroy();

header('Location:login.php');
?>