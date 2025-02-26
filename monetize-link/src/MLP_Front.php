<?php
namespace MonetizeLinkPlugin;

class MLP_Front extends MLP_Base
{
	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'script_register' ) );
	}

	public function script_register()
	{
		$id = MLP_Settings::get_platform_id();
		if ( $id ) {
			$src = str_replace( '[id]', $id, MLP_Config::$script['url'] );
			wp_enqueue_script( MLP_Config::$script['key'], $src, array(), false, true );
		}
	}
}