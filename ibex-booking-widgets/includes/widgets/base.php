<?php

class iBex_Widgets_Base {

	protected $dir;

	public $title = '';

	public $key = 'base';

	public $shortCodes = array();

	/**
	 * @var iBex_Widgets_Base
	 */
	protected static $_instance;

	public function __construct(){
		self::$_instance = $this;
		$this->dir = IBEX_BW_PLUGIN_DIR . '/includes/widgets';
		$this->admin = iBex_Manager::getInstance();
	}

	/**
	 * @return self
	 */
	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function optionsPage(){
		include $this->dir . '/' . $this->key . '/options-page.php';
	}

	public function getTitle(){
		if(empty($this->title)) return null;

		return $this->title;
	}

	/**
	 * Get the settings required for this page
	 * @return array
	 */
	public static function getSettings(){
		return array('operatorid'=>array('iBex_Widgets_Base', 'validateOpId'));
	}

	/**
	 * Global Settings Section
	 */
	public function addSettingsSection(){
		add_settings_section('ibw-section-base', 'Global Settings', array($this, 'settingsSectionA'), 'ibw-options-base');
		add_settings_field('ibw-option-base-operatorid', 'Operator ID', array($this, 'settingsFieldA'), 'ibw-options-base', 'ibw-section-base');
	}

	/**
	 * Global Settings Text
	 */
	public function settingsSectionA(){
		echo '<p>Some global settings for all of the different widgets.</p>';
	}

	/**
	 * Operator ID Setting Field
	 */
	public function settingsFieldA(){
		echo '<input type="text" name="ibw-option-base-operatorid" id="ibw-option-base-operatorid" class="regular-text" value="' . get_option('ibw-option-base-operatorid', '') . '"> <span class="description">The iBex account that all of the listed widgets use.</span>';
	}

	/**
	 * Cleanup the operator ID
	 * @param unknown_type $input
	 * @return unknown
	 */
	public function validateOpId($input){
		return preg_replace('/[^a-zA-Z0-9_-\s]/', '', $input);
	}

	public function getShortCodes(){
		return $this->shortCodes;
	}

	/**
	 * Run a custom form
	 */
	public function runCustomForms(){

	}
}