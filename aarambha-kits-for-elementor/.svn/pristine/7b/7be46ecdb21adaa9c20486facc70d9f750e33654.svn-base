<?php
 /**
  * Aarambha Kits elementor base widget class
  *
  * @link       https://aarambhathemes.com/
  * @since      1.0.0
  *
  * @package    Aarambha_Kits
  * @subpackage Aarambha_Kits/includes/elementor/widgets
  * @author     Aarambha Themes <aarambhathemes@gmail.com>
  */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Typography;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Elementor Widget Base class.
 *
 * Class Base_Widget
 */
abstract class Base_Widget extends Widget_Base {

	/**
	 * Post number.
	 *
	 * @var int
	 */
	public $post_number = 4;

	/**
	 * Register Base_Widget widget controls.
	 *
	 * @access protected
	 */
	protected function register_controls() {

		/*----Content Tab----*/
		$this->__init_base_content_controls();
		$this->__init_base_query_controls();

		/*----Style Tab----*/
		$this->__init_base_style_controls();

	}

	protected function __init_base_content_controls() {

		// Block Heading Tab
		$this->start_controls_section(
			'block_heading',
			array(
				'label' => esc_html__( 'Block Heading', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Heading Text
		$this->add_control(
			'widget_title',
			array(
				'type'        => Controls_Manager::TEXT,
				'label'       => esc_html__( 'Text', 'aarambha-kits' ),
				'label_block' => true,
			)
		);

		// Heading Icon
		$this->add_control(
			'widget_title_icon',
			array(
				'label'       => esc_html__( 'Icon', 'aarambha-kits' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
			)
		);

		// Icon Position
		$this->add_control(
			'widget_title_icon_position',
			array(
				'label'       => esc_html__( 'Icon Position', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'flex-row',
				'options'     => array(
					'flex-row'         => esc_html__( 'Left', 'aarambha-kits' ),
					'flex-row-reverse' => esc_html__( 'Right', 'aarambha-kits' ),
				),
				'condition'   => array(
					'widget_title_icon[value]!' => '',
				),
				'label_block' => true,
			)
		);

		// Separator
		$this->add_control(
			'widget_title_sept',
			array(
				'label'     => esc_html__( 'Separator', 'aarambha-kits' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-heading-wrap' => 'border-bottom-width: 1px',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function __init_base_query_controls() {

		// WP Query
		$this->start_controls_section(
			'wp_query_heading',
			array(
				'label' => esc_html__( 'WP Query', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Categories
		$this->add_control(
			'base_tax_category_post_filter',
			array(
				'label'       => esc_html__( 'Categories', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => aarambha_kits_get_terms( 'category' ),
				'default'     => '',
				'multiple'    => true,
				'label_block' => true,
			)
		);

		// Tags
		$this->add_control(
			'base_tax_post_tag_post_filter',
			array(
				'label'       => esc_html__( 'Tags', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => aarambha_kits_get_terms( 'post_tag' ),
				'default'     => '',
				'multiple'    => true,
				'label_block' => true,
			)
		);

		// Exclude
		$this->add_control(
			'base_exclude_ids',
			array(
				'label'       => esc_html__( 'Posts Exclude', 'aarambha-kits' ),
				'description' => esc_html__( 'To exclude the posts, enter post ids with comma separator. Ex:- 11,12,13...', 'aarambha-kits' ),
				'placeholder' => esc_html__( 'Ex:- 11,12,13...', 'aarambha-kits' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		// Posts Limit
		$this->add_control(
			'base_posts_limit',
			array(
				'label'       => esc_html__( 'Posts Limit', 'aarambha-kits' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 1,
				'default'     => absint( $this->post_number ),
				'label_block' => false,
			)
		);

		// Posts Offset
		$this->add_control(
			'base_posts_offset',
			array(
				'label'       => esc_html__( 'Posts Offset', 'aarambha-kits' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 0,
				'min'         => 0,
				'label_block' => false,
			)
		);

		// Extra option control related to posts filter section.
		$this->__init_base_query_extra_controls();

		// Order By
		$this->add_control(
			'base_orderby',
			array(
				'label'       => esc_html__( 'Order By', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT,
				'separator'   => 'before',
				'default'     => 'date',
				'options'     => array(
					'ID'            => esc_html__( 'Post Id', 'aarambha-kits' ),
					'author'        => esc_html__( 'Post Author', 'aarambha-kits' ),
					'title'         => esc_html__( 'Title', 'aarambha-kits' ),
					'date'          => esc_html__( 'Date', 'aarambha-kits' ),
					'modified'      => esc_html__( 'Last Modified Date', 'aarambha-kits' ),
					'parent'        => esc_html__( 'Parent Id', 'aarambha-kits' ),
					'rand'          => esc_html__( 'Random', 'aarambha-kits' ),
					'comment_count' => esc_html__( 'Comment Count', 'aarambha-kits' ),
					'menu_order'    => esc_html__( 'Menu Order', 'aarambha-kits' ),
				),
				'label_block' => true,
			)
		);

		// Order
		$this->add_control(
			'base_order',
			array(
				'label'       => esc_html__( 'Order', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'desc',
				'options'     => array(
					'asc'  => esc_html__( 'Ascending', 'aarambha-kits' ),
					'desc' => esc_html__( 'Descending', 'aarambha-kits' ),
				),
				'label_block' => true,
			)
		);

		$this->end_controls_section();
	}

	protected function __init_base_query_extra_controls() {

	}

	protected function __init_base_style_controls() {

		// Block Heading Tab
		$this->start_controls_section(
			'block_style_heading',
			array(
				'label' => esc_html__( 'Block Heading', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'block_heading_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-heading-wrap .widget-heading-elements' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Margin
		$this->add_responsive_control(
			'block_heading_margin',
			array(
				'label'      => esc_html__( 'Margin', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-heading-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator'  => 'after',
			)
		);

		// Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'block_heading_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-block-heading-wrap .widget-heading-elements >*:not(i)',
			)
		);

		// Heading Color
		$this->add_control(
			'block_heading_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Color', 'aarambha-kits' ),
				'default'   => '#ffffff',
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-heading-wrap .widget-heading-elements >*' => 'color: {{VALUE}}',
					'{{WRAPPER}} .aarambha-kits-block-heading-wrap .widget-heading-elements svg' => 'fill: {{VALUE}}',
				),

			)
		);
		// Heading Background Color
		$this->add_control(
			'block_heading_background_color',
			array(
				'type'      => Controls_Manager::COLOR,
				'label'     => esc_html__( 'Background Color', 'aarambha-kits' ),
				'default'   => '#289dcc',
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-heading-wrap .widget-heading-elements' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .aarambha-kits-block-heading-wrap' => 'border-bottom-color: {{VALUE}}',
				),

			)
		);

		$this->end_controls_section();
	}

	/**
	 * Displays the widget heading.
	 *
	 * @param string $settings The available widget heading options.
	 */
	public function widget_heading( $settings ) {
		
		if ( empty( $settings['widget_title'] ) ) {
			return;
		}

		$this->add_render_attribute( 'widget_heading_wrap', 'class', 'aarambha-kits-block-heading-wrap' );
		$this->add_render_attribute( 'widget_heading_inner_wrap', 'class', 'd-inline-flex' );
		if ( isset( $settings['widget_title_icon'] ) && ! empty( $settings['widget_title_icon']['library'] ) ) {
			$this->add_render_attribute( 'widget_heading_wrap', 'class', 'icon-active' );
			// Icon Position
			$this->add_render_attribute( 'widget_heading_inner_wrap', 'class', esc_attr( $settings['widget_title_icon_position'] ) );
			$this->add_render_attribute( 'widget_heading_inner_wrap', 'class', 'align-items-center' );
		}
		$this->add_render_attribute( 'widget_heading_inner_wrap', 'class', 'widget-heading-elements' );

		?>
		<h4 <?php $this->print_render_attribute_string( 'widget_heading_wrap' ); ?>>
			<div <?php $this->print_render_attribute_string( 'widget_heading_inner_wrap' ); ?>>
				<?php Icons_Manager::render_icon( map_deep( wp_unslash( $settings['widget_title_icon'] ), 'sanitize_text_field' ), [ 'aria-hidden' => 'true' ] ); ?>
				<label><?php echo esc_html( $settings['widget_title'] ); ?></label>
			</div>
		</h4><!-- .aarambha-kits-block-heading-wrap -->
		<?php
	}

	/**
	 * Displays the post title within the widgets.
	 */
	public function the_title() {
		?>
		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php
	}

	/**
	 * Displays the featured image of the post within the widgets.
	 *
	 * @param string $size The featured image size.
	 */
	public function the_post_thumbnail( $size = '' ) {
		?>
		<a href="<?php the_permalink(); ?>" class="aarambha-kits-thumb-link">
			<?php the_post_thumbnail( $size ); ?>
		</a>
		<?php
	}
}
