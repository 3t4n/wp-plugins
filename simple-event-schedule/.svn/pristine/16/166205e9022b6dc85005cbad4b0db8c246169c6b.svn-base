<?php
	if($_POST['add']){
		$error = 0;
		if($_POST['title']==""||$_POST['day']==""||$_POST['month']==""||$_POST['year']==""||$_POST['sh']==""||$_POST['sm']==""||$_POST['eh']==""||$_POST['em']==""){
			$error = 1;
		}else{
			$eventdate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
			$eventtime = $_POST['sh'].':'.$_POST['sm'].' - '.$_POST['eh'].':'.$_POST['em'];
			$eventtitle = $_POST['title'];
			$eventlocation = $_POST['location'];
			
			mysql_query("INSERT INTO wp_ses (title, eventdate, eventtime, location) VALUES ('$eventtitle','$eventdate', '$eventtime', '$eventlocation')");
			echo "<span class=\"wp-caption\">added</span>";
			$updated = 1;
		}
	}
	
	/*if($_POST['del']){
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
	$events = get_simple_event_schedule();*/
?>

<div class="wrap">
<div id="icon-themes" class="icon32"></div><h2>Event schedule</h2>

    <h2>Add an event</h2>
    <br />
    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <ul>
	        <li><label for="title">Title<span> *</span>: </label>
            <input type="text" id="title" name="title" value="" /></li>    
            
            <li><label for="eventdate">Date<span> *</span>: </label>
            day<input type="text" id="day" name="day" maxlength="2" size="2" value="" /> month<input type="text" id="month" name="month" maxlength="2" size="2" value="" /> year<input type="text" id="year" name="year" maxlength="4" size="4" value="" /></li>
     
            <li><label for="starttime">Time<span> *</span>: </label>
            <input type="text" id="sh" name="sh" maxlength="2" size="2" value="" />:<input type="text" id="sm" name="sm" maxlength="2" size="2" value="" /> ~ <input type="text" id="eh" name="eh" maxlength="2" size="2" value="" />:<input type="text" id="em" name="em" maxlength="2" size="2" value="" /></li>

            <li><label for="location">Location: </label>
			<input type="text" id="location" name="location" size="50" value="" /></li>
			</li>
        </ul>
        <br />
        <input type="submit" name="add" class="button-primary" value="Add"/>
    </form>
    <?php if($updated): ?>
    <div class="updated">Event added to <a href="<?php echo get_settings('siteurl')."/wp-admin/admin.php?page=SimpleEventSchedule"; ?>">here</a></div>
    <?php endif; ?>
</div>