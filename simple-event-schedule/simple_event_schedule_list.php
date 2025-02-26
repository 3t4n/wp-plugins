<?php
	/*if($_POST['add']){
		$error = 0;
		if($_POST['title']==""||$_POST['day']==""||$_POST['month']==""||$_POST['year']==""||$_POST['sh']==""||$_POST['sm']==""||$_POST['eh']==""||$_POST['em']==""){
			$error = 1;
		}else{
			$eventdate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
			$eventtime = $_POST['sh'].':'.$_POST['sm'].' - '.$_POST['eh'].':'.$_POST['em'];
			$eventtitle = $_POST['title'];
			$eventlocation = $_POST['location'];
			
			mysql_query("INSERT INTO wp_ses (title, eventdate, eventtime, location) VALUES ('$eventtitle','$eventdate', '$eventtime', '$eventlocation')");
		}
	}*/
	
	if($_POST['del']){
		foreach($_POST['delete'] as $id){
			mysql_query("DELETE FROM wp_ses WHERE id='$id'");
		}
	}
	function get_simple_event_schedule(){
		$query = mysql_query("SELECT * FROM wp_ses ORDER BY eventdate");
		if (mysql_num_rows($query)>0){
			while($row = mysql_fetch_assoc($query)){
				$events[] = $row;
			}
			
		}else{
			$events = 0;
		}
		return $events;
	}
	$events = get_simple_event_schedule();
?>

<div class="wrap">
<div id="icon-themes" class="icon32"></div><h2>Event schedule <a href="<?php echo get_settings('siteurl')."/wp-admin/admin.php?page=SimpleEventScheduleAddNew"; ?>" class="button-secondary">Add New</a></h2>
<p></p>
<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <table class="widefat tablenav-pages">
    	<thead>
    		<tr>
        		<th>Delete</th><th>Date</th><th>Time</th><th>Title</th><th>Location</th>
        	</tr>
	    </thead>
        <tfoot>
        	<tr>
        		<th>Delete</th><th>Date</th><th>Time</th><th>Title</th><th>Location</th>
        	</tr>
        </tfoot>
        <tbody>
        <?php if($events=="0"): ?>
        	<tr>
            	<td colspan="5" align="center"><h4>You have not added any event.</h4></td>
            </tr>
        <?php else: ?>
        <?php foreach($events as $event): ?>
	        <tr>
            	<td><input type="checkbox" name="delete[]" value="<?php echo $event['id'];?>" /></td><td class="eventdate"><?php echo $event['eventdate']; ?></td><td><?php echo $event['eventtime']; ?></td><td><?php echo $event['title'];?></td><td><?php echo $event['location']; ?></td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <br />
    <input type="submit" name="del" class="button-primary" value="Delete" />
</form>