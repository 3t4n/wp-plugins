<?php

namespace AGA\Frontend;

use AGA\Core\Ga_Object;
use AGA\Core\Siteinfo;

/**
 * Class Render
 * @package AGA\Frontend
 */
class Render {

	/**
	 * @var array
	 */
	private $js;

	/**
	 * Construct the tracking code
	 */
	public function __construct() {
		$this->js = array();

		$this->ga_object = new Ga_Object();
		$this->siteinfo  = new Siteinfo();

		/**
		 * Set the tracking details
		 */
		$this->set_tracking_code();
	}

	/**
	 * Get the complete JavaScript tracking code
	 *
	 * @return mixed
	 */
	public function get_tracking_code() {
		return $this->js;
	}

	/**
	 * Get the complete Javascript tracking code in HTML
	 *
	 * @return null|string
	 */
	public function get_html_tracking_code() {
		$html = null;

		foreach( $this->js as $key => $value ) {
			$html .= $value . PHP_EOL;
		}

		return $html;
	}

	/**
	 * Set and build the trackingcode
	 */
	private function set_tracking_code() {
		$this->js[] = '<!-- Awesome Google Analytics by CodeBrothers, version ' . AGA_VERSION . ' - https://wordpress.org/plugins/awesome-google-analytics/ -->';
		$this->js[] = '<script type="text/javascript">';
		$this->add_js_values();
		$this->js[] = '</script>';
		$this->js[] = '<!-- / Awesome Google Analytics by CodeBrothers - https://wordpress.org/plugins/awesome-google-analytics/ -->';
	}

	/**
	 * Call all setters
	 */
	private function add_js_values() {
		$this->set_google_code();
		$this->set_ua_code();
		if( $this->ga_object->demographics_enabled() === true ) {
			$this->set_demographics_code();
		}
		if( $this->ga_object->anonymizeip_enabled() === true ) {
			$this->set_anonymizeip_code();
		}
		if( $this->ga_object->forcessl_enabled() === true ) {
			$this->set_forcessl_code();
		}
		if( $this->ga_object->autotrack_enabled() === true ) {
			$this->set_autotrack_code();
		}
		$this->set_sent_pageview();
	}

	/**
	 * Set the Google code
	 */
	private function set_google_code() {
		$this->js[] = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');";
	}

	/**
	 * Set the UA code and domain
	 */
	private function set_ua_code() {
		$this->js[] = "ga('create', '" . $this->ga_object->get_ua_code() . "', '" . $this->siteinfo->get_siteurl() . "');";
	}

	/**
	 * Set the demographics and interest reporting code
	 */
	private function set_demographics_code() {
		$this->js[] = "ga('require', 'displayfeatures');";
	}

	/**
	 * Set the demographics and interest reporting code
	 */
	private function set_anonymizeip_code() {
		$this->js[] = "ga('set', 'anonymizeIp', true);";
	}

	/**
	 * Set the demographics and interest reporting code
	 */
	private function set_forcessl_code() {
		$this->js[] = "ga('set', 'forceSSL', true);";
	}

	/**
	 * Set the autotrack code
	 */
	private function set_autotrack_code() {
		$this->js[] = "ga('require', 'autotrack');";
	}

	/**
	 * Sent the pageview to Google
	 */
	private function set_sent_pageview() {
		$this->js[] = "ga('send', 'pageview');";
	}

}