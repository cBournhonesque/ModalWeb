<?php
echo <<<HEADING

<link rel="stylesheet" href="css/css_equipe.css">
		
		
		
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="DataTables-1.10.5/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="Editor/css/dataTables.editor.css">
		
<!-- FullCalendar CSS -->
<link rel="stylesheet" type="text/css" href="fullcalendar-2.3.1/fullcalendar.css">
<link href='http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.print.css' rel='stylesheet' media='print' />

<!-- DataTables JS -->
<script type="text/javascript" language="javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" charset="utf8" src="DataTables-1.10.5/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" charset="utf-8" src="Editor/js/dataTables.editor.min.js"></script>

<!-- Bootbox -->	
<script type="text/javascript" language="javascript" src="js/bootbox.min.js"></script>

<!-- Tables -->
<script type="text/javascript" charset="utf-8" src="js/table.rencontre.js"></script>
<script type="text/javascript" charset="utf-8" src="js/table.utilisateurs.js"></script>
		
<!-- FullCalendar JS -->
<script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script type="text/javascript" charset="utf-8" src="fullcalendar-2.3.1/fullcalendar.js"></script>

		

HEADING;

?>

<script type="text/javascript">
$(function() {

$(document).on("click", "#but1", function(e) {
bootbox.dialog({
    title: "Ajouter un entraînement",
    message: '<div class="row">  ' +
        '<div class="col-md-12"> ' +
        '<form class="form-horizontal" method="post" name="form" action=""> ' +
        '<div class="form-group"> ' +
        '<label class="col-md-4 control-label" for="date">Date</label> ' +
        '<div class="col-md-4"> ' +
        '<input required id="date" name="date" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md"> ' +
        '</div> ' +
        '</div> ' +
        '<div class="form-group"> ' +
        '<label class="col-md-4 control-label" for="heure">Heure</label> ' +
        '<div class="col-md-4"> ' +
        '<input required id="heure" name="heure" type="text" placeholder="HH:MM:SS" class="form-control input-md"> ' +
        '</div> ' +
        '</div> ' +
        '<div class="form-group"> ' +
        '<label class="col-md-4 control-label" for="duree">Durée</label> ' +
        '<div class="col-md-4"> ' +
        '<input id="duree" name="duree" type="text" placeholder="HH-MM-SS" class="form-control input-md"> ' +
        '</div> ' +
        '</div> ' +
        '<div class="form-group"> ' +
        '<label class="col-md-4 control-label" for="lieu">Lieu</label> ' +
        '<div class="col-md-4"> ' +
        '<input required id="lieu" name="lieu" type="text" placeholder="Grand Gymnase" class="form-control input-md"> ' +
        '</div> ' +
        '</div> ' +
        '<div class="form-group"> ' +
        '<label class="col-md-4 control-label" for="commentaire">Commentaire</label> ' +
        '<div class="col-md-4"> ' +
        '<input id="commentaire" name="commentaire" type="text" placeholder="comment" class="form-control input-md"> ' +
        '</div> ' +
        '</div> ' +
        '<div class="form-group"> ' +
        '<label class="col-md-4 control-label" for="recurring">Hebdomadaire?</label> ' +
        '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
        '<input type="radio" name="recurring" id="recurring-0" value="TRUE" checked="checked"> ' +
        'Oui </label> ' +
        '</div><div class="radio"> <label for="recurring-1"> ' +
        '<input type="radio" name="recurring" id="recurring-1" value="FALSE"> Non </label> ' +
        '</div> ' +
        '</div> </div>' +
        '</form> </div>  </div>',
    buttons: {
        success: {
            label: "Enregistrer",
            className: "btn-success",
            callback: function () {
            	var date = $("#date").val();
            	var heure = $("#heure").val();
            	var duree = $("#duree").val();
            	var lieu = $("#lieu").val();
            	var commentaire = $("#commentaire").val();
            	var hebdo = $("input[name='recurring']:checked").val()
            	
            	// Returns successful data submission message when the entered information is stored in database.
            	var dataString = 'date1='+ date + '&heure1='+ heure+ '&hebdo1='+ hebdo + '&duree1='+ duree + '&lieu1='+ lieu + '&commentaire1='+ commentaire;
            	if(date==''||heure=='')
            	{
            	alert("Remplissez la date, l'heure et le lieu");
            	}
            	else
            	{
            		// AJAX Code To Submit Form.
            		$.ajax({
            		type: "POST",
            		url: "php/php_equipe_ajax.php",
            		data: dataString,
            		cache: false,	       
            		});
            	}
            	
            }
        }
    }
}
);
});
	
});



</script>



<script type="text/javascript">
$(function(){
  $('#sidemenu a').on('click', function(e){
    e.preventDefault();

   

    if($(this).hasClass('open')) {
      // do nothing because the link is already open
    } else {
      var oldcontent = $('#sidemenu a.open').attr('href');
      var newcontent = $(this).attr('href');
      
      $(oldcontent).fadeOut('fast', function(){
        $(newcontent).fadeIn().removeClass('hidden');
        if(newcontent == "#equipePlanning"){
        $('#calendar').fullCalendar('render');}
        $(oldcontent).addClass('hidden');
      });
      
     
      $('#sidemenu a').removeClass('open');
      $(this).addClass('open');
    }
    
  });
});
</script>