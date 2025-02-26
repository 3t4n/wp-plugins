<?php

if($_POST['s'])
{
	switch($_POST['act'])
	{
		case "config":
			update_option("AI_rows",$_POST['AI_rows']);
			update_option("AI_cols",$_POST['AI_cols']);
			update_option("AI_defaultStatus",$_POST['AI_defaultStatus']);
			update_option("AI_adPrice",$_POST['AI_adPrice']);
			update_option("AI_sameURL",$_POST['AI_sameURL']);
			update_option("AI_rowsForSale",$_POST['AI_rowsForSale']);
			update_option("AI_salePrice",$_POST['AI_salePrice']);
			update_option("AI_emptyLink",$_POST['AI_emptyLink']);
			update_option("AI_emptySaleImg",$_POST['AI_emptySaleImg']);
			update_option("AI_emptyRentImg",$_POST['AI_emptyRentImg']);
			update_option("AI_showAll",$_POST['AI_showAll']);
		break;

	}

}

$AI_rows=get_option("AI_rows");
$AI_cols=get_option("AI_cols");
$AI_defaultStatus=get_option("AI_defaultStatus");
$AI_adPrice=get_option("AI_adPrice");
$AI_sameURL=get_option("AI_sameURL");
$AI_rowsForSale=get_option("AI_rowsForSale");
$AI_salePrice=get_option("AI_salePrice");
$AI_emptyLink=get_option("AI_emptyLink");
$AI_emptySaleImg=get_option("AI_emptySaleImg");
$AI_emptyRentImg=get_option("AI_emptyRentImg");
$AI_showAll=get_option("AI_showAll");

switch($_GET['action'])
{
	case "delete":
		$wpdb->query("delete from ".$table_prefix."adicons where id=".$_GET['id']);
	break;
	case "approve":
		$wpdb->query("update ".$table_prefix."adicons set adStatus=1,adStartDate=now() where id=".$_GET['id']);
	break;
	case "edit":
		include("adiconEdit.php");
		exit;
	break;


}

if(!$_POST['adStatus'] && !$_GET['adStatus'])
	$adStatus=0;
else{
	$adStatus=$_POST['adStatus'];
	if(!$adStatus)
	$adStatus=$_GET['adStatus'];
}
?>
<style>
	.adicon {
		border: 1px solid #c9f5c8;
	}
	#genconf {display:none;}
	#addads{display:none;}
