<?php

/*
Plugin Name: AP Schema
Plugin URI: www.apinadev.com
Description: ** IMPORTANT ** - AP Schema is no longer supported - please check out Schema Creator by Raven - http://wordpress.org/plugins/schema-creator/ instead.
Version: 2.0.0
Author: Dean Robinson
Author URI: http://www.apinadev.com
License: GPLv2
Text Domain: ap-schema
*/

// Include constants file
require_once( dirname( __FILE__ ) . '/lib/constants.php' );


class APSCHEMA {


    var $namespace = "ap-schema";
    var $friendly_name = "AP Schema";
    var $version = "2.0.0";

    // Default plugin options
    var $defaults = array(
        'option_1' => "foobar",
		'styles' => "basic",
		'allowshortcodes' => FALSE,
		'aps_float' => "left",
		'reviewicons' => "yellowstar",
		'aps_price' => "$"


    );

    /**
     * Instantiation construction
     *
     * @uses add_action()
     * @uses APSCHEMA::wp_register_scripts()
     * @uses APSCHEMA::wp_register_styles()
     */
    function __construct() {


        // Name of the option_value to store plugin options in
        $this->option_name = '_' . $this->namespace . '--options';

        // Load all library files used by this plugin
        $libs = glob( APSCHEMA_DIRNAME . '/lib/*.php' );
        foreach( $libs as $lib ) {
            include_once( $lib );
        }

        /**
         * Make this plugin available for translation.
         * Translations can be added to the /languages/ directory.
         */
        //load_theme_textdomain( $this->namespace, APSCHEMA_DIRNAME . '/languages' );
        load_plugin_textdomain( $this->namespace, false, basename(dirname( __FILE__ )) . '/languages' );

		// Add all action, filter and shortcode hooks
		$this->_add_hooks();
    }




    /**
     * Add in various hooks
     *
     * Place all add_action, add_filter, add_shortcode hook-ins here
     */
    private function _add_hooks() {
        // Options page for configuration
        add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
        // Route requests for form processing
        add_action( 'init', array( &$this, 'route' ) );

        // Add a settings link next to the "Deactivate" link on the plugin listing page
        add_filter( 'plugin_action_links', array( &$this, 'plugin_action_links' ), 10, 2 );

        // Register all JavaScripts for this plugin
        add_action( 'init', array( &$this, 'wp_register_scripts' ), 1 );
        // Register all Stylesheets for this plugin
        add_action( 'init', array( &$this, 'wp_register_styles' ), 1 );
    }

    /**
     * Process update page form submissions
     *
     * @uses APSCHEMA::sanitize()
     * @uses wp_redirect()
     * @uses wp_verify_nonce()
     */
    private function _admin_options_update() {
        // Verify submission for processing using wp_nonce
        if( wp_verify_nonce( $_REQUEST['_wpnonce'], "{$this->namespace}-update-options" ) ) {
            $data = array();
            /**
             * Loop through each POSTed value and sanitize it to protect against malicious code. Please
             * note that rich text (or full HTML fields) should not be processed by this function and
             * dealt with directly.
             */
            foreach( $_POST['data'] as $key => $val ) {
                $data[$key] = $this->_sanitize( $val );
            }

            /**
             * Place your options processing and storage code here
             */

            // Update the options value with the data submitted
            update_option( $this->option_name, $data );

            // Redirect back to the options page with the message flag to show the saved message
            wp_safe_redirect( $_REQUEST['_wp_http_referer'] . '&message=1' );
            exit;
        }
    }

    /**
     * Sanitize data
     *
     * @param mixed $str The data to be sanitized
     *
     * @uses wp_kses()
     *
     * @return mixed The sanitized version of the data
     */
    private function _sanitize( $str ) {
        if ( !function_exists( 'wp_kses' ) ) {
            require_once( ABSPATH . 'wp-includes/kses.php' );
        }
        global $allowedposttags;
        global $allowedprotocols;

        if ( is_string( $str ) ) {
            $str = wp_kses( $str, $allowedposttags, $allowedprotocols );
        } elseif( is_array( $str ) ) {
            $arr = array();
            foreach( (array) $str as $key => $val ) {
                $arr[$key] = $this->_sanitize( $val );
            }
            $str = $arr;
        }

        return $str;
    }

