<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.indianic.com/enquiry
 * @since      1.0.0
 *
 * @package    Nic_Addon_Custom_Fee_Cart
 * @subpackage Nic_Addon_Custom_Fee_Cart/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nic_Addon_Custom_Fee_Cart
 * @subpackage Nic_Addon_Custom_Fee_Cart/admin
 * @author     MageINIC <support@mageinic.com>
 */
class Nic_Addon_Custom_Fee_Cart_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nic_Addon_Custom_Fee_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nic_Addon_Custom_Fee_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nic-addon-custom-fee-cart-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nic_Addon_Custom_Fee_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nic_Addon_Custom_Fee_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nic-addon-custom-fee-cart-admin.js', array( 'jquery' ), $this->version, false );

	}

	

    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Custom Fee tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Custom Fee tab.
     */
    public static function extra_fee_settings_tab_array( $settings_tabs ) {
        $settings_tabs['settings_extra_fee'] = __( 'Extra Fee', 'nic-addon-custom-fee-cart' );
        return $settings_tabs;
    }
    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::extra_fees_getting_settings()
     */
    public static function extra_fee_settings_tab() {
        woocommerce_admin_fields( self::extra_fees_getting_settings() );
    }
    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::extra_fees_getting_settings()
     */
    public static function extra_fee_update_settings() {
        woocommerce_update_options( self::extra_fees_getting_settings() );
    }    
    public static function extra_fees_getting_settings() {

        $settings = array(
            'section_title' => array(
                'name'     => __( 'Woo Add Custom Fee', 'nic-addon-custom-fee-cart' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'woo_add_custom_fee_mainsection_title',
                'desc_tip' => true,
            ),

            'enable' => array(
                'name'     => __( 'Enable ', 'nic-addon-custom-fee-cart' ),
                'type' => 'checkbox',
                'desc'     => __( '', 'nic-addon-custom-fee-cart' ),
                'id'       => 'extra_fee_on',
                'desc_tip' => true,
            ),

            'label' => array(
                'name'     => __( 'Label', 'nic-addon-custom-fee-cart' ),
                'type' => 'text',
                'desc'     => __( 'Enter text for Custom Fee label', 'nic-addon-custom-fee-cart' ),
                'id'       => 'extra_fee_label',
                'desc_tip' => true,
            ),

            'charges' => array(
                'name'     => __( 'Amount', 'nic-addon-custom-fee-cart' ),
                'type' => 'text',
                'desc'     => __( 'Enter amount for extra fee (number only) ', 'nic-addon-custom-fee-cart' ),
                'id'       => 'extra_fee_amount',
                'desc_tip' => true,
            ),

            'type' => array(
                'name'     => __( 'Type', 'nic-addon-custom-fee-cart' ),
                'type'     => 'select',
                'desc'     => __( 'Type for custom fee', 'nic-addon-custom-fee-cart' ),
                'id'       => 'extra_fee_type',
                'desc_tip' => true,
                'options'  => array(
                    'fixed' => 'Fixed',
                    'percentage' => 'Percentage (total value of cart)',
                ),
            ),

            

            'taxable' => array(
                'name'     => __( 'Taxable', 'nic-addon-custom-fee-cart' ),
                'type'     => 'select',
                'desc'     => __( 'Check this box if would like to add tax to Custom Fee', 'nic-addon-custom-fee-cart' ),
                'id'       => 'extra_fee_in_taxable',
                'desc_tip' => true,
                'options'  => array(
                    true => 'Yes',
                    false => 'No',
                ),
            ),

            'tax_class' => array(
                'name'     => __( 'Tax Class', 'nic-addon-custom-fee-cart' ),
                'type'     => 'select',
                'desc'     => __( 'Select Tax Class if tax is enabled', 'nic-addon-custom-fee-cart' ),
                'id'       => 'extra_fee_tax_class',
                'desc_tip' => true,
                'options'  => self::extra_fees_getting_tax_options(),
            ),
            'enable_min' => array(
                'name'     => __( 'Use Minimum cart sub total value ', 'nic-addon-custom-fee-cart' ),
                'type' => 'checkbox',
                'desc'     => __( '', 'nic-addon-custom-fee-cart' ),
                'id'       => 'extra_fee_on_min',
                'desc_tip' => true,
            ),
            'minimum' => array(
                'name'     => __( 'Minimum Cart Amount', 'nic-addon-custom-fee-cart' ),
                'type' => 'text',
                'desc'     => __( 'Set Minimum total cart amount on which you would like to apply Custom Fee', 'nic-addon-custom-fee-cart' ),
                'id'       => 'cart_minimum_subtotal',
                'desc_tip' => true,
            ),
            'section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'wacf_section_end',
            )
        );

        return apply_filters( 'wc_settings_extra_fee', $settings );
    }

    public static function extra_fees_getting_tax_options() {

        $tax_options = array();
        $tax_classes = WC_Tax::get_tax_classes();
        foreach($tax_classes as $tax_class){
            $tax_options[$tax_class] = $tax_class;
        }
        return $tax_options;

    }

    public function extra_fee_check_woocommerce() {
		 
		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

			deactivate_plugins( plugin_basename( __FILE__ ) );
			
			if ( isset( $_GET['activate'] ) )
				unset( $_GET['activate'] );
			
			wp_die( '<b>'.__('Woo Add Custom Fee','wacf').'</b> '.__('requires you to install & activate','wacf').'<b> '.__('WooCommerce Plugin','wacf').'</b> '.__('before activating it!','wacf').'<br><br><a href="javascript:history.back()"><< '.__('Go Back To Plugins Page','wacf').'</a>' );
			
		}		

	}

}
