<?php 
       //inserisce il volo nel db
       require "../utils/verificaadmin.php";
          require_once "../utils/connessione.php";
          
          $numerovolo=$_POST["numerovolo"];
          $origine=$_POST["origine"];
          $destinazione=$_POST["destinazione"];
          $partenza=$_POST["datainizio"];
          $arrivo=$_POST["datarrivo"];
          $compagnia=$_POST["compagnia"];
          $prezzo = $_POST["prezzo"];

            $sqlAggiungiVolo = "INSERT INTO `voli` (`NumeroVolo`, `Origine`, `Destinazione`, `DataPartenza`, `DataArrivo`, `Prezzo`, `Cod_IATA`) VALUES ( :numerovolo, :origine, :destinazione, :partenza, :arrivo, :prezzo, :compagnia);";
            $statement = $db_connection->prepare($sqlAggiungiVolo);
            if ($statement->execute(array('numerovolo'=>$numerovolo,'origine'=>$origine,'destinazione'=>$destinazione,'partenza'=>$partenza,'arrivo'=>$arrivo, 'prezzo'=>$prezzo, 'compagnia'=>$compagnia)) === TRUE) {
                header("Location:  ../elencovoli.php");
            } else {
                echo "Errore nell'inserimento del volo <br>";
            }
            ?>
