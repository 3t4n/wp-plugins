<?php 
/*
 Plugin Name: Advanced Link Directory
 Description: Link Directory. Use the shortcode [show_link] to display on the site.
 Version: 2.1
 Author: Anatoliy Malysh
 Author URI: 
*/

// Stop direct call
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }
	
		global $wpdb;
		
		## We declare a constant initialize our plugin
		DEFINE('AdvLinkDirectory', true);	
		
		## File name our plugin
		$plugin_name = plugin_basename(__FILE__);
		
		## URL address for our plugin
		$plugin_url = trailingslashit(WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)));
		
		## Table for links 
		$tbl_adv_reviews  = $wpdb->prefix . 'adv_reviews'; // echo '$tbl_adv_reviews = ', $tbl_adv_reviews;
		
		## The function is executed when you activate the plugin
		register_activation_hook( $plugin_name, 'activate' );
		
		## The function is executed when deactivating the plugin
		register_deactivation_hook( $plugin_name, 'deactivate' );
		
		##  The function is executed when you remove the plugin
		register_uninstall_hook( $plugin_name, 'uninstall' );
		
		// Connect localization
		function ald_textdomain() {
		 if ( function_exists('load_plugin_textdomain') ) {
		 load_plugin_textdomain( 'advlinkdirectory', 'FBFW_URL' . 'languages', 'advlinkdirectory/languages' );
			}
		}
		add_action( 'init', 'ald_textdomain' );
			
		// Adding menu plugin
		add_action( 'admin_menu', 'admin_generate_menu');
		
		
		// If we are in the administrative interface
		if ( is_admin() ) {
			// Adding styles and scripts
			add_action('wp_print_scripts',  'admin_load_scripts');
			add_action('wp_print_styles', 'admin_load_styles');
		} else {
		    // Adding styles and scripts
			add_action('wp_print_styles', 'site_load_styles');
			add_shortcode('show_link', 'site_show_reviews');
		}	

	
	/**
	 * Download the necessary scripts to control page
	 * in the administration panel
	 */
	function admin_load_scripts()
	{
		global $plugin_url;
		wp_register_script('advReviewsAdminJs', $plugin_url . 'js/admin-scripts.js' );
		wp_enqueue_script('advReviewsAdminJs');
	}
	
	/**
	 * Loading essential styles for page management
	 * in the administration panel
	 */
	function admin_load_styles()
	{	
		global $plugin_url;
		
		// Registering styles НЕ ФУНГУЄ
		wp_register_style('advReviewsAdminCss', $plugin_url . 'css/admin-style.css' );
		// Adding styles
        wp_enqueue_style('advReviewsAdminCss');
	}
	
	/**
 	 * Generate menu
	 */
	function admin_generate_menu()
	{
		// Adding the main menu section
		add_menu_page( __( 'Welcome to the control module links' ), __( 'Link Directory','advlinkdirectory' ) , 'manage_options', 'edit-reviews',  'admin_edit_link', "", "12.5" );
		
		// Adding Links
		add_submenu_page( 'edit-reviews', __( 'Submit a new link','advlinkdirectory' ), __( 'Add Link','advlinkdirectory' ), 'manage_options', 'add_link', 'admin_add_link');
		
		// Adding an extra partition
		add_submenu_page( 'edit-reviews', __( 'Plugin information','advlinkdirectory' ), __( 'About Plugin','advlinkdirectory' ), 'manage_options', 'plugin_info', 'admin_plugin_info');
	}
	
	/**
	 * Displays a list of reviews for editing
	 */
	 function admin_edit_link() 
	{
		global $wpdb;
		global $tbl_adv_reviews;
		
		$action = isset($_GET['action']) ? $_GET['action'] : null ;
		
		switch ($action) {
		
			case 'edit':
				// We receive data from the database
				$data['review'] 	= $wpdb->get_row("SELECT * FROM `" . $tbl_adv_reviews . "` WHERE `ID`= ". (int)$_GET['id'], ARRAY_A);
				
				// Connecting the page to display the results
				include_once('edit_link.php');
			break;
			
			case 'submit':				 // Storing after editing
			
			
			if (isset($_POST['link'])) {
				$inputData = array(
					'link' 	  	   => sanitize_text_field($_POST['link']),				
					'ankor' 	   => sanitize_text_field($_POST['ankor']),
					'description'  => sanitize_text_field($_POST['description']),
					'reverse_link' => sanitize_text_field($_POST['reverse_link']),
					'note' 		   => sanitize_text_field($_POST['note']),
				);
						
				$editId=sanitize_text_field(intval($_POST['id']));
				if ($editId == 0) return false;
				// Updating an existing entry
				$wpdb->update( $tbl_adv_reviews, $inputData, array( 'ID' => $editId ));
			}	
				// Show list of links
				admin_show_reviews();
			break;
			
			case 'delete':
			
				// Remove an existing entry
				$wpdb->query("DELETE FROM `".$tbl_adv_reviews."` WHERE `ID` = '". (int)$_GET['id'] ."'");
				
				// Displays a list of user reviews
				admin_show_reviews();
			break;
			
			default:
				admin_show_reviews();
		}
	}
	
	/**
	 * The function to display a list of links in the admin panel
	 */
	function admin_show_reviews()
	{
		global $wpdb;
		global $tbl_adv_reviews;
		
		// Receive data from the database
		$data['reviews'] 	 = $wpdb->get_results("SELECT * FROM `" . $tbl_adv_reviews . "`", ARRAY_A);
		
		// Connecting the page to display the results
		include_once('admin_link.php');
	}
	
	/**
	 * Show static page
	 */
	 function admin_plugin_info()
	{
		include_once('plugin_info.php');
	}
	
	// Link to this page add a new link
		 function admin_add_link()
	{
		include_once('add_link.php');
		add_user_review();		// stores data when adding new links
	}

	function site_load_styles()
	{
		global $plugin_url;
		wp_register_style('advReviewsCss', $plugin_url . 'css/site-style.css' );
		wp_enqueue_style('advReviewsCss');
	}
	
	/**
	 * List of links on the site
	 */
	 function site_show_reviews($atts, $content=null)
	{
		global $wpdb;
		global $plugin_url;
		global $tbl_adv_reviews;
		
		if (isset($_POST['action']) && $_POST['action'] == 'add-review') {
		//	$this->add_user_review();
		}
		
		// Select all of the links Databases
		$data['reviews'] = $wpdb->get_results("SELECT * FROM `" . $tbl_adv_reviews . "`", ARRAY_A);
		
		## Turn on output buffering
		ob_start ();
		include_once('site_link.php');
		## We obtain data
		$output = ob_get_contents ();
		## Disable buffering
		ob_end_clean ();
		
		return $output;
	}
	
	function add_user_review()
	{	
		global $wpdb;
		global $tbl_adv_reviews ;
				
		if (isset($_POST['link'])) {  		
			$inputData = array(			
				'link' 	 	 	  	  => sanitize_text_field($_POST['link']),
				'ankor' 	 	 	  => sanitize_text_field($_POST['ankor']),
				'description' 		  => sanitize_text_field($_POST['description']),
				'reverse_link' 	  	  => sanitize_text_field($_POST['reverse_link']),
				'note'   			  => sanitize_text_field($_POST['note']),
		);
		
		
		// If the field is filled link -> Add a new link to the site
		if (strlen($inputData['link'])>0) { $wpdb->insert( $tbl_adv_reviews, $inputData ); }
		//  HERE you need to make a redirect !!!
		echo 'The data is saved ';
		echo '<a href="'. home_url() .'/wp-admin/admin.php?page=edit-reviews">Home</a>';
		}
	}
	
	/**
	 * Activate the plugin
	 */
	function activate() 
	{
		global $wpdb;
		global $tbl_adv_reviews;
		
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		
		$table	= $tbl_adv_reviews;
		
		## Determine the version of mysql
		if ( version_compare(mysqli_get_server_info($wpdb->dbh), '4.1.0', '>=') ) {
			if ( ! empty($wpdb->charset) )
				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
			if ( ! empty($wpdb->collate) )
				$charset_collate .= " COLLATE $wpdb->collate";
		}
		
		// echo "charset_collate = ", $charset_collate ;
		
		## The structure of the table for links
		$sql_table_adv_reviews = "
				CREATE TABLE `".$wpdb->prefix."adv_reviews` (
				`ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`link` varchar(255) NOT NULL DEFAULT '0',
				`ankor` varchar(255) NOT NULL,
				`description` text NOT NULL,
				`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				`reverse_link` varchar(200) DEFAULT NULL,
				`note` text NOT NULL,
				PRIMARY KEY (`ID`)
				)".$charset_collate.";";
		
		dbDelta($sql_table_adv_reviews);
		
		## Check the existence of the table  
		if ( $wpdb->get_var("show tables like '".$table."'") != $table ) {
			dbDelta($sql_table_adv_reviews);
		}
		
	}
	
	function deactivate() 
	{
		return true;
	}
	
	/**
	 * Removing the plugin
	 */
	function uninstall() 
	{
		global $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}adv_reviews");
	}