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
 * Fichier listerPatternCibleAction.class.php
 */

require_once dirname(__FILE__).'/../../lib/abstractAction.class.php';

/**
 * class listerPatternCibleAction
 *
 * @author : Erwan MILBEO
 */
class ListerPatternCibleAction extends AbstractAction {
	
	/**
	 * execute
	 */
	public function execute() {
		
		$this->setLayout('layout.php');
		$this->setTemplate('patternCible/listerPatternCible.php');
	}
	
}
?>