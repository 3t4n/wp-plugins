<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class AIEA_Elementor_Logo_Widget extends Widget_Base {
	
	
	/**
	 * Get widget name.
	 *
	 * Retrieve logo widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "ai-logo";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve logo widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( "Logo", "ai-addons" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve logo widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ai-default-icon ". aiea_addon_base()->widget_icon_classes('logo');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the logo widget belongs to.
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
	 * Register logo widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//General Section
		$this->start_controls_section(
			'logo_section',
			[
				'label'	=> esc_html__( 'Site Logo', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Default logo options.', 'ai-addons' ),
			]
		);
		$this->add_control(
			'custom_logo',
			[
				'label' 		=> esc_html__( 'Custom Logo', 'ai-addons' ),
				'description'	=> esc_html__( 'This is option for custom logo. Enable this too choose custom logo, or else leave disable stat to set default one.', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'logo',
			[
				'type' => Controls_Manager::MEDIA,
				'label' => esc_html__( 'Logo Image', 'ai-addons' ),
				'description'	=> esc_html__( 'Choose logo image.', 'ai-addons' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' 	=> [
					'custom_logo' 		=> 'yes'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'logo', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
				'condition' 	=> [
					'custom_logo' 		=> 'yes'
				],
			]
		);	
		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
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
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Custom Link', 'ai-addons' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'ai-addons' ),
			]
		);
		$this->end_controls_section();
		
		//Caption Section
		$this->start_controls_section(
			'caption_section',
			[
				'label'	=> esc_html__( 'Caption', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Logo caption options.', 'ai-addons' ),
			]
		);
		$this->add_control(
			'caption_stat',
			[
				'label' 		=> esc_html__( 'Caption Enable', 'ai-addons' ),
				'description'	=> esc_html__( 'This is option for enable logo caption.', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);
		$this->add_control(
			'caption_opt',
			[
				'label' => esc_html__( 'Caption Options', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'	=> esc_html__( 'Default', 'ai-addons' ),
					'custom'	=> esc_html__( 'Custom', 'ai-addons' )
				],
				'condition' 	=> [
					'caption_stat' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'custom_caption',
			[
				'label' 		=> esc_html__( 'Custom Caption', 'ai-addons' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> '',
				'condition' 	=> [
					'caption_opt' 		=> 'custom'
				],
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
		
		// Style Logo Section
		$this->start_controls_section(
			'logo_style_section',
			[
				'label' => esc_html__( 'Site Logo', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'width',
			[
				'label'              => esc_html__( 'Width', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'default'            => [
					'unit' => '%',
				],
				'tablet_default'     => [
					'unit' => '%',
				],
				'mobile_default'     => [
					'unit' => '%',
				],
				'size_units'         => [ '%', 'px', 'vw' ],
				'range'              => [
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .main-logo img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label'              => esc_html__( 'Max Width', 'ai-addons' ) . ' (%)',
				'type'               => Controls_Manager::SLIDER,
				'default'            => [
					'unit' => '%',
				],
				'tablet_default'     => [
					'unit' => '%',
				],
				'mobile_default'     => [
					'unit' => '%',
				],
				'size_units'         => [ '%' ],
				'range'              => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .main-logo img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type'  => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_control(
			'site_logo_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-logo' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'site_logo_image_border',
			[
				'label'       => esc_html__( 'Border Style', 'ai-addons' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'none',
				'label_block' => false,
				'options'     => [
					'none'   => esc_html__( 'None', 'ai-addons' ),
					'solid'  => esc_html__( 'Solid', 'ai-addons' ),
					'double' => esc_html__( 'Double', 'ai-addons' ),
					'dotted' => esc_html__( 'Dotted', 'ai-addons' ),
					'dashed' => esc_html__( 'Dashed', 'ai-addons' ),
				],
				'selectors'   => [
					'{{WRAPPER}} .main-logo img' => 'border-style: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'site_logo_image_border_size',
			[
				'label'      => esc_html__( 'Border Width', 'ai-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default'    => [
					'top'    => '1',
					'bottom' => '1',
					'left'   => '1',
					'right'  => '1',
					'unit'   => 'px',
				],
				'condition'  => [
					'site_logo_image_border!' => 'none',
				],
				'selectors'  => [
					'{{WRAPPER}} .main-logo img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'site_logo_image_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [
					'site_logo_image_border!' => 'none',
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .main-logo img' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label'              => esc_html__( 'Border Radius', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .main-logo img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'image_box_shadow',
				'exclude'  => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .main-logo img',
			]
		);
		
		$this->start_controls_tabs( 'image_effects' );
		$this->start_controls_tab(
			'normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'opacity',
			[
				'label'     => esc_html__( 'Opacity', 'ai-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-logo img' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'     => 'css_filters',
				'selector' => '{{WRAPPER}} .main-logo img',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'opacity_hover',
			[
				'label'     => esc_html__( 'Opacity', 'ai-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-logo:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'background_hover_transition',
			[
				'label'     => esc_html__( 'Transition Duration', 'ai-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-logo img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'     => 'css_filters_hover',
				'selector' => '{{WRAPPER}} .main-logo:hover img',
			]
		);
		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'ai-addons' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		// Style Caption Section
		$this->start_controls_section(
			'caption_style_section',
			[
				'label' => esc_html__( 'Caption', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .logo-tagline' => 'color: {{VALUE}};',
				],
				'global'    => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_control(
			'caption_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .logo-tagline' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'caption_typography',
				'selector' => '{{WRAPPER}} .logo-tagline',
				'global'   => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'caption_text_shadow',
				'selector' => '{{WRAPPER}} .logo-tagline',
			]
		);
		$this->add_responsive_control(
			'caption_padding',
			[
				'label'              => esc_html__( 'Padding', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', 'em', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .logo-tagline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'caption_space',
			[
				'label'              => esc_html__( 'Spacing', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'range'              => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'            => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors'          => [
					'{{WRAPPER}} .logo-tagline' => 'display: block; margin-top: {{SIZE}}{{UNIT}}; margin-bottom: 0px;',
				],
				'frontend_available' => true,
			]
		);
		$this->end_controls_section();

	}

	/**
	 * Render logo widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$custom_logo = $custom_logo && $custom_logo == 'yes' ? true : false;
		$site_title = get_bloginfo( 'name' );
		
		$caption_stat = $caption_stat && $caption_stat == 'yes' ? true : false;
		$site_description = '';
		if( $caption_stat ) {
			$caption_opt = $caption_opt ? $caption_opt : 'default';
			if( $caption_opt == 'custom' ) {
				$custom_caption = $custom_caption ? $custom_caption : '';
				$site_description = $custom_caption;
			} else {
				$site_description = get_bloginfo( 'description' );
			}
		}
		
		if( $custom_logo && !empty( $logo['url'] ) ){
			if ( ! empty( $settings['link']['url'] ) ) {
				$this->add_link_attributes( 'link', $settings['link'] );
			}
			if( ! empty( $logo['url'] ) ) {
				$this->add_render_attribute( 'image', 'src', $logo['url'] );
				$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $logo ) );
				$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $logo ) );
				$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );
				$image_html = wp_kses_post( Group_Control_Image_Size::get_attachment_image_html( $settings, 'logo', 'logo' ) );
				if ( ! empty( $settings['link']['url'] ) ) {
					$image_html = '<a class="site-title"' . $this->get_render_attribute_string( 'link' ) . '>' . $image_html . '</a>';
				}
			?>
			<div class="main-logo">
				<?php Utils::print_unescaped_internal_string( $image_html ); 
			}
		} elseif( has_custom_logo() ) { ?>
			<div class="main-logo">
				<?php the_custom_logo(); 
		} else { ?>
			<div class="main-logo">
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $site_title ); ?>" ><?php echo esc_html( $site_title ); ?></a> <?php
		}
		
		if ( $site_description ) : ?>
				<span class="logo-tagline"><?php echo esc_html( $site_description ); ?></span>
			<?php endif; 
		?></div><!-- .main-logo --> <?php
	}
	
}