<?php

namespace AkaySMSGateway;

class Akay_Melipayamak {

    public static function sendSMS($gateway_fields, $mobile, $message, $test_call) {
        return self::process_sms($gateway_fields, $mobile, $message, $test_call);
    }

    public static function process_sms($gateway_fields, $mobile, $message, $test_call) {
        $gateway_uname = $gateway_fields['uname'];
        $gateway_password = $gateway_fields['password'];
        $sender = $gateway_fields['sender'];
        $send_patterncode = $gateway_fields['send_patterncode'];
        $patterncode = $gateway_fields['patterncode'];

        $url = $send_patterncode == "ok" 
            ? "https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber" 
            : "https://rest.payamak-panel.com/api/SendSMS/SendSMS";

        $data = [
            'username' => $gateway_uname,
            'password' => $gateway_password,
            'text'     => $message,
            'to'       => $mobile
        ];

        if ($send_patterncode == "ok") {
            $data['bodyId'] = $patterncode;
        }

        $response = wp_remote_post($url, [
            'body'      => $data,
            'timeout'   => 15,
            'sslverify' => false
        ]);

        if (is_wp_error($response)) {
            return false; // خطا در درخواست
        }

        $response_code = wp_remote_retrieve_response_code($response);
        $response_body = wp_remote_retrieve_body($response);

        if ($test_call) {
            return $response_body;
        }

        return $response_code >= 200 && $response_code < 300;
    }

}