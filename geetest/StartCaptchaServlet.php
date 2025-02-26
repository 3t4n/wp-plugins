<?php
/**
 * 使用Get的方式返回：challenge和capthca_id 此方式以实现前后端完全分离的开发模式 专门实现failback
 * @author Tanxu
 */
//error_reporting(0);
require_once dirname(__FILE__) . '/common/GeetestLibV3.php';
require_once dirname(__FILE__) . '/config.php';
//$public_key = "00e1966cb7f8ba32a36fbab87b64af51";
//$private_key = "f9306a11eeab71a0bbec11fbd8ca228a";
$GtSdk = new GeetestV3($config_options['public_key'], $config_options['private_key']);
//$GtSdk = new GeetestLib($public_key, $private_key);

session_start();

$data = array(
    "user_id" => "", # 网站用户id
    "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
    "ip_address" => "" # 请在此处传输用户请求验证时所携带的IP
);

$status = $GtSdk->pre_process($data, 1);
$_SESSION['gtserver'] = $status;
$_SESSION['user_id'] = $data['user_id'];
echo $GtSdk->get_response_str();
