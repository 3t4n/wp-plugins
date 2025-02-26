<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       dcgws.com
 * @since      1.0.0
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/admin/panels
 *
 */
if (!defined('ABSPATH')) {
    exit;
}

	$site_url = "admin.php?page=edd-google-customer-reviews-admin-display&tab=";
	
	if(isset($_GET['tab']) && $_GET['tab'] == 'general_settings'){
		$general_class_active = "active";
	}
	else{
		$general_class_active = "";
	}
	if(isset($_GET['tab']) && $_GET['tab'] == 'about_plugin'){
		$advanced_class_active = "active";
	}
	else{
		$advanced_class_active = "";
	}
	if(empty($_GET['tab'])){
		$general_class_active = "active";
	}
	
?>
<header class='background-color:#E8E8E8;height:500px;width:auto;margin-top:100px;margin-left:20px;'>
	<img class ="banner" src='<?php echo plugins_url('../images/banner.jpg', __FILE__ )  ?>' style="margin-left:10px;">
</header>
	<ul class="nav nav-tabs nav-pills" style="margin-left: 10px;margin-top:20px;">
		<li class="nav-item"> 
			<a  href="<?php echo $site_url.'general_settings'; ?>"  class="border-left aga-tab nav-link <?php echo $general_class_active; ?>"><?php _e('General Setting','edd-google-customer-reviews'); ?></a>
		</li>
	</ul>
