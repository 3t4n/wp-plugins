<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_module_directtranslate_controller extends WController {
	function directtranslate() {
		$direct = WPref::load( 'PMAIN_NODE_DIRECT_MODIFY' );
		$pref = WPref::get( 'main.node' );
		if ( 'translate' == $direct ) {
			$pref->updatePref( 'direct_modify', 0 );
		} elseif ( empty($direct) ) {
			$pref->updatePref( 'direct_modify', 'translate' );
		}		
		$extensionHelperC = WCache::get();
		$extensionHelperC->resetCache( 'Preference' );
		WPages::redirect('previous');
		return true;
	}
}