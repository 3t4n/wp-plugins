<?php 
/*
 * Plugin Name: Liteweight Podcast
 * Plugin URI:  http://abuhayatpolash.com/plugins/liteweight-podcast/
 * Description: A lite weight wordpress podcast plugin.
 * Version: 2.2.6
 * Author: bPlugins
 * Author URI: http://bplugins.com
 * License: GPLv3
 */
 use PDP\Model\ImportData;
 use PDP\Model\Import;
/*Some Set-up*/
define('PDP_PLUGIN_DIR', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' ); 
define('PDP_PLUGIN_PATH', WP_PLUGIN_DIR . '/' . plugin_basename( dirname(__FILE__) ) . '/' ); 
define('PDP_ISGUTENBERG_IMPORT', '1.0.0' ); 
define('PDP_VER', '2.2.6' ); 

//Font awesome
require_once(__DIR__.'/upgrade.php');
// Metabox

add_action('admin_init', 'pdp_plugin_redirect');
function pdp_plugin_redirect() {
	if(get_option('pdp_import', '1.3') != PDP_VER){
		ImportData::importMeta();
        update_option('pdp_import', PDP_VER);
    }
	
	if(get_option('pdp_isgutenberg_import', 0) != PDP_ISGUTENBERG_IMPORT){
		Import::isGutenberg();
		update_option('pdp_isgutenberg_import', PDP_ISGUTENBERG_IMPORT);
	}
}
 /*			
 * Adds a review request metabox
 */
function pdp_add_review_meta_box() {
	add_meta_box(
		'myplugin_sectionid',
		__( 'Please show some love', 'myplugin_textdomain' ),
		'pdp_metabox_cb',
		'podcast',
		'side'
	);	
	
}
add_action( 'add_meta_boxes', 'pdp_add_review_meta_box' );

function pdp_metabox_cb( ) {
	echo'<p>If you like <strong>WP Podcast</strong> Plugin, please leave us a <a href="https://wordpress.org/support/plugin/liteweight-podcast/reviews/?filter=5#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733; rating</a>. Your Review is very important to us as it helps us to grow more. </p>
	<p>Not happy, Sorry for that. You can request for improvement. </p>
	<table>
		<tr>
			<td><a class="button button-primary button-large" href="https://wordpress.org/support/plugin/html5-audio-player/reviews/?filter=5#new-post" target="_blank">Write Review</a></td>
			<td><a class="button button-primary button-large" href="mailto:abuhayat.du@gmail.com" target="_blank">Request Improvement</a></td>
		</tr>
	</table>'; 
};

	 	

// Footer Review Request 

add_filter( 'admin_footer_text','pdp_admin_footer');	 
function pdp_admin_footer( $text ) {
	if ( 'podcast' == get_post_type() ) {
		$url = 'https://wordpress.org/support/plugin/liteweight-podcast/reviews/?filter=5#new-post';
		$text = sprintf( __( 'If you like <strong>WP Podcast</strong> please leave us a <a href="%s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating. Your Review is very important to us as it helps us to grow more. ', 'pdp-review' ), $url );
	}

	return $text;
}
	
