<?php
function cnp_channeldetails() {

	global $wpdb;    global $cnp_channeltable_name;global $cnp_channelgrptable_name; global $cnp_settingtable_name;
	$info = isset($_REQUEST["info"]) ? sanitize_text_field(wp_unslash($_REQUEST["info"])) : '';

    $cnpresltdsply = "";
	if($info=="saved")
	{
		echo "<div class='updated' id='message'><p><strong>Form Added</strong>.</p></div>";
	}
	if($info=="failed")
	{
		echo "<div class='updated' id='message'><p><strong>Already Existed</strong>.</p></div>";
	}
	if($info=="upd")
	{
		echo "<div class='updated' id='message'><p><strong>Form updated</strong>.</p></div>";
	}
	if ($info == "del") {
  
    $delid = isset($_GET["did"]) ? intval($_GET["did"]) : 0;

    if ($delid > 0) {
  
        $deleted = $wpdb->delete(
            $cnp_channeltable_name, // Table name
            ['cnpchannel_id' => $delid], // WHERE clause
            ['%d'] // Data format (integer)
        );

        if ($deleted) {
            echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong></p></div>";
        } else {
            echo "<div class='error' id='message'><p><strong>Failed to delete the record.</strong></p></div>";
        }
    } else {
        echo "<div class='error' id='message'><p><strong>Invalid ID provided.</strong></p></div>";
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
	$cnpfrmid = isset($_REQUEST['cnpviewid']) ? sanitize_text_field(wp_unslash($_REQUEST['cnpviewid'])) : '';
$rcnpid   = isset($_REQUEST['cnpid']) ? sanitize_text_field(wp_unslash($_REQUEST['cnpid'])) : '';

$cnpresltdsply = '<div class="wrap">
                  <h2>View Channels &nbsp;&nbsp;&nbsp;</h2><p></p>
                  <table class="wp-list-table widefat" id="cnpformslist">
                  <thead>
                      <tr>
                          <th><u>ID</u></th>
                          <th><u>Channel</u></th>
                          <th><u>Start Date/Time</u></th>
                          <th><u>End Date/Time</u></th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>';

// Use a prepared SQL query for security
$sql = $wpdb->prepare(
    "SELECT * 
     FROM {$cnp_channeltable_name} 
     JOIN {$cnp_channelgrptable_name} ON cnpchannelgrp_ID = cnpchannel_cnpchannelgrp_ID 
     JOIN {$cnp_settingtable_name} ON cnpstngs_ID = cnpchannelgrp_cnpstngs_ID 
     WHERE cnpchannel_cnpchannelgrp_ID = %d 
     ORDER BY cnpchannel_id DESC",
    $cnpfrmid
);

$result = $wpdb->get_results($sql);

if (!empty($result)) {
    $sno = 1;

    foreach ($result as $cnpchannelData) {
        $id = $cnpchannelData->cnpchannel_id;
        $cnpfrmid = $cnpchannelData->cnpchannel_cnpchannelgrp_ID;
        $cname = esc_html($cnpchannelData->cnpchannel_channelName);

        $stdate = $cnpchannelData->cnpchannel_channelStartDate;
        $eddate = $cnpchannelData->cnpchannel_channelEndDate;

        $frmstdate = new DateTime($stdate);
        $frmeddate = ($eddate === "0000-00-00 00:00:00") ? null : new DateTime($eddate);


        $isexistpledgetvchannel = isexistpledgetvchannel(
            $cnpchannelData->cnpstngs_AccountNumber,
            $cnpchannelData->cnpstngs_guid,
            $cnpchannelData->cnpchannel_channelName
        );

        if ($isexistpledgetvchannel !== "no") {
            $rtrnval = explode("~", $isexistpledgetvchannel);
            $cname = esc_html($rtrnval[1]) . " (" . esc_html($cname) . ")";
        }

        $nwenddt = $frmeddate ? $frmeddate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP) : '';

        $cnpresltdsply .= '<tr>
            <td>' . esc_html($sno) . '</td>
            <td>' . $cname . '</td>
            <td>' . $frmstdate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP) . '</td>
            <td>' . esc_html($nwenddt) . '</td>
            <td nowrap>';

        if ($isexistpledgetvchannel === "no") {
            $cnpresltdsply .= '<font color="red"><strong>Channel has been deleted from Connect</strong></font>';
        } else {
            if (count($result) != 1) {
                $delete_url = esc_url(
                    add_query_arg(
                        [
                            'page' => 'cnp_channeldetails',
                            'cnpviewid' => $cnpfrmid,
                            'cnpid' => $rcnpid,
                            'info' => 'del',
                            'did' => $id,
                        ],
                        admin_url('admin.php')
                    )
                );
                $cnpresltdsply .= '<u><a href="' . $delete_url . '"><span class="dashicons dashicons-trash"></span></a></u>';
            } else {
                $cnpresltdsply .= '&nbsp;';
            }
        }

        $cnpresltdsply .= '</td></tr>';
        $sno++;
    }
} else {
    $cnpresltdsply .= '<tr><td colspan="5">No Record Found!</td></tr>';
}



		
		 $cnpresltdsply .= '</tbody></table></div><div class="dataTables_paginate" ><a href="admin.php?page=cnp_pledgetvchannelsdetails"><strong>Go back to Channels</strong></a></div>';
		 echo $cnpresltdsply ;
}
?>