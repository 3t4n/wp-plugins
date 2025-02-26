<?php

namespace Soft_Accordion;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

defined( 'ABSPATH' ) || exit();

/**
 * Class Soft_Accordion_Widget
 *
 * This class defines the Soft Accordion Widget for Elementor.
 * It includes methods to register and render the widget.
 *
 * @package SoftAccordion
 * @subpackage Elementor
 * @since 1.0.0
 */
class Soft_Accordion_Widget extends Widget_Base {


	/**
	 * Get widget name.
	 *
	 * Retrieve the name of the soft accordion widget.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'soft-accordion';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve the title for the soft accordion widget.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Soft Accordion', 'soft-accordion' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve the icon for the soft accordion widget.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_icon() {
		return 'eicon-toggle';
	}

	/**
	 * Get style dependencies.
	 *
	 * Retrieve the list of style dependencies the widget requires.
	 *
	 * @return array Style dependencies.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_style_depends() {
		return array( 'sa-frontend' );
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the soft accordion widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_categories() {
		return array( 'basic' );
	}

	/**
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * Used to determine where that widget appears in the elementor library.
	 *
	 * @return array
	 * @since 1.0.0
	 * @access public
	 */
	public function get_keywords() {
		return array(
			'soft-accordion',
			'soft',
			'accordion',
			'faq',
		);
	}

	/**
	 * Register the controls for the widget.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	public function register_controls() {

		// form control section start here.
		$this->start_controls_section(
			'_section_module_contact_form',
			array(
				'label' => __( 'Soft Accordion', 'soft-accordion' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$options = array();

		$accordions = soft_accordion_get_accordion_data();

		if ( ! empty( $accordions ) ) {
			foreach ( $accordions as $accordion ) {
				$options[ $accordion['id'] ] = $accordion['title'];
			}
		}

		array_unshift( $options, __( 'Select Accordion', 'soft-accordion' ) );

		$this->add_control(
			'accordion_id',
			array(
				'label'       => __( 'Accordion', 'soft-accordion' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => true,
				'options'     => $options,
			)
		);

		$this->end_controls_section();
		// form control section stop here.
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * @return void
	 */
	public function render() {

		$settings = $this->get_settings_for_display();

		$accordion_id = ! empty( $settings['accordion_id'] ) ? intval( $settings['accordion_id'] ) : '';

		if ( ! empty( $accordion_id ) ) {
			echo do_shortcode( '[soft_accordion id="' . $accordion_id . '"]' );
		} elseif ( \Elementor\Plugin::$instance->editor->is_edit_mode() && empty( $accordion_id ) ) {
			?>
			<div class="soft-accordion-wrap" style="border: 1px dashed #bfbfbf;padding: 50px;text-align: center;">
				<h3><?php echo esc_html( 'Soft Accordion', 'soft-accordion' ); ?></h3>
				<p style="margin-bottom: 0;"><?php echo esc_html( 'Please select a accordion to display Accordion.', 'soft-accordion' ); ?></p>
			</div>
			<?php

		}
	}
}
