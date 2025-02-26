<?php
if(trim($_POST['gAnn_id']) == "" )
{
	$sql = "insert into ".WP_G_ANNOUNCE_TABLE
			. " set `gAnn_text`='" . mysql_real_escape_string(trim($_POST['gAnn_text']))
			. "', `gAnn_order`='" . mysql_real_escape_string(trim($_POST['gAnn_order']))
			. "', `gAnn_status`='" . mysql_real_escape_string(trim($_POST['gAnn_status']))
			. "', `gAnn_expiration`='" . mysql_real_escape_string(trim($_POST['gAnn_expiration']))
			. "', `gAnn_date`=NOW();";
}
else
{
	$sql = "update ".WP_G_ANNOUNCE_TABLE
			. " set `gAnn_text`='" . mysql_real_escape_string(trim($_POST['gAnn_text']))
			. "', `gAnn_order`='" . mysql_real_escape_string(trim($_POST['gAnn_order']))
			. "', `gAnn_status`='" . mysql_real_escape_string(trim($_POST['gAnn_status']))
			. "', `gAnn_expiration`='" . mysql_real_escape_string(trim($_POST['gAnn_expiration']))
			. "', `gAnn_date`=NOW() where gAnn_id=".$_POST['gAnn_id'].";";

}
$wpdb->get_results($sql);
?>