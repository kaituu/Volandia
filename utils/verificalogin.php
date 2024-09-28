<?php

session_start();
// se l'utente non ha i permessi per accedere ad una determinata pagina è reindirizzato alla login
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>