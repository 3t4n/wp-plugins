<?php
/*
Plugin Name: Multi-Author Override
Description: Simple plugin providing the option to manually set whether the theme should treat the blog as having a single or multiple authors, regardless of the true number.
Version: 0.2
Author: Simon Wood
Author URI: http://www.simonwood.info
License: GPL2
*/

/*  Copyright 2014 Simon Wood (email : wp-plugins@simonwood.info)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('admin_menu', 'override_multi_author_menu');

// Add options page for the plugin under the 'Settings' menu
function override_multi_author_menu() {
	add_options_page('Multi Author Override Options', 'Multi Author Override', 'manage_options', 'multi-author-override.php', 'multi_author_override_options');
}

function multi_author_override_options() {
    ?>
    <div class="wrap">
        <h2>DTC Posts & Fields Options</h2>
        <form action="options.php" method="POST">
            <?php settings_fields( 'multi-author-override.php' ); ?>
            <?php do_settings_sections( 'multi-author-override.php' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php

}


function mao_settings_setup() {

 	// Add the settings section
 	add_settings_section(
		'mao_settings_section_options',
		'Options',
		'mao_settings_section_options',
		'multi-author-override.php'
	);
 	
 	// Add the settings field
 	add_settings_field(
		'multi_author_override',
		'Display single/multi author',
		'multi_author_override',
		'multi-author-override.php',
		'mao_settings_section_options'
	);
 	
 	// Register our setting so that $_POST handling is done for us and
 	// our callback function just has to echo the <input>
 	register_setting( 'multi-author-override.php', 'multi_author_override' );
}
add_action( 'admin_init', 'mao_settings_setup' );

function mao_settings_section_options() {
	echo 		'Some themes only display some elements for a multi-author blog (e.g. the author profile on Twenty Ten, Twently Eleven, Twenty Twelve). You can set this option to force Wordpress to display these elements as if it were a single/multi author blog, regardless of whether there are posts by multiple authors or not.';
}

function multi_author_override() {
    $opt_name = 'multi_author_override';
    $data_field_name = 'multi_author_override';
    // Read in existing option value from database
    $opt_val = get_option( $opt_name ); 
	// Present options to choose as radio buttons
	$options = array('default' => 'Auto', 'single' => 'Always display as if single author', 'multi' => 'Always display as if multi author');
	foreach ($options as $key=>$option) {
		$checked = "";
		if ($opt_val == $key)
			$checked = " checked";
		$html .= "<input type=\"radio\" name=" . $data_field_name . " value=\"" . $key . "\" " . $checked . ">" . $option . "<br/>";
	}
	echo $html;
}

add_filter('is_multi_author', 'override_multi_author');
function override_multi_author($is_multi_author) {
	$override_option = get_option('multi_author_override');
	// If this option is set to multi, always return true
	if ( $override_option == 'multi' )
		return true;
	// If this option is set to single, always return true
	if ( $override_option == 'single' )
		return false;
	// Otherwise, the option is presumably set to default, so pass the value through unfiltered
	return $is_multi_author;	
}


?>