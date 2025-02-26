<!-- Show the Edit  of flip ifram entries -->
<?php  
global $wpdb;
$table_name=$wpdb->prefix.'fliptu';
$resultEdit=$wpdb->get_results("SELECT * FROM $table_name  where 1=1 AND page_slug='HOME'");

?>

		
        	
		<div id="page1">
		<ul id="tabs">
		<li id="tab1"><a href="admin.php?page=ic_add_embed_home">Home Settings</a></li>
		<li id="tab2"><a href="admin.php?page=my-plugin-slug-items">Page Settings</a></li>

		</ul>
		</div><br /><br />
		<strong>Set your Fliptu flipstream or flipbook as your Blog home page:</strong>
		<br />
        		
		<form action="" method="post" onsubmit="return validateHomeForm()">
		<input type='hidden' name='action' value="editHomeData">
		<input type='hidden' name='id' value="<?php echo $resultEdit[0]->id; ?>">	
		<div id="ext_db_table_div"> 
		<table>
		<tr>
			<td colspan="2">Copy the <b><?php echo htmlentities("<iframe>"); ?></b> code from the Export flipstream or Export flipbook wizard you generated from the
desired paged on Fliptu.com and paste in the field below :</td> 
			
		</tr>
		<tr><td colspan="2" height=10></td></tr>
		<tr>
			
			<td colspan="2"><textarea name="fliptu_value" id="fliptu_value" cols="90" rows="5"><?php echo $resultEdit[0]->fliptu_value; ?></textarea>
			<span id="fliptu_valueError" style="display: none;color:#e35152;"></span><br>
Use this short code <b>[FLIPTU_HOME EMBED='HOME']</b> on your desired home page or post
			
			</td>
		</tr>	
		</table>
		</div></br>
		<input class="button-primary" type="submit" name="fliptuHomeEdit"  value="Edit Code"> 
		<input class="button-primary" type="button" name="backEdit" onclick="javascript:window.location='admin.php?page=my-plugin-slug'"  value="Cancel">   
		</form>	

