<?php
if (!session_status()){
    session_start();
}

//se l'admin è loggato allora mostra il collegamento al pannello di controllo
if (isset($_SESSION['admin'])) {
    if($_SESSION['admin']){
        echo '<li><a class="nav-link active" href="pannellodicontrollo.php" >Pannello di controllo</a></li>';
    }
}

?>