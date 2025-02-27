<?php
/**
 * @version 1.0
 * @package Email Reminders
 * @subpackage Activation / Deactivation
 * @category Functions
 * @author      wpdevelop
 *
 * @web-site    http://oplugins.com/
 * @email       info@oplugins.com
 * @modified    2016-03-17
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Activation  & Deactivation  of Email Reminders  */
class OPER_ItemInstall extends OPER_Install {

    /** Overload Email Reminders option names and some other parameters */
    public function get_init_option_names() {

        add_oper_action( 'oper_activate_user', array( $this, 'oper_activate') );                                        // Hook  for MU User activation

        return  array(
                  'option-version_num'                  => 'oper_version_num'
                , 'option-is_delete_if_deactive'        => 'oper_is_delete_if_deactive'
                , 'option-activation_process'           => 'oper_activation_process'
                , 'transient-oper_activation_redirect'  => '_oper_activation_redirect'
                , 'message-delete_data'                 =>  '<strong>' . __('Warning!', 'email-reminders') . '</strong> '
                                                            . __('All plugin data will be deleted when the plugin is deactivated.', 'email-reminders')
                                                            . '<br />'
                                                            . sprintf( __('If you want to save your plugin data, please uncheck the %s"Delete data"%s at the' , 'email-reminders')
                                                                       , '<strong>', '</strong>')
                                                            . '<a href="' . esc_url( admin_url( add_query_arg( array( 'page' => 'oper-settings' ), 'admin.php' ) ) )
                                                                     . '#oper_general_settings_uninstall_metabox"> ' .  __('settings page', 'email-reminders') . '.'
                                                            . ' </a>'
                , 'link_settings'                       => '<a href="' . esc_url( admin_url( add_query_arg( array( 'page' => 'oper-settings' ), 'admin.php' ) ) )
                                                                       . '">'.__("Settings", 'email-reminders').'</a>'
                , 'link_whats_new'                      => ''
        );

    }

    /** Check if was updated from lower to  high version */
    public function is_update_from_lower_to_high_version() {

        $is_make_activation = false;

		//TODO: Set  here correct Table Name about checking upgrade
		//
        // Check  conditions for different version about Upgrade
        if ( ( class_exists( 'oper_personal' ) ) && ( ! oper_is_table_exists( 'itemtypes' ) ) )
            $is_make_activation = true;

        return $is_make_activation;
    }

}



////////////////////////////////////////////////////////////////////////////////
//   A c t i v a t e    &    D e a c t i v a t e
////////////////////////////////////////////////////////////////////////////////

/** Activation */
function oper_activate() {

	// Check for blank  data install
	$oper_secret_key = get_oper_option( 'oper_date_format' );
	if ( empty( $oper_secret_key ) )
		$is_first_time_install = true;
	else
		$is_first_time_install = false;


    make_oper_action( 'oper_before_activation' );

    // oper_load_translation();   -> this function  was removed in this version  of plugin,  because all  trnasaltion  loaded before init of activation  in core.php file

    $version = get_oper_version();
    $is_demo = oper_is_this_demo();

    ////////////////////////////////////////////////////////////////////////////
    // Options
    ////////////////////////////////////////////////////////////////////////////
    $default_options_to_add = oper_get_default_options();


    foreach ( $default_options_to_add as $default_option_name => $default_option_value ) {

        add_oper_option( $default_option_name, $default_option_value );
    }


    ////////////////////////////////////////////////////////////////////////////
    // DB Tables
    ////////////////////////////////////////////////////////////////////////////
	oper_activation_create_db();

	if ( true === $is_first_time_install ) {
		oper_add_example_data();
	}

    ////////////////////////////////////////////////////////////////////////////
    // Other versions Activation
    ////////////////////////////////////////////////////////////////////////////
    make_oper_action( 'oper_other_versions_activation' );

    make_oper_action( 'oper_after_activation' );
}
add_oper_action( 'oper_activation',  'oper_activate' );



// Deactivate
function oper_deactivate() {

    ////////////////////////////////////////////////////////////////////////////
    // Options
    ////////////////////////////////////////////////////////////////////////////

    $default_options_to_add = oper_get_default_options();
    foreach ( $default_options_to_add as $default_option_name => $default_option_value) {

        delete_oper_option( $default_option_name );
    }


    ////////////////////////////////////////////////////////////////////////////
    // Widgets
    ////////////////////////////////////////////////////////////////////////////
    delete_oper_option( 'oper_activation_redirect_for_version' );


    ////////////////////////////////////////////////////////////////////////////
    // DB Tables
    ////////////////////////////////////////////////////////////////////////////

	oper_activation_drop_db();

    global $wpdb;
    // $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}oper" );

    // Delete all users item windows states
    if ( false === $wpdb->query( "DELETE FROM {$wpdb->usermeta} WHERE meta_key LIKE '%oper_%'" ) ){    // All users data
        debuge_error('Error during deleting user meta at DB',__FILE__,__LINE__);
        die();
    }

    ////////////////////////////////////////////////////////////////////////////
    // Other versions Deactivation
    ////////////////////////////////////////////////////////////////////////////
    make_oper_action('oper_other_versions_deactivation');
}
add_oper_action( 'oper_deactivation',  'oper_deactivate' );


