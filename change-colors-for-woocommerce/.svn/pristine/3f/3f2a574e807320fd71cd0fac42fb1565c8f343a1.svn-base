<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       flawlessthemes.com
 * @since      1.0.0
 *
 * @package    Change_Colors_For_Woocommerce
 * @subpackage Change_Colors_For_Woocommerce/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Change_Colors_For_Woocommerce
 * @subpackage Change_Colors_For_Woocommerce/includes
 * @author     flawlesstheme <mail.flawlessthemes@gmail.com>
 */
class Change_Colors_For_Woocommerce {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Change_Colors_For_Woocommerce_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'CHANGE_COLORS_FOR_WOOCOMMERCE_VERSION' ) ) {
			$this->version = CHANGE_COLORS_FOR_WOOCOMMERCE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'change-colors-for-woocommerce';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Change_Colors_For_Woocommerce_Loader. Orchestrates the hooks of the plugin.
	 * - Change_Colors_For_Woocommerce_i18n. Defines internationalization functionality.
	 * - Change_Colors_For_Woocommerce_Admin. Defines all hooks for the admin area.
	 * - Change_Colors_For_Woocommerce_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-change-colors-for-woocommerce-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-change-colors-for-woocommerce-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-change-colors-for-woocommerce-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-change-colors-for-woocommerce-public.php';

		$this->loader = new Change_Colors_For_Woocommerce_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Change_Colors_For_Woocommerce_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Change_Colors_For_Woocommerce_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Change_Colors_For_Woocommerce_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Change_Colors_For_Woocommerce_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Change_Colors_For_Woocommerce_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}




function panel($wp_customize){

	$wp_customize->add_panel('woo_colors',array(
		'title' => esc_html__('Woocommerce Colors', 'change-colors-for-woocommerce'),
		'priority'=> 1,
	));
	
	
	$wp_customize->add_section('primary_colors_options',array(
        'title' => esc_html__('Primary Purple Colors', 'change-colors-for-woocommerce'),
        'panel' => 'woo_colors',
	));
	
	
	$wp_customize->add_setting( 'primary_color', array(
        'default'   => '#a46497',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'section' => 'primary_colors_options',
        'label'   => esc_html__( 'Choose Primary Color (Purple Buttons & Widgets)', 'change-colors-for-woocommerce' ),
		'settings'=>'primary_color',
	)));
	
	$wp_customize->add_setting( 'purple_button_text', array(
        'default'   => '#fff',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'purple_button_text', array(
        'section' => 'primary_colors_options',
        'label'   => esc_html__( 'Choose Purple Buttons Text Color', 'change-colors-for-woocommerce' ),
		'settings'=>'purple_button_text',
	)));
	
	
	
	$wp_customize->add_setting( 'primary_color_hover', array(
        'default'   => '#96588a',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
      
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color_hover', array(
        'section' => 'primary_colors_options',
        'label'   => esc_html__( 'Choose Buttons Color on Hover', 'change-colors-for-woocommerce' ),
		'settings'=>'primary_color_hover',
	)));
	
	$wp_customize->add_setting( 'purple_button_text_hover', array(
        'default'   => '#fff',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'purple_button_text_hover', array(
        'section' => 'primary_colors_options',
        'label'   => esc_html__( 'Choose Buttons Text Color on Hover', 'change-colors-for-woocommerce' ),
		'settings'=>'purple_button_text_hover',
	)));
	
	
	
	

	$wp_customize->add_section('grey_colors_options',array(
        'title' => esc_html__('Grey Buttons Color', 'change-colors-for-woocommerce'),
        'panel' => 'woo_colors',
		
	));
	
	
	$wp_customize->add_setting( 'grey_color', array(
        'default'   => '#ebe9eb',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grey_color', array(
        'section' => 'grey_colors_options',
        'label'   => esc_html__( 'Choose Grey Buttons Background Color', 'change-colors-for-woocommerce' ),
		'settings'=>'grey_color',
	)));
	
		
	$wp_customize->add_setting( 'grey_button_text', array(
        'default'   => '#515151',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grey_button_text', array(
        'section' => 'grey_colors_options',
        'label'   => esc_html__( 'Choose Grey Buttons Text Color', 'change-colors-for-woocommerce' ),
		'settings'=>'grey_button_text',
	)));
	
	
	
	$wp_customize->add_section('store_notice_colors_options',array(
        'title' => esc_html__('Store Notice Background Color', 'change-colors-for-woocommerce'),
        'panel' => 'woo_colors',
	));
	$wp_customize->add_setting( 'store_notice_bg', array(
        'default'   => '#a46497',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'store_notice_bg', array(
        'section' => 'store_notice_colors_options',
        'label'   => esc_html__( 'Choose Store Notice Background Color', 'change-colors-for-woocommerce' ),
		'settings'=>'store_notice_bg',
	)));
	
	$wp_customize->add_setting( 'store_notice_text', array(
        'default'   => '#fff',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'store_notice_text', array(
        'section' => 'store_notice_colors_options',
        'label'   => esc_html__( 'Choose Store Notice Text Color', 'change-colors-for-woocommerce' ),
		'settings'=>'store_notice_text',
	)));
	
	
	
	
	$wp_customize->add_section('highlight_colors_options',array(
        'title' => esc_html__('Price label and Sales Highlight Color ', 'change-colors-for-woocommerce'),
        'panel' => 'woo_colors',
	));
	$wp_customize->add_setting( 'green_highlight', array(
        'default'   => '#77a464',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'green_highlight', array(
        'section' => 'highlight_colors_options',
        'label'   => esc_html__( 'Choose Highlight Color for Price and Sales (Default Green)', 'change-colors-for-woocommerce' ),
		'settings'=>'green_highlight',
	)));
	
}   

