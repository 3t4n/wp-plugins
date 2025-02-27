<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

class Safelayout_icons_elementor_widget extends \Elementor\Widget_Base {

	public function get_name(): string {
		return 'Safelayout_icons_widget';
	}

	public function get_title(): string {
		return esc_html__( 'icon (Safelayout)', 'safelayout-elegant-icons' );
	}

	public function get_icon(): string {
		return 'eicon-favorite safelayout-ei-elementor-widget-icon';
	}

	public function get_class(): string {
		return 'safelayout-ei-elementor-widget';
	}

	public function get_categories(): array {
		return [ 'basic' ];
	}

	protected function is_dynamic_content(): bool {
		return false;
	}

	public function get_keywords(): array {
		return [
			__( 'Icon', 'safelayout-elegant-icons' ),
			__( 'Icons', 'safelayout-elegant-icons' ),
			__( 'Safelayout', 'safelayout-elegant-icons' ),
			__( 'Elegant', 'safelayout-elegant-icons' ),
		];
	}

	public function get_style_depends(): array {
		return [ 'safelayout-safelayout-icon-style' ];
	}

	protected function register_controls(): void {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Icon (Safelayout)', 'safelayout-elegant-icons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content',
			[ 'type' => 'Safelayout_icons_control', ]
		);

		$this->end_controls_section();
	}

	public function get_data( $item = null ) {
		$data = parent::get_data( $item );
		if ( isset( $data['settings']['content'] ) ) {
			$allowed_html = Safelayout_elegant_icons::allowed_html( array(), 'post' );
			$data['settings']['content'] = wp_kses( $data['settings']['content'], $allowed_html );
		}
		return $data;
	}

	protected function render(): void {
		$settings = $this->get_settings_for_display();
		$allowed_html = Safelayout_elegant_icons::allowed_html( array(), 'post' );
		$temp = explode( 'attsafelayoutatt', $settings['content'] );
		$data = '';
		if ( count( $temp ) > 1 ) {
			$data = $temp['0'];
		}
		echo wp_kses( $data, $allowed_html );
	}

	protected function content_template(): void {
		?>
		<#
			if ( SLEImceIcons.elementorAction == 0 && view?.el?.classList?.contains( 'elementor-element-editable' ) ) {
				document.getElementById( 'sl-ei-elementor-value' )?.dispatchEvent(new Event('click') );
			}
			SLEImceIcons.elementorAction = 0;
			let temp = settings.content.split( 'attsafelayoutatt' );
			let data = '';
			if ( temp?.length > 1 ) {
				data = temp[0];
			}
		#>
			{{{ data }}}
		<?php
	}
}