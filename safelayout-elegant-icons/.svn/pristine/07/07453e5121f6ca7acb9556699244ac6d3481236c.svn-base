<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

class Safelayout_ribbon_elementor_control extends \Elementor\Base_Data_Control {

	public function get_type(): string {
		return 'Safelayout_ribbon_control';
	}

	public function get_default_value(): string {
		return '<div class="safelayout-ei-ribbon-block"><div class="sl-ei-ribbon-block-effect001" style="--sl-ei-box-ribbon-text-color: #00f; --sl-ei-box-ribbon-background-color: #ea4335; --sl-ei-box-ribbon-pattern-opacity: 0.2; --sl-ei-box-ribbon-pos-offset: 0px;"><div>Ribbon</div></div></div>attsafelayoutatt0attsafelayoutatt%7B%22key%22%3A0%2C%22content%22%3A%22Ribbon%22%2C%22align%22%3A%22%22%2C%22textColor%22%3A%22%2300f%22%2C%22bgColor%22%3A%22%23ea4335%22%2C%22bold%22%3Afalse%2C%22italic%22%3Afalse%2C%22uppercase%22%3Afalse%2C%22fontSize%22%3A%2224px%22%2C%22lineHeight%22%3A%221.5%22%2C%22letterSpacing%22%3A%220px%22%2C%22posOffset%22%3A0%2C%22hasBgShadow%22%3Afalse%2C%22bgShadow%22%3A%221px%201px%202px%20%23000%22%2C%22hasTextShadow%22%3Afalse%2C%22textShadow%22%3A%221px%201px%202px%20%23fff%22%2C%22blockMargin%22%3A%7B%7D%2C%22blockPadding%22%3A%7B%7D%2C%22bgPattern%22%3A%22No%20Pattern%22%2C%22patternOpacity%22%3A0.2%2C%22effect%22%3A%22effect001%22%2C%22hasEffectBorder%22%3Afalse%2C%22effectBorderColor%22%3A%22%23fff%22%2C%22classes%22%3A%22%22%7D';
	}

	public function enqueue(): void {
		wp_register_script(
			'safelayout-ribbon-elementor-control',
			SAFELAYOUT_ICONS_URL . 'elementor/safelayout_ribbon.js',
			array(),
			SAFELAYOUT_ICONS_VERSION,
		);
		wp_enqueue_script( 'safelayout-ribbon-elementor-control' );
	}

	public function content_template(): void {
		?>
			<div id="sl-ei-ribbon-elementor-body"></div>
			<input type="hidden" id="sl-ei-ribbon-elementor-value" data-setting="{{ data.name }}" />
		<?php
	}

}