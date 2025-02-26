<?php
namespace ElementorLayout\ServiceWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Elementor_Service_Post_Widget extends Widget_Base {

	use \AewElementorLayout\Traits\Helper;
	use \AewElementorLayout\Traits\RenderData;

	public function get_name() {
		return 'elementor-service-post-list';
	}

	public function get_title() {
		return __( 'Service Layout', 'alley-elementor-widget' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'aew-items' ];

	}

	protected function _register_controls() {

		$this->Aew_content_layout_options();
		$this->Aew_content_order_options();
		$this->Aew_content_image_options();
		$this->Aew_content_title_options();
		$this->Aew_content_excerpt_options();
		$this->Aew_content_readmore_options();

		$this->Aew_service_style_box_options();
		$this->Aew_service_style_image_options();

		$this->Aew_service_style_title_options();
		$this->Aew_service_style_content_options();
		$this->Aew_service_style_readmore_options();
		
	}

	/**
	 * Content Layout Options.
	 */
	private function Aew_content_layout_options() {

		$this->start_controls_section(
			'section_layout',
			[
				'label' => esc_html__( 'Layout', 'alley-elementor-widget' ),
			]
		);

		$this->add_control(
			'select_layout',
			[
				'label' => __( 'Grid Style', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'Layout 1', 'alley-elementor-widget' ),
					'2' => esc_html__( 'Layout 2', 'alley-elementor-widget' ),
					'3' => esc_html__( 'Layout 3', 'alley-elementor-widget' ),
					'4' => esc_html__( 'Layout 4', 'alley-elementor-widget' ),
				],
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'alley-elementor-widget' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5
			]
		);

		$this->end_controls_section();

	}

	
	/**
	 * Style Box Options.
	 */
	private function Aew_service_style_box_options() {

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __( 'Box', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Box alignment		
		$this->add_control(
			'content_align',
			[
				'label' => __( 'Alignment', 'alley-elementor-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .service-block .service-holder li' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Box internal padding.
		$this->add_responsive_control(
			'grid_items_style_padding',
			[
				'label'      => __( 'Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .service-block .service-holder li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Title color.
		$this->add_control(
			'box_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Box Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service-block .service-holder li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'box_style_tabs' );

		// Normal tab.
		$this->start_controls_tab(
			'box_style_tabs_normal',
			[
				'label'     => __( 'Normal', 'alley-elementor-widget' ),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .service-block .service-holder li',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .service-block .service-holder li',
			]
		);
		// Normal border radius
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .service-block .service-holder li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'box_style_tabs_hover',
			[
				'label'     => __( 'Hover', 'alley-elementor-widget' ),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .service-block .service-holder li:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .service-block .service-holder li:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'border_radius_hover',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .service-block .service-holder li:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Style Image Options.
	 */
	private function Aew_service_style_image_options() {

		// Box.
		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'grid_style_image_margin',
			[
				'label'      => __( 'Margin', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .service-holder .img-holder img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'image_box_style_tabs' );

		// Normal tab.
		$this->start_controls_tab(
			'image_box_style_tabs_normal',
			[
				'label'     => __( 'Normal', 'alley-elementor-widget' ),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .service-holder .img-holder img',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'label' => __( 'Box Shadow', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .service-holder .img-holder img',
			]
		);
		// Normal border radius
		$this->add_control(
			'image_border_radius_hover',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .service-holder .img-holder img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'image_box_style_tabs_hover',
			[
				'label'     => __( 'Hover', 'alley-elementor-widget' ),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border_hover',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .service-holder .img-holder img:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow_hover',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .service-holder .img-holder img:hover',
			]
		);
		// Hover border radius
		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .service-holder .img-holder img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Style > Title.
	 */
	private function Aew_service_style_title_options() {
		// Tab.
		$this->start_controls_section(
			'section_grid_title_style',
			[
				'label'     => __( 'Title', 'alley-elementor-widget' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		// Title typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'grid_title_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .service-holder .post-title',
			]
		);

		// Title color.
		$this->add_control(
			'grid_title_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service-holder .post-title' => 'color: {{VALUE}};',
				],
			]
		);

		// Title color.
		$this->add_control(
			'grid_title_hoverstyle_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Hover Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'separator' => '',
				'selectors' => [
					'{{WRAPPER}} .service-holder .post-title:hover' => 'color: {{VALUE}};',
				],
			]
		);

		// Title margin.
		$this->add_responsive_control(
			'grid_title_style_margin',
			[
				'label'      => __( 'Margin', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .service-holder .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Style > Content.
	 */
	private function Aew_service_style_content_options() {
		// Tab.
		$this->start_controls_section(
			'section_grid_content_style',
			[
				'label' => __( 'Content', 'alley-elementor-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Content typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'grid_content_style_typography',
				'scheme'    => Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .service-holder p',
			]
		);

		// Content color.
		$this->add_control(
			'grid_content_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .service-holder p' => 'color: {{VALUE}};',
				],
			]
		);

		// Content margin
		$this->add_responsive_control(
			'grid_content_style_margin',
			[
				'label'      => __( 'Margin', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .service-holder p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();	
	}
	
	/**
	 * Style > Readmore.
	 */
	private function Aew_service_style_readmore_options() {
		// Tab.
		$this->start_controls_section(
			'section_grid_readmore_style',
			[
				'label' => __( 'Read More', 'alley-elementor-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Readmore typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'grid_readmore_style_typography',
				'scheme'    => Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .service-holder a.apply-btn',
			]
		);
		$this->start_controls_tabs( 'readmore_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'readmore_style_normal_tabs',
			[
				'label'     => __( 'Normal', 'alley-elementor-widget' ),
			]
		);
		// Readmore color.
		$this->add_control(
			'grid_readmore_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service-holder a.apply-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover tab.
		$this->start_controls_tab(
			'readmore_style_hover_tabs',
			[
				'label'     => __( 'Hover', 'alley-elementor-widget' ),
			]
		);
		//Hover Readmore color.
		$this->add_control(
			'grid_readmore_hover_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .service-holder a.apply-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render( $instance = [] ) {
		
		// Get settings.
		$settings = $this->get_settings();
		$select_layout =$settings['select_layout'];

		?>
		<!-- featured-layout -->
		<section class="services-layout-<?php echo $select_layout; ?>">
			<div class="service-block">
			<?php 
				$posts_per_page = ( ! empty( $settings['posts_per_page'] ) ?  $settings['posts_per_page'] : 5 );

				$orderby = $settings['orderby'];
				$order = $settings['order'];

					$query_args = array(
									'posts_per_page' 		=> absint( $posts_per_page ),
									'post_type'				=> 'abt_services',
									'no_found_rows'  		=> true,
									'post__not_in'          => get_option( 'sticky_posts' ),
									'ignore_sticky_posts'   => true,
									'order'					=> $order,
									'orderby'				=> $orderby
								);
						
					$all_posts = new \WP_Query( $query_args );	
					
					if ( $all_posts->have_posts() ) :
				
						include( AEW_PlLUGIN_DIR . 'frontend/layouts/service-layout.php' );

					endif; 	
				?>	
			</div>
		</section>
		<!-- featured-layout -->
		<?php

	}

}
