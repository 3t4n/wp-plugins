<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Main_widget_form_view extends Output_Forms_class {
	function prepareView() {
		$framework_type = $this->getValue( 'framework_type' );
		if ( $this->getValue( 'framework_type' ) != 5 ) {
			$this->removeElements( array( 'main_widget_form_position', 'main_widget_form_ordering' ) );	
		}
				if ( empty($framework_type) || $framework_type == 92 ) {
			$this->removeElements( array( 'main_widget_form_position_ramework_id' ) );
		}		
		$frameworkType = $this->getValue( 'namekey', 'main.widgettype' );
		$viewNamekey = str_replace( '.', '_', $frameworkType );
		$viewNamekeyModule = $viewNamekey . '_widget';
		$yid = WView::get( $viewNamekeyModule, 'yid', null, null, false );
				if ( empty($yid) ) {
			$viewNamekeyWidget = $viewNamekey . '_module';
			$yid = WView::get( $viewNamekeyWidget, 'yid', null, null, false );
		}		
		if ( empty($yid) ) {
			$this->removeElements( array( 'main_widget_form_preferences_nested' ) );
		} else {
			$this->removeElements( array( 'main_widget_form_data' ) );
		}		
		return true;
	}
}