<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WForm_Coremap extends WForms_default {
	function create() {
				if ( 'mobile' == JOOBI_FRAMEWORK_TYPE ) return false;
		if ( version_compare( phpversion(), '5.3', '<' ) ) {
			$message = WMessage::get();
			$message->userN('1373209094YQB');
			return false;
		}
		$addressMapC = WClass::get( 'address.map' );
		$adid = $this->getValue( 'adid' );
		if ( empty( $adid ) ) {
						$longitude = $this->getValue( 'longitude' );
			if ( empty($longitude) || $longitude==0 ) return false;
			$latitude = $this->getValue( 'latitude' );
			$location = $this->getValue( 'location' );
			$addressMapC->setCoordinates( $longitude, $latitude, $location );
		} else {
			$addressMapC->setAddressID( $adid );
		}
		$width = WGlobals::get( 'mapWidth' );
		$height = WGlobals::get( 'mapHeight' );
		$showStreetView = WGlobals::get( 'mapShowStreetView', true );
		$widthStreet = WGlobals::get( 'mapStreetWidth' );
		$heightStreet = WGlobals::get( 'mapStreetHeight' );
		if ( !empty($width) ) $addressMapC->setWidth( $width );
		if ( !empty($height) ) $addressMapC->setHeight( $height );
		$addressMapC->showStreetView( $showStreetView, $widthStreet, $heightStreet );
		if ( !empty($heightStreet) ) $addressMapC->setStreetHeight( $heightStreet );
		$this->content = $addressMapC->renderMap();
		$mapID = $addressMapC->getMapID();
		$js = 'jQuery(document).ready(function(){ var curtab=jQuery("#' . $mapID . '").closest(".tab-pane");
setTimeout(function(){
if(!jQuery(curtab).hasClass("active")){
jQuery("a[href=#"+jQuery(curtab).attr("id")+"]").click(function(){
if(typeof(mapinitialized) === "undefined"){
mapinitialized=true;
setTimeout(function(){
' . $mapID . '.initialize();
},200);
}
});
}
},200);
});';
		WPage::addJSScript( $js );
		return true;
	}
	function show() {
		return $this->create();
	}
}
