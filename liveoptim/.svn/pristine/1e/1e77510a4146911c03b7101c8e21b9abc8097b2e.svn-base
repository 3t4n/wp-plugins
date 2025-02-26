<?php
/* *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
 * Fichier abstractAction.class.php
*/

/**
 * abstract class AbstractAction
*
* @author : Erwan MILBEO
*/
abstract class AbstractAction {
	
	/**
	 * c'est la methode de la requête (GET ou POST).
	 * @var string
	 */
	private $methode;
	
	/**
	 * indique le layout
	 * @var String
	 */
	protected $layout;

	/**
	 * la langue
	 * @var String
	 */
	protected $langue;
	
	/**
	 * indique le template
	 * @var String
	 */
	protected $template;

	/**
	 * Constructeur
	 */
	public function AbstractAction() {
		// layout par défaut
		$this->layout = null;
		
		// template par défaut
		$this->template = null;

		// on défini la langue
		switch (WPLANG) {
			case 'fr_FR': // Français
				$this->langue = 'fr';
				break;
		
			case 'es_ES': // España
			case 'es_PE': // Perú
			case 'es_CL': // Chile
				$this->langue = 'es';
				break;
		
			case 'pt_BR': // Brazilian Portuguese
			case 'pt_PT': // European Portuguese
				$this->langue = 'pt-br';
				break;
		
			case 'en_GB':
				$this->langue = 'en';
				break;
		
			case 'en_US':
			default:
				$this->langue = 'us';
		}
		
		// on charge la langue
		require_once dirname(__FILE__).'/langue/'.$this->langue.'.php';
		
		// on défini la méthode ( GET ou POST )
		$this->methode = $_SERVER['REQUEST_METHOD'];

		// on exécute l'action redéfini.
		$this->execute();
		
		//Capping
		require_once(dirname(__FILE__).'/base/conteneurParametres.class.php');
		$conteneurParametre = ConteneurParametres::getInstance();
		$this->isON = $conteneurParametre->isOnOff();
		if($this->isON){$this->capping = $conteneurParametre->getCapping();}
		
		
		// on définit si file_get_contents est désactivé
		$this->is_file_get_contents_disable = ini_get('allow_url_fopen')!="1";
		
		include dirname(__FILE__)."/../vues/".$this->layout;
	}

	/**
	 * execute
	 */
	abstract public function execute();

	
	/**
	 * redirection
	 *
	 * @param String $param
	 */
	public function redirection($param) {
		wp_redirect("admin.php?page=liveoptim&$param");
	}
	
	/**
	 * getLayout
	 *
	 * @return String $layout
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * getLangue
	 *
	 * @return String $langue
	 */
	public function getLangue() {
		return $this->langue;
	}
	
	/**
	 * setLayout
	 *
	 * @param String $layout
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}

	/**
	 * getTemplate
	 *
	 * @return String $template
	 */
	public function getTemplate() {
		return $this->template;
	}

	/**
	 * setTemplate
	 *
	 * @param String $template
	 */
	public function setTemplate($template) {
		$this->template = $template;
	}

	/**
	 * getMethode
	 *
	 * @return string
	 */
	protected function getMethode() {
		return $this->methode;
	}

}
?>