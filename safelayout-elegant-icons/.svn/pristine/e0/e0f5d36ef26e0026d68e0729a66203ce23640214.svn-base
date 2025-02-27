<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

class Safelayout_iconbox_elementor_control extends \Elementor\Base_Data_Control {

	public function get_type(): string {
		return 'Safelayout_iconbox_control';
	}

	public function get_default_value(): string {
		return '<div class="safelayout-ei-icon-box-block"><div class="sl-ei-icon-box-block-top"><div class="sl-ei-container-block sl-ei-container-block-no-effect sl-ei-container-block-main"><div>safe1359icon1359safe</div><div class="sl-ei-container-block"><div>safe1359head1359safe</div><div>safe1359text1359safe</div></div></div></div></div>attsafelayoutattHeadingattsafelayoutattLorem ipsum dolor sit amet, consectetur adipiscing elit.attsafelayoutatt%7B%22elementStyle%22%3A%22%22%2C%22iconPos%22%3A%22top%22%2C%22iconVerticalPos%22%3A%22flex-start%22%2C%22hasBg%22%3Afalse%2C%22hasBtn%22%3Afalse%2C%22hasRibbon%22%3Afalse%2C%22bgColor%22%3A%22linear-gradient(%23eff%200%25%2C%20%2310ffff%20100%25)%22%2C%22hasBgShadow%22%3Afalse%2C%22bgShadow%22%3A%223px%203px%205px%20%23000%22%2C%22blockMargin%22%3A%7B%7D%2C%22blockPadding%22%3A%7B%7D%2C%22border%22%3A%7B%7D%2C%22borderRadius%22%3A%7B%7D%2C%22label%22%3A%22%22%2C%22title%22%3A%22%22%2C%22bgPattern%22%3A%22No%20Pattern%22%2C%22patternOpacity%22%3A0.2%2C%22effect%22%3A%22No%20Effect%22%2C%22effectValue0%22%3A%22%22%2C%22effectValue1%22%3A%22%22%2C%22effectValue2%22%3A%22%22%2C%22effectValue3%22%3A%22%22%2C%22animation%22%3A%22No%20Animation%22%2C%22animColor%22%3A%22%23fff%22%2C%22classes%22%3A%22%22%2C%22boxTitle%22%3A%22Heading%22%2C%22boxDescription%22%3A%22Lorem%20ipsum%20dolor%20sit%20amet%2C%20consectetur%20adipiscing%20elit.%22%7D';
	}

	public function enqueue(): void {
		wp_register_script(
			'safelayout-iconbox-elementor-control',
			SAFELAYOUT_ICONS_URL . 'elementor/safelayout_iconbox.js',
			array(),
			SAFELAYOUT_ICONS_VERSION,
		);
		wp_enqueue_script( 'safelayout-iconbox-elementor-control' );
	}

	public function content_template(): void {
		?>
			<div id="sl-ei-iconbox-elementor-body"></div>
			<input type="hidden" id="sl-ei-iconbox-elementor-value" data-setting="{{ data.name }}" />
		<?php
	}

}