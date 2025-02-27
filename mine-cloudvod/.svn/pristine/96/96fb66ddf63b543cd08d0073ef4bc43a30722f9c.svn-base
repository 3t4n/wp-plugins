<?php
namespace MineCloudvod\CloudFlare;

class Vod{
    private $_wpcvApi;
    public function __construct(){
        global $McvApi;
        $this->_wpcvApi     = $McvApi;

        // add_action( 'mcv_add_admin_options_before_purchase', array( $this, 'admin_options' ) );
        add_action( 'init',     [ $this, 'mcv_register_block'] );
        add_action( 'rest_api_init', [$this, 'register_routes'] );
    }

    public function mcv_register_block(){
        register_block_type( MINECLOUDVOD_PATH . '/build/cloudflare/');
        
        wp_add_inline_script('jquery','var mcv_cf_config={cf_config_url:"'.admin_url('/admin.php?page=mcv-options#tab='.str_replace(' ', '-', strtolower(urlencode(__('CloudFlare', 'mine-cloudvod'))))).'pro",apikey:'.(!empty(MINECLOUDVOD_SETTINGS['cloudflare']['apikey']) ? 'true' : 'false').'};');
    }

    public function register_routes(){
        $namespace = 'mine-cloudvod';
        $version = 'v1';
        $base = 'cloudflare/vod';
        /**
         * search videos
         */
        register_rest_route("{$namespace}/{$version}", '/' . $base . '/videos', [
            [
                'methods'             => \WP_REST_Server::READABLE,
                'callback'            => [$this, 'fetch_videos'],
                'permission_callback' => [$this, 'is_admin'],
                'args'                => [
                    'page' => [
                        'type' => 'integer',
                    ],
                    'search' => [
                        'type' => 'string'
                    ],
                    'items_per_page'  => [
                        'type' => 'integer',
                    ],
                    'order_by' => [
                        'type' => 'string'
                    ],
                    'cid' => [
                        'type' => 'string'
                    ]
                ]
            ],
        ]);
        register_rest_route("{$namespace}/{$version}", '/' . $base . '/create', [
            [
                'methods'             => \WP_REST_Server::READABLE,
                'callback'            => [$this, 'create_video'],
                'permission_callback' => [$this, 'is_admin'],
                'args'                => [
                    'title' => [
                        'type' => 'string'
                    ],
                    'cid' => [
                        'type' => 'string'
                    ]
                ]
            ],
        ]);
        /**
         * delete video
         */
        register_rest_route("{$namespace}/{$version}", '/' . $base . '/delvideo', [
            [
                'methods'             => \WP_REST_Server::DELETABLE,
                'callback'            => [$this, 'del_video'],
                'permission_callback' => [$this, 'is_admin'],
                'args'                => [
                    'videoId' => [
                        'type' => 'string',
                    ]
                ]
            ],
        ]);
        /**
         * Get bunny.net stream play url.
         */
        register_rest_route("{$namespace}/{$version}", '/' . $base . '/playurl', [
            [
                'methods'             => \WP_REST_Server::READABLE,
                'callback'            => [$this, 'video_playinfo'],
                'permission_callback' => [$this, 'is_admin'],
                'args'                => [
                    'vid' => [
                        'type' => 'string',
                    ],
                    'libid' => [
                        'type' => 'integer',
                    ]
                ]
            ],
        ]);
    }
    public function is_admin(){
        $user = wp_get_current_user();
        $allowed_roles = array( 'administrator' );
        if ( array_intersect( $allowed_roles, $user->roles ) ) {
            return true;
        }
        return false;
    }

