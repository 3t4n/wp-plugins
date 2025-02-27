<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
function fmcf_save_uploaded_font_data()
{
	if((isset($_FILES['fmcfFontFileTtf']['name']) && $_FILES['fmcfFontFileTtf']['name'] != '' && isset($_FILES['fmcfFontFileWoff']['name']) && $_FILES['fmcfFontFileWoff']['name'] != '' && isset($_FILES['fmcfFontFileWoff2']['name']) && $_FILES['fmcfFontFileWoff2']['name'] != '')){
	   
		$fmcfGetFontFile = sanitize_text_field($_POST['fmcfFontNm']);
	    $fmcfChkValidation = fmcf_file_validator($_FILES,$fmcfGetFontFile);

	    if($fmcfChkValidation['status'] == 0)
    	{
    		return;
    	}

    	if ( ! empty(FMCF_UPLOAD_DIR) ) {
    		if ( ! file_exists(FMCF_UPLOAD_PATH) ) {
                wp_mkdir_p(FMCF_UPLOAD_PATH);
            }
		}

    	fmcf_upload_font_ttf($_FILES,$fmcfGetFontFile);
    	fmcf_upload_font_woff($_FILES,$fmcfGetFontFile);
		fmcf_upload_font_woff2($_FILES,$fmcfGetFontFile);
		fmcf_generate_css();
	}
	else
	{
		$fmcfSuccMsgArr['status'] = 0;
		$fmcfSuccMsgArr['msg'] = 'Font file ttf,woff,woff2 all three types of files are required';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;
	}

	return;
}

function fmcf_save_google_font()
{
	if(isset($_POST['fmcfGoogleFntNm']) && isset($_POST['fmcfFntStyle']) && isset($_POST['fmcfFntWeight']))
	{
		if ( ! empty(FMCF_UPLOAD_DIR) ) {
    		if ( ! file_exists(FMCF_UPLOAD_PATH) ) {
                wp_mkdir_p(FMCF_UPLOAD_PATH);
            }
		}

		$getFmcfGfntNm = $_POST['fmcfGoogleFntNm'];
		$getFmcfGfntStyle = $_POST['fmcfFntStyle'];
		$getFmcfGfntWeight = $_POST['fmcfFntWeight'];

		$fmcfGfontPath = FMCF_PLUGIN_DIR.'assests/fmcf-google-fonts.json';
		$fmcfGetGoogleJsonFile = file_get_contents($fmcfGfontPath);

		$fmcfGFntData = json_decode($fmcfGetGoogleJsonFile, true); 
		$fmcfGfntMatchFlag = 0;

		foreach($fmcfGFntData as $gKey => $gVal)
		{
			if($gKey == $getFmcfGfntNm)
			{
				$fmcfGfntMatchFlag = 1;
				if(isset($gVal['variants'][$getFmcfGfntStyle][$getFmcfGfntWeight]['url']['ttf']) && isset($gVal['variants'][$getFmcfGfntStyle][$getFmcfGfntWeight]['url']['woff']) && isset($gVal['variants'][$getFmcfGfntStyle][$getFmcfGfntWeight]['url']['woff2']))
				{
					$ttfFmcfFlResponse = wp_remote_get($gVal['variants'][$getFmcfGfntStyle][$getFmcfGfntWeight]['url']['ttf']);
					$woffFmcfFlResponse = wp_remote_get($gVal['variants'][$getFmcfGfntStyle][$getFmcfGfntWeight]['url']['woff']);
					$woff2FmcfFlResponse = wp_remote_get($gVal['variants'][$getFmcfGfntStyle][$getFmcfGfntWeight]['url']['woff2']);

					if(is_array($ttfFmcfFlResponse) && !is_wp_error($ttfFmcfFlResponse) && is_array($woffFmcfFlResponse) && !is_wp_error($woffFmcfFlResponse) && is_array($woff2FmcfFlResponse) && !is_wp_error($woff2FmcfFlResponse))
					{

						$fmcfTTFContents = wp_remote_retrieve_body($ttfFmcfFlResponse);
						$fmcfWOFFContents = wp_remote_retrieve_body($woffFmcfFlResponse);
						$fmcfWOFF2Contents = wp_remote_retrieve_body($woff2FmcfFlResponse);

						$fmcfSetFlNm = fmcf_file_nm_set($getFmcfGfntNm.' '.$getFmcfGfntWeight.' '.$getFmcfGfntStyle);

						$fmcfTtfFlPath = FMCF_UPLOAD_PATH.$fmcfSetFlNm.'.ttf';
						$fmcfWoffFlPath = FMCF_UPLOAD_PATH.$fmcfSetFlNm.'.woff';
						$fmcfWoff2FlPath = FMCF_UPLOAD_PATH.$fmcfSetFlNm.'.woff2';

						$fmcfStoreFntFlag = 0;
						if (file_put_contents($fmcfTtfFlPath, $fmcfTTFContents) !== false) 
						{
							$fmcfStoreFntFlag = 1;
						}
						
						if (file_put_contents($fmcfWoffFlPath, $fmcfWOFFContents) !== false) 
						{
							if($fmcfStoreFntFlag == 1)
							{
								$fmcfStoreFntFlag = 1;
							}
						}
						
						if (file_put_contents($fmcfWoff2FlPath, $fmcfWOFF2Contents) !== false)
						{
							if($fmcfStoreFntFlag == 1)
							{
								$fmcfStoreFntFlag = 1;
							}
						}

						if($fmcfStoreFntFlag == 1)
						{
							fmcf_store_google_file_data($getFmcfGfntNm,$getFmcfGfntWeight,$getFmcfGfntStyle);

							$fmcfSuccMsgArr['status'] = 1;
							$fmcfSuccMsgArr['msg'] = 'Font is Uploaded successfully';

							fmcf_generate_css();
						}
						else
						{
							if (file_exists($fmcfTtfFlPath))
							{
								unlink($fmcfTtfFlPath);
							}

							if(file_exists($fmcfWoffFlPath))
							{
								unlink($fmcfWoffFlPath);
							}

							if(file_exists($fmcfWoff2FlPath))
							{
								unlink($fmcfWoff2FlPath);
							}

							$fmcfSuccMsgArr['status'] = 0;
							$fmcfSuccMsgArr['msg'] = 'Something went wrong,Font is not Uploaded';
						}
					}
					else
					{
						$fmcfSuccMsgArr['status'] = 0;
						$fmcfSuccMsgArr['msg'] = 'Something went wrong,Font is not Uploaded';
					}
				}
				else
				{
					$fmcfSuccMsgArr['status'] = 0;
					$fmcfSuccMsgArr['msg'] = 'Something went wrong,Font is not Uploaded';
				}
			}
		}

		if($fmcfGfntMatchFlag == 0)
		{
			$fmcfSuccMsgArr['status'] = 0;
			$fmcfSuccMsgArr['msg'] = 'Something went wrong,Font is not Uploaded';
		}
	}

	return $fmcfSuccMsgArr;
}

