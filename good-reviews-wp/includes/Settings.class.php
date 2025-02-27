<?php
/**
 * Define settings used throughout the plugin.
 *
 * @package   Good Reviews for WordPress
 * @copyright Copyright (c) 2016, Theme of the Crop
 * @license   GPL-2.0+
 * @since     2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'grfwpSettings' ) ) :

	/**
	 * Class to handle configurable settings for Good Reviews
	 *
	 * @since 2.0.0
	 */
	class grfwpSettings {

		/**
		 * Default values for settings
		 *
		 * @since  2.0.0
		 * @access public
		 * @var    array
		 */
		public $defaults = array();

		/**
		 * Stored values for settings
		 *
		 * @since  2.0.0
		 * @access public
		 * @var    array
		 */
		public $settings = array();

		/**
		 * Initialize the class and register hooks.
		 *
		 * @since  2.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {

			add_action( 'init', array( $this, 'set_defaults' ) );

			add_action( 'init', array( $this, 'load_settings_panel' ) );
		}

		/**
		 * Load the plugin's default settings
		 *
		 * @since  2.0.0
		 * @access public
		 * @return void
		 */
		public function set_defaults() {

			$this->defaults = array(
				'grfwp-date-format' 		=> get_option( 'date_format' ) . ' ' . get_option( 'time_format' ),
				'grfwp-reviews-per-page'	=> 10,

				'label-review'				=> __( 'Review', 'good-reviews-wp' ),
				'label-reviews'				=> __( 'Reviews', 'good-reviews-wp' ),
				'label-submit-review'		=> __( 'Submit Review', 'good-reviews-wp' ),
				'label-rating'				=> __( 'Rating', 'good-reviews-wp' ),
				'label-review-author'		=> __( 'Review Author', 'good-reviews-wp' ),
				'label-show-more'			=> __( 'Show More', 'good-reviews-wp' ),
				'label-select-menu-item'	=> __( 'Select the menu item this review applies to, if any.', 'good-reviews-wp' ),
			);

			$this->defaults = apply_filters( 'grfwp_defaults', $this->defaults, $this );
		}

		/**
		 * Get a setting's value or fallback to a default if one exists
		 *
		 * @since  2.0.0
		 * @access public
		 * @param  string $setting The setting to retrieve.
		 * @param  string $location The location where the setting is used.
		 * @return mixed A setting based on the key provided.
		 */
		public function get_setting( $setting, $location = false ) {

			if ( empty( $this->settings ) ) {
				$this->settings = get_option( 'grfwp-settings' );
			}

			if ( ! empty( $this->settings[ $setting ] ) ) {
				return $this->settings[ $setting ];
			}

			if ( ! empty( $this->defaults[ $setting ] ) ) {
				return $this->defaults[ $setting ];
			}

			return null;
		}

		/**
		 * Set a setting to a particular value
		 * @since 2.0.3
		 */
		public function set_setting( $setting, $value ) {

			if ( empty( $this->settings ) ) {
				$this->settings = get_option( 'grfwp-settings' );
			}

			if ( $setting_name ) {
				$this->settings[ $setting_name ] = $setting_value;
			}
		}

		/**
		 * Save all of the settings
		 * @since 2.0.3
		 */
		public function save_settings() {
		
			update_option( 'grfwp-settings', $this->settings );
		}

		/**
		 * Load the admin settings page.
		 *
		 * @since 0.0.1
		 * @access public
		 * @link  https://github.com/NateWr/simple-admin-pages
		 */
		public function load_settings_panel() {

			global $grfwp_controller;

			require_once GRFWP_PLUGIN_DIR . '/lib/simple-admin-pages/simple-admin-pages.php';
			$sap = sap_initialize_library(
				$args = array(
					'version' 	=> '2.6.19',
					'lib_url' 	=> GRFWP_PLUGIN_URL . '/lib/simple-admin-pages/',
					'theme'		=> 'blue',
				)
			);

			$sap->add_page(
				'submenu',
				array(
					'id'            => 'grfwp-settings',
					'parent_menu'	=> 'grfwp-restaurant-reviews',
					'title'         => __( 'Settings', 'good-reviews-wp' ),
					'menu_title'    => __( 'Settings', 'good-reviews-wp' ),
					'capability'    => 'manage_options',
					'default_tab'   => 'grfwp-basic',
				)
			);

			$sap->add_section(
				'grfwp-settings',
				array(
					'id'            => 'grfwp-basic',
					'title'         => __( 'Basic', 'good-reviews-wp' ),
					'is_tab'		=> true,
				)
			);

			$sap->add_section(
				'grfwp-settings',
				array(
					'id'    => 'grfwp-basic-general',
					'title' => __( 'General', 'good-reviews-wp' ),
					'tab'	=> 'grfwp-basic'
				)
			);

			$sap->add_setting(
				'grfwp-settings',
				'grfwp-basic-general',
				'number',
				array(
					'id'			=> 'grfwp-reviews-per-page',
					'title'			=> __( 'Reviews per Page', 'good-reviews-wp' ),
					'description'	=> __( 'How many reviews should be displayed when using the shortcode? Default is 10 and additional reviews can be viewed by clicking on the "Show More" button.', 'good-reviews-wp' )
				)
			);

//			$sap->add_setting(
//				'grfwp-settings',
//				'grfwp-basic-general',
//				'number',
//				array(
//					'id'			=> 'grfwp-max-characters',
//					'title'			=> __( 'Max Characters', 'good-reviews-wp' ),
//					'description'	=> __( 'Set a maximum number of characters to display for each review.', 'good-reviews-wp' )
//				)
//			);
//
//			$sap->add_setting(
//				'grfwp-settings',
//				'grfwp-basic-general',
//				'toggle',
//				array(
//					'id'			=> 'grfwp-read-more-permalink',
//					'title'			=> __( 'Read More Permalink Page', 'good-reviews-wp' ),
//					'description'	=> __( 'Enabling this option will make it so that the "Read More" button displays on every review and links to the permalink page instead of the provided custom URL.', 'good-reviews-wp' ),
//				)
//			);
//
//			$sap->add_setting(
//				'grfwp-settings',
//				'grfwp-basic-general',
//				'toggle',
//				array(
//					'id'			=> 'grfwp-read-more-pop-up',
//					'title'			=> __( 'Read More Pop-Up', 'good-reviews-wp' ),
//					'description'	=> __( 'Enabling this option will make it so that the "Read More" button opens up a pop-up window/lightbox, with the full review content, instead of linking to the permalink page or the provided custom URL.', 'good-reviews-wp' ),
//				)
//			);

			$sap->add_setting(
				'grfwp-settings',
				'grfwp-basic-general',
				'toggle',
				array(
					'id'			=> 'grfwp-enable-datepicker',
					'title'			=> __( 'Enable Datepicker?', 'good-reviews-wp' ),
					'description'	=> __( 'Enable a datepicker for the "Review Date" field on the review create/edit screen (instead of the default text input)?', 'good-reviews-wp' ),
				)
			);

			$sap->add_setting(
				'grfwp-settings',
				'grfwp-basic-general',
				'select',
				array(
					'id'			=> 'grfwp-date-format',
					'title'			=> __( 'Date Format', 'good-reviews-wp' ),
					'description'	=> __( 'Choose the format for the datepicker, if enabled in the setting above.', 'good-reviews-wp' ),
					'blank_option' => false,
					'options'      => array(
						'yy-mm-dd'		=> 'yy-mm-dd',
						'dd-mm-yy'		=> 'dd-mm-yy',
						'mm-dd-yy'		=> 'mm-dd-yy',
						'dd/mm/yy'		=> 'dd/mm/yy',
						'mm/dd/yy'		=> 'mm/dd/yy'
					),
					'conditional_on'		=> 'grfwp-enable-datepicker',
					'conditional_on_value'	=> true,
				)
			);

			$sap->add_section(
				'grfwp-settings',
				array(
					'id'    => 'grfwp-integrations',
					'title' => __( 'Plugin Integrations', 'good-reviews-wp' ),
					'tab'	=> 'grfwp-basic'
				)
			);

			$sap->add_setting(
				'grfwp-settings',
				'grfwp-integrations',
				'toggle',
				array(
					'id'			=> 'fdm-integration',
					'title'			=> __( 'Five-Star Restaurant Menu', 'good-reviews-wp' ),
					'description'	=> __( 'Show reviews for menu items in the lightbox and on individual menu item/permalink pages, and enable ratings and review submission for menu items.', 'good-reviews-wp' ),
					'args'			=> array(
						'label_for' => 'grfwp-settings[fdm-integration]',
						'class' 	=> 'grfwp-fdm-integration'
					)

				)
			);
            
			$sap->add_setting(
				'grfwp-settings',
				'grfwp-integrations',
				'toggle',
				array(
					'id'			=> 'fdm-main-rating',
					'title'			=> __( 'Five-Star Restaurant Menu Display Rating', 'good-reviews-wp' ),
					'description'	=> __( 'Show ratings for menu items on the main menu page.', 'good-reviews-wp' ),
					'args'			=> array(
						'label_for' => 'grfwp-settings[fdm-display-main-rating]',
						'class' 	=> 'grfwp-fdm-display-main-rating'
					)

				)
			);

			$sap->add_setting(
				'grfwp-settings',
				'grfwp-integrations',
				'toggle',
				array(
					'id'			=> 'fdm-submit-review',
					'title'			=> __( 'Five-Star Restaurant Menu Submit Reviews', 'good-reviews-wp' ),
					'description'	=> __( 'Adds a submit review form below the reviews displayed in the lightbox and on individual menu item/permalink pages.', 'good-reviews-wp' ),
					'args'			=> array(
						'label_for' => 'grfwp-settings[fdm-submit-review]',
						'class' 	=> 'grfwp-fdm-submit-review'
					)

				)
			);

			$sap->add_setting(
				'grfwp-settings',
				'grfwp-integrations',
				'toggle',
				array(
					'id'			=> 'rtb-integration',
					'title'			=> __( 'Five-Star Restaurant Reservations', 'good-reviews-wp' ),
					'description'	=> __( 'Show reviews on the reservations page.', 'good-reviews-wp' ),
					'args'			=> array(
						'label_for' => 'grfwp-settings[rtb-integration]',
						'class' 	=> 'grfwp-rtb-integration'
					)

				)
			);

			$sap->add_setting(
				'grfwp-settings',
				'grfwp-integrations',
				'select',
				array(
					'id'           => 'rtb-reviews-position',
					'title'        => __( 'Reviews Position', 'good-reviews-wp' ),
					'description'  => __( 'If enabled, should reviews be displayed above or below the reservations form?.', 'good-reviews-wp' ),
					'blank_option' => false,
					'options'      => array(
						'above'		=> 'Above',
						'below'		=> 'Below'
					),
					'args'			=> array(
						'label_for' => 'rtb-reviews-position',
						'class' 	=> 'grfwp-rtb-reviews-position'
					)
				)
			);

			/**
		     * Premium options preview only
		     */
		    // "Custom Fields" Tab
		    $sap->add_section(
		      'grfwp-settings',
		      array(
		        'id'     => 'grfwp-custom-fields-tab',
		        'title'  => __( 'Custom Fields', 'good-reviews-wp' ),
		        'is_tab' => true,
		        'show_submit_button' => $this->show_submit_button( 'custom_fields' )
		      )
		    );
		    $sap->add_section(
		      'grfwp-settings',
		      array(
		        'id'       => 'grfwp-custom-fields-tab-body',
		        'tab'      => 'grfwp-custom-fields-tab',
		        'callback' => $this->premium_info( 'custom_fields' )
		      )
		    );
		
		    // "Labelling" Tab
		    $sap->add_section(
		      'grfwp-settings',
		      array(
		        'id'     => 'grfwp-labelling-tab',
		        'title'  => __( 'Labelling', 'good-reviews-wp' ),
		        'is_tab' => true,
		        'show_submit_button' => $this->show_submit_button( 'labelling' )
		      )
		    );
		    $sap->add_section(
		      'grfwp-settings',
		      array(
		        'id'       => 'grfwp-labelling-tab-body',
		        'tab'      => 'grfwp-labelling-tab',
		        'callback' => $this->premium_info( 'labelling' )
		      )
		    );
		
		    // "Styling" Tab
		    $sap->add_section(
		      'grfwp-settings',
		      array(
		        'id'     => 'grfwp-styling-tab',
		        'title'  => __( 'Styling', 'good-reviews-wp' ),
		        'is_tab' => true,
		        'show_submit_button' => $this->show_submit_button( 'styling' )
		      )
		    );
		    $sap->add_section(
		      'grfwp-settings',
		      array(
		        'id'       => 'grfwp-styling-tab-body',
		        'tab'      => 'grfwp-styling-tab',
		        'callback' => $this->premium_info( 'styling' )
		      )
		    );

			$sap = apply_filters( 'grfwp_settings_page', $sap, $this );

			$sap->add_admin_menus();
		}

		public function show_submit_button( $permission_type = '' ) {
			global $grfwp_controller;
	
			if ( $grfwp_controller->permissions->check_permission( $permission_type ) ) {
				return true;
			}
	
			return false;
		}
	
		public function premium_info( $section_and_perm_type ) {
			global $grfwp_controller;
	
			$is_premium_user = $grfwp_controller->permissions->check_permission( $section_and_perm_type );
			$is_helper_installed = defined( 'FSPPH_PLUGIN_FNAME' ) && is_plugin_active( FSPPH_PLUGIN_FNAME );
	
			if ( $is_premium_user || $is_helper_installed ) {
				return false;
			}
	
			$content = '';
	
			$premium_features = '
				<p><strong>' . __( 'The premium version also gives you access to the following features:', 'good-reviews-wp' ) . '</strong></p>
				<ul class="grfwp-dashboard-new-footer-one-benefits">
					<li>' . __( 'New Thumbnail Layout', 'good-reviews-wp' ) . '</li>
					<li>' . __( 'New Image Style Layout', 'good-reviews-wp' ) . '</li>
					<li>' . __( 'Custom Fields', 'good-reviews-wp' ) . '</li>
					<li>' . __( 'Advanced Styling Options', 'good-reviews-wp' ) . '</li>
					<li>' . __( 'Email Support', 'good-reviews-wp' ) . '</li>
				</ul>
				<div class="grfwp-dashboard-new-footer-one-buttons">
					<a class="grfwp-dashboard-new-upgrade-button" href="https://www.fivestarplugins.com/license-payment/?Selected=GRFWP&Quantity=1&utm_source=grfwp_settings&utm_content=' . $section_and_perm_type . '" target="_blank">' . __( 'UPGRADE NOW', 'good-reviews-wp' ) . '</a>
				</div>
			';
	
			switch ( $section_and_perm_type ) {
	
				case 'custom_fields':
	
					$content = '
						<div class="grfwp-settings-preview">
							<h2>' . __( 'Custom Fields', 'good-reviews-wp' ) . '<span>' . __( 'Premium', 'good-reviews-wp' ) . '</span></h2>
							<p>' . __( 'You can add extra custom fields to your reviews, which can be used to display additional info related to the review or item being reviewed (e.g. location, number of guests, type of event, etc.).', 'good-reviews-wp' ) . '</p>
							<div class="grfwp-settings-preview-images">
								<img src="' . GRFWP_PLUGIN_URL . '/assets/img/premium-screenshots/customfields.png" alt="GRFWP custom fields screenshot">
							</div>
							' . $premium_features . '
						</div>
					';
	
					break;
	
				case 'labelling':
	
					$content = '
						<div class="grfwp-settings-preview">
							<h2>' . __( 'Labelling', 'good-reviews-wp' ) . '<span>' . __( 'Premium', 'good-reviews-wp' ) . '</span></h2>
							<p>' . __( 'The labelling options let you change the wording of the different labels that appear on the front end of the plugin. You can use this to translate them, customize the wording for your purpose, etc.', 'good-reviews-wp' ) . '</p>
							<div class="grfwp-settings-preview-images">
								<img src="' . GRFWP_PLUGIN_URL . '/assets/img/premium-screenshots/labelling.png" alt="GRFWP styling screenshot">
							</div>
							' . $premium_features . '
						</div>
					';
	
					break;
	
				case 'styling':
	
					$content = '
						<div class="grfwp-settings-preview">
							<h2>' . __( 'Styling', 'good-reviews-wp' ) . '<span>' . __( 'Premium', 'good-reviews-wp' ) . '</span></h2>
							<p>' . __( 'The styling options let you choose a review layout as well as modify the colors and font size of the various elements found in the reviews.', 'good-reviews-wp' ) . '</p>
							<div class="grfwp-settings-preview-images">
								<img src="' . GRFWP_PLUGIN_URL . '/assets/img/premium-screenshots/styling1.png" alt="GRFWP styling screenshot one">
								<img src="' . GRFWP_PLUGIN_URL . '/assets/img/premium-screenshots/styling2.png" alt="GRFWP styling screenshot two">
							</div>
							' . $premium_features . '
						</div>
					';
	
					break;
			}
	
			return function() use ( $content ) {
	
				echo wp_kses_post( $content );
			};
		}

	}
endif;