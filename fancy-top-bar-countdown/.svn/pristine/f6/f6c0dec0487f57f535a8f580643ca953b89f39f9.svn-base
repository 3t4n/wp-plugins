<?php

require_once 'framework/includes/CMB2_Options.php';

/**
 * Catalog Mode Admin Class
 *
 * @return void
 * @author 99plugins
 **/

class NN_Count_Down_Admin {

	/**
	 * Option key, and option page slug
	 * @var string
	 */
	private $key = 'nn-count-down';

	/**
	 * Options page metabox id
	 * @var string
	 */
	private $metabox_id_1 = 'countdown_general_settings';
	private $metabox_id_2 = 'countdown_display_settings';
	private $metabox_id_3 = 'countdown_page_settings';
	private $metabox_id_4 = 'style_settings';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	public function __construct() {
		// Set our title
		$this->title = esc_html__( 'Top Bar Count Down', 'nn-count-down' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 1.0
	 */
	public function add_options_page() {
		$this->options_page = add_submenu_page( 'nn_plugins_dashboard', $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  1.0
	 */
	public function admin_page_display() {
		?>
		<div class="nn-option-wrapper">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<h2 class="nav-tab-wrapper">
				<a href="#<?php echo esc_attr( $this->metabox_id_1 ); ?>" class="nav-tab" id="<?php echo esc_attr( $this->metabox_id_1 ); ?>-tab"><?php esc_html_e( 'General Settings', 'nn-count-down' ); ?></a>
				<a href="#<?php echo esc_attr( $this->metabox_id_2 ); ?>" class="nav-tab" id="<?php echo esc_attr( $this->metabox_id_2 ); ?>-tab"><?php esc_html_e( 'Display Settings', 'nn-count-down' ); ?></a>
				<a href="#<?php echo esc_attr( $this->metabox_id_3 ); ?>" class="nav-tab" id="<?php echo esc_attr( $this->metabox_id_3 ); ?>-tab"><?php esc_html_e( 'Cooming Soon Page Settings', 'nn-count-down' ); ?></a>
			</h2>
			<div class="nn-options-content">
				<div id="<?php echo esc_attr( $this->metabox_id_1 ); ?>" class="group" style="display: none;">
					<h3><?php esc_html_e( 'General Settings', 'nn-count-down' ); ?></h3>
					<?php cmb2_metabox_form( $this->metabox_id_1, $this->key ); ?>
				</div>
				<div id="<?php echo esc_attr( $this->metabox_id_2 ); ?>" class="group" style="display: none;">
					<h3><?php esc_html_e( 'Display Settings', 'nn-count-down' ); ?></h3>
					<?php cmb2_metabox_form( $this->metabox_id_2, $this->key ); ?>
				</div>
				<div id="<?php echo esc_attr( $this->metabox_id_3 ); ?>" class="group" style="display: none;">
					<h3><?php esc_html_e( 'Cooming Soon Page Settings', 'nn-count-down' ); ?></h3>
					<?php cmb2_metabox_form( $this->metabox_id_3, $this->key ); ?>
				</div>
			</div>
		</div>
		<script>
			jQuery(document).ready(function($) {
				// Switches option sections
				$('.group').hide();
				var activetab = '';
				if (typeof(localStorage) != 'undefined' ) {
					activetab = localStorage.getItem("activetab");
				}
				if (activetab != '' && $(activetab).length ) {
					$(activetab).fadeIn();
				} else {
					$('.group:first').fadeIn();
				}
				$('.group .collapsed').each(function(){
					$(this).find('input:checked').parent().parent().parent().nextAll().each(
					function(){
						if ($(this).hasClass('last')) {
							$(this).removeClass('hidden');
							return false;
						}
						$(this).filter('.hidden').removeClass('hidden');
					});
				});
				if (activetab != '' && $(activetab + '-tab').length ) {
					$(activetab + '-tab').addClass('nav-tab-active');
				}
				else {
					$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
				}
				$('.nav-tab-wrapper a').click(function(evt) {
					$('.nav-tab-wrapper a').removeClass('nav-tab-active');
					$(this).addClass('nav-tab-active').blur();
					var clicked_group = $(this).attr('href');
					if (typeof(localStorage) != 'undefined' ) {
						localStorage.setItem("activetab", $(this).attr('href'));
					}
					$('.group').hide();
					$(clicked_group).fadeIn();
					evt.preventDefault();
				});
		});
		</script>
		<style>
			.nn-options-content {
				max-width: 840px;
			}
			.nn-options-content h3 {
				cursor: default;
				background-color: #f1f1f1;
				border-bottom: 1px solid #ddd;
				padding: 10px;
				margin-top: 0;
			}
			.nn-options-content .cmb-form {
				padding: 10px;
			}
			.group {
				min-width: 255px;
				border: 1px solid #e5e5e5;
				box-shadow: 0 1px 1px rgba(0,0,0,.04);
				background: #fff;
			}
		</style>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		add_action( "cmb2_save_options-page_fields_{$this->metabox_id_1}", array( $this, 'settings_notices' ), 10, 2 );
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id_2}", array( $this, 'settings_notices' ), 10, 2 );
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id_3}", array( $this, 'settings_notices' ), 10, 2 );
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id_4}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb_general = new_cmb2_box( array(
			'id' 			=> $this->metabox_id_1,
			'hookup'		=> false,
			'cmb_styles' 	=> false,
			'show_on' 		=> array(
				'key'	=> 'options-page',
				'value'	=> array( $this->key )
			),
		) );

			$cmb_general->add_field( array(
				'name' 		=> esc_html__( 'Enable Count Down', 'nn-count-down' ),
				'desc' 		=> esc_html__( 'Enable Count Down feature', 'nn-count-down' ),
				'id' 		=> 'nncd_enable_count_down',
				'type' 		=> 'checkbox',
				'default' 	=> '',
			) );

			$cmb_general->add_field( array(
				'name' 		=> esc_html__( 'Image ', 'nn-count-down' ),
				'desc' 		=> esc_html__( 'Upload an image or enter an URL.', 'nn-count-down' ),
			    'id' 		=> 'nncd_image',
			    'type'		=> 'file',
			    // Optional:
			    'options'	=> array(
			        		'url'					=> false, // Hide the text input for the url
			        		'add_upload_file_text'	=> 'Add File' // Change upload button text. Default: "Add or Upload File"
			    ),
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Message', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the message', 'nn-count-down' ),
				'id'		=> 'nncd_message',
				'type'		=> 'textarea',
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Button Text', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the button text', 'nn-count-down' ),
				'id'		=> 'nncd_button_text',
				'type'		=> 'text',
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Button Link', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the button link', 'nn-count-down' ),
				'id'		=> 'nncd_button_link',
				'type'		=> 'text',
			) );

			$cmb_general->add_field( array(
				'name' 			=> esc_html__( 'Button Icon', 'nn-count-down' ),
				'desc' 			=> esc_html__( 'Select the button icon', 'nn-count-down' ),
				'id' 			=> 'nncd_button_icon',
				'default' 		=> 'fa-eye',
				'type' 			=> 'select',
				'options'		=> nncd_font_awesome_list(),
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Countdown to', 'nn-count-down' ),
				'id'		=> 'nncd_cowndownto',
				'type'		=> 'text_date_timestamp',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Countdown Style', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select the countdown style', 'nn-count-down' ),
				'id'				=> 'nncd_cd_style',
				'type'				=> 'select',
				'show_option_none'	=> true,
				'default'			=> 'custom',
				'options'			=> array(
					'cdstyle-tb-default'	=> __( ' Default ', 'nn-count-down' ),
					'cdstyle-tb-flat'		=> __( ' Flat ', 'nn-count-down' ),
					'cdstyle-tb-box'		=> __( ' Box ', 'nn-count-down' ),
					'cdstyle-tb-circle'		=> __( ' Circle ', 'nn-count-down' ),
					'cdstyle-tb-leaf'		=> __( ' Leaf ', 'nn-count-down' ),
					),
			) );

		$cmb_general = new_cmb2_box( array(
			'id' 			=> $this->metabox_id_2,
			'hookup'		=> false,
			'cmb_styles' 	=> false,
			'show_on' 		=> array(
				'key'	=> 'options-page',
				'value'	=> array( $this->key )
			),
		) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Format Time for Top Bar', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select the format', 'nn-count-down' ),
				'id'				=> 'nncd_format',
				'type'				=> 'select',
				'show_option_none'	=> true,
				'default'			=> 'custom',
				'options'			=> array(
					'HM'		=> __( '[Hour] - [Minutes]', 'nn-count-down' ),
					'HMS'		=> __( '[Hour] - [Minutes] - [Seconds]', 'nn-count-down' ),
					'dHM'		=> __( '[Day] - [Hour] - [Minutes]', 'nn-count-down' ),
					'YOWDHMS'	=> __( '[Year] - [Month] - [Day] - [Hour] - [Minutes]', 'nn-count-down' ),
			    ),
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Background Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name' 				=> esc_html__( 'Background Image ', 'nn-count-down' ),
				'desc' 				=> esc_html__( 'Upload an background image or enter an URL.', 'nn-count-down' ),
				'id' 				=> 'nncd_bg_image',
				'type'				=> 'file',
				// Optional:
				'options'	=> array(
					'url'					=> false, // Hide the text input for the url
					'add_upload_file_text'	=> 'Add File' // Change upload button text. Default: "Add or Upload File"
			    ),
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_button_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Text Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button text color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_button_text_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Hover Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_button_hover_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Text Hover Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button text color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_button_text_hover_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Message Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your Message text color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_message_text_color',
				'type'				=> 'colorpicker',
				'default' 			=> '#fff',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Count Down Text Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your color', 'nn-count-down' ),
				'id'				=> 'nncd_text_color',
				'type'				=> 'colorpicker',
			) );

		$cmb_general = new_cmb2_box( array(
			'id' 			=> $this->metabox_id_3,
			'hookup'		=> false,
			'cmb_styles' 	=> false,
			'show_on' 		=> array(
				'key'	=> 'options-page',
				'value'	=> array( $this->key )
			),
		) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Select Page', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select page for cooming soon page', 'nn-count-down' ),
				'id'				=> 'nncd_page',
				'type'				=> 'select',
				'show_option_none'	=> true,
				'default'			=> 'custom',
				'options' 			=> nncd_get_pages( array( 'post_type' => 'page', 'numberposts' => '-1' ) ),
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Countdown to', 'nn-count-down' ),
				'id'				=> 'nncd_page_cowndownto',
				'type'				=> 'text_date_timestamp',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Page Style', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your page style', 'nn-count-down' ),
				'id'				=> 'nncd_page_layout_cd_style',
				'type'				=> 'select',
				'show_option_none'	=> true,
				'default'			=> 'custom',
				'options'			=> array(
					'layout-1'		=> __( ' Layout 1 ', 'nn-count-down' ),
					'layout-2'		=> __( ' Layout 2 ', 'nn-count-down' ),
					'layout-3'		=> __( ' Layout 3 ', 'nn-count-down' ),
					'layout-4'		=> __( ' Layout 4 ', 'nn-count-down' ),
			    ),
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Background Style', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your background style', 'nn-count-down' ),
				'id'				=> 'nncd_page_bg_style',
				'type'				=> 'select',
				'show_option_none'	=> true,
				'default'			=> 'custom',
				'options'			=> array(
					'color'		=> __( ' Color ', 'nn-count-down' ),
					'image'		=> __( ' Image ', 'nn-count-down' ),
					'video'		=> __( ' Video ', 'nn-count-down' ),
			    ),
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Background Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your color for cooming soon page', 'nn-count-down' ),
				'id'				=> 'nncd_page_bg_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name' 				=> esc_html__( 'Background Image ', 'nn-count-down' ),
				'desc' 				=> esc_html__( 'Upload an background image or enter an URL for cooming soon page.', 'nn-count-down' ),
				'id' 				=> 'nncd_page_bg_image',
				'type'				=> 'file',
				// Optional:
				'options'	=> array(
					'url'					=> false, // Hide the text input for the url
					'add_upload_file_text'	=> 'Add File' // Change upload button text. Default: "Add or Upload File"
			    ),
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Background Video', 'nn-count-down' ),
				'desc'				=> esc_html__( 'insert your url video for cooming soon page', 'nn-count-down' ),
				'id'				=> 'nncd_page_bg_video',
				'type'				=> 'text_url',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Message', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Enter the message', 'nn-count-down' ),
				'id'				=> 'nncd_page_message',
				'type'				=> 'textarea',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Message Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your Message text color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_page_message_text_color',
				'type'				=> 'colorpicker',
				'default' 			=> '#fff',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Countdown Style', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select the countdown style', 'nn-count-down' ),
				'id'				=> 'nncd_page_cd_style',
				'type'				=> 'select',
				'show_option_none'	=> true,
				'default'			=> 'custom',
				'options'			=> array(
					'cdstyle-default'	=> __( ' Default ', 'nn-count-down' ),
					'cdstyle-box-1'		=> __( ' Box 1 ', 'nn-count-down' ),
					'cdstyle-box-2'		=> __( ' Box 2 ', 'nn-count-down' ),
					'cdstyle-box-3'		=> __( ' Box 3 ', 'nn-count-down' ),
					'cdstyle-box-4'		=> __( ' Box 4 ', 'nn-count-down' ),
					'cdstyle-circle-1'	=> __( ' Circle 1 ', 'nn-count-down' ),
					'cdstyle-circle-2'	=> __( ' Circle 2 ', 'nn-count-down' ),
					'cdstyle-circle-3'	=> __( ' Circle 3 ', 'nn-count-down' ),
					'cdstyle-circle-4'	=> __( ' Circle 4 ', 'nn-count-down' ),
					'cdstyle-flat'		=> __( ' Flat ', 'nn-count-down' ),
			    ),
			) );
			
			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Countdown Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your Countdown text color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_page_cd_text_color',
				'type'				=> 'colorpicker',
				'default' 			=> '#fff',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_page_button_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Text Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button text color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_page_button_text_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Hover Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_page_button_hover_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Button Text Hover Color', 'nn-count-down' ),
				'desc'				=> esc_html__( 'Select your button text color', 'nn-count-down' ),
				'id'				=> 'nncd_bg_page_button_text_hover_color',
				'type'				=> 'colorpicker',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Item Video', 'nn-count-down' ),
				'desc'				=> esc_html__( 'insert your url embed video', 'nn-count-down' ),
				'id'				=> 'nncd_page_item_video',
				'type'				=> 'oembed',
			) );

			$cmb_general->add_field( array(
				'name'				=> esc_html__( 'Item Slider', 'nn-count-down' ),
				'desc'				=> esc_html__( 'insert your image slider', 'nn-count-down' ),
				'id'				=> 'nncd_page_item_slider',
				'type'				=> 'file_list',
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Item 1 - Name', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the Name', 'nn-count-down' ),
				'id'		=> 'nncd_item_1_name',
				'type'		=> 'text',
			) );

			$cmb_general->add_field( array(
				'name' 				=> esc_html__( 'Item 1 - Image ', 'nn-count-down' ),
				'desc' 				=> esc_html__( 'image for list item ( features, product , etc )', 'nn-count-down' ),
				'id' 				=> 'nncd_item_1_image',
				'type'				=> 'file',
				// Optional:
				'options'	=> array(
					'url'					=> false, // Hide the text input for the url
					'add_upload_file_text'	=> 'Add File' // Change upload button text. Default: "Add or Upload File"
			    ),
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Item 1 - Description', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the description', 'nn-count-down' ),
				'id'		=> 'nncd_item_1_description',
				'type'		=> 'textarea',
			) );

			$cmb_general->add_field( array(
				'name' 			=> esc_html__( 'Item 1 - Icon', 'nn-count-down' ),
				'desc' 			=> esc_html__( 'Select the Item icon', 'nn-count-down' ),
				'id' 			=> 'nncd_item_1_icon',
				'default' 		=> 'fa-eye',
				'type' 			=> 'select',
				'options'		=> nncd_font_awesome_list(),
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Item 2 - Name', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the Name', 'nn-count-down' ),
				'id'		=> 'nncd_item_2_name',
				'type'		=> 'text',
			) );

			$cmb_general->add_field( array(
				'name' 				=> esc_html__( 'Item 2 - Image ', 'nn-count-down' ),
				'desc' 				=> esc_html__( 'image for list item ( features, product , etc )', 'nn-count-down' ),
				'id' 				=> 'nncd_item_2_image',
				'type'				=> 'file',
				// Optional:
				'options'	=> array(
					'url'					=> false, // Hide the text input for the url
					'add_upload_file_text'	=> 'Add File' // Change upload button text. Default: "Add or Upload File"
			    ),
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Item 2 - Description', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the description', 'nn-count-down' ),
				'id'		=> 'nncd_item_2_description',
				'type'		=> 'textarea',
			) );

			$cmb_general->add_field( array(
				'name' 			=> esc_html__( 'Item 2 - Icon', 'nn-count-down' ),
				'desc' 			=> esc_html__( 'Select the Item icon', 'nn-count-down' ),
				'id' 			=> 'nncd_item_2_icon',
				'default' 		=> 'fa-eye',
				'type' 			=> 'select',
				'options'		=> nncd_font_awesome_list(),
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Item 3 - Name', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the Name', 'nn-count-down' ),
				'id'		=> 'nncd_item_3_name',
				'type'		=> 'text',
			) );

			$cmb_general->add_field( array(
				'name' 				=> esc_html__( 'Item 3 - Image ', 'nn-count-down' ),
				'desc' 				=> esc_html__( 'image for list item ( features, product , etc )', 'nn-count-down' ),
				'id' 				=> 'nncd_item_3_image',
				'type'				=> 'file',
				// Optional:
				'options'	=> array(
					'url'					=> false, // Hide the text input for the url
					'add_upload_file_text'	=> 'Add File' // Change upload button text. Default: "Add or Upload File"
			    ),
			) );

			$cmb_general->add_field( array(
				'name'		=> esc_html__( 'Item 3 - Description', 'nn-count-down' ),
				'desc'		=> esc_html__( 'Enter the description', 'nn-count-down' ),
				'id'		=> 'nncd_item_3_description',
				'type'		=> 'textarea',
			) );

			$cmb_general->add_field( array(
				'name' 			=> esc_html__( 'Item 3 - Icon', 'nn-count-down' ),
				'desc' 			=> esc_html__( 'Select the Item icon', 'nn-count-down' ),
				'id' 			=> 'nncd_item_3_icon',
				'default' 		=> 'fa-eye',
				'type' 			=> 'select',
				'options'		=> nncd_font_awesome_list(),
			) );

	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', esc_html__( 'Settings updated.', 'nn-count-down' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id_1', 'metabox_id_2', 'metabox_id_3', 'metabox_id_4', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the Myprefix_Admin object
 * @since  0.1.0
 * @return Myprefix_Admin object
 */