    /**
     * Hook into register_activation_hook action
     *
     * Put code here that needs to happen when your plugin is first activated (database
     * creation, permalink additions, etc.)
     */
    static function activate() {

if ( version_compare(PHP_VERSION, '5.3.0', '<') ) {
    wp_die('PHP 5.3.0 or higher is required, please contact your web host to upgrade. <br> <br> Please press back to return to WordPress.');
};


//check if options exist, if not add in some defaults.
$aps_get_prefix = '_ap-schema--options';
if( !get_option( $aps_get_prefix) ) {
    $defaults = array(
		'styles' => "basic",
		'allowshortcodes' => FALSE,
		'aps_float' => "left",
		'reviewicons' => "yellowstar",
		'aps_price' => "$"
    );

update_option( $aps_get_prefix, $defaults);
} else {
//do nothing
}



//store table names
    global $wpdb;
    $wpdb->aps_book = "{$wpdb->prefix}aps_book";
    $wpdb->aps_event = "{$wpdb->prefix}aps_event";
    $wpdb->aps_movie = "{$wpdb->prefix}aps_movie";
    $wpdb->aps_organisation = "{$wpdb->prefix}aps_organisation";
    $wpdb->aps_person = "{$wpdb->prefix}aps_person";
    $wpdb->aps_product = "{$wpdb->prefix}aps_product";
    $wpdb->aps_recipe = "{$wpdb->prefix}aps_recipe";
    $wpdb->aps_review = "{$wpdb->prefix}aps_review";


//create tables
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;
	global $charset_collate;
	//book
	$aps_sql_create_table = "CREATE TABLE {$wpdb->aps_book} (
		book_id bigint(20)unsigned NOT NULL auto_increment,
		book_name tinytext NOT NULL default '',
		book_url varchar(256) NOT NULL default '',
		book_desc text NOT NULL default '',
		book_author tinytext NOT NULL default '',
		book_publisher tinytext NOT NULL default '',
		book_pub_date date NOT NULL default '0000-00-00',
		book_edition varchar(50) NOT NULL default '',
		book_isbn varchar (25) NOT NULL default '',
		book_format varchar(25) NOT NULL default '',
		book_genre varchar(100) NOT NULL default '',
		book_review_by tinytext NOT NULL default '',
		book_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (book_id)
     ) $charset_collate; ";

	//event
	$aps_sql_create_table .= " CREATE TABLE {$wpdb->aps_event} (
		event_id bigint(20) NOT NULL auto_increment,
		event_name tinytext NOT NULL default '',
		event_type varchar(50) NOT NULL default '',
		event_url varchar(256) NOT NULL default '',
		event_desc text NOT NULL default '',
		event_start_date varchar(50) NOT NULL default '',
		event_start_time varchar(50) NOT NULL default '',
		event_end_date varchar(50) NOT NULL default '',
		event_end_time varchar(50) NOT NULL default '',
		event_duration smallint NOT NULL,
		event_address text NOT NULL default '',
		event_pobox tinytext NOT NULL default '',
		event_city tinytext NOT NULL default '',
		event_region tinytext NOT NULL default '',
		event_postalcode tinytext NOT NULL default '',
		event_country tinytext NOT NULL default '',
		event_email tinytext NOT NULL default '',
		event_phone varchar (30) NOT NULL,
		event_review_by tinytext NOT NULL default '',
		event_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (event_id)
     ) $charset_collate; ";

	//movie
	$aps_sql_create_table .= " CREATE TABLE {$wpdb->aps_movie} (
		movie_id bigint(20) NOT NULL auto_increment,
		movie_name tinytext NOT NULL default '',
		movie_url varchar(256) NOT NULL default '',
		movie_desc text NOT NULL default '',
		movie_director tinytext NOT NULL default '',
		movie_producer tinytext NOT NULL default '',
		movie_actors text NOT NULL default '',
		movie_review_by tinytext NOT NULL default '',
		movie_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (movie_id)
     ) $charset_collate; ";

	//organisation
	$aps_sql_create_table .= " CREATE TABLE {$wpdb->aps_organisation} (
		organisation_id bigint(20) NOT NULL auto_increment,
		organisation_type varchar(50) NOT NULL default '',
		organisation_name tinytext NOT NULL default '',
		organisation_url varchar(256) NOT NULL default '',
		organisation_desc text NOT NULL default '',
		organisation_address tinytext NOT NULL default '',
		organisation_pobox tinytext NOT NULL default '',
		organisation_city tinytext NOT NULL default '',
		organisation_region tinytext NOT NULL default '',
		organisation_postalcode tinytext NOT NULL default '',
		organisation_country tinytext NOT NULL default '',
		organisation_email tinytext NOT NULL default '',
		organisation_phone varchar (30) NOT NULL,
		organisation_fax varchar (30) NOT NULL,
		organisation_logo varchar(256) NOT NULL default '',
		organisation_review_by tinytext NOT NULL default '',
		organisation_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (organisation_id)
     ) $charset_collate; ";

	//Person
	$aps_sql_create_table .= " CREATE TABLE {$wpdb->aps_person} (
		person_id bigint(20) NOT NULL auto_increment,
		person_name tinytext NOT NULL default '',
		person_org tinytext NOT NULL default '',
		person_job_title tinytext NOT NULL default '',
		person_url varchar(256) NOT NULL default '',
		person_desc text NOT NULL default '',
		person_birthday datetime NOT NULL default '0000-00-00 00:00:00',
		person_photo_url varchar(256) NOT NULL default '',
		person_address tinytext NOT NULL default '',
		person_pobox tinytext NOT NULL default '',
		person_city tinytext NOT NULL default '',
		person_region tinytext NOT NULL default '',
		person_postalcode tinytext NOT NULL default '',
		person_country tinytext NOT NULL default '',
		person_email tinytext NOT NULL default '',
		person_phone varchar (30) NOT NULL,
		person_fax varchar (30) NOT NULL,
		person_review_by tinytext NOT NULL default '',
		person_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (person_id)
     ) $charset_collate; ";


	//Product
	$aps_sql_create_table .= " CREATE TABLE {$wpdb->aps_product} (
		product_id bigint(20) NOT NULL auto_increment,
		product_name tinytext NOT NULL default '',
		product_url varchar(256) NOT NULL default '',
		product_desc text NOT NULL default '',
		product_brand tinytext NOT NULL default '',
		product_manufacturer tinytext NOT NULL default '',
		product_model tinytext NOT NULL default '',
		product_prod_id tinytext NOT NULL default '',
		product_max_score int(10) NOT NULL,
		product_avg_rating int(10) NOT NULL,
		product_no_reviews int(10) NOT NULL,
		product_price int(10) NOT NULL,
		product_condition tinytext NOT NULL default '',
		product_image_url varchar(256) NOT NULL default '',
		product_affiliate_url varchar(256) NOT NULL default '',
		product_startype tinytext NOT NULL default '',
		product_review_by tinytext NOT NULL default '',
		product_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (product_id)
     ) $charset_collate; ";


	//REcipe
	$aps_sql_create_table .= " CREATE TABLE {$wpdb->aps_recipe} (
		recipe_id bigint(20) NOT NULL auto_increment,
		recipe_name tinytext NOT NULL default '',
		recipe_image_url varchar(256) NOT NULL default '',
		recipe_desc text NOT NULL default '',
		recipe_author tinytext NOT NULL default '',
		recipe_pub_date datetime NOT NULL default '0000-00-00 00:00:00',
		recipe_prep_hours int(10) NOT NULL,
		recipe_prep_mins int(10) NOT NULL,
		recipe_cook_hours int(10) NOT NULL,
		recipe_cook_mins int(10) NOT NULL,
		recipe_yield tinytext NOT NULL default '',
		recipe_calories tinytext NOT NULL default '',
		recipe_fat tinytext NOT NULL default '',
		recipe_sugar tinytext NOT NULL default '',
		recipe_salt tinytext NOT NULL default '',
		recipe_ingredients text NOT NULL default '',
		recipe_instructions text NOT NULL default '',
		recipe_review_by tinytext NOT NULL default '',
		recipe_rating int(10) NOT NULL,
		recipe_rating_min int(10) NOT NULL,
		recipe_rating_max int(10) NOT NULL,
		recipe_startype tinytext NOT NULL default '',
		recipe_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (recipe_id)
     ) $charset_collate; ";

	//REview
	$aps_sql_create_table .= " CREATE TABLE {$wpdb->aps_review} (
		review_id bigint(20) NOT NULL auto_increment,
		review_name tinytext NOT NULL default '',
		review_url varchar(256) NOT NULL default '',
		review_affiliate_url varchar(256) NOT NULL default '',
		review_desc text NOT NULL default '',
		review_image_url varchar(256) NOT NULL default '',
		review_item_name tinytext NOT NULL default '',
		review_item_review text NOT NULL default '',
		review_rating int(10) NOT NULL,
		review_rating_min int(10) NOT NULL,
		review_rating_max int(10) NOT NULL,
		review_author tinytext NOT NULL default '',
		review_pub_date datetime NOT NULL default '0000-00-00 00:00:00',
		review_startype tinytext NOT NULL default '',
		review_save_name tinytext NOT NULL default '',
		PRIMARY KEY  (review_id)
     ) $charset_collate; ";


	dbDelta( $aps_sql_create_table );


