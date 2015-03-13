
/*
 * Editor client script for DB table rencontre
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": "php/table.rencontre.php",
		"table": "#rencontre",
		"fields": [
			{
				"label": "Equipe 1",
				"name": "equipe1"
			},
			{
				"label": "Equipe 2",
				"name": "equipe2"
			},
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
				"label": "Poule",
				"name": "poule"
			}
		]
	} );

	$('#rencontre').DataTable( {
		"dom": "Tfrtip",
		"ajax": "php/table.rencontre.php",
		"columns": [
			{
				"data": "equipe1"
			},
			{
				"data": "equipe2"
			},
			{
				"data": "lieu"
			},
			{
				"data": "date"
			},
			{
				"data": "poule"
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

