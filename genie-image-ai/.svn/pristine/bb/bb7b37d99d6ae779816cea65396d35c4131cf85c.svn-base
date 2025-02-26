<?php

namespace GenieImageAi\App\Api;

use GenieImageAi\App\Auth\TokenManager;
defined( 'ABSPATH' ) || exit;
class LeaseToken
{
    public function __construct() 
    {
        add_action("wp_ajax_lease_auth_token", [$this, 'callback']);
        add_action("wp_ajax_nopriv_lease_auth_token", [$this, 'callback']);
    }

    public function callback() 
    { 
        if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'wp_rest' ) ) {
            return [
                'status'  => 'fail',
                'message' => [ 'Nonce mismatch.' ]
            ];
        }

        if ( !is_user_logged_in() || !is_admin() || !current_user_can('publish_posts')) {
            return [
                'status'    => 'fail',
                'message'   => ['Access denied.']
            ];
        }
        
        $token = new TokenManager();
        $this->sendResponse($token->generate());
    }

    public function sendResponse($payload)
    {
        if (is_array($payload)) {
            echo wp_json_encode($payload);
        } else {
            echo wp_json_encode($payload);
        }
        die();
    }
}