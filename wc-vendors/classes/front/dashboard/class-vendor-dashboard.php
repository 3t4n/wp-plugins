<?php
/**
 * The main WCV_Vendor_Dashboard class - moved from Pro to Free from version 2.5.2
 *
 * This is the main controller class for the dashboard, all actions are defined in this class.
 */

use WC_Vendors\Classes\Front\WCV_Public_Assets;
use WC_Vendors\Classes\Front\WCV_Table_Helper;
use WC_Vendors\Classes\Front\WCV_Reports_Controller;
use WC_Vendors\Classes\Front\WCV_Order_Controller;
use function WC_Vendors\Classes\Includes\wcv_get_default_product_template;
use function WC_Vendors\Classes\Includes\wcv_is_dashboard_page;
/**
 * Class WCV_Vendor_Dashboard
 */
class WCV_Vendor_Dashboard {

    /**
     * The ID of this plugin.
     *
     * @since    2.5.2
     * @access   private
     * @var      string $wcvendors_pro The ID of this plugin.
     */
    private $wcvendors;

    /**
     * The version of this plugin.
     *
     * @since    2.5.2
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Is the plugin in debug mode
     *
     * @since    2.5.2
     * @access   private
     * @var      bool $debug plugin is in debug mode
     */
    private $debug;

    /**
     * Is the plugin in debug mode
     *
     * @since    2.5.2
     * @access   private
     * @var      array $dashboard_pages an array of dashboard pages
     */
    private $dashboard_pages = array();

    /**
     * Is the plugin base directory
     *
     * @since    2.5.2
     * @access   private
     * @var      string $base_dir string path for the plugin directory
     */
    private $base_dir;


    /**
     * Prefix
     *
     * @since    2.5.2
     *
     * @var string $prefix The prefix for the plugin
     */
    private $prefix = 'wcvendors_';

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.5.2
     *
     * @param bool $debug Is debug enabled.
     */
    public function __construct( $debug = false ) {

        $this->wcvendors = 'WC Vendors Marketplace';
        $this->version   = WCV_VERSION;
        $this->debug     = $debug;
        $this->base_dir  = plugin_dir_path( WCV_PLUGIN_FILE );
        $this->init_hooks();
        $this->load_theme_support();
    }

