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
 * Fichier modifConfig.class.php
 */

require_once dirname(__FILE__).'/../../lib/abstractAction.class.php';

class ModifConfigAction extends AbstractAction {
	
	/**
	 * execute
	 */
	public function execute() {
	
		if (isset($_GET['on'])){
			if (check_admin_referer( 'LOOnOff') ) {
				// process form data, e.g. update fields
				$on = sanitize_key($_GET['on']);
				$id=ConteneurConfig::getInstance()->TurnOnOff($on);
								
				$this->redirection('action=lister-config');
			}
			
		}
		
		else if (isset($_GET['exp'])){
			if (check_admin_referer( 'LOExportParam') ) {
				$val =array();
			
				array_push($val,sanitize_key($_POST['2']));
			
				$res = ConteneurConfig::getInstance()->exporter($val);

				$this->redirection("action=zip-config&noheader=true&res=".$res);
			}
		}
		
		else if (isset($_GET['imp'])){
			if (check_admin_referer( 'LOImportParam') ) {
				$val =sanitize_key($_POST['quoi']);
				if((int)$val<7){
								
					@mkdir ("../LiveOptimTemp",0777,true);
					$chemin_destination = '../LiveOptimTemp/'; 
					$file=$chemin_destination.$_FILES['fichier_up']['name'];
					move_uploaded_file($_FILES['fichier_up']['tmp_name'], $file); 
					$this->ModifConfig = ConteneurConfig::getInstance()->import($file, $val);
					@rmdir("../LiveOptimTemp");
									
				}else{
					$file=$_FILES['fichier_up']['tmp_name'];
					$etat = ConteneurConfig::getInstance()->import($file, $val);
					
					
				}
				$this->redirection('action=lister-config');
			}
		}
		
		else if (isset($_GET['sql'])){
			if (check_admin_referer( 'LOExportParamSQL') ) {
			
				$res = ConteneurConfig::getInstance()->sql();

				$this->redirection('action=lister-config&res='.$res);
			}
		}
		
		
		else{
			$this->redirection('action=lister-config');
		}
		
		
		

		
		//$this->redirection('action=lister-config');
	}
	
}
?>