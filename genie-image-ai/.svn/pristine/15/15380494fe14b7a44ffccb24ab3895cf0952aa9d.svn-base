<?php

namespace GenieImageAi\App\Api;

defined( 'ABSPATH' ) || exit;
class Store
{

    public $prefix = '';
    public $param = '';
    public $request = null;

    public function __construct() {
        add_action('rest_api_init', function() {
            register_rest_route('genieimage/v1/store', '(?P<post_id>[\d]+)/(?P<key>[\w-]+)', array(
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

        $data = $request->get_body();

        $post_id = $request['post_id'];
        $key = $request['key'];
        $prefix = GENIEIMAGE_BLOGWIZARD_PREFIX;

        if(!in_array($key, genieimage_blogwizard_store_objects())) {
            return [
                "status" => "fail",
                "message" => [
                    "Invalid key"
                ]
            ];
        }

        update_post_meta($post_id, $prefix . $key, wp_slash($data));

        return [
            "status" => "success",
            "message" => [
                "Successfully stored"
            ]
        ];
    }
}