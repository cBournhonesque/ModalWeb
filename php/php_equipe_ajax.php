<?php


require_once ('C:/xampp/htdocs/U Sports/database.php');

$dbh = Database::connect ();

//On convertit en format MYSQL
list($d,$m,$y) = explode('-',$_POST['date1']);
$date2 = "$y-$m-$d";


$heure2=$_POST['heure1'];
$hebdo2=$_POST['hebdo1'];
$lieu2 = $_POST['lieu1'];
$commentaire2 = $_POST['commentaire1'];


if(isset($_POST['duree1'])){
	$duree2 = $_POST['duree1'];
}


Rencontre::insererEntrainement($dbh, "Volleyball", "X5", $date2, $heure2, $duree2, $lieu2, $commentaire2 , $hebdo2);

?>