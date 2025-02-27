<?php

class PandaVideo_PandaButtons extends \Elementor\Widget_Base
{
	public function get_name(): string
	{
		return 'panda-buttons';
	}

	public function get_title(): string
	{
		return esc_html__( 'Panda Buttons', 'elementor-addon' );
	}

	public function get_icon(): string
	{
		return 'eicon-button';
	}

	public function get_categories(): array
	{
		return [ 'basic' ];
	}

	public function get_keywords(): array
	{
		return [ 'panda', 'video', 'player', 'botao', 'button', 'botão', 'botoes', 'botões' ];
	}

	protected function register_controls() 
	{
		$this->start_controls_section(
			'select_buttons',
			[
				'label' => '<b>'.__( 'Choose a button', 'pandavideo' ).'</b>',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'inner_text',
			[
				'label' => '<b>'.__( 'Button text', 'pandavideo' ).'</b>',
                'default' => __( 'Button text', 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

        $this->add_control(
			'selected_button',
			[
				'label' => '<b>'.__( 'Button style', 'pandavideo' ).'</b>',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'button-1',
				'options' => [
                    'button-1' => __('Button 1', 'pandavideo'),
                    'button-2' => __('Button 2', 'pandavideo'),
                    'button-3' => __('Button 3', 'pandavideo')
				],
			]
		);

		$this->add_control(
			'button_primary_color',
			[
				'label' => '<b>'. __( 'Main color', 'pandavideo' ) .'</b>',
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'render_type' => 'template'
			]
		);

		$this->add_control(
			'button_secondary_color',
			[
				'label' => '<b>'. __( 'Secondary color', 'pandavideo' ) .'</b>',
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'render_type' => 'template',
				'condition' => [
					'selected_button!' => 'button-1'
				]
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => '<b>' . __( 'Text color', 'pandavideo' ) . '</b>',
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'render_type' => 'template'
			]
		);

		$this->add_control(
			'size',
			[
				'label' => '<b>' . __( 'Button size', 'pandavideo' ) . '</b>',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '44',
				'options' => [
                    '44' => __( 'Small', 'pandavideo' ),
                    '64' => __( 'Medium', 'pandavideo' ),
                    '84' => __( 'Large', 'pandavideo' )
				],
			]
		);

		$this->add_control(
			'font_size',
			[
				'label' => '<b>'.__( 'Font size', 'pandavideo' ).'</b>',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '24',
				'options' => [
					'18' => __('Small', 'pandavideo'),
                    '24' => __('Medium', 'pandavideo'),
                    '32' => __('Large', 'pandavideo'),
                    '44' => __('Extra large', 'pandavideo')
				]
			]
		);

		$this->add_control(
			'text_weight',
			[
				'label' => '<b>'.__( 'Text weight', 'pandavideo' ).'</b>',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '900',
				'options' => [
                    '500' => __('Normal', 'pandavideo'),
                    '900' => __('Bold', 'pandavideo')
				],
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => '<b>' . __( 'Buttons link', 'pandavideo' ) . '</b>',
                'placeholder' => 'ex.: https://pandavideo.com/',
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

        $this->add_control(
			'button_target',
			[
				'label' => '<b>' . __( 'Open link on ', 'pandavideo' ) . '</b>',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '_blank',
				'options' => [
                    '_blank' => __( 'Another tab', 'pandavideo' ),
                    '_self' => __( 'Current tab', 'pandavideo' )
				],
			]
		);

		$this->add_control(
			'panda_button',
			[
				'label' => '<b>' .  __( 'Show Panda Button at a specific time', 'pandavideo' ) . '</b>',
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
			$this->add_control(
				'panda_button_time',
				[
					'label' => __( 'Show after the second', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 0,
					'condition' => [
						'panda_button' => 'yes'
					]
				]
			);

		$this->add_control(
			'custom_css',
			[
				'label' => __( '<b>Use custom CSS</b>', 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);

		$this->add_control(
			'custom_class',
			[
				'label' => __( 'Button custom class', 'pandavideo' ),
                'placeholder' => __( 'ex.: .panda-button or panda-button', 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'panda-button',
				'condition' => [
					'custom_css' => 'yes' 
				]
			]
		);

		$this->add_control(
			'plain_custom_css',
			[
				'label' => __( 'Custom CSS', 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'css',
				'rows' => 20,
				'default' => '.panda-button, button.panda-button, .panda-button span {

}',
				'placeholder' => '.panda-button, button.panda-button, .panda-button span {

}',
				'condition' => [
					'custom_css' => 'yes'
				]
			]
		);
			
		$this->end_controls_section();
	}

	protected function is_button_valid($string) { 
		$pattern = '/^button-\d{1}$/';
		return preg_match($pattern, $string);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
        $inner_text = $settings['inner_text'];
        $size = $settings['size'];
		$button_link = $settings['button_link'] ? $settings['button_link'] : '#';
		$button_target = $settings['button_target'];
        $selected_button = apply_filters('sanitize_file_name', $settings['selected_button']);
		$is_btn_file_valid = $this->is_button_valid($selected_button);
		$primary_color = $settings['button_primary_color'];
		$secondary_color = $settings['button_secondary_color'];
		$button_text_color = $settings['button_text_color'];
		$text_weight = $settings['text_weight'];
		$plain_custom_css = $settings['plain_custom_css'];
		$font_size = $settings['font_size'].'px';
		$custom_class = str_replace('.', '', $settings['custom_class']);
		$id = $this->get_id();
		$button_show_time = $settings['panda_button_time'];
		echo "<style>".esc_html($plain_custom_css)."</style>";
    ?>
        <div style="width: 100%; display: flex; justify-content: center;">
    <?php
		if ($is_btn_file_valid) {
			require( WP_PLUGIN_DIR . PANDAVIDEO_PLUGIN_PATH . "/includes/assets/buttons/$selected_button.php" );
		}
    ?>
        </div>
		<style>
			.there-is-content {
				margin: 0;
				z-index: -1;
			}
		</style>
    <?php
	}
}