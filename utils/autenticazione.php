
<?php
//EFFETTUA IL LOGIN

require_once "connessione.php";
session_start();

$flag = false;

$username = isset($_POST["username"]) ? $_POST["username"] : die("username non ricevuto");
$password = isset($_POST["password"]) ? $_POST["password"] : die("password non ricevuta");


$sql = "SELECT * FROM utenti WHERE nomeutente= :username";
$statement = $db_connection->prepare($sql);
$statement->execute(array('username' => $username));

if ($statement->rowCount() > 0) {
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $hashedPassword = $row["password"]; //hash che si trova nel db

    if (password_verify($password, $hashedPassword)) {
        //imposto la sessione
        session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $username;
        $_SESSION['admin'] = $row["admin"];
        header("Location:  ../index.php");
    }
}

echo "errore";
?>


