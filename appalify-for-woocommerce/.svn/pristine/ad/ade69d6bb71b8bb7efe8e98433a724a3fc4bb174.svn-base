<?php
/**
 * Settings class file.
 *
 * @package WordPress Plugin Template/Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function quick_view_button_dynamic_css() {

	wp_enqueue_style('quick-view-modal-css', PLUGIN_URL . 'assets/css/quick-view-modal.css');
    // Get the button options from the database
    $button_color = get_option('button_color_appalify_qv', '#333');
    $text_color = get_option('textbutton_color_appalify_qv', '#fff');
    $border_color = get_option('button_border_color_appalify_qv', '#333');
    $border_radius = get_option('button_border_radius_appalify_qv', '5');
    $modal_width_appalify_qv = get_option('modal_width_appalify_qv', '600');
    $image_width_appalify_qv = get_option('image_width_appalify_qv', '100');
    $mobile_modal_width_appalify_qv = get_option('mobile_modal_width_appalify_qv', '300');
    $mobile_image_width_appalify_qv = get_option('mobile_image_width_appalify_qv', '50');
    $background_opacity_appalify_qv = '40';

    // Dynamic CSS
    $custom_css = "
        .quick-view-button {
            background-color: {$button_color};
            color: {$text_color};
            border: 1px solid {$border_color};
            border-radius: {$border_radius}px;
        }

        .quick-view-button:hover {
            opacity: 0.8;
        }
        .qv_add_to_cart_button {
            display: inline-block;
            padding: 10px;
            border-radius: {$border_radius}px;
            background-color: {$button_color};
            color: {$text_color};
            border: 1px solid {$border_color};
            text-decoration: none;
            margin-top: 15px;
        }
        .quick-view-modal {
            max-width: {$modal_width_appalify_qv}px;
        }
        .quick-view-image img {
            padding-top: 10px;
            padding-bottom: 10px;
            max-width: {$image_width_appalify_qv}px;
            height: auto;
        }
        .quick-view-overlay {
            background: rgba(0, 0, 0, " . ($background_opacity_appalify_qv / 100) . ");
        }

        @media only screen and (max-width: 768px) {
            .quick-view-modal {
                max-width: {$mobile_modal_width_appalify_qv}px;
            }
            .quick-view-image img {
                padding-top: 10px;
                padding-bottom: 10px;
                max-width: {$mobile_image_width_appalify_qv}px;
                height: auto;
            }
        }
    ";

    // Add the dynamic CSS inline
    wp_add_inline_style('quick-view-modal-css', $custom_css);
} add_action( 'wp_enqueue_scripts', 'quick_view_button_dynamic_css' );

function appalify_include_files_late() {
	
	// Get legend dir path.
	$plugin_dir = plugin_dir_path(__FILE__);
	$wc_file_to_include = $plugin_dir . 'integration/class-appalify-functions-hooks-integration-woocommerce.php';
	$wc_file_to_include_qv = $plugin_dir . 'integration/class-appalify-qv-functions-hooks-integration-woocommerce.php';
	if (file_exists($wc_file_to_include)) {
		include_once $wc_file_to_include;
	}
	if (file_exists($wc_file_to_include_qv)) {
		include_once $wc_file_to_include_qv;
	}
	
	
}
add_action( 'appalify_include_files_late_action', 'appalify_include_files_late' );


//enable qv
$enable_appalify_qv = (bool) get_option('appalify_enable_qv', true);
if($enable_appalify_qv == 1){


	add_action('wp_ajax_nopriv_load_quick_view_content', 'load_quick_view_content');
	add_action('wp_ajax_load_quick_view_content', 'load_quick_view_content');
	add_action('wp_enqueue_scripts', 'enqueue_quick_view_scripts');
	
	function load_quick_view_content() {
		$product_id = intval($_POST['product_id']);
		$product = wc_get_product($product_id);
		$display_images_appalify_qv = get_option('display_images_appalify_qv','yes');
		$display_shortdesc_appalify_qv = get_option('display_shortdesc_appalify_qv','yes');
		$display_atc_appalify_qv = get_option('display_atc_appalify_qv','yes');
		$display_variations_appalify_qv = get_option('display_variations_appalify_qv','yes');

		if ($product) {
			// Output product details in modal
			echo '<div class="quick-view-content">';
			echo '<h2>' . esc_html($product->get_name()) . '</h2>';
			if($display_images_appalify_qv == 'yes'){echo '<div class="quick-view-image">' . wp_kses_post($product->get_image()) . '</div>';}

			if($display_shortdesc_appalify_qv == 'yes'){echo '<div class="quick-view-short-description">' . wp_kses_post(wpautop($product->get_short_description())) . '</div>';}
			echo '<div class="quick-view-price">' . wp_kses_post($product->get_price_html()) . '</div>';


			if($product->is_type('variable') && $display_images_appalify_qv == 'yes') {
				$available_variations = $product->get_available_variations();
				$attributes = $product->get_variation_attributes();
				$selected_attributes = $product->get_default_attributes();
			
				if(!empty($available_variations)) {
					echo '<div class="quick-view-variations">';
			
					// Loop through each attribute (e.g., size, color)
					foreach($attributes as $attribute_name => $options) {
						// Get attribute label and escape it
						$attribute_label = wc_attribute_label($attribute_name);
						echo '<div class="quick-view-variation">';
						
						// Display attribute label
						echo '<label for="' . esc_attr($attribute_name) . '">' . esc_html($attribute_label) . '</label><br>';
			
						// Open the select dropdown for the attribute
						echo '<select name="' . esc_attr($attribute_name) . '" id="' . esc_attr($attribute_name) . '">';
						
						// Loop through each option and add it to the select dropdown
						foreach($options as $option) {
							// Pre-select the default attribute if available
							$selected = isset($selected_attributes[$attribute_name]) && $selected_attributes[$attribute_name] === $option ? 'selected' : '';
							echo '<option value="' . esc_attr($option) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
						}
			
						// Close the select dropdown
						echo '</select><br><br>'; // Adding breaks after the dropdown
						echo '</div>'; // Close variation div
					}
			
					echo '</div>';
				}
			}


			if ($display_atc_appalify_qv == 'yes') {
				if ($product->is_type('variable')) {
					echo '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button qv_add_to_cart_button">Select Options</a>';
				} else {
					echo '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button qv_add_to_cart_button">Add to Cart</a>';
				}
			}
			echo '</div>';
		}

		wp_die(); // Close the AJAX call
	}


	//add plugin css
	function enqueue_quick_view_scripts() {
		// Enqueue custom CSS for the modal
		wp_enqueue_style('quick-view-modal-css', PLUGIN_URL . 'assets/css/quick-view-modal.css');


		// Enqueue jQuery (if not already enqueued by your theme)
		wp_enqueue_script('jquery');

		wp_enqueue_script('quick-view-modal-js', PLUGIN_URL . 'assets/js/quick-view-modal.js', array('jquery'), '1.0', true);

		// Localize script to pass AJAX URL to the JS file
		wp_localize_script('quick-view-modal-js', 'quickview_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	}
}

$plugin_dir = plugin_dir_path(__FILE__);

$premium_check_appalify = $plugin_dir . 'admin/premium/class-appalify-premium-check.php';
$settingspage_appalify = $plugin_dir . 'admin/class-admin-appalify-preorder-settingspage.php';
$qv_settingspage_appalify = $plugin_dir . 'admin/class-admin-appalify-quickview-settingspage.php';
$manage_extensions_appalify = $plugin_dir . 'admin/class-admin-appalify-manage-extensions.php';




include_once $settingspage_appalify;
include_once $qv_settingspage_appalify;
include_once $manage_extensions_appalify;

if(file_exists($premium_check_appalify)){
	include_once $premium_check_appalify;
	$appalify_activate = new appalify_activator();
	$appalify_activate->check_if_appalify_is_active();
	update_option('appalify_woocommerce_version', 0);
} else{
	update_option('appalify_woocommerce_version', 1);
}
/**
 * Settings class.
 */
