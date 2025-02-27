<?php

namespace DCL\Client;

/**
 * DCL_Cache_Helper Class
 *
 * @since      1.0.4
 * @package    DCL\Client
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Cache_Helper extends DCL_Client {

	public function dcl_additional_nocache_headers( $headers ) {
		// Opt-out of Google weblight if page is dynamic https://support.google.com/webmasters/answer/6211428?hl=en.
		$headers['Cache-Control'] = 'no-transform, no-cache, must-revalidate, max-age=0';
		return $headers;
	}

	/**
	 * Prevent caching on certain pages
	 *
	 * @since 1.0.4
	 */
	public function dcl_prevent_caching() {
		if ( ! is_blog_installed() ) {
			return;
		}

		if ( $this->dcl_is_access_restricted() ) {
			self::dcl_set_nocache_constants();
			nocache_headers();
		}
	}

	/**
	 * Set constants to prevent caching by some plugins.
	 *
	 * @param  mixed $return Value to return. Previously hooked into a filter.
	 * @return mixed
	 * @since 1.0.4
	 */
	public function dcl_set_nocache_constants( $return = true ) {
		$this->dcl_maybe_define_constant( 'DONOTCACHEPAGE', true );
		$this->dcl_maybe_define_constant( 'DONOTCACHEOBJECT', true );
		$this->dcl_maybe_define_constant( 'DONOTCACHEDB', true );
		return $return;
	}
}