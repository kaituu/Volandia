<?php
  require_once "utils/verificalogin.php";
  ?>
<html>

 <head>
   <title>Cerca volo - Volandia</title>
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
   <h3 class="text-center fw-bold my-3">Volo/i Trovato/i</h3>
<?php

require_once "utils/connessione.php";

$flag = false;

$origine = isset($_POST["origine"]) ? $_POST["origine"] : die("origine non ricevuto");
$destinazione = isset($_POST["destinazione"]) ? $_POST["destinazione"] : die("destinazione non ricevuta");
$giorno_andata = isset($_POST["giorno_andata"]) ? $_POST["giorno_andata"] : die("andata non ricevuta");
$giorno_ritorno = isset($_POST["giorno_ritorno"]) ? $_POST["giorno_ritorno"] : die("ritorno non ricevuta");

//QUERY per l'andata
$sqlandata = "SELECT * FROM voli WHERE origine = :origine AND destinazione = :destinazione AND DATE(dataPartenza) = :andata";
$statement = $db_connection->prepare($sqlandata);
$statement->execute(array('origine' => $origine,'destinazione' => $destinazione,'andata' => $giorno_andata));

if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="d-flex justify-content-center row"> 
      <div class="col-md-6">
      <div class="card border-0 my-3">
          <div class="card-body d-flex flex-column justify-content-between p-0">
              <div class="bg-light text-muted p-4 bg-top">
                  <div class="d-flex flex-row justify-content-between">
                      <div class="d-flex flex-column justify-content-between align-items-center">
                          <h1>' . $row["Origine"] . '</h1><span>' . date_format(date_create($row["DataPartenza"]), 'M, D d') . '</span><span>' . date_format(date_create($row["DataPartenza"]), 'H:i') . '</span></div>
                      <div class="d-flex flex-column justify-content-center"><i class="fa fa-plane fa-3x"></i></div>
                      <div class="d-flex flex-column justify-content-between align-items-center">
                          <h1>' . $row["Destinazione"] . '</h1><span>' . date_format(date_create($row["DataArrivo"]), 'M, D d') . '</span><span>' . date_format(date_create($row["DataArrivo"]), 'H:i') . '</span></div>
                          <div class="d-flex flex-column justify-content-center"><a class="fa fa-cart-plus fa-3x" style="color: #3e8bff;" href=comprabiglietto.php?numerovolo=' . $row["NumeroVolo"] . '></a></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>';
    }


}

?>
</div>



<footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top mt-auto" style="background-color: #e3f2fd;">
  <div class="align-items-center mx-auto">
    <span class="text-muted">&copy; Volandia 2049</span>
  </div>
</footer>
</body>

</html>