function fmcf_check_create_folder()
{
	 if (! is_dir(FMCF_UPLOAD_PATH)) {
	    mkdir(FMCF_UPLOAD_PATH, 0755);
	 }
}


function fmcf_file_nm_set($fmcfFlNm)
{
	$getFmcfFlNm = '';
	if($fmcfFlNm != '')
	{
		$getFmcfFlNm = strtolower(str_replace(' ', '-', $fmcfFlNm));
	}

	return $getFmcfFlNm;
}

function fmcf_file_validator($fmcfFl,$fmcfOrgFlNm)
{
	$fmcfErrFlagArr = array('status' => 1);

	if(!preg_match("#^[a-zA-Z ]+$#", $fmcfOrgFlNm))
 	{
		$fmcfErrFlag = 1;
		$fmcfErrFlagArr['status'] = 0;
		$fmcfErrFlagArr['msg'] = 'Only allow charaters and spaces in font name';

		$GLOBALS['fmcf_action_response'] = $fmcfErrFlagArr;
		return $fmcfErrFlagArr;
 	}

 	if(isset($fmcfOrgFlNm) && $fmcfOrgFlNm != '')
	{
		global $wpdb;
		$fmcfFontListTable = $wpdb->prefix . 'fmcf_fonts_list';

		if($wpdb->get_var("SHOW TABLES LIKE '$fmcfFontListTable'") == $fmcfFontListTable) {
			$fmcfResults = $wpdb->get_results(
			    "SELECT id FROM $fmcfFontListTable WHERE org_name='".$fmcfOrgFlNm."'",ARRAY_A
			);

			$fmcfTotRow = $wpdb->num_rows;

			if($fmcfTotRow > 0)
			{
				$fmcfErrFlagArr['status'] = 0;
				$fmcfErrFlagArr['msg'] = 'Font name already exists, Please set another font name';

				$GLOBALS['fmcf_action_response'] = $fmcfErrFlagArr;
				return $fmcfErrFlagArr;
			}				
		}
	}

	 if(($fmcfFl["fmcfFontFileTtf"]["size"] > 10000000) || ($fmcfFl["fmcfFontFileWoff"]["size"] > 10000000) || ($fmcfFl["fmcfFontFileWoff2"]["size"] > 10000000)) {
			$fmcfErrFlag = 1;
			$fmcfErrFlagArr['status'] = 0;
			$fmcfErrFlagArr['msg'] = 'File Size is exceed 10 MB';

			$GLOBALS['fmcf_action_response'] = $fmcfErrFlagArr;
			return $fmcfErrFlagArr;
 	  }


 	  $fmcfFlNmTtf = sanitize_file_name($fmcfFl['fmcfFontFileTtf']['name']);
 	  $fmcfFileExtTtfArr= explode('.',$fmcfFlNmTtf);
 	  $fmcfExtTtf = strtolower(end($fmcfFileExtTtfArr));

 	  if($fmcfExtTtf != 'ttf')
  	  {
  	  		$fmcfErrFlag = 1;
			$fmcfErrFlagArr['status'] = 0;
			$fmcfErrFlagArr['msg'] = 'Uploaded file type is wrong,Please upload File with ttf file extension';
			$GLOBALS['fmcf_action_response'] = $fmcfErrFlagArr;
			return $fmcfErrFlagArr;
  	  }

	  $fmcfFlNmWoff = sanitize_file_name($fmcfFl['fmcfFontFileWoff']['name']);
 	  $fmcfFileExtWoffArr= explode('.',$fmcfFlNmWoff);
 	  $fmcfExtWoff = strtolower(end($fmcfFileExtWoffArr));  	  

 	  if($fmcfExtWoff != 'woff')
  	  {
  	  		$fmcfErrFlag = 1;
			$fmcfErrFlagArr['status'] = 0;
			$fmcfErrFlagArr['msg'] = 'Uploaded file type is wrong,Please upload File with woff file extension';
			$GLOBALS['fmcf_action_response'] = $fmcfErrFlagArr;
			return $fmcfErrFlagArr;
  	  }

  	  $fmcfFlNmWoff2 = sanitize_file_name($fmcfFl['fmcfFontFileWoff2']['name']);
 	  $fmcfFileExtWoff2Arr= explode('.',$fmcfFlNmWoff2);
 	  $fmcfExtWoff2 = strtolower(end($fmcfFileExtWoff2Arr));  	  

 	  if($fmcfExtWoff2 != 'woff2')
  	  {
  	  		$fmcfErrFlag = 1;
			$fmcfErrFlagArr['status'] = 0;
			$fmcfErrFlagArr['msg'] = 'Uploaded file type is wrong,Please upload File with woff2 file extension';
			$GLOBALS['fmcf_action_response'] = $fmcfErrFlagArr;
			return $fmcfErrFlagArr;
  	  }

 	  return $fmcfErrFlagArr;
}

