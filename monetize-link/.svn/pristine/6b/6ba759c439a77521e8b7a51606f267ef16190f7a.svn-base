<?php
namespace MonetizeLinkPlugin;

class MLP_Ajax extends MLP_Base
{
	public function __construct()
	{
		add_action( 'wp_ajax_' . MLP_Config::AJAX_ACTION, array( $this, 'delete' ) );
	}

	public function delete()
	{
		check_ajax_referer( MLP_Config::NONCE, 'nonce' );
		mlp_plugin_delete_options();
		wp_die();
	}
}