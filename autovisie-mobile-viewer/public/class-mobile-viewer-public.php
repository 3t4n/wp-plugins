<?php

/**
 * Public display functions
 *
 * @link       https://autovisie.nl
 * @since      1.0.0
 *
 * @package    Mobile_Viewer_Public
 * @subpackage Mobile_Viewer/public
 */


class Mobile_Viewer_Public {


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	static function enqueue_styles()
	{
		global $mobile_viewer_plugin_url;
		wp_enqueue_script( 'mobile-viewer', $mobile_viewer_plugin_url . 'public/js/mobile-viewer-public.js' );
		wp_enqueue_style( 'mobile-viewer', $mobile_viewer_plugin_url . 'public/css/mobile-viewer-public.css' );
		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
	}

	/**
	 * Add class to body
	 *
	 * @param $classes
	 * @return array
	 */
	static function add_body_class( $classes ) {
		$classes[] = 'mobile-viewer-body';
		return $classes;
	}


	/**
	 * If loaded via iframe disable admin bar
	 * And also block loading it again, because infinite loop
	 */
	static function remove_admin_bar() {
		if ( isset($_GET ['mobile_viewer_open']) && ( $_GET ['mobile_viewer_open'] == "true" ) ) {
			show_admin_bar( false );
			add_action( 'wp_head', function() {
				echo "<style>html { margin-top: 0!important; }</style>";
			}, 5);


		}

	}

	/**
	 * Output all the phones
	 *
	 * @param $use_link
	 * @return string
	 */
	public function html_blocks($use_link) {
		$mobile_viewer = new Mobile_Viewer();
		$phones = $mobile_viewer->phones();
		if( empty( $phones ) || !is_array( $phones ) ) {
			return '';
		}

		$tabs = '';
		$dropdown = '<select onchange="set_mobile_view(this.value);" class="styled-select black rounded">';

		foreach ( $mobile_viewer->phones() as $identifier => $phone_data ) {
			$set_selected = ( isset( $phone_data['active'] ) && $phone_data['active'] === 1 ) ? 'SELECTED' : '';
			$dropdown .= sprintf('<option value="mobile-viewer-%s" %s>%s', $identifier, $set_selected, $phone_data['title']) . '</option>';
			$tabs .= $this->html_block($identifier, $phone_data, $use_link);
		}

		$dropdown .= '</select>';

		return $dropdown . $tabs;
	}

	/**
	 * Building the phone block code
	 * @param $use_link
	 * @return string
	 */
	public function html_block($identifier, $phone_data, $use_link) {
		$set_active = ( isset( $phone_data['active'] ) && $phone_data['active'] === 1 ) ? 'mobile-viewer-tab-active' : '';

		return sprintf('<div class="mobile-viewer-tab %s mobile-viewer mobile-viewer-%s" title="%s">
					<div class="mobile-viewer-container">
						%s
						%s
					</div>
				</div>'
				,$set_active
				,$identifier
				,$phone_data['title']
				,$this->html_iframe($use_link)
				,$this->html_tools($use_link)
			);
	}


	/**
	 * Buildin the iframe, with including a query string to make sure there isnt an infinite loop
	 * @param $use_link
	 * @return string
	 */
	public function html_iframe($use_link) {
		$link = add_query_arg( 'mobile_viewer_open', 'true', $use_link );
		return '<iframe src="' . $link . '"></iframe>';
	}


	/**
	 * Some usefull tools
	 * @param $use_link
	 * @return string
	 */
	public function html_tools($use_link) {

		$r = sprintf( '<div class="tools">
					<a href="https://viewports.org/?utm_source=wordpress&utm_medium=tool&utm_term=Mobile-Viewer&utm_content=Plugin&utm_campaign=Mobile-Viewer" target="_blank"><i class="fa fa-desktop"></i></a>
					<a href="https://opengraph.nl/?site=%s&utm_source=wordpress&utm_medium=tool&utm_term=Mobile-Viewer&utm_content=Plugin&utm_campaign=Mobile-Viewer" target="_blank"><i class="fa fa-table"></i></a>
				</div>'
				, urlencode( $use_link )
			);

		return $r;
	}

}