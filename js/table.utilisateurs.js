
/* Editor client script for DB table utilisateurs
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": "php/table.utilisateurs.php",
		"table": "#utilisateurs",
		"fields": [
			{
				"label": "Nom",
				"name": "nom"
			},
			{
				"label": "Sport",
				"name": "sport",
				type: "hidden"
			},
			{
				"label": "Naissance",
				"name": "naissance",
				type: "hidden"
			},
			{
				"label": "Mdp",
				"name": "mdp",
				type: "hidden"
			},
			{
				"label": "Catégorie",
				"name": "categorie",
				type: "hidden"
			},
			{
				"label": "Equipe",
				"name": "equipe",
				type: "hidden"
			},
			{
				"label": "Prénom",
				"name": "prenom"
			},
			{
				"label": "Email",
				"name": "email"
			}
			
		]
	} );

	$('#utilisateurs').DataTable( {
		"dom": "Tfrtip",
		"ajax": "php/table.utilisateurs.php",
		"columns": [
			{
				"data": "nom"
			},
			{
				"data": "prenom"
			},
			{
				"data": "email"
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
