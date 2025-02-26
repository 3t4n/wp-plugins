<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link      http://longvietweb.com
 * @since      1.0.0
 *
 * @package    Advanced_Custom_Widget
 * @subpackage Advanced_Custom_Widget/includes
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
 * @package    Advanced_Custom_Widget
 * @subpackage Advanced_Custom_Widget/includes
 * @author     LongViet .
 */
class Advanced_Custom_Widget {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Advanced_Custom_Widget_Loader    $loader    Maintains and registers all hooks for the plugin.
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

		$this->plugin_name = 'advanced-custom-widget';
		$this->version = '1.0.1';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_widget_transients();
		$this->define_widget_custom_style();
		
		// Enqueue styles
		add_action( 'admin_enqueue_scripts', array( $this, 'acww_widget_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'acww_widget_enqueue_scripts' ) );
		
		// Enqueue scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'acww_enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'acww_print_scripts'), 9999 );
		
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		// The class responsible for orchestrating the actions and filters of the - core plugin.

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advanced-custom-widget-loader.php';
		
		// The class is responsible for Saving transients widgets

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advanced-custom-widget-cache.php';

		// The class responsible for defining internationalization functionality - of the plugin.
		 
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advanced-custom-widget-i18n.php';
		
		//The class is responsible for registering the universal widget control and outputting custom widgets.
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-advanced-custom-widget-style.php';

		$this->loader = new Advanced_Custom_Widget_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Advanced_Custom_Widget_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Advanced_Custom_Widget_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
     * Register all of the hooks related to the universal widget control functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
	private function define_widget_transients() {
	    
        $plugin_control = new Advanced_Custom_Widget_Cache( $this->get_Plugin_Name(), $this->get_version() );
        
		// The current widget instance's settings. cache widget output
		$this->loader->add_filter( 'widget_display_callback', $plugin_control, '_cache_widget_output', 10, 3 );
		
		// Add custom select control to the widget form
        $this->loader->add_action('in_widget_form', $plugin_control, 'in_widget_form', 5, 3);
		
		// Process the widget's options to be saved
        $this->loader->add_filter('widget_update_callback', $plugin_control, 'widget_update_callback' ,5, 3);
    }
	
	private function define_widget_custom_style() {
	    
		$plugin_control = new Advanced_Custom_Widget_Custom_Style( $this->get_Plugin_Name(), $this->get_version() );
		
		// Add custom select control to the widget form
		$this->loader->add_action( 'in_widget_form', $plugin_control, 'widget_form', 10, 3 );
		
		// Process the widget's options to be saved
		$this->loader->add_action( 'widget_update_callback', $plugin_control, 'widget_update', 10, 2 );
		
		// Filter the widget's sidebar parameters
		$this->loader->add_action( 'dynamic_sidebar_params', $plugin_control, 'sidebar_params', 9999 );
        
    }
	
	/**
	 * Print JavaScript in the widget's admin footer.
	 *
	 * Use the acw_color_palette filter to add a custom color
	 * palette for the color picker control.
	 *
	 * @since    1.1.0
	 */
	public function acww_print_scripts() {
		
		?>
		<script>
			( function( $ ) {
				
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						<?php
							$acw_color_palette = apply_filters( 'acw_color_palette', array() );
							if ( !empty($acw_color_palette) ) {
								$palettes = "['" . implode("','", $acw_color_palette) . "']";
							} else {
								$palettes = 'true';
							}
						?>
						palettes: <?php echo $palettes ?>,
						width: 232,
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					} );
				}

				function onFormUpdate2( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate2 );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker), .inactive-sidebar .widget:has(.color-picker)' ).each( function() {
						initColorPicker( $( this ) );
					} );
				} );
				
			}( jQuery ) );
		</script>
		<?php
			
	}
	

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function acww_widget_enqueue_scripts() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/advanced-custom-widget-admin.min.css', array(), $this->version, 'all' );
		
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function acww_enqueue_scripts( $hook ) {
		
		// Load script on widgets page only
		if ( $hook != 'widgets.php' )
			return;
		
		// Color picker	
		wp_enqueue_script( 'wp-color-picker' );
		
		// Image uploader
		wp_enqueue_media();
		wp_enqueue_script( 'ajv-image-upload', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/image-upload.min.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( 'ajv-image-upload', 'ajv_image_upload',
            array(
                'frame_title' => __( 'Choose or Upload Image', 'advanced-custom-widget' ),
                'frame_button' => __( 'Insert Image', 'advanced-custom-widget' ),
            )
        );
		wp_enqueue_script( 'ajv-image-upload' );
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
	 * @return    Advanced_Custom_Widget_Loader    Orchestrates the hooks of the plugin.
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