//wp-die();
}





	/**
     * Define the admin menu options for this plugin
     *
     * @uses add_action()
     * @uses add_options_page()
     */
    function admin_menu() {
        $page_hook = add_options_page( $this->friendly_name, $this->friendly_name, 'administrator', $this->namespace, array( &$this, 'admin_options_page' ) );

        // Add print scripts and styles action based off the option page hook
        add_action( 'admin_print_scripts-' . $page_hook, array( &$this, 'admin_print_scripts' ) );
        add_action( 'admin_print_styles-' . $page_hook, array( &$this, 'admin_print_styles' ) );
    }


    /**
     * The admin section options page rendering method
     *
     * @uses current_user_can()
     * @uses wp_die()
     */
    function admin_options_page() {
        if( !current_user_can( 'manage_options' ) ) {
            wp_die( 'You do not have sufficient permissions to access this page' );
        }

        $page_title = $this->friendly_name . ' Options';
        $namespace = $this->namespace;

        include( APSCHEMA_DIRNAME . "/views/options.php" );
    }

    /**
     * Load JavaScript for the admin options page
     *
     * @uses wp_enqueue_script()
     */
    function admin_print_scripts() {
        wp_enqueue_script( "{$this->namespace}-admin" );
    }

    /**
     * Load Stylesheet for the admin options page
     *
     * @uses wp_enqueue_style()
     */
    function admin_print_styles() {
        wp_enqueue_style( "{$this->namespace}-admin" );
    }

    /**
     * Hook into register_deactivation_hook action
     *
     * Put code here that needs to happen when your plugin is deactivated
     */
    static function deactivate() {
        // Do deactivation actions
    }

    /**
     * Retrieve the stored plugin option or the default if no user specified value is defined
     *
     * @param string $option_name The name of the TrialAccount option you wish to retrieve
     *
     * @uses get_option()
     *
     * @return mixed Returns the option value or false(boolean) if the option is not found
     */
    function get_option( $option_name ) {
        // Load option values if they haven't been loaded already
        if( !isset( $this->options ) || empty( $this->options ) ) {
            $this->options = get_option( $this->option_name, $this->defaults );
        }

        if( isset( $this->options[$option_name] ) ) {
            return $this->options[$option_name];    // Return user's specified option value
        } elseif( isset( $this->defaults[$option_name] ) ) {
            return $this->defaults[$option_name];   // Return default option value
        }
        return false;
    }

    /**
     * Initialization function to hook into the WordPress init action
     *
     * Instantiates the class on a global variable and sets the class, actions
     * etc. up for use.
     */
    static function instance() {
        global $APSCHEMA;

        // Only instantiate the Class if it hasn't been already
        if( !isset( $APSCHEMA ) ) $APSCHEMA = new APSCHEMA();
    }

	/**
	 * Hook into plugin_action_links filter
	 *
	 * Adds a "Settings" link next to the "Deactivate" link in the plugin listing page
	 * when the plugin is active.
	 *
	 * @param object $links An array of the links to show, this will be the modified variable
	 * @param string $file The name of the file being processed in the filter
	 */
	function plugin_action_links( $links, $file ) {
		if( $file == plugin_basename( APSCHEMA_DIRNAME . '/' . basename( __FILE__ ) ) ) {
            $old_links = $links;
            $new_links = array(
                "settings" => '<a href="options-general.php?page=' . $this->namespace . '">' . __( 'Settings' ) . '</a>'
            );
            $links = array_merge( $new_links, $old_links );
		}

		return $links;
	}

    /**
     * Route the user based off of environment conditions
     *
     * This function will handling routing of form submissions to the appropriate
     * form processor.
     *
     * @uses APSCHEMA::_admin_options_update()
     */
    function route() {
        $uri = $_SERVER['REQUEST_URI'];
        $protocol = isset( $_SERVER['HTTPS'] ) ? 'https' : 'http';
        $hostname = $_SERVER['HTTP_HOST'];
        $url = "{$protocol}://{$hostname}{$uri}";
        $is_post = (bool) ( strtoupper( $_SERVER['REQUEST_METHOD'] ) == "POST" );

        // Check if a nonce was passed in the request
        if( isset( $_REQUEST['_wpnonce'] ) ) {
            $nonce = $_REQUEST['_wpnonce'];

            // Handle POST requests
            if( $is_post ) {
                if( wp_verify_nonce( $nonce, "{$this->namespace}-update-options" ) ) {
                    $this->_admin_options_update();
                }
            }
            // Handle GET requests
            else {

            }
        }
    }

    /**
     * Register scripts used by this plugin for enqueuing elsewhere
     *
     * @uses wp_register_script()
     */
    function wp_register_scripts() {
        // Admin JavaScript
        wp_register_script( "{$this->namespace}-admin", APSCHEMA_URLPATH . "/js/aps_admin.js", array( 'jquery' ), $this->version, true );
		//neeeded? wp_register_script( "{$this->namespace}-admin", APSCHEMA_URLPATH . "/js/jquery.desrialize.js", array( 'jquery' ), $this->version, true );
		wp_register_script( "{$this->namespace}-validate", APSCHEMA_URLPATH . "/js/jquery.validate.min.js", array( 'jquery' ), $this->version, true );
		wp_register_script( "{$this->namespace}-validation", APSCHEMA_URLPATH . "/js/aps_validation.js", array( 'jquery' ), $this->version, true );
		wp_register_script( "{$this->namespace}-zebra", APSCHEMA_URLPATH . "/js/zebra_dialog.js", array( 'jquery' ), $this->version, true );

	}

    /**
     * Register styles used by this plugin for enqueuing elsewhere
     *
     * @uses wp_register_style()
     */
    function wp_register_styles() {
        // Admin Stylesheet
        wp_register_style( "{$this->namespace}-admin", APSCHEMA_URLPATH . "/css/aps_admin.css", array(), $this->version, 'screen' );
        wp_register_style( "{$this->namespace}-zebra", APSCHEMA_URLPATH . "/css/zebra_dialog.css", array(), $this->version, 'screen' );
        //wp_register_style( "{$this->namespace}-admin", APSCHEMA_URLPATH . "/css/aps_frontend_default.css", array(), $this->version, 'screen' );
    }
}
if( !isset( $APSCHEMA ) ) {
	APSCHEMA::instance();
}

