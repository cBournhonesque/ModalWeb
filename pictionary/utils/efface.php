<?php
    session_start();
    require("BD.cls");

    $dbh = Database::connect();

    // on vide la table Points
    $sth = $dbh->prepare("DELETE FROM Points WHERE TRUE");
    $sth->execute(array());
    
    
    // on ajoute l'élément (0,0,2)
    $sth = $dbh->prepare("INSERT INTO Points(x,y,nouveau) VALUE (0,0,2)");
    $sth->execute(array());

    $dbh = null; // Déconnexion de MySQL
?>
