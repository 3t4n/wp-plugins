<?php
function cnp_formsdetails() {

	global $wpdb;    global $cnp_settingtable_name;global $cnp_table_name;
	if (isset($_REQUEST["info"])) {
    $info = sanitize_text_field($_REQUEST["info"]);
}
    $cnpresltdsply = "";
if (isset($info) && $info === "saved") {	
		echo "<div class='updated' id='message'><p><strong>Form Added</strong>.</p></div>";
	}
	if(isset($info) && $info === "failed")
	{
		echo "<div class='updated' id='message'><p><strong>Already Existed</strong>.</p></div>";
	}
	if(isset($info) && $info ==="upd")
	{
		echo "<div class='updated' id='message'><p><strong>Form updated</strong>.</p></div>";
	}
	if(isset($info) && $info ==="sts")
	{
		echo "<div class='updated' id='message'><p><strong>Status updated</strong>.</p></div>";
	}
	if (isset($info) && $info === "del") {
  
    $delid = isset($_GET["did"]) ? absint($_GET["did"]) : 0;

    if ($delid > 0) {
       
        $wpdb->query($wpdb->prepare("DELETE FROM {$cnp_table_name} WHERE cnpform_ID = %d", $delid));
        echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong></p></div>";
    } else {
        echo "<div class='error' id='message'><p><strong>Invalid ID for deletion.</strong></p></div>";
    }
}

if (isset($_GET['cnpsts']) && $_GET['cnpsts'] != "") {
  
    $cnpsts = sanitize_text_field($_GET['cnpsts']);
    $cnpviewid = absint($_GET['cnpviewid']);

    if ($cnpviewid > 0 && !empty($cnpsts)) {
           $cnpstsrtnval = CNPCF_updateCnPstatus($cnp_table_name, 'cnpform_status', 'cnpform_ID', $cnpviewid, $cnpsts);
        if ($cnpstsrtnval === true) {
            $cnpredirectval = "sts";  
        } else {
            $cnpredirectval = "stsfail";  
        }
        wp_redirect("admin.php?page=cnp_formsdetails&info=" . $cnpredirectval);
        exit;
    } else {
         wp_redirect("admin.php?page=cnp_formsdetails&info=invalid");
        exit;
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
			              <h2>Click & Pledge CONNECT Forms &nbsp;&nbsp;&nbsp;<a class="page-title-action add-new-h2" href="admin.php?page=cnpforms_add&act=add">Add New Form Group</a></h2><p></p>
			              <div class="cnp_scrollable_x">
						  <table style="width:99%;" class="wp-list-table widefat cnp_table_w" id="cnpformslist" ><thead><tr><th>Group Name</th><th>Account #</th><th>Type</th><th>Short Code&nbsp;<a class="tooltip" ><i class="fa fa-question-circle"></i><span class="tooltiptext">Please copy this code and place it in your required content pages, posts or any custom content types. This code will run the series of the forms which has been added to this particular Form Group inside your content page.</span></a></th><th>Start Date/Time</th><th>End Date/Time</th><th>Active Form(s)</th><th>Last Modified</th><th>Status</th><th>Actions</th></tr></thead><tbody>';

		

$sql = "SELECT * 
        FROM {$cnp_table_name} 
        JOIN {$cnp_settingtable_name} 
        ON cnpform_cnpstngs_ID = cnpstngs_ID 
        ORDER BY cnpform_Date_Modified DESC";

$result = $wpdb->get_results($sql);
if ($wpdb->num_rows > 0) {
    foreach ($result as $cnpformData) {
        $nwenddt = "";
        $cnpform_id = $cnpformData->cnpform_ID;
        $gname = esc_html($cnpformData->cnpform_groupname); 
        $account = esc_html($cnpformData->cnpstngs_AccountNumber); 
        $frmstrtdt = $cnpformData->cnpform_Form_StartDate;
        $frmenddt = $cnpformData->cnpform_Form_EndDate;
        if ($frmenddt == "0000-00-00 00:00:00") {
            $frmenddt = "";
        }
        $frmtype = $cnpformData->cnpform_type;
        if ($frmtype == "popup") {
            $frmtype = "Overlay";
        }
        if ($frmtype == "inline") {
            $frmtype = "Inline";
        }
        $frmshrtcode = esc_html($cnpformData->cnpform_shortcode); 
        $stdate = new DateTime($frmstrtdt);
        if ($frmenddt != "") {
            $eddate = new DateTime($frmenddt);
            $nwenddt = $eddate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP);
        }
        $mddate = new DateTime($cnpformData->cnpform_Date_Modified);
        $frmmodifiddt = date_format(date_create($cnpformData->cnpform_Date_Modified), "d-m-Y H:i:s");

       
        $frmsts = CNPCF_getfrmsts($cnp_table_name, 'cnpform_status', 'cnpform_ID', $cnpform_id);
        if ($frmenddt != "" && strtotime($frmenddt) < strtotime(CFCNP_PLUGIN_CURRENTTIME)) {
            $frmsts = "Expired";
        }

       
        $noofforms = CNPCF_getCountForms($cnpform_id);

      
        $cnpresltdsply .= '<tr>
                            <td>' . esc_html($gname) . '</td>
                            <td>' . esc_html($account) . '</td>
                            <td>' . esc_html($frmtype) . '</td>
                            <td>' . esc_html($frmshrtcode) . '</td>
                            <td>' . $stdate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP) . '</td>
                            <td>' . ($nwenddt ?: '&ndash;') . '</td>
                            <td>' . esc_html($noofforms) . '</td>
                            <td data-sort="' . strtotime($frmmodifiddt) . '">' . $mddate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP) . '</td>
                            <td><a href="admin.php?page=cnp_formsdetails&cnpsts=' . esc_attr($frmsts) . '&cnpviewid=' . esc_attr($cnpform_id) . '">' . esc_html($frmsts) . '</a></td>
                            <td>
                                <a href="admin.php?page=cnp_formdetails&cnpviewid=' . esc_attr($cnpform_id) . '">
                                    <span class="dashicons dashicons-visibility"></span>
                                </a> |
                                <a href="admin.php?page=cnpforms_add&act=edit&cnpviewid=' . esc_attr($cnpform_id) . '">
                                    <span class="dashicons dashicons-edit"></span>
                                </a> |
                                <a href="admin.php?page=cnp_formsdetails&info=del&did=' . esc_attr($cnpform_id) . '">
                                    <span class="dashicons dashicons-trash"></span>
                                </a>
                            </td>
                        </tr>';
    }
} else {
    $cnpresltdsply .= '<tr><td colspan="9">No Record Found!</td></tr>';
}

$cnpresltdsply .= '</tbody></table></div></div>';
echo $cnpresltdsply;

}
?>