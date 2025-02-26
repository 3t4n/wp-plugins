<?php
/*
 * Plugin Name:       Profitblue - Financial reporting for WooCommerce
 * Plugin URI:        https://profitblue.com
 * Description:       Profitblue is the first profit tracker running on WooCommerce. With this tool, even small and medium-sized companies can measure their profit with high accuracy and in real time. Profitblue has many charts and tables to help you understand the financial health of your company.
 * Version:           1.0.0
 * Author:            Profitblue
 * Text Domain:       profitblue-financial-reporting-for-woocommerce
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Domain Path:       /languages
 * WC tested up to:   9.1.2
 * WC requires at least: 6.0
 * Requires Plugins:  woocommerce
 * Requires PHP:      7.4.0
 */

use ProfitBlue\ProfitBlueAdmin;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Emails\EmailNotification;
use ProfitBlue\Emails\ProfitblueReportEmail;
use ProfitBlue\Models\NotificationsModel;
use ProfitBlue\Helpers\Helper;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function profitblue_compatibility_notice(){
    ?>
    <div class="notice notice-warning is-dismissible">
        <p><?php esc_html_e( 'The plugin Profitblue has been deactivated because Profitblue PRO plugin is active.', 'profitblue-financial-reporting-for-woocommerce' ); ?></p>
    </div>
    <?php
}

define( 'PROFITBLUEFDIR', plugin_dir_path( __FILE__ ) );
define( 'PROFITBLUEFURL', plugin_dir_url( __FILE__ ) );
define( 'PROFITBLUEFLANG', 'profitblue-financial-reporting-for-woocommerce' );
define( 'PROFITBLUEFVAR', 'profitblue-a' );
define( 'PROFITBLUEFVERSION', '1.0.0' );

require 'vendor/autoload.php';

