<?php
/**
 * Aarambha Kits Block Element 16
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes/elementor/widgets
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

use Elementor\Icons_Manager;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Aarambha Addons for Elementor
 *
 * Block Service
 *
 * @since 1.0.0
 */
class Aarambha_Kits_Block_Element_16 extends Base_Widget {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'aarambha-kits-block-16-container';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Block Service', 'aarambha-kits' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'aarambha-kits-badge block-element-16';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'aarambha_kits_category' );
	}

	/**
	 * Retrieve the list of styles the widget depended on.
	 *
	 * Used to set styles dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
		$styles = array(
			'aarambha-kits-service',
		);
		if ( Icons_Manager::is_migration_allowed() ) {
			$styles[] = 'elementor-icons-fa-solid';
			$styles[] = 'elementor-icons-fa-brands';
		}
		return $styles;
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

		/*----Content Tab----*/
		$this->__init_content_controls();
		$this->__init_button_controls();

		/*----Style Tab----*/
		$this->__init_style_icon_controls();
		$this->__init_style_title_controls();
		$this->__init_style_desc_controls();
		$this->__init_style_button_controls();

	}

	protected function __init_content_controls() {

		// Content Tab
		$this->start_controls_section(
			'service_content',
			array(
				'label' => esc_html__( 'Content', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		 // Select Icon
		$this->add_control(
			'service_icon',
			array(
				'type'    => Controls_Manager::ICONS,
				'label'   => esc_html__( 'Icon', 'aarambha-kits' ),
				'default' => array(
					'value'   => 'fas fa-paint-brush',
					'library' => 'fa-solid',
				),
			)
		);

		// Title
		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'aarambha-kits' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Trendy Design', 'aarambha-kits' ),
			)
		);

		// Description
		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'aarambha-kits' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 5,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 'aarambha-kits' ),
			)
		);

		// HTML Tag
		$this->add_control(
			'title_html_tag',
			array(
				'label'       => esc_html__( 'Title HTML Tag', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'h1' => esc_html__( 'H1', 'aarambha-kits' ),
					'h2' => esc_html__( 'H2', 'aarambha-kits' ),
					'h3' => esc_html__( 'H3', 'aarambha-kits' ),
					'h4' => esc_html__( 'H4', 'aarambha-kits' ),
					'h5' => esc_html__( 'H5', 'aarambha-kits' ),
					'h6' => esc_html__( 'H6', 'aarambha-kits' ),
				),
				'default'     => 'h2',
				'separator'   => 'before',
				'label_block' => false,
			)
		);

		$this->end_controls_section();

	}
	protected function __init_button_controls() {

		// Button Tab
		$this->start_controls_section(
			'button_content',
			array(
				'label' => esc_html__( 'Button', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Text
		$this->add_control(
			'button_text',
			array(
				'label'       => esc_html__( 'Text', 'aarambha-kits' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Discover', 'aarambha-kits' ),
			)
		);

		// URL
		$this->add_control(
			'button_link',
			array(
				'label'         => esc_html__( 'URL', 'aarambha-kits' ),
				'type'          => Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url' => '#',
				),
				'label_block'   => true,
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_icon_controls() {
		// Title
		$this->start_controls_section(
			'icon_style',
			array(
				'label' => esc_html__( 'Icon', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'icon_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Margin
		$this->add_responsive_control(
			'icon_margin',
			array(
				'label'      => esc_html__( 'Margin', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		// Position
		$this->add_control(
			'icon_position',
			array(
				'label'   => esc_html__( 'Position', 'aarambha-kits' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'column',
				'options' => array(
					'row'    => array(
						'title' => esc_html__( 'Left', 'aarambha-kits' ),
						'icon'  => 'eicon-h-align-left',
					),
					'column' => array(
						'title' => esc_html__( 'Top', 'aarambha-kits' ),
						'icon'  => 'eicon-v-align-top',
					),
				),
			)
		);

		// Size
		$this->add_responsive_control(
			'icon_size',
			array(
				'label'      => esc_html__( 'Size', 'aarambha-kits' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px' => array(
						'min'  => 10,
						'max'  => 500,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon svg' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		 // Icon Color
		$this->add_control(
			'icon_color',
			array(
				'label'     => esc_html__( 'Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon svg' => 'fill: {{VALUE}}',
				),
			)
		);

		// Button Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'        => 'icon_background',
				'label'       => esc_html__( 'Background', 'aarambha-kits' ),
				'types'       => array( 'classic', 'gradient' ),
				'exclude'     => array( 'image' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon',
				'label_block' => false,
			)
		);

		 // Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'icon_border',
				'label'       => esc_html__( 'Border', 'aarambha-kits' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon',
				'label_block' => false,
			)
		);

		// Border Radius
		$this->add_responsive_control(
			'icon_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .icon-wrap .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_title_controls() {
		// Ttitle
		$this->start_controls_section(
			'title_style',
			array(
				'label' => esc_html__( 'Title', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Margin
		$this->add_responsive_control(
			'title_margin',
			array(
				'label'      => esc_html__( 'Margin', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-title',
			)
		);

		// Title Color
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_desc_controls() {
		// Ttitle
		$this->start_controls_section(
			'desc_style',
			array(
				'label' => esc_html__( 'Description', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'desc_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-content >*' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Margin
		$this->add_responsive_control(
			'desc_margin',
			array(
				'label'      => esc_html__( 'Margin', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-content >*' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		// Desc Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'desc_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-content >*',
			)
		);

		// Font Color
		$this->add_control(
			'desc_font_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .entry-content >*' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_button_controls() {
		// Title
		$this->start_controls_section(
			'button_style',
			array(
				'label' => esc_html__( 'Button', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Margin
		$this->add_responsive_control(
			'button_margin',
			array(
				'label'      => esc_html__( 'Margin', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link',
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'button_tab_start' );

		// Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			array(
				'label' => esc_html__( 'NORMAL', 'aarambha-kits' ),
			)
		);

		// Font Color
		$this->add_control(
			'button_font_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link' => 'color: {{VALUE}}',
				),
			)
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'        => 'button_bg',
				'label'       => esc_html__( 'Background', 'aarambha-kits' ),
				'types'       => array( 'classic', 'gradient' ),
				'exclude'     => array( 'image' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link',
				'label_block' => false,
			)
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border',
				'label'       => esc_html__( 'Border', 'aarambha-kits' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link',
				'label_block' => false,
			)
		);

		// Border Radius
		$this->add_control(
			'button_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'button_hover_tab',
			array(
				'label' => esc_html__( 'HOVER', 'aarambha-kits' ),
			)
		);

		// Font Color
		$this->add_control(
			'button_hover_color',
			array(
				'label'     => esc_html__( 'Font Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link:hover' => 'color: {{VALUE}}',
				),
			)
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'        => 'button_hover_bg',
				'label'       => esc_html__( 'Background', 'aarambha-kits' ),
				'types'       => array( 'classic', 'gradient' ),
				'exclude'     => array( 'image' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link:hover',
				'label_block' => false,
			)
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_hover_border',
				'label'       => esc_html__( 'Border', 'aarambha-kits' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link:hover',
				'label_block' => false,
			)
		);

		// Border Radius
		$this->add_control(
			'button_hover_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-service-container .aarambha-kits-service-wrapper .details-wrap .button-wrap .button-link:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		// Button
		$this->add_render_attribute( 'button_text', 'class', 'button-link d-inline-flex align-items-center overflow-hidden transition-35s' );
		$this->add_link_attributes( 'button_text', map_deep( wp_unslash( $settings['button_link'] ), 'sanitize_text_field' ) );
		?>
		<div class="aarambha-kits-container aarambha-kits-block-service-container">
			
			<div class="d-flex flex-<?php echo esc_attr( $settings['icon_position'] ); ?> aarambha-kits-service-wrapper">
				
				<?php if ( ! empty( $settings['service_icon']['value'] ) ) : ?>
					<div class="d-flex icon-wrap">
						<span class="icon">
							<?php Icons_Manager::render_icon( map_deep( wp_unslash( $settings['service_icon'] ), 'sanitize_text_field' ), [ 'aria-hidden' => 'true' ] ); ?>
						</span>
					</div><!-- .icon-wrap -->
				<?php endif; ?>


				<div class="details-wrap">
					
					<?php
					if ( ! empty( $settings['title'] ) ) :
						printf( '<%1$s class="entry-title">%2$s</%1$s>',
							Utils::validate_html_tag( $settings['title_html_tag'] ),
							esc_html($settings['title'])
						);
					endif;
					?>

					<?php if ( ! empty( $settings['description'] ) ) : ?>
						<div class="entry-content">
							<p><?php echo wp_kses_post( $settings['description'] ); ?></p>
						</div><!-- .entry-content -->
					<?php endif; ?>

					<?php if ( $settings['button_text'] ) : ?>
						<div class="d-flex button-wrap">
							<a <?php $this->print_render_attribute_string( 'button_text' ); ?>><?php echo esc_html( $settings['button_text'] ); ?></a>
						</div>
					<?php endif; ?>

				</div>
				
			</div><!-- .aarambha-kits-service-wrapper -->

		</div><!-- .aarambha-kits-container -->
		
		<?php
	}
}
