<?php 
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
use WOOS\Library\WOOSGetFunction;
/**
* Setting Data
* Feature added by : Joy Shaha joysaha7302@gmail.com
* Date       : 22.04.2020
*/
function woos_setting_data($name){
    return WOOSGetFunction::woos_last_code_get_settings($name);
}
/**
* Post Table
* Feature added by : Joy Shaha joysaha7302@gmail.com
* Date       : 21.04.2020
*/
function woos_post_table(){
	return WOOSGetFunction::woos_last_code_post_table();
}
/**
* term_relationships
* Feature added by : Joy Shaha joysaha7302@gmail.com
* Date       : 21.04.2020
*/
function woos_term_relationships(){
	return WOOSGetFunction::woos_last_code_term_relationships();
}
/**
* term_taxonomy
* Feature added by : Joy Shaha joysaha7302@gmail.com
* Date       : 21.04.2020
*/
function woos_term_taxonomy(){
	return WOOSGetFunction::woos_last_code_term_taxonomy();
}
/**
* terms
* Feature added by : Joy Shaha joysaha7302@gmail.com
* Date       : 21.04.2020
*/
function woos_terms(){
	return WOOSGetFunction::woos_last_code_terms();
}
/**
* postmeta
* Feature added by : Joy Shaha joysaha7302@gmail.com
* Date       : 21.04.2020
*/
function woos_postmeta(){
	return WOOSGetFunction::woos_last_code_postmeta();
}
/**
* Content Short
* Feature added by : Joy Shaha joysaha7302@gmail.com
* Date       : 23.04.2020
*/
function woos_shorten_text($text , $no_of__limit){
    return WOOSGetFunction::woos_last_code_shorten_text($text , $no_of__limit);
}

/**
 * Category
 * @return string
 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 * Date : 21.04.2020
*/
function woos_get_product_category(){
    return WOOSGetFunction::woos_last_code_product_categories_hierarchy();
}
function woos_list_taxonomy_hierarchy_no_instance($taxonomies){
    return WOOSGetFunction::woos_last_code_list_taxonomy_hierarchy_no_instance($taxonomies);
}

?>