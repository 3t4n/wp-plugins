<?php
/**
 * Plugin Name: Kama WP Smiles
 * Description: Replace WP smiles. You can easily set your own package of smiles or select preferred from existing list.
 *
 * Author: Kama
 * Author URI: http://wp-kama.ru/
 * Plugin URI: http://wp-kama.ru/?p=18
 *
 * Text Domain: kama-wp-smile
 * Domain Path: /languages
 *
 * Requires PHP: 5.6
 *
 * Version: 1.9.14
 */

$data = get_file_data( __FILE__, [ 'ver' => 'Version', 'lang_dir' => 'Domain Path' ] );

define( 'KWS_VER', $data['ver'] );
define( 'KWS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'KWS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/Kama_WP_Smiles_Plugin.php';

if( is_admin() && ! defined( 'DOING_AJAX' ) ){
	require_once __DIR__ . '/Kama_WP_Smiles_Admin.php';
}

// init
add_action( 'init', 'kama_wp_smiles_init' );
function kama_wp_smiles_init(){

	remove_action( 'init',         'smilies_init',    5 );
	remove_filter( 'the_content',  'convert_smilies', 5 );
	remove_filter( 'the_excerpt',  'convert_smilies', 5 );
	remove_filter( 'comment_text', 'convert_smilies', 5 );

	kwsmile();
}


register_activation_hook( __FILE__, static function(){
	kwsmile()->activation();
} );




