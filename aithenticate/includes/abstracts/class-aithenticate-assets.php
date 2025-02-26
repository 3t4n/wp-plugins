<?php
/**
 * Assets.
 *
 * @package Aithenticate
 */

/**
 * Assets abstract class.
 */
abstract class Aithenticate_Assets {

	/**
	 * Register styles.
	 *
	 * @var array
	 */
	private $registered_styles = array();

	/**
	 * Registered scripts.
	 *
	 * @var array
	 */
	private $registered_scripts = array();


	/**
	 * Get the styles.
	 *
	 * @return array
	 */
	protected function get_styles() {
		return array();
	}

	/**
	 * Get the scripts.
	 *
	 * @return array
	 */
	protected function get_scripts() {
		return array();
	}

	/**
	 * Register a style.
	 *
	 * @param string           $handle Handle.
	 * @param false|string     $src Source.
	 * @param string[]         $deps Dependencies.
	 * @param bool|null|string $version Version.
	 * @param string           $media Media.
	 * @return void
	 */
	protected function register_style( $handle, $src, $deps, $version, $media ) {
		$this->registered_styles[] = $handle;
		wp_register_style( $handle, $src, $deps, $version, $media );
	}

	/**
	 * Register a script.
	 *
	 * @param string           $handle Handle.
	 * @param false|string     $src Source.
	 * @param string[]         $deps Dependencies.
	 * @param bool|null|string $version Version.
	 * @param bool             $in_footer Whether to enqueue it in the footer instead of the head.
	 * @return void
	 */
	protected function register_script( $handle, $src, $deps, $version, $in_footer ) {
		$this->registered_scripts[] = $handle;
		wp_register_script( $handle, $src, $deps, $version, $in_footer );
	}

	/**
	 * Enqueue a style.
	 *
	 * @param string           $handle Handle.
	 * @param false|string     $src Source.
	 * @param string[]         $deps Dependencies.
	 * @param bool|null|string $version Version.
	 * @param string           $media Media.
	 *
	 * @return void
	 */
	protected function enqueue_style( $handle, $src = '', $deps = array(), $version = false, $media = 'all' ) {
		if ( ! in_array( $handle, $this->registered_styles, true ) && $src ) {
			$this->register_style( $handle, $src, $deps, $version, $media );
		}

		wp_enqueue_style( $handle, $src, $deps, $version, $media );
	}

	/**
	 * Enqueue a script.
	 *
	 * @param string           $handle Handle.
	 * @param false|string     $src Source.
	 * @param string[]         $deps Dependencies.
	 * @param bool|null|string $version Version.
	 * @param bool             $in_footer Whether to enqueue it in the footer instead of the head.
	 *
	 * @return void
	 */
	protected function enqueue_script( $handle, $src = '', $deps = array(), $version = false, $in_footer = true ) {
		if ( ! in_array( $handle, $this->registered_scripts, true ) && $src ) {
			$this->register_script( $handle, $src, $deps, $version, $in_footer );
		}

		wp_enqueue_script( $handle, $src, $deps, $version, $in_footer );
	}

	/**
	 * Register assets.
	 *
	 * @return void
	 */
	protected function register_assets() {
		foreach ( $this->get_styles() as $handle => $style ) {
			$style = wp_parse_args(
				$style,
				array(
					'src'     => '',
					'deps'    => array(),
					'version' => false,
					'media'   => 'all',
				)
			);

			$this->register_style( $handle, $style['src'], $style['deps'], $style['version'], $style['media'] );
		}

		foreach ( $this->get_scripts() as $handle => $script ) {
			$script = wp_parse_args(
				$script,
				array(
					'src'       => '',
					'deps'      => array(),
					'version'   => false,
					'in_footer' => true,
				)
			);

			$this->register_script( $handle, $script['src'], $script['deps'], $script['version'], $script['in_footer'] );
		}
	}

	/**
	 * Add script data.
	 *
	 * @param string $handle Handle.
	 * @return void
	 */
	public function add_script_data( $handle ) {
		if ( wp_script_is( $handle ) ) {
			$data = $this->get_script_data( $handle );

			if ( ! $data ) {
				return;
			}

			$object_name = str_replace( '-', '_', $handle ) . '_params';

			wp_add_inline_script(
				$handle,
				sprintf( 'const %s = %s', $object_name, wp_json_encode( $data, JSON_UNESCAPED_UNICODE ) ),
				'before'
			);
		}
	}

	/**
	 * Add scripts data.
	 *
	 * @return void
	 */
	public function add_scripts_data() {
		foreach ( $this->registered_scripts as $handle ) {
			$this->add_script_data( $handle );
		}
	}

	/**
	 * Get the data for the given script.
	 *
	 * @param string $handle Handle.
	 * @return array
	 */
	protected function get_script_data( $handle ) {
		return array();
	}

	/**
	 * Get the assets URL.
	 *
	 * @return string
	 */
	protected function assets_url() {
		return aithenticate()->plugin_url() . 'assets/';
	}

}
