<?php

/**
 * @package Konfirmi Plugin
 */

namespace Konfirmi\Base\Forms;

use WC_Order;
use \Konfirmi\Base\FormController;
use \Konfirmi\Models\WidgetModel;

class WooCommerce extends FormController
{
	private $wooCommerceFormId = -1;
	private $konfirmiPluginId = -1;
	
	/**
	 * Register the hook for working with WooCommerce data before sending.
	 */ 
	public function register(){
		if(!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && !class_exists('WooCommerce')) {
            return null;
        }
		$this->getFormWooCommerceId();
		$this->wooCommerceFormId = $this->getFormWooCommerceId();
		$this->konfirmiPluginId = $this->getKonfirmiPluginId();
		if($this->wooCommerceFormId != -1 && $this->konfirmiPluginId != -1){
			add_action('woocommerce_after_order_notes', function (){
				echo do_shortcode('[konfirmi id="'.$this->konfirmiPluginId.'"]');
			});
		}
		$this->enqueueScripts();
	}
	/**
	 * Get id for WooCommerce
	 *
	 * @return int id
	 */
	function getFormWooCommerceId(){
		$widgetModel = new WidgetModel();
		$forms = $widgetModel->getForms();
		foreach ($forms as $widget) {
			if($widget['name']=='WooCommerce'){
				return $widget['id'];
			}
		}
		return -1;
	}
	/**
	 * get id for Konfirmi Plugin
	 *
	 * @return int id
	 */
	function getKonfirmiPluginId(){
		if($this->wooCommerceFormId == -1) return -1;
		$widgetModel = new WidgetModel();
		$plugins = $widgetModel->getWidgetForms();
		foreach ($plugins as $plugin) {
			if($plugin->form_id == $this->wooCommerceFormId){
				return $plugin ->widget_id;
			}
		}
		return -1;
	}

	/**
    * Init scripts for Konfirmi Plugin
    */
	public function enqueueScripts(){
		add_action('wp_enqueue_scripts', function(){
			$WooCommerce = $this->plugin_url."assets/js/wooCommerce.js";
			wp_enqueue_script('wc_scripts', $WooCommerce, array('konfirmi_scripts', 'woocommerce', 'base_class'));
		});
	}
	
}