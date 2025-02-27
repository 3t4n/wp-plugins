<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

class Safelayout_boxbutton_elementor_control extends \Elementor\Base_Data_Control {

	public function get_type(): string {
		return 'Safelayout_boxbutton_control';
	}

	public function get_default_value(): string {
		return '<div class="safelayout-ei-box-button-block"><a style="--sl-ei-box-button-text-color: #00f; --sl-ei-box-button-background-color: #3f3; text-decoration: none; cursor: pointer; user-select: none;"><span><div>Read More</div></span></a></div>attsafelayoutatt0attsafelayoutatt%7B%22key%22%3A0%2C%22blockId%22%3A%2269297e5d-d263-9a35-ff7d-2eeb975aaaf1%22%2C%22content%22%3A%22Read%20More%22%2C%22align%22%3A%22%22%2C%22textColor%22%3A%22%2300f%22%2C%22hasBg%22%3Atrue%2C%22bgColor%22%3A%22%233f3%22%2C%22bold%22%3Afalse%2C%22italic%22%3Afalse%2C%22uppercase%22%3Afalse%2C%22fontSize%22%3A%2216px%22%2C%22lineHeight%22%3A%221.5%22%2C%22letterSpacing%22%3A%220px%22%2C%22width%22%3A0%2C%22hasBgShadow%22%3Afalse%2C%22bgShadow%22%3A%221px%201px%202px%20%23000%22%2C%22hasTextShadow%22%3Afalse%2C%22textShadow%22%3A%221px%201px%202px%20%23fff%22%2C%22blockMargin%22%3A%7B%7D%2C%22blockPadding%22%3A%7B%7D%2C%22border%22%3A%7B%7D%2C%22borderRadius%22%3A%7B%7D%2C%22hasIcon%22%3Afalse%2C%22iconPos%22%3A%22left%22%2C%22iconGap%22%3A5%2C%22iconName%22%3A%22000_next%22%2C%22iconPaths%22%3A%5B%7B%22d%22%3A%22M6.6%206L5.4%207l4.5%205-4.5%205%201.1%201%205.5-6-5.4-6zm6%200l-1.1%201%204.5%205-4.5%205%201.1%201%205.5-6-5.5-6z%22%7D%5D%2C%22iconColor%22%3A%5B%22%2300f%22%5D%2C%22iconStrokeColor%22%3A%5B%22%23000%22%5D%2C%22iconStrokeWidth%22%3A%5B0%5D%2C%22label%22%3A%22%22%2C%22title%22%3A%22%22%2C%22linkUrl%22%3A%22%22%2C%22linkRel%22%3A%22%22%2C%22linkTarget%22%3A%22%22%2C%22effect%22%3A%22No%20Effect%22%2C%22animation%22%3A%22No%20Animation%22%2C%22animColor%22%3A%22%23fff%22%2C%22classes%22%3A%22%22%7D';
	}

	public function enqueue(): void {
		wp_register_script(
			'safelayout-boxbutton-elementor-control',
			SAFELAYOUT_ICONS_URL . 'elementor/safelayout_boxbutton.js',
			array(),
			SAFELAYOUT_ICONS_VERSION,
		);
		wp_enqueue_script( 'safelayout-boxbutton-elementor-control' );
	}

	public function content_template(): void {
		?>
			<div id="sl-ei-boxbutton-elementor-body"></div>
			<input type="hidden" id="sl-ei-boxbutton-elementor-value" data-setting="{{ data.name }}" />
		<?php
	}

}