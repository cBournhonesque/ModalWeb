<?php
$options = array (
		'nom' => FILTER_SANITIZE_STRING,
		'prenom' => FILTER_SANITIZE_STRING, // Enlever les balises.
		'email' => FILTER_VALIDATE_EMAIL, // Valider l'adresse de messagerie.
		'age' => array (
				'filter' => FILTER_VALIDATE_INT, // Valider l'entier.
				'options' => array (
						'min_range' => 0 
				) 
		) // Minimum 0.

		 
)
;

$_POST = filter_input_array ( INPUT_POST, $options );
var_dump ( $_POST );

// $_POST == secure ( $_POST ); // sécurisation contre injections SQL?

$form_values_valid = false;
if (isset ( $_POST ["prenom"] ))
	$prenom = $_POST ["prenom"];
else
	$prenom = "";
if (isset ( $_POST ["nom"] ))
	$nom = $_POST ["nom"];
else
	$nom = "";
if (isset ( $_POST ["promotion"] ))
	$promotion = $_POST ["promotion"];
else
	$promotion = "";
if (isset ( $_POST ["email"] ))
	$email = $_POST ["email"];
else
	$email = "";
if (isset ( $_POST ["login"] ))
	$login = $_POST ["login"];
else
	$login = "";
if (isset ( $_POST ["naissance"] ))
	$naissance = $_POST ["naissance"];
else
	$naissance = "";

if (isset ( $_POST ["login"] ) && $_POST ["login"] != "" && isset ( $_POST ["email"] ) && $_POST ["email"] != "") {
	
	$test = Utilisateur::getUtilisateur ( $dbh, $login );
	if (! is_null ( $test )) {
		echo "L'utilisateur est déjà dans la base.";
	} else if ($_POST ['mdp1'] != $_POST ['mdp2']) {
		echo "Les mots de passe ne correspondent pas";
	} else {
		
		$sth = $dbh->prepare ( "INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)" );
		$sth->execute ( array (
				$_POST ['login'],
				$_POST ['mdp1'],
				$_POST ['nom'],
				$_POST ['prenom'],
				$_POST ['promotion'],
				$_POST ['naissance'],
				$_POST ['email'],
				NULL 
		) );
		
		$form_values_valid = TRUE;
	}
}

if (! $form_values_valid) { // formulaire non rempli
	
	echo '<div class="container">
	
      <form action="?page=signup" method="post" class="form-signin" 
      		oninput="mdp2.setCustomValidity(mdp2.value != mdp1.value ?' . ' Les mots de passe diffèrent.' . ' : \'
	\')"> ';
	
	echo '<h2 class="form-signin-heading">Formulaire d\'inscription</h2>
        <input type="email" id="inputEmail" name="email" value="' . $email . '" class="form-control" placeholder="Adresse email" required autofocus>
			
		<input type="text" id="login" name="login" value="' . $login . '" class="form-control" placeholder="Login" required>
		<input type="text" id="prenom" name="prenom" value="' . $prenom . '" class="form-control" placeholder="Prénom" required>
		<input type="text" id="nom" name="nom" value="' . $nom . '" class="form-control" placeholder="Nom" required>
		<input type="number" id="promotion" name="promotion" value="' . $promotion . '" class="form-control" placeholder="XXXX" required>
		<input type="date" id="naissance" name="naissance" value="' . $naissance . '" class="form-control" placeholder="YYYY-MM-DD" required>
			
        <label for="password1">Mot de passe:</label>
        <input type="password" id="password1" name="mdp1" class="form-control" required>
		<label for="password2">Confirmez votre mot de passe:</label>
        <input type="password" id="password2" name="mdp2" class="form-control" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">M\'inscrire</button>
      </form>
	
    </div> <!-- /container -->';
}

?>