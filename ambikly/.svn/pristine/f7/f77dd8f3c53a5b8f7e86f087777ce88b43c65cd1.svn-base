<?php

namespace Ambikly;

final class Installer
{

    private static $update_callbacks = array(
//        '2.1.0' => array(
//            'ambikly_update_2100',
//        )
    );

    public static function install()
    {
        if (!is_blog_installed()) {
            return;
        }

        $ambikly_version = get_option('ambikly_plugin_version');

        if (empty($ambikly_version)) {
            self::create_tables();
            self::create_options();
            self::create_roles();
            if (apply_filters('ambikly_enable_setup_wizard', true)) {
                set_transient('_ambikly_activation_redirect', 1, 30);
            }
        }
        // Save install date
        if (!get_option('ambikly_install_date')) {
            update_option('ambikly_install_date', current_time('timestamp'));
        }

        self::environment_setup();
        self::version_wise_update();
        self::update_version();

        do_action('ambikly_flush_rewrite_rules');

        flush_rewrite_rules();
    }

    public static function environment_setup()
    {
        // Ambikly_Post_types::register_post_types();
        // Ambikly_Post_types::register_taxonomies();
    }

    private static function create_options()
    {
        $pages = array(
            [
                'post_type' => 'page',
                'post_content' => self::shortcode('[ambikly_cart]'),
                'post_title' => esc_html__('Ambikly Cart', 'ambikly'),
                'post_status' => 'publish'
            ],
            [
                'post_type' => 'page',
                'post_content' => self::shortcode('[ambikly_checkout]'),
                'post_title' => esc_html__('Ambikly Checkout', 'ambikly'),
                'post_status' => 'publish'
            ],
            [
                'post_type' => 'page',
                'post_content' => self::shortcode('[ambikly_account]'),
                'post_title' => esc_html__('Ambikly Account', 'ambikly'),
                'post_status' => 'publish'
            ],
            [
                'post_type' => 'page',
                'post_content' => '',
                'post_title' => esc_html__('Ambikly Shop', 'ambikly'),
                'post_status' => 'publish'
            ],
            [
                'post_type' => 'page',
                'post_content' => esc_html__('Thank you for your purchase! Your order has been successfully placed, and we appreciate your trust in us.', 'ambikly'),
                'post_title' => esc_html__('Ambikly Thank You', 'ambikly'),
                'post_status' => 'publish'
            ]
        );

        foreach ($pages as $page) {
            $page_id = wp_insert_post($page);

            if ($page['post_title'] == 'Ambikly Checkout') {
                ambikly_update_option('checkout_page', $page_id);
            }
            if ($page['post_title'] == 'Ambikly Cart') {
                ambikly_update_option('cart_page', $page_id);
            }
            if ($page['post_title'] == 'Ambikly Account') {
                ambikly_update_option('account_page', $page_id);
            }

            if ($page['post_title'] == 'Ambikly Thank You') {
                ambikly_update_option('thank_you_page', $page_id);
            }
            if ($page['post_title'] == 'Ambikly Shop') {

                ambikly_update_option('shop_page', $page_id);
            }
        }
        $options = array(
            'currency' => 'USD',
            'active_payment_gateways' => array('cash_on_delivery')
        );

        foreach ($options as $option_key => $option_value) {
            ambikly_update_option($option_key, $option_value);
        }
    }

    private static function shortcode($shortcode)
    {
        ob_start();
        ?>
        <!-- wp:columns {"align":"wide"} -->
        <div class="wp-block-columns alignwide"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:shortcode -->
                <?php echo esc_html($shortcode); ?>
                <!-- /wp:shortcode --></div>
            <!-- /wp:column --></div>
        <!-- /wp:columns -->
        <?php
        return ob_get_clean();
    }

    private static function create_roles()
    {
        // $role = new Ambikly_User_Role();
        // $role->create_roles();
    }

    private static function version_wise_update()
    {
        $ambikly_version = get_option('ambikly_plugin_version', null);

        if ($ambikly_version == '' || empty($ambikly_version)) {
            return;
        }
        if (version_compare($ambikly_version, AMBIKLY_VERSION, '<')) {
            foreach (self::$update_callbacks as $version => $callbacks) {
                if (version_compare($ambikly_version, $version, '<')) {
                    self::exe_update_callback($callbacks);
                }
            }
        }
    }

    private static function exe_update_callback($callbacks)
    {
        include_once AMBIKLY_ABSPATH . 'src/Helpers/update.php';

        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }

    /**
     * Update Ambikly version to current.
     */
    private static function update_version()
    {
        delete_option('ambikly_plugin_version');
        delete_option('ambikly_plugin_db_version');
        add_option('ambikly_plugin_version', AMBIKLY_VERSION);
        add_option('ambikly_plugin_db_version', AMBIKLY_VERSION);
    }

    public static function init()
    {
        add_action('init', array(__CLASS__, 'check_version'), 5);
    }

    public static function check_version()
    {
        if (!defined('IFRAME_REQUEST') && version_compare(get_option('ambikly_plugin_version'), AMBIKLY_VERSION, '<')) {
            self::install();
            do_action('ambikly_updated');
        }
    }

    private static function create_tables()
    {
        global $wpdb;

        $wpdb->hide_errors();

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $all_schemes = self::get_schema();

        foreach ($all_schemes as $scheme) {
            dbDelta($scheme);
        }
    }

    private static function get_schema()
    {
        $products = ambikly()->getClass('Database.Tables.Products');
        $categories = ambikly()->getClass('Database.Tables.Categories');
        $customers = ambikly()->getClass('Database.Tables.Customers');
        $product_categories = ambikly()->getClass('Database.Tables.ProductCategories');
        $orders = ambikly()->getClass('Database.Tables.Orders');
        $order_items = ambikly()->getClass('Database.Tables.OrderItems');
        $order_addresses = ambikly()->getClass('Database.Tables.OrderAddresses');
        $payments = ambikly()->getClass('Database.Tables.Payments');
        $reviews = ambikly()->getClass('Database.Tables.Reviews');

        return [
            $products->getCreateTableQuery(),
            $categories->getCreateTableQuery(),
            $customers->getCreateTableQuery(),
            $product_categories->getCreateTableQuery(),
            $orders->getCreateTableQuery(),
            $order_items->getCreateTableQuery(),
            $order_addresses->getCreateTableQuery(),
            $payments->getCreateTableQuery(),
            $reviews->getCreateTableQuery(),
        ];
    }

    public static function get_tables()
    {
        return [];
    }

    public static function verify_base_tables($execute = false)
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        if ($execute) {
            self::create_tables();
        }
    }

    public static function drop_tables()
    {
        global $wpdb;

        $tables = self::get_tables();

        foreach ($tables as $table) {
            $wpdb->query("DROP TABLE IF EXISTS {$table}"); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
        }
    }
}