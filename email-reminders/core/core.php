<?php
/**
 * @package  Init Plugin
 * @category Core
 *
 * Author: wpdevelop, oplugins
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @version 1.0
 * @modified 2019-03-08
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


if ( ! class_exists( 'OPER' ) ) :

	// General Init Class
	final class OPER {

	    static private $instance = NULL;

	    public $admin_menu;					// Define Menu items
	    public $js;							// JS  to load
	    public $css;						// CSS to load


		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// SINGLETON
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/**
		 * Main Instance.
		 * Ensures only one instance is loaded or can be loaded.
		 *
		 * @see oper()
		 * @return OPER
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Cloning is forbidden.
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Action is not allowed!' ), '1.0' );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Action is not allowed!' ), '1.0' );
		}


		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Start
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->constants();

			$this->includes();

			$this->init_hooks();

			do_action( 'oper_loaded' );
		}

		/**
		 * Define constants
		 */
	    private function constants() {
	        require_once OPER_PLUGIN_DIR . '/includes/constants.php' ;
	    }

		/**
		 * Include Files
		 */
	    private function includes() {
	        require_once OPER_PLUGIN_DIR . '/includes/include.php' ;
	    }


		/**
		 * Hook into actions and filters.
		 *
		 */
		private function init_hooks() {

			//TODO: Finish this hooks:
			//register_activation_hook( OPER_FILE, array( 'WC_Install', 'install' ) );
			//register_shutdown_function( array( $this, 'log_errors' ) );

			// Set up localisation after 	-	'plugins_loaded' hook
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) , 1000 );
			
			// Install / Upgrade 	-	on 'plugins_loaded' hook,  with  priority 1030 - after loaded locale
	        if ( class_exists( 'OPER_ItemInstall' ) ) {                            // Check if we need to run Install / Uninstall process.
	            new OPER_ItemInstall();
	        }

			// This 'init' hook run  after 'plugins_loaded' hook !
			add_action( 'init', array( $this, 'init' ), 0 );
			//add_action( 'init', array( 'WC_Shortcodes', 'init' ) );
		}


		/**
		 * Init OPER when WordPress Initialises.
		 */
		public function init() {
			// Before init action.
			do_action( 'before_oper_init' );


	        $is_continue = self::$instance->start();                                // Make Ajax, Response or Define item ClASS

//TODO: continue here

	        if ( $is_continue ) {                                                   // Possible Load Admin or Front-End page

				self::$instance->js     = new OPER_JS;
				self::$instance->css    = new OPER_CSS;

	            if( is_admin() ) {

	                add_action( '_admin_menu',   array( self::$instance, 'define_admin_menu') );    // Define Menu  -  _admin_menu - Fires before the administration menu loads in the admin.
	                add_action( 'admin_footer', 'oper_print_js', 50 );								// Load my Queued JavaScript Code at  the footer of the Admin Panel page. Executed in ALL Admin Menu Pages
	            } else {

	                add_action( 'wp_enqueue_scripts', array(self::$instance->css, 'load'), 1000000001 );   // Load CSS at front-end side  // Enqueue Scripts to All Client pages
	                add_action( 'wp_enqueue_scripts', array(self::$instance->js,  'load'), 1000000001 );   // Load JavaScript files and define JS varibales at forn-end side
	                add_action( 'wp_footer', 'oper_print_js', 50 );                 // Load my Queued JavaScript Code at  the footer  of the page, if executed "wp_footer" hook at the Theme.
	            }
	        }

			// Init action.
			do_action( 'oper_init' );
		}


		/**
		 * Load Localisation files.
		 *
		 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
		 *
		 * Locales found in:
		 *      - WP_LANG_DIR/oper/oper-LOCALE.mo
		 *      - WP_LANG_DIR/plugins/oper-LOCALE.mo
		 */
		public function load_plugin_textdomain() {

			$locale = determine_locale();    //FixIn: 2.0.1.1
			$locale = apply_filters( 'plugin_locale', $locale, 'email-reminders' );

			unload_textdomain( 'email-reminders' );

			//FixIn: 2.0.1.1
			if ( file_exists( WP_LANG_DIR . '/oper/oper-' . $locale . '.mo' ) ) {
				load_textdomain( 'email-reminders', WP_LANG_DIR . '/oper/oper-' . $locale . '.mo' );
			}

			//FixIn: 2.0.1.1
			if ( file_exists(
				WP_PLUGIN_DIR . '/' . trim( plugin_basename( dirname( OPER_FILE ) ) . '/languages', '/' ) . '/'			. 'email-reminders' . '-' . $locale . '.mo'
			) ) {
				load_plugin_textdomain( 'email-reminders', false, plugin_basename( dirname( OPER_FILE ) ) . '/languages' );
			}
		}


	    // Initialization
	    private function start(){

	        if (  ( defined( 'DOING_AJAX' ) )  && ( DOING_AJAX )  ){                        // New 		A J A X		R e s p o n d e r

	            require_once OPER_PLUGIN_DIR . '/includes/ajax.php';

	            return false;			// Ajax

	        } elseif ( OPER_RESPONSE ) {

				return false;			// We are having Response, its executed in other file: oper-response.php

	        } else {
	        	return true;			// Usual Loading of plugin
			}

	    }




		/** Define Admin Menu items */
		public function define_admin_menu(){

//			$update_count = oper_get_number_new_items();

			$title = 'Email Reminders';				//'&#223;<span style="font-size:0.75em;">&#920;&#920;</span>&kgreen;&imath;&eng;';

//			if ( $update_count > 0 ){
//				$update_count_title = "<span class='update-plugins count-$update_count' title=''><span class='update-count bk-update-count'>" . number_format_i18n($update_count) . "</span></span>" ;
//				$title .= $update_count_title;
//			}


			//global $menu;
			//if ( current_user_can(  ) ) {
			//$menu[] = array( '', 'read', 'separator-oper', '', 'wp-menu-separator oper' );
			//}
			// debuge($menu);

			$oper_menu_position = get_oper_option( 'oper_menu_position' );
			switch ( $oper_menu_position ) {
				case 'top':
					$oper_menu_position = "3.15";
					break;
				case 'middle':
					global $_wp_last_object_menu;                                       // The index of the last top-level menu in the object menu group
					$_wp_last_object_menu++;
					$oper_menu_position = $_wp_last_object_menu; // 58.9;
					break;
				case 'bottom':
					$oper_menu_position = "99.919";
					break;
				default:
					$oper_menu_position = "3.15";
					break;
			}

			// calendar3-range		https://icons.getbootstrap.com/icons/calendar3-range/
//			$svg_icon_integarted = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3-range" viewBox="-2 -1 20 20">'
//									  . '<path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>'
//									  . '<path d="M7 10a1 1 0 0 0 0-2H1v2h6zm2-3h6V5H9a1 1 0 0 0 0 2z"/>'
//									. '</svg>';

			$svg_icon_integarted = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="oper-send-check" viewBox="-2 -3 20 20">'
								  . '<path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>'
								  . '<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>'
								. '</svg>';
			self::$instance->admin_menu['master'] = new OPER_Admin_Menus(
															'oper-reminders' , array (
															'in_menu' => 'root'
													    //, 'mune_icon_url' => '/assets/img/icon-16x16.png'
														  , 'mune_icon_url' => $svg_icon_integarted								//FixIn: 2.0.1.2
														  , 'menu_title' => $title
														  , 'menu_title_second' => __( 'Reminders', 'email-reminders' )
														  , 'page_header'       => __( 'Reminders', 'email-reminders' )
														  , 'browser_header'    => __( 'Reminders', 'email-reminders' )
														  , 'user_role' => get_oper_option( 'oper_user_role_reminders' )
														  , 'position' => $oper_menu_position // 3.3 - top           //( 58.9 )  // - middle
																						/*
																						(Optional). Positions for Core Menu Items
																							2 Dashboard
																							4 Separator
																							5 Posts
																							10 Media
																							15 Links
																							20 Pages
																							25 Comments
																							59 Separator
																							60 Appearance
																							65 Plugins
																							70 Users
																							75 Tools
																							80 Settings
																							99 Separator
																							 */
																					)

														);

			self::$instance->admin_menu['contacts']    = new OPER_Admin_Menus(
															'oper-contacts' , array (
															'in_menu' => 'oper-reminders'
														  , 'menu_title'    => ucwords( __('Contacts', 'email-reminders') )
														  , 'page_header'   => ucwords( __('Contacts', 'email-reminders') )
														  , 'browser_header'=> ucwords( __('Contacts', 'email-reminders') )
														  , 'user_role' => get_oper_option( 'oper_user_role_contacts' )
																					)
														);

			self::$instance->admin_menu['rules']    = new OPER_Admin_Menus(
															'oper-rules' , array (
															'in_menu' => 'oper-reminders'
														  , 'menu_title'    => ucwords( __('Rules', 'email-reminders') )
														  , 'page_header'   => ucwords( __('Rules', 'email-reminders') )
														  , 'browser_header'=> ucwords( __('Rules', 'email-reminders') )
														  , 'user_role' => get_oper_option( 'oper_user_role_rules' )
																					)
														);


			self::$instance->admin_menu['settings'] = new OPER_Admin_Menus(
															'oper-settings' , array (
															'in_menu' => 'oper-reminders'
														  , 'menu_title'    => __('Settings', 'email-reminders')
														  , 'page_header'   => __('General Settings', 'email-reminders')
														  , 'browser_header'=> __('Settings', 'email-reminders')
														  , 'user_role' => get_oper_option( 'oper_user_role_settings' )
																					)
														);

		}


	    /** Get Menu Object
	     *
	     * @param type  - menu type
	     * @return boolean
	     */
	    public function get_menu_object( $type ) {

	        if ( isset( self::$instance->admin_menu[ $type ] ) )
	            return self::$instance->admin_menu[ $type ];
	        else
	            return false;
	    }

	}

