<?php

/**
* Base class.
* It is abstract because we want mantain here his data.
* 
*/

namespace Addscript;

abstract class Base {
	
	/**
     * The name of the plugin
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_plugin_name = 'AddScript';
	
	/**
     * Current version of plugin
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_version = '1.3.2';
	
	/**
     * Language domain.
	 * In the return function this will be concatenated
	 * with prefix.
	 * So, good to leave 'language_domain';
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_language_domain = 'language_domain';
	
	
	
	/**
     * Prefix for every single input / key / field / etc.
	 * Prefix has "_" on the end, you don't need to add.
	 * 
	 * @since 1.0
	 * 
     * @var string
     */
	private $_prefix = 'addscript_';
	
	/**
     * Container for the key(s) of the input / textarea form.
	 * 
	 * @since 1.0
	 * 
     * @var Array
     */
	private $_array_admin_key_form;
	
	
	/**
     * Base dir of the plugin
	 * 
	 * @since 1.0
	 * 
     * @var string
	 * 
     */
	private $_base_dir = '';
	
	
	/**
     * Custom post name
	 * 
	 * @since 1.0
	 * 
     * @var string
	 * 
     */
	private $_custom_post_name = 'addscript_cp';
	
	
	
	/**
     * Our constructor.
	 * Prepare all the key/valus to use in our plugin.
	 * 
	 * @since 1.0
     */
	
	public function __construct() {
		
		$this->_array_admin_key_form['script'] = $this->get_prefix().'option_script';
		
	}
	
	/**
     * Return the key(s) of the input / textarea form.
	 * 
	 * @return Array
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_array_admin_key_form() {
		
		return $this->_array_admin_key_form;
		
	}
	
	/**
     * Return language domain
	 * 
	 * @return string
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_language_domain() {
		
		return $this->get_prefix().$this->_language_domain;
		
	}
	
	/**
     * Return name of the plugin
	 * 
	 * @return string
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_plugin_name() {
		
		return $this->_plugin_name;
		
	}
	
	/**
     * Return prefix
	 * 
	 * @return string
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_prefix() {
		
		return $this->_prefix;
		
	}
	
	/**
     * Set base_dir
	 * 
	 * @var string
	 * 
	 * @since 1.0
	 * 
     */
	protected function set_base_dir($base_dir) {
		
		$this->_base_dir = $base_dir;
		
	}
	
	/**
     * Return base_dir
	 * 
	 * @return string
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_base_dir() {
		
		return $this->_base_dir;
		
	}
	
	/**
     * Return custom post name
	 * 
	 * @return string
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_custom_post_name() {
		
		return $this->_custom_post_name;
		
	}
	
	
	
}