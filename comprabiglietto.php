<?php
  require_once "utils/verificalogin.php";
  ?>
<html>

 <head>
   <title>Compra biglietto - Volandia</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 </head>

 <body class="d-flex flex-column min-vh-100">
   <header>
     <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
       <div class="container-fluid">
         <a class="navbar-brand" href="#">Volandia</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="../">Home</a>
             </li>
             <?php 
             include "utils/navbarDaAdmin.php";
             ?>
           </ul>
           <?php 
           include "utils/navbarLoggato.php";
           ?>
         </div>
       </div>
     </nav>
   </header>

   <div class="container my-5">
   <h3 class="text-center fw-bold my-3">volo selezionato</h3>
<?php

require_once "utils/connessione.php";

$numerovolo = isset($_GET["numerovolo"]) ? $_GET["numerovolo"] : die("numerovolo non ricevuto");

//QUERY per l'andata
$sqlandata = "SELECT * FROM voli WHERE NumeroVolo = :numerovolo";
$statement = $db_connection->prepare($sqlandata);
$statement->execute(array('numerovolo' => $numerovolo));


if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="d-flex justify-content-center row"> 
      <div class="col-md-8">
      <div class="card border-0 my-3">
          <div class="card-body d-flex flex-column justify-content-between p-0">
              <div class="bg-light text-muted p-4 bg-top">
                  <div class="d-flex flex-row justify-content-between">
                      <div class="d-flex flex-column justify-content-between align-items-center">
                          <h1>' . $row["Origine"] . '</h1><span>' . date_format(date_create($row["DataPartenza"]), 'M, D d - Y') . '</span><span>' . date_format(date_create($row["DataPartenza"]), 'H:i') . '</span></div>
                      <div class="d-flex flex-column justify-content-center"><i class="fa fa-plane fa-3x"></i></div>
                      <div class="d-flex flex-column justify-content-between align-items-center">
                          <h1>' . $row["Destinazione"] . '</h1><span>' . date_format(date_create($row["DataArrivo"]), 'M, D d - Y') . '</span><span>' . date_format(date_create($row["DataArrivo"]), 'H:i') . '</span></div>
                          </div>
              </div>
          </div>
      </div>
  </div>
  </div>';
  echo '<h4 class="text-center fw-bold my-3">Prezzo biglietto : ' . $row["Prezzo"] . ' $</h4>';
  $prezzo = $row["Prezzo"];
    }


}

?>
</div>
<div class="container my-5">
<h4 class="text-center fw-bold my-3">Dati passeggero</h4>
          <form action="queries/inserisciPasseggeroBiglietto.php" method="POST" class="row">
            
            <?php 
            echo '<input type="hidden" class="form-control" id="numerovolo" name="numerovolo"  value =' . $_GET["numerovolo"] .'>';
            echo '<input type="hidden" class="form-control" id="importo" name="importo"  value =' . $prezzo .'>';
            ?>
          
          <div class="form-group col-md-4">
                    <label for="CF">Codice Fiscale</label>
                    <input type="text" class="form-control" id="CF" name="CF" placeholder="SDDSDS94C07G273H"  value ="" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="nome">nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Mario" required>
                </div>
            <div class="form-group col-md-3">
                <label for="cognome">cognome</label>
                <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Rossi" required>
            </div>
            <div class="form-group col-md-2">
                    <label for="datanascita">Data di nascita</label>
                    <input type="date" class="form-control" id="datanascita" name="datanascita" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="nazionalita">nazionalita</label>
                    <input type="text" class="form-control" id="nazionalita" name="nazionalita" required>
                </div>

                <div class="form-group col-md-1">
                    <label for="tipo_via">tipo via</label>
                    <input type="text" class="form-control" id="tipo_via" name="tipo_via" placeholder="" required>
                </div>
            <div class="form-group col-md-3">
                <label for="nome_via">nome via</label>
                <input type="text" class="form-control" id="nome_via" name="nome_via" placeholder="" required>
            </div>
            <div class="form-group col-md-1">
                    <label for="n_via">numero via</label>
                    <input type="text" class="form-control" id="n_via" name="n_via" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="citta">citta</label>
                    <input type="text" class="form-control" id="citta" name="citta" required>
                </div>


            <div class="form-group col-md-12 mt-3">
              <button type="submit" class="btn btn-primary" name="acquista" value="acquista">Acquista</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>


          </form>
        </div>



<footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top mt-auto" style="background-color: #e3f2fd;">
  <div class="align-items-center mx-auto">
    <span class="text-muted">&copy; Volandia 2049</span>
  </div>
</footer>
</body>

</html>