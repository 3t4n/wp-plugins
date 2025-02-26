<?php

/**
* Triggers when activate the plugin.
*
*@package AwesomeRecipePlugin
*/

function arpcpt_awesome_recipe_activation(){

	// Check WordPress version and display a message if current version is not compatible.
	if ( version_compare( get_bloginfo( 'version' ), 4.8, '<') ){
		wp_die( 'You must update WordPress to use this plugin.' );
	}


 flush_rewrite_rules();


    // creating database tables for rating.
    global $wpdb;
    $arpcpt_charset_collate = $wpdb->get_charset_collate();
    $arpcpt_createSQL = "

    CREATE TABLE IF NOT EXISTS `". $wpdb->prefix ."arpcpt_awesome_recipe_ratings` (
	`ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`arpcpt_recipe_id` BIGINT(20) UNSIGNED NOT NULL,
	`arpcpt_rating` FLOAT(3,2) UNSIGNED NOT NULL,
	`arpcpt_user_ip` VARCHAR(32) NOT NULL,
	PRIMARY KEY (`ID`)
	) ENGINE=InnoDB AUTO_INCREMENT=1 $arpcpt_charset_collate; 

	";

	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

	dbDelta( $arpcpt_createSQL ); 


	// Create DB table for storing recipe settings
	$arpcpt_createSQL = "

	CREATE TABLE IF NOT EXISTS `". $wpdb->prefix ."arpcpt_awesome_recipe_styles` (

		`ID` BIGINT(20) NOT NULL,
		`arpcpt_header_background` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_header_font_size` INT(2) NULL DEFAULT NULL,
		`arpcpt_header_font_style` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_header_font_color` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_icon_color` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_list_font_size` INT(2) NULL DEFAULT NULL,
		`arpcpt_recipe_card_title_color` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_recipe_card_title_font_size` INT(2) NULL DEFAULT NULL,
		`arpcpt_recipe_card_title_font_style` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_recipe_card_number_of_posts` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_recipe_card_border_color` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_recipe_card_height` INT(3) NULL DEFAULT NULL,
		`arpcpt_recipe_card_width` INT(2) NULL DEFAULT NULL,
		`arpcpt_recipe_card_excerpt_text_color` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_read_more_link_color` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_pagination_background_color` VARCHAR(50) NULL DEFAULT NULL,
		`arpcpt_recipe_card_background_color` VARCHAR(50) NULL DEFAULT NULL,

		PRIMARY KEY (`ID`)
	)
	ENGINE=InnoDB AUTO_INCREMENT=1 $arpcpt_charset_collate;

	";

	/** WordPress Schema API */
	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

	dbDelta( $arpcpt_createSQL ); // Run the SQL query





	// Getting row data 

	$arpcpt_styles = $wpdb->get_row(
						"SELECT * FROM `". $wpdb->prefix ."arpcpt_awesome_recipe_styles`
						ORDER BY id DESC LIMIT 1"
						); 



	if (empty($arpcpt_styles)){ // checks if the table row has data or not

		// Insert default data
		$arpcpt_insert = "

		INSERT INTO `". $wpdb->prefix ."arpcpt_awesome_recipe_styles` (`ID`, `arpcpt_header_background`, `arpcpt_header_font_size`, `arpcpt_header_font_style`, `arpcpt_header_font_color`, `arpcpt_icon_color`, `arpcpt_list_font_size`, `arpcpt_recipe_card_title_color`, `arpcpt_recipe_card_title_font_size`, `arpcpt_recipe_card_title_font_style`, `arpcpt_recipe_card_number_of_posts`, `arpcpt_recipe_card_border_color`, `arpcpt_recipe_card_height`, `arpcpt_recipe_card_width`, `arpcpt_read_more_link_color`, `arpcpt_pagination_background_color`, `arpcpt_recipe_card_background_color`, `arpcpt_recipe_card_excerpt_text_color` ) VALUES
		(1, '#D80027', '18', 'uppercase', '#FFFFFF', '#D80027', 14, '#D80027', 18, 'uppercase', 6, '#c7c7c7', '510', '31', '#D80027', '#D80027', '#FFFFFF', '#8A8A8A' );

		";

		/** WordPress Schema API */
		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

		dbDelta( $arpcpt_insert ); // Run the SQL query

		}else{

		
	}


}
