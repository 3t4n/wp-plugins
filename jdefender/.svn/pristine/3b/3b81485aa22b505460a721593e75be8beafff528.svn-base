<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Main_widget_tag_listing_view extends Output_Listings_class {
function prepareView() {
	if ( 'joomla' != JOOBI_FRAMEWORK_TYPE ) return true;
	if ( ! WApplication::isEnabled( 'main.content.plugin', true, false ) ) {
		$message = WMessage::get();
		$message->userW('1434036710ZKH');
		$message->userW('1434036710ZKI');
	}
	return true;
}
}