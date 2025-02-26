<?php
/*
Plugin Name: Ajax Product Search for Woocommerce
Plugin URI: https://www.phoeniixx.com/product/ajax-product-search-for-woocommerce/
Description: Ajax Search Plugin lets your online customers search for their required products on your site.
Version: 1.5.2
Author: phoeniixx
Author URI: http://www.phoeniixx.com
Text Domain: ph-ajax-pro-search
Domain Path: /languages/
WC requires at least: 2.6.0
WC tested up to: 3.9.0
*/

ob_start();

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**

 * Check if WooCommerce is active

 **/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{		

	include(dirname(__FILE__).'/libs/execute-libs.php');
	
	define("ph_ajax_pro_search_plugin_dir_url", esc_url( plugin_dir_url( __FILE__ ) ) );
	
	function ph_ajax_pro_search_settings_link($links) { 
	
		  $settings_link = '<a href="admin.php?page=ph_ajax_pro_search_setting">Settings</a>'; 
		  
		  array_unshift($links, $settings_link); 
		  
		  return $links; 
		  
		}
		 
	$plugin = plugin_basename(__FILE__);
	
	add_filter("plugin_action_links_$plugin", 'ph_ajax_pro_search_settings_link' );
	
	function ph_ajax_pro_search_setting()
	{
		
		require_once(dirname(__FILE__).'/admin-setting.php');
		
	} 
	
	function ph_ajax_pro_search_head() {
		
		wp_enqueue_script( 'script-ph-ajax-pro-search-request', ph_ajax_pro_search_plugin_dir_url. '/assets/js/custom.js', array( 'jquery' ) );
		
		wp_localize_script( 'script-ph-ajax-pro-search-request', 'pro_search_ajax', array( 'pro_search_ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		
		$loader_image = get_option( 'phoe_s_loader_image' );
		
		if( empty( $loader_image ) )
		{

			?>
				<script>
				
					var ajax_pro_search_loader = '<?php echo ph_ajax_pro_search_plugin_dir_url; ?>/assets/images/ajax-loader.gif';
					
				</script>
			<?php
			
		}
		else
		{
			
			?>
				<script>
				
					var ajax_pro_search_loader = '<?php echo $loader_image; ?>';
					
				</script>
			<?php
			
		}
		
		?>
		
		    <style type="text/css">
			
			.ajax_search_result:first-child {
             padding-top: 8px;
			 border-top: 1px solid #ccc;
            } 
			
			.ajax_search_result a {
			        background: #fff none repeat scroll 0 0;
					 color: #141412;
					display: block;
					padding: 2px 10px;
					}
					
			.ajax_search_result{
			 background:#fff;
			 border-left: 1px solid #ccc;
             border-right: 1px solid #ccc;
			}		
					
	        .ajax_search_result a:hover{
			 text-decoration:none;
			  color: #141412;
			 background:#f2f2f2;
			}   	
			.ajax_search_result:last-child {
             padding-bottom: 13px;
			 border-bottom: 1px solid #ccc;
            }			

			</style>
		<?php
	
	}

	add_action('wp_head', 'ph_ajax_pro_search_head'); //for adding assets/js/css in wp head
	
	add_action('admin_menu', 'ph_ajax_pro_search_settings_menu');

	function ph_ajax_pro_search_settings_menu(){
		
		$plugin_dir_url =  plugin_dir_url( __FILE__ );
		
		add_menu_page( 'phoeniixx', __( 'Phoeniixx', 'phe' ), 'nosuchcapability', 'phoeniixx', NULL, $plugin_dir_url.'/assets/images/logo-wp.png', 57 );
        
		add_submenu_page( 'phoeniixx', 'Ajax Product Search', 'Ajax Product Search', 'manage_options', 'ph_ajax_pro_search_setting', 'ph_ajax_pro_search_setting' );

	}
	
	//Activation Code of table in wordpress

	register_activation_hook(__FILE__, 'ph_ajax_pro_search_activation');
	
	function ph_ajax_pro_search_activation() {
		
		$search_inp_label = get_option('phoe_s_search_inp_label');
		
		$search_sub_label = get_option('phoe_s_search_sub_label');
		
		$min_num_of_char = get_option('phoe_s_min_num_of_char');
		
		$max_num_of_result = get_option('phoe_s_max_num_of_result');
		
		$search_field_placeholder = get_option( 'phoe_s_search_field_placeholder' );
		
		
		if($search_inp_label == '')
		{
			update_option('phoe_s_search_inp_label','Product search','yes');
		}
		
		if($search_sub_label == '')
		{
			update_option('phoe_s_search_sub_label','Search','yes');
		}
		
		if($min_num_of_char == '')
		{
			update_option('phoe_s_min_num_of_char',3,'yes');
		}
		
		if($max_num_of_result == '')
		{
			update_option('phoe_s_max_num_of_result',3,'yes');
		}
		
		if($search_field_placeholder == '')
		{
			
			update_option('phoe_s_search_field_placeholder','Search for products','yes');
			
		}
		
	} 
	
	require_once(dirname(__FILE__).'/ajax_search_widget.php');
	
	add_action( 'wp_ajax_nopriv_ph_ajax_pro_search', 'ph_ajax_pro_search' );
	
	add_action( 'wp_ajax_ph_ajax_pro_search', 'ph_ajax_pro_search' );

	function ph_ajax_pro_search() {
		
		//print_r($_POST);
		 global $woocommerce;

            $search_keyword =  $_POST['keyword'];

            $ordering_args = $woocommerce->query->get_catalog_ordering_args( 'title', 'asc' );
			
            $search_results   = array();

            $args = array(
                's'                   => $search_keyword,
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $ordering_args['orderby'],
                'order'               => $ordering_args['order'],
                'posts_per_page'      => get_option( 'max_num_of_result' ),
               /* 'suppress_filters'    => false,
                'meta_query'          => array(
                    array(
                        'key'     => '_visibility',
                        'value'   => array( 'search', 'visible' ),
                        'compare' => 'IN'
                    )
                )*/
            );

  

            $products = get_posts( $args );

            if ( !empty( $products ) ) {
                foreach ( $products as $post ) {
                    $product = wc_get_product( $post );

                    $search_results[] = array(
												'id'    => $product->id,
												'value' => strip_tags($product->get_title()),
												'url'   => $product->get_permalink()
											);
                }
            }
            else {
                $search_results[] = array(
                    'id'    => 0,
                    'value' => __( 'No results', 'ph-ajax-pro-search' ),
                    'url'   => '#',
                );
            }
            wp_reset_postdata();


            $search_results = array(
                'search_results' => $search_results
            );


            echo json_encode( $search_results );
			
            die();
	}
}
else 
{
	
	add_action('admin_notices', 'product_search_admin_notice');

	function product_search_admin_notice() {
		global $current_user ;
			$user_id = $current_user->ID;
			/* Check that the user hasn't already clicked to ignore the message */
		if ( ! get_user_meta($user_id, 'product_search_ignore_notice') ) {
			echo '<div class="error"><p>'; 
			printf(__('Woocommerce product search could not detect an active Woocommerce plugin. Make sure you have activated it. | <a href="%1$s">Hide Notice</a>'), '?product_search_nag_ignore=0');
			echo "</p></div>";
		}
	}

	add_action('admin_init', 'product_search_nag_ignore');

	function product_search_nag_ignore() {
		global $current_user;
			$user_id = $current_user->ID;
			/* If user clicks to ignore the notice, add that to their user meta */
			if ( isset($_GET['product_search_nag_ignore']) && '0' == $_GET['product_search_nag_ignore'] ) {
				 add_user_meta($user_id, 'product_search_ignore_notice', 'true', true);
		}
	}
}
