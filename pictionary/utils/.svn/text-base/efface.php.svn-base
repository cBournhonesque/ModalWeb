<?php
    session_start();
    require("BD.cls");

    $dbh = Database::connect();
    $query = "INSERT INTO Messages(message,login) VALUES (?,?)";
    $sth = $dbh->prepare($query);
    $sth->execute(array($_POST["message"],$_SESSION["login"]));
    $dbh = null; // Déconnexion de MySQL
?>
