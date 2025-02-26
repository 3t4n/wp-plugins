<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
           - Checking Attachment File -
            Created by RainbowLink Inc.
             
======= About this file  =================          
(l.53) Mime-Limitation of WordPress-default (　←  You can modify if need )
 
(l.63) Mime-Limitation of this plugin: sh, py, php (　←  recommend that you do NOT modify 　)
[Reference if you use Apache2] See sub2-l.23 = $apcf_atthtaccess_content ( = .htaccess )
 
(l.69) Mime-Limitation of Users: MODIFY: allpost-contactform-upload_mime.php
 
(l.175) Content-Filter of this plugin (　←  recommend that you do NOT modify 　)
[Reference] See Message at the Admin Window ( About using any anti-malware plugin )
             
======= How to Manage Mime Types ================= 
https://www.Rainbow-Link.com/FAQ.htm?&faq_id=448   
https://jp.Rainbow-Link.com/FAQ.htm?&faq_id=447           
==================================================     
*****************************************************/
if(!isset($_FILES["attachment_file"])){
 echo $rl_apcf_public_upload_error_msg; 
 exit; 
} 

$apcf_attUserFile_type_org = basename($_FILES['attachment_file']['type']);
$apcf_attUserFile_type_org = strtolower($apcf_attUserFile_type_org);
$apcf_attUserFile_type_att = strtolower($_FILES['attachment_file']['type']); 

