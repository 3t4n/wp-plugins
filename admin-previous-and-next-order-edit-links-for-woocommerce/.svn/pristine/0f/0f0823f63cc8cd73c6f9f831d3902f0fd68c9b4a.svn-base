<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/CylasKiganda/previous-next-edit-order-links-for-woocommerce
 * @since      1.0.1
 *
 * @package    Previous_Next_Edit_Order_Links_For_Woocommerce
 * @subpackage Previous_Next_Edit_Order_Links_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Previous_Next_Edit_Order_Links_For_Woocommerce
 * @subpackage Previous_Next_Edit_Order_Links_For_Woocommerce/admin
 * @author     Belo <belocodes@gmail.com>
 */
class Previous_Next_Edit_Order_Links_For_Woocommerce_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.1
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Previous_Next_Edit_Order_Links_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Previous_Next_Edit_Order_Links_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/previous-next-edit-order-links-for-woocommerce-admin.css', array(), '1.0.21', 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Previous_Next_Edit_Order_Links_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Previous_Next_Edit_Order_Links_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

  //Data initialization---------
  $screen_id = false;
  $final_prev_next_output = array("prev"=>0,"next"=>0);
  global $post; 
 if ( function_exists( 'get_current_screen' ) ) {
	
     $screen    = get_current_screen();
	  
     $screen_id = isset( $screen, $screen->id ) ? $screen->id : '';
	 
     
	 if ( $screen_id == 'woocommerce_page_wc-orders' 
	 && get_option( 'woocommerce_custom_orders_table_enabled' ) == "yes"
	 && $_GET['action'] == 'edit'
	 ) 
	  {	
	 global $post, $wpdb, $theorder;
		  
			$order_navigation = $wpdb->get_row( $wpdb->prepare( "
			SELECT
				(SELECT ID FROM {$wpdb->prefix}wc_orders
				WHERE id < %d
				AND type = '%s'
				AND status <> 'trash'
				ORDER BY ID DESC LIMIT 1 )
				AS prev_order_id,
				(SELECT ID FROM {$wpdb->prefix}wc_orders
				WHERE id > %d
				AND type = '%s'
				AND status <> 'trash'
				ORDER BY ID ASC LIMIT 1 )
				AS next_order_id
		", $theorder->get_id(), 'shop_order', $theorder->ID, 'shop_order' ), ARRAY_A ); 
	}
	else if( $screen_id == 'shop_order' 
	&& get_option( 'woocommerce_custom_orders_table_enabled' ) == "no"){
		global $post, $wpdb, $theorder;

		if ( ! is_object( $theorder ) ) {
			 $theorder = wc_get_order( $post->ID );
		} 
		 
		$order_navigation = $wpdb->get_row( $wpdb->prepare( "
			SELECT
				(SELECT ID FROM {$wpdb->prefix}posts
				WHERE ID < %d
				AND post_type = '%s'
				AND post_status <> 'trash'
				ORDER BY ID DESC LIMIT 1 )
				AS prev_order_id,
				(SELECT ID FROM {$wpdb->prefix}posts
				WHERE ID > %d
				AND post_type = '%s'
				AND post_status <> 'trash'
				ORDER BY ID ASC LIMIT 1 )
				AS next_order_id
		", $post->ID, $post->post_type, $post->ID, $post->post_type ), ARRAY_A );

	}
			
		 
		
		
		
		
	//Filling the Output array---------   
	   
		if(!empty($order_navigation[ 'prev_order_id' ])){
		$final_prev_next_output["prev"] = admin_url( 'post.php?post='.$order_navigation[ 'prev_order_id' ].'&action=edit' );
		} 
		if(!empty($order_navigation[ 'next_order_id' ])){
		$final_prev_next_output["next"] = admin_url( 'post.php?post='.$order_navigation[ 'next_order_id' ].'&action=edit' );
		}
 
		//Enqueuing the Output JS scripts---------

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) .
		'js/previous-next-edit-order-links-for-woocommerce-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name, 'prev_next_script_vars', array(
		"prev" => $final_prev_next_output["prev"],
		"prev_text" => __('Previous Order','belo_prev_next_domain'),
		"next" => $final_prev_next_output["next"],
		"next_text" => __('Next Order','belo_prev_next_domain')
		)
		); 
}

}}