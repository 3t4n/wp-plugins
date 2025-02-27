<?php

namespace TopDeliverability\Menu;

abstract class MenuEntry {

	/**
	 * @return string
	 */
	abstract public function getSlug();

	/**
	 * @return string
	 */
	abstract public function getTitle();

	/**
	 * @return string
	 */
	abstract public function getMenuTitle();

	/**
	 * @return string
	 */
	public function getUrl() {
		return menu_page_url( $this->getSlug(), false );
	}
}
