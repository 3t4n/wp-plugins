<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

include('kpftc-scripts-enqueue.php');


// Settings Page Initialization
function kpftc_settings_page()
{
	// Validate nonce
	if (isset($_POST['kpftc_submit']) && !wp_verify_nonce($_POST['kpftc-settings-form'], 'kpftc'))
	{
		echo '<div class="notice notice-error"><p>Nonce verification failed</p></div>';
		exit;
	}

	// Double Check For User Capabilities
	if ( !current_user_can('manage_options') )
		return;
	
	?>

	<h1 class="admin-title"><img src="<?php echo KPFTC_DIR_URL.'/assets/images/kreativo-pro.png';?>" class="admin-img"> KP Fastest Tidio Chat<br></h1>

	<div class="kpftc-desc"><b>Kreativo Pro Fastest Tidio Chat</b> is the fastest Tidio Chat plugin for WordPress. If you are worried about Tidio Chat slowing down your website speed, then this plugin will solve all your problems. Plugin Created by <a href="https://www.kreativopro.com/" target="_blank">Kreativo Pro</a>.</p></div>

	<?php
		
		include('kpftc-admin-settings-fileds.php');

		if (isset($_POST['kpftc_submit']))
		{
			echo '<div class="notice notice-success is-dismissible"><p><b>KP Fastest Tidio Chat</b> plugin settings have been saved! Please clear cache if you are using any caching plugin.</p></div>';
		}

		kpftc_settings_view();

}