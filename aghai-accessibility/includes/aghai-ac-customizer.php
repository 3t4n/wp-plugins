<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Aghai_AC_Customizer {

	private $css_rules = array();
	private $css_code = '';

	public function get_customizer_fields() {
		$fields = array();

		$fields[] = array(
			'id' => 'ac_toolbar_icon',
			'title' => __( 'Toolbar Icon', 'aghai-accessibility' ),
			'type' => 'select',
			'choices' => array(
				'wheelchair' => __( 'Wheelchair', 'aghai-accessibility' ),
				'one-click' => __( 'One Click', 'aghai-accessibility' ),
				'accessibility' => __( 'Accessibility', 'aghai-accessibility' ),
			),
			'std' => 'wheelchair',
			'description' => __( 'Set Toolbar Icon', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_toolbar_position',
			'title' => __( 'Toolbar Position', 'aghai-accessibility' ),
			'type' => 'select',
			'choices' => array(
				'left' => __( 'Left', 'aghai-accessibility' ),
				'right' => __( 'Right', 'aghai-accessibility' ),
			),
			'std' => is_rtl() ? 'right' : 'left',
			'description' => __( 'Set Toolbar Position', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_toolbar_distance_top',
			'title' => __( 'Offset from Top (Desktop)', 'aghai-accessibility' ),
			'type' => 'text',
			'std' => '100px',
			'description' => __( 'Set Toolbar top offset (Desktop)', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_toolbar_distance_top_mobile',
			'title' => __( 'Offset from Top (Mobile)', 'aghai-accessibility' ),
			'type' => 'text',
			'std' => '50px',
			'description' => __( 'Set Toolbar top offset (Mobile)', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_bg_toolbar',
			'title' => __( 'Toolbar Background', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#ffffff',
			'selector' => '#aghai-ac-toolbar .aghai-ac-toolbar-overlay',
			'change_type' => 'bg_color',
			'description' => __( 'Set Toolbar background color', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_color_toolbar',
			'title' => __( 'Toolbar Color', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#333333',
			'selector' => '#aghai-ac-toolbar .aghai-ac-toolbar-overlay ul.aghai-ac-toolbar-items li.aghai-ac-toolbar-item a, #aghai-ac-toolbar .aghai-ac-toolbar-overlay p.aghai-ac-toolbar-title',
			'change_type' => 'color',
			'description' => __( 'Set Toolbar text color', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_toggle_button_bg_color',
			'title' => __( 'Toggle Button Background', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#1e73be',
			'description' => __( 'Set Toolbar toggle button background color', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_toggle_button_bg_color_hover',
			'title' => __( 'Toggle Button Hover Background', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#1e73be',
			'description' => __( 'Set Toolbar toggle button hover background color', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_toggle_button_color',
			'title' => __( 'Toggle Button Color', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#ffffff',
			'selector' => '#aghai-ac-toolbar .aghai-ac-toolbar-toggle a',
			'change_type' => 'color',
			'description' => __( 'Set Toolbar toggle button icon color', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_bg_active',
			'title' => __( 'Active Background', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#1e73be',
			'selector' => '#aghai-ac-toolbar .aghai-ac-toolbar-overlay ul.aghai-ac-toolbar-items li.aghai-ac-toolbar-item a.active',
			'change_type' => 'bg_color',
			'description' => __( 'Set Toolbar active background color', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_color_active',
			'title' => __( 'Active Color', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#ffffff',
			'selector' => '#aghai-ac-toolbar .aghai-ac-toolbar-overlay ul.aghai-ac-toolbar-items li.aghai-ac-toolbar-item a.active',
			'change_type' => 'color',
			'description' => __( 'Set Toolbar active text color', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_focus_outline_style',
			'title' => __( 'Focus Outline Style', 'aghai-accessibility' ),
			'type' => 'select',
			'choices' => array(
				'solid' => __( 'Solid', 'aghai-accessibility' ),
				'dotted' => __( 'Dotted', 'aghai-accessibility' ),
				'dashed' => __( 'Dashed', 'aghai-accessibility' ),
				'double' => __( 'Double', 'aghai-accessibility' ),
				'groove' => __( 'Groove', 'aghai-accessibility' ),
				'ridge' => __( 'Ridge', 'aghai-accessibility' ),
				'outset' => __( 'Outset', 'aghai-accessibility' ),
				'initial' => __( 'Initial', 'aghai-accessibility' ),
			),
			'std' => 'solid',
			'description' => __( 'Set Focus outline style', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_focus_outline_width',
			'title' => __( 'Focus Outline Width', 'aghai-accessibility' ),
			'type' => 'select',
			'choices' => array(
				'1px' => '1px',
				'2px' => '2px',
				'3px' => '3px',
				'4px' => '4px',
				'5px' => '5px',
				'6px' => '6px',
				'7px' => '7px',
				'8px' => '8px',
				'9px' => '9px',
				'10px' => '10px',
			),
			'std' => '1px',
			'description' => __( 'Set Focus outline width', 'aghai-accessibility' ),
		);

		$fields[] = array(
			'id' => 'ac_focus_outline_color',
			'title' => __( 'Focus Outline Color', 'aghai-accessibility' ),
			'type' => 'color',
			'std' => '#FF0000',
			'description' => __( 'Set Focus outline color', 'aghai-accessibility' ),
		);



		return $fields;
	}

	public function customize_ac( $wp_customize ) {
		$fields = $this->get_customizer_fields();

		$section_description = '<p>' . __( 'Use the control below to customize the appearance and layout of the Accessibility Toolbar', 'aghai-accessibility' ) . '</p><p>' .
			sprintf( __( 'Additional Toolbar settings can be configured at the %s page.', 'aghai-accessibility' ),
				'<a href="' . admin_url( 'admin.php?page=accessibility-toolbar' ) . '" target="blank">' . __( 'Accessibility Toolbar', 'aghai-accessibility' ) . '</a>'
			) . '</p>';

		$wp_customize->add_section( 'accessibility', array(
			'title' => __( 'Accessibility', 'aghai-accessibility' ),
			'priority'   => 30,
			'description' => $section_description,
		) );

		foreach ( $fields as $field ) {
			$customizer_id = AGHAI_AC_CUSTOMIZER_OPTIONS . '[' . $field['id'] . ']';
			$wp_customize->add_setting( $customizer_id, array(
				'default' => $field['std'] ? $field['std'] : null,
				'type' => 'option',
			) );
			switch ( $field['type'] ) {
				case 'color':
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $field['id'], array(
						'label'    => $field['title'],
						'section'  => 'accessibility',
						'settings' => $customizer_id,
						'description' => isset( $field['description'] ) ? $field['description'] : null,
					) ) );
					break;
				case 'select':
				case 'text':
					$wp_customize->add_control( $field['id'], array(
						'label'    => $field['title'],
						'section'  => 'accessibility',
						'settings' => $customizer_id,
						'type'     => $field['type'],
						'choices'  => isset( $field['choices'] ) ? $field['choices'] : null,
						'description' => isset( $field['description'] ) ? $field['description'] : null,
					) );
					break;
			}
		}
	}

	public function get_custom_css_code() {
		$options = $this->get_customizer_options();
		$bg_color = $options['ac_toggle_button_bg_color']; // get_theme_mod( 'ac_toggle_button_bg_color', '#1e73be' );
		$bg_color_hover = $options['ac_toggle_button_bg_color_hover']; 
		if ( ! empty( $bg_color ) ) {
			$this->add_css_rule( '#aghai-ac-toolbar .aghai-ac-toolbar-toggle a', 'background-color', $bg_color );
			$this->add_css_rule( '#aghai-ac-toolbar .aghai-ac-toolbar-toggle a:hover, .aghai-ac-toolbar-open .aghai-ac-toolbar-toggle a', 'background-color', $bg_color_hover . ' !important' );
		}

		$outline_style = $options['ac_focus_outline_style']; //get_theme_mod( 'ac_focus_outline_style', 'solid' );
		if ( ! empty( $outline_style ) ) {
			$this->add_css_rule( 'body.aghai-ac-focusable a:focus', 'outline-style', $outline_style . ' !important' );
		}

		$outline_width = $options['ac_focus_outline_width']; // get_theme_mod( 'ac_focus_outline_width', '1px' );
		if ( ! empty( $outline_width ) ) {
			$this->add_css_rule( 'body.aghai-ac-focusable a:focus', 'outline-width', $outline_width . ' !important' );
		}

		$outline_color = $options['ac_focus_outline_color']; //get_theme_mod( 'ac_focus_outline_color', '#FF0000' );
		if ( ! empty( $outline_color ) ) {
			$this->add_css_rule( 'body.aghai-ac-focusable a:focus', 'outline-color', $outline_color . ' !important' );
		}

		$distance_top = $options['ac_toolbar_distance_top']; //get_theme_mod( 'ac_toolbar_distance_top', '100px' );
		if ( ! empty( $distance_top ) ) {
			$this->add_css_rule( '#aghai-ac-toolbar', 'top', $distance_top . ' !important' );
		}

		$distance_top_mobile = $options['ac_toolbar_distance_top_mobile']; // get_theme_mod( 'ac_toolbar_distance_top_mobile', '50px' );
		if ( ! empty( $distance_top_mobile ) ) {
			$this->add_css_code( "@media (max-width: 767px) { .aghai-ac-toolbar-toggle { top: {$distance_top_mobile} !important; } }" );
		}

		$fields = $this->get_customizer_fields();
		foreach ( $fields as $field ) {
			if ( empty( $field['selector'] ) || empty( $field['change_type'] ) ) {
				continue;
			}

			$option = $options[ $field['id'] ];

			if ( 'color' === $field['change_type'] ) {
				$this->add_css_rule( $field['selector'], 'color', $option );
			} elseif ( 'bg_color' === $field['change_type'] ) {
				$this->add_css_rule( $field['selector'], 'background-color', $option );
			}
		}
	}

	private function get_customizer_options() {
		static $options = false;
		if ( false === $options ) {
			$options = get_option( AGHAI_AC_CUSTOMIZER_OPTIONS );
		}
		return $options;
	}

	private function add_css_rule( $selector, $rule, $value ) {
		if ( ! isset( $this->css_rules[ $selector ] ) ) {
			$this->css_rules[ $selector ] = array();
		}
		$this->css_rules[ $selector ][] = $rule . ': ' . $value . ';';
	}

	private function add_css_code( $code ) {
		$this->css_code .= "\n" . $code;
	}

	public function print_css_code() {
		$this->get_custom_css_code();
		$css = '';
		foreach ( $this->css_rules as $selector => $css_rules ) {
			$css .= "\n" . $selector . '{ ' . implode( "\t", $css_rules ) . '}';
		}
		echo '<style type="text/css">' . $css . $this->css_code . '</style>';
	}

	public function __construct() {
		add_filter( 'customize_register', array( &$this, 'customize_ac' ), 610 );
		add_filter( 'wp_head', array( &$this, 'print_css_code' ) );
	}
}