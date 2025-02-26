<?php
/**
* Plugin Name: Hawaiian Characters
* Description: Adds the correct characters / diacriticals to the WordPress Editor for use in Hawaiian
* Plugin URI: https://mrwweb.com/hawaiian-characters-new-wordpress-plugin/
* Version: 2.0.1
* Author: Mark Root-Wiley, MRW Web Design, NonprofitWP.org
* Author URI: https://MRWweb.com
* Donate Link: http://kuahawaii.org
* License: GPLv3
* Text Domain: hawaiian-characters
*/

/**
 * returns master list of characters including character name, hex, entity
 *
 * Specifically formatted for block editor needs
 * Can be easily transformed (see hc_tinymce_init())
 */
function hc_characters() {

	return array(
		esc_html_x( 'Hawaiian', 'Name of language', 'hawaiian-characters' ) => array(
			array(
				'char' => 'Ā',
				'name' => esc_html__( 'Capital Long A with Kahako', 'hawaiian-characters' ),
				'entity' => '&256;',
				'hex' => '&#0x100;',
			),
			array(
				'char' => 'ā',
				'name' => esc_html__( 'Lowercase Long a with Kahako', 'hawaiian-characters' ),
				'entity' => '&257;',
				'hex' => '&#0x101;',
			),
			array(
				'char' => 'Ē',
				'name' => esc_html__( 'Capital Long E with Kahako', 'hawaiian-characters' ),
				'entity' => '&274;',
				'hex' => '&#0x112;',
			),
			array(
				'char' => 'ē',
				'name' => esc_html__( 'Capital Long e with Kahako', 'hawaiian-characters' ),
				'entity' => '&275;',
				'hex' => '&#0x113;',
			),
			array(
				'char' => 'Ī',
				'name' => esc_html__( 'Capital Long I with Kahako', 'hawaiian-characters' ),
				'entity' => '&298;',
				'hex' => '&#0x12A;',
			),
			array(
				'char' => 'ī',
				'name' => esc_html__( 'Lowercase Long i with Kahako', 'hawaiian-characters' ),
				'entity' => '&299;',
				'hex' => '&#0x12B;',
			),
			array(
				'char' => 'Ō',
				'name' => esc_html__( 'Capital Long O with Kahako', 'hawaiian-characters' ),
				'entity' => '&332;',
				'hex' => '&#0x14C;',
			),
			array(
				'char' => 'ō',
				'name' => esc_html__( 'Capital Long o with Kahako', 'hawaiian-characters' ),
				'entity' => '&333;',
				'hex' => '&#0x14D;',
			),
			array(
				'char' => 'Ū',
				'name' => esc_html__( 'Capital Long U with Kahako', 'hawaiian-characters' ),
				'entity' => '&362;',
				'hex' => '&#0x16A;',
			),
			array(
				'char' => 'ū',
				'name' => esc_html__( 'Capital Long u with Kahako', 'hawaiian-characters' ),
				'entity' => '&363;',
				'hex' => '&#0x16B;',
			),
			array(
				'char' => 'ʻ',
				'name' => esc_html__( 'ʻOkina', 'hawaiian-characters' ),
				'entity' => '&699;',
				'hex' => '&#0x2BB;',
			),
		)
	);
	
}

add_filter( 'tiny_mce_before_init', 'hc_tinymce_init' );
/**
 * add new characters to end of charmap
 */
function hc_tinymce_init( $settings ) {

	$master_array = hc_characters();

	$tinymce = array();
	foreach( $master_array[ esc_html_x( 'Hawaiian', 'Name of language', 'hawaiian-characters' ) ] as $char ) {
		$tinymce[] = array(
			'0' . substr( $char['entity'], 1, 3 ), // converts "&123;" to "123"
			array( $char['name'] )
		);
	}

	$settings['charmap_append'] = json_encode( $tinymce );

	return $settings;

}

add_action( 'enqueue_block_editor_assets', 'hc_block_editor_styles' );
/**
 * enqueue block editor configuration of Insert Special Characters plugin
 */
function hc_block_editor_styles() {

	wp_register_script(
		'hawaiian-characters-block-editor',
		plugins_url( 'js/hawaiian-characters-block-editor.js', __FILE__ ),
		array(),
		'20190922',
		true
	);

	wp_localize_script( 'hawaiian-characters-block-editor', 'hiCharMap', hc_characters() );

	wp_enqueue_script( 'hawaiian-characters-block-editor' );

}