register_activation_hook( __FILE__, array( 'ProfitBlue_Free', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ProfitBlue_Free', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'ProfitBlue_Free', 'get_instance' ) );

class ProfitBlue_Free {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0
	 *
	 * @var     string
	 */
	public $version = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 *
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 *
	 * @since    1.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'profitblue-financial-reporting-for-woocommerce';

	/**
	 * Plugin dir
	 *
	 * @since    1.0
	 *
	 * @var      string
	 */
	protected $plugin_dir = PROFITBLUEFDIR;

	/**
	 * Plugin url
	 *
	 * @since    1.0
	 *
	 * @var      string
	 */
	protected $plugin_url = PROFITBLUEFURL;

	/**
	 * Instance of this class.
	 *
	 * @since    1.0
	 *
	 * @var      object
	 */
    protected static $instance = null;
    
    /**
	 * Get plugin options
	 *
	 * @since    1.0
	 *
	 * @var      array
	 */
	public $option = null;

	/**
	 * Initialize the plugin
	 *
	 * @since     1.0
	 */
	private function __construct() {

        $this->public_init();

		if ( is_admin() ) {

			$this->admin_init();

		}

    }

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return 'profitblue-financial-reporting-for-woocommerce';
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses
	 *                                       "Network Activate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       activated on an individual blog.
	 */
	public static function activate( $network_wide ) {

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide  ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_activate();
				}

				restore_current_blog();

			} else {
				self::single_activate();
			}

		} else {
			self::single_activate();
		}		

	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses
	 *                                       "Network Deactivate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_deactivate();

				}

				restore_current_blog();

			} else {
				self::single_deactivate();
			}

		} else {
			self::single_deactivate();
		}

	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 * @since    1.0
	 *
	 * @param    int    $blog_id    ID of the new blog.
	 */
	public function activate_new_site( $blog_id ) {

		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		switch_to_blog( $blog_id );
		self::single_activate();
		restore_current_blog();

	}

	/**
	 * Get all blog ids of blogs in the current network that are:
	 * - not archived
	 * - not spam
	 * - not deleted
	 *
	 * @since    1.0
	 *
	 * @return   array|false    The blog ids, false if no matches.
	 */
	private static function get_blog_ids() {

		global $wpdb;

		// get an array of blog ids
		return $wpdb->get_col(
			$wpdb->prepare(
				"SELECT blog_id FROM %i
				WHERE archived = '0' AND spam = '0'
				AND deleted = '0'",
				array(
					$wpdb->blogs
				)
			)
		);

	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 * @since    1.0
	 */
	private static function single_activate() {	
		
		if ( class_exists( 'profitblue-financial-reporting-for-woocommerce' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        	deactivate_plugins( plugin_basename( __FILE__ ) );
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
        	if ( isset( $_GET['activate'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
            	unset( $_GET['activate'] );
        	}
			wp_die( 
				sprintf(
            		'Could not be activated. Profiblue PRO is installed and active. Please deactivate plugin on %1$s.',
            		'<strong><a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">plugins page</a></strong>'	
				)
			);
            
        }

		$instalation_finish = get_option( 'profitblue_install_step' );
		if ( !empty( $instalation_finish ) ) {
			$ordersController = new OrdersController();			
			
			$not_saved = $ordersController->get_not_saved_order_id_batch();
			
			if ( !empty( $not_saved ) ) {
				$order_array = array();
				foreach( $not_saved as $order ) {
					$order_array[] = $order->id;
				}
				if ( !empty( $order_array ) ) {
					update_option( 'profitblue_notsaved_orders', $order_array );
				}
			}
			$not_exists = $ordersController->get_not_exists_orders_ids();
			if ( !empty( $not_exists ) ) {
				foreach( $not_exists as $order ) {
					$ordersController->delete_order( $order->order_id );
				}
			}
		}

	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 * @since    1.0
	 */
	private static function single_deactivate() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset($_GET['profitblue-deactivation']) && 'remove' == $_GET['profitblue-deactivation'] ) {

			//Remove tables
			global $wpdb;
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_ccai'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_ccai_items'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_cogs'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_order_items'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_payments'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_payment_periods'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_products'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_products_periods'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_shiping_costs'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_shipping_costs_data'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_shop_setting'
					)
				)
			);
			$wpdb->query(
				$wpdb->prepare(
					"DROP TABLE IF EXISTS %i",
					array(
						$wpdb->prefix . 'profitblue_shop_setting_periods'
					)
				)
			);
			
			//Remove options
			delete_option( 'profitblue_cogs_tables_created' );
			delete_option( 'profitblue_cogs_period_created' );
			delete_option( 'profitblue_notifications-settings' );
			delete_option( 'profitblue-use-this-payment-period' );
			delete_option( 'profitblue-use-this-shipping-period' );
			delete_option( 'profitblue-use-this-shop-setting-period' );
			delete_option( 'profitblue_shipping_orders_buffer' );
			delete_option( 'profitblue_batch' );
			delete_option( 'profitblue_cogs_tables_created' );
			delete_option( 'profitblue_instalation_finish' );
			delete_option( 'profitblue_licence_response' );
			delete_option( 'profitblue_licence_status' );
			delete_option( 'profitblue_licence_key' );
			delete_option( 'profitblue_pnl_cache' );
			delete_option( 'profitblue_install_step' );

			/**
			 * Delete post meta
			 * 
			 */
			$wpdb->query(
				$wpdb->prepare(
					"DELETE FROM %i WHERE meta_key = %s",
					array(
						$wpdb->prefix . 'postmeta',
						'cogs_imported'
					)
				)
			);
			
		}

		delete_option( 'profitblue_instalation_finish' );
		delete_option( 'profitblue_licence_response' );
		delete_option( 'profitblue_licence_status' );
		delete_option( 'profitblue_licence_key' );
		delete_option( 'profitblue_pnl_cache' );
		delete_option( 'profitblue_install_step' );
		
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0
	 */
	public function load_plugin_textdomain() {

		$domain = 'profitblue-financial-reporting-for-woocommerce';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		$load = load_textdomain( $domain, WP_LANG_DIR . '/profitblue/' . $domain . '-' . $locale . '.mo' );

		if( $load === false ){
			load_textdomain( $domain, $this->plugin_dir . 'languages/' . $domain . '-' . $locale . '.mo' );
        }
        
    }

	/**
	 * Handle public functions
	 *
	 * @since    1.0
	 */
    public function public_init(){

		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'init', array( $this, 'add_json_endpoint' ) );
		add_action( 'template_redirect', array( $this, 'json_template_redirect') );

		$this->include();

		add_action( 'woocommerce_order_status_changed', array( $this, 'order_status_change' ), 10, 4 ) ;
		add_action( 'init', array( $this, 'send_email' ) );
		add_filter( 'woocommerce_email_classes', array( $this, 'report_email' ) );
		add_filter( 'woocommerce_locate_template', array( $this, 'locate_template' ), 10, 3 );
		add_action( 'woocommerce_after_order_object_save', array( $this, 'calculate_order' ), 10, 1 );

		add_action( 'woocommerce_delete_order', array( $this, 'delete_order' ), 10, 1 );

		add_action('before_woocommerce_init', array( $this, 'hpos_compatibility' ), 10 );
	
	}	

	/**
	 * Declare compatibility
	 *
	 * @since    1.0
	 */
    public function hpos_compatibility(){
				
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	
		}	

    }

	/**
	 * Handle admin functions
	 *
	 * @since    1.0
	 */
    public function admin_init(){
				
		ProfitBlueAdmin::get_instance();		

    }

	/**
	 * Include files
	 *
	 * @since    1.0
	 */
    public function include(){

    }

	/**
	 * Is profitblue
	 *
	 * @since    1.0
	 * @return bool
	 */
    public function is_profitblue(){
		$pages = array(
			'profitblue-financial-reporting-for-woocommerce',
			'products',
			'orders',
			'profit-and-loss',
			'data-settings',
			'tutorials'			
		);
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['page'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$page = isset( $_GET['page'] ) ? wp_unslash( sanitize_text_field( $_GET['page'] ) ) : '';
			if ( in_array( $page, $pages ) ) {
				return true;
			}
		}

		return false;

	}

	/**
	 * Custom endpoint
	 *
	 * @since    1.0
	 */  
	public function add_json_endpoint() {
		add_rewrite_endpoint( 'profitblue-email', EP_ALL );
	}


	/**
	 *  Add template redirect
	 *
	 * @since    1.0
	 */
	public function json_template_redirect() {
		
		global $wp_query;
	
		if ( ! isset( $wp_query->query_vars['profitblue-email'] ) )
			return;
	
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['start_date'] ) && !empty( $_GET['end_date'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$start_date = isset( $_GET['start_date'] ) ? wp_unslash( sanitize_text_field( $_GET['start_date'] ) ) : '';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$end_date = isset( $_GET['end_date'] ) ? wp_unslash( sanitize_text_field( $_GET['end_date'] ) ) : '';
		} else {
			$start_date = '2024-01-02';
			$end_date = '2024-01-02';
		}

		$email = new EmailNotification( $start_date, $end_date );
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['type'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$type = isset( $_GET['type'] ) ? wp_unslash( sanitize_text_field( $_GET['type'] ) ) : '';
			$email->set_type( $type );
		} else {
			$email->set_type( 'daily' );
		}
		$mode = 'render';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['mode'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$mode = isset( $_GET['mode'] ) ? wp_unslash( sanitize_text_field( $_GET['mode'] ) ) : '';
		}
		
		if ( 'render' == $mode ) {
			echo wp_kses( $email->render(), Helper::get_allowed_tags() );
		} elseif ( 'send' == $mode ) {  
			
			$notifications_settings = new NotificationsModel();
        	$data = $notifications_settings->get_data();
			if ( !empty( $data['email'] ) ) {
				$html = $email->render();
				WC()->mailer();			
				$send = new ProfitblueReportEmail();
				$send->set_content( $html );
				$mail = $send->trigger( $data['email'] );
			}

		}

		exit;

	}

	/**
	 * Send email report
	 *
	 * @since    1.0
	 */
    public function send_email() {
		
		$notifications_settings = new NotificationsModel();
        $data = $notifications_settings->get_data();
		$date = gmdate( 'Y-m-d' );		
		if ( !empty( $data['email'] ) ) {
			$date = gmdate( 'Y-m-d' );
			if ( !empty( $data['daily'] ) && 'yes' == $data['daily'] ) {
				$yesterday = gmdate( 'Y-m-d', strtotime( '-1 day' ) );
				$check = get_option( 'profitblue_daily_' . $yesterday );
				if ( empty( $check ) ) {
					$email = new EmailNotification( $yesterday, $yesterday );		
					$email->set_type( 'daily' );					
					$html = $email->render();
					WC()->mailer();			
					$send = new ProfitblueReportEmail();
					$send->set_content( $html );
					$mail = $send->trigger( $data['email'] );
					update_option( 'profitblue_daily_' . $yesterday, 'sent' );
				}				
			}
			if ( !empty( $data['weekly'] ) && 'yes' == $data['weekly'] ) {
				$last_week = gmdate( 'W', strtotime( '-1 week' ) );
				$check = get_option( 'profitblue_weekly_' . $last_week );
				if ( empty( $check ) ) {
					$year = gmdate('o', strtotime("-1 week"));
					$firstDayOfWeek = new DateTime();
					$firstDayOfWeek->setISODate($year, $last_week);
					$firstDay = $firstDayOfWeek->format('Y-m-d');
					$lastDayOfWeek = clone $firstDayOfWeek;
					$lastDayOfWeek->add(new DateInterval('P6D'));
					$lastDay = $lastDayOfWeek->format('Y-m-d');
					$email = new EmailNotification( $firstDay, $lastDay );		
					$email->set_type( 'daily' );					
					$html = $email->render();
					WC()->mailer();			
					$send = new ProfitblueReportEmail();
					$send->set_content( $html );
					$mail = $send->trigger( $data['email'] );
					update_option( 'profitblue_weekly_' . $last_week, 'sent' );
				}
			}
			if ( !empty( $data['monthly'] ) && 'yes' == $data['monthly'] ) {
				$last_month = gmdate( 'm', strtotime( '-1 month' ) );
				$check = get_option( 'profitblue_monthly_' . $last_month );
				if ( empty( $check ) ) {
					$year = gmdate('Y', strtotime("-1 month")); // Year for the last month
					$firstDayOfMonth = gmdate('Y-m-01', strtotime("$year-$last_month-01"));
					$lastDayOfMonth = gmdate('Y-m-t', strtotime("$year-$last_month-01"));
					$email = new EmailNotification( $firstDayOfMonth, $lastDayOfMonth );		
					$email->set_type( 'daily' );					
					$html = $email->render();
					WC()->mailer();			
					$send = new ProfitblueReportEmail();
					$send->set_content( $html );
					$mail = $send->trigger( $data['email'] );
					update_option( 'profitblue_monthly_' . $last_month, 'sent' );
				}
			}
			if ( !empty( $data['yearly'] ) && 'yes' == $data['yearly'] ) {
				$last_year = gmdate( 'Y', strtotime( '-1 year' ) );
				$check = get_option( 'profitblue_yearly_' . $last_year );
				if ( empty( $check ) ) {
					$email = new EmailNotification( $last_year . '01-01', $last_year . '21-31' );
					$email->set_type( 'daily' );					
					$html = $email->render();
					WC()->mailer();			
					$send = new ProfitblueReportEmail();
					$send->set_content( $html );
					$mail = $send->trigger( $data['email'] );
					update_option( 'profitblue_yearly_' . $last_year, 'sent' );
				}
			}
		}	
	}

	/**
	 * Report email class
	 *
	 * @since    1.0
	 */
    public function report_email( $email_classes ) {

		$email_classes['ProfitblueReportEmail'] = new ProfitblueReportEmail();

    	return $email_classes;

	}

	/**
     * Force WooCommerce to load email template from plugin
     *
     * @since    1.0
     */
    public function locate_template($template, $template_name, $template_path)
    {

        if ($template_name == 'profitblue-report-email.php') {
            $template = PROFITBLUEFDIR . 'src/Emails/profitblue-report-email.php';
        } elseif ($template_name == 'profitblue-report-email-plain.php') {
            $template = PROFITBLUEFDIR . 'src/Emails/profitblue-report-email-plain.php';
        }

        return $template;

    }

	/**
	 * Change order status
	 *
	 * @param  int $order_id
     * @param  string $old_status
     * @param  string $new_status
     * @param  object $order
     * @return void
	 * 
	 * @since    1.0
     */
    public function order_status_change( $order_id, $old_status, $new_status, $order ) {
		
		global $wpdb;
		$wpdb->update( $wpdb->prefix . 'profitblue_orders', array( 'order_status' => $new_status ), array( 'order_id' => $order_id ) );
		
	}
	
	/**
	 * Recalculate order after update
	 *
	 * @param  int $post_ID
	 * @param  object $post
	 * @param  string $update
	 * @return void
	 * 
	 * @since    1.0
	 */
	public function calculate_order( $order ) {
		
		$ordersController = new OrdersController();			
		$ordersController->calculate_order_data( $order->get_id() );
		return;

	}

	/**
	 * Delete order
	 *
	 * @param  int $order_id
	 * @return void
	 * 
	 * @since    1.0
	 */
	public function delete_order( $order_id ) {
		
		$ordersController = new OrdersController();			
		$ordersController->delete_order( $order_id );
		return;

	}	
	
}//End class
