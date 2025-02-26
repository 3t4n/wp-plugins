<?php
/**
 * Aarambha Kits Elementor Block Element 10
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
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Aarambha Addons for Elementor
 *
 * Block Posts 4
 *
 * @since 1.0.0
 */
class Aarambha_Kits_Block_Element_10 extends Base_Widget {

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
		return 'aarambha-kits-block-posts-4-container';
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
		return esc_html__( 'Block Posts 4', 'aarambha-kits' );
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
		return 'aarambha-kits-badge block-element-10';
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
			'aarambha-kits-postslayout4',
		);
		if ( Icons_Manager::is_migration_allowed() ) {
			$styles[] = 'elementor-icons-fa-solid';
			$styles[] = 'elementor-icons-fa-brands';
		}
		return $styles;
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
		$this->__init_base_query_controls();
		$this->__init_content_controls();

		/*----Style Tab----*/
		$this->__init_style_content_controls();
		$this->__init_style_image_controls();
		$this->__init_style_categories_controls();
		$this->__init_style_title_controls();
		$this->__init_style_excerpt_controls();
		$this->__init_style_meta_controls();

	}
	protected function __init_content_controls() {

		// Content Tab
		$this->start_controls_section(
			'posts_layout_4_content',
			array(
				'label' => esc_html__( 'Content', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Featured Image Heading
		$this->add_control(
			'featured_image_heading',
			array(
				'label'       => esc_html__( 'Image', 'aarambha-kits' ),
				'type'        => Controls_Manager::HEADING,
				'label_block' => false,
			)
		);

		// Image Size
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'        => 'image',
				'default'     => 'medium_large',
				'exclude'     => array( 'custom' ),
				'label_block' => true,
			)
		);

		 // Post Title
		$this->add_control(
			'title_heading',
			array(
				'label'       => esc_html__( 'Title', 'aarambha-kits' ),
				'type'        => Controls_Manager::HEADING,
				'separator'   => 'before',
				'label_block' => false,
			)
		);

		// HTML Tag
		$this->add_control(
			'title_html_tag',
			array(
				'label'       => esc_html__( 'HTML Tag', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'h1' => esc_html__( 'H1', 'aarambha-kits' ),
					'h2' => esc_html__( 'H2', 'aarambha-kits' ),
					'h3' => esc_html__( 'H3', 'aarambha-kits' ),
					'h4' => esc_html__( 'H4', 'aarambha-kits' ),
					'h5' => esc_html__( 'H5', 'aarambha-kits' ),
					'h6' => esc_html__( 'H6', 'aarambha-kits' ),
				),
				'default'     => 'h3',
				'label_block' => false,
			)
		);

		// Content Structure
		$this->add_control(
			'content_structure_heading',
			array(
				'label'       => esc_html__( 'Content Structure', 'aarambha-kits' ),
				'type'        => Controls_Manager::HEADING,
				'separator'   => 'before',
				'label_block' => false,
			)
		);

		// Content Structure
		$repeater = new Repeater();

		// Element
		$repeater->add_control(
			'element',
			array(
				'label'   => esc_html__( 'Element', 'aarambha-kits' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'Title'      => esc_html__( 'Title', 'aarambha-kits' ),
					'Meta'       => esc_html__( 'Meta', 'aarambha-kits' ),
					'Categories' => esc_html__( 'Categories', 'aarambha-kits' ),
					'Excerpt'    => esc_html__( 'Excerpt', 'aarambha-kits' ),
				),
				'default' => 'title',
			)
		);

		// Content Structure
		$this->add_control(
			'content_elements',
			array(
				'label'       => esc_html__( 'Element Order', 'aarambha-kits' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'element' => 'Categories',
					),
					array(
						'element' => 'Title',
					),
					array(
						'element' => 'Meta',
					),
				),
				'title_field' => '{{{ element }}}',
			)
		);

		// Post Meta
		$this->add_control(
			'meta_heading',
			array(
				'label'       => esc_html__( 'Meta', 'aarambha-kits' ),
				'type'        => Controls_Manager::HEADING,
				'separator'   => 'before',
				'label_block' => false,
			)
		);

		// Author Enable
		$this->add_control(
			'meta_author_enable',
			array(
				'label'        => esc_html__( 'Author', 'aarambha-kits' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
				'label_block'  => false,
			)
		);

		// Date Enable
		$this->add_control(
			'meta_date_enable',
			array(
				'label'        => esc_html__( 'Date', 'aarambha-kits' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
				'label_block'  => false,
			)
		);

		// Comments Enable
		$this->add_control(
			'meta_comments_enable',
			array(
				'label'        => esc_html__( 'Comments', 'aarambha-kits' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
				'label_block'  => false,
			)
		);

		// Post Views Enable
		$this->add_control(
			'meta_post_views_enable',
			array(
				'label'        => esc_html__( 'Post Views', 'aarambha-kits' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
				'label_block'  => false,
			)
		);

		// Read Time
		$this->add_control(
			'meta_read_time_enable',
			array(
				'label'        => esc_html__( 'Read Time', 'aarambha-kits' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'no',
				'label_block'  => false,
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_content_controls() {
		// Content
		$this->start_controls_section(
			'content_style',
			array(
				'label' => esc_html__( 'Content', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'content_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		// Button Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'        => 'content_background',
				'label'       => esc_html__( 'Background', 'aarambha-kits' ),
				'types'       => array( 'classic', 'gradient' ),
				'exclude'     => array( 'image' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap',
				'label_block' => false,
			)
		);

		// Text Shadow
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'text_shadow',
				'label'    => esc_html__( 'Text Shadow', 'aarambha-kits' ),
				'selector' => '{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap >*',
			)
		);

		// Element Spacing
		$this->add_control(
			'content_heading',
			array(
				'label'       => esc_html__( 'Featured Post', 'aarambha-kits' ),
				'type'        => Controls_Manager::HEADING,
				'separator'   => 'before',
				'label_block' => false,
			)
		);

		// Category
		$this->add_responsive_control(
			'content_cat_spacing',
			array(
				'label'       => esc_html__( 'Category', 'aarambha-kits' ),
				'description' => esc_html__( 'Set bottom spacing.', 'aarambha-kits' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px', '%' ),
				'range'       => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .entry-categories' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Title
		$this->add_responsive_control(
			'content_title_spacing',
			array(
				'label'       => esc_html__( 'Title', 'aarambha-kits' ),
				'description' => esc_html__( 'Set bottom spacing.', 'aarambha-kits' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px', '%' ),
				'range'       => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .entry-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Meta
		$this->add_responsive_control(
			'content_meta_spacing',
			array(
				'label'       => esc_html__( 'Meta', 'aarambha-kits' ),
				'description' => esc_html__( 'Set bottom spacing.', 'aarambha-kits' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px', '%' ),
				'range'       => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Excerpt
		$this->add_responsive_control(
			'content_excerpt_spacing',
			array(
				'label'       => esc_html__( 'Excerpt', 'aarambha-kits' ),
				'description' => esc_html__( 'Set bottom spacing.', 'aarambha-kits' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px', '%' ),
				'range'       => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .entry-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function __init_style_image_controls() {
		// Ttitle
		$this->start_controls_section(
			'image_style',
			array(
				'label' => esc_html__( 'Image', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		// Width
		$this->add_responsive_control(
			'image_width',
			array(
				'label'       => esc_html__( 'Width', 'aarambha-kits' ),
				'description' => esc_html__( 'Set list view featured image width.', 'aarambha-kits' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px', '%' ),
				'range'       => array(
					'px' => array(
						'min'  => 100,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .column-2 .blog-post-list .aarambha-kits-posts-wrapper .post-thumbnail-wrap' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-list .aarambha-kits-posts-wrapper .post-thumbnail-wrap' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .column-2 .blog-post-list .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap' => 'width: calc(100% - {{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-list .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap' => 'width: calc(100% - {{SIZE}}{{UNIT}});',
				),
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_categories_controls() {
		// Ttitle
		$this->start_controls_section(
			'categories_style',
			array(
				'label' => esc_html__( 'Categories', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'categories_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-categories >*' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		// Font Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'categories_typography',
				'exclude'  => array( 'font_size' ),
				'selector' => '{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-categories >*',
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'cat_font_size_tab_start' );

		// Tab
		$this->start_controls_tab(
			'cat_font_size_featured_tab',
			array(
				'label' => esc_html__( 'FEATURED POST', 'aarambha-kits' ),
			)
		);

		// Font Size
		$this->add_responsive_control(
			'fetured_cat_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'aarambha-kits' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem', 'vw' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .entry-categories >*' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		// Tab
		$this->start_controls_tab(
			'cat_font_size_list_tab',
			array(
				'label' => esc_html__( 'LIST POST', 'aarambha-kits' ),
			)
		);

		// Font Size
		$this->add_responsive_control(
			'list_cat_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'aarambha-kits' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem', 'vw' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-list .aarambha-kits-post-detail-wrap .entry-categories >*' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

		// Separator
		$this->add_control(
			'cat_hr_one',
			array(
				'type' => Controls_Manager::DIVIDER,
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'categories_tab_start' );

		// Normal Tab
		$this->start_controls_tab(
			'categories_normal_tab',
			array(
				'label' => esc_html__( 'NORMAL', 'aarambha-kits' ),
			)
		);

		// Font Color
		$this->add_control(
			'categories_font_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-categories >*' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'categories_hover_tab',
			array(
				'label' => esc_html__( 'HOVER', 'aarambha-kits' ),
			)
		);

		// Font Color
		$this->add_control(
			'categories_hover_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-categories >*:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

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

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'exclude'  => array( 'font_size' ),
				'selector' => '{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-title',
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'title_font_size_tab_start' );

		// Tab
		$this->start_controls_tab(
			'title_font_size_featured_tab',
			array(
				'label' => esc_html__( 'FEATURED POST', 'aarambha-kits' ),
			)
		);

		// Font Size
		$this->add_responsive_control(
			'fetured_title_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'aarambha-kits' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem', 'vw' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .entry-title a' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		// Tab
		$this->start_controls_tab(
			'title_font_size_list_tab',
			array(
				'label' => esc_html__( 'LIST POST', 'aarambha-kits' ),
			)
		);

		// Font Size
		$this->add_responsive_control(
			'list_title_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'aarambha-kits' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem', 'vw' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-list .aarambha-kits-post-detail-wrap .entry-title a' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

		 // Separator
		$this->add_control(
			'title_hr_one',
			array(
				'type' => Controls_Manager::DIVIDER,
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'title_tab_start' );

		// Normal Tab
		$this->start_controls_tab(
			'title_normal_tab',
			array(
				'label' => esc_html__( 'NORMAL', 'aarambha-kits' ),
			)
		);

		// Title Color
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-title a' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'title_hover_tab',
			array(
				'label' => esc_html__( 'HOVER', 'aarambha-kits' ),
			)
		);

		// Title Color
		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-title a:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

		$this->end_controls_section();

	}
	protected function __init_style_excerpt_controls() {
		// Ttitle
		$this->start_controls_section(
			'excerpt_style',
			array(
				'label' => esc_html__( 'Excerpt', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Excerpt Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-excerpt',
			)
		);

		// Font Color
		$this->add_control(
			'excerpt_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .entry-excerpt p' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

		$this->end_controls_section();

	}
	protected function __init_style_meta_controls() {
		// Ttitle
		$this->start_controls_section(
			'meta_style',
			array(
				'label' => esc_html__( 'Meta', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'meta_typography',
				'exclude'  => array( 'font_size' ),
				'selector' => '{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta >*',
			)
		);

		// Font Size
		$this->add_responsive_control(
			'fetured_meta_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'aarambha-kits' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem', 'vw' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta >*' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .blog-post-large .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta .byline img' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'meta_tab_start' );

		// Normal Tab
		$this->start_controls_tab(
			'meta_normal_tab',
			array(
				'label' => esc_html__( 'NORMAL', 'aarambha-kits' ),
			)
		);

		// Font Color
		$this->add_control(
			'meta_font_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta *' => 'color: {{VALUE}}',
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-entry-meta > div::before' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'meta_hover_tab',
			array(
				'label' => esc_html__( 'HOVER', 'aarambha-kits' ),
			)
		);

		// Font Color
		$this->add_control(
			'meta_hover_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta a:hover span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .aarambha-kits-block-posts-4-container .aarambha-kits-posts-wrapper .aarambha-kits-post-detail-wrap .aarambha-kits-entry-meta a:hover time' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

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
		$settings          = $this->get_settings_for_display();
		$original_elements = map_deep( wp_unslash( $settings['content_elements'] ), 'sanitize_text_field' );
		$removed_elements  = aarambha_kits_remove_element( $original_elements, 'element', array( 'Meta', 'Excerpt' ) );
		$args              = aarambha_kits_query_agrs( $settings, 1 );
		$the_query         = new WP_Query( $args );

		// Posts Layout 4 container
		$this->add_render_attribute( 'posts_layout_4_container', 'class', 'aarambha-kits-container aarambha-kits-block-posts-4-container' );

		// Posts Columns Wrapper
		$this->add_render_attribute( 'posts_layout_4_columns_wrapper', 'class', 'columns aarambha-kits-columns-wrapper' );
		$this->add_render_attribute( 'posts_layout_4_columns_wrapper', 'data-columns', 1 );
		$this->add_render_attribute( 'posts_layout_4_columns_wrapper', 'data-columns-md', 1 );
		$this->add_render_attribute( 'posts_layout_4_columns_wrapper', 'data-columns-lg', 1 );
		?>
		<div <?php $this->print_render_attribute_string( 'posts_layout_4_container' ); ?>>
			
		<?php
		if ( $the_query->have_posts() ) :
			$counter = 1;
			?>
			
			<div <?php $this->print_render_attribute_string( 'posts_layout_4_columns_wrapper' ); ?>>

				<div class="column">
				
				<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					$class_outer = ( $counter == 1 ) ? 'blog-post-large' : 'blog-post-list';
					$elements    = ( $counter == 1 ) ? $original_elements : $removed_elements;
					$image_size  = sanitize_text_field( $settings['image_size'] );
					?>
					
					<div class="<?php echo esc_attr( $class_outer ); ?>">
						<div class="aarambha-kits-posts-wrapper">

							<div class="post-thumbnail-wrap">

								<?php aarambha_kits_post_thumbnail( $image_size, '4x3' ); ?>

							</div><!-- .post-thumbnail-wrap -->

							<?php if ( ! empty( $elements ) ) { ?>

								<div class="aarambha-kits-post-detail-wrap">
									<?php
									foreach ( $elements as $key => $value ) {
										echo '<div class="element-order order-' . esc_attr( $key ) . ' element-' . esc_attr( strtolower( $value['element'] ) ) . ' elementor-repeater-item-' . esc_attr( $value['_id'] ) . '">';
										// Post Title
										if ( $value['element'] === 'Title' ) {
											printf( '<%1$s class="entry-title"><a href="%2$s" rel="bookmark">%3$s</a></%1$s>',
												Utils::validate_html_tag( $settings['title_html_tag'] ),
												esc_url( get_permalink() ),
												esc_html( get_the_title() )
											);
										}
										// Post Meta
										elseif ( $value['element'] == 'Meta' ) {
											$post_meta = array();
											// Author enable
											if ( $settings['meta_author_enable'] === 'yes' ) {
												$post_meta[1]['type'] = 'author';
											}
											// Date enable
											if ( $settings['meta_date_enable'] === 'yes' ) {
												$post_meta[2]['type'] = 'date';
											}
											// Comment enable
											if ( $settings['meta_comments_enable'] === 'yes' ) {
												$post_meta[3]['type'] = 'comment';
											}
											// Post Views enable
											if ( $settings['meta_post_views_enable'] === 'yes' ) {
												$post_meta[4]['type'] = 'post-views';
											}
											// Comment enable
											if ( $settings['meta_read_time_enable'] === 'yes' ) {
												$post_meta[5]['type'] = 'read-time';
											}
											aarambha_kits_post_meta( $post_meta );

										}
										// Post Categories
										elseif ( $value['element'] == 'Categories' ) {
											aarambha_kits_post_category();
										}
										// Post Excerpt
										elseif ( $value['element'] == 'Excerpt' ) {
											echo '<div class="entry-excerpt">';
											aarambha_kits_content_limit( 100, 'characters', '...' );
											echo '</div><!-- .entry-excerpt -->';
										}

										echo '</div><!-- .element-order -->';
									}
									?>
								</div><!-- .aarambha-kits-post-detail-wrap -->

							<?php } ?>

						</div><!-- .aarambha-kits-posts-wrapper -->
					</div>

					<?php
					if ( $counter == 1 ) {
						echo '</div><!-- .column --><div class="column">'; }
					?>

					<?php
					$counter++;
				endwhile;
				?>

				</div><!-- .column -->

			</div><!-- .aarambha-kits-columns-wrapper -->

			<?php wp_reset_postdata(); ?>
				
			<?php endif; ?>

		</div><!-- .aarambha-kits-container -->
		
		<?php
	}
}
