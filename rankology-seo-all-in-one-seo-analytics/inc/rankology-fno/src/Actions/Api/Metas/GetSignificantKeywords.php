<?php

namespace RankologyFno\Actions\Api\Metas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class GetSignificantKeywords implements ExecuteHooks {
    public function hooks() {
        add_action('rest_api_init', [$this, 'register']);
    }

    /**
     * 
     *
     * @return void
     */
    public function register() {
        register_rest_route('rankology/v1', '/posts/(?P<id>\d+)/significant-keywords', [
            'methods'             => 'GET',
            'callback'            => [$this, 'processGet'],
            'args'                => [
                'id' => [
                    'validate_callback' => function ($param, $request, $key) {
                        return is_numeric($param);
                    },
                ],
            ],
            'permission_callback' => '__return_true',
        ]);

    }

    /**
     * 
     */
    public function processGet(\WP_REST_Request $request) {
        $id     = $request->get_param('id');

        $post = get_post($id);
        $content = rankology_fno_get_service('SignificantKeywords')->getFullContentByPost($post);

        $keywords = rankology_fno_get_service('SignificantKeywords')->retrieveSignificantKeywords($content);
        $data = rankology_fno_get_service('SignificantKeywords')->computeKeywords($keywords, $content, $id);

        return new \WP_REST_Response(["suggestions" => $data]);
    }
}
