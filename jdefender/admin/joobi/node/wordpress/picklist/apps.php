<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Wordpress_Apps_picklist extends WPicklist {
	function create() {
		$this->addElement( 0, '- ' . WText::t('1431736280LVYY') . ' -' );
		$appsM = WModel::get( 'apps' );
		$appsM->select( array( 'name', 'wid') );
		$appsM->whereE( 'publish' , 1 );
		$appsM->whereE( 'type' , 1 );
		$appsM->orderBy('name');
		$appsM->setLimit( 500 );
		$components = $appsM->load('ol');
		if ( !empty($components) ) {
			foreach($components as $component)  {
				$this->addElement( $component->wid, $component->name );
			}
		}
	}
}