register_activation_hook( __FILE__, array( 'APSCHEMA', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'APSCHEMA', 'deactivate' ) );







add_action("wp_ajax_aps_save_update_schema", "aps_save_update_schema");
add_action("wp_ajax_nopriv_aps_save_update_schema", "aps_save_update_schema");

function aps_save_update_schema() {
global $wpdb;

		$aps_the_data = $_POST['schema_data'];

		//the conversion below messes up the actors/ingredients so pull them out now if they exist
		$aps_actor_array = array();
		foreach($aps_the_data as $a) {
			if($a['name'] == "aps_movie_actors") {
				$aps_actor_array[] = $a;
		}
		}

		$aps_ingredient_array = array();
		foreach($aps_the_data as $a) {
			if($a['name'] == "aps_recipe_ingredients") {
				$aps_ingredient_array[] = $a;
		}
		}


		//convert that messy nested array into a neat array
		$finalarray = array();
		foreach($aps_the_data as $k) {
			$finalarray[$k['name']] = $k['value'];
		}

		//var_dump($aps_the_data);
		//var_dump($finalarray);
		//wp_die();

		$aps_the_schema_type = $_POST['schema_type'];

		$aps_the_table_name = $_POST['table_name'];
		$tblname = $wpdb->prefix . "$aps_the_table_name";

		/************** start if statements ****************/

		if($aps_the_schema_type == 'book' ) {

					//make sure there is a save name, if not create one from book name and rand, if no book name create one from word book_ and random.
					$aps_savename_name = $finalarray['aps_book_save_name'];
					$aps_savenname_bookname = $finalarray['aps_book_name'];


					if( $aps_savename_name == '' && $aps_savenname_bookname !== '' ) { $aps_savename_check = $aps_savenname_bookname . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_bookname == '' ) { $aps_savename_check = 'book_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}


					$aps_convert_datez = $finalarray['aps_book_pub_date'];
					$aps_convert_datez = aps_convert_date($aps_convert_datez);

					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE book_save_name = %s",
																		   $aps_savename_check
																		   ));

					//change double qoutes in save name to single quotes - left out for now, will use jquery as its backend.
					//$aps_savename_check = str_replace('"', "'", $aps_savename_check);

					$aps_schema_data = array (
							'book_name' => $finalarray['aps_book_name'],
							'book_url' => $finalarray['aps_book_website'],
							'book_desc' => $finalarray['aps_book_description'],
							'book_author' => $finalarray['aps_book_author'],
							'book_publisher' => $finalarray['aps_book_publisher'],
							'book_pub_date' => $aps_convert_datez,
							'book_edition' => $finalarray['aps_book_edition'],
							'book_isbn' => $finalarray['aps_book_isbn'],
							'book_format' => $finalarray['apschema_book_schema_format'],
							'book_genre' => $finalarray['apschema_book_schema_genre'],
							'book_review_by' => $finalarray['aps_book_review_by'],
							'book_save_name' => $aps_savename_check
							);

					$aps_schema_savename_column = 'book_save_name';

		} // end if $aps_the_schema_type = book

		if($aps_the_schema_type == 'event' ) {

					//make sure there is a save name, if not create one from event name and rand, if no event name create one from word event_ and random.
					$aps_savename_name = $finalarray['aps_event_save_name'];
					$aps_savenname_eventname = $finalarray['aps_event_name'];
					if( $aps_savename_name == '' && $aps_savenname_eventname !== '' ) { $aps_savename_check = $aps_savenname_eventname . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_eventname == '' ) { $aps_savename_check = 'event_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}

					$aps_convert_start_datez = $finalarray['aps_event_start_date'];
					$aps_convert_end_datez = $finalarray['aps_event_end_date'];

					$aps_convert_start_datez = aps_convert_date($aps_convert_start_datez);
					$aps_convert_end_datez = aps_convert_date($aps_convert_end_datez);


					//$aps_slashes_save_name_check = addslashes($aps_savename_check);
					//$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE event_save_name = '$aps_slashes_save_name_check'");

					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE event_save_name = %s",
																		   $aps_savename_check
																		   ));

					$aps_schema_data = array (
							'event_name' => $finalarray['aps_event_name'],
							'event_type' => $finalarray['aps_event_schema_event_type'],
							'event_url' => $finalarray['aps_event_website'],
							'event_desc' => $finalarray['aps_event_description'],
							'event_start_date' => $aps_convert_start_datez,
							'event_start_time' => $finalarray['aps_event_start_time'],
							'event_end_date' => $aps_convert_end_datez,
							'event_end_time' => $finalarray['aps_event_end_time'],
							'event_duration' => $finalarray['aps_event_duration'],
							'event_address' => $finalarray['aps_event_address'],
							'event_pobox' => $finalarray['aps_event_pobox'],
							'event_city' => $finalarray['aps_event_city'],
							'event_region' => $finalarray['aps_event_state_region'],
							'event_postalcode' => $finalarray['aps_event_postal_code'],
							'event_country' => $finalarray['aps_event_country'],
							'event_email' => $finalarray['aps_event_email'],
							'event_phone' => $finalarray['aps_event_telephone'],
							'event_review_by' => $finalarray['aps_event_review_by'],
							'event_save_name' => $aps_savename_check,
							);

					$aps_schema_savename_column = 'event_save_name';

		} // end if $aps_the_schema_type = event


		if($aps_the_schema_type == 'movie' ) {

					//make sure there is a save name, if not create one from movie name and rand, if no movie name create one from word movie_ and random.
					$aps_savename_name = $finalarray['aps_movie_save_name'];
					$aps_savenname_moviename = $finalarray['aps_movie_name'];
					if( $aps_savename_name == '' && $aps_savenname_moviename !== '' ) { $aps_savename_check = $aps_savenname_moviename . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_moviename == '' ) { $aps_savename_check = 'movie_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}

$aps_serialized_actors = serialize($aps_actor_array);


					$aps_slashes_save_name_check = addslashes($aps_savename_check);
					//$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE movie_save_name = '$aps_slashes_save_name_check'");
					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE movie_save_name = %s",
																		   $aps_savename_check
																		   ));

					$aps_schema_data = array (
							'movie_name' => $finalarray['aps_movie_name'],
							'movie_url' => $finalarray['aps_movie_website'],
							'movie_desc' => $finalarray['aps_movie_description'],
							'movie_director' => $finalarray['aps_movie_director'],
							'movie_producer' => $finalarray['aps_movie_producer'],
							'movie_actors' => $aps_serialized_actors, //$finalarray['aps_movie_actors'],
							'movie_review_by' => $finalarray['aps_movie_review_by'],
							'movie_save_name' => $aps_savename_check
							);

					$aps_schema_savename_column = 'movie_save_name';

		} // end if $aps_the_schema_type = movie



		if($aps_the_schema_type == 'organisation' ) {

					//make sure there is a save name, if not create one from organisation name and rand, if no organisation name create one from word organisation_ and random.
					$aps_savename_name = $finalarray['aps_organisation_save_name'];
					$aps_savenname_organisationname = $finalarray['aps_organisation_name'];
					if( $aps_savename_name == '' && $aps_savenname_organisationname !== '' ) { $aps_savename_check = $aps_savenname_organisationname . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_organisationname == '' ) { $aps_savename_check = 'organisation_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}

					$aps_slashes_save_name_check = addslashes($aps_savename_check);
					//$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE organisation_save_name = '$aps_slashes_save_name_check'");
					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE organisation_save_name = %s",
																		   $aps_savename_check
																		   ));

					$aps_schema_data = array (
							'organisation_name' => $finalarray['aps_organisation_name'],
							'organisation_type' => $finalarray['aps_organisation_schema_organisation_type'],
							'organisation_url' => $finalarray['aps_organisation_website'],
							'organisation_desc' => $finalarray['aps_organisation_description'],
							'organisation_address' => $finalarray['aps_organisation_address'],
							'organisation_pobox' => $finalarray['aps_organisation_pobox'],
							'organisation_city' => $finalarray['aps_organisation_city'],
							'organisation_region' => $finalarray['aps_organisation_state_region'],
							'organisation_postalcode' => $finalarray['aps_organisation_postal_code'],
							'organisation_country' => $finalarray['aps_organisation_country'],
							'organisation_email' => $finalarray['aps_organisation_email'],
							'organisation_phone' => $finalarray['aps_organisation_telephone'],
							'organisation_fax' => $finalarray['aps_organisation_fax'],
							'organisation_logo' => $finalarray['aps_organisation_logo'],
							'organisation_review_by' => $finalarray['aps_organisation_review_by'],
							'organisation_save_name' => $aps_savename_check,
							);

					$aps_schema_savename_column = 'organisation_save_name';

		} // end if $aps_the_schema_type = organisation




		if($aps_the_schema_type == 'person' ) {

					//make sure there is a save name, if not create one from person name and rand, if no person name create one from word person_ and random.
					$aps_savename_name = $finalarray['aps_person_save_name'];
					$aps_savenname_personname = $finalarray['aps_person_name'];
					if( $aps_savename_name == '' && $aps_savenname_personname !== '' ) { $aps_savename_check = $aps_savenname_personname . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_personname == '' ) { $aps_savename_check = 'person_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}


					$aps_convert_birthday = $finalarray['aps_person_birthday'];
					$aps_convert_birthday = aps_convert_date($aps_convert_birthday);

					$aps_slashes_save_name_check = addslashes($aps_savename_check);
					//$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE person_save_name = '$aps_slashes_save_name_check'");
					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE person_save_name = %s",
																		   $aps_savename_check
																		   ));

					$aps_schema_data = array (
							'person_name' => $finalarray['aps_person_name'],
							'person_org'	=>	$finalarray['aps_person_org'],
							'person_job_title'	=>	$finalarray['aps_person_job_title'],
							'person_birthday'	=>	$aps_convert_birthday,
							'person_photo_url'	=>	$finalarray['aps_person_photo'],
							'person_url' => $finalarray['aps_person_url'],
							'person_desc' => $finalarray['aps_person_desc'],
							'person_address' => $finalarray['aps_person_address'],
							'person_pobox' => $finalarray['aps_person_pobox'],
							'person_city' => $finalarray['aps_person_city'],
							'person_region' => $finalarray['aps_person_region'],
							'person_postalcode' => $finalarray['aps_person_postalcode'],
							'person_country' => $finalarray['aps_person_country'],
							'person_email' => $finalarray['aps_person_email'],
							'person_phone' => $finalarray['aps_person_telephone'],
							'person_fax' => $finalarray['aps_person_fax'],
							'person_review_by' => $finalarray['aps_person_review_by'],
							'person_save_name' => $aps_savename_check,
							);

					$aps_schema_savename_column = 'person_save_name';

		} // end if $aps_the_schema_type = person





		if($aps_the_schema_type == 'product' ) {

					//make sure there is a save name, if not create one from product name and rand, if no product name create one from word product_ and random.
					$aps_savename_name = $finalarray['aps_product_save_name'];
					$aps_savenname_productname = $finalarray['aps_product_name'];
					if( $aps_savename_name == '' && $aps_savenname_productname !== '' ) { $aps_savename_check = $aps_savenname_productname . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_productname == '' ) { $aps_savename_check = 'product_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}


					$aps_slashes_save_name_check = addslashes($aps_savename_check);
					//$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE product_save_name = '$aps_slashes_save_name_check'");
					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE product_save_name = %s",
																		   $aps_savename_check
																		   ));

					//ok so the startype isnt obtainable by the function that grabs the form fields as it doesnt exist until the tick box is checked and the radio button selected, so if not set give it an empty value to stop it from breeaking.
					if(!isset($finalarray['aps_product_startype'])) { $finalarray['aps_product_startype'] = ''; }

					//var_dump($finalarray);
					//var_dump($finalarray['aps_product_startype']);
					//wp_die();

					$aps_schema_data = array (
							'product_name' => $finalarray['aps_product_name'],
							'product_url'	=>	$finalarray['aps_product_website'],
							'product_desc'	=>	$finalarray['aps_product_description'],
							'product_brand'	=>	$finalarray['aps_product_brand'],
							'product_manufacturer'	=>	$finalarray['aps_product_manufacturer'],
							'product_model' => $finalarray['aps_product_model'],
							'product_prod_id' => $finalarray['aps_product_product_id'],
							'product_max_score' => $finalarray['aps_product_max_score'],
							'product_avg_rating' => $finalarray['aps_product_avg_rating'],
							'product_no_reviews' => $finalarray['aps_product_number_reviews'],
							'product_price' => $finalarray['aps_product_price'],
							'product_condition' => $finalarray['aps_product_condition'],
							'product_image_url' => $finalarray['aps_product_image_url'],
							'product_affiliate_url' => $finalarray['aps_product_affiliate_url'],
							'product_startype' => $finalarray['aps_product_startype'],
							'product_review_by' => $finalarray['aps_product_review_by'],
							'product_save_name' => $aps_savename_check,
							);


					$aps_schema_savename_column = 'product_save_name';

		} // end if $aps_the_schema_type = product






		if($aps_the_schema_type == 'recipe' ) {

					//make sure there is a save name, if not create one from recipe name and rand, if no recipe name create one from word recipe_ and random.
					$aps_savename_name = $finalarray['aps_recipe_save_name'];
					$aps_savenname_recipename = $finalarray['aps_recipe_name'];
					if( $aps_savename_name == '' && $aps_savenname_recipename !== '' ) { $aps_savename_check = $aps_savenname_recipename . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_recipename == '' ) { $aps_savename_check = 'recipe_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}

$aps_serialized_ingredients = serialize($aps_ingredient_array);

					$aps_convert_recipe_pubdate = $finalarray['aps_recipe_pub_date'];
					$aps_convert_recipe_pubdate = aps_convert_date($aps_convert_recipe_pubdate);

					$aps_slashes_save_name_check = addslashes($aps_savename_check);
					//$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE recipe_save_name = '$aps_slashes_save_name_check'");
					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE recipe_save_name = %s",
																		   $aps_savename_check
																		   ));

					if(!isset($finalarray['aps_product_startype'])) { $finalarray['aps_recipe_startype'] = ''; }

					$aps_schema_data = array (
							'recipe_name' => $finalarray['aps_recipe_name'],
							'recipe_image_url'	=>	$finalarray['aps_recipe_image_url'],
							'recipe_desc'	=>	$finalarray['aps_recipe_description'],
							'recipe_author'	=>	$finalarray['aps_recipe_author'],
							'recipe_pub_date'	=>	$aps_convert_recipe_pubdate,
							'recipe_prep_hours' => $finalarray['aps_recipe_prep_hours'],
							'recipe_prep_mins' => $finalarray['aps_recipe_prep_minutes'],
							'recipe_cook_hours' => $finalarray['aps_recipe_cook_hours'],
							'recipe_cook_mins' => $finalarray['aps_recipe_cook_minutes'],
							'recipe_yield' => $finalarray['aps_recipe_yield'],
							'recipe_calories' => $finalarray['aps_recipe_calories'],
							'recipe_fat' => $finalarray['aps_recipe_fat'],
							'recipe_sugar' => $finalarray['aps_recipe_sugar'],
							'recipe_salt' => $finalarray['aps_recipe_salt'],
							'recipe_ingredients' => $aps_serialized_ingredients,

							'recipe_instructions' => $finalarray['aps_recipe_instructions'],
							'recipe_rating' => $finalarray['aps_recipe_rating'],
							'recipe_rating_min' => $finalarray['aps_recipe_rating_min'],
							'recipe_rating_max' => $finalarray['aps_recipe_rating_max'],
							'recipe_startype' => $finalarray['aps_recipe_startype'],

							'recipe_review_by' => $finalarray['aps_recipe_review_by'],
							'recipe_save_name' => $aps_savename_check,
							);

					$aps_schema_savename_column = 'recipe_save_name';

		} // end if $aps_the_schema_type = recipe



		if($aps_the_schema_type == 'review' ) {

					//make sure there is a save name, if not create one from review name and rand, if no review name create one from word review_ and random.
					$aps_savename_name = $finalarray['aps_review_save_name'];
					$aps_savenname_reviewname = $finalarray['aps_review_name'];
					if( $aps_savename_name == '' && $aps_savenname_reviewname !== '' ) { $aps_savename_check = $aps_savenname_reviewname . '_' . rand(); }
					elseif( $aps_savename_name == '' && $aps_savenname_reviewname == '' ) { $aps_savename_check = 'review_' . rand(); }
					else { $aps_savename_check = $aps_savename_name;}


					$aps_convert_review_pub_date = $finalarray['aps_review_pub_date'];
					$aps_convert_review_pub_date = aps_convert_date($aps_convert_review_pub_date);


					$aps_slashes_save_name_check = addslashes($aps_savename_check);
					//$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE review_save_name = '$aps_slashes_save_name_check'");
					$aps_does_schema_exist = $wpdb->get_row($wpdb->prepare(
																		   "SELECT * FROM $tblname WHERE review_save_name = %s",
																		   $aps_savename_check
																		   ));


					if(!isset($finalarray['aps_product_startype'])) { $finalarray['aps_review_startype'] = ''; }

					$aps_schema_data = array (
							'review_name' => $finalarray['aps_review_name'],
							//'review_affiliate_url'	=>	$finalarray['aps_review_affiliate_url'],
							'review_image_url' => $finalarray['aps_review_image_url'],
							'review_url' => $finalarray['aps_review_website'],
							'review_desc' => $finalarray['aps_review_description'],
							'review_item_name' => $finalarray['aps_review_item_name'],
							'review_item_review' => $finalarray['aps_review_item_review'],
							'review_rating' => $finalarray['aps_review_rating'],
							'review_rating_min' => $finalarray['aps_review_rating_min'],
							'review_rating_max' => $finalarray['aps_review_rating_max'],
							'review_author' => $finalarray['aps_review_author'],
							'review_startype' => $finalarray['aps_review_startype'],
							'review_pub_date'	=>	$aps_convert_review_pub_date,
							//'review_review_by' => $finalarray['aps_review_review_by'],
							'review_save_name' => $aps_savename_check,
							);

					$aps_schema_savename_column = 'review_save_name';


		} // end if $aps_the_schema_type = review


			//if the savename exists - update the row
					if($aps_does_schema_exist !== NULL ) {
						$wpdb->update(
									$tblname,
									$aps_schema_data,
									array(
										 $aps_schema_savename_column => $aps_savename_check
									  ));
					}
					//if it doesnt exist add a new row.
					elseif ($aps_does_schema_exist == NULL ) {
					$wpdb->insert( $tblname,
								   $aps_schema_data
								  );


					}



		// else {  }

		 die();

}




