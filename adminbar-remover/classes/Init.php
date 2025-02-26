<?php
/**
 * Initializing
 *
 * @package AdminBar Remover
 * @author Sujin 수진 Choi
 * @version 1.0.0
 */

namespace SJABR;

if ( !defined( "ABSPATH" ) ) {
	header( "Status: 403 Forbidden" );
	header( "HTTP/1.1 403 Forbidden" );
	exit();
}

class init {
	function __construct() {
		if ( !is_admin() )
			$this->AdminBarHooks();
	}

	private function AdminBarHooks() {
		add_action( 'wp_enqueue_scripts', array( $this, "EnqueueScripts" ) );
	}

	public function EnqueueScripts() {
		wp_enqueue_script( SJABR_TEXTDOMAIN, SJABR_PLUGIN_URL . 'assets/scripts/script.js', array( 'jquery' ) );
	}
}

