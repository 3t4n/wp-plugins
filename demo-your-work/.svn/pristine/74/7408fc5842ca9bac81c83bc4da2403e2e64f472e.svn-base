<?php
namespace DemoYourWork\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Demo Your Work
 *
 * Elementor widget Demo Your Work.
 *
 * @since 1.0.0
 */
class Demo_Your_Work extends Widget_Base {



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
		return 'demo-your-work';
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
		return __( 'Demo Your Work', 'demo-your-work' );
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
		return 'eicon-device-desktop';
	}

	public function get_keywords() {
		return [ 'demo', 'portfolio', 'work'];
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
		return [ 'general-elements' ];
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
		return [ 'demo-your-work' ];
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
	protected function _register_controls() {

		$this->start_controls_section(
			'section_type',
			[
				'label' => __( 'Select a long height image', 'demo-your-work' ),
			]
		);

		$this->add_control(
			'demo_image',
			[
				 'label' => __( 'Choose Demo Image', 'demo-your-work' ),
				 'type' => Controls_Manager::MEDIA
			]
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
		ob_start();
		$image_id = $settings['demo_image']['id'];
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
?>
		<div class="cham-demo-wrapper">
			<div class="cham-demo-screen">
				<a href="<?php  echo $settings['demo_image']['url'] ?>" data-elementor-open-lightbox="yes" data-elementor-lightbox-title="<?php echo $image_alt; ?>">
					<img class="cham-demo-image" alt="<?php echo $image_alt; ?>" src="<?php echo $settings['demo_image']['url'] ?>" >
				</a>
			</div>
			<img alt="Manitor" class="cham-demo-frame" src="<?php echo plugins_url( '/assets/images/monitor.png', Demo_Your_Work__FILE__ ) ?>" />
		</div>
<?php
		echo ob_get_clean();
	}


	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>

		<div class="cham-demo-wrapper">
			<div class="cham-demo-screen">
				<a href="{{settings.demo_image.url}}" data-elementor-open-lightbox="yes" data-elementor-lightbox-title="image alt text">
					<img class="cham-demo-image" src="{{settings.demo_image.url}}" >
				</a>
			</div>
			<img class="cham-demo-frame" src="<?php echo plugins_url( '/assets/images/monitor.png', Demo_Your_Work__FILE__ ) ?>" />
		</div>

		<?php
	}

	



	
}
