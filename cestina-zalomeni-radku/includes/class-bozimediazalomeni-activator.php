<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.bozimedia.cz
 * @since      1.0.0
 *
 * @package    Bozimediazalomeni
 * @subpackage Bozimediazalomeni/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bozimediazalomeni
 * @subpackage Bozimediazalomeni/includes
 * @author     Marek Vratil <marek.vratil@gmail.com>
 */

class Bozimediazalomeni_Activator {

    /**
     * Default data for plugin configuration
     *
     * @since    1.0.0
     */
    const default_prepositions                 = 'on';
    const default_prepositions_list            = 'k, s, v, z';
    const default_conjunctions                 = '';
    const default_conjunctions_list            = 'a, i, o, u';
    const default_abbreviations                = '';
    const default_abbreviations_list           = 'cca., č., čís., čj., čp., fa, fě, fy, kupř., mj., např., p., pí, popř., př., přib., přibl., sl., str., sv., tj., tzn., tzv., zvl.';
    const default_between_number_and_unit      = 'on';
    const default_between_number_and_unit_list = 'm, m², l, kg, h, °C, Kč, lidí, dní, %';
    const default_spaces_in_scales             = 'on';
    const default_space_between_numbers        = 'on';
    const default_space_after_ordered_number   = 'on';
    const default_matches                      = '';
    const default_replacements                 = '';
    
    // 3rd plugins
    //ACF
    const default_acf                          = '';
    const default_acf_the_content              = 'acf_the_content';
    
    
	/**
	 * Install plugin basic data
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
	   
	    // check PHP version
	    $required_php_version = '7';
	    if (version_compare(phpversion(), $required_php_version, '<')):
	        die(str_replace(array("%1", "%2"), array($required_php_version, phpversion()), __("Plugin BožíMédia Zalomení vyžaduje PHP verze %1 nebo vyšší. Na tomto webu je nainstalováno PHP verze %2", "bozimediazalomeni")));
	    endif;
	    
	    // Add options to database
	    Bozimediazalomeni_Activator::add_options();
	    
	}
	
	/**
	 * ADD plugin options to database
	 *
	 * @since    1.0.0
	 */
	private static function add_options() {
	    
	    add_option('bozimediazalomeni_prepositions',                   Bozimediazalomeni_Activator::default_prepositions);
	    add_option('bozimediazalomeni_prepositions_list',              Bozimediazalomeni_Activator::default_prepositions_list);
	    add_option('bozimediazalomeni_conjunctions',                   Bozimediazalomeni_Activator::default_conjunctions);
	    add_option('bozimediazalomeni_conjunctions_list',              Bozimediazalomeni_Activator::default_conjunctions_list);
	    add_option('bozimediazalomeni_abbreviations',                  Bozimediazalomeni_Activator::default_abbreviations);
	    add_option('bozimediazalomeni_abbreviations_list',             Bozimediazalomeni_Activator::default_abbreviations_list);
	    add_option('bozimediazalomeni_between_number_and_unit',        Bozimediazalomeni_Activator::default_between_number_and_unit);
	    add_option('bozimediazalomeni_between_number_and_unit_list',   Bozimediazalomeni_Activator::default_between_number_and_unit_list);
	    add_option('bozimediazalomeni_spaces_in_scales',               Bozimediazalomeni_Activator::default_spaces_in_scales);
	    add_option('bozimediazalomeni_space_between_numbers',          Bozimediazalomeni_Activator::default_space_between_numbers);
	    add_option('bozimediazalomeni_space_after_ordered_number',     Bozimediazalomeni_Activator::default_space_after_ordered_number);
	    add_option('bozimediazalomeni_matches',                        Bozimediazalomeni_Activator::default_matches);
	    add_option('bozimediazalomeni_replacements',                   Bozimediazalomeni_Activator::default_replacements);
	    add_option('bozimediazalomeni_acf',                            Bozimediazalomeni_Activator::default_acf );
	    add_option('bozimediazalomeni_acf_the_content',                Bozimediazalomeni_Activator::default_acf_the_content);
	    
	}

}
