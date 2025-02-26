<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_ABL_Plugin
 * @subpackage WP_ABL_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_ABL_Plugin
 * @subpackage WP_ABL_Plugin/admin
 * @author     Your Name <email@example.com>
 */
class WP_ABL_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $WP_ABL_Plugin    The ID of this plugin.
	 */
	private $WP_ABL_Plugin;

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
	 * @param      string    $WP_ABL_Plugin       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
    private $plugin_name = 'wp_abl_plugin';
    private $plugin_path = 'wp-abl-plugin';
    private $option_name = 'wp_abl_plugin';

	public function __construct( $WP_ABL_Plugin, $version ) {
		$this->WP_ABL_Plugin = $WP_ABL_Plugin;
		$this->version = $version;
		$this->page_sections = array();
		add_action( 'whitelist_options', array( $this, 'whitelist_custom_options_page' ),11 );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->WP_ABL_Plugin, plugin_dir_url( __FILE__ ) . 'css/wp-abl-plugin-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->WP_ABL_Plugin, plugin_dir_url( __FILE__ ) . 'js/wp-abl-plugin-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function whitelist_custom_options_page( $whitelist_options ){
	    // Custom options are mapped by section id; Re-map by page slug.
	    foreach($this->page_sections as $page => $sections ){
	        $whitelist_options[$page] = array();
	        foreach( $sections as $section )
	            if( !empty( $whitelist_options[$section] ) )
	                foreach( $whitelist_options[$section] as $option )
	                    $whitelist_options[$page][] = $option;
	            }
	    return $whitelist_options;
	}

    public function add_merchant_id(){
        $options = get_option( 'wp_abl_plugin_settings' );
        $publicKey = $options['wp_abl_plugin_settings_public_key'];
        echo '<script>var WP_ABL_PLUGIN_MERCHANT_ID = "' . $publicKey . '";</script>';
    }

	public function add_css(){
		$options = get_option( 'wp_abl_plugin_settings' );
		if(isset($options['wp_abl_plugin_settings_add_custom_css'])){
			if($options['wp_abl_plugin_settings_add_custom_css'] == '1'){
				$customCSS = preg_replace("/<style>|<\/style>/", "", $options['wp_abl_plugin_settings_custom_css']);
				echo '<style>'.esc_html($customCSS).'</style>';
			}
		}
	}

    public function add_admin_menu(){
		add_menu_page(
			__( 'Adventure Bucket List Elements', 'wp-abl-plugin' ),
			__( 'ABL buttons', 'wp-abl-plugin' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' ),
			plugin_dir_url( __FILE__ ) . 'css/abl.png' 
		);
    }

    public function display_options_page() {
		include_once 'partials/wp-abl-plugin-admin-display.php';
	}

    public function register_setting_init(){
    	register_setting(
    		$this->plugin_name.'_page',
    		'wp_abl_plugin_settings'
    	);
        add_settings_section(
			$this->plugin_name.'_section',
			__( 'Easily integrate ABL online sales widgets into your Wordpress Site', 'wp-abl-plugin' ),
			array( $this, $this->plugin_name . '_general_callback' ),
			$this->plugin_name.'_page'
		);
		/*add_settings_field(
			$this->plugin_name . '_one_operator',
			__('All button on this site belong to one operator', 'wp-abl-plugin' ),
			array( $this, $this->option_name . '_one_operator_callback' ),
			$this->plugin_name.'_page',
			$this->plugin_name.'_section'
		);*/
		add_settings_field(
			$this->plugin_name . '_public_key',
			__( 'Public Key', 'wp-abl-plugin' ),
			array( $this, $this->option_name . '_public_key_callback' ),
			$this->plugin_name.'_page',
			$this->plugin_name.'_section'
		);
		add_settings_field(
			$this->plugin_name . '_add_custom_css',
			__('Add Custom CSS (for buttons and other elements)', 'wp-abl-plugin' ),
			array( $this, $this->option_name . '_add_custom_css_callback' ),
			$this->plugin_name.'_page',
			$this->plugin_name.'_section'
		);
		add_settings_field(
			$this->plugin_name . '_custom_css',
			__( 'Add Custom CSS', 'wp-abl-plugin' ),
			array( $this, $this->option_name . '_custom_css_callback' ),
			$this->plugin_name.'_page',
			$this->plugin_name.'_section'
		);
    }

    public function wp_abl_plugin_general_callback() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'wp-abl-plugin' ) . '</p>';
	}

	public function wp_abl_plugin_one_operator_callback() {
		$options = get_option( 'wp_abl_plugin_settings' );
		$oneOperatorChecked = "";
		if(isset($options['wp_abl_plugin_settings_one_operator'])){
			if($options['wp_abl_plugin_settings_one_operator'] == '1'){
				$oneOperatorChecked = 'checked="checked"';
			}
		}else{
			$oneOperatorChecked = "";
		}
		?>
			<fieldset>
				<label>
					<input type="checkbox" id="wp_abl_plugin_settings_one_operator" name="wp_abl_plugin_settings[wp_abl_plugin_settings_one_operator]" <?php echo $oneOperatorChecked ?> value="1">
					All button on this site belong to one operator
				</label>
			</fieldset>
		<?php
	}

    public function wp_abl_plugin_public_key_callback() {
		$options = get_option( 'wp_abl_plugin_settings' );
		$publicKey = "";
		if(isset($options['wp_abl_plugin_settings_public_key'])){
			$publicKey = $options['wp_abl_plugin_settings_public_key'];
		}
		?>
			<fieldset>
				<label>
					<input type="text" id="wp_abl_plugin_settings_public_key" name="wp_abl_plugin_settings[wp_abl_plugin_settings_public_key]" value="<?php echo $publicKey ?>">
				</label>
			</fieldset>
		<?php
	}

	public function wp_abl_plugin_add_custom_css_callback() {
		$options = get_option( 'wp_abl_plugin_settings' );
		$addCustomChecked = "";
		if(isset($options['wp_abl_plugin_settings_add_custom_css'])){
			if($options['wp_abl_plugin_settings_add_custom_css'] == '1'){
				$addCustomChecked = 'checked="checked"';
			}
		}else{
			$addCustomChecked = "";
		}
		?>
			<fieldset>
				<label>
					<input type="checkbox" id="wp_abl_plugin_settings_add_custom_css" name="wp_abl_plugin_settings[wp_abl_plugin_settings_add_custom_css]" <?php echo $addCustomChecked ?> value="1">
					Add Custom CSS (for buttons and other elements)
				</label>
			</fieldset>
		<?php
	}

	public function wp_abl_plugin_custom_css_callback() {
		$options = get_option( 'wp_abl_plugin_settings' );
		$customCSS = isset($options['wp_abl_plugin_settings_custom_css']) ? $options['wp_abl_plugin_settings_custom_css'] : '';
		?>
			<fieldset>
				<label>
					<textarea id="wp_abl_plugin_settings_custom_css" name="wp_abl_plugin_settings[wp_abl_plugin_settings_custom_css]"><?php echo $customCSS ?></textarea>
				</label>
			</fieldset>
		<?php
	}

    public function widget_abl(){
       wp_register_script(
         'widget-abl',
         ABL_ENV_URL_WIDGET . 'js/jquery-button.js',
         array( 'jquery' )
       );
       wp_enqueue_script('widget-abl');
    }

}
