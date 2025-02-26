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
 * L'objet Conteuneur BaliseIgnore
 *
 * @author Erwan MILBEO
 */
class ConteneurBaliseIgnore {
	
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
	private function ConteneurBaliseIgnore() {
		global $wpdb;

		$this->conteneur = array();
			
		$sql = $wpdb->prepare('SELECT * FROM `'.$wpdb->prefix.'liveoptim_balise_ignore`;', null);
		$rep = $wpdb->get_results($sql);
			
		foreach ($rep as $ligneDB) {
			$lId = $ligneDB->id;
			$lNom = $ligneDB->nom;
		
			$ligne = array( 'id' => absint($lId), 'nom' => sanitize_text_field($lNom));
		
			$this->conteneur[$lId] = $ligne;
		}
	}
	
	/**
	 * getAll
	 */
	public function getAll() {

		if ( count($this->conteneur) > 0 ) {
			// on tri par nom de balise
			foreach ($this->conteneur as $key => $row) {
				$nom[$key]  = $row['nom'];
			}
				
			array_multisort($nom, SORT_ASC, $this->conteneur);
		}
		
		return $this->conteneur;
	}
	
	/**
	 * add
	 * @param String $nom
	 * @return int l'id
	 */
	public function add( $nom ) {
		global $wpdb;
		
		$nom = stripslashes($nom);
		
		$ligneBaliseIgnore = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'nom' => mysql_real_escape_string(wp_filter_kses($nom)) ) );
		
		$id = $ligneBaliseIgnore['id'];
		
		$ligne = array( 'id' => $id, 'nom' => $nom );
		
		$this->conteneur[$id] = $ligne;
		
		return $id;
	}

	/**
	 * remove
	 * @param int $id
	 */
	public function remove($id) {
		global $wpdb;
		
		unset( $this->conteneur[$id] );
		
		$sql = $wpdb->prepare('DELETE FROM `'.$wpdb->prefix.'liveoptim_balise_ignore` WHERE id = %d;', $id);
		$wpdb->query($sql);
	}
	
	/**
	 * set
	 * @param int $id
	 * @param String $nom
	 * @return String null ou le message d'erreur
	 */
	public function set($id, $nom) {
		global $wpdb;
		
		$nom = stripslashes($nom);
		
		if ( $this->conteneur[$id]['nom'] != $nom ) {
			// si il y a une modification a faire sur le nom
			$this->conteneur[$id]['nom'] = $nom;
			
			$wpdb->update( 
					$wpdb->prefix.'liveoptim_balise_ignore', 
					array( 'nom' => $this->conteneur['nom'] ), 
					array( 'id' => intval( $id ) )
			);
		}

		return null;
	}
	
}
?>