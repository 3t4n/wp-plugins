<?php
/**
 * Appreciators WP Plugin
 *
 * @package   Appreciators
 * @author    Minh Lee <minh@appreciators.org>
 * @license   GPL-2.0+
 * @copyright 2016 Appreciators Clique
 */

/**
 * Appreciators_Admin class.
 *
 * @package   Appreciators_Admin
 * @author    Minh Lee <minh@appreciators.org>
 */
class Appreciators_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @var   object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since 1.0.0
	 *
	 * @var   string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		$this->plugin_slug = Appreciators::get_plugin_slug();

		// Custom contact methods.
		//add_filter( 'user_contactmethods', array( $this, 'contact_methods' ), 10, 1 );

		// Load admin JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_js' ) );

		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		// Init plugin options form.
		add_action( 'admin_init', array( $this, 'plugin_settings' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since  1.0.0
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Sets default settings.
	 *
	 * @since  1.0.0
	 *
	 * @return array Plugin default settings.
	 */
	protected function default_settings() {

		$settings = array(

            
			/*'custom_css' => array(
				'title' => __( 'Custom CSS', $this->plugin_slug ),
				'type' => 'section',
				'menu' => 'appreciators_settings'
			),
			'custom_css_default' => array(
				'title' => __( 'YOUR Custom CSS', $this->plugin_slug ),
				'default' => '',
				'type' => 'textarea',
				'section' => 'custom_css',
				'description' => __( 'Paste your custom CSS here', $this->plugin_slug ),
				'menu' => 'appreciators_settings'
			),
			'responsive_css' => array(
				'title' => __( 'Responsive CSS', $this->plugin_slug ),
				'type' => 'section',
				'menu' => 'appreciators_settings'
			),
			'custom_css_desktop' => array(
				'title' => __( 'DESKTOP<br />1,200px +', $this->plugin_slug ),
				'default' => '',
				'type' => 'textarea',
				'section' => 'responsive_css',
				'description' => __( 'Paste your custom CSS for DESKTOP 1,200px + here', $this->plugin_slug ),
				'menu' => 'appreciators_settings'
			),
			'custom_css_ipad_landscape' => array(
				'title' => __( 'IPAD LANDSCAPE<br />1019 - 1199px', $this->plugin_slug ),
				'default' => '',
				'type' => 'textarea',
				'section' => 'responsive_css',
				'description' => __( 'Paste your custom CSS for IPAD LANDSCAPE 1019 - 1199px here', $this->plugin_slug ),
				'menu' => 'appreciators_settings'
			),
			'custom_css_ipad_portrait' => array(
				'title' => __( 'IPAD PORTRAIT<br />768 - 1018px', $this->plugin_slug ),
				'default' => '',
				'type' => 'textarea',
				'section' => 'responsive_css',
				'description' => __( 'Paste your custom CSS for IPAD PORTRAIT 768 - 1018px here', $this->plugin_slug ),
				'menu' => 'appreciators_settings'
			),
			'custom_css_smartphones' => array(
				'title' => __( 'SMARTPHONES<br />0 - 767px', $this->plugin_slug ),
				'default' => '',
				'type' => 'textarea',
				'section' => 'responsive_css',
				'description' => __( 'Paste your custom CSS for SMARTPHONES 0 - 767px here', $this->plugin_slug ),
				'menu' => 'appreciators_settings'
			),*/
		);

		return $settings;

	}

	/**
	 * Custom contact methods.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $methods Old contact methods.
	 *
	 * @return array          New contact methods.
	 */
	public function contact_methods( $methods ) {
		// Add new methods.
		$methods['sabbehance']   = __( 'SAB: Behance URL', $this->plugin_slug );
		$methods['sabblogger']   = __( 'SAB: Blogger URL', $this->plugin_slug );
		$methods['sabdelicious']   = __( 'SAB: Delicious URL', $this->plugin_slug );
		$methods['sabdeviantart']   = __( 'SAB: DeviantArt URL', $this->plugin_slug );
		$methods['sabdribbble']   = __( 'SAB: Dribbble URL', $this->plugin_slug );
		$methods['sabemail']   = __( 'SAB: Email Address', $this->plugin_slug );
		$methods['sabfacebook']   = __( 'SAB: Facebook URL', $this->plugin_slug );
		$methods['sabflickr']   = __( 'SAB: Flickr URL', $this->plugin_slug );
		$methods['sabgithub']   = __( 'SAB: GitHub URL', $this->plugin_slug );
		$methods['sabgoogle']   = __( 'SAB: Google+ URL', $this->plugin_slug );
		$methods['sabinstagram']   = __( 'SAB: Instagram URL', $this->plugin_slug );
		$methods['sablinkedin']   = __( 'SAB: LinkedIn URL', $this->plugin_slug );
		$methods['sabmyspace']   = __( 'SAB: MySpace URL', $this->plugin_slug );
		$methods['sabpinterest']   = __( 'SAB: Pinterest URL', $this->plugin_slug );
		$methods['sabrss']   = __( 'SAB: RSS Feed URL', $this->plugin_slug );
		$methods['sabstumbleupon']   = __( 'SAB: StumbleUpon URL', $this->plugin_slug );
		$methods['sabtumblr']   = __( 'SAB: Tumblr URL', $this->plugin_slug );
		$methods['sabtwitter']   = __( 'SAB: Twitter URL', $this->plugin_slug );
		$methods['sabvimeo']   = __( 'SAB: Vimeo URL', $this->plugin_slug );
		$methods['sabwordpress']   = __( 'SAB: WordPress URL', $this->plugin_slug );
		$methods['sabyahoo']   = __( 'SAB: Yahoo! URL', $this->plugin_slug );
		$methods['sabyoutube']   = __( 'SAB: YouTube URL', $this->plugin_slug );

		// Remove old methods.
		unset( $methods['aim'] );
		unset( $methods['yim'] );
		unset( $methods['jabber'] );

		return $methods;
	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since  1.0.0
	 *
	 * @return null Return early if no settings page is registered.
	 */
    public function enqueue_admin_js($hook) {
        // Load the JS conditionally
        if($hook != "toplevel_page_appreciators")
            return;

        if(APP_ENV == 'dev')
            $appWebURL = 'https://dev.appreciators.org';
        else if(APP_ENV == 'stage')
            $appWebURL = 'https://appreciators.org:8444';
        else
            $appWebURL = 'https://appreciators.org';

            wp_enqueue_script(
				'env',
				$appWebURL . '/env.js',
				array( ),
				null,
				true
			);

            wp_enqueue_script('appreciators-client', $appWebURL . '/Widgets/js/appreciators-client.js', array('env'), '1.1', true);
	}

	/**
	 * Register the administration menu for this plugin into the
	 * WordPress Dashboard menu.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	/*public function add_plugin_admin_menu() {
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Appreciators WP Plugin', $this->plugin_slug ),
			__( 'Appreciators WP Plugin', $this->plugin_slug ),
			'manage_options',
			$this->plugin_slug,
			array( $this, 'display_plugin_admin_page' )
		);
	}*/

	/**
	* Create Admin Menu for Appreciators WP Plugin
	*
	*/
	public function add_plugin_admin_menu(){
		
		// Appreciators WP Plugin Admin Menu
		add_menu_page( 
				'Settings',
				'Appreciators',
				'manage_options',
				'appreciators', 
				array( $this,'display_plugin_admin_page' ),
				'dashicons-id', 
				40
		);

		$admin_page = add_submenu_page(
			'appreciators',
			'Appreciators WP Plugin Settings',
			'Settings', 
			'manage_options', 
			'appreciators',
			array( $this, 'display_plugin_admin_page' )
		);

		add_submenu_page(
			'appreciators',
			'About Appreciators WP Plugin',
			'About',
			'manage_options', 
			'appreciators-about',
			array( $this, 'display_plugin_about_page' )
		);
	}

    // This function is only called when our plugin's page loads!
    function load_admin_js(){
        // Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_js' ) );
    }

	/**
	 * Plugin settings form fields.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function plugin_settings() {
		$settings = 'appreciators_settings';

		foreach ( $this->default_settings() as $key => $value ) {

			switch ( $value['type'] ) {
				case 'section':
					add_settings_section(
						$key,
						$value['title'],
						'__return_false',
						$value['menu']
					);
					break;
				case 'text':
					add_settings_field(
						$key,
						$value['title'],
						array( $this, 'text_element_callback' ),
						$value['menu'],
						$value['section'],
						array(
							'menu' => $value['menu'],
							'id' => $key,
							'class' => 'small-text',
							'description' => isset( $value['description'] ) ? $value['description'] : ''
						)
					);
					break;
				case 'textarea':
					add_settings_field(
						$key,
						$value['title'],
						array( $this, 'textarea_element_callback'),
						$value['menu'],
						$value['section'],
						array(
							'menu' => $value['menu'],
							'id' => $key,
							'class' => 'large-text',
							'description' => isset( $value['description'] ) ? $value['description'] : ''
						)
					);
					break;
				case 'checkbox':
					add_settings_field(
						$key,
						$value['title'],
						array( $this, 'checkbox_element_callback' ),
						$value['menu'],
						$value['section'],
						array(
							'menu' => $value['menu'],
							'id' => $key,
							'class' => 'checkbox',
							'description' => isset( $value['description'] ) ? $value['description'] : ''
						)
					);
					break;
				case 'select':
					add_settings_field(
						$key,
						$value['title'],
						array( $this, 'select_element_callback' ),
						$value['menu'],
						$value['section'],
						array(
							'menu' => $value['menu'],
							'id' => $key,
							'description' => isset( $value['description'] ) ? $value['description'] : '',
							'options' => $value['options']
						)
					);
					break;
				case 'color':
					add_settings_field(
						$key,
						$value['title'],
						array( $this, 'color_element_callback' ),
						$value['menu'],
						$value['section'],
						array(
							'menu' => $value['menu'],
							'id' => $key,
							'description' => isset( $value['description'] ) ? $value['description'] : ''
						)
					);
					break;

				default:
					break;
			}

		}

		// Register settings.
		register_setting( $settings, $settings, array( $this, 'validate_options' ) );
	}

	/**
	 * Text element fallback.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args Field arguments.
	 *
	 * @return string      Text field.
	 */
	public function text_element_callback( $args ) {
		$menu  = $args['menu'];
		$id    = $args['id'];
		$class = isset( $args['class'] ) ? $args['class'] : 'small-text';

		$options = get_option( $menu );

		if ( isset( $options[ $id ] ) ) {
			$current = $options[ $id ];
		} else {
			$current = isset( $args['default'] ) ? $args['default'] : '';
		}

		$html = sprintf( '<input style="width:200px;" type="text" id="%1$s" name="%2$s[%1$s]" value="%3$s" class="%4$s" />', $id, $menu, $current, $class );

		// Displays option description.
		if ( isset( $args['description'] ) ) {
			$html .= sprintf( '<p class="description">%s</p>', $args['description'] );
		}

		echo $html;
	}

	/**
	 * Text Area element fallback.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args Field arguments.
	 *
	 * @return string      Text field.
	 */
	public function textarea_element_callback( $args ) {
		$menu  = $args['menu'];
		$id    = $args['id'];
		$class = isset( $args['class'] ) ? $args['class'] : 'large-text';

		$options = get_option( $menu );

		if ( isset( $options[ $id ] ) ) {
			$current = $options[ $id ];
		} else {
			$current = isset( $args['default'] ) ? $args['default'] : '';
		}

		$html = sprintf( '<textarea style="width:550px;height: 175px;" type="text" id="%1$s" name="%2$s[%1$s]" class="%4$s" />%3$s</textarea>', $id, $menu, $current, $class );

		// Displays option description.
		if ( isset( $args['description'] ) ) {
			$html .= sprintf( '<p class="description">%s</p>', $args['description'] );
		}

		echo $html;
	}

	/**
	 * Text element fallback.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args Field arguments.
	 *
	 * @return string      Text field.
	 */
	public function checkbox_element_callback( $args ) {
		$menu  = $args['menu'];
		$id    = $args['id'];
		$class = isset( $args['class'] ) ? $args['class'] : 'checkbox';

		$options = get_option( $menu );

		if ( isset( $options[ $id ] ) ) {
			$current = $options[ $id ];
		} else {
			$current = isset( $args['default'] ) ? $args['default'] : '';
		}

		$html = sprintf( '<input type="checkbox" id="%1$s" name="%2$s[%1$s]" value="%3$s" class="%4$s" />', $id, $menu, $current, $class );

		// Displays option description.
		if ( isset( $args['description'] ) ) {
			$html .= sprintf( '<p class="description">%s</p>', $args['description'] );
		}

		echo $html;
	}

	/**
	 * Select field fallback.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args Field arguments.
	 *
	 * @return string      Select field.
	 */
	public function select_element_callback( $args ) {
		$menu = $args['menu'];
		$id   = $args['id'];

		$options = get_option( $menu );

		// Sets current option.
		if ( isset( $options[ $id ] ) ) {
			$current = $options[ $id ];
		} else {
			$current = isset( $args['default'] ) ? $args['default'] : '';
		}

		$html = sprintf( '<select id="%1$s" name="%2$s[%1$s]">', $id, $menu );
		foreach( $args['options'] as $key => $label ) {
			$key = sanitize_title( $key );

			$html .= sprintf( '<option value="%s"%s>%s</option>', $key, selected( $current, $key, false ), $label );
		}
		$html .= '</select>';

		// Displays the description.
		if ( $args['description'] ) {
			$html .= sprintf( '<p class="description">%s</p>', $args['description'] );
		}

		echo $html;
	}

	/**
	 * Color element fallback.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args Field arguments.
	 *
	 * @return string      Color field.
	 */
	public function color_element_callback( $args ) {
		$menu = $args['menu'];
		$id   = $args['id'];

		$options = get_option( $menu );

		if ( isset( $options[ $id ] ) ) {
			$current = $options[ $id ];
		} else {
			$current = isset( $args['default'] ) ? $args['default'] : '#333333';
		}

		$html = sprintf( '<input type="text" id="%1$s" name="%2$s[%1$s]" value="%3$s" class="appreciators-color-field" />', $id, $menu, $current );

		// Displays option description.
		if ( isset( $args['description'] ) ) {
			$html .= sprintf( '<p class="description">%s</p>', $args['description'] );
		}

		echo $html;
	}

	/**
	 * Valid options.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $input options to valid.
	 *
	 * @return array        validated options.
	 */
	public function validate_options( $input ) {
		// Create our array for storing the validated options.
		$output = array();

		// Loop through each of the incoming options.
		foreach ( $input as $key => $value ) {

			// Check to see if the current option has a value. If so, process it.
			if ( isset( $input[ $key ] ) ) {

				// Strip all HTML and PHP tags and properly handle quoted strings.
				$output[ $key ] = sanitize_text_field( $input[ $key ] );
			}
		}

		return $output;
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since 1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once 'views/admin.php';
	}

	/**
	 * Render the about page for this plugin.
	 *
	 * @since 1.0.0
	 */
	public function display_plugin_about_page() {
		include_once 'views/about.php';
	}

    

}
