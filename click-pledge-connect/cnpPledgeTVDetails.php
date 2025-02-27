<?php
function cnp_pledgetvformdetails() {

	global $wpdb;    global $cnp_settingtable_name;global $cnp_table_name;
	$info          = $_REQUEST["info"];
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
	if($info=="sts")
	{
		echo "<div class='updated' id='message'><p><strong>Status updated</strong>.</p></div>";
	}
	if ($info == "del") {
  
    $delid = isset($_GET['did']) ? intval($_GET['did']) : 0;

    if ($delid > 0) {
      
        $wpdb->query($wpdb->prepare("DELETE FROM $cnp_table_name WHERE cnpform_ID = %d", $delid));
        
        echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong></p></div>";
    } else {
        echo "<div class='error' id='message'><p><strong>Invalid ID.</strong></p></div>";
    }
}

if (isset($_GET['cnpsts']) && $_GET['cnpsts'] != "") {
  
    $cnpsts = sanitize_text_field($_GET['cnpsts']);
    $cnpviewid = isset($_GET['cnpviewid']) ? intval($_GET['cnpviewid']) : 0;

    if ($cnpviewid > 0 && in_array($cnpsts, ['active', 'inactive'], true)) { 
    
        $cnpstsrtnval = CNPCF_updateCnPstatus($cnp_table_name, 'cnpform_status', 'cnpform_ID', $cnpviewid, $cnpsts);
        
        if ($cnpstsrtnval) {
            $cnpredirectval = "sts";
        } else {
            $cnpredirectval = "stsfail";
        }

        wp_redirect("admin.php?page=cnp_formsdetails&info=" . $cnpredirectval);
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
			              <h2>Latest Channels</h2><p></p>
			              <table class="wp-list-table widefat  " id="cnpformslist" ><thead><tr><th><u>Channel ID</u></th><th><u>Channel Name</u></th><th><u>Raised</u></th><th><u>Plays</u></th></tr></thead><tbody>';

				$cnpresltdsply .= '<tr><td colspan=4>No Record Found!</td></tr>';
		
		 $cnpresltdsply .= '</tbody></table></div>';
		 echo $cnpresltdsply ;
	
	$cnpresltdsply = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><div class="wrap">
			              <h2>Latest Pledge Videos</h2><p></p>
			              <table class="wp-list-table widefat  " id="cnpformslist" ><thead><tr><th><u>Name</u></th><th><u>Raised</u></th><th><u>Plays</u></th></tr></thead><tbody>';

				$cnpresltdsply .= '<tr><td colspan=3>No Record Found!</td></tr>';
			
		
		 $cnpresltdsply .= '</tbody></table></div>';
		 echo $cnpresltdsply ;
}
?>