
/*
 * Editor client script for DB table rencontre
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": "php/table.entrainement.php",
		"table": "#entrainement",
		"fields": [
			{
				"label": "Lieu",
				"name": "lieu"
			},
			{
				"label": "Date",
				"name": "date",
				"dateFormat": "dd-mm-Y"
			},
			{
				"label": "Heure",
				"name": "heure"
			},
			{
				"label": "Commentaire",
				"name": "commentaire"
			}
		]
	} );

	$('#rencontre').DataTable( {
		"dom": "Tfrtip",
		"ajax": "php/table.entrainement.php",
		"columns": [
			{
				"data": "lieu"
			},
			{
				"data": "date"
			},
			{
				"data": "heure"
			},
			{
				"data": "commentaire"
			}
		],
		"tableTools": {
			"sRowSelect": "os",
			"aButtons": [
				{ "sExtends": "editor_create", "editor": editor },
				{ "sExtends": "editor_edit",   "editor": editor },
				{ "sExtends": "editor_remove", "editor": editor }
			]
		}
	} );
} );

}(jQuery));

