<?php

session_start();
require "../utils/verificaadmin.php";
require_once "../utils/connessione.php";


$CF = isset($_GET["CF"]) ? $_GET["CF"] : die("CF non ricevuto");

$sql = "DELETE FROM `passeggeri` WHERE `passeggeri`.`CF` = :cf ";
$statement = $db_connection->prepare($sql);
$risultato = $statement->execute(array('cf' => $CF));
if ($risultato) {
	header('Location: ../elencopasseggeri.php');
	exit;
}else{
    die("passeggero non trovato <br>");
}
?>