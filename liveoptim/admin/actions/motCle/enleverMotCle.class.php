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
 * Fichier eEnleverMotCle.class.php
 */

require_once dirname(__FILE__).'/../../lib/abstractAction.class.php';

/**
 * class EnleverMotCleAction
 *
 * @author : Erwan MILBEO
 */
class EnleverMotCleAction extends AbstractAction {
	
	/**
	 * execute
	 */
	public function execute() {
		$id = absint($_GET['id']);
		
	if (check_admin_referer( 'mot-cle-enlever'.$id) )  
	{		
		ConteneurMotCle::getInstance()->remove($id);
	
		
		$this->redirection('action=mot-cle-lister');
	}
	}
	
}
?>