<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons Social Share
 *
 * @since 1.0.0
 */
class AIEA_Elementor_Social_Share_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Social Share widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-social-share';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Social Share widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Social Share', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Social Share widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('social-share');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Social Share widget belongs to.
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
		return [ 'ai-sharer'  ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
	
	public function get_help_url() {
        return 'https://aiaddons.ai/social-icons-demo/';
    }

	/**
	 * Register Social Share widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//Layouts Section
		$this->start_controls_section(
			'layouts_section',
			[
				'label'			=> esc_html__( 'Layouts', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .social-icons-wrapper' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'shape',
			[
				'label' => esc_html__( 'Shape', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'circle',
				'options' => [
					'rounded' => esc_html__( 'Rounded', 'ai-addons' ),
					'square' => esc_html__( 'Square', 'ai-addons' ),
					'circle' => esc_html__( 'Circle', 'ai-addons' ),
				],
				'prefix_class' => 'elementor-shape-',
			]
		);
		$this->end_controls_section();
		
		//Icons Section
		$this->start_controls_section(
			'icons_section',
			[
				'label'			=> esc_html__( 'Icons', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'social_list',
			[
				'label'   => __( 'Network', 'ai-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'facebook'    => __( 'Facebook', 'happy-elementor-addons' ),
					'twitter'     => __( 'Twitter', 'happy-elementor-addons' ),
					'linkedin'    => __( 'Linkedin', 'happy-elementor-addons' ),
					'email'       => __( 'Email', 'happy-elementor-addons' ),
					'whatsapp'    => __( 'Whatsapp', 'happy-elementor-addons' ),
					'telegram'    => __( 'Telegram', 'happy-elementor-addons' ),
					'viber'       => __( 'Viber', 'happy-elementor-addons' ),
					'pinterest'   => __( 'Pinterest', 'happy-elementor-addons' ),
					'tumblr'      => __( 'Tumblr', 'happy-elementor-addons' ),
					'reddit'      => __( 'Reddit', 'happy-elementor-addons' ),
					'vk'          => __( 'VK', 'happy-elementor-addons' ),
					'xing'        => __( 'Xing', 'happy-elementor-addons' ),
					'get-pocket'  => __( 'Get Pocket', 'happy-elementor-addons' ),
					'digg'        => __( 'Digg', 'happy-elementor-addons' ),
					'stumbleupon' => __( 'StumbleUpon', 'happy-elementor-addons' ),
					'weibo'       => __( 'Weibo', 'happy-elementor-addons' ),
					'renren'      => __( 'Renren', 'happy-elementor-addons' ),
					'skype'       => __( 'Skype', 'happy-elementor-addons' ),
				],
				'default' => 'facebook',
			]
		);
		$repeater->add_control(
			'social_icon',
			[
				'label' => __( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'fa-brands',
				],
				'recommended' => [
					'fa-brands' => [
						'facebook',
						'twitter',
						'linkedin',
					],
				],
			]
		);
		$repeater->add_control(
			'hashtags',
			[
				'label'       => __( 'Hashtags', 'ai-addons' ),
				'description' => __( 'Write hashtags without # sign and with comma separated value', 'ai-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'      => 2,
				'dynamic'     => [
					'active' => true,
				],
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'facebook',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'linkedin',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'whatsapp',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'reddit',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'skype',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'pinterest',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'email',
						],
					]
				]
			]
		);
		$repeater->add_control(
			'custom_title',
			[
				'label'     => __( 'Custom Title', 'ai-addons' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows'      => 2,
				'dynamic'   => [
					'active' => true,
				],
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'facebook',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'linkedin',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'reddit',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'skype',
						],
						[
							'name' => 'social_list',
							'operator' => '!==',
							'value' => 'pinterest',
						],
					]
				]
			]
		);
		$repeater->add_control(
			'email_to',
			[
				'label'     => __( 'To', 'ai-addons' ),
				'type'      => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'social_list' => 'email',
				]
			]
		);
		$repeater->add_control(
			'email_subject',
			[
				'label'     => __( 'Subject', 'ai-addons' ),
				'type'      => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'social_list' => 'email',
				]
			]
		);
		$repeater->add_control(
			'twitter_handle',
			[
				'label'     => __( 'Twitter Handle', 'ai-addons' ),
				'description' => __( 'Write without @ sign.', 'ai-addons' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => [
					'social_list' => 'twitter',
				]
			]
		);
		$repeater->add_control(
			'image',
			[
				'type' => Controls_Manager::MEDIA,
				'label' => __( 'Custom Image', 'ai-addons' ),
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'social_list' => 'pinterest'
				]
			]
		);
		$repeater->add_control(
			'custom_link',
			[
				'label' => esc_html__( 'Custom Link', 'ai-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'ai-addons' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
			]
		);
		$this->add_control(
			'social_icon_list',
			[
				'label' => __( 'Social Share', 'ai-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
						'social_list' => 'facebook'
					],
					[
						'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brands',
						],
						'social_list' => 'twitter'
					],
					[
						'social_icon' => [
							'value' => 'fab fa-linkedin',
							'library' => 'fa-brands',
						],
						'social_list' => 'linkedin'
					],
				],
				'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
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
		$this->add_responsive_control(
			'outer_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .social-icons-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'outer_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .social-icons-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => __( 'Icon', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Official Color', 'ai-addons' ),
					'custom' => __( 'Custom', 'ai-addons' ),
				],
			]
		);

		$this->start_controls_tabs( 'icons_colors' );
		$this->start_controls_tab(
			'icon_color_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_primary_color',
			[
				'label' => __( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_secondary_color',
			[
				'label' => __( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-social-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border', // We know this mistake - TODO: 'icon_border' (for hover control condition also)
				'selector' => '{{WRAPPER}} .elementor-social-icon',
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'icon_color_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_primary_hcolor',
			[
				'label' => __( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_secondary_hcolor',
			[
				'label' => __( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon:hover i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-social-icon:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_border_color',
			[
				'label' => __( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'image_border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'ai-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--icon-size: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon' => '--icon-padding: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => __( 'Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-social-icons > li > a' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ai-social-icons' => 'margin-left: -{{SIZE}}{{UNIT}}; margin-right: -{{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'row_gap',
			[
				'label' => __( 'Rows Gap', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-social-icons > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-social-icons' => 'margin-bottom: -{{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->end_controls_section();
			
	}
	
	/**
	 * Render Social Share widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$link_target = isset( $link_target ) && $link_target == 'yes' ? '_blank' : '_self';
		
		$class_animation = '';
		
		if ( ! empty( $settings['hover_animation'] ) ) {
			$class_animation = 'elementor-animation-' . $settings['hover_animation'];
		}
		
		$url = get_the_permalink();
		$title = get_the_title();
		
		echo '<div class="social-icons-wrapper social-share-wrapper">';
						
			$fallback_defaults = [
				'fa fa-facebook',
				'fa fa-twitter',
				'fa fa-google-plus',
			];
			$migration_allowed = Icons_Manager::is_migration_allowed();
			echo '<ul class="inc-nav d-inline-block ai-social-icons">';
			foreach ( $settings['social_icon_list'] as $index => $item ) {
				$migrated = isset( $item['__fa4_migrated']['social_icon'] );
				$is_new = empty( $item['social'] ) && $migration_allowed;
				$social = '';

				// add old default
				if ( empty( $item['social'] ) && ! $migration_allowed ) {
					$item['social'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-wordpress';
				}

				if ( ! empty( $item['social'] ) ) {
					$social = str_replace( 'fa fa-', '', $item['social'] );
				}

				if ( ( $is_new || $migrated ) && 'svg' !== $item['social_icon']['library'] ) {
					$social = explode( ' ', $item['social_icon']['value'], 2 );
					if ( empty( $social[1] ) ) {
						$social = '';
					} else {
						$social = str_replace( 'fa-', '', $social[1] );
					}
				}
				if ( 'svg' === $item['social_icon']['library'] ) {
					$social = get_post_meta( $item['social_icon']['value']['id'], '_wp_attachment_image_alt', true );
				}

				$link_key = 'link_' . $index;

				$this->add_render_attribute( $link_key, 'class', [
					'elementor-icon',
					'elementor-social-icon',
					'elementor-social-icon-' . $social,
					'elementor-repeater-item-' . $item['_id'],
					$class_animation
				] );
				
				$custom_share_url = $item['custom_link']['url'];
				$share_url = $custom_share_url ? $custom_share_url : $url;
				$custom_title = $item['custom_title'] ? $item['custom_title'] : $title;
				
				$social_name  = $item['social_list'];
				$default_share_text = ucfirst( $social_name );
				$image = isset($item['image']['url'])? $item['image']['url']: '';
				$twitter_handle = $item['twitter_handle'];
				$email_to = $item['email_to'];
				$email_subject = $item['email_subject'];
				$hashtags = $item['hashtags'];
				
				$this->set_render_attribute( $link_key, 'data-sharer', esc_attr( $social_name ) );
				$this->set_render_attribute( $link_key, 'data-url', $share_url );
				$this->set_render_attribute( $link_key, 'data-title', $custom_title );
				$this->set_render_attribute( $link_key, 'data-hashtags', $hashtags ? esc_html( $hashtags ) : '' );
				$this->set_render_attribute( $link_key, 'data-image', esc_url( $image ) );
				$this->set_render_attribute( $link_key, 'data-to', esc_attr( $email_to ) );
				$this->set_render_attribute( $link_key, 'data-subject', esc_attr( $email_subject ) );

				?>
				<li class="elementor-grid-item">
					<a <?php echo $this->get_render_attribute_string( $link_key ); ?>>
						<span class="elementor-screen-only"><?php echo ucwords( $social ); ?></span>
						<?php
						if ( $is_new || $migrated ) {
							Icons_Manager::render_icon( $item['social_icon'] );
						} else { ?>
							<i class="<?php echo esc_attr( $item['social'] ); ?>"></i>
						<?php } ?>
					</a>
				</li>
			<?php }
			echo '</ul>';

		echo '</div><!-- .social-share-wrapper -->';
		

	}
		
}