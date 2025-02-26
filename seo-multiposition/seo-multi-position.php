<?php
/*
	Plugin Name: SEO Multi Position
	Plugin URI: https://www.wp-love.it
	Description: Se avete una landing page da posizionare con una determinata parola chiave in tutte le provincie d'Italia, seo multiposition ve lo permette, risparmiando oltretutto molto tempo. Creando la landing page con contenuti e testi con all'interno la parola [[termine]](che rappresenta la variabile provincia) il plugin creerà in automatico una pagina per provincia(totale 120 pagine) andando a sostituire la variabile con il nome della città, che si andranno ad incizzare e posizionare. Potrete cosi gestire 120 pagine modificando una pagina solamente.
	Author: WP Love
	Version: 2.3.2
	Author URI: https://www.wp-love.it
	Text Domain: seo-multi-position
*/

global $wpdb;
global $wp_rewrite;

define( 'WPDP_PLUGIN_PATH', plugins_url('seo-multiposition') );
define( 'WPDP_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'WPDP_PLUGIN_METABPOX_DIR', untrailingslashit( dirname( __FILE__ ) ). '/metabox' );

foreach(glob(dirname(__FILE__) . '/core/nations/*.php') as $filename)
{
	require $filename;
}
require 'core/base.php';
@include 'unlock.php';

if(get_option('seo_multi_position_unlock_status') > 0)
{
	include 'core/municipal.php';
	include 'core/brand.php';
	include 'core/utility.php';
	include 'admin/rs_multi_position_config.php';

	$municipal = new Municipal();
	$brand     = new Brand();
	$utility   = new Utility();
}

if(get_option('seo_multi_position_unlock_status') > 1)
{
	include 'admin/rs_multi_position_municipals.php';
	include 'admin/rs_multi_position_brands.php';
	include 'admin/rs_multi_position_utilities.php';
}

require 'duplicate.php';
require 'metabox/config.php';
require 'widget/widget.php';

function smp_admin_script()
{
	wp_enqueue_script(  'smp-js', WP_PLUGIN_URL . '/seo-multiposition/assets/smp.js' );
}
add_action( 'admin_enqueue_scripts', 'smp_admin_script' );
add_action('delete_post', 'rs_delete_relation');
add_action( 'pre_get_posts', 'custom_query_list_on_side_wp_admin' );
add_action( 'upgrader_process_complete', 'rs_upgrade_function',10, 2);

add_filter('page_row_actions','rs_action_row', 10, 2);

register_activation_hook( __FILE__, 'rs_add_unlock_status');
register_activation_hook(	__FILE__,	'rs_activated'  );

register_deactivation_hook(	__FILE__,	'rs_deactivate' );

register_uninstall_hook( __FILE__, 'rs_uninstall');
