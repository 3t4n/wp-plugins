<?php
class Wos_biawp_Admin {
	private $plugin_name;
	private $version;
	
	public $bilings = [
        'Billing first name'    => '_billing_first_name',
        'Billing last name'     => '_billing_last_name',
        'Billing company'       => '_billing_company',
        'Billing company'       => '_billing_company',
        'Billing Address1'      => '_billing_address_1',
        'Billing Address2'      => '_billing_address_2',
        'Billing city'          => '_billing_city',
        'Billing postcode'      => '_billing_postcode',
        'Billing email'         => '_billing_email',
        'Billing phone'         => '_billing_phone',
    ];
    
    public $other = [
        'order_number',
        'event_start_date',
        'event_end_date',
        'post_status',
        'numberposts',
		'sequential_order_numbers_support'
    ];

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function enqueue_styles() {
// 		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wos-admin.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
// 		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wos-admin.js', array( 'jquery' ), $this->version, false );
	}
	
	public function admin_menu(){
	    add_submenu_page(
            'options-general.php',
            __('woo orders filter', 'wos'),
            __('woo orders filter', 'wos'),
            'administrator',
            'wos',
            [$this, 'wos_callback']
        );
	}
	
	public function wos_callback()
	{
	    require dirname(__FILE__) . '/partials/wos-admin-display.php';
	}
	
	public function admin_init(){
	    
	}

}
