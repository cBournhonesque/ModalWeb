<?php

/*
 * Editor server script for DB table rencontre
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
Editor::inst( $db, 'rencontre', 'cle' )
	->fields(
			Field::inst( 'equipe1' ),
		Field::inst( 'equipe2' ),
		Field::inst( 'vainqueur' ),
		Field::inst( 'score1' ),
		Field::inst( 'score2' ),
		Field::inst( 'lieu' ),
		Field::inst( 'date' )
			->validator( 'Validate::dateFormat', array( 'format'=>'d-m-Y' ) )
			->getFormatter( 'Format::date_sql_to_format', 'd-m-Y' )
			->setFormatter( 'Format::date_format_to_sql', 'd-m-Y' ),
		Field::inst( 'poule' ),
		Field::inst( 'commentaire' )
	)
	->where("equipe2",null,'!=')
	->process( $_POST )
	->json();