<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('main.listing.iptracker');
class Security_CoreIpmanage_listing extends WListing_iptracker {
	function create() {
		$status = parent::create();
		if ( '0.0.0.0' == $this->content ) {
			$this->content = '';
		}
		$username = $this->getValue( 'username' );
		if ( !empty($username) ) {
			if ( !empty($this->content) ) $this->content .= '<br>'; 
			$this->content .= WText::t('1206732411EGRV') . ': ' . $username;
		}
		return $status;
	}}