<?php

/*
$options = array (
		'nom' => FILTER_SANITIZE_STRING,
		'login' => FILTER_SANITIZE_SPECIAL_CHARS,
		'prenom' => FILTER_SANITIZE_STRING, // Enlever les balises.
		'email' => FILTER_VALIDATE_EMAIL, // Valider l'adresse de messagerie.
		'promotion' => FILTER_SANITIZE_NUMBER_INT,
		'naissance' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'mdp1' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'mdp2' => FILTER_SANITIZE_FULL_SPECIAL_CHARS 
);

$_POST = filter_input_array ( INPUT_POST, $options );
*/

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
if (isset ( $_POST ["sport"] ))
	$sport = $_POST ["sport"];
else
	$sport = "";
if (isset ( $_POST ["categorie"] ))
	$categorie = $_POST ["categorie"];
else
	$categorie = "";
if (isset ( $_POST ["equipe"] ))
	$equipe = $_POST ["equipe"];
else
	$equipe = "";
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
		
		$sth = $dbh->prepare ( "INSERT INTO `utilisateurs` (`login`, `sport`, `mdp`, `nom`, `prenom`, `naissance`, `email`, `categorie`, `equipe`) VALUES(?,?,SHA1(?),?,?,?,?,?,?)" );
		$sth->execute ( array (
				$_POST ['login'],
				$_POST ['sport'],
				$_POST ['mdp1'],
				$_POST ['nom'],
				$_POST ['prenom'],
				$_POST ['naissance'],
				$_POST ['email'],
				$_POST ['categorie'],
				$_POST ['equipe']
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
				<select id="sport" name="sport" value="' . $sport . '" class="form-control" placeholder="Sport" required>
					<option value="basketball">Basketball</option>
					<option value="volleyball">Volleyball</option>
					<option value="football">Football</option>	
						
				</select>
		<input type="text" id="prenom" name="prenom" value="' . $prenom . '" class="form-control" placeholder="Prénom" required>
		<input type="text" id="nom" name="nom" value="' . $nom . '" class="form-control" placeholder="Nom" required>
		<select id="categorie" name="categorie" value="' . $categorie . '" class="form-control" placeholder="Catégorie" required>
					<option value="coach">Coach</option>
					<option value="joueur">Joueur</option>
					<option value="supporter">Supporter</option>	
						
				</select>
		<input type="date" id="naissance" name="naissance" value="' . $naissance . '" class="form-control" placeholder="YYYY-MM-DD" required>
		<input type="text" id="equipe" name="equipe" value="' . $equipe . '" class="form-control" placeholder="Equipe" required>
			
        <label for="password1">Mot de passe:</label>
        <input type="password" id="password1" name="mdp1" class="form-control" required>
		<label for="password2">Confirmez votre mot de passe:</label>
        <input type="password" id="password2" name="mdp2" class="form-control" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">M\'inscrire</button>
      </form>
	
    </div> <!-- /container -->';
}

?>