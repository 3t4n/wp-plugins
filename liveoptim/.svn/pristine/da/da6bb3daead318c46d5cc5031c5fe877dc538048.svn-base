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
 * Fichier creerMotCle.class.php
 */

require_once dirname(__FILE__).'/../../lib/abstractAction.class.php';

/**
 * class CreerMotCleAction
 *
 * @author : Erwan MILBEO
 */
class CreerMotCleAction extends AbstractAction {
	
	/**
	 * execute
	 */
	public function execute() {
		$requete = sanitize_text_field($_POST['requete']);
		// $destination = sanitize_title($_POST['destination']);
		$destination = sanitize_text_field(urldecode($_POST['destination']));
		$position = absint($_POST['position']);

if (check_admin_referer( 'mot-cle-creer') )  {
		if ( !isset($position) || is_null($position) || strlen($position) <= 0 || !intval($position) ) $position = null;

		$id = ConteneurMotCle::getInstance()->add(wp_filter_kses($requete), esc_url_raw($destination), wp_filter_kses($position) );
		
		$this->redirection('action=mot-cle-lister');
		}
	}
	
}
?>