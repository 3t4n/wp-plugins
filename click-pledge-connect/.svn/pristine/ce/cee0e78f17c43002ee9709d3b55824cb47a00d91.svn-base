<?php
function cnp_formssettings() {

	global $wpdb;    global $cnp_settingtable_name;
	$info = isset($_REQUEST["info"]) ? sanitize_text_field($_REQUEST["info"]) : '';
    $cnpresltdsply = "";$hidval	   = 1;$cnpbtn = "Save";
$cnpsetid ="";$cnpsetAccountNumber="";$cnpsetguid="";$cnpsetfrndlynm="";


	if($info=="saved")
	{
		echo "<div class='updated' id='message'><p><strong>Account Added</strong>.</p></div>";
	}
	if($info=="failed")
	{
		echo "<div class='updated' id='message'><p><strong>Please check the account details is correct or not (or) with this account id campaigns are not added.</strong>.</p></div>";
	}
	if($info=="exist")
	{
		echo "<div class='updated' id='message'><p><strong> Friendly Name or Account Number already exist.</strong>.</p></div>";
	}
	if($info=="upd")
	{
		echo "<div class='updated' id='message'><p><strong>Account updated</strong>.</p></div>";
	}

	if ($info == "del") {
     $delid = isset($_GET["did"]) ? intval($_GET["did"]) : 0;

    if ($delid > 0) {
        // Retrieve associated forms and channels info
        $cnpnoofforms = CNPCF_getAccountNumbersInfo($delid);
        $cnpnoofchnls = CNPCF_getchnlAccountNumbersInfo($delid);

        // Check if there are no associated forms or channels
        if ($cnpnoofforms == 0 && $cnpnoofchnls == 0) {
            $result = $wpdb->delete(
                $cnp_settingtable_name,
                ['cnpstngs_ID' => $delid],
                ['%d'] 
            );

            if ($result !== false) {
                echo "<div class='updated' id='message'><p><strong>Record Deleted.</strong></p></div>";
            } else {
                echo "<div class='error' id='message'><p><strong>Error: Unable to delete the record.</strong></p></div>";
            }
        } else {
            echo "<div class='updated' id='message'><p><strong>This Account Number is associated with an existing form group or channel group. You must first delete the form group or channel group before deleting this account.</strong></p></div>";
        }
    } else {
        echo "<div class='error' id='message'><p><strong>Error: Invalid ID provided.</strong></p></div>";
    }
}
	if (isset($_POST["cnpbtnaddsettings"])) {
    $addform = isset($_POST["addformval"]) ? intval($_POST["addformval"]) : 0;
    global $wpdb;
    global $cnp_table_name;

    if ($addform == 1) {
        $cnprtnval = CNPCF_addSettings($cnp_table_name, $_POST);

        if ($cnprtnval >= 1) {
            $cnpredirectval = "saved";
        } elseif ($cnprtnval == "0") {
            $cnpredirectval = "failed";
        } elseif ($cnprtnval == "error") {
            $cnpredirectval = "exist";
        } else {
            $cnpredirectval = "failed";
        }
        wp_redirect(admin_url("admin.php?page=cnp_formssettings&info=" . $cnpredirectval));
        exit;
    } elseif ($addform == 2) {
        $cnprtnval = CNPCF_updateSettings($cnp_table_name, $_POST);

        if ($cnprtnval >= 1) {
            $cnpredirectval = "upd";
        } else {
            $cnpredirectval = "failed";
        }
        wp_redirect(admin_url("admin.php?page=cnp_formssettings&info=" . $cnpredirectval));
        exit;
    }
}

$act = isset($_REQUEST["cnpviewid"]) ? sanitize_text_field($_REQUEST["cnpviewid"]) : '';

if (!empty($act)) {
    global $wpdb;
    global $cnp_settingtable_name;

    $cnpfrmdtresult = CNPCF_GetCnPGroupDetails($cnp_settingtable_name, 'cnpstngs_ID', intval($act));
    
    if (!empty($cnpfrmdtresult)) {
        $cnprtnval = $cnpfrmdtresult[0];

        if (!empty($cnprtnval)) {
            $cnpsetid = $cnprtnval->cnpstngs_ID;
            $cnpsetfrndlynm = $cnprtnval->cnpstngs_frndlyname;
            $cnpsetAccountNumber = $cnprtnval->cnpstngs_AccountNumber;
            $cnpsetguid = $cnprtnval->cnpstngs_guid;
            $cnpbtn = "Update";
            $hidval = 2;
        }
    }
}

?>
<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function(){
		jQuery('#cnpsettingslist').dataTable();
		jQuery("tr:even").css("background-color", "#f1f1f1");
	});
	/* ]]> */