////////////////////////////////////////////////////////////////////////////////
//  D e f a u l t    O p t i o n s
////////////////////////////////////////////////////////////////////////////////


/**
 * Get Default Option(s)
 *
 * @param string $option_name  - name of option Optional
 *
 * @return array|bool|mixed    - specific default option if specified $option_name
 *                               or FALSE, if not found
 *                               or all  options,  if  $option_name was skipped.
 */
function oper_get_default_options( $option_name = '' ) {

    $is_demo = oper_is_this_demo();

	$default_options = array();

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// General Settings
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$default_options['oper_contacts_editing_via']       = 'contact-form';
	$default_options['oper_contacts_default_edit_form'] = '';                       //Addon


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Reminders section
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$default_options['oper_reminders_email_field_name'] = 'email';                                                     // Email  field name for Reminders

	$default_options['oper_contacts_labels'] = 'name';                                                                  // Labels


	// Miscellaneous
	$default_options['oper_date_format'] = get_option( 'date_format' );
	$default_options['oper_time_format'] = get_option( 'time_format' );
	// Advanced
//	$default_options['oper_is_not_load_bs_script_in_admin'] = 'Off';
	/**
	 * $default_options[ 'oper_is_not_load_bs_script_in_client' ] = 'Off';
	 * $default_options[ 'oper_is_load_js_css_on_specific_pages' ] = 'Off';
	 * $default_options[ 'oper_pages_for_load_js_css' ] = '';
	 */
	// User permissions
	$default_options['oper_user_role_reminders'] = ( $is_demo ) ? 'subscriber' : 'subscriber';
	$default_options['oper_user_role_contacts']  = ( $is_demo ) ? 'subscriber' : 'subscriber';
	$default_options['oper_user_role_rules']     = ( $is_demo ) ? 'subscriber' : 'subscriber';
	$default_options['oper_user_role_settings']  = ( $is_demo ) ? 'subscriber' : 'subscriber';
	// Position
	$default_options['oper_menu_position'] = ( $is_demo ) ? 'top' : 'top';
	// Uninstall
	$default_options['oper_is_delete_if_deactive'] = ( $is_demo ) ? 'On' : 'Off';

	//TODO: Fix these values
	$default_options['oper_protected_directory_name_level1'] = '';
	$default_options['oper_history_validated_csv']           = '';
	$default_options['oper_force_xls2csv_import']            = '';
	$default_options['oper_contact_form__custom_forms']      = array();
	$default_options['oper_contact_form'] =
'<div class="oper-contact-form contact-form_booking">  
	<div class="contact-form_field_group">  
		<div class="contact-form_field">  
			<label for="[name]">First Name:</label>  
			<input type="text" class="edit_contact_text_values" name="[name]" id="[name]" value=""/>  
		</div>  
		<div class="contact-form_field">  
			<label for="[secondname]">Last Name:</label>  
			<input type="text" class="edit_contact_text_values" name="[secondname]" id="[secondname]" value=""/>  
		</div>  
	</div> 
	<div class="contact-form_field_group">  
		<div class="contact-form_field">  
			<label for="[check_in]">Check in:</label>  
			<input type="text" class="edit_contact_text_values" name="[check_in]" id="[check_in]" value=""/>  
		</div>  
		<div class="contact-form_field">  
			<label for="[check_out]">Check out:</label>  
			<input type="text" class="edit_contact_text_values" name="[check_out]" id="[check_out]" value=""/>  
		</div>  
	</div>
	<hr style="margin: 0 0 1em;"/> 	
	<div class="contact-form_field_group">  
		<div class="contact-form_field">  
			<label for="[visitors]">Adults:</label>  
			<select class="edit_contact_text_values" name="[visitors]" id="[visitors]">  
				<option value="1">1</option>  
				<option value="2">2</option>  
				<option value="3">3</option>  
				<option value="4">4</option>  
			</select>  
		</div>  
		<div class="contact-form_field">  
			<label for="[children]">Children:</label>  
			<select class="edit_contact_text_values" name="[children]" id="[children]">  
				<option value="0">0</option>  
				<option value="1">1</option>  
				<option value="2">2</option>  
				<option value="3">3</option>  
			</select>  
		</div> 
	</div>
	<hr style="margin: 0 0 1em;"/> 
	<div class="contact-form_field_group">  
		<div class="contact-form_field">  
			<label for="[email]">Email:</label>  
			<input type="email" class="edit_contact_text_values" name="[email]" id="[email]" value=""/>  
		</div>  
		<div class="contact-form_field">  
			<label for="[phone]">Phone:</label>  
			<input type="text" class="edit_contact_text_values" name="[phone]" id="[phone]" value=""/>  
		</div>  
	</div>	
	<div class="contact-form_field_group"> 
		<div class="contact-form_field"> 
			<label for="[_country]">Country:</label> 
			<input type="text" class="edit_contact_text_values" name="[_country]" id="[_country]" value=""/> 
		</div> 
		<div class="contact-form_field"> 
			<label for="[_city]">City:</label> 
			<input type="text" class="edit_contact_text_values" name="[_city]" id="[_city]" value=""/> 
		</div> 
	</div> 	
	<div class="contact-form_field">  
		<label for="[details]">Details:</label>  
		<textarea class="edit_contact_text_values" name="[details]" id="[details]"></textarea>  
	</div>  
</div>';

if ( 0 ) {
	$default_options['oper_contact_form'] =
		'<div class="oper-contact-form contact-form_booking">  
	<div class="contact-form_field_group">  
		<div class="contact-form_field">  
			<label for="[name]">First Name (required):</label>  
			<input type="text" class="edit_contact_text_values" name="[name]" id="[name]" value=""/>  
		</div>  
		<div class="contact-form_field">  
			<label for="[secondname]">Last Name (required):</label>  
			<input type="text" class="edit_contact_text_values" name="[secondname]" id="[secondname]" value=""/>  
		</div>  
	</div>  
	<div class="contact-form_field">  
		<label for="[email]">Email (required):</label>  
		<input type="email" class="edit_contact_text_values" name="[email]" id="[email]" value=""/>  
	</div>  
	<div class="contact-form_field">  
		<label for="[phone]">Phone:</label>  
		<input type="text" class="edit_contact_text_values" name="[phone]" id="[phone]" value=""/>  
	</div>  
	<div class="contact-form_field">  
		<label for="[visitors]">Adults:</label>  
		<select class="edit_contact_text_values" name="[visitors]" id="[visitors]">  
			<option value="1">1</option>  
			<option value="2">2</option>  
			<option value="3">3</option>  
			<option value="4">4</option>  
		</select>  
	</div>  
	<div class="contact-form_field">  
		<label for="[children]">Children:</label>  
		<select class="edit_contact_text_values" name="[children]" id="[children]">  
			<option value="0">0</option>  
			<option value="1">1</option>  
			<option value="2">2</option>  
			<option value="3">3</option>  
		</select>  
	</div>  
	<div class="contact-form_field">  
		<label for="[details]">Details:</label>  
		<textarea class="edit_contact_text_values" name="[details]" id="[details]"></textarea>  
	</div>  
</div>';
}

	if ( ! empty( $option_name ) ) {

		if ( isset( $default_options[ $option_name ] ) )
			return $default_options[ $option_name ];                        // Return 1 option
		else
			return  false;                                                  // Option does NOT exist

	} else {
		return $default_options;                                            // Return  ALL
	}
}


