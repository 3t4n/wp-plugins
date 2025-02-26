<script type="text/javascript">
function show_confirm() {
    return confirm("<?php _e("Do You Really Want to delete the Entry ?","lordlinus-class-booking"); ?>");
}
</script>
<br/>
<?php
global $wpdb;
if(isset($_GET['deleteAppoint']))
{
	$appoint_id = $_GET['deleteAppoint'];
	$query = "delete from `lordlinus_class_cooking` where `id`='$appoint_id'";
	$query = $wpdb->query($query);
	
	$no_of_cand = $_GET['noofcand'];
	$shift_id = $_GET['shift'];
	
	$query1 = "select * from `lordlinus_class_shift` where `id`='$shift_id' ";
	$noofse = $wpdb->get_row($query1);
	echo $noofses = $noofse->no_of_seats;
	$rem_set = $noofses + $no_of_cand;
	
	$update_q = "UPDATE `lordlinus_class_shift` SET `no_of_seats`=$rem_set where `id`=$shift_id";
	$wpdb->query($update_q);
	echo $wpdb->last_error;
	//die;
	
	echo "<script>alert('".__('appointment Deleted Successfully','lordlinus-class-booking')."');</script>";
	echo "<script>setTimeout(location.href='".admin_url("admin.php?page=lord_appointments")."',6000)</script>";
}
?>
<div class="alert alert-info"><?php _e("Appointment List","lordlinus-class-booking"); ?></div>

<table class="table table-bordered" style="width:96%;margin-left:20px;">
<tr><th><?php _e("Date","lordlinus-class-booking"); ?></th>
<th><?php _e("Name","lordlinus-class-booking"); ?></th>
<th><?php _e("Email","lordlinus-class-booking"); ?></th>
<th><?php _e("Phone","lordlinus-class-booking"); ?></th>
<th><?php _e("Message","lordlinus-class-booking"); ?></th>
<th><?php _e("Class","lordlinus-class-booking"); ?></th>
<th><?php _e("Staff","lordlinus-class-booking"); ?></th>
<th><?php _e("Shift","lordlinus-class-booking"); ?></th>
<th><?php _e("No of Candidates","lordlinus-class-booking"); ?></th>
<th><?php _e("Action","lordlinus-class-booking"); ?></th></tr>
<?php
$allappointments = "select * from `lordlinus_class_cooking`";
$appointmentresult = $wpdb->get_results($allappointments);
foreach($appointmentresult as $appointmentresult)
{
?>
<tr><td><?php echo $appointmentresult->appdate; ?> </td><td><?php echo $appointmentresult->name; ?></td>
<td><?php echo $appointmentresult->email; ?></td>
<td><?php echo $appointmentresult->phone; ?></td><td><?php echo $appointmentresult->note; ?></td>
<td>
<?php 

$class_id = $appointmentresult->class_id; 
$claas = "select * from `lordlinus_class_book` where `id` = $class_id";
$claas = $wpdb->get_row($claas);
echo  $claas->name;
?> 

</td>

<td><?php 

$staff_id = $appointmentresult->staff_id; 
$staaf = "select * from `lordlinus_class_staff` where `id` = $staff_id";
$staaf = $wpdb->get_row($staaf);
echo  $staaf->name;

?></td>

<td><?php 

$shift_id = $appointmentresult->shift_id; 
$shiift = "select * from `lordlinus_class_shift` where `id` = $shift_id";
$shiift = $wpdb->get_row($shiift);
echo  $shiift->start_time." - ".$shiift->end_time;

?></td>
<td>
<?php echo $appointmentresult->noofcandi; ?>
</td>
<td>
 <a href='?page=lord_appointments&deleteAppoint=<?php echo $appointmentresult->id;?>&noofcand=<?php echo $appointmentresult->noofcandi;?>&shift=<?php echo $shift_id;?>' onclick='return show_confirm();' class='btn btn-mini btn-danger'><?php _e("Delete Appointment","lordlinus-class-booking"); ?></a>
</td>
<?php
}
?>
</table>