</script>
<?php

if (isset($_REQUEST["act"])) {
    $cnpfrmtyp = wp_unslash(sanitize_text_field($_REQUEST["act"]));
} else {
    $cnpfrmtyp = ''; // Default value
   
}

	if($cnpfrmtyp == "edit"){$msgdsplycntnt = "style ='display:block'";}else{$msgdsplycntnt = "style ='display:none'";}
	if($cnpfrmtyp == "edit"){ $msgdbtnsplycntnt = "style ='display:none'";}else{$msgdbtnsplycntnt = "style ='float:left;display:block'";}

	$cnpresltdsply = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><div class="wrap">
	<h2>Click & Pledge Account &nbsp;</h2>
	<div id="col-left" style="width:48% !important; float:none;">
	<div class="col-wrap">
		<div>
			<div class="form-wrap">
			 <table class="form-table" id="cnpformslist" align="center" >

			 <tr><td>
			 <div>	<h2>Add New Account</h2>	</div>
				<form class="validate"  method="post" id="addsettings" name="addsettings">
				<input type="hidden" name="cnphdnediturl" id="cnphdnediturl" value="'.CNP_CF_PLUGIN_URL.'getcnpditactivecampaigns.php">
				<input type="hidden" name="cnphdnerrurl" id="cnphdnerrurl" value="'.CNP_CF_PLUGIN_URL.'cnpSettingmsgs.php">
				<input type="hidden" name="addformval" id="addformval" value='.$hidval.'>
				<input type="hidden" name="hdnfrmid" id="hdnfrmid" value="'.$cnpsetid .'">

				<div class="form-field cnpaccountId">
				<label for="tag-name"> <b>Click & Pledge Account Number*</b></label>
				<input type="text" size="10" id="txtcnpacntid" name="txtcnpacntid"  value="'.$cnpsetAccountNumber.'" />
				<p style="font-size:12px;">Get your "Account Number" from Click & Pledge<br>
[CONNECT > Launcher > Settings > API Information > Account ID]</p>
				<span class=cnperror id="spncnpacntid"></span>
				</div>

					<div class="form-field cnpacntguid">
						<label for="tag-name"> <b>Click & Pledge Account GUID*</b></label>
						<input type="text" size="20" id="txtcnpacntguid" name="txtcnpacntguid" value="'.$cnpsetguid.'" /><div class="tooltip" >
						<i class="fa fa-question-circle"></i>
						<span class="tooltiptext">Please collect the Account GUID from your CONNECT Portal or for More Help <a href="https://support.clickandpledge.com/s/article/how-to-locate-account-id--api-account-guid" target="_blank">click here</a></span>
						</div>
						<p style="font-size:12px;">Get your "Account GUID" from Click & Pledge<br>
 [CONNECT > Launcher > Settings > API Information > API (PaaS / FaaS): Account GUID]</p>
					</div>
						<div '.$msgdbtnsplycntnt.'>
						 <input type="button" name="cnpbtnverifysettings" id="cnpbtnverifysettings" value="Verify" class="button button-primary"><br>
						
						 </div>
						 	<div class="frmaddnickdiv" '.$msgdsplycntnt.'>
					<div class="form-field cnpfrmfrndlynm" >
					<label for="tag-name">Nickname*</label>
					<input type="text" size="20" id="txtcnpfrmfrndlynm" name="txtcnpfrmfrndlynm" value="'.$cnpsetfrndlynm.'" onkeypress="return AvoidSpace(event)"/>
					<span class=cnperror id="spnfrndlynm"></span>
					</div>

						 <div style="float:left">
						 <input type="submit" name="cnpbtnaddsettings" id="cnpbtnaddsettings" value="'.$cnpbtn.'" class="button button-primary">
						 </div>
