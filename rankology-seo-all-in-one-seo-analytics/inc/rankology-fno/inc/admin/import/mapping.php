<?php
/**
 * Generic mappings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add generic mappings.
 *
 * 
 * @param array $mappings Importer columns mappings.
 * @return array
 */
function rankology_importer_generic_mappings( $mappings ) {
	$generic_mappings = array(
		__( 'Title', 'wp-rankology' )         => 'name',
	);

	return array_merge( $mappings, $generic_mappings );
}
add_filter( 'rankology_csv_metadata_import_mapping_default_columns', 'rankology_importer_generic_mappings' );
