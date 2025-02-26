<?php
namespace WP360view\Admin;
 

/**
 * Admin settings for the plugin actions and filters.
 *
 * @since      1.0.0
 *
 * @package    WP360view
 * @subpackage WP360view\Admin
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

/**
 * WooCommerce Gift Cards Settings.
 *
 * @class    WP360view_Settings
 * @version  1.7.3
 */
class WP360view_Settings extends \WC_Settings_Page {

	/**
	 * @var $print_message
	 */
	protected $print_message; 

	/**
	 * Constructor for custom fields
	 */
	public function __construct() {

		$this->id    = 'wp360view_settings';
		
		$this->label =  __( "360 View Settings", 'wp360view' ); 
 
		add_filter( 'woocommerce_settings_tabs_array',        array( $this, 'add_settings_page' ), 20 );
		add_action( 'woocommerce_settings_' . $this->id,      array( $this, 'output' ) );
		add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );
		add_action( 'woocommerce_sections_' . $this->id,      array( $this, 'output_sections' ) );			

	}

	/**
	 * Get sections
	 *
	 * @return array
	 */
	public function get_sections() {
		
		$sections = array( 
			'ad_general_settings'         => __( 'Shortcode Settings', 'wp360view' ),			
		);
		
		return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
	}

	/**
	 * Get settings array.
	 *
	 * @return array
	 */
	public function get_settings($current_section = '') { 

		if( '' == $current_section )
			$current_section = 'ad_general_settings';

	  if ( 'ad_general_settings' == $current_section ) { 

		 
			$settings = apply_filters( 'section_ad_general_settings', array(

					array(
						'title' => __( 'Advance Settings', 'wp360view' ),
						'type'  => 'title',
						'id'    => 'wp360view'					
					),

					array( 
						'default'         => 'true',
						'show_if_checked' => 'true',
						'type'            => 'checkbox',
						'id'       => 'navigation',
						'name'     => __( 'Enable Navigation', 'wp360view' ), 
						'class'    => 'wc-ro-wp360view',
						'desc'     => __( 'Enable Navigation Panel', 'wp360view' ),  
						'desc_tip' => __( 'Enable or disable navigation panel globally OR you can override this settings by <b>"navigation"</b> attribute by shortcode. Default value is <b>true</b>.', 'wp360view' ),  
					), 

					array(
						'default'         => 'true',
						'show_if_checked' => 'true',
						'type'            => 'checkbox',
						'id'       => 'drag',
						'name'     => __( 'Enable dragging', 'wp360view' ), 
						'class'    => 'wc-ro-wp360view',
						'desc'     => __( 'Enable Dragging', 'wp360view' ),
						'desc_tip' => __( 'Enable or disable dragging option globally OR you can override this settings by <b>"drag"</b> attribute by shortcode. Default value is <b>true</b>.', 'wp360view' ),    
					), 

					array(
						'title'       => __( 'Play Speed Timing', 'wp360view' ), 
						'id'          => 'playspeed',
						'type'        => 'text',
						'default'     => "100",
 						'placeholder' => __( 'Play Speed Timing', 'wp360view' ),
						'desc'     => __( 'Value to control the speed (in milliseconds) of play button rotation.', 'wp360view' ),  
						'desc_tip' => __( 'Add/change play speed of 360 slider globally OR you can override this settings by <b>"playspeed"</b> attribute by shortcode. Default value is <b>100</b>.', 'wp360view' ),    
					),
					
					array(
						'title'       => __( 'Frame Rate', 'wp360view' ), 
						'id'          => 'framerate',
						'type'        => 'text',
						'default' 	  => "10",
						'placeholder' => __( 'Frame Rate', 'wp360view' ),
						'desc'     => __( 'It refers to the number of frames displayed per second when rendering a 360-degree view.', 'wp360view' ),  
						'desc_tip' => __( 'Add/change frame rate of 360 slider globally OR you can override this settings by <b>"framerate"</b> attribute by shortcode. Default value is <b>10</b>.', 'wp360view' ),    
					),

					array(
						'default'         => 'false',
						'show_if_checked' => 'true',
						'type'            => 'checkbox',
						'id'       => 'enablespin',
						'name'     => __( 'Enable Auto Spin', 'wp360view' ), 
						'class'    => 'wc-ro-wp360view',
						'desc'     => __( 'Enable Spin', 'wp360view' ),  
						'desc_tip' => __( 'Enable or disable auto spin settings globally OR you can override this settings by <b>"enablespin"</b> attribute by shortcode. Default value is <b>false</b>.', 'wp360view' ),    
					), 

					array(
						'default'         => 'false',
						'show_if_checked' => 'true',
						'type'            => 'checkbox',
						'id'       => 'showcursor',
						'name'     => __( 'Show Cursor', 'wp360view' ), 
						'class'    => 'wc-ro-wp360view',
						'desc'     => __( 'Show Cursor', 'wp360view' ),  
						'desc_tip' => __( 'Hide or show cursor globally OR you can override this settings by <b>"showcursor"</b> attribute by shortcode. Default value is <b>false</b>.', 'wp360view' ),    
				
					), 

					array(
						'default'         => 'true',
						'show_if_checked' => 'true',
						'type'            => 'checkbox',
						'id'       => 'fullscreen',
						'name'     => __( 'Fullscreen', 'wp360view' ), 
						'class'    => 'wc-ro-wp360view',
						'desc'     => __( 'Enable Full Screen Support', 'wp360view' ),  
						'desc_tip' => __( 'Enable or disable full screen support settings globally OR you can override this settings by <b>"fullscreen"</b> attribute by shortcode. Default value is <b>true</b>.', 'wp360view' ),    
					), 

					array(
						'default'         => 'true',
						'show_if_checked' => 'true',
						'type'            => 'checkbox',
						'id'       => 'zoominout',
						'name'     => __( 'Zoom In/Out', 'wp360view' ), 
						'class'    => 'wc-ro-wp360view',
						'desc'     => __( 'Enable Zoom In/Out', 'wp360view' ),  
						'desc_tip' => __( 'Enable or disable zoom in/out settings globally OR you can override this settings by <b>"zoominout"</b> attribute by shortcode. Default value is <b>true</b>', 'wp360view' ),    				
					),  

					array( 'type' => 'sectionend', 'id' => 'settings_config' ),
		
				)

			);  

		}  

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );
	} 

	/**
	 * Output the settings
	 *
	 * @since 1.0
	 */
	public function output() {
	
		global $current_section;
		
		$settings = $this->get_settings( $current_section ); 

		\WC_Admin_Settings::output_fields( $settings );
	}
	
	
	/**
	* Save settings
	*
	* @since 1.0
	*/
	public function save() {
	
		global $current_section,$wp_query;   

		$settings = $this->get_settings( $current_section );  

		\WC_Admin_Settings::save_fields( $settings );	
		
	}

	/**
	 * Print messages
	 *
	 * @since 1.0
	*/
	public function print_message() {
		?><div class="notice notice-error"><p><?php echo $this->print_message; ?></p></div><?php
	}

}