function fmcf_store_file_data($fntOrgNm)
{
	global $wpdb;

	$fmcfFntNm = fmcf_file_nm_set($fntOrgNm);
	$wpdb->insert($wpdb->prefix.'fmcf_fonts_list',array(
        'name' => $fmcfFntNm,
        'org_name' => $fntOrgNm,
    ));
}

function fmcf_store_google_file_data($gFntOrgNm,$gFntWeight,$gFntStyle)
{
	global $wpdb;

	$fmcfCombineGfontNm = $gFntOrgNm.' '.$gFntWeight.' '.$gFntStyle;
	$fmcfFntNm = fmcf_file_nm_set($fmcfCombineGfontNm);
	$wpdb->insert($wpdb->prefix.'fmcf_fonts_list',array(
        'name' => $fmcfFntNm,
        'org_name' => $fmcfCombineGfontNm,
        'gfont_name' => $gFntOrgNm,
        'gfont_weight' => $gFntWeight,
        'gfont_style' => $gFntStyle,
        'gfont_flag' => 1
    ));
}

function fmcf_add_tables()
{
	global $wpdb;
	$fmcfFontListTable = $wpdb->prefix . 'fmcf_fonts_list';
    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s",$fmcfFontListTable)) != $fmcfFontListTable) {
                $charset_collate = $wpdb->get_charset_collate();
                $sql = "CREATE TABLE " . $fmcfFontListTable . " (
			`id` bigint(20) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(255) NOT NULL,
			`org_name` VARCHAR(255) NOT NULL,
			`gfont_name` VARCHAR(255) NULL,
			`gfont_weight` VARCHAR(255) NULL,
			`gfont_style` VARCHAR(255) NULL,
			`gfont_flag`  tinyint(1) DEFAULT 0 NOT NULL,
			PRIMARY KEY  (id)
			) $charset_collate";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            $wpdb->query($sql);
    }

    $fmcfAssignFontListTable = $wpdb->prefix . 'fmcf_fonts_assign';

    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s",$fmcfAssignFontListTable)) != $fmcfAssignFontListTable) {

    	 $charset_collate = $wpdb->get_charset_collate();
             $sqlAssignTbl = "CREATE TABLE " . $fmcfAssignFontListTable . " (
			`id` bigint(20) NOT NULL AUTO_INCREMENT,
			`font_id` bigint(20) NOT NULL,
			`font_name` VARCHAR(255) NOT NULL,
			`element_and_tag` VARCHAR(255) NOT NULL,
			`font_flag` tinyint(1) DEFAULT 0 NOT NULL,
			PRIMARY KEY  (id)
			) $charset_collate";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            $wpdb->query($sqlAssignTbl);
	}
}

function fmcf_font_list_table_data()
{
	global $wpdb;

	$fmcfTblDataArr = array(
		'fmcf_tbl_rows' => 0,
		'fmcf_tbl_data' => ''
	);

	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_list';

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT * FROM $fmcfTblNm",ARRAY_A
		);

		$fmcfTotRow = $wpdb->num_rows;
		$fmcfTblDataArr = array(
			'fmcf_tbl_rows' => $fmcfTotRow,
			'fmcf_tbl_data' => $fmcfResults
		);
	}

	return $fmcfTblDataArr;
}

function fmcf_font_nm_list_arr()
{
	global $wpdb;

	$fmcfFntLstNmArr = array();
	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_list';

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT name FROM $fmcfTblNm",ARRAY_A
		);

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			foreach ($fmcfResults as $key => $fmcfFntData) {
				$fmcfFntLstNmArr[] = $fmcfFntData['name'];
			}
		}
	}

	return $fmcfFntLstNmArr;

}

function fmcf_assign_font_list_data()
{
	global $wpdb;

	$fmcfTblDataArr = array(
		'fmcf_tbl_rows' => 0,
		'fmcf_tbl_data' => ''
	);

	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_assign';

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT * FROM $fmcfTblNm",ARRAY_A
		);

		$fmcfTotRow = $wpdb->num_rows;
		$fmcfTblDataArr = array(
			'fmcf_tbl_rows' => $fmcfTotRow,
			'fmcf_tbl_data' => $fmcfResults
		);
	}

	return $fmcfTblDataArr;
}

function fmcf_assign_font_class_data($fmcfFntId)
{
	global $wpdb;

	$fmcfResults = array();

	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_assign';

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT * FROM $fmcfTblNm WHERE font_flag = 1 AND font_id=$fmcfFntId",ARRAY_A
		);
	}

	return $fmcfResults;
}

