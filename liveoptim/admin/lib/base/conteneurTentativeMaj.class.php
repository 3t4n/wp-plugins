<?php

/**
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
 *
 * L'objet Conteneur de tentative de Maj
 *
 * @author Erwan MILBEO
 */
class ConteneurTentativeMaj {
	
	private static $instance;
	
	private $nb;
	private $idNb;
	
	private $date;
	private $idDate;
	
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
	private function ConteneurTentativeMaj() {
		global $wpdb;
			
		$sql = $wpdb->prepare('SELECT * FROM `'.$wpdb->prefix.'liveoptim_parametres` WHERE `cle` = \'tentative_maj_nb\' or `cle` = \'tentative_maj_date\';', null);
		$rep = $wpdb->get_results($sql);
		
		foreach ($rep as $ligneDB) {
			$lId = $ligneDB->id;
			$lCle = $ligneDB->cle;
			$lValeur = $ligneDB->valeur;
		
			switch ($lCle) {
				case 'tentative_maj_nb':
					$this->nb = $lValeur;
					$this->idNb = $lId;
					break;
					
				case 'tentative_maj_date':
					$this->date = $lValeur;
					$this->idDate = $lId;
					break;
			}
		}
	}
	
	/**
	 * addTentative
	 */
	public function addTentative() {
		global $wpdb;
		
		$date = date('Y-m-d H:00:00');
		
		if ( $this->nb <= 0 || $date != $this->date ) {
			$this->date = $date;
			$this->nb = 1;
			
			$wpdb->update(
					$wpdb->prefix.'liveoptim_parametres',
					array( 'valeur' => $this->nb ),
					array( 'id' => intval( $this->idNb ) )
			);
			
			$wpdb->update(
					$wpdb->prefix.'liveoptim_parametres',
					array( 'valeur' => $this->date ),
					array( 'id' => intval( $this->idDate ) )
			);
			
		} else {
			$this->nb = $this->nb + 1;
			
			$wpdb->update(
					$wpdb->prefix.'liveoptim_parametres',
					array( 'valeur' => $this->nb ),
					array( 'id' => intval( $this->idNb ) )
			);
		}
	}
	
	/**
	 * getNbTentative
	 * @return int le nombre de tentative pour aujourd'hui
	 */
	public function getNbTentative() {
		$date = date('Y-m-d H:00:00');
		
		if ( $this->nb <= 0 || $date != $this->date ) {
			return 0;
				
		} else {
			return $this->nb;
		}

		return 0;
	}
	
}
?>