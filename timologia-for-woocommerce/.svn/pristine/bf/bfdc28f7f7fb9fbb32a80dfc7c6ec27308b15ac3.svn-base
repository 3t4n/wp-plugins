<?php
class tfwc_Settings_Tab {
    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_settings_tab_demo', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_settings_tab_demo', __CLASS__ . '::update_settings' );
    }
    
    
    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_demo'] = __( 'Invoice Settings', 'woocommerce-settings-tab-timologio' );
        return $settings_tabs;
    }
    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }
    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }
    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings() {
		
    $move_comp = get_option( 'tfwc_settings_tab_timologia_comp_move', 'default_value' );		
    
        $settings = array(
            'section_title' => array(
                'name'     => __( 'Settings', 'woocommerce-settings-tab-timologia' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'tfwc_settings_tab_timologia_section_title'
            ),
            'comp_move' => array(
                'name' => __( 'Company field', 'woocommerce-settings-tab-timologia' ),
                'type' => 'select',
				'options'     => array(
					'N' => __( 'No', TEXT_DOMAIN ),
					'Y' => __( 'Yes', TEXT_DOMAIN ),
				),
                'desc' => __( 'Would you like the company field to go under invoice fields', 'woocommerce-settings-tab-timologia' ),
                'id'   => 'tfwc_settings_tab_timologia_comp_move'
            ),		
            'section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'tfwc_settings_tab_timologia_section_end'
            ),			
			 'section_title1' => array(
                'name'     => __( 'THIS IS WHAT YOU GET WITH THE PRO LICENSE', 'woocommerce-settings-tab-timologia' ),
                'type'     => 'title',
                'desc'     => __( 'get pro licence to use all these features', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'       => 'tfwc_settings_tab_timologia_section_title1'
			),  			
            'license' => array(
                'name' => __( 'Licence', 'woocommerce-settings-tab-timologia' ),
                'type' => 'text',
                'desc' => __( 'Enter the licence you received upon purchase', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'   => 'tfwc_settings_tab_timologia_license',
				'default' => 'timologia-'
            ),
            'only_invoice' => array(
                'name' => __( 'Only wholesale', 'woocommerce-settings-tab-timologia' ),
                'type' => 'select',
				'options'     => array(
					'N' => __( 'No', TEXT_DOMAIN ),
					'Y' => __( 'Yes', TEXT_DOMAIN ),
				),
                'desc' => __( 'This will remove the choice for receipt incase you only sell wholesale', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'   => 'tfwc_settings_tab_timologia_only_invoice'
            ),
            'rename_invoice' => array(
                'name' => __( 'Rename Invoice Field from Yes to:', 'woocommerce-settings-tab-timologia' ),
                'type' => 'text',
                'desc' => __( 'Instead of Yes, No in the drop down you can rename the fields', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'   => 'tfwc_settings_tab_timologia_rename_invoice',
				'default' => 'Yes'
            ),
			'rename_receipt' => array(
                'name' => __( 'Rename Invoice Field from No to:', 'woocommerce-settings-tab-timologia' ),
                'type' => 'text',
                'desc' => __( 'Instead of Yes, No in the drop down you can rename the fields', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'   => 'tfwc_settings_tab_timologia_rename_receipt',
				'default' => 'No'
            ),			
            'tim_move' => array(
                'name' => __( 'Invoice fields', 'woocommerce-settings-tab-timologia' ),
                'type' => 'select',
				'options'     => array(
					'N' => __( 'No', TEXT_DOMAIN ),
					'Y' => __( 'Yes', TEXT_DOMAIN ),
				),
                'desc' => __( 'Would you like all invoice fields to be on top of checkout page?', 'woocommerce-settings-tab-timologia' ),
                'id'   => 'tfwc_settings_tab_timologia_tim_move'
            ),	
             'vies' => array(
                'name' => __( 'Disable VIES', 'woocommerce-settings-tab-timologia' ),
                'type' => 'checkbox',
                'desc' => __( 'Check if you want the VAT validation disabled', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'   => 'tfwc_settings_tab_timologia_vies'
            ),  
			'algorithm' => array(
                'name' => __( 'Disable Algorithmic check', 'woocommerce-settings-tab-timologia' ),
                'type' => 'checkbox',
                'desc' => __( '<strong>NOTE GREECE DOES NOT NEED EL IN FRONT OF VALIDATION ANYMORE so no need to disable</strong><br>Check if you want the VAT algorithmic validation disabled ', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'   => 'tfwc_settings_tab_timologia_algorithm'
            ),                 		
            'section_end1' => array(
                 'type' => 'sectionend',
                 'id' => 'tfwc_settings_tab_timologia_section_end'
            ),
			 'section_title2' => array(
                'name'     => __( 'VAT validation through AADE', 'woocommerce-settings-tab-timologia' ),
                'type'     => 'title',
                'desc'     => __( 'In order to enable the validation through AADE, you should visit the website <br><a href="https://www.aade.gr/epiheiriseis/forologikes-ypiresies/mitroo/anazitisi-basikon-stoiheion-mitrooy-epiheiriseon" target="_blank">https://www.aade.gr/epiheiriseis/forologikes-ypiresies/mitroo/anazitisi-basikon-stoiheion-mitrooy-epiheiriseon</a>
				and follow the 3 steps
1) Subscribe to the service using the TAXISnet codes.
2) Obtain special passwords through the Special Password Manager application.
3) Enter username password in add-on settings. (note username password are the same)', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'       => 'tfwc_settings_tab_timologia_section_title1'
			),     
             'aade' => array(
                'name' => __( 'Enable AADE', 'woocommerce-settings-tab-timologia' ),
                'type' => 'checkbox',
                'desc' => __( 'Check if you want the VAT validation enabled', 'woocommerce-settings-tab-timologia', 'woocommerce-settings-tab-timologio' ),
                'id'   => 'tfwc_settings_tab_timologia_aade'
            ),  
			'aade_vat' => array(
                'name' => __( 'Your Vat:', 'woocommerce-settings-tab-timologia' ),
                'type' => 'text',
                'desc' => __( 'enter your vat' ),
                'id'   => 'tfwc_settings_tab_timologia_aade_vat',
            ),				
			'aade_username' => array(
                'name' => __( 'AADE username:', 'woocommerce-settings-tab-timologia' ),
                'type' => 'text',
                'desc' => __( 'enter your username' ),
                'id'   => 'tfwc_settings_tab_timologia_aade_username',
            ),			
			'aade_password' => array(
                'name' => __( 'AADE password:', 'woocommerce-settings-tab-timologia' ),
                'type' => 'text',
                'desc' => __( 'enter your password' ),
                'id'   => 'tfwc_settings_tab_timologia_aade_password',
            ),		
			    'section_end2' => array(
                 'type' => 'sectionend',
                 'id' => 'tfwc_settings_tab_timologia_section_end2'
            ),		
        );
        return apply_filters( 'tfwc_settings_tab_timologia_settings', $settings );
        }
}
tfwc_Settings_Tab::init();


$move_comp = get_option( 'tfwc_settings_tab_timologia_comp_move', 'default_value' );
if ($move_comp =='Y') {
	add_filter( 'woocommerce_checkout_fields', 'tfwc_move_checkout_fields' );
					
					add_action('wp_enqueue_scripts', 'tfwc_load_timologia_fields_company_js');
				function tfwc_load_timologia_fields_company_js() {
					if(is_cart() || is_checkout()){
						wp_enqueue_script( 'wc-timologia', plugin_dir_url(__FILE__) . 'script2.js', array('jquery'), null, true);
					}
				}
	}
if ($move_comp == 'N') {
	add_filter( 'woocommerce_checkout_fields', 'tfwc_restore_checkout_fields' );
	}
	// restore company name to not required
	if ( isset($_POST['billing_timologio']) ) {
	
	
	
if ($_POST['billing_timologio'] == 'N') {
	add_filter( 'woocommerce_checkout_fields', 'tfwc_restore_checkout_fields' );
	}

}



function tfwc_restore_checkout_fields( $fields ) {
 
    // default priorities: 
    // 'first_name' - 10
    // 'last_name' - 20
    // 'company' - 30
    // 'country' - 40
    // 'address_1' - 50
    // 'address_2' - 60
    // 'city' - 70
    // 'state' - 80
    // 'postcode' - 90
  
  // e.g. move 'company' above 'first_name':
  // just assign priority less than 10
  $fields['billing']['billing_company']['priority'] = 30;
  $fields['billing']['billing_company']['input_class'] = array('input_text');
  $fields['billing']['billing_company']['class'][0] = 'form-row form-row-wide';	
  $fields['billing']['billing_company']['placeholder'] = __('LEGAL COMPANY NAME', TEXT_DOMAIN);
  $fields['billing']['billing_company']['required'] = false;
  return $fields;
}

function tfwc_move_checkout_fields( $fields ) {
	
$tim_move = get_option( 'tfwc_settings_tab_timologia_tim_move');

if ($tim_move != 'Y') {
 
    // default priorities: 
    // 'first_name' - 10
    // 'last_name' - 20
    // 'company' - 30
    // 'country' - 40
    // 'address_1' - 50
    // 'address_2' - 60
    // 'city' - 70
    // 'state' - 80
    // 'postcode' - 90
  
  // e.g. move 'company' above 'first_name':
  // just assign priority less than 10
  $fields['billing']['billing_company']['priority'] = 1003;
  $fields['billing']['billing_company']['input_class'] = array('timologio-hide');
  $fields['billing']['billing_company']['class'][0] = 'timologio-hide';	
  $fields['billing']['billing_company']['placeholder'] = __('LEGAL COMPANY NAME', TEXT_DOMAIN);
  $fields['billing']['billing_company']['required'] = true;
  
  return $fields;
}
 else if ($tim_move == 'Y') {
	
  $fields['billing']['billing_company']['priority'] = 4;
  $fields['billing']['billing_company']['input_class'] = array('timologio-hide');
  $fields['billing']['billing_company']['class'][0] = 'timologio-hide';	
  $fields['billing']['billing_company']['placeholder'] = __('LEGAL COMPANY NAME', TEXT_DOMAIN);
  $fields['billing']['billing_company']['required'] = true;
  
  return $fields;
}
}