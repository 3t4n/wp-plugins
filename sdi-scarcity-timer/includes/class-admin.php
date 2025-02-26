<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

 class SdiAdmin
 {
 	/**
 	 *  ADMIN - index
 	 */
 	public static function admin()
 	{
 		
 		$list = [];
 		$campaign = [];
 		$alert = '';
 		$alertType = 'info';
 		if (!empty($_GET['edit'])) {
 		
 			extract((new SdiCampaign())->editCampaign());
 			$page = 'edit-campaign';
 			
 		} else {
 			$list = SdiCampaign::listCampaign();
 			$page = 'index';
 		}
 		self::adminContent($page, compact('list', 'campaign', 'alert', 'alertType'));
 	}

 	/**
 	 *  ADMIN -  settings
 	 */
 	public static function settings()
 	{
 		self::adminContent('settings');
 	}

 	public static function adminHeader()
 	{
 		echo'<div class="sdi-scarcity">';
 		require_once(SDI_ADMIN_PATH.'top.php'); 
 	}

 	public static function adminFooter()
 	{
 		echo'</div><!-- .sdi-scarcity -->';
 	}

 	/**
 	 *  ADMIN -  main content
 	 * @param string $page
 	 */
 	public static function adminContent($page, $data = [])
 	{
 		self::adminHeader();

 		extract($data);
 		require_once(SDI_ADMIN_PATH. $page.'.php');
 		
 		self::adminFooter();
 	}

 	/**
 	 * Add custom css for admin 
 	 */
 	public static function assets($files = [
 		'css' => [],
 		'js'  => []
 	])
 	{
 		$files['css'] += [ '/admin/css/style.css' ];

     	if (!empty($files['css'])) {
     		foreach ($files['css'] as $css) {
     			$id = uniqid('admin-');
     			wp_register_style( $id, SDI_PLUGIN_URL . $css, false, '1.0.0' );
     			wp_enqueue_style( $id );
     		}
     	}
 	}
 }