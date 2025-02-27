<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://www.bozimedia.cz
 * @since      1.0.0
 *
 * @package    Bozimediazalomeni
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}


function bozimediazalomeni_delete_plugin() {

    delete_option('bozimediazalomeni_prepositions');
    delete_option('bozimediazalomeni_prepositions_list');
    delete_option('bozimediazalomeni_conjunctions');
    delete_option('bozimediazalomeni_conjunctions_list');
    delete_option('bozimediazalomeni_abbreviations');
    delete_option('bozimediazalomeni_abbreviations_list');
    delete_option('bozimediazalomeni_between_number_and_unit');
    delete_option('bozimediazalomeni_between_number_and_unit_list');
    delete_option('bozimediazalomeni_spaces_in_scales');
    delete_option('bozimediazalomeni_space_between_numbers');
    delete_option('bozimediazalomeni_space_after_ordered_number');
    delete_option('bozimediazalomeni_matches');
    delete_option('bozimediazalomeni_replacements');
    delete_option('bozimediazalomeni_acf');
    delete_option('bozimediazalomeni_acf_the_content');
    
}

bozimediazalomeni_delete_plugin();