<?php
if ( ! defined( 'ABSPATH' ) ) exit;


//保存前台提交的信息
function wysj_bt_pop_save_submit()
{	
	global $wyBtpopOptions;
	$label =  $wyBtpopOptions['formLabel'];
	$name =  $wyBtpopOptions['formName'];
	$type =  $wyBtpopOptions['formType'];
	$captchaSwitch =  $wyBtpopOptions['captcha'];
	$content =  $wyBtpopOptions['formContent'];
	$captcha = $_SESSION['wysj_bp_captcha_session'];
	//当开启验证码时
	if( $captchaSwitch == "enable"){
		//当验证码验证通过时
		if ($_POST['wysj_bp_captcha'] == $captcha) {
			$json = array();
			for ($i=0; $i < count($label); $i++) {
				//防止出现特殊字符，将其转为encode
				$currentName = sanitize_text_field($_POST[$name[$i]]);
				$json[ urlencode($label[$i]) ] = urlencode($currentName);
			}
			$json=json_encode($json);
			global $wpdb;
			$data['userinfo'] = urldecode($json);
			//获取正确时间
			$tzs = get_option('timezone_string'); 
			$tzobj = timezone_open($tzs); 
			$now = date_create('now',$tzobj ); 
			$data['time'] = date_format($now, 'Y-m-d H:i:s');
			$data['status'] = 0;
			$result = $wpdb->insert(WYSJ_POP_TABLE, $data);
			//验证码失效
			unset($_SESSION['wysj_bp_captcha_session']);
			echo $result;
			exit;
		}else{
			unset($_SESSION['wysj_bp_captcha_session']);
			echo "captcha_error";
			exit;
		}
	}else{
		//未开启验证码时
		$json = array();
		for ($i=0; $i < count($label); $i++) {
			$currentName = sanitize_text_field($_POST[$name[$i]]);
			//防止出现特殊字符，将其转为encode
			$json[ urlencode($label[$i]) ] = urlencode($currentName);
		}
		$json=json_encode($json);
		global $wpdb;
		$data['userinfo'] = urldecode($json);
		//获取正确时间
		$tzs = get_option('timezone_string'); 
		$tzobj = timezone_open($tzs); 
		$now = date_create('now',$tzobj ); 
		$data['time'] = date_format($now, 'Y-m-d H:i:s');
		$data['status'] = 0;
		$result = $wpdb->insert(WYSJ_POP_TABLE, $data);
		echo $result;
		exit;
	}
	
	
}

add_action( 'wp_ajax_nopriv_wysj_bt_pop_save_submit', 'wysj_bt_pop_save_submit' );
add_action( 'wp_ajax_wysj_bt_pop_save_submit', 'wysj_bt_pop_save_submit' );

//删除询单条目
function wysj_bt_pop_delitem(){
	global $wpdb;
	$id = sanitize_text_field($_POST['id']);
	$table = WYSJ_POP_TABLE;
	echo $wpdb->query( 'DELETE FROM '.$table.' WHERE id in( '.$id.' )' );  
}
add_action( 'wp_ajax_wysj_bt_pop_delitem', 'wysj_bt_pop_delitem' );

//置为已读
function wysj_bt_pop_readitem(){
	global $wpdb;
	$id = sanitize_text_field($_POST['id']);
	$table = WYSJ_POP_TABLE;
	echo $wpdb->query( 'UPDATE '.$table.' SET status=1 WHERE id in( '.$id.' )' );   
}
add_action( 'wp_ajax_wysj_bt_pop_readitem', 'wysj_bt_pop_readitem' );
?>