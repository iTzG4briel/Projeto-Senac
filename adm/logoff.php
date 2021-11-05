<?php 

session_start();

$_SESSION['idUsuario'] = "";
$_SESSION['Usuario'] = "";		
$_SESSION['nomeUsuario'] = "";

unset($_SESSION['idUsuario']);
unset($_SESSION['Usuario']);
unset($_SESSION['nomeUsuario']);

unset($_SESSION);

session_destroy();

header('Location:login.php');
?>