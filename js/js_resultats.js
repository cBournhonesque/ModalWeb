
/*
 * Editor client script for DB table rencontre
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": "php/table.match.php",
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
				"label": "Vainqueur",
				"name": "vainqueur"
			},

			{
				"label": "Score 1",
				"name": "score1"
			},

			{
				"label": "Score 2",
				"name": "score2"
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
			},
			{
				"label": "Commentaire",
				"name": "commentaire"
			}
		]
	} );

	$('#rencontre').DataTable( {
		"dom": "Tfrtip",
		"ajax": "php/table.match.php",
		"columns": [
			{
				"data": "equipe1"
			},
			{
				"data": "equipe2"
			},
			{
				"data": "vainqueur"
			},
			{
				"data": "score1"
			},
			{
				"data": "score2"
			},
			{
				"data": "lieu"
			},
			{
				"data": "date"
			},
			{
				"data": "poule"
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

