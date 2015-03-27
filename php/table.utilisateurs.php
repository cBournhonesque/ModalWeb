<?php

/*
 * Editor server script for DB table utilisateurs
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Join,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'utilisateurs', 'login' )
	->fields(
		Field::inst( 'mdp' ),
		Field::inst( 'sport' ),
		Field::inst( 'nom' ),
		Field::inst( 'prenom' ),
		Field::inst( 'naissance' ),
		Field::inst( 'email' ),
		Field::inst( 'categorie' ),
		Field::inst( 'equipe' )
		
	)
	->process( $_POST )
	->json();

?>