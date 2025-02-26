<?php
/**
 * JETI_Integration Class
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined( 'ABSPATH' ) || exit;

/**
 * JETI_Integration Class.
 */
final class JETI_Integration {

    /**
     * The single instance of the class.
     *
     * @var JETI_Integration
     */
    protected static $_instance = null;

    /**
     * Main JETI_Integration Instance.
     *
     * Ensures only one instance of JETI_Integration is loaded or can be loaded.
     *
     * @static
     * @return JETI_Integration - Main instance.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * JETI_Integration Constructor.
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
    }

    /**
     * Define JetAPI Constants.
     */
    private function define_constants() {
        $this->define( 'JETI_ABSPATH', dirname( JETI_PLUGIN_FILE ) . '/' );
        $this->define( 'JETI_PLUGIN_BASENAME', plugin_basename( JETI_PLUGIN_FILE ) );
        $this->define( 'JETI_VERSION', '1.0.0' );
        $this->define( 'JETI_PLUGIN_URL', plugin_dir_url( JETI_PLUGIN_FILE ) );
        $this->define( 'JETI_PLUGIN_DIR', plugin_dir_path( JETI_PLUGIN_FILE ) );
    }

    /**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     */
    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {
        include_once JETI_ABSPATH . 'includes/class-jeti-integration-settings.php';
        include_once JETI_ABSPATH . 'includes/class-jeti-auth.php';
        include_once JETI_ABSPATH . 'includes/class-jeti-notification-sender.php';
        include_once JETI_ABSPATH . 'includes/class-jeti-bulk-messaging.php';
        include_once JETI_ABSPATH . 'includes/class-jeti-campaign-manager.php';
        include_once JETI_ABSPATH . 'includes/admin/jeti-settings-page.php';
        include_once JETI_ABSPATH . 'includes/admin/jeti-messages-page.php';
        include_once JETI_ABSPATH . 'includes/admin/jeti-bulk-messaging-page.php';
        include_once JETI_ABSPATH . 'includes/admin/jeti-dashboard-page.php';
    }

