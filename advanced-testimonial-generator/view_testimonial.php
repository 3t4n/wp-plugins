<?php $url = admin_url(); ?>
<?php 
if(isset($_GET['id']))	{
	global $wpdb;
	$id = $_GET["id"];
	$wpdb->query("DELETE FROM wp_testimonial WHERE ID =$id");
	 echo '<script>location.href="'.$url.'?page=top-level-testimonial";</script>';
	}
?>

<?php 


function atg_view_testimonial() {?>

<table border="1" width="50%">
<h1>Feedback from clients:</h1>
<tr>
<th style="color:red;font-weight:normal;font-size:15px;">#</th>
<th style="color:red;font-weight:normal;font-size:15px;">Name</th>
<th style="color:red;font-weight:normal;font-size:15px;">Feedback</th>
<th style="color:red;font-weight:normal;font-size:15px;">Action</th>
</tr>
<?php 
global $wpdb;
$rows = $wpdb->get_results( "SELECT * FROM wp_testimonial");
$serial=1;
foreach($rows as $row){ ?>
<tr align="center">
<td><?php echo $serial++;?></td>
<td><?php echo $row->name;?></td>
<td><?php echo $row->detail;?></td>
<?php $url = admin_url(); ?>

<td><a href="<?php echo $url;?>?id=<?php echo $row->id;?>" onload="<?php //delete_data_func(); ?>" onclick="return confirm('sure?')" value=" Delete Data "> delete</a></td>
<?php } ?>

</tr>
</table>

<?php } ?>