<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Creative Button Widget
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Creative_Button_Widget extends Widget_Base {
		
	/**
	 * Get widget name.
	 *
	 * Retrieve Creative Button Widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-creative-button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Creative Button Widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Creative Button', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Creative Button Widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('creative-button');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Creative Button Widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
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
	
	public function get_help_url() {
        return 'https://aiaddons.ai/button-demo/';
    }

	/**
	 * Register Creative Button Widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// Button
		$this->start_controls_section(
			'button_section',
			[
				'label'			=> esc_html__( 'Button', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Button options available here.', 'ai-addons' ),
			]
		);
		$this->add_control(
			'creative_type',
			[
				'label' => esc_html__( 'Button Style', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'winona',
				'options' => [
					'winona' 	=> esc_html__( 'Winona', 'ai-addons' ),
					'ujarak' 	=> esc_html__( 'Ujarak', 'ai-addons' ),
					'wayra'		=> esc_html__( 'Wayra', 'ai-addons' ),
					'tamaya' 	=> esc_html__( 'Tamaya', 'ai-addons' ),
					'rayen' 	=> esc_html__( 'Rayen', 'ai-addons' ),
					'pipaluk' 	=> esc_html__( 'Pipaluk', 'ai-addons' ),
					'nuka' 		=> esc_html__( 'Nuka', 'ai-addons' ),
					'moema'		=> esc_html__( 'Moema', 'ai-addons' ),
				]
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
					'{{WRAPPER}} .aiea-creative-button, {{WRAPPER}} .aiea-creative-button.button--tamaya::before, {{WRAPPER}} .aiea-creative-button.button--tamaya::after' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),			
			[
				'name' => 'button_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .aiea-creative-button, {{WRAPPER}} .aiea-creative-button.button--tamaya::before, {{WRAPPER}} .aiea-creative-button.button--tamaya::after, {{WRAPPER}} .aiea-creative-button.button--pipaluk::after, {{WRAPPER}} .aiea-creative-button.button--nuka::after, {{WRAPPER}} .aiea-creative-button.button--nuka::before, {{WRAPPER}} .aiea-creative-button.button--nuka:hover::before',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .aiea-creative-button',
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
					'{{WRAPPER}} .aiea-creative-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .aiea-creative-button',
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
					'{{WRAPPER}} .aiea-creative-button.button--winona:after, {{WRAPPER}} .aiea-creative-button.button--ujarak::before, {{WRAPPER}} .aiea-creative-button.button--wayra::before, {{WRAPPER}} .aiea-creative-button.button--ujarak:hover, {{WRAPPER}} .aiea-creative-button.button--wayra:hover, {{WRAPPER}} .aiea-creative-button.button--tamaya, {{WRAPPER}} .aiea-creative-button.button--rayen:before, {{WRAPPER}} .aiea-creative-button.button--pipaluk:hover, {{WRAPPER}} .aiea-creative-button.button--nuka:hover, {{WRAPPER}} .aiea-creative-button.button--moema:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hcolor',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .aiea-creative-button.button--winona:after, {{WRAPPER}} .aiea-creative-button.button--ujarak::before, {{WRAPPER}} .aiea-creative-button.button--wayra::before, {{WRAPPER}} .aiea-creative-button.button--winona:hover, {{WRAPPER}} .aiea-creative-button.button--tamaya, {{WRAPPER}} .aiea-creative-button.button--rayen:before, {{WRAPPER}} .aiea-creative-button.button--pipaluk:hover, {{WRAPPER}} .aiea-creative-button.button--nuka:hover::after, {{WRAPPER}} .aiea-creative-button.button--moema:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hborder',
				'selector' => '{{WRAPPER}} .aiea-creative-button:hover, {{WRAPPER}} .aiea-creative-button.button--pipaluk:hover::before',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'button_hborder_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-creative-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_hbox_shadow',
				'selector' => '{{WRAPPER}} .aiea-creative-button:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		
		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aiea-creative-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'selector' 		=> '{{WRAPPER}} .aiea-creative-button'
			]
		);
		$this->end_controls_section();
				
	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		$this->_settings = $settings;
		extract( $settings );

		$this->add_render_attribute( 'button-wrapper', 'class', 'ai-creative-button-wrapper' );		
		
		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['button_link'] );
			$this->add_render_attribute( 'button', 'class', 'aiea-creative-button' );
		}		
		if ( ! empty( $settings['button_css_id'] ) ) {
			$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}		
		
		$this->add_render_attribute( 'button', 'class', 'button--'. $creative_type );
		$this->add_render_attribute( 'button', 'data-text', $settings['button_text'] );
		?>
		<div <?php echo $this->get_render_attribute_string( 'button-wrapper' ); ?>>
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
				<?php $this->button_render_text(); ?>
			</a>
		</div>
		<?php

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
		
		$render_atts = [
			'content-wrapper' => [
				'class' => 'ai-button-content-wrapper',
			],
			'text' => [
				'class' => 'ai-button-text',
			],
		];
				
		$this->add_render_attribute( $render_atts );
		$this->add_inline_editing_attributes( 'text', 'none' );
		?>		
		<span <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['button_text']; ?></span>
		<?php
	}
	
}