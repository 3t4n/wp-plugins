<?php

/**
 * ELEX_Shipping_USPS class.
 *
 * @extends WC_Shipping_Method
 */
class ELEX_Shipping_USPS extends WC_Shipping_Method {

	protected $endpoint = 'https://production.shippingapis.com/shippingapi.dll';
	//protected $endpoint        = 'https://stg-production.shippingapis.com/ShippingApi.dll';
	protected $default_user_id = '570CYDTE1766';
	protected $default_password = '#cwCWRaJ2HH@';
	protected $domestic        = array( 'US', 'PR', 'MP', 'VI', 'GU', 'AS' );
	protected $found_rates;
	protected $package_info;
	public $method_description;
	public $selected_flat_rate_boxes;
	public $disable_commercial_rates;
	public $box_max_weight;
	public $optional;
	public $elex_usps_insurance_contents;
	public $elex_usps_insurance;
	public $weight_unit;
	public $dimension_unit;
	public $test_mode;
	public $weight_packing_process;
	public $method_title;
	
	 public $flat_rate_boxes;
	 public $unpacked_item_costs;
	 public $id;
	public $availability;
	public $origin;
	public $disbleShipmentTracking;
	public $fillShipmentTracking;
	public $disblePrintLabel;
	public $defaultPrintService;
	public $defaultPrintInternationalService;
	public $printLabelSize;
	public $printLabelType;
	public $senderName;
	public $senderCompanyName;
	public $api_mode;
	public $client_id;
	public $client_secret;
	public $intergration;
	public $estimated_delivery_date;
	public $usps_working_days;
	public $usps_cut_off_time;
	public $auth_services;

	public $flat_rate_fee;
	public $mediamail_restriction;
	public $unpacked_item_handling;
	public $enable_standard_services;
	public $senderCountry;
	public $senderEmail;
	public $auth_custom_services;

