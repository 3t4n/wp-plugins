<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function wysj_bottom_pop_createTable() {
	global $wpdb;
		$table_name = WYSJ_POP_TABLE;
		if ($wpdb->get_var( "show tables like '$table_name'" ) != $table_name){
			require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
			$sql = "CREATE TABLE " . $table_name . " (
														id int(11) NOT NULL AUTO_INCREMENT,
														userinfo VARCHAR(200) default NULL,
														time datetime default NULL,
														status VARCHAR(200) default NULL,
														PRIMARY KEY (`id`)
			);
			";
			dbDelta ( $sql );
		}
}
add_action('init', 'wysj_bottom_pop_createTable');

function wysj_bottom_pop_activate(){
	require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-write-css.php');
	require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-write-js.php');
	$wyBtpopOptions = array();
	$wyBtpopOptions['ver'] = '1.0.0';
	$wyBtpopOptions['email'] = '';
	$wyBtpopOptions['type'] = 'pop';
	$wyBtpopOptions['captcha'] = 'enable';
	$wyBtpopOptions['enable'] = 'enable';
	$wyBtpopOptions['display'] = 'all';
	$wyBtpopOptions['repair'] = '70';
	$wyBtpopOptions['delete'] = 'no';
	$wyBtpopOptions['welcome'] = '留言已收到，感谢您的咨询，我们会在第一时间为您回复！';
	$wyBtpopOptions['formLabel'][0] = '姓名';
	$wyBtpopOptions['formLabel'][1] = '电话';
	$wyBtpopOptions['formLabel'][2] = '性别';
	$wyBtpopOptions['formName'][0] = 'name';
	$wyBtpopOptions['formName'][1] = 'phone';
	$wyBtpopOptions['formName'][2] = 'sex';
	$wyBtpopOptions['formType'][0] = 'text';
	$wyBtpopOptions['formType'][1] = 'text';
	$wyBtpopOptions['formType'][2] = 'select';
	$wyBtpopOptions['formContent'][0] = '';
	$wyBtpopOptions['formContent'][1] = '';
	$wyBtpopOptions['formContent'][2] = '男,女';
	$wyBtpopOptions['formWidth'][0] = 'two';
	$wyBtpopOptions['formWidth'][1] = 'two';
	$wyBtpopOptions['formWidth'][2] = 'one';
	$wyBtpopOptions['required'][0] = 'required';
	$wyBtpopOptions['required'][1] = 'required';
	$wyBtpopOptions['required'][2] = 'unrequired';

	$wyBtpopOptions['adimg'] = WYSJ_POP_URL.'/asset/images/top-img.png';
	$wyBtpopOptions['madimg'] = WYSJ_POP_URL.'/asset/images/m-top-img.png';
	$wyBtpopOptions['adimgOut'] = '70';
	$wyBtpopOptions['closeimg'] = WYSJ_POP_URL.'/asset/images/close.png';
	$wyBtpopOptions['contentWidth'] = '1100';
	$wyBtpopOptions['contentBg'] = '#ffffff';
	$wyBtpopOptions['submitFontColor'] = '#ffffff';
	$wyBtpopOptions['submitBgColor'] = '#ff6600';

	$wyBtpopOptions['cssVer'] = time();
	add_option("wysj_bt_pop_options",$wyBtpopOptions);

	wysj_bottom_pop_createTable();
	//创建文件
	if (!file_exists(WYSJ_POP_UPLOADS_DIR."/5usujian-bottom-pop-custom.css")){
        mkdir (WYSJ_POP_UPLOADS_DIR,0777,true);
        $file = fopen(WYSJ_POP_UPLOADS_DIR."/5usujian-bottom-pop-custom.css", "x+") or die("无法读取/写入文件，请确保文件/wp-content/uploads/5usujian-bottom-pop/5usujian-bottom-pop-custom.css有写入权限！");
        fclose($file);
    }
    wysj_btpop_write_css();
	wysj_btpop_write_js();
}

?>