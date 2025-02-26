<?php
//###############################
//--> REMOVE JQUERY MIGRATE
//###############################
function fun_pymseo_RemoveJqueryMigrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$jquery_dependencies = $scripts->registered['jquery']->deps;
		$scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
	}
}
add_action( 'wp_default_scripts', 'fun_pymseo_RemoveJqueryMigrate' );

?>
