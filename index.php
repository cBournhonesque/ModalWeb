<!--  HEADER -->
<?php require ('utilities/utils.php');

/* Recuperation de la page */
if (array_key_exists ( 'page', $_GET )) {
	$askedPage = $_GET ['page'];  // $askedPage contient le nom de la page demandée
} 
else {
	$askedPage = "welcome"; //ou welcome (accueil) s'il n'y a pas de page demandée
}

$authorized = checkPage ( $askedPage ); // true si la page est accessible

if ($authorized) { 
	$pageTitle = getPageTitle ( $askedPage ); //"erreur" si la page n'existe pas, titre de la page sinon
}
else{
	$pageTitle = "erreur"; //"erreur" si la page n'est pas authorisée
}

generateHTMLHeader($pageTitle,$askedPage);

?>

<body>

	<?php generateMenu($askedPage); //génère le menu à partir du fichier xml xml/pages.xml
	?>

	

	<!-- PARTIE VARIABLE ENTRE CHAQUE PAGE -->
	<div id="content">
	<?php 
	
	if($authorized==false || $pageTitle == "erreur"){ //non authorisée ou n'existe pas
		echo "<p>Désolé, la page demandée n'existe pas ou n'est accessible qu'aux gentlemen.<p/>";
	}
	else{
		require "content/content_".$askedPage.".php"; // Contenu de la page
		afficher();
	}
	
	
	?>
	
	
	</div>

	<!--  FOOTER -->
<?php 
generateHTMLFooter();
?>

</body>
</html>