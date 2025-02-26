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
 * Fichier zip
 */


require_once dirname(__FILE__).'/../../lib/abstractAction.class.php';

class ZipConfigAction extends AbstractAction {
	
	/**
	 * execute
	 */
	public function execute() {

		//unlink('../BackupBDD.zip');
		@mkdir ("../LiveOptimTemp",0777,true);

		// nom des fichiers à ajouter dans l'archive 
		$tabname=sanitize_key($_GET['res']);
		$tables=explode("-",$tabname);
		
		$nbtables=count($tables);
		// création d'un objet 'zipfile' 
		$zip = new ZipArchive();
		$zipCreate = false;
		if($zip->open('../BackupBDD.zip', ZipArchive::CREATE) == TRUE){
			// Pour chaque fichier csv
			for($i=0;$i<$nbtables;$i++){
				// path du fichier 
				
				$filename = "../LiveOptimTemp/".$tables[$i].".csv";
				// ajout du fichier dans l'objet zip
				$zip->addfile($filename, $tables[$i].".csv"); 
			}
			
			// production de l'archive' Zip 
			$zip->close();
			
			$zipCreate = true;
			
		}
		
		for($i=0;$i<$nbtables;$i++){
			// path du fichier 
			
			$filename = "../LiveOptimTemp/".$tables[$i].".csv";
			
			// ajout du fichier dans l'objet zip
			@unlink($filename);
		}
		
		@rmdir('../LiveOptimTemp');
		
		if($zipCreate){
			$this->redirection('action=lister-config&zip='.home_url().'/BackupBDD.zip');
		}
		
	
	}
	
}
?>
