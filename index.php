<?php
session_name ( "SessionUtilisateur" );
// ne pas mettre d'espace dans le nom de session !
session_start ();
if (! isset ( $_SESSION ['initiated'] )) {
	session_regenerate_id ();
	$_SESSION ['initiated'] = true;
}
// Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage
// var_dump($_SESSION);

require ('utilities/utils.php');
require ('database.php');
require ('logInOut.php');

if (isset ( $_GET ['logOut'] )) { // s'il y a une demande de logOut (i.e. un click sur le bouton déconnexion)
	logOut ();
}

$dbh = Database::connect (); // connection à la base de donnée de USports
                             
// traitement du logIn (lorsque l'on sort de la page login, on a un paramètre todo=login 
if (array_key_exists ( 'todo', $_GET ) && $_GET ["todo"] == "login") {
	logIn ( $dbh );
}

// code de sélection des pages
if (array_key_exists ( 'page', $_GET )) {
	$askedPage = $_GET ['page']; // $askedPage contient le nom de la page demandée
} else {
	$askedPage = "welcome"; // ou welcome (accueil) s'il n'y a pas de page demandée
}

$authorized = checkPage ( $askedPage ); // true si la page est accessible (est dans le fichie xml)

if ($authorized) {
	$pageTitle = getPageTitle ( $askedPage ); // "erreur" si la page n'existe pas, titre de la page sinon
} else {
	$pageTitle = "erreur"; // "erreur" si la page n'est pas authorisée
}

generateHTMLHeader ( $pageTitle, $askedPage );
if ($pageTitle != "erreur" & file_exists("heading/heading_" . $askedPage . ".php")) { // page authorisée
	include "heading/heading_" . $askedPage . ".php"; // Entête de la page
}

echo '</head>';

?>

<body>

<?php
if (isset ( $_SESSION ['loggedIn'] )) {
	generateMenu ( $askedPage, $_SESSION ['loggedIn'] );
} else {
	generateMenu ( $askedPage, FALSE );
} // génère le menu à partir du fichier xml xml/pages.xml?>

	<!-- PARTIE VARIABLE ENTRE CHAQUE PAGE -->
	<div id="content">
	<?php
	
	if ($pageTitle == "erreur") { // non authorisée ou n'existe pas
		echo "<p>Désolé, la page demandée n'existe pas ou n'est accessible qu'aux gentlemen.<p/>";
	} else {
		require "content/content_" . $askedPage . ".php"; // Contenu de la page
	}
	
	$dbh = null; // Déconnexion de MySQL
	?>
	</div>

	<!--  FOOTER -->
<?php

generateHTMLFooter ();
?>

</body>
</html>