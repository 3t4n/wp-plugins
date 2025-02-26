<?php

namespace GenieImageAi\App\Api;

defined( 'ABSPATH' ) || exit;
class UsageLimitStats
{

    public $prefix = '';
    public $param = '';
    public $request = null;

    public function __construct() {
        add_action('rest_api_init', function() {
            register_rest_route('genieimage/v1', 'limit_usage_stats', array(
                'methods'  => \WP_REST_Server::ALLMETHODS,
                'callback' => [$this, 'action'],
                'permission_callback' => '__return_true',
            ));
        });
    }


    public function action($request) 
    {
        if ( !wp_verify_nonce ( sanitize_text_field ( $request->get_header( 'X-WP-Nonce' ) ), 'wp_rest') ) {
            return [
                'status'    => 'fail',
                'message'   => ['Nonce mismatch.']
            ];
        }

        if ( !is_user_logged_in() || !current_user_can('publish_posts')) {
            return [
                'status'    => 'fail',
                'message'   => ['Access denied.']
            ];
        }

        $response = genieimage_remote_request(
            'wp-json/v1/manage-sites/limit_usage_stats',
            $request->get_body(),
            [
                'Site-Token' => get_option('getgenie_site_token', ''),
            ]);

        if($response !== null){
            return $response;
        }
        
        return [
            "status"  => "fail",
            "message" => [
                "Remote connection timeout",
            ],
        ];
    }
}