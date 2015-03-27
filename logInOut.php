<?php
function logIn($dbh) {
/*
	if(isset($_SESSION['login'])){
	$_POST['login']=$_SESSION['login'];}
	if(isset($_SESSION['mdp'])){
		$_POST['mdp']=$_SESSION['mdp'];
	}
	unset ( $_SESSION ['login'] );
	unset ( $_SESSION ['mdp'] );
	*/
	
	// si l'utilisateur vient de se connecter
	$login = $_POST ['login']; // l'email servira de clé primaire et de login pour les utilisateurs
	$mdp = $_POST ['mdp'];
	
	$user = Utilisateur::getUtilisateur ( $dbh, $login ); //on confond login et email pour l'instant
	if (! is_null ( $user )) { // est-ce que l'utilisateur est dans la base
		if ($user->testerMdp ( $mdp )) { // est-ce que le mot de passe rentré est correct?
			$_SESSION ['loggedIn'] = TRUE;
			$_SESSION ['login'] = $user->login;
			$_SESSION['sport'] = $user->sport;
			$_SESSION['equipe'] = $user->equipe;
			$_SESSION['categorie'] = $user->categorie;
		}
		else{
			echo '<script type="text/javascript"> $(document).ready(function()  { $("#indexContent").html("Mot de passe incorrect") });</script>';
		}
	}
}
function logOut() {
	unset ( $_SESSION ['loggedIn'] );
	unset ( $_SESSION ['login'] );
	session_unset ();
	session_destroy ();
}