function fmcf_assign_font_data_store($fmcfFntId,$fmcfFntNm,$fmcfElem,$fmcfFntFlag = 0,$fmcfFntColor = '#000000')
{
	global $wpdb;

	$fmcfDataChk = fmcf_assign_font_data_check($fmcfElem);

	if($fmcfDataChk == 0)
	{
		if($fmcfFntFlag == 0)
		{
			$wpdb->insert($wpdb->prefix.'fmcf_fonts_assign',array(
		        'font_id' => $fmcfFntId,
		        'font_name' => $fmcfFntNm,
		        'element_and_tag' => $fmcfElem
		    ));

		    $fmcfFntInsVal = '#000000';
			if($fmcfFntColor != '#000000')
			{
				$fmcfFntInsVal = $fmcfFntColor;
			}
	    }
	    else
    	{
    		$wpdb->insert($wpdb->prefix.'fmcf_fonts_assign',array(
		        'font_id' => $fmcfFntId,
		        'font_name' => $fmcfFntNm,
		        'element_and_tag' => $fmcfElem,
		        'font_flag' => 1
		    ));	
    	}

	    $fmcfSuccMsgArr['status'] = 1;
		$fmcfSuccMsgArr['msg'] = 'Font is Assigned successfully';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;
    }

    return;
}

function fmcf_assign_font_data_check($fmcfTag,$fmcfFntFlag = 0)
{
	global $wpdb;

	$fmcfExistCheck = 1;
	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_assign';
	$chkFmcfTag = $fmcfTag;

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		if($fmcfFntFlag == 0)
		{
			$fmcfResults = $wpdb->get_results(
			    "SELECT * FROM $fmcfTblNm WHERE font_flag = 0 AND element_and_tag = '".$chkFmcfTag."'");
			$fmcfTotRow = $wpdb->num_rows;
		}
		else
		{
			$fmcfResults = $wpdb->get_results(
			    "SELECT * FROM $fmcfTblNm WHERE font_flag = 1 AND element_and_tag = '".$chkFmcfTag."'");
			$fmcfTotRow = $wpdb->num_rows;
		}

		if($fmcfTotRow > 0)
		{
			$fmcfExistCheck = 1;
		}
		else
		{
			$fmcfExistCheck = 0;	
		}
	}

	return $fmcfExistCheck;
}

function fmcf_get_org_font_nm($fmcfFntId)
{
	global $wpdb;
	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_list';
	$fmcfFntNm = '';

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT id,org_name FROM $fmcfTblNm WHERE id=$fmcfFntId",ARRAY_A);

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			$fmcfFntNm = $fmcfResults[0]['org_name'];
		}
	}

	return $fmcfFntNm;
}

function fmcf_get_assigned_list()
{
	global $wpdb;

	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_assign';
	$fmcfAssignedFontArr = array();

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT font_id,font_name,GROUP_CONCAT(element_and_tag) as elems,font_flag FROM $fmcfTblNm GROUP BY font_id",ARRAY_A);

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			$fmcfAssignedFontArr = $fmcfResults;
		}
	}

	return $fmcfAssignedFontArr;
}

function fmcf_get_assign_font_element($fmcfFntId)
{
	global $wpdb;
	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_assign';
	$fmcfFntNm = array();

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT element_and_tag FROM $fmcfTblNm WHERE font_id=$fmcfFntId",ARRAY_A);

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			$fmcfFntNm = $fmcfResults;
		}
	}

	return $fmcfFntNm;
}

function fmcf_get_not_assign_sel_font_element($fmcfFntId)
{
	global $wpdb;
	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_assign';
	$fmcfFntNm = array();

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT element_and_tag FROM $fmcfTblNm WHERE font_id != $fmcfFntId",ARRAY_A);

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			$fmcfFntNm = $fmcfResults;
		}
	}

	return $fmcfFntNm;
}

function fmcf_remove_assign_font_elem($fmcfElem)
{
	global $wpdb;
	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_assign';
	$wpdb->delete($fmcfTblNm, array('element_and_tag' => $fmcfElem));
	return;
}

function fmcf_elem_proper_nm($fmcfElemStr)
{
	$fmcfElemArr = explode(',',$fmcfElemStr);
	$fmcfElemRevisedStr = '';
	$fmcfElemRevisedNmArr = array('title_post' => 'Post Title','title_page' => 'Page Title','title_category' => 'Category Title','body' => 'Body Tag','p' => 'P tag','li' => 'li Tag','a' => 'a tag','b' => 'b tag','i' => 'i tag');

	foreach($fmcfElemArr as $fmcfKey => $fmcfElemVal)
	{
		if(in_array($fmcfElemVal, array_keys($fmcfElemRevisedNmArr)))
		{
			$fmcfElemRevisedStr.= $fmcfElemRevisedNmArr[$fmcfElemVal].',';
		}
		else
		{
			$fmcfElemRevisedStr.= $fmcfElemVal.',';	
		}
	}

	$fmcfElemRevisedStr = trim($fmcfElemRevisedStr,',');

	return $fmcfElemRevisedStr;
}

function fmcf_chk_font_assign_or_not($fmcfFntId)
{
	global $wpdb;
	$fmcfExistCheck = 0;
	$fmcfAssignTblNm = $wpdb->prefix . 'fmcf_fonts_assign';
	$fmcfFntIdChk = $fmcfFntId;

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfAssignTblNm'") == $fmcfAssignTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT * FROM $fmcfAssignTblNm WHERE font_id = '".$fmcfFntIdChk."'");

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			$fmcfExistCheck = 1;
		}
	}

	return $fmcfExistCheck;
}

function fmcf_del_font($fmcfDelFntId)
{
	global $wpdb;
    $fmcfListTbl = $wpdb->prefix .'fmcf_fonts_list';

    fmcf_del_font_frm_dir($fmcfDelFntId);

    $wpdb->delete($fmcfListTbl, array('id' => $fmcfDelFntId));
    $fmcfResDataArr = array(
        'msg' => 'Font is deleted successfully',
        'status' => 1
    );

    fmcf_generate_css();
    return $fmcfResDataArr;
}

