<?php 

// Globals.
global $sbw_instances;

// Initialize plaeholders.
$sbw_instances = array();

//Add hooks
add_action( 'init', 'sbw_get_paths' );

/**
 * sbw_new_instance
 *
 * Creates a new instance of the given class and stores it in the instances data store.
 *
 * @date	23/11/19
 * @since	1.0.0
 *
 * @param	string $class The class name.
 * @return	object The instance.
 */
function sbw_new_instance( $class = '' ) {
	global $sbw_instances;
	return $sbw_instances[ $class ] = new $class();
}

/** 
*  sbw_esc_checking_db
*
*  function to check query data strings to XSS-atack
*
*  @date	23/11/2019
*  @since	1.0.0
*
*  @param	mixed DB select query
*  @return	object checked DB select query
*/
function sbw_esc_checking_db($query_result) {
	$wp_esc_user = $query_result;
	if(!empty($query_result)) {
		foreach($query_result as $key => $value) {
			$wp_esc_user->$key = esc_js($value);
		}
	}
	return $wp_esc_user;
}

/*
*  sbw_get_view
*
*  This function will load in a file from the 'admin/views' folder templates and allow variables to be passed through
*
*  @type	function
*  @date	23/11/19
*  @since	1.0.0
*
*  @param	$view_name (string)
*  @param	$args (object)
*  @return	n/a
*/

function sbw_get_view( $path = '', $wp_esc_user, $assetPaths ) {

	$path = SBW_PATH . "admin/views/" . $path; //Ajax-view.php
	
	// include
	if( file_exists($path) ) {
		include( $path );
	}	
}

/**
 * sbw_get_paths
 *
 * Get paths of assets files.
 *
 * @date	23/11/19
 * @since	1.0.0
 *
 * @param	void
 * @return	array paths to assets files
 */
function sbw_get_paths() {
	// Vars.
	$assetPaths = array(
		'images' => array(
			'favicons' 	=> plugins_url( 'assets/img/favicons.png', 	dirname(__FILE__) ),
			'preloader' => plugins_url( 'assets/img/preloader.gif', dirname(__FILE__) ),
			'logo' 		=> plugins_url( 'assets/img/logo.png', 		dirname(__FILE__) ),
		),
		'files'  => array(
			'myStyleCSS' 	=> plugins_url( 'assets/css/myStyle.min.css', 	dirname(__FILE__) ),
			'BotsTableCSS' 	=> plugins_url( 'assets/css/BotsTable.min.css', dirname(__FILE__) ),
			'embedCodeJS' 	=> plugins_url( 'assets/js/embedCode.min.js', dirname(__FILE__) ),
		),
	);

	return $assetPaths;
}