</style>
<script>
var switchedOn='viewads';
function switchOn(divid)
{
	if(switchedOn)
	$(switchedOn).style.display='none';
	$(divid).style.display='inline';
	switchedOn=divid;
}
</script>
<script language="JavaScript" type="text/javascript" src="<?php bloginfo('wpurl');?>/wp-includes/js/prototype.js"></script>
<div class="wrap">
	<h2>AdIcon Server: <?php bloginfo('name');?> </h2>
	<a href="javascript:switchOn('genconf')">Configuration</a> | <a href="javascript:switchOn('viewads')">View AdIcons</a> | <a href="javascript:switchOn('addads')">Add New AdIcon</a><br><br>



	<div id="genconf">
	<h2>Configuration Options</h2>
	<table border=0 cellspacing=3 cellpadding=3 width="90%" align="center">
	<form action="options-general.php?page=adicons.php" method="post">

	<input type="hidden" name="act" value="config">
	<tr  valign="top">
		<td>
		<table border=0 cellspacing=2 cellpadding=0 width="90%">
		<tr valign="top">
			<td>
				<table border=0 cellspacing=1 cellpadding=0>
				<tr>
					<td><b>Rows:</b></td>
					<td><input name="AI_rows" value="<?php echo $AI_rows;?>"></td>
				</tr>
				<tr>
					<td><b>Columns:</b></td>
					<td><input name="AI_cols" value="<?php echo $AI_cols;?>"></td>
				</tr>
				<tr>
					<td><b>Default Ad Status:</b></td>
					<td><select name="AI_defaultStatus">
					<option value="0" <?php if(!$AI_defaultStatus) echo "selected";?>>Pending Approval</option>
					<option value="1" <?php if($AI_defaultStatus) echo "selected";?>>Approved</option></select></td>
				</tr>
				<tr>
					<td><b>Show All Spots:</b></td>
					<td><select name="AI_showAll">
					<option value="0" <?php if(!$AI_showAll) echo "selected";?>>Show Only The AdIcons</option>
					<option value="1" <?php if($AI_showAll) echo "selected";?>>Show All The Spots</option></select></td>
				</tr>
				<?php if(!function_exists("vcupdate")) {
					?>
					<tr>
						<td><b>Default Ad Price:</b></td>
						<td><input name="AI_adPrice" value="<?php echo $AI_adPrice;?>"></td>
					</tr>
					<?php
				}?>
				<tr valign="top">
					<td><b>Same URL Twice?</b></td>
					<td><input type="radio" value="0"  name="AI_sameURL" value="0" <?php if(!$AI_sameURL) echo "checked";?>> No<br>
					<input type="radio" value="1"  name="AI_sameURL" value="0" <?php if($AI_sameURL) echo "checked";?>> Yes</td>
				</tr>
				<tr>
					<td colspan=2 align="center"><input type="submit" name="s" value="Update Configuration"></td>
				</tr>

				</table>

			</td>
			<td>
				<table border=0 cellspacing=1 cellpadding=0>
				<tr>
					<td><b>Rows For Sale:</b></td>
					<td><input name="AI_rowsForSale" value="<?php echo $AI_rowsForSale;?>"></td>
				</tr>
				<tr>
					<td><b>Sale Price:</b></td>
					<td><input name="AI_salePrice" value="<?php echo $AI_salePrice;?>"></td>
				</tr>
				<tr>
					<td><b>Empty Link:</b></td>
					<td><input name="AI_emptyLink" value="<?php echo $AI_emptyLink;?>"></td>
				</tr>
				<tr>
					<td><b>Empty For Sale Image:</b></td>
					<td><input name="AI_emptySaleImg" value="<?php echo $AI_emptySaleImg;?>"></td>
				</tr>
				<tr>
					<td><b>Empty For Rent Image:</b></td>
					<td><input name="AI_emptyRentImg" value="<?php echo $AI_emptyRentImg;?>"></td>
				</tr>
				</table>
		</tr>
		</form></table>
		</td>
		<td align="center"><b>Here's how it looks:</b><br>
			<?php AI_Interface::adIconShow();?>
			</table>
			</td>
	</tr>
	</table>
	</div>

	<div id="viewads">
	<h2>View AdIcons</h2>
	<table border=0 cellspacing=2 cellpadding=2 width="90%" class="widefat">
	<thead>
	<tr >
		<th>
		<table border=0 cellspacing=3>
		<tr>
			<th>View:</th>
			<th><select name='adStatus' onchange="location.replace('options-general.php?page=adicons.php&adStatus='+this.options[this.selectedIndex].value);">
			<option value="0" <?php if($adStatus==0) echo "selected";?>>Pending AdIcons</option>
			<option value="1" <?php if($adStatus==1) echo "selected";?>>Online AdIcons</option>
			<option value="2" <?php if($adStatus==2) echo "selected";?>>Old AdIcons</option>
			</select></th>
		</tr></thead>
		</table>
		</th>
	</tr>
	</table>
	<table border=0 cellspacing=2 cellpadding=2 width="90%" class="widefat">
	<thead>
	<tr>
		<th width=30>ID</th>
		<th width=20>Icon</th>
		<th width=100>URL</th>
		<th width=300>Text</th>
		<th width=100>Contact</th>
		<th width=100>StartDate</th>
		<th width=50>Price</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$ads=$wpdb->get_results("select * from ".$table_prefix."adicons where adStatus=$adStatus order by adStartDate desc");
	$tok=0;
	foreach($ads as $ad)
	{
	$tok++;$tok%2?$bgc="#ffffff":$bgc="#dfdfdf";
	?>
		<tr bgcolor="<?php echo $bgc;?>">
			<td><?php echo $ad->id;?></td>
			<td><img src="<?php echo get_bloginfo('wpurl');?>/wp-content/plugins/adicons/images/<?php echo $ad->id;?>.jpg"></td>
			<td><?php echo $ad->adURL;?></td>
			<td><?php echo $ad->adText;?></td>
			<td><a href="mailto:<?php echo $ad->contactEmail;?>"><?php echo $ad->contactName;?></a>	</td>
			<td><?php echo $ad->adStartDate;?></td>
			<td><?php echo $ad->adPrice;?></td>
			<td><?php if($adStatus==0){?><a href="options-general.php?page=adicons.php&action=approve&id=<?php echo $ad->id;?>">Approve</a> | <?php }?> <a href="javascript:if(confirm('Reeaaally?')) {location.replace('options-general.php?page=adicons.php&action=delete&id=<?php echo $ad->id;?>&adStatus=<?php echo $adStatus;?>');}">Delete</a></td>

		 </tr>



	<?php

	}
	?>
	</tbody>
	</table>
	</div>
	<div id="addads">
		<h2>Add New AdIcon</h2>
		<?php AI_Interface::adIconUploadForm();?>
	</div>


</div>