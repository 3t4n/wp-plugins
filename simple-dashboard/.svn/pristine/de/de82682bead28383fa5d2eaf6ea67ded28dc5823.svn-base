<?php

global $DashboardExtended;

if(isset($_POST['Upload_Settings']) && isset($_FILES['settings'])){
	if(intval($_FILES['settings']['error']) === 0){
		$file_content = file_get_contents($_FILES['settings']['tmp_name']);
		$data = json_decode($file_content,true);
		if($data){
			foreach($data as $key => $options)
				update_option( $key, $options );
			$DashboardExtended['message'] = 'Settings Saved.';
		}
		else
			$DashboardExtended['error'] = "Invalid File.";
	}else
		$DashboardExtended['error'] = "Upload Error.";
}

if(isset($_GET['Download_Current_Settings'])){
	$data['DashboardExtended_banner'] = get_option('DashboardExtended_banner');
	$data['DashboardExtended_post'] = get_option('DashboardExtended_post');
	$data['DashboardExtended_page'] = get_option('DashboardExtended_page');
	$file_data = json_encode($data);
	
	header("Content-type: application/octet-stream"); 
  header("Content-Disposition: attachment; filename=\"DashboardExtended_Settings.json\""); // use 'attachment' to force a
	header("Content-length: ".strlen($file_data));
	echo $file_data;
	exit;
}

add_action('admin_menu', 'dashboard_extended_create_menu');

function dashboard_extended_create_menu() {
	//create new top-level menu
	add_menu_page('Dashboard Extended Settings', 'Dashboard Options', 'manage_options','dashboard_extended_settings', 'dashboard_extended_settings_page');
}

function dashboard_extended_settings_page(){
	global $DashboardExtended;
?>

<div class="wrap">
<h2>Simple Dashboard</h2>

<?php if(isset($DashboardExtended['error'])): ?>
	<div id="message" class="error below-h2">
		<p><?php echo $DashboardExtended['error']; unset($DashboardExtended['message']); ?></p>
	</div>
<?php elseif(isset($DashboardExtended['message'])): ?>
	<div id="message" class="updated below-h2">
		<p><?php echo $DashboardExtended['message']; unset($DashboardExtended['message']); ?></p>
	</div>
<?php endif; ?>

<p>
<form method='post' enctype="multipart/form-data">
	<input type='file' name='settings' />
	<input type='submit' name='Upload_Settings' value='Upload Settings File' />
</form>
</p>

<hr />

<p>
<form method='get' >
	<input type='submit' name='Download_Current_Settings' value='Download Current Settings' />
</form>
</p>
	
</div>

<?php
}
?>