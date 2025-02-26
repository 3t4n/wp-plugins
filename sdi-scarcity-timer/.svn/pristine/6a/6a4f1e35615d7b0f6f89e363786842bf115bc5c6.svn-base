<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

 class SdiScarcity extends SdiDb
 {
 	
 	var $SdiDb;

 	public function __construct()
 	{

 	}

 	/**
 	 *  Contains init hooks
 	 */
 	public function init()
 	{
 		
 	}

 	public static function activatePlugin()
 	{
 		// 
 		ClassRegistry('SdiDb')->activatePlugin();
 	}

 	/**
 	 * Remove/disable plugin related database values
 	 */
 	public function deactivatePlugin()
 	{
 		ClassRegistry('SdiDb')->deactivatePlugin();
 	}

 	/**
	 * Display a custom alert
	 * @param string $display  info|success|danger|errror
	 */
 	public static function alert($msg, $type = "info", $display = true)
	{
		$str = '<div class="alert alert-'.$type.'"><strong>'.ucwords($type).'!</strong> '.$msg.'.</div>';
		if ( $display ) {
			echo $str;
		} else {
			return $str;
		}
	}

	/**
	 * Determine the type of post
	 */
	public static function request($method = 'get')
	{
		return  $method == strtolower($_SERVER['REQUEST_METHOD']);
	}

	/**
 	 * Add custom css for admin 
 	 */
 	public static function assets($files = [
 		'css' => [],
 		'js'  => []
 	])
 	{
 		$files['css'] += [ '/assets/css/timer.css' ];

     	if (!empty($files['css'])) {
     		foreach ($files['css'] as $css) {
     			$id = uniqid('sdi-');
     			wp_register_style( $id, SDI_PLUGIN_URL . $css, false, '1.0.0' );
     			wp_enqueue_style( $id );
     		}
     	}

     	$files['js'] += [ '/assets/js/timer.js' ];

     	if (!empty($files['js'])) {
     		foreach ($files['js'] as $js) {
     			$id = uniqid('sdi-');
     			wp_enqueue_script( $id, SDI_PLUGIN_URL . $js, null,  '1.0.0', true );
     		}
     	}
 	}
 }