<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Security_ipmanagement_view extends Output_Listings_class {
function prepareView() {
	if ( ! WPref::load( 'PSECURITY_NODE_MANAGE_COUNTRY' ) ) {
		$this->removeElements( 'security_ipblocked_listing_ctyid' );
	}
	return true;
}
}