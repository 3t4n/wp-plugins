<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/admin
 * @author     Jase Warner <jase@jase.io>
 */
class Social_Icons_Obvs_Admin {

	/**
	 * The plugin options.
	 *
	 * @since   1.0.0
	 * @access 	private
	 * @var 	string 			$options    The plugin options.
	 */
	private $options;

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Option page hook suffix.
	 *
	 * @since   1.0.0
	 * @access  private
	 */
	private $option_page_hook_suffix;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string $plugin_name The name of this plugin.
	 * @param    string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->set_options();

	}

	/**
	 * Create settings link in plugin admin area.
	 *
	 * @since   1.0.0
	 */
	public function settings_link( $links ) {

		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			admin_url( 'options-general.php?page=' . $this->plugin_name . '-settings' ),
			__( 'Settings' )
		);

		array_unshift( $links, $settings_link );

		return $links;

	}

	/**
	 * Adds a settings page link to a menu.
	 *
	 * @since   1.0.0
	 */
	public function add_menu() {

		$this->option_page_hook_suffix = add_submenu_page(
			'options-general.php',
			'Social Icons Obvs',
			'Social Icons Obvs',
			'manage_options',
			$this->plugin_name . '-settings',
			array( $this, 'page_options' )
		);

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since   1.0.0
	 */
	public function enqueue_styles( $hook_suffix ) {

		if ( $hook_suffix == $this->option_page_hook_suffix ) {

			wp_enqueue_style( $this->plugin_name . '-spectrum', plugin_dir_url( __FILE__ ) . 'assets/css/social-icons-obvs-spectrum.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-jquery-ui', plugin_dir_url( __FILE__ ) . 'assets/css/social-icons-obvs-jquery-ui.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/social-icons-obvs-admin.min.css', array(), $this->version, 'all' );

		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since   1.0.0
	 */
	public function enqueue_scripts( $hook_suffix ) {

		if ( $hook_suffix == $this->option_page_hook_suffix ) {

			wp_enqueue_script( $this->plugin_name . '-spectrum', plugin_dir_url( __FILE__ ) . 'assets/js/social-icons-obvs-spectrum.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name . '-jquery-ui', plugin_dir_url( __FILE__ ) . 'assets/js/social-icons-obvs-jquery-ui.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/social-icons-obvs-admin.min.js', array( 'jquery' ), $this->version, false );

		}

	}

	/**
	 * Creates text field.
	 *
	 * @since   1.0.0
	 */
	public function field_text( $args ) {

		$defaults['id']            = '';
		$defaults['class']         = '';
		$defaults['description']   = '';
		$defaults['label']         = '';
		$defaults['name']          = $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['placeholder']   = '';
		$defaults['type']          = '';
		$defaults['value']         = '';
		$defaults['min']           = '';

		apply_filters( $this->plugin_name . '-field-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[ $atts['id'] ] ) ) {

			$atts['value'] = $this->options[ $atts['id'] ];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-text.php' );

	}

	/**
	 * Creates checkbox and text field row.
	 *
	 * @since   1.0.0
	 */
	public function field_checkbox_text( $args ) {

		$defaults['checkbox_id'] 	    = '';
		$defaults['checkbox_class']     = '';
		$defaults['checkbox_value']     = 0;
		$defaults['checkbox_name'] 	    = $this->plugin_name . '-options[' . $args['checkbox_id'] . ']';
		$defaults['text_id']            = '';
		$defaults['text_label']         = '';
		$defaults['text_name']          = $this->plugin_name . '-options[' . $args['text_id'] . ']';
		$defaults['text_placeholder']   = '';
		$defaults['text_type']          = '';
		$defaults['text_value']         = '';

		apply_filters( $this->plugin_name . '-field-checkbox-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[ $atts['checkbox_id'] ] ) ) {

			$atts['checkbox_value'] = $this->options[ $atts['checkbox_id'] ];

		}

		if ( ! empty( $this->options[ $atts['text_id'] ] ) ) {

			$atts['text_value'] = $this->options[ $atts['text_id'] ];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-checkbox-text.php' );

	}

	/**
	 * Creates a select field.
	 *
	 * @since   1.0.0
	 */
	public function field_select( $args ) {

		$defaults['aria'] 			= '';
		$defaults['blank'] 			= '';
		$defaults['class'] 			= '';
		$defaults['context'] 		= '';
		$defaults['id'] 		    = '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['selections'] 	= array();
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-select-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[ $atts['id'] ] ) ) {

			$atts['value'] = $this->options[ $atts['id'] ];

		}

		if ( empty( $atts['aria'] ) && ! empty( $atts['description'] ) ) {

			$atts['aria'] = $atts['description'];

		} elseif ( empty( $atts['aria'] ) && ! empty( $atts['label'] ) ) {

			$atts['aria'] = $atts['label'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-select.php' );

	}

	/**
	 * Creates a select and text field.
	 *
	 * @since   1.0.0
	 */
	public function field_select_text( $args ) {

		$defaults['aria'] 			= '';
		$defaults['blank'] 			= '';
		$defaults['class'] 			= '';
		$defaults['context'] 		= '';
		$defaults['id'] 		    = '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['selections'] 	= array();
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-select-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[ $atts['id'] ] ) ) {

			$atts['value'] = $this->options[ $atts['id'] ];

		}

		if ( empty( $atts['aria'] ) && ! empty( $atts['description'] ) ) {

			$atts['aria'] = $atts['description'];

		} elseif ( empty( $atts['aria'] ) && ! empty( $atts['label'] ) ) {

			$atts['aria'] = $atts['label'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-select-text.php' );

	}

	/**
	 * Creates the options page.
	 *
	 * @since   1.0.0
	 */
	public function page_options() {
		include( plugin_dir_path( __FILE__ ) . 'partials/social-icons-obvs-admin-page-settings.php' );
	}

	/**
	 * Register the fields.
	 *
	 * @since   1.0.0
	 */
	public function register_fields() {

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		/**
		 * Accounts section fields.
		 */
		add_settings_field(
			'behance',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--behance sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Behance</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'behance',
				'text_id'           => 'behance_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://www.behance.net/your-name',
				'text_value'        => 'https://www.behance.net/',
			)
		);

		add_settings_field(
			'bitbucket',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--bitbucket sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Bitbucket</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'bitbucket',
				'text_id'           => 'bitbucket_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://bitbucket.org/your-name',
				'text_value'        => 'https://bitbucket.org/',
			)
		);

		add_settings_field(
			'dribbble',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--dribbble sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Dribbble</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'dribbble',
				'text_id'           => 'dribbble_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://www.dribbble.com/your-name',
				'text_value'        => 'https://www.dribbble.com/',
			)
		);

		add_settings_field(
			'facebook',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--facebook sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Facebook</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'facebook',
				'text_id'           => 'facebook_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://www.facebook.com/your-name',
				'text_value'        => 'https://www.facebook.com/',
			)
		);

		add_settings_field(
			'github',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--github sio-icon--brand sio-icon--rounded sio-icon--sm"></span>GitHub</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'github',
				'text_id'           => 'github_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://github.com/your-name',
				'text_value'        => 'https://github.com/',
			)
		);

		add_settings_field(
			'instagram',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--instagram sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Instagram</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'instagram',
				'text_id'           => 'instagram_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://instagram.com/your-name',
				'text_value'        => 'https://instagram.com/',
			)
		);

		add_settings_field(
			'linkedin',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--linkedin sio-icon--brand sio-icon--rounded sio-icon--sm"></span>LinkedIn</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'linkedin',
				'text_id'           => 'linkedin_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://linkedin.com/in/your-name',
				'text_value'        => 'https://linkedin.com/',
			)
		);

		add_settings_field(
			'pinterest',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--pinterest sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Pinterest</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'pinterest',
				'text_id'           => 'pinterest_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://pinterest.com/your-name',
				'text_value'        => 'https://pinterest.com/',
			)
		);

		add_settings_field(
			'soundcloud',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--soundcloud sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Soundcloud</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'soundcloud',
				'text_id'           => 'soundcloud_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://soundcloud.com/your-name',
				'text_value'        => 'https://soundcloud.com/',
			)
		);

		add_settings_field(
			'tumblr',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--tumblr sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Tumblr</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'tumblr',
				'text_id'           => 'tumblr_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://your-name.tumblr.com',
				'text_value'        => 'https://',
			)
		);

		add_settings_field(
			'twitter',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--twitter sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Twitter</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'twitter',
				'text_id'           => 'twitter_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://twitter.com/your-name',
				'text_value'        => 'https://twitter.com/',
			)
		);

		add_settings_field(
			'vimeo',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--vimeo sio-icon--brand sio-icon--rounded sio-icon--sm"></span>Vimeo</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'vimeo',
				'text_id'           => 'vimeo_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://vimeo.com/your-name',
				'text_value'        => 'https://vimeo.com/',
			)
		);

		add_settings_field(
			'whatsapp',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--whatsapp sio-icon--brand sio-icon--rounded sio-icon--sm"></span>WhatsApp</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'whatsapp',
				'text_id'           => 'whatsapp_url',
				'text_label'        => 'Phone number (international format):',
				'text_type'         => 'tel',
				'text_placeholder'  => 'e.g. +447712345678',
				'text_value'        => '',
			)
		);

		add_settings_field(
			'youtube',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--youtube sio-icon--brand sio-icon--rounded sio-icon--sm"></span>YouTube</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'youtube',
				'text_id'           => 'youtube_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://youtube.com/user/your-name',
				'text_value'        => 'https://youtube.com/',
			)
		);

		add_settings_field(
			'yunojuno',
			'<span class="sio-heading-icon"><span class="sio-icon sio-icon--yunojuno sio-icon--brand sio-icon--rounded sio-icon--sm"></span>YunoJuno</span>',
			array( $this, 'field_checkbox_text' ),
			$this->plugin_name . '-accounts',
			$this->plugin_name . '-accounts',
			array(
				'checkbox_id' 	    => 'yunojuno',
				'text_id'           => 'yunojuno_url',
				'text_label'        => 'URL:',
				'text_type'         => 'url',
				'text_placeholder'  => 'e.g. https://yunojuno.com/user/your-name',
				'text_value'        => 'https://uk.yunojuno.com/p/',
			)
		);

		/**
		 * Customise section fields.
		 */
		add_settings_field(
			'alignment',
			'Alignment',
			array( $this, 'field_select' ),
			$this->plugin_name . '-customise',
			$this->plugin_name . '-customise',
			array(
				'id'                => 'alignment',
				'value'             => 'center',
				'selections'        => array(
					0 => array(
						'label' => 'Center',
						'value' => 'center',
					),
					1 => array(
						'label' => 'Left',
						'value' => 'left',
					),
					2 => array(
						'label' => 'Right',
						'value' => 'right',
					),
				),
			)
		);

		add_settings_field(
			'background',
			'Background Colour',
			array( $this, 'field_select_text' ),
			$this->plugin_name . '-customise',
			$this->plugin_name . '-customise',
			array(
				'id'                => 'background',
				'value'             => 'brand',
				'selections'        => array(
					0 => array(
						'label' => 'Brand',
						'value' => 'brand',
					),
					1 => array(
						'label' => 'Transparent',
						'value' => 'transparent',
					),
					2 => array(
						'label' => 'Custom',
						'value' => 'custom',
					),
				),
			)
		);

		add_settings_field(
			'shape',
			'Shape',
			array( $this, 'field_select' ),
			$this->plugin_name . '-customise',
			$this->plugin_name . '-customise',
			array(
				'id'                => 'shape',
				'value'             => 'rounded',
				'selections'        => array(
					0 => array(
						'label' => 'Rounded Corners',
						'value' => 'rounded',
					),
					1 => array(
						'label' => 'Square',
						'value' => 'square',
					),
					2 => array(
						'label' => 'Circle',
						'value' => 'circle',
					),
				),
			)
		);

		add_settings_field(
			'size',
			'Size',
			array( $this, 'field_select' ),
			$this->plugin_name . '-customise',
			$this->plugin_name . '-customise',
			array(
				'id'                => 'size',
				'value'             => 'sm',
				'selections'        => array(
					0 => array(
						'label' => 'Small',
						'value' => 'sm',
					),
					1 => array(
						'label' => 'Medium',
						'value' => 'md',
					),
					2 => array(
						'label' => 'Large',
						'value' => 'lg',
					),
				),
			)
		);

		add_settings_field(
			'spacing',
			'Spacing',
			array( $this, 'field_select' ),
			$this->plugin_name . '-customise',
			$this->plugin_name . '-customise',
			array(
				'id'                => 'spacing',
				'value'             => 'xs',
				'selections'        => array(
					0 => array(
						'label' => 'Extra Small',
						'value' => 'xs',
					),
					1 => array(
						'label' => 'Small',
						'value' => 'sm',
					),
					2 => array(
						'label' => 'Medium',
						'value' => 'md',
					),
					3 => array(
						'label' => 'Large',
						'value' => 'lg',
					),
					4 => array(
						'label' => 'Extra Large',
						'value' => 'xl',
					),
				),
			)
		);

		add_settings_field(
			'custom_background',
			'Custom Background Colour',
			array( $this, 'field_text' ),
			$this->plugin_name . '-customise',
			$this->plugin_name . '-customise',
			array(
				'id'        => 'custom-background',
				'type'      => 'hidden',
			)
		);

		/**
		 * Display section fields.
		 */
		add_settings_field(
			'behance_pos',
			'behance',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'behance_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'bitbucket_pos',
			'bitbucket',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'bitbucket_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'dribbble_pos',
			'dribbble',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'dribbble_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'facebook_pos',
			'facebook',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'facebook_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'github_pos',
			'github',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'github_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'instagram_pos',
			'instagram',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'instagram_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'linkedin_pos',
			'linkedin',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'linkedin_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'pinterest_pos',
			'pinterest',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'pinterest_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'soundcloud_pos',
			'soundcloud',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'soundcloud_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'tumblr_pos',
			'tumblr',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'tumblr_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'twitter_pos',
			'twitter',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'twitter_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'vimeo_pos',
			'vimeo',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'vimeo_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'whatsapp_pos',
			'whatsapp',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'whatsapp_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'youtube_pos',
			'youtube',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'youtube_pos',
				'type'      => 'hidden',
			)
		);

		add_settings_field(
			'yunojuno_pos',
			'yunojuno',
			array( $this, 'field_text' ),
			$this->plugin_name . '-display',
			$this->plugin_name . '-display',
			array(
				'class'     => 'sio-pos-input',
				'id'        => 'yunojuno_pos',
				'type'      => 'hidden',
			)
		);

	}

	/**
	 * Register settings section.
	 *
	 * @since   1.0.0
	 */
	public function register_sections() {

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			$this->plugin_name . '-accounts',
			apply_filters( $this->plugin_name . 'section-title-accounts', esc_html__( 'Your Social Accounts', $this->plugin_name ) ),
			array( $this, 'section_accounts' ),
			$this->plugin_name . '-accounts'
		);

		add_settings_section(
			$this->plugin_name . '-customise',
			apply_filters( $this->plugin_name . 'section-title-customise', esc_html__( 'Appearance', $this->plugin_name ) ),
			array( $this, 'section_customise' ),
			$this->plugin_name . '-customise'
		);

		add_settings_section(
			$this->plugin_name . '-display',
			apply_filters( $this->plugin_name . 'section-title-display', esc_html__( 'Sorting and Display', $this->plugin_name ) ),
			array( $this, 'section_display' ),
			$this->plugin_name . '-display'
		);

	}

	/**
	 * Register plugin settings.
	 *
	 * @since   1.0.0
	 */
	public function register_settings() {

		// register_setting( $option_group, $option_name, $sanitize_callback );

		register_setting(
			$this->plugin_name . '-options',
			$this->plugin_name . '-options',
			array( $this, 'validate_options' )
		);

	}

	/**
	 * Sanitzer.
	 *
	 * @since   1.0.0
	 */
	private function sanitizer( $type, $data ) {

		if ( empty( $type ) ) { return; }
		if ( empty( $data ) ) { return; }

		$return 	= '';
		$sanitizer 	= new Social_Icons_Obvs_Sanitize();
		$sanitizer->set_data( $data );
		$sanitizer->set_type( $type );
		$return = $sanitizer->clean();

		unset( $sanitizer );
		return $return;

	}

	/**
	 * Create account settings section.
	 *
	 * @since   1.0.0
	 */
	public function section_accounts( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/social-icons-obvs-admin-section-accounts.php' );

	}

	/**
	 * Create Customise settings section.
	 *
	 * @since   1.0.0
	 */
	public function section_customise( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/social-icons-obvs-admin-section-customise.php' );

	}

	/**
	 * Create Display settings section.
	 *
	 * @since   1.0.0
	 */
	public function section_display( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/social-icons-obvs-admin-section-display.php' );

	}

	/**
	 * Sets the class variable $options.
	 *
	 * @since   1.0.0
	 */
	private function set_options() {
		$this->options = get_option( $this->plugin_name . '-options' );
	}

	/**
	 * Validates saved options.
	 *
	 * @since   1.0.0
	 */
	private function validate_options( $input ) {

		$valid 		= array();
		$options 	= $this->get_options_list();

		foreach ( $options as $option ) {

			$name = $option[0];
			$type = $option[1];

			if ( 'repeater' === $type && is_array( $option[2] ) ) {

				$clean = array();

				foreach ( $option[2] as $field ) {

					foreach ( $input[ $field[0] ] as $data ) {

						if ( empty( $data ) ) { continue; }

						$clean[ $field[0] ][] = $this->sanitizer( $field[1], $data );

					}
				}

				$count = social_icons_obvs_get_max( $clean );

				for ( $i = 0; $i < $count; $i++ ) {

					foreach ( $clean as $field_name => $field ) {

						$valid[ $option[0] ][ $i ][ $field_name ] = $field[ $i ];

					}
				}
			} else {

				$valid[ $option[0] ] = $this->sanitizer( $type, $input[ $name ] );

			}
		}

		return $valid;

	}
}
