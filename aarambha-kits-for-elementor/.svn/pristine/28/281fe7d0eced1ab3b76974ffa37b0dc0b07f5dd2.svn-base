<?php
/**
 * Aarambha Kits Elementor Block Element 6
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes/elementor/widgets
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

use Elementor\Icons_Manager;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Aarambha Addons for Elementor
 *
 * Hero Slider
 *
 * @since 1.0.0
 */
class Aarambha_Kits_Block_Element_6 extends Base_Widget {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'aarambha-kits-block-hero-slider';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Block Hero Slider', 'aarambha-kits' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'aarambha-kits-badge block-element-6';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'aarambha_kits_category' );
	}

	/**
	 * Retrieve the list of styles the widget depended on.
	 *
	 * Used to set styles dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
		$styles = array(
			'aarambha-kits-heroslider',
		);
		if ( Icons_Manager::is_migration_allowed() ) {
			$styles[] = 'elementor-icons-fa-solid';
			$styles[] = 'elementor-icons-fa-brands';
		}
		return $styles;
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array(
			'aarambha-kits-heroslider',
		);
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

		/*----Content Tab----*/
		$this->__init_content_controls();
		$this->__init_content_slider_controls();

		/*----Style Tab----*/
		$this->__init_style_slide_controls();
		$this->__init_style_title_controls();
		$this->__init_style_description_controls();
		$this->__init_style_button_controls();
		$this->__init_style_navigation_controls();
		$this->__init_style_pagination_controls();

	}
	protected function __init_content_controls() {

		// Content Tab
		$this->start_controls_section(
			'hero_content',
			array(
				'label' => esc_html__( 'Content', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Slides
		$repeater = new Repeater();

		// Tabs Start
		$repeater->start_controls_tabs( 'slide_tab_start' );

		// Background Tab
		$repeater->start_controls_tab(
			'slide_background_tab',
			array(
				'label' => esc_html__( 'BACKGROUND', 'aarambha-kits' ),
			)
		);
		// Background Image
		$repeater->add_control(
			'background_image',
			array(
				'label'     => esc_html__( 'Image', 'aarambha-kits' ),
				'type'      => Controls_Manager::MEDIA,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container {{CURRENT_ITEM}}' => 'background-image: url("{{URL}}");',
				),
			)
		);
		// Image Size
		$repeater->add_control(
			'background_image_size',
			array(
				'label'      => esc_html__( 'Size', 'aarambha-kits' ),
				'type'       => Controls_Manager::SELECT,
				'options'    => array(
					'auto'    => esc_html__( 'Auto', 'aarambha-kits' ),
					'contain' => esc_html__( 'Contain', 'aarambha-kits' ),
					'cover'   => esc_html__( 'Cover', 'aarambha-kits' ),
				),
				'default'    => 'auto',
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'background_image[url]',
							'operator' => '!=',
							'value'    => '',
						),
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container {{CURRENT_ITEM}}' => 'background-size: {{VALUE}}',
				),
			)
		);

		// Overlay Color
		$repeater->add_control(
			'background_overlay',
			array(
				'label'     => esc_html__( 'Overlay Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#BBBBBB',
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}}::before, {{WRAPPER}} {{CURRENT_ITEM}} .premium-accordion-background' => 'background-color: {{VALUE}}',
				),
			)
		);

		$repeater->end_controls_tab();

		// Content Tab
		$repeater->start_controls_tab(
			'slide_content_tab',
			array(
				'label' => esc_html__( 'CONTENT', 'aarambha-kits' ),
			)
		);

		// Title
		$repeater->add_control(
			'title',
			array(
				'type'        => Controls_Manager::TEXT,
				'label'       => esc_html__( 'Title', 'aarambha-kits' ),
				'default'     => esc_html__( 'Hero Slider Title', 'aarambha-kits' ),
				'label_block' => true,
			)
		);

		// Description
		$repeater->add_control(
			'desc',
			array(
				'type'        => Controls_Manager::TEXTAREA,
				'label'       => esc_html__( 'Description', 'aarambha-kits' ),
				'default'     => esc_html__( 'Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.', 'aarambha-kits' ),
				'label_block' => true,
			)
		);

		// Button Text
		$repeater->add_control(
			'button_text',
			array(
				'type'        => Controls_Manager::TEXT,
				'label'       => esc_html__( 'Button', 'aarambha-kits' ),
				'default'     => esc_html__( 'Click Here', 'aarambha-kits' ),
				'label_block' => true,
			)
		);

		// Button Link
		$repeater->add_control(
			'button_link',
			array(
				'type'        => Controls_Manager::URL,
				'label'       => esc_html__( 'Link', 'aarambha-kits' ),
				'label_block' => true,
			)
		);

		$repeater->end_controls_tab();

		// Tabs End
		$repeater->end_controls_tabs();

		$this->add_control(
			'hero_slides',
			array(
				'label'       => esc_html__( 'Slides', 'aarambha-kits' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'title'              => esc_html__( 'Hero Slider 1', 'aarambha-kits' ),
						'desc'               => esc_html__( 'Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.', 'aarambha-kits' ),
						'button_text'        => esc_html__( 'Button', 'aarambha-kits' ),
						'background_overlay' => '#4054b2',
					),
					array(
						'title'              => esc_html__( 'Hero Slider 2', 'aarambha-kits' ),
						'desc'               => esc_html__( 'Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.', 'aarambha-kits' ),
						'button_text'        => esc_html__( 'Button', 'aarambha-kits' ),
						'background_overlay' => '#1abc9c',
					),
					array(
						'title'              => esc_html__( 'Hero Slider 3', 'aarambha-kits' ),
						'desc'               => esc_html__( 'Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.', 'aarambha-kits' ),
						'button_text'        => esc_html__( 'Button', 'aarambha-kits' ),
						'background_overlay' => '#833ca3',
					),
				),
				'title_field' => '{{{ title }}}',
			)
		);

		// Slide Height
		$this->add_responsive_control(
			'slide_height',
			array(
				'label'       => esc_html__( 'Height', 'aarambha-kits' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px', 'vh' ),
				'range'       => array(
					'px' => array(
						'min' => 100,
						'max' => 1000,
					),
					'vh' => array(
						'min' => 20,
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper' => 'height: {{SIZE}}{{UNIT}};',
				),
				'label_block' => true,
			)
		);

		$this->end_controls_section();

	}
	protected function __init_content_slider_controls() {
		// Slider Settings Tab
		$this->start_controls_section(
			'hero_slider_settings',
			array(
				'label' => esc_html__( 'Slider Settings', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Speed
		$this->add_control(
			'speed',
			array(
				'label'       => esc_html__( 'Transition Speed', 'aarambha-kits' ) . ' (ms)',
				'description' => esc_html__( 'Duration of transition between slides (in ms).', 'aarambha-kits' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 1200,
			)
		);

		// Navigation
		$this->add_control(
			'navigation',
			array(
				'label'     => esc_html__( 'Navigation', 'aarambha-kits' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'separator' => 'before',
			)
		);

		// Pagination
		$this->add_control(
			'pagination',
			array(
				'label'   => esc_html__( 'Pagination', 'aarambha-kits' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_slide_controls() {
		// Slides
		$this->start_controls_section(
			'slides_style',
			array(
				'label' => esc_html__( 'Slides', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		// Ver Position
		$this->add_responsive_control(
			'content_ver_position',
			array(
				'label'     => esc_html__( 'Vertical Position', 'aarambha-kits' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'flex-start' => array(
						'title' => esc_html__( 'Top', 'aarambha-kits' ),
						'icon'  => 'eicon-v-align-top',
					),
					'center'     => array(
						'title' => esc_html__( 'Middle', 'aarambha-kits' ),
						'icon'  => 'eicon-v-align-middle',
					),
					'flex-end'   => array(
						'title' => esc_html__( 'Bottom', 'aarambha-kits' ),
						'icon'  => 'eicon-v-align-bottom',
					),
				),
				'default'   => 'center',
				'toggle'    => false,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper' => 'justify-content: {{VALUE}}',
				),
			)
		);

		// Alignment
		$this->add_responsive_control(
			'content_align',
			array(
				'label'     => esc_html__( 'Alignment', 'aarambha-kits' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'aarambha-kits' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'aarambha-kits' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'aarambha-kits' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'center',
				'toggle'    => false,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper' => 'text-align: {{VALUE}}',
				),
			)
		);

		// Text Shadow
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'text_shadow',
				'label'    => esc_html__( 'Text Shadow', 'aarambha-kits' ),
				'selector' => '{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .slide-content >*',
			)
		);

		// Padding
		$this->add_responsive_control(
			'slide_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-contents' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();
	}
	protected function __init_style_title_controls() {
		// Ttitle
		$this->start_controls_section(
			'title_style',
			array(
				'label' => esc_html__( 'Title', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Spacing
		$this->add_responsive_control(
			'title_spacing',
			array(
				'label'     => esc_html__( 'Spacing', 'aarambha-kits' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
			)
		);

		// Title Color
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Text Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-title,{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-title a' => 'color: {{VALUE}}',
				),
			)
		);
		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-title',
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_description_controls() {
		// Description
		$this->start_controls_section(
			'description_style',
			array(
				'label' => esc_html__( 'Description', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Description Spacing
		$this->add_responsive_control(
			'description_spacing',
			array(
				'label'     => esc_html__( 'Spacing', 'aarambha-kits' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-decription' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
			)
		);

		// Description Color
		$this->add_control(
			'description_color',
			array(
				'label'     => esc_html__( 'Text Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-decription' => 'color: {{VALUE}}',
				),
			)
		);
		// Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-decription',
			)
		);

		$this->end_controls_section();
	}
	protected function __init_style_button_controls() {
		// Button
		$this->start_controls_section(
			'button_style',
			array(
				'label' => esc_html__( 'Button', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'separator'  => 'after',
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-button',
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'button_tab_start' );

		// Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			array(
				'label' => esc_html__( 'NORMAL', 'aarambha-kits' ),
			)
		);

		// Button Color
		$this->add_control(
			'button_color',
			array(
				'label'     => esc_html__( 'Text Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-button' => 'color: {{VALUE}}',
				),
			)
		);

		// Button Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'        => 'button_background',
				'label'       => esc_html__( 'Background', 'aarambha-kits' ),
				'types'       => array( 'classic', 'gradient' ),
				'exclude'     => array( 'image' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-button',
				'label_block' => false,
			)
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'button_hover_tab',
			array(
				'label' => esc_html__( 'HOVER', 'aarambha-kits' ),
			)
		);

		// Button Hover Color
		$this->add_control(
			'button_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-button:hover' => 'color: {{VALUE}}',
				),
			)
		);

		// Button Hover Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'        => 'button_hover_background',
				'label'       => esc_html__( 'Background', 'aarambha-kits' ),
				'types'       => array( 'classic', 'gradient' ),
				'exclude'     => array( 'image' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-slide-wrapper .hero-slide-contents .slide-button:hover',
				'label_block' => false,
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

		$this->end_controls_section();

	}
	protected function __init_style_navigation_controls() {
		// Navigarion
		$this->start_controls_section(
			'navigation_style',
			array(
				'label' => esc_html__( 'Navigation', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		/**
		  * Tab Start
		  */
		$this->start_controls_tabs( 'arrow_tab' );

		// Normal Tab
		$this->start_controls_tab(
			'arrow_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'aarambha-kits' ),
			)
		);

		 // Color
		$this->add_control(
			'arrows_color',
			array(
				'label'     => esc_html__( 'Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-next, {{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-prev' => 'color: {{VALUE}}',
				),
			)
		);

		// Background
		$this->add_control(
			'arrows_background',
			array(
				'label'     => esc_html__( 'Background Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-next, {{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-prev' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'arrow_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'aarambha-kits' ),
			)
		);

		// hover Color
		$this->add_control(
			'arrows_hover_color',
			array(
				'label'     => esc_html__( 'Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-next:hover, {{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-prev:hover' => 'color: {{VALUE}}',
				),
			)
		);

		// Hover Background
		$this->add_control(
			'arrows_hover_background',
			array(
				'label'     => esc_html__( 'Background Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-next:hover, {{WRAPPER}} .aarambha-kits-hero-slider-container .hero-swiper-button-prev:hover' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		/**
		 * Tab End
		 */

		$this->end_controls_section();
	}
	protected function __init_style_pagination_controls() {
		// Pagination
		$this->start_controls_section(
			'pagination_style',
			array(
				'label' => esc_html__( 'Pagination', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Color
		$this->add_control(
			'pagination_color',
			array(
				'label'     => esc_html__( 'Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .aarambha-kits-hero-slider-container .swiper-pagination-fraction .swiper-pagination-total,{{WRAPPER}} .aarambha-kits-hero-slider-container .swiper-pagination-fraction' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['hero_slides'] ) ) {
			return;
		}

		$localize_vars = array(
			'effect'     => 'fade',
			'autoplay'   => true,
			'loop'       => true,
			'speed'      => absint( $settings['speed'] ),
			'delay'      => 5000,
			'pause'      => false,
			'navigation' => $settings['navigation'] === 'yes' ? true : false,
			'pagination' => $settings['pagination'] === 'yes' ? true : false,
		);

		$this->add_render_attribute( 'hero_slider_container', 'class', 'aarambha-kits-container aarambha-kits-hero-slider-container' );
		$this->add_render_attribute( 'hero_slider_container', 'data-settings', esc_js( json_encode( $localize_vars ) ) );

		$this->add_render_attribute( 'hero_slide_content', 'class', 'd-flex' );
		$this->add_render_attribute( 'hero_slide_content', 'class', 'hero-slide-contents' );
		?>
		<div <?php $this->print_render_attribute_string( 'hero_slider_container' ); ?>>

			<?php if ( ! empty( $settings['hero_slides'] ) ) { ?>
				<!-- Slider main container -->
				<div class="swiper-container">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper elementor-slides">

						<?php foreach( $settings['hero_slides'] as $index => $slide ) {
							
							// Button
							$this->add_render_attribute( 'button_text' . $index, 'class', 'slide-button' );
							$this->add_link_attributes( 'button_text' . $index, map_deep( wp_unslash( $slide['button_link'] ), 'sanitize_text_field' ) );
							?>

							<div class="d-flex flex-column swiper-slide hero-slide-wrapper elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
								<div <?php $this->print_render_attribute_string( 'hero_slide_content' )?>>

									<div class="slide-content">
										<?php if( $slide['title'] ) { ?>
											<h2 class="slide-title"><?php echo esc_html( $slide['title'] ); ?></h2>
										<?php } ?>

										<?php if( $slide['desc'] ) { ?>
											<div class="slide-decription"><?php echo wp_kses_post( $slide['desc'] ); ?></div>
										<?php } ?>

										<?php if ( $slide['button_text'] ) : ?>
											<a <?php $this->print_render_attribute_string( 'button_text' . $index ); ?>><?php echo esc_html( $slide['button_text'] ); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
							
						<?php } ?>
						
					</div>

					<?php if ( 1 < count($settings['hero_slides']) ) : ?>
						<?php if ( $settings['navigation'] === 'yes' ) { ?>
							<!-- next / prev arrows -->
							<div class="hero-swiper-button-next">
								<?php $this::render_swiper_button( 'next' ); ?>
								<span class="screen-reader-text"><?php echo esc_html__( 'Next', 'aarambha-kits' ); ?></span>
							</div>
							<div class="hero-swiper-button-prev">
								<?php $this::render_swiper_button( 'previous' ); ?>
								<span class="screen-reader-text"><?php echo esc_html__( 'Previous', 'aarambha-kits' ); ?></span>
							</div>
							<!-- !next / prev arrows -->
						<?php } ?>

						<?php if ( $settings['pagination'] === 'yes' ) { ?>
							<!-- pagination dots -->
							<div class="swiper-pagination"></div>
							<!-- !pagination dots -->
						<?php } ?>
					<?php endif; ?>

				</div><!-- .swiper-container -->

			<?php } ?>
			
		</div>
		<?php
	}

	 /**
	  * Render swiper button custom icon
	  *
	  * @since 1.0.0
	  *
	  * @access protected
	  * @return void
	  */
	public static function render_swiper_button( $type ) {
		$direction = 'next' === $type ? 'right' : 'left';

		if ( is_rtl() ) {
			$direction = 'right' === $direction ? 'left' : 'right';
		}

		$icon_value = 'eicon-chevron-' . $direction;

		Icons_Manager::render_icon(
			array(
				'library' => 'eicons',
				'value'   => $icon_value,
			),
			array( 'aria-hidden' => 'true' )
		);
	}
}
