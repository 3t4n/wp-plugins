<?php
define( "BeRocket_force_sell_domain", 'force-sell-for-woocommerce'); 
define( "force_sell_TEMPLATE_PATH", plugin_dir_path( __FILE__ ) . "templates/" );
load_plugin_textdomain('force-sell-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
require_once(plugin_dir_path( __FILE__ ).'berocket/framework.php');
foreach (glob(__DIR__ . "/includes/*.php") as $filename)
{
    include_once($filename);
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

class BeRocket_force_sell extends BeRocket_Framework {
    public static $settings_name = 'br-force_sell-options';
    public $info, $defaults, $values, $notice_array, $conditions;
    protected static $instance;
    protected $disable_settings_for_admin = array();
    function __construct () {
        $this->info = array(
            'id'          => 20,
            'lic_id'      => 37,
            'version'     => BeRocket_force_sell_version,
            'plugin'      => '',
            'slug'        => '',
            'key'         => '',
            'name'        => '',
            'plugin_name' => 'force_sell',
            'full_name'   => 'WooCommerce Force Sell',
            'norm_name'   => 'Force Sell',
            'price'       => '',
            'domain'      => 'force-sell-for-woocommerce',
            'templates'   => force_sell_TEMPLATE_PATH,
            'plugin_file' => BeRocket_force_sell_file,
            'plugin_dir'  => __DIR__,
        );
        $this->defaults = array(
            'show_on_product_page'      => 'woocommerce_after_add_to_cart_button',
            'add_force_sell_type'       => '',
            'product_page_options'      => '',
            'prevent_add_to_cart'       => '1',
            'display_force_sell'        => '1',
            'display_force_sell_linked' => '1',
            'display_as_link'           => '',
            'force_sell'                => array(),
            'force_sell_linked'         => array(),
            'category_linked'           => array(),
            'product_linked'            => array(),
            'linked_products'           => array(),
            'custom_css'                => '',
        );
        $this->values = array(
            'settings_name' => 'br-force_sell-options',
            'option_page'   => 'br-force_sell',
            'premium_slug'  => 'woocommerce-force-sell',
            'free_slug'     => 'force-sell-for-woocommerce',
            'hpos_comp'     => true
        );
        $this->feature_list = array();
        if( method_exists($this, 'include_once_files') ) {
            $this->include_once_files();
        }
        if ( $this->init_validation() ) {
            new BeRocket_force_sell_custom_post();
        }
        parent::__construct( $this );
        if ( $this->init_validation() ) {
            $options = $this->get_option();
            if( empty($options['add_force_sell_type']) ) {
                include_once( 'includes/force-sell-types/add_force_sell.php' );
            } else {
                include_once( 'includes/deprecated/old_add_force_sell.php' );
                include_once( 'includes/deprecated/force_sell_single.php' );
            }
            add_action ( "widgets_init", array( __CLASS__, 'widgets_init' ) );
            // add_action ( "woocommerce_after_single_product_summary", array( $this, 'show_on_product_page' ) );
            add_shortcode( 'br_force_sell', array( __CLASS__, 'shortcode' ) );
            add_filter ( 'BeRocket_updater_menu_order_custom_post', array($this, 'menu_order_custom_post') );
            add_action( 'divi_extensions_init', array($this, 'divi_initialize_extension') );
        }
    }
    public function divi_initialize_extension() {
        if( class_exists('DiviExtension') ) {
            require_once plugin_dir_path( __FILE__ ) . 'divi/includes/ForcesellExtension.php';
        }
    }
    function init_validation() {
        return ( ( is_plugin_active( 'woocommerce/woocommerce.php' ) || is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) && 
            br_get_woocommerce_version() >= 2.1 );
    }

    public static function widgets_init() {
        register_widget("berocket_force_sell_widget");
    }

    public static function shortcode($atts = array()) {
        ob_start();
        the_widget( 'berocket_force_sell_widget', $atts );
        return ob_get_clean();
    }

    public function show_on_product_page($atts = array()) {
        ob_start();
        the_widget( 'berocket_force_sell_widget', $atts );
        ob_get_clean();
    }

    public function init () {
        parent::init();
        $version = get_option('BeRocket_force_sell_version');
        if( $version != BeRocket_force_sell_version ) { 
            global $wpdb;
            $query_string = "SELECT count(meta_key) as count FROM {$wpdb->postmeta} WHERE meta_key IN ('berocket_force_sell', 'berocket_force_sell_linked', 'berocket_force_sell_once', 'berocket_force_sell_linked_once') AND meta_value NOT LIKE ''";
            $matched_count = $wpdb->get_var( $query_string );
            update_option('BeRocket_force_sell_version', BeRocket_force_sell_version);
            if( ( version_compare($version, '3.0', '>=') && version_compare($version, '3.0.2', '<') ) || version_compare($version, '1.1.3.3', '<') || empty($version) ) {
                $BeRocket_force_sell_custom_post = BeRocket_force_sell_custom_post::getInstance();
                $force_sell_ids = $BeRocket_force_sell_custom_post->get_custom_posts_frontend();
                if( count($force_sell_ids) || $matched_count > 0 ) {
                    $options = $this->get_option();
                    $options['add_force_sell_type']  = '1';
                    update_option($this->values['settings_name'], $options);
                }
            }
            do_action('berocket_force_sell_version_diff', $version);
        }
    }
    public function admin_settings( $tabs_info = array(), $data = array() ) {
        parent::admin_settings(
            array(
                'General' => array(
                    'icon' => 'cog',
                ),
                'Custom CSS' => array(
                    'icon' => 'css3'
                ),
                'Force Sell' => array(
                    'icon' => 'plus-square',
                    'link' => admin_url( 'edit.php?post_type=br_force_sell' ),
                ),
                'License' => array(
                    'icon' => 'unlock-alt',
                    'link' => admin_url( 'admin.php?page=berocket_account' ),
                ),
            ),
            array(
            'General' => array(
                'show_on_product_page' => array(
                    "label"     => __('Show on Product page', 'force-sell-for-woocommerce'),
                    "type"      => "selectbox",
                    "name"      => "show_on_product_page",
                    "options"      => array(
                        array( 'value' => 'berocket_force_sell_single_product_info', 
                            'text' => __( 'Disabled', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_before_single_product', 
                            'text' => __( 'Before product', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_before_single_product_summary', 
                            'text' => __( 'Before product summary', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_single_product_summary', 
                            'text' => __( 'In product summary', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_before_add_to_cart_form', 
                            'text' => __( 'Before Add to cart form', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_before_variations_form', 
                            'text' => __( 'Before Variations form', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_before_add_to_cart_button', 
                            'text' => __( 'Before Add to cart button', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_before_single_variation', 
                            'text' => __( 'Before single variation', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_single_variation', 
                            'text' => __( 'In single variation', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_before_add_to_cart_quantity', 
                            'text' => __( 'Before Add to cart quantity', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_after_add_to_cart_quantity', 
                            'text' => __( 'After Add to cart quantity', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_after_single_variation', 
                            'text' => __( 'After single variation', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_after_add_to_cart_button', 
                            'text' => __( 'After Add to cart button', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_after_variations_form', 
                            'text' => __( 'After Variations form', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_after_add_to_cart_form', 
                            'text' => __( 'After Add to cart form', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_product_meta_start', 
                            'text' => __( 'Before product meta', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_product_meta_end', 
                            'text' => __( 'After product meta', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_share', 
                            'text' => __( 'In product Share', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_after_single_product_summary', 
                            'text' => __( 'After product summary', 'brands-for-woocommerce' ) ),
                        array( 'value' => 'woocommerce_after_single_product', 
                            'text' => __( 'After product', 'brands-for-woocommerce' ) ),
                    ),
                    "value" => 'woocommerce_after_add_to_cart_button',
                ),
                'prevent_add_to_cart' => array(
                    "label"     => __('Prevent Add To Cart', 'force-sell-for-woocommerce'),
                    "type"      => "checkbox",
                    "name"      => "prevent_add_to_cart",
                    "value"     => "1",
                    "label_for" => __('Prevent Add To Cart when Linked Products, that can be removed only with this product is out of stock', 'force-sell-for-woocommerce')
                ),
                'display_force_sell' => array(
                    "label"     => __('Display linked products on single product page', 'force-sell-for-woocommerce'),
                    "type"      => "checkbox",
                    "name"      => "display_force_sell",
                    "value"     => "1",
                    "label_for" => __('Linked Products, that can be removed', 'force-sell-for-woocommerce')
                ),
                'display_force_sell_linked' => array(
                    "label"     => '',
                    "type"      => "checkbox",
                    "name"      => "display_force_sell_linked",
                    "value"     => "1",
                    "label_for" => __('Linked Products, that can be removed only with this product', 'force-sell-for-woocommerce')
                ),
                'display_as_link' => array(
                    "label"     => '',
                    "type"      => "checkbox",
                    "name"      => "display_as_link",
                    "value"     => "1",
                    "label_for" => __('Link to products page', 'force-sell-for-woocommerce')
                ),
                'add_force_sell_type' => array(
                    "label"     => 'Old Mode',
                    "type"      => "checkbox",
                    "name"      => "add_force_sell_type",
                    "value"     => "1",
                    "label_for" => '<strong>DEPRECATED</strong> '.__('Please do not use it. This option will be removed in future release', 'force-sell-for-woocommerce').'<br>'. 
                                    __('Enable Old force sell adding and Display product option', 'force-sell-for-woocommerce')
                                    
                ),
                'shortcode' => array(
                    'section'   => 'shortcode',
                    "value"     => "1",
                ),
            ),
            'Custom CSS' => array(
                array(
                    "label"   => "Custom CSS",
                    "name"    => "custom_css",
                    "type"    => "textarea",
                    "value"   => "",
                ),
            ),
        ) );
    }
    public function section_shortcode($field_data, $options) {
        $html = '<tr><th>'.__('Shortcode', 'force-sell-for-woocommerce').'</th><td>';
        $html .= '<ul>
            <li>
                <strong>[br_force_sell]</strong>
                <ul>
                    <li><i>title</i> - shortcode title</li>
                    <li><i>display_force_sell</i> - Linked Products, that can be removed(1 or 0)</li>
                    <li><i>display_force_sell_linked</i> - Linked Products, that can be removed only with this product(1 or 0)</li>
                    <li><i>display_as_link</i> - Link to products page(1 or 0)</li>
                </ul>
            </li>
        </ul>';
        $html .= '</td></tr>';
        return $html;
    }
    public function admin_init () {
        parent::admin_init();
    }
    public function admin_menu() {
        if ( parent::admin_menu() ) {
            add_submenu_page(
                'woocommerce',
                __( $this->info[ 'norm_name' ]. ' Settings', $this->info[ 'domain' ] ),
                __( $this->info[ 'norm_name' ], $this->info[ 'domain' ] ),
                'manage_options',
                $this->values[ 'option_page' ],
                array(
                    $this,
                    'option_form'
                )
            );
        }
    }
    public function menu_order_custom_post($compatibility) {
        $compatibility['br_force_sell'] = 'br-force_sell';
        return $compatibility;
    }
}

new BeRocket_force_sell;