	public $senderAddressLine1;
	public $senderAddressLine2;
	public $senderCity;
	public $senderState;
	public $enable_flat_rate_boxes;
	public $debug;
	public $senderPhone;
	public $user_id;
	public $password;
	public $packing_method;
	public $boxes;
	public $custom_services = array();
	public $offer_rates;
	public $fallback;
	public $ordered_services;
	public $services = array();
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id                 = ELEX_USPS_ID;
		$this->method_title       = __( 'USPS', 'wf-usps-woocommerce-shipping' );
		$this->method_description = __( 'The <strong>USPS</strong> extension obtains rates dynamically from the USPS API during cart/checkout.', 'wf-usps-woocommerce-shipping' );
		$this->services           = include  'data-wf-services.php' ;
		$this->auth_services           = include  'data-wf-auth-services.php' ;
		
		
		$this->init();
	}

	/**
	 * Is_available function.
	 *
	 * @param array $package
	 * @return bool
	 */
	public function is_available( $package ) {
		if ( 'no' === $this->enabled ) {
			return false;
		}
		if ( 'specific' === $this->availability ) {
			if ( is_array( $this->countries ) && ! in_array( $package['destination']['country'], $this->countries ) ) {
				return false;
			}
		} elseif ( 'excluding' === $this->availability ) {
			if ( is_array( $this->countries ) && ( in_array( $package['destination']['country'], $this->countries ) || ! $package['destination']['country'] ) ) {
				return false;
			}
		}
			/** 
		 * Fire a filter hook for check availability
		 *
		 * @since 2002
		 * @param $package
		 */  
		return apply_filters( 'woocommerce_shipping_' . $this->id . '_is_available', true, $package );
	}

	/**
	 * Init function.
	 *
	 * @accesss public
	 * @return void
	 */
	protected function init() {
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Define user set variables
		$this->enabled      = isset( $this->settings['enabled'] ) ? $this->settings['enabled'] : $this->enabled;
		$this->title        = isset( $this->settings['title'] ) ? $this->settings['title'] : $this->method_title;
		$this->availability = isset( $this->settings['availability'] ) ? $this->settings['availability'] : 'all';
		$this->countries    = isset( $this->settings['countries'] ) ? $this->settings['countries'] : array();
		$this->origin       = isset( $this->settings['origin'] ) ? $this->settings['origin'] : '';

		$this->user_id                  = ! empty( $this->settings['user_id'] ) ? $this->settings['user_id'] : $this->default_user_id;
		$this->password                  = ! empty( $this->settings['password'] ) ? $this->settings['password'] : $this->default_password;
		$this->api_mode                 = isset( $this->settings['api_mode'] ) ? $this->settings['api_mode'] : 'old_api';
		$this->intergration          = isset( $this->settings['integration_mode'] ) ? $this->settings['integration_mode'] : 'LIVE';
		$this->client_id        = ! empty( $this->settings['client_id'] ) ? $this->settings['client_id'] : '';
		$this->client_secret        = ! empty( $this->settings['client_secret'] ) ? $this->settings['client_secret'] : '';

		$this->packing_method           = 'per_item';
		$this->custom_services          = isset( $this->settings['services'] ) ? $this->settings['services'] : array();
		$this->auth_custom_services = isset( $this->settings['auth_services'] ) ? $this->settings['auth_services'] : array();
		$this->offer_rates              = isset( $this->settings['offer_rates'] ) ? $this->settings['offer_rates'] : 'all';
		$this->fallback                 = ! empty( $this->settings['fallback'] ) ? $this->settings['fallback'] : '';
		$this->mediamail_restriction    = isset( $this->settings['mediamail_restriction'] ) ? $this->settings['mediamail_restriction'] : array();
		$this->mediamail_restriction    = array_filter( (array) $this->mediamail_restriction );
		$this->enable_standard_services = true;
		$this->debug                    = isset( $this->settings['debug_mode'] ) && 'yes' == $this->settings['debug_mode'] ? true : false;
		$this->disable_commercial_rates = false;
		$this->weight_unit              = strtolower( get_option( 'woocommerce_weight_unit' ) );

		$this->estimated_delivery_date = isset( $this->settings['usps_est_delivery'] ) ? $this->settings['usps_est_delivery'] : 'no';
		$this->usps_working_days = isset( $this->settings['usps_working_days'] ) ? $this->settings['usps_working_days'] : array();
		$this->usps_cut_off_time = isset( $this->settings['usps_cut_off_time'] ) ? $this->settings['usps_cut_off_time'] : array();

		add_filter( 'woocommerce_cart_shipping_method_full_label', array( $this, 'wf_usps_add_delivery_time' ), 10, 2 );
		add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'test_user_id' ), -10 );
		add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'clear_transients' ) );
	}

	/**
	 * Environment_check function.
	 *
	 * @accesss public
	 * @return void
	 */
	protected function environment_check() {

		$admin_page = version_compare( WOOCOMMERCE_VERSION, '2.1', '>=' ) ? admin_url( 'admin.php?page=wc-settings&tab=general' ) : admin_url( 'admin.php?page=woocommerce_settings&tab=general' );

		if ( get_woocommerce_currency() != 'USD' ) {
			echo '<div class="error">
				<p>' . sprintf( wp_kses_post( 'USPS requires that the <a href="%s">currency</a> is set to US Dollars.', 'wf-usps-woocommerce-shipping' ), esc_url( $admin_page ) ) . '</p>
			</div>';
		} elseif ( ! in_array( WC()->countries->get_base_country(), $this->domestic ) ) {
			echo '<div class="error">
				<p>' . sprintf( wp_kses_post( 'USPS requires that the <a href="%s">base country/region</a> is the United States.', 'wf-usps-woocommerce-shipping' ), esc_url( $admin_page ) ) . '</p>
			</div>';
		} elseif ( ! $this->origin && 'yes' == $this->enabled ) {
			echo '<div class="error">
				<p>' . esc_html_e( 'USPS is enabled, but the origin postcode has not been set.', 'wf-usps-woocommerce-shipping' ) . '</p>
			</div>';
		}
	}

	public function wf_usps_add_delivery_time( $label, $method ) {
		$delivery_date_for_shipping_methods = explode( 'Est delivery:', $label );
		if ( count( $delivery_date_for_shipping_methods ) <= 1 ) {

			if ( 'yes' == $this->settings['usps_est_delivery'] ) {
				if ( ! is_object( $method ) ) {
					return $label;
				}
				$est_delivery = $method->get_meta_data();
				if ( $this->settings['usps_cut_off_time'] ) {
					$cut_off_time = explode( ':', $this->settings['usps_cut_off_time'], 2 );
				}
				if ( isset( $est_delivery['usps_est_delivery_time'] ) && '' != $est_delivery['usps_est_delivery_time'] ) {
					$date              = gmdate( 'F j, Y ', strtotime( $est_delivery['usps_est_delivery_time'] ) );
					$est_delivery_html = '<br /><small>' . __( ' Est delivery: ', 'wf-usps-woocommerce-shipping' ) . $date . '</small>';
						/** 
			 * Fire a filter hook for estimated delivery
			 *
			 * @since 2002
			 */
					$est_delivery_html = apply_filters( 'wf_usps_estimated_delivery', $est_delivery_html, $est_delivery );
					$label            .= $est_delivery_html;
				}
			}
		}
		return $label;
	}
	/**
	 * Admin_options function.
	 *
	 * @accesss public
	 * @return void
	 */
	public function admin_options() {
		// Check users environment supports this method
		$this->environment_check();
		
		// Show settings
		parent::admin_options();
	}

	/**
	 * Generate_services_html function.
	 */
	public function generate_services_html() {
		ob_start();
		include  'html-wf-services.php' ;
		return ob_get_clean();
	}

	public function generate_auth_services_html() {
		ob_start();
		include 'html-wf-auth_services.php';
		return ob_get_clean();
	}
	/**
	 * Validate_services_field function.
	 *
	 * @accesss public
	 * @param mixed $key
	 * @return void
	 */
	public function validate_services_field( $key ) {

		$services = array();
		if ( ! ( isset( $_POST ) && isset( $_POST['_elex_ajax_nonce'] ) && wp_verify_nonce( sanitize_text_field( $_POST['_elex_ajax_nonce'] ), '_elex_usps_shipping_ajax_nonce' ) ) && isset( $_POST['usps_service'] ) ) {
			return;
		}

		foreach ( $this->services as $code => $service ) {
			if ( isset( $_POST['usps_service'][ $code ]['order'] ) ) {
				$services[ $code ] = array(
					// 'name'               => wc_clean( $settings['name'] ),
					'order' => wc_clean( sanitize_text_field( $_POST['usps_service'][ $code ]['order'] ) ),
				);
			}
			foreach ( $service['services'] as $key => $name ) {
				$services[ $code ][ $key ]['enabled'] = isset( $_POST['usps_service'][ $code ][ $key ]['enabled'] ) ? true : false;
			}
		}

		return $services;
	}

	public function validate_auth_services_field( $key ) {
		$services = array();
		if ( ! ( isset( $_POST ) && isset( $_POST['_elex_ajax_nonce'] ) && wp_verify_nonce( sanitize_text_field( $_POST['_elex_ajax_nonce'] ), '_elex_usps_shipping_ajax_nonce' ) ) && isset( $_POST['usps_service'] ) ) {
			return;
		}
		foreach ( $this->auth_services as $code => $service ) {
			if ( isset( $_POST['usps_auth_service'][ $code ]['order'] ) ) {
				$services[ $code ] = array(
					// 'name'               => wc_clean( $settings['name'] ),
					'order' => wc_clean( sanitize_text_field( $_POST['usps_auth_service'][ $code ]['order'] ) ),
				);
			}
			foreach ( $service['services'] as $key => $name ) {
				$services[ $code ][ $key ]['enabled'] = isset( $_POST['usps_auth_service'][ $code ][ $key ]['enabled'] ) ? true : false;
			}
		}

		return $services;
	}

	/**
	 * Clear_transients function.
	 *
	 * @accesss public
	 * @return void
	 */
	public function clear_transients() {
		global $wpdb;

		$wpdb->query( "DELETE FROM `$wpdb->options` WHERE `option_name` LIKE ('_transient_usps_quote_%') OR `option_name` LIKE ('_transient_timeout_usps_quote_%')" );
	}
	
	public function generate_marketing_content_html() {
		ob_start();
		$plugin_name = 'usps';
		include  'html-wf-market-content.php' ;
		return ob_get_clean();
	}


	/**
	* Tabs function
	*
	* @accesss public
	* @return void
	*/
	public function generate_usps_tabs_html() {
		$current_tab = ( ! empty( $_GET['subtab'] ) ) ? sanitize_text_field( $_GET['subtab'] ) : 'general';
		echo '
                <div class="wrap">
                    <script>
                    jQuery(function($){
                    show_selected_tab($(".tab_general"),"general");
                    $(".tab_general").on("click",function(){
                        return show_selected_tab($(this),"general");
                    });
                    $(".tab_rates").on("click",function(){
                        return show_selected_tab($(this),"rates");
                    });
                    $(".tab_labels").on("click",function(){
                    });
                    $(".tab_packing").on("click",function(){
                    });
                    $(".tab_gopremium").on("click",function(){                                                
                        return show_selected_tab($(this),"gopremium");
                    });
                    $(".tab_tracking").on("click",function(){                                                
                    });
                    function show_selected_tab($element,$tab)
                    {

                        $(".nav-tab").removeClass("nav-tab-active");
                        $element.addClass("nav-tab-active");             
                        $(".rates_tab_field").closest("tr,h3").hide();
                        $(".rates_tab_field").next("p").hide();

                        $(".general_tab_field").closest("tr,h3").hide();
                        $(".general_tab_field").next("p").hide();

                        $(".package_tab_field").closest("tr,h3").hide();
                        $(".package_tab_field").next("p").hide();

                        $(".label_tab_field").closest("tr,h3").hide();
                        $(".label_tab_field").next("p").hide();

                        $(".gopremium_tab_field").closest("tr,h3").hide();
                        $(".gopremium_tab_field").next("p").hide();

                        $(".tracking_tab_field").closest("tr,h3").hide();
                        $(".tracking_tab_field").next("p").hide();

                        $(".select2-search__field").closest("tr,h3").hide();
                        $(".select2-search__field").next("p").hide();                                     
                        if($tab=="gopremium")
                        {   
                            $(".marketing_content").show();
                        }else{
                            $(".marketing_content").hide();
                        }

                        $("."+$tab+"_tab_field").closest("tr,h3").show();
                        $("."+$tab+"_tab_field").next("p").show();

                        if($tab=="rates")
                            $("#woocommerce_wf_shipping_usps_availability").trigger("change");
                        
                        
                        
                        if($tab=="gopremium" || $tab=="package" || $tab=="tracking" || $tab=="label")
                        {
                            $(".woocommerce-save-button").hide();
                        }else
                        {
                            $(".woocommerce-save-button").show();
                        }
						
                        return false;
                    }   

                    });
                    </script>
                    <style>
                    .wrap {
                                min-height: 800px;
                            }
                    a.nav-tab{
                                cursor: default;
                    }
                    </style>
                    <hr class="wp-header-end">';
		$tabs = array(
			'general' => __( "General<span class='wf-super'></span>", 'wf-usps-stamps-woocommerce' ),
			'rates' => __( "Rates & Services<span class='wf-super'></span>", 'wf-usps-stamps-woocommerce' ),
			'packing' => __( "Packaging <span style='vertical-align: super;color:green;font-size:12px' >[Premium]</span>", 'wf-usps-stamps-woocommerce' ),
			'labels' => __( "Label Generation & Tracking <span style='vertical-align: super;color:green;font-size:12px' >[Premium]</span>", 'wf-usps-stamps-woocommerce' ),
			'gopremium' => __( "Go Premium! <span class='wf-super'></span>", 'wf-usps-stamps-woocommerce' ),
		);
		$html = '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $stab => $name ) {
			$class = ( $stab == $current_tab ) ? 'nav-tab-active' : '';
			$style = ( $stab == $current_tab ) ? 'border-bottom: 1px solid transparent !important;' : '';
			$style = ( 'gopremium' == $stab ) ? $style . 'color:red; !important;' : '';
			$html .= '<a style="text-decoration:none !important;' . $style . '" class="nav-tab ' . $class . ' tab_' . $stab . '" >' . $name . '</a>';
		}
		$html .= '</h2>';
		echo wp_kses_post( $html );
	}
	/**
	 * Init_form_fields function.
	 *
	 * @accesss public
	 * @return void
	 */
	public function init_form_fields() {


		global $woocommerce;

		$shipping_classes = array();
		$classes          = get_terms( 'product_shipping_class', array( 'hide_empty' => '0' ) );
		$classes          = ( $classes ) ? $classes : array();

		foreach ( $classes as $class ) {
			if ( ! empty( $class->name ) ) {
				$shipping_classes[ $class->term_id ] = $class->name;
			}
		}
		$credentials_url = '';
		if ( 'old_api' === $this->api_mode ) {
			$credentials_url = 'https://www.usps.com/business/web-tools-apis/welcome.htm';
		} else {
			$credentials_url = 'https://developer.usps.com/getting-started';
		}

		$this->form_fields = array(
			'usps_wrapper' => array(
				'type' => 'usps_tabs',
			),
			'enabled' => array(
				'title' => __( 'Realtime Rates', 'wf-usps-woocommerce-shipping' ),
				'type' => 'checkbox',
				'label' => __( 'Enable', 'wf-usps-woocommerce-shipping' ),
				'default' => 'no',
				'description' => __( 'Enable realtime rates on the Cart/Checkout page.', 'wf-usps-woocommerce-shipping' ),
				'desc_tip' => true,
				'class' => 'general_tab_field',
			),
			'title' => array(
				'title' => __( 'Method Title', 'wf-usps-woocommerce-shipping' ),
				'type' => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'wf-usps-woocommerce-shipping' ),
				'default' => __( 'USPS', 'wf-usps-woocommerce-shipping' ),
				'desc_tip' => true,
				'class' => 'rates_tab_field',
			),
			'availability' => array(
				'title' => __( 'Method Available to', 'wf-usps-woocommerce-shipping' ),
				'type' => 'select',
				'css' => 'padding: 0px;',
				'default' => 'all',
				'class' => 'rates_tab_field',
				'options' => array(
					'all' => __( 'All Countries', 'wf-usps-woocommerce-shipping' ),
					'specific' => __( 'Specific Countries', 'wf-usps-woocommerce-shipping' ),
				),
				
			),
			'countries' => array(
				'title' => __( 'Specific Countries', 'wf-usps-woocommerce-shipping' ),
				'type' => 'multiselect',
				'class' => 'chosen_select rates_tab_field',
				'css' => 'width: 450px;',
				'default' => '',
				'options' => $woocommerce->countries->get_allowed_countries(),
				'description' => __( 'Select the countries for which you want to avail the method.', 'wf-usps-woocommerce-shipping' ),
			),
			'origin' => array(
				'title' => __( 'Origin Postcode', 'wf-usps-woocommerce-shipping' ),
				'type' => 'text',
				'description' => __( 'Enter the postcode for the <strong>Shipper</strong>.', 'wf-usps-woocommerce-shipping' ),
				'default' => '',
				'desc_tip' => true,
				'class' => 'general_tab_field',
			),
			'api' => array(
				'title' => __( 'Common API Settings:', 'wf-usps-woocommerce-shipping' ),
				'type' => 'title',
				//%s refers to $credentials link
				'description' => sprintf( __( 'Obtain USPS credentials by signing up on %s.', 'wf-usps-woocommerce-shipping' ), '<a href="' . $credentials_url . '" target="_blank">' . __( 'the USPS website', 'wf-usps-woocommerce-shipping' ) . '</a>' ),
				'class' => 'general_tab_field',
			),
			'api_mode'                                 => array(
				'title'       => __( 'API Mode', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'select',
				'default'     => 'old_api',
				'class'       => 'general_tab_field',
				'description' => __( 'Choose the preferred API mode', 'wf-usps-woocommerce-shipping' ),
				'desc_tip'    => true,
				'options'     => array(
					'new_api' => __( 'USPS API 3.0', 'wf-usps-woocommerce-shipping' ),
					'old_api'              => __( 'USPS eVS', 'wf-usps-woocommerce-shipping' ),
				),
			),
			'integration_mode' => array(
				'title' => __( 'API Environment', 'wf-usps-woocommerce-shipping' ),
				'type' => 'select',
				'css' => 'padding: 0px;',
				'default' => 'LIVE',
				'options' => array(
					'LIVE' => __( 'Production', 'wf-usps-woocommerce-shipping' ),
					'TEST' => __( 'Sand Box', 'wf-usps-woocommerce-shipping' ),
				),
				'description' => __( 'To switch between sandbox and live mode, select the mode you need. Sandbox is for testing, while live is for actual use. Choose the right mode to avoid errors.', 'wf-usps-woocommerce-shipping' ),
				'desc_tip' => true,
				'class' => 'general_tab_field new_api_field new_api_general',
			),
			'client_id'                                   => array(
				'title'       => __( 'Client ID', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'text',
				'description' => __( 'Obtained from USPS after getting an account.', 'wf-usps-woocommerce-shipping' ),
				'class'       => 'general_tab_field new_api_field new_api_general',
				'default'     => '',
				'desc_tip'    => true,
			),
			'client_secret'                                   => array(
				'title'       => __( 'Client Secret', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'password',
				'description' => __( 'Obtained from USPS after getting an account.', 'wf-usps-woocommerce-shipping' ),
				'class'       => 'general_tab_field new_api_field new_api_general',
				'default'     => '',
				'desc_tip'    => true,
			),
			'user_id' => array(
				'title' => __( 'User ID', 'wf-usps-woocommerce-shipping' ),
				'type' => 'text',
				'description' => __( 'Obtained from USPS after getting an account.', 'wf-usps-woocommerce-shipping' ),
				'default' => '',
				'placeholder' => $this->default_user_id,
				'desc_tip' => true,
				'class' => 'general_tab_field old_api_field old_api_general',
			),
			'password'                                   => array(
				'title'       => __( 'Password', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'password',
				'description' => __( 'Obtained from USPS after getting an account.', 'wf-usps-woocommerce-shipping' ),
				'class'       => 'general_tab_field old_api_field old_api_general',
				'default'     => '',
				'desc_tip'    => true,
			),
			'debug_mode' => array(
				'title' => __( 'Debug', 'wf-usps-woocommerce-shipping' ),
				'label' => __( 'Enable debug mode', 'wf-usps-woocommerce-shipping' ),
				'type' => 'checkbox',
				'default' => 'no',
				'description' => __( 'Enable debug mode to show debugging information on your cart/checkout.', 'wf-usps-woocommerce-shipping' ),
				'class' => 'general_tab_field',
			),
			'rates' => array(
				'title' => __( 'Rates API Settings:', 'wf-usps-woocommerce-shipping' ),
				'type' => 'title',
				'description' => __( 'The following settings determine the rates you offer your customers.', 'wf-usps-woocommerce-shipping' ),
				'class' => 'rates_tab_field',
			),
			'rates_preference' => array(
				'title' => __( 'Rates Type', 'wf-usps-woocommerce-shipping' ),
				'type' => 'select',
				'css' => 'padding: 0px;',
				'default' => 'Commercial',
				'options' => array(
					'Retail' => __( 'Retail', 'wf-usps-woocommerce-shipping' ),
					'Commercial' => __( 'Commercial', 'wf-usps-woocommerce-shipping' ),
				),
				'description' => __( 'USPS retail rates are the standard prices available at post office counters, while USPS commercial rates (Commercial Base Pricing and Commercial Plus Pricing) provide discounted rates for businesses that meet specific volume and service usage criteria.', 'wf-usps-woocommerce-shipping' ),
				'desc_tip' => true,
				'class' => 'rates_tab_field  new_api_rates',
			),

			'shippingrates' => array(
				'title' => __( 'Shipping Rates', 'wf-usps-woocommerce-shipping' ),
				'type' => 'select',
				'css' => 'padding: 0px;',
				'default' => 'ONLINE',
				'options' => array(
					'ONLINE' => __( 'Use Click-N-Ship Rates', 'wf-usps-woocommerce-shipping' ),
					'ALL' => __( 'Use OFFLINE rates', 'wf-usps-woocommerce-shipping' ),
				),
				'description' => __( 'Choose which rates to show to your customers, Click-N-Ship (ONLINE) rates are normally cheaper than OFFLINE', 'wf-usps-woocommerce-shipping' ),
				'desc_tip' => true,
				'class' => 'rates_tab_field  old_api_rates',
			),
			'fallback' => array(
				'title' => __( 'Fallback', 'wf-usps-woocommerce-shipping' ),
				'type' => 'text',
				'description' => __( 'If USPS returns no matching rates, offer this amount for shipping so that the user can still checkout. Leave blank to disable.', 'wf-usps-woocommerce-shipping' ),
				'default' => '',
				'class' => 'rates_tab_field',
				'desc_tip' => true,
			),
			'estimated_title_old'                           => array(
				'title' => __( 'Estimated Delivery Date Settings <span class="wf-super">[Premium]</span>', 'wf-usps-woocommerce-shipping' ),
				'type'  => 'title',
				'class' => 'rates_tab_field old_api_rates',
			),
			'estimated_title'                           => array(
				'title' => __( 'Estimated Delivery Date Settings', 'wf-usps-woocommerce-shipping' ),
				'type'  => 'title',
				'class' => 'rates_tab_field new_api_rates',
			),
			'usps_est_delivery'                         => array(
				'title'       => __( 'Estimated Delivery Date', 'wf-usps-woocommerce-shipping' ),
				'label'       => __( 'Enable', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'checkbox',
				'default'     => 'no',
				'description' => __( 'On enabling this, estimated delivery date will shown for each service of USPS.', 'wf-usps-woocommerce-shipping' ),
				'desc_tip'    => true,
				'class'       => 'rates_tab_field new_api_rates',
			),
			'usps_working_days'                         => array(
				'title'       => __( 'Working Days', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'multiselect',
				'class'       => 'chosen_select  rates_tab_field new_api_rates',
				'description' => __( 'Configure the regular working days. The estimated delivery date will be calculated based on this. The shipment is supposed to happen only on working days.', 'wf-usps-woocommerce-shipping' ),
				'desc_tip'    => true,
				'options'     => array(
					'Sun' => 'Sunday',
					'Mon' => 'Monday',
					'Tue' => 'Tuesday',
					'Wed' => 'Wednesday',
					'Thu' => 'Thursday',
					'Fri' => 'Friday',
					'Sat' => 'Saturday',
				),
			),
			'usps_cut_off_time'                         => array(
				'title'       => __( 'Cut-Off Time', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'time',
				'class'       => 'rates_tab_field new_api_rates',
				'description' => __( 'Configure the cut-off time for your shipment. The orders placed after the cut-off time will be shipped on the next working day. The estimated delivery date will be displayed based on this.', 'wf-usps-woocommerce-shipping' ),
				'desc_tip'    => true,
			),
			'usps_lead_time'                         => array(
				'title'       => __( 'Lead Time', 'wf-usps-woocommerce-shipping' ),
				'type'        => 'number',
				'class'       => 'rates_tab_field new_api_rates',
				'description' => __( 'Set the lead time for your shipment, with a maximum of 30 days. The estimated delivery date will be displayed accordingly', 'wf-usps-woocommerce-shipping' ),
				'placeholder' => 'Days',
				'desc_tip'    => true,
			),
			'flat_rates'          => array(
				'title'           => __( 'Extra Services: <span class="wf-super">[Premium]</span>', 'wf-usps-woocommerce-shipping' ),
				'type'            => 'title',
				'class'           => 'rates_tab_field new_api_rates',
			),
			'standard_rates' => array(
				'title' => __( 'Services, Rates and Packing:', 'wf-usps-woocommerce-shipping' ),
				'type' => 'title',
				'class' => 'rates_tab_field',
			),

			'offer_rates' => array(
				'title' => __( 'Offer Rates', 'wf-usps-woocommerce-shipping' ),
				'type' => 'select',
				'css' => 'padding: 0px;',
				'description' => '',
				'default' => 'all',
				'options' => array(
					'all' => __( 'Offer the customer all returned rates', 'wf-usps-woocommerce-shipping' ),
					'cheapest' => __( 'Offer the customer the cheapest rate only', 'wf-usps-woocommerce-shipping' ),
				),
				'class' => 'rates_tab_field',
			),
			'services'  => array(
				'type'            => 'services',
				'class'           => 'rates_tab_field old_api_rates',
			),
			'auth_services' => array(
				'type' => 'auth_services',
				'class' => 'rates_tab_field new_api_rates',
			),
			'mediamail_restriction' => array(
				'title' => __( 'Allow media mail', 'wf-usps-woocommerce-shipping' ),
				'type' => 'multiselect',
				'class' => 'chosen_select general_tab_field',
				'css' => 'width: 450px;',
				'default' => '',
				'description' => __( 'Select the shipping classes for which you want to include Media Mail Rate.', 'wf-usps-woocommerce-shipping' ),
				'options' => $shipping_classes,
				'custom_attributes' => array(
					'data-placeholder' => __( 'No restrictions', 'wf-usps-woocommerce-shipping' ),
				),
				'desc_tip' => true,
			),
			'gopremium'  => array(
				'type'            => 'marketing_content',
			),  
				
		);
		/**  Fire a filter hook for form field
		*
		* @since 2002
		*/
		$this->form_fields = apply_filters( 'elex_usps_shipping_settings_form_fields', $this->form_fields );
	}

	public function test_user_id() {
	
		require_once 'class-elex-api-request.php';
		$request_object = new ELEX_Shipping_API_Request();
	
		if ( ( ! ( isset( $_POST ) && isset( $_POST['_elex_ajax_nonce'] ) && wp_verify_nonce( sanitize_text_field( $_POST['_elex_ajax_nonce'] ), '_elex_usps_shipping_ajax_nonce' ) ) ) ) {
			
			return;
			
		}
		if ( ! ( isset( $_POST['woocommerce_wf_shipping_usps_api_mode'] ) ) ) {
			return;
		}
		if ( 'old_api' === sanitize_text_field( $_POST['woocommerce_wf_shipping_usps_api_mode'] ) ) {
			$request_object->Elex_USPS_evs_test_request();
		} else {
			$request_object->Elex_USPS_Auth_test_request();
		}


	
	}

	/**
	 * Get Parsed XML response
	 *
	 * @param  string $xml
	 * @return string|bool
	 */
	protected function get_parsed_xml( $xml ) {
		if ( ! class_exists( 'ELEX_Safe_DOMDocument' ) ) {
			include_once  'class-elex-safe-domdocument.php' ;
		}

		libxml_use_internal_errors( true );

		$dom     = new ELEX_Safe_DOMDocument();
		$success = $dom->loadXML( $xml );

		if ( ! $success ) {
			if ( $this->debug ) {
				trigger_error( 'wpcom_safe_simplexml_load_string(): Error loading XML string', E_USER_WARNING );
			}
			return false;
		}

		if ( isset( $dom->doctype ) ) {
			if ( $this->debug ) {
				trigger_error( 'wpcom_safe_simplexml_import_dom(): Unsafe DOCTYPE Detected', E_USER_WARNING );
			}
			return false;
		}

		return simplexml_import_dom( $dom, 'SimpleXMLElement' );
	}

	/**
	 * Calculate_shipping function.
	 *
	 * @accesss public
	 * @param mixed $package
	 * @return void
	 */
	public function calculate_shipping( $package = array() ) {
		
		require_once 'class-elex-api-request.php';
		$request_object = new ELEX_Shipping_API_Request();
	
		if ( ! ( isset( $this->api_mode ) ) ) {
			return;
		}
		if ( 'old_api' === sanitize_text_field( $this->api_mode ) ) {
			$found_rates_evs = $request_object->Elex_USPS_evs_Calculate_shipping( $package );
			if ( is_array( $found_rates_evs ) ) {
				if ( 'all' == $this->offer_rates ) {
					uasort( $found_rates_evs, array( $this, 'sort_rates' ) );

					foreach ( $found_rates_evs as $key => $rate ) {
					
						$this->add_rate( $rate );

					}
				} else {

					$cheapest_rate = '';

					foreach ( $found_rates_evs as $key => $rate ) {
						if ( ! $cheapest_rate || $cheapest_rate['cost'] > $rate['cost'] ) {
							$cheapest_rate = $rate;
						}
					}

					$cheapest_rate['label'] = $this->title;

					$this->add_rate( $cheapest_rate );
				}  
			}
		} else {
			$auth_found_rates = $request_object->Elex_USPS_Auth_Calculate_shipping( $package );
			if ( is_array( $auth_found_rates ) ) {
				if ( 'all' == $this->offer_rates ) {
					uasort( $auth_found_rates, array( $this, 'sort_rates' ) );

					foreach ( $auth_found_rates as $key => $rate ) {
						$this->add_rate( $rate );
					}
				} else {

					$cheapest_rate = '';

					foreach ( $auth_found_rates as $key => $rate ) {
						if ( ! $cheapest_rate || $cheapest_rate['cost'] > $rate['cost'] ) {
							$cheapest_rate = $rate;
						}
					}

					$cheapest_rate['label'] = $this->title;

					$this->add_rate( $cheapest_rate );
				} 
			}
		}
		
	}

	/**
	 * Prepare_rate function.
	 *
	 * @accesss protected
	 * @param mixed $rate_code
	 * @param mixed $rate_id
	 * @param mixed $rate_name
	 * @param mixed $rate_cost
	 * @return void
	 */
	protected function prepare_rate( $rate_code, $rate_id, $rate_name, $rate_cost ) {
	

		// Name adjustment
		if ( ! empty( $this->custom_services[ $rate_code ]['name'] ) ) {
			$rate_name = $this->custom_services[ $rate_code ]['name'];
		}

		// Merging
		if ( isset( $this->found_rates[ $rate_id ] ) ) {
			$rate_cost = $rate_cost + $this->found_rates[ $rate_id ]['cost'];
			$packages  = 1 + $this->found_rates[ $rate_id ]['packages'];
		} else {
			$packages = 1;
		}

		// Sort
		if ( isset( $this->custom_services[ $rate_code ]['order'] ) ) {
			$sort = $this->custom_services[ $rate_code ]['order'];
		} else {
			$sort = 999;
		}

		$this->found_rates[ $rate_id ] = array(
			'id' => $rate_id,
			'label' => $rate_name,
			'cost' => $rate_cost,
			'sort' => $sort,
			'packages' => $packages,
		);
	}

	/**
	 * Sort_rates function.
	 *
	 * @accesss public
	 * @param mixed $a
	 * @param mixed $b
	 * @return void
	 */
	public function sort_rates( $a, $b ) {
		if ( $a['sort'] == $b['sort'] ) {
			return 0;
		}
		return ( $a['sort'] < $b['sort'] ) ? -1 : 1;
	}

	/**
	 * Get_request function.
	 *
	 * @accesss protected
	 * @return void
	 */
	protected function get_package_requests( $package ) {

		// Choose selected packing
		switch ( $this->packing_method ) {
			case 'box_packing':
				$requests = $this->box_shipping( $package );
				break;
			case 'weight_based':
				$requests = $this->weight_based_shipping( $package );
				break;
			case 'per_item':
			default:
				$requests = $this->per_item_shipping( $package );
				break;
		}

		return $requests;
	}

	/**
	 * Per_item_shipping function.
	 *
	 * @accesss protected
	 * @param mixed $package
	 * @return void
	 */
	protected function per_item_shipping( $package ) {
		global $woocommerce;

		$requests = array();
		$domestic = in_array( $package['destination']['country'], $this->domestic ) ? true : false;

		// Get weight of order
		foreach ( $package['contents'] as $item_id => $values ) {
			$packed_items   = array();
			$values['data'] = $this->wf_load_product( $values['data'] );
			if ( ! $values['data']->needs_shipping() ) {
				if ( null !== wc()->session ) {
					$debug_message = wc()->session->get( 'elex_usps_debug_message' );
					$debug_message .= "\n";
					$debug_message .= sprintf( 'Product %d is virtual. Skipping.', $item_id );
					$debug_message .= "\n";
					wc()->session->set( 'elex_usps_debug_message', $debug_message );
				}
				continue;
			}

			if ( ! $values['data']->get_weight() ) {
				if ( null !== wc()->session ) {
					$debug_message = wc()->session->get( 'elex_usps_debug_message' );
					$debug_message .= "\n";
					$debug_message .= sprintf( 'Product #%d is missing weight. Using 1lb.', $item_id );
					$debug_message .= "\n";
					wc()->session->set( 'elex_usps_debug_message', $debug_message );
				}

				$weight = 1;
			} else {
				if ( 'lbs' !== $this->weight_unit ) {
					$weight = wc_get_weight( $values['data']->get_weight(), 'lbs', $this->weight_unit );
				} else {
					$weight = $values['data']->get_weight();
				}
			}


			$size = 'REGULAR';

			if ( $values['data']->length && $values['data']->height && $values['data']->width ) {

				$dimensions = array( wc_get_dimension( $values['data']->length, 'in' ), wc_get_dimension( $values['data']->height, 'in' ), wc_get_dimension( $values['data']->width, 'in' ) );

				sort( $dimensions );

				if ( max( $dimensions ) > 12 ) {
					$size = 'LARGE';
				}           
			} else {
				$dimensions = array( 0, 0, 0 );
			}

			if ( $domestic ) {

				$request  = '<Package ID="' . $this->generate_package_id( $item_id, $values['quantity'], $dimensions[2], $dimensions[1], $dimensions[0], $weight ) . '">' . "\n";
				$request .= '	<Service>' . ( ! $this->settings['shippingrates'] ? 'ONLINE' : $this->settings['shippingrates'] ) . '</Service>' . "\n";
				$request .= '	<ZipOrigination>' . str_replace( ' ', '', strtoupper( $this->origin ) ) . '</ZipOrigination>' . "\n";
				$request .= '	<ZipDestination>' . strtoupper( substr( $package['destination']['postcode'], 0, 5 ) ) . '</ZipDestination>' . "\n";
				$request .= '	<Pounds>' . $weight . '</Pounds>' . "\n";
				$request .= '	<Ounces>0</Ounces>' . "\n";

				if ( 'LARGE' === $size ) {
					$request .= '	<Container>RECTANGULAR</Container>' . "\n";
				} else {
					$request .= '	<Container />' . "\n";
				}

				$request .= '	<Size>' . $size . '</Size>' . "\n";
				$request .= '	<Width>' . $dimensions[1] . '</Width>' . "\n";
				$request .= '	<Length>' . $dimensions[2] . '</Length>' . "\n";
				$request .= '	<Height>' . $dimensions[0] . '</Height>' . "\n";
				$request .= '	<Girth></Girth>' . "\n";
				$request .= '	<Machinable>true</Machinable> ' . "\n";
				$request .= '	<ShipDate>' . gmdate( 'd-M-Y', ( current_time( 'timestamp' ) + ( 60 * 60 * 24 ) ) ) . '</ShipDate>' . "\n";
				$request .= '</Package>' . "\n";
			} else {

				$request  = '<Package ID="' . $this->generate_package_id( $item_id, $values['quantity'], $dimensions[2], $dimensions[1], $dimensions[0], $weight ) . '">' . "\n";
				$request .= '	<Pounds>' . floor( $weight ) . '</Pounds>' . "\n";
				$request .= '	<Ounces>0</Ounces>' . "\n";
				$request .= '	<Machinable>true</Machinable> ' . "\n";
				$request .= '	<MailType>Package</MailType>' . "\n";
				$request .= '	<ValueOfContents>' . $values['data']->get_price() . '</ValueOfContents>' . "\n";
				$request .= '	<Country>' . $this->get_country_name( $package['destination']['country'] ) . '</Country>' . "\n";

				$request .= '	<Container>RECTANGULAR</Container>' . "\n";

				$request .= '	<Size>' . $size . '</Size>' . "\n";
				$request .= '	<Width>' . $dimensions[1] . '</Width>' . "\n";
				$request .= '	<Length>' . $dimensions[2] . '</Length>' . "\n";
				$request .= '	<Height>' . $dimensions[0] . '</Height>' . "\n";
				$request .= '	<Girth></Girth>' . "\n";
				$request .= '	<OriginZip>' . str_replace( ' ', '', strtoupper( $this->origin ) ) . '</OriginZip>' . "\n";
				$request .= '	<CommercialFlag>' . ( 'ONLINE' == $this->settings['shippingrates'] ? 'Y' : 'N' ) . '</CommercialFlag>' . "\n";
				$request .= '</Package>' . "\n";
			}
			$item_data = wc_get_product( $item_id );

			if ( $item_data ) {// Front-end price call doesn't need this data
				$item_id                = $item_data->variation_id ? $item_data->variation_id : $item_data->id;
				$packed_items[ $item_id ] = array(
					'product_name' => $item_data->get_title(),
					'qty' => 1,
				);
				if ( $item_data->variation_id ) {
					$packed_items[ $item_id ]['variation_text'] = $this->wf_get_variation_data_from_variation_id( $item_data->variation_id );
				}
			}
			$package_info = array(
				'items' => $packed_items,
				'dimension' => array(
					'length' => $dimensions[2],
					'width' => $dimensions[1],
					'height' => $dimensions[0],
					'weight' => $weight,
				),
				'units' => array(
					'dimension' => 'in',
					'weight' => 'lbs',
				),
			);
			$requests[]   = array(
				'request_data' => $request,
				'package_info' => $package_info,
			);
		}
		return $requests;
	}

	/**
	 * Generate a package ID for the request
	 *
	 * Contains qty and dimension info so we can look at it again later when it comes back from USPS if needed
	 *
	 * @return string
	 */
	public function generate_package_id( $id, $qty, $length, $width, $height, $weight ) {
		return implode( ':', array( $id, $qty, $length, $width, $height, $weight ) );
	}

	/**
	 * Get_country_name function.
	 *
	 * @accesss protected
	 * @return void
	 */
	public function get_country_name( $code ) {
			/** 
		 * Fire a filter hook for usps_country
		 *
		 * @since 2002
		 * @param $package
		 */  
		$countries = apply_filters(
			'usps_countries',
			array(
				'AF' => __( 'Afghanistan', 'wf-usps-woocommerce-shipping' ),
				'AX' => __( '&#197;land Islands', 'wf-usps-woocommerce-shipping' ),
				'AL' => __( 'Albania', 'wf-usps-woocommerce-shipping' ),
				'DZ' => __( 'Algeria', 'wf-usps-woocommerce-shipping' ),
				'AD' => __( 'Andorra', 'wf-usps-woocommerce-shipping' ),
				'AO' => __( 'Angola', 'wf-usps-woocommerce-shipping' ),
				'AI' => __( 'Anguilla', 'wf-usps-woocommerce-shipping' ),
				'AQ' => __( 'Antarctica', 'wf-usps-woocommerce-shipping' ),
				'AG' => __( 'Antigua and Barbuda', 'wf-usps-woocommerce-shipping' ),
				'AR' => __( 'Argentina', 'wf-usps-woocommerce-shipping' ),
				'AM' => __( 'Armenia', 'wf-usps-woocommerce-shipping' ),
				'AW' => __( 'Aruba', 'wf-usps-woocommerce-shipping' ),
				'AU' => __( 'Australia', 'wf-usps-woocommerce-shipping' ),
				'AT' => __( 'Austria', 'wf-usps-woocommerce-shipping' ),
				'AZ' => __( 'Azerbaijan', 'wf-usps-woocommerce-shipping' ),
				'BS' => __( 'Bahamas', 'wf-usps-woocommerce-shipping' ),
				'BH' => __( 'Bahrain', 'wf-usps-woocommerce-shipping' ),
				'BD' => __( 'Bangladesh', 'wf-usps-woocommerce-shipping' ),
				'BB' => __( 'Barbados', 'wf-usps-woocommerce-shipping' ),
				'BY' => __( 'Belarus', 'wf-usps-woocommerce-shipping' ),
				'BE' => __( 'Belgium', 'wf-usps-woocommerce-shipping' ),
				'PW' => __( 'Belau', 'wf-usps-woocommerce-shipping' ),
				'BZ' => __( 'Belize', 'wf-usps-woocommerce-shipping' ),
				'BJ' => __( 'Benin', 'wf-usps-woocommerce-shipping' ),
				'BM' => __( 'Bermuda', 'wf-usps-woocommerce-shipping' ),
				'BT' => __( 'Bhutan', 'wf-usps-woocommerce-shipping' ),
				'BO' => __( 'Bolivia', 'wf-usps-woocommerce-shipping' ),
				'BQ' => __( 'Bonaire, Saint Eustatius and Saba', 'wf-usps-woocommerce-shipping' ),
				'BA' => __( 'Bosnia and Herzegovina', 'wf-usps-woocommerce-shipping' ),
				'BW' => __( 'Botswana', 'wf-usps-woocommerce-shipping' ),
				'BV' => __( 'Bouvet Island', 'wf-usps-woocommerce-shipping' ),
				'BR' => __( 'Brazil', 'wf-usps-woocommerce-shipping' ),
				'IO' => __( 'British Indian Ocean Territory', 'wf-usps-woocommerce-shipping' ),
				'VG' => __( 'British Virgin Islands', 'wf-usps-woocommerce-shipping' ),
				'BN' => __( 'Brunei', 'wf-usps-woocommerce-shipping' ),
				'BG' => __( 'Bulgaria', 'wf-usps-woocommerce-shipping' ),
				'BF' => __( 'Burkina Faso', 'wf-usps-woocommerce-shipping' ),
				'BI' => __( 'Burundi', 'wf-usps-woocommerce-shipping' ),
				'KH' => __( 'Cambodia', 'wf-usps-woocommerce-shipping' ),
				'CM' => __( 'Cameroon', 'wf-usps-woocommerce-shipping' ),
				'CA' => __( 'Canada', 'wf-usps-woocommerce-shipping' ),
				'CV' => __( 'Cape Verde', 'wf-usps-woocommerce-shipping' ),
				'KY' => __( 'Cayman Islands', 'wf-usps-woocommerce-shipping' ),
				'CF' => __( 'Central African Republic', 'wf-usps-woocommerce-shipping' ),
				'TD' => __( 'Chad', 'wf-usps-woocommerce-shipping' ),
				'CL' => __( 'Chile', 'wf-usps-woocommerce-shipping' ),
				'CN' => __( 'China', 'wf-usps-woocommerce-shipping' ),
				'CX' => __( 'Christmas Island', 'wf-usps-woocommerce-shipping' ),
				'CC' => __( 'Cocos (Keeling) Islands', 'wf-usps-woocommerce-shipping' ),
				'CO' => __( 'Colombia', 'wf-usps-woocommerce-shipping' ),
				'KM' => __( 'Comoros', 'wf-usps-woocommerce-shipping' ),
				'CG' => __( 'Congo (Brazzaville)', 'wf-usps-woocommerce-shipping' ),
				'CD' => __( 'Congo (Kinshasa)', 'wf-usps-woocommerce-shipping' ),
				'CK' => __( 'Cook Islands', 'wf-usps-woocommerce-shipping' ),
				'CR' => __( 'Costa Rica', 'wf-usps-woocommerce-shipping' ),
				'HR' => __( 'Croatia', 'wf-usps-woocommerce-shipping' ),
				'CU' => __( 'Cuba', 'wf-usps-woocommerce-shipping' ),
				'CW' => __( 'Cura&Ccedil;ao', 'wf-usps-woocommerce-shipping' ),
				'CY' => __( 'Cyprus', 'wf-usps-woocommerce-shipping' ),
				'CZ' => __( 'Czech Republic', 'wf-usps-woocommerce-shipping' ),
				'DK' => __( 'Denmark', 'wf-usps-woocommerce-shipping' ),
				'DJ' => __( 'Djibouti', 'wf-usps-woocommerce-shipping' ),
				'DM' => __( 'Dominica', 'wf-usps-woocommerce-shipping' ),
				'DO' => __( 'Dominican Republic', 'wf-usps-woocommerce-shipping' ),
				'EC' => __( 'Ecuador', 'wf-usps-woocommerce-shipping' ),
				'EG' => __( 'Egypt', 'wf-usps-woocommerce-shipping' ),
				'SV' => __( 'El Salvador', 'wf-usps-woocommerce-shipping' ),
				'GQ' => __( 'Equatorial Guinea', 'wf-usps-woocommerce-shipping' ),
				'ER' => __( 'Eritrea', 'wf-usps-woocommerce-shipping' ),
				'EE' => __( 'Estonia', 'wf-usps-woocommerce-shipping' ),
				'ET' => __( 'Ethiopia', 'wf-usps-woocommerce-shipping' ),
				'FK' => __( 'Falkland Islands', 'wf-usps-woocommerce-shipping' ),
				'FO' => __( 'Faroe Islands', 'wf-usps-woocommerce-shipping' ),
				'FJ' => __( 'Fiji', 'wf-usps-woocommerce-shipping' ),
				'FI' => __( 'Finland', 'wf-usps-woocommerce-shipping' ),
				'FR' => __( 'France', 'wf-usps-woocommerce-shipping' ),
				'GF' => __( 'French Guiana', 'wf-usps-woocommerce-shipping' ),
				'PF' => __( 'French Polynesia', 'wf-usps-woocommerce-shipping' ),
				'TF' => __( 'French Southern Territories', 'wf-usps-woocommerce-shipping' ),
				'GA' => __( 'Gabon', 'wf-usps-woocommerce-shipping' ),
				'GM' => __( 'Gambia', 'wf-usps-woocommerce-shipping' ),
				'GE' => __( 'Georgia', 'wf-usps-woocommerce-shipping' ),
				'DE' => __( 'Germany', 'wf-usps-woocommerce-shipping' ),
				'GH' => __( 'Ghana', 'wf-usps-woocommerce-shipping' ),
				'GI' => __( 'Gibraltar', 'wf-usps-woocommerce-shipping' ),
				'GR' => __( 'Greece', 'wf-usps-woocommerce-shipping' ),
				'GL' => __( 'Greenland', 'wf-usps-woocommerce-shipping' ),
				'GD' => __( 'Grenada', 'wf-usps-woocommerce-shipping' ),
				'GP' => __( 'Guadeloupe', 'wf-usps-woocommerce-shipping' ),
				'GT' => __( 'Guatemala', 'wf-usps-woocommerce-shipping' ),
				'GG' => __( 'Guernsey', 'wf-usps-woocommerce-shipping' ),
				'GN' => __( 'Guinea', 'wf-usps-woocommerce-shipping' ),
				'GW' => __( 'Guinea-Bissau', 'wf-usps-woocommerce-shipping' ),
				'GY' => __( 'Guyana', 'wf-usps-woocommerce-shipping' ),
				'HT' => __( 'Haiti', 'wf-usps-woocommerce-shipping' ),
				'HM' => __( 'Heard Island and McDonald Islands', 'wf-usps-woocommerce-shipping' ),
				'HN' => __( 'Honduras', 'wf-usps-woocommerce-shipping' ),
				'HK' => __( 'Hong Kong', 'wf-usps-woocommerce-shipping' ),
				'HU' => __( 'Hungary', 'wf-usps-woocommerce-shipping' ),
				'IS' => __( 'Iceland', 'wf-usps-woocommerce-shipping' ),
				'IN' => __( 'India', 'wf-usps-woocommerce-shipping' ),
				'ID' => __( 'Indonesia', 'wf-usps-woocommerce-shipping' ),
				'IR' => __( 'Iran', 'wf-usps-woocommerce-shipping' ),
				'IQ' => __( 'Iraq', 'wf-usps-woocommerce-shipping' ),
				'IE' => __( 'Ireland', 'wf-usps-woocommerce-shipping' ),
				'IM' => __( 'Isle of Man', 'wf-usps-woocommerce-shipping' ),
				'IL' => __( 'Israel', 'wf-usps-woocommerce-shipping' ),
				'IT' => __( 'Italy', 'wf-usps-woocommerce-shipping' ),
				'CI' => __( 'Ivory Coast', 'wf-usps-woocommerce-shipping' ),
				'JM' => __( 'Jamaica', 'wf-usps-woocommerce-shipping' ),
				'JP' => __( 'Japan', 'wf-usps-woocommerce-shipping' ),
				'JE' => __( 'Jersey', 'wf-usps-woocommerce-shipping' ),
				'JO' => __( 'Jordan', 'wf-usps-woocommerce-shipping' ),
				'KZ' => __( 'Kazakhstan', 'wf-usps-woocommerce-shipping' ),
				'KE' => __( 'Kenya', 'wf-usps-woocommerce-shipping' ),
				'KI' => __( 'Kiribati', 'wf-usps-woocommerce-shipping' ),
				'KW' => __( 'Kuwait', 'wf-usps-woocommerce-shipping' ),
				'KG' => __( 'Kyrgyzstan', 'wf-usps-woocommerce-shipping' ),
				'LA' => __( 'Laos', 'wf-usps-woocommerce-shipping' ),
				'LV' => __( 'Latvia', 'wf-usps-woocommerce-shipping' ),
				'LB' => __( 'Lebanon', 'wf-usps-woocommerce-shipping' ),
				'LS' => __( 'Lesotho', 'wf-usps-woocommerce-shipping' ),
				'LR' => __( 'Liberia', 'wf-usps-woocommerce-shipping' ),
				'LY' => __( 'Libya', 'wf-usps-woocommerce-shipping' ),
				'LI' => __( 'Liechtenstein', 'wf-usps-woocommerce-shipping' ),
				'LT' => __( 'Lithuania', 'wf-usps-woocommerce-shipping' ),
				'LU' => __( 'Luxembourg', 'wf-usps-woocommerce-shipping' ),
				'MO' => __( 'Macao S.A.R., China', 'wf-usps-woocommerce-shipping' ),
				'MK' => __( 'Macedonia', 'wf-usps-woocommerce-shipping' ),
				'MG' => __( 'Madagascar', 'wf-usps-woocommerce-shipping' ),
				'MW' => __( 'Malawi', 'wf-usps-woocommerce-shipping' ),
				'MY' => __( 'Malaysia', 'wf-usps-woocommerce-shipping' ),
				'MV' => __( 'Maldives', 'wf-usps-woocommerce-shipping' ),
				'ML' => __( 'Mali', 'wf-usps-woocommerce-shipping' ),
				'MT' => __( 'Malta', 'wf-usps-woocommerce-shipping' ),
				'MH' => __( 'Marshall Islands', 'wf-usps-woocommerce-shipping' ),
				'MQ' => __( 'Martinique', 'wf-usps-woocommerce-shipping' ),
				'MR' => __( 'Mauritania', 'wf-usps-woocommerce-shipping' ),
				'MU' => __( 'Mauritius', 'wf-usps-woocommerce-shipping' ),
				'YT' => __( 'Mayotte', 'wf-usps-woocommerce-shipping' ),
				'MX' => __( 'Mexico', 'wf-usps-woocommerce-shipping' ),
				'FM' => __( 'Micronesia', 'wf-usps-woocommerce-shipping' ),
				'MD' => __( 'Moldova', 'wf-usps-woocommerce-shipping' ),
				'MC' => __( 'Monaco', 'wf-usps-woocommerce-shipping' ),
				'MN' => __( 'Mongolia', 'wf-usps-woocommerce-shipping' ),
				'ME' => __( 'Montenegro', 'wf-usps-woocommerce-shipping' ),
				'MS' => __( 'Montserrat', 'wf-usps-woocommerce-shipping' ),
				'MA' => __( 'Morocco', 'wf-usps-woocommerce-shipping' ),
				'MZ' => __( 'Mozambique', 'wf-usps-woocommerce-shipping' ),
				'MM' => __( 'Myanmar', 'wf-usps-woocommerce-shipping' ),
				'NA' => __( 'Namibia', 'wf-usps-woocommerce-shipping' ),
				'NR' => __( 'Nauru', 'wf-usps-woocommerce-shipping' ),
				'NP' => __( 'Nepal', 'wf-usps-woocommerce-shipping' ),
				'NL' => __( 'Netherlands', 'wf-usps-woocommerce-shipping' ),
				'AN' => __( 'Netherlands Antilles', 'wf-usps-woocommerce-shipping' ),
				'NC' => __( 'New Caledonia', 'wf-usps-woocommerce-shipping' ),
				'NZ' => __( 'New Zealand', 'wf-usps-woocommerce-shipping' ),
				'NI' => __( 'Nicaragua', 'wf-usps-woocommerce-shipping' ),
				'NE' => __( 'Niger', 'wf-usps-woocommerce-shipping' ),
				'NG' => __( 'Nigeria', 'wf-usps-woocommerce-shipping' ),
				'NU' => __( 'Niue', 'wf-usps-woocommerce-shipping' ),
				'NF' => __( 'Norfolk Island', 'wf-usps-woocommerce-shipping' ),
				'KP' => __( 'North Korea', 'wf-usps-woocommerce-shipping' ),
				'NO' => __( 'Norway', 'wf-usps-woocommerce-shipping' ),
				'OM' => __( 'Oman', 'wf-usps-woocommerce-shipping' ),
				'PK' => __( 'Pakistan', 'wf-usps-woocommerce-shipping' ),
				'PS' => __( 'Palestinian Territory', 'wf-usps-woocommerce-shipping' ),
				'PA' => __( 'Panama', 'wf-usps-woocommerce-shipping' ),
				'PG' => __( 'Papua New Guinea', 'wf-usps-woocommerce-shipping' ),
				'PY' => __( 'Paraguay', 'wf-usps-woocommerce-shipping' ),
				'PE' => __( 'Peru', 'wf-usps-woocommerce-shipping' ),
				'PH' => __( 'Philippines', 'wf-usps-woocommerce-shipping' ),
				'PN' => __( 'Pitcairn', 'wf-usps-woocommerce-shipping' ),
				'PL' => __( 'Poland', 'wf-usps-woocommerce-shipping' ),
				'PT' => __( 'Portugal', 'wf-usps-woocommerce-shipping' ),
				'QA' => __( 'Qatar', 'wf-usps-woocommerce-shipping' ),
				'RE' => __( 'Reunion', 'wf-usps-woocommerce-shipping' ),
				'RO' => __( 'Romania', 'wf-usps-woocommerce-shipping' ),
				'RU' => __( 'Russia', 'wf-usps-woocommerce-shipping' ),
				'RW' => __( 'Rwanda', 'wf-usps-woocommerce-shipping' ),
				'BL' => __( 'Saint Barth&eacute;lemy', 'wf-usps-woocommerce-shipping' ),
				'SH' => __( 'Saint Helena', 'wf-usps-woocommerce-shipping' ),
				'KN' => __( 'Saint Kitts and Nevis', 'wf-usps-woocommerce-shipping' ),
				'LC' => __( 'Saint Lucia', 'wf-usps-woocommerce-shipping' ),
				'MF' => __( 'Saint Martin (French part)', 'wf-usps-woocommerce-shipping' ),
				'SX' => __( 'Saint Martin (Dutch part)', 'wf-usps-woocommerce-shipping' ),
				'PM' => __( 'Saint Pierre and Miquelon', 'wf-usps-woocommerce-shipping' ),
				'VC' => __( 'Saint Vincent and the Grenadines', 'wf-usps-woocommerce-shipping' ),
				'SM' => __( 'San Marino', 'wf-usps-woocommerce-shipping' ),
				'ST' => __( 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'wf-usps-woocommerce-shipping' ),
				'SA' => __( 'Saudi Arabia', 'wf-usps-woocommerce-shipping' ),
				'SN' => __( 'Senegal', 'wf-usps-woocommerce-shipping' ),
				'RS' => __( 'Serbia', 'wf-usps-woocommerce-shipping' ),
				'SC' => __( 'Seychelles', 'wf-usps-woocommerce-shipping' ),
				'SL' => __( 'Sierra Leone', 'wf-usps-woocommerce-shipping' ),
				'SG' => __( 'Singapore', 'wf-usps-woocommerce-shipping' ),
				'SK' => __( 'Slovakia', 'wf-usps-woocommerce-shipping' ),
				'SI' => __( 'Slovenia', 'wf-usps-woocommerce-shipping' ),
				'SB' => __( 'Solomon Islands', 'wf-usps-woocommerce-shipping' ),
				'SO' => __( 'Somalia', 'wf-usps-woocommerce-shipping' ),
				'ZA' => __( 'South Africa', 'wf-usps-woocommerce-shipping' ),
				'GS' => __( 'South Georgia/Sandwich Islands', 'wf-usps-woocommerce-shipping' ),
				'KR' => __( 'South Korea', 'wf-usps-woocommerce-shipping' ),
				'SS' => __( 'South Sudan', 'wf-usps-woocommerce-shipping' ),
				'ES' => __( 'Spain', 'wf-usps-woocommerce-shipping' ),
				'LK' => __( 'Sri Lanka', 'wf-usps-woocommerce-shipping' ),
				'SD' => __( 'Sudan', 'wf-usps-woocommerce-shipping' ),
				'SR' => __( 'Suriname', 'wf-usps-woocommerce-shipping' ),
				'SJ' => __( 'Svalbard and Jan Mayen', 'wf-usps-woocommerce-shipping' ),
				'SZ' => __( 'Swaziland', 'wf-usps-woocommerce-shipping' ),
				'SE' => __( 'Sweden', 'wf-usps-woocommerce-shipping' ),
				'CH' => __( 'Switzerland', 'wf-usps-woocommerce-shipping' ),
				'SY' => __( 'Syria', 'wf-usps-woocommerce-shipping' ),
				'TW' => __( 'Taiwan', 'wf-usps-woocommerce-shipping' ),
				'TJ' => __( 'Tajikistan', 'wf-usps-woocommerce-shipping' ),
				'TZ' => __( 'Tanzania', 'wf-usps-woocommerce-shipping' ),
				'TH' => __( 'Thailand', 'wf-usps-woocommerce-shipping' ),
				'TL' => __( 'Timor-Leste', 'wf-usps-woocommerce-shipping' ),
				'TG' => __( 'Togo', 'wf-usps-woocommerce-shipping' ),
				'TK' => __( 'Tokelau', 'wf-usps-woocommerce-shipping' ),
				'TO' => __( 'Tonga', 'wf-usps-woocommerce-shipping' ),
				'TT' => __( 'Trinidad and Tobago', 'wf-usps-woocommerce-shipping' ),
				'TN' => __( 'Tunisia', 'wf-usps-woocommerce-shipping' ),
				'TR' => __( 'Turkey', 'wf-usps-woocommerce-shipping' ),
				'TM' => __( 'Turkmenistan', 'wf-usps-woocommerce-shipping' ),
				'TC' => __( 'Turks and Caicos Islands', 'wf-usps-woocommerce-shipping' ),
				'TV' => __( 'Tuvalu', 'wf-usps-woocommerce-shipping' ),
				'UG' => __( 'Uganda', 'wf-usps-woocommerce-shipping' ),
				'UA' => __( 'Ukraine', 'wf-usps-woocommerce-shipping' ),
				'AE' => __( 'United Arab Emirates', 'wf-usps-woocommerce-shipping' ),
				'GB' => __( 'United Kingdom', 'wf-usps-woocommerce-shipping' ),
				'US' => __( 'United States', 'wf-usps-woocommerce-shipping' ),
				'UY' => __( 'Uruguay', 'wf-usps-woocommerce-shipping' ),
				'UZ' => __( 'Uzbekistan', 'wf-usps-woocommerce-shipping' ),
				'VU' => __( 'Vanuatu', 'wf-usps-woocommerce-shipping' ),
				'VA' => __( 'Vatican', 'wf-usps-woocommerce-shipping' ),
				'VE' => __( 'Venezuela', 'wf-usps-woocommerce-shipping' ),
				'VN' => __( 'Vietnam', 'wf-usps-woocommerce-shipping' ),
				'WF' => __( 'Wallis and Futuna', 'wf-usps-woocommerce-shipping' ),
				'EH' => __( 'Western Sahara', 'wf-usps-woocommerce-shipping' ),
				'WS' => __( 'Western Samoa', 'wf-usps-woocommerce-shipping' ),
				'YE' => __( 'Yemen', 'wf-usps-woocommerce-shipping' ),
				'ZM' => __( 'Zambia', 'wf-usps-woocommerce-shipping' ),
				'ZW' => __( 'Zimbabwe', 'woocommerce' ),
			)
		);

		if ( isset( $countries[ $code ] ) ) {
			return strtoupper( $countries[ $code ] );
		} else {
			return false;
		}
	}

	public function debug( $message, $type = 'notice' ) {
		if ( $this->debug && ! is_admin() ) { //WF: is_admin check added.
			if ( version_compare( WOOCOMMERCE_VERSION, '2.1', '>=' ) ) {
				wc_add_notice( $message, $type );
			} else {
				global $woocommerce;
				$woocommerce->add_message( $message );
			}
		}
	}

	public function wf_get_variation_data_from_variation_id( $item_id ) {
		$_product         = new WC_Product_Variation( $item_id );
		
		$variation_data   = $_product->get_variation_attributes();
		$variation_detail = woocommerce_get_formatted_variation( $variation_data, true );  // this will give all variation detail in one line
		// $variation_detail = woocommerce_get_formatted_variation( $variation_data, false);  // this will give all variation detail one by one
		return $variation_detail; // $variation_detail will return string containing variation detail which can be used to print on website
		// return $variation_data; // $variation_data will return only the data which can be used to store variation data
	}

	protected function wf_load_product( $product ) {
		if ( ! $product ) {
			return false;
		}
		return ( WC()->version < '2.7.0' ) ? $product : new ELEX_Product( $product );
	}

}
