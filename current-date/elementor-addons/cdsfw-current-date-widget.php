<?php

class CDSFW_CURRENT_DATE_WIDGET extends \Elementor\Widget_Base {

    public function get_name() {
        return 'cdsfw-current-date';
    }

    public function get_title() {
        return esc_html__('Current Date', 'current-date');
    }

    public function get_icon() {
        return 'eicon-calendar';
    }

    public function get_categories() {
        return ['basic'];
    }

    public function get_keywords() {
        return ['date', 'year'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'current-date'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'format',
            [
                'label' => esc_html__('Date Format', 'current-date'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'jS F Y',
                'options' => [
                    'jS F Y' => esc_html__( 'Default', 'current-date' ),
                    'F j, Y' => esc_html__( date_i18n('F j, Y'), 'current-date' ),
                    'l, F jS, Y' => esc_html__( date_i18n('l, F jS, Y'), 'current-date' ),
                    'D, M j, Y' => esc_html__( date_i18n('D, M j, Y'), 'current-date' ),
                    'j F Y' => esc_html__( date_i18n('j F Y'), 'current-date' ),
                    'M j, Y' => esc_html__( date_i18n('M j, Y'), 'current-date' ),
                    'j M Y' => esc_html__( date_i18n('j M Y'), 'current-date' ),
                    'Y-M-d' => esc_html__( date_i18n('Y-M-d'), 'current-date' ),
                    'd F Y' => esc_html__( date_i18n('d F Y'), 'current-date' ),
                    'M j' => esc_html__( date_i18n('M j'), 'current-date' ),
                    'F jS' => esc_html__( date_i18n('F jS'), 'current-date' ),
                    'jS M Y' => esc_html__( date_i18n('jS M Y'), 'current-date' ),
                    'l, M jS, Y' => esc_html__( date_i18n('l, M jS, Y'), 'current-date' ),
                    'D, j M Y' => esc_html__( date_i18n('D, j M Y'), 'current-date' ),
                    'l, j F Y' => esc_html__( date_i18n('l, j F Y'), 'current-date' ),
                    'D, M j Y' => esc_html__( date_i18n('D, M j Y'), 'current-date' ),
                    'd/m/Y' => esc_html__( date_i18n('d/m/Y'), 'current-date' ),
                    'j.n.Y' => esc_html__( date_i18n('j.n.Y'), 'current-date' ),
                    'Y.m.d' => esc_html__( date_i18n('Y.m.d'), 'current-date' ),
                    'd-m-Y' => esc_html__( date_i18n('d-m-Y'), 'current-date' ),
                    'Y-m-d' => esc_html__( date_i18n('Y-m-d'), 'current-date' ),
                    'Y/m/d' => esc_html__( date_i18n('Y/m/d'), 'current-date' ),
                    'm/d/Y' => esc_html__( date_i18n('m/d/Y'), 'current-date' ),
                ],
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'style',
			[
				'label' => esc_html__( 'Style', 'current-date'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,             
			]
		);

		/** Typography */
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'current_date_typography',
				'label' => esc_html__( 'Typography', 'current-date' ),
				'selector' => '{{WRAPPER}} .cdsfw-current-date',
			]
		);

		$this->add_responsive_control(
			'current_date_color',
			[
				'label' => esc_html__( 'Color', 'current-date' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cdsfw-current-date' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'current_date_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'current-date' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cdsfw-current-date:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
    }
    

    protected function render() {
        $settings = $this->get_settings_for_display();

        $format = !empty($settings['format']) ? $settings['format'] : 'jS F Y';

        $date_output = date_i18n($format);

        echo "<span class='cdsfw-current-date'>$date_output</span>";
    }
}

