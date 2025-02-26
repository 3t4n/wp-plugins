<?php
/**
 * AutoComplete_Orders Class
 *
 * @category Base
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * 
 * @since    1.0.0
 */
namespace Optemiz\AWO;

defined( 'ABSPATH' ) || exit;


if ( ! class_exists( 'AutoComplete_Orders', false ) ) :
	/**
	 * Base class
	 *
	 * @class AutoComplete_Orders The class that manages all plugin files.
	 *
	 * @category Base
	 * @package  Optemiz\AWO
	 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
	 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
	 */
    final class AutoComplete_Orders {

        /**
         * AutoComplete_Orders version.
         *
         * @var string
         */
        public $version = '1.0.0';

        /**
         * Cloning is forbidden.
         *
         * @since 1.0.0
         */
        public function __clone() {
            wc_doing_it_wrong(__FUNCTION__, esc_html__('Cloning is forbidden.', 'advanced-autocomplete-orders-for-woocommerce'), '1.0.0');
        }

        /**
         * Unserializing instances of this class is forbidden.
         *
         * @since 2.1
         */
        public function __wakeup() {
            wc_doing_it_wrong(__FUNCTION__, esc_html__('Unserializing instances of this class is forbidden.', 'advanced-autocomplete-orders-for-woocommerce'), '1.0.0');
        }

        /**
         * Class constructor
         *
         * Sets up all the appropriate hooks and functions
         * within our plugin.
         *
         * @return void
         */
        public function __construct() {
            try {
                $this->includes();
                $this->init();
            } catch ( \Exception $e ) {
                wp_trigger_error( __METHOD__, $e->getMessage() );
            }
    
            do_action( 'hawo_loaded', $this );
        }

        /**
         * Instance.
         * 
         * The instance will be created if it does not exist yet.
         *
         * @return self The main instance.
         * @since 1.0.0
         */
        public static function instance(): self {
            static $instance = null;
            if ( is_null( $instance ) ) {
                $instance = new self();
            }

            return $instance;
        }


        /**
         * Define WC Constants.
         */
        private function define_constants() {
            $this->define('HAWO_ABSPATH', dirname(HAWO_FILE) );
            $this->define('HAWO_BASENAME', plugin_basename(HAWO_FILE));
            $this->define('HAWO_VERSION', $this->version);
        }

        /**
         * Plugin Version.
         * 
         * @return string
         * @since 1.0.0
         */
        public function version(): string {
            return esc_attr( HAWO_VERSION );
        }

        /**
         * Define constant if not already set.
         *
         * @param string $name Constant name.
         * @param string|bool $value Constant value.
         */
        private function define( $name, $value ) {
            if ( ! defined($name) ) {
                define($name, $value);
            }
        }

        /**
         * Includes.
         *
         * @return bool
         * @throws Exception When class files loading fails.
         * @since 1.0.0
         */
        public function includes(): bool {
            if ( file_exists( $this->vendor_path() . '/autoload_packages.php' ) ) {
                require_once $this->vendor_path() . '/autoload_packages.php';
                require_once __DIR__ . '/functions.php';

                return true;
            }

            throw new \Exception( '"vendor/autoload_packages.php" file missing. Please run `composer install`' );
        }

        /**
         * Hooks.
         * 
         * @return void
         */
        public function hook() {
            add_action( 'admin_notices', array( $this, 'admin_notices' ) );
        }

        /**
         * Initialize
         *
         * @return void
         */
        public function init(): void {
            new Assets();

            if ( ! is_admin() ) {
                new Frontend();
            } else {
                new Metaboxes();
            }
        }

        /**
         * Admin Notices.
         * 
         * @since 1.0.0
         */
        public function admin_notices() {
            $this->hawo_woocommerce_dependency_check();
            
        }

        /**
         * Woocommerce dependency check.
         * 
         * @since 1.0.0
         */
        public function hawo_woocommerce_dependency_check() {
            $plugin_url = self_admin_url( 'plugin-install.php?s=woocommerce&tab=search&type=term' );
            $plugin_url  = sprintf( '<a href="%s">%s</a>', esc_url($plugin_url), esc_html__( 'WooCommerce', 'advanced-autocomplete-orders-for-woocommerce' ) );
            $plugin_name = sprintf( '<code>%s</code>', esc_html__( 'XPlainer', 'advanced-autocomplete-orders-for-woocommerce' ) );
            $wc_name     = sprintf( '<code>%s</code>', esc_html__( 'WooCommerce', 'advanced-autocomplete-orders-for-woocommerce' ) );

            if ( ! function_exists('WC') ) {
                /** @noinspection HtmlUnknownTarget */
                $message = sprintf(
                    /* translators: 1: this plugin name, 2: required plugin name, 3: required plugin name and installation url */
                    esc_html__( '%1$s requires %2$s to be installed and active. You can installed/activate %3$s here.', 'advanced-autocomplete-orders-for-woocommerce' ),
                    $plugin_name,
                    $wc_name,
                    $plugin_url
                );
                printf( '<div class="error"><p><strong>%1$s</strong></p></div>', $message ); // phpcs:ignore
            }
        }

        /**
         * Get the template path.
         *
         * @return string
         */
        public function template_path() {
            return apply_filters('hawo_template_path', 'advanced-autocomplete-orders-for-woocommerce/');
        }

        /**
         * Get Ajax URL.
         *
         * @return string
         */
        public function ajax_url() {
            return admin_url('admin-ajax.php', 'relative');
        }

        /**
         * Plugin Absolute File.
         *
         * @return string
         * @since 1.0.0
         */
        public function get_plugin_file(): string {
            return constant( 'HAWO_FILE' );
        }

        /**
         * Get Plugin basename directory name
         * 
         * @return string
         */
        public function basename(): string {
            return basename( dirname( HAWO_FILE ) );
        }

        /**
         * Get Plugin basename
         * 
         * @return string
         */
        public function plugin_basename(): string {
            return plugin_basename( HAWO_FILE );
        }

        /**
         * Get Plugin directory name
         * 
         * @return string
         */
        public function plugin_dirname(): string {
            return dirname( plugin_basename( HAWO_FILE ) );
        }

        /**
         * Get Plugin directory path
         */
        public function plugin_path(): string {
            return untrailingslashit( plugin_dir_path( HAWO_FILE ) );
        }

        /**
         * Get Plugin directory url
         * 
         * @return string
         */
        public function plugin_url(): string {
            return untrailingslashit( plugin_dir_url( HAWO_FILE ) );
        }

        /**
         * Get Plugin image url
         * 
         * @return string
         */
        public function images_url(): string {
            return untrailingslashit( plugin_dir_url( HAWO_FILE ) . 'images' );
        }

        /**
         * Get Asset URL
         * 
         * @return string
         */
        public function assets_url(): string {
            return untrailingslashit( plugin_dir_url( HAWO_FILE ) . 'assets' );
        }

        /**
         * Get Asset path
         * 
         * @return string
         */
        public function assets_path(): string {
            return $this->plugin_path() . '/assets';
        }

        /**
         * Get Vendor path
         *
         * @return string
         * @since 1.0.0
         */
        public function vendor_path(): string {
            return $this->plugin_path() . '/vendor';
        }

        /**
         * Get Vendor URL
         *
         * @return string
         * @since 1.0.0
         */
        public function vendor_url(): string {
            return untrailingslashit( plugin_dir_url( $this->get_plugin_file() ) . 'vendor' );
        }

        /**
         * Get Build URL
         */
        public function build_url(): string {
            return untrailingslashit( plugin_dir_url( HAWO_FILE ) . 'build' );
        }

        /**
         * Get Build path
         * 
         * @return string
         */
        public function build_path(): string {
            return $this->plugin_path() . '/build';
        }

        /**
         * Get Asset version
         *
         * @param string $file Asset file name.
         *
         * @return numeric asset file make time.
         */
        public function assets_version( $file ): int {
            return filemtime( $this->assets_path() . $file );
        }

        /**
         * Get Include path
         * 
         * @return string
         */
        public function include_path(): string {
            return untrailingslashit( plugin_dir_path( HAWO_FILE ) . 'includes' );
        }
    }

endif;

