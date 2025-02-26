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
 * L'objet Conteuneur Mot Clé
 *
 * @author Erwan MILBEO
 */
class ConteneurMotCle {
	
	private static $instance;
		
	private $conteneur;
	
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
	private function ConteneurMotCle() {
		global $wpdb;
		
		$this->conteneur = array();
			
		$sql = $wpdb->prepare('SELECT * FROM `'.$wpdb->prefix.'liveoptim_mot_cle`;', null);
		$rep = $wpdb->get_results($sql);
			
		foreach ($rep as $ligneDB) {
			$lId = $ligneDB->id;
			$lRequete = $ligneDB->requete;
			$lDestination = $ligneDB->destination;
			$lPosition = $ligneDB->position;
		
			$ligne = array( 'id' => $lId, 'requete' => sanitize_text_field($lRequete), 'destination' => esc_url_raw(sanitize_text_field($lDestination)), 'position' => absint($lPosition) );
		
			$this->conteneur[$lId] = $ligne;
		}
	}
	
	/**
	 * getAllBrut
	 * @return array
	 */
	public function getAllBrut() {
		return $this->conteneur;
	}
		
	
	
	public function getRestricted() {
		$i=0;
		
		foreach ($this->conteneur as $key => $row) {
			if($i<10){
				$requete[$key]  = $row['requete'];
				$position[$key] = $row['position'];
				/*$ligne['id']=$row['id'];
				$ligne['requete']=$row['requete'];
				$ligne['destination']=$row['destination'];
				$ligne['position']=$row['position'];
				$i++;
				array_push($res,$ligne);*/
			}
		}	
		if (count($this->conteneur)>1){
		array_multisort($requete, SORT_ASC, $position, SORT_ASC, $this->conteneur);}
		
		return $this->conteneur;
	}
	
	/**
	 * add
	 * @param String $requete
	 * @param String $destination
	 * @param int $position
	 * @return int l'id
	 */
	public function add( $requete, $destination, $position = null ) {
		
		global $wpdb;
		
		if(count($this->conteneur)>=10){return null;}
		
		$requete = stripslashes($requete);
		$destination = stripslashes($destination);
		
		$futurPositionDefaut = $this->getLastPosition( $requete );
		
		$ligneMotCle = $wpdb->insert( $wpdb->prefix.'liveoptim_mot_cle', array( 'requete' => mysql_real_escape_string(wp_filter_kses($requete)), 'destination' => mysql_real_escape_string(esc_url_raw($destination)), 'position' => mysql_real_escape_string(wp_filter_kses($futurPositionDefaut ))) );
		
		$id = $ligneMotCle['id'];
		
		
		$ligne = array( 'id' => $id, 'requete' => sanitize_text_field($requete), 'destination' => esc_url_raw(sanitize_text_field($destination)), 'position' => absint($futurPositionDefaut) );
		
		$this->conteneur[$id] = $ligne;
		
		if ( !is_null($position) ) {
			$this->setPosition( $id, $position );
		}
		
		return $id;
	}

	/**
	 * remove
	 * @param int $id
	 */
	public function remove($id) {
		global $wpdb;
		
		$requete = $this->conteneur[$id]['requete'];
		$positionLigneSupprime = $this->conteneur[$id]['position'];
		
		// on récupère toutes les lignes pour ce mot clé
		$tempTableau = $this->getByRequete( $requete );
		
		// on réorganise les autres position
		foreach ( $tempTableau as $ligne ) {
			if ( $ligne['position'] > $positionLigneSupprime ) {
				$this->conteneur[ $ligne['id'] ]['position'] -= 1; 
				
				$wpdb->update( 
						$wpdb->prefix.'liveoptim_mot_cle', 
						array( 'position' => mysql_real_escape_string(wp_filter_kses(intval( $this->conteneur[ $ligne['id'] ]['position'] ))) ),
						array( 'id' => intval( $ligne['id'] ) )
				);
			}
		}		
		
		unset( $this->conteneur[$id] );
		
		$sql = $wpdb->prepare('DELETE FROM `'.$wpdb->prefix.'liveoptim_mot_cle` WHERE id = %d;', $id);
		$wpdb->query($sql);
		
	}
	
