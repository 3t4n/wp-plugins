<?php
/**
 * Aarambha Kits Elementor Block Element 1
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Aarambha Addons for Elementor
 *
 * Block Heading
 *
 * @since 1.0.0
 */
class Aarambha_Kits_Block_Element_1 extends Base_Widget {

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
		return 'aarambha-kits-block-heading';
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
		return esc_html__( 'Block Heading', 'aarambha-kits' );
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
		return 'aarambha-kits-badge block-element-1';
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
			'aarambha-kits-public',
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
		$this->__init_base_content_controls();

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
				'default'     => esc_html__( 'Block Heading', 'aarambha-kits' ),
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
		?>
		<div class="aarambha-kits-container aarambha-kits-block-heading">
			<?php
			// Displays the widget heading.
			$this->widget_heading( $settings );
			?>
		</div><!-- .aarambha-kits-container -->
		<?php
	}
}
