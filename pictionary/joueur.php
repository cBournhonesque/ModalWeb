<?php
    session_start();
    if (!isset($_SESSION['last'])){// on arrive pour la première fois
        require("utils/BD.cls");

        $dbh = Database::connect();

        $sth = $dbh->prepare("SELECT id FROM Points ORDER BY id Desc LIMIT 1");
        $sth->execute(array());
        if ($ligne = $sth->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['last']=$ligne['id'];            
        }
        else{
            $_SESSION['last']=0;
        }
        $dbh = null; // Déconnexion de MySQL
        
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Pictionary</title>
        <link href="css/style.css" rel="stylesheet"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/joueur.js" type="text/javascript"></script>

    </head>
    <body>
        <h1>Joueur</h1>

        <div id="conteneur">
            <canvas id="tableau" width="500" height="300"></canvas>
        </div>
    </body>
</html>
