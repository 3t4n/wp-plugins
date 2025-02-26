<?php
/**
 * Assets Class
 *
 * @category Assets
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @since    1.0.0
 */

declare( strict_types=1 );

namespace Optemiz\AWO;

defined('ABSPATH') || exit;

if (! class_exists('Assets') ) {
    /**
     * Assets class
     *
     * @class Assets The class that manages assets
     *
     * @category Assets
     * @package  Optemiz\AWO
     * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
     * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
     */
    class Assets
    {

        /**
         * Settings
         *
         * @var array|null
         */
        public $settings = null;

        /**
         * Class constructor
         *
         * Sets up all the appropriate hooks and functions
         * within our plugin.
         *
         * @return void
         */
        public function __construct()
        {
            $this->hooks();
            $this->init();
            do_action('hawo_assets_loaded', $this);
        }

        /**
         * Instance.
         * 
         * The instance will be created if it does not exist yet.
         *
         * @return self The main instance.
         * @since  1.0.0
         */
        public static function instance(): self
        {
            static $instance = null;
            if (is_null($instance) ) {
                $instance = new self();
            }

            return $instance;
        }

        /**
         * Initialize
         * 
         * @return void
         */
        public function init(): void
        {
            // $this->settings = hawo_get_settings_values();
        }

        /**
         * All the executed hooks
         *
         * @return void
         */
        protected function hooks(): void
        {

            if (is_admin() ) {
                add_action('admin_enqueue_scripts', array( $this, 'admin_scripts' ));
            } else {
                add_action('wp_enqueue_scripts', array( $this, 'register_public_styles' ));
                add_action('wp_enqueue_scripts', array( $this, 'register_public_scripts' ), 999);
            }
        }

        /**
         * Admin styles and scripts
         *
         * @param string $handle file handle.
         *
         * @return void
         */
        public function admin_scripts( $handle )
        {
            global $post;

            // Backend Scripts.
            $backend_script_src_url    = hawo_autocomplete_orders()->build_url() . '/backend.js';
            $backend_script_asset_file = hawo_autocomplete_orders()->build_path() . '/backend.asset.php';

            if (! file_exists($backend_script_asset_file) ) {
                return;
            }

            $backend_script_asset = include_once $backend_script_asset_file;

            $hawo_admin_pages = [
                'hawo-rules',
            ];

            $enqueue_assets = false;

            //check if pages is valid.
            if (isset($_GET['page']) && in_array($_GET['page'], $hawo_admin_pages) ) {
                $enqueue_assets = true;
            }

            //check if post types is valid.
            if (is_object($post) && property_exists($post, 'post_type') && in_array($post->post_type, ['hawo-rules'])) {
                $enqueue_assets = true;
            }

            if( $enqueue_assets ) {
                wp_enqueue_style( 
                    'hawo_backend_css', 
                    hawo_autocomplete_orders()->build_url() . '/style-backend.css', 
                    array(), 
                    $backend_script_asset['version']
                );

                wp_enqueue_script(
                    'hawo_backend_js',
                    $backend_script_src_url,
                    $backend_script_asset['dependencies'],
                    $backend_script_asset['version']
                );

                wp_localize_script(
                    'hawo_backend_js',
                    'hawo_params',
                    array(
                        'nonce'         => wp_create_nonce('hawo-admin-nonce'),
                        'ajax_url'      => admin_url('admin-ajax.php'),
                        'home_url'      => home_url(),
                        'admin_url'     => admin_url(),
                        'stock_alert_url' => admin_url('admin.php?page=advanced-autocomplete-orders-for-woocommerce'),
                        'plugin_url'     => hawo_autocomplete_orders()->plugin_url(),
                        'screen_data'     => get_user_option('hawo_screen_data'),
                        'settings'         => $this->settings,
                        'current_user_id' => get_current_user_id(),
                    )
                );
            }
        }
        
        /**
         * Register styles.
         *
         * @return void
         */
        public function register_public_styles()
        {

            if (is_product() || is_account_page() || is_shop() ) {
                // Register form style.
                wp_register_style('hawo_styles', hawo_autocomplete_orders()->plugin_url() . '/build/style-frontend.css', array(), time());
                wp_enqueue_style('hawo_styles');
            }
        }

        /**
         * Register scripts.
         *
         * @return void
         */
        public function register_public_scripts()
        {

            // Editor Scripts.
            $frontend_script_src_url    = hawo_autocomplete_orders()->build_url() . '/frontend.js';
            $frontend_script_asset_file = hawo_autocomplete_orders()->build_path() . '/frontend.asset.php';

            if (! file_exists($frontend_script_asset_file) ) {
                return;
            }

            $frontend_script_asset = include_once $frontend_script_asset_file;

            //register frontend script.
            wp_register_script( 
                'hawo_frontend_script', 
                $frontend_script_src_url,
                $frontend_script_asset['dependencies'],
                $frontend_script_asset['version'],
                true 
            );

            wp_localize_script(
                'hawo_frontend_script',
                'hawo_script',
                array(
                'ajaxurl'         => admin_url('admin-ajax.php'),
                'nonce'           => wp_create_nonce('hawo_frontend_nonce'),
                'settings'         => $this->settings,
                'form_messages' => array(
                    'email_invalid'  => __('Invalid email', 'advanced-autocomplete-orders-for-woocommerce'),
                    'mobile_invalid' => __('Invalid mobile number', 'advanced-autocomplete-orders-for-woocommerce'),
                    'empty'          => __("Field can't be empty", 'advanced-autocomplete-orders-for-woocommerce'),
                ),
                )
            );

            if (is_shop() || is_product() || is_account_page() ) {
                wp_enqueue_style('dashicons');
                wp_enqueue_script('hawo_frontend_script');
            }
        }
    }
}