function fmcf_del_assigned_font($fmcfAssignedDelId)
{
	global $wpdb;
    $fmcfAssignListTbl = $wpdb->prefix .'fmcf_fonts_assign';
    $wpdb->delete($fmcfAssignListTbl, array('font_id' => $fmcfAssignedDelId));
    $fmcfResDataArr = array(
        'msg' => "Font's Assignement is deleted successfully",
        'status' => 1
    );
    fmcf_generate_css();

    return $fmcfResDataArr;
}

function fmcf_upload_font_ttf($fmcfTtfFl,$fmcfOrgFlNm)
{
	$fmcfUploadedFileTtf = $fmcfTtfFl['fmcfFontFileTtf'];
    $fmcfUploadedFileNmTtf = sanitize_file_name($fmcfTtfFl['fmcfFontFileTtf']['name']);
    $fmcfUploadedFileTempNmTtf = $fmcfTtfFl['fmcfFontFileTtf']['tmp_name'];
    $fmcfFileExtTtf= explode('.',$fmcfUploadedFileNmTtf);
	$fmcfExtTtf = end($fmcfFileExtTtf);

	$fmcfFileNmTtf = fmcf_file_nm_set($fmcfOrgFlNm).'.'.$fmcfExtTtf;
		    
    if(move_uploaded_file($fmcfUploadedFileTempNmTtf, FMCF_UPLOAD_PATH. $fmcfFileNmTtf) && is_writable(FMCF_UPLOAD_PATH))
	{
		fmcf_store_file_data($fmcfOrgFlNm);
		$fmcfSuccMsgArr['status'] = 1;
		$fmcfSuccMsgArr['msg'] = 'Font is Uploaded successfully';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;
	}
	else
	{
		$fmcfSuccMsgArr['status'] = 0;
		$fmcfSuccMsgArr['msg'] = 'Something went wrong,Font is not Uploaded';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;	
	}
}

function fmcf_upload_font_woff($fmcfWoffFl,$fmcfOrgFlNm)
{
	$fmcfUploadedFileWoff = $fmcfWoffFl['fmcfFontFileWoff'];
    $fmcfUploadedFileNmWoff = sanitize_file_name($fmcfWoffFl['fmcfFontFileWoff']['name']);
    $fmcfUploadedFileTempNmWoff = $fmcfWoffFl['fmcfFontFileWoff']['tmp_name'];
    $fmcfFileExtWoff= explode('.',$fmcfUploadedFileNmWoff);
	$fmcfExtWoff = end($fmcfFileExtWoff);

	$fmcfFileNmWoff = fmcf_file_nm_set($fmcfOrgFlNm).'.'.$fmcfExtWoff;
		    
    if(move_uploaded_file($fmcfUploadedFileTempNmWoff, FMCF_UPLOAD_PATH. $fmcfFileNmWoff) && is_writable(FMCF_UPLOAD_PATH))
	{
		$fmcfSuccMsgArr['status'] = 1;
		$fmcfSuccMsgArr['msg'] = 'Font is Uploaded successfully';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;
	}
	else
	{
		$fmcfSuccMsgArr['status'] = 0;
		$fmcfSuccMsgArr['msg'] = 'Something went wrong,Font is not Uploaded';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;	
	}
}

function fmcf_upload_font_woff2($fmcfWoff2Fl,$fmcfOrgFlNm)
{
	$fmcfUploadedFileWoff2 = $fmcfWoff2Fl['fmcfFontFileWoff2'];
    $fmcfUploadedFileNmWoff2 = sanitize_file_name($fmcfWoff2Fl['fmcfFontFileWoff2']['name']);
    $fmcfUploadedFileTempNmWoff2 = $fmcfWoff2Fl['fmcfFontFileWoff2']['tmp_name'];
    $fmcfFileExtWoff2= explode('.',$fmcfUploadedFileNmWoff2);
	$fmcfExtWoff2 = end($fmcfFileExtWoff2);

	$fmcfFileNmWoff2 = fmcf_file_nm_set($fmcfOrgFlNm).'.'.$fmcfExtWoff2;
		    
    if(move_uploaded_file($fmcfUploadedFileTempNmWoff2, FMCF_UPLOAD_PATH.$fmcfFileNmWoff2) && is_writable(FMCF_UPLOAD_PATH))
	{
		$fmcfSuccMsgArr['status'] = 1;
		$fmcfSuccMsgArr['msg'] = 'Font is Uploaded successfully';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;
	}
	else
	{
		$fmcfSuccMsgArr['status'] = 0;
		$fmcfSuccMsgArr['msg'] = 'Something went wrong,Font is not Uploaded';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;	
	}
}

