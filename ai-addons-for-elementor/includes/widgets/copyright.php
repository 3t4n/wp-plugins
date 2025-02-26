<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class AIEA_Elementor_Copyright_Widget extends Widget_Base {
	
	
	/**
	 * Get widget name.
	 *
	 * Retrieve copyright widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "ai-copyright";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve copyright widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( "Copyright", "ai-addons" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve copyright widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ai-default-icon ". aiea_addon_base()->widget_icon_classes('copyright');
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the copyright widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "ai-hf-elements" ];
	}
	
	public function get_help_url() {
        return 'https://aiaddons.ai/';
    }

	/**
	 * Register copyright widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//General Section
		$this->start_controls_section(
			'copyright_section',
			[
				'label'	=> esc_html__( 'Copyright', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'shortcode',
			[
				'label'   => esc_html__( 'Copyright Text', 'ai-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Copyright © [aiea_current_year] [aiea_site_link] | Powered by [aiea_site_title]', 'ai-addons' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'ai-addons' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'ai-addons' ),
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label'              => esc_html__( 'Alignment', 'ai-addons' ),
				'type'               => Controls_Manager::CHOOSE,
				'options'            => [
					'left'   => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ai-addons' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-copyright-wrapper' => 'text-align: {{VALUE}};',
				],
				'frontend_available' => true,
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
		
		// Style Copyright		
		$this->start_controls_section(
			'section_style_copyright',
			[
				'label' => esc_html__( 'Copyright', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'caption_typography',
				'selector' => '{{WRAPPER}} .ai-copyright-wrapper, {{WRAPPER}} .ai-copyright-wrapper a',
				'global'   => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-copyright-wrapper' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
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
			'link_color',
			[
				'label' => esc_html__( 'Link Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-copyright-wrapper a' => 'color: {{VALUE}};'
				]
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
			'link_hcolor',
			[
				'label' => esc_html__( 'Link Hover Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-copyright-wrapper a:hover' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	/**
	 * Render copyright widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$link     = isset( $settings['link']['url'] ) ? $settings['link']['url'] : '';

		if ( ! empty( $link ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}

		$copy_right_shortcode = do_shortcode( shortcode_unautop( $settings['shortcode'] ) ); ?>
		<div class="ai-copyright-wrapper">
			<?php if ( ! empty( $link ) ) { ?>
				<a <?php echo wp_kses_post( $this->get_render_attribute_string( 'link' ) ); ?>>
					<span><?php echo wp_kses_post( $copy_right_shortcode ); ?></span>
				</a>
			<?php } else { ?>
				<span><?php echo wp_kses_post( $copy_right_shortcode ); ?></span>
			<?php } ?>
		</div>
		<?php
	}
	
}