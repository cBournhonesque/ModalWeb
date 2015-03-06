<?php
$form_values_valid = false;
echo "<div>";

$user = Utilisateur::getUtilisateur ( $dbh, $_SESSION ['login'] );
if (isset ( $_POST ['mdp'] )) { //si le formulaire a déjà été rempli
	if (is_null ( $user )) {
		echo "L'utilisateur n'est pas dans la base.";
	} else if (! $user->testerMdp ( $_POST ['mdp'] )) {
		echo "Le mot de passe est incorrect.";
	} 

	else {
		
		$sth = $dbh->prepare ( "DELETE FROM `utilisateurs` WHERE `login`=?" );
		$sth->execute ( array ($_SESSION ['login'] ) );
		$form_values_valid = true;
	}
}

echo "</div>";

if (! $form_values_valid) { // formulaire non rempli
	
	echo '<div class="container">
	
      <form action="?page=deleteuser" method="post" class="form-signin"> ';
	
	echo '<h2 class="form-signin-heading">Suppression du compte</h2>
      
		
        <label for="password">Mot de passe:</label>
        	<input type="password" id="password" name="mdp" class="form-control" required>

	
        <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
      </form>
	
    </div> <!-- /container -->';
}
?>