/**
 * Get list  of DB  of this plugin
 * @return array
 */
function oper_get_db_names(){

	$db_names = array(
			'contacts'        => 'o_er_' . 'contacts'
		,	'contacts_meta'   => 'o_er_' . 'contacts_meta'
		,   'reminders'     => 'o_er_' . 'reminders'
		, 	'log'           => 'o_er_' . 'log'
		, 	'rules'         => 'o_er_' . 'rules'
	);
	return $db_names;
}


/**
 *  Drop plugin DB tables
 */
function oper_activation_drop_db(){

    global $wpdb;

	$db_names = oper_get_db_names();

	foreach ( $db_names as $db_name ) {
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}{$db_name}" );
	}
}


/**
 * Create plugin DB tables
 */
function oper_activation_create_db(){

	global $wpdb;
	$charset_collate = '';
	if ( ! empty( $wpdb->charset ) ) { $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset"; }
	if ( ! empty( $wpdb->collate ) ) { $charset_collate .= " COLLATE $wpdb->collate"; }

	$db_names = oper_get_db_names();

		// Orders
        if ( ! oper_is_table_exists( $db_names['contacts'] ) ) {

	        /**
	         * FixIn:
	         * repaced: here
	         *                  create_date 	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	         * to
	         *                  create_date 	TIMESTAMP NOT NULL DEFAULT 0,
	         * because of error:
	         *                  "... there can be only one TIMESTAMP column with CURRENT_TIMESTAMP in DEFAULT or ON UPDATE clause ..."
	         *
	         */
			// TODO:  Need to  add time of creation 'create_date' during adding new contact

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['contacts']} (
		                     contact_id 		BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 data      		TEXT,                                   " .  /* Data in format like: TYPE^NAME^VALUE~... "text^name^Jony~text^secondname^Goodman~email^email^user@beta.com~..." */ "
							 note      		TEXT NOT NULL DEFAULT '',               " .  /* Some notes, or comments .*/ "
							 source         VARCHAR(255),                           " .  /* Plugin Slug: 'plugin:booking' or other source like 'csv' */ "							 
							 create_date 	TIMESTAMP NOT NULL DEFAULT 0, 
							 edit_date 		TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
		                     PRIMARY KEY  ( contact_id ) 		                     
	                    ) {$charset_collate};";

            $wpdb->query( $simple_sql );
        }

        // Orders Meta
        if ( ! oper_is_table_exists( $db_names['contacts_meta'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['contacts_meta']} (
							 contacts_meta_id    	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 contacts_meta_key   	VARCHAR(255) , 
							 contacts_meta_value 	LONGTEXT , 
							 contacts_meta_date  	DATETIME , 
							 contact_id          	BIGINT, 
		                     PRIMARY KEY  ( contacts_meta_id )  		                     
	                    ) {$charset_collate};";

            $wpdb->query( $simple_sql );
        }

        // Reminders
        if ( ! oper_is_table_exists( $db_names['reminders'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['reminders']} (
							 reminder_id 	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 status         VARCHAR(255), 
							 run_date       DATETIME, 
							 advanced  		TEXT,            " .  /* Serialized different data,  like CRON rules .*/ "							 
							 action         VARCHAR(255), 
							 email_template VARCHAR(255), 
							 contact_id       BIGINT, 
							 rules_id       BIGINT,
							 re_create_date 	TIMESTAMP NOT NULL DEFAULT 0, 
							 re_edit_date 		TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 							 
		                     PRIMARY KEY  ( reminder_id ) 		                      		                     
	                    ) {$charset_collate};";

            $wpdb->query( $simple_sql );
        }
		// Alter Table - Add new field
		if ( oper_is_field_in_table_exists( $db_names['reminders'], 'rules_id' ) == 0 ) {
			$simple_sql = "ALTER TABLE {$wpdb->prefix}{$db_names['reminders']} ADD rules_id BIGINT AFTER contact_id";
			$wpdb->query( $simple_sql );
		}
		if ( oper_is_field_in_table_exists( $db_names['reminders'], 're_create_date' ) == 0 ) {
			$simple_sql = "ALTER TABLE {$wpdb->prefix}{$db_names['reminders']} ADD re_create_date TIMESTAMP NOT NULL DEFAULT 0 AFTER rules_id";
			$wpdb->query( $simple_sql );
		}
		if ( oper_is_field_in_table_exists( $db_names['reminders'], 're_edit_date' ) == 0 ) {
			$simple_sql = "ALTER TABLE {$wpdb->prefix}{$db_names['reminders']} ADD re_edit_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER re_create_date";
			$wpdb->query( $simple_sql );
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Serialized different data,  like CRON rules settings - number of contacts to  process during one loop,  and time when  to  start reset "last_check_contact_id" to 0,  etc...
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ( oper_is_field_in_table_exists( $db_names['reminders'], 'advanced' ) == 0 ) {
			$simple_sql = "ALTER TABLE {$wpdb->prefix}{$db_names['reminders']} ADD advanced TEXT AFTER run_date";
			$wpdb->query( $simple_sql );
		}


        // Log
        if ( ! oper_is_table_exists( $db_names['log'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['log']} (
							 log_id 	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 type         VARCHAR(255), 		" .  /* Type of action: "sent_email" */ "
							 reference      BIGINT,  		    " .  /* ID of Reminders */ "
							 message      	TEXT,               " .  /* Log message .*/ "
							 log      		TEXT,               " .  /* Details .*/ "
							 date 	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
		                     PRIMARY KEY  ( log_id ) 		                      		                     
	                    ) {$charset_collate};";

            $wpdb->query( $simple_sql );
        }


        // Reminders
        if ( ! oper_is_table_exists( $db_names['rules'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['rules']} (
							 rules_id 		BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT, 
							 last_check_contact_id	BIGINT,			 " .  /* ID of last checking contact, in case if script was terminated .*/ "	
							 status         		VARCHAR(255),	 " .  /* Run | Dry Run | Finished |  Not Started | Paused .*/ "
							 last_run_date          DATETIME,        " .  /* Time of last start .*/ "
							 expire_after           INT DEFAULT 0,   " .  /* Number of Seconds to Expire -- Reset "last_check_contact_id" to 0   for starting  checking from  beginning .*/ "
							 rule      		        TEXT,            " .  /* Rules .*/ "
							 advanced  		        TEXT,            " .  /* Serialized different data,  like CRON rules .*/ "
							 ru_create_date 	TIMESTAMP NOT NULL DEFAULT 0, 
							 ru_edit_date 		TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
		                     PRIMARY KEY  ( rules_id ) 
	                    ) {$charset_collate};";
            $wpdb->query( $simple_sql );
        }

		// Alter Table - Add new field
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Number of Seconds to Expire -- Reset "last_check_contact_id" to 0   for starting  checking from  beginning
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ( oper_is_field_in_table_exists( $db_names['rules'], 'expire_after' ) == 0 ) {
			$simple_sql = "ALTER TABLE {$wpdb->prefix}{$db_names['rules']} ADD expire_after INT DEFAULT 0 AFTER last_run_date";
			$wpdb->query( $simple_sql );
		}
		// Alter Table - Add new field
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Serialized different data,  like CRON rules settings - number of contacts to  process during one loop,  and time when  to  start reset "last_check_contact_id" to 0,  etc...
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ( oper_is_field_in_table_exists( $db_names['rules'], 'advanced' ) == 0 ) {
			$simple_sql = "ALTER TABLE {$wpdb->prefix}{$db_names['rules']} ADD advanced TEXT AFTER rule";
			$wpdb->query( $simple_sql );
		}

/**
 * Here is Tables from  OLD deleted "Clients Manager": plugin
 *
 		$db_names = array(
							'customers'      => 'o_cm_' . 'customers'
						,   'customers_meta' => 'o_cm_' . 'customers_meta'
						, 	'products'       => 'o_cm_' . 'products'
						,	'products_meta'  => 'o_cm_' . 'products_meta'
						,	'contacts'         => 'o_cm_' . 'contacts'
						,	'contacts_meta'    => 'o_cm_' . 'contacts_meta'
						,	'checkpoint'     => 'o_cm_' . 'checkpoint'
					);
/  **
*

 -- ****************** SqlDBM: MySQL ******************;

-- ************************************** `labels`

CREATE TABLE `labels`
(
 `labels_id` BIGINT NOT NULL ,
 `name`      VARCHAR(255) NOT NULL ,
 `title`     TEXT NOT NULL ,
 `color`     VARCHAR(7) NOT NULL ,

PRIMARY KEY (`labels_id`)
);


-- ************************************** `products`

CREATE TABLE `products`
(
 `product_id`    BIGINT NOT NULL ,
 `title`         VARCHAR(255) NOT NULL ,
 `description`   LONGTEXT NOT NULL ,
 `cost`          FLOAT NOT NULL ,
 `version_num`   VARCHAR(255) NOT NULL ,
 `download_link` TEXT NOT NULL ,

PRIMARY KEY (`product_id`)
);






-- ************************************** `customers`

CREATE TABLE `customers`
(
 `customer_id` BIGINT NOT NULL ,
 `name`        VARCHAR(255) NOT NULL ,
 `second_name` VARCHAR(255) NOT NULL ,
 `prefix`      VARCHAR(25) NOT NULL ,
 `email`       VARCHAR(255) NOT NULL ,
 `phone`       VARCHAR(50) NOT NULL ,
 `country`     VARCHAR(255) NOT NULL ,
 `city`        VARCHAR(255) NOT NULL ,
 `adress`      TEXT NOT NULL ,

PRIMARY KEY (`customer_id`)
);






-- ************************************** `products_meta`

CREATE TABLE `products_meta`
(
 `products_meta_id`    BIGINT NOT NULL ,
 `products_meta_key`   VARCHAR(255) NOT NULL ,
 `products_meta_value` LONGTEXT NOT NULL ,
 `products_meta_date`  DATETIME NOT NULL ,
 `product_id`          BIGINT NOT NULL ,

PRIMARY KEY (`products_meta_id`),
KEY `fkIdx_155` (`product_id`),
CONSTRAINT `products_to_meta` FOREIGN KEY `fkIdx_155` (`product_id`) REFERENCES `products` (`product_id`)
);






-- ************************************** `customers_meta`

CREATE TABLE `customers_meta`
(
 `customers_meta_id`    BIGINT NOT NULL ,
 `customers_meta_key`   VARCHAR(255) NOT NULL ,
 `customers_meta_value` LONGTEXT NOT NULL ,
 `customers_meta_date`  DATETIME NOT NULL ,
 `customer_id`          BIGINT NOT NULL ,

PRIMARY KEY (`customers_meta_id`),
KEY `fkIdx_151` (`customer_id`),
CONSTRAINT `customers_to_meta` FOREIGN KEY `fkIdx_151` (`customer_id`) REFERENCES `customers` (`customer_id`)
);






-- ************************************** `contacts`

CREATE TABLE `contacts`
(
 `contact_id`       BIGINT NOT NULL ,
 `order_key`      VARCHAR(255) NOT NULL ,
 `payment_type`   VARCHAR(255) NOT NULL ,
 `payment_status` VARCHAR(255) NOT NULL ,
 `date`           DATETIME NOT NULL ,
 `check_date`     DATETIME NOT NULL ,
 `ip`             VARCHAR(255) NOT NULL ,
 `order_parent`   BIGINT NOT NULL ,
 `source`         VARCHAR(255) NOT NULL ,
 `product_id`     BIGINT NOT NULL ,
 `customer_id`    BIGINT NOT NULL ,
 `coupon`         VARCHAR(255) NOT NULL ,
 `tax`            FLOAT NOT NULL ,
 `licence_key`    VARCHAR(255) NOT NULL ,
 `licence_to`     VARCHAR(255) NOT NULL ,
 `order_type`     VARCHAR(255) ,
 `connected_id`   BIGINT NOT NULL ,

PRIMARY KEY (`contact_id`),
KEY `fkIdx_159` (`product_id`),
CONSTRAINT `products_to_contacts` FOREIGN KEY `fkIdx_159` (`product_id`) REFERENCES `products` (`product_id`),
KEY `fkIdx_163` (`customer_id`),
CONSTRAINT `customers_to_contacts` FOREIGN KEY `fkIdx_163` (`customer_id`) REFERENCES `customers` (`customer_id`)
);






-- ************************************** `checkpoint`

CREATE TABLE `checkpoint`
(
 `checkpoint_id` BIGINT NOT NULL ,
 `name`          VARCHAR(45) NOT NULL ,
 `date`          DATETIME NOT NULL ,
 `action`        VARCHAR(255) NOT NULL ,
 `contact_id`      BIGINT NOT NULL ,

PRIMARY KEY (`checkpoint_id`),
KEY `fkIdx_200` (`contact_id`),
CONSTRAINT `FK_200` FOREIGN KEY `fkIdx_200` (`contact_id`) REFERENCES `contacts` (`contact_id`)
);






-- ************************************** `contacts_meta`

CREATE TABLE `contacts_meta`
(
 `contacts_meta_id`    BIGINT NOT NULL ,
 `contacts_meta_key`   VARCHAR(255) NOT NULL ,
 `contacts_meta_value` LONGTEXT NOT NULL ,
 `contacts_meta_date`  DATETIME NOT NULL ,
 `contact_id`          BIGINT NOT NULL ,

PRIMARY KEY (`contacts_meta_id`),
KEY `fkIdx_143` (`contact_id`),
CONSTRAINT `contacts_to_meta` FOREIGN KEY `fkIdx_143` (`contact_id`) REFERENCES `contacts` (`contact_id`)
);


 **   /

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ( ! opcm_is_table_exists( $db_names['products'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['products']} (
		                     product_id 	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		                     title 			VARCHAR(255),
		                     description 	LONGTEXT,
		                     cost			FLOAT,
		                     version_num	VARCHAR(255),
		                     download_link 	TEXT,
		                     PRIMARY KEY  ( product_id )
	                    ) {$charset_collate};";

            $wpdb->query( $simple_sql );
        }
//      elseif  ( wpbc_is_field_in_table_exists('booking','form') == 0 ) {
//            $wp_queries[]  = "ALTER TABLE {$wpdb->prefix}booking ADD form TEXT AFTER booking_id";
//      }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ( ! opcm_is_table_exists( $db_names['products_meta'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['products_meta']} (
							 products_meta_id    	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 products_meta_key   	VARCHAR(255),
							 roducts_meta_value 	LONGTEXT,
							 products_meta_date  	DATETIME,
							 product_id          	BIGINT,
		                     PRIMARY KEY  ( products_meta_id )
	                    ) {$charset_collate};";
//							 KEY fk_inx_product_meta (product_id),
//							 CONSTRAINT products_to_meta FOREIGN KEY fk_inx_product_meta (product_id) REFERENCES {$wpdb->prefix}{$db_names['products']} (product_id)
//debuge($simple_sql);die;
            $wpdb->query( $simple_sql );
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ( ! opcm_is_table_exists( $db_names['customers'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['customers']} (
		                     customer_id 	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 name        VARCHAR(255),
							 second_name VARCHAR(255),
							 prefix      VARCHAR(25),
							 email       VARCHAR(255),
							 phone       VARCHAR(50),
							 country     VARCHAR(255),
							 city        VARCHAR(255),
							 adress      TEXT,
		                     PRIMARY KEY  ( customer_id )
	                    ) {$charset_collate};";

            $wpdb->query( $simple_sql );
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ( ! opcm_is_table_exists( $db_names['customers_meta'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['customers_meta']} (
							 customers_meta_id    	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 customers_meta_key   VARCHAR(255),
							 customers_meta_value LONGTEXT,
							 customers_meta_date  DATETIME,
							 customer_id          BIGINT,
		                     PRIMARY KEY  ( customers_meta_id )
	                    ) {$charset_collate};";
//							 KEY fk_inx_customer_meta (customer_id),
//							 CONSTRAINT customers_to_meta FOREIGN KEY fk_inx_customer_meta (customer_id) REFERENCES {$wpdb->prefix}{$db_names['customers']} (customer_id)

            $wpdb->query( $simple_sql );
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ( ! opcm_is_table_exists( $db_names['contacts'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['contacts']} (
		                     contact_id 	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 date           DATETIME ,
							 check_date     DATETIME ,
							 order_type     VARCHAR(255) ,
							 order_key      VARCHAR(255) ,
							 order_labels   VARCHAR(255) ,
							 payment_status VARCHAR(255) ,
							 payment_type   VARCHAR(255) ,
							 total          FLOAT ,
							 tax            FLOAT ,
							 balance        FLOAT ,
							 coupon         VARCHAR(255) ,
							 licence_key    VARCHAR(255) ,
							 licence_to     VARCHAR(255) ,
							 ip             VARCHAR(255) ,
							 source         VARCHAR(255) ,
							 order_parent   BIGINT ,
							 connected_id   BIGINT ,
							 details      	TEXT,
							 note      		TEXT,
							 create_date 	TIMESTAMP NOT NULL DEFAULT 0,
							 edit_date 		TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
							 product_id     BIGINT ,
							 customer_id    BIGINT ,

							 c_name        	VARCHAR(255),
							 c_second_name  VARCHAR(255),
							 c_prefix      	VARCHAR(25),
							 c_email       	VARCHAR(255),
							 c_phone       	VARCHAR(50),
							 c_country     	VARCHAR(255),
							 c_city        	VARCHAR(255),
							 c_adress      	TEXT,

		                     p_title 		VARCHAR(255),
		                     p_description 	LONGTEXT,
		                     p_cost			FLOAT,
		                     p_version_num	VARCHAR(255),
		                     p_download_link 	TEXT,

		                     PRIMARY KEY  ( contact_id )
	                    ) {$charset_collate};";

//							KEY fk_inx_product_order (product_id),
//							CONSTRAINT products_to_contacts FOREIGN KEY fk_inx_product_order (product_id) REFERENCES {$wpdb->prefix}{$db_names['products']} (product_id),
//							KEY fk_inx_customer_order (customer_id),
//							CONSTRAINT customers_to_contacts FOREIGN KEY fk_inx_customer_order (customer_id) REFERENCES {$wpdb->prefix}{$db_names['customers']} (customer_id)

            $wpdb->query( $simple_sql );
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ( ! opcm_is_table_exists( $db_names['contacts_meta'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['contacts_meta']} (
							 contacts_meta_id    	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 contacts_meta_key   VARCHAR(255) ,
							 contacts_meta_value LONGTEXT ,
							 contacts_meta_date  DATETIME ,
							 contact_id          BIGINT ,
		                     PRIMARY KEY  ( contacts_meta_id )
	                    ) {$charset_collate};";
//							 KEY fk_inx_contacts_meta (contact_id),
// 							 CONSTRAINT contacts_to_meta FOREIGN KEY fk_inx_contacts_meta (contact_id) REFERENCES {$wpdb->prefix}{$db_names['contacts']}  (contact_id)

            $wpdb->query( $simple_sql );
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ( ! opcm_is_table_exists( $db_names['checkpoint'] ) ) {

            $simple_sql = "CREATE TABLE {$wpdb->prefix}{$db_names['checkpoint']} (
							 checkpoint_id    	BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
							 name          VARCHAR(45) ,
							 date          DATETIME ,
							 action        VARCHAR(255) ,
							 contact_id      BIGINT ,
		                     PRIMARY KEY  ( checkpoint_id )
	                    ) {$charset_collate};";
//							 KEY fk_inx_contacts_checkpoint (contact_id),
// 							 CONSTRAINT contacts_to_checkpoint FOREIGN KEY fk_inx_contacts_checkpoint (contact_id) REFERENCES {$wpdb->prefix}{$db_names['contacts']}  (contact_id)

            $wpdb->query( $simple_sql );
        }

 */

}


function oper_add_example_data(){

	// 01. Contacts ====================================================================================================
	$contact_data_arr = array();
	$contact_data_arr['name']       = 'John';
	$contact_data_arr['secondname'] = 'Smith';
	$contact_data_arr['check_in']   = date_i18n( 'Y-m-d 15:00', strtotime( 'TODAY + 7 DAYS' ) );
	$contact_data_arr['check_out']  = date_i18n( 'Y-m-d 09:00', strtotime( 'TODAY + 14 DAYS' ) );
	$contact_data_arr['visitors']   = '2';
	$contact_data_arr['children']   = '0';
	$contact_data_arr['email']      = 'smith.reminder@wpbookingcalendar.com';
	$contact_data_arr['phone']      = '(000) 100-20-30';
	$contact_data_arr['_country']   = 'UK';
	$contact_data_arr['_city']      = 'London';
	$contact_data_arr['details']    = 'Example. Contact for testing.';

	$sql_values_num = oper_add_new_contact( $contact_data_arr );


	// 02. Rules =======================================================================================================

    $escaped_params= array();
    $escaped_params['email_template'] = '';
	$escaped_params['conditions']   = array();
	$escaped_params['conditions'][] = array(
											'if'    => '__default__|_country',
											'sign'  => 'contain',
											'value' => 'UK|France'
										);
	$escaped_params['conditions'][] = array(
											'if'    => '__default__|check_in',
											'sign'  => '>',
											'value' => 'TODAY + 7 DAYS'
										);
	$escaped_params['conditions'][] = array(
											'if'    => '__default__|check_in',
											'sign'  => '<=',
											'value' => 'TODAY + 8 DAYS - 1 SECOND'
										);
    $escaped_rules_other = array();
	$escaped_rules_other['rules_id']              = 1;
	$escaped_rules_other['expire_after']          = 0;
	$escaped_rules_other['last_run_date']         = '';
	$escaped_rules_other['last_check_contact_id'] = 0;
	$escaped_rules_other['advanced']              = array();

	// SQL Adding
	global $wpdb;
	$sql_fields = 'rule, ru_create_date, expire_after, last_run_date, last_check_contact_id, advanced';
	$sql_values = array();
	$sql_args   = array();
	for( $i = 0; $i < 1; $i++) {        // Template for adding several rows to  the Database

		$sql_values[] = '( %s, %s, %d, %s, %d, %s )';
		$sql_args[]   = maybe_serialize( $escaped_params );
		$sql_args[]   = date_i18n( 'Y-m-d H:i:s' );

		$sql_args[] = $escaped_rules_other['expire_after'];
		$sql_args[] = $escaped_rules_other['last_run_date'];
		$sql_args[] = $escaped_rules_other['last_check_contact_id'];
		$sql_args[] = maybe_serialize( $escaped_rules_other['advanced'] );		// Advanced
	}
	$sql_values     = implode( ', ', $sql_values );
	////////////////////////////////////////////////////////////////////////////
	// Add to DB
	////////////////////////////////////////////////////////////////////////////
	$sql = "INSERT INTO {$wpdb->prefix}o_er_rules ( {$sql_fields} )VALUES {$sql_values} " ;

	$sql_prepared = $wpdb->prepare($sql, $sql_args );

	if ( false === $wpdb->query( $sql_prepared ) ){
		$rules_id = 0;                                                                                                  // debuge_error( 'Error. DB inserting ' . $sql ,__FILE__,__LINE__);
	} else {
		do_action( 'opera_remove_cron_rule' ,   (int) $wpdb->insert_id );										        // Addon  functionality
		$rules_id = (int) $wpdb->insert_id;                                                                             // Get ID of last insert
	}


	// 03. Reminders ===================================================================================================
	//$rules_id = 1;
	$data_arr = oper_rule_get_data_arr( $rules_id );
	/**
	 * 	$data_arr =Array (
				            [0] => Array (
						                    [rules_id] => 49
						                    [last_check_contact_id] => 3001
						                    [status] =>
						                    [last_run_date] => 2020-04-14 15:30:41
						                    [expire_after] => 0
											[rule] => Array (
									                            [email_template] => updates_expired_6_months
									                            [conditions] => Array (
									                                    [0] => Array (
									                                            [if] => __default__|_date
									                                            [sign] => =
									                                            [value] => TODAY - 6 MONTHS - 1 DAY
									                                        )
									                                )
									                        )
										    [advanced] =>Array(
							                                    [rule_run] => Array(
												                                    [enable] => On
												                                    [next_time] => 2020-04-12 12:37
												                                    [recurrence] => 5
												                                    [max_contacts] => 3000
												                                    [time_from] => 13:00
												                                    [time_to] => 15:00
												                                    [send_week0] => On
												                                    [send_week1] => Off
												                                    [send_week2] => Off
												                                    [send_week3] => Off
												                                    [send_week4] => Off
												                                    [send_week5] => Off
												                                    [send_week6] => On
												                                )
																[rule_reset] => Array (
												                                    [enable] => On
												                                    [next_time] => 2020-04-06 09:53
												                                    [recurrence] => 300
												                                    [contact_id] => 1
											                                )
						                                    )
						                    [ru_create_date] => 2020-03-19 09:56:28
						                    [ru_edit_date] => 2020-04-14 15:30:41
						                )
	*/

	$args = array(
			'is_silent' => true,	            // Is show any text  in page,  after  shortcode execution
			'id'        => $rules_id,		    // int      <=  ID of Rule to  execute
			'max_count' => 1000		            // Max number of contacts to process during shortcode execution, that fit to condition of rule,  starting from last run of shortcode
	);

	if (
			( ! empty( $data_arr ) )
	     && ( ! empty( $data_arr[0]['advanced'] ) )
	     && ( ! empty( $data_arr[0]['advanced']['rule_run'] ) )
	){

		if ( ! empty( $data_arr[0]['advanced']['rule_run']['max_contacts'] ) ) {
			$args['max_count'] = intval( $data_arr[0]['advanced']['rule_run']['max_contacts'] );
		}
	}
	oper_shortcode_rules__cron( $args );

}