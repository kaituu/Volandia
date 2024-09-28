<?php
if (!session_status()){
    session_start();
}

//se l'user è loggato allora mostra il suo nome e il pulsante di log out
if (isset($_SESSION['loggedin'])) {
    echo "<ul class='navbar-nav ms-auto'>";
    echo '<li><a class="nav-link">'. $_SESSION['name'] .'</a></li>';
    echo '<li><a class="nav-link active" href="utils/logout.php" >esci</a></li>';
    echo "</ul>";
    
}else{
    echo "<ul class='navbar-nav ms-auto'>";
    echo '<li><a class="nav-link active" href="login.php">entra</a></li>';
    echo '<li><a class="nav-link active" href="register.php" >registrati</a></li>';
    echo "</ul>";
}

//In bootstrap 5 the classes are changed, so for ml-auto is changes with ms-auto AND mr-auto is changes with me-auto For left we have to use s instead of l, And For Right we have to use e instead of r
?>