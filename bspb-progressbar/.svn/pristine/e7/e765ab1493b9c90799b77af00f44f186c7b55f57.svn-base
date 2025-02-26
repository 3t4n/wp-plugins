<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

new BSPB_Plugin_Settings();
/**
 * BSPB Plugin settings class.
 *
 * @class BSPB_Plugin_Settings
 */
	class BSPB_Plugin_Settings
	{


	public $settings 		= array();
	private $scripts 		= array();
	private $tabs 			= array();
	private $choices 		= array();
	private $loading_places	= array();
	private $api_url		= 'http://pierregagliardi.com';
		/**
		 * Construct the plugin object
		 */

		 	public function __construct() {

		// set instance
		BSPB_Plugin()->settings = $this;

		// actions
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu_options' ) );
		add_action( 'after_setup_theme', array( $this, 'load_defaults' ) );
		     	// Css rules for Color Picker
    //wp_enqueue_style( 'wp-color-picker' );

    // Register javascript
  // add_action( 'admin_enqueue_scripts', array( $this, 'prefix_add_admin_style_script' ) );
	}
  	/**
	 * Load default settings.
	 *
	 * @return void
	 */
	public function load_defaults() {

		$this->scripts = apply_filters( 'bspb_settings_scripts', array(
			'horizontal'	 => array(
				'name'				 => __( 'Horizontal', 'bspb-plugin' ),
				'animation_speed'	 => array(
					'slow'	 => __( 'slow (6 seconds)', 'bspb-plugin' ),
					'normal' => __( 'normal (4 seconds)', 'bspb-plugin' ),
					'fast'	 => __( 'fast (2 seconds)', 'bspb-plugin' )
				),
				'title_position'			 => array(
					'top-left'	 => __( 'top left', 'bspb-plugin' ),
					'top-center'	 => __( 'top center', 'bspb-plugin' ),
					'top-right'	 => __( 'top right', 'bspb-plugin' ),
					'bottom-left'	 => __( 'bottom left', 'bspb-plugin' ),
					'bottom-center'	 => __( 'bottom center', 'bspb-plugin' ),
					'bottom-right'		 => __( 'bottom right', 'bspb-plugin' ),
					'inside-left'	 => __( 'inside left', 'bspb-plugin' ),
					'inside-center'	 => __( 'inside center', 'bspb-plugin' ),
					'inside-right'		 => __( 'inside right', 'bspb-plugin' )
				),
				'value_position'			 => array(
					'top-left'	 => __( 'top left', 'bspb-plugin' ),
					'top-center'	 => __( 'top center', 'bspb-plugin' ),
					'top-right'	 => __( 'top right', 'bspb-plugin' ),
					'bottom-left'	 => __( 'bottom left', 'bspb-plugin' ),
					'bottom-center'	 => __( 'bottom center', 'bspb-plugin' ),
					'bottom-right'		 => __( 'bottom right', 'bspb-plugin' ),
					'inside-left'	 => __( 'inside left', 'bspb-plugin' ),
					'inside-center'	 => __( 'inside center', 'bspb-plugin' ),
					'inside-right'		 => __( 'inside right', 'bspb-plugin' )
				),
				'margin_type'			 => array(
					'margin'	 => __( 'margin', 'bspb-plugin' ),
					'margin-left'	 => __( 'margin left', 'bspb-plugin' ),
					'margin-right'	 => __( 'margin right', 'bspb-plugin' ),
					'margin-top'	 => __( 'margin top', 'bspb-plugin' ),
					'margin-bottom'	 => __( 'margin bottom', 'bspb-plugin' )
				),

				'themes'			 => array(
					'pp_default'	 => __( 'default', 'bspb-plugin' ),
					'light_rounded'	 => __( 'light rounded', 'bspb-plugin' ),
					'dark_rounded'	 => __( 'dark rounded', 'bspb-plugin' ),
					'light_square'	 => __( 'light square', 'bspb-plugin' ),
					'dark_square'	 => __( 'dark square', 'bspb-plugin' ),
					'facebook'		 => __( 'facebook', 'bspb-plugin' )
				),
				'wmodes'			 => array(
					'window'		 => __( 'window', 'bspb-plugin' ),
					'transparent'	 => __( 'transparent', 'bspb-plugin' ),
					'opaque'		 => __( 'opaque', 'bspb-plugin' ),
					'direct'		 => __( 'direct', 'bspb-plugin' ),
					'gpu'			 => __( 'gpu', 'bspb-plugin' )
				)
			),
			'vertical'		 => array(
				'name'		 => __( 'Vertical', 'bspb-plugin' ),
				'animations' => array(
					'css'	 => __( 'CSS', 'bspb-plugin' ),
					'jquery' => __( 'jQuery', 'bspb-plugin' )
				),
				'title_position'			 => array(
					'top-left'	 => __( 'top left', 'bspb-plugin' ),
					'top-center'	 => __( 'top center', 'bspb-plugin' ),
					'top-right'	 => __( 'top right', 'bspb-plugin' ),
					'bottom-left'	 => __( 'bottom left', 'bspb-plugin' ),
					'bottom-center'	 => __( 'bottom center', 'bspb-plugin' ),
					'bottom-right'		 => __( 'bottom right', 'bspb-plugin' ),
					'inside-left'	 => __( 'inside left', 'bspb-plugin' ),
					'inside-center'	 => __( 'inside center', 'bspb-plugin' ),
					'inside-right'		 => __( 'inside right', 'bspb-plugin' )
				),
				'value_position'			 => array(
					'top-left'	 => __( 'top left', 'bspb-plugin' ),
					'top-center'	 => __( 'top center', 'bspb-plugin' ),
					'top-right'	 => __( 'top right', 'bspb-plugin' ),
					'bottom-left'	 => __( 'bottom left', 'bspb-plugin' ),
					'bottom-center'	 => __( 'bottom center', 'bspb-plugin' ),
					'bottom-right'		 => __( 'bottom right', 'bspb-plugin' ),
					'inside-left'	 => __( 'inside left', 'bspb-plugin' ),
					'inside-center'	 => __( 'inside center', 'bspb-plugin' ),
					'inside-right'		 => __( 'inside right', 'bspb-plugin' )
				),
				'margin_type'			 => array(
					'margin'	 => __( 'margin', 'bspb-plugin' ),
					'margin-left'	 => __( 'margin left', 'bspb-plugin' ),
					'margin-right'	 => __( 'margin right', 'bspb-plugin' ),
					'margin-top'	 => __( 'margin top', 'bspb-plugin' ),
					'margin-bottom'	 => __( 'margin bottom', 'bspb-plugin' )
				),

			),
			'circular'		 => array(
				'name'		 => __( 'Circular', 'bspb-plugin' ),
				'animations' => array(
					'css'	 => __( 'CSS', 'bspb-plugin' ),
					'jquery' => __( 'jQuery', 'bspb-plugin' )
				)
			),
			'logo'		 => array(
				'name'		 => __( 'Logo', 'bspb-plugin' ),
				'animations' => array(
					'css'	 => __( 'CSS', 'bspb-plugin' ),
					'jquery' => __( 'jQuery', 'bspb-plugin' )
				)
			),
			'font-awesome'		 => array(
				'name'		 => __( 'Font Awesome', 'bspb-plugin' ),
				'animations' => array(
					'css'	 => __( 'CSS', 'bspb-plugin' ),
					'jquery' => __( 'jQuery', 'bspb-plugin' )
				)
			),
			) );

		$this->animations = array(
			'speeds'		 => array(
				'slow'	 => __( 'slow (6 seconds)', 'bspb-plugin' ),
				'normal' => __( 'normal (4 seconds)', 'bspb-plugin' ),
				'fast'	 => __( 'fast (2 seconds)', 'bspb-plugin' )
				),
			'angles'		 => array(
				'90'	 => __( '90 degrees', 'bspb-plugin' ),
				'45' => __( '45 degrees', 'bspb-plugin' ),
				'0'	 => __( '0 degrees', 'bspb-plugin' ),
				'-45'	 => __( '-45 degrees', 'bspb-plugin' )
				)

		);

		$this->image_titles = array(
			'default'		=> __( 'None (default)', 'bspb-plugin' ),
			'title'	 		=> __( 'Image Title', 'bspb-plugin' ),
			'caption'		=> __( 'Image Caption', 'bspb-plugin' ),
			'alt'	 		=> __( 'Image Alt Text', 'bspb-plugin' ),
			'description'	=> __( 'Image Description', 'bspb-plugin' )
		);

		$this->loading_places = array(
			'header' => __( 'Header', 'bspb-plugin' ),
			'footer' => __( 'Footer', 'bspb-plugin' )
		);

		// get scripts
		foreach ( $this->scripts as $key => $value ) {
			$scripts[$key] = $value['name'];
		}

		// get image sizes
		$sizes = apply_filters( 'image_size_names_choose', array(
			'thumbnail' => __( 'Thumbnail', 'bspb-plugin' ),
			'medium'    => __( 'Medium', 'bspb-plugin' ),
			'large'     => __( 'Large', 'bspb-plugin' ),
			'full'      => __( 'Full Size (default)', 'bspb-plugin' ),
		) );

		$this->settings = array(
			'settings' => array(
				'option_group'	=> 'bspb_plugin_settings',
				'option_name'	=> 'bspb_plugin_settings',
				// 'callback'		=> array( $this, 'validate_options' ),
				'sections'		=> array(
					'bspb_plugin_settings' => array(
						'title' 		=> __( 'General settings', 'bspb-plugin' ),
						// 'callback' 	=> '',
						// 'page' 		=> '',
					),
				),
				'prefix'		=> 'bspb',
				'fields' => array(
					'script' => array(
						// 'name' => '',
						'title' => __( 'ProgressBar script', 'bspb-plugin' ),
						// 'callback' => '',
						// 'page' => '',
						'section' => 'bspb_plugin_settings',
						'type' => 'radio',
						'label' => '',
						'description' => sprintf(__( 'Select your preffered progressbar script.', 'bspb-plugin' ), wp_nonce_url( add_query_arg( array( 'action' => 'bspb-hide-notice' ), admin_url( 'options-general.php?page=bspb-plugin&tab=usages' ) ), 'bspb_action', 'bspb_nonce' ) ),
						'options' => $scripts,
						// 'options_cb' => '',
						// 'id' => '',
						// 'class' => array(),
					),
					'transparent_background' => array(
						'title' => __( 'Transparent Background', 'bspb-plugin' ),
						'section' => 'bspb_plugin_settings',
						'type' => 'boolean',
						'label' => __( 'When true, transparency will be render instead of background color.', 'bspb-plugin' ),
					),
					'background_color' => array(
						'title' => __( 'Background color', 'bspb-plugin' ),
						'section' => 'bspb_plugin_settings',
						'type' => 'color_picker',
						'label' => __( 'Color of the background.', 'bspb-plugin' ),
						'class' => 'bspb_background_color'
					),
					'bar_color' => array(
						'title' => __( 'Bar color', 'bspb-plugin' ),
						'section' => 'bspb_plugin_settings',
						'type' => 'color_picker',
						'label' => __( 'Color of the bar.', 'bspb-plugin' )
					),
					'opacity_bar' => array(
						'title' => __( 'Opacity bar', 'bspb-plugin' ),
						'section' => 'bspb_plugin_settings',
						'type' => 'boolean',
						'label' => __( 'When true, stripped bar opacity overlay is enabled.', 'bspb-plugin' )
					),
					'overlay_opacity_bar' => array(
						'title' => __( 'Overlay opacity bar', 'bspb-plugin' ),
						'section' => 'bspb_plugin_settings',
						'type' => 'range_settings',
						'description' => __( 'Opacity of the bar overlay.', 'bspb-plugin' ),
						'min' => 0,
						'max' => 100,
						'class' => 'overlay_opacity_bar'
					),
				),
			),
			'configuration' => array(
				'option_group'	=> 'bspb_plugin_configuration',
				'option_name'	=> 'bspb_plugin_configuration',
				// 'callback'		=> array( $this, 'validate_options' ),
				'sections'		=> array(
					'bspb_plugin_configuration' => array(
						'title' 		=> __( 'Bar settings', 'bspb-plugin' ) . ': ' . $this->scripts[BSPB_Plugin()->options['settings']['script']]['name'],
						'description' => __( 'Opacity of the bar overlay.', 'bspb-plugin' )
						// 'callback' 	=> '',
						// 'page' 		=> '',
					),
				),
				'prefix'		=> 'bspb',
				'fields' => array(
				)
			),
			'animation' => array(
				'option_group'	=> 'bspb_plugin_animation',
				'option_name'	=> 'bspb_plugin_animation',
				// 'callback'		=> array( $this, 'validate_options' ),
				'sections'		=> array(
					'bspb_plugin_animation' => array(
						'title' 		=> __( 'Animation settings', 'bspb-plugin' ),
						// 'callback' 	=> '',
						// 'page' 		=> '',
					),
				),
				'prefix'		=> 'bspb',
				'fields' => array(
					'opacity_bar_angles' => array(
						// 'name' => '',
						'title' => __( 'Opacity angles', 'bspb-plugin' ),
						// 'callback' => '',
						// 'page' => '',
						'section' => 'bspb_plugin_animation',
						'type' => 'radio',
						'label' => '',
						'description' => sprintf(__( 'Select your preffered opacity bar angle.', 'bspb-plugin' ), wp_nonce_url( add_query_arg( array( 'action' => 'bspb-hide-notice' ), admin_url( 'options-general.php?page=bspb-plugin&tab=usages' ) ), 'bspb_action', 'bspb_nonce' ) ),
						'options' => $this->animations['angles'],

					),
					'animate_opacity_bar' => array(
						'title' => __( 'Animated Opacity', 'bspb-plugin' ),
						'section' => 'bspb_plugin_animation',
						'type' => 'boolean',
						'label' => __( 'When true, stripped bar is animated.', 'bspb-plugin' )
					),
					'animate_opacity_bar_speeds' => array(
						// 'name' => '',
						'title' => __( 'Animation opacity speed', 'bspb-plugin' ),
						// 'callback' => '',
						// 'page' => '',
						'section' => 'bspb_plugin_animation',
						'type' => 'radio',
						'label' => '',
						'description' => sprintf(__( 'Select your preffered animation opacity speed.', 'bspb-plugin' ), wp_nonce_url( add_query_arg( array( 'action' => 'bspb-hide-notice' ), admin_url( 'options-general.php?page=bspb-plugin&tab=usages' ) ), 'bspb_action', 'bspb_nonce' ) ),
						'options' => $this->animations['speeds'],

					),
					'draw_on_scroll' => array(
						'title' => __( 'Draw on scroll', 'bspb-plugin' ),
						'section' => 'bspb_plugin_animation',
						'type' => 'boolean',
						'label' => __( 'When true, bar is drawn on scroll and jquery plugin WAYPOINT is loaded.', 'bspb-plugin' )
					),
					'draw_on_scroll_selector' => array(
						'title' => __( 'Scroll Selector', 'bspb-plugin' ),
						'section' => 'bspb_plugin_animation',
						'type' => 'text',
						'description' => __( 'Enter the ID selector for starting draw animation.', 'bspb-plugin' ),
					),
					'draw_on_scroll_animation_speeds' => array(
						// 'name' => '',
						'title' => __( 'Scroll Animation speed', 'bspb-plugin' ),
						// 'callback' => '',
						// 'page' => '',
						'section' => 'bspb_plugin_animation',
						'type' => 'radio',
						'label' => '',
						'description' => sprintf(__( 'Select your preffered Scroll Animation speed.', 'bspb-plugin' ), wp_nonce_url( add_query_arg( array( 'action' => 'bspb-hide-notice' ), admin_url( 'options-general.php?page=bspb-plugin&tab=usages' ) ), 'bspb_action', 'bspb_nonce' ) ),
						'options' => $this->animations['speeds'],

					),
					'not_animate_on_mobile' => array(
						'title' => __( 'Don\'t animate on mobile', 'bspb-plugin' ),
						'section' => 'bspb_plugin_animation',
						'type' => 'boolean',
						'label' => __( 'Don\'t animate on mobile devices.', 'bspb-plugin' )
					),
				),
			),

		);

		switch ( BSPB_Plugin()->options['settings']['script'] ) {

			case ( 'vertical' ) :

				$this->settings['configuration']['prefix'] = 'bspb_vert';
				$this->settings['configuration']['fields'] = array(
					'show_title' => array(
						'title' => __( 'Show Title', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'boolean',
						'label' => __( 'When true, Bar title is displayed.', 'bspb-plugin' ),
						'parent' => 'vertical'
					),
					'show_value' => array(
						'title' => __( 'Show Value', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'boolean',
						'label' => __( 'When true, Bar value is displayed.', 'bspb-plugin' ),
						'parent' => 'vertical'
					),
					'bar_width' => array(
						'title' => __( 'Bar width', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'description' => __( 'Enter the bar width.', 'bspb-plugin' ),
						'append' => '%',
						'parent' => 'vertical'
					),
					'bar_height' => array(
						'title' => __( 'Bar height', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'description' => __( 'Enter the bar height.', 'bspb-plugin' ),
						'append' => 'px',
						'parent' => 'vertical'
					),
					'title_position' => array(
						'title' => __( 'Title position', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'select',
						'description' => __( 'Select the position of the title.', 'bspb-plugin' ),
						'options' => $this->scripts['vertical']['title_position'],
						'parent' => 'vertical'
					),
					'value_position' => array(
						'title' => __( 'Value position', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'select',
						'description' => __( 'Select the position of the value.', 'bspb-plugin' ),
						'options' => $this->scripts['vertical']['value_position'],
						'parent' => 'vertical'
					),
					'margin_type_text' => array(
						'title' => __( 'Margin type for the text', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'radio',
						'description' => __( 'Select the margin type for the text.', 'bspb-plugin' ),
						'options' => $this->scripts['vertical']['margin_type'],
						'parent' => 'vertical'
					),
					'text_padding_value' => array(
						'title' => __( 'Text padding', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'append' => 'px',
						'parent' => 'vertical'
					),
					'margin_type_value' => array(
						'title' => __( 'Margin type for the value', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'radio',
						'description' => __( 'Select the margin type for the value.', 'bspb-plugin' ),
						'options' => $this->scripts['vertical']['margin_type'],
						'parent' => 'vertical'
					),
					'value_margin_value' => array(
						'title' => __( 'Margin for the value', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'append' => 'px',
						'parent' => 'vertical'
					),
					'text_color' => array(
						'title' => __( 'Text color', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'color_picker',
						'label' => __( 'Color of the text and the value.', 'bspb-plugin' ),
						'class' => 'bspb_background_color',
						'parent' => 'vertical'
					),

				);

				break;

			case ( 'horizontal' ) :

				$this->settings['configuration']['prefix'] = 'bspb_horiz';
				$this->settings['configuration']['fields'] = array(
					'show_title' => array(
						'title' => __( 'Show Title', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'boolean',
						'label' => __( 'When true, Bar title is displayed.', 'bspb-plugin' ),
						'parent' => 'horizontal'
					),
					'show_value' => array(
						'title' => __( 'Show Value', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'boolean',
						'label' => __( 'When true, Bar value is displayed.', 'bspb-plugin' ),
						'parent' => 'horizontal'
					),
					'bar_width' => array(
						'title' => __( 'Bar width', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'description' => __( 'Enter the bar width.', 'bspb-plugin' ),
						'append' => '%',
						'parent' => 'horizontal'
					),
					'bar_height' => array(
						'title' => __( 'Bar height', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'description' => __( 'Enter the bar height.', 'bspb-plugin' ),
						'append' => 'px',
						'parent' => 'horizontal'
					),
					'title_position' => array(
						'title' => __( 'Title position', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'select',
						'description' => __( 'Select the position of the title.', 'bspb-plugin' ),
						'options' => $this->scripts['horizontal']['title_position'],
						'parent' => 'horizontal'
					),
					'value_position' => array(
						'title' => __( 'Value position', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'select',
						'description' => __( 'Select the position of the value.', 'bspb-plugin' ),
						'options' => $this->scripts['horizontal']['value_position'],
						'parent' => 'horizontal'
					),
					'margin_type_text' => array(
						'title' => __( 'Margin type for the text', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'radio',
						'description' => __( 'Select the margin type for the text.', 'bspb-plugin' ),
						'options' => $this->scripts['horizontal']['margin_type'],
						'parent' => 'horizontal'
					),
					'value_margin_text' => array(
						'title' => __( 'Margin for the text', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'append' => 'px',
						'parent' => 'horizontal'
					),
					'margin_type_value' => array(
						'title' => __( 'Margin type for the value', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'radio',
						'description' => __( 'Select the margin type for the value.', 'bspb-plugin' ),
						'options' => $this->scripts['horizontal']['margin_type'],
						'parent' => 'horizontal'
					),
					'value_margin_value' => array(
						'title' => __( 'Margin for the value', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'number',
						'append' => 'px',
						'parent' => 'horizontal'
					),
					'text_color' => array(
						'title' => __( 'Text color', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'color_picker',
						'label' => __( 'Color of the text and the value.', 'bspb-plugin' ),
						'class' => 'bspb_background_color',
						'parent' => 'horizontal'
					),
					//'theme' => array(
					//	'title' => __( 'Theme', 'bspb-plugin' ),
					//	'section' => 'bspb_plugin_configuration',
					//	'type' => 'radio',
					//	'description' => __( 'Select the theme for lightbox effect.', 'bspb-plugin' ),
					//	'options' => $this->scripts['horizontal']['themes'],
					//	'parent' => 'horizontal'
					//),
					//'margin' => array(
					//	'title' => __( 'Margin', 'bspb-plugin' ),
					///	'section' => 'bspb_plugin_configuration',
					//	'type' => 'multiple',
					//	'parent' => 'horizontal',
					//	'fields' => array(
					//		'margin-top' => array(
					//			'title' => __( 'Margin for the value', 'bspb-plugin' ),
					//			'description' => __( 'Enter a space separated list of events.', 'responsive-lightbox' ),
					//			'type' => 'number',
					//			'append' => 'px',
					//		),
					//		'margin-left' => array(
					//			'type' => 'text',
					//			'description' => __( 'Enter a space separated list of events.', 'responsive-lightbox' ),
					//		),
					//	),
					//),

				);

				break;

			case ( 'circular' ) :

				$this->settings['configuration']['prefix'] = 'bspb_circular';
				$this->settings['configuration']['fields'] = array(
				'not_avalaible' => array(
						'title' => __( 'Avalaible in future release', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'text',
						'label' => __( 'Avalaible in future release.', 'bspb-plugin' ),
						'parent' => 'circular'
					),
				);

				break;

			case ( 'logo' ) :

				$this->settings['configuration']['prefix'] = 'bspb_logo';
				$this->settings['configuration']['fields'] = array(
				'not_avalaible' => array(
						'title' => __( 'Avalaible in future release', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'text',
						'label' => __( 'Avalaible in future release.', 'bspb-plugin' ),
						'parent' => 'logo'
					),
				);

				break;

			case ( 'font-awesome' ) :

				$this->settings['configuration']['prefix'] = 'bspb_circular';
				$this->settings['configuration']['fields'] = array(
				'not_avalaible' => array(
						'title' => __( 'Avalaible in future release', 'bspb-plugin' ),
						'section' => 'bspb_plugin_configuration',
						'type' => 'text',
						'label' => __( 'Avalaible in future release.', 'bspb-plugin' ),
						'parent' => 'font-awesome'
					),
				);

				break;

			default :

				$this->settings['configuration'] = apply_filters( 'bspb_settings_' . BSPB_Plugin()->options['settings']['script'] . '_script_configuration', $this->settings['configuration'] );

				break;
		}

		$this->tabs = apply_filters( 'bspb_settings_tabs', array(
			'settings'	 => array(
				'name'	 => __( 'General settings', 'bspb-plugin' ),
				'key'	 => 'bspb_plugin_settings',
				'submit' => 'save_bspb_settings',
				'reset'	 => 'reset_bspb_settings',
			),
			'configuration'		 => array(
				'name'	 => __( 'Bar settings', 'bspb-plugin' ),
				'key'	 => 'bspb_plugin_configuration',
				'submit' => 'save_' . $this->settings['configuration']['prefix'] . '_configuration',
				'reset'	 => 'reset_' . $this->settings['configuration']['prefix'] . '_configuration'
			),
			'animation'	 => array(
				'name'	 => __( 'Animation settings', 'bspb-plugin' ),
				'key'	 => 'bspb_plugin_animation',
				'submit' => 'save_bspb_animation',
				'reset'	 => 'reset_bspb_animation',
			)

		) );

		$this->tabs['usages'] = array(
			'name'	 	=> __( 'Usages', 'bspb-plugin' ),
			'key'	 	=> 'bspb_plugin_configuration',
			'callback'	=>  array( $this, 'usages_tab_cb' )
		);

	}


	/**
	 * Render settings function
	 *
	 * @return void
	 */
	public function register_settings() {

		foreach ( $this->settings as $setting_id => $setting ) {

			// set key
			$setting_key = $setting_id;
			$setting_id = 'bspb_plugin_' . $setting_id;

			// register setting
			register_setting(
				esc_attr( $setting_id ),
				! empty( $setting['option_name'] ) ? esc_attr( $setting['option_name'] ) : $setting_id,
				! empty( $setting['callback'] ) ? $setting['callback'] : array( $this, 'validate_settings' )
			);

			// register sections
			if ( ! empty( $setting['sections'] ) && is_array( $setting['sections'] ) ) {

				foreach ( $setting['sections'] as $section_id => $section ) {

					add_settings_section(
						esc_attr( $section_id ),
						! empty( $section['title'] ) ? esc_html( $section['title'] ) : '',
						//! empty( $section['description'] ) ? $section['description'] : '',
						! empty( $section['callback'] ) ? $section['callback'] : '',
						! empty( $section['page'] ) ? esc_attr( $section['page'] ) : $section_id
					);
				}

			}

			// register fields
			if ( ! empty( $setting['fields'] ) && is_array( $setting['fields'] ) ) {

				foreach ( $setting['fields'] as $field_id => $field ) {

					// prefix field id?
					$field_key = $field_id;
					$field_id = ( ! empty( $setting['prefix'] ) ? $setting['prefix'] . '_' : '' ) . $field_id;

					// field args
					$args = array(
						'id' => ! empty( $field['id'] ) ? $field['id'] : $field_id,
						'class' => ! empty( $field['class'] ) ? $field['class'] : '',
						'name' => $setting['option_name'] . ( ! empty( $field['parent'] ) ? '[' . $field['parent'] . ']' : '' ) . '[' . $field_key . ']',
						'type' => ! empty( $field['type'] ) ? $field['type'] : 'text',
						'label' => ! empty( $field['label'] ) ? $field['label'] : '',
						'description' => ! empty( $field['description'] ) ? $field['description'] : '',
						'append' => ! empty( $field['append'] ) ? esc_html( $field['append'] ) : '',
						'prepend' => ! empty( $field['prepend'] ) ? esc_html( $field['prepend'] ) : '',
						'min' => ! empty( $field['min'] ) ? (int) $field['min'] : '',
						'max' => ! empty( $field['max'] ) ? (int) $field['max'] : '',
						'options' => ! empty( $field['options'] ) ? $field['options'] : '',
						'fields' => ! empty( $field['fields'] ) ? $field['fields'] : '',
						'default' => $field['type'] === 'multiple' ? '' : ( $this->sanitize_field( ! empty( $field['parent'] ) ? BSPB_Plugin()->defaults[$setting_key][$field['parent']][$field_key] : BSPB_Plugin()->defaults[$setting_key][$field_key], $field['type'] ) ),
						'value' => $field['type'] === 'multiple' ? '' : ( $this->sanitize_field( ! empty( $field['parent'] ) ? BSPB_Plugin()->options[$setting_key][$field['parent']][$field_key] : ( isset( BSPB_Plugin()->options[$setting_key][$field_key] ) ? BSPB_Plugin()->options[$setting_key][$field_key] : BSPB_Plugin()->defaults[$setting_key][$field_key] ), $field['type'] ) ),
						'label_for' => $field_id,
						'return' => false
					);

					if ( $args['type'] === 'multiple' ) {
						foreach ( $args['fields'] as $subfield_id => $subfield ) {
							$args['fields'][$subfield_id] = wp_parse_args( $subfield, array(
								'id' => $field_id . '-' . $subfield_id,
								'class' => ! empty( $subfield['class'] ) ? $subfield['class'] : '',
								'name' => $setting['option_name'] . ( ! empty( $subfield['parent'] ) ? '[' . $subfield['parent'] . ']' : '' ) . '[' . $subfield_id . ']',
								'default' => $this->sanitize_field( ! empty( $subfield['parent'] ) ? BSPB_Plugin()->defaults[$setting_key][$subfield['parent']][$subfield_id] : BSPB_Plugin()->defaults[$setting_key][$subfield_id], $subfield['type'] ),
								'value' => $this->sanitize_field( ! empty( $subfield['parent'] ) ? BSPB_Plugin()->options[$setting_key][$subfield['parent']][$subfield_id] : BSPB_Plugin()->options[$setting_key][$subfield_id], $subfield['type'] ),
								'return' => true
							) );
						}
					}

					add_settings_field(
						esc_attr( $field_id ),
						! empty( $field['title'] ) ? esc_html( $field['title'] ) : '',
						array( $this, 'render_field' ),
						! empty( $field['page'] ) ? esc_attr( $field['page'] ) : $setting_id,
						! empty( $field['section'] ) ? esc_attr( $field['section'] ) : '',
						$args
					);

				}

			}

		}

		// licenses
		$extensions = apply_filters( 'bspb_settings_licenses', array() );

		if ( $extensions ) {
			// register setting
			register_setting(
				'bspb_plugin_licenses',
				'bspb_plugin_licenses',
				array( $this, 'validate_licenses' )
			);

			add_settings_section(
				'bspb_plugin_licenses',
				__( 'Licenses', 'bspb-plugin' ),
				array( $this, 'licenses_section_cb' ),
				'bspb_plugin_licenses'
			);

			foreach ( $extensions as $id => $extension ) {
				add_settings_field(
					esc_attr( $id ),
					$extension['name'],
					array( $this, 'license_field_cb' ),
					'bspb_plugin_licenses',
					'bspb_plugin_licenses',
					$extension
				);
			}
		}

	}

	/**
	 * Render settings field function
	 *
	 * @param array $args
	 * @return mixed
	 */
	public function render_field( $args ) {

		if ( empty( $args ) || ! is_array( $args ) )
			return;

		$html = '';

		switch ( $args['type'] ) {

			case ( 'boolean' ) :

				$html .= '<label class="cb-checkbox"><input id="' . $args['id'] . '" type="checkbox" name="' . $args['name'] . '" value="1" ' . checked( (bool) $args['value'], true, false ) . ' />' . $args['label'] . '</label>';
				break;

			case ( 'radio' ) :

				foreach ( $args['options'] as $key => $name ) {
					$html .= '<label class="cb-radio"><input id="' . $args['id'] . '-' . $key . '" type="radio" name="' . $args['name'] . '" value="' . $key . '" ' . checked( $key, $args['value'], false ) . ' />' . $name . '</label> ';
				}
				break;

			case ( 'checkbox' ) :

				foreach ( $args['options'] as $key => $name ) {
					$html .= '<label class="cb-checkbox"><input id="' . $args['id'] . '-' . $key . '" type="checkbox" name="' . $args['name'] . '[' . $key . ']" value="1" ' . checked( in_array( $key, $args['value'] ), true, false ) . ' />' . $name . '</label> ';
				}
				break;

			case ( 'select' ) :

				$html .= '<select id="' . $args['id'] . '" name="' . $args['name'] . '" value="' . $args['value'] . '" />';

				foreach ( $args['options'] as $key => $name ) {
					$html .= '<option value="' . $key . '" ' . selected( $args['value'], $key, false ) . '>' . $name . '</option>';
				}

				$html .= '</select>';
				break;

			case ( 'multiple' ) :

				$html .= '<fieldset>';

				if ( $args['fields'] ) {

					$count = 1;
					$count_fields = count( $args['fields'] );

					foreach ( $args['fields'] as $subfield_id => $subfield_args ) {
						$html .= $this->render_field( $subfield_args ) . ( $count < $count_fields ? '<br />' : '' );
						$count++;
					}

				}

				$html .= '</fieldset>';
				break;

			case ( 'range_settings' ) :
				$html .= '<input id="' . $args['id'] . '" type="range" name="' . $args['name'] . '" value="' . $args['value'] . '" min="' . $args['min'] . '" max="' . $args['max'] . '" oninput="this.form.' . $args['id'] . '_range.value=this.value" />';
				$html .= '<output name="' . $args['id'] . '_range">' . esc_attr( $args['value'] ) . '</output>';
				//$html .= '<output name="' . $args['id'] . '_range">' . esc_attr( BSPB_Plugin()->options['configuration']['horizontal']['opacity'] ) . '</output>';
				break;

			case ( 'range' ) :
				$html .= '<input id="' . $args['id'] . '" type="range" name="' . $args['name'] . '" value="' . $args['value'] . '" min="' . $args['min'] . '" max="' . $args['max'] . '" oninput="this.form.' . $args['id'] . '_range.value=this.value" />';
				//$html .= '<output name="' . $args['id'] . '_range">' . esc_attr( $args['value'] ) . '</output>';
				$html .= '<output name="' . $args['id'] . '_range">' . esc_attr( BSPB_Plugin()->options['configuration']['horizontal']['opacity'] ) . '</output>';
				break;

			case ( 'color_picker' ) :
				$html .= '<input id="' . $args['id'] . '" class="color-picker" type="text" value="' . $args['value'] . '" name="' . $args['name'] . '" data-default-color="' . $args['default'] . '" />';
				break;

			case ( 'number' ) :
				$html .= ( ! empty( $args['prepend'] ) ? '<span>' . $args['prepend'] . '</span> ' : '' );
				$html .= '<input id="' . $args['id'] . '" type="text" value="' . $args['value'] . '" name="' . $args['name'] . '" />';
				$html .= ( ! empty( $args['append'] ) ? ' <span>' . $args['append'] . '</span>' : '' );
				break;

			case ( 'text' ) :
			default :
				$html .= ( ! empty( $args['prepend'] ) ? '<span>' . $args['prepend'] . '</span> ' : '' );
				$html .= '<input id="' . $args['id'] . '" class="' . $args['class'] . '" type="text" value="' . $args['value'] . '" name="' . $args['name'] . '" />';
				$html .= ( ! empty( $args['append'] ) ? ' <span>' . $args['append'] . '</span>' : '' );
				break;

		}

		if ( ! empty ( $args['description'] ) ) {
			$html .= '<p class="description">' . $args['description'] . '</p>';
		}

		if ( ! empty( $args['return'] ) ) {
			return $html;
		} else {
			echo $html;
		}
	}

	/**
	 * Sanitize field function
	 *
	 * @param mixed
	 * @param string
	 * @return mixed
	 */
	public function sanitize_field( $value = null, $type = '', $args = array() ) {
		if ( is_null( $value ) )
			return null;

		switch ( $type ) {

			case 'boolean':
				$value = empty( $value ) ? false : true;
				break;

			case 'checkbox':
				$value = is_array( $value ) && ! empty( $value ) ? array_map( 'sanitize_text_field', $value ) : array();
				break;

			case 'radio':
				$value = is_array( $value ) ? false : sanitize_text_field( $value );
				break;

			case 'textarea':
			case 'wysiwyg':
				$value = wp_kses_post( $value );
				break;

			case 'color_picker':
				$value = ! $value || '#' == $value ? '' : esc_attr( $value );
				break;

			case 'number':
				$value = ! $value || is_array( $value ) ? '' : str_replace( ',', '', $value );

				if ( ! empty( $args['type'] ) ) {
					switch ( $args['type'] ) {
						case 'int':
							$value = (int) $value;
							break;

						case 'absint':
							$value = absint( $value );
							break;

						case 'float':
						default:
							$value = floatval( $value );
							break;
					}
				} else {
					$value = floatval( $value );
				}
				break;

			case 'text':
			case 'select':
			default:
				$value = is_array( $value ) ? array_map( 'sanitize_text_field', $value ) : sanitize_text_field( $value );
				break;
		}

		return stripslashes_deep( $value );
	}

	/**
	 * Validate settings function
	 *
	 * @param array $input
	 * @return array
	 */
	public function validate_settings( $input ) {
		// check cap
		if ( ! current_user_can( apply_filters( 'bspb_plugin_settings_capability', 'manage_options' ) ) ) {
			return $input;
		}

		// check page
		if ( ! ( $option_page = esc_attr( $_POST['option_page'] ) ) )
			return $input;

		foreach ( $this->settings as $id => $setting ) {

			$key = array_search( $option_page, $setting );

			if ( $key ) {
				// set key
				$setting_id = $id;
				continue;
			}
		}

		// check setting id
		if ( ! $setting_id )
			return $input;

		// save settings
		if ( isset( $_POST['save' . '_' . $this->settings[$setting_id]['prefix']  . '_' . $setting_id] ) ) {

			if ( $this->settings[$setting_id]['fields'] ) {

				foreach ( $this->settings[$setting_id]['fields'] as $field_id => $field ) {

					if ( $field['type'] === 'multiple' ) {

						if ( $field['fields'] ) {

							foreach ( $field['fields'] as $subfield_id => $subfield ) {

								// if subfield has parent
								if ( ! empty( $this->settings[$setting_id]['fields'][$field_id]['fields'][$subfield_id]['parent'] ) ) {

									$field_parent = $this->settings[$setting_id]['fields'][$field_id]['fields'][$subfield_id]['parent'];

									$input[$field_parent][$subfield_id] = isset( $input[$field_parent][$subfield_id] ) ? $this->sanitize_field( $input[$field_parent][$subfield_id], $subfield['type'] ) : ( $subfield['type'] === 'boolean' ? false : BSPB_Plugin()->defaults[$setting_id][$field_parent][$subfield_id] );

								} else {

									$input[$subfield_id] = isset( $input[$subfield_id] ) ? $this->sanitize_field( $input[$subfield_id], $subfield['type'] ) : ( $subfield['type'] === 'boolean' ? false : BSPB_Plugin()->defaults[$setting_id][$field_id][$subfield_id] );

								}

							}

						}

					} else {

						// if field has parent
						if ( ! empty( $this->settings[$setting_id]['fields'][$field_id]['parent'] ) ) {

							$field_parent = $this->settings[$setting_id]['fields'][$field_id]['parent'];

							$input[$field_parent][$field_id] = isset( $input[$field_parent][$field_id] ) ? ( $field['type'] === 'checkbox' ? array_keys( $this->sanitize_field( $input[$field_parent][$field_id], $field['type'] ) ) : $this->sanitize_field( $input[$field_parent][$field_id], $field['type'] ) ) : ( in_array( $field['type'], array( 'boolean', 'checkbox' ) ) ? false : BSPB_Plugin()->defaults[$setting_id][$field_parent][$field_id] );

						} else {

							$input[$field_id] = isset( $input[$field_id] ) ? ( $field['type'] === 'checkbox' ? array_keys( $this->sanitize_field( $input[$field_id], $field['type'] ) ) : $this->sanitize_field( $input[$field_id], $field['type'] ) ) : ( in_array( $field['type'], array( 'boolean', 'checkbox' ) ) ? false : BSPB_Plugin()->defaults[$setting_id][$field_id] );

						}

					}

				}

			}

			if ( $setting_id === 'settings' ) {
				// merge scripts settings
				$input = array_merge( BSPB_Plugin()->options['settings'], $input );
			}

			if ( $setting_id === 'configuration' ) {
				// merge scripts settings
				$input = array_merge( BSPB_Plugin()->options['configuration'], $input );
			}

			if ( $setting_id === 'animation' ) {
				// merge scripts settings
				$input = array_merge( BSPB_Plugin()->options['animation'], $input );
			}

		} elseif ( isset( $_POST['reset' . '_' . $this->settings[$setting_id]['prefix']  . '_' . $setting_id] ) ) {

			if ( $setting_id === 'configuration' ) {
				// merge scripts settings
				$input[BSPB_Plugin()->options['settings']['script']] = BSPB_Plugin()->defaults['configuration'][BSPB_Plugin()->options['settings']['script']];
				$input = array_merge( BSPB_Plugin()->options['configuration'], $input );
			} elseif ( $setting_id === 'settings' ) {
				$input = BSPB_Plugin()->defaults[$setting_id];
				$input['update_version'] = BSPB_Plugin()->options['settings']['update_version'];
				$input['update_notice'] = BSPB_Plugin()->options['settings']['update_notice'];
			} elseif ( $setting_id === 'animation' ) {
				$input = BSPB_Plugin()->defaults[$setting_id];
				$input['update_version'] = BSPB_Plugin()->options['animation']['update_version'];
				$input['update_notice'] = BSPB_Plugin()->options['animation']['update_notice'];
			} else {
				$input = BSPB_Plugin()->defaults[$setting_id];
			}

			add_settings_error( 'reset' . '_' . $this->settings[$setting_id]['prefix']  . '_' . $setting_id, 'settings_restored', __( 'Settings restored to defaults.', 'bspb-plugin' ), 'updated' );

		}

		return $input;
	}

private function bspb_plugin_configuration_notavalaible_callback_function() {
		?>
		<h3><?php _e( 'Add-ons / Extensions', 'bspb-plugin' ); ?></h3>
		<p class="description"><?php _e( 'Enhance your website with these beautiful, easy to use extensions, designed with Responsive Lightbox integration in mind.', 'bspb-plugin' ); ?></p>
		<br />
		<?php
		if ( ( $cache = get_transient( 'bspb_plugin_addons_feed' ) ) === false ) {
			$url = 'https://dfactory.eu/?feed=addons&product=bspb-plugin';

			$feed = wp_remote_get( esc_url_raw( $url ), array( 'sslverify' => false ) );

			if ( ! is_wp_error( $feed ) ) {
				if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
					$cache = wp_remote_retrieve_body( $feed );
					// set_transient( 'bspb_plugin_addons_feed', $cache, 3600 );
				}
			} else {
				$cache = '<div class="error"><p>' . __( 'There was an error retrieving the extensions list from the server. Please try again later.', 'bspb-plugin' ) . '</div>';
			}
		}

		echo $cache;
	}


	/**
	 * Add-ons tab callback
	 *
	 * @return mixed
	 */
	private function addons_tab_cb() {
		?>
		<h3><?php _e( 'Add-ons / Extensions', 'bspb-plugin' ); ?></h3>
		<p class="description"><?php _e( 'Enhance your website with these beautiful, easy to use extensions, designed with Responsive Lightbox integration in mind.', 'bspb-plugin' ); ?></p>
		<br />
		<?php
		if ( ( $cache = get_transient( 'bspb_plugin_addons_feed' ) ) === false ) {
			$url = 'https://dfactory.eu/?feed=addons&product=bspb-plugin';

			$feed = wp_remote_get( esc_url_raw( $url ), array( 'sslverify' => false ) );

			if ( ! is_wp_error( $feed ) ) {
				if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
					$cache = wp_remote_retrieve_body( $feed );
					// set_transient( 'bspb_plugin_addons_feed', $cache, 3600 );
				}
			} else {
				$cache = '<div class="error"><p>' . __( 'There was an error retrieving the extensions list from the server. Please try again later.', 'bspb-plugin' ) . '</div>';
			}
		}

		echo $cache;
	}

   /**
     * Generate the admin instructions/usage text.
     *
     * @since   0.10.0
     *
     * @return  string  Usage text.
     */
    public function usages_tab_cb() {
	    		?>

		<?php
        $usages = '<h3>' .  __( 'Usage :', 'bspb-plugin' ) . '</h3>
		<b>' .  __( 'Shortcode Example :', 'bspb-plugin' ) . '</b><br /><br />
		<br />
                     <b><i>' .  __( 'Minimum Required Shortcode :', 'bspb-plugin' ) . '</i></b><br />
                     <i>' .  __( '( Based on Default Plugin Options )', 'bspb-plugin' ) . '</i><br /><br />
                     <code>[bspb value="90" text="My Title"]</code><br />
                     <ul>
                     <li>' .  __( '<b>value (Required)</b> : in percent represent the value of the progress bar', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>text (Required)</b> : represent the text of the progress bar', 'bspb-plugin' ) . '</li>
                     </ul>
					 <br />
                     <b><i>' .  __( 'Others Shortcode Options :', 'bspb-plugin' ) . '</i></b><br />
                     <i>' .  __( '( Override Default Plugin Options )', 'bspb-plugin' ) . '</i><br /><br />
                     <code>[bspb value="90" text="My Title" type="horizontal" class_parent="myparentclass" class_child="mychildclass" title_position="top-left" value_position="top-right" opacity_bar="1" animate_opacity_bar="0"]</code><br />
                     <ul>
                     <li>' .  __( '<b>type </b> : horizontal, vertical, radial, logo, font-awesome. Represent the type of the progress bar.', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>title_position </b> : top-left, top-center, top-right, bottom-left, bottom-center, bottom-right, inside-left, inside-center, inside-right. Position of the text title', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>value_position </b> :  top-left, top-center, top-right, bottom-left, bottom-center, bottom-right, inside-left, inside-center, inside-right. Position of the text value', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>bgcolor </b> : define the bar background color (transparent, hex or rgb value can be used).', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>barcolor </b> : define the bar color (hex or rgb value can be used).', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>opacity_bar </b> : 0 or 1. Add stripped bar opacity', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>animate_opacity_bar </b> : 0 or 1. Animate the stripped bar opacity', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>opacity_bar_angles </b> : 90, 45, 0 or -45. Angle of the stripped bar opacity', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>class_parent </b> : represent the class(es) of the parent progress bar div. Useful for your own css', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>class_child </b> : represent the class(es) of the child progress bar div. Useful for your own css', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>style_parent </b> : inline style for the parent element.', 'bspb-plugin' ) . '</li>
                     <li>' .  __( '<b>style_child </b> : inline style for the child element.', 'bspb-plugin' ) . '</li>
                     </ul>

                ';
                echo $usages;
    }



 /**
	 * Enqueue frontend scripts and styles
	 */
	public function prefix_add_admin_style_script() {

   // if (!is_admin())
	//{
	//	 wp_register_style(
	//				'prefix-style', plugins_url( '../css/bsbpanimated.css', __FILE__ ), array()
	//			);

	//	wp_enqueue_style( 'prefix-style' );


      wp_register_script( 'bspbanimatedhBackend_js', plugins_url( '../js/bspbanimatedBackend.js', __FILE__ ), array( 'wp-color-picker', 'jquery' ), '1.0.0', true  );


    $current_type = get_option( 'setting_type' );
    //echo $current_type;
    $current_value = array( 'type' => $current_type, 'color2' => '#000099' );
    wp_localize_script( 'bspbanimatedhBackend_js', 'current_value', $current_value );

    // The script can be enqueued now or later.
    wp_enqueue_script( 'bspbanimatedhBackend_js' );


             //wp_localize_script( 'bspbanimatedh_js', 'MyScriptParams', $incomingfrombspbanimated);
// }

  }

	/**
	 * Register options page
	 *
	 * @return void
	 */
	public function admin_menu_options() {
		add_options_page(
			__( 'BSPB Plugin Settings', 'bspb_plugin' ), __( 'BSPB Plugin', 'bspb_plugin' ), apply_filters( 'bspb_plugin_settings_capability', 'manage_options' ), 'bspb-plugin', array( $this, 'options_page' )
		);
	}

	/**
	 * Render options page
	 *
	 * @return void
	 */
	public function options_page() {
		$tab_key = ( isset( $_GET['tab'] ) ? $_GET['tab'] : 'settings' );

		echo '
		<div class="wrap">' . screen_icon() . '
			<h2>' . __( 'BSPB Plugin', 'bspb-plugin' ) . '</h2>
			<h2 class="nav-tab-wrapper">';

		foreach ( $this->tabs as $key => $name ) {
			echo '
			<a class="nav-tab ' . ($tab_key == $key ? 'nav-tab-active' : '') . '" href="' . esc_url( admin_url( 'options-general.php?page=bspb-plugin&tab=' . $key ) ) . '">' . $name['name'] . '</a>';
		}

		echo '
			</h2>
			<div class="bspb-plugin-settings">

				<div class="df-credits">
					<h3 class="hndle">' . __( 'BSPB Plugin', 'bspb-plugin' ) . ' ' . BSPB_Plugin()->defaults['version'] . '</h3>
					<div class="inside">
						<h4 class="inner">' . __( 'Need support?', 'bspb-plugin' ) . '</h4>
						<p class="inner">' . __( 'If you are having problems with this plugin, please talk about them in the', 'bspb-plugin' ) . ' <a href="http://wordpress.org/support/view/plugin-reviews/bspb-progressbar" target="_blank" title="' . __( 'Support forum', 'bspb-plugin' ) . '">' . __( 'Support forum', 'bspb-plugin' ) . '</a></p>
						<hr />
						<h4 class="inner">' . __( 'Do you like this plugin?', 'bspb-plugin' ) . '</h4>
						<p class="inner"><a href="http://wordpress.org/support/view/plugin-reviews/bspb-progressbar" target="_blank" title="' . __( 'Rate it 5', 'bspb-plugin' ) . '">' . __( 'Rate it 5', 'bspb-plugin' ) . '</a> ' . __( 'on WordPress.org', 'bspb-plugin' ) . '<br />' .
		__( 'Blog about it & link to the', 'bspb-plugin' ) . ' <a href="www.pierregagliardi.com" target="_blank" title="' . __( 'plugin page', 'bspb-plugin' ) . '">' . __( 'plugin page', 'bspb-plugin' ) . '</a><br />
						</p>
						<hr />
						<p class="df-link inner">Created by <a href="http://www.pierregagliardi.com" target="_blank" title=""><img src="' . BSPB_URL . '/images/logo-white.png' . '" title="" /></a></p>
					</div>
				</div>

				<form action="options.php" method="post">';

		// tab content callback
		if ( ! empty( $this->tabs[$tab_key]['callback'] ) ) {
			call_user_func( $this->tabs[$tab_key]['callback'] );
		} else {
			wp_nonce_field( 'update-options' );
			settings_fields( $this->tabs[$tab_key]['key'] );
			do_settings_sections( $this->tabs[$tab_key]['key'] );
		}

		if ( ! empty( $this->tabs[$tab_key]['submit'] ) || ! empty( $this->tabs[$tab_key]['reset'] ) ) {

			echo '		<p class="submit">';
			if ( ! empty( $this->tabs[$tab_key]['submit'] ) ) {
				submit_button( '', array( 'primary', 'save-' . $tab_key ), $this->tabs[$tab_key]['submit'], false );
				echo ' ';
			}
			if ( ! empty( $this->tabs[$tab_key]['reset'] ) ) {
				submit_button( __( 'Reset to defaults', 'bspb-plugin' ), array( 'secondary', 'reset-' . $tab_key ), $this->tabs[$tab_key]['reset'], false );
			}
			echo '		</p>';

		}

		echo '
				</form>
			</div>
			<div class="clear"></div>
		</div>';
	}

    } // END class BSPB_Plugin_Settings