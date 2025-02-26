<?php

namespace AkaySMSGateway;

class Akay_Ippanel {

    public static function sendSMS($gateway_fields, $mobile, $message, $test_call) {
        return self::process_sms($gateway_fields, $mobile, $message, $test_call);
    }

    public static function process_sms($gateway_fields, $mobile, $message, $test_call) {
        $gateway_uname = $gateway_fields['uname'];
        $gateway_password = $gateway_fields['password'];
        $sender = $gateway_fields['sender'];
        $send_patterncode = $gateway_fields['send_patterncode'];
        $patterncode = $gateway_fields['patterncode'];
        $patternvars = $gateway_fields['patternvars'];

        if ($send_patterncode == "ok") {
            $keys = explode("\n", $patternvars);
            $values = explode("\n", $message);
            $input_data = array_combine($keys, $values);

            $username = $gateway_uname;
            $password = $gateway_password;
            $from = $sender;
            $pattern_code = $patterncode;
            $to = wp_json_encode(array($mobile));

            $url = "https://ippanel.com/patterns/pattern?username=$username&password=" . urlencode($password) . "&from=$from&to=" . wp_json_encode($to) . "&input_data=" . urlencode(wp_json_encode($input_data)) . "&pattern_code=$pattern_code";

            $args = array(
                'method' => 'POST',
                'body' => $input_data,
                'timeout' => 15,
            );

            $response = wp_remote_post($url, $args);

            if (is_wp_error($response)) {
                return false;
            }

            $code = wp_remote_retrieve_response_code($response);

            if ($test_call) return wp_remote_retrieve_body($response);

            return (200 <= $code && $code < 300);
        } else {
            $params = array(
                'uname' => $gateway_uname,
                'pass' => $gateway_password,
                'to' => wp_json_encode(array($mobile)),
                'from' => $sender,
                'message' => $message,
                'op' => 'send',
            );

            $url = 'https://ippanel.com/services.jspd';
            $args = array(
                'method' => 'POST',
                'body' => $params,
                'timeout' => 15,
            );

            $response = wp_remote_post($url, $args);

            if (is_wp_error($response)) {
                return false;
            }

            $code = wp_remote_retrieve_response_code($response);

            if ($test_call) return wp_remote_retrieve_body($response);

            return (200 <= $code && $code < 300);
        }
    }

}
