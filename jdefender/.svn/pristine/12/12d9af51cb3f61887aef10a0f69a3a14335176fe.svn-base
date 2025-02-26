<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Main_viewform_form_view extends Output_Forms_class {
	function prepareView() {
		$type = $this->getValue( 'type' );
		$designLayoutTypeT = WType::get( 'design.layoutype' );
		$acceptedTypeA = $designLayoutTypeT->allNames();
		if ( !in_array( $type, $acceptedTypeA ) ) {
			$this->removeElements( 'main_viewform_form_parentdft' );
		}
		if ( WRoles::isAdmin( 'manager' ) ) {
			$this->removeMenus( 'main_viewform_form_save_ajax' );
		} else {
			$this->removeMenus( 'main_viewform_form_save_normal' );
		}
				if ( ! WPref::load( 'PMAIN_NODE_ALLOW_PICK_CHANGE' ) && $this->getValue( 'did' ) ) {
			$this->removeElements( 'main_viewform_form_field_specific' );
		}		
		if ( 'output.customized' != $type ) {
			$this->removeElements( array( 'main_viewform_form_code', 'main_viewform_form_code_nested' ) );
		}		
		return true;
	}
}