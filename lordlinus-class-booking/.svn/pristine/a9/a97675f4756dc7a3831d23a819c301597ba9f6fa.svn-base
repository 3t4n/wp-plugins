<?php
global $wpdb;
if(isset($_POST['uninstallllcb']))
{
$drop1 = "DROP TABLE `lordlinus_class_staff`";
$wpdb->query($drop1);
$drop2 = "DROP table `lordlinus_class_book`";
$wpdb->query($drop2);
$drop3 = "DROP table `lordlinus_class_shift`";
$wpdb->query($drop3);
$drop4 = "DROP table `lordlinus_class_cooking`";
$wpdb->query($drop4);
$plugin = "lordlinus-class-booking/lordlinus-class-booking.php";
deactivate_plugins($plugin);
?>
<div class="alert" style="width:95%; margin-top:10px;">
			<p><strong> <?php _e("Plugin has been successfully removed.","lordlinus-class-booking"); ?><?php _e(" It can be re-activated from the","lordlinus-class-booking"); ?>
			<a href="plugins.php">Plugins Page</a></strong>.</p>
		</div>
		<?php
		return;
}
?>

<?php
if(isset($_GET['page']) == 'uninstall_lordlinus')
{
?>

<div style="background:#C3D9FF; margin-bottom:10px; padding-left:10px;">
  <h3><?php _e("Remove Plugin","lordlinus-class-booking"); ?></h3> 
</div>

<div class="alert alert-error" style="width:95%;">
	<form method="post">
	<h3><?php _e("Remove Lord Linus Class Booking Plugin","lordlinus-class-booking"); ?></h3>
	<p> <?php _e("This operation wiil delete all data & settings. ","lordlinus-class-booking"); _e("If you continue, You will not be able to retrieve or restore your entries.","lordlinus-class-booking")?>;</p>
	<p><button class="button" id="uninstallllcb" type="submit" class="btn btn-danger" name="uninstallllcb" value="" onclick="return confirm('<?php _e("Warning! data & settings, including appointment entries will be deleted. This cannot be undone. OK to delete, CANCEL to stop","lordlinus-class-booking"); ?>')"><?php _e("Remove Plugin","lordlinus-class-booking"); ?></button></p>
	
	</form>
</div>

<?php

	}
?>