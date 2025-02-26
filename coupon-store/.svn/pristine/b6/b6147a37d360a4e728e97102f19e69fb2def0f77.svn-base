<?php

class CouponStore {

	function CouponStore() {
		$this->__construct();
	}

	function __construct() {

		// Add shortcode
		add_shortcode( 'couponstore', array($this, 'shortcode') );

		// Add filters
		add_filter( 'the_content', array(&$this, 'hide_title') );
		add_filter('comments_template', array(&$this, 'hide_comments') );
	}

	function shortcode( $atts ) {

		$code = '';

		// Extract shortcode options
		extract( shortcode_atts( array('site' => 'redplum'), $atts ) );

		if (!empty($atts['site'])) {
			switch($atts['site']) {
				case 'redplum':
					$code = $this->shortcode_redplum();
					break;
				case 'smartsource':
					$code = $this->shortcode_smartsource();
					break;
				case 'couponnetwork':
					$code = $this->shortcode_couponnetwork();
					break;
			}
		}
		else {
			$code = $this->shortcode_redplum();
		}

		return $code;
	}

	function shortcode_redplum() {
		$code = '<iframe id="host_iframe" name="host_iframe" src="http://clipncrazy.com/sites/redplum/" scrolling="NO" frameborder="0" width="590" height="1500"></iframe>';
		return $code;
	}

	function shortcode_smartsource() {
		$code = '<iframe id="host_iframe" name="host_iframe" src="http://clipncrazy.com/sites/smartsource/" frameborder="0" scrolling="NO" width="590" height="1400"></iframe>';
		return $code;
	}

	function shortcode_couponnetwork() {
		$code = '<iframe src="http://clipncrazy.com/sites/couponnetwork/" width="520" height="1074" frameborder="0" scrolling="no"></iframe>';
		return $code;
	}

	function hide_title( $content ) {

		if (strstr($content, '[couponstore') != false) {
			return '<style>.entry-title {display:none;}</style>'.$content;
		}
		else {
			return $content;
		}
	}

	function hide_comments( $file ) {

		$content = get_the_content();

		if (strstr($content, '[couponstore') != false) {
			$file = dirname( __FILE__ ) . '/empty-file.php';
		}

		return $file;
	}

}
?>
