<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.

class Advanced_Featured_Item_List_Widget extends Widget_Base {

	public function get_name() {
		return 'advanced-feature-list';
	}

	public function get_title() {
		return esc_html__( 'Advanced Feature List', 'advamentor ' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
	}

    public function get_categories() {
        return [ 'advamentor' ];
    }

	protected function _register_controls() {
		/**
		 * Feature List Settings
		 */
		$this->start_controls_section(
			'advanced_advamentor__feature_list_content_settings',
			[
				'label' => esc_html__( 'Content Settings', 'advamentor ' )
			]
		);

		$this->add_control(
			'advanced_feature_list',
			[
				'label'       => esc_html__( 'Feature Item', 'advamentor ' ),
				'type'        => Controls_Manager::REPEATER,
				'seperator'   => 'before',
				'default'     => [
					[
						'advanced_feature_list_icon'    => 'fa fa-check',
						'advanced_feature_list_title'   => esc_html__( 'Feature Item 1', 'advamentor ' ),
						'advanced_feature_list_content' => esc_html__( 'Feature Item 1 content', 'advamentor ' )
					],
					[
						'advanced_feature_list_icon'    => 'fa fa-times',
						'advanced_feature_list_title'   => esc_html__( 'Feature Item 2', 'advamentor ' ),
						'advanced_feature_list_content' => esc_html__( 'Feature Item 2 content', 'advamentor ' )
					],
					[
						'advanced_feature_list_icon'    => 'fa fa-dot-circle-o',
						'advanced_feature_list_title'   => esc_html__( 'Feature Item 3', 'advamentor ' ),
						'advanced_feature_list_content' => esc_html__( 'Feature Item 3 content', 'advamentor ' )
					]
				],
				'fields'      => [
					[
						'name'        => 'advanced_feature_list_icon_type',
						'label'       => esc_html__( 'Icon Type', 'advamentor ' ),
						'type'        => Controls_Manager::CHOOSE,
						'options'     => [
							'icon'  => [
								'title' => esc_html__( 'Icon', 'advamentor ' ),
								'icon'  => 'fa fa-star',
							],
							'image' => [
								'title' => esc_html__( 'Image', 'advamentor ' ),
								'icon'  => 'fa fa-picture-o',
							],
						],
						'default'     => 'icon',
						'label_block' => false,
					],
					[
						'name'    => 'advanced_feature_list_icon',
						'label'   => esc_html__( 'Icon', 'advamentor ' ),
						'type'    => Controls_Manager::ICON,
						'default' => 'fa fa-plus',
						'condition' => [
							'advanced_feature_list_icon_type' => 'icon'
						]
					],
					[
						'name'      => 'advanced_feature_list_img',
						'label'     => esc_html__( 'Image', 'advamentor ' ),
						'type'      => Controls_Manager::MEDIA,
						'default'   => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'advanced_feature_list_icon_type' => 'image'
						]
					],
					[
						'name'    => 'advanced_feature_list_title',
						'label'   => esc_html__( 'Title', 'advamentor ' ),
						'type'    => Controls_Manager::TEXT,
						'default' => esc_html__( 'Title', 'advamentor ' ),
						'dynamic' => [ 'active' => true ]
					],
					[
						'name'    => 'advanced_feature_list_content',
						'label'   => esc_html__( 'Content', 'advamentor ' ),
						'type'    => Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'advamentor ' ),
						'dynamic' => [ 'active' => true ]
					],
					[
						'name'        => 'advanced_feature_list_link',
						'label'       => esc_html__( 'Link', 'advamentor ' ),
						'type'        => Controls_Manager::URL,
						'dynamic'     => [ 'active' => true ],
						'placeholder' => esc_html__( 'https://your-link.com', 'advamentor ' ),
						'separator'   => 'before',
					],
				],
				'title_field' => '<i class="{{ advanced_feature_list_icon }}" aria-hidden="true"></i> {{{ advanced_feature_list_title }}}',
			]
		);

