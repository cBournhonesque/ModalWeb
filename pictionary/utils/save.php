<?php
    require("BD.cls");

    $dbh = Database::connect();
    
    // on ajoute le point passé en post dans la table Points

    $sth = $dbh->prepare("INSERT INTO Points(x,y,nouveau) VALUE (?,?,?)");
    $sth->execute(array($_POST['x'],$_POST['y'],$_POST['nouveau']));
    
    $dbh = null; // Déconnexion de MySQL
?>

