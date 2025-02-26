<?php

namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class CourseSearch extends Widget_Base {

	use CommonStyle;

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
		add_filter( 'wp_ajax_nopriv_academy/shortcode/academy_course_search', array( $this, 'force_search_form_handler' ) );
	}

	public function force_search_form_handler( $default ) {

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return false;
		}
		return $default;
	}


	public function get_name() {
		return 'academyea-course-Search';
	}

	public function get_title() {
		return __( 'Course Search', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-site-search';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'search', 'course search', 'search course', 'ajex search' ];
	}

	protected function search_course_content() {
		$this->start_controls_section(
			'search_course_text',
			[
				'label' => __( 'General', 'academy-elementor-addons' ),
			]
		);
		$this->add_control(
			'search_text',
			[
				'label' => esc_html__( 'Title', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search Course', 'academy-elementor-addons' ),
				'placeholder' => esc_html__( 'Type your title here', 'academy-elementor-addons' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function search_course_style() {
		$this->start_controls_section(
			'search_course_style',
			[
				'label' => __( 'Search Bar Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->add_responsive_control(
			'search_course_height',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Search Bar Height', 'academy-elementor-addons' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .academy-search-form-wrap .academy-search-form__field-input' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'search_course_text_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} input[type=text]::placeholder ,{{WRAPPER}} .academy-icon , {{WRAPPER}} input[type=text]' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Text Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} input[type=text]::placeholder , {{WRAPPER}} .academy-icon ',
			]
		);
		$this->add_control(
			'search_course_text_background',
			[
				'label' => esc_html__( 'Background Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} input[type=text]' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Input Border', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-search-form-wrap .academy-search-form__field-input',
			]
		);
		$this->end_controls_section();
	}
	protected function register_controls() {
		/**
		 * Course Search
		 */
		$this->search_course_content();
		$this->search_course_style();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$attr_array = [
			'placeholder' => $settings['search_text'],
		];
		$shortcode = '[academy_course_search ' . Helper::attr_shortcode( $attr_array ) . ']';
		echo do_shortcode( $shortcode );
		?>

		<?php

	}
}
