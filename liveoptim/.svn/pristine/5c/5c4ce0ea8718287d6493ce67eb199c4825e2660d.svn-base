<?php

/**
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
 * L'objet Conteneur de Parametres
 *
 * @author Erwan MILBEO
 */
class ConteneurParametres {
	
	private static $instance;
	
	private $isPatternBoucler;
	private $idPatternBoucler;
	
	private $isPatternCibleBoucler;
	private $idPatternCibleBoucler;
	
	private $version;
	private $idVersion;
	
	private $inscription;
	private $idInscription;
	
	/**
	 * Renvoi l'instance
	 */
	public static function getInstance () {
		if (!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
	
		return self::$instance;
	}
	
	/**
	 * Constructeur
	 */
	private function ConteneurParametres() {
		global $wpdb;
		
		$this->isPatternBoucler = true;
		$this->isPatternCibleBoucler = true;
			
		$sql = $wpdb->prepare('SELECT * FROM `'.$wpdb->prefix.'liveoptim_parametres` WHERE `cle` = \'is_pattern_boucler\' or `cle` = \'is_pattern_cible_boucler\' or `cle` = \'version\' or `cle` = \'inscription\';', null);
		$rep = $wpdb->get_results($sql);
		
		foreach ($rep as $ligneDB) {
			$lId = $ligneDB->id;
			$lCle = $ligneDB->cle;
			$lValeur = $ligneDB->valeur;
		
			switch ($lCle) {
				case 'is_pattern_boucler':
					$this->isPatternBoucler = ($lValeur == '1');
					$this->idPatternBoucler = $lId;
					break;
						
				case 'is_pattern_cible_boucler':
					$this->isPatternCibleBoucler = ($lValeur == '1');
					$this->idPatternCibleBoucler = $lId;
					break;
				case 'version':
					$this->version = $lValeur;
					$this->idVersion = $lId;
					break;
				case 'inscription':
					$this->inscription = $lValeur;
					$this->idInscription = $lId;
					break;
			}
		}
	}
	
	public function getVersion(){
		return $this->version;
	}
	/**
	 * getIsPatternBoucler
	 */
	public function getIsPatternBoucler() {
		return $this->isPatternBoucler;
	}
	
	/**
	 * getIsPatternCibleBoucler
	 */
	public function getIsPatternCibleBoucler() {
		return $this->isPatternCibleBoucler;
	}
	
	
	public function getInscription(){
		return $this->inscription;
	}
	
	/**
	 * setIsPatternBoucler
	 */
	public function setIsPatternBoucler($isPatternBoucler) {
		global $wpdb;
		$this->isPatternBoucler = $isPatternBoucler;

		$wpdb->update( 
				$wpdb->prefix.'liveoptim_parametres', 
				array( 'valeur' => ( ($isPatternBoucler == true)? '1' : '0' ) ),
				array( 'id' => intval( $this->idPatternBoucler ) ) 
		);
	}
	
	/**
	 * setIsPatternCibleBoucler
	 */
	public function setIsPatternCibleBoucler($isPatternCibleBoucler) {
		global $wpdb;
		$this->isPatternCibleBoucler = $isPatternCibleBoucler;

		$wpdb->update(
				$wpdb->prefix.'liveoptim_parametres',
				array( 'valeur' => ( ($isPatternCibleBoucler == true)? '1' : '0' ) ),
				array( 'id' => intval( $this->idPatternCibleBoucler ) )
		);
	}
	
	public function setInscription($inscrip){
		global $wpdb;
		$this->inscription = $inscrip;
		$wpdb->update(
				$wpdb->prefix.'liveoptim_parametres',
				array( 'valeur' => $inscrip ),
				array( 'id' => intval( $this->idInscription ) )
		);
	}
	
	public function isOnOff(){
		global $wpdb;

		$query = '
				SELECT 
					* 
				FROM 
					'.$wpdb->prefix.'liveoptim_capping;';
		
		$sql = $wpdb->prepare($query, null);
		$rep = $wpdb->get_results($sql);
		$rep=$rep[0]->marche;
		if($rep==0){return false;}else{return true;}
		
	}
	
	public function getCapping(){
		global $wpdb;	
	
		$query = '
				SELECT 
					* 
				FROM 
					'.$wpdb->prefix.'liveoptim_capping;';
		
		$sql = $wpdb->prepare($query, null);
		$rep = $wpdb->get_results($sql);
		$rep=$rep[0]->capping;
		return $rep;
	}
	
}
?>