<?php
/*
Plugin Name: Arbitrary Shortcodes
Plugin URI: http://philfreo.com/blog/arbitrary-shortcodes/
Description: Replaces Shortcodes with Homepage Custom Fields. 
             
             For all the custom fields entered on the home page, this plugin looks for 
             shortcodes (in all pages) and replaces each of their values, upon output, 
             with the relevant custom field value. 
             
             Useful for if you want to fill many pages with text that includes an 
             arbitrary number of shortcodes.  All the values can be replaced in one 
             place, by editing the home page's Custom Fields.
Version: 1.0
Author: Phil Freo
Author URI: http://philfreo.com
*/


// Get home page custom fields and values
$homePageCustomFields = get_post_custom(get_option('page_on_front'));

/**
 * Gets called when shortcode is parsed by Wordpress. Replaces shortcode with value of custom field from homepage.
 * @return string the custom field value to be displayed in place of the given shortcode
 * @param array $attribs
 * @param string $innercontent
 * @param string $tagname
 */
function shortcode_replace_func($attribs, $innercontent, $tagname) {
    // Return value associated with custom field called $tagname
    global $homePageCustomFields;
	return $homePageCustomFields[$tagname][0];
}

// For each of the home page's custom fields, register a new shortcode
foreach(array_keys($homePageCustomFields) as $customField) {
    // Wordpress uses (hidden) custom fields starting with an underscore; ignore these
    if ($customField[0] == '_') {
        continue;
    }
    
    // Register shortcode with Wordpress
    add_shortcode($customField, 'shortcode_replace_func');
}

