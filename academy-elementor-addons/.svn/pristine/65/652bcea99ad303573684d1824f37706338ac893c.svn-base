<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseThumbnail extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-thumbnail';
	}

	public function get_title() {
		return __( 'Course Thumbnail', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course thumbnail', 'course', 'thumbnail', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_thumbnail_content',
			[
				'label' => __( 'Course Thumbnail', 'academy-elementor-addons' ),
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'course_image',
				'default' => 'large',
				'separator' => 'none',
			]
		);

		$this->end_controls_section();

		// Product Style
		$this->start_controls_section(
			'course_thumbnail_style_section',
			array(
				'label' => __( 'Course Thumbnail', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_thumbnail',
			'{{WRAPPER}} .academy-single-course__preview img, {{WRAPPER}} .academy-single-course__preview iframe',
			[ 'border', 'radius', 'margin', 'box_shadow' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings   = $this->get_settings_for_display();
		$thumbnail_size = $settings['course_image_size'];
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$preview_video = \Academy\Helper::get_course_preview_video( $course_id );
		?>
		<div class="academy-single-course__preview">
			<?php
			if ( $preview_video ) :
					echo $preview_video;// phpcs:ignore WordPress.Security.EscapeOutput
				else : ?>
					<img class="academy-course__thumbnail-image" src="<?php echo esc_url( \Academy\Helper::get_the_course_thumbnail_url( $thumbnail_size ) ); ?>" alt="<?php esc_html_e( 'thumbnail', 'academy-elementor-addons' ); ?>">
				<?php endif; ?>
		</div>
		<?php
	}
}
