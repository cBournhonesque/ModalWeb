<?php
/*
 * $cols=" Equipe 1,Equipe 2,Lieu,Date,Poule";
 * $html =ServerDataPDO::build_html_datatable($cols);
 * echo '<h1> Planning des entraînements / matchs </h1>';
 * echo '<div id=dataTableDiv1 class="container">';
 * echo $html;
 * echo '</div>';
 *
 */
echo '<h1> Planning des entraînements / matchs </h1>';
echo '<div id=dataTableDiv1 class="container">';
echo <<<A
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="rencontre" width="100%">
				<thead>
					<tr>
						<th>Equipe 1</th>
						<th>Equipe 2</th>
						<th>Lieu</th>
						<th>Date</th>
						<th>Poule</th>
					</tr>
				</thead>
			
			</table>
A;
echo '</div>';
/*
 *
 * echo '<div class="container">
 *
 * <form action="?page=signup" method="post" class="form-signin"
 * oninput="mdp2.setCustomValidity(mdp2.value != mdp1.value ?' . ' Les mots de passe diffèrent.' . ' : \'
 * \')"> ';
 *
 * echo '<h2 class="form-signin-heading">Formulaire d\'inscription</h2>
 * <input type="email" id="inputEmail" name="email" value= class="form-control" placeholder="Adresse email" required autofocus>
 *
 * <input type="text" id="login" name="login" value="' . $login . '" class="form-control" placeholder="Login" required>
 * <select id="sport" name="sport" value="' . $sport . '" class="form-control" placeholder="Sport" required>
 * <option value="basketball">Basketball</option>
 * <option value="volleyball">Volleyball</option>
 * <option value="football">Football</option>
 *
 * </select>
 * <input type="text" id="prenom" name="prenom" value="' . $prenom . '" class="form-control" placeholder="Prénom" required>
 * <input type="text" id="nom" name="nom" value="' . $nom . '" class="form-control" placeholder="Nom" required>
 * <select id="categorie" name="categorie" value="' . $categorie . '" class="form-control" placeholder="Catégorie" required>
 * <option value="coach">Coach</option>
 * <option value="joueur">Joueur</option>
 * <option value="supporter">Supporter</option>
 *
 * </select>
 * <input type="date" id="naissance" name="naissance" value="' . $naissance . '" class="form-control" placeholder="YYYY-MM-DD" required>
 * <input type="text" id="equipe" name="equipe" value="' . $equipe . '" class="form-control" placeholder="Equipe" required>
 *
 * <label for="password1">Mot de passe:</label>
 * <input type="password" id="password1" name="mdp1" class="form-control" required>
 * <label for="password2">Confirmez votre mot de passe:</label>
 * <input type="password" id="password2" name="mdp2" class="form-control" required>
 *
 * <button class="btn btn-lg btn-primary btn-block" type="submit">M\'inscrire</button>
 * </form>
 *
 * </div> <!-- /container -->';
 */
?>