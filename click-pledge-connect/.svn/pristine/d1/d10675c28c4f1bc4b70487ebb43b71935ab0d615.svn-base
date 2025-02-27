<?php
function cnp_formdetails() {

	global $wpdb;    global $cnp_formtable_name;

	if (isset($_REQUEST["info"])) {
    	$info = sanitize_text_field($_REQUEST["info"]);
	}   

	$cnpresltdsply = "";
	if(isset($info) && $info ==="saved")
	{
		echo "<div class='updated' id='message'><p><strong>Form Added</strong>.</p></div>";
	}
	if(isset($info) && $info ==="failed")
	{
		echo "<div class='updated' id='message'><p><strong>Already Existed</strong>.</p></div>";
	}
	if(isset($info) && $info ==="upd")
	{
		echo "<div class='updated' id='message'><p><strong>Form updated</strong>.</p></div>";
	}
	
	if (isset($info) && $info === "del") {
  
    $delid = isset($_GET['did']) ? absint($_GET['did']) : 0;  

    if ($delid > 0) {
        global $wpdb;
        global $cnp_formtable_name;

        $wpdb->query(
            $wpdb->prepare("DELETE FROM {$cnp_formtable_name} WHERE cnpform_ID = %d", $delid)
        );

        
        if ($wpdb->rows_affected > 0) {
            echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong></p></div>";
        } else {
            echo "<div class='error' id='message'><p><strong>No record found to delete.</strong></p></div>";
        }
    } else {
        echo "<div class='error' id='message'><p><strong>Invalid record ID.</strong></p></div>";
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
		

$cnpfrmid = isset($_REQUEST['cnpviewid']) ? absint($_REQUEST['cnpviewid']) : 0;
$rcnpid   = isset($_REQUEST['cnpid']) ? absint($_REQUEST['cnpid']) : 0;

if ($cnpfrmid > 0 ) { 
    global $wpdb;
    global $cnp_formtable_name;

    $cnpresltdsply = '<div class="wrap">
                      <h2>View Forms &nbsp;&nbsp;&nbsp;</h2><p></p>
                      <table class="wp-list-table widefat" id="cnpformslist">
                      <thead><tr><th><u>ID</u></th><th><u>Campaign Name</u></th><th><u>Form Name</u></th><th><u>GUID</u></th><th><u>Start Date/Time</u></th><th><u>End Date/Time</u></th><th></th></tr></thead><tbody>';

    // Prepare the query to avoid SQL injection
    $sql = $wpdb->prepare(
        "SELECT * FROM {$cnp_formtable_name} WHERE cnpform_cnpform_ID = %d ORDER BY cnpform_id DESC",
        $cnpfrmid
    );
    $result = $wpdb->get_results($sql);

    if ($wpdb->num_rows > 0) {
        $sno = 1;
        foreach ($result as $cnpformData) {
            $id             = $cnpformData->cnpform_id;
            $cnpfrmid       = $cnpformData->cnpform_cnpform_ID;
            $cname          = sanitize_text_field($cnpformData->cnpform_CampaignName);
            $fname          = sanitize_text_field($cnpformData->cnpform_FormName);
            $guid           = sanitize_text_field($cnpformData->cnpform_GUID);
            $stdate         = $cnpformData->cnpform_FormStartDate;
            $eddate         = $cnpformData->cnpform_FormEndDate;

          
            $frmstdate = new DateTime($stdate);
            $nwenddt = "";
            if ($eddate != "0000-00-00 00:00:00") {
                $eddate = new DateTime($eddate);
                $nwenddt = $eddate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP);
            }

            $cnpresltdsply .= '<tr><td>' . $sno . '</td>
                               <td>' . $cname . '</td>
                               <td>' . $fname . '</td>
                               <td>' . $guid . '</td>
                               <td>' . $frmstdate->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP) . '</td>
                               <td>' . $nwenddt . '</td>
                               <td nowrap><u>';

            if (count($result) != 1) {
                $cnpresltdsply .= '<a href="admin.php?page=cnp_formdetails&cnpviewid=' . $cnpfrmid . '&cnpid=' . $rcnpid . '&info=del&did=' . $id . '">
                                    <span class="dashicons dashicons-trash"></span></a></u>';
            } else {
                $cnpresltdsply .= '&nbsp;';
            }

            $cnpresltdsply .= '</td></tr>';
            $sno++;
        }
    } else {
        $cnpresltdsply .= '<tr><td colspan="7">No Record Found!</td></tr>';
    }

    $cnpresltdsply .= '</tbody></table></div><div class="dataTables_paginate">
                       <a href="admin.php?page=cnp_formsdetails"><strong>Go back to Form Groups</strong></a></div>';
    echo $cnpresltdsply;
} else {
    echo '<div class="error"><p><strong>Invalid request parameters!</strong></p></div>';
}

}
?>