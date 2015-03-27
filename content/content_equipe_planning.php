<h1>Planning des entraînements</h1>
<?php
$train = Rencontre::getEntrainements ( $dbh );
?>

<script>
      		$(function(){
      		var evenements = <?php echo json_encode($train); ?>;
      		var myEvents = [];
				
			for ( var i = 0; i < evenements.length; ++i ){ 
				var one = evenements[i];
	    		var obj = new Object();
	    		obj.title = evenements[i].commentaire; 
	    		obj.start = evenements[i].date +" "+ evenements[i].heure;
	    		obj.end = evenements[i].date +" "+ evenements[i].duree;
	    		obj.id = "train";
	    		myEvents[i] = obj;
			}
				
			
	 		$("#calendar").fullCalendar({
          		header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultView: 'agendaWeek',
				weekends: false,
				height: 500,
				minTime: "08:00:00",
				maxTime: "22:00:00",
				defaultTimedEventDuration: '01:30:00',
				forceEventDuration: true,
				allDayText: 'Toute la journée',
          		events:  function(start, end, timezone, callback) {
   		            // When requested, dynamically generate events
		           		
				    var eve = JSON.parse(JSON.stringify(myEvents));
					var n = eve.length;
						for(i=0; i<n; i++){											
							
							for(j=0; j<10;j++){
								var eventStart = moment(eve[i].start);
								var eventStartP = moment(eve[i].start);
								var next = eventStart.add(7*(j+1), 'days');
								
								var prev= eventStartP.subtract(7*(j+1), 'days');
								var titre = eve[i].title;
								
							
								if(next.isBefore(end) && next.isAfter(start) ){
									eve.push({
									title : titre,
									start: next,
									id: "train"
									});
								}
								if(prev.isBefore(end) && prev.isAfter(start) ){
									eve.push({
									title : titre,
									start: prev,
									id: "train"
									});
								}
								
							}
		          	  	}
		          	 
		          
		            callback( eve );
		        },
          		editable: true,       
          		});



      		});
          	</script>

<div id='calendar'></div>

<div id='calendarButtons'>


	<button id="but1" class="btn btn-default" type="submit">Ajouter</button>
	<button id="but2" class="btn btn-default" type="submit">Enlever</button>

</div>

<h1>Planning des matchs de la <?php echo $_SESSION['equipe']; ?></h1>
<table cellpadding="0" cellspacing="0" border="0" class="display"
	id="rencontre" width="100%">
	<thead>
		<tr>
			<th>Equipe 1</th>
			<th>Equipe 2</th>
			<th>Lieu</th>
			<th>Date</th>
			<th>Heure</th>
			<th>Poule</th>
			<th>Commentaire</th>
		</tr>
	</thead>

</table>



