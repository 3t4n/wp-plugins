<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_image_controller extends WController {
	function image() {
		$path = WGlobals::get( 'p' );
		if ( empty($path) ) $path = WGlobals::get( 'path' );
		$data = null;
		if ( WExtension::exist( 'mailing.node' ) ) {
			$mailingM = WModel::get( 'mailing.open' );
			$mailingM->whereE( 'opid', $path );
			$alias = $mailingM->load( 'lr', 'alias' );
			if ( !empty( $alias ) ) {
				$data = json_decode( $alias );
								$mailingM->delete( $path );
			}			
		}		
		if ( !empty($data->node) && !empty($data->fct) ) {
			$class = WClass::get( $data->node . '.netcom', null, 'class', false );
			if ( !empty($class) ) {
				$fct = $data->fct;
				if ( method_exists( $class, $fct ) ) $class->$fct( $data );
			}
		}
		header( 'Content-type: image/gif' );
		echo chr(71).chr(73).chr(70).chr(56).chr(57).chr(97).
		chr(1).chr(0).chr(1).chr(0).chr(128).chr(0).
		chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).
		chr(33).chr(249).chr(4).chr(1).chr(0).chr(0).
		chr(0).chr(0).chr(44).chr(0).chr(0).chr(0).chr(0).
		chr(1).chr(0).chr(1).chr(0).chr(0).chr(2).chr(2).
		chr(68).chr(1).chr(0).chr(59);
		exit();
	}
}