<?php
$form_values_valid = false;
echo "<div>";


$user = Utilisateur::getUtilisateur ( $dbh, $_SESSION ['login'] );
if (isset ( $_POST ['mdp1'] )) { //si le formulaire a déjà été rempli
	if (is_null ( $user )) {
		echo "L'utilisateur n'est pas dans la base.";
	} else if ($_POST ['mdp2'] != $_POST ['mdp3']) {
		echo "Les mots de passe ne correspondent pas";
	} else if (! $user->testerMdp ( $_POST ['mdp1'] )) {
		echo "L'ancien mot de passe est incorrect.";
	} 

	else {
		
		$sth = $dbh->prepare ( "UPDATE `utilisateurs` SET `mdp`=? WHERE `login`=?" );
		$sth->execute ( array (
				SHA1 ( $_POST ['mdp2'] ),
				$_SESSION ['login'] 
		) );
		$form_values_valid = true;
	}
}

echo "</div>";

if (! $form_values_valid) { // formulaire non rempli
	
	echo '<div class="container">
	
      <form action="?page=changepw" method="post" class="form-signin"
      		oninput="mdp3.setCustomValidity(mdp2.value != mdp3.value ?' . ' Les mots de passe diffèrent.' . ' : \'
	\')"> ';
	
	echo '<h2 class="form-signin-heading">Changement de mot de passe</h2>
      
		
        <label for="password1">Ancien mot de passe:</label>
        	<input type="password" id="password1" name="mdp1" class="form-control" required>
		<label for="password2">Nouveau mot de passe:</label>
       	 	<input type="password" id="password2" name="mdp2" class="form-control" required>
		<label for="password2">Confirmez votre nouveau mot de passe:</label>
        	<input type="password" id="password3" name="mdp3" class="form-control" required>
	
        <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
      </form>
	
    </div> <!-- /container -->';
}
?>