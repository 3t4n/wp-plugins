<?php

/**
 * Plugin Name: Gyta BuyBack (Premium)
 * Plugin URI: https://gytabuyback.com/
 * Description: Complete Product Trade-In and BuyBack System. Upgrades WooCommerce into a trade-in system so you can run a buyback site purchasing phones, electronics, or anything else.
 * Author: Gaucho Plugins
 * Version: 1.4.1
 * Requires PHP: 8.0
 * Author URI: https://gauchoplugins.com
 * WC requires at least: 4.8
 * WC tested up to: 9.4.3
 * WC-HPOS: true
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}
if ( function_exists( 'wcpti_fs' ) ) {
    wcpti_fs()->set_basename( false, __FILE__ );
} else {
    // DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    if ( !function_exists( 'wcpti_fs' ) ) {
        // Create a helper function for easy SDK access.
        function wcpti_fs() {
            global $wcpti_fs;
            if ( !isset( $wcpti_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $wcpti_fs = fs_dynamic_init( array(
                    'id'              => '7554',
                    'slug'            => 'gyta-buyback',
                    'type'            => 'plugin',
                    'public_key'      => 'pk_726b5555664b95276a1364d94fad4',
                    'is_premium'      => false,
                    'has_addons'      => false,
                    'has_paid_plans'  => true,
                    'trial'           => array(
                        'days'               => 30,
                        'is_require_payment' => true,
                    ),
                    'has_affiliation' => 'selected',
                    'menu'            => array(
                        'slug'        => 'wcpti-menu',
                        'support'     => false,
                        'affiliation' => false,
                    ),
                    'is_live'         => true,
                ) );
            }
            return $wcpti_fs;
        }

        // Init Freemius.
        wcpti_fs();
        // Signal that SDK was initiated.
        do_action( 'wcpti_fs_loaded' );
    }
    add_action( 'before_woocommerce_init', function () {
        if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
        }
    } );
    require_once __DIR__ . '/includes/privacy.php';
    add_action( 'admin_init', 'wcpti_plugin_add_privacy_policy_content' );
    /* Start: Top-Level menu */
    add_action( 'admin_menu', 'wcpti_admin_menu_setup' );
    function wcpti_admin_menu_setup() {
        add_menu_page(
            'Gyta BuyBack',
            // page_title
            'Gyta',
            // menu_title
            'manage_options',
            // capability
            'wcpti-menu',
            // menu_slug
            'wcpti_menu_render'
        );
    }

    // submenu page that defines 'Dashboard' as the proper first sub-menu item of the parent menu
    /*
    add_submenu_page('wcpti-menu',
    				'WCPTI Dashboard',
    				'Dashboard',
    				'manage_options',
    				'wcpti-menu',
    				'wcpti_menu_render' );
    */
    function wcpti_menu_render() {
        if ( stripos( get_admin_page_title(), 'Gyta BuyBack' ) !== false ) {
            require plugin_dir_path( __FILE__ ) . 'admin/dashboard.php';
        }
    }

    /* End: Top-Level menu */
    $customer_order_approval_required = get_option( 'wcpti_customer_order_approval_required' );
    // https://jilt.com/blog/woocommerce-custom-order-status-2/
    if ( $customer_order_approval_required == 'yes' ) {
        // Register new status
        function wcpti_register_customer_approval_statuses() {
            register_post_status( 'wc-wait-cust-app', array(
                'label'                     => 'Waiting for customer approval',
                'public'                    => true,
                'exclude_from_search'       => false,
                'show_in_admin_all_list'    => true,
                'show_in_admin_status_list' => true,
                'label_count'               => _n_noop( 'Waiting for customer approval (%s)', 'Waiting for customer approval (%s)' ),
            ) );
            register_post_status( 'wc-cust-approved', array(
                'label'                     => 'Customer Approved',
                'public'                    => true,
                'exclude_from_search'       => false,
                'show_in_admin_all_list'    => true,
                'show_in_admin_status_list' => true,
                'label_count'               => _n_noop( 'Customer approved (%s)', 'Customer approved (%s)' ),
            ) );
            register_post_status( 'wc-cust-disapproved', array(
                'label'                     => 'Customer disapproved',
                'public'                    => true,
                'exclude_from_search'       => false,
                'show_in_admin_all_list'    => true,
                'show_in_admin_status_list' => true,
                'label_count'               => _n_noop( 'Customer disapproved (%s)', 'Customer disapproved (%s)' ),
            ) );
        }

        add_action( 'init', 'wcpti_register_customer_approval_statuses' );
    }
    function wcpti_isWooCommerceActivated() {
        if ( is_multisite() ) {
            // this plugin is network activated - Woo must be network activated
            if ( is_plugin_active_for_network( plugin_basename( __FILE__ ) ) ) {
                return is_plugin_active_for_network( 'woocommerce/woocommerce.php' );
            } else {
                // this plugin is locally activated - Woo can be network or locally activated
                return is_plugin_active( 'woocommerce/woocommerce.php' );
            }
        } else {
            return is_plugin_active( 'woocommerce/woocommerce.php' );
        }
    }

    function wcpti_show_upgrade_now_notice(  $params = array()  ) {
        //echo '<section><h1>' . __('Awesome Premium Features', 'woocommerce-product-trade-in') . '</h1>';
        echo '<a href="' . wcpti_fs()->get_upgrade_url() . '">' . __( 'Upgrade Now!', 'gyta' ) . '</a>';
        // echo '</section>';
    }

    // https://docs.woocommerce.com/document/create-a-plugin/
    /**
     * Check if WooCommerce is active
     **/
    // if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    if ( wcpti_isWooCommerceActivated() ) {
        require_once __DIR__ . '/includes/payment_methods.php';
        require_once __DIR__ . '/includes/label_changes.php';
        require_once __DIR__ . '/includes/settings.php';
        require_once __DIR__ . '/includes/admin_order_modifications.php';
        require_once __DIR__ . '/includes/easypost.php';
        require_once __DIR__ . '/includes/cart_to_order_conversion.php';
        // https://jilt.com/blog/woocommerce-custom-order-status-2/
        // Add to list of WC Order statuses
        /*
        add_action( 'save_post', 'wcpti_save_coupon_meta_amount', 100, 3 );
        function wcpti_save_coupon_meta_amount($post_ID, $post, $update) {
        	//die('post_ID = '.$post_ID);
        }
        
        add_action('woocommerce_coupon_object_updated_props', 'wcpti_update_coupon_props', 100, 2);
        
        function wcpti_update_coupon_props($coupon, $updated_props) {
        	//die('updated_props!');
        	// this happens on update, not on display
        }
        */
        if ( $customer_order_approval_required == 'yes' ) {
            add_action( 'wp', 'wcpti_customer_approval_controller' );
            function wcpti_customer_approval_controller() {
                $command = '';
                if ( isset( $_REQUEST['command'] ) ) {
                    $command = @$_REQUEST['command'];
                }
                if ( $command == 'customer order approval' ) {
                    $key = @$_REQUEST['key'];
                    if ( $key != '' ) {
                        $order_id = wc_get_order_id_by_order_key( $key );
                        if ( $order_id > 0 ) {
                            $orderObj = new WC_Order($order_id);
                            //$allmails = WC()->mailer()->emails;
                            $admin_email = get_option( 'admin_email' );
                            if ( $_REQUEST['approval'] == 'true' ) {
                                $orderObj->update_status( 'wc-cust-approved' );
                                wp_mail( $admin_email, "Order " . $order_id . ' Approved by Customer', "Congrats!  Order " . $order_id . " has been APPROVED and should now be paid and closed out.\n\nOrder link: " . $orderObj->get_edit_order_url() . '\\n\\n--\\nGyta BuyBack Plugin' );
                            } else {
                                if ( $_REQUEST['approval'] == 'false' ) {
                                    $orderObj->update_status( 'wc-cust-disapproved' );
                                    // wc_email_failed_order
                                    //$email = $allmails['WC_Email_Failed_Order'];
                                    //$email->trigger( $order_id );
                                    wp_mail( $admin_email, "Order " . $order_id . ' Disapproved by Customer', "Sorry!  Order " . $order_id . " has been DISAPPROVED and should now be sent back to the customer.\n\nOrder link: " . $orderObj->get_edit_order_url() . '\\n\\n--\\nGyta BuyBack Plugin' );
                                }
                            }
                        }
                    }
                }
            }

            function wcpti_add_customer_approval_statuses(  $order_statuses  ) {
                $new_order_statuses = array();
                // add new order status after processing
                foreach ( $order_statuses as $key => $status ) {
                    $new_order_statuses[$key] = $status;
                    if ( 'wc-processing' === $key ) {
                        $new_order_statuses['wc-wait-cust-app'] = 'Waiting for customer approval';
                        $new_order_statuses['wc-cust-approved'] = 'Customer approved';
                        $new_order_statuses['wc-cust-disapproved'] = 'Customer disapproved';
                    }
                }
                return $new_order_statuses;
            }

            add_filter( 'wc_order_statuses', 'wcpti_add_customer_approval_statuses' );
        }
        // https://stackoverflow.com/questions/46102428/get-orders-shipping-items-details-in-woocommerce-3
        function isLocalPickup(  $orderObj  ) {
            foreach ( $orderObj->get_items( 'shipping' ) as $item_id => $item ) {
                if ( $item->get_method_id() == 'local_pickup' ) {
                    return true;
                }
            }
            return false;
        }

        function getShippingMethodLabel(  $orderObj  ) {
            foreach ( $orderObj->get_items( 'shipping' ) as $item_id => $item ) {
                if ( $item->get_method_id() == 'local_pickup' ) {
                    // return 'name: '.$item->get_name().', type: '.$item->get_type().', get_method_title: '.$item->get_method_title();
                    return $item->get_name();
                }
            }
            return false;
        }

        /**
         * Start: Override Templates as needed
         **/
        // https://pluginrepublic.com/override-woocommerce-template-plugin/
        function wcpti_template_override(  $template, $template_name, $template_path  ) {
            $basename = basename( $template );
            if ( $basename == 'customer-on-hold-order.php' ) {
                $template = dirname( __FILE__ ) . '/templates/emails/' . 'customer-on-hold-order.php';
            }
            if ( $basename == 'customer-completed-order.php' ) {
                $template = dirname( __FILE__ ) . '/templates/emails/' . 'customer-completed-order.php';
            }
            if ( $basename == 'email-order-details.php' ) {
                $template = dirname( __FILE__ ) . '/templates/emails/' . 'email-order-details.php';
            }
            return $template;
        }

        add_filter(
            'woocommerce_locate_template',
            'wcpti_template_override',
            10,
            3
        );
    }
}