add_action('customize_register','panel');



function change_colors_for_woocommerce_option_css(){
 
    $purple_button_text = get_theme_mod('purple_button_text');
    $primary_color = get_theme_mod('primary_color');
    
	$grey_color = get_theme_mod('grey_color');
    $grey_button_text = get_theme_mod('grey_button_text');
    
	$store_notice_bg = get_theme_mod('store_notice_bg');
    $store_notice_text = get_theme_mod('store_notice_text');
    
    
	$primary_color_hover = get_theme_mod('primary_color_hover');
    $purple_button_text_hover = get_theme_mod('purple_button_text_hover');
    
	$green_highlight = get_theme_mod('green_highlight');
 
    if(!empty($purple_button_text || $primary_color || $grey_color || $grey_button_text || $store_notice_bg || $store_notice_text || $green_highlight)):
     
    ?>
    <style type="text/css" id="woo-colors-theme-option-css">
         
		 .woocommerce-store-notice,
p.demo_store {

    background-color: <?php echo esc_html($store_notice_bg) ?> !important;
    color: <?php echo esc_html($store_notice_text) ?> !important;
}
.woocommerce-store-notice a, p.demo_store a{
	color: <?php echo esc_html($store_notice_text) ?> !important;
}

.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt {
    background-color: <?php echo esc_html($primary_color) ?> !important;
    color: <?php echo esc_html($purple_button_text) ?> !important;

}

.woocommerce #respond input#submit.alt.disabled,
.woocommerce #respond input#submit.alt.disabled:hover,
.woocommerce #respond input#submit.alt:disabled,
.woocommerce #respond input#submit.alt:disabled:hover,
.woocommerce #respond input#submit.alt:disabled[disabled],
.woocommerce #respond input#submit.alt:disabled[disabled]:hover,
.woocommerce a.button.alt.disabled,
.woocommerce a.button.alt.disabled:hover,
.woocommerce a.button.alt:disabled,
.woocommerce a.button.alt:disabled:hover,
.woocommerce a.button.alt:disabled[disabled],
.woocommerce a.button.alt:disabled[disabled]:hover,
.woocommerce button.button.alt.disabled,
.woocommerce button.button.alt.disabled:hover,
.woocommerce button.button.alt:disabled,
.woocommerce button.button.alt:disabled:hover,
.woocommerce button.button.alt:disabled[disabled],
.woocommerce button.button.alt:disabled[disabled]:hover,
.woocommerce input.button.alt.disabled,
.woocommerce input.button.alt.disabled:hover,
.woocommerce input.button.alt:disabled,
.woocommerce input.button.alt:disabled:hover,
.woocommerce input.button.alt:disabled[disabled],
.woocommerce input.button.alt:disabled[disabled]:hover {
    background-color: <?php echo esc_html($primary_color) ?> !important;
    color: <?php echo esc_html($purple_button_text) ?> !important;
}

.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
	background-color: <?php echo esc_html($grey_color) ?> !important;

}

.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
    background-color: <?php echo esc_html($primary_color) ?> !important;
}

.woocommerce-error,
.woocommerce-info,
.woocommerce-message {

    border-top: 3px solid  <?php echo esc_html($primary_color) ?> !important;

}




.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover ,
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover{
    background-color: <?php echo esc_html($primary_color_hover) ?> !important;
    color: <?php echo esc_html($purple_button_text_hover) ?> !important;
}



.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {

	color: <?php echo esc_html($grey_button_text) ?> !important;
	background-color: <?php echo esc_html($grey_color) ?> !important;

}


.woocommerce span.onsale {
	background-color: <?php echo esc_html($green_highlight) ?> !important;

}



.woocommerce div.product p.price, .woocommerce div.product span.price {
	color: <?php echo esc_html($green_highlight) ?> !important;
}
.woocommerce ul.products li.product .price {
	color: <?php echo esc_html($green_highlight) ?> !important;
}
.woocommerce div.product p.price, .woocommerce div.product span.price {
	color: <?php echo esc_html($green_highlight) ?> !important;
}
     
    </style>    
 
    <?php
 
    endif;    
}
 
add_action( 'wp_head', 'change_colors_for_woocommerce_option_css' );