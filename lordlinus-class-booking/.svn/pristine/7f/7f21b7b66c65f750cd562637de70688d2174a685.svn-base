<br/><br/>
<script type="text/javascript">
function show_confirm() {
    return confirm("<?php _e("Do You Really Want to delete the Entry ?","lordlinus-class-booking"); ?>");
}
</script>
	<div class="span12">
	<div class="alert alert-info"><?php _e( 'Staff List', 'lordlinus-class-booking' ); ?> </div>
	<table class="table table-bordered">
	<tr><th><?php _e("Name", 'lordlinus-class-booking'); ?></th>
	<th><?php _e("Email", 'lordlinus-class-booking'); ?></th>
	<th><?php _e('Experience', 'lordlinus-class-booking'); ?></th>
	<th><?php _e('Description', 'lordlinus-class-booking'); ?></th>
	<th><?php _e('Actions', 'lordlinus-class-booking'); ?></th></tr>
	<?php
	global $wpdb;
	$select_query = "select * from `lordlinus_class_staff` ";
	$result = $wpdb->get_results($select_query);
	foreach($result as $result)
		echo "<tr><td>$result->name</td><td>$result->email</td><td>$result->exp ";
		_e('Years', 'lordlinus-class-booking');
		echo "</td><td>$result->desc</td><td><a rel='tooltip' href='?page=entries-staff&sid=$result->id' title='update'><i class='icon-pencil'></i></a> &nbsp;</td></tr>";
	?>
	</table>
	</div>
	<?php
	if(isset($_GET['sid']))
	{
		$updat_query = "select * from `lordlinus_class_staff` where `id`=".$_GET['sid'];
		$results =  $wpdb->get_results($updat_query);
		
		?>
		<script>
			jQuery(document).ready(function() {
				jQuery('#close1').click(function(){
					
					jQuery('#addstaff2').hide('slow');
				});
				jQuery('#back').click(function(){
					
					jQuery('#addstaff2').hide('slow');
				});
				jQuery('#addstaff').click(function(){
					alert('dfs');
					return false;
				
				});

			});
		</script>
		<div class="modal" id="addstaff2">
		<div class="modal-info">
						<div class="alert alert-info">
							<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="close1"><i class="icon-remove"></i></a>
							<h4 align="center" ><?php _e('Update Staff', 'lordlinus-class-booking'); ?></h4>
						</div>
					</div>
		<div class="modal-body">
		<?php
		if(isset($_POST['updatethesaff']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$desc = $_POST['desc'];
			$exp = $_POST['exp'];
			$table = "lordlinus_class_staff";
			$iid = $_GET['sid'];
			$updatequery = "update $table set `name` = '$name', `email`='$email', `desc`='$desc', `exp`= '$exp' where `id`='$iid'";
			if($wpdb->query($updatequery))
			{
				echo "<script>alert('".__('Staff updated Successfully','lordlinus-class-booking')."');</script>";
				echo "<script>location.href='?page=entries-staff';</script>";
			}
		}
		?>
			<form name="addastaff" action="#" method="post">
			<table class="table" style="width:96%;margin-left:20px;">
				<tr><td><?php _e('Name', 'lordlinus-class-booking'); ?></td><td><input type="text" name="name" id="name" required="required" value="<?php echo $results[0]->name; ?>" /></td></tr>
				<tr><td colspan="2"><span id="errorcname"></span></td></tr>
				<tr><td><?php _e('Email', 'lordlinus-class-booking'); ?></td><td><input type="email" name="email" id="mail" required="required" value="<?php echo $results[0]->email; ?>" /></td></tr>
				<tr><td><?php _e('Description', 'lordlinus-class-booking'); ?></td><td><textarea name="desc" id="desc" ><?php echo $results[0]->desc; ?></textarea></td></tr>
				<tr><td><?php _e('Experience', 'lordlinus-class-booking'); ?></td><td><input type="exp" name="exp" id="exp" value="<?php echo $results[0]->exp; ?>"/> <?php _e('Years', 'lordlinus-class-booking'); ?></td></tr>
				<tr><td><input type="submit" class="btn btn-primary" value="<?php _e('update', 'lordlinus-class-booking'); ?>" name="updatethesaff" id= "updatethesaff"/></td><td><input type="button" class="btn btn-primary" value="<?php _e('Cancel', 'lordlinus-class-booking'); ?>" id="back"  /></td></tr>
			</table>
			</form>
		</div>
		</div>
		<?php
	}