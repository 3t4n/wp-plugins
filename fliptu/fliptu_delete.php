<!-- Show the Edit  of flip ifram entries -->
<?php  
global $wpdb;
global $wp_roles;
$getData= @explode('&',base64_decode($_REQUEST['_wpnonce']));
$getValue=@explode('=',$getData[0].'='.$getData[1]);

foreach ( $wp_roles->role_names as $role => $name ) :
if ( current_user_can( $role ) )
$roles= $role;
endforeach;
if ($roles=='administrator')
{

$resultEdit=$wpdb->get_results("SELECT * FROM $table_name where id='".$_REQUEST['id']."'");
?>

		<form action="admin.php?page=my-plugin-slug" method="post">
		<input type='hidden' name='action' value="deleteData">
		<input type='hidden' name='id' value="<?php echo $getValue[1]; ?>">
		<input type='hidden' name='page_id' value="<?php echo $getValue[3]; ?>">
		<div>Are you sure to delete this flip entry ?</div>	
		<input class="button-secondary action" type="submit" name="fliptuDelete"  value="Yes"> 
		<input class="button-secondary action" type="button" name="backEdit" onclick="javascript:window.location='admin.php?page=my-plugin-slug'"  value="No">   
		</form>	

<?php }else{ ?>

<div>Sorry ! You do not have permission to delete.</div>	
<input class="button-secondary action" type="button" name="backEdit" onclick="javascript:window.location='<?php echo site_url() ?>'"  value="Cancel"> 
<?php } 

?>
