<?php
function cnp_pledgetvchannelsdetails() {

	global $wpdb;    global $cnp_channelgrptable_name;global $cnp_channeltable_name;global $cnp_settingtable_name;
	if (isset($_REQUEST["info"])) { $info = sanitize_text_field($_REQUEST["info"]); }
    $cnpresltdsply = "";
	if(isset($info) &&  $info ==="saved")
	{
		echo "<div class='updated' id='message'><p><strong>Channel Added</strong>.</p></div>";
	}
	if(isset($info) &&  $info ==="failed")
	{
		echo "<div class='updated' id='message'><p><strong>Already Existed</strong>.</p></div>";
	}
	if(isset($info) && $info ==="upd")
	{
		echo "<div class='updated' id='message'><p><strong>Channel updated</strong>.</p></div>";
	}
	if(isset($info) &&  $info ==="sts")
	{
		echo "<div class='updated' id='message'><p><strong>Status updated</strong>.</p></div>";
	}
	if (isset($info) && $info === "del") {
  
    $delid = isset($_GET['did']) ? intval($_GET['did']) : 0;

    if ($delid > 0) {
        $deleted = $wpdb->query($wpdb->prepare("DELETE FROM $cnp_channelgrptable_name WHERE cnpchannelgrp_ID = %d", $delid));
        if ($deleted) {
            echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong></p></div>";
        } else {
            echo "<div class='error' id='message'><p><strong>Error deleting record.</strong></p></div>";
        }
    } else {
        echo "<div class='error' id='message'><p><strong>Invalid ID.</strong></p></div>";
    }
}

if (isset($_GET['cnpsts']) && !empty($_GET['cnpsts'])) {

    $cnpsts = sanitize_text_field($_GET['cnpsts']);
    $cnpviewid = isset($_GET['cnpviewid']) ? intval($_GET['cnpviewid']) : 0;

    if ($cnpviewid > 0 && in_array($cnpsts, ['active', 'inactive'], true)) { 
  
        $cnpstsrtnval = CNPCF_updateCnPstatus($cnp_channelgrptable_name, 'cnpchannelgrp_status', 'cnpchannelgrp_ID', $cnpviewid, $cnpsts);

        if ($cnpstsrtnval) {
            $cnpredirectval = "sts";
        } else {
            $cnpredirectval = "stsfail";
        }

        wp_redirect("admin.php?page=cnp_pledgetvchannelsdetails&info=" . $cnpredirectval);
        exit;
    } else {
        echo "<div class='error' id='message'><p><strong>Invalid status or ID.</strong></p></div>";
    }
}


?>
<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function(){
		jQuery('#cnpformslist').dataTable();
		jQuery("tr:even").css("background-color", "#f1f1f1");
	});
	/* ]]> */

</script>
<?php
		$cnpresltdsply = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><div class="wrap">
			              <h2>pledgeTV<sup class="cnpc-regsymbol">&reg;</sup> Channels &nbsp;&nbsp;&nbsp;<a class="page-title-action add-new-h2" href="admin.php?page=cnps_addchannel&act=add">Add New Channel Group</a></h2><p></p>
			              <table class="wp-list-table widefat cnp_table_w" id="cnpformslist" ><thead><tr><th>Group Name</th><th>Account #</th><th>Short Code&nbsp;<a class="tooltip" ><i class="fa fa-question-circle"></i><span class="tooltiptext">Please copy this code and place it in your required content pages, posts or any custom content types. This code will run the series of the channels which has been added to this particular channel Group inside your content page.</span></a></th><th>Start Date/Time</th><th>End Date/Time</th><th>Active Channel(s)</th><th>Last Modified</th><th>Status</th><th>Actions</th></tr></thead><tbody>';

		$sql = $wpdb->prepare("SELECT * 
                        FROM $cnp_channelgrptable_name 
                        JOIN $cnp_settingtable_name 
                        ON cnpchannelgrp_cnpstngs_ID = cnpstngs_ID 
                        ORDER BY cnpchannelgrp_ID DESC");
$result = $wpdb->get_results($sql);

if ($wpdb->num_rows > 0) {
    foreach ($result as $cnpformData) {
        $nwenddt = "";
        $cnpform_id = $cnpformData->cnpchannelgrp_ID;
        $gname = esc_html($cnpformData->cnpchannelgrp_groupname);
        $account = esc_html($cnpformData->cnpstngs_AccountNumber);
        $frmstrtdt = $cnpformData->cnpchannelgrp_channel_StartDate;
        $frmenddt = $cnpformData->cnpchannelgrp_channel_EndDate;

        if ($frmenddt == "0000-00-00 00:00:00") {
            $frmenddt = "";
        }

        $frmshrtcode = esc_html($cnpformData->cnpchannelgrp_shortcode);
        $stdate = new DateTime($frmstrtdt);

        if ($frmenddt != "") {
            $eddate = new DateTime($frmenddt);
            $nwenddt = $eddate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP);
        }

        $mddate = new DateTime($cnpformData->cnpchannelgrp_Date_Modified);
        $frmmodifiddt = date_format(date_create($cnpformData->cnpchannelgrp_Date_Modified), "d-m-Y H:i:s");
        $frmstrtddt = date_format(date_create($cnpformData->cnpchannelgrp_channel_StartDate), "d-m-Y H:i:s");

        $frmsts = CNPCF_getfrmsts($cnp_channelgrptable_name, 'cnpchannelgrp_status', 'cnpchannelgrp_ID', $cnpform_id);

        if ($frmenddt != "" && strtotime($frmenddt) < strtotime(CFCNP_PLUGIN_CURRENTTIME)) {
            $frmsts = "Expired";
        }

        $noofchannels = CNPCF_getCountChannels($cnpform_id);

        // Build the result display
        $cnpresltdsply .= '<tr>
            <td>' . esc_html($gname) . '</td>
            <td>' . esc_html($account) . '</td>
            <td>' . esc_html($frmshrtcode) . '</td>
            <td data-sort="' . strtotime($frmstrtddt) . '">' . $stdate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP) . '</td>
            <td>' . $nwenddt . '</td>
            <td align="center">' . esc_html($noofchannels) . '</td>
            <td data-sort="' . strtotime($frmmodifiddt) . '">' . $mddate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP) . '</td>
            <td><a href="admin.php?page=cnp_pledgetvchannelsdetails&cnpsts=' . esc_attr($frmsts) . '&cnpviewid=' . esc_attr($cnpform_id) . '">' . esc_html($frmsts) . '</a></td>
            <td>
                <a href="admin.php?page=cnp_channeldetails&cnpviewid=' . esc_attr($cnpform_id) . '"><span class="dashicons dashicons-visibility"></span></a> |
                <a href="admin.php?page=cnps_addchannel&act=edit&cnpviewid=' . esc_attr($cnpform_id) . '"><span class="dashicons dashicons-edit"></span></a> |
                <a href="admin.php?page=cnp_pledgetvchannelsdetails&info=del&did=' . esc_attr($cnpform_id) . '"><span class="dashicons dashicons-trash"></span></a>
            </td>
        </tr>';
    }
} else {
    $cnpresltdsply .= '<tr><td colspan="7">No Record Found!</td></tr>';
}

		
		 $cnpresltdsply .= '</tbody></table></div>';
		 echo $cnpresltdsply ;
}
?>