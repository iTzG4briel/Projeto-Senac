<?php 

$host="localhost";
$banco="euavalio";
$user="root";
$pass="";

try
{
	//String de Conexão do MySql
	$conn = new PDO("mysql:dbname=$banco;host=$host",$user,$pass);
	
	//String de Conexão do SQL Server
	//$conn = new PDO("mssql:host=$host;dbname=$banco",$user,$pass);
	
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
	$conn->exec( "set names utf8" );
	
}catch( PDOException $erro ){
	echo $erro->getMessage();
	//echo '<br>';
	//echo $erro->getCode();
}

?>