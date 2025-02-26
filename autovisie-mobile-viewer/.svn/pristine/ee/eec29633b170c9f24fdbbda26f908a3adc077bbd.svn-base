<?php

/**
 * Class Mobile_Viewer
 */

class Mobile_Viewer {
	function __construct() {

	}

	/**
	 * Building the iPhone 6 code
	 * @param $use_link
	 * @return string
	 */
	public function block_iphone6($use_link) {

		$r = '
			<div class="mobile-viewer mobile-viewer-iphone6">
				<div class="mobile-viewer-container">
					' . $this->iframe($use_link) . '
					' . $this->tools($use_link) . '
				</div>
			</div>
			';

		return $r;
	}

	/**
	 * Building the Samsung S7 code
	 * @param $use_link
	 * @return string
	 */

	public function block_samsung_s7($use_link) {

		$r = '
			<div class="mobile-viewer mobile-viewer-samsung-s7">
				<div class="mobile-viewer-container">
					' . $this->iframe($use_link) . '
					' . $this->tools($use_link) . '
				</div>
			</div>
			';

		return $r;
	}


	/**
	 * Buildin the iframe, with including a query string to make sure there isnt an infinite loop
	 * @param $use_link
	 * @return string
	 */
	private function iframe($use_link) {
		$link = add_query_arg( 'mobile_viewer_open', 'true', $use_link );
		return '<iframe src="' . $link . '"></iframe>';
	}


	/**
	 * Some usefull tools
	 * @param $use_link
	 * @return string
	 */
	private function tools($use_link) {

		$r = '<div class="tools">
				<a href="https://viewports.org/?utm_source=wordpress&utm_medium=tool&utm_term=Mobile-Viewer&utm_content=Plugin&utm_campaign=Mobile-Viewer" target="_blank"><i class="fa fa-desktop"></i></a>
				<a href="https://opengraph.nl/?site='.urlencode ($use_link).'&utm_source=wordpress&utm_medium=tool&utm_term=Mobile-Viewer&utm_content=Plugin&utm_campaign=Mobile-Viewer" target="_blank"><i class="fa fa-table"></i></a>
			</div>';

		return $r;
	}

}