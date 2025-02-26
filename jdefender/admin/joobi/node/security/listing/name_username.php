<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('listing.text');
class Security_CoreName_username_listing extends WListing_text {
function create() {
if ( !empty($this->value) ) {
$username = $this->getValue( 'username' );
if (  !empty($username) )  $this->value .= ' ( ' . $username  . ' )';
}
return parent::create();
}}