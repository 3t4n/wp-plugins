<?php
namespace AcademyEA\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Traits\CommonStyle;

class Registration extends Widget_Base {
	use CommonStyle;

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
		add_filter( 'academy/shortcode/instructor_registration_form_is_user_logged_in', array( $this, 'force_show_registration_form' ) );
		add_filter( 'academy/shortcode/student_registration_form_is_user_logged_in', array( $this, 'force_show_registration_form' ) );
	}

	public function force_show_registration_form( $default ) {

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return false;
		}
		return $default;
	}

	public function get_name() {
		return 'academyea-registration';
	}

	public function get_title() {
		return esc_html__( 'Student/Instructor Registration', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-lock-user';
	}

	public function get_categories() {
		return [ 'academyea-widgets' ];
	}

	public function get_keywords() {
		return [ 'registration', 'academy', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'register_content_options',
			[
				'label' => __( 'Registration Options', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'registration_type',
			[
				'label'   => esc_html__( 'Registration Type', 'academy-elementor-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => __( 'student', 'academy-elementor-addons' ),
				'options' => [
					'student'    => esc_html__( 'Student', 'academy-elementor-addons' ),
					'instructor' => esc_html__( 'Instructor', 'academy-elementor-addons' ),
				],
			]
		);

		$this->end_controls_section();

		// Form Control
		$this->start_controls_section(
			'registration_form',
			[
				'label' => __( 'Registration Form', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'registration_form_tabs_style' );

		$this->start_controls_tab(
			'registration_form_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'registration_form_normal_style',
			'{{WRAPPER}} .academy-reg-form',
			[ 'background', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'registration_form_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'registration_form_hover_style',
			'{{WRAPPER}} .academy-reg-form:hover',
			[ 'background', 'border', 'radius', 'box_shadow' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Form Field
		$this->start_controls_section(
			'registration_form_field',
			[
				'label' => __( 'Form Field', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_typography',
			[
				'label' => esc_html__( 'Label Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'label_typography_style',
			'{{WRAPPER}} .academy-reg-form .academy-form-group label',
			[ 'typography', 'color', 'margin', 'padding' ]
		);

		$this->add_control(
			'label_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'placeholder_typography',
			[
				'label' => esc_html__( 'Placeholder Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'placeholder_typography_style',
			'{{WRAPPER}} .academy-reg-form .academy-form-group input::placeholder',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'placeholder_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'field_style',
			[
				'label' => esc_html__( 'Field Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'registration_form_field_style',
			'{{WRAPPER}} .academy-reg-form .academy-form-group input',
			[ 'typography', 'color', 'background', 'border', 'radius', 'padding', 'margin' ]
		);

		$this->end_controls_section();

		// Button Control
		$this->start_controls_section(
			'registration_button',
			[
				'label' => __( 'Button Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->normal_element(
			'registration_button_normal_style',
			'{{WRAPPER}} .academy-reg-form .academy-form-group button',
			[ 'typography', 'text_shadow', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);

		$this->start_controls_tabs( 'registration_button_tabs_style' );

		$this->start_controls_tab(
			'registration_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'registration_button_normal_style',
			'{{WRAPPER}} .academy-reg-form .academy-form-group button',
			[ 'color', 'background' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'registration_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'registration_button_hover_style',
			'{{WRAPPER}} .academy-reg-form .academy-form-group button:hover',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Registration Success Typography

		$this->start_controls_section(
			'after_registration_form',
			[
				'label' => __( 'After Registration Form', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'thankyou_typography',
			[
				'label' => esc_html__( 'Success Heading', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'thankyou_typography_style',
			'{{WRAPPER}} .academy-reg-thankyou .academy-reg-thankyou__heading',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'thankyou_typography_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'pending_typography',
			[
				'label' => esc_html__( 'Pending Message Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
				'condition' => [
					'registration_type' => 'instructor',
				],
			]
		);

		$this->normal_element(
			'pending_typography_style',
			'{{WRAPPER}} .academy-reg-thankyou .academy-reg-thankyou__error',
			[ 'typography', 'color' ],
			[
				'registration_type' => 'instructor',
			],
		);

		$this->add_control(
			'pending_typography_hr',
			[
				'type' => Controls_Manager::DIVIDER,
				'condition' => [
					'registration_type' => 'instructor',
				],
			]
		);

		$this->add_control(
			'description_typography',
			[
				'label' => esc_html__( 'Description Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'description_typography_style',
			'{{WRAPPER}} .academy-reg-thankyou .academy-reg-thankyou__description',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'description_typography_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'dashboard_button',
			[
				'label' => esc_html__( 'Dashboard Button', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'dashboard_button_normal_style',
			'{{WRAPPER}} .academy-reg-thankyou .academy-btn',
			[ 'typography', 'text_shadow', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);

		$this->start_controls_tabs( 'dashboard_button_tabs_style' );

		$this->start_controls_tab(
			'dashboard_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'dashboard_button_normal_style',
			'{{WRAPPER}} .academy-reg-thankyou .academy-btn',
			[ 'color', 'background' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'dashboard_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'dashboard_button_hover_style',
			'{{WRAPPER}} .academy-reg-thankyou .academy-btn:hover',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();

		$shortcode = 'student' === $settings['registration_type'] ? '[academy_student_registration_form]' : '[academy_instructor_registration_form]';
		?>
		<div class="academyea-widget-registration"><?php echo do_shortcode( $shortcode ); ?></div>
		<?php
	}
}
