<?php

namespace TopDeliverability;

class WordPressVersionProvider {

	/**
	 * @return string
	 */
	public function get() {
		global $wp_version;
		return $wp_version;
	}
}
