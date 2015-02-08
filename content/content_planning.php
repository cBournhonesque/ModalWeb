<?php 
function afficher(){
	echo <<<FIN
		<h1>Planning des matchs</h1>
		<section>

			<table class="tabMatch table table-striped">
				<tr>
					<th class="tg-031e">Date</th>
					<th class="tg-031e">Equipe</th>
					<th class="tg-031e">Adversaire</th>
					<th class="tg-031e">Lieu</th>
					<th class="tg-031e">Poule</th>
					<th class="tg-031e">Commentaires</th>
				</tr>
				<tr class="danger">
					<td class="tg-031e">Jeudi 5 Février 2015</td>
					<td class="tg-031e">X1</td>
					<td class="tg-031e">Cachan 1</td>
					<td class="tg-031e">ENS Cachan</td>
					<td class="tg-031e">Excellence</td>
					<td class="tg-031e">Attention, match compliqué!</td>
				</tr>
				<tr>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
				</tr>
				<tr>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
				</tr>
				<tr>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
				</tr>
				<tr>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
				</tr>
				<tr>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
					<td class="tg-031e"></td>
				</tr>
			</table>


		</section>
FIN;
}
		?>