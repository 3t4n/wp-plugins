<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class WPCAV_Settings {

 

	 
	protected $textdomain;
	protected $version;
 
	 

	public function __construct($textdomain, $version) {

		$this -> textdomain = $textdomain;
		$this -> version = $version;
		 
		 
		add_filter( 'woocommerce_settings_tabs_array',array($this, 'add_settings_tab'), 50);
		add_action( 'woocommerce_settings_settings_alsoviewed',array($this, 'settings_tab'));
		add_action( 'woocommerce_update_options_settings_alsoviewed',array($this, 'update_settings'));
		
	    
	   

	}
	
	
	
 
	
	
	/**
	 * Add a new settings tab to the WooCommerce settings tabs array.
	 *
	 * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
	 * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
	 */
	public function add_settings_tab($settings_tabs) {
		$settings_tabs['settings_alsoviewed'] = __('Settings Also Viewed', $this -> textdomain);
		return $settings_tabs;
	}
	
	
		/**
	 * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
	 *
	 * @uses woocommerce_admin_fields()
	 * @uses $this -> settings
	 */
	public function settings_tab() {

		woocommerce_admin_fields($this -> get_settings());
	}
	
	
	/**
	 * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
	 *
	 * @uses woocommerce_update_options()
	 * @uses $this -> settings
	 */
	public function update_settings() {
		woocommerce_update_options($this -> get_settings());
	}
	
	
	
	/**
	 * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
	 *
	 * @return array Array of settings for @see woocommerce_admin_fields() function.
	 */
	public function get_settings() {

		  $settings = array(
            'section_title' => array(
                'name'     => __( 'Also Viewed Settings', $this -> textdomain ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'wc_settings_tab_alsoviewed_section_title'
            ),
			array(
				'name' => __('Theme Color Schema', $this -> textdomain) ,
				'desc' =>'',
				'id' => 'wc_settings_tab_color_schema',
				'type' => 'color',
				'default' => '#7bbd42',
				'css' => 'width:6em;',
				'autoload' => false
			),
            'title' => array(
                'name' => __( 'Title to be displayed', $this -> textdomain ),
                'type' => 'text',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_title',
				       'css' =>'min-width: 300px;'
            ),
            'total_items_display' => array(
                'name' => __( 'Number of items to be displayed', $this -> textdomain ),
                'type' => 'number',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_total_items_display',
				       'css' =>'min-width: 300px;'
            ),
            'category_filter' => array(
                'name' => __( 'Add category filter', $this -> textdomain ),
                'type' => 'checkbox',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_category_filter',
				       'default' => 'no',
							 'autoload' => false
            ),
            'show_image' => array(
                'name' => __( 'Show product rating', $this -> textdomain ),
                 'type' => 'checkbox',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_show_rating',
				       'default' => 'yes',
							 'autoload' => false
            ),
            'show_price' => array(
                'name' => __( 'Show product price', $this -> textdomain ),
                'type' => 'checkbox',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_show_price',
				        'default' => 'yes',
							 'autoload' => false
            ),
            'show_addtocart' => array(
                'name' => __( 'Show add to cart button', $this -> textdomain ),
                'type' => 'checkbox',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_show_addtocart',
				        'default' => 'yes',
							  'autoload' => false
            ),
            'product_order' => array(
                'name' => __( 'Order by', $this -> textdomain ),
                'type' => 'select',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_product_order',
				       'css' =>'min-width: 300px;',
				       'options' => array('recent'=> __( 'Recent', $this -> textdomain ),'rand'=> __( 'Random', $this -> textdomain ))
            ),
            'customcss' => array(
                'name' => __( 'Custom CSS', $this -> textdomain ),
                'type' => 'textarea',
                'desc' => '',
                'id'   => 'wc_settings_tab_alsoviewed_customcss',
				       'css' =>'width:100%;height:65px;'
            ),
            'section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'wc_settings_tab_alsoviewed_section_end'
            )
        );
				
				// Default options
	 	   add_option('wc_settings_tab_alsoviewed_total_items_display', '50');
		
        return apply_filters( 'wc_settings_tab_alsoviewed_settings', $settings );

	}
	
	
 
  
	 

}//# End class
