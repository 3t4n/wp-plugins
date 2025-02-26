<?php
/*
 *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
 * Fichier listerMotCleAction.class.php
 */

require_once dirname(__FILE__).'/../../lib/abstractAction.class.php';

/**
 * class listerMotCleAction
 *
 * @author : Erwan MILBEO
 */
class ListerMotCleAction extends AbstractAction {
	
	/**
	 * execute
	 */
	 
	public function execute() {	
			
		$this->idModifier = ( isset($_GET['idModifier']) && !is_null( ($_GET['idModifier']) ) && strlen( sanitize_key($_GET['idModifier']) ) > 0 && absint($_GET['idModifier']) != 0  && check_admin_referer( 'mot-cle-lister'.absint($_GET['idModifier'])) )? absint($_GET['idModifier']) : null;
	
		
		$this->listeMotCle = ConteneurMotCle::getInstance()->getRestricted();
		
		$this->setLayout('layout.php');
		$this->setTemplate('motCle/listerMotCle.php');
		}
	
	
}
?>