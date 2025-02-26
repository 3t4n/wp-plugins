<?php
/**
 * Plugin Name:       Dashboard Instruction Guide
 * Plugin URI:        https://ibnat-it.com/
 * Description:       This plugin will help you to add documents/instructions for individual post types.
 * Version:           1.0.0
 * Author:            Sajidul Islam
 * Author URI:        https://www.facebook.com/sajidulislam0
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dashboard-instruction-guide
 * Domain Path:       /languages
 */
 

defined( 'ABSPATH' ) || exit;

/**
 * Dashboard_Instruction_Guide class
 *
 * @class Dashboard_Instruction_Guide
 */
class Dashboard_Instruction_Guide {

 
    /**
     * Constructor for the Dashboard_Instruction_Guide class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     *
     * @uses register_activation_hook() 
     */
    public function __construct() {
		
		// Plugin Activation Hook
		register_activation_hook( __FILE__, [ $this, 'dig_activated_rules' ] );

		// Localize our plugin
		add_action( 'init', [ $this, 'dig_localization_setup' ] );

		// Add Menu Pages Action Hook
		add_action( 'admin_menu', [ $this, 'dig_menu_pages' ] ); 
	  
		// Enqueuing Admin Assets
		add_action( 'admin_enqueue_scripts', [ $this, 'dig_bsckend_scripts' ] ); 
		
		// Ajax View Action
		add_action( 'wp_ajax_dig_view_action', [ $this, 'so_wp_ajax_function' ] ); 
		
		// Ajax Delete Action
		add_action( 'wp_ajax_dig_delete_action', [ $this, 'so_wp_ajax_delete_function' ] ); 
		
		// Adding meta box for the instruction
		add_action( 'add_meta_boxes', [ $this, 'global_notice_meta_box' ] );
		
		// Action to view on posts page
		add_action( 'wp_ajax_dig_individual_view_action', [ $this, 'so_wp_ajax_post_view_function' ] );
	 
 
 
    }
 
 
 
 // Add menu pages for the plugin
    public function dig_menu_pages() {
  
	   // Main Menu Page
      add_menu_page( 
        __( 'Add New Instruction Guide', 'dashboard-instruction-guide' ),
		__( 'Dashboard Instruction Guide','dashboard-instruction-guide' ),
        'edit_themes',
        'dashboard-instruction-guide',
        [ $this, 'dig_main_menu_page'],
        'dashicons-welcome-add-page',
        6
    ); 
 
	// SubMenu Page
	  add_submenu_page(
			'dashboard-instruction-guide',
			 __( 'All Instructions', 'dashboard-instruction-guide' ),
 			 __( 'All Instructions','dashboard-instruction-guide' ),
			'edit_themes', 
			'all-instruction',
			[ $this, 'all_dashboard_instruction_list'] 
		);
	  
 
	}
 
 
 
  
 
    /**
     * Create DataBase Table if NOT Exists
     */
    public function dig_activated_rules() {
	    global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . 'dashboard_instruction_guide';
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `title` varchar(255 ) DEFAULT NULL,
			  `description` varchar(255) DEFAULT NULL,
			  `assigned_into` varchar(150) DEFAULT NULL,
			  `status`  ENUM('0','1') DEFAULT '1',
			  PRIMARY KEY(id)
			  )  DEFAULT CHARSET=$charset_collate;
	  ";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	   
}


	/**
	 * Register Admins CSS and JS
	 */
		function dig_bsckend_scripts() {
		  //JS
		  wp_enqueue_script('dig-backend-js',plugins_url( '/assets/js/backend-main.js', __FILE__ ),['jquery'], time(),true);
		   // CSS
		  wp_enqueue_style('dig-backend-css',plugins_url( '/assets/css/style.css', __FILE__ ));
		  
		 //Localaization
		  wp_localize_script('dig-backend-js','dig_ajax_global',[
			  'ajax_url'    => admin_url( 'admin-ajax.php' ), // Ajax URL
			  'nonce'       => wp_create_nonce( 'dig_nonce' ) //Security NONCE
			]
		  );
		}




 
	/**
	*  Ajax view the Instruction
	**/
