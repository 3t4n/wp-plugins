<?php
/*
Plugin Name: Price Table
Plugin URI: http://www.pickplugins.com/item/price-table-awesome-pricing-table-for-wordpress/
Description: HTML & CSS3 drag and drop pricing table.
Version: 1.4
Author: projectW
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('price_table_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('price_table_plugin_dir', plugin_dir_path( __FILE__ ) );
define('price_table_wp_url', 'https://wordpress.org/plugins/price-table/' );
define('price_table_wp_reviews', 'https://wordpress.org/support/view/plugin-reviews/price-table/' );
define('price_table_pro_url','http://www.pickplugins.com/item/price-table-awesome-pricing-table-for-wordpress/' );
define('price_table_demo_url', 'http://paratheme.com/demo/price-table/' );
define('price_table_conatct_url', 'http://pickplugins.com/contact' );
define('price_table_qa_url', 'http://pickplugins.com/questions/' );
define('price_table_plugin_name', 'Price Table' );
define('price_table_plugin_version', '1.4' );
define('price_table_customer_type', 'free' );	
define('price_table_share_url', 'https://wordpress.org/plugins/price-table/' );
define('price_table_tutorial_video_url', '//www.youtube.com/embed/zVomAFkUCSA?rel=0' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/price-table-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/price-table-functions.php');


//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');




function price_table_paratheme_init_scripts()
	{
		
		
		
		wp_enqueue_script('jquery');
		wp_enqueue_script("jquery-form");
		wp_enqueue_script('price_table_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('jquery.tablednd.js', plugins_url( '/js/jquery.tablednd.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('jquery.dragtable.js', plugins_url( '/js/jquery.dragtable.js' , __FILE__ ) , array( 'jquery' ));	
		wp_enqueue_script('jscolor.js', plugins_url( '/js/jscolor.js' , __FILE__ ) , array( 'jquery' ));
				
		wp_enqueue_style('price_table_style', price_table_plugin_url.'css/style.css');	
		wp_enqueue_style('style-ribbons', price_table_plugin_url.'css/style-ribbons.css');			

		//ParaAdmin
		wp_enqueue_style('ParaAdmin', price_table_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		//wp_enqueue_style('ParaIcons', price_table_plugin_url.'ParaAdmin/css/ParaIcons.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));

		// Style for themes
		wp_enqueue_style('price_table-style-flat', price_table_plugin_url.'themes/flat/style.css');
		


	}
add_action("init","price_table_paratheme_init_scripts");









function price_table_paratheme_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$price_table_themes = get_post_meta( $post_id, 'price_table_themes', true );

			$price_table_paratheme_display ="";

	
			$price_table_paratheme_display.= price_table_themes_flat($post_id);

		
				
				

return $price_table_paratheme_display;



}

add_shortcode('price_table', 'price_table_paratheme_display');





add_action('admin_menu', 'price_table_paratheme_menu_init');


	
function price_table_paratheme_menu_help(){
	include('price-table-help.php');	
}





function price_table_paratheme_menu_init()
	{
		
		add_submenu_page('edit.php?post_type=price_table', __('Help & Upgrade','price-table'), __('Help & Upgrade','price-table'), 'manage_options', 'price_table_paratheme_menu_help', 'price_table_paratheme_menu_help');

	}



