<?php

/**
 * Elementor AR Model Viewer Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class AR_ModelViewer_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve AR Model Viewer widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'ar-model-viewer';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve AR Model Viewer widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return __('AR Model Viewer', 'ar-model-viewer');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve AR Model Viewer widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-photo-library';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the AR Model Viewer widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	// public function get_categories() {
	// 	return [ 'AR' ];
	// }

	/**
	 * Register AR Model Viewer widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls()
	{

		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'ar-model-viewer'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'file_link',
			[
				'label' => esc_html__('Select File', 'ar-model-viewer'),
				'type'  => 'file-select',
				'placeholder' => esc_html__('URL to File', 'ar-model-viewer'),
				'description' => esc_html__('Select file from media library or upload. Supports GLB/GLTF format', 'ar-model-viewer'),
			]
		);
		$this->add_control(
			'poster',
			[
				'label' => esc_html__('Select Poster', 'ar-model-viewer'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__("Image to display while model loads", 'ar-model-viewer'),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'file_link[url]!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'width',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__('Width', 'ar-model-viewer'),
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 800,
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .model-viewer' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'file_link[url]!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__('Height', 'ar-model-viewer'),
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 800,
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .model-viewer' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'file_link[url]!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'content_align',
			[
				'label' => __('Alignment', 'ar-model-viewer'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'ar-model-viewer'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'ar-model-viewer'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'ar-model-viewer'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'devices' => ['desktop', 'tablet'],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render AR Model Viewer widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{

		$settings = $this->get_settings_for_display();
		$src = esc_attr($settings['file_link']);
		// $width = esc_attr($settings['width']['size']) . esc_attr($settings['width']['unit']);
		// $height = esc_attr($settings['height']['size']) . esc_attr($settings['height']['unit']);
		$alignment = esc_attr($settings['content_align']);
		$margin ='0 auto 0 0';
		if ($alignment == 'right') {
			$margin ='0 0 0 auto';
		}
		if ($alignment == 'center') {
			$margin ='0 auto';
		}
?>

		<div class="ar-elementor-widget">
			<div style="margin: 0 auto;width: 100%; height: 100%;">
				<model-viewer-preview>
					<model-viewer class='model-viewer' 
					style="<?php echo 'margin:' . $margin . ';max-width: 100%; max-height: 100%; --poster-color:transparent'; ?>" bounds="tight" src="<?php echo $src; ?>" ar ar-modes="webxr scene-viewer quick-look" camera-controls environment-image="neutral" shadow-intensity="1" poster="<?php echo esc_attr($settings['poster']['url']) ?>">
					</model-viewer>
				</model-viewer-preview>
			</div>
		</div>
<?php }
}
