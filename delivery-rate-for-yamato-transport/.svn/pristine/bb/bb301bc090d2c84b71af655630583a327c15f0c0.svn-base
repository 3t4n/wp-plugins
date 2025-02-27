<?php
/*
Plugin Name: Delivery rate for Yamato transport
Plugin URI: http://resta.jp
Description: This plug-in is for additional plug- ins for Yamato Transport for WooCommerce.
Version: 1.0.2
Author: RESTA
Author URI: http://resta.jp
*/

/**
 * Check if WooCommerce is active
*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  function delivery_shipping_method_init() {
    if ( ! class_exists( 'WC_Shipping_Method' ) ) {
      return;
    }
    class WC_Delivery_Shipping_Method extends WC_Shipping_Method {
        /**
         * Constructor for delivery shipping class
         *
         * @access public
         * @return void
         */
        public function __construct($instance_id = 0) {
          $this->id                   = 'delivery_yamato'; // ID that is output to the delivery options
          $this->instance_id          = absint( $instance_id );
          $this->method_title         = __( 'delivery yamato', 'delivery-yamato' );  // Title shown in admin
          $this->method_description   = __( 'Please enter a delivery fee for each region from shipping destination.', 'delivery-yamato' ); // Description shown in admin
          $this->enabled             = "yes"; // This can be added as an setting but for this example its forced enabled
          $this->title                = __( 'delivery yamato', 'delivery-yamato' ); // This can be added as an setting but for this example its forced.
          $this->supports                         = array(
                                'settings',
                                'shipping-zones',
                                'instance-settings',
                                'instance-settings-modal',
                        );
          $this->init();
            // Save settings in admin if you have any defined
            add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
            //$this->init();
        }

        /**
         * Init your settings
         * @access public
         * @return void
         */
        function init() {
            $this->load_plugin_textdomain();
            // Load the settings API
            $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
            $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

            // Save settings in admin if you have any defined
            add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
        }

        /*
        * Load Localisation files.
        *
        * Note: the first-loaded translation file overrides any following ones if the same translation is present
        */
        function load_plugin_textdomain() {
            load_plugin_textdomain( 'delivery-yamato', false, plugin_basename( dirname( __FILE__ ) ) . "/languages" );
        }

        /**
         * Initialise Gateway Settings Form Fields
         */
        function init_form_fields() {
            $this->form_fields = array(
                'enabled' => array(
                    'title'		=> __( 'Enable/Disable', 'delivery-yamato' ),
                    'type'		=> 'checkbox',
                    'label'		=> __( 'Enable this shipping method', 'delivery-yamato' ),
                    'default'	=> 'no'
                ),
                'hokkaido'			=> array(
                    'title'			=> __( 'Hokkaido', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Hokkaido', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'northern_tohoku'	=> array(
                    'title'			=> __( 'Northern Tohoku', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Aomori,Akita,Iwate', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'south_tohoku'		=> array(
                    'title'			=> __( 'South Tohoku', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Miyagi,Yamagata,Fukushima', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'kanto' => array(
                    'title'			=> __( 'Kanto', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Ibaraki,Tochigi,Gunma,Saitama,Chiba,Tokyo,Kanagawa,Yamanashi', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'shinetsu'			=> array(
                    'title'			=> __( 'Shinetsu', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Niigata,Nagano', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'chubu'				=> array(
                    'title'			=> __( 'Chubu', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Shizuoka,Aichi,Mie,Gifu', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'hokuriku'			=> array(
                    'title'			=> __( 'Hokuriku', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Toyama,Ishikawa,Fukui', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'kansai'			=> array(
                    'title'			=> __( 'Kansai', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Osaka,Kyoto,Shiga,Nara,Wakayama,Hyogo', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'chugoku' => array(
                    'title'			=> __( 'Chugoku', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Okayama,Hiroshima,Yamaguchi,Tottori,Shimane', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'shikoku' => array(
                    'title'			=> __( 'Shikoku', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Kagawa,Tokushima,Ehime,Kochi', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'kyushu' => array(
                    'title'			=> __( 'Kyushu', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Fukuoka,Saga,Nagasaki,Kumammoto,Oita,Miyazaki,Kagoshima', 'delivery-yamato' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                ),
                'okinawa' => array(
                    'title'			=> __( 'Okinawa', 'delivery-yamato' ),
                    'type'			=> 'price',
                    'description'	=> __( 'Okinawa', 'woocommerce' ),
                    'default'		=> '',
                    'options'		=> array(
                        'key'		=> 'value'
                    ),
                )
            );
        }

        /**
         * calculate_shipping function.
         *
         * @access public
         * @param mixed $package
         * @return void
         */
        public function calculate_shipping( $package = Array() ) {
            // get delivery state
            $state = WC()->customer->get_shipping_state();
            switch ( $state ){
                case "JP01":
                    $cost_value=$this->get_option( 'hokkaido' );
                    $state=__('Hokkaido', 'delivery-yamato');
                    break;
                case "JP02": case "JP03": case "JP05":
                    $cost_value=$this->get_option( 'northern_tohoku' );
                    $state=__('Northern Tohoku', 'delivery-yamato');
                    break;
                case "JP04": case "JP06": case "JP07":
                    $cost_value=$this->get_option( 'south_tohoku' );
                    $state=__('South Tohoku', 'delivery-yamato');
                    break;
                case "JP08": case "JP09": case "JP10": case "JP11": case "JP12": case "JP13": case "JP14": case "JP19":
                    $cost_value=$this->get_option( 'kanto' );
                    $state=__('Kanto', 'delivery-yamato');
                    break;
                case "JP15": case "JP20":
                    $cost_value=$this->get_option( 'shinetsu' );
                    $state=__('Shinetsu', 'delivery-yamato');
                    break;
                case "JP21": case "JP22": case "JP23": case "JP24":
                    $cost_value=$this->get_option( 'chubu' );
                    $state=__('Chubu', 'delivery-yamato');
                    break;
                case "JP16": case "JP17": case "JP18":
                    $cost_value=$this->get_option( 'hokuriku' );
                    $state=__('Hokuriku', 'delivery-yamato');
                    break;
                case "JP25": case "JP26": case "JP27": case "JP28": case "JP29": case "JP30":
                    $cost_value=$this->get_option( 'kansai' );
                    $state=__('Kansai', 'delivery-yamato');
                    break;
                case "JP31": case "JP32": case "JP33": case "JP34": case "JP35":
                    $cost_value=$this->get_option( 'chugoku' );
                    $state=__('Chugoku', 'delivery-yamato');
                    break;
                case "JP36": case "JP37": case "JP38": case "JP39":
                    $cost_value=$this->get_option( 'shikoku' );
                    $state=__('Shikoku', 'delivery-yamato');
                    break;
                case "JP40": case "JP41": case "JP42": case "JP43": case "JP44": case "JP45": case "JP46":
                    $cost_value=$this->get_option( 'kyushu' );
                    $state=__('Kyushu', 'delivery-yamato');
                    break;
                case "JP47":
                    $cost_value=$this->get_option( 'okinawa' );
                    $state=__('Okinawa', 'delivery-yamato');
                    break;
                default:
                    $cost_value='0';
                    break;
            }
            if (empty($cost_value)){
                $cost_value='0';
            }
            $rate = array(
                'id' => $this->id,
                'label' => "$state",
                'cost' => "$cost_value",
                'calc_tax' => 'per_item'
            );
            // Register the rate
            $this->add_rate( $rate );
            // Save settings in admin if you have any defined
            add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
        }
    }
  }
  add_action( 'woocommerce_shipping_init', 'delivery_shipping_method_init' );

  function add_delivery_shipping_method( $methods ) {
    $methods['delivery_yamato'] = 'WC_Delivery_Shipping_Method';
    //$methods[ 'delivery_yamato' ] = 'WC_Delivery_Shipping_Method';
    return $methods;
  }

  add_filter( 'woocommerce_shipping_methods', 'add_delivery_shipping_method' , 0 );
}

/**
 * Check Pluguin is stop
 */

function delivery_yamato_shipping_desinstalar() {
  delete_option( 'woocommerce_delivery_yamato_settings' );
  // delete_transient( 'apg_free_shipping_plugin' );
}
register_uninstall_hook( __FILE__, 'delivery_yamato_shipping_desinstalar' );