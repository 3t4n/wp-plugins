<?php
	if(strlen($month)==1) $month="0".$month;
	$time = $year."-".$month;
	$arr = $this->get_authors($time);
?>


<div id="periodic_report_display" style="margin:10px;">

<table style="width:50%;" class="widefat page fixed" cellspacing="0">
	<thead>
	<tr valign="top">
		<th class="manage-column column-title" scope="col" width="30%">Author</th>
		<th class="manage-column column-title" scope="col" width="30%">Posts</th>
		<th class="manage-column column-title" scope="col" width="30%">Role</th>
		<th class="manage-column column-title" scope="col">List</th>
	</tr>
	</thead>
	<tbody>

<?php
for($i=0;$i<=count($arr)-1;$i++) {
	echo "<tr>";
	echo "<td>",$arr[$i][1],"</td>";
	echo "<td>",$arr[$i][3],"</td>";
	echo "<td>",$arr[$i][2],"</td>";
	echo "<td><a href='edit.php?s&post_status=publish&post_type=post&m=".$year.$month."&author=".$arr[$i][0]."' target='_blank'>Show</a></td>";
	echo "</tr>";
}
?>

	</tbody>
	<tfoot>
	<tr valign="top">
		<th class="manage-column column-title" scope="col" width="200">Author</th>
		<th class="manage-column column-title" scope="col" width="150">Posts</th>
		<th class="manage-column column-title" scope="col" width="150">Role</th>
		<th class="manage-column column-title" scope="col">List</th>
	</tr>
	</tfoot>
</table>
    
</div>