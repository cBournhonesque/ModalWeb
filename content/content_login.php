<?php

	echo '<div class="container">
	
      <form action="index.php?todo=login&page=' . $_GET ['oldPage'] . '" method="post" class="form-signin">';
	
	echo <<<FIN
        <h2 class="form-signin-heading">Veuillez vous connecter</h2>
        <input type="text" id="inputLogin" name="login" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="Mot de passe" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      </form>
	
    </div> <!-- /container -->
	
FIN;

?>