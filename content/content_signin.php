<?php
function afficher(){
	echo <<<FIN
	
    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Veuillez vous connecter</h2>
        <label for="inputEmail" class="sr-only">Adresse email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      </form>

    </div> <!-- /container -->
	
FIN;
}
?>