<?php
namespace MSV_AMSPSBTT_MAIN\PAGE_SCROLL_BACK_TO_TOP_SETTINGS;

if( ! defined( 'ABSPATH' ) ) exit();

include_once dirname( __FILE__ ) . '/class.ams-page-scroll-back-settings-api.php';
include_once dirname( __FILE__ ) . '/ams-page-scroll-back-option.php';

if ( ! class_exists( 'MSV_AMSPSBTT_Page_Scroll_Back_to_Top_Settings' ) ) :

class MSV_AMSPSBTT_Page_Scroll_Back_to_Top_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new \MSV_AMSPSBTT_MAIN\PAGE_SCROLL_BACK_TO_TOP_SETTINGS\MSV_AMSPSBTT_Page_Scroll_Back_Settings_API;

        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );
        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
       $msv_page_scroll_help_tab = add_options_page( 'AMS Page Scroll Back To Top Settings', 'AMS Page Scroll Back', 'manage_options', 'msv-amspsbtt-page-scroll-back-to-top-settings', array( $this, 'ams_option_page' ), 'dashicons-arrow-up-alt' );
	   add_action('load-'.$msv_page_scroll_help_tab, array($this, 'msv_page_scroll_help') );
    }

	function msv_page_scroll_help() {
		include_once dirname( __FILE__ ) . '/class.ams-page-scroll-back-help.php';
	}
	
    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'msv_amspsbtt_page_scroll_back_to_top_icon',
                'title' => 'Select Button Type',
            ),
            array(
                'id' => 'msv_amspsbtt_page_scroll_back_to_top_style',
                'title' => 'Appearance',
            ),
			array(
                'id' => 'msv_amspsbtt_page_scroll_back_to_top_layout',
                'title' => 'Layout',
            ),
			array(
                'id' => 'msv_amspsbtt_page_scroll_back_to_top_advanced',
                'title' => 'Advanced',
            ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(

            'msv_amspsbtt_page_scroll_back_to_top_icon' => array(
                
				array(
                    'name'    =>  'icon_type',
                    'label'   =>  'Button Type',
                    'type'    =>  'radio',
                    'options' =>   array('preset'=>'Preset Image', 'icon'=>'Preset Icon', 'text'=>'Custom Text', 'upload'=>'Image Upload' ),
                    'default' =>  'preset',
                ),
				array(
                    'name'    =>  'icon_preset',
                    'label'   =>  'Icon',
                    'type'    =>  'radioinline',
                    'options' =>  array(
									'fa-angle-up'           => '<i class="fa fa-angle-up fa-lg"></i>',
									'fa-angle-double-up'    => '<i class="fa fa-angle-double-up fa-lg"></i>',
									'fa-arrow-up'           => '<i class="fa fa-arrow-up fa-lg"></i>',
									'fa-arrow-circle-o-up'  => '<i class="fa fa-arrow-circle-o-up fa-lg"></i>',
									'fa-arrow-circle-up'    => '<i class="fa fa-arrow-circle-up fa-lg"></i>',
									'fa-caret-up'           => '<i class="fa fa-caret-up fa-lg"></i>',
									'fa-caret-square-o-up'  => '<i class="fa fa-caret-square-o-up fa-lg"></i>',
									'fa-chevron-up'         => '<i class="fa fa-chevron-up fa-lg"></i>',
									'fa-chevron-circle-up'  => '<i class="fa fa-chevron-circle-up fa-lg"></i>',
									'fa-hand-o-up'          => '<i class="fa fa-hand-o-up fa-lg"></i>',
									'fa-long-arrow-up'      => '<i class="fa fa-long-arrow-up fa-lg"></i>',
								),
                    'default' =>  'fa-angle-double-up',
                ),
				array(
                    'name'    =>  'text_button',
                    'label'   =>  'Custom Text For Button',
                    'type'    =>  'text',
                    'desc'    =>  '',
                    'default' =>  'Scroll To Top',
                ),
				array(
                    'name'    =>  'text_font_family',
                    'label'   =>  'Font Name',
                    'type'    =>  'select',
                    'desc'    =>  '',
					'options' =>  array(
									'anton' => 'Anton', 'courgette' => 'Courgette', 'cabin' => 'Cabin', 'opensans' => 'Open Sans', 'oswald' => 'Oswald', 'poiretone' => 'Poiret One',  'permanentmarker' => 'Permanent Marker', 'roboto' => 'Roboto', 'shrikhand' => 'Shrikhand', 'teko' => 'Teko', 
									 
								),
                    'default' =>  'opensans',
                ),
				array(
                    'name'    =>  'text_font_style',
                    'label'   =>  'Font Style',
                    'type'    =>  'select',
                    'desc'    =>  '',
					'options' =>  array(
									'normal' => 'Normal', 'bold' => 'Bold', 'italic' => 'Italic', 'bolditalic' => 'Bold Italic'
								),
                    'default' =>  'normal',
                ),
				array(
                    'name'    =>  'text_font_size',
                    'label'   =>  'Font Size',
                    'type'    =>  'number',
					'min'    =>  '8',
					'max'    =>  '100',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '14',
                ),
				
				array(
                    'name'    =>  'text_margin_top',
                    'label'   =>  'Margin Top',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '500',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '13',
                ),
				
				array(
                    'name'    =>  'text_bg_width',
                    'label'   =>  'Background Width',
                    'type'    =>  'number',
					'min'    =>  '40',
					'max'    =>  '1000',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '100',
                ),
				array(
                    'name'    =>  'text_bg_height',
                    'label'   =>  'Background Height',
                    'type'    =>  'number',
					'min'    =>  '40',
					'max'    =>  '500',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '50',
                ),
				
				array(
                    'name'    =>  'icon_size',
                    'label'   =>  'Icon Size',
                    'type'    =>  'radioinline',
                    'options' =>  array(
									'fa-lg' => 'lg',
									'fa-2x' => '2x',
									'fa-3x' => '3x',
									'fa-4x' => '4x',
									'fa-5x' => '5x',
								),
                    'default' =>  'fa-2x',
                ),
				array(
                    'name'    =>  'icon_margin_top',
                    'label'   =>  'Icon Margin Top',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '100',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '11',
                ),
				array(
                    'name'    =>  'icon_bg_width',
                    'label'   =>  'Background Width',
                    'type'    =>  'number',
					'min'    =>  '40',
					'max'    =>  '200',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'default' =>  '50',
                ),
				array(
                    'name'    =>  'icon_bg_height',
                    'label'   =>  'Background Height',
                    'type'    =>  'number',
					'min'    =>  '40',
					'max'    =>  '200',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'default' =>  '50',
                ),
				
				array(
                    'name'    =>  'preset_image_width',
                    'label'   =>  'Image Width',
                    'type'    =>  'number',
					'min'    =>  '20',
					'max'    =>  '500',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '40',
                ),
				array(
                    'name'    =>  'preset_image_height',
                    'label'   =>  'Image Height',
                    'type'    =>   'number',
					'min'    =>  '20',
					'max'    =>  '500',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '40',
                ),
				
				array(
                    'name'    =>  'upload_image_width',
                    'label'   =>  'Image Width',
                    'type'    =>  'number',
					'min'    =>  '20',
					'max'    =>  '500',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '40',
                ),
				array(
                    'name'    =>  'upload_image_height',
                    'label'   =>  'Image Height',
                    'type'    =>   'number',
					'min'    =>  '20',
					'max'    =>  '500',
					'step'    =>  '1',
                    'desc'    =>  '',
					'unit'	=>	'Px',
                    'default' =>  '40',
                ),
                array(
                    'name'    =>  'image_upload',
                    'label'   =>  'Upload Your Own Image',
                    'desc'    =>  'If \'Icon Type\' is set to \'Upload\'',
                    'type'    =>  'file',
                    'default' =>  plugins_url( 'assets/icons/arrow52.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP )
                ),
				
                array(
                    'name'    =>  'image_preset',
                    'label'   =>  'Choose From Preset Images',
                    'desc'    =>  'If \'Icon Type\' is set to \'Preset\'',
                    'type'    =>  'radio',
                    'options' => $this->preset_icons(),
                    'default' => plugins_url( 'assets/icons/arrow52.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP )
                ),
            ),
            
            'msv_amspsbtt_page_scroll_back_to_top_layout' => array(
                
                array(
                    'name'    =>  'position',
                    'label'   =>  'Position of the Button',
                    'type'    =>  'radio',
                    'default' =>  'right',
                    'options' => array( 'right' => 'Right', 'left' => 'Left' )
                ),
                
				
				
				
				array(
                    'name'    =>  'bottom',
                    'label'   =>  'Margin from Bottom',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '2000',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'default' =>  '40',
                ),
				
                array(
                    'name'    =>  'padding_side',
                    'label'   =>  'Margin from Left or Right',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '2000',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'desc'    =>  'Padding from left or right, based on position setting.',
                    'default' =>  '40',
                ),
			),
			'msv_amspsbtt_page_scroll_back_to_top_style' => array(
				
				array(
                    'name'    =>  'image_opacity',
                    'label'   =>  'Image Opacity',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '1',
					'step'    =>  '0.1',
                    'default' =>  '0.7',
                ),
				array(
                    'name'    =>  'image_hover_opacity',
                    'label'   =>  'Image Hover Opacity',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '1',
					'step'    =>  '0.1',
                    'default' =>  '1',
                ),
				array(
                    'name'    =>  'border_box',
                    'label'   =>  'Border',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '50',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'default' =>  '0',
                ),
				array(
                    'name'    =>  'border_radius',
                    'label'   =>  'Border Radius',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '50',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'default' =>  '0',
                ),
				
				array(
                    'name'    =>  'border_color',
                    'label'   =>  'Border Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#dd9933',
                ),
				array(
                    'name'    =>  'icon_bg_color',
                    'label'   =>  'Icon Background Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  'red',
                ),
				array(
                    'name'    =>  'icon_bg_hover_color',
                    'label'   =>  'Icon Background Hover Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#9f0000',
                ),
				array(
                    'name'    =>  'icon_fg_color',
                    'label'   =>  'Icon Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#fff',
                ),
				array(
                    'name'    =>  'icon_fg_hover_color',
                    'label'   =>  'Icon Hover Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#fff',
                ),
				array(
                    'name'    =>  'text_bg_color',
                    'label'   =>  'Text Background Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  'red',
                ),
				array(
                    'name'    =>  'text_bg_hover_color',
                    'label'   =>  'Text Background HoverColor',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#9f0000',
                ),
				array(
                    'name'    =>  'text_fg_color',
                    'label'   =>  'Text Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#fff',
                ),
				array(
                    'name'    =>  'text_fg_hover_color',
                    'label'   =>  'Text Hover Color',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#fff',
                ),
				array(
                    'name'    =>  'image_margin_top',
                    'label'   =>  'Image Margin Top',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '500',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'desc'    =>  '',
                    'default' =>  '0',
                ),
				array(
                    'name'    =>  'image_bg_width',
                    'label'   =>  'Image Background Width',
                    'type'    =>  'number',
					'min'    =>  '20',
					'max'    =>  '500',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'desc'    =>  '',
                    'default' =>  '50',
                ),
				array(
                    'name'    =>  'image_bg_height',
                    'label'   =>  'Image Background Height',
                    'type'    =>  'number',
					'min'    =>  '20',
					'max'    =>  '500',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'desc'    =>  '',
                    'default' =>  '50',
                ),
				array(
                    'name'    =>  'image_bg_color_choice',
                    'label'   =>  'Image Background Color',
                    'type'    =>  'radioinline',
                    'desc'    =>  '',
					'options'    =>  array('enabled' => 'Enabled', 'disabled' => 'Disabled'),
                    'default' =>  'disabled',
                ),
				
				array(
                    'name'    =>  'image_bg_color',
                    'label'   =>  '',
                    'type'    =>  'color',
                    'desc'    =>  '',
                    'default' =>  '#fff',
                ),
				
				array(
                    'name'    =>  'drop_shadow',
                    'label'   =>  'Image Shadow ',
                    'type'    =>  'dropshadow',
                    'desc'    =>  '',
                ),
				array(
                    'name'    =>  'box_shadow',
                    'label'   =>  'Background Shadow ',
                    'type'    =>  'boxshadow',
                    'desc'    =>  '',
                ),
			),
			
			'msv_amspsbtt_page_scroll_back_to_top_advanced' => array(
			
                array(
                    'name'    =>  'time_to_scroll',
                    'label'   =>  'Time to Scroll',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '',
					'step'    =>  '1',
					'unit'	=>	'Milli Second',
                    'desc'    =>  'Time to reach to top of the page after clicking the icon. (1 second = 1000 mili seconds)',
                    'default' =>  '1000',
                ),
                array(
                    'name'    =>  'show_after_px',
                    'label'   =>  'Scroll down to show',
                    'type'    =>  'number',
					'min'    =>  '0',
					'max'    =>  '',
					'step'    =>  '1',
					'unit'	=>	'Px',
                    'desc'    =>  'Icon will be shown up after scrolling down of this amount of pixels of the webpage',
                    'default' =>  '100',
                ),
				array(
                    'name'    =>  'additional_css',
                    'label'   =>  'Additional CSS',
                    'type'    =>  'textarea',
                    'desc'    =>  'Custom css input box. .ams-page-scroll-back-to-top-wrapper {}, img, p, i',
                    'default' =>  '',
                ),
            ),

        );

        return $settings_fields;
    }

    function ams_option_page() {
        echo '<div class="wrap">';
        ?>
            <div class="scroll-to-up-setting-page-title">
                <h1>AMS Page Scroll Back To Top Settings</h1>
            </div>

			<div class="stp-col-left">
				<?php 
				$this->settings_api->show_navigation();
				$this->settings_api->show_forms(); ?>
			</div>
    <?php echo '</div>';
    }

    public function preset_icons() {
        $icons = [];
        for( $i=1; $i<=80; $i++){
            $icons[plugins_url( 'assets/icons/arrow' . $i . '.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP )] = '<img src="' . plugins_url( 'assets/icons/arrow' . $i . '.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) . '" />';
        }
        return $icons;
    }
}
new \MSV_AMSPSBTT_MAIN\PAGE_SCROLL_BACK_TO_TOP_SETTINGS\MSV_AMSPSBTT_Page_Scroll_Back_to_Top_Settings;
endif;
?>