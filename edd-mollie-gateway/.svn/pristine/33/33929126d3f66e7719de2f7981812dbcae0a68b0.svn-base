<?php
class Mollie_EDD_Helper_Url {
	public function __construct() {
	}
	
	public function addQueryArgsWithoutSlash( $args, $url )
	{
		$url = $this->removeTrailingSlashAfterParamater( $url );
		$url = add_query_arg( $args, $url );
		$url = $this->removeTrailingSlashAfterParamater( $url );

		return esc_url_raw( $url );
	}

	public function cleanURL( $url )
	{
		$site_url    = get_home_url();
		$lang_url    = $this->getSiteUrlWithLanguage();

		// Make sure there aren't any double /? in the URL (some (multilanguage) plugins will add this)
		if ( strpos( $lang_url, '/?' ) !== false ) {
			$lang_url_params = substr( $lang_url, strpos( $lang_url, "/?" ) + 2 );
			$url = $url . '&' . $lang_url_params;
		} else {
			$url = str_replace( $site_url, $lang_url, $url );
		}

		// Some (multilanguage) plugins will add a extra slash to the url (/nl//) causing the URL to redirect and lose it's data.
		// Status updates via webhook will therefor not be processed. The below regex will find and remove those double slashes.
		$url = preg_replace('/([^:])(\/{2,})/', '$1/', $url);
		return $url;
	}

	/**
	 * Remove a trailing slash after a query string if there is one in the WooCommerce API request URL.
	 * For example WMPL adds a query string with trailing slash like /?lang=de/ to WC()->api_request_url.
	 * This causes issues when we append to that URL with add_query_arg.
	 *
	 * @return string
	 */
	protected function removeTrailingSlashAfterParamater( $url ) {

		if ( strpos( $url, '?' ) ) {
			$url = untrailingslashit( $url );
		}

		return $url;
	}

	/**
	 * Check if any multi language plugins are enabled and return the correct site url.
	 *
	 * @return string
	 */
	protected function getSiteUrlWithLanguage() {
		$site_url = get_home_url();

		if ( function_exists('pll_current_language') && function_exists('PLL') && $model = PLL()->model ) {
			if (is_callable(array($model,'get_language'))) {
				$lang = $model->get_language( pll_current_language() );

				if ( ! empty ( $lang->search_url ) ) {
					$polylang_url = $lang->search_url;
					$site_url     = str_replace( $site_url, $polylang_url, $site_url );
				}
			}
		}

		return $site_url;
	}
}