		$this->add_control(
			'advanced_feature_list_title_size',
			[
				'label'     => esc_html__( 'Title HTML Tag', 'advamentor ' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default'   => 'h3',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'advanced_feature_list_icon_shape',
			[
				'label'       => esc_html__( 'Icon Shape', 'advamentor ' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'circle',
				'label_block' => false,
				'options'     => [
					'circle'  => esc_html__( 'Circle', 'advamentor ' ),
					'square'  => esc_html__( 'Square', 'advamentor ' ),
					'rhombus' => esc_html__( 'Rhombus', 'advamentor ' ),
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_icon_shape_view',
			[
				'label'       => esc_html__( 'Shape View', 'advamentor ' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'stacked',
				'label_block' => false,
				'options'     => [
					'framed'  => esc_html__( 'Framed', 'advamentor ' ),
					'stacked' => esc_html__( 'Stacked', 'advamentor ' )
				],
			]
		);

		$this->add_responsive_control(
			'advanced_feature_list_icon_position',
			[
				'label'           => esc_html__( 'Icon Position', 'advamentor ' ),
				'type'            => Controls_Manager::CHOOSE,
				'options'         => [
					'left'  => [
						'title' => esc_html__( 'Left', 'advamentor ' ),
						'icon'  => 'fa fa-align-left',
					],
					'top'   => [
						'title' => esc_html__( 'Top', 'advamentor ' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'advamentor ' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'         => 'left',
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => 'left',
				'tablet_default'  => 'left',
				'mobile_default'  => 'left',
				'prefix_class'    => '%sicon-position-',
				'toggle'          => false,
			]
		);

		$this->add_control(
			'advanced_feature_list_connector',
			[
				'label'        => esc_html__( 'Show Connector', 'advamentor ' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Show', 'advamentor ' ),
				'label_off'    => esc_html__( 'No', 'advamentor ' ),
				'return_value' => 'yes',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Feature List Style
		 * -------------------------------------------
		 */

		$this->start_controls_section(
			'advanced_advamentor__feature_list_style',
			[
				'label' => esc_html__( 'List', 'advamentor ' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'advanced_feature_list_space_between',
			[
				'label'     => esc_html__( 'Space Between', 'advamentor ' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 15,
				],
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-items .advanced-feature-list-item:not(:last-child)'                              => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .advanced-feature-list-items .advanced-feature-list-item:not(:first-child)'                             => 'margin-top: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .advanced-feature-list-items.connector-type-modern .advanced-feature-list-item:not(:last-child):before' => 'height: calc(100% + {{SIZE}}{{UNIT}})',
					'body.rtl {{WRAPPER}} .advanced-feature-list-items .advanced-feature-list-item:after'                                => 'left: calc(-{{SIZE}}{{UNIT}}/2)',
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_connector_type',
			[
				'label'       => esc_html__( 'Connector Type', 'advamentor ' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'connector-type-classic',
				'label_block' => false,
				'options'     => [
					'connector-type-classic' => esc_html__( 'Classic', 'advamentor ' ),
					'connector-type-modern'  => esc_html__( 'Modern', 'advamentor ' ),
				],
				'condition'   => [
					'advanced_feature_list_connector'      => 'yes',
					'advanced_feature_list_icon_position!' => 'top',
				],
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'advanced_feature_list_connector_styles',
			[
				'label'       => esc_html__( 'Connector Styles', 'advamentor ' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'solid',
				'label_block' => false,
				'options'     => [
					'solid'  => esc_html__( 'Solid', 'advamentor ' ),
					'dashed' => esc_html__( 'Dashed', 'advamentor ' ),
					'dotted' => esc_html__( 'Dotted', 'advamentor ' ),
				],
				'condition'   => [
					'advanced_feature_list_connector' => 'yes',
				],
				'selectors'   => [
					'{{WRAPPER}} .connector-type-classic .connector'                                                                                      => 'border-style: {{VALUE}};',
					'{{WRAPPER}} .connector-type-modern .advanced-feature-list-item:before, {{WRAPPER}} .connector-type-modern .advanced-feature-list-item:after' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_connector_color',
			[
				'label'     => esc_html__( 'Connector Color', 'advamentor ' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default'   => '#3858f4',
				'selectors' => [
					'{{WRAPPER}} .connector-type-classic .connector'                                                                                      => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .connector-type-modern .advanced-feature-list-item:before, {{WRAPPER}} .connector-type-modern .advanced-feature-list-item:after' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'advanced_feature_list_connector' => 'yes',
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_connector_width',
			[
				'label'     => esc_html__( 'Connector Width', 'advamentor ' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 1,
				],
				'range'     => [
					'px' => [
						'min' => 1,
						'max' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .connector-type-classic .connector'                                                                                                                                => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.icon-position-left .connector-type-modern .advanced-feature-list-item:before, {{WRAPPER}}.icon-position-left .connector-type-modern .advanced-feature-list-item:after'   => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.icon-position-right .connector-type-modern .advanced-feature-list-item:before, {{WRAPPER}}.icon-position-right .connector-type-modern .advanced-feature-list-item:after' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'advanced_feature_list_connector' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Feature List Icon Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_advamentor__feature_list_style_icon',
			[
				'label' => esc_html__( 'Icon', 'advamentor ' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'advanced_feature_list_primary_color',
			[
				'label'     => esc_html__( 'Primary Color', 'advamentor ' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default'   => '#3858f4',
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-items.stacked .advanced-feature-list-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .advanced-feature-list-items.framed .advanced-feature-list-icon'  => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_secondary_color',
			[
				'label'     => esc_html__( 'Secondary Color', 'advamentor ' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-items.framed .advanced-feature-list-icon'  => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .advanced-feature-list-items.stacked .advanced-feature-list-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'advanced_feature_list_icon_space',
			[
				'label'           => esc_html__( 'Spacing', 'advamentor ' ),
				'type'            => Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}}.icon-position-left .advanced-feature-list-content-box, {{WRAPPER}}.icon-position-right .advanced-feature-list-content-box, {{WRAPPER}}.icon-position-top .advanced-feature-list-content-box' => 'margin: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}}.-mobileicon-position-left .advanced-feature-list-content-box'                                                                                                                  => 'margin: {{SIZE}}{{UNIT}} 0 0 0 !important;',
					'(mobile){{WRAPPER}}.-mobileicon-position-right .advanced-feature-list-content-box'                                                                                                                 => 'margin: {{SIZE}}{{UNIT}} 0 0 0 !important;',
				],
			]
		);

		$this->add_responsive_control(
			'advanced_feature_list_icon_size',
			[
				'label'     => esc_html__( 'Size', 'advamentor ' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 30,
				],
				'range'     => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .advanced-feature-list-img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'advanced_feature_list_icon_padding',
			[
				'label'     => esc_html__( 'Padding', 'advamentor ' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 15,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_icon_border_width',
			[
				'label'     => esc_html__( 'Border Width', 'advamentor ' ),
				'type'      => Controls_Manager::DIMENSIONS,
				'default'   => [
					'top'    => '1',
					'right'  => '1',
					'bottom' => '1',
					'left'   => '1',
					'unit'   => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'advanced_feature_list_icon_shape_view' => 'framed',
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_icon_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'advamentor ' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .advanced-feature-list-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Feature List Content Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'advanced_advamentor__feature_list_style_content',
			[
				'label' => esc_html__( 'Content', 'advamentor ' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'advanced_feature_list_heading_title',
			[
				'label' => esc_html__( 'Title', 'advamentor ' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'advanced_feature_list_title_bottom_space',
			[
				'label'     => esc_html__( 'Spacing', 'advamentor ' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 10,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'advanced_feature_list_title_color',
			[
				'label'     => esc_html__( 'Color', 'advamentor ' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#414247',
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-content-box .advanced-feature-list-title' => 'color: {{VALUE}};',
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'advanced_feature_list_title_typography',
				'selector' => '{{WRAPPER}} .advanced-feature-list-content-box .advanced-feature-list-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'advanced_feature_list_description',
			[
				'label'     => esc_html__( 'Description', 'advamentor ' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'advanced_feature_list_description_color',
			[
				'label'     => esc_html__( 'Color', 'advamentor ' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .advanced-feature-list-content-box .advanced-feature-list-content' => 'color: {{VALUE}};',
				],
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'advanced_feature_list_description_typography',
				'selector' => '{{WRAPPER}} .advanced-feature-list-content-box .advanced-feature-list-content',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'advanced_feature_list', [
			'id'    => 'advanced-feature-list-' . esc_attr( $this->get_id() ),
			'class' => [
				'advanced-feature-list-items',
				$settings['advanced_feature_list_icon_shape'],
				$settings['advanced_feature_list_icon_shape_view'],
				$settings['advanced_feature_list_connector_type'],
			]
		] );

		if ( ( $settings['advanced_feature_list_icon_position'] == 'top' ) && ( $settings['advanced_feature_list_connector'] == 'yes' ) ) {
			$this->add_render_attribute( 'advanced_feature_list', 'class', 'connector-type-modern' );
		}

		$this->add_render_attribute( 'advanced_feature_list_item', 'class', 'advanced-feature-list-item' );

		$padding = $settings['advanced_feature_list_icon_padding']['size'];
		$font    = $settings['advanced_feature_list_icon_size']['size'];
		$border  = $settings['advanced_feature_list_icon_border_width']['right'] + $settings['advanced_feature_list_icon_border_width']['left'];


		if ( $settings['advanced_feature_list_icon_shape'] == 'rhombus' ) {
		    $margin = 30;
			$connector_width = ( $padding * 2 ) + $font + $border + $margin;
		} else {
			$connector_width = ( $padding * 2 ) + $font + $border;
		}


		if ( $settings['advanced_feature_list_icon_position'] == 'left' ) {

			$connector = 'right: calc(100% - ' . $connector_width . 'px) !important; left: 0;';

		} else {
			$connector = 'left: calc(100% - ' . $connector_width . 'px) !important; right: 0;';
		}


		?>

        <ul <?php echo $this->get_render_attribute_string( 'advanced_feature_list' ); ?>>
			<?php $i = 0;
			foreach ( $settings['advanced_feature_list'] as $index => $item ) :

				$list_icon_setting_key = $this->get_repeater_setting_key( 'advanced_feature_list_icon', 'advanced_feature_list', $index );
				$list_title_setting_key = $this->get_repeater_setting_key( 'advanced_feature_list_title', 'advanced_feature_list', $index );
				$list_content_setting_key = $this->get_repeater_setting_key( 'advanced_feature_list_content', 'advanced_feature_list', $index );
				$list_link_setting_key = $this->get_repeater_setting_key( 'advanced_feature_list_link', 'advanced_feature_list', $index );

				$this->add_render_attribute( $list_icon_setting_key, 'class', 'advanced-feature-list-icon' );
				$this->add_render_attribute( $list_title_setting_key, 'class', 'advanced-feature-list-title' );
				$this->add_render_attribute( $list_content_setting_key, 'class', 'advanced-feature-list-content' );

				$feature_icon_attributes = $this->get_render_attribute_string( $list_icon_setting_key );

				$feature_icon_tag = 'span';
				$feature_has_icon = ! empty( $item['advanced_feature_list_icon'] );

				if ( ! empty( $item['advanced_feature_list_link']['url'] ) ) {
					$this->add_render_attribute( $list_link_setting_key, 'href', $item['advanced_feature_list_link']['url'] );

					if ( $item['advanced_feature_list_link']['is_external'] ) {
						$this->add_render_attribute( $list_link_setting_key, 'target', '_blank' );
					}

					if ( $item['advanced_feature_list_link']['nofollow'] ) {
						$this->add_render_attribute( $list_link_setting_key, 'rel', 'nofollow' );
					}

					$feature_icon_tag = 'a';
				}

				$feature_link_attributes = $this->get_render_attribute_string( $list_link_setting_key );

				?>
                <li class="advanced-feature-list-item">
					<?php if ( 'yes' == $settings['advanced_feature_list_connector'] ) : ?>
                        <span class="connector" style="<?php echo $connector; ?>"></span>
					<?php endif; ?>

					<?php if ( $feature_has_icon ) : ?>

                        <div class="advanced-feature-list-icon-box">
                        <<?php echo implode( ' ', [
							$feature_icon_tag,
							$feature_icon_attributes,
							$feature_link_attributes
						] ); ?>>

                        <?php if ($item['advanced_feature_list_icon_type'] == 'icon') { ?>
                            <i class="<?php echo esc_attr( $item['advanced_feature_list_icon'] ); ?>" aria-hidden="true"></i>
                        <?php } ?>

                        <?php if ($item['advanced_feature_list_icon_type'] == 'image') {
							$this->add_render_attribute('feature_list_image'.$i, [
								'src'	=> esc_url( $item['advanced_feature_list_img']['url'] ),
								'class'	=> 'advanced-feature-list-img',
								'alt'	=> esc_attr( $item['advanced_feature_list_title'] )
							]);

                            ?>
                            <img <?php echo $this->get_render_attribute_string('feature_list_image'.$i); ?>>
                        <?php } ?>

                        </<?php echo $feature_icon_tag; ?>>
                        </div>

					<?php endif; ?>

                    <div class="advanced-feature-list-content-box">
                        <<?php echo implode( ' ', [
							$settings['advanced_feature_list_title_size'],
							$this->get_render_attribute_string( $list_title_setting_key )
						] ); ?>
                        ><?php echo $item['advanced_feature_list_title']; ?></<?php echo $settings['advanced_feature_list_title_size']; ?>
                    >
                    <p <?php echo $this->get_render_attribute_string( $list_content_setting_key ); ?>><?php echo $item['advanced_feature_list_content']; ?></p>
                    </div>

                </li>
			<?php $i++; endforeach; ?>
        </ul>
		<?php
	}
}