function nn_count_down_admin() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new NN_Count_Down_Admin();
		$object->hooks();
	}
	return $object;
}

/**
 * Get instance of the CMB2_Option class for the passed metabox ID
 * @since  2.0.0
 * @return CMB2_Option object Options class for setting/getting options for metabox
 */
function nncd_options( $key ) {
	return CMB2_Options::get( $key );
}

/**
 * A helper function to get an option from a CMB2 options array
 * @since  1.0.1
 * @param  string  $option_key Option key
 * @param  string  $field_id   Option array field key
 * @param  mixed   $default    Optional default fallback value
 * @return array               Options array or specific field
 */
function nncd_get_options( $option_key, $field_id = '', $default = false ) {
	return nncd_options( $option_key )->get( $field_id, $default );
}

/**
 * A helper function to update an option in a CMB2 options array
 * @since  2.0.0
 * @param  string  $option_key Option key
 * @param  string  $field_id   Option array field key
 * @param  mixed   $value      Value to update data with
 * @param  boolean $single     Whether data should not be an array
 * @return boolean             Success/Failure
 */
function nncd_update_option( $option_key, $field_id, $value, $single = true ) {
	if ( nncd_options( $option_key )->update( $field_id, $value, false, $single ) ) {
		return nncd_options( $option_key )->set();
	}

	return false;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
if ( ! function_exists( 'nncd_get_option' ) ) {
	function nncd_get_option( $key = '' ) {
		return nncd_get_options( nn_count_down_admin()->key, $key );
	}
}

/**
 * Wrapper function around page_option
 * @since  0.1.0
 * @param  string  $page_id   	Option array field key
 * @param  string  $page_title 	Option Value
 * @return array 				Options array
 */

function nncd_get_pages( $query_args ) {
    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' => 10,
    ) );
    $posts = get_posts( $args );
    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
        }
    }
    return $post_options;
}


// Get it started
NN_Count_Down_Admin();