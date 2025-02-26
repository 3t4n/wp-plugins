<?php
namespace AcademyEA\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class LoginForm extends Widget_Base {
	use CommonStyle;

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
		add_filter( 'academy/shortcode/login_form_is_user_logged_in', array( $this, 'force_show_login_form' ) );
	}

	public function force_show_login_form( $default ) {

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return false;
		}
		return $default;
	}

	public function get_name() {
		return 'academyea-login-form';
	}

	public function get_title() {
		return esc_html__( 'Login Form', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-lock-user';
	}

	public function get_categories() {
		return [ 'academyea-widgets' ];
	}

	public function get_keywords() {
		return [ 'course', 'list', 'grid', 'course grid', 'academy', 'lms' ];
	}

	protected function form_heading_controls() {

		$this->start_controls_section(
			'login_form_heading',
			[
				'label' => __( 'Heading', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Form Heading', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Log In into your Account', 'academy-elementor-addons' ),
				'default' => 'Log In into your Account',
			]
		);

		$this->add_responsive_control(
			'heading_title_align',
			[
				'label'        => __( 'Alignment', 'academy-elementor-addons' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => __( 'Left', 'academy-elementor-addons' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'academy-elementor-addons' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'academy-elementor-addons' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-login-form-wrapper .academy-login-form-heading' => 'text-align: {{VALUE}};',
				],
				'default'      => 'left',
			]
		);

		$this->end_controls_section();

	}

	protected function form_fields_controls() {

		// Form Fields start

		$this->start_controls_section(
			'login_fields_content',
			[
				'label' => __( 'Form Fields', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'username_label',
			[
				'label' => __( 'Username Label', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Username or Email Address', 'academy-elementor-addons' ),
				'default'      => 'Username or Email Address',

			]
		);

		$this->add_control(
			'username_placeholder',
			[
				'label' => __( 'Username Placeholder', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Username or Email Address', 'academy-elementor-addons' ),
				'default'      => 'Username or Email Address',
			]
		);

		$this->add_control(
			'password_label',
			[
				'label' => __( 'Password Label', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Password', 'academy-elementor-addons' ),
				'default'      => 'Password',
			]
		);
		$this->add_control(
			'password_placeholder',
			[
				'label' => __( 'password Placeholder', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Password', 'academy-elementor-addons' ),
				'default'      => 'Password',

			]
		);
		$this->add_control(
			'remember_label',
			[
				'label' => __( 'Remember Me', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Password', 'academy-elementor-addons' ),
				'default'      => 'Remember Me',
			]
		);
		$this->add_control(
			'reset_password_label',
			[
				'label' => __( 'Reset Password', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Password', 'academy-elementor-addons' ),
				'default'      => 'Reset Password',
			]
		);

		$this->end_controls_section();

	}

	protected function buttons_controls() {

		// Button

		$this->start_controls_section(
			'section_button_content',
			[
				'label' => __( 'Button', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Text', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Log In', 'academy-elementor-addons' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'academy-elementor-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => __( 'Left', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => __( 'Right', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'stretch' => [
						'title' => __( 'Justified', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-btn' => 'align-self: {{VALUE}}; width: auto;',
				],
				'default'      => 'stretch',
			]
		);

		$this->end_controls_section();

	}

	protected function form_style_controls() {

		// Login Form
		$this->start_controls_section(
			'login_form',
			[
				'label' => __( 'Login Form', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'login_form_tabs_style' );

		$this->start_controls_tab(
			'login_form_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'login_form_normal_style',
			'{{WRAPPER}} .academy-login-form-wrapper',
			[ 'background', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'login_form_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'login_form_hover_style',
			'{{WRAPPER}} .academy-login-form-wrapper:hover',
			[ 'background', 'border', 'radius', 'box_shadow' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function form_heading_style_controls() {

		// Heading style start
		$this->start_controls_section(
			'form_title_style',
			[
				'label' => esc_html__( 'Form Heading', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'form_title_tabs_style' );

		$this->start_controls_tab(
			'form_title_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'form_title_normal_style',
			'{{WRAPPER}} .academy-login-form-wrapper .academy-login-form-heading',
			[ 'typography', 'color', 'text_shadow', 'border', 'radius', 'box_shadow', 'margin', 'padding' ]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'form_title_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'form_title_hover_style',
			'{{WRAPPER}} .academy-login-form-wrapper .academy-login-form-heading:hover',
			[ 'color', 'text_shadow', 'border', 'radius', 'box_shadow' ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function form_fields_style_controls() {

		$this->start_controls_section(
			'field_style',
			[

				'label' => __( 'Field Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		$this->start_controls_tabs( 'login_form_field_tabs_style' );

		$this->start_controls_tab(
			'login_form_field_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);

		$this->normal_element(
			'registration_form_field_style',
			'{{WRAPPER}} .academy-login-form .academy-form-group input',
			[ 'typography', 'color', 'background', 'border', 'radius', 'padding', 'margin' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'login_form_field_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);
		$this->hover_element(
			'registration_form_field_style',
			'{{WRAPPER}} .academy-login-form-wrapper:hover .academy-login-form .academy-form-group input',
			[ 'color', 'background', 'border', 'radius' ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function form_label_style_controls() {

		// Button Control
		$this->start_controls_section(
			'form_lavel',
			[
				'label' => __( 'Lavel Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'login_form_lavel_tabs_style' );

		$this->start_controls_tab(
			'login_form_lavel_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'login_form_lavel_normal_style',
			'{{WRAPPER}} .academy-login-form .academy-form-group label, {{WRAPPER}} .academy-form-group__inner .academy-form-text-link',
			[ 'typography', 'color', 'margin', 'padding' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'login_form_lavel_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'login_form_lavel_hover_style',
			'{{WRAPPER}} .academy-login-form-wrapper:hover .academy-login-form .academy-form-group label, {{WRAPPER}} .academy-login-form-wrapper:hover .academy-form-group__inner .academy-form-text-link',
			[ 'typography', 'color' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function form_placeholder_style_controls() {

		$this->start_controls_section(
			'form_placeholder_style',
			[
				'label' => esc_html__( 'Placeholder Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		$this->start_controls_tabs( 'login_form_placeholder_tabs_style' );

		$this->start_controls_tab(
			'login_form_placeholder_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),

			]
		);
		$this->normal_element(
			'placeholder_normal_style',
			'{{WRAPPER}} .academy-form-group input::placeholder, {{WRAPPER}} .academy-form-group input::-webkit-input-placeholder ',
			[ 'typography', 'color' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'login_form_placeholder_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'login_form_placeholder_hover_style',
			'{{WRAPPER}} .academy-login-form-wrapper:hover .academy-form-group input:hover::placeholder, {{WRAPPER}} .academy-login-form-wrapper:hover .academy-form-group input::-webkit-input-placeholder ',
			[ 'color' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}



	protected function form_buttons_style_controls() {

		// Button Control
		$this->start_controls_section(
			'login_button',
			[
				'label' => __( 'Button Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'login_button_tabs_style' );

		$this->start_controls_tab(
			'login_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'login_button_normal_style',
			'{{WRAPPER}} .academy-login-form .academy-form-group button',
			[ 'typography', 'color', 'text_shadow', 'background', 'border', 'radius', 'box_shadow', 'margin', 'padding' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'login_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'login_button_hover_style',
			'{{WRAPPER}} .academy-login-form .academy-form-group button:hover',
			[ 'color', 'text_shadow', 'background', 'border', 'radius', 'box_shadow' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function register_controls() {

		/**
		 * Login Form Heading Controls
		*/
		$this->form_heading_controls();

		/**
		 * Login Form Fields Controls
		*/
		$this->form_fields_controls();
		/**
		 * Buttons Controls
		*/
		$this->buttons_controls();

		// style Tab start
		/**
		 * Login Form Style Controls
		*/
		$this->form_style_controls();

		/**
		 * Login Form Heading Style Controls
		*/
		$this->form_heading_style_controls();

		/**
		 * Login Form lavel Style Controls
		*/

		$this->form_label_style_controls();
		/**
		 * Login Form placeholder Style Controls
		*/

		$this->form_placeholder_style_controls();

		/**
		 * Login Form Fields Style Controls
		*/
		$this->form_fields_style_controls();

		/**
		 * Login Form Buttons Style Controls
		*/
		$this->form_buttons_style_controls();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$attr_array = [
			'form_title'                => $settings['heading'],
			'username_label'            => $settings['username_label'],
			'username_placeholder'      => $settings['username_placeholder'],
			'password_label'            => $settings['password_label'],
			'password_placeholder'      => $settings['password_placeholder'],
			'remember_label'            => $settings['remember_label'],
			'reset_password_label'      => $settings['reset_password_label'],
			'login_button_label'        => $settings['button_text'],

		];

		$shortcode = '[academy_login_form ' . Helper::attr_shortcode( $attr_array ) . ']';
		echo do_shortcode( $shortcode );

	}

}
