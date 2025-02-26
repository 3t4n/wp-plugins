<?php
/**
 * Aarambha Kits Elementor Block Element 2
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
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Aarambha Addons for Elementor
 *
 * News Ticker
 *
 * @since 1.0.0
 */
class Aarambha_Kits_Block_Element_2 extends Base_Widget {

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
		return 'aarambha-kits-block-news-ticker';
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
		return esc_html__( 'Block News Ticker', 'aarambha-kits' );
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
		return 'aarambha-kits-badge block-element-2';
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
			'aarambha-kits-newsticker',
		);
		if ( Icons_Manager::is_migration_allowed() ) {
			$styles[] = 'elementor-icons-fa-solid';
			$styles[] = 'elementor-icons-fa-brands';
		}
		return $styles;
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array(
			'aarambha-kits-newsticker',
		);
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
		$this->__init_base_content_controls();
		$this->__init_content_controls();
		$this->__init_base_query_controls();
		$this->__init_content_slider_controls();

		/*----Style Tab----*/
		$this->__init_base_style_controls();
		$this->__init_style_slide_controls();
		$this->__init_style_title_controls();
		$this->__init_style_date_controls();
	}

	protected function __init_content_controls() {

		// Content Tab
		$this->start_controls_section(
			'breaking_news_content',
			array(
				'label' => esc_html__( 'Content', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Style
		$this->add_control(
			'breaking_news_style',
			array(
				'label'       => esc_html__( 'Style', 'aarambha-kits' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'style-1',
				'options'     => array(
					'style-1' => esc_html__( 'Style 1', 'aarambha-kits' ),
					'style-2' => esc_html__( 'Style 2', 'aarambha-kits' ),
				),
				'label_block' => true,
			)
		);

		// Post Date
		$this->add_control(
			'breaking_news_data_enable',
			array(
				'label'       => esc_html__( 'Post Date', 'aarambha-kits' ),
				'type'        => Controls_Manager::SWITCHER,
				'label_on'    => esc_html__( 'Yes', 'aarambha-kits' ),
				'label_off'   => esc_html__( 'No', 'aarambha-kits' ),
				'default'     => 'no',
				'label_block' => false,
			)
		);

		$this->end_controls_section();

	}
	protected function __init_content_slider_controls() {
		// Slider Settings Tab
		$this->start_controls_section(
			'hero_slider_settings',
			array(
				'label' => esc_html__( 'Slider Settings', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		// Delay
		$this->add_control(
			'breaking_news_delay',
			array(
				'label'       => esc_html__( 'Delay', 'aarambha-kits' ) . ' (ms)',
				'description' => esc_html__( 'Delay between transitions (in ms).', 'aarambha-kits' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 3500,
			)
		);

		// Speed
		$this->add_control(
			'breaking_news_speed',
			array(
				'label'       => esc_html__( 'Speed', 'aarambha-kits' ) . ' (ms)',
				'description' => esc_html__( 'Duration of transition between slides (in ms).', 'aarambha-kits' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 600,
			)
		);

		$this->end_controls_section();

	}
	protected function __init_style_slide_controls() {
		// Slides
		$this->start_controls_section(
			'breaking_news_slides_style',
			array(
				'label' => esc_html__( 'Slides', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Text Shadow
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'text_shadow',
				'label'    => esc_html__( 'Text Shadow', 'aarambha-kits' ),
				'selector' => '{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a',
			)
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'        => 'breaking_news_slides_background',
				'label'       => esc_html__( 'Background', 'aarambha-kits' ),
				'types'       => array( 'classic', 'gradient' ),
				'exclude'     => array( 'image' ),
				'selector'    => '{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap',
				'label_block' => false,
			)
		);

		$this->end_controls_section();
	}
	protected function __init_style_title_controls() {
		// Ttitle
		$this->start_controls_section(
			'breaking_news_title_style',
			array(
				'label' => esc_html__( 'Title', 'aarambha-kits' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		// Padding
		$this->add_responsive_control(
			'breaking_news_title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a .entry-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'breaking_news_title_typography',
				'selector' => '{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a .entry-title',
			)
		);

		// Tabs Start
		$this->start_controls_tabs( 'breaking_news_title_tab_start' );

		// Normal Tab
		$this->start_controls_tab(
			'breaking_news_title_normal_tab',
			array(
				'label' => esc_html__( 'NORMAL', 'aarambha-kits' ),
			)
		);

		// Title Color
		$this->add_control(
			'breaking_news_title_color',
			array(
				'label'     => esc_html__( 'Text Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a .entry-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'breaking_news_title_hover_tab',
			array(
				'label' => esc_html__( 'HOVER', 'aarambha-kits' ),
			)
		);

		// Title Color
		$this->add_control(
			'breaking_news_title_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a:hover .entry-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		// Tabs End
		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function __init_style_date_controls() {
		// Post Date
		$this->start_controls_section(
			'breaking_news_date_style',
			array(
				'label'     => esc_html__( 'Date', 'aarambha-kits' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'breaking_news_data_enable' => 'yes',
				),
			)
		);

		// Padding
		$this->add_responsive_control(
			'breaking_news_date_padding',
			array(
				'label'      => esc_html__( 'Padding', 'aarambha-kits' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'separator'  => 'after',
				'selectors'  => array(
					'{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a .publish-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'breaking_news_date_typo',
				'selector' => '{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a .publish-date',
			)
		);

		// Text Color
		$this->add_control(
			'breaking_news_date_color',
			array(
				'label'     => esc_html__( 'Text Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a .publish-date' => 'color: {{VALUE}}',
				),
			)
		);

		// Background Color
		$this->add_control(
			'breaking_news_date_background_color',
			array(
				'label'     => esc_html__( 'Background Color', 'aarambha-kits' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .aarambha-kits-block-news-ticker-container .aarambha-kits-news-ticker-wrap ul li a .publish-date' => 'background-color: {{VALUE}}',
				),
			)
		);

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
		$settings      = $this->get_settings_for_display();
		$localize_vars = array();
		// type roll
		if ( isset( $settings['breaking_news_delay'] ) ) {
			$localize_vars['delay'] = absint( $settings['breaking_news_delay'] );
		}
		// type slide
		if ( isset( $settings['breaking_news_speed'] ) ) {
			$localize_vars['speed'] = absint( $settings['breaking_news_speed'] );
		}

		// Breaking news container
		$this->add_render_attribute( 'breaking_news_container', 'class', 'aarambha-kits-container aarambha-kits-block-news-ticker-container' );
		$this->add_render_attribute( 'breaking_news_container', 'class', esc_attr( $settings['breaking_news_style'] ) );
		$this->add_render_attribute( 'breaking_news_container', 'data-settings', esc_js( json_encode( $localize_vars ) ) );

		// Breaking news wrapper
		$this->add_render_attribute( 'breaking_news_wrap', 'class', 'aarambha-kits-news-ticker-wrap' );

		$args      = aarambha_kits_query_agrs( $settings, 1 );

		$the_query = new WP_Query( $args );
		?>
		<div <?php $this->print_render_attribute_string( 'breaking_news_container' ); ?>>
			<?php
			// Displays the widget heading.
			if ( $settings['breaking_news_style'] == 'style-1' ) {
				$this->widget_heading( $settings ); }
			?>
			<?php if ( $the_query->have_posts() ) : ?>
				<div <?php $this->print_render_attribute_string( 'breaking_news_wrap' ); ?>>
					<?php
					// Displays the widget heading.
					if ( $settings['breaking_news_style'] == 'style-2' ) {
						$this->widget_heading( $settings ); }
					?>
					<ul class="aarambha-kits-posts-list">
					<?php
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						?>
						<li>
							<a href="<?php the_permalink(); ?>" class="d-flex flex-row post-title">
							<?php if ( $settings['breaking_news_data_enable'] == 'yes' ) : ?>
								<div class="publish-date"><?php echo wp_kses_post( get_the_time( 'd M' ) ); ?></div>
							<?php endif; ?>
							<div class="entry-title"><?php the_title(); ?></div>
						</a>
						</li>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</ul>
				</div><!-- #ticker -->
			<?php endif; ?>
		</div><!-- .aarambha-kits-container -->
		
		<?php
	}
}
