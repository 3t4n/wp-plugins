<?php
/**
 * mwm_aalAdminPanel - Admin Section for Auto Anchor List
 * 
 * @package Auto Anchor List
 * @author MindWireMedia
 * @copyright 2009
 * @since 1.0.0
 */

class mwm_aalAdminPanel{

	function mwm_aalAdminPanel(){
		add_action('admin_menu', array(&$this,'load_admin_options'));
	}

	function load_admin_options(){
		if (function_exists('add_options_page')) {
            add_options_page('Auto Anchor List Options','Auto Anchor List', 6, MWMAALFOLDER . '/admin/options.php');
        }
	}
}

?>