<?php
    session_start();
    header("Content-type: application/json");
    //// on va renvoyer du json

    require("BD.cls");
    $dbh = Database::connect();
    
    $tabPoints = array();//on va y stocker le résultat

    $sth = $dbh->prepare("SELECT * FROM Points WHERE id > ?");
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute(array($_SESSION['last']));
    $i = 0;
    while($point = $sth->fetch()){
        $tabPoints[$i] = array($point['x'],$point['y'],$point['nouveau']);
        $_SESSION['last'] = $point['id'];
        $i++;
    }
    
    
    $dbh = null; // Déconnexion de MySQL

    echo json_encode(array("answer"=>$tabPoints));
?>