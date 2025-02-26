<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Toggle Content 
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Toggle_Content_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Toggle content name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'toggle-content';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Toggle content title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Toggle Content', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Toggle content icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('toggle-content');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Toggle content widget belongs to.
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
		return [ 'ai-front-end'  ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
	
	public function get_help_url() {
        return 'https://aiaddons.ai/toggle-content-demo/';
    }

	/**
	 * Register Toggle content widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//Toggle Section
		$this->start_controls_section(
			'general_section',
			[
				'label'	=> esc_html__( 'Toggle', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'tg_height',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Lines to Show', 'ai-addons' ),
				'default' 		=> '10',
				'placeholder' 	=> '10'
			]
		);
		$this->add_control(
			'tg_content',
			[
				'label'			=> esc_html__( 'Toggle Content', 'ai-addons' ),
				'type'			=> Controls_Manager::WYSIWYG,
				'default'		=> aiea_addon_base()->make_default_content('toggle-content'),
			]
		);
		$this->end_controls_section();
		
		// Button
		$this->start_controls_section(
			'button_section',
			[
				'label'			=> esc_html__( 'Button', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
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
		$this->start_controls_tabs( 'tabs_btn_toggle' );
		$this->start_controls_tab(
			'tab_slide_up',
			[
				'label' => esc_html__( 'Toggle Inactive', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_text_up',
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
			'button_icon_up',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
			]
		);		
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_slide_down',
			[
				'label' => esc_html__( 'Toggle Active', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_text_down',
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
			'button_icon_down',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
			]
		);		
		$this->end_controls_tab();
		$this->end_controls_tabs();
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
				'separator' => 'before',
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
		
		// Style General Section
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'switcher_content_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'switcher_content_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->start_controls_tabs( 'general_styles' );
		$this->start_controls_tab(
			'general_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'font_color',
			[
				'label' => esc_html__( 'Font Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow Enable', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'switcher_content_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{switcher_content_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'switcher_content_box_shadow_pos',
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
		$this->end_controls_tab();
		$this->start_controls_tab(
			'general_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'font_hcolor',
			[
				'label' => esc_html__( 'Font Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'bg_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper:hover' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'shadow_hopt',
			[
				'label' 		=> esc_html__( 'Box Shadow Enable', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'switcher_content_hbox_shadow',
			[
				'label' 		=> esc_html__( 'Hover Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{switcher_content_hbox_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'switcher_content_hbox_shadow_pos',
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
		$this->end_controls_tab();	
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'switcher_content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .toggle-content-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-button',
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
					'{{WRAPPER}} .ai-button:hover, {{WRAPPER}} .ai-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ai-button:hover svg, {{WRAPPER}} .ai-button:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-button:hover', '{{WRAPPER}} .ai-button:focus',
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
					'{{WRAPPER}} .ai-button:hover, {{WRAPPER}} .ai-button:focus' => 'border-color: {{VALUE}};',
				],
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

	}

	/**
	 * Render Toggle content widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';		
		$tg_content = isset( $tg_content ) && $tg_content != '' ? $tg_content : '';
		$tg_height = isset( $tg_height ) && $tg_height != '' ? $tg_height : '';
		
		
		//Button Setion
		$btn_type = isset( $btn_type ) && !empty( $btn_type ) ? ' btn-'.$btn_type : '  btn-default';
		$btn_text = isset( $btn_text ) && !empty( $btn_text ) ? '<span class="toggle-btn-txt">'. $btn_text .'</span>' : '<span class="toggle-btn-txt">'. esc_html__( 'More', 'ai-addons' ) .'</span>';
		$btn_less_text = isset( $btn_less_text ) && !empty( $btn_less_text ) ? $btn_less_text : esc_html__( 'Less', 'ai-addons' );
		
		echo '<div class="toggle-content-wrapper'. esc_attr( $class ) .'">';
			echo '<div class="toggle-content-inner">';
				
				if( $tg_content ){
					echo '<div class="toggle-content" data-height="'. esc_attr( $tg_height ) .'">'. wp_kses_post( $tg_content ) .'</div><!-- .toggle-content -->';
				}				
				//toggle-content-trigger

				$this->add_render_attribute( 'button-wrapper', 'class', 'ai-button-wrapper toggle-content-trigger' );
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
				?>
				<div <?php echo ''. $this->get_render_attribute_string( 'button-wrapper' ); ?>>
					<a <?php echo ''. $this->get_render_attribute_string( 'button' ); ?>>
						<?php $this->button_render_text('up'); $this->button_render_text('down'); ?>
					</a>
				</div>
				<?php
				
			echo '</div><!-- .toggle-content-inner -->';
		echo '</div><!-- .toggle-content-wrapper -->';

	}
	
	/**
	 * Render button text.
	 *
	 * Render button widget text.
	 *
	 * @since 1.5.0
	 * @access protected
	 */
	protected function button_render_text( $field_id ) {
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
			'content-wrapper-'.$field_id => [
				'class' => 'ai-button-content-wrapper button-inner-'.$field_id,
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
		<span <?php echo ''. $this->get_render_attribute_string( 'content-wrapper-'.$field_id ); ?>>
			<?php if ( ! empty( $settings['button_icon_'.$field_id] ) && ! empty( $settings['button_icon_'.$field_id]['value'] ) ) : ?>
			<span <?php echo ''. $this->get_render_attribute_string( 'icon-align' ); ?>>
				<?php if ( $is_new || $migrated ) :
					Icons_Manager::render_icon( $settings['button_icon_'.$field_id], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i class="<?php echo esc_attr( $settings['button_icon_'.$field_id] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<span <?php echo ''. $this->get_render_attribute_string( 'text' ); ?>><?php echo esc_html( $settings['button_text_'.$field_id] ); ?></span>
		</span>
		<?php
	}
	
}