function fmcf_generate_css()
{
	$getFmcfAssignedListArr = fmcf_get_assigned_list();
	$getFmcfUploadedFntListArr = fmcf_font_list_table_data();
    	if (!empty(FMCF_UPLOAD_DIR)) {
    		if ( ! file_exists(FMCF_UPLOAD_PATH) ) {
                wp_mkdir_p(FMCF_UPLOAD_PATH);
            }
		}

	$getFmcfTagColorArr = fmcf_get_tag_clr_data();

	ob_start();

	if(!empty($getFmcfTagColorArr))
	{
		foreach($getFmcfTagColorArr as $clrKey => $clrData)
		{ 
			echo $clrKey.'{ color:'.$clrData.' !important; }';
		}

		$fmcfCssContent = ob_get_contents();
		$fmcfOutPut = fopen(FMCF_UPLOAD_CSS_PATH, 'w') or die("Can't open file");
		fwrite($fmcfOutPut, $fmcfCssContent);
		fclose($fmcfOutPut);
		ob_end_clean();

		ob_start();
		foreach($getFmcfTagColorArr as $clrAdminKey => $clrAdminData)
		{ 
			$getFmcfTagNm = fmcf_get_tag_class_for_css($clrAdminKey,1);
			echo $getFmcfTagNm.'{ color:'.$clrAdminData.' !important; }';
		}

		$fmcfAdmCssContent = ob_get_contents();
		$fmcfOutPutAdmin = fopen(FMCF_UPLOAD_ADMIN_CSS_PATH, 'w') or die("Can't open file");
		fwrite($fmcfOutPutAdmin, $fmcfAdmCssContent);
		fclose($fmcfOutPutAdmin);
		ob_end_clean();
		ob_start();
		
	}

	if(!empty($getFmcfUploadedFntListArr['fmcf_tbl_data']))
	{
		foreach ($getFmcfUploadedFntListArr['fmcf_tbl_data'] as $fmcfFntkey => $fmcfFntListData){ 
			$fmcfFontNmSet = $fmcfFntListData['name']; ?>

			@font-face {
					font-family: '<?php echo esc_html($fmcfFontNmSet); ?>';
					src:<?php if (file_exists(FMCF_UPLOAD_PATH.$fmcfFontNmSet.'.woff2')){ ?>url('<?php echo esc_url(FMCF_UPLOAD_URL.$fmcfFontNmSet); ?>.woff2') format('woff2'),
				<?php } ?><?php if (file_exists(FMCF_UPLOAD_PATH.$fmcfFontNmSet.'.woff')){ ?>url('<?php echo esc_url(FMCF_UPLOAD_URL.$fmcfFontNmSet); ?>.woff') format('woff'),
					<?php } ?>
					<?php if (file_exists(FMCF_UPLOAD_PATH.$fmcfFontNmSet.'.ttf')){ ?>url('<?php echo esc_url(FMCF_UPLOAD_URL.$fmcfFontNmSet); ?>.ttf') format('truetype');
					<?php } ?>
				}

				.<?php echo esc_html($fmcfFontNmSet); ?>{font-family: '<?php echo esc_html($fmcfFontNmSet); ?>' !important;}
			<?php
		}

		if(!empty($getFmcfTagColorArr))
		{
			$fmcfCssContent = ob_get_contents();
			$fmcfOutPut = fopen(FMCF_UPLOAD_CSS_PATH, 'a') or die("Can't open file");
			fwrite($fmcfOutPut, $fmcfCssContent);
			fclose($fmcfOutPut);

			$fmcfOutPut = fopen(FMCF_UPLOAD_ADMIN_CSS_PATH, 'a') or die("Can't open file");
			fwrite($fmcfOutPut, $fmcfCssContent);
			fclose($fmcfOutPut);
			ob_end_clean();
		}
		else
		{
			$fmcfCssContent = ob_get_contents();
			$fmcfOutPut = fopen(FMCF_UPLOAD_CSS_PATH, 'w') or die("Can't open file");
			fwrite($fmcfOutPut, $fmcfCssContent);
			fclose($fmcfOutPut);

			$fmcfOutPut = fopen(FMCF_UPLOAD_ADMIN_CSS_PATH, 'w') or die("Can't open file");
			fwrite($fmcfOutPut, $fmcfCssContent);
			fclose($fmcfOutPut);
			ob_end_clean();
		}
	}

	if(!empty($getFmcfAssignedListArr))
	{
		foreach ($getFmcfAssignedListArr as $key => $fmcfFntData){ 
			$fmcfFontNmAssign = fmcf_file_nm_set($fmcfFntData['font_name']);
			?>
				<?php echo fmcf_get_tag_class_for_css($fmcfFntData['elems'],0); ?>{font-family: '<?php echo esc_html($fmcfFontNmAssign); ?>' !important;}
		<?php }

		$fmcfCssContent = ob_get_contents();
		$fmcfOutPut = fopen(FMCF_UPLOAD_CSS_PATH, 'a') or die("Can't open file");
		fwrite($fmcfOutPut, $fmcfCssContent);
		fclose($fmcfOutPut);
		ob_end_clean();

		ob_start();

		foreach ($getFmcfAssignedListArr as $fmcfKey => $fmcfAdminFntData){ 
			$fmcfFontNmAssign = fmcf_file_nm_set($fmcfAdminFntData['font_name']);
			?>				
				<?php echo fmcf_get_tag_class_for_css($fmcfAdminFntData['elems'],1); ?>{font-family: '<?php echo esc_html($fmcfFontNmAssign); ?>' !important;}
		<?php }

		$fmcfAdminCssContent = ob_get_contents();
		$fmcfOutPutAdmin = fopen(FMCF_UPLOAD_ADMIN_CSS_PATH, 'a') or die("Can't open file");
		fwrite($fmcfOutPutAdmin, $fmcfAdminCssContent);
		fclose($fmcfOutPutAdmin);
		ob_end_clean();
	}
}

