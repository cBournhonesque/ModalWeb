<?php
echo '<h1> Résultat des matchs </h1>';
echo '<div id=dataTableDiv1 class="container">';
echo <<<A
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="rencontre" width="100%">
				<thead>
					<tr>
						<th>Equipe 1</th>
						<th>Equipe 2</th>
						<th>Vainqueur</th>
						<th>Score 1</th>
						<th>Score 2</th>
						<th>Lieu</th>
						<th>Date</th>
						<th>Poule</th>
						<th>Commentaire</th>
					</tr>
				</thead>
			
			</table>
A;
echo '</div>';

?>