    /**
     * Init hooks
     *
     * @since 2.5.2
     * @version 2.5.2
     */
    public function init_hooks() {
        add_filter( 'query_vars', array( $this, 'add_query_vars' ) );
        add_filter( 'rewrite_rules_array', array( $this, 'rewrite_rules' ) );
        add_shortcode( 'wcv_pro_dashboard', array( $this, 'load_dashboard' ) );
        add_shortcode( 'wcv_vendor_dashboard', array( $this, 'load_pro_shortcode_to_free' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        if ( is_user_logged_in() && WCV_Vendors::is_vendor( get_current_user_id() ) ) {
            add_filter( 'woocommerce_account_menu_items', array( $this, 'add_vendor_dashboard_item' ) );
            add_filter( 'woocommerce_get_endpoint_url', array( $this, 'add_vendor_dashboard_endpoint' ), 10, 2 );
            add_action( 'wp_head', array( $this, 'add_vendor_dashboard_icon' ) );
        }

        add_action( 'template_redirect', array( $this, 'redirect_old_slug' ) );
    }

    /**
     * Enqueue scripts and styles
     */
    public function enqueue_scripts() {

        $public_assets = WCV_Public_Assets::get_instance();
        $public_assets->enqueue_scripts();
        $public_assets->enqueue_styles();
    }

    /**
     * Load wcv_pro_dashboard shortcode to wcv_vendor_dashboard
     */
    public function load_pro_shortcode_to_free() {
        return do_shortcode( '[wcv_pro_dashboard]' );
    }

    /**
     * Load the dasboard based on the query vars loaded.
     *
     * @since    2.5.2
     */
    public function load_dashboard() {

        $dashboard_page_id = get_option( 'wcvendors_vendor_dashboard_page_id', false );

        if ( empty( $dashboard_page_id ) ) {
            return '<h2>' . esc_html__( 'Please ensure you have set a page for the Vendor Dashboard.', 'wc-vendors' ) . '</h2>';
        }

        ob_start();

        global $wp;

        if ( isset( $wp->query_vars['object'] ) ) {

            $type     = get_query_var( 'object' );
            $action   = get_query_var( 'action' );
            $id       = get_query_var( 'object_id' );
            $template = get_query_var( 'template' );
            $custom   = get_query_var( 'custom' );

            $this->load_page( $type, $action, $id, $template, $custom );

        } else {

            $this->load_page();
        }

        return ob_get_clean();
    }

    /**
     * Output the requested page for the dashboard
     *
     * @since    2.5.2
     *
     * @param    string $object object type.
     * @param    string $action page action.
     * @param    int    $object_id the object's post id.
     * @param    string $template template file.
     * @param    string $custom custom page.
     */
    public function load_page( $object = 'dashboard', $action = '', $object_id = null, $template = null, $custom = null ) { // phpcs:ignore

        // Permission check for all dashboard pages.
        if ( ! $this->can_view_dashboard() ) {
            $this->maybe_load_application_form();
            return false;
        }

        // Has the page been disabled ?
        if ( ! $this->page_disabled() ) {
            $return_url = $this->get_dashboard_page_url();
            wc_get_template( 'permission.php', array( 'return_url' => $return_url ), 'wc-vendors/dashboard/', $this->base_dir . 'templates/dashboard/' );

            return false;
        }

        // Does the user own this object ?
        if ( ! empty( $object_id ) && ! $this->check_object_permission( $object, $object_id ) ) {
            $return_url = $this->get_dashboard_page_url();
            wc_get_template( 'permission.php', array( 'return_url' => $return_url ), 'wc-vendors/dashboard/', $this->base_dir . 'templates/dashboard/' );

            return false;
        }
        // Include the dashboard wrapper.
        include_once wcv_deprecated_filter( 'wcvendors_pro_dashboard_open_path', '2.5.2', 'wcvendors_dashboard_open_path', 'partials/wcvendors-dashboard-open.php' );

        wcv_deprecated_action( 'wcvendors_pro_before_dashboard', '2.5.2', 'wcvendors_before_dashboard' );

        // Create the menu.
        $this->create_nav();

        // Print woocommerce notices.
        wc_print_notices();

        // Vendor Store Notice.
        $vendor_dashboard_notice = get_option( 'wcvendors_vendor_dashboard_notice', false );

        if ( $vendor_dashboard_notice ) {

            wc_get_template(
                'dashboard-notice.php',
                array(
                    'vendor_dashboard_notice' => $vendor_dashboard_notice,
                    'notice_type'             => 'message',
                ),
                'wc-vendors/dashboard/',
                $this->base_dir . '/templates/dashboard/'
            );
        }

        wcv_deprecated_action( 'wcvendors_pro_after_dashboard_nav', '2.5.2', 'wcvendors_after_dashboard_nav' );

        // if action is set send to edit page with or without object_id else list type.
        if ( 'edit' === $action ) {

            $template_name = '';
            $custom_pages  = self::get_custom_pages();
            $base_dir      = ( array_key_exists( $object, $custom_pages ) ) ? $custom_pages[ $object ]['base_dir'] : $this->base_dir . 'templates/dashboard/';

            $base_dir = apply_filters( 'wcv_dashboard_template_base_dir', $base_dir, $object, $action, $template );

            // Load the form template based on options in backend.
            $template_name = apply_filters( 'wcv_dashboard_template_name', ( 'product' === $object && ! empty( $template ) ) ? $object . '-' . $template : $object . '-' . $action, $object, $template, $action );

            wc_get_template(
                $template_name . '.php',
                array(
                    'action'    => $action,
                    'template'  => $template,
                    'object_id' => $object_id,
                ),
                'wc-vendors/dashboard/',
                $base_dir
            );

        } else { // phpcs:ignore

            // Load the custom template.
            if ( ! empty( $custom ) ) {

                $custom_pages = self::get_custom_pages();
                // Output the template if it is defined.
                if ( array_key_exists( 'template_name', $custom_pages[ $custom ] ) ) {
                    wc_get_template(
                        $custom_pages[ $custom ]['template_name'] . '.php',
                        $custom_pages[ $custom ]['args'],
                        'wc-vendors/dashboard/',
                        $custom_pages[ $custom ]['base_dir']
                    );
                } else {
                    // Allow hooking into the custom template system to not require a template.
                    wcv_deprecated_action( 'wcv_pro_dashboard_custom_template', '2.5.2', 'wcvendors_dashboard_custom_template', $object, $object_id, $template, $custom );
                }
            } else { // phpcs:ignore

                // If the object is a post type then generate a table, otherwise load the custom template.
                if ( post_type_exists( $object ) ) {

                    // Use the internal table generator to create object list.
                    $object_table = new WCV_Table_Helper( $this->wcvendors, $this->version, $object, $object, get_current_user_id() );
                    $object_table->display();

                } else {

                    switch ( $object ) {
                        case 'order':
                            $this->load_order_page();
                            break;
                        case 'settings':
                            $this->load_settings_page();
                            break;
                        case 'dashboard':
                            $this->dashboard_quick_links();
                            $store_report = new WCV_Reports_Controller();
                            $store_report->report_init();
                            $store_report->display();
                            break;
                        default:
                            wcv_deprecated_action( 'wcv_pro_dashboard_custom_page', '2.5.2', 'wcvendors_dashboard_custom_page', $object, $object_id, $template, $custom );
                            break;
                    }
                }
            }
        }

        wcv_deprecated_action( 'wcv_pro_after_dashboard', '2.5.2', 'wcvendors_after_dashboard' );

        include_once wcv_deprecated_filter( 'wcvendors_pro_dashboard_close_path', '2.5.2', 'wcvendors_dashboard_close_path', 'partials/wcvendors-dashboard-close.php' );
    }

    /**
     * Generate the page URL based on the dashboard page id set in options
     *
     * @since   2.5.2
     * @version 2.5.2
     *
     * @param string $page page type to output.
     */
    public static function get_dashboard_page_url( $page = '' ) {

        $dashboard_page_ids = (array) get_option( 'wcvendors_vendor_dashboard_page_id', array() );
        $dashboard_page_id  = reset( $dashboard_page_ids );
        $dashboard_url      = apply_filters( 'wcv_my_account_dashboard_url', get_permalink( $dashboard_page_id ) );

        return $dashboard_url . $page;
    }

    /**
     * Provide quick links on the dashboard to reduce click through
     *
     * @since    2.5.2
     * @version  2.5.2
     */
    public function get_dashboard_quick_links() {

        $products_disabled  = wc_string_to_bool( get_option( 'wcvendors_product_management_cap', 'no' ) );
        $lock_edit_products = ( 'yes' === get_user_meta( get_current_user_id(), '_wcv_lock_edit_products_vendor', true ) ) ? true : false;
        $lock_new_products  = ( 'yes' === get_user_meta( get_current_user_id(), '_wcv_lock_new_products_vendor', true ) ) ? true : false;

        $quick_links      = array();
        $add_product_link = wcv_get_default_product_template();
        $can_submit       = wc_string_to_bool( get_option( 'wcvendors_capability_products_enabled', 'no' ) );

        if ( ! $products_disabled ) {
            $quick_links['product'] = array(
                'url'   => apply_filters( 'wcv_add_product_url', self::get_dashboard_page_url( $add_product_link['url_path'] ) ),
                'label' => __( 'Add product', 'wc-vendors' ),
            );

            if ( ! $can_submit ) {
                unset( $quick_links['product'] );
            }
        }

        if ( $lock_edit_products || $lock_new_products ) {
            unset( $quick_links['product'] );
        }

        return apply_filters( 'wcv_dashboard_quick_links', $quick_links );
    }

    /**
     * Provide quick links on the dashboard to reduce click through
     *
     * @since    2.5.2
     */
    public function dashboard_quick_links() {

        $quick_links = $this->get_dashboard_quick_links();
        $stats       = apply_filters( 'wcv_dashboard_usage_stats', array() );

        wc_get_template(
            'quick-links.php',
            array(
                'quick_links' => $quick_links,
                'stats'       => $stats,
            ),
            'wc-vendors/dashboard/',
            $this->base_dir . 'templates/dashboard/'
        );
    }

    /**
     * Available dashboard urls for front end functionality
     *
     * @since    2.5.2
     * @version  2.5.2 - added can submit handler.
     */
    public function get_dashboard_pages() {

        $disable_duplicate  = ! wc_string_to_bool( get_option( 'wcvendors_capability_product_duplicate', 'no' ) );
        $lock_edit_products = get_user_meta( get_current_user_id(), '_wcv_lock_edit_products_vendor', true );
        $can_submit         = wc_string_to_bool( get_option( 'wcvendors_capability_products_enabled', 'no' ) );

        $this->dashboard_pages['product'] = array(
            'slug'    => 'product',
            'id'      => 'product',
            'label'   => __( 'Products', 'wc-vendors' ),
            'actions' => array(
                'edit'      => __( ' Edit', 'wc-vendors' ),
                'duplicate' => __( ' Duplicate', 'wc-vendors' ),
                'delete'    => __( ' Delete', 'wc-vendors' ),
            ),
        );

        if ( $disable_duplicate || $lock_edit_products ) {
            unset( $this->dashboard_pages['product']['actions']['duplicate'] );
        }

        if ( ! $can_submit || $lock_edit_products ) {
            unset( $this->dashboard_pages['product']['actions']['edit'] );
            unset( $this->dashboard_pages['product']['actions']['duplicate'] );
        }

        $this->dashboard_pages['order'] = array(
            'slug'    => 'order',
            'id'      => 'order',
            'label'   => __( 'Orders', 'wc-vendors' ),
            'actions' => array(),
        );

        $this->dashboard_pages['settings'] = array(
            'slug'    => 'settings',
            'id'      => 'settings',
            'label'   => __( 'Settings', 'wc-vendors' ),
            'actions' => array(),
        );

        return wcv_deprecated_filter( 'wcv_pro_dashboard_urls', '2.5.2', 'wcv_dashboard_urls', $this->dashboard_pages );
    }

    /**
     * Load the orders table
     *
     * @since    2.5.2
     */
    public function load_order_page() {
        $wcvendors_pro_order_controller = new WCV_Order_Controller( $this->wcvendors, $this->version, $this->debug );
        $wcvendors_pro_order_controller->display();
    }

    /**
     * Load the store settings page
     *
     * @since    2.5.2
     */
    public function load_settings_page() {

        $vendor_id = get_current_user_id();

        $store_name              = get_user_meta( $vendor_id, 'pv_shop_name', true );
        $store_description       = get_user_meta( $vendor_id, 'pv_shop_description', true );
        $shipping_disabled       = wc_string_to_bool( get_option( 'wcvendors_shipping_management_cap', 'no' ) );
        $shipping_methods        = WC()->shipping->load_shipping_methods();
        $shipping_method_enabled = ( array_key_exists( 'wcv_pro_vendor_shipping', $shipping_methods ) && 'yes' === $shipping_methods['wcv_pro_vendor_shipping']->enabled ) ? true : 0;
        $shipping_details        = get_user_meta( get_current_user_id(), '_wcv_shipping', true );

        wc_get_template(
            'store-settings.php',
            array(
                'store_name'              => $store_name,
                'store_description'       => $store_description,
                'shipping_disabled'       => $shipping_disabled,
                'shipping_method_enabled' => $shipping_method_enabled,
                'shipping_details'        => $shipping_details,
            ),
            'wc-vendors/dashboard/',
            $this->base_dir . 'templates/dashboard/'
        );
    }

    /**
     * Check object permission to see if the vendor owns the object (this is to stop people messing with URLs)
     *
     * @since  2.5.2
     *
     * @param    string $object the object type to test.
     * @param    int    $object_id  object id to check.
     */
    public static function check_object_permission( $object, $object_id ) { // phpcs:ignore

        $can_edit_live = wc_string_to_bool( get_option( 'wcvendors_capability_products_edit', 'no' ) );
        $edit_status   = apply_filters( 'wcv_edit_object_status', array( 'draft', 'pending' ) );
        $post_status   = get_post_status( $object_id );
        $can_edit      = in_array( $post_status, $edit_status, true );

        $order      = null;
        $post_owner = 0;
        if ( 'order' === $object ) {
            $order = wc_get_order( $object_id );

            if ( ! $order ) {
                return false;
            }

            if ( 'shop_order_vendor' === $order->get_type() ) {
                $order_owner = (int) $order->get_meta( 'wcv_vendor_id' );

                return ( get_current_user_id() === $order_owner ) ? true : false;
            } elseif ( 'shop_order' === $order->get_type() ) {
                $vendors_ids = (array) $order->get_meta( 'wcv_vendor_ids' );

                return in_array( get_current_user_id(), $vendors_ids, true );
            }

            $vendor_products = WCV_Queries::get_products_for_order( $object_id );
                if ( empty( $vendor_products ) ) {
                    return false;
                } else {
                    return true;
                }
        } else {
            $post_owner = get_post_field( 'post_author', $object_id );
        }

        if ( ! $can_edit_live ) {
            $can_edit_live = $can_edit ? true : false;
        }

        if ( post_type_exists( $object ) ) {
            if ( absint( $post_owner ) !== absint( get_current_user_id() ) ) {
                return apply_filters( 'wcvendors_dashboard_object_owner_check', false, $object, $object_id );
            }
        }

        switch ( $object ) {
            // Product permissions.
            case 'product':
                return ( $can_edit_live && (int) WCV_Vendors::get_vendor_from_product( $object_id ) === get_current_user_id() ) ? true : false;
            // Dashboard.
            default:
                return apply_filters( 'wcvendors_dashboard_check_object_permission', true, $object, $object_id );
        }
    }

    /**
     * Check permission before the page loads
     *
     * @since    2.5.2
     */
    public function check_permission() {

        global $wp_query;
        $current_page_id = get_the_ID();

        if ( wcv_is_dashboard_page( $current_page_id ) ) {

            if ( ! is_user_logged_in() ) {

                $my_account_page = wc_get_page_id( 'myaccount' );

                if ( ! is_string( get_post_status( $my_account_page ) ) ) {
                    /* translators: %s the label for vendors. */
                    wc_add_notice( sprintf( __( 'Please contact the website administrator and instruct them that in order for the %s Dashboard to work for logged out users, they must have their My Account page configured and set properly in their WooCommerce settings.', 'wc-vendors' ), wcv_get_vendor_name() ), 'error' );
                } else {
                    wp_safe_redirect( apply_filters( 'wcv_login_redirect', get_permalink( wc_get_page_id( 'myaccount' ) ) ), 302 );
                    exit;
                }
            }

            if ( isset( $wp_query->query_vars['object'] ) ) {
                $object    = get_query_var( 'object' );
                $action    = get_query_var( 'action' );
                $object_id = get_query_var( 'object_id' ) ? get_query_var( 'object_id' ) : '';
                $user_id   = get_current_user_id();

                $lock_new_products  = ( 'yes' === get_user_meta( $user_id, '_wcv_lock_new_products_vendor', true ) ) ? true : false;
                $lock_edit_products = ( 'yes' === get_user_meta( $user_id, '_wcv_lock_edit_products_vendor', true ) ) ? true : false;

                if ( 'edit' === $action && 'product' === $object ) {

                    if ( ( $lock_new_products && $lock_edit_products ) || ( empty( $object_id ) && $lock_new_products ) || ( ! empty( $object_id ) && $lock_edit_products ) ) {

                        wp_safe_redirect( self::get_dashboard_page_url( 'product' ), 302 );
                    }
                }
            }
        }
    }

    /**
     * Can the current user view the dashboard ?
     *
     * @since    2.5.2
     */
    public function can_view_dashboard() {

        $user_id  = get_current_user_id();
        $can_view = false;

        if ( ! $user_id || 0 === $user_id ) {
            echo wp_kses_post( $this->permission_denied() );
            return $can_view;
        }

        $referer               = wp_get_referer();
        $user                  = get_userdata( $user_id );
        $user_roles            = $user->roles;
        $accept_terms          = isset( $_GET['terms'] ) ? wc_string_to_bool( sanitize_text_field( wp_unslash( $_GET['terms'] ) ) ) : false; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        $is_vendor             = in_array( 'vendor', $user_roles, true );
        $is_admin              = in_array( 'administrator', $user_roles, true ) || in_array( 'shop_manager', $user_roles, true );
        $is_pending_vendor     = in_array( 'pending_vendor', $user_roles, true );
        $redirect_to_form      = wc_string_to_bool( get_option( 'wcvendors_vendor_registration_form_redirect', 'no' ) );
        $manual                = wc_string_to_bool( get_option( 'wcvendors_vendor_approve_registration', 'no' ) );
        $application_submitted = wc_string_to_bool( get_user_meta( $user->ID, 'wcv_vendor_application_submitted', true ) );

        /**
         * Once the user has registered they have the vendor role.
         * So we need to check if the user is coming from the My Account page and has accepted the terms
         * then show Application Form if the Registration Form option is enabled
        */
        $my_account_url = get_permalink( wc_get_page_id( 'myaccount' ) );

        if ( ( $referer && strpos( $referer, $my_account_url ) !== false ) && $accept_terms && $redirect_to_form && $manual ) {
            $is_vendor = false;
        }

        if ( $is_vendor && ! $is_pending_vendor && $application_submitted ) {
            $can_view = true;
        }

        if ( $is_vendor && ! $redirect_to_form && ! $application_submitted ) {
            $can_view = true;
        }

        return apply_filters( 'wcvendors_can_view_dashboard', $can_view );
    }

    /**
     * Maybe load the application form if the user is a pending vendor
     *
     * Will load the application form if the vendor is set to be manually approved and the redirect to form option is enabled.
     *
     * @return void
     * @version 2.5.2
     * @since   2.5.2
     */
    public function maybe_load_application_form() {
        $user = get_userdata( get_current_user_id() );
        if ( ! $user ) {
            return;
        }

        $user_roles            = $user->roles;
        $redirect_to_form      = wc_string_to_bool( get_option( 'wcvendors_vendor_registration_form_redirect', 'no' ) );
        $is_pending_vendor     = in_array( 'pending_vendor', $user_roles, true );
        $is_admin              = in_array( 'administrator', $user_roles, true ) || in_array( 'shop_manager', $user_roles, true );
        $is_vendor             = in_array( 'vendor', $user_roles, true );
        $application_submitted = wc_string_to_bool( get_user_meta( $user->ID, 'wcv_vendor_application_submitted', true ) );
        $can_apply_to_vendor   = ! $is_vendor && ! $is_pending_vendor && ! $is_admin;

        if ( $is_admin ) {
            echo esc_html__( 'Admin cannot apply to be a vendor.', 'wc-vendors' );
            return;
        }

        if ( ( $application_submitted && $is_pending_vendor ) || ( $is_pending_vendor && ! $redirect_to_form ) ) {
            echo $this->show_pending_vendor_notice(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }

        if ( ( ! $application_submitted && $redirect_to_form ) || $can_apply_to_vendor ) {
            do_action( 'wcvendors_user_can_apply_vendor' );
            $this->show_application_form();
            return;
        }

        $allowed_html = array(
            'p'      => array(
                'class' => array(),
            ),
            'form'   => array(
                'method' => array(),
                'action' => array(),
            ),
            'div'    => array(
                'class' => array(),
            ),
            'input'  => array(
                'class' => array(),
                'id'    => array(),
                'type'  => array(),
                'name'  => array(),
                'value' => array(),
            ),
            'label'  => array(
                'for'   => array(),
                'class' => array(),
            ),
            'a'      => array(
                'href' => array(),
            ),
            'script' => array(
                'type' => array(),
            ),
            'br'     => array(),
        );

        echo wp_kses(
            $this->get_become_a_vendor(),
            array_merge( wcv_allowed_html_tags(), $allowed_html )
        );
    }

    /**
     * Show get application form
     *
     * @since    2.5.2
     * @version  2.5.2
     */
    public function show_application_form() {
        $signup_form_html = $this->get_become_a_vendor();
        echo apply_filters( 'wcvendors_application_form', $signup_form_html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    /**
     * Get become a vendor form
     */
    public function get_become_a_vendor() {
        ob_start();
        wc_get_template(
            'denied.php',
            array(),
            'wc-vendors/dashboard/',
            WCV_PLUGIN_DIR . 'templates/dashboard/'
        );
        return ob_get_clean();
    }

    /**
     * Show pending vendor notice
     *
     * @since 2.5.2
     * @version 2.5.2
     */
    public function show_pending_vendor_notice() {
        $default_notice = sprintf(
            /* translators: %s: vendor name */
            __( 'Your account has not yet been approved to become a %s.  When it is, you will receive an email telling you that your account is approved!', 'wc-vendors' ),
            wcv_get_vendor_name( true, false )
        );
        ob_start();
        $vendor_pending_notice = apply_filters( 'wcvendors_vendor_pending_notice', $default_notice );
        wc_get_template(
            'vendor-pending-notice.php',
            array( 'vendor_pending_notice' => $vendor_pending_notice ),
            'wc-vendors/front/',
            $this->base_dir . '/templates/front/'
        );
        return ob_get_clean();
    }



    /**
     * Add the query vars for the rewrirte rules add_query_vars function.
     *
     * @access        public
     * @since         2.5.2
     *
     * @param        array $vars query vars array.
     * @return       array $vars new query vars.
     */
    public function add_query_vars( $vars ) {

        $vars[] = 'object';
        $vars[] = 'object_id';
        $vars[] = 'action';
        $vars[] = 'template';
        $vars[] = 'custom';

        return $vars;
    }

    /**
     * Get any custom pages defined by integrations
     *
     * @since   2.5.2
     * @version 2.5.2
     * @return array $pages custom page routes and template information
     */
    public static function get_custom_pages() {

        return apply_filters( 'wcv_dashboard_custom_pages', array() );
    }

    /**
     * Dashboard rewrite rules
     *
     * @since    2.5.2
     *
     * @param  array $rules rules array.
     */
    public function rewrite_rules( $rules ) {

        $dashboard_page_id = get_option( 'wcvendors_vendor_dashboard_page_id', array() );

        // If the dashboard page hasn't been set, don't create the re-write rules.
        if ( ! empty( $dashboard_page_id ) ) {

                $_post               = get_post( $dashboard_page_id );
                $dashboard_page_slug = $_post->post_name;

                if ( $_post->post_parent ) {
                    $_parent_slug_prefix = get_post( $_post->post_parent )->post_name;
                    $dashboard_page_slug = $_parent_slug_prefix . '/' . $dashboard_page_slug;
                }

                $pages        = self::get_dashboard_pages();
                $custom_pages = self::get_custom_pages();

                foreach ( $pages as $page ) {
                    // Type Rule.
                    $type_rule = array(
                        $dashboard_page_slug . '/' . $page['slug'] . '?$'             => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $page['slug'],
                        $dashboard_page_slug . '/' . $page['slug'] . '/page/([0-9]+)' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $page['slug'] . '&paged=$matches[1]',
                    );
                    $rules     = $type_rule + $rules;

                    // Allow custom rules to be added.
                    if ( ! empty( $custom_pages ) ) {

                        foreach ( $custom_pages as $custom_page ) {

                            // check if a parent object has been defined.
                            if ( array_key_exists( 'parent', $custom_page ) ) {
                                $custom_rule = array( $dashboard_page_slug . '/' . $custom_page['parent'] . '/' . $custom_page['slug'] . '?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $custom_page['parent'] . '&custom=' . $custom_page['slug'] );
                            } else {
                                $custom_rule = array( $dashboard_page_slug . '/' . $custom_page['slug'] . '?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $custom_page['slug'] );
                            }

                            $rules = $custom_rule + $rules;

                            // Register the actions for the custom page.
                            if ( array_key_exists( 'actions', $custom_page ) ) {

                                foreach ( $custom_page['actions'] as $action => $label ) {

                                    // Actions Rule.
                                    $action_rule = array( $dashboard_page_slug . '/' . $custom_page['slug'] . '/' . $action . '?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $custom_page['slug'] . '&action=' . $action );
                                    $id_rule     = array( $dashboard_page_slug . '/' . $custom_page['slug'] . '/' . $action . '/([0-9]+)?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $custom_page['slug'] . '&action=' . $action . '&object_id=$matches[1]' );
                                    $rules       = $action_rule + $id_rule + $rules;
                                }
                            }
                        }
                    }

                    if ( is_array( $page['actions'] ) ) {

                        foreach ( $page['actions'] as $action => $label ) {
                            // Actions Rule.
                            $action_rule   = array( $dashboard_page_slug . '/' . $page['slug'] . '/' . $action . '?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $page['slug'] . '&action=' . $action );
                            $template_rule = array( $dashboard_page_slug . '/' . $page['slug'] . '/([^/]*)/' . $action . '?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $page['slug'] . '&template=$matches[1]&action=' . $action );
                            // Id parsed ?
                            $id_rule          = array( $dashboard_page_slug . '/' . $page['slug'] . '/' . $action . '/([0-9]+)?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $page['slug'] . '&action=' . $action . '&object_id=$matches[1]' );
                            $template_id_rule = array( $dashboard_page_slug . '/' . $page['slug'] . '/([^/]*)/' . $action . '/([0-9]+)?$' => 'index.php?pagename=' . $dashboard_page_slug . '&object=' . $page['slug'] . '&template=$matches[1]&action=' . $action . '&object_id=$matches[2]' );

                            $rules = $action_rule + $template_rule + $id_rule + $template_id_rule + $rules;
                        }
                    }
                }
        }
        return apply_filters( 'wcv_dashboard_rewrite_rules', $rules );
    }

    /**
     * Create the dashboard navigation from available pages.
     *
     * @since    2.5.2
     * @todo     Have this menu output better
     */
    public function create_nav() {

        $pages = self::get_dashboard_pages();

        $current_page = get_query_var( 'object' );

        $products_disabled   = wc_string_to_bool( get_option( 'wcvendors_product_management_cap', 'no' ) );
        $orders_disabled     = wc_string_to_bool( get_option( 'wcvendors_order_management_cap', 'no' ) );
        $commission_disabled = wc_string_to_bool( get_option( 'wcvendors_commission_management_cap', 'no' ) );
        $coupons_disabled    = wc_string_to_bool( get_option( 'wcvendors_shop_coupon_management_cap', 'no' ) );
        $ratings_disabled    = wc_string_to_bool( get_option( 'wcvendors_ratings_management_cap', 'no' ) );
        $settings_disabled   = wc_string_to_bool( get_option( 'wcvendors_settings_management_cap', 'no' ) );
        $viewstore_disabled  = wc_string_to_bool( get_option( 'wcvendors_view_store_cap', 'no' ) );
        $show_logout         = wc_string_to_bool( get_option( 'wcvendors_dashboard_show_logout', 'no' ) );
        $vertical_menu       = wc_string_to_bool( get_option( 'wcvendors_use_vertical_menu', 'no' ) );

        if ( $products_disabled ) {
            unset( $pages['product'] );
        }
        if ( $orders_disabled ) {
            unset( $pages['order'] );
        }
        if ( $coupons_disabled ) {
            unset( $pages['shop_coupon'] );
        }
        if ( $ratings_disabled ) {
            unset( $pages['rating'] );
        }
        if ( $commission_disabled ) {
            unset( $pages['commission'] );
        }
        if ( $settings_disabled ) {
            unset( $pages['settings'] );
        }

        // Add dashboard home to the pages array.
        $dashboard_home = apply_filters(
            'wcv_dashboard_home_url',
            array(
                'label' => __( 'Dashboard', 'wc-vendors' ),
                'slug'  => '',
            )
        );

        if ( ! $viewstore_disabled ) {
            $store_url = apply_filters(
                'wcv_dashboard_view_store_url',
                array(
                    'label' => __( 'View store', 'wc-vendors' ),
                    'id'    => 'view-store',
                    'slug'  => WCV_Vendors::get_vendor_shop_page( get_current_user_id() ),
                )
            );
            if ( wc_string_to_bool( get_option( 'wcvendors_dashboard_view_store_new_window', 'no' ) ) ) {
                $store_url['target'] = '_blank';
            }
            $pages['view_store'] = $store_url;
        }

        if ( $show_logout ) {
            $store_url = apply_filters(
                'wcv_dashboard_show_logout',
                array(
                    'label' => __( 'Logout', 'wc-vendors' ),
                    'id'    => 'logout',
                    'slug'  => wc_logout_url(),
                )
            );

            $pages['logout'] = $store_url;
        }

        $pages          = array_merge( array( 'dashboard_home' => $dashboard_home ), $pages );
        $pages          = apply_filters( 'wcv_dashboard_pages_nav', $pages );
        $nav_class      = apply_filters( 'wcv_dashboard_nav_class', '' );
        $menu_dir_class = ( $vertical_menu ) ? 'vertical' : 'horizontal';
        $menu_dir_size  = ( $vertical_menu ) ? 'all-20 small-100 medium-100' : 'all-100';

        // Move this into a template.
        $menu_wrapper_start = apply_filters( 'wcv_dashboard_nav_wrapper_start', '<div class="wcv-cols-group wcv-horizontal-gutters"><div class="' . $menu_dir_size . '"><nav class="wcv-navigation ' . $nav_class . ' "><ul class="menu ' . $menu_dir_class . '  black">' );

        echo wp_kses_post( $menu_wrapper_start );

        foreach ( $pages as $page ) {

            if ( filter_var( $page['slug'], FILTER_VALIDATE_URL ) === false ) {
                $page_url = $this->get_dashboard_page_url( $page['slug'] );
            } else {
                $page_url = $page['slug'];
            }

            $class      = ( $current_page === $page['slug'] ) ? 'active' : '';
            $id         = isset( $page['id'] ) ? $page['id'] : '';
            $page_label = $page['label'];
            $target     = isset( $page['target'] ) ? $page['target'] : false;

            wc_get_template(
                'nav.php',
                array(
                    'page'       => $page,
                    'page_url'   => $page_url,
                    'target'     => $target,
                    'page_label' => $page_label,
                    'class'      => $class,
                    'id'         => $id,
                ),
                'wc-vendors/dashboard/',
                $this->base_dir . 'templates/dashboard/'
            );

        }
        echo '</ul>';

        echo '</div>';

        if ( ! $vertical_menu ) {
            echo '</div>';
        }

        wcv_deprecated_action( 'wcv_pro_after_dashboard_nav_container', '2.5.2', 'wcvendors_after_dashboard_nav_container' );

        if ( $vertical_menu ) {
            echo '<div class="all-80 medium-100 small-100 wcv-main-content">';
        }
    }

    /**
     * Check if a page is disabled and return if it is
     *
     * @since    2.5.2
     * @version  2.5.2
     */
    public function page_disabled() {

        $current_page = get_query_var( 'object' );
        $disabled     = false;

        switch ( $current_page ) {
            case 'product':
                $disabled = wc_string_to_bool( get_option( 'wcvendors_product_management_cap', 'no' ) );
                break;
            case 'order':
                $disabled = wc_string_to_bool( get_option( 'wcvendors_order_management_cap', 'no' ) );
                break;
            case 'settings':
                $disabled = wc_string_to_bool( get_option( 'wcvendors_settings_management_cap', 'no' ) );
                break;
        }

        return ! apply_filters( 'wcvendors_page_disabled', $disabled, $current_page );
    }

    /**
     * Shortcode for dashboard navigation
     *
     * @since    2.5.2
     */
    public function load_dashboard_nav() {

        if ( ! is_user_logged_in() ) {

            return false;

        } elseif ( WCV_Vendors::is_vendor( get_current_user_id() ) ) {

            ob_start();
            echo '<div class="wcvendors-pro-dashboard-wrapper"><div class="wcv-grid">';
            $this->create_nav();
            echo '</div></div>';

            return ob_get_clean();
        }
    }

    /**
     * Check if the current page is a dashboard page
     *
     * @since      2.5.2
     * @access     public
     * @deprecated 2.5.2
     * @param int $page_id the page id to check.
     * @return bool returns if the page id passed is a dashboard page.
     */
    public static function is_dashboard_page( $page_id ) {
        return wcv_is_dashboard_page( $page_id );
    }

    /**
     * Check if the the vendors access has been disabled
     *
     * @since  2.5.2
     * @access public
     */
    public function lock_new_products_notice() {

        $lock_new_products         = ( 'yes' === get_user_meta( get_current_user_id(), '_wcv_lock_new_products_vendor', true ) ) ? true : false;
        $lock_new_products_notice  = get_user_meta( get_current_user_id(), '_wcv_lock_new_products_vendor_msg', true );
        $lock_edit_products        = ( 'yes' === get_user_meta( get_current_user_id(), '_wcv_lock_edit_products_vendor', true ) ) ? true : false;
        $lock_edit_products_notice = get_user_meta( get_current_user_id(), '_wcv_lock_edit_products_vendor_msg', true );
        $notice                    = '';

        if ( $lock_new_products ) {
            $notice .= $lock_new_products_notice;
        }
        if ( $lock_edit_products ) {
            $notice .= ' ' . $lock_edit_products_notice;
        }

        if ( $lock_new_products || $lock_edit_products ) {

            wc_get_template(
                'dashboard-notice.php',
                array(
                    'vendor_dashboard_notice' => $notice,
                    'notice_type'             => 'error',
                ),
                'wc-vendors/dashboard/',
                $this->base_dir . '/templates/dashboard/'
            );
        }
    }

    /**
     * Update disk and file usage after deleting or adding media file
     *
     * @since 2.5.2
     * @param int $post_id the post id of the media file.
     */
    public function update_disk_usage_status( $post_id ) {
        $author = get_post_field( 'post_author', $post_id );

        if ( ! WCV_Vendors::is_vendor( $author ) ) {
            return;
        }

        delete_transient( 'wcv_user_media_' . $author );
        delete_transient( 'wcv_user_disk_usage_' . $author );
    }

    /**
     * Show permission deny message for guest
     *
     * @since 2.5.2
     * @version 2.5.2
     */
    public function permission_denied() {
        $default_message         = sprintf(
            '%s<br/><br/>%s',
            __( 'It looks like you\'re trying to access the Vendor Dashboard. This feature is available exclusively to registered vendors.', 'wc-vendors' ),
            __( 'Join our marketplace and start selling your products to a wide audience. Click the link below to register and become a vendor today!', 'wc-vendors' )
        );
        $default_button_text     = __( 'Register as a Vendor', 'wc-vendors' );
        $denied_message          = get_option( 'wcvendors_permission_denied_message', $default_message );
        $register_button_text    = get_option( 'wcvendors_permission_denied_message_button_text', $default_button_text );
        $woo_my_account_page_url = get_permalink( wc_get_page_id( 'myaccount' ) );
        ob_start();
            wc_get_template(
                'permission-denied.php',
                array(
                    'denied_message' => $denied_message,
                    'button_text'    => $register_button_text,
                    'return_url'     => $woo_my_account_page_url,
                ),
                'wc-vendors/dashboard/',
                $this->base_dir . '/templates/dashboard/'
            );
        return apply_filters( 'wcvendors_vendor_dashboard_permission_denied', ob_get_clean() );
    }

    /**
     * Add vendor dashboard link to my account menu
     *
     * @since 2.5.2
     * @version 2.5.2
     *
     * @param array $items the menu items.
     * @return array $items the menu items.
     */
    public function add_vendor_dashboard_item( $items ) {
        $vendor_dashboard_page_id = get_option( 'wcvendors_vendor_dashboard_page_id' );
        if ( $vendor_dashboard_page_id ) {
            $items['vendor-dashboard'] = __( 'Vendor Dashboard', 'wc-vendors' );
        }
        return $items;
    }

    /**
     * Add vendor dashboard link to my account menu
     *
     * @since 2.5.2
     * @version 2.5.2
     *
     * @param string $url the menu item url.
     * @param string $endpoint the menu item endpoint.
     */
    public function add_vendor_dashboard_endpoint( $url, $endpoint ) {
        if ( 'vendor-dashboard' === $endpoint ) {
            $vendor_dashboard_page_id = get_option( 'wcvendors_vendor_dashboard_page_id' );
            if ( $vendor_dashboard_page_id ) {
                $url = get_permalink( $vendor_dashboard_page_id );
            }
        }
        return $url;
    }

    /**
     * Add dashboard icon with the menu item
     */
    public function add_vendor_dashboard_icon() {
        echo '<style>.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--vendor-dashboard a::before{ content: "\f3fd"; }</style>';
    }

    /**
     * Redirect old slug to new slug
     */
    public function redirect_old_slug() {
        $slugs = array(
            'vendor_dashboard/orders'         => 'vendor_dashboard/order',
            '/vendor_dashboard/shop-settings' => 'vendor_dashboard/settings',
        );

        foreach ( $slugs as $old_slug => $new_slug ) {
            if ( strpos( $_SERVER['REQUEST_URI'], $old_slug ) !== false ) {
                wp_safe_redirect( home_url( $new_slug ), 301 );
                exit;
            }
        }
    }

    /**
     * Load theme support for the dashboard
     *
     * @since 2.5.2
     * @version 2.5.2
     */
    public function load_theme_support() {
        $theme    = wp_get_theme();
        $template = $theme->get_template();
        switch ( $template ) {
            case 'Divi':
                include_once WCV_PLUGIN_DIR . 'classes/front/theme-support/class-divi.php';
                break;
        }
    }
}
