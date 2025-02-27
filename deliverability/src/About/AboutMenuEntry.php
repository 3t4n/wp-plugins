<?php

namespace TopDeliverability\About;

use TopDeliverability\Menu\MenuEntry;
use const TopDeliverability\BASE_SLUG;

class AboutMenuEntry extends MenuEntry {

	/**
	 * @return string
	 */
	public function getSlug() {
		return BASE_SLUG . '-about';
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return __( 'About', 'deliverability' );
	}

	/**
	 * @return string
	 */
	public function getMenuTitle() {
		return __( 'About', 'deliverability' );
	}
}
