<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Created by NTC.
 * User: NTC - https://ntcde.com
 * Date: 7/23/2019 - 3:55 PM
 * Project Name: WP Page Loading
 */
class Helpers {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	public function wp_loading_load_plugin_textdomain() {
		load_plugin_textdomain( $this->plugin_name, false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
	}

	function wp_loading_add_scripts() {
		if ( $this->isShowWPLoading() ) {
			$wp_loading_duration = carbon_get_theme_option( 'wp_loading_duration' );
			$wp_loading_duration = $wp_loading_duration != '' ? intval( $wp_loading_duration ) : 1000;
			?>
            <script id="wp-page-loading-js">
                window.addEventListener("load", a => {
                    let e = document.getElementById("wp-page-loader");
                    try {
                        setTimeout(function () {
                            e && e.classList.add("available")
                        },<?php echo esc_attr( $wp_loading_duration ); ?>)
                    } catch (l) {
                        console.error(l), e && e.classList.add("available")
                    }
                });
			</script>
			<?php
		}
	}

	function wp_loading_admin_enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, WP_PAGE_LOADING_URL . 'admin/js/main.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name, 'WP_PL_OBJ', [
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		] );
	}

	//=============

	function wp_loading_auto_make_field() {
		$fields     = array();
		$all_layout = $this->wp_loading_get_all_layout();
		$fields[]   = Field::make( 'checkbox', 'wp_loading_show', __( 'Show loading page', 'wp-loading' ) )->set_default_value( true );
		$fields[]   = Field::make( 'text', 'wp_loading_duration', __( 'Loading duration (Default: 1000 - 1s)', 'wp-loading' ) )->set_attribute( 'type', 'number' )->set_default_value( 1000 );
		$fields[]   = Field::make( 'select', 'wp_loading_select_layout', __( 'Select layout', 'wp-loading' ) )->add_options( $this->wp_loading_list_layout_name() );
		foreach ( $all_layout as $layout => $path ) {
			$json_layout_content = $this->wp_loading_get_content_layout( $layout );
			$vars                = isset( $json_layout_content['var'] ) ? $json_layout_content['var'] : [];

			$fields[] = Field::make( 'html', 'wp_loading_options_layout_text' . $layout )->set_html( '<strong>Options ' . ucfirst( str_replace( '-', ' ', $layout ) ) . '</strong>' )->set_conditional_logic( array(
				'relation' => 'AND',
				array(
					'field'   => 'wp_loading_select_layout',
					'value'   => $layout,
					'compare' => '=',
				)
			) );

			foreach ( $vars as $var => $val ) {
				$fields[] = Field::make( 'color', 'wp_loading_' . $layout . "_" . $var, ucfirst( str_replace( '_', ' ', $var ) ) )->set_palette( array(
						$val,
					) )->set_conditional_logic( array(
						'relation' => 'AND',
						array(
							'field'   => 'wp_loading_select_layout',
							'value'   => $layout,
							'compare' => '=',
						)
					) )->set_alpha_enabled( true )->set_default_value( $val )->set_width( 20 );
			}
		}
		Container::make( 'theme_options', __( 'WP Loading Options', 'wp-loading' ) )->set_page_file( 'wp_loading_page_options' )->add_tab( __( 'Options Setting', 'wp-loading' ), ( $fields ) );

		// make fields post/page
		Container::make( 'post_meta', __( 'Preloader Options', 'wp-loading' ) )->where( 'post_type', 'IN', [
			'page',
			'post'
		] )->add_fields( array(
			Field::make( 'checkbox', 'wp_loading_disable', __( 'Disable preloader', 'wp-loading' ) )->set_default_value( false )
		) )->set_context( "side" );
	}

	/**
	 * @return bool
	 */
	public function isDisableLoadingOnPost() {
		return carbon_get_post_meta( get_the_ID(), 'wp_loading_disable' );
	}

	/**
	 * @return bool
	 */
	public function isShowWPLoading() {
		return carbon_get_theme_option( 'wp_loading_show' ) && ! $this->isDisableLoadingOnPost();
	}

	/**
	 * @param array $find
	 * @param array $replace
	 * @param string $str
	 *
	 * @return string|string[]
	 */
	private function wp_loading_replace_variable( $find = array(), $replace = array(), $str = '' ) {
		return str_replace( $find, $replace, $str );
	}

	/**
	 * @return array
	 */
	private function wp_loading_get_all_layout() {
		$files = array();
		foreach ( glob( WP_PAGE_LOADING_PATH . "includes/layouts/*.json" ) as $file ) {
			$file_name           = basename( $file, '.json' );
			$files[ $file_name ] = $file;
		}

		return $files;
	}

	/**
	 * @return array
	 */
	private function wp_loading_list_layout_name() {
		$layouts = array();
		foreach ( $this->wp_loading_get_all_layout() as $layout => $path ) {
			$layouts[ $layout ] = ucfirst( str_replace( '-', ' ', $layout ) );
		}
		natsort($layouts);
		return $layouts;
	}

	/**
	 * @param $layout
	 *
	 * @return bool|mixed
	 */
	private function wp_loading_get_content_layout( $layout ) {
		$file_path = WP_PAGE_LOADING_PATH . "includes/layouts/$layout.json";
		if ( ! file_exists( $file_path ) ) {
			return false;
		}
		$string = file_get_contents( $file_path );

		return json_decode( $string, true );
	}

	private function wp_loading_css( $echo = true, $layout = '' ) {
		$wp_loading_layout = $layout ? $layout : carbon_get_theme_option( 'wp_loading_select_layout' );
		$json              = $this->wp_loading_get_content_layout( $wp_loading_layout );
		$variable_layout   = isset( $json['var'] ) ? $json['var'] : [];
		$css               = isset( $json['css'] ) ? $json['css'] : false;
		$options_layout    = array();
		$variable_key      = array();

		if ( ! $css ) {
			return false;
		}
		foreach ( $variable_layout as $var => $val ) {
			$options_layout_var = carbon_get_theme_option( 'wp_loading_' . $wp_loading_layout . "_" . $var );
			$rgba               = carbon_hex_to_rgba( $options_layout_var );
			$options_layout_var = "rgba(" . $rgba['red'] . ", " . $rgba['green'] . ", " . $rgba['blue'] . ", " . $rgba['alpha'] . ")";

			$variable_key[ $var ]   = '#{{' . $var . '}}';
			$options_layout[ $var ] = ( $options_layout_var ) ? $options_layout_var : $variable_layout[ $var ];
		}
		$css = $this->wp_loading_replace_variable( $variable_key, $options_layout, $css );
		if ( $echo ) {
			echo '<style id="wp_loading_page">' . $css . '</style>';

			return null;
		}

		return $css;
	}

	/**
	 * @param bool $echo
	 * @param string $layout
	 *
	 * @return bool|string|string[]
	 */
	private function wp_loading_apply_css( $echo = true, $layout = '' ) {
		if ( $this->isShowWPLoading() ) {
			if ( $echo ) {
				$this->wp_loading_css( $echo, $layout );
			} else {
				return $this->wp_loading_css( $echo, $layout );
			}
		}
	}

	function wp_loading_get_css() {
		return $this->wp_loading_apply_css( false );
	}

	function wp_loading_echo_css() {
		$this->wp_loading_apply_css();
	}

	//======

	private function wp_loading_html( $echo = true, $layout = '' ) {
		$wp_loading_layout = $layout ? $layout : carbon_get_theme_option( 'wp_loading_select_layout' );

		$json = $this->wp_loading_get_content_layout( $wp_loading_layout );
		$html = isset( $json['html'] ) ? $json['html'] : '';

		if ( $echo ) {
			echo $html;

			return null;
		}

		return $html;
	}

	/**
	 * @param bool $echo
	 * @param string $layout
	 *
	 * @return mixed|void
	 */
	private function wp_loading_apply_html( $echo = true, $layout = '' ) {
		if ( $this->isShowWPLoading() ) {
			if ( $echo ) {
				$this->wp_loading_html( $echo, $layout );
			} else {
				return $this->wp_loading_html( $echo, $layout );
			}
		}
	}

	/**
	 * @return mixed|void
	 */
	function wp_loading_get_html() {
		return $this->wp_loading_apply_html( false );
	}

	function wp_loading_echo_html() {
		$this->wp_loading_apply_html();
	}

	// Hack wp hook
	// BUFFER START
	function wp_loading_buffer_start() {
		ob_start();
	}

	function wp_loading_buffer_end() {
		$get_clean_buffer = ob_get_clean();
		ob_start();
		$wp_loading_page_code = $this->wp_loading_get_html();
		echo preg_replace( '/\<body.+?>/i', '$0' . $wp_loading_page_code, $get_clean_buffer, 1 );
		ob_flush();
	}

	// End Hack wp hook

	function wp_loading_echo_html_preview() {
		echo '<div class="wp-loader-preview" style="display: none;"></div>';
	}

	function wp_loading_get_data_preview() {
		$layout = isset( $_POST['layout'] ) ? $_POST['layout'] : 'layout-1';
		ob_start();
		echo '<style>#wp-page-loader .spinner { visibility: visible; background: none; opacity: 1; float: none; }</style>';
		$this->wp_loading_css( true, $layout );
		$this->wp_loading_html( true, $layout );
		$data = ob_get_clean();

		wp_send_json( [ 'data' => $data ] );
	}
}