function fmcf_del_font_frm_dir($fmcfFntId)
{
	global $wpdb;
	$fmcfTblNm = $wpdb->prefix . 'fmcf_fonts_list';

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfTblNm'") == $fmcfTblNm) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT name FROM $fmcfTblNm WHERE id=$fmcfFntId",ARRAY_A);

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			$fmcfFntNm = $fmcfResults[0]['name'];
			if (!empty(FMCF_UPLOAD_DIR)) {
	    		if (file_exists(FMCF_UPLOAD_PATH.$fmcfFntNm.'.ttf') ) {
	                unlink(FMCF_UPLOAD_PATH.$fmcfFntNm.'.ttf');
	            }

	            if (file_exists(FMCF_UPLOAD_PATH.$fmcfFntNm.'.woff') ) {
	                unlink(FMCF_UPLOAD_PATH.$fmcfFntNm.'.woff');
	            }

	            if (file_exists(FMCF_UPLOAD_PATH.$fmcfFntNm.'.woff2') ) {
	                unlink(FMCF_UPLOAD_PATH.$fmcfFntNm.'.woff2');
	            }
			}
		}
	}
}

function fmcf_get_tag_class_for_css($fmcfElemStr,$fmcfFlag)
{
	if(isset($fmcfElemStr) && $fmcfElemStr != '')
	{
		$fmcfRevisedStr = str_replace(
   			array('title_post', 'title_page','title_category'), 
   			array('.single .wp-block-post-title', '.page .wp-block-post-title','.wp-block-query-title'), 
   			$fmcfElemStr
		);

		if(is_admin() && $fmcfFlag == 1)
		{
			$dataArray = array(
				'h1'=>'.block-editor-page .edit-post-visual-editor h1',
				'h2'=>'.block-editor-page .edit-post-visual-editor h2',
				'h3'=>'.block-editor-page .edit-post-visual-editor h3',
				'h4'=>'.block-editor-page .edit-post-visual-editor h4',
				'h5'=>'.block-editor-page .edit-post-visual-editor h5',
				'h6'=>'.block-editor-page .edit-post-visual-editor h6',
				'title_post'=>'.block-editor-page .edit-post-visual-editor .wp-block-post-title', 
				'title_page'=>'.block-editor-page .edit-post-visual-editor .wp-block-post-title',
				'title_category'=>'.block-editor-page .edit-post-visual-editor .wp-block-query-title',
				'body'=>'.block-editor-page .edit-post-visual-editor body',
				'p'=>'.block-editor-page .edit-post-visual-editor p',
				'marquee'=>'.block-editor-page .edit-post-visual-editor marquee',
				'li'=>'.block-editor-page .edit-post-visual-editor li',
				'a'=>'.block-editor-page .edit-post-visual-editor a',
				'b'=>'.block-editor-page .edit-post-visual-editor b',
				'i'=>'.block-editor-page .edit-post-visual-editor i',
				'ul'=>'.block-editor-page .edit-post-visual-editor ul',
				'ol'=>'.block-editor-page .edit-post-visual-editor ol',
				'span'=>'.block-editor-page .edit-post-visual-editor span',
				'em'=>'.block-editor-page .edit-post-visual-editor em',
				'table'=>'.block-editor-page .edit-post-visual-editor table',
				'tr'=>'.block-editor-page .edit-post-visual-editor tr',
				'td'=>'.block-editor-page .edit-post-visual-editor td',
				'th'=>'.block-editor-page .edit-post-visual-editor th',
				'small'=>'.block-editor-page .edit-post-visual-editor small',
				'u'=>'.block-editor-page .edit-post-visual-editor u',
				'strike'=>'.block-editor-page .edit-post-visual-editor strike',
				'center'=>'.block-editor-page .edit-post-visual-editor center',
				'title' => '.block-editor-page .edit-post-visual-editor title',
				'strong' => '.block-editor-page .edit-post-visual-editor strong',
				'label' => '.block-editor-page .edit-post-visual-editor label'
			);
			$convertedArray = array();
			
			$elementArray = explode(',',$fmcfElemStr);
			foreach($elementArray as $el){
				if(isset($dataArray[$el]))
				{
					$convertedArray[] = $dataArray[$el];
				}
				else
				{
					$convertedArray[] = $el;	
				}
			}
			
			$fmcfRevisedStr = implode(',',$convertedArray);
			
		}

		return $fmcfRevisedStr;
	}

	return $fmcfElemStr;
}

