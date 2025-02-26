<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Common;
class WOOSAjaxController{
	/**
    * Constructor
    * Feature added by : Joy Shaha joysaha7302@gmail.com
    * Date       : 22.04.2020
    */
	public function woos_register()
    {
        add_action( 'wp_ajax_woos_setting_action', array( $this, 'woos_ajax_handler' ) );
    }
    /**
	 * Setting Data option
	 * @return string
	 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
	 * Date : 19.04.2020
	*/
	private function woos_setting_options($data, $key = null) {
		global $woos_data;
		if (empty($data))
		return;

		if ($key != null) { 
			update_option('woos_setting_data',array($key, $data));
		} else { 
			foreach ( $data as $k=>$v ) {
				if (!isset($woos_data[$k]) || $woos_data[$k] != $v) {
					update_option('woos_setting_data',array($k, $v));
				} else if (is_array($v)) {
					foreach ($v as $key=>$val) {
						if ($key != $k && $v[$key] == $val) {
						update_option('woos_setting_data',array($k, $v));
						break;
						}
					}
				}
			}
		}
	}
	/**
	 * Setting Save Handler
	 * @return string
	 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
	 * Date : 19.04.2020
	*/
    public function woos_ajax_handler()
	{
		$nonce = sanitize_text_field($_POST['security']);
		if (! wp_verify_nonce($nonce, 'woos_setting_nonce') ) die('-1');
		$save_type = sanitize_text_field($_POST['type']);

		if ($save_type == 'save_woos_setting')
		{
			wp_parse_str($_POST['data'], $woos_data);
			unset($woos_data['security']);
			self::woos_setting_options($woos_data);
			die('1');
		}
		die();
	}
}
