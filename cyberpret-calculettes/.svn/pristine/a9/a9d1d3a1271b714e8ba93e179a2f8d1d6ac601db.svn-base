<?php
/*
Plugin Name: Cyberpret - Calculettes
Plugin URI:  http://www.cyberpret.com/wp-plugins.html
Description: Permet de calculer de choisir et d'installer plusieurs calculatrices autour du prêt immobilier. Le paramétrage se fait dans le menu Réglages de Wordpress
Version:    1.5.2
Author:     Cyberpret.com
Author URI:  https://www.cyberpret.com/
License: GPL3
Text Domain: cyberpretCalculettes

This plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or any later version.
 
This plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 
To find a copy of the GNU General Public License see http://www.cyberpret.com/wp-plugins.html.
*/

define("CYBERPRETCALC_VERSION","1.5.2"); 

// Activation
register_activation_hook( __FILE__, 'cyberpretCalculettes_activation' );
register_deactivation_hook( __FILE__, 'cyberpretCalculettes_desactivation' );

/////////////////////
// Fonctions
////////////////////

// Activation du plugin
function cyberpretCalculettes_setup_post_types() 
{
    // Register our "book" custom post type
    register_post_type( 'book', array( 'public' => 'true' ) );
	
	// Font-Awesome
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
 
    // CSS
	wp_register_style('cyberpretStyles', plugins_url('css/cyberpretStyles.css', __FILE__));
    wp_enqueue_style('cyberpretStyles');

}
add_action( 'init', 'cyberpretCalculettes_setup_post_types' );

function cyberpretCalculettes_activation()
{
	// Trigger our function that registers the custom post type
	cyberpretCalculettes_setup_post_types();

	// Clear the permalinks after the post type has been registered
	flush_rewrite_rules();	
}

// Désactivation du plugin
function cyberpretCalculettes_desactivation()
{
	// Our post type will be automatically removed, so no need to unregister it

	// Clear the permalinks to remove our post type's rules
	flush_rewrite_rules();	
}

/////////////////////////////////
// Menu, variables, scripts
/////////////////////////////////

function cyberpretCalculettes_add_my_custom_menu() {
	// Sous menu dans les options de "Réglages"
	add_options_page(
		'Calculettes - Cyberpret', 'Calculettes Cyberpret', 'manage_options', 'cyberpretCalculettesAdmin', 'cyberpretCalculettesAdminPage'
	);
}
add_action( 'admin_menu', 'cyberpretCalculettes_add_my_custom_menu' );

add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
function wptuts_add_color_picker( $hook ) {
 
	// Add the color picker css file       
	wp_enqueue_style( 'wp-color-picker' ); 
	 
	// Include our custom jQuery file with WordPress Color Picker dependency
	wp_enqueue_script( 'custom-script-handle', plugins_url( 'custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 

	// Clipboard-master
	wp_register_script('clipboard_master', plugins_url('js/clipboard-master/clipboard.min.js', __FILE__), array('jquery'),'2.6.1');
	wp_enqueue_script('clipboard_master');

}

function cyberpretCalculettes_register_my_setting() 
{
	register_setting( 'cyberpretCalculettes-settings-group', 'devise', '' );
	register_setting( 'cyberpretCalculettes-settings-group', 'localization', '' );
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurFond', 'cyb_sanitize_hex_color' );
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurP', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurLien', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurLienHover', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurH2', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurH3', 'cyb_sanitize_hex_color' );
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurH4', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurChamp', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurMiseValeur1', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurEncadrement', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurEncadrementFond', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurErreur', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurTableTh', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurTableImpaires', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'couleurTablePaires', 'cyb_sanitize_hex_color' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'lienCyberpret', '' ); 
	register_setting( 'cyberpretCalculettes-settings-group', 'noH2', '' );
	register_setting( 'cyberpretCalculettes-settings-group', 'tableau_amortissement', '' );
} 
add_action( 'admin_init', 'cyberpretCalculettes_register_my_setting' );

// Est-ce un code couleur ?
if ( ! function_exists( 'cyb_sanitize_hex_color' ) ) 
{
    function cyb_sanitize_hex_color( $color ) 
	{
        //return $color;
		if ( '' === $color )
            return '';

        // 3 or 6 hex digits, or the empty string.
        if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
            return $color;

        return null;
    }
}

//////////////
// Shortcode
//////////////
include_once(plugin_dir_path( __FILE__ )."admin/cyberpretShortcodes.php");

/////////////////////////
// Page d'administration
include_once(plugin_dir_path( __FILE__ )."admin/cyberpretAdmin.php");
?>