<h1>Annonces</h1>

<div class="panel-group" id="accordion" role="tablist"
		aria-multiselectable="true">
		<?php
			
		if($_SESSION['categorie']=='joueur'){
	$message1 = Message::getReceivedMessage($dbh, $_SESSION['login']);
	$message2 = Message::getReceivedMessage($dbh, $_SESSION['equipe']);
	$message = array_merge($message1, $message2);
}
elseif($_SESSION['categorie']=='Coach'){
	$message = Message::getSentMessage($dbh, $_SESSION['login']);
}
	
for($i=1; $i<=count($message);$i++){
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading" role="tab" id="heading'.$i.'">
							<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion"
									href="#collapse'.$i.'" aria-expanded="true"
									aria-controls="collapseOne">'. $message[$i - 1]->titre.'<span>'.$message[$i-1]->date.' - Destinataire: '.$message[$i - 1]->destinataire.'</span>
										</a>
							</h4>
					   </div>';
	echo '<div id="collapse'.$i.'" class="panel-collapse collapse"
						role="tabpanel" aria-labelledby="heading'.$i.'">
						<div class="panel-body">'.$message[$i - 1]->message.'</div>
					</div>';
	echo '</div>';
}
	
	
	
?>
			</div>