<?php

if ( ! defined( 'ABSPATH' ) ) exit;
function wysj_btpop_check_field_arr( $data ){
	$arr = array();
	$data_length = count( $data );
	for( $i = 0; $i < $data_length; $i++ ){
		$arr[] = sanitize_text_field( $data[$i] );
	}
	return $arr;
}
function wysj_btpop_update_option() {
	// if ( isset($_POST ['wysj_btpop_enable']) ){
	// 	$wyBtpopOptions["enable"] = sanitize_text_field($_POST['wysj_btpop_enable']);
	// }
	if(count($_POST) === 0){
		return;
	}
	$wysjServOptions = array();
	if (isset($_POST ['wysj_btpop_type'])){
		$wyBtpopOptions["type"] = sanitize_text_field($_POST ['wysj_btpop_type']);
	}
	if (isset($_POST ['wysj_btpop_captcha'])){
		$wyBtpopOptions["captcha"] = sanitize_text_field($_POST ['wysj_btpop_captcha']);
	}
	if (isset($_POST ['wysj_btpop_display'])){
		$wyBtpopOptions["display"] = sanitize_text_field($_POST ['wysj_btpop_display']);
	}
	if (isset($_POST ['wysj_btpop_repair'])){
		$wyBtpopOptions["repair"] = sanitize_text_field($_POST ['wysj_btpop_repair']);
	}
	if (isset($_POST ['wysj_btpop_welcome'])){
		$wyBtpopOptions["welcome"] = sanitize_text_field($_POST ['wysj_btpop_welcome']);
	}
	if (isset($_POST ['wysj_btpop_delete'])){
		$wyBtpopOptions["delete"] = sanitize_text_field($_POST ['wysj_btpop_delete']);
	}
	if (isset ( $_POST ['wysj_btpop_formLabel'] )){
		$wyBtpopOptions["formLabel"] = wysj_btpop_check_field_arr($_POST['wysj_btpop_formLabel']);
	}
	if (isset ( $_POST ['wysj_btpop_formName'] )){
		$wyBtpopOptions["formName"] = wysj_btpop_check_field_arr($_POST['wysj_btpop_formName']);
	}
	if (isset ( $_POST ['wysj_btpop_formType'] )){
		$wyBtpopOptions["formType"] = wysj_btpop_check_field_arr($_POST['wysj_btpop_formType']);
	}
	if (isset ( $_POST ['wysj_btpop_formContent'] )){
		$wyBtpopOptions["formContent"] = wysj_btpop_check_field_arr($_POST['wysj_btpop_formContent']);
	}
	if (isset ( $_POST ['wysj_btpop_formWidth'] )){
		$wyBtpopOptions["formWidth"] = wysj_btpop_check_field_arr($_POST['wysj_btpop_formWidth']);
	}
	if (isset ( $_POST ['wysj_btpop_required'] )){
		$wyBtpopOptions["required"] = wysj_btpop_check_field_arr($_POST['wysj_btpop_required']);
	}
	if (isset($_POST ['wysj_btpop_cssVer'])){
		$wyBtpopOptions["cssVer"] = sanitize_text_field($_POST['wysj_btpop_cssVer']);
	}
	if (isset($_POST ['wysj_btpop_adimg'])){
		$wyBtpopOptions["adimg"] = sanitize_text_field($_POST ['wysj_btpop_adimg']);
	}
	if (isset($_POST ['wysj_btpop_adimgOut'])){
		$wyBtpopOptions["adimgOut"] = sanitize_text_field($_POST ['wysj_btpop_adimgOut']);
	}
	if (isset($_POST ['wysj_btpop_closeimg'])){
		$wyBtpopOptions["closeimg"] = sanitize_text_field($_POST ['wysj_btpop_closeimg']);
	}
	if (isset($_POST ['wysj_btpop_submitBgColor'])){
		$wyBtpopOptions["submitBgColor"] = sanitize_text_field($_POST ['wysj_btpop_submitBgColor']);
	}
	if (isset($_POST ['wysj_btpop_submitFontColor'])){
		$wyBtpopOptions["submitFontColor"] = sanitize_text_field($_POST ['wysj_btpop_submitFontColor']);
	}
	if (isset($_POST ['wysj_btpop_contentWidth'])){
		$wyBtpopOptions["contentWidth"] = sanitize_text_field($_POST ['wysj_btpop_contentWidth']);
	}
	if (isset($_POST ['wysj_btpop_contentBg'])){
		$wyBtpopOptions["contentBg"] = sanitize_text_field($_POST ['wysj_btpop_contentBg']);
	}
	update_option("wysj_bt_pop_options",$wyBtpopOptions);
	wysj_btpop_write_css();
	wysj_write_js();
}
wysj_btpop_update_option();

?>