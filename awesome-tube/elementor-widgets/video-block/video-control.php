<?php
namespace Elementor;

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class awetube_video_block extends Widget_Base
{

	public function get_name()
	{
		return 'awetube-video-block';
	}

	public function get_title()
	{
		return __('Video Block', 'awetube');
	}

	public function get_icon()
	{
		return 'eicon-youtube';
	}

	public function get_categories()
	{
		return [ 'awetube-general-category' ];
	}

	protected function register_controls()
	{


		/*===========GENERAL CONTROL=============*/
				/*===========1. ELEMENT SETTING=============*/
		$this->start_controls_section(
			'awetube_type_post',
			[
				'label' => __('Element Setting', 'awetube'),
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label' => __('Post per Block', 'awetube'),
				'type' => Controls_Manager::TEXT,
				'default' => '6',
				'title' => __('Enter some text', 'awetube'),
				'description' => __('This option allow you to set how much post display in this block.', 'awetube'),
			]
		);

		$this->add_control(
			'offset',
			[
				'label' => __('Offset', 'awetube'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __('Enter some text', 'awetube'),
				'description' => __('Set the first post to display (start from 0 as the latest post in each order).', 'awetube'),
			]
		);

		$this->add_control(
			'category',
			[
				'label' => __('Category', 'awetube'),
				'type'    => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'default' => [],
				'options' => awetube_get_category_video(),
				'description' => __('Select category to display (default to All).', 'awetube'),
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __('Order By', 'awetube'),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => awetube_order_by(),
				'description' => __('Select post order by (default to latest post).', 'awetube'),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_awetube_portfolio_layout_control',
			[
				'label' => __('Layout Setting', 'awetube'),
			]
		);

		$this->add_control(
			'choose_style',
			[
				'label' => __('Choose Style', 'awetube'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => awetube_video_block_options(),
			]
		);

		$this->add_responsive_control(
			'choose_column',
			[
				'label' => __('Column', 'awetube'),
				'type' => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					1 => __('1', 'awetube'),
					2 => __('2', 'awetube'),
					3 => __('3', 'awetube'),
					4 => __('4', 'awetube'),
					5 => __('5', 'awetube'),
					6 => __('6', 'awetube'),
				],
				'selectors' => [
					'{{WRAPPER}} .video-wrap.ele.style-1, {{WRAPPER}} .vidio-loop-style3-wrap-ele, {{WRAPPER}} .video-loop-block' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
				],
			]
		);

		/*=========== padding ===========*/
		$this->add_control(
			'use_padding',
			[
				'label' => __('Use Padding', 'awetube'),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
				'description' => __('Add a gap for each post item with padding.', 'awetube'),
			]
		);

		$this->add_responsive_control(
			'padding_size',
			[
				'label' => __('Padding Size', 'awetube'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em','%','rem' ],
				'selectors' => [
					'{{WRAPPER}} .video-wrap.ele.style-1, .video-loop-block, .vidio-loop-style3-wrap-ele' => 'gap: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_padding' => 'use',
				],
			]
		);

		$this->add_responsive_control(
			'margin_bottom',
			[
				'label' => __('Margin Bottom', 'awetube'),
				'description' => __('Margin bottom', 'awetube'),
				'type' => Controls_Manager::NUMBER,
				'default' => '20',
				'selectors' => [
					'{{WRAPPER}} .video-wrap.ele.style-1 .video-item' => 'margin-bottom: {{VALUE}}px;',
				],
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------------------------------------------------*/
		/*  4. IMAGE SETTING
		/*-----------------------------------------------------------------------------------*/
		$this->start_controls_section(
			'section_video_block_image_setting',
			[
				'label' => __('Image Setting', 'awetube'),
			]
		);
		$this->add_control(
			'width',
			[
				'label' => __('Width', 'awetube'),
				'type' => Controls_Manager::TEXT,
				'default' => '535',
				'title' => __('Enter some text', 'awetube'),
				'description' => __('For Default Product Style, only work when assigned as horizontal item.', 'awetube'),
			]
		);
		$this->add_control(
			'height',
			[
				'label' => __('Height', 'awetube'),
				'type' => Controls_Manager::TEXT,
				'default' => '355',
				'title' => __('Enter some text', 'awetube'),
			]
		);
		$this->add_control(
			'testi_image_crop',
			[
				'label' => __('Force to Crop Image', 'awetube'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'on',
				'default' => 'on',
                'condition' => [
                    'choose_style' => [ 'style-1', 'style-2', 'style-3', 'style-4' ],
                ],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_awetube_video_title_setting',
			[
				'label' => __('Video Title Setting', 'awetube'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'use_title',
			[
				'label' => __('Use Title', 'awetube'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'on',
				'default' => 'on',
			]
		);

		$this->add_control(
			'typhography_video_block_title_color',
			[
				'label' => __('Video Title Color', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .video-item h4 a, {{WRAPPER}} .video-item h1 a, {{WRAPPER}} .vidio-style2 h4 a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_video_block_title_color_hover',
			[
				'label' => __('Video Title Color Hover', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#595edc',
				'selectors' => [
					'{{WRAPPER}} .video-item h4 a:hover, {{WRAPPER}} .video-item h1 a:hover, {{WRAPPER}} .vidio-style2 h4 a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_video_title',
				'label' => __('Video Title Font Setting', 'awetube'),
				'selector' => '{{WRAPPER}} .video-item h1, {{WRAPPER}} .video-item h4, {{WRAPPER}} .video-item h4 a, {{WRAPPER}} .video-item h1 a, {{WRAPPER}} .vidio-style2 h4 a, {{WRAPPER}} .vidio-style2 h4',
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_align_text',
			[
				'label' => __('Video Title Text Align', 'awetube'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'awetube'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'awetube'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'awetube'),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .video-item h4, {{WRAPPER}} .video-item h1, {{WRAPPER}} .vidio-style2 h4' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'margin_bottom_title',
			[
				'label' => __('Video Title Margin Bottom', 'awetube'),
				'description' => __('Video Title Margin bottom', 'awetube'),
				'type' => Controls_Manager::NUMBER,
				'default' => '5',
				'selectors' => [
					'{{WRAPPER}} .video-item h4, {{WRAPPER}} .video-item h1, {{WRAPPER}} .video-loop-block h4.video-title' => 'margin-bottom: {{VALUE}}px;',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_awetube_author_title_setting',
			[
				'label' => __('Author Setting', 'awetube'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'use_author',
			[
				'label' => __('Use Author', 'awetube'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'on',
				'default' => 'on',
			]
		);

		$this->add_control(
			'typhography_author_block_title_color',
			[
				'label' => __('Author Color', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#a9a9a9',
				'selectors' => [
					'{{WRAPPER}} span.vcard a ' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_author' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_author_block_title_color_hover',
			[
				'label' => __('Author Color Hover', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#a9a9a9',
				'selectors' => [
					'{{WRAPPER}} span.vcard a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_author' => 'on',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_author_name',
				'label' => __('Author Font Setting', 'awetube'),
				'selector' => '{{WRAPPER}} span.vcard a',
				'condition' => [
					'use_author' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'author_align_text',
			[
				'label' => __('Author Text Align', 'awetube'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'awetube'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'awetube'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'awetube'),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} span.vcard' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
				'condition' => [
					'use_author' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'margin_bottom_author',
			[
				'label' => __('Video Author Margin Bottom', 'awetube'),
				'description' => __('Video Author Margin bottom', 'awetube'),
				'type' => Controls_Manager::NUMBER,
				'default' => '0',
				'selectors' => [
					'{{WRAPPER}} span.vcard a, {{WRAPPER}} .author-wrapper-vid' => 'margin-bottom: {{VALUE}}px;',
				],
				'condition' => [
					'use_author' => 'on',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_awetube_video_view_title_setting',
			[
				'label' => __('View and Date Setting', 'awetube'),
				'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'choose_style' => [ 'style-1', 'style-2', 'style-5', 'style-4' ],
                ],
			]
		);

		$this->add_control(
			'use_view',
			[
				'label' => __('Use View and Date', 'awetube'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'on',
				'default' => 'on',
			]
		);

		$this->add_control(
			'typhography_video_view_block_title_color',
			[
				'label' => __('View and Date Color', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .views-video, {{WRAPPER}} .views-video span, {{WRAPPER}} .video-loop-block .meta-video-wrap ul li' => 'color: {{VALUE}};',
					'{{WRAPPER}} .views-video span:nth-child(1):before, {{WRAPPER}} .video-loop-block .meta-video-wrap ul li:last-child::before, {{WRAPPER}} .video-wrap.ele.style-1 .views-video span:first-child:after' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_view' => 'on',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_video_view_name',
				'label' => __('View and Date Font Setting', 'awetube'),
				'selector' => '{{WRAPPER}} .views-video',
				'condition' => [
					'use_view' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'view_align_text',
			[
				'label' => __('View and Date Text Align', 'awetube'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'awetube'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'awetube'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'awetube'),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .views-video' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
				'condition' => [
					'use_view' => 'on',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_awetube_hover_image_setting',
			[
				'label' => __('Hover Image Setting', 'awetube'),
				'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'choose_style' => [ 'style-1', 'style-2', 'style-5', 'style-4' ],
                ],
			]
		);

		$this->add_control(
			'use_hover',
			[
				'label' => __('Use Hover', 'awetube'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'on',
				'default' => 'on',
			]
		);

		$this->add_control(
			'typhography_video_hover_overlay_color',
			[
				'label' => __('Overlay Hover Color', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#0000004d',
				'selectors' => [
					'{{WRAPPER}} .overlay-video' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_hover' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_video_hover_bg_color',
			[
				'label' => __('Background Icon Hover Color', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#4c4fa0b5',
				'selectors' => [
					'{{WRAPPER}} .video-thumb .play-button-hover i, {{WRAPPER}} .style-5 .post-thumb .play-button-hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_hover' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_video_hover_icon_color',
			[
				'label' => __('Icon Hover Color', 'awetube'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .video-thumb .play-button-hover i, {{WRAPPER}} .style-5 .post-thumb .play-button-hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_hover' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size_hover',
			[
				'label' => __('Icon Size Hover', 'awetube'),
				'description' => __('Icon Size', 'awetube'),
				'type' => Controls_Manager::NUMBER,
				'default' => '22',
				'selectors' => [
					'{{WRAPPER}} .video-thumb .play-button-hover i, {{WRAPPER}} .style-5 .post-thumb .play-button-hover, {{WRAPPER}} .style-5 .play-button-hover' => 'font-size: {{VALUE}}px;',
				],
				'condition' => [
					'use_hover' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'padding_size_icon_hover',
			[
				'label' => __('Padding Size Icon', 'awetube'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .video-thumb .play-button-hover i, {{WRAPPER}} .style-5 .post-thumb .play-button-hover, {{WRAPPER}} .style-5 .play-button-hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'use_hover' => 'on',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{

		$instance       = $this->get_settings();

		$post_per_page  = ! empty($instance['posts_per_page']) ? (int)$instance['posts_per_page'] : 6;

		$category       = ! empty($instance['category']) ? $instance['category'] : '';
		$orderby        = ! empty($instance['orderby']) ? $instance['orderby'] : 'date';
		$offset         = ! empty($instance['offset']) ? (int)$instance['offset'] : '';

		$testi_image_crop           = $instance['testi_image_crop'];
		$choose_style   = ! empty($instance['choose_style']) ? $instance['choose_style'] : 'style-1';
		$width          = ! empty($instance['width']) ? (int)$instance['width'] : 535;
		$height         = ! empty($instance['height']) ? (int)$instance['height'] : 355;

        $use_title = $instance['use_title'];
        $use_author = $instance['use_author'];
        $use_view = $instance['use_view'];
        $use_hover = $instance['use_hover'];


		if ($choose_style == 'style-1') {
			include(plugin_dir_path(__FILE__).'tpl/video-block.php');
		} elseif($choose_style == 'style-2') {
			include(plugin_dir_path(__FILE__).'tpl/video-block-2.php');
		} elseif($choose_style == 'style-3') {
			include(plugin_dir_path(__FILE__).'tpl/video-block-3.php');
		}
	}

	protected function content_template()
	{
	}

	public function render_plain_content($instance = [])
	{
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new awetube_video_block());