</div>
						 </form>
						 </tr></td></table>
						
						 </div>
						 </div>
						 </div>
						 </div>
						 <div > <div style="float:left" width="100%"><span class="cnperror" id="spnverify" style="display:none"><p>Communication Error:</p>
 
<p>Sorry but I am having difficulty communicating with the Click & Pledge services due to the absence of the SOAP extension in your WordPress installation.  The following links may help in resolving this issue:</p>
 
<p>Complete details page: <a href ="http://php.net/manual/en/book.soap.php" target="_blank">http://php.net/manual/en/book.soap.php</a></p>
<p>Installing SOAP for PHP: <a href ="http://php.net/manual/en/soap.installation.php" target="_blank">http://php.net/manual/en/soap.installation.php</a></p>
<p>Configuring after installation: <a href ="http://php.net/manual/en/soap.configuration.php" target="_blank">http://php.net/manual/en/soap.configuration.php</a></p>
 
<p>You may need to contact your server administrator for installation of the SOAP extension on the server.<p></span></div>
	<div class="col-wrap">
		<div>
			<div class="cnp_scrollable_x">
			              <table style="width:99%;" class="wp-list-table widefat" id="cnpsettingslist" ><thead><tr><th>Nickname </th><th>Account Number</th><th>GUID</th><th>Created Date/Time</th><th>Actions</th></tr></thead><tbody>';

	$sql = "SELECT * FROM $cnp_settingtable_name ORDER BY cnpstngs_ID DESC";
$result = $wpdb->get_results($sql);

if ($wpdb->num_rows > 0) {
    foreach ($result as $cnpsettingsData) {
        $cnpform_id = intval($cnpsettingsData->cnpstngs_ID);
        $gname = esc_html($cnpsettingsData->cnpstngs_frndlyname);
        $account = esc_html($cnpsettingsData->cnpstngs_AccountNumber);
        $accountguid = esc_html($cnpsettingsData->cnpstngs_guid);
        $frmmodifieddt = new DateTime($cnpsettingsData->cnpstngs_Date_Modified);
        $frmmodifiddt = $frmmodifieddt->format('d-m-Y H:i:s');

        $cnpresltdsply .= '<tr>';
        $cnpresltdsply .= '<td>' . $gname . '</td>';
        $cnpresltdsply .= '<td>' . $account . '</td>';
        $cnpresltdsply .= '<td>' . $accountguid . '</td>';
        $cnpresltdsply .= '<td data-sort="' . $frmmodifieddt->getTimestamp() . '">' . esc_html($frmmodifieddt->format(CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP)) . '</td>';
        $cnpresltdsply .= '<td>';
        $cnpresltdsply .= '<input type="hidden" name="hdnsetngsid' . $cnpform_id . '" id="hdnsetngsid' . $cnpform_id . '" value="' . $cnpform_id . '">';
        $cnpresltdsply .= '<input type="hidden" name="hdncnpaccntid' . $cnpform_id . '" id="hdncnpaccntid' . $cnpform_id . '" value="' . $account . '">';
        $cnpresltdsply .= '<input type="hidden" name="hdncnpguid' . $cnpform_id . '" id="hdncnpguid' . $cnpform_id . '" value="' . $accountguid . '">';
        $cnpresltdsply .= '<input type="hidden" name="hdncnptblname" id="hdncnptblname" value="' . esc_attr($cnp_settingtable_name) . '">';
        $cnpresltdsply .= '<a href="#" id="myHref" onclick="return mycnpaccountId(' . $cnpform_id . ')"><span class="dashicons dashicons-update"></span></a> | ';
        $cnpresltdsply .= '<a href="' . esc_url(admin_url("admin.php?page=cnp_formssettings&info=del&did=$cnpform_id")) . '"><span class="dashicons dashicons-trash"></span></a>';
        $cnpresltdsply .= '</td>';
        $cnpresltdsply .= '</tr>';
    }
} else {
    $cnpresltdsply .= '<tr><td colspan="5">No Record Found!</td></tr>';
}

$cnpresltdsply .= '</tbody></table></div>';
echo $cnpresltdsply;

}
?>