    /**
     * Hook into actions and filters.
     */
    private function init_hooks() {
        add_action( 'init', array( $this, 'init' ), 0 );
        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'add_menu_items' ) );

        // Add hook for order status change
        add_action( 'woocommerce_order_status_changed', array( $this, 'handle_order_status_change' ), 10, 3 );

        // Schedule cron job for queue processing
        add_action( 'wp', array( $this, 'schedule_queue_processing' ) );

        // Hook for processing the bulk queue
        add_action( 'jeti_process_bulk_queue', array( $this, 'process_bulk_queue' ) );
    }

    /**
     * Init JetAPI Integration when WordPress Initialises.
     */
    public function init() {
        $this->auth = new JETI_Auth();
        // Init action.
        do_action( 'jetapi_init' );
    }

    /**
     * Init JetAPI Integration admin.
     */
    public function admin_init() {
        // Any admin-specific initialization can go here
    }

    /**
     * Add menu items.
     */
    public function add_menu_items() {
        add_menu_page(
            __('JetAPI', 'jetapi-integration-for-woocommerce'),
            __('JetAPI', 'jetapi-integration-for-woocommerce'),
            'manage_options',
            'jeti-dashboard',
            array('JETI_Dashboard_Page', 'render_dashboard'),
            JETI_PLUGIN_URL . 'assets/icons/Logo_JetApi_icon.svg',
            56
        );

        add_submenu_page(
            'jeti-dashboard',
            __('Dashboard', 'jetapi-integration-for-woocommerce'),
            __('Dashboard', 'jetapi-integration-for-woocommerce'),
            'manage_options',
            'jeti-dashboard',
            array('JETI_Dashboard_Page', 'render_dashboard')
        );

        add_submenu_page(
            'jeti-dashboard',
            __('Message History', 'jetapi-integration-for-woocommerce'),
            __('Message History', 'jetapi-integration-for-woocommerce'),
            'manage_options',
            'jeti-messages',
            array('JETI_Messages_Page', 'render_messages_page')
        );

        add_submenu_page(
            'jeti-dashboard',
            __('Bulk Messaging', 'jetapi-integration-for-woocommerce'),
            __('Bulk Messaging', 'jetapi-integration-for-woocommerce'),
            'manage_options',
            'jeti-bulk-messaging',
            array('JETI_Bulk_Messaging_Page', 'render_bulk_messaging_page')
        );

        add_submenu_page(
            'jeti-dashboard',
            __('Settings', 'jetapi-integration-for-woocommerce'),
            __('Settings', 'jetapi-integration-for-woocommerce'),
            'manage_options',
            'jeti-settings',
            array('JETI_Settings_Page', 'render_settings_page')
        );
    }

    /**
     * Handle order status change.
     *
     * @param int    $order_id The ID of the order.
     * @param string $old_status The old order status.
     * @param string $new_status The new order status.
     */
    public function handle_order_status_change( $order_id, $old_status, $new_status ) {
        $settings = new JETI_Integration_Settings();
        $notification_statuses = $settings->get_notification_statuses();
        $enable_notifications = $settings->get_option('enable_notifications', 'yes') === 'yes';

        jeti_log_error( "Order $order_id status changed from $old_status to $new_status" );

        if ( !$enable_notifications ) {
            jeti_log_error( "Notifications are disabled. No notification sent for order $order_id" );
            return;
        }

        if ( in_array( $new_status, $notification_statuses, true ) ) {
            $notification_sender = new JETI_Notification_Sender();
            $order = jeti_get_order( $order_id );
            
            if (!$order) {
                jeti_log_error( "Could not find order $order_id" );
                return;
            }

            // Get billing phone using WC_Order method
            $customer_phone = $order->get_billing_phone();

            if (empty($customer_phone)) {
                jeti_log_error( "No phone number found for order $order_id" );
                return;
            }

            $status_name = $this->get_order_status_name( $new_status );
            $message = sprintf( 'Your order #%s status has been updated to: %s', $order->get_order_number(), $status_name );
            
            // Allow customization of the notification message
            $message = apply_filters( 'jeti_order_status_notification_message', $message, $order, $new_status );

            $result = $notification_sender->send_notification( $customer_phone, $message );

            if ( $result ) {
                jeti_log_error( "Notification sent successfully for order $order_id" );
            } else {
                jeti_log_error( "Failed to send notification for order $order_id" );
            }
        } else {
            jeti_log_error( "No notification sent for order $order_id (status not in notification list)" );
        }
    }

    /**
     * Get the human-readable name for an order status.
     *
     * @param string $status The order status slug.
     * @return string The human-readable order status name.
     */
    private function get_order_status_name( $status ) {
        $status_names = array(
            'pending'    => 'Pending payment',
            'processing' => 'Processing',
            'on-hold'    => 'On hold',
            'completed'  => 'Completed',
            'cancelled'  => 'Cancelled',
            'refunded'   => 'Refunded',
            'failed'     => 'Failed'
        );

        return isset( $status_names[ $status ] ) ? $status_names[ $status ] : ucfirst( $status );
    }

    /**
     * Schedule queue processing.
     */
    public function schedule_queue_processing() {
        if ( ! wp_next_scheduled( 'jeti_process_bulk_queue' ) ) {
            wp_schedule_event( time(), 'every_minute', 'jeti_process_bulk_queue' );
        }
    }

    /**
     * Process the bulk queue.
     */
    public function process_bulk_queue() {
        $bulk_messaging = new JETI_Bulk_Messaging();
        $processed = $bulk_messaging->get_queue_status();
        
        $notification_sender = new JETI_Notification_Sender();
        $notification_sender->process_bulk_queue();
    }

    /**
     * @var JETI_Auth
     */
    private $auth;
}
