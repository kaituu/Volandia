<?php
// hostname
$nomehost = "localhost";
// utente per la connessione a MySQL
$nomeuser = "root";
// password per l'autenticazione dell'utente
$password = "mysql";
$db = "volandia";
// connessione tramite mysql_connect()
//$db_connection= mysqli_connect($nomehost,$nomeuser,$password);
$db_connection = new PDO("mysql:dbname=$db;host=$nomehost", "$nomeuser", "$password");


if (!$db_connection) 
{
	print "si è verificato un problema nella connessione al db";
	exit;
}
?>