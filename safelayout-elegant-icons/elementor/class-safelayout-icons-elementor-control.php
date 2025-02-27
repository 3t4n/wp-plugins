<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

class Safelayout_icons_elementor_control extends \Elementor\Base_Data_Control {

	public function get_type(): string {
		return 'Safelayout_icons_control';
	}

	public function get_default_value(): string {
		return '<div class="safelayout-ei-icon-block"><div style="height: 48px; width: 48px;"><svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><defs><linearGradient id="bgFillGradc6489bdf-0c93-224e-2051-1804941ae652" x1="0.5" y1="1" x2="0.5" y2="0"><stop stop-color="#0130FF" offset="0"></stop><stop stop-color="#3CB4FF" offset="1"></stop></linearGradient></defs><g><rect x="4" y="4" width="88" height="88" rx="8.8" fill="url(#bgFillGradc6489bdf-0c93-224e-2051-1804941ae652)" stroke="#000" stroke-width="0"></rect></g></svg><svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" style="height: calc(110% - 7px); width: calc(110% - 7px);"><defs><linearGradient id="fillGradc6489bdf-0c93-224e-2051-1804941ae6520" x1="0.1464" y1="0.8536" x2="0.8536" y2="0.1464"><stop stop-color="#FF59BF" offset="0"></stop><stop stop-color="#FF99D9" offset="0.24"></stop><stop stop-color="#A6FF66" offset="0.75"></stop><stop stop-color="#8CFF4C" offset="1"></stop></linearGradient></defs><symbol viewBox="0 0 24 24" id="pathc6489bdf-0c93-224e-2051-1804941ae652"><path vector-effect="non-scaling-stroke" fill="url(#fillGradc6489bdf-0c93-224e-2051-1804941ae6520)" stroke="#000" stroke-width="0" d="M20.465 5.76s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24-.61.3-5.76 3.47-7.67 5.57-.86.96-2.06 3.79-1.09 4.82.92 .98 3.96-.17 4.79-1 2.06-2.06 5.21-7.17 5.5-7.79zM3.535 19.84c2.37-1.56 1.46-3.41 3.23-4.64.93-.65 2.22-.62 3.08.29 .63.67 .8 2.57-.16 3.46-1.57 1.45-4 1.55-6.15.89z"></path></symbol><use href="#pathc6489bdf-0c93-224e-2051-1804941ae652"></use></svg></div></div>attsafelayoutatt%7B%22rotate%22%3A0%2C%22flipHorizontal%22%3Afalse%2C%22flipVertical%22%3Afalse%2C%22rotateBg%22%3A0%2C%22top%22%3A0%2C%22name%22%3A%22001_admin%20customizer%22%2C%22paths%22%3A%5B%7B%22d%22%3A%22M20.465%205.76s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24-.61.3-5.76%203.47-7.67%205.57-.86.96-2.06%203.79-1.09%204.82.92%20.98%203.96-.17%204.79-1%202.06-2.06%205.21-7.17%205.5-7.79zM3.535%2019.84c2.37-1.56%201.46-3.41%203.23-4.64.93-.65%202.22-.62%203.08.29%20.63.67%20.8%202.57-.16%203.46-1.57%201.45-4%201.55-6.15.89z%22%7D%5D%2C%22hasBg%22%3Atrue%2C%22bgShape%22%3A%22rect%22%2C%22bgShapeVal%22%3A%22%22%2C%22size%22%3A%2248px%22%2C%22color%22%3A%5B%22linear-gradient(45deg%2C%20%23FF59BF%200%25%2C%20%23FF99D9%2024%25%2C%20%23A6FF66%2075%25%2C%20%238CFF4C%20100%25)%22%5D%2C%22strokeColor%22%3A%5B%22%23000%22%5D%2C%22strokeWidth%22%3A%5B0%5D%2C%22hasShadow%22%3Afalse%2C%22shadow%22%3A%22drop-shadow(2px%202px%201px%20%23000)%22%2C%22svgFilter%22%3A%22none%22%2C%22bgColor%22%3A%22linear-gradient(0deg%2C%230130FF%200%25%2C%233CB4FF%20100%25)%22%2C%22bgStrokeColor%22%3A%22%23000%22%2C%22bgStrokeWidth%22%3A0%2C%22hasBgShadow%22%3Afalse%2C%22bgShadow%22%3A%22drop-shadow(0px%203px%202px%20%23000)%22%2C%22hasBaseShadow%22%3Afalse%2C%22baseShadowWidth%22%3A70%2C%22baseShadowHeight%22%3A12%2C%22baseShadowTop%22%3A96%2C%22padding%22%3A3%2C%22bgRadius%22%3A10%2C%22effect%22%3A%22No%20Effect%22%2C%22animation%22%3A%22No%20Animation%22%2C%22label%22%3A%22%22%2C%22title%22%3A%22%22%2C%22linkUrl%22%3A%22%22%2C%22linkRel%22%3A%22%22%2C%22linkTarget%22%3A%22%22%2C%22blockId%22%3A%22c6489bdf-0c93-224e-2051-1804941ae652%22%2C%22classes%22%3A%22%22%7D';
	}

	public function enqueue(): void {
		wp_register_script(
			'safelayout-icons-elementor-control',
			SAFELAYOUT_ICONS_URL . 'elementor/safelayout_icons.js',
			array(),
			SAFELAYOUT_ICONS_VERSION,
		);
		wp_enqueue_script( 'safelayout-icons-elementor-control' );
	}

	public function content_template(): void {
		?>
			<div id="sl-ei-elementor-body"></div>
			<input type="hidden" id="sl-ei-elementor-value" data-setting="{{ data.name }}" />
		<?php
	}

}