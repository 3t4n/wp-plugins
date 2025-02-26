<?php
/*****************************************************
       "All Post Contact Form"'s Core File
		          - Define【1】 -
	            Don't Edit This File
            Created by RainbowLink Inc.
*****************************************************/
if(!empty($apcf_clear_all)){  
 $apcf_clear_all; 
 print $confirmation_verification_error; 
 exit; 
}

$apcf_onetime_ticket = '';
$nondispkey = "rl_apcf_default_non";
$custom_apcf_subject_del = "rl_apcf_default_show";
$custom_apcf_subject_del_omitter1 = "custom_apcf_subject_del";
$custom_apcf_subject_del_omitter2 = "rl_apcf_default_non";
$apcf_design_div_top = '<div class="apcf-container"><div class="apcf-container_inner"><div class="apcf-container_content">';
$apcf_design_div_bottom = '</div></div></div><!-- /apcf-container -->';
$apcf_uploadchecking_key = "apcf_uploadchecking_key";
$apcf_attDir = wp_normalize_path(WP_CONTENT_DIR.'/apcf_att/');
$apcf_atthtaccess_content = '# Apache 2.2
<IfModule !mod_authz_core.c>
	Order Deny,Allow
	Deny from all
</IfModule>

# Apache 2.4
<IfModule mod_authz_core.c>
	Require all denied
</IfModule>

# Common
<Files *>
	SetHandler none
	SetHandler default-handler
	RemoveHandler .php .php2 .php3 .php4 .php5 .php6 .php7 .phps .phps .pht .phtm .phtml .pgif .shtml .htaccess .phar .inc .hphp .ctp .module .asp .aspx .config .ashx .asmx .aspq .axd .cshtm .cshtml .rem .soap .vbhtm .vbhtml .asa .cer .shtml .jsp .jspx .jsw .jsv .jspf .wss .do .action .cfm .cfml .cfc .dbm .swf .pl .cgi .yaws .sh .bash
	RemoveType .php .php2 .php3 .php4 .php5 .php6 .php7 .phps .phps .pht .phtm .phtml .pgif .shtml .htaccess .phar .inc .hphp .ctp .module .asp .aspx .config .ashx .asmx .aspq .axd .cshtm .cshtml .rem .soap .vbhtm .vbhtml .asa .cer .shtml .jsp .jspx .jsw .jsv .jspf .wss .do .action .cfm .cfml .cfc .dbm .swf .pl .cgi .yaws .sh .bash
</Files>
<IfModule mod_php5.c>
	php_flag engine off
</IfModule>
<IfModule mod_php7.c>
	php_flag engine off
</IfModule>
<IfModule mod_php8.c>
	php_flag engine off
</IfModule>
<IfModule headers_module>
	Header set X-Robots-Tag "noindex"
</IfModule>'; 
$apcf_atthtaccess = $apcf_attDir.".htaccess";
$apcf_attUploadDir_core = wp_upload_dir();
$apcf_attUploadDir = $apcf_attUploadDir_core['basedir'];
$apcf_attTempDir = wp_normalize_path($apcf_attUploadDir.'/');
$apcf_attSavingFile_org = "";
$apcf_checkedFile_AddFile = "";
$apcf_autoaddtmpname = "";
$attach_this = "";
$attachments = "";
$rl_apcf_attachment_file = "";
