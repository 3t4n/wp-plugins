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
 * Fichier inscriptionAction.class.php
 */

require_once dirname(__FILE__).'/../lib/abstractAction.class.php';

/**
 * class InscriptionAction
 *
 * @author : Erwan MILBEO
 */
class InscriptionUrlAction extends AbstractAction {
	
	/**
	 * execute
	 */
	public function execute() {
		if(check_admin_referer( 'LOInscriptionSimple')){
			$url_u=$_SERVER['HTTP_HOST'];

			if($url_u!=null){
				//Apel vers serveur LO
			
				
				$options = array(
					'http'=>array(
						'method'=>"POST",
						'header'=>
							"Accept-language: en\r\n"."Accept-language: es\r\n"."Accept-language: pt\r\n".
							"Content-type: application/x-www-form-urlencoded\r\n",
						'content'=>http_build_query(array('url' =>$url_u,'simple'=>'1'))
				));
				
				$context = stream_context_create($options);
					
				
				if ( !$responce = @file_get_contents('http://www.liveoptim.com/service/inscription', false, $context ) ) {
					$responce = 'erreur:file_get_contents';
				}else{
					$this->erreur=$responce;
					
					$responce = explode('|||', $responce);
					//echo $responce[0];	
					if($responce[0]!="1"){
						$this->erreur=$responce[1];
											
						$this->setLayout('layout.php');
						$this->setTemplate('inscription.php');
					}else{
						
						require_once dirname(__FILE__).'/../lib/base/conteneurParametres.class.php';
						$conteneurParametre = ConteneurParametres::getInstance();
						$conteneurParametre->setInscription(1);
		
						$this->setLayout('layout.php');
						$this->setTemplate('accueil.php');
					}
				}
			}else{
				$this->setLayout('layout.php');
				$this->setTemplate('inscription.php');
			}
		
		}
	
	}
}
?>