class appalify_Settings {

	/**
	 * The single instance of appalify_Settings.
	 *
	 * @var     object
	 * @access  private
	 * @since   1.0.0
	 */
	private static $_instance = null; //phpcs:ignore

	/**
	 * The main plugin object.
	 *
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $parent = null;

	/**
	 * Prefix for plugin settings.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $base = '';

	/**
	 * Available settings for plugin.
	 *
	 * @var     array
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = array();

	/**
	 * Constructor function.
	 *
	 * @param object $parent Parent object.
	 */
	public function __construct( $parent ) {
		$this->parent = $parent;
		$this->appalify_include_files_late();

		$this->base = 'wpt_';

		// Initialise settings.
		add_action( 'init', array( $this, 'init_settings' ), 11 );

		// Register plugin settings.
		add_action( 'admin_init', array( $this, 'register_settings' ) );

		// Add settings page to menu.
		add_action( 'admin_menu', array( $this, 'add_menu_item' ) );

		// Add settings link to plugins page.
		add_filter(
			'plugin_action_links_' . plugin_basename( $this->parent->file ),
			array(
				$this,
				'add_settings_link',
			)
		);

		// Configure placement of plugin settings page. See readme for implementation.
		add_filter( $this->base . 'menu_settings', array( $this, 'configure_settings' ) );
	}
	public function appalify_include_files_late() {

		/**
		 * Helper hook to include files late.
		 *
		 */
		do_action( 'appalify_include_files_late_action' );

	}
	/**
	 * Initialise settings
	 *
	 * @return void
	 */
	public function init_settings() {
		$this->settings = $this->settings_fields();
	}

