<?php
function afficher(){
	echo <<<FIN
	<!-- Jumbotron -->
		<div class="jumbotron">
			<div id="imageTop"></div>

			<div id="imageBot"></div>

			<h1>Bienvenue chez U Sports</h1>
			<p class="lead">U Sports est votre outil principal d'élaboration de
				stratégies sportives.</p>
			<p>
				<a class="btn btn-lg btn-success" href="#" role="button">Créer un
					compte</a>
			</p>
			<p>
				<a class="btn btn-lg btn-success" href="index.php?page=signin" role="button">Se
					connecter</a>

			</p>
		</div>


		<section>

			<div class="container">
				<h2>Actualités sportives</h2>
				<!-- Example row of columns -->
				<div class="row">
					<div class="col-lg-4">
						<h2>Victoire de la X1 Basketball</h2>
						<p>Au prix de lourds efforts, la X1 Basket a triomphé de l'équipe
							1 d'HEC lors d'un match acharné. D'après les mots du coach: "U
							Sports a joué un rôle crucial dans cette victoire!"</p>

						<p>
							<a class="btn btn-primary" href="#" role="button">Voir la feuille
								de match »</a>
						</p>
					</div>
					<div class="col-lg-4">
						<h2>Le Major Page est de nouveau champion du monde de CO</h2>
						<p>Le Major préféré de l'Ecole polytechnique a repris son trône et
							son souffle.</p>
						<p>
							<a class="btn btn-primary" href="#" role="button">Lire l'article
								»</a>
						</p>
					</div>
					<div class="col-lg-4">
						<h2>Thomas Bordier: Héros ou Zéro?</h2>
						<p>Les interrogations se multiplient au sujet de l'élève officier
							polytechnicien Thomas Bordier. En effet, les blessures à
							répétition risquent d'empêcher de réaliser tout son potentiel!</p>
						<p>
							<a class="btn btn-primary" href="#" role="button">Lire l'article
								»</a>
						</p>
					</div>
				</div>
			</div>
		</section>

	</div>
FIN;
}
?>