<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use AIEA_Elementor_Addons\Helper\Post_Helper as AIEA_Post_Helper;

/**
 * AI Addons Posts Widget
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Posts_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Posts widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-posts';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Posts widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Posts', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Posts widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('posts');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Posts widget belongs to.
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
		return [ 'slick', 'infinite-scroll', 'imagesloaded', 'isotope', 'ai-front-end' ];
	}
	
	public function get_style_depends() {
		return [ 'slick' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/post-demo/';
    }

	/**
	 * Register Posts widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
			
		//get authors
		$authors = AIEA_Post_Helper::aiea_get_authors();
		
		//get categories
		$categories = AIEA_Post_Helper::aiea_get_categories();
		
		//get tags
		$tags = AIEA_Post_Helper::aiea_get_tags();
		
		//get post titles
		$post_titles = AIEA_Post_Helper::aiea_get_post_titles();
		
		//orderby options
		$order_by = AIEA_Post_Helper::aiea_get_post_orderby_options();
		
		//Layout Section
		$this->start_controls_section(
			'layout_section',
			[
				'label'	=> esc_html__( 'Layout', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'blog_layout',
			[
				'label' => esc_html__( 'Layout', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'default',
				'options' => [
					'default' => [
						'title' => esc_html__( 'Default', 'ai-addons' ),
						'icon' => 'eicon-posts-grid',
					],
					'list' => [
						'title' => esc_html__( 'List', 'ai-addons' ),
						'icon' => 'eicon-post-list',
					]
				]
			]
		);
		$this->add_control(
			'slide_opt',
			[
				'label' 		=> esc_html__( 'Slide', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'blog_cols',
			[
				'type'			=> Controls_Manager::SELECT,
				'label'			=> esc_html__( 'Columns', 'ai-addons' ),
				'default'		=> '50',
				'options'		=> [
					'25'			=> esc_html__( '4', 'ai-addons' ),
					'33'			=> esc_html__( '3', 'ai-addons' ),
					'50'			=> esc_html__( '2', 'ai-addons' ),
					'100'		=> esc_html__( '1', 'ai-addons' )
				],
				'condition' 	=> [
					'slide_opt!' => 'yes'
				],
			]
		);		
		$this->add_control(
			'blog_pagination',
			[
				'label' 		=> esc_html__( 'Post Pagination', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
				'condition' 	=> [
					'slide_opt!' => 'yes'
				],
			]
		);
		
		$this->add_control(
			'section_meta_enabled',
			[
				'label' => esc_html__( 'Meta Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_thumb_enabled',
			[
				'label' => esc_html__( 'Thumb Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_title_enabled',
			[
				'label' => esc_html__( 'Title Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		
		$this->add_control(
			'post_items',
			[
				'label'				=> 'Post Items',
				'type'				=> 'drag-n-drop',
				'drag_items' 			=> [ 
					'visible' 		=> [ 
						'thumb'			=> esc_html__( 'Image', 'ai-addons' ),
						'title'			=> esc_html__( 'Title', 'ai-addons' ),
						'excerpt'		=> esc_html__( 'Excerpt', 'ai-addons' )
					],
					'disabled'		=> [
						'more'	=> esc_html__( 'Read More', 'ai-addons' ),
						'meta'		=> esc_html__( 'Meta', 'ai-addons' ),
						'category'		=> esc_html__( 'Category', 'ai-addons' ),
						'author'		=> esc_html__( 'Author', 'ai-addons' )
					]
				],
				'triggers' => array(
					'meta' => 'section_meta_enabled',
					'thumb' => 'section_thumb_enabled',
					'title' => 'section_title_enabled',
				),
			]
		);
		$this->add_control(
			'overlay_title_opt',
			[
				'label' 		=> esc_html__( 'Post Overlay Title', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
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
				'selectors' => [
					'{{WRAPPER}} .ai-post-list .inc-media-body, {{WRAPPER}} .ai-post-default .blog-inner' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'blog_masonry',
			[
				'label' 		=> esc_html__( 'Post Masonry', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
				'condition' 	=> [
					'blog_layout' 		=> 'default',
					'slide_opt!' => 'yes'
				]
			]
		);
		$this->end_controls_section();
		
		//Slide Section
		$this->start_controls_section(
			'slide_section',
			[
				'label'			=> esc_html__( 'Slide', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'slide_opt' => 'yes'
				],
			]
		);		
		$this->add_control(
			'slide_item',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( '# of slides', 'ai-addons' ),
				'min' => 1,
				'step' => 1,
				'default' => 2,
			]
		);
		$this->add_control(
			'slide_item_tab',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( '# of slides in Tablet', 'ai-addons' ),
				'min' => 1,
				'step' => 1,
				'default' => 2,
			]
		);
		$this->add_control(
			'slide_item_mobile',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( '# of slides in Mobile', 'ai-addons' ),
				'min' => 1,
				'step' => 1,
				'default' => 1,
			]
		);
		$this->add_control(
			'slide_item_autoplay',
			[
				'label' 		=> esc_html__( 'Auto play', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_item_loop',
			[
				'label' 		=> esc_html__( 'Loop slide', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_center',
			[
				'label' 		=> esc_html__( 'Center mode', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_nav',
			[
				'label' 		=> esc_html__( 'Arrows', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_adaptive_height',
			[
				'label' 		=> esc_html__( 'Adaptive height', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_dots',
			[
				'label' 		=> esc_html__( 'Dots', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'autoplay_speed',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Autoplay speed', 'ai-addons' ),
				'min' => 100,
				'step' => 100,
				'default' => 5000,
			]
		);
		$this->add_control(
			'animation_speed',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Moving speed', 'ai-addons' ),
				'min' => 100,
				'step' => 100,
				'default' => 250,
			]
		);
		$this->add_control(
			'slide_to_scroll',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Slide to scroll', 'ai-addons' ),
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 1,
			]
		);
		$this->end_controls_section(); 
		
		
		//Masonry Section
		$this->start_controls_section(
			'masonry_section',
			[
				'label'			=> esc_html__( 'Masonry', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'blog_layout!' 		=> 'list',
					'blog_masonry' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'masonry_layout',
			[
				'label'			=> esc_html__( 'Masonry Layout', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'masonry',
				'options'		=> [
					'masonry'		=> esc_html__( 'Masonry', 'ai-addons' ),
					'fitRows'		=> esc_html__( 'Fit Rows', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'gutter',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Post Masonry Gutter', 'ai-addons' ),
				'default' 		=> '10'
			]
		);
		$this->add_control(
			'animate_items',
			[
				'label' 		=> esc_html__( 'Animation', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'condition' 	=> [
					'slide_opt!' => 'yes'
				],
			]
		);
		$this->add_control(
			'animate_type',
			[
				'label' => __( 'Animate Type', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'aiFadeInUp',
				'options' => [
					'aiFadeInUp'	=> __( 'Default', 'ai-addons' ),
					'fadeIn' 			=> __( 'Fade In', 'ai-addons' ),
					'fadeInUp' 			=> __( 'Fade In Up', 'ai-addons' ),
					'fadeInLeft' 		=> __( 'Fade In Left', 'ai-addons' ),
					'fadeInRight' 		=> __( 'Fade In Right', 'ai-addons' ),
					'zoomIn' 			=> __( 'Zoom In', 'ai-addons' ),
					'rollIn' 			=> __( 'Roll In', 'ai-addons' ),
					'rotateIn' 			=> __( 'Rotate In', 'ai-addons' ),
				],
				'condition' 	=> [
					'animate_items' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .isotope-item.run-animate' => 'transition: all ease 0.35s; opacity: 1; visibility: visible; animation-duration: 0.7s; animation-name: {{VALUE}};',
				]
			]
		);	
		$this->add_control(
			'isotope_filter',
			[
				'label'			=> esc_html__( 'Isotope Filter', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'filter_all',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Filter All Text', 'ai-addons' ),
				'default' 		=> esc_html__( 'All', 'ai-addons' ),
				'condition' 	=> [
					'isotope_filter' 		=> 'yes'
				]
			]
		);
		
		$this->add_control(
			'blog_infinite',
			[
				'label'			=> esc_html__( 'Infinite', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'loading_end',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Ending Message', 'ai-addons' ),
				'default' 		=> esc_html__( 'End of the content.', 'ai-addons' ),
				'condition' 	=> [
					'blog_infinite' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'loading_img',
			[
				'label' => esc_html__( 'Infinite Loader', 'ai-addons' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				'condition' 	=> [
					'blog_infinite' 		=> 'yes'
				]
			]
		);	
		$this->end_controls_section();
		
		//Filter Section
		$this->start_controls_section(
			'filter_section',
			[
				'label'	=> esc_html__( 'Filter', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_control(
			'include_author',
			[
				'label' 		=> esc_html__( 'Author', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $authors,
				'default' 		=> '',
			]
		);		
		$this->add_control(
			'include_cats',
			[
				'label' 		=> esc_html__( 'Categories', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $categories,
				'default' 		=> ''
			]
		);
		$this->add_control(
			'exclude_cats',
			[
				'label' 		=> esc_html__( 'Exclude Categories', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $categories,
				'default' 		=> ''
			]
		);
		$this->add_control(
			'include_tags',
			[
				'label' 		=> esc_html__( 'Tags', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $tags,
				'default' 		=> ''
			]
		);
		$this->add_control(
			'include_posts',
			[
				'label' 		=> esc_html__( 'Include', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $post_titles,
				'default' 		=> '',
			]
		);
		$this->add_control(
			'exclude_posts',
			[
				'label' 		=> esc_html__( 'Exclude', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT2,
				'multiple'	 	=> true,
				'label_block'	=> true,
				'options' 		=> $post_titles,
				'default' 		=> '',
			]
		);
		$this->add_control(
			'post_per_page',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Post Per Page', 'ai-addons' ),
				'default' 		=> '10',
				'placeholder'	=> '10'
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' 		=> esc_html__( 'Order By', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' 		=> $order_by,
				'default' 		=> 'none',
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> esc_html__( 'Order', 'ai-addons' ),
				'type' 			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending',
                ],
				'default' 		=> 'desc',
			]
		);
		$this->add_control(
			'excerpt_length',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Content Excerpt Length', 'ai-addons' ),
				'default' 		=> '15'
			]
		);
		$this->add_control(
			'title_length',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Title Excerpt Length', 'ai-addons' ),
				'default' 		=> '50'
			]
		);
		$this->end_controls_section();
				
		//Meta Section
		$this->start_controls_section(
			'meat_section',
			[
				'label'			=> esc_html__( 'Meta', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'meta_items',
			[
				'label'			=> 'Post Meta',
				'type'			=> 'drag-n-drop',
				'drag_items'		=> [ 
					esc_html__( 'Left', 'ai-addons' ) => [
						'category'	=> esc_html__( 'Category', 'ai-addons' ),
					],
					esc_html__( 'Right', 'ai-addons' ) => [
						'author'	=> esc_html__( 'Author', 'ai-addons' ),
					],
					esc_html__( 'disabled', 'ai-addons' ) => [						
						'more'	=> esc_html__( 'Read More', 'ai-addons' ),
						'date'	=> esc_html__( 'Date', 'ai-addons' ),
						'comment'	=> esc_html__( 'Comment', 'ai-addons' )
					]
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
			]
		);
		$this->add_control(
			'post_heading',
			[
				'label'			=> esc_html__( 'Post Heading Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h3',
				'options'		=> [
					'h1'		=> esc_html__( 'h1', 'ai-addons' ),
					'h2'		=> esc_html__( 'h2', 'ai-addons' ),
					'h3'		=> esc_html__( 'h3', 'ai-addons' ),
					'h4'		=> esc_html__( 'h4', 'ai-addons' ),
					'h5'		=> esc_html__( 'h5', 'ai-addons' ),
					'h6'		=> esc_html__( 'h6', 'ai-addons' ),
				]
			]
		);
		$this->end_controls_section();
		
		//Image Section
		$this->start_controls_section(
			'image_section',
			[
				'label'			=> esc_html__( 'Image', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
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
		
		// Link Section
		$this->start_controls_section(
			'section_link',
			[
				'label' => esc_html__( 'Links', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB,
			]
		);
		$this->add_control(
			'more_text',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Read More Text', 'ai-addons' ),
				'default' 		=> esc_html__( 'Read More', 'ai-addons' )
			]
		);
		$this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Image', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'image_target',
			[
				'label' 		=> esc_html__( 'Target Blank', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'image_nofollow',
			[
				'label' 		=> esc_html__( 'No Follow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'title_link',
			[
				'label' => esc_html__( 'Title', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_target',
			[
				'label' 		=> esc_html__( 'Target Blank', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'title_nofollow',
			[
				'label' 		=> esc_html__( 'No Follow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'more_link',
			[
				'label' => esc_html__( 'Read More', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'more_target',
			[
				'label' 		=> esc_html__( 'Target Blank', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'more_nofollow',
			[
				'label' 		=> esc_html__( 'No Follow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
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
		
		// Style Post Section
		$this->start_controls_section(
			'section_style_post_general',
			[
				'label' => esc_html__( 'Post General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'tabs_post_style' );
		$this->start_controls_tab(
			'tab_post_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'post_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-inner' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_bg_color',
			[
				'label' => esc_html__( 'Background', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-inner' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'post_shadow',
				'selector' => '{{WRAPPER}} .blog-inner',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_post_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'post_hcolor',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-inner:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'post_bg_hcolor',
			[
				'label' => esc_html__( 'Background', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-inner:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'post_hshadow',
				'selector' => '{{WRAPPER}} .blog-inner:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		// Style Post List Section
		$this->start_controls_section(
			'section_style_post_list',
			[
				'label' => esc_html__( 'Post List', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_responsive_control(
			'list_spacing',
			[
				'label' => esc_html__( 'List Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-post-list .inc-media .post-thumb' => is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'list_label',
			[
				'label' => esc_html__( 'List Outer Settings', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'list_inner_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-post-list .blog-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		$this->add_responsive_control(
			'list_inner_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-post-list .inc-media-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		
		// Style Post Grid Section
		$this->start_controls_section(
			'section_style_post_grid',
			[
				'label' => esc_html__( 'Post Grid', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'post_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-post-default .blog-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'post_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-post-default .blog-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		
		// Style Title Section
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_text_trans',
			[
				'label'			=> esc_html__( 'Title Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .post-title-head .post-title' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->start_controls_tabs( 'tabs_title_style' );
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-title-head .post-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_scale',
			[
				'label' => esc_html__( 'Scale', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-title-head' => 'transform: scale({{SIZE}});'
				],
			]
		);	
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);		
		$this->add_control(
			'title_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-inner:hover .post-title-head .post-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_hscale',
			[
				'label' => esc_html__( 'Scale', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .blog-inner:hover .post-title-head' => 'transform: scale({{SIZE}});'
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
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-title-head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-title-head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .post-title-head'
			]
		);		
		$this->end_controls_section();
		
		// Style Link Section
		$this->start_controls_section(
			'section_style_link',
			[
				'label' => esc_html__( 'Links', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'post_links',
			[
				'label' => esc_html__( 'Default Post Links', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_link_style' );
		$this->start_controls_tab(
			'tab_link_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_link_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);		
		$this->add_control(
			'link_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a:hover' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'post_tmetalinks',
			[
				'label' => esc_html__( 'Top Meta Links', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_tmetalink_style' );
		$this->start_controls_tab(
			'tab_tmetalink_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'tmetalink_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_tmetalink_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);		
		$this->add_control(
			'tmetalink_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-meta a:hover' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'post_bmetalinks',
			[
				'label' => esc_html__( 'Bottom Meta Links', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_bmetalink_style' );
		$this->start_controls_tab(
			'tab_bmetalink_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'bmetalink_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bottom-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_bmetalink_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);		
		$this->add_control(
			'bmetalink_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bottom-meta a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .blog-inner:hover .bottom-meta a' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'post_ometalinks',
			[
				'label' => esc_html__( 'Overlay Links', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_ometalink_style' );
		$this->start_controls_tab(
			'tab_ometalink_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'ometalink_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_ometalink_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);		
		$this->add_control(
			'ometalink_hcolor',
			[
				'label' => esc_html__( 'Hover Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items a:hover' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		// Style Image Section
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Image', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
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
				'label' 		=> esc_html__( 'Resize Option', 'ai-addons' ),
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
					'{{WRAPPER}} .post-thumb > a > img' => 'width: {{SIZE}}%; max-width: {{SIZE}}%;'
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
					'{{WRAPPER}} .post-thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
			]
		);	
		$this->add_control(
			'img_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-thumb > a > img' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'img_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .post-thumb > a > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'img_border',
					'label' => esc_html__( 'Border', 'ai-addons' ),
					'selector' => '{{WRAPPER}} .post-thumb > a > img'
				]
		);
		$this->end_controls_section();
		
		// Style Button Section
		$this->start_controls_section(
			'button_section_style',
			[
				'label' => esc_html__( 'Button', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .read-more',
			]
		);
		$this->add_control(
			'btn_text_trans',
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
					'{{WRAPPER}} .read-more' => 'text-transform: {{VALUE}};'
				],
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
					'{{WRAPPER}} .read-more' => 'fill: {{VALUE}}; color: {{VALUE}};',
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
					'{{WRAPPER}} .read-more' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .read-more:hover, {{WRAPPER}} .read-more:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .read-more:hover svg, {{WRAPPER}} .read-more:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .read-more:hover, {{WRAPPER}} .read-more:focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .read-more:hover, {{WRAPPER}} .read-more:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .read-more',
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
					'{{WRAPPER}} .read-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .read-more',
			]
		);
		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'selector' 		=> '{{WRAPPER}} .read-more'
			]
		);
		$this->end_controls_section();	
		
		// Style Meta Section
		$this->start_controls_section(
			'section_style_meta',
			[
				'label' => esc_html__( 'Meta', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_control(
			'meta_style',
			[
				'label' => esc_html__( 'Meta', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'meta_typography',
				'selector' 		=> '{{WRAPPER}} .post-meta'
			]
		);	
		$this->add_responsive_control(
			'meta_spacing',
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
					'{{WRAPPER}} .post-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .post-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		// Style Content Section
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__( 'Content', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->start_controls_tabs( 'tabs_content_style' );
		$this->start_controls_tab(
			'tab_content_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-inner .post-excerpt' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_content_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'content_hcolor',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-inner:hover .post-excerpt' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'content_typography',
				'selector' 		=> '{{WRAPPER}} .post-excerpt'
			]
		);	
		$this->add_responsive_control(
			'content_spacing',
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
					'{{WRAPPER}} .post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		// Style Overlay Section
		$this->start_controls_section(
			'section_style_overlay',
			[
				'label' => esc_html__( 'Overlay', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'ovelay_typography',
				'selector' 		=> '{{WRAPPER}} .post-overlay-items'
			]
		);	
		$this->add_responsive_control(
			'overlay_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-overlay-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'overlay_position_top',
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
					'{{WRAPPER}} .post-overlay-items' => 'position: absolute; top: {{SIZE}}%;',
				],
			]
		);
		$this->add_responsive_control(
			'overlay_position_left',
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
					'{{WRAPPER}} .post-overlay-items' => 'left: {{SIZE}}%;',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_overlay_style' );
		$this->start_controls_tab(
			'tab_overlay_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'overlay_bg_color',
			[
				'label' => esc_html__( 'Background', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-thumb.post-overlay-active:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_overlay_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'overlay_bg_hcolor',
			[
				'label' => esc_html__( 'Background', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-thumb.post-overlay-active:hover:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();	

	}

	/**
	 * Render Posts widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		extract( $settings );
		
		$blog_layout = isset( $blog_layout ) && $blog_layout != '' ? $blog_layout : 'default';
		$slide_opt = isset( $slide_opt ) && $slide_opt == 'yes' ? true : false;
		$blog_masonry = isset( $blog_masonry ) && $blog_masonry == 'yes' ? true : false;
		
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-blog-elementor-widget blog-wrapper' );
		$parent_class = isset( $blog_layout ) ? 'ai-post-' . $blog_layout : ' ai-post-grid';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		if( !$blog_masonry && !$slide_opt ){
			$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'blog-normal-model' );
		}elseif( $slide_opt ) {
			$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'blog-slide-model' );
		}elseif( $blog_masonry ){
			$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'blog-isotope-model' );
		}		
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		$output = '';

		//Defined Variable
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 10;
		$this->excerpt_len = $excerpt_length;
		
		$post_type = isset( $post_type ) ? $post_type : '';
		$include_cats = isset( $include_cats ) ? $include_cats : '';
		$exclude_cats = isset( $exclude_cats ) ? $exclude_cats : '';
		$include_tags = isset( $include_tags ) ? $include_tags : '';
		$include_author = isset( $include_author ) ? $include_author : '';
		$include_posts = isset( $include_posts ) ? $include_posts : '';
		$exclude_posts = isset( $exclude_posts ) ? $exclude_posts : '';
		$orderby = isset( $orderby ) ? $orderby : '';
		$order = isset( $order ) ? $order : '';
		
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$blog_pagination = isset( $blog_pagination ) && $blog_pagination == 'yes' ? true : false;
		$blog_masonry = isset( $blog_masonry ) && $blog_masonry == 'yes' ? true : false;
		$masonry_layout = isset( $masonry_layout ) && $masonry_layout != '' ? $masonry_layout : 'masonry';
		$blog_infinite = isset( $blog_infinite ) && $blog_infinite == 'yes' ? true : false;
		$gutter = isset( $gutter ) && $gutter != '' ? $gutter : 20;
		$slide_opt = isset( $slide_opt ) && $slide_opt == 'yes' ? true : false;
		$isotope_filter = isset( $isotope_filter ) && $isotope_filter == 'yes' ? true : false;
		$filter_all = isset( $filter_all ) && $filter_all != '' ? $filter_all : esc_html__( "All", 'ai-addons' );
		$post_heading = isset( $post_heading ) && $post_heading != '' ? $post_heading : 'h3';
		
		$data_atts = '';
		if( $slide_opt ){
			$slide_options = array( 'slide_item', 'slide_item_tab', 'slide_item_mobile', 'slide_item_autoplay', 'slide_item_loop', 'slide_center', 'slide_nav', 'slide_dots', 'autoplay_speed', 'animation_speed', 'slide_to_show', 'slide_to_scroll' );
			$slide_arr = array();
			foreach( $slide_options as $slide_option ) {
				$slide_arr[$slide_option] = isset( $settings[$slide_option] ) ? $settings[$slide_option] : '';
			}
			$data_atts = ' data-slide-atts="'. htmlspecialchars( json_encode( $slide_arr ), ENT_QUOTES, 'UTF-8' ) .'"';
		}

		$thumb_size = $settings[ 'thumbnail_size' ];
		$image_sizes = get_intermediate_image_sizes();
		
		$this->add_render_attribute( 'image-link', 'class', 'post-image-link' );
		if( isset( $image_target ) && $image_target == 'yes' ) $this->add_render_attribute( 'image-link', 'target', '_blank' );
		if( isset( $image_nofollow ) && $image_nofollow == 'yes' ) $this->add_render_attribute( 'image-link', 'rel', 'nofollow' );
		
		$this->add_render_attribute( 'title-link', 'class', 'post-title' );
		if( isset( $title_target ) && $title_target == 'yes' ) $this->add_render_attribute( 'title-link', 'target', '_blank' );
		if( isset( $title_nofollow ) && $title_nofollow == 'yes' ) $this->add_render_attribute( 'title-link', 'rel', 'nofollow' );
		
		$this->add_render_attribute( 'more-link', 'class', 'read-more elementor-button' );
		if( isset( $more_target ) && $more_target == 'yes' ) $this->add_render_attribute( 'more-link', 'target', '_blank' );
		if( isset( $more_nofollow ) && $more_nofollow == 'yes' ) $this->add_render_attribute( 'more-link', 'rel', 'nofollow' );

		$default_items = array( 
			"thumb"			=> esc_html__( "Feature Image", 'ai-addons' ),
			"title"			=> esc_html__( "Title", 'ai-addons' ),
			"excerpt"		=> esc_html__( "Excerpt", 'ai-addons' )
		);
		$elemetns = isset( $post_items ) && !empty( $post_items ) ? json_decode( $post_items, true ) : array( 'visible' => $default_items );
		$meta_items = isset( $meta_items ) && $meta_items != '' ? $meta_items : '{"Left":{"category":"Category"},"Right":{"author":"Author"}}';

		$cols = isset( $blog_cols ) ? $blog_cols : 50;
		$col_class = "elementor-column elementor-col-". absint( $cols );
		
		$list_layout = isset( $blog_layout ) && $blog_layout == 'list' ? 1 : 0;
				
		$filter_catoutput = '';
		if( $isotope_filter && !empty( $include_cats ) ){
			foreach( $include_cats as $index => $cat ){
				if( term_exists( absint( $cat ), 'category' ) ){
					$cat_term = get_term_by( 'id', absint( $cat ), 'category' );	
					if( isset( $cat_term->term_id ) ){
						$filter_catoutput .=  '<li><a href="#" class="isotope-filter-item" data-filter=".filter-cat-'. esc_attr( $cat ) .'">'. esc_html( $cat_term->name ) .'</a></li>';	
					}
				}
			}
		}
		
		//Query Start
		global $wp_query;
		$paged = 1;
		if( get_query_var('paged') ){
			$paged = get_query_var('paged');
		}elseif( get_query_var('page') ){
			$paged = get_query_var('page');
		}
		
		$ppp = $post_per_page != '' ? $post_per_page : 2;
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => absint( $ppp ),
			'paged' => $paged,
			'ignore_sticky_posts' => 1			
		);
		
		//Include Author
		if( !empty( $include_author ) ){
			$args['author__in'] = $include_author;
		}
		
		//Include Category
		if( !empty( $include_cats ) ){
			$args['category__in'] = $include_cats;
		}
		
		//Exclude Category
		if( !empty( $exclude_cats ) ){
			$args['category__not_in'] = $exclude_cats;
		}
		
		//Include Tags
		if( !empty( $include_tags ) ){
			$args['tag__in'] = $include_tags;
		}
		
		//Include Posts
		if( !empty( $include_posts ) ){
			$args['post__in'] = $include_posts;
		}
		
		//Exclude Posts
		if( !empty( $exclude_posts ) ){
			$args['post__not_in'] = $exclude_posts;
		}
		
		//Order by
		if( !empty( $orderby ) ){
			$args['orderby'] = $orderby;
		}
		
		//Order
		if( !empty( $order ) ){
			$args['order'] = $order;
		}
		
		$query = new \WP_Query( $args );
			
		if ( $query->have_posts() ) {

			add_filter( 'excerpt_more', [ $this, 'aiea_excerpt_more' ], 99 );
			add_filter( 'excerpt_length', [ $this, 'aiea_excerpt_length' ], 99 );
			
			if( $isotope_filter && $filter_catoutput != '' ) {
				echo '<div class="isotope-filter">';
					echo '<ul class="inc-nav m-auto d-block">' .
						( $filter_all != '' ? '<li class="active"><a href="#" class="isotope-filter-item" data-filter="">'. esc_html( $filter_all ) .'</a></li>' : '' ) .
						$filter_catoutput;
					echo '</ul>';
				echo '</div>';
			}
		
			$row_stat = 0;
			$col_measures = array( '100' => '1', '50' => '2', '33' => '3', '25' => '4' );
						
			if( $slide_opt ) {
				echo '<div class="ai-slider " '. ( $data_atts ) .'>';	
				//$col_class = 'item';
				$this->add_render_attribute( 'post-grid-item', 'class', 'item' );
			} elseif( $blog_masonry ) {

				$loading_end = isset( $loading_end ) && $loading_end != '' ? $loading_end : esc_html__( 'End of content.', 'ai-addons' );				
				
				$masonry_col = $col_measures[$cols];
				echo '<div class="ai-isotope" data-cols="'. esc_attr( $masonry_col ) .'" data-gutter="'. esc_attr( $gutter ) .'" data-layout="'. esc_attr( $masonry_layout ) .'" data-infinite="'. esc_attr( $blog_infinite ) .'">';
				//$col_class = 'isotope-item';
				$this->add_render_attribute( 'post-grid-item', 'class', 'isotope-item' );
				if( isset( $animate_items ) && $animate_items == 'yes' ) {
					wp_enqueue_style( 'ai-animate' );
					$this->add_render_attribute( 'post-grid-item', 'class', 'ai-animate' );
				}
			} else {
				$this->add_render_attribute( 'post-grid-item', 'class', 'elementor-column' );
				$this->add_render_attribute( 'post-grid-item', 'class', 'elementor-col-'. $cols );
			}
			
			// Posts items array
			$blog_array = array(
				'cols' => $cols,
				'post_heading' => $post_heading,
				'more_text' => $more_text,
				'meta_items' => $meta_items,			
				'thumb_size' => $thumb_size,
				'image_sizes' => $image_sizes
			);
			
			if( $list_layout || $blog_layout == 'ai-pro' ){
				if(	isset( $elemetns['visible']['thumb'] ) ) unset( $elemetns['visible']['thumb'] );
			}			
		
			// Start the Loop
			while ( $query->have_posts() ) : $query->the_post();
				
				$post_id = get_the_ID();
				$blog_array['post_id'] = $post_id;
				
				//$cat_class = '';
				if( !$blog_masonry && !$slide_opt ){
					if( $row_stat == 0 ) :
						echo '<div class="elementor-container">';
					endif;
				}elseif( $blog_masonry && $isotope_filter && $filter_catoutput != '' ){
					$terms = get_the_terms( $post_id, 'category' );
					if ( $terms && ! is_wp_error( $terms ) ) :
						foreach ( $terms as $term ) {
							//$cat_class .= ' filter-cat-' . $term->term_id;
							$this->add_render_attribute( 'post-grid-item', 'class', 'filter-cat-' . $term->term_id );
						}
					endif;
				}
				
				//echo '<div class="'. esc_attr( $col_class . $cat_class ) .'">';
				echo '<div '. $this->get_render_attribute_string( 'post-grid-item' ) .'>';
					echo '<div class="blog-inner">';
						
						if( $list_layout ){
							echo '<div class="inc-media">';
								echo ''. $this->aiea_blog_shortcode_elements('thumb', $blog_array, $settings);
								echo '<div class="inc-media-body">';
						}elseif( $blog_layout == 'ai-pro' ){
							echo ''. $this->aiea_blog_shortcode_elements('thumb', $blog_array, $settings);
							echo '<div class="post-details-outer">';
						}

						if( isset( $elemetns['visible'] ) ) :
							foreach( $elemetns['visible'] as $element => $value ){
								echo ''. $this->aiea_blog_shortcode_elements( $element, $blog_array, $settings);
							}
						endif;
						
						if( $list_layout ){
								echo '</div><!-- .inc-media -->';
							echo '</div><!-- .inc-media-body -->';
						}elseif( $blog_layout == 'ai-pro' ){
							echo '</div><!-- .post-details-outer -->';
						}
					echo '</div><!-- .blog-inner -->';
				echo '</div><!-- .col / .slide-item / .isotope -->';
				
				if( !$blog_masonry && !$slide_opt ){
					$row_stat++;
					if( $row_stat == absint( $col_measures[$cols] ) ) :
						echo '</div><!-- .elementor-container -->';
						$row_stat = 0;
					endif;
				}
				
			endwhile;
			
			if( !$blog_masonry && !$slide_opt ){
				if( $row_stat != 0 ){
					echo '</div><!-- unexpected .elementor-container -->'; // Unexpected .elementor-container close
				}
			}elseif( $slide_opt ) {
				echo '</div><!-- .ai-slider -->';
			}elseif( $blog_masonry ){
				echo '</div><!-- .ai-isotope -->';
			}
			
			if( !$slide_opt && ( $blog_infinite || $blog_pagination ) ):
				
				if( $blog_infinite ) {
					$pagination_links = aiea_post_elements()->infinite_pagination_links( $args, $query->max_num_pages );
					$pagination_links_attr = $pagination_links ? ' data-links="'. htmlspecialchars( json_encode( $pagination_links ), ENT_QUOTES, 'UTF-8' ) .'"' : '';
					echo '<div class="page-load-status"'. $pagination_links_attr .'">
						<p class="infinite-scroll-request">';
							$loading_img = isset( $loading_img ) && $loading_img['url'] != '' ? $loading_img['url'] : AIEA_URL . 'assets/images/ajax-loader.gif';
							echo '<img src="'. esc_url( $loading_img ) .'" alt="loader" />';
						echo '</p>
						<p class="infinite-scroll-last">'. esc_html( $loading_end ) .'</p>
					</div>';
				} elseif( $blog_pagination ) {
					aiea_post_elements()->pagination( $args, $query->max_num_pages );
				}
				
			endif;				
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	function limit_text( $text, $limit ) {
		if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos   = array_keys($words);
			$text  = substr($text, 0, $pos[$limit]);
			$text = rtrim( $text, ' ' ) . '...';
		}
		return $text;
	}
	
	function aiea_blog_shortcode_elements( $element, $opts = array(), $settings = null ){
		$output = '';
		switch( $element ){
		
			case "title":
				$title_length = isset( $settings['title_length'] ) ? $settings['title_length'] : '';
				$post_title = get_the_title();
				if( $title_length ) {
					$post_title = $this->limit_text( $post_title, absint( $title_length ) );
				}
				
				$head = isset( $opts['post_heading'] ) ? $opts['post_heading'] : 'h3';
				$output .= '<div class="entry-title">';
					$output .= '<'. esc_attr( $head ) .' class="post-title-head"><a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'title-link' ) .'>'. esc_html( $post_title ) .'</a></'. esc_attr( $head ) .'>';
				$output .= '</div><!-- .entry-title -->';
			break;
			
			case "thumb":
				if ( has_post_thumbnail() ) {
					
					$overlay_title_opt = isset( $settings['overlay_title_opt'] ) && $settings['overlay_title_opt'] == 'yes' ? true : false;					
					$this->add_render_attribute( 'post-thumb-atts', 'class', 'post-thumb' );
					if( $overlay_title_opt ) {
						$this->add_render_attribute( 'post-thumb-atts', 'class', 'post-overlay-active' );
					}
					
					$output .= '<div '. $this->get_render_attribute_string( 'post-thumb-atts' ) .'>';
						$img_id = get_post_thumbnail_id( get_the_ID() );
						$size = $opts['thumb_size'];
						$image_sizes = $opts['image_sizes'];
						$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );		
						$this->add_render_attribute( 'image_class', 'class', $settings['img_style'] );
						
						if( in_array( $size, $image_sizes ) ){
							$this->add_render_attribute( 'image_class', 'class', "attachment-$size size-$size" );
							$img_attr = $this->get_render_attributes( 'image_class' );
							$img_attr['class'] = implode( " ", $img_attr['class'] );
							$output .= '<a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'image-link' ) .'>';
								$output .= wp_get_attachment_image( $img_id, $size, false, $img_attr );
							$output .= '</a>';
						}else{
							$image_src = Group_Control_Image_Size::get_attachment_image_src( $img_id, 'thumbnail', $settings );
							if ( ! empty( $image_src ) ) {
								$img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
								$output .= '<a href="'. esc_url( get_the_permalink() ) .'" '. $this->get_render_attribute_string( 'image-link' ) .'>';
								$output .= sprintf( '<img src="%s" title="%s" alt="%s" %s />', esc_attr( $image_src ), esc_attr( get_the_title( $img_id ) ), esc_attr( $img_alt ), $this->get_render_attribute_string( 'image_class' ) );
								$output .= '</a>';
							}
						}

						if( $overlay_title_opt ) {
							$output .= '<div class="ai-post-overlay"><a href="'. esc_url( get_the_permalink() ) .'">'. esc_attr( get_the_title( get_the_ID() ) ) .'</a></div>';
						}
																		
					$output .= '</div><!-- .post-thumb -->';
				}
			break;
			
			case "category":
				$categories = get_the_category(); 
				if ( ! empty( $categories ) ){
					$coutput = '<div class="post-category">';
						$coutput .= '<span class="before-icon fa fa-folder-o"></span>';
						foreach ( $categories as $category ) {
							$coutput .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>,';
						}
						$output .= rtrim( $coutput, ',' );
					$output .= '</div>';
				}
			break;
			
			case "author":
				$output .= '<div class="post-author">';
					$output .= '<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) .'">';
						$output .= '<span class="author-img">'. get_avatar( get_the_author_meta('email'), '30', null, null, array( 'class' => 'inc-rounded-circle' ) ) .'</span>';
						$output .= '<span class="author-name">'. get_the_author() .'</span>';
					$output .= '</a>';
				$output .= '</div>';
			break;
			
			case "date":
				$archive_year  = get_the_time('Y');
				$archive_month = get_the_time('m'); 
				$archive_day   = get_the_time('d');
				$output = '<div class="post-date"><a href="'. esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ) .'" ><i class="icon icon-calendar"></i> '. get_the_time( get_option( 'date_format' ) ) .'</a></div>';
			break;
			
			case "more":
				$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'ai-addons' );
				$output = '<div class="post-more"><a href="'. esc_url( get_permalink( get_the_ID() ) ) . '" '. $this->get_render_attribute_string( 'more-link' ) .'>'. esc_html( $read_more_text ) .'</a></div>';
			break;
			
			case "comment":
				$comments_count = wp_count_comments(get_the_ID());
				$output = '<div class="post-comment"><a href="'. esc_url( get_comments_link( get_the_ID() ) ) .'" rel="bookmark" class="comments-count"><i class="fa fa-comment-o"></i> '. esc_html( $comments_count->total_comments ) .'</a></div>';
			break;
			
			case "excerpt":
				$output = '';
				$output .= '<div class="post-excerpt">';
					ob_start();
					the_excerpt();
					$excerpt_cont = ob_get_clean();
					$output .= $excerpt_cont;
				$output .= '</div><!-- .post-excerpt -->';	
			break;		
			
			case "meta":
				$output = '';
				$meta_items = $opts['meta_items'];
				$elemetns = isset( $meta_items ) ? json_decode( $meta_items, true ) : array( 'left' => '' );
				$output .= '<div class="post-meta">';
				foreach( $elemetns as $ele_key => $ele_part ){
					if( isset( $ele_part ) && !empty( $ele_part ) && $ele_key != 'disabled' ) :
						$part_class = $ele_key == 'Left' || $ele_key == 'Right' ? ' meta-' . strtolower( $ele_key ) : '';
						$output .= '<ul class="inc-nav post-meta-list'. esc_attr( $part_class ) .'">';
							foreach($ele_part as $element => $value ){
								$blog_array = array( 'more_text' => $opts['more_text'] );
								$output .= '<li>'. $this->aiea_blog_shortcode_elements( $element, $blog_array ) .'</li>';
							}
						$output .= '</ul>';
					endif;
				}
				$output .= '</div>';
			break;
			
		}
		return $output; 
	}
	
	function aiea_excerpt_more( $more ) {
		return '..';
	}
	
	function aiea_excerpt_length( $length ) {
		return $this->excerpt_len;
	}

}