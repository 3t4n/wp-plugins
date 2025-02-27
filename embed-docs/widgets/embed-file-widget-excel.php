<?php

namespace ElementorEmbedDocs\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 2.0.2
 */

class Elementor_embed_file_Widget_excel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 2.0.2
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'embed_file_widget_excel';
	}


	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 2.0.2
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Embed Excel', 'elementor' );
	}

	
	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 2.0.2
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return ' eicon-document-file';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 2.0.2
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}
	
	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 2.0.2
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://a1office.co/';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 2.0.2
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'Excel', 'Embed' , 'file'];
	}
	
	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 2.0.2
	 * @access protected
	 */
	protected function _register_controls() {		
		$this->start_controls_section(
			'excel_viewer_docs',
			[
				'label' => __( 'Embed Excel', 'elementor' ),
			]
		);

		$this->add_control(
			'excel_type',
			[
				'label' => __( 'Excel type', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'url',
				'options' => [
					'url'  => __( 'URL', 'elementor' ),
					'file' => __( 'File', 'elementor' ),
				],
			]
			);
			$this->add_control(
				'excel_url',
				[
					'label' => __( 'excel URL', 'elementor' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => __( 'https://a1office-cdn.a1office.co/wp-content/uploads/2022/09/address-1.xlsx', 'elementor' ),
					'show_external' => true,
					'default' => [
						'url' => 'https://a1office-cdn.a1office.co/wp-content/uploads/2022/09/address-1.xlsx',
						'is_external' => true,
						'nofollow' => true,
					],
					'dynamic' => [
						'active' => true,
					],
					'condition' => [
						'excel_type' => 'url',
					]
				]
			);

			$this->add_control(
				'excel_file',
				[
					'label' => __( 'Choose Excel', 'elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'media_type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'dynamic' => [
						'active' => true,
					],
					'condition' => [
						'excel_type' => 'file',
					],
				]
			);

			$this->add_control(
				'width',
				[
					'label' => __( 'Width', 'elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1500,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 800,
					],
				]
			);
	
			$this->add_control(
				'height',
				[
					'label' => __( 'Height', 'elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1500,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 800,
					],
				]
			);

			$this->add_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'plugin-domain' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'plugin-domain' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'plugin-domain' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
	
					'toggle' => true,
				]
			);
			
			
			$this->end_controls_section();
	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 2.0.2
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$align = 'display: block; margin-left: auto; margin-right: auto;';
		
		if ($settings['text_align'] === 'left') {
			$align = 'display: block; float: left;';
		}
		if ($settings['text_align'] === 'right') {
			$align = 'display: block; float: right;';
		}
		if (isset($settings['width'])) {
			$width = ' width: ' . $settings['width']['size'] . $settings['width']['unit'] . ';';
		}
		if (isset($settings['height'])) {
			$height = ' height: ' . $settings['height']['size'] . $settings['height']['unit'] . ';';
		}

		if ($settings['excel_type'] == 'url' AND isset($settings['excel_url'])) {
			$excel_url = $settings['excel_url']['url'];
		}

		if ($settings['excel_type'] == 'file' AND isset($settings['excel_file']['url'])) {
			$excel_url = $settings['excel_file']['url'];
		}

		echo '<iframe src="https://view.officeapps.live.com/op/view.aspx?src=' . $excel_url . '&amp;embedded=true" style="' . $align . $width . $height . '" frameborder="1" marginheight="0px" marginwidth="0px" allowfullscreen></iframe>';

	}


	}

