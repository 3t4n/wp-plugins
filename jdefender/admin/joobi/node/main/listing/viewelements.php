<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('listing.textlink');
class Main_CoreViewelements_listing extends WListing_textlink {
function create() {
	$type = $this->getValue( 'type' );
	$yid = $this->getValue( 'yid' );
	$header = '&titleheader=' . $this->getValue( 'name', 'main.viewtrans' );
	switch ( $type ) {
		case 2: 
			$this->element->lien = WPage::routeURL( 'controller=main-listing&yid=' . $yid . $header );
			break;
		case 51: 
		case 109: 
		case 61: 
		case 98: 
		case 151: 
			$this->element->lien = WPage::routeURL( 'controller=main-form&yid=' . $yid . $header );
			break;
		case 204: 
			return false;
			$this->element->lien = WPage::routeURL( 'controller=main-menu&yid=' . $yid . $header );
			break;
		default:
			$this->content = WText::t('1347652450ENIY');
			$this->element->lien = '';
			return true;
		break;
	}
	return parent::create();
}}