	/**
	 * set
	 * @param int $id
	 * @param String $requete
	 * @param String $destination
	 * @param int $position
	 * @return String null ou le message d'erreur
	 */
	public function set($id, $requete, $destination, $position = null) {
		global $wpdb;
		
		
		
		$requete = stripslashes($requete);
		$destination = stripslashes($destination);
		
		if ( $this->conteneur[$id]['requete'] == $requete ) {
			// si aucun changement sur champ requete
			
			if ( $this->conteneur[$id]['destination'] != $destination ) {
				// si il y a une modification a faire sur la destination
				$this->conteneur[$id]['destination'] = $destination;
				
				$wpdb->update(
						$wpdb->prefix.'liveoptim_mot_cle',
						array( 'destination' => mysql_real_escape_string(esc_url_raw($destination)) ),
						array( 'id' => intval( $id ) )
				);
			}
		
			if ( !is_null($position) && strlen($position) > 0 && intval($position) && $position != $this->conteneur[$id]['position'] ) {
								
				// si il y a une modification a faire sur la position
				$this->setPosition($id, $position);
			}	
			
			return null;
			
		} else {
			// si il y a une modification a faire sur le champ requete
			
			// on récupère toutes les lignes pour ce mot clé
			$tempTableau = $this->getByRequete( $this->conteneur[$id]['requete'] );
			
			// on réorganise les autres positions de son ancienne requete
			foreach ( $tempTableau as $ligne ) {
				if ( $ligne['position'] > $this->conteneur[$id]['position'] ) {
					$this->conteneur[ $ligne['id'] ]['position'] -= 1;
					
					$wpdb->update(
							$wpdb->prefix.'liveoptim_mot_cle',
							array( 'position' => mysql_real_escape_string(wp_filter_kses(intval( $this->conteneur[ $ligne['id'] ]['position'] ))) ),
							array( 'id' => intval( $ligne['id'] ) )
					);
				}
			}
			
			// on récupère la prochaine position de sa nouvelle requete
			$nouvellePositionParDefaut = $this->getLastPosition( $requete );
			
			// on modifie le tout
			$this->conteneur[$id]['requete'] = $requete;
			$this->conteneur[$id]['destination'] = $destination;
			$this->conteneur[$id]['position'] = $nouvellePositionParDefaut;
			
			$wpdb->update(
					$wpdb->prefix.'liveoptim_mot_cle',
					array( 
							'requete' => mysql_real_escape_string(wp_filter_kses($requete)),
							'destination' => mysql_real_escape_string(esc_url_raw($destination)),
							'position' => mysql_real_escape_string(wp_filter_kses(intval( $nouvellePositionParDefaut )))
					),
					array( 'id' => intval( $id ) )
			);
			
			// on essaye d'affecter la position souhaité
			if ( !is_null($position) && strlen($position) > 0 && intval($position) ) {
				$this->setPosition( $id, $position );
			}
			
			return null;
		}
	}
	
	/**
	 * setPosition
	 * @param int $id
	 * @param int $positionDestination
	 */
	public function setPosition($id, $positionDestination) {
		global $wpdb;
		
		$requete = $this->conteneur[$id]['requete'];
		$positionProvenance = $this->conteneur[$id]['position'];
		
		// on récupère toutes les lignes pour ce mot clé
		$tempTableau = $this->getByRequete( $requete );
		
		
		if ( $positionDestination < 1 || $positionDestination > count($tempTableau) ) return false;
			
		if ( $positionDestination > $positionProvenance ) {
			
			// on réorganise les autres position
			foreach ( $tempTableau as $ligne ) {
				if ( $ligne['position'] > $positionProvenance && $ligne['position'] <= $positionDestination ) {
					$this->conteneur[ $ligne['id'] ]['position'] -= 1;
					
					$wpdb->update(
							$wpdb->prefix.'liveoptim_mot_cle',
							array( 'position' => mysql_real_escape_string(wp_filter_kses(intval( $this->conteneur[ $ligne['id'] ]['position'] ))) ),
							array( 'id' => intval( $ligne['id'] ) )
					);
				}
			}
			
			$this->conteneur[$id]['position'] = $positionDestination;
			
			$wpdb->update(
					$wpdb->prefix.'liveoptim_mot_cle',
					array( 'position' => mysql_real_escape_string(wp_filter_kses(intval( $positionDestination ))) ),
					array( 'id' => intval( $id ) )
			);
		
		} elseif ( $positionDestination < $positionProvenance ) {
			
			// on réorganise les autres position
			foreach ( $tempTableau as $ligne ) {
				if ( $ligne['position'] >= $positionDestination && $ligne['position'] < $positionProvenance ) {
					$this->conteneur[ $ligne['id'] ]['position'] += 1;
					
					$wpdb->update(
							$wpdb->prefix.'liveoptim_mot_cle',
							array( 'position' => mysql_real_escape_string(wp_filter_kses(intval( $this->conteneur[ $ligne['id'] ]['position'] ))) ),
							array( 'id' => intval( $ligne['id'] ) )
					);
				}
			}
				
			$this->conteneur[$id]['position'] = $positionDestination;
			
			$wpdb->update(
					$wpdb->prefix.'liveoptim_mot_cle',
					array( 'position' => mysql_real_escape_string(wp_filter_kses(intval( $positionDestination ))) ),
					array( 'id' => intval( $id ) )
			);
			
		}

		return true;
	}
	
	/**
	 * getLastPosition
	 * @param String $requete
	 * @return int la futur position
	 */
	private function getLastPosition($requete) {
		return count( $this->getByRequete( $requete ) ) + 1;
	}
	
	/**
	 * getByRequete
	 * @param String $requete
	 * @return array un tableau avec uniquement le mot clé demandé
	 */
	private function getByRequete($requete) {
		// Incompatible PHP 5.2
		//return array_filter( 
		//		$this->conteneur, 
		//		function ($element) use ($requete) { 
		//			return ( $element['requete'] == $requete ); 
		//		} 
		//);

		// Version compatible 5.1.x et suppérieur
		$rep = array();
		foreach ($this->conteneur as $row) {
			if ( $row['requete'] == $requete ) {
				array_push( $rep, $row );
			}
		}
		return $rep;
	}

}
?>