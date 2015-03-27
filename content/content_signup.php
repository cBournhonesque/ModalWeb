<?php

/*
$options = array (
'nom' => FILTER_SANITIZE_STRING,
'login' => FILTER_SANITIZE_SPECIAL_CHARS,
'prenom' => FILTER_SANITIZE_STRING, // Enlever les balises.
'email' => FILTER_VALIDATE_EMAIL, // Valider l'adresse de messagerie.
'categorie' => FILTER_SANITIZE_STRING,
'equipe' => FILTER_SANITIZE_STRING,
'sport' => FILTER_SANITIZE_STRING,
'naissance' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
'mdp' => FILTER_UNSAFE_RAW,
'mdp2' => FILTER_UNSAFE_RAW
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

if (isset ( $_POST ["login"] ) && $_POST ["login"] != "" && isset ( $_POST ["email"] ) && $_POST ["email"] != "" && isset ( $_POST ["nom"] ) && $_POST ["nom"] != "" && isset ( $_POST ["prenom"] ) && $_POST ["prenom"] != "" && isset ( $_POST ["equipe"] ) && $_POST ["equipe"] != "") {
	
	$test = Utilisateur::getUtilisateur ( $dbh, $login );
	if (! is_null ( $test )) {
		echo "L'utilisateur est déjà dans la base.";
	} else if ($_POST ['mdp'] != $_POST ['mdp_confirmation']) {
		echo "Les mots de passe ne correspondent pas";
	} else {
		
		$sth = $dbh->prepare ( "INSERT INTO `utilisateurs` (`login`, `sport`, `mdp`, `nom`, `prenom`, `naissance`, `email`, `categorie`, `equipe`) VALUES(?,?,SHA1(?),?,?,?,?,?,?)" );
		$sth->execute ( array (
				$_POST ['login'],
				$_POST ['sport'],
				$_POST ['mdp'],
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
	
	echo '<div class="form-horizontal">
	
      <form action="?page=signup" method="post" class="form-signin" id="signupForm"> ';
	
	echo '<h2 class="formSignupHeading">Formulaire d\'inscription</h2>
        <div class="form-group">
			<p class="col-sm-6 col-sm-offset-3">
				<input data-validation="email" type="email" id="inputEmail" name="email" value="' . $email . '" class="form-control" placeholder="Adresse email" required autofocus>
			</p>
		</div>
			
		<div class="form-group">
        		<p data-validation="length alphanumeric" data-validation-length="3-20" data-validation-error-msg="Le login doit être composé de caractères alphanumériques et faire entre 3 et 20 caractères." class="col-sm-6 col-sm-offset-3"><input type="text" id="login" name="login" value="' . $login . '" class="form-control" placeholder="Login" required></p></div>
		<div class="form-group">		
        		<p class="col-sm-6 col-sm-offset-3 col-sm-offset-3">
        			<select id="sport" name="sport" value="' . $sport . '" class="form-control" placeholder="Sport" required>
						<option value="basketball">Basketball</option>
						<option value="volleyball">Volleyball</option>
						<option value="football">Football</option>			
					</select>
        		</p>
        </div>
		<div class="form-group">
						<p class="col-sm-6 col-sm-offset-3"><input data-validation="length alphanumeric" data-validation-length="3-20" data-validation-error-msg="Le prénom doit être composé de caractères alphanumériques et faire entre 3 et 20 caractères." type="text" id="prenom" name="prenom" value="' . $prenom . '" class="form-control" placeholder="Prénom" required></p></div>
		<div class="form-group">
				<p class="col-sm-6 col-sm-offset-3"><input data-validation="length alphanumeric" data-validation-length="3-20" data-validation-error-msg="Le nom doit être composé de caractères alphanumériques et faire entre 3 et 20 caractères." type="text" id="nom" name="nom" value="' . $nom . '" class="form-control" placeholder="Nom" required></p></div>
		<div class="form-group">
				<p class="col-sm-6 col-sm-offset-3"><select id="categorie" name="categorie" value="' . $categorie . '" class="form-control" placeholder="Catégorie" required>
					<option value="coach">Coach</option>
					<option value="joueur">Joueur</option>
					<option value="supporter">Supporter</option>	
						
				</select></p></div>
		<div class="form-group">
						<p class="col-sm-6 col-sm-offset-3"><input type="date" id="naissance" name="naissance" value="' . $naissance . '" class="form-control" placeholder="YYYY-MM-DD" required></p></div>
		<div class="form-group">
						<p class="col-sm-6 col-sm-offset-3"><input type="text" id="equipe" name="equipe" value="' . $equipe . '" class="form-control" placeholder="Equipe" required></p></div>
			
        <div class="form-group">
			<label class="col-sm-3 control-label" for="mdp">Mot de passe:</label>
        	<div class="col-sm-6"><input data-validation="length" data-validation-length="min6" type="password" id="mdp" name="mdp_confirmation" class="form-control" required></div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="mdp2">Confirmez votre mot de passe:</label>
			<div class="col-sm-6">
        		<input data-validation="confirmation" type="password" id="mdp2" name="mdp" class="form-control" required>
			</div>
		</div>
        
        <div class="form-group"><p class="col-sm-6 col-sm-offset-3"><button class="btn btn-lg btn-primary btn-block" type="submit">M\'inscrire</button></p></div>
      </form>
	
    </div> <!-- /container -->';
}else{
	$_SESSION ['loggedIn'] = TRUE;
	$_SESSION ['login'] = $user->login;
	
	
	echo '<script>
	$(function(){location.href="index.php"} );
	</script>';
}

?>

<script> $.validate({
	modules : 'security',
    form : '#signupForm'
}); </script>