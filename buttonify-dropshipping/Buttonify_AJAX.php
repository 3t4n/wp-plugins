<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Responsible for setting up AJAX functionality
 */
class Buttonify_AJAX extends Buttonify_OptionsManager
{

    public function textAction($nonce)
    {
        return $nonce;
    }

    public function buttonify_disconnect()
    {
        if (!isset($_POST['buttonify_nonce_field']) || !wp_verify_nonce(sanitize_text_field($_POST['buttonify_nonce_field']), 'buttonify_form_action')) {
            wp_send_json_success(array('msg' => 'Please refresh the page', 'code' => '400'));
            exit;
        }
        if (!current_user_can("manage_options")) {
            wp_send_json_success(array('msg' => 'This operation requires administrator permissions to proceed', 'code' => '400'));
            exit;
        }
        if (isset($_POST['user_id']) && sanitize_key($_POST['user_id'])) {
            $user_id = sanitize_text_field(wp_unslash($_POST['user_id']));
        }
	    if (isset($_POST['domain']) && sanitize_key($_POST['domain'])) {
		    $domain = sanitize_text_field(wp_unslash($_POST['domain']));
	    }
	    if (isset($_POST['buttonify_store_token']) && sanitize_key($_POST['buttonify_store_token'])) {
		    $buttonify_store_token = sanitize_text_field(wp_unslash($_POST['buttonify_store_token']));
	    }
        //Invoking the logout method
        $url = '/shop/auth/woo/disconnect?user_id=' . $user_id . '&domain=' . $domain . '&token=' . $buttonify_store_token;
        $data = $this->curlPost($url);
        $arr = json_decode($data);
        $code = $arr->code;
        $msg = $arr->message;
        if (200 == $code) {
            $this->updateOption('buttonify_user_id', '');
            $this->updateOption('buttonify_store_token', '');
            $this->updateOption('buttonify_connected', '0');
            //delete key delete authorized key information, including wp_woocommerce_api_keys of buttonify
            $status = $arr->result;
            global $wpdb;
            if (true === $status) {
                $wpdb->query(
                    "DELETE FROM {$wpdb->prefix}woocommerce_api_keys WHERE description LIKE '%buttonify%'"
                );
                $wpdb->query(
                    "DELETE FROM {$wpdb->prefix}wc_webhooks WHERE name LIKE '%buttonify%'"
                );
            }
        }
        wp_send_json_success(
            array(
                'msg' => $msg,
                'code' => $code,
            )
        );
    }

    public function buttonify_refresh()
    {
        if (!isset($_POST['buttonify_nonce_field']) || !wp_verify_nonce(sanitize_text_field($_POST['buttonify_nonce_field']), 'buttonify_form_action')) {
            wp_send_json_success(array('msg' => 'Please refresh the page', 'code' => '400'));
            exit;
        }
        if (!current_user_can("manage_options")) {
            wp_send_json_success(array('msg' => 'This operation requires administrator permissions to proceed', 'code' => '400'));
            exit;
        }
        if (isset($_POST['user_id']) && sanitize_key($_POST['user_id'])) {
            $user_id = sanitize_text_field(wp_unslash($_POST['user_id']));
        }
        if (isset($_POST['domain']) && sanitize_key($_POST['domain'])) {
            $domain = sanitize_text_field(wp_unslash($_POST['domain']));
        }
        if (isset($_POST['buttonify_store_token']) && sanitize_key($_POST['buttonify_store_token'])) {
            $buttonify_store_token = sanitize_text_field(wp_unslash($_POST['buttonify_store_token']));
        }
        //Call server
        $url = '/shop/sso/wooAuthRefresh?user_id=' . $user_id . '&domain=' . $domain . '&token=' . $buttonify_store_token;
        $data = $this->curlPost($url);
        $arr = json_decode($data);
        $code = $arr->code;
        $msg = $arr->message;
        if (200 == $code) {
            $token = $arr->result;
            $this->updateOption('buttonify_store_token', $token);
            $this->updateOption('buttonify_connected', '1');
            $this->updateOption('buttonify_shop_url', $domain);
            wp_send_json_success(
                array(
                    'msg' => $msg,
                    'code' => $code,
                )
            );
        } else {
			if (400 == $code && $msg == 'Buttonify not connected') {
				$this->updateOption('buttonify_connected', '0');
				$this->updateOption('buttonify_user_id', '');
				$this->updateOption('buttonify_store_token', '');
			}
            wp_send_json_success(
                array(
                    'msg' => $msg,
                    'code' => $code,
                )
            );
        }
    }

    public function buttonify_connect_key()
    {
        if (!isset($_POST['buttonify_nonce_field']) || !wp_verify_nonce(sanitize_text_field($_POST['buttonify_nonce_field']), 'buttonify_form_action')) {
            wp_send_json_success(array('msg' => 'Please refresh the page', 'code' => '400'));
            exit;
        }
        if (!current_user_can("manage_options")) {
            wp_send_json_success(array('msg' => 'This operation requires administrator permissions to proceed', 'code' => '400'));
            exit;
        }
        if (isset($_POST['user_id']) && sanitize_key($_POST['user_id'])) {
            $user_id = sanitize_text_field(wp_unslash($_POST['user_id']));
        }
        if (isset($_POST['domain']) && sanitize_key($_POST['domain'])) {
            $domain = sanitize_text_field(wp_unslash($_POST['domain']));
        }
        $url = 'buttonify_connect_key.html?user_id=' . $user_id . '&domain=' . $domain;
        $data = $this->curlPost($url);
        $arr = json_decode($data);
        $code = $arr->code;
        $msg = $arr->msg;
        if ('200' == $code) {
            $token = $arr->result->token;
            $user_id = $arr->result->user_id;
            $this->updateOption('buttonify_user_id', $user_id);
            $this->updateOption('buttonify_connected', '1');
            $this->updateOption('buttonify_shop_url', $domain);
            wp_send_json_success(
                array(
                    'msg' => $msg,
                    'code' => $code,
                )
            );
        } else {
			if (400 == $code &&  $msg == 'Woo has been disconnected') {
				$this->updateOption('buttonify_connected', '0');
				$this->updateOption('buttonify_user_id', '');
				$this->updateOption('buttonify_store_token', '');
			}
            wp_send_json_success(
                array(
                    'msg' => $msg,
                    'code' => $code,
                )
            );
        }
    }


}
