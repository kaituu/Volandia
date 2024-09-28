<?php
//inserisce il volo nel db
require "../utils/verificalogin.php";
require_once "../utils/connessione.php";

//Query che inserisce il passeggero in db ed inserisce il corrispettivo biglietto
$cf = $_POST["CF"];
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$datanascita = $_POST["datanascita"];
$nazionalita = $_POST["nazionalita"];
$tipo_via = $_POST["tipo_via"];
$nome_via = $_POST["nome_via"];
$n_via = $_POST["n_via"];
$citta = $_POST["citta"];

$numerovolo = $_POST["numerovolo"];

//verifico se il CF è gia presente in db
$sqlCF = "SELECT CF FROM passeggeri WHERE CF=:cf";
$statement = $db_connection->prepare($sqlCF);
$statement->execute(array('cf' => $cf));
if ($statement->rowCount() == 0) {
    //Inserisco passeggero
    $sqlInserisciPasseggero = "INSERT INTO `passeggeri` (`CF`, `Nome`, `Cognome`, `DataNascita`, `Nazionalita`, `tipo_via`, `nome_via`, `n_via`, `Citta`) VALUES (:cf, :nome, :cognome, :datanascita, :nazionalita, :tipovia, :nomevia, :nvia, :citta);";
    $statement = $db_connection->prepare($sqlInserisciPasseggero);

    $risultato = $statement->execute(array('cf' => $cf, 'nome' => $nome, 'cognome' => $cognome, 'datanascita' => $datanascita, 'nazionalita' => $nazionalita, 'tipovia' => $tipo_via, 'nomevia' => $nome_via, 'nvia' => $n_via, 'citta' => $citta));
    if($risultato == FALSE){
        die("errore nell'inserimento del passeggero");
    }
}

//inserisco biglietto
$datacquisto = date("Y-m-d");
$sqlInserisciBiglietto = "INSERT INTO `biglietti` (`CodiceTicket`, `DataAcquisto`,`NumeroVolo`, `CodiceFiscale`) VALUES (NULL, :datacquisto, :numerovolo, :cf);";
$statement2 = $db_connection->prepare($sqlInserisciBiglietto);
$risultato2 = $statement2->execute(array('datacquisto' => $datacquisto, 'numerovolo' => $numerovolo, 'cf' => $cf));
if($risultato2 == FALSE){
    die("errore nell'acquisto del biglietto");
}else{
    $_SESSION["numeroBiglietto"] = $db_connection->lastInsertId();
$_SESSION["importo"] = $_POST["importo"];
$_SESSION["dataAcquisto"] = $datacquisto;
header("Location:  ../");
}



