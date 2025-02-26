<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WaicOptions extends WaicModule {
	private $_options = array();
	private $_optionsToCategoires = array();	// For faster search

	public function init() {
		WaicDispatcher::addFilter('mainAdminTabs', array($this, 'addAdminTab'));
	}
	public function initAllOptValues() {
		// Just to make sure - that we loaded all default options values
		$this->getAll();
	}
	/**
	 * This method provides fast access to options model method get
	 *
	 * @see optionsModel::get($d)
	 */
	public function get( $gr = '', $key = '') {
		return $this->getModel()->get($gr, $key);
	}
	public function getWithDefaults( $gr, $key) {
		$value = $this->getModel()->get($gr, $key);
		return empty($value) ? $this->getModel()->getDefaults($gr, $key) : $value;
	}
	/**
	 * This method provides fast access to options model method get
	 *
	 * @see optionsModel::get($d)
	 */
	public function isEmpty( $key = '' ) {
		return $this->getModel()->isEmpty($key);
	}

	public function addAdminTab( $tabs ) {
		$tabs['settings'] = array(
			'label' => esc_html__('Settings', 'ai-copilot-content-generator'), 'callback' => array($this, 'getSettingsTabContent'), 'fa_icon' => 'fa-cog', 'sort_order' => 30,
		);
		return $tabs;
	}
	public function getSettingsTabContent() {
		return $this->getView()->getSettingsTabContent();
	}
	public function getOptionsTabsList( $current = '' ) {
		$tabs = array(
			'api' => array(
				'class' => '',
				'pro' => false,
				'label' => __('API settings', 'ai-copilot-content-generator'),
			),
			'plugin' => array(
				'class' => '',
				'pro' => false,
				'label' => __('Plugin settings', 'ai-copilot-content-generator'),
			),
			'prompts' => array(
				'class' => '',
				'pro' => false,
				'label' => __('Prompts editing', 'ai-copilot-content-generator'),
			),
		);

		if (empty($current) || !isset($tabs[$current])) {
			reset($tabs);
			$current = key($tabs);
		}
		$tabs[$current]['class'] .= ' current';
		
		return WaicDispatcher::applyFilters('getOptionsTabsList', $tabs);
	}
}