function fmcf_apply_predefined_font($fmcfPredFntId)
{
	if($fmcfPredFntId != '')
	{
		$fmcfGetPredefinedFont = $GLOBALS['fmcfPredefinedFntArr'][$fmcfPredFntId];

		if($fmcfGetPredefinedFont != '')
		{
			$fmcfCpyFrmTtfFl = FMCF_DIR_PATH.'fonts/'.$fmcfGetPredefinedFont.'.ttf';
			$fmcfCpyFrmWoffFl = FMCF_DIR_PATH.'fonts/'.$fmcfGetPredefinedFont.'.woff';
			$fmcfCpyFrmWoff2Fl = FMCF_DIR_PATH.'fonts/'.$fmcfGetPredefinedFont.'.woff2';
			$fmcfCpyToTtfFl = FMCF_UPLOAD_PATH.$fmcfGetPredefinedFont.'.ttf';
			$fmcfCpyToWoffFl = FMCF_UPLOAD_PATH.$fmcfGetPredefinedFont.'.woff';
			$fmcfCpyToWoff2Fl = FMCF_UPLOAD_PATH.$fmcfGetPredefinedFont.'.woff2';

			if(copy($fmcfCpyFrmTtfFl,$fmcfCpyToTtfFl) && copy($fmcfCpyFrmWoffFl,$fmcfCpyToWoffFl) && copy($fmcfCpyFrmWoff2Fl,$fmcfCpyToWoff2Fl)){

				fmcf_store_file_data($fmcfGetPredefinedFont);
				fmcf_generate_css();

				$fmcfSuccMsgArr['status'] = 1;
				$fmcfSuccMsgArr['msg'] = 'Font is Added successfully';
			}
			else
			{
				$fmcfSuccMsgArr['status'] = 0;
				$fmcfSuccMsgArr['msg'] = 'Font is Not added successfully';
			}
		}
		else
		{
			$fmcfSuccMsgArr['status'] = 0;
			$fmcfSuccMsgArr['msg'] = 'Font is Not added successfully';
		}
	}
	else
	{
		$fmcfSuccMsgArr['status'] = 0;
		$fmcfSuccMsgArr['msg'] = 'Font is Not added successfully';
	}

	return $fmcfSuccMsgArr;
}
function fmcf_sanitize_text_or_array_field($array_or_string)
{
	if (is_string($array_or_string)) {
		$array_or_string = sanitize_text_field($array_or_string);
	} elseif (is_array($array_or_string)) {
		foreach ($array_or_string as $key => &$value) {
			if (is_array($value)) {
				$value = fmcf_sanitize_text_or_array_field($value);
			} else {
				$value = sanitize_text_field(str_replace('%20','+',$value));
			}
		}
	}

	return $array_or_string;
}
function fmcf_store_or_upd_clr_data($fmcfClrData)
{
	$getFmcfClrData = fmcf_sanitize_text_or_array_field($fmcfClrData);
    $getFmcfClrOptValArr = [];
    $getFmcfClrValArr = [];

    if(!empty($getFmcfClrData['fmcfSetClr']))
	{
	    foreach($getFmcfClrData['fmcfSetClr'] as $key => $fmcfVal)
	    {
	    	$getFmcfClrValArr[$key] = $fmcfVal;
	    }
    }

    $getFmcfTotEle = count($GLOBALS['fmcfSetFieldColorArr']);
    $finalFmcfJsonArr = array();
    for($i=0;$i<=$getFmcfTotEle;$i++)
	{
		if(isset($getFmcfClrData['fmcfActivate'.$i]) && $getFmcfClrData['fmcfActivate'.$i] == 1 && isset($getFmcfClrValArr[$GLOBALS['fmcfSetFieldColorArr'][$i]]))
		{
			$finalFmcfJsonArr[$i] = array('tag' => $GLOBALS['fmcfSetFieldColorArr'][$i],
							  'color' =>  $getFmcfClrValArr[$GLOBALS['fmcfSetFieldColorArr'][$i]],
							  'active' => $getFmcfClrData['fmcfActivate'.$i]
				);
		}
	}


   	if(!empty($finalFmcfJsonArr))
	{
		$fmcfSetOptClrVal = json_encode($finalFmcfJsonArr);	
		update_option('fmcf_clr_opt_set',$fmcfSetOptClrVal);
		$fmcfSuccMsgArr['status'] = 1;
		$fmcfSuccMsgArr['msg'] = 'Color is set successfully';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;
	}
	else
	{
		delete_option('fmcf_clr_opt_set');
		$fmcfSuccMsgArr['status'] = 1;
		$fmcfSuccMsgArr['msg'] = 'Changes is set successfully';
		$GLOBALS['fmcf_action_response'] = $fmcfSuccMsgArr;
	}

	fmcf_generate_css();
   
	return $fmcfSuccMsgArr;
}

function fmcf_get_clr_set_data()
{
	$fmcfPrepOptArr = array();
	if (get_option('fmcf_clr_opt_set')){
		$fmcfGetOptValArr = json_decode(get_option('fmcf_clr_opt_set'));
		foreach($fmcfGetOptValArr as $fmcfOptVal)
		{
			$fmcfPrepOptArr[$fmcfOptVal->tag] = array('color' => $fmcfOptVal->color,'active' => $fmcfOptVal->active); 
		}
	}

	return $fmcfPrepOptArr;
}

function fmcf_get_tag_clr_data()
{
	$fmcfClrDataArr = array();
	if (get_option('fmcf_clr_opt_set')){
		$fmcfGetOptValArr = json_decode(get_option('fmcf_clr_opt_set'));
		foreach($fmcfGetOptValArr as $fmcfOptVal)
		{
			$fmcfClrDataArr[$fmcfOptVal->tag] = $fmcfOptVal->color; 
		}	
	}

	return $fmcfClrDataArr;
}

function fmcf_get_gFont_list($fmcfGfontPostData)
{
	global $wpdb;
	$fmcfFontListTable = $wpdb->prefix . 'fmcf_fonts_list';

	$fmcfGfontListArr = array(
		'fmcf_gfont_tbl_rows_flag' => 0,
		'fmcf_gfont_tbl_data' => ''
	);

	if($wpdb->get_var("SHOW TABLES LIKE '$fmcfFontListTable'") == $fmcfFontListTable) {
		$fmcfResults = $wpdb->get_results(
		    "SELECT org_name FROM $fmcfFontListTable WHERE gfont_name='".$fmcfGfontPostData['fmcfChkGfntNm']."'",ARRAY_A
		);

		$fmcfTotRow = $wpdb->num_rows;

		if($fmcfTotRow > 0)
		{
			$fmcfResDataArr = array();
			foreach($fmcfResults as $key => $val)
			{
				$fmcfResDataArr[] = $val['org_name'];
			}

			$fmcfGfontListArr = array(
			'fmcf_gfont_tbl_rows_flag' => 1,
			'fmcf_gfont_tbl_data' => $fmcfResDataArr,
			);
		}				
	}

	return $fmcfGfontListArr;
}
