<!-- Show the Edit  of flip ifram entries -->
<?php  
global $wpdb;
$resultEdit=$wpdb->get_results("SELECT * FROM $table_name where id='".$_REQUEST['id']."'");
?>

		<div class="wrap">
        	<div> <h2>Edit Embed Streams</h2></div>
       		<br />
        	</div>		
		<form action="" method="post" onsubmit="return validateAddForm()">
		<input type='hidden' name='action' value="editData">
		<input type='hidden' name='id' value="<?php echo $resultEdit[0]->id; ?>">	
		<div id="ext_db_table_div"> 
		<table>
		<!--<tr>			
			<td width="15%">Enter Page Title :</td> 
			<td><input type="text" name="fliptu_title" id="fliptu_title" value="<?php echo $resultEdit[0]->fliptu_title; ?>" size="40">
			<span id="fliptu_titleError" style="display: none;color:#e35152;">
			</td>
		</tr>-->
		<tr>
			<td colspan="2">Copy the <?php echo htmlentities("<iframe>"); ?> code from the Export flipstream or Export Export flipbook wizard you generated from the<br> desire paged on Fliptu.com and paste in the field below:</td> 
			
		</tr>
		<tr>
			
			<td colspan="2"><textarea name="fliptu_value" id="fliptu_value" cols="90" rows="5"><?php echo $resultEdit[0]->fliptu_value; ?></textarea>
			<span id="fliptu_valueError" style="display: none;color:#e35152;">
			</td>
		</tr>	
		</table>
		</div><br />
		<input class="button-primary" type="submit" name="fliptuEdit"  value="Edit Code"> 
		<input class="button-primary" type="button" name="backEdit" onclick="javascript:window.location='admin.php?page=my-plugin-slug'"  value="Cancel">   
		</form>	
