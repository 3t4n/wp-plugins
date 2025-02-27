<?php

namespace TopDeliverability;

class WordPressDebugProvider {

	/**
	 * @return boolean
	 */
	public function isDebugEnabled() {
		return defined( 'WP_DEBUG' ) and filter_var( WP_DEBUG, FILTER_VALIDATE_BOOLEAN );
	}
}