add_action("wp_ajax_aps_delete_schema", "aps_delete_schema");
add_action("wp_ajax_nopriv_aps_delete_schema", "aps_delete_schema");

function aps_delete_schema() {

if ( current_user_can('update_core') ) {
		global $wpdb;

				$aps_schema_name = $_POST['schema_name'];
				$aps_schema_table_name = $_POST['table_name'];

				$aps_the_table_name = "aps_" . $aps_schema_table_name;
				$tblname = $wpdb->prefix . "$aps_the_table_name";

				$save_name = $aps_schema_table_name . "_save_name";



		$wpdb->query(
			$wpdb->prepare(
				"
				 DELETE FROM $tblname
				 WHERE $save_name = %s
				",
					$aps_schema_name
				)
		);

		echo "The schema shortcode has been DELETED";

		die();

} else { echo "You do not have permission to do this"; die(); }

}



















































// http://bavotasan.com/2013/working-with-custom-admin-pointers-in-wordpress/

add_action( 'admin_enqueue_scripts', 'aps_admin_pointers_header' );

function aps_admin_pointers_header() {
   if ( aps_admin_pointers_check() ) {
      add_action( 'admin_print_footer_scripts', 'aps_admin_pointers_footer' );

      wp_enqueue_script( 'wp-pointer' );
      wp_enqueue_style( 'wp-pointer' );
   }
}

