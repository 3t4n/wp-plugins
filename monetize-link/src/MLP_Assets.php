<?php
namespace MonetizeLinkPlugin;

class MLP_Assets extends MLP_Base
{
	public function __construct()
	{
		add_action( 'monetizelink_assets_init', array( $this, 'assets_init' ) );
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_head', array( $this, 'wp_add_inline_script' ) );
	}

	public function init()
	{
		if ( $file = self::get_file( 'js', 'main.js' ) ) {
			wp_register_script( MLP_Config::PlUGIN_KEY, $file );
		}

		if ( $file = self::get_file( 'css', 'main.css' ) ) {
			wp_enqueue_style( MLP_Config::PlUGIN_KEY, $file );
		}
	}

	public function assets_init()
	{
		wp_enqueue_script( MLP_Config::PlUGIN_KEY );
		wp_enqueue_style( MLP_Config::PlUGIN_KEY );
	}

	public static function get_image( $image )
	{
		return self::get_file( 'images', $image );
	}

	public static function get_file( $folder, $file )
	{
		$result = '';
		$file   = "/assets/$folder/$file";
		if ( file_exists( MLP_PLUGIN_PATH . $file ) ) {
			$result = MLP_PLUGIN_URL . $file;
		}
		return $result;
	}

	public function wp_add_inline_script()
	{
		$data = array(
			'regex' => MLP_Config::PATTERN,
			'messages' => array(
				'required' => __( 'PlatformID is required', 'monetize-link' ),
				'invalid'  => __( 'Invalid PlatformID', 'monetize-link' ),
			),
			'ajax' => array(
				'url'    => admin_url( 'admin-ajax.php' ),
				'nonce'  => wp_create_nonce( MLP_Config::NONCE ),
				'action' => MLP_Config::AJAX_ACTION,
			),
			'selectors' => MLP_Config::$js_selectors,
		);
		$html = "<script type='text/javascript' id='template-js-extra'>const mlp_args = %s</script>";
		echo sprintf( $html, wp_json_encode( $data ) );
	}
}