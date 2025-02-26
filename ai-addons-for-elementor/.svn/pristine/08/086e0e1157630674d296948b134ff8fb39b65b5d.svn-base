<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons Feature Box
 *
 * @since 1.0.0
 */
 
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
 
class AIEA_Elementor_Feature_Box_Widget extends Widget_Base {
	
	private $_settings;
	private $excerpt_len;
	private $title_array;
	private $fbox_content;
	private $fbox_icon_array;
	private $fbox_img_array;
	private $fbox_video_array;
	private $fbox_btn_array;
	public $image_class;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Feature Box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-featurebox';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Feature Box', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('feature-box');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Feature Box widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
	
	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'ai-front-end' ];
	}
	
		public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/feature-box-demo/';
    }
	
	/**
	 * Get button sizes.
	 *
	 * Retrieve an array of button sizes for the button widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'ai-addons' ),
			'sm' => __( 'Small', 'ai-addons' ),
			'md' => __( 'Medium', 'ai-addons' ),
			'lg' => __( 'Large', 'ai-addons' ),
			'xl' => __( 'Extra Large', 'ai-addons' ),
		];
	}

	/**
	 * Register Feature Box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//General Section
		$this->start_controls_section(
			'general_section',
			[
				'label'	=> esc_html__( 'General', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'redirect',
			[
				'label' 		=> esc_html__( 'Box Redirect', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'ai-addons' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'condition' 	=> [
					'redirect' 		=> 'yes'
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'ai-addons' )
			]
		);
		$this->end_controls_section();		
		
		//Layouts Section
		$this->start_controls_section(
			'feature_layouts_section',
			[
				'label'			=> esc_html__( 'Layouts', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'feature_layout',
			[
				'label'			=> esc_html__( 'Layout', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'default',
				'options'		=> [
					'default'		=> esc_html__( 'Default', 'ai-addons' ),
					'classic'		=> esc_html__( 'Classic (Pro)', 'ai-addons' ),
					'modern'		=> esc_html__( 'Modern (Pro)', 'ai-addons' ),
					'classic-pro'	=> esc_html__( 'Minimalist (Pro)', 'ai-addons' ),
				]
			]
		);
		$this->add_control(
			'layout_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'feature_layout!' => $this->get_free_options('feature_layout'),
				]
			]
		);		
		$this->add_control(
			'section_icon_enabled',
			[
				'label' => esc_html__( 'Icon Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_title_enabled',
			[
				'label' => esc_html__( 'Title Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_image_enabled',
			[
				'label' => esc_html__( 'Image Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_btn_enabled',
			[
				'label' => esc_html__( 'Button Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_content_enabled',
			[
				'label' => esc_html__( 'Content Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_number_enabled',
			[
				'label' => esc_html__( 'Number Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'fbox_items',
			[
				'label'				=> 'Items',
				'type'				=> 'drag-n-drop',
				'drag_items' 			=> [ 
					'visible' => array( 
						'icon'	=> esc_html__( 'Icon', 'ai-addons' ),
						'title'	=> esc_html__( 'Title', 'ai-addons' ),
						'content'	=> esc_html__( 'Content', 'ai-addons' )					
					),
					'disabled' => array(
						'image'	=> esc_html__( 'Image', 'ai-addons' ),
						'btn'	=> esc_html__( 'Button', 'ai-addons' ),
						'number'=> esc_html__( 'Custom Text', 'ai-addons' )
					)
				],
				'triggers' => array(
					'icon' => 'section_icon_enabled',
					'title' => 'section_title_enabled',
					'content' => 'section_content_enabled',
					'image' => 'section_image_enabled',
					'btn' => 'section_btn_enabled',
					'number' => 'section_number_enabled'
				),
			]
		);
		$this->add_control(
			'ribbon_value',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Ribbon Values', 'ai-addons' ),
				'default'		=> '',
				'condition' 	=> [
					'feature_layout' 	=> 'classic-pro'
				]
			]
		);
		$this->end_controls_section();
		
		//Title Section
		$this->start_controls_section(
			'title_section',
			[
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_title_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Title', 'ai-addons' ),
				'default' 		=>  esc_html__( 'Feature Title', 'ai-addons' )
			]
		);		
		$this->add_control(
			'title_head',
			[
				'label'			=> esc_html__( 'Heading Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h3',
				'options'		=> [
					'h1'		=> esc_html__( 'h1', 'ai-addons' ),
					'h2'		=> esc_html__( 'h2', 'ai-addons' ),
					'h3'		=> esc_html__( 'h3', 'ai-addons' ),
					'h4'		=> esc_html__( 'h4', 'ai-addons' ),
					'h5'		=> esc_html__( 'h5', 'ai-addons' ),
					'h6'		=> esc_html__( 'h6', 'ai-addons' ),
					'p'			=> esc_html__( 'p', 'ai-addons' ),
					'span'		=> esc_html__( 'span', 'ai-addons' ),
					'div'		=> esc_html__( 'div', 'ai-addons' ),
					'i'			=> esc_html__( 'i', 'ai-addons' )
				]
			]
		);
		
		$this->add_control(
			'title_text_trans',
			[
				'label'			=> esc_html__( 'Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .feature-box-title' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->end_controls_section();
		
		//Icon Section
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'condition' 	=> [
					'section_icon_enabled' 		=> 'yes'
				],
			]
		);
		
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'ti-heart',
					'library' => 'themify',
				],
			]
		);

		$this->add_control(
			'icon_view',
			[
				'label' => esc_html__( 'View', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__( 'Default', 'ai-addons' ),
					'stacked' => esc_html__( 'Stacked', 'ai-addons' ),
					'framed' => esc_html__( 'Framed', 'ai-addons' ),
				],
				'default' => 'default',
				'prefix_class' => 'ai-view-',
			]
		);

		$this->add_control(
			'icon_shape',
			[
				'label' => esc_html__( 'Shape', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => esc_html__( 'Circle', 'ai-addons' ),
					'square' => esc_html__( 'Square', 'ai-addons' ),
				],
				'default' => 'circle',
				'condition' => [
					'icon_view!' => 'default',
				],
				'prefix_class' => 'ai-shape-',
			]
		);

		$this->end_controls_section();				
		
		// Image Section
		$this->start_controls_section(
			'image_section',
			[
				'label'			=> esc_html__( 'Image', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_image_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'image',
			[
				'type' => Controls_Manager::MEDIA,
				'label' => esc_html__( 'Image', 'ai-addons' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', 
				'default' => 'full',
				'separator' => 'none',
			]
		);				
		$this->end_controls_section();			
		
		//Number Section
		$this->start_controls_section(
			'number_section',
			[
				'label'			=> esc_html__( 'Custom Text/Number', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_number_enabled' => 'yes'
				],
			]
		);	
		$this->add_control(
			'fbox_number',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Custom Text', 'ai-addons' ),
				'default'		=> '01'
			]
		);				
		$this->end_controls_section();		
		
		// Button
		$this->start_controls_section(
			'button_section',
			[
				'label'			=> esc_html__( 'Button', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_btn_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'button_type',
			[
				'label' => esc_html__( 'Type', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'ai-addons' ),
					'info' => esc_html__( 'Info', 'ai-addons' ),
					'success' => esc_html__( 'Success', 'ai-addons' ),
					'warning' => esc_html__( 'Warning', 'ai-addons' ),
					'danger' => esc_html__( 'Danger', 'ai-addons' ),
				],
				'prefix_class' => 'elementor-button-',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Text', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Click here', 'ai-addons' ),
				'placeholder' => esc_html__( 'Click here', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Link', 'ai-addons' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'ai-addons' ),
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_responsive_control(
			'button_align',
			[
				'label' => esc_html__( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'ai-btn%s-align-',
				'default' => '',
			]
		);
		$this->add_control(
			'button_size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => [
			'xs' => __( 'Extra Small', 'ai-addons' ),
			'sm' => __( 'Small', 'ai-addons' ),
			'md' => __( 'Medium', 'ai-addons' ),
			'lg' => __( 'Large', 'ai-addons' ),
			'xl' => __( 'Extra Large', 'ai-addons' ),
		],
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'button_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
			]
		);
		$this->add_control(
			'button_icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'ai-addons' ),
					'right' => esc_html__( 'After', 'ai-addons' ),
				],
				'condition' => [
					'button_icon[value]!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-button .ai-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-button .ai-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_view',
			[
				'label' => esc_html__( 'View', 'ai-addons' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		$this->add_control(
			'button_css_id',
			[
				'label' => esc_html__( 'Button ID', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'title' => esc_html__( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'ai-addons' ),
				'separator' => 'before',

			]
		);
		$this->end_controls_section();	
		
		// Content
		$this->start_controls_section(
			'content_section',
			[
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_content_enabled' => 'yes'
				],
			]
		);
		
		// Openai part
		$this->add_control(
			'aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'aiea_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'aiea_content_opt' => 'yes'
				],
			]
		);
		
		$this->add_control(
			'content',
			[
				'type'			=> Controls_Manager::WYSIWYG,
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'default' 		=> aiea_addon_base()->make_default_content('feature-box'),
			]
		);
		$this->end_controls_section();
		
		// Go premium section
		$this->start_controls_section(
			'aiea_section_pro',
			[
				'label' => esc_html__( 'Go Premium for More Features', 'ai-addons' )
			]
		);
		$this->add_control(
			'aiea_get_pro',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span class="inc-pro-feature"> Get the  <a href="https://aiaddons.ai/pricing/" target="_blank">Pro version</a> for more ai elements and customization options.</span>',
				'content_classes' => 'ai-elementor-warning'
			]
		);
		$this->end_controls_section();
		
		// Style Section
		$this->start_controls_section(
			'section_style_fbox',
			[
				'label' => __( 'Feature Box', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,				
			]
		);
		
		$this->start_controls_tabs( 'fbox_content_styles' );
		$this->start_controls_tab(
			'fbox_content_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);	
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .feature-box-wrapper',
			]
		);
		$this->add_control(
			'font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .feature-box-inner > *' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'fbox_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{fbox_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'fbox_box_shadow_pos',
			[
				'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					' ' => esc_html__( 'Outline', 'ai-addons' ),
					'inset' => esc_html__( 'Inset', 'ai-addons' ),
				],
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'default' => ' ',
				'render_type' => 'ui',
			]
		);
		$this->add_responsive_control(
			'fbox_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'fbox_content_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'fbox_bg_hcolor',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .feature-box-wrapper:hover',
			]
		);
		$this->add_control(
			'font_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'shadow_hopt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'fbox_hbox_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{fbox_hbox_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'fbox_hbox_shadow_pos',
			[
				'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					' ' => esc_html__( 'Outline', 'ai-addons' ),
					'inset' => esc_html__( 'Inset', 'ai-addons' ),
				],
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'default' => ' ',
				'render_type' => 'ui',
			]
		);
		$this->add_responsive_control(
			'fbox_hborder_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'fbox_border',
				'selector' => '{{WRAPPER}} .feature-box-wrapper',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'fbox_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'fbox_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Title Section
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_title_enabled' => 'yes'
				],
			]
		);
		$this->start_controls_tabs( 'title_colors' );
		$this->start_controls_tab(
			'title_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .feature-box-title, {{WRAPPER}} .feature-box-wrapper .feature-box-title > a' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .feature-box-title, {{WRAPPER}} .feature-box-wrapper:hover .feature-box-title > a' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .feature-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'fbox_title_typography',
				'selector' 		=> '{{WRAPPER}} .feature-box-wrapper .feature-box-title'
			]
		);	
		$this->end_controls_section();
		
		// Style Icon Section
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_icon_enabled' => 'yes'
				],
			]
		);

		$this->start_controls_tabs( 'icon_colors' );

		$this->start_controls_tab(
			'icon_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);

		$this->add_control(
			'icon_primary_color',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-featured-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ai-featured-icon svg' => 'fill: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_secondary_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .ai-featured-icon i' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.ai-view-stacked .ai-featured-icon i' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'icon_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .ai-featured-icon' => 'border-color: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);

		$this->add_control(
			'icon_primary_hcolor',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}:hover .ai-featured-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}}:hover .ai-featured-icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'icon_secondary_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed:hover .ai-featured-icon i' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.ai-view-stacked:hover .ai-featured-icon i' => 'background-color: {{VALUE}};'
				],
			]
		);	
		$this->add_control(
			'icon_border_hcolor',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed:hover .ai-featured-icon' => 'border-color: {{VALUE}};'
				],
			]
		);		

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-featured-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-featured-icon svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}}.ai-view-stacked .ai-featured-icon i' => 'padding: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ai-view-framed .ai-featured-icon i' => 'padding: {{SIZE}}{{UNIT}};'
				],
				'defailt' => [
					'unit' => 'px',
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'condition' => [
					'icon_view!' => 'default',
				],
			]
		);

		$this->add_responsive_control(
			'icon_rotate',
			[
				'label' => esc_html__( 'Rotate', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-featured-icon i, {{WRAPPER}} .ai-featured-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);
		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-featured-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label' => esc_html__( 'Border Width', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-featured-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'icon_view' => 'framed',
				],
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-featured-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'icon_view!' => 'default',
				],
			]
		);
		$this->add_control(
			'icon_animation',
			[
				'label' => esc_html__( 'Icon Animation', 'ai-addons' ),
				'type' => Controls_Manager::ANIMATION,
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .ai-featured-icon.ai-elementor-animation' => 'animation-name: {{VALUE}};'
				]
			]
		);
		
		$this->end_controls_section();
		
		// Style Image Section		
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_image_enabled' => 'yes'
				],
			]
		);
		
		$this->start_controls_tabs( 'fbox_image_styles' );
		$this->start_controls_tab(
			'fbox_img_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'fbox_img_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .ai-feature-box-img > img' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'fbox_img_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'fbox_img_bg_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .ai-feature-box-img > img' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'ai-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();			
			
		$this->add_control(
			'img_style',
			[
				'label'			=> esc_html__( 'Image Style', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'squared',
				'options'		=> [
					'squared'			=> esc_html__( 'Squared', 'ai-addons' ),
					'inc-rounded'			=> esc_html__( 'Rounded', 'ai-addons' ),
					'inc-rounded-circle'	=> esc_html__( 'Circled', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'resize_opt',
			[
				'label' 		=> esc_html__( 'Resize Image', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_responsive_control(
			'image_size',
			[
				'label' => esc_html__( 'Image Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .ai-feature-box-img > img' => 'width: {{SIZE}}%; max-width: {{SIZE}}%;',
					'{{WRAPPER}} .ai-feature-box-img' => 'width: {{SIZE}}%; max-width: {{SIZE}}%;'
				],
			]
		);
		$this->add_responsive_control(
			'image_spacing',
			[
				'label' => esc_html__( 'Image Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-feature-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;'
				],
			]
		);		
		$this->add_responsive_control(
			'fbox_img_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-feature-box-img > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'fbox_img_border',
					'label' => esc_html__( 'Border', 'ai-addons' ),
					'selector' => '{{WRAPPER}} .ai-feature-box-img > img'
				]
		);
		$this->end_controls_section();
		
		// Style Number Section
		$this->start_controls_section(
			'section_style_number',
			[
				'label' => __( 'Number', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_number_enabled' => 'yes'
				],
			]
		);
		
		$this->start_controls_tabs( 'fbox_number_styles' );
		$this->start_controls_tab(
			'fbox_number_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'fbox_number_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .fbox-custom-text' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'fbox_number_opacity',
			[
				'label' => esc_html__( 'Opacity', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .fbox-custom-text' => 'opacity: calc( {{SIZE}} / 10 );'
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'fbox_number_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'fbox_number_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .fbox-custom-text' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'fbox_number_hopacity',
			[
				'label' => esc_html__( 'Opacity', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .fbox-custom-text' => 'opacity: calc( {{SIZE}} / 10 );'
				]
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'fbox_number_typography',
				'selector' 		=> '{{WRAPPER}} .feature-box-wrapper .fbox-custom-text'
			]
		);	
		$this->add_control(
			'number_position_opt',
			[
				'label' 		=> esc_html__( 'Floating Number', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_responsive_control(
			'number_position_top',
			[
				'label' => esc_html__( 'Position Top', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .fbox-custom-text' => 'position: absolute; top: {{SIZE}}%;',
				],
				'condition' 	=> [
					'number_position_opt' 	=> 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'number_position_left',
			[
				'label' => esc_html__( 'Position Left', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper .fbox-custom-text' => 'left: {{SIZE}}%;',
				],
				'condition' 	=> [
					'number_position_opt' 	=> 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'number_spacing',
			[
				'label' => esc_html__( 'Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .fbox-custom-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .fbox-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' 	=> [
					'number_position_opt!' 	=> 'yes'
				]
			]
		);		
		$this->end_controls_section();	
		
		// Style Button Section
		$this->start_controls_section(
			'button_section_style',
			[
				'label' => esc_html__( 'Button', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_btn_enabled' => 'yes'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .ai-button',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .ai-button, {{WRAPPER}} .ai-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .feature-box-wrapper:hover .ai-button svg, {{WRAPPER}} .ai-button:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .ai-button, {{WRAPPER}} .ai-button:focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box-wrapper:hover .ai-button, {{WRAPPER}} .ai-button:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'ai-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .ai-button',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .ai-button',
			]
		);
		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'selector' 		=> '{{WRAPPER}} .ai-button'
			]
		);
		$this->end_controls_section();		
		
		// Style Content Section
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_content_enabled' => 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .fbox-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'fbox_content_typography',
				'selector' 		=> '{{WRAPPER}} .fbox-content'
			]
		);	
		$this->end_controls_section();			
		
	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		$this->_settings = $settings;
		extract( $settings );
		
		$free_layouts = [ 'default' ];			
		$parent_class = isset( $settings['feature_layout'] ) && in_array( $settings['feature_layout'], $free_layouts ) ? 'feature-box-'. $settings['feature_layout'] : 'feature-box-default';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-feature-box-elementor-widget feature-box-wrapper' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php

		$redirect = isset( $redirect ) && $redirect == 'yes' ? true : false;

		//Title section
		$title = isset( $title ) && $title != '' ? $title : '';
		$title_head = isset( $title_head ) && $title_head != '' ? $title_head : 'h3';
		
		$this->title_array = array(
			'title' => $title,
			'title_url_opt' => false,
			'title_url' => '',
			'title_head' => $title_head,
			'title_redirect' => ''
		);
		
		//Number Section
		$fbox_number = isset( $fbox_number ) && $fbox_number != '' ? $fbox_number : ''; 
		$fbox_arr = array(
			'number_txt' => $fbox_number
		);
		
		//Icon Section
		$this->add_render_attribute( 'icon-wrapper', 'class', 'ai-featured-icon' );
		if ( ! empty( $settings['icon_animation'] ) ) {
			$this->add_render_attribute( 'icon-wrapper', 'class', 'ai-elementor-animation' );
		}
		if ( empty( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['icon'] = 'ti-heart';
		}
		if ( ! empty( $settings['icon'] ) ) {
			$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
			$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
		}		
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		$this->fbox_icon_array = array(
			'icon' => $settings['selected_icon'],
			'is_new' => $is_new,
			'migrated'	=> $migrated
		);
		
		//Image Section
		$img_class = $image_html = '';
		if ( ! empty( $settings['image']['url'] ) ) {
			$this->image_class = 'image_class';
			$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
			$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
			$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
			$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );
			$this->add_render_attribute( 'image_class', 'class', $settings['img_style'] );

			if ( $settings['hover_animation'] ) {
				$this->add_render_attribute( 'image_class', 'class', 'elementor-animation-' . $settings['hover_animation'] );
				
			}
			$fbox_image = aiea_addon_base()->get_attachment_image_html( $settings, 'thumbnail', 'image', $this );
			$image_html = '<figure class="ai-feature-box-img">' . $fbox_image . '</figure>';
		}
		$this->fbox_img_array = array(
			'img_html' => $image_html
		);
				
		//Layout Section
		$default_items = array( 
			"icon"	=> esc_html__( "Icon", 'ai-addons' ),
			"title"	=> esc_html__( "Title", 'ai-addons' ),
			"content"	=> esc_html__( "Content", 'ai-addons' )
		);
		$elemetns = isset( $fbox_items ) && !empty( $fbox_items ) ? json_decode( $fbox_items, true ) : array( 'visible' => $default_items );
		
		//Content Section
		$this->fbox_content = isset( $content ) && $content != '' ? $content : ''; 

		if ( $redirect && !empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'fbox-link-wrapper', $settings['link'] );
			echo '<a '. $this->get_render_attribute_string( 'fbox-link-wrapper' ) .'>';
		}		
		
		echo '<div class="feature-box-inner">';		
			if( isset( $elemetns['visible'] ) && !empty( $elemetns['visible'] ) ) :
				foreach( $elemetns['visible'] as $element => $value ){
					$this->aiea_fbox_shortcode_elements( $element, $fbox_arr );
				}
			endif;
		echo '</div>';
		
		if ( $redirect && !empty( $settings['link']['url'] ) ) {
			echo '</a><!-- .fbox link close -->';
		}
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	function aiea_fbox_shortcode_elements( $element, $fbox_arr = array() ){
		
		$settings = $this->_settings;
		
		switch( $element ){
		
			case "title":
				$title_array = $this->title_array;
				if( $title_array['title'] ){
					if( $title_array['title_url_opt'] && $title_array['title_url'] != '' )
						echo '<'. esc_attr( $title_array['title_head'] ) .' class="feature-box-title"><a href="'. esc_url( $title_array['title_url'] ) .'" title="'. esc_attr( $title_array['title'] ) .'" target="'. esc_attr( $title_array['title_redirect'] ) .'">'. esc_html( $title_array['title'] ) .'</a></'. esc_attr( $title_array['title_head'] ) .'>';
					else
						echo '<'. esc_attr( $title_array['title_head'] ) .' class="feature-box-title">'. esc_html( $title_array['title'] ) .'</'. esc_attr( $title_array['title_head'] ) .'>';
				}
			break;
			
			case "icon":
				if( $this->fbox_icon_array['icon'] ){
					echo '<div '. $this->get_render_attribute_string( 'icon-wrapper' ) .'>';
						if ( $this->fbox_icon_array['is_new'] || $this->fbox_icon_array['migrated'] ) :
							Icons_Manager::render_icon( $this->fbox_icon_array['icon'], [ 'aria-hidden' => 'true' ] );
						else : ?>
							<i <?php echo ''. $this->get_render_attribute_string( 'icon' ); ?>></i>
						<?php endif; 
					echo '</div>';
				}
			break;
			
			case "image":
				echo ''. $this->fbox_img_array['img_html'];
			break;
			
			case "content":
				if( $this->fbox_content ) echo '<div class="fbox-content">'. $this->fbox_content .'</div>';
			break;
			
			case "btn":
				$this->add_render_attribute( 'button-wrapper', 'class', 'ai-button-wrapper' );
				if ( ! empty( $settings['button_link']['url'] ) ) {
					$this->add_link_attributes( 'button', $settings['button_link'] );
					$this->add_render_attribute( 'button', 'class', 'ai-button-link' );
				}
				$this->add_render_attribute( 'button', 'class', 'elementor-button ai-button' );
				if ( ! empty( $settings['button_css_id'] ) ) {
					$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
				}
				if ( ! empty( $settings['button_size'] ) ) {
					$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['button_size'] );
				}
				if ( $settings['button_hover_animation'] ) {
					$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
				}
				?>
				<div <?php echo ''. $this->get_render_attribute_string( 'button-wrapper' ); ?>>
					<a <?php echo ''. $this->get_render_attribute_string( 'button' ); ?>>
						<?php $this->button_render_text(); ?>
					</a>
				</div>
				<?php
			break;
			
			case "number":
				$number_txt = isset( $fbox_arr['number_txt'] ) ? $fbox_arr['number_txt'] : '';
				if( $number_txt ) echo '<div class="fbox-custom-text">'. esc_html( $number_txt ) .'</div>';
			break;			
		
		}
	}
	
	/**
	 * Render button text.
	 *
	 * Render button widget text.
	 *
	 * @since 1.5.0
	 * @access protected
	 */
	protected function button_render_text() {
		$settings = $this->get_settings_for_display();

		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

		if ( ! $is_new && empty( $settings['icon_align'] ) ) {
			// @todo: remove when deprecated
			// added as bc in 2.6
			//old default
			$settings['icon_align'] = $this->get_settings( 'icon_align' );
		}

		$this->add_render_attribute( [
			'content-wrapper' => [
				'class' => 'ai-button-content-wrapper',
			],
			'icon-align' => [
				'class' => [
					'ai-button-icon',
					'ai-align-icon-' . $settings['button_icon_align'],
				],
			],
			'text' => [
				'class' => 'ai-button-text',
			],
		] );

		$this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php echo ''. $this->get_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['button_icon'] ) || ! empty( $settings['button_icon']['value'] ) ) : ?>
			<span <?php echo ''. $this->get_render_attribute_string( 'icon-align' ); ?>>
				<?php if ( $is_new || $migrated ) :
					Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<span <?php echo ''. $this->get_render_attribute_string( 'text' ); ?>><?php echo esc_html( $settings['button_text'] ); ?></span>
		</span>
		<?php
	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'feature_layout' => [ 'default' ]
		];
		return $free_options[$key];
	}
	
}