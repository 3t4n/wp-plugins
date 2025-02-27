<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

class Safelayout_boxhead_elementor_control extends \Elementor\Base_Data_Control {

	public function get_type(): string {
		return 'Safelayout_boxhead_control';
	}

	public function get_default_value(): string {
		return '<h2><div>safe1359head1359safe</div></h2>attsafelayoutatt%7B%22tag%22%3A%22h2%22%2C%22textAlign%22%3A%22%22%2C%22bold%22%3Afalse%2C%22italic%22%3Afalse%2C%22uppercase%22%3Afalse%2C%22hasText%22%3Afalse%2C%22textColor%22%3A%22%2300f%22%2C%22hasBg%22%3Afalse%2C%22bgColor%22%3A%22%23b6b6b6%22%2C%22fontSize%22%3A%22%22%2C%22lineHeight%22%3A%221.4%22%2C%22letterSpacing%22%3A%220px%22%2C%22blockMargin%22%3A%7B%7D%2C%22blockPadding%22%3A%7B%7D%2C%22border%22%3A%7B%7D%2C%22borderRadius%22%3A%7B%7D%2C%22classes%22%3A%22%22%7D';
	}

	public function enqueue(): void {
		wp_register_script(
			'safelayout-boxhead-elementor-control',
			SAFELAYOUT_ICONS_URL . 'elementor/safelayout_boxhead.js',
			array(),
			SAFELAYOUT_ICONS_VERSION,
		);
		wp_enqueue_script( 'safelayout-boxhead-elementor-control' );
	}

	public function content_template(): void {
		?>
			<div id="sl-ei-boxhead-elementor-body"></div>
			<input type="hidden" id="sl-ei-boxhead-elementor-value" data-setting="{{ data.name }}" />
		<?php
	}

}