	/**
	 * Add settings page to admin menu
	 *
	 * @return void
	 */
	public function add_menu_item() {

		// Get the main menu settings
		$main_menu_args = $this->menu_settings('main');
	
		// Do nothing if wrong location key is set for the main menu.
		if (is_array($main_menu_args) && isset($main_menu_args['location']) && function_exists('add_' . $main_menu_args['location'] . '_page')) {
			switch ($main_menu_args['location']) {
				case 'menu':
					$main_page = add_menu_page(
						$main_menu_args['page_title'],
						$main_menu_args['menu_title'],
						$main_menu_args['capability'],
						$main_menu_args['menu_slug'],
						$main_menu_args['function'],
						$main_menu_args['icon_url'],
						$main_menu_args['position']
					);
					break;
				default:
					return;
			}
	
			// Enqueue assets for the main menu page
			add_action('admin_print_styles-' . $main_page, array($this, 'settings_assets'));
		}
	
	}
	
	/**
	 * Prepare default settings page arguments
	 *
	 * @param string $type Type of menu settings: 'main' or 'submenu'.
	 * @return array The settings array.
	 */
	private function menu_settings($type) {
		$settings = array();

			$settings = array(
				'location'    => 'menu', // Possible settings: options, menu, submenu.
				'parent_slug' => '',
				'page_title'  => __('Appalify for Woocommerce', 'Appalify for Woocommerce'),
				'menu_title'  => __('Appalify for Woocommerce', 'Appalify for Woocommerce'),
				'capability'  => 'manage_options',
				'menu_slug'   => $this->parent->_token . '_settings',
				'function'    => array($this, 'settings_page'),
				'icon_url'    => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path fill="black" d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48l45.5 0c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5L488 384c13.3 0 24-10.7 24-24s-10.7-24-24-24l-288.3 0c-11.5 0-21.4-8.2-23.6-19.5L170.7 288l288.5 0c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32L360 32l0 102.1 23-23c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-64 64c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l23 23L312 32 120.1 32C111 12.8 91.6 0 69.5 0L24 0zM176 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/></svg>'),		
				'position'    => '55',
			);

	
		return apply_filters($this->base . 'menu_settings', $settings);
	}

	/**
	 * Container for settings page arguments
	 *
	 * @param array $settings Settings array.
	 *
	 * @return array
	 */
	public function configure_settings( $settings = array() ) {
		return $settings;
	}

	/**
	 * Load settings JS & CSS
	 *
	 * @return void
	 */
	public function settings_assets() {

		// We're including the farbtastic script & styles here because they're needed for the colour picker
		// If you're not including a colour picker field then you can leave these calls out as well as the farbtastic dependency for the wpt-admin-js script below.
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_script( 'farbtastic' );

		// We're including the WP media scripts here because they're needed for the image upload field.
		// If you're not including an image upload then you can leave this function call out.
		wp_enqueue_media();

		wp_register_script( $this->parent->_token . '-settings-js', $this->parent->assets_url . 'js/settings' . $this->parent->script_suffix . '.js', array( 'farbtastic', 'jquery' ), '1.0.0', true );
		wp_enqueue_script( $this->parent->_token . '-settings-js' );
	}