function so_wp_ajax_function(){ 
		$itemId= absint($_POST['itemId']);
	    global $wpdb;  
	    $table_name = $wpdb->prefix . 'dashboard_instruction_guide';
		$specificResult=  $wpdb->get_results("SELECT * FROM $table_name WHERE id=$itemId");
		echo '<div class="dig-popup-wrapper-outer">';
			echo '<div class="dig-popup-inner">';
				foreach($specificResult as $result){ 
					echo "<h3 class='popup-title'>".esc_html($result->title,'dashboard-instruction-guide')."</h3>";
					echo "<div class='popup-content'>".__($result->description,'dashboard-instruction-guide')."</div>";
				}
			echo '</div>';
		echo '</div>';   
   wp_die();  
}



  
	/**
	* View the Instruction on the post page
	**/
function so_wp_ajax_post_view_function(){ 
		$itemId= absint($_POST['itemId']);
	    global $wpdb;  
	    $table_name = $wpdb->prefix . 'dashboard_instruction_guide';
		$specificResult=  $wpdb->get_results("SELECT * FROM $table_name WHERE id=$itemId");
		echo '<div class="dig-popup-wrapper-outer">';
		echo '<span class="close-dig dashicons dashicons-no-alt"></span>';
			echo '<div class="dig-popup-inner">';
				foreach($specificResult as $result){
					echo "<h3 class='popup-title'>".esc_html($result->title,'dashboard-instruction-guide')."</h3>";
					echo "<div class='popup-content'>".__($result->description,'dashboard-instruction-guide')."</div>";
				}
			echo '</div>';
		echo '</div>';
   wp_die(); // ajax call must die to avoid trailing 0 in the response
}

 
 
	/**
	* Delete Instructions By ID
	**/
	function so_wp_ajax_delete_function(){ 
		$deleteId= absint($_POST['deleteId']);
		 global $wpdb;  
		 $table_name = $wpdb->prefix . 'dashboard_instruction_guide';
		 $wpdb->delete( $table_name, array( 'id' => $deleteId ) );	 
		 wp_die(); // ajax call must die to avoid trailing 0 in the response
	}


 
    
	/**
	* Adding meta box on the selected post types
	**/
function global_notice_meta_box() {
	global $wpdb; 
	$table_name = $wpdb->prefix . 'dashboard_instruction_guide';
	$screens= $wpdb->get_results("SELECT distinct `assigned_into` FROM $table_name ORDER BY `assigned_into` ASC",'ARRAY_A');
    foreach ( $screens as $screen ) {
        add_meta_box(
            'dashboard-instruction-guide',
            __( 'Instruction Guide', 'dashboard-instruction-guide' ),
            [ $this,'global_notice_meta_box_callback'],
             $screen,
			 'side',
			 'high' 
        );
    }
}


	/**
	* Meta box callback Function
	**/
function global_notice_meta_box_callback(){
	    global $wpdb; 
		$post_type = get_post_type( get_the_ID());
		$table_name = $wpdb->prefix . 'dashboard_instruction_guide';
		$dashboardResult=  $wpdb->get_results("SELECT * FROM $table_name WHERE assigned_into='$post_type' AND status ='1'");
		if(count($dashboardResult) > 0){
			 echo '<ol>';
				foreach($dashboardResult as $result){
					echo '<li data-id="'.esc_attr($result->id).'" class="instruction-list">'.esc_html_e($result->title,'dashboard-instruction-guide').'</li>';
				}
			echo '</ol>';
		}else{
			_e('Sorry! No Instruction For This Page','dashboard-instruction-guide');
			echo '<a style="margin-top: 10px;" href="' . esc_url( admin_url('/admin.php?page=dashboard-instruction-guide') ) . '"  class="button button-primary button-small">+ '. __("Add New","dashboard-instruction-guide").'</a>';
		}
}



	/**
	 * Callback Function For Menu Page
	 */
	function dig_main_menu_page(){ 
		include( plugin_dir_path(__FILE__) . 'admin/add.php'); 
	} 
	
	
 

	/**
	 * Callback Function For Submenu Page
	 */
	 function all_dashboard_instruction_list(){
		 include( plugin_dir_path(__FILE__) . 'admin/all.php'); 
    
}
 
 
 
    /**
     * Initialize plugin for localization
     *
     * @uses dig_localization_setup()
     */
    public function dig_localization_setup() {
        load_plugin_textdomain( 'dashboard-instruction-guide', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }


  
    

} // Dashboard_Instruction_Guide

 // Executing the Class
new Dashboard_Instruction_Guide();