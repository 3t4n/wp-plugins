<?php

function CNPCF_getImageTextButton($guid,$cnptyp,$cnptxt)
{
global $wpdb; 	
global $cnp_table_name;
global $cnp_formtable_name;
global $cnprtrnstr;

$cnpGetImagesql = $wpdb->prepare(
    "SELECT * FROM $cnp_table_name WHERE cnpform_groupname = %s AND cnpform_ptype = %s",
    $guid,
    $cnptxt
);


$cnpimgresult = $wpdb->get_results($cnpGetImagesql);

if (!empty($cnpimgresult)) {
    foreach ($cnpimgresult as $cnpimgresultsarr) { 
     
        switch ($cnptxt) {
            case 'text':
            case 'button':
                $cnprtrnstr = $cnpimgresultsarr->cnpform_text;
                break;
            case 'image':
                $cnprtrnstr = $cnpimgresultsarr->cnpform_img;
                break;
            default:
                $cnprtrnstr = null; 
        }
    }
}

return $cnprtrnstr;

}
function CNPCF_isExistShortcode($cnpshortcode)
{
global $wpdb; 	
global $cnp_table_name;
global $cnprtrnstr;

$currentdate = CFCNP_PLUGIN_CURRENTTIME;

$cnpGetImagesql = $wpdb->prepare(
    "SELECT * FROM $cnp_table_name 
     WHERE 
         (cnpform_shortcode = %s OR cnpform_shortcode = %s) 
         AND cnpform_status = 1 
         AND (
             (cnpform_Form_EndDate != '0000-00-00 00:00:00' 
                 AND %s BETWEEN cnpform_Form_StartDate AND cnpform_Form_EndDate) 
             OR 
             (cnpform_Form_EndDate = '0000-00-00 00:00:00' 
                 AND cnpform_Form_StartDate <= %s)
         ) 
     ORDER BY cnpform_Date_Modified ASC 
     LIMIT 1",
    '[CnPConnect ' . $cnpshortcode . ']',
    '[CnP.Form ' . $cnpshortcode . ']',
    $currentdate,
    $currentdate
);


$cnpimgresult = $wpdb->get_results($cnpGetImagesql);


return !empty($cnpimgresult);


}
function CNPCF_isExistchannelShortcode($cnpshortcode)
{
	global $wpdb; 	
global $cnp_channelgrptable_name;
global $cnprtrnstr;

$currentdate = CFCNP_PLUGIN_CURRENTTIME;


$cnpGetImagesql = $wpdb->prepare(
    "SELECT * FROM $cnp_channelgrptable_name 
     WHERE 
         cnpchannelgrp_shortcode = %s 
         AND cnpchannelgrp_status = 1 
         AND (
             (cnpchannelgrp_channel_EndDate != '0000-00-00 00:00:00' 
                 AND %s BETWEEN cnpchannelgrp_channel_StartDate AND cnpchannelgrp_channel_EndDate) 
             OR 
             (cnpchannelgrp_channel_EndDate = '0000-00-00 00:00:00' 
                 AND cnpchannelgrp_channel_StartDate <= %s)
         ) 
     ORDER BY cnpchannelgrp_Date_Modified ASC 
     LIMIT 1",
    '[CnP.pledgeTV ' . $cnpshortcode . ']',
    $currentdate,
    $currentdate
);

$cnpimgresult = $wpdb->get_results($cnpGetImagesql);

return !empty($cnpimgresult);


}
function CNPCF_getGroupCustomerrmsg($cnpshortcode)
{
global $wpdb; 	
global $cnp_table_name;
global $cnprtrnstr;


$cnpGetImagesql = $wpdb->prepare(
    "SELECT cnpform_custommsg 
     FROM $cnp_table_name 
     WHERE cnpform_shortcode = %s 
        OR cnpform_shortcode = %s",
    '[CnPConnect ' . $cnpshortcode . ']',
    '[CnP.Form ' . $cnpshortcode . ']'
);


$cnperrresult = $wpdb->get_results($cnpGetImagesql);

if (!empty($cnperrresult)) {
      foreach ($cnperrresult as $cnperrresultsarr) {
        $cnprtrnstr = $cnperrresultsarr->cnpform_custommsg;
    }
}
return $cnprtrnstr;

}
function CNPCF_getGroupchnlCustomerrmsg($cnpshortcode)
{
global $wpdb; 	
global $cnp_channelgrptable_name;
global $cnprtrnstr;


$cnpGetImagesql = $wpdb->prepare(
    "SELECT cnpchannelgrp_custommsg 
     FROM $cnp_channelgrptable_name 
     WHERE cnpchannelgrp_shortcode = %s",
    '[CnP.pledgeTV ' . $cnpshortcode . ']'
);


$cnperrresult = $wpdb->get_results($cnpGetImagesql);


if (!empty($cnperrresult)) {

    foreach ($cnperrresult as $cnperrresultsarr) {
        $cnprtrnstr = $cnperrresultsarr->cnpchannelgrp_custommsg;
    }
}

return $cnprtrnstr;

}
function CNPCF_getcnpGuid($cnpshortcode)
{
	global $wpdb; 	
global $cnp_table_name;
global $cnprtrnstr;

$cnpGetguidsql = $wpdb->prepare(
    "SELECT cnpform_guid 
     FROM $cnp_table_name 
     WHERE cnpform_shortcode = %s OR cnpform_shortcode = %s",
    '[CnP ' . $cnpshortcode . ']', 
    '[CnP.Form ' . $cnpshortcode . ']'
);
$cnpfrmcntresult = $wpdb->get_results($cnpGetguidsql);

if (!empty($cnpfrmcntresult)) {
    $cnpform_accountId = $cnpfrmcntresult[0]->cnpform_guid; 
    return $cnpform_accountId;
}
return null;

}
function CNPCF_getFormType($groupname)
{
	global $wpdb;
global $cnp_table_name;
global $cnprtrnstr;
$currentdate = CFCNP_PLUGIN_CURRENTTIME;

$cnpGetguidsql = $wpdb->prepare(
    "SELECT cnpform_type, cnpform_ptype, cnpform_text, cnpform_img 
     FROM $cnp_table_name 
     WHERE cnpform_groupname = %s 
       AND cnpform_status = 1 
       AND IF (cnpform_Form_EndDate != '0000-00-00 00:00:00', %s BETWEEN cnpform_Form_StartDate AND cnpform_Form_EndDate, cnpform_Form_StartDate <= %s)
     ORDER BY cnpform_Date_Modified DESC 
     LIMIT 1",
    $groupname,
    $currentdate,
    $currentdate
);


$cnpfrmcntresult = $wpdb->get_results($cnpGetguidsql);


if (!empty($cnpfrmcntresult)) {
    $cnpresultsarr = $cnpfrmcntresult[0]; 
    return $cnpresultsarr->cnpform_type . "--" . $cnpresultsarr->cnpform_ptype . "--" . $cnpresultsarr->cnpform_text . "--" . $cnpresultsarr->cnpform_img;
}


return '';


}
function CNPCF_getCountForms($frmid)
{
global $wpdb;
global $cnp_formtable_name;

$currentdate = CFCNP_PLUGIN_CURRENTTIME;
$cnpGetFrmCntsql = $wpdb->prepare(
    "SELECT * 
     FROM $cnp_formtable_name 
     WHERE (cnpform_FormEndDate = '0000-00-00' OR cnpform_FormEndDate >= %s) 
       AND cnpform_FormStartDate != '' 
       AND cnpform_cnpform_ID = %d",
    $currentdate,
    $frmid
);
$cnpfrmcntresult = $wpdb->get_results($cnpGetFrmCntsql);
return count($cnpfrmcntresult);


}
function CNPCF_getCountChannels($chnlid)
{
global $wpdb;
global $cnp_channeltable_name;
global $cnp_channelgrptable_name;
global $cnp_settingtable_name;
global $cnprtrnstr;

$currentdate = CFCNP_PLUGIN_CURRENTTIME;
$cnpGetFrmCntsql = $wpdb->prepare(
    "SELECT * 
     FROM $cnp_channeltable_name 
     WHERE (cnpchannel_channelEndDate = '0000-00-00' OR cnpchannel_channelEndDate >= %s) 
       AND cnpchannel_channelStartDate != '' 
       AND cnpchannel_cnpchannelgrp_ID = %d",
    $currentdate,
    $chnlid
);


$result = $wpdb->get_results($cnpGetFrmCntsql);
$totnoofchannels = count($result); 

if ($totnoofchannels > 0) {
    $sno = 0;
}

return $totnoofchannels;

}
function CNPCF_getAccountId($frmid)
{
						
global $wpdb;
global $cnp_formtable_name;
global $cnprtrnstr;

$cnpGetFrmCntsql = $wpdb->prepare(
    "SELECT cnpform_accountId 
     FROM $cnp_formtable_name 
     WHERE cnpform_id = %d",
    $frmid
);

$cnpfrmcntresult = $wpdb->get_results($cnpGetFrmCntsql);


if (!empty($cnpfrmcntresult)) {
    foreach ($cnpfrmcntresult as $cnpresultsarr) {
       
        return $cnpresultsarr->cnpform_accountId;
    }
}
return null;
}
function CNPCF_getFormId($frmid)
{
global $wpdb;
global $cnp_formtable_name;

$cnpGetFrmsql = $wpdb->prepare(
    "SELECT cnpform_formId 
     FROM $cnp_formtable_name 
     WHERE cnpform_id = %d",
    $frmid
);

$cnpform_formId = $wpdb->get_var($cnpGetFrmsql);

return $cnpform_formId ? $cnpform_formId : null;


}
function CNPCF_getFormDates($frmid)
{
						
global $wpdb;
global $cnp_formtable_name;


$cnpGetFrmDtsql = $wpdb->prepare(
    "SELECT cnpform_FormStartDate, cnpform_FormEndDate 
     FROM $cnp_formtable_name 
     WHERE cnpform_id = %d",
    $frmid
);
$cnpresult = $wpdb->get_row($cnpGetFrmDtsql);
if ($cnpresult) {
    return $cnpresult->cnpform_FormStartDate . "||" . $cnpresult->cnpform_FormEndDate;
}
return null;
				
}
/*************************************************/
function CNPCF_addNewChannel($tblname,$forminfo)
{ 
global $wpdb;
global $cnp_channelgrptable_name;
global $cnp_channeltable_name;

$count = sizeof($forminfo);

if ($count > 0) {
    if (!empty($forminfo['lstchnlaccntfrndlynam'])) {
        $chnlcode = CNPCF_getChannelShortCode(sanitize_text_field(trim($forminfo['txtcnpchnlgrp'])));
        $current_time = CFCNP_PLUGIN_CURRENTTIME;
        $active = isset($forminfo['lstchnlsts']) ? (int)$forminfo['lstchnlsts'] : 0;

        $cnpsettingid = explode("||", $forminfo['lstchnlaccntfrndlynam']);
        $frmgrpstartdt = $forminfo['txtcnpchnlstrtdt'];
        $frmgrpenddt = $forminfo['txtcnpchnlenddt'];
		$frmgrpenddt1   = "";
			
      
       
if(get_option('date_format') != "d/m/Y"){
	          $frmgrpstartdt1 = date("Y-m-d H:i:s",strtotime($frmgrpstartdt));
	
            }
			elseif(get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y")
			{
				$dateval = CNPCF_getDateFormat($frmgrpstartdt);
				$frmgrpstartdt1 = date("Y-m-d H:i:s",strtotime($dateval));
			}
			
			if($frmgrpenddt !=""){
			if(get_option('date_format') != "d/m/Y"){	
			$frmgrpenddt1 = date("Y-m-d H:i:s",strtotime($frmgrpenddt));
			}
			elseif(get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y")
			{
			    $dateval = CNPCF_getDateFormat($frmgrpenddt);
			    $frmgrpenddt1 = date("Y-m-d H:i:s",strtotime($dateval));
			}
			}	
					
        $cnpchnlgrp = sanitize_text_field(trim($forminfo['txtcnpchnlgrp']));
        $custommsg = sanitize_text_field($forminfo['txtchnlerrortxt']);

        
        $wpdb->insert(
            $cnp_channelgrptable_name,
            [
                'cnpchannelgrp_groupname' => $cnpchnlgrp,
                'cnpchannelgrp_cnpstngs_ID' => $cnpsettingid[2],
                'cnpchannelgrp_shortcode' => $chnlcode,
                'cnpchannelgrp_channel_StartDate' => $frmgrpstartdt1,
                'cnpchannelgrp_channel_EndDate' => $frmgrpenddt1,
                'cnpchannelgrp_status' => $active,
                'cnpchannelgrp_custommsg' => $custommsg,
                'cnpchannelgrp_Date_Created' => $current_time,
                'cnpchannelgrp_Date_Modified' => $current_time
            ]
        );

        $lastid = $wpdb->insert_id;

       
    $noofforms = !empty($forminfo['hidnoofforms']) ? (int)$forminfo['hidnoofforms'] : 1;

        for ($inc = 0; $inc < $noofforms; $inc++) {
            $lstcnpactivechannel = "lstcnpactivechannel" . $forminfo['hdncnpchnlcnt'][$inc];
            $txtcnpchnlstrtdt = "txtcnpchnlstrtdt" . $forminfo['hdncnpchnlcnt'][$inc];
            $txtcnpchnlenddt = "txtcnpchnlenddt" . $forminfo['hdncnpchnlcnt'][$inc];

          $txtcnpformenddt1="";
								
								
							if(get_option('date_format') != "d/m/Y"){
							  $txtcnpformstrtdt1 = date("Y-m-d H:i:s",strtotime($forminfo[$txtcnpchnlstrtdt]));
							}
							elseif(get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y")
							{
								$dateval = CNPCF_getDateFormat($forminfo[$txtcnpchnlstrtdt]);
								$txtcnpformstrtdt1 = date("Y-m-d H:i:s",strtotime($dateval));
							}

							if($forminfo[$txtcnpchnlenddt]!=""){
							if(get_option('date_format') != "d/m/Y"){	
							$txtcnpformenddt1 = date("Y-m-d H:i:s",strtotime($forminfo[$txtcnpchnlenddt]));
							}
							elseif(get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y")
							{
								$dateval = CNPCF_getDateFormat($forminfo[$txtcnpchnlenddt]);
								$txtcnpformenddt1 = date("Y-m-d H:i:s",strtotime($dateval));
							}
							}		
           $result = $wpdb->insert(
    $cnp_channeltable_name,
    [
        'cnpchannel_cnpchannelgrp_ID' => $lastid,
        'cnpchannel_channelName' => sanitize_text_field($forminfo[$lstcnpactivechannel]),
        'cnpchannel_channelStartDate' => $txtcnpformstrtdt1,
        'cnpchannel_channelEndDate' => $txtcnpformenddt1,
        'cnpchannel_channelStatus' => $active,
        'cnpchannel_DateCreated' => $current_time
    ]
);
 }

        return true;
    } else {
        return false;
    }
} else {
    return false;
}

		}
/*************************************************/
 function CNPCF_addNewForms($tblname,$forminfo)
		{ 
			global $wpdb;	global $cnp_table_name; global $cnp_formtable_name;
			$count = count($forminfo); 

	if ($count > 0) {
    if (!empty($forminfo['lstaccntfrndlynam'])) {
							 
						$frmcode = CNPCF_getFormShortCode($forminfo['txtcnpfrmgrp']);
$current_time = CFCNP_PLUGIN_CURRENTTIME;
$maxsize = 10000000; // Set to approx 10 MB

if (is_uploaded_file($_FILES['txtpopupimg']['tmp_name'])) {
    // Check the size of the uploaded file
    if ($_FILES['txtpopupimg']['size'] < $maxsize) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $_FILES['txtpopupimg']['tmp_name']);
        finfo_close($finfo);

        // Check whether the uploaded file is of image type
        if (strpos($mimeType, "image/") === 0) {
            // Prepare the image for insertion
            $imgData = addslashes(file_get_contents($_FILES['txtpopupimg']['tmp_name']));
            // You can now process `$imgData` (e.g., insert it into a database or save it elsewhere)
        } else {
            $msg = "<p>Uploaded file is not an image. Detected MIME type: $mimeType</p>";
        }
    } else {
        // Handle case where file size exceeds the limit
        $msg = "<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is " . ($maxsize / 1024 / 1024) . " MB</div>
                <div>File '" . htmlspecialchars($_FILES['txtpopupimg']['name'], ENT_QUOTES) . "' is " . 
                ($_FILES['txtpopupimg']['size'] / 1024 / 1024) . " MB</div><hr />";
    }
} else {
  
    $msg = "<p>File not uploaded successfully.</p>";
}

	
		   $active = $forminfo['lstfrmsts'];
$cnpsettingid = explode("||", $forminfo['lstaccntfrndlynam']);
$frmgrpstartdt = $forminfo['txtcnpformstrtdt'];
$frmgrpenddt = $forminfo['txtcnpformenddt'];
$frmgrpstartdt1 = "";
$frmgrpenddt1 = "";

// Convert start date
if (!empty($frmgrpstartdt)) {
    if (get_option('date_format') != "d/m/Y") {
        $frmgrpstartdt1 = date("Y-m-d H:i:s", strtotime($frmgrpstartdt));
    } elseif (get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y") {
        $dateval = CNPCF_getDateFormat($frmgrpstartdt);
        $frmgrpstartdt1 = date("Y-m-d H:i:s", strtotime($dateval));
    }
}

// Convert end date
if (!empty($frmgrpenddt)) {
    if (get_option('date_format') != "d/m/Y") {
        $frmgrpenddt1 = date("Y-m-d H:i:s", strtotime($frmgrpenddt));
    } elseif (get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y") {
        $dateval = CNPCF_getDateFormat($frmgrpenddt);
        $frmgrpenddt1 = date("Y-m-d H:i:s", strtotime($dateval));
    }
}

// SQL query to insert the form data
$sSQL = $wpdb->prepare(
    "INSERT INTO {$cnp_table_name} 
    (cnpform_groupname, cnpform_cnpstngs_ID, cnpform_type, cnpform_ptype, cnpform_text, cnpform_img, cnpform_shortcode, cnpform_Form_StartDate, cnpform_Form_EndDate, cnpform_status, cnpform_custommsg, cnpform_Date_Created, cnpform_Date_Modified) 
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %d, %s, %s, %s)",
    $forminfo['txtcnpfrmgrp'],
    $cnpsettingid[2],
    $forminfo['lstfrmtyp'],
    $forminfo['lstpopuptyp'],
    $forminfo['txtpopuptxt'],
    $imgData, // Ensure `$imgData` has been securely processed earlier.
    $frmcode,
    $frmgrpstartdt1,
    $frmgrpenddt1,
    $active,
    $forminfo['txterrortxt'],
    $current_time,
    $current_time
);

// Execute the query
$wpdb->query($sSQL);

// Retrieve the last inserted ID
$lastid = $wpdb->insert_id;

// Determine the number of forms
$noofforms = !empty($forminfo['hidnoofforms']) ? (int)$forminfo['hidnoofforms'] : 1;

	for ($inc = 0; $inc < $noofforms; $inc++) {
   
    $lstcnpactivecamp = "lstcnpactivecamp" . $forminfo['hdncnpformcnt'][$inc];
    $lstcnpfrmtyp = "hdncnpformname" . $forminfo['hdncnpformcnt'][$inc];
    $txtcnpguid = "txtcnpguid" . $forminfo['hdncnpformcnt'][$inc];
    $txtcnpformstrtdt = "txtcnpformstrtdt" . $forminfo['hdncnpformcnt'][$inc];
    $txtcnpformenddt = "txtcnpformenddt" . $forminfo['hdncnpformcnt'][$inc];
    $txtcnpformurlparms = "txtbtnurlparms" . $forminfo['hdncnpformcnt'][$inc];

    $txtcnpformstrtdt1 = "";
    $txtcnpformenddt1 = "";

    if (!empty($forminfo[$txtcnpformstrtdt])) {
        if (get_option('date_format') != "d/m/Y") {
            $txtcnpformstrtdt1 = date("Y-m-d H:i:s", strtotime($forminfo[$txtcnpformstrtdt]));
        } elseif (get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y") {
            $dateval = CNPCF_getDateFormat($forminfo[$txtcnpformstrtdt]);
            $txtcnpformstrtdt1 = date("Y-m-d H:i:s", strtotime($dateval));
        }
    }

   
    if (!empty($forminfo[$txtcnpformenddt])) {
        if (get_option('date_format') != "d/m/Y") {
            $txtcnpformenddt1 = date("Y-m-d H:i:s", strtotime($forminfo[$txtcnpformenddt]));
        } elseif (get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y") {
            $dateval = CNPCF_getDateFormat($forminfo[$txtcnpformenddt]);
            $txtcnpformenddt1 = date("Y-m-d H:i:s", strtotime($dateval));
        }
    }

    $sSQL = $wpdb->prepare(
        "INSERT INTO {$cnp_formtable_name} 
        (cnpform_cnpform_ID, cnpform_CampaignName, cnpform_FormName, cnpform_GUID, cnpform_FormStartDate, cnpform_FormEndDate, cnpform_FormStatus, cnpform_DateCreated, cnpform_urlparameters)
        VALUES (%d, %s, %s, %s, %s, %s, %d, %s, %s)",
        $lastid,
        $forminfo[$lstcnpactivecamp],
        $forminfo[$lstcnpfrmtyp],
        $forminfo[$txtcnpguid],
        $txtcnpformstrtdt1,
        $txtcnpformenddt1,
        $active,
        $current_time,
        $forminfo[$txtcnpformurlparms]
    );

    $wpdb->query($sSQL);
}
	
			return true;
                        }else{
                        return false;
                        }
            }
 else{ 
 return false;
 }
		
 }
/*************************************************/	
function CNPCF_addSettings($tblname,$forminfo)
{ 
			global $wpdb, $cnp_settingtable_name;

$count = sizeof($forminfo);

if ($count > 0) {
   
    $friendly_name = sanitize_text_field($forminfo['txtcnpfrmfrndlynm']);
    $account_id = sanitize_text_field($forminfo['txtcnpacntid']);
    $account_guid = sanitize_text_field($forminfo['txtcnpacntguid']);

  
    $scnpSQL = $wpdb->prepare(
        "SELECT * FROM $cnp_settingtable_name WHERE cnpstngs_frndlyname = %s OR cnpstngs_AccountNumber = %s",
        $friendly_name,
        $account_id
    );

    $cnpresults = $wpdb->get_results($scnpSQL);
    $cnpformrows = count($cnpresults);

    if ($cnpformrows == 0) {
      
        if (!empty($account_id) && !empty($account_guid)) {
            $current_time = CFCNP_PLUGIN_CURRENTTIME;
            $cnpactive = 1;

           
            $wpdb->insert(
                $cnp_settingtable_name,
                [
                    'cnpstngs_frndlyname' => $friendly_name,
                    'cnpstngs_AccountNumber' => $account_id,
                    'cnpstngs_guid' => $account_guid,
                    'cnpstngs_status' => $cnpactive,
                    'cnpstngs_Date_Created' => $current_time,
                    'cnpstngs_Date_Modified' => $current_time,
                ],
                [
                    '%s', // Friendly Name
                    '%s', // Account Number
                    '%s', // GUID
                    '%d', // Status
                    '%s', // Date Created
                    '%s', // Date Modified
                ]
            );

           if ($wpdb->insert_id) {
                return true;
            } else {
                return "Error: Unable to save the record.";
            }
        } else {
            return "Error: Missing required account details.";
        }
    } else {
        return "Error: Duplicate record found.";
    }
} else {
    return false;
}

}
function CNPCF_getActivecampaigns($cnpaccountno,$cnpaccountguid,$retrnstrng){
	$connect  = array('soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 0);
    $client   = new SoapClient('https://resources.connect.clickandpledge.com/wordpress/Auth2.wsdl', $connect);


$accountid = $cnpaccountno; 
$accountguid = $cnpaccountguid;

if (empty($accountid) || empty($accountguid)) {
    return "Error: Missing account ID or GUID.";
}

try {

    $xmlr = new SimpleXMLElement("<GetActiveCampaignList2></GetActiveCampaignList2>");
    $xmlr->addChild('accountId', $accountid); // Add account ID
    $xmlr->addChild('AccountGUID', $accountguid); // Add account GUID
    $xmlr->addChild('username', CFCNP_PLUGIN_UID); // Add plugin username
    $xmlr->addChild('password', CFCNP_PLUGIN_PWD); // Add plugin password

  
    $response = $client->GetActiveCampaignList2($xmlr); 

    if (isset($response->GetActiveCampaignList2Result->connectCampaign)) {
        $responsearr = $response->GetActiveCampaignList2Result->connectCampaign;

  
        if ($retrnstrng == "count") {
            return count($responsearr); // Return the count of active campaigns
        }

        if ($retrnstrng == "lst") {
            return $responsearr; // Return the list of active campaigns
        }
    } else {
        return "Error: No active campaigns found or invalid response.";
    }
} catch (Exception $e) {
 
    return "Error: " . $e->getMessage();
}

return null;


}
function CNPCF_getfrmsts($tablenm,$filedname,$wherefldid,$fieldid)
{
						
		global $wpdb; 
global $cnp_formtable_name;
global $cnprtrnstr;

$cnpGetFrmDtsql = $wpdb->prepare(
    "SELECT $filedname as fldsts FROM $tablenm WHERE $wherefldid = %d",
    $fieldid
);


$cnpfrmdtresult = $wpdb->get_results($cnpGetFrmDtsql);

if (!empty($cnpfrmdtresult)) {
    $cnpform_frmdates = $cnpfrmdtresult[0]->fldsts;
    if ($cnpform_frmdates == "1") {
        $cnprtrnstr = "Active";
    } else {
        $cnprtrnstr = "Inactive";
    }
} else {
    $cnprtrnstr = "Inactive"; 
}

return $cnprtrnstr;

}

function CNPCF_GetCnPGroupDetails($tablenm,$filedname,$wherefldid)
{
						
global $wpdb; 
global $cnp_formtable_name;

$wherefldid_sanitized = intval($wherefldid); 

$cnpGetFrmDtsql = $wpdb->prepare(
    "SELECT * FROM $tablenm WHERE $filedname = %d", 
    $wherefldid_sanitized
);

$cnpfrmdtresult = $wpdb->get_results($cnpGetFrmDtsql);

return $cnpfrmdtresult;

	   }
		
function CNPCF_updateCnPstatus($tablenm,$filedname,$wherefldid,$fieldid,$sts)
		{
						
global $wpdb;
global $cnp_formtable_name;
global $cnprtrnstr;


$updtsts = ($sts === "Active") ? "0" : "1";


$fieldid_sanitized = intval($fieldid); 

$cnpGetFrmeDtsql = $wpdb->prepare(
    "UPDATE $tablenm SET $filedname = %s WHERE $wherefldid = %d",
    $updtsts, 
    $fieldid_sanitized
);


$returnval = $wpdb->query($cnpGetFrmeDtsql);

if ($returnval === false) {

    return false;
}

return true;

 }
function CNPCF_updateChannels($tblname,$forminfo)
{ 
global $wpdb;
global $cnp_channelgrptable_name;
global $cnp_channeltable_name;

$count = sizeof($forminfo);
if ($count > 0) {
    $current_time = CFCNP_PLUGIN_CURRENTTIME;
    $frmgrpstartdt = $forminfo['txtcnpchnlstrtdt'];
    $frmgrpenddt = $forminfo['txtcnpchnlenddt'];
    $frmgrpenddt1 = "";

  
    if (get_option('date_format') != "d/m/Y") {
        $frmgrpstartdt1 = date("Y-m-d H:i:s", strtotime($frmgrpstartdt));
        if ($frmgrpenddt != "") {
            $frmgrpenddt1 = date("Y-m-d H:i:s", strtotime($frmgrpenddt));
        }
    } elseif (get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y") {
        $dateval = CNPCF_getDateFormat($frmgrpstartdt);
        $frmgrpstartdt1 = date("Y-m-d H:i:s", strtotime($dateval));
        if ($frmgrpenddt != "") {
            $dateval = CNPCF_getDateFormat($frmgrpenddt);
            $frmgrpenddt1 = date("Y-m-d H:i:s", strtotime($dateval));
        }
    }

    $active = 1;
   
    $sSQL = "UPDATE " . $cnp_channelgrptable_name . " SET 
                cnpchannelgrp_channel_StartDate = '$frmgrpstartdt1',
                cnpchannelgrp_channel_EndDate = '$frmgrpenddt1',
                cnpchannelgrp_status = '" . $forminfo['lstchnlsts'] . "',
                cnpchannelgrp_custommsg = '" . $forminfo['txterrortxt'] . "',
                cnpchannelgrp_Date_Modified = '$current_time'
             WHERE cnpchannelgrp_ID = '" . $forminfo['hdnfrmid'] . "'";
    $wpdb->query($sSQL);

    $noofforms = $forminfo['hidnoofforms'];
  
    $wpdb->query("DELETE FROM " . $cnp_channeltable_name . " WHERE cnpchannel_cnpchannelgrp_ID = " . $forminfo['hdnfrmid']);

 
    for ($inc = 0; $inc < $noofforms; $inc++) {
        $lstcnpactivecamp = "lstcnpeditactivecamp" . $forminfo['hdncnpformcnt'][$inc];
        $txtcnpformstrtdt = "txtcnpformstrtdt" . $forminfo['hdncnpformcnt'][$inc];
        $txtcnpformenddt = "txtcnpformenddt" . $forminfo['hdncnpformcnt'][$inc];
        $txtcnpformenddt1 = "";

      
        if (get_option('date_format') != "d/m/Y") {
            $txtcnpformstrtdt1 = date("Y-m-d H:i:s", strtotime($forminfo[$txtcnpformstrtdt]));
            if ($forminfo[$txtcnpformenddt] != "") {
                $txtcnpformenddt1 = date("Y-m-d H:i:s", strtotime($forminfo[$txtcnpformenddt]));
            }
        } elseif (get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y") {
            $dateval = CNPCF_getDateFormat($forminfo[$txtcnpformstrtdt]);
            $txtcnpformstrtdt1 = date("Y-m-d H:i:s", strtotime($dateval));
            if ($forminfo[$txtcnpformenddt] != "") {
                $datevale = CNPCF_getDateFormat($forminfo[$txtcnpformenddt]);
                $txtcnpformenddt1 = date("Y-m-d H:i:s", strtotime($datevale));
            }
        }

     
        if ($forminfo[$lstcnpactivecamp] != "") {
            $sSQL = "INSERT INTO " . $cnp_channeltable_name . " 
                        (cnpchannel_cnpchannelgrp_ID, cnpchannel_channelName, 
                        cnpchannel_channelStartDate, cnpchannel_channelEndDate, 
                        cnpchannel_channelStatus, cnpchannel_DateCreated) 
                     VALUES 
                        ('" . $forminfo['hdnfrmid'] . "', '" . $forminfo[$lstcnpactivecamp] . "', 
                        '$txtcnpformstrtdt1', '$txtcnpformenddt1', $active, 
                        '$current_time')";
            $wpdb->query($sSQL);
        }
    }
    return true;
} else {
    return false;
}

		}
		function CNPCF_updateForms($tblname,$forminfo)
		{ 
			global $wpdb;	global $cnp_table_name;global $cnp_formtable_name;
			$count = sizeof($forminfo);
			if($count>0)
			{
										 
						 $frmcode= CNPCF_getFormShortCode($forminfo['txtcnpfrmgrp']);
						 $current_time = CFCNP_PLUGIN_CURRENTTIME;
						 $maxsize = 10000000; //set to approx 10 MB 
							if(is_uploaded_file($_FILES['txtpopupimg']['tmp_name'])) {     
								//checks size of uploaded image on server side
							if( $_FILES['txtpopupimg']['size'] < $maxsize) {    
			 
							$finfo = finfo_open(FILEINFO_MIME_TYPE);
								//checks whether uploaded file is of image type
								if(strpos(finfo_file($finfo, $_FILES['txtpopupimg']['tmp_name']),"image")===0)
								{    
								   // prepare the image for insertion
									$imgData =addslashes (file_get_contents($_FILES['txtpopupimg']['tmp_name']));
									$sSQL = "UPDATE ".$cnp_table_name." set cnpform_img = '{$imgData}',
																 cnpform_Date_Modified='$current_time'
														   where cnpform_ID ='".$forminfo['hdnfrmid']."'"; 
									$wpdb->query($sSQL);
								}
								else{$msg="<p>Uploaded file is not an image.</p>";}
							}
							 else {
								// if the file is not less than the maximum allowed, print an error
								$msg='<div>File exceeds the Maximum File limit</div>
								<div>Maximum File limit is '.$maxsize.' bytes</div>
								<div>File '.$_FILES['txtpopupimg']['name'].' is '.$_FILES['txtpopupimg']['size'].
								' bytes</div><hr />';
							}	}	else $msg="File not uploaded successfully.";
 

			$frmgrpstartdt  = $forminfo['txtcnpformstrtdt'];
			$frmgrpenddt    = $forminfo['txtcnpformenddt'];
			$frmgrpenddt1   = "";
		
			if(get_option('date_format') != "d/m/Y")
			{
				$frmgrpstartdt1 = date("Y-m-d H:i:s",strtotime($frmgrpstartdt));
				if($frmgrpenddt !=""){
				$frmgrpenddt1 = date("Y-m-d H:i:s",strtotime($frmgrpenddt));
				}
			}
			elseif(get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y")
			{
				$dateval = CNPCF_getDateFormat($frmgrpstartdt);
				$frmgrpstartdt1 = date("Y-m-d H:i:s",strtotime($dateval));
				if($frmgrpenddt !=""){
					$dateval = CNPCF_getDateFormat($frmgrpenddt);
					$frmgrpenddt1 = date("Y-m-d H:i:s",strtotime($dateval));
				}	
				
			}	

				// cnpform_shortcode='$frmcode',
			 $active =1;//cnpform_groupname ='$forminfo[txtcnpfrmgrp]',
			 $sSQL = "UPDATE ".$cnp_table_name." set cnpform_type='$forminfo[lstfrmtyp]',
													 cnpform_ptype='$forminfo[lstpopuptyp]',
												     cnpform_text='$forminfo[txtpopuptxt]',
													 cnpform_Form_StartDate='$frmgrpstartdt1',
													 cnpform_Form_EndDate='$frmgrpenddt1',
			 										 cnpform_status='$forminfo[lstfrmsts]',
													 cnpform_custommsg='$forminfo[txterrortxt]',
													 cnpform_Date_Modified='$current_time'
											   where cnpform_ID ='".$forminfo['hdnfrmid']."'"; 
			$wpdb->query($sSQL);
				$noofforms = $forminfo['hidnoofforms'];
				$wpdb->query("delete from ".$cnp_formtable_name." where cnpform_cnpform_ID =".$forminfo['hdnfrmid']);
							for($inc=0;$inc< $noofforms;$inc++)
							{
						
								
								$lstcnpactivecamp = "lstcnpeditactivecamp".$forminfo['hdncnpformcnt'][$inc];
							    $lstcnpfrmtyp  = "hdncnpformname".$forminfo['hdncnpformcnt'][$inc];
								$txtcnpguid = "txtcnpguid".$forminfo['hdncnpformcnt'][$inc];
								$txtcnpformstrtdt = "txtcnpformstrtdt".$forminfo['hdncnpformcnt'][$inc];
								$txtcnpformenddt= "txtcnpformenddt".$forminfo['hdncnpformcnt'][$inc];
								$txtcnpformurlparms= "txtbtnurlparms".$forminfo['hdncnpformcnt'][$inc];
							
								$txtcnpformenddt1="";
							
			if(get_option('date_format') != "d/m/Y")
			{
				$txtcnpformstrtdt1 = date("Y-m-d H:i:s",strtotime($forminfo[$txtcnpformstrtdt]));
				if($forminfo[$txtcnpformenddt] !=""){
				$txtcnpformenddt1 = date("Y-m-d H:i:s",strtotime($forminfo[$txtcnpformenddt]));
				}
			}
			elseif(get_option('date_format') == "d/m/Y" || get_option('date_format') == "d-m-Y")
			{
				$dateval = CNPCF_getDateFormat($forminfo[$txtcnpformstrtdt]);
				$txtcnpformstrtdt1 = date("Y-m-d H:i:s",strtotime($dateval));
				if($forminfo[$txtcnpformenddt] !=""){
					$datevale = CNPCF_getDateFormat($forminfo[$txtcnpformenddt]);
					$txtcnpformenddt1 = date("Y-m-d H:i:s",strtotime($datevale));
				}	
				
			}	

								
			 $sSQL = "INSERT INTO ".$cnp_formtable_name."(cnpform_cnpform_ID,cnpform_CampaignName,cnpform_FormName,cnpform_GUID,			 cnpform_FormStartDate,cnpform_FormEndDate,cnpform_FormStatus,cnpform_DateCreated,cnpform_urlparameters)values('".$forminfo['hdnfrmid']."','$forminfo[$lstcnpactivecamp]',
													 '$forminfo[$lstcnpfrmtyp]','$forminfo[$txtcnpguid]',
													 '$txtcnpformstrtdt1','$txtcnpformenddt1',$active,
													 '$current_time','$forminfo[$txtcnpformurlparms]')"; 
							$wpdb->query($sSQL);
								
			
				}
			return true;/*}else{return false;	}*/}else{ return false;}
		}
function CNPCF_updateSettings($tblname,$forminfo)
{ 
global $wpdb, $cnp_settingtable_name;

$count = count($forminfo);
if ($count > 0) {
    $current_time = current_time('mysql'); 

  
    $sSQL = $wpdb->prepare(
        "UPDATE $cnp_settingtable_name 
        SET 
            cnpstngs_frndlyname = %s,
            cnpstngs_AccountNumber = %s,
            cnpstngs_guid = %s,
            cnpstngs_Date_Modified = %s
        WHERE cnpstngs_ID = %d",
        $forminfo['txtcnpfrmfrndlynm'],
        $forminfo['txtcnpacntid'],
        $forminfo['txtcnpacntguid'],
        $current_time,
        $forminfo['hdnfrmid']
    );

   
    $wpdb->query($sSQL);

    return true;
} else {
    return false;
}

		}
 function CNPCF_getFormShortCode($groupnm)
 {
	     global $wpdb; 	
		 global $cnp_table_name;
		 $rtrnval="";
		 $frmcode = $groupnm;
		 $shrtcode= str_replace(' ', '-', $frmcode);
		 $shortcode = '[CnP.Form '.$shrtcode.']';
					
	return $shortcode;
 }
 function CNPCF_getChannelShortCode($groupnm)
 {
	     global $wpdb; 	
		 global $cnp_table_name;
		 $rtrnval="";
		 $chnlcode = $groupnm;
		 $shrtcode= str_replace(' ', '-', $chnlcode);
		 $shortcode = '[CnP.pledgeTV '.$shrtcode.']';
					
	return $shortcode;
 }
 function  CNPCF_getMaxFormid($tablename)
 {
global $wpdb;
global $cnp_table_name;

$rtrnval = "";

$scnpSQL = $wpdb->prepare(
    "SELECT MAX(cnpform_id) as frmid FROM $cnp_table_name"
);

$cnpresults = $wpdb->get_results($scnpSQL);
$cnpfrmid = 0;

if (!empty($cnpresults)) {
    $cnpfrmid = (int)$cnpresults[0]->frmid;
}

$rtrnval = $cnpfrmid + 1;

$rtrnval = str_pad($rtrnval, 3, '0', STR_PAD_LEFT);

return "CNPCF" . $rtrnval;

 }
function CNPCF_getformsofGroup($groupname){
	
	global $wpdb;
global $cnp_table_name;
global $cnp_formtable_name;

$returnarr = [];
$currentdate = CFCNP_PLUGIN_CURRENTTIME;

$scnpSQL = $wpdb->prepare(
    "SELECT cnpform_ID as frmid 
     FROM $cnp_table_name 
     WHERE cnpform_groupname = %s 
       AND cnpform_status = 1 
       AND IF (cnpform_Form_EndDate != '0000-00-00 00:00:00', 
               %s BETWEEN cnpform_Form_StartDate AND cnpform_Form_EndDate, 
               cnpform_Form_StartDate <= %s) 
     ORDER BY cnpform_Date_Modified DESC 
     LIMIT 1",
    $groupname, $currentdate, $currentdate
);

$cnpresults = $wpdb->get_results($scnpSQL);


if (!empty($cnpresults)) {
    $cnpfrmid = $cnpresults[0]->frmid;

   
    $scnpFormsSQL = $wpdb->prepare(
        "SELECT cnpform_GUID as frmguid, cnpform_urlparameters 
         FROM $cnp_formtable_name 
         WHERE cnpform_cnpform_ID = %d 
           AND cnpform_FormStatus = 1 
           AND IF (cnpform_FormEndDate != '0000-00-00 00:00:00', 
                   %s BETWEEN cnpform_FormStartDate AND cnpform_FormEndDate, 
                   cnpform_FormStartDate <= %s) 
         ORDER BY cnpform_DateCreated DESC 
         LIMIT 1",
        $cnpfrmid, $currentdate, $currentdate
    );

    $cnpformsresults = $wpdb->get_results($scnpFormsSQL);

  
    if (!empty($cnpformsresults)) {
        foreach ($cnpformsresults as $cnpfrmresultsarr) {
            $cnpurlparam = $cnpfrmresultsarr->cnpform_urlparameters;
            $newfrmguid = $cnpfrmresultsarr->frmguid;

          
            if (!empty($cnpurlparam)) {
                $newfrmguid .= "?" . $cnpurlparam;
            }

          
            $returnarr[] = $newfrmguid;
        }
    }
}

return $returnarr;

}
function CNPCF_getchannelsofGroup($groupname){
	
	global $wpdb; 	
global $cnp_channelgrptable_name;
global $cnp_channeltable_name;

$returnarr = [];
$currentdate = CFCNP_PLUGIN_CURRENTTIME;

// Safely prepare the first query
$scnpSQL = $wpdb->prepare(
    "SELECT cnpchannelgrp_ID as chnlid 
     FROM $cnp_channelgrptable_name 
     WHERE cnpchannelgrp_groupname = %s 
       AND cnpchannelgrp_status = 1 
       AND IF (cnpchannelgrp_channel_EndDate != '0000-00-00 00:00:00', 
               %s BETWEEN cnpchannelgrp_channel_StartDate AND cnpchannelgrp_channel_EndDate, 
               cnpchannelgrp_channel_StartDate <= %s) 
     ORDER BY cnpchannelgrp_Date_Modified DESC 
     LIMIT 1",
    $groupname, $currentdate, $currentdate
);

$cnpresults = $wpdb->get_results($scnpSQL);

if (!empty($cnpresults)) {
    $cnpfrmid = $cnpresults[0]->chnlid;

    // Safely prepare the second query
    $scnpFormsSQL = $wpdb->prepare(
        "SELECT cnpchannel_channelName as chnlnm 
         FROM $cnp_channeltable_name 
         WHERE cnpchannel_cnpchannelgrp_ID = %d 
           AND cnpchannel_channelStatus = 1 
           AND IF (cnpchannel_channelEndDate != '0000-00-00 00:00:00', 
                   %s BETWEEN cnpchannel_channelStartDate AND cnpchannel_channelEndDate, 
                   cnpchannel_channelStartDate <= %s) 
         ORDER BY cnpchannel_DateCreated DESC 
         LIMIT 1",
        $cnpfrmid, $currentdate, $currentdate
    );

    $cnpformsresults = $wpdb->get_results($scnpFormsSQL);

    if (!empty($cnpformsresults)) {
        foreach ($cnpformsresults as $cnpfrmresultsarr) {
            $returnarr[] = $cnpfrmresultsarr->chnlnm;
        }
    }
}

return $returnarr;

}
function CNPCF_getCNPAccountDetails($cnpfrndlynm){
	  global $wpdb; 	
global $cnp_settingtable_name;
global $cnp_table_name;
global $cnp_formtable_name;

$acntrtrnval = "";

// Use $wpdb->prepare() for secure SQL query
$scnpSQL = $wpdb->prepare(
    "SELECT cnpstngs_AccountNumber, cnpstngs_guid 
     FROM $cnp_settingtable_name 
     WHERE cnpstngs_ID = %s",
    $cnpfrndlynm
);

// Execute the query
$cnpresults = $wpdb->get_results($scnpSQL);

if (!empty($cnpresults)) {	
    foreach ($cnpresults as $cnpresultsarr) {
        if (!empty($cnpresultsarr->cnpstngs_AccountNumber) && !empty($cnpresultsarr->cnpstngs_guid)) {
            $acntrtrnval = $cnpresultsarr->cnpstngs_AccountNumber . "--" . $cnpresultsarr->cnpstngs_guid;
        }
    }
}

return $acntrtrnval;

	
}
function CNPCF_getAccountNumbersCount()
{
	 global $wpdb; 	
global $cnp_settingtable_name;

// Prepare and execute the query
$scnpSQL = "SELECT * FROM $cnp_settingtable_name";
$cnpresults = $wpdb->get_results($scnpSQL);

// Count the number of rows
$cnpformrows = count($cnpresults);

return $cnpformrows;

	
}
function CNPCF_editgetAccountIdList($cnpeditid)
{
	 	global $wpdb; 	
global $cnp_settingtable_name;

// Initialize return variable
$camrtrnval = "";

// Prepare the SQL query
$scnpSQL = "SELECT * FROM $cnp_settingtable_name ORDER BY cnpstngs_AccountNumber";
$cnpresults = $wpdb->get_results($scnpSQL);

// Check if results exist
if (!empty($cnpresults)) {
    // Iterate through the results and build the options list
    foreach ($cnpresults as $cnpresultsarr) {
        $cnpoptnsel = ($cnpresultsarr->cnpstngs_ID == $cnpeditid) ? "selected" : "";
        $optnval = esc_attr($cnpresultsarr->cnpstngs_AccountNumber . "||" . $cnpresultsarr->cnpstngs_guid . "||" . $cnpresultsarr->cnpstngs_ID);
        $friendlyName = esc_html($cnpresultsarr->cnpstngs_frndlyname);
        $accountNumber = esc_html($cnpresultsarr->cnpstngs_AccountNumber);

        $camrtrnval .= "<option value='$optnval' $cnpoptnsel>$friendlyName ($accountNumber)</option>";
    }
}

// Return the constructed HTML
return $camrtrnval;

	
}
function CNPCF_getAccountIdList()
{
	 	global $wpdb; 	
global $cnp_settingtable_name;

// Initialize return variable
$camrtrnval = "";

// Prepare the SQL query
$scnpSQL = "SELECT * FROM $cnp_settingtable_name ORDER BY cnpstngs_AccountNumber";
$cnpresults = $wpdb->get_results($scnpSQL);

// Check if results exist
if (!empty($cnpresults)) {
    // Iterate through the results and build the options list
    foreach ($cnpresults as $cnpresultsarr) {
        $optnval = esc_attr($cnpresultsarr->cnpstngs_AccountNumber . "||" . $cnpresultsarr->cnpstngs_guid . "||" . $cnpresultsarr->cnpstngs_ID);
        $friendlyName = esc_html($cnpresultsarr->cnpstngs_frndlyname);
        $accountNumber = esc_html($cnpresultsarr->cnpstngs_AccountNumber);

        $camrtrnval .= "<option value='$optnval'>$friendlyName ($accountNumber)</option>";
    }
}

// Return the constructed HTML
return $camrtrnval;

	
}
function CNPCF_getAccountNumbersInfo($cnpeditid)
{
	 	global $wpdb; 	
global $cnp_table_name;

// Ensure the $cnpeditid is properly sanitized to prevent SQL injection
$cnpeditid = intval($cnpeditid);

// Prepare the SQL query
$scnpSQL = $wpdb->prepare("SELECT * FROM $cnp_table_name WHERE cnpform_cnpstngs_ID = %d", $cnpeditid);
$cnpresults = $wpdb->get_results($scnpSQL);

// Count the number of rows
$cnpformrows = count($cnpresults);

// Return the row count
return $cnpformrows;

	
}
function CNPCF_getchnlAccountNumbersInfo($cnpeditid)
{
	 	global $wpdb; 	
global $cnp_channelgrptable_name;

// Ensure the $cnpeditid is properly sanitized to prevent SQL injection
$cnpeditid = intval($cnpeditid);

// Prepare the SQL query
$scnpSQL = $wpdb->prepare("SELECT * FROM $cnp_channelgrptable_name WHERE cnpchannelgrp_cnpstngs_ID = %d", $cnpeditid);
$cnpresults = $wpdb->get_results($scnpSQL);

// Count the number of rows
$cnpformrows = count($cnpresults);

// Return the row count
return $cnpformrows;

	
}

function CNPCF_getDateFormat($frmgrpstartdt)
{
	

    // Check if the date string is valid
    if (empty($frmgrpstartdt)) {
        return '';  // Return an empty string if the input date is empty
    }

    // Split the date and time
    $bits = explode(' ', $frmgrpstartdt);
    
    // Ensure the date part is in the expected format (dd/mm/yyyy)
    if (count($bits) < 2) {
        return '';  // Return empty if no time part is found
    }

    $bits1 = explode('/', $bits[0]);

    // Validate the date structure (dd/mm/yyyy)
    if (count($bits1) != 3) {
        return '';  // Return empty if the date is not in the expected format
    }

    // Construct the new formatted date string (mm/dd/yyyy HH:MM:SS)
    $curdate = $bits1[1] . '/' . $bits1[0] . '/' . $bits1[2] . " " . $bits[1];

    return $curdate;


}
function wp_get_timezone_string() {
 
    // if site timezone string exists, return it
    if ( $timezone = get_option( 'timezone_string' ) )
        return $timezone;
 
    // get UTC offset, if it isn't set then return UTC
    if ( 0 === ( $utc_offset = get_option( 'gmt_offset', 0 ) ) )
        return 'UTC';
 
    // adjust UTC offset from hours to seconds
    $utc_offset *= 3600;
 
    // attempt to guess the timezone string from the UTC offset
    if ( $timezone = timezone_name_from_abbr( '', $utc_offset, 0 ) ) {
        return $timezone;
    }
 
    // last try, guess timezone string manually
    $is_dst = date( 'I' );
 
    foreach ( timezone_abbreviations_list() as $abbr ) {
        foreach ( $abbr as $city ) {
            if ( $city['dst'] == $is_dst && $city['offset'] == $utc_offset )
                return $city['timezone_id'];
        }
    }
     
    // fallback to UTC
    return 'UTC';
}


?>