function aps_admin_pointers_check() {
   $admin_pointers = aps_admin_pointers();
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] )
         return true;
   }
}

function aps_admin_pointers_footer() {
   $admin_pointers = aps_admin_pointers();
   ?>
<script type="text/javascript">
/* <![CDATA[ */
( function($) {
   <?php
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] ) {
         ?>
         $( '<?php echo $array['anchor_id']; ?>' ).pointer( {
            content: '<?php echo $array['content']; ?>',
            position: {
            edge: '<?php echo $array['edge']; ?>',
            align: '<?php echo $array['align']; ?>'
         },
            close: function() {
               $.post( ajaxurl, {
                  pointer: '<?php echo $pointer; ?>',
                  action: 'dismiss-wp-pointer'
               } );
            }
         } ).pointer( 'open' );
         <?php
      }
   }
   ?>
} )(jQuery);
/* ]]> */
</script>
   <?php
}

function aps_admin_pointers() {
   $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
   $version = '1_0'; // replace all periods in 1.0 with an underscore //thisis separate to the plugin version
   $prefix = 'aps_admin_pointers' . $version . '_';

   $new_pointer_content = '<h3>' . __( 'Please Check the AP Schema Settings' ) . '</h3>';
   $new_pointer_content .= '<p>' . __( 'In order to get the most out of AP Schema you should check the settings.' ) . '</p>';

   return array(
      $prefix . 'check_settings' => array(
         'content' => $new_pointer_content,
         'anchor_id' => '#menu-settings',
         'edge' => 'left',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . 'check_settings', $dismissed ) )
      ),
   );
}