else:   // Its seems that  some instance of CLIENTSMANAGER still activted!!!


    function oper_show_activation_error() {

        $message_type = 'error';
        $title        = __( 'Error' , 'email-reminders') . '!';
        $message      = __( 'Please deactivate previous old version of' , 'email-reminders') . ' ' . 'OPER';

        $oper_version_num = get_option( 'oper_version_num');
        if ( ! empty( $oper_version_num ) )
            $message .= ' <strong>' . $oper_version_num . '</strong>';

	    if ( function_exists( 'get_oper_option' ) ) {
		    $is_delete_if_deactive = get_oper_option( 'oper_is_delete_if_deactive' );
	    } else {
	    	$is_delete_if_deactive = 'Off';
		}

        if ( $is_delete_if_deactive == 'On' ) {

            $message .= '<br/><br/> <strong>Warning!</strong> ' . 'All plugin data will be deleted when plugin had deactivated.' . ' '
                . sprintf( 'If you want to save your plugin data, please uncheck the %s"Delete plugin data"%s at the', '<strong>', '</strong>') . ' ' . __( 'Settings' , 'email-reminders') . '.';
        }

        $message_content = '';

        $message_content .= '<div class="clear"></div>';

        $message_content .= '<div class="updated oper-settings-notice notice-' . $message_type . ' ' . $message_type . '" style="text-align:left;padding:10px;">';

        if ( ! empty( $title ) )
        $message_content .=  '<strong>' . esc_js( $title ) . '</strong> ';

        $message_content .= html_entity_decode( esc_js( $message ) ,ENT_QUOTES) ;

        $message_content .= '</div>';

        $message_content .= '<div class="clear"></div>';

        echo $message_content;
    }

    add_action('admin_notices', 'oper_show_activation_error');

    return;         // Exit

