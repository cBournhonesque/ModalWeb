<?php
function secure($tab) {
	foreach ( $tab as $cle => $valeur ) {
		$tab [$cle] = htmlspecialchars ( $valeur );
	}
	return $tab;
}
function generateHTMLHeader($title, $css) {
	echo <<<ENDLINE
	<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Charles Bournhonesque et Thomas Bordier" />
<meta name="keywords" content="U Sports Online Manager Coach" />
<meta name="description" content="Online Sports Manager" />

<link href='http://fonts.googleapis.com/css?family=Lobster'
	rel='stylesheet' type='text/css'>
<title>$title</title>

<!-- CSS Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- CSS Perso -->
<link href="css/welcome.css" rel="stylesheet">
<link href="css/$css.css" rel="stylesheet">

</head>
ENDLINE;
}
function generateMenu($askedPage, $loggedIn) { // générer le menu à partir du fichier xml/pages.xml
	$xmlPages = simplexml_load_file ( "xml/menuPages.xml" );
	
	echo <<<FIN
	<header>
	
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">U Sport</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
FIN;
	
	foreach ( $xmlPages->children () as $bout ) { // on regarde les differents "bout" dans pages
		if ($bout->getName () == 'page') {
			if ($bout->nom == $askedPage) {
				echo '<li class="active"><a href=index.php?page=' . $bout->nom . '>' . $bout->menutitle . '</a></li>' . PHP_EOL;
			} else {
				echo '<li><a href=index.php?page=' . $bout->nom . '>' . $bout->menutitle . '</a></li>' . PHP_EOL;
			}
		}
		if ($bout->getName () == 'bouton') {
			echo '<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">' . $bout->nomBouton . '<span class="caret"></span>
						</a>
							<ul class="dropdown-menu" role="menu">' . PHP_EOL;
			$tabPages = $bout->page;
			foreach ( $tabPages as $page ) {
				if ($page->nom == $askedPage) {
					echo '<li class="active"><a href=index.php?page=' . $page->nom . '>' . $page->menutitle . '</a></li>' . PHP_EOL;
				} else {
					echo '<li><a href=index.php?page=' . $page->nom . '>' . $page->menutitle . '</a></li>' . PHP_EOL;
				}
			}
			
			echo '</ul></li>' . PHP_EOL;
		}
	}
	echo '</ul>' . PHP_EOL;
	// si l'utilisateur est connecté
	if ($loggedIn) {
		echo <<<FIN
	
				<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php?page=myacc">Mon compte</a></li>
		<li><a href="index.php?logOut=true">Déconnexion</a></li>
		</ul>
		
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
		
	</header>
FIN;
	} else { // s'il est déconnecté
		
		echo <<<FIN
	
		<ul class="nav navbar-nav navbar-right">
		<li><a href="index.php?page=login&oldPage=$askedPage">Connexion</a></li>
				<li><a href="index.php?page=signup&oldPage=$askedPage">S'inscrire</a></li>
		</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
		
	</header>
FIN;
	}
}

/* Renvoit un booléen pour indiquer si la page demandée est parmi celles authorisées */
function checkPage($askedPage) {
	// bool symbolise si $askedPage fait partie des pages authorisées
	$bool = FALSE;
	$xmlPages = simplexml_load_file ( "xml/pages.xml" );
	
	// récupération des noeuds correspondant aux balises "page"
	$tableauDesPages = $xmlPages->xpath ( "//page" );
	
	// Parcours du tableau des pages
	foreach ( $tableauDesPages as $page ) {
		// Recuperation du contenu de la balise "nom" de chaque page
		if ($askedPage == $page->nom) {
			$bool = TRUE;
		}
	}
	
	return $bool;
}

/* Renvoit le titre de la page dont le nom est $nom, ou "erreur" si la page n'existe pas */
function getPageTitle($nom) {
	$xmlPages = simplexml_load_file ( "xml/pages.xml" );
	
	// récupération des noeuds correspondant aux balises "page"
	$tableauDesPages = $xmlPages->xpath ( "//page" );
	
	// Parcours du tableau des pages
	foreach ( $tableauDesPages as $page ) {
		// Recuperation du contenu de la balise "nom" de chaque page
		if ($nom == $page->nom) {
			return $page->title;
		}
	}
	
	return "erreur";
}
function generateHTMLFooter() {
	echo <<<ENDLINE
		<!-- FOOTER -->
	<div class="container">
		<!-- Site footer -->
		<footer class="footer">
			<p>Charles Bournhonesque & Thomas Bordier - Modal Web 2015</p>
		</footer>

	</div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>
ENDLINE;
}

?>