/*~~~~~~~~~~~~~~~ Checking an Uploading File ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
if(is_uploaded_file($_FILES['attachment_file']['tmp_name'])){

 $apcf_attUserFile_Path = $_FILES['attachment_file']['tmp_name'];
 /* This plugin default-filter: Empty-File is not allowed */
 $apcf_attUserFile_Size = filesize($apcf_attUserFile_Path);
 if($apcf_attUserFile_Size === 0){
    echo $rl_apcf_public_upload_error_msg; 
    exit; 
 } 

 /* This plugin default-filter: Ghost-File is not allowed */
 $apcf_uploadingFile = wp_normalize_path($apcf_attUserFile_Path);
 $apcf_uploadchecking_key = $apcf_uploadchecking_key?$apcf_uploadchecking_key : 'apcf_'.$apcf_uploadingFile.'_file'; 
 if(!is_file($apcf_uploadingFile)){ 
    echo $rl_apcf_public_upload_error_msg; 
    exit;
 }
 
 if(!empty($apcf_attUserFile_type_org)){
    /* Mime-Limitation of WordPress-default */
    $apcf_WPallowedMimes = get_allowed_mime_types();
    $apcf_attUserFile_WPtypeCheck = in_array($apcf_attUserFile_type_att, $apcf_WPallowedMimes);
    if($apcf_attUserFile_WPtypeCheck !== FALSE){
    // Next, Users-custom-filter.... DON'T MODIFY "Mime-Limitation of this plugin ( default )"....
    }else{
        echo $rl_apcf_public_upload_error_msg; 
        exit;
    }      
     
    /* Mime-Limitation of this plugin ( default ): sh, py, php ←　DON'T MODIFY */     
    if(stristr($apcf_attUserFile_type_org,"sh") !== FALSE || stristr($apcf_attUserFile_type_org,"py") !== FALSE || stristr($apcf_attUserFile_type_org,"php") !== FALSE){
        echo $rl_apcf_public_upload_error_msg; 
        exit; 
    } 

    /* Mime-Limitation of user ( custom ): allpost-contactform-upload_mime.php  */
    include plugin_dir_path( __FILE__ )."allpost-contactform-upload_mime.php";
    $apcf_attUserFile_typeCheck = in_array($apcf_attUserFile_type_org, $apcf_allowedMimes); 
    /* Mime(s) allowed by the user of this plugin in the whitelist will be passed through. */ 
    if($apcf_attUserFile_typeCheck !== FALSE){
        $apcf_attFileType = $apcf_attUserFile_type_att;
        if(stristr($apcf_attFileType,"plain") !== FALSE){
           $apcf_attFileType = $apcf_attUserFile_type_att.'.plain';
        }
    /* Mime(s) not-allowed by the user of this plugin in the whitelist will NOT be allowed to pass through. Everyone can't upload via this plugin. */ 
    }else{
        echo $rl_apcf_public_upload_error_msg; 
        exit;
    } 
 
    /* This plugin's Attachment-File-Saved-Dir: /wp-content/apcf_att/ ( See: allpost-contactform-sub2_define1.php ) */ 
    if(!is_dir($apcf_attDir)){
        mkdir($apcf_attDir,0700); 
    } 
 
    /* This plugin default-filter: This plugin's Attachment-File-Saved-Dir is not allowed to be linked by another Dir: If linked, this plugin will delete the Attachment-File-Saved-Dir and create new one automatically. */
    if(is_dir($apcf_attDir)){
        if(is_link($apcf_attDir)){
           rm($apcf_attDir); 
           mkdir($apcf_attDir,0700);
        }
    } 
    
    /* Preparing .htaccess */      
    if(!function_exists('insert_with_markers')){
       require_once ABSPATH.'wp-admin/includes/misc.php';
    } 
 
    /* Creating .htaccess ( See: allpost-contactform-sub2_define1.php ) */   
    if(!file_exists($apcf_atthtaccess)){
       $apcf_attCreated = insert_with_markers($apcf_atthtaccess, 'APCF_allpost-contactform', $apcf_atthtaccess_content);
       chmod($apcf_atthtaccess,0644); 
    }else{
       chmod($apcf_atthtaccess,0644);
    }
      
    if(is_dir($apcf_attDir)){
       chmod($apcf_attDir,0700);
    } 
      
    if(!file_exists($apcf_atthtaccess)){
       chmod($apcf_atthtaccess,0644);
    } 
    
    /* This plugin default-filter: Change extension to all lower case  */
    $apcf_attSavingFile_org = sanitize_file_name($_FILES['attachment_file']['name']); 
    $apcf_attSavingFile_valid_ext = '.'.$apcf_attUserFile_type_org;
    $apcf_attSavingFile_low = strtolower($apcf_attSavingFile_org);
    $apcf_attSavingFile_creating = explode($apcf_attSavingFile_valid_ext,$apcf_attSavingFile_low);
    $apcf_attSavingFile_Name_valid = $apcf_attSavingFile_creating[0];
    /* This plugin default-filter: Change filename if cp932 */    
 	$apcf_attSavingFile_Name_valid_1 = mb_convert_encoding($apcf_attSavingFile_Name_valid, "cp932", "utf8");
    if($apcf_attSavingFile_Name_valid !== $apcf_attSavingFile_Name_valid_1){
    $apcf_attSavingFile_Name_valid = mb_convert_encoding($apcf_attSavingFile_Name_valid, "cp932", "utf8");    
    }
    $apcf_checkedFile = $apcf_attSavingFile_Name_valid.$apcf_attSavingFile_valid_ext;
     
    if(strstr($apcf_attSavingFile_org, $apcf_checkedFile) !== FALSE){
        $apcf_checkedFile_Show = $apcf_checkedFile;
    }else{
        /* This plugin default-filter: Change filename if cp932 */    
        $apcf_attSavingFile_org_1 = mb_convert_encoding($apcf_attSavingFile_org, "cp932", "utf8");
        if($apcf_attSavingFile_org !== $apcf_attSavingFile_org_1){
          $apcf_attSavingFile_org = mb_convert_encoding($apcf_attSavingFile_org, "cp932", "utf8");    
        }
        /* If this plugin changes the extension, this plugin will show the original file name with original extension to the person who uploaded it at the Confirmation Window. */
        $apcf_checkedFile_Show = $apcf_checkedFile.' ( '.$apcf_attSavingFile_org.' )';
    } 

    /* Unique behavior of this plugin: This plugin does NOT use move_uploaded_file. ( For security-reason ) */
    $apcf_TempFile = $apcf_attTempDir.$apcf_checkedFile; 
    copy($apcf_attUserFile_Path,$apcf_TempFile); 
    $apcf_attFile = $apcf_attDir.$apcf_checkedFile; 

    /* If a file with the same name exists, this plugin will give the uploading file a different name. This plugin doesn't overwrite the original file with the same name. */
    if(file_exists($apcf_attFile)){
    $dating1 = date('Ymd'); 
    $rand1 = mt_rand(); 
    $apcf_autoaddtmpname = 'APCF_AUTO_ADD_DATE_'.$dating1.'_'.$rand1.str_replace('.', '', microtime(true)); 
    $apcf_checkedFile_AddFile = $apcf_autoaddtmpname.'_'.$apcf_checkedFile; 
    if(file_exists($apcf_TempFile)){
        unlink($apcf_TempFile);
    } 
    $apcf_TempFile = $apcf_attTempDir.$apcf_checkedFile_AddFile;
    copy($apcf_attUserFile_Path,$apcf_TempFile);
    $apcf_attFile = $apcf_attDir.$apcf_checkedFile_AddFile;
    }
    
    /* Creating Attatchment File in this plugin's Attachment-Save-Dir ( See: allpost-contactform-sub2_define1.php ) */ 
    copy($apcf_TempFile, $apcf_attFile); 
    if(file_exists($apcf_attFile)){
    chmod($apcf_attFile,0644);
    }
    
    /* Cleaning Temp-Dir  */
    if(file_exists($apcf_TempFile)){
        unlink($apcf_TempFile);
    }
    
    /* This plugin default-filter: Checking Content ( & Message at Admin Window: using any anti-malware plugin ) */
    if(file_exists($apcf_attFile)){  
        if($apcf_attUserFile_type_org !== "zip"){     
            $apcf_apcf_attFile_checker = file_get_contents($apcf_attFile);
            $apcf_apcf_attFile_checkedFile = str_replace( array("/etc","/proc","/boot","/tmp","/var/run","/sbin","/etc/passwd","/etc/aliases","/etc/hosts","httpd/unix-directory","/etc/shadow","/var","/usr",".sh",".inc","session_","array_","_open","NULL","INT","all_tables","sqlite_","mysql_","postgresql_","delete from","insert into","select from","'.or.'","exec"), array("/e*tc","/pro*c","/bo*ot","/tm*p","/var/ru*n","/sbi*n","/etc/pas*swd","/etc/alias*es","/etc/ho*sts","httpd/u*nix-directory","/etc/sha*dow","/va*r","/*usr",".shh",".in*c","ses*sion_","arr*ay_","_op*en","NU*LL","I*NT","all_ta*bles","sql*ite_","mys*ql_","postgr*esql_","dele*te from","inser*t into","sel*ect from","'.o*r.'","exe*c"), $apcf_apcf_attFile_checker);
            if($apcf_apcf_attFile_checker !== $apcf_apcf_attFile_checkedFile){
                unlink($apcf_attFile);
                echo $rl_apcf_public_upload_error_msg;
                exit;
            }
        }
    }
    
 }else{ //This plugin default-filter: Empty-File-Type is not allowed
    echo $rl_apcf_public_upload_error_msg;
    exit;
 } 

 if(!empty($apcf_checkedFile_AddFile)){
?> 
 <input name="rl_apcf_attachment_saved_as" style="display:none;" value="<?php echo $apcf_checkedFile_AddFile; ?>"> 
 <?php } ?> 
 <input name="rl_apcf_attachment_file" style="display:none;" value="<?php echo $apcf_checkedFile; ?>">
 <input name="rl_apcf_attachment_file_type" style="display:none;" value="<?php echo $apcf_attFileType; ?>">
 <?php echo $apcf_design_div_top; ?>
 <div class="apcf-content-key"><i class="fa fa-envelope" aria-hidden="true"></i></div>
 <div class="apcf-content-value"><?php echo $apcf_checkedFile_Show; ?></div>
 <?php echo $apcf_design_div_bottom;
}else{/*~~~~~~~~~~~~~~~~~~~~~ Can't Check the uploading file ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
 echo $rl_apcf_public_upload_error_msg;
 exit;
}

