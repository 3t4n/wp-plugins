<?php
namespace AcademyEA\Traits;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use AcademyEA\Helper;

trait CommonStyle {

	/**
	 * Normal_element
	 *
	 * @param  mixed $uniqueid
	 * @param  mixed $selector
	 * @param  mixed $supports
	 * @param  mixed $codition
	 * @return void
	 */
	public function normal_element( $uniqueid, $selector, $supports = [ 'typography', 'color', 'icon_color', 'icon_size', 'text_shadow', 'background', 'border', 'radius', 'box_shadow', 'margin', 'padding', 'transition' ], $codition = [] ) {

		// Typgraphy
		if ( \in_array( 'typography', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => $uniqueid . '_typography',
					'selector'  => $selector,
					'condition' => $codition,
				]
			);

		endif;

		// Text Color
		if ( \in_array( 'color', $supports, true ) ) :

			$this->add_control(
				$uniqueid . '_text_color',
				[
					'label'     => esc_html__( 'Color', 'academy-elementor-addons' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						$selector => 'color: {{VALUE}};',
					],
					'condition' => $codition,
				]
			);

		endif;

		// Icon Color
		if ( \in_array( 'icon_color', $supports, true ) ) :

			$icon_selector = $selector . ' .academy-icon::before';

			$this->add_control(
				$uniqueid . '_icon_color',
				[
					'label'     => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						$icon_selector => 'color: {{VALUE}};',
					],
					'condition' => $codition,
				]
			);

		endif;

		// Icon Size
		if ( \in_array( 'icon_size', $supports, true ) ) :

			$icon_selector = $selector . ' span.academy-icon:before';

			$this->add_control(
				$uniqueid . '_icon_size',
				[
					'label'     => esc_html__( 'Icon Size', 'academy-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'size' => 16,
						'unit' => 'px',
					],
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						$icon_selector => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => $codition,
				]
			);

		endif;