endif;





//if (  ! defined( 'SAVEQUERIES') ) define('SAVEQUERIES', true);

 //add_action( 'admin_footer', 'oper_show_debug_info', 130 );
function oper_show_debug_info() {

    $request_uri = $_SERVER['REQUEST_URI'];                                 // FixIn:5.4.1
    if ( strpos( $request_uri, 'page=oper') === false ) {
        return;
    }
    echo '<div style="width:800px;margin:10px auto;"><style type="text/css"> a:link{background: inherit !important; } pre { white-space: pre-wrap; }</style>';

phpinfo();  echo '</div>'; return;

    ?><div style="width:auto;margin:0 0 0 215px;font-size:11px;    "><?php

// SYSTEM  INFO SHOWING ////////////////////////////////////////////////////////

    //Note firstly  need to  define this in functions.php file:   define('SAVEQUERIES', true);
    global $wpdb;
    echo '<div class="clear"></div>START SYSTEM<pre>';
        $qq_kk = 0;
        $total_time = 0;
        $total_num = 0;
        foreach ( $wpdb->queries as $qq_k => $qq ) {
            if (
                       ( strpos( $qq[0], 'email-reminders') !== false )

                ) {
                if ( $qq[1] > 0.002 ) { echo '<div style="color:#A77;font-weight:bold;">'; }
                debuge($qq_kk++, $qq);
                $total_time += $qq[1];
                $total_num++;
                if ( $qq[1] > 0.002 ) { echo '</div>'; }
            }
        }

        echo '<div><pre class="prettyprint linenums" style="font-size:18px;">[' . $total_num . '/' . $total_time . '] OPER Requests TOTAL TIME</pre></div>';

        echo '<div class="clear"></div>';

        echo '<div><pre class="prettyprint linenums" style="font-size:18px;">' . get_num_queries(). '/'  . timer_stop(0, 3) . 'qps</pre></div>';

        echo '<div class="clear"></div>';

    echo "</pre>";
    ?><br/><br/><br/><br/><br/><br/><?php
    echo '<div class="clear"></div>';

////////////////////////////////////////////////////////////////////////////////
    ?></div><?php

    echo '</div>';
}