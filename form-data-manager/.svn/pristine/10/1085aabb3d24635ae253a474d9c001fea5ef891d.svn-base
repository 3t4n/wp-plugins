<?php
/**
 * Plugin Name:     Contact Form 7 Database Manager CF7DBM
 * Plugin URI:      https://wordpress.org/plugins/form-data-manager/
 * Description:     Effortlessly Store, Search & Export CF7 Submissions with a User-Friendly Interface. Ensure you never miss crucial data with our enhanced management add-on for Contact Form 7.
 * Author:      	OWLEADS
 * Author URI:  	https://owleads.com/
 * Text Domain:     form-data-manager
 * Domain Path: 	/languages
 * Version:         1.1.1
 * License:     	GPLv2
 *
 * @package         Form_Data_Manager
 */

if ( !class_exists( 'WPFDM_Plugin' ) ) {

define( 'WPFDM_Plugin_VERSION', '1.1.1' );
define( 'WPFDM_Plugin_NAME', 'form-data-manager/form-data-manager.php' );


/**
* @since 1.0.0
* 
* 
* The main class of the plugin
*/
class WPFDM_Plugin
{
    
     // The class constructor 



	function wpfdm_error_notice() {
	    ?>
	    <div class="error">
	        <p><?php _e( 'Warning: The plugin <strong> Contact Form 7 Database Manager</strong> requires Contact Form 7 to be installed and active.', 'form-data-manager' ); ?></p>
	    </div>
	    <?php
	}

	// Check for the transient, and if set, display the notice and then delete the transient.
	function wpfdm_install_notice() {
	    if ( get_transient( 'wpfdm_plugin_activated' ) ) {
	        ?>
	        <div class="updated notice is-dismissible">
	            <p>Thank you for updating <strong>Contact Form 7 Database Manager</strong>!<br /> <strong>PLEASE NOTE </strong> its page has been relocated under the <strong>'Contact'</strong> menu. You can simply <a href="admin.php?page=fdm_form">click here</a> to access the main page.</p>
	        </div>
	        <?php
	        delete_transient( 'wpfdm_plugin_activated' );  // Once the notice is displayed, delete the transient
	    }
	}

	public function wpfdm_add_cf7_notice( ) {

		global $pagenow;

		if ('admin.php' == $pagenow && isset($_GET['page']) && 'wpcf7' == $_GET['page']) { ?>
		    <div class="updated notice is-dismissible">
	            <p>DON'T FORGET: All submissions can be viewed and tracked on <a href="admin.php?page=fdm_form"><strong>Contact Form 7 Database Manager</strong> page</a> or under <strong>Contact/Submissions</strong>.<br /></p>
	        </div>
	    <?php }

	}

    public function __construct() {
    	
    	add_filter( 'plugin_action_links', array( $this, 'add_plugin_links' ) , 10, 2 );
		add_filter( 'plugin_row_meta', array($this, 'add_plugin_meta_links'), 10, 2);
		add_action( 'admin_notices', array($this, 'wpfdm_add_cf7_notice') );
		//add_filter('page_row_actions', array( $this , 'cf7_custom_row_action'), 10, 2);
		add_filter( 'wpcf7_admin_actions', array( $this , 'cf7_add_custom_admin_link'), 10, 2 );


    	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    	if ( ! is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		    add_action( 'admin_notices', array ($this, 'wpfdm_error_notice') );
		    return;
		}

    	// Activation and deacivation hooks
    	register_activation_hook( __FILE__, array( $this, 'activate') );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		// We add the menu the the plugin 
		add_action( 'admin_menu', array($this, 'add_menu' ), 10, 1 );

		// We load the languages files
		add_action( 'plugins_loaded', array($this, 'fdm_load_plugin_textdomain' ) );

		// We load CSS files through the 'fdm_load_custom_wp_admin_style' function
		add_action( 'admin_enqueue_scripts', array($this, 'fdm_load_custom_wp_admin_style') );

		// Before CF7 sends email, we save the new contact through the 'save_the_new_contact' function
		add_action( 'wpcf7_before_send_mail', array( $this, 'save_the_new_contact' ), 10, 1 );

		// After CF7 creates a new form, we create a corresponding record in our tables through the 'save_the_new_form' function
		add_action( 'wpcf7_after_create', array( $this, 'save_the_new_form' ), 10, 1 ); 

		// After CF7 update a form, we update the form title through the 'save_the_updated_form'
		add_action( 'wpcf7_after_update', array( $this, 'save_the_updated_form' ), 10, 1 ); 

		// We prepare the export functionnality
		add_action( 'admin_init', array($this, 'export' ) );

		// Register ajax functions that enables forms
		add_action('wp_ajax_enable_fdm_form' , array( $this , 'enable_fdm_form' ) );

		// Register ajax functions that mark a contact as read
		add_action('wp_ajax_mark_contact_as_read_fdm_form' , array( $this , 'mark_contact_as_read_fdm_form' ) );

		add_action( 'admin_notices', array( $this , 'wpfdm_install_notice') );

		add_action('admin_enqueue_scripts', array( $this , 'enqueue_cf7_custom_admin_script') );
		
		add_action('admin_notices', array($this, 'display_rate_notice'));
	}

	// Add admin notice to rate plugin
	function display_rate_notice(){

		if (isset($_GET['FDM_rate']) && $_GET['FDM_rate'] == 0 ) 
			update_option ( 'wpfdm_plugin_tm_fr_rtg', -1 );
		
		if ( !get_option ( 'wpfdm_plugin_tm_fr_rtg' ) )
			update_option ( 'wpfdm_plugin_tm_fr_rtg', time() );

		if ( get_option ( 'wpfdm_plugin_tm_fr_rtg' ) == -1 )
			return;		

		$activation_time = get_option ( 'wpfdm_plugin_tm_fr_rtg' ); // Get the option, if no option stored, we initiate it by current time

		$now = time();
		$delay_to_show = 8 * DAY_IN_SECONDS;

		if ( $now - $activation_time > $delay_to_show ) {

			$FDM_new_URI = $_SERVER['REQUEST_URI'];
			$FDM_new_URI = add_query_arg('FDM_rate', "0", $FDM_new_URI);
			// Style should be done here because it is not loaded outside the plugin admin panel
			$style_botton = "background:#f0f5fa;padding:5px;text-decoration:none;margin-right:10px;border:1px solid #999;border-radius:4px"; ?>

			<div style="padding:15px !important;" class="updated FDM-top-main-msg">
				<span style="font-size:16px;color:green;font-weight:bold;"><?php _e('Awesome!', 'form-data-manager'); ?></span>
				<p style="font-size:14px;line-height:30px">
					<?php _e('The plugin "Contact Form 7 Database Manager Addon – CF7DBM" is helping you store and manage your CF7 submissions easily!', 'form-data-manager'); ?>
					<br/>
					<?php _e('Could you please kindly help the plugin in your turn by giving it 5 stars rating? (Thank you in advance)', 'form-data-manager'); ?>
					<div style="font-size:14px;margin-top:10px">
					<a style="<?php echo $style_botton ?>" target="_blank" href="https://wordpress.org/support/plugin/form-data-manager/reviews/?filter=5">
					<?php _e('Ok, you deserved it', 'form-data-manager'); ?></a>
					<form method="post" action="" style="display:inline">
					<input type="hidden" name="dont_show_rate" value=""/>
					<a style="<?php echo $style_botton ?>" href="<?php echo esc_url( $FDM_new_URI ); ?>"><?php _e('I already did', 'form-data-manager'); ?></a>
					<a style="<?php echo $style_botton ?>" href="<?php echo esc_url( $FDM_new_URI ); ?>"><?php _e('Please don\'t show this again', 'form-data-manager'); ?></a>
					</form>
					</div>
				</p>
			</div>
	<?php
		}
	}

	public function cf7_add_custom_admin_link( $actions, $item ) {
	    //$current_user = wp_get_current_user();

	    //if ( current_user_can( 'wpcf7_edit_contact_form', $item->id() ) ) {
	        $url = admin_url( 'admin.php?page=wpcf7&post=' . $item->id() );  // Adjust this URL as needed
	        $actions['custom_action'] = sprintf( '<a href="%1$s">%2$s</a>', esc_url( $url ), esc_html( 'Custom Link', 'contact-form-7' ) );  // Change 'Custom Link' to your desired link text
	    //}

	    return $actions;
	}

	function enqueue_cf7_custom_admin_script($hook) {

		if ('toplevel_page_wpcf7' !== $hook) return;

	    wp_enqueue_script('cf7-custom-admin', plugins_url( 'admin/js/cf7-custom.js', __FILE__), array('jquery'), '1.0', true);
	}

	function add_plugin_links( $actions, $plugin_file ) {

		$links = array();
		
		if ( WPFDM_Plugin_NAME === $plugin_file ) {
	    	
	    	$links['plugin_homepage'] = '<a href="' . admin_url('admin.php?page=fdm_form') . '">' . __('Submissions', 'form-data-manager'). '</a>';

	   	}

	    return array_merge($links, $actions);
	}

	function add_plugin_meta_links( $links, $file ) {

		if ( WPFDM_Plugin_NAME !== $file ) {
			return $links;
		}

		$support_link = '<a target="_blank" href="https://wordpress.org/support/plugin/form-data-manager/" title="' . __('Get help', 'form-data-manager') . '">' . __('Support', 'form-data-manager') . '</a>';
		$home_link = '<a target="_blank" href="https://wordpress.org/plugins/form-data-manager/" title="' . __('Plugin Homepage', 'form-data-manager') . '">' . __('Plugin Homepage', 'form-data-manager') . '</a>';
		$rate_link = '<a target="_blank" href="https://wordpress.org/support/plugin/form-data-manager/reviews/" title="' . __('Rate the plugin', 'form-data-manager') . '">' . __('Rate the plugin ★★★★★', 'form-data-manager') . '</a>';
		
		$links[] = $support_link;
		$links[] = $home_link;
		$links[] = $rate_link;

		return $links;
	}


	/** 
	*
    * @since 1.0.0
	* 
    * Called when the plugin is activated
    * 
    */
    function activate() {
    	// we import the class that executes the necessary queries to create the tables schematas
    	require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-db-initialyzer.php' );
    	new WPFDM_DB_Initializer(); 

    	set_transient( 'wpfdm_plugin_activated', true, DAY_IN_SECONDS ); // Useful for the notice
		update_option ( 'wpfdm_plugin_tm_fr_rtg', time() ); // Useful for rating popup

	}

	/** 
	*
    * @since 1.0.0
    * 
    * Called when the plugin is deactivated
    * 
    */
	function deactivate() {
		remove_action( 'wpcf7_before_send_mail', 'save_the_new_contact' );
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Called to load the languages files
    * 
    */
	function fdm_load_plugin_textdomain() {
	    load_plugin_textdomain( 'form-data-manager', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	private function endsWith($haystack, $needle) {
	    

	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }
	    return (substr($haystack, -$length) === $needle);
	}
	/**
	* @since 1.0.0
	*
	* 
    * Function that loads the plugin required CSS and JS
    * 
    */
    function fdm_load_custom_wp_admin_style( $hook ) {
        
        // We load CSS and JS only on the two plugin pages : "fdm_form" and "fdm_imports"

    	//echo 'nasri:' . $hook; nasri:contact-1_page_fdm_form 
        if( $this->endsWith( $hook, '_page_fdm_form') || $this->endsWith( $hook, '_page_fdm_imports' ) ) {

	        wp_register_style( 'custom_wp_admin_css', plugins_url( 'admin/css/style.css', __FILE__), false, '1.0.0' );
	       	wp_register_style( 'custom_fonts', 'https://fonts.googleapis.com/css?family=Roboto&display=swap');
	       	wp_register_style( 'custom_bootstrap_css', plugins_url( 'admin/css/bootstrap.min.css', __FILE__), false );

	        wp_enqueue_style( 'custom_bootstrap_css' );
	        wp_enqueue_style( 'custom_wp_admin_css' );
	        wp_enqueue_style( 'custom_fonts' );

	        wp_enqueue_script("jquery");
	        
			wp_enqueue_script( 'poper', plugins_url( 'admin/js/popper.min.js', __FILE__), array( 'jquery' ),'',true );
		    wp_enqueue_script( 'bootstrap', plugins_url( 'admin/js/bootstrap.min.js', __FILE__), array( 'jquery' ),'',true );
		    wp_enqueue_script( 'sweet2_js', plugins_url( 'admin/js/sweetalert2.js', __FILE__), null,'',true );
		    wp_enqueue_script( 'script_js', plugins_url( 'admin/js/script.js', __FILE__), null,'',true );
		

		}
	}

		/** 
	*
    * @since 1.0.0
    * 
    * Called to add the nenu and the submenu to the admin interface
    * 
    */
	function add_menu() {

		if( is_admin() ){

			add_submenu_page(
		        'wpcf7',                          // The slug name for the parent menu (CF7 slug)
		        __('Forms', 'form-data-manager'),  // Page title to be displayed in the browser title bar
		        __('Submissions', 'form-data-manager'),  // The text to be used for the menu
		        'manage_options',                 // The capability required for this menu to be displayed to the user
		        'fdm_form',                 // The slug name to refer to this menu by
		        array($this, 'fdm_main_page')  // The callback function used to render the page content
		    );

        	// We add a submenu "Import" only if there is some data to import

        	require_once( plugin_dir_path( __FILE__ ) . '/inc/model/class-wpfdm-cf7-dao.php' );
			
			if ( WPFDM_CF7_Dao::getInstance()->is_there_something_to_import() ) {

				// Add the submenu : Import
	        	add_submenu_page( 
	        		'wpcf7', 
	        		__('Import', 'form-data-manager'), 
	        		__('Submissions Import', 'form-data-manager'), 
	        		'manage_options', 
	        		'fdm_imports', 
	        		array($this, 'fdm_import_page')  );
			}
        }
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The "import" page, relative to the submenu
    * 
    */
	function fdm_import_page() {

		require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-data-import.php' );
		WPFDM_Import_Data::getInstance()->run();
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that builds the main pages, it : 
    * - Redirect to Form List page 		if no parameter is received via URL
    * - Redirect to Contact List page 	if a parameter 'form_id' 	is recevied via URL
    * 
    */
	function fdm_main_page() {

		// if l (level) is not defined, then go to the forms list
		if ( empty($_GET['l']) ) {

			// Object that handles the form list page
			require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-forms-list.php' );
			WPFDM_Forms_List::getInstance()->run();		
	        return;

		} else {

			if ( $_GET['l'] == 'f' ) { // if l (level) == f (forms)

				// Object that handles the form list page
				require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-forms-list.php' );
				WPFDM_Forms_List::getInstance()->run();	
	            return;
			
			} elseif ( $_GET['l'] == 'c' ) { // if l (level) == c (contacts)

				// Object that handles the contact list page
	            require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-contacts-list.php' );
				WPFDM_Contacts_List::getInstance()->run();
	            return;

			}
		}
	}

    /**
	* @since 1.0.0
	* 
	* Function called with ajax to enable/desable a specific form
	*
	*/
    function enable_fdm_form() {
    	require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-forms-list.php' );
		WPFDM_Forms_List::getInstance()->enable_fdm_form();
	}

    /**
	* @since 1.0.0
	*
	* Function called with ajax mark as read/new a specific contact
	* 
	*/
    function mark_contact_as_read_fdm_form() {
    	require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-contacts-list.php' );
		WPFDM_Contacts_List::getInstance()->mark_contact_as_read_fdm_form();
	}

    /**
	* @since 1.0.0
	* 
	* Function that allows exporting data into a CSV file
    *
	*/
    function export() {

    	if ( isset($_GET['export']) ) {
			require_once( plugin_dir_path( __FILE__ ) . '/inc/class-wpfdm-data-export.php' );
			
			WPFDM_Export::getInstance()->run();
		}
    }

	/** 
	*
    * @since 1.0.0
    * 
    * This function is called before the CF7 contact is sent
    * it: 
    * - Get all sent data
    * - filter the important ones
    * - Store them in the plugin tables
    * - Store the attached files, if any, in the upload directory
    * 
    */
	function save_the_new_contact( $contact_form ) {
    
    	require_once (plugin_dir_path( __FILE__ ) . 'inc/utils/class-wpfdm-utilities.php');

    	if (!isset($contact_form->posted_data) && class_exists('WPCF7_Submission')) {

			$submission = WPCF7_Submission::get_instance();
 
 			// if a CF7 submission is processed
 			if ( $submission ) {

 				$posted_data = $submission->get_posted_data();

 				// The array to be filled and saved into DB
 				$contact_data = array();
		    	
				$contact_data['form_id'] 		= $contact_form->id();

				// We check if the form is active before saving it in the database
				require_once( plugin_dir_path( __FILE__ ) . '/inc/model/class-wpfdm-form-dao.php' );
    			
    			if ( ! WPFDM_Form_Dao::getInstance()->is_active ( $contact_data['form_id'] ) )
    				return;

		    	/* Here is example of the content of $submission->get_posted_data();
				* _wpcf7 				=> 20
				* _wpcf7_version 		=> 5.1.1
				* _wpcf7_locale 		=> fr_FR
				* _wpcf7_unit_tag		=> wpcf7-f20-p29-o1
				* _wpcf7_container_post => 29
				* g-recaptcha-response 	=> 
				* your-name 			=> my name
				* your-email 			=> test@gmail.com
				* your-subject 			=> Example of subject
				* your-message 			=> Example of message 
				* file-922 				=> my_file1.png
				* file-924 				=> my_file2.png
				*/

				/* Here are, for the same example, the content of $submission->uploaded_files();
				* file-922 => /.../wordpress_dir/wp-content/uploads/wpcf7_uploads/2039308434/my_file1.png
				* file-924 => /.../wordpress_dir/wp-content/uploads/wpcf7_uploads/2039398798/my_file2.png
				*/

				// There are many pairs key=value in the $submission->get_posted_data array to ignore
				$keys_to_ignore = array(
					'_wpcf7', 
					'_wpcf7_version', 
					'_wpcf7_locale', 
					'_wpcf7_unit_tag', 
					'_wpcf7_is_ajax_call',
					'cfdb7_name', 
					'_wpcf7_container_post',
					'_wpcf7cf_hidden_group_fields', 
					'_wpcf7cf_hidden_groups', 
					'_wpcf7cf_visible_groups', 
					'_wpcf7cf_options',
					'g-recaptcha-response',
				);

				// In order for the files name (my_file1.png and my_file1.png for example) to be uniques in the upload directory, we need save them under another unique name, we propose to put the value of time() at the begening of each file name, hence, each file name will be unique.

				// Attachments 
				$posted_files 	= $submission->uploaded_files();

				$keys_to_new_filenames_map = array();

				foreach ( $posted_data as $key => $value ) {
					// If the key is not to ignore, then store the value into the $contact_data['form_value'] array
					if( !in_array($key, $keys_to_ignore) ) {

						// If the current key=>value is for a file, then add the time the begining
						// This replace my_file1.png with 2039308434_my_file1.png
						if ( !empty($posted_files) && array_key_exists($key, $posted_files) ) {
							
							$new_filename 	= time() . '_' . $value;

							// Useful later when copying the file.
							$keys_to_new_filenames_map[$key] 		= $new_filename;

							$contact_data['contact_value'][ $key ] = array (
								't' => 'f', 				// type  = file
								'v'	=> $new_filename, 		// value = $new_filename
							);

						} else {

							if ( WPFDM_Utilities::startsWith($key, 'your-') ){
								$key = substr ( $key , 5);
							}

							// Make the first letter uppercase
							$key = Ucfirst ($key);

							//$contact_data['contact_value'][ $key ]['t'] = $value;
							$contact_data['contact_value'][ $key ] = array (
								't' => 'd', 				// type  = data
								'v'	=> $value, 				// value = $value
							);
						}
						
					}
				}

				// Attachments 

				if ( !empty($posted_files) ) {
			        
			        $wp_uploads_dir 	= wp_upload_dir();
	    			$fdm_uploads_dir 	= $wp_uploads_dir['basedir'] . '/fdm_uploads';

	    			if ( !file_exists($fdm_uploads_dir) ) {

	    				// We create the dir with the 755 permissions
					    mkdir($fdm_uploads_dir, 0755);

					    // We put an index.html file that prevents users from listing this directory contents.
					    $index_file = $fdm_uploads_dir . '/index.html';
						$handle = fopen($index_file, 'w');
					}


	    			/* 
	    			* Example of $posted_files array:
					* file-922 => /.../wordpress_dir/wp-content/uploads/wpcf7_uploads/2039308434/my_file1.png
					* file-924 => /.../wordpress_dir/wp-content/uploads/wpcf7_uploads/2039398798/my_file2.png
					*
					* The objective is to get the key:file-922, look for the new filename in the 
					*     $keys_to_new_filenames_map, then copy the my_file1.png file under the new 
					*     name
					*/
					foreach ( $posted_files as $file_key => $file_path ) {
			           	
			           	$new_filename = $keys_to_new_filenames_map[ $key ];
			           	$new_filepath = $fdm_uploads_dir .'/'. $new_filename;

			            copy( $file_path, $new_filepath );
			        }
			    }

		        $contact_data['contact_date'] 	= current_time( 'mysql' );

		        // Serialize the $contact_data['form_value'] array
				$contact_data['contact_value'] = serialize( $contact_data['contact_value'] );

				// Save the data into database
				require_once( plugin_dir_path( __FILE__ ) . '/inc/model/class-wpfdm-contact-dao.php' );
    			
    			WPFDM_Contact_Dao::getInstance()->add_new( $contact_data );

		   	} 
		}
    }

    /** 
	*
    * @since 1.0.0
    * 
    * This function is called after CF7 creates a new form, 
    * We create a new corresponding record in our "forms" through
    * 
    */
    function save_the_new_form( $instance ) { 
        
        $form_data = array( 
			'form_id' 		=> $instance->id(),
			'form_state'	=> 1,
			'form_title'	=> $instance->title(),
		);

        require_once( plugin_dir_path( __FILE__ ) . '/inc/model/class-wpfdm-form-dao.php' );
    	WPFDM_Form_Dao::getInstance()->add_new ( $form_data );

    }

   /** 
	*
    * @since 1.0.0
    * 
    * This function is called after CF7 updates an existing form, 
    * Through this function, we update the form title in our table with the new title of the CF7 form
    * 
    */
    function save_the_updated_form( $instance ) { 
        
        $fields_to_update = array( 'form_title'	=> $instance->title() );

        $form_id = $instance->id();

        require_once( plugin_dir_path( __FILE__ ) . '/inc/model/class-wpfdm-form-dao.php' );
    	WPFDM_Form_Dao::getInstance()->update ( $form_id , $fields_to_update );
    }
    
}
}

// Global variables

$errors = array(); 

// We create an object of the plugin main class
$wpfdrm_app = new WPFDM_Plugin();