		// Text Shadow
		if ( \in_array( 'text_shadow', $supports, true ) ) :

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name'     => $uniqueid . 'text_shadow_',
					'label'    => esc_html__( 'Text Shadow', 'academy-elementor-addons' ),
					'selector' => $selector,
					'condition' => $codition,
				]
			);

		endif;

		// Background
		if ( \in_array( 'background', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name'     => $uniqueid . 'text_background',
					'label'    => esc_html__( 'Background', 'academy-elementor-addons' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => $selector,
					'condition' => $codition,
				]
			);

		endif;

		// Border
		if ( \in_array( 'border', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'     => $uniqueid . '_border',
					'label'    => esc_html__( 'Border', 'academy-elementor-addons' ),
					'selector' => $selector,
					'condition' => $codition,
				]
			);

		endif;

		// Radius
		if ( \in_array( 'radius', $supports, true ) ) :

			$this->add_responsive_control(
				$uniqueid . '_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						$selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => $codition,
				]
			);

		endif;

		// Box Shadow
		if ( \in_array( 'box_shadow', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name'     => $uniqueid . 'box_shadow',
					'selector' => $selector,
					'condition' => $codition,
				]
			);

		endif;

		// Margin
		if ( \in_array( 'margin', $supports, true ) ) :

			$this->add_responsive_control(
				$uniqueid . '_margin',
				[
					'label'      => esc_html__( 'Margin', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => $codition,
				]
			);

		endif;

		// Padding
		if ( \in_array( 'padding', $supports, true ) ) :

			$this->add_responsive_control(
				$uniqueid . '_padding',
				[
					'label'      => esc_html__( 'Padding', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => $codition,
				]
			);

		endif;

		// Transition
		if ( \in_array( 'transition', $supports, true ) ) :

			$this->add_control(
				$uniqueid . '_transition',
				[
					'label'      => esc_html__( 'Transition', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0.1,
							'max'  => 3,
							'step' => 0.1,
						],
					],
					'default'    => [
						'unit' => 'px',
						'size' => 0.5,
					],
					'selectors'  => [
						$selector => 'transition: {{SIZE}}s;',

					],
					'condition' => $codition,
				]
			);

		endif;
	}

	public function normal_tab( $uniqueid, $selector ) {

		$this->start_controls_tab(
			$uniqueid . '_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);

		$this->normal_element( $uniqueid, $selector );

		$this->end_controls_tab();

	}
	/**
	 * Hover_element
	 *
	 * @param  mixed $uniqueid
	 * @param  mixed $hover_selector
	 * @param  mixed $supports
	 * @return void
	 */
	public function hover_element( $uniqueid, $hover_selector, $supports = [ 'color', 'icon_color', 'icon_size', 'text_shadow', 'background', 'border', 'radius', 'box_shadow' ] ) {

		// Typgraphy
		if ( \in_array( 'typography', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'hover_' . $uniqueid . '_typography',
					'selector' => $hover_selector,
				]
			);

		endif;

		// Hover Color
		if ( \in_array( 'color', $supports, true ) ) :

			$this->add_control(
				'hover_' . $uniqueid . '_color',
				[
					'label'     => esc_html__( 'Color', 'academy-elementor-addons' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						$hover_selector => 'color: {{VALUE}};',
					],
				]
			);

		endif;

		// Icon Color
		if ( \in_array( 'icon_color', $supports, true ) ) :

			$icon_hover_selector = $hover_selector . ' .academy-icon::before';

			$this->add_control(
				'hover_' . $uniqueid . '_icon_color',
				[
					'label'     => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => [
						$icon_hover_selector => 'color: {{VALUE}};',
					],
				]
			);

		endif;

		// Icon Size
		if ( \in_array( 'icon_size', $supports, true ) ) :

			$icon_hover_selector = $hover_selector . ' .academy-icon::before';

			$this->add_control(
				'hover_' . $uniqueid . '_icon_size',
				[
					'label'     => esc_html__( 'Icon Size', 'academy-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'size' => 16,
						'unit' => 'px',
					],
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						$icon_hover_selector => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

		endif;

		// Hover Text Shadow
		if ( \in_array( 'text_shadow', $supports, true ) ) :

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name'     => 'hover_' . $uniqueid . '_text_shadow',
					'label'    => esc_html__( 'Text Shadow', 'academy-elementor-addons' ),
					'selector' => $hover_selector,
				]
			);

		endif;

		// Hover Background
		if ( \in_array( 'background', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name'     => 'hover_' . $uniqueid . '_background',
					'label'    => esc_html__( 'Background', 'academy-elementor-addons' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => $hover_selector,
				]
			);

		endif;

		// Hover Border
		if ( \in_array( 'border', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'     => 'hover_' . $uniqueid . '_border',
					'label'    => esc_html__( 'Border', 'academy-elementor-addons' ),
					'selector' => $hover_selector,
				]
			);

		endif;

		// Hover Radius
		if ( \in_array( 'radius', $supports, true ) ) :

			$this->add_responsive_control(
				'hover_' . $uniqueid . '_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						$hover_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		endif;

		// Hover Box Shadow
		if ( \in_array( 'box_shadow', $supports, true ) ) :

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name'     => 'hover_' . $uniqueid . '_shadow',
					'selector' => $hover_selector,
				]
			);

		endif;

		// Padding
		if ( \in_array( 'padding', $supports, true ) ) :

			$this->add_responsive_control(
				'hover_' . $uniqueid . '_padding',
				[
					'label'      => esc_html__( 'Padding', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						$hover_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		endif;
	}
	/**
	 * Hover_tab
	 *
	 * @param  mixed $widget
	 * @param  mixed $element_name
	 * @param  mixed $hover_selector
	 * @return void
	 */
	public function hover_tab( $widget, $element_name, $hover_selector ) {

		$this->start_controls_tab(
			$widget . '_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element( $widget, $element_name, $hover_selector );

		$this->end_controls_tab();

	}
	/**
	 * Size_element
	 *
	 * @param  mixed $widget
	 * @param  mixed $element_name
	 * @param  mixed $selector
	 * @param  mixed $supports
	 * @return void
	 */
	public function size_element( $widget, $element_name, $selector, $supports = [ 'width', 'max_width', 'min_width', 'height' ] ) {

		// Width
		if ( \in_array( 'width', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_width',
				[
					'label'      => esc_html__( 'Width', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 3000,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'width: {{SIZE}}{{UNIT}};',

					],
				]
			);

		endif;

		// Max Width
		if ( \in_array( 'max_width', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_max_width',
				[
					'label'      => esc_html__( 'Max Width', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 3000,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'max-width: {{SIZE}}{{UNIT}};',

					],
				]
			);

		endif;

		// Min Width
		if ( \in_array( 'min_width', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_min_width',
				[
					'label'      => esc_html__( 'Min Width', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 3000,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'min-width: {{SIZE}}{{UNIT}};',

					],
				]
			);

		endif;

		// Height
		if ( \in_array( 'height', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_height',
				[
					'label'      => esc_html__( 'Height', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 500,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'height: {{SIZE}}{{UNIT}};',

					],
				]
			);

		endif;
	}
	/**
	 * Size_tab
	 *
	 * @param  mixed $widget
	 * @param  mixed $element_name
	 * @param  mixed $selector
	 * @return void
	 */
	public function size_tab( $widget, $element_name, $selector ) {
		$this->start_controls_tab(
			$widget . '_size_tab',
			[
				'label' => esc_html__( 'Size', 'academy-elementor-addons' ),
			]
		);

		$this->size_element( $widget, $element_name, $selector );

		$this->end_controls_tab();
	}
	/**
	 * Position Element
	 *
	 * @param  mixed $element_name
	 * @param  mixed $selector
	 * @param  mixed $supports
	 * @return void
	 */
	public function position_element( $element_name, $selector, $supports = [ 'position', 'left', 'top', 'bottom', 'right' ] ) {
		// Position
		if ( \in_array( 'position', $supports, true ) ) :
			$this->add_responsive_control(
				$element_name . '_position_type',
				[
					'label'     => esc_html__( 'Position', 'academy-elementor-addons' ),
					'type'      => \Elementor\Controls_Manager::SELECT,
					'default'   => '',
					'options'   => [
						'fixed'    => esc_html__( 'Fixed', 'academy-elementor-addons' ),
						'absolute' => esc_html__( 'Absolute', 'academy-elementor-addons' ),
						'relative' => esc_html__( 'Relative', 'academy-elementor-addons' ),
						'sticky'   => esc_html__( 'Sticky', 'academy-elementor-addons' ),
						'static'   => esc_html__( 'Static', 'academy-elementor-addons' ),
						'inherit'  => esc_html__( 'inherit', 'academy-elementor-addons' ),
						''         => esc_html__( 'none', 'academy-elementor-addons' ),
					],
					'selectors' => [
						$selector => 'position: {{VALUE}};',
					],

				]
			);

		endif;

		// Position Left
		if ( \in_array( 'left', $supports, true ) ) :

			$this->add_responsive_control(
				$element_name . '_position_left',
				[
					'label'      => esc_html__( 'Position Left', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1600,
							'max'  => 1600,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

		endif;

		// Position Top
		if ( \in_array( 'top', $supports, true ) ) :

			$this->add_responsive_control(
				$element_name . '_position_top',
				[
					'label'      => esc_html__( 'Position Top', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1600,
							'max'  => 1600,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

		endif;

		// Position Bottom
		if ( \in_array( 'bottom', $supports, true ) ) :

			$this->add_responsive_control(
				$element_name . '_position_bottom',
				[
					'label'      => esc_html__( 'Position Bottom', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1600,
							'max'  => 1600,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		endif;

		// Position Right
		if ( \in_array( 'right', $supports, true ) ) :

			$this->add_responsive_control(
				$element_name . '_position_right',
				[
					'label'      => esc_html__( 'Position Right', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1600,
							'max'  => 1600,
							'step' => 5,
						],
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],

					'selectors'  => [
						$selector => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

		endif;
	}
	/**
	 * Position Tab
	 *
	 * @param  mixed $widget
	 * @param  mixed $element_name
	 * @param  mixed $selector
	 * @return void
	 */
	public function position_tab( $widget, $element_name, $selector ) {

		$this->start_controls_tab(
			$widget . '_position_tab',
			[
				'label' => esc_html__( 'Position', 'academy-elementor-addons' ),
			]
		);

		$this->position_element( $widget, $element_name, $selector );

		$this->end_controls_tab();
	}
	/**
	 * Display Element
	 *
	 * @param  mixed $widget
	 * @param  mixed $element_name
	 * @param  mixed $selector
	 * @param  mixed $supports
	 * @return void
	 */
	public function display_element( $widget, $element_name, $selector, $supports = [ 'flex_direction', 'flex_basis', 'flex_grow', 'flex_shrink', 'order', 'flex_gap', 'flex_wrap', 'text_align', 'justify_content', 'align_items' ] ) {

		$this->add_responsive_control(
			$widget . '_section_' . $element_name . '_display',
			[
				'label'     => esc_html__( 'Display', 'academy-elementor-addons' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => '',
				'options'   => [
					'flex'         => esc_html__( 'Flex', 'academy-elementor-addons' ),
					'inline-flex'  => esc_html__( 'Inline Flex', 'academy-elementor-addons' ),
					'block'        => esc_html__( 'Block', 'academy-elementor-addons' ),
					'inline-block' => esc_html__( 'Inline Block', 'academy-elementor-addons' ),
					'grid'         => esc_html__( 'Grid', 'academy-elementor-addons' ),
					'none'         => esc_html__( 'None', 'academy-elementor-addons' ),
					''             => esc_html__( 'Default', 'academy-elementor-addons' ),
				],
				'selectors' => [
					$selector => 'display: {{VALUE}};',
				],
			]
		);

		// Flex Direction
		if ( \in_array( 'flex_direction', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_direction',
				[
					'label'     => esc_html__( 'Flex Direction', 'academy-elementor-addons' ),
					'type'      => \Elementor\Controls_Manager::SELECT,
					'default'   => '',
					'options'   => [
						'column'         => esc_html__( 'Column', 'academy-elementor-addons' ),
						'row'            => esc_html__( 'Row', 'academy-elementor-addons' ),
						'column-reverse' => esc_html__( 'Column Reverse', 'academy-elementor-addons' ),
						'row-reverse'    => esc_html__( 'Row Reverse', 'academy-elementor-addons' ),
						'revert'         => esc_html__( 'Revert', 'academy-elementor-addons' ),
						'none'           => esc_html__( 'None', 'academy-elementor-addons' ),
						''               => esc_html__( 'inherit', 'academy-elementor-addons' ),
					],
					'selectors' => [
						$selector => 'flex-direction: {{VALUE}};',
					],
					'condition' => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],
				]
			);

		endif;

		// Flex Basis
		if ( \in_array( 'flex_basis', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_basis',
				[
					'label'      => esc_html__( 'Item Width', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'condition'  => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 800,
							'step' => 1,
						],
						'%'  => [
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						],

					],

					'selectors'  => [
						$selector => 'flex-basis: {{SIZE}}{{UNIT}};',

					],
				]
			);

		endif;

		// Flex Grow
		if ( \in_array( 'flex_grow', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_grow',
				[
					'label'      => esc_html__( 'Item Grow', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'condition'  => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 800,
							'step' => 1,
						],

					],

					'selectors'  => [
						$selector => 'flex-grow: {{SIZE}}',

					],
				]
			);

		endif;

		// Flex Shrink
		if ( \in_array( 'flex_shrink', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_shrink',
				[
					'label'      => esc_html__( 'Item Shrink', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'condition'  => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 800,
							'step' => 1,
						],

					],

					'selectors'  => [
						$selector => 'flex-shrink: {{SIZE}}',

					],
				]
			);

		endif;

		// Flex Order
		if ( \in_array( 'order', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_order',
				[
					'label'      => esc_html__( 'Item Order', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'condition'  => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 800,
							'step' => 1,
						],

					],

					'selectors'  => [
						$selector => 'order: {{SIZE}}',

					],
				]
			);

		endif;

		// Flex Gap
		if ( \in_array( 'flex_gap', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_gap',
				[
					'label'      => esc_html__( 'Gap', 'academy-elementor-addons' ),
					'type'       => Controls_Manager::SLIDER,
					'condition'  => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 800,
							'step' => 1,
						],

					],

					'selectors'  => [
						$selector => 'gap: {{SIZE}}{{UNIT}};',

					],
				]
			);

		endif;

		// Flex Wrap
		if ( \in_array( 'flex_wrap', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_wrap',
				[
					'label'     => esc_html__( 'Flex Wrap', 'academy-elementor-addons' ),
					'type'      => \Elementor\Controls_Manager::SELECT,
					'default'   => '',
					'options'   => [
						'wrap'         => esc_html__( 'Wrap', 'academy-elementor-addons' ),
						'wrap-reverse' => esc_html__( 'Wrap Reverse', 'academy-elementor-addons' ),
						'nowrap'       => esc_html__( 'No Wrap', 'academy-elementor-addons' ),
						'unset'        => esc_html__( 'Unset', 'academy-elementor-addons' ),
						'normal'       => esc_html__( 'None', 'academy-elementor-addons' ),
						'inherit'      => esc_html__( 'inherit', 'academy-elementor-addons' ),
					],
					'selectors' => [
						$selector => 'flex-wrap: {{VALUE}};',
					],
					'condition' => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],
				]
			);

		endif;

		// Text Align
		if ( \in_array( 'text_align', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_alignment', [
					'label'     => esc_html__( 'Alignment', 'academy-elementor-addons' ),
					'type'      => \Elementor\Controls_Manager::CHOOSE,
					'options'   => [

						'left'    => [

							'title' => esc_html__( 'Left', 'academy-elementor-addons' ),
							'icon'  => 'fa fa-align-left',

						],
						'center'  => [

							'title' => esc_html__( 'Center', 'academy-elementor-addons' ),
							'icon'  => 'fa fa-align-center',

						],
						'right'   => [

							'title' => esc_html__( 'Right', 'academy-elementor-addons' ),
							'icon'  => 'fa fa-align-right',

						],

						'justify' => [

							'title' => esc_html__( 'Justified', 'academy-elementor-addons' ),
							'icon'  => 'fa fa-align-justify',

						],
					],

					'selectors' => [
						$selector => 'text-align: {{VALUE}};',
					],
					'condition' => [ $widget . '_section_' . $element_name . '_display' => [ 'block', 'inline-block' ] ],
				]
			);

		endif;

		// Flex Justify Content
		if ( \in_array( 'justify_content', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_align',
				[
					'label'     => esc_html__( 'Alignment', 'academy-elementor-addons' ),
					'type'      => \Elementor\Controls_Manager::SELECT,
					'default'   => '',
					'options'   => [
						'flex-start'    => esc_html__( 'Left', 'academy-elementor-addons' ),
						'flex-end'      => esc_html__( 'Right', 'academy-elementor-addons' ),
						'center'        => esc_html__( 'Center', 'academy-elementor-addons' ),
						'space-around'  => esc_html__( 'Space Around', 'academy-elementor-addons' ),
						'space-between' => esc_html__( 'Space Between', 'academy-elementor-addons' ),
						'space-evenly'  => esc_html__( 'Space Evenly', 'academy-elementor-addons' ),
						''              => esc_html__( 'inherit', 'academy-elementor-addons' ),
					],
					'condition' => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],

					'selectors' => [
						$selector => 'justify-content: {{VALUE}};',
					],
				]
			);

		endif;

		// Flex Align Items
		if ( \in_array( 'align_items', $supports, true ) ) :

			$this->add_responsive_control(
				$widget . '_section_' . $element_name . '_flex_align',
				[
					'label'     => esc_html__( 'Align Items', 'academy-elementor-addons' ),
					'type'      => \Elementor\Controls_Manager::SELECT,
					'default'   => '',
					'options'   => [
						'flex-start' => esc_html__( 'Left', 'academy-elementor-addons' ),
						'flex-end'   => esc_html__( 'Right', 'academy-elementor-addons' ),
						'center'     => esc_html__( 'Center', 'academy-elementor-addons' ),
						'baseline'   => esc_html__( 'Baseline', 'academy-elementor-addons' ),
						''           => esc_html__( 'inherit', 'academy-elementor-addons' ),
					],
					'condition' => [ $widget . '_section_' . $element_name . '_display' => [ 'flex', 'inline-flex' ] ],

					'selectors' => [
						$selector => 'align-items: {{VALUE}};',
					],
				]
			);

		endif;
	}
	/**
	 * Image Style
	 *
	 * @param  mixed $atts
	 * @return void
	 */
	public function image_style( $atts ) {
		$pairs = array(
			'title'         => esc_html__( 'Image Style', 'academy-elementor-addons' ),
			'slug'          => '_image_style',
			'element_name'  => '_academyea_',
			'selector'      => '{{WRAPPER}} ',
			'condition'     => '',
		);
		$atts_variable = shortcode_atts( $pairs, $atts );
		// phpcs:ignore WordPress.PHP.DontExtract.extract_extract
		extract( $atts_variable );

		$widget = $this->get_name() . '_' . Helper::heading_camelize( $slug );

		$tab_start_section_args = [
			'label' => $title,
			'tab'   => Controls_Manager::TAB_STYLE,
		];

		if ( is_array( $condition ) ) {
			$tab_start_section_args['condition'] = $condition;
		}

		$this->start_controls_section(
			$widget . '_style_section',
			$tab_start_section_args
		);

		$this->size_element( $widget, $element_name, $selector );

		$this->normal_element( $widget, $selector, [ 'border', 'radius', 'box_shadow' ] );

		$this->end_controls_section();
	}

	public function button_style( $atts ) {
		$atts_variable = shortcode_atts(
			[
				'title'          => esc_html__( 'Button Style', 'academy-elementor-addons' ),
				'slug'           => '_button_style',
				'selector'       => '{{WRAPPER}} ',
				'hover_selector' => '{{WRAPPER}} ',
				'condition'      => '',
			], $atts
		);
		// phpcs:ignore WordPress.PHP.DontExtract.extract_extract
		extract( $atts_variable );

		$widget = $this->get_name() . '_' . Helper::heading_camelize( $slug );

		$tab_start_section_args = [
			'label' => $title,
			'tab'   => Controls_Manager::TAB_STYLE,
		];

		if ( is_array( $condition ) ) {
			$tab_start_section_args['condition'] = $condition;
		}

		$this->start_controls_section(
			$widget . '_style_section',
			$tab_start_section_args
		);

		$this->start_controls_tabs( $widget . '_style_tabs' );

			$this->start_controls_tab(
				$widget . '_normal_style_tab',
				[
					'label' => __( 'Normal', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				$widget,
				$selector,
				[ 'typography', 'background', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				$widget . '_hover_style_tab',
				[
					'label' => __( 'Hover', 'academy-elementor-addons' ),
				]
			);

			$this->hover_element(
				$widget,
				$hover_selector,
				[ 'background', 'color' ]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			$widget . 'tab_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->normal_element(
			$widget,
			$selector,
			[ 'border', 'radius', 'padding', 'margin' ]
		);

		$this->end_controls_section();
	}

}
