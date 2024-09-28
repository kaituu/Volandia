<?php

require_once "verificalogin.php";

if(!($_SESSION['admin'])){
    echo 'Non sei autorizzato';
    exit;
}
?>