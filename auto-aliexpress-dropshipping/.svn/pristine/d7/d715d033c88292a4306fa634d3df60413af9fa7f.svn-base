<?php
if (!function_exists('auto_aliexpress_remote_get')) {

function auto_aliexpress_remote_get($url, $args = array()) {
    $def_args = array(
        'headers' => array('Accept-Encoding' => ''),
        'timeout' => 30,
        'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0',
        // 'verify' => false,
        // 'sslverify' => false,
        // 'verifyname' => false
    );


    if (!is_array($args)) {
        $args = array();
    }

    foreach ($def_args as $key => $val) {
        if (!isset($args[$key])) {
            $args[$key] = $val;
        }
    }

    if (isset($args['headers'])) {
        $headers = $args['headers'];
        unset($args['headers']);
    }


    // If we've got cookies, use and convert them to Requests_Cookie.
    if (!empty($args['cookies'])) {
        $cookie_jar = new Requests_Cookie_Jar();
        $tmp_cookies = array();
        foreach ($args['cookies'] as $cookie) {
            $tmp_cookies[] = $cookie_jar->normalize_cookie($cookie);
        }
        $args['cookies'] = $tmp_cookies;
    }

    try {
        // Avoid issues where mbstring.func_overload is enabled.
        if (function_exists('mbstring_binary_safe_encoding')) {
            mbstring_binary_safe_encoding();
        } else {
            auto_aliexpress_error_log('WARNING! function mbstring_binary_safe_encoding is not exist!');
        }

        $requests_response = Requests::get($url, $headers, $args);

        // Convert the response into an array
        $http_response = new Auto_Aliexpress_Requests_Response($requests_response);
        $response = $http_response->to_array();

        // Add the original object to the array.
        //$response['http_response'] = $http_response;

        if (function_exists('reset_mbstring_encoding')) {
            reset_mbstring_encoding();
        } else {
            auto_aliexpress_error_log('WARNING! function reset_mbstring_encoding is not exist!');
        }
    } catch (Requests_Exception $e) {
        $response = new WP_Error('http_request_failed', $e->getMessage());
    } catch (Throwable $e) {
        auto_aliexpress_print_throwable($e);
        $response = new WP_Error('php_error', 'PHP Error');
    } catch (Exception $e) {
        auto_aliexpress_print_throwable($e);
        $response = new WP_Error('php_error', 'PHP Error');
    }
    return $response;
}

}