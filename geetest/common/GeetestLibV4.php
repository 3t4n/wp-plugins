<?php

/**
 * 极验行为式验证安全平台，php 网站主后台包含的库文件
 *
 * @author Tanxu
 */
class GeetestLib
{
    public static $connectTimeout = 1;
    public static $socketTimeout  = 1;

    public function __construct($captcha_id, $captcha_key, $data)
    {
        $this->captcha_id  = $captcha_id;
        $this->captcha_key = $captcha_key;
        $this->api_server = "https://gcaptcha4.geetest.com";
        $this->data = $data;
    }



    /**
     * 获取验证结果
     *
     * @return true/false
     */
    public function get_response()
    {
        // 3.生成签名
        // 生成签名使用标准的hmac算法，使用用户当前完成验证的流水号lot_number作为原始消息message，使用客户验证私钥作为key
        // 采用sha256散列算法将message和key进行单向散列生成最终的签名
        $sign_token = hash_hmac('sha256', $this->data['lot_number'], $this->captcha_key);

        // 4.上传校验参数到极验二次验证接口, 校验用户验证状态
        // captcha_id 参数建议放在 url 后面, 方便请求异常时可以在日志中根据id快速定位到异常请求
        $query = array(
            "lot_number" => $this->data['lot_number'],
            "captcha_output" => $this->data['captcha_output'],
            "pass_token" => $this->data['pass_token'],
            "gen_time" => $this->data['gen_time'],
            "sign_token" => $sign_token
        );
        $body = array(
            'body'=>$query,
            'timeout'=>'5'
        );
        $url = sprintf($this->api_server . "/validate" . "?captcha_id=%s", $this->captcha_id);
        $response = wp_remote_post($url, $body);
        $raw_body = wp_remote_retrieve_body($response);
        $obj = json_decode($raw_body, true);
        if (array_key_exists('result', $obj) && $obj['result'] == 'success') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $err
     */
    private function triggerError($err)
    {
        trigger_error($err);
    }
}
