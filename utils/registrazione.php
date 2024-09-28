<?php

require "connessione.php";

$flag = false;

$nome = isset($_POST["nome"]) ? $_POST["nome"] : die("nome non ricevuto");
$cognome = isset($_POST["cognome"]) ? $_POST["cognome"] : die("cognome non ricevuto");
$username = isset($_POST["username"]) ? $_POST["username"] : die("username non ricevuto");
$password = isset($_POST["password"]) ? $_POST["password"] : die("password non ricevuta");


$sql = "SELECT * FROM utenti WHERE nomeutente= :username";
$statement = $db_connection->prepare($sql);
$statement->execute(array('username'=>$username));
    
    if($statement->rowCount()==0){
                $flag = true;
    }

    if ($flag == false) {
        setcookie("errore", "Utente già esistente", time() + 3, "/");
        header("Location:  ../register.php");
        
    } else {
        
        $hashedPassword = password_hash($password, CRYPT_BLOWFISH);
        $query = "INSERT INTO `utenti` (`nome`, `cognome`, `nomeutente`, `password`) VALUES (:nome, :cognome, :username, :hashedPassword )";
        $statement = $db_connection->prepare($query);
        if($statement->execute(array('nome'=>$nome, 'cognome'=>$cognome, 'username'=>$username, 'hashedPassword'=>$hashedPassword)) === TRUE)
        {
            header("Location:  ../login.php");
        }else{
            setcookie("errore", "Inserimento non eseguito", time() + 3, "/");
            header("Location:  ../register.php");
        }

    }
?>