    public function video_playinfo(\WP_REST_Request $request){
        $videoId = $request['vid'];
        $result = $this->get_playinfo($videoId);
        return rest_ensure_response($result);
    }
    public function get_playinfo( $videoId ){
        $email = MINECLOUDVOD_SETTINGS['cloudflare']['email'];
        $ACCOUNT_ID = MINECLOUDVOD_SETTINGS['cloudflare']['accountid'];
        $apikey = MINECLOUDVOD_SETTINGS['cloudflare']['apikey'];

        $apiUrl = "https://api.cloudflare.com/client/v4/accounts/$ACCOUNT_ID/stream/$videoId";
        
        $response = wp_remote_get( $apiUrl, [
            'timeout' => 10,
            'method' => "GET",
            'headers' => [
                'X-Auth-Email' => $email,
                'X-Auth-Key' => $apikey,
            ],
        ] );
        if ( is_wp_error($response) ) {
            return $response;
        }
        $response_body = wp_remote_retrieve_body( $response );
        $response_body = json_decode( $response_body, true );
        $result = [];
        if( $response_body['success'] ){
            $vinfo = $response_body['result'];
            $hls = $vinfo['playback']['hls'];
            $thumbnail = $vinfo['thumbnail'];
            if( $vinfo['requireSignedURLs'] ){
                $sign = $this->get_playtoken( $videoId );
                $hls = str_replace( $videoId, $sign['token'], $hls );
                $thumbnail = str_replace( $videoId, $sign['token'], $thumbnail );
            }
            $result['playUrl'] = $hls;
            $result['thumbnail'] = $thumbnail;
        }
        return $result;
    }
    public function get_playtoken($videoId){
        $email = MINECLOUDVOD_SETTINGS['cloudflare']['email'];
        $ACCOUNT_ID = MINECLOUDVOD_SETTINGS['cloudflare']['accountid'];
        $apikey = MINECLOUDVOD_SETTINGS['cloudflare']['apikey'];

        $apiUrl = "https://api.cloudflare.com/client/v4/accounts/$ACCOUNT_ID/stream/$videoId/token";
        
        $response = wp_remote_post( $apiUrl, [
            'timeout' => 10,
            'method' => "POST",
            'headers' => [
                'X-Auth-Email' => $email,
                'X-Auth-Key' => $apikey,
            ],
        ] );
        if ( is_wp_error($response) ) {
            return $response;
        }
        $response_body = wp_remote_retrieve_body( $response );
        $response_body = json_decode( $response_body, true );
        if( $response_body['success'] ){
            return $response_body['result'];
        }
        return $response_body;
    }
    /**
     * Delete video from bunny.net
     * 
     * @param \WP_REST_Request $request Full data about the request.
     * @return \WP_Error|\WP_REST_Response
     */
    public function del_video(\WP_REST_Request $request){
        $videoId = $request['videoId'];
        $email = MINECLOUDVOD_SETTINGS['cloudflare']['email'];
        $ACCOUNT_ID = MINECLOUDVOD_SETTINGS['cloudflare']['accountid'];
        $apikey = MINECLOUDVOD_SETTINGS['cloudflare']['apikey'];
        
        $response = wp_remote_request( "https://api.cloudflare.com/client/v4/accounts/$ACCOUNT_ID/stream/$videoId", [
            'timeout' => 10,
            'method' => "DELETE",
            'headers' => [
                'X-Auth-Email' => $email,
                'X-Auth-Key' => $apikey,
            ],
        ] );
        if ( is_wp_error($response) ) {
            return $response;
        }
        
        wp_send_json_success();
    }
    /**
     * Fetch videos from bunny.net
     * 
     * @param \WP_REST_Request $request Full data about the request.
     * @return \WP_Error|\WP_REST_Response
     */
    public function fetch_videos(\WP_REST_Request $request){
        $filter = [
            'include_counts' => true,
            'type' => 'vod',
            'total' => 100,
        ];
        if(isset($request['search']) && $request['search']){
            $filter['search'] = sanitize_text_field($request['search']);
        }
        
        // $apitoken = MINECLOUDVOD_SETTINGS['cloudflare']['apitoken'];
        $email = MINECLOUDVOD_SETTINGS['cloudflare']['email'];
        $ACCOUNT_ID = MINECLOUDVOD_SETTINGS['cloudflare']['accountid'];
        $apikey = MINECLOUDVOD_SETTINGS['cloudflare']['apikey'];
        
        $response = wp_remote_get( "https://api.cloudflare.com/client/v4/accounts/{$ACCOUNT_ID}/stream", [
            'timeout' => 10,
            'method' => 'GET',
            'headers' => [
                'X-Auth-Email' => $email,
                'X-Auth-Key' => $apikey,
                // 'Authorization' => 'Bearer '.$apitoken
            ],
            'body' => $filter
        ] );
        if ( is_wp_error($response) ) {
            return $response;
        }
        $response_body = wp_remote_retrieve_body( $response );
        $response_body = json_decode( $response_body, true );
        // var_dump($response_body);
        $result = [];
        if( $response_body['success'] ){
            $videos = $response_body['result'];
            $result['count'] = $videos['total'];
            $videos = $videos['videos'];

            $items = [];
            foreach ($videos as $item) {
                $nitem = $item;//[];
                $nitem["title"] = $item['meta']['name'];
                $nitem["thumbnail"] = $item['thumbnail'];
                $nitem["updated_at"] = $item["modified"];
                $nitem["created_at"] = $item["created"];
                $nitem["videoId"] = $item["uid"];
                $nitem["size"] = $item["size"];
                $nitem["duration"] = $item["duration"];
                $nitem["status"] = $item["status"]["state"] == 'ready' ? 'Normal' : $item["status"]["state"];
                $items[] = $nitem;
            }
            $result["items"] = $items;
        }
        
        return rest_ensure_response($result);
    }
    public function get_library_info( $libraryId, $filed = 'ApiAccessKey' ){
        $libs = get_option('mcv_bunny_libs');
        if(!$libs || !is_array( $libs )) return false;
        foreach( $libs as $lib ){
            if( $lib['Id'] == $libraryId ){
                return $lib[$filed];
                break;
            }
        }
        return false;
    }
    public function create_video(\WP_REST_Request $request){
        $name = $request['name'];
        $size = $request['size'];
        $email = MINECLOUDVOD_SETTINGS['cloudflare']['email'];
        $ACCOUNT_ID = MINECLOUDVOD_SETTINGS['cloudflare']['accountid'];
        $apikey = MINECLOUDVOD_SETTINGS['cloudflare']['apikey'];

        // $url = 'https://api.cloudflare.com/client/v4/accounts/'.$ACCOUNT_ID.'/stream/direct_upload';
        // $response = wp_remote_POST( $url, [
        //     'timeout' => 10,
        //     'method' => 'POST',
        //     'headers' => [
        //         'X-Auth-Email' => $email,
        //         'X-Auth-Key' => $apikey,
        //     ],
        //     'body' => json_encode([
        //         'maxDurationSeconds' => 3600,
        //         'allowedOrigins' => [ '*' ],
        //         'requireSignedURLs' => true,
        //     ])
        // ] );
        $url = 'https://api.cloudflare.com/client/v4/accounts/'.$ACCOUNT_ID.'/stream';
        $response = wp_remote_POST( $url, [
            'timeout' => 10,
            'method' => 'POST',
            'headers' => [
                'Content-Type' => 'application/json',
                'Tus-Resumable' => '1.0.0',
                'Upload-Length' => $size,
                'X-Auth-Email' => $email,
                'X-Auth-Key' => $apikey,
                // 'allowedOrigins' => [],
                // 'requireSignedURLs' => true,
            ],
        ] );
        if ( is_wp_error($response) ) {
            return $response;
        }
        $response_headers = wp_remote_retrieve_headers( $response );
        
        $result = [];
        if($response_headers['location']){
            $result = [
                'path' => $response_headers['location'],
                'metadata' => 'maxDurationSeconds NjAw,requiresignedurls,expiry '. base64_encode(date('Y-m-d\TH:i:sP', time()+36000)) .',name '. base64_encode($name) .'allowedorigins '. base64_encode('*')
            ];
        }
        return rest_ensure_response( $result );
    }
}