	/**
	 * Add settings link to plugin list table
	 *
	 * @param  array $links Existing links.
	 * @return array        Modified links.
	 */
	public function add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=' . $this->parent->_token . '_settings">' . __( 'Settings', 'appalify' ) . '</a>';
		array_push( $links, $settings_link );
		return $links;
	}

	/**
	 * Build settings fields
	 *
	 * @return array Fields to be displayed on settings page
	 */
	private function settings_fields() {
		

		$settings['Settings'] = array(
			'title'       => __( 'Settings', 'appalify' ),
		);






		$settings['Manage-Extensions'] = array(
			'title'       => __( 'Manage Extensions', 'appalify' ),
		);

		$settings = apply_filters( $this->parent->_token . '_settings_fields', $settings );

		return $settings;
	}

	/**
	 * Register plugin settings
	 *
	 * @return void
	 */
	public function register_settings() {
		if ( is_array( $this->settings ) ) {

			// Check posted/selected tab.
			//phpcs:disable
			$current_section = '';
			if ( isset( $_POST['tab'] ) && $_POST['tab'] ) {
				$current_section = sanitize_text_field($_POST['tab']);
			} else {
				if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
					$current_section = sanitize_text_field($_GET['tab']);
				}
			}
			//phpcs:enable

			foreach ( $this->settings as $section => $data ) {

				if ( $current_section && $current_section !== $section ) {
					continue;
				}

				// Add section to page.
				add_settings_section( $section, $data['title'], array( $this, 'settings_section' ), $this->parent->_token . '_settings' );
				if (isset($data['fields']) && is_array($data['fields'])) {
				foreach ( $data['fields'] as $field ) {

					// Validation callback for field.
					$validation = '';
					if ( isset( $field['callback'] ) ) {
						$validation = $field['callback'];
					}

					// Register field.
					$option_name = $this->base . $field['id'];
					register_setting( $this->parent->_token . '_settings', $option_name, $validation );

					// Add field to page.
					add_settings_field(
						$field['id'],
						$field['label'],
						array( $this->parent->admin, 'display_field' ),
						$this->parent->_token . '_settings',
						$section,
						array(
							'field'  => $field,
							'prefix' => $this->base,
						)
					);
				}}

				if ( ! $current_section ) {
					break;
				}
			}
		}
	}

	/**
	 * Settings section.
	 *
	 * @param array $section Array of section ids.
	 * @return void
	 */
	public function settings_section( $section ) {
		$html = '<p> ' . esc_html($this->settings[ $section['id'] ]['description']) . '</p>' . "\n";
		echo wp_kses_post($html);

	}

	/**
	 * Load settings page content.
	 *
	 * @return void
	 */
	public function settings_page() {

		$appalifysettings = new appalify_settingspage();
		$appalifysettings_qv = new appalify_quickview_settingspage();

		$appalify_manage_extensions = new appalify_manage_extensions();
		// Build page HTML.
		$html      = '<div class="wrap" id="' . $this->parent->_token . '_settings">' . "\n";
			$html .= '<h2>' . __( 'Appalify for Woocommerce', 'appalify' ) . '</h2>' . "\n";

			
		//phpcs:disableif($tab != "BOGO"){
	
		//phpcs:enable
		
		// Show page tabs. if($tab != "BOGO"){
		if ( is_array( $this->settings ) && 1 < count( $this->settings ) ) {

			$html .= '<h2 class="nav-tab-wrapper">' . "\n";

			$c = 0;
			foreach ( $this->settings as $section => $data ) {

				// Set tab class.
				$class = 'nav-tab';
				if ( ! isset( $_GET['tab'] ) ) { //phpcs:ignore
					if ( 0 === $c ) {
						$class .= ' nav-tab-active';
					}
				} else {
					if ( isset( $_GET['tab'] ) && $section == $_GET['tab'] ) { //phpcs:ignore
						$class .= ' nav-tab-active';
					}
				}

				// Set tab link.
				$tab_link = add_query_arg( array( 'tab' => $section ) );
				if ( isset( $_GET['settings-updated'] ) ) { //phpcs:ignore
					$tab_link = remove_query_arg( 'settings-updated', $tab_link );
				}
				
				// Output tab.
				$html .= '<a href="' . $tab_link . '" class="' . esc_attr( $class ) . '">' . esc_html( $data['title'] ) . '</a>' . "\n";
				
				++$c;
				
			}

			$html .= '</h2>' . "\n";
		}
	

			$html .= '<form method="post" action="options.php" enctype="multipart/form-data">' . "\n";

				// Get settings fields.
				ob_start();
				settings_fields( $this->parent->_token . '_settings' );

				$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'Settings';
				$html .= $this->appalify_handle_tab_specific_settingspage($tab, $appalifysettings);
				$html .= $this->appalify_handle_tab_specific_settingspage_qv($tab, $appalifysettings_qv);
				$html .= $this->appalify_handle_tab_specific_manage_extensions($tab, $appalify_manage_extensions);


				$html .= ob_get_clean();

				$html     .= '<p class="submit">' . "\n";
					$html .= '<input type="hidden" name="tab" value="' . esc_attr( $tab ) . '" />' . "\n";
					
				$html     .= '</p>' . "\n";
			$html         .= '</form>' . "\n";
		$html             .= '</div>' . "\n";


		
		$default_allowed_html = wp_kses_allowed_html('post');
                                                                                                                                                                                                              
		$custom_allowed_html = array(
			'form' => array(
				'method' => array(),
				'action' => array(),
				'autocomplete' => array(),  // Added for autocomplete attribute
				'class' => array(),
			),
			'input' => array(
				'type' => array(),
				'name' => array(),
				'id' => array(),
				'value' => array(),
				'class' => array(),
				'checked' => array(),  // Added for checked attribute
			),
			'label' => array(
				'for' => array(),
			),
			'table' => array(
				'class' => array(),
			),
			'tr' => array(),
			'th' => array(
				'scope' => array(),
			),
			'td' => array(),
			'p' => array(
				'class' => array(),
			),
			'h1' => array(),
			'h3' => array(),
			'div' => array(
				'class' => array(),
			),
			'submit' => array(
				'class' => array(),
				'value' => array(),
			),
			'button' => array(  // Adding button for the form submit button
				'type' => array(),
				'class' => array(),
				'id' => array(),
				'name' => array(),
				'value' => array(),
			),
		);
																																																				   
                                                                                                                                                                                                              
$allowed_html = array_merge_recursive($default_allowed_html, $custom_allowed_html);
echo wp_kses($html, $allowed_html); //phpcs:ignore
	}



	private function appalify_handle_tab_specific_settingspage($tab, $appalifysettings) {
		$html = '';
	
		//switchcase to see which tab is active and opening the method in the tab as html
		switch ($tab){
			case 'Settings':
				$html .= $appalifysettings->appalify_display_button_text_settings();
				break;

		}
	
		return $html;
	}

	private function appalify_handle_tab_specific_settingspage_qv($tab, $appalifysettings_qv) {
		$html = '';
	
		//switchcase to see which tab is active and opening the method in the tab as html
		switch ($tab){
			case 'Settings':
				$html .= $appalifysettings_qv->appalify_qv_display_button_text_settings();
				break;

		}
	
		return $html;
	}

	private function appalify_handle_tab_specific_manage_extensions($tab, $appalify_manage_extensions) {
		$html = '';
	
		//switchcase to see which tab is active and opening the method in the tab as html
		switch ($tab){
			case 'Manage-Extensions':
				$html .= $appalify_manage_extensions->appalify_display_optimization_settings();
				break;

		}
	
		return $html;
	}





	/**
	 * Main appalify_Settings Instance
	 *
	 * Ensures only one instance of appalify_Settings is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see appalify()
	 * @param object $parent Object instance.
	 * @return object appalify_Settings instance
	 */
	public static function instance( $parent ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $parent );
		}
		return self::$_instance;
	} // End instance()



}
