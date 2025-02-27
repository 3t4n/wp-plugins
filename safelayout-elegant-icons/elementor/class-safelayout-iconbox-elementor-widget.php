<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

class Safelayout_iconbox_elementor_widget extends \Elementor\Widget_Base {

	public function get_name(): string {
		return 'Safelayout_iconbox_widget';
	}

	public function get_title(): string {
		return esc_html__( 'icon box (Safelayout)', 'safelayout-elegant-icons' );
	}

	public function get_icon(): string {
		return 'eicon-icon-box safelayout-ei-elementor-widget-iconbox';
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
			__( 'Icon box', 'safelayout-elegant-icons' ),
			__( 'Icons box', 'safelayout-elegant-icons' ),
			__( 'Safelayout', 'safelayout-elegant-icons' ),
			__( 'Elegant', 'safelayout-elegant-icons' ),
		];
	}

	public function get_style_depends(): array {
		return [ 'safelayout-safelayout-icon-style', 'safelayout-safelayout-icon-box-style' ];
	}

	protected function register_controls(): void {
		$this->start_controls_section(
			'section_iconbox',
			[
				'label' => esc_html__( 'Icon Box (Safelayout)', 'safelayout-elegant-icons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'iconbox',
			[ 'type' => 'Safelayout_iconbox_control', ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'safelayout-elegant-icons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon',
			[
				'type' => 'Safelayout_icons_control',
				'default' => '<div class="safelayout-ei-icon-block" style="position: relative;top: 0px"><div style="height: 82px;width: 82px"><svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><defs><linearGradient id="bgFillGrad10a57afd-15cf-3057-d0bf-5305bfe2e5f4" x1="0.5" y1="0" x2="0.5" y2="1"><stop stop-color="rgb(237, 57, 8)" offset="0"></stop><stop stop-color="rgb(255, 110, 2)" offset="0.19"></stop><stop stop-color="rgb(255, 182, 1)" offset="0.31"></stop><stop stop-color="rgb(255, 255, 0)" offset="0.5"></stop><stop stop-color="rgb(255, 182, 0)" offset="0.61"></stop><stop stop-color="rgb(255, 109, 0)" offset="0.81"></stop><stop stop-color="rgb(246, 83, 4)" offset="0.92"></stop><stop stop-color="rgb(237, 57, 8)" offset="1"></stop></linearGradient><defs><linearGradient id="fillGradafter10a57afd-15cf-3057-d0bf-5305bfe2e5f40" x1="0.5" y1="0" x2="0.5" y2="1"><stop stop-color="#303030" offset="0"></stop><stop stop-color="#151515" offset="0.3"></stop><stop stop-color="#000" offset="0.5"></stop><stop stop-color="#151515" offset="0.7"></stop><stop stop-color="#303030" offset="1"></stop></linearGradient></defs></defs><g><rect x="4" y="4" width="88" height="88" rx="44" fill="url(#bgFillGrad10a57afd-15cf-3057-d0bf-5305bfe2e5f4)" stroke="#000" stroke-width="0" style="filter: drop-shadow(rgb(0, 0, 0) 1px 1px 2px)"></rect><rect x="12" y="12" width="72" height="72" rx="44" fill="url(#fillGradafter10a57afd-15cf-3057-d0bf-5305bfe2e5f40)" stroke="none" stroke-width="0"></rect></g></svg><svg viewBox="0 0 96 96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" style="height: calc(110% - 34px);width: calc(110% - 34px)"><defs><linearGradient id="fillGrad10a57afd-15cf-3057-d0bf-5305bfe2e5f40" x1="0.1464" y1="0.8536" x2="0.8536" y2="0.1464"><stop stop-color="#FF59BF" offset="0"></stop><stop stop-color="#FF99D9" offset="0.24"></stop><stop stop-color="#A6FF66" offset="0.75"></stop><stop stop-color="#8CFF4C" offset="1"></stop></linearGradient></defs><symbol viewBox="0 0 24 24" id="path10a57afd-15cf-3057-d0bf-5305bfe2e5f4"><path vector-effect="non-scaling-stroke" fill="url(#fillGrad10a57afd-15cf-3057-d0bf-5305bfe2e5f40)" stroke="#000" stroke-width="0" d="M20.465 5.76s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24-.61.3-5.76 3.47-7.67 5.57-.86.96-2.06 3.79-1.09 4.82.92 .98 3.96-.17 4.79-1 2.06-2.06 5.21-7.17 5.5-7.79zM3.535 19.84c2.37-1.56 1.46-3.41 3.23-4.64.93-.65 2.22-.62 3.08.29 .63.67 .8 2.57-.16 3.46-1.57 1.45-4 1.55-6.15.89z"></path></symbol><use href="#path10a57afd-15cf-3057-d0bf-5305bfe2e5f4"></use></svg></div></div>attsafelayoutatt%7B%22rotate%22%3A0%2C%22flipHorizontal%22%3Afalse%2C%22flipVertical%22%3Afalse%2C%22rotateBg%22%3A0%2C%22top%22%3A0%2C%22name%22%3A%22001_admin%20customizer%22%2C%22paths%22%3A%5B%7B%22d%22%3A%22M20.465%205.76s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24-.61.3-5.76%203.47-7.67%205.57-.86.96-2.06%203.79-1.09%204.82.92%20.98%203.96-.17%204.79-1%202.06-2.06%205.21-7.17%205.5-7.79zM3.535%2019.84c2.37-1.56%201.46-3.41%203.23-4.64.93-.65%202.22-.62%203.08.29%20.63.67%20.8%202.57-.16%203.46-1.57%201.45-4%201.55-6.15.89z%22%7D%5D%2C%22hasBg%22%3Atrue%2C%22bgShape%22%3A%22rect%22%2C%22bgShapeVal%22%3A%22%22%2C%22size%22%3A%2282px%22%2C%22color%22%3A%5B%22linear-gradient(45deg%2C%20%23FF59BF%200%25%2C%20%23FF99D9%2024%25%2C%20%23A6FF66%2075%25%2C%20%238CFF4C%20100%25)%22%5D%2C%22strokeColor%22%3A%5B%22%23000%22%5D%2C%22strokeWidth%22%3A%5B0%5D%2C%22hasShadow%22%3Afalse%2C%22shadow%22%3A%22drop-shadow(2px%202px%201px%20%23000)%22%2C%22svgFilter%22%3A%22none%22%2C%22bgColor%22%3A%22linear-gradient(rgb(237%2C%2057%2C%208)%200%25%2C%20rgb(255%2C%20110%2C%202)%2019%25%2C%20rgb(255%2C%20182%2C%201)%2031%25%2C%20rgb(255%2C%20255%2C%200)%2050%25%2C%20rgb(255%2C%20182%2C%200)%2061%25%2C%20rgb(255%2C%20109%2C%200)%2081%25%2C%20rgb(246%2C%2083%2C%204)%2092%25%2C%20rgb(237%2C%2057%2C%208)%20100%25)%22%2C%22bgStrokeColor%22%3A%22%23000%22%2C%22bgStrokeWidth%22%3A0%2C%22hasBgShadow%22%3Atrue%2C%22bgShadow%22%3A%22drop-shadow(1px%201px%202px%20%23000)%22%2C%22hasBaseShadow%22%3Afalse%2C%22baseShadowWidth%22%3A70%2C%22baseShadowHeight%22%3A12%2C%22baseShadowTop%22%3A96%2C%22padding%22%3A14%2C%22bgRadius%22%3A50%2C%22effect%22%3A%22effect003%22%2C%22animation%22%3A%22No%20Animation%22%2C%22label%22%3A%22%22%2C%22title%22%3A%22%22%2C%22linkUrl%22%3A%22%22%2C%22linkRel%22%3A%22%22%2C%22linkTarget%22%3A%22%22%2C%22blockId%22%3A%2210a57afd-15cf-3057-d0bf-5305bfe2e5f4%22%2C%22classes%22%3A%22%22%7D',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_boxhead',
			[
				'label' => esc_html__( 'Title', 'safelayout-elegant-icons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'boxhead',
			['type' => 'Safelayout_boxhead_control',]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_boxtext',
			[
				'label' => esc_html__( 'Description', 'safelayout-elegant-icons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'boxtext',
			['type' => 'Safelayout_boxtext_control',]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_boxbutton',
			[
				'label' => esc_html__( 'Button', 'safelayout-elegant-icons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'boxbutton',
			[ 'type' => 'Safelayout_boxbutton_control', ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_ribbon',
			[
				'label' => esc_html__( 'Ribbon', 'safelayout-elegant-icons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'ribbon',
			[ 'type' => 'Safelayout_ribbon_control', ]
		);
		$this->end_controls_section();
	}

	public function get_data( $item = null ) {
		$data = parent::get_data( $item );
		$allowed_html = Safelayout_elegant_icons::allowed_html( array(), 'post' );
		if ( isset( $data['settings']['iconbox'] ) ) {
			$data['settings']['iconbox'] = wp_kses( $data['settings']['iconbox'], $allowed_html );
		}
		if ( isset( $data['settings']['icon'] ) ) {
			$data['settings']['icon'] = wp_kses( $data['settings']['icon'], $allowed_html );
		}
		if ( isset( $data['settings']['boxhead'] ) ) {
			$data['settings']['boxhead'] = wp_kses( $data['settings']['boxhead'], $allowed_html );
		}
		if ( isset( $data['settings']['boxtext'] ) ) {
			$data['settings']['boxtext'] = wp_kses( $data['settings']['boxtext'], $allowed_html );
		}
		if ( isset( $data['settings']['boxbutton'] ) ) {
			$data['settings']['boxbutton'] = wp_kses( $data['settings']['boxbutton'], $allowed_html );
		}
		if ( isset( $data['settings']['ribbon'] ) ) {
			$data['settings']['ribbon'] = wp_kses( $data['settings']['ribbon'], $allowed_html );
		}
		return $data;
	}

	protected function render(): void {
		$settings = $this->get_settings_for_display();
		$allowed_html = Safelayout_elegant_icons::allowed_html( array(), 'post' );
		$iconbox = explode( 'attsafelayoutatt', $settings['iconbox'] );
		$icon = explode( 'attsafelayoutatt', $settings['icon'] );
		$boxhead = explode( 'attsafelayoutatt', $settings['boxhead'] );
		$boxtext = explode( 'attsafelayoutatt', $settings['boxtext'] );
		$boxbutton = explode( 'attsafelayoutatt', $settings['boxbutton'] );
		$ribbon = explode( 'attsafelayoutatt', $settings['ribbon'] );

		if ( count( $iconbox ) == 10 ) {
			if ( $iconbox[5] > $ribbon[1] ) {
				$ribbon[0] = $iconbox[4];
			}
			if ( $iconbox[8] > $boxbutton[1] ) {
				$boxbutton[0] = $iconbox[7];
			}
		}
		$box = str_ireplace( '<div>safe1359icon1359safe</div>', $icon[0], $iconbox[0] );
		$box = str_ireplace( '<div>safe1359ribbon1359safe</div>', $ribbon[0], $box );
		$box = str_ireplace( '<div>safe1359btn1359safe</div>', $boxbutton[0], $box );
		$head = str_ireplace( '<div>safe1359head1359safe</div>', $iconbox[1], $boxhead[0] );
		$box = str_ireplace( '<div>safe1359head1359safe</div>', $head, $box );
		$text = str_ireplace( '<div>safe1359text1359safe</div>', $iconbox[2], $boxtext[0] );
		$box = str_ireplace( '<div>safe1359text1359safe</div>', $text, $box );
		echo wp_kses( $box, $allowed_html );
	}

	protected function content_template(): void {
		?>
		<#
			if ( SLEImceIcons.elementorAction == 0 && view?.el?.classList?.contains( 'elementor-element-editable' ) ) {
				document.getElementById( 'sl-ei-elementor-value' )?.dispatchEvent(new Event('click') );
				document.getElementById( 'sl-ei-boxbutton-elementor-value' )?.dispatchEvent(new Event('click') );
				document.getElementById( 'sl-ei-boxhead-elementor-value' )?.dispatchEvent(new Event('click') );
				document.getElementById( 'sl-ei-boxtext-elementor-value' )?.dispatchEvent(new Event('click') );
				document.getElementById( 'sl-ei-iconbox-elementor-value' )?.dispatchEvent(new Event('click') );
				document.getElementById( 'sl-ei-ribbon-elementor-value' )?.dispatchEvent(new Event('click') );
			}
			SLEImceIcons.elementorAction = 0;
			let iconbox = settings.iconbox.split( 'attsafelayoutatt' ),
				icon = settings.icon.split( 'attsafelayoutatt' ),
				boxhead = settings.boxhead.split( 'attsafelayoutatt' ),
				boxtext = settings.boxtext.split( 'attsafelayoutatt' ),
				boxbutton = settings.boxbutton.split( 'attsafelayoutatt' ),
				ribbon = settings.ribbon.split( 'attsafelayoutatt' );

			if ( iconbox?.length == 10 ) {
				if ( Number( iconbox[5] ) > Number( ribbon[1] ) ) {
					ribbon[0] = iconbox[4];
				}
				if ( Number( iconbox[8] ) > Number( boxbutton[1] ) ) {
					boxbutton[0] = iconbox[7];
				}
			}
			let head = boxhead[0].replace( '<div>safe1359head1359safe</div>', iconbox[1] ),
				text = boxtext[0].replace( '<div>safe1359text1359safe</div>', iconbox[2] ),
				box = iconbox[0].replace( '<div>safe1359icon1359safe</div>', icon[0] );
			box = box.replace( '<div>safe1359ribbon1359safe</div>', ribbon[0] );
			box = box.replace( '<div>safe1359btn1359safe</div>', boxbutton[0] );
			box = box.replace( '<div>safe1359head1359safe</div>', head );
			box = box.replace( '<div>safe1359text1359safe</div>', text );
		#>
			{{{ box }}}
		<?php
	}
}