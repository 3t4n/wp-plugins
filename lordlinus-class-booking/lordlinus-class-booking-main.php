<script type="text/javascript">
function show_confirm() {
    return confirm("<?php _e("Do You Really Want to delete the Entry ?","lordlinus-class-booking"); ?>");
}
</script>
<?php
echo "<link rel='stylesheet' type='text/css' href='".plugins_url('/bootstrap-assets/css/bootstrap.css', __FILE__)."' />";
	global $wpdb;
	?>
	<script>
	jQuery(document).ready(function() {
		jQuery('#addastaff').click(function(){
			jQuery('#addastaff11').show();
		});
		jQuery('#close').click(function(){
			
			jQuery('#addastaff11').hide('slow');
			//jQuery('#addaclass11').hide('slow');
		});
		jQuery('#addaclass').click(function(){
			jQuery('#addaclass11').show();
		});
		jQuery('#close2').click(function(){
			jQuery('#addaclass11').hide('slow');
		});
		jQuery('#close3').click(function(){
			jQuery('#addshift11').hide('slow');
		});
		jQuery('#closeshift').click(function(){
			jQuery('#viewallshifts').hide('slow');
		});
		jQuery('#addshift').click(function(){
			jQuery('#addshift11').hide('slow');
		});
		
		jQuery(function(){
		jQuery('#start_time').timepicker({
			ampm: true,
			timeFormat: 'hh:mm TT',
		});
		
		jQuery('#end_time').timepicker({
			ampm: true,
			timeFormat: 'hh:mm TT',
		});
	});
	jQuery("#increase").click(function(){
		jQuery("#noofseats").val(parseInt(jQuery("#noofseats").val())+1 );
	});
	jQuery("#decrease").click(function(){
		jQuery("#noofseats").val(parseInt(jQuery("#noofseats").val())-1 );
	});
	});
	function increaseno()
	{
		document.getElementById('noofseats').value = document.getElementById('noofseats').value + 1;
	}
	</script>
	<link rel='stylesheet' type='text/css' href='<?php echo plugins_url('/datepicker-assets/css/jquery-ui-1.8.23.custom.css', __FILE__); ?>' />
	
		<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
		<script src="<?php echo plugins_url('/timepicker-assets/js/jquery-ui-timepicker-addon.js', __FILE__); ?>" type="text/javascript"></script>
	<?php
	echo "<br/><br/><div class='alert alert-info'>";
	_e('Welcome to Class Booking System', 'lordlinus-class-booking');
	echo "</div>";
	echo "<div class='span12'><div class='span6'><button class='btn btn-info' name='addaclass' id='addaclass'>";
	_e('Add a Service', 'lordlinus-class-booking');
	echo "</button></div><div class='span4' style='float:right;'><button class='btn btn-info' id='addastaff' name='addastaff'>";
	_e('Add a Staff', 'lordlinus-class-booking');
	echo "</button></div></div>";
	?>
	<br/><br/><br/>
	<?php
	if(isset($_POST['addthesaff']))
	{
		$name=$_POST['name'];
		$email = $_POST['email'];
		$desc = $_POST['desc'];
		$exp = $_POST['exp'];
		$tabl_name = "lordlinus_class_staff";
		$insert_query = "insert into `$tabl_name`(`id`, `name`, `email`, `desc`, `exp`) values ('', '$name','$email','$desc','$exp')";
		if($wpdb->query($insert_query));
		{	
			echo "<script>alert('";
			_e("New Staff Added Successfully","lordlinus-class-booking");
			echo "');</script>";	
		}

	}
	if(isset($_POST['addtheclass']))
	{
		$nameclass=$_POST['name'];
		$descclass=$_POST['desc'];
		$starttime = $_POST['start_time'];
		$endtime = $_POST['end_time'];
		$noofaseats = $_POST['noofseats'];
		$staffid = $_POST['allstaffs'];
		$insert_querys = "insert into `lordlinus_class_book`(`id`,`name`,`desc`, `staff_name`) value ('','$nameclass','$descclass','$staffid') ";
		if($wpdb->query($insert_querys))
		{
			echo "<script>alert('";
			_e("New Service Added Successfully","lordlinus-class-booking");
			echo "')</script>";
		}
	}
	?>
	<?php
	if(isset($_GET['classid']))
	{
		global $wpdb;
		$classid = $_GET['classid'];
		$classses = "select * from `lordlinus_class_book` where `id`=$classid";
		$classes = $wpdb->get_results($classses);
		if(isset($_POST['addtheshift']))
		{
			$class_id = $_GET['classid'];
			$no_of_seats = $_POST['noofseats'];
			$start_time = $_POST['start_time'];
			$end_time = $_POST['end_time'];
			$shift_query = "insert into `lordlinus_class_shift`(`id`,`class_id`, `start_time`,`end_time`, `no_of_seats`)
			values('','$class_id','$start_time','$end_time', '$no_of_seats');";
			if($wpdb->query($shift_query))
			{
				echo "<script>alert('";
				_e("shift added successfully ....","lordlinus-class-booking");
				echo "')</script>";
				echo "<script>location.href='?page=class-booking';</script>";
			}
		}
		?>
		<div class="modal" id="addshift11">
		<div class="modal-info">
						<div class="alert alert-info">
							<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="close3"><i class="icon-remove"></i></a>
							<h4 align="center" ><?php _e('Add Shift to class', 'lordlinus-class-booking'); ?></h4>
						</div>
					</div>
		<div class="modal-body">
			<form name="addastaff" action="#" method="post">
			<table class="table" style="width:96%;margin-left:20px;">
				<tr><td><?php _e("Class Name","lordlinus-class-booking"); ?></td><td><input type="text" name="name" id="name" required="required" disabled="disabled" value="<?php echo $classes[0]->name; ?>" /></td></tr>
				<tr><td><?php _e("Start Time","lordlinus-class-booking"); ?></td><td><input type="text" name="start_time" required="required" id="start_time" /></td></tr>
				<tr><td><?php _e("End Time","lordlinus-class-booking"); ?></td><td><input type="text" name="end_time" required="required" id="end_time"/></td></tr>
				<tr><td><?php _e("No of Seats","lordlinus-class-booking"); ?></td><td><input type="number" name="noofseats" id="noofseats" value="1" required="required" style="width:40px;"/>
				<input type="button" name="increase" id="increase" value="+" style="height:39px">
				<input type="button" name="decrease" id="decrease" value="-" style="height:39px"></td></tr>
				<tr><td><input type="submit" class="btn btn-primary" value="<?php _e("Add a shift","lordlinus-class-booking"); ?>" name="addtheshift"  /> </td></tr>
			</table>
			</form>
		</div>
		</div>
		
		<?php
	}
	?>
	<div id="addastaff11" class="modal" style="display:none;">
	<div class="modal-info">
					<div class="alert alert-info">
						<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="close"><i class="icon-remove"></i></a>
					 	<h4 align="center" ><?php _e('Add new Staff', 'lordlinus-class-booking'); ?></h4>
					</div>
				</div>
	<div class="modal-body">
		<form name="addastaff" action="#" method="post">
		<table class="table" style="width:96%;margin-left:20px;">
			<tr><td><?php _e("Name","lordlinus-class-booking"); ?></td><td><input type="text" name="name" id="name" required="required" /></td></tr>
			<tr><td><?php _e("Email","lordlinus-class-booking"); ?></td><td><input type="email" name="email" id="mail" required="required" /></td></tr>
			<tr><td><?php _e("Description","lordlinus-class-booking"); ?></td><td><textarea name="desc" id="desc" ></textarea></td></tr>
			<tr><td><?php _e("Experience","lordlinus-class-booking"); ?></td><td><input type="exp" name="exp" id="exp"/> <?php _e("Years","lordlinus-class-booking"); ?></td></tr>
			<tr><td><input type="submit" class="btn btn-primary" value="<?php _e("Add a Staff","lordlinus-class-booking"); ?>" name="addthesaff"  /></td></tr>
		</table>
		</form>
	</div>
	</div>
	<div id="addaclass11" class="modal" style="display:none;">
	<div class="modal-info">
					<div class="alert alert-info">
						<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="close2"><i class="icon-remove"></i></a>
					 	<h4 align="center" ><?php _e('Add a Class', 'lordlinus-class-booking'); ?></h4>
					</div>
				</div>
	<div class="modal-body">
		<form name="addastaff" action="#" method="post">
		<table class="table" style="width:96%;margin-left:20px;">
			<tr><td><?php _e("Class Name","lordlinus-class-booking"); ?></td><td><input type="text" name="name" id="name" required="required" /></td></tr>
			<tr><td><?php _e("Description","lordlinus-class-booking"); ?></td><td><textarea name="desc" id="desc" ></textarea></td></tr>
			<tr><td><?php _e("Staff","lordlinus-class-booking"); ?></td><td>
			<select name="allstaffs">
			<?php
			$selectallstaff = "SELECT * from `lordlinus_class_staff`";
			$staffall = $wpdb->get_results($selectallstaff);
			foreach($staffall as $staffall)
			{
				echo "<option value='$staffall->id'>$staffall->name</option>";
			}
			?>
			</select>
			</td></tr>
			<tr><td><input type="submit" class="btn btn-primary" value="<?php _e("Add a Class","lordlinus-class-booking"); ?>" name="addtheclass"  /></td></tr>
		</table>
		</form>
	</div>
	</div>
	<div class="alert alert-info">
	<h4><?php _e("Class Available","lordlinus-class-booking"); ?></h4>
	</div>
	<table class="table table-bordered">
	<tr><th><?php _e("Class Name","lordlinus-class-booking"); ?></th><th><?php _e("Description","lordlinus-class-booking"); ?></th>
	<th><?php _e("Staff","lordlinus-class-booking"); ?></th><th><?php _e("Actions","lordlinus-class-booking"); ?></th></tr>
	<?php 
		$allclasses = "SELECT * from `lordlinus_class_book`";
		$allclasses = $wpdb->get_results($allclasses);
		foreach($allclasses as $allclasses)
		{
			$query = "select * from `lordlinus_class_staff` where `id`='$allclasses->staff_name' ";
			$stff = $wpdb->get_results($query);
			echo "<tr><td>$allclasses->name</td><td>$allclasses->desc</td><td>".$stff[0]->name."</td><td><a class='btn btn-info' href='?page=class-booking&classid=$allclasses->id'>";
			_e("Add shift","lordlinus-class-booking");
			echo "</a> &nbsp;&nbsp;<a class='btn btn-info' href='?page=class-booking&viewclassid=$allclasses->id'>";
			_e("View shifts","lordlinus-class-booking");
			echo "</a>&nbsp;&nbsp;<a class='btn btn-info' href='?page=class-booking&updateclassid=$allclasses->id'>";
			_e("Update Class","lordlinus-class-booking");
			echo "</a></td></tr>";
		}
	?>
	</table>
	<?php
	if(isset($_GET['viewclassid']))
	{
		echo $classid = $_GET['viewclassid'];
		$selectall = "select * from `lordlinus_class_shift` where `class_id` = $classid";
		$shiftlist = $wpdb->get_results($selectall);
		?>
		<div class="modal" id="viewallshifts">
		<div class="modal-info">
			<div class="alert alert-info">
				<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="closeshift"><i class="icon-remove"></i></a>
				<h4 align="center" ><?php _e('View All Shifts', 'lordlinus-class-booking'); ?></h4>
			</div>
		</div>
		<div class="modal-body">
			<table class="table" style="width:96%;margin-left:20px;">
				<tr><th><?php _e("Sr no","lordlinus-class-booking"); ?></th><th><?php _e("Start time","lordlinus-class-booking"); ?></th>
				<th><?php _e("End Time","lordlinus-class-booking"); ?></th>
				<th><?php _e("No of Seats");?> </th><th><?php _e("Action","lordlinus-class-booking"); ?></th></tr>
				<?php
				$selectallstaff = "SELECT * from `lordlinus_class_staff`";
				$staffall = $wpdb->get_results($selectallstaff);
				$i = 1;
				foreach($shiftlist as $shiftlist)
				{
					echo "<tr><td>$i</td><td>$shiftlist->start_time</td><td>$shiftlist->end_time</td><td>$shiftlist->no_of_seats</td><td><a href='?page=class-booking&updateshift=$shiftlist->id' class='btn btn-mini btn-info'>Edit Shift </a>&nbsp; <a href='?page=class-booking&deleteShift=$shiftlist->id' onclick='return show_confirm();' class='btn btn-mini btn-danger'>Delete Shift</a></td></tr>";
					$i++;
				}
				?>
			</table>
		</div>
		</div>
		<?php
	}
	if(isset($_POST['updtheshift']))
	{
		$shiftid = $_POST['shiftid'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$no_of_seats = $_POST['noofseats'];
		$upquer = "update `lordlinus_class_shift` set `start_time`='$start_time',`end_time`='$end_time',`no_of_seats`='$no_of_seats' where `id`='$shiftid'";
		$wpdb->query($upquer);
		$wpdb->show_errors();
		echo "<script>alert('Your class Shift has been updated successfully');location.href='".admin_url("admin.php?page=class-booking")."'</script>";		
	}
	if(isset($_GET['deleteShift']))
	{
		$shift_id = $_GET['deleteShift'];
		$del_query = "delete from `lordlinus_class_shift` where `id`='$shift_id'";
		$wpdb->query($del_query);
		echo "<script>alert('Shift Deleted Successfully')</script>";
		echo "<script>setTimeout(location.href='".admin_url("admin.php?page=class-booking")."',6000)</script>";
	}
	if(isset($_GET['updateshift']))
	{
		$classid = $_GET['updateshift'];
		$selectall = "select * from `lordlinus_class_shift` where `id` = $classid";
		$shiftlist = $wpdb->get_results($selectall);
		?>
		<div class="modal" id="viewallshifts">
		<div class="modal-info">
			<div class="alert alert-info">
				<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="closeshift"><i class="icon-remove"></i></a>
				<h4 align="center" ><?php _e('Update the shift', 'lordlinus-class-booking'); ?></h4>
			</div>
		</div>
		<div class="modal-body">
			<form name="addastaff" action="?page=class-booking" method="post">
		<table class="table" style="width:96%;margin-left:20px;">
		<input name="shiftid" type="hidden" value="<?php echo $classid;?>">
				<tr><td>Start Time</td><td><input type="text" name="start_time" value="<?php echo $shiftlist[0]->start_time; ?>" required="required" id="start_time" /></td></tr>
				<tr><td>End Time</td><td><input type="text" name="end_time" required="required" value="<?php echo $shiftlist[0]->end_time; ?>" id="end_time"/></td></tr>
				<tr><td>No of Seats</td><td><input type="number" name="noofseats" id="noofseats" value="<?php echo $shiftlist[0]->no_of_seats; ?>" required="required" style="width:40px;"/>
				<input type="button" name="increase" id="increase" value="+" style="height:39px">
				<input type="button" name="decrease" id="decrease" value="-" style="height:39px"></td></tr>
				<tr><td><input type="submit" class="btn btn-info" value="Update shift" name="updtheshift"  /> </td></tr>
			</table>
		</form>
		</div>
		</div>
		<?php
	}
	if(isset($_POST['updatetheclass']))
	{
		$idofc = $_POST['idofclass'];
		$name = $_POST['name'];
		$desc = $_POST['desc'];
		$staff = $_POST['allstaffs'];
		$upquer = "update `lordlinus_class_book` set `name`='$name',`desc`='$desc',`staff_name`='$staff' where `id`='$idofc'";
		$wpdb->query($upquer);
		echo "<script>alert('Your class has been updated successfully');location.href='".admin_url("admin.php?page=class-booking")."'</script>";
		
	}
	if(isset($_GET['updateclassid']))
	{
		$classid = $_GET['updateclassid'];
		$selectall = "select * from `lordlinus_class_book` where `id` = $classid";
		$shiftlist = $wpdb->get_results($selectall);
		?>
		<div class="modal" id="viewallshifts">
		<div class="modal-info">
			<div class="alert alert-info">
				<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="closeshift"><i class="icon-remove"></i></a>
				<h4 align="center" ><?php _e('Update Class Details', 'lordlinus-class-booking'); ?></h4>
			</div>
		</div>
		<div class="modal-body">
			<form name="addastaff" action="?page=class-booking" method="post">
		<table class="table" style="width:96%;margin-left:20px;">
		<input name='idofclass' type='hidden' value="<?php echo $classid;?>">
			<tr><td>Class Name</td><td><input type="text" name="name" id="name" required="required" value="<?php echo $shiftlist[0]->name; ?>" /></td></tr>
			<tr><td>Description</td><td><textarea name="desc" id="desc" ><?php echo $shiftlist[0]->desc; ?></textarea></td></tr>
			<tr><td>Staff</td><td>
			<select name="allstaffs">
			<?php
			$selectallstaff = "SELECT * from `lordlinus_class_staff`";
			$staffall = $wpdb->get_results($selectallstaff);
			foreach($staffall as $staffall)
			{
				if($staffall->id == $shiftlist[0]->staff_name)
					echo "<option value='$staffall->id' selected='selected'>$staffall->name</option>";
				else
					echo "<option value='$staffall->id'>$staffall->name</option>";
			}
			?>
			</select>
			</td></tr>
			<tr><td><input type="submit" class="btn btn-primary" value="Update Class" name="updatetheclass"  /></td></tr>
		</table>
		</form>
		</div>
		</div>
		<?php
	}