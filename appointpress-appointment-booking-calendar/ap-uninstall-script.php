<?php
	// Uninstall appointpress
	if(isset($_POST['uninstallapcal']))
	{
		//delete appointpress account details
		delete_option('appointpress_account_details');
		
		// DEACTIVATE APPOINTRESS PLUGIN
		$plugin = "appointpress/appointpress.php";
		deactivate_plugins($plugin);
		?>
		<div class="alert" style="width:95%; margin-top:10px;">
			<p><strong><?php _e('Appointpress Plugin has been successfully removed. It can be re-activated from the ', 'appointpress'); ?><a href="plugins.php"><?php _e('Plugins Page', 'appointpress'); ?></a></strong>.</p>
		</div>
		<?php
		return;
	 }
?>

<?php
if(isset($_GET['page']) == 'uninstall-plugin')
{
?>

<div style="background:#C3D9FF; margin-bottom:10px; padding-left:10px;">
  <h3><?php _e('Remove Plugin', 'appointpress'); ?></h3> 
</div>

<div class="alert alert-error" style="width:95%;">
	<form method="post">
	<h3><?php _e('Remove Appointpress Plugin', 'appointpress'); ?></h3>
	<p><?php _e('This operation wiil delete all Appointpress account details. If you continue, You will not be able to retrieve or restore your details.', 'appointpress'); ?></p>
	<p><button id="uninstallapcal" type="submit" class="appointpress_btn appointpress_btn-danger" name="uninstallapcal" value="" onclick="return confirm('<?php _e('OK to delete, Cancel to stop', 'appointpress'); ?>')" ><?php _e('REMOVE PLUGIN', 'appointpress'); ?></button></p>
	</form>
</div>
<?php
	}
?>