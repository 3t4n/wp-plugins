<?php

/**
 * Class Filerobot_API
 */
class Filerobot_API
{
    private $token;
    private $sec_id;
    private $endpoint;
    private $container;
    private $headers;
    private $is_local;

    public function __construct($token, $sec_id, $container, $endpoint)
    {
        $container = empty($container) ? "/" : str_replace('//', '/', $container);

        // Validate if file endpoint contains filerobot domain, in all cases it should be part of API call
        $endpoint = strpos($endpoint, 'filerobot.com') !== false ? $endpoint : "https://api.filerobot.com/";

        $this->token     = empty($token) ? get_option('filerobot_token') : $token;
        $this->sec_id    = empty($sec_id) ? get_option('filerobot_sec_id') : $sec_id;
        $this->endpoint  = empty($endpoint) ? get_option('filerobot_endpoint') : $endpoint;
        $this->container = empty($container) ? get_option('filerobot_container') : $container;

        $sass = $this->get_sass($this->sec_id);

        $this->headers = [
            'content-type'    => 'application/json; charset=utf-8',
            'x-filerobot-key' => $sass
        ];

        $this->is_local = strpos(wp_upload_dir()['baseurl'], 'localhost') !== false;
    }

    /**
     * 
     * https://docs.filerobot.com/go/filerobot-documentation/en/dam-api/api-authentication/security-templates#od_35c77545
     * 
     */
    public function get_sass($sec_id)
    {
        $file_robot_endpoint = $this->endpoint . $this->token . '/key/' . $sec_id;

        $data = [
            'method'      => "GET",
            'timeout'     => 30,
            'redirection' => 5,
        ];

        $response = wp_remote_get($file_robot_endpoint, $data);

        if (is_wp_error($response))
        {
            return '';
        }

        $body = json_decode($response['body']);

        if (isset($body->status) && $body->status !== 'error')
        {
            return $body->key;
        }
        else
        {
            return false;
        }
    }

    /**
     * 
     * https://docs.filerobot.com/go/filerobot-documentation/en/dam-api/file-api/upload-files
     * 
     */
    public function upload_file($file_url, $new_name, $meta)
    {
        $api_path            = '/v4/files?folder=';
        $api_path            = str_replace('//', '/', $api_path);
        $file_robot_endpoint = $this->endpoint . $this->token . $api_path . $this->container;

        $params = json_encode([
            'files_urls' => [
                [
                    'name' => ($this->is_local) ? $new_name . '-localtest' : $new_name,
                    'meta' => $meta,
                    'url'  => ($this->is_local) ? 'http://sample.li/boat.jpg' : $file_url,
                ],
            ]
        ]);

        $data = [
            'method'      => "POST",
            'timeout'     => 30,
            'redirection' => 5,
            'headers'     => $this->headers,
            'body'        => $params,
            'data_format' => 'body'
        ];

        $response = wp_remote_post($file_robot_endpoint, $data);

        if (is_wp_error($response))
        {
            return false;
        }

        $responseBody = json_decode($response['body']);
        $responseBody->file->url->cdn = $this->strip_param_from_url($responseBody->file->url->cdn, 'vh');

        return $responseBody;
    }

    /**
     * 
     * https://docs.filerobot.com/go/filerobot-documentation/en/dam-api/file-api/delete-files
     * 
     */
    public function delete($uuid)
    {
        $api_path            = '/v4/files/';
        $api_path            = str_replace('//', '/', $api_path);
        $file_robot_endpoint = $this->endpoint . $this->token . $api_path . $uuid;

        $data = [
            'headers' => $this->headers,
            'method'  => 'DELETE'
        ];

        $response = wp_remote_request($file_robot_endpoint, $data);

        if (is_wp_error($response))
        {
            return false;
        }

        return json_decode($response['body']);
    }

    public function get_metadata_taxonomy()
    {
        $api_path            = '/v5/meta/model/fields';
        $api_path            = str_replace('//', '/', $api_path);
        $file_robot_endpoint = $this->endpoint . $this->token . $api_path;

        $data = [
            'headers' => $this->headers,
            'method'  => 'GET'
        ];

        $response = wp_remote_request($file_robot_endpoint, $data);

        if (is_wp_error($response))
        {
            return false;
        }

        return json_decode($response['body']);
    }

    public function update_metadata_file($uuid, $post_id)
    {
        $responseFile = $this->get_file($uuid);
        if ($responseFile->status == 'success') {
            $current_metadata = $responseFile->file->meta;
            $api_path            = '/v5/files/';
            $api_path            = str_replace('//', '/', $api_path);
            $file_robot_endpoint = $this->endpoint . $this->token . $api_path . $uuid . '/meta';

            //get selected metadata field to sync post id
            $metadata_field = get_option('filerobot_sync_post_id_to_metadata');
            if ($metadata_field != '' && get_option('filerobot_sync_post_id')) {
                $params = json_decode(json_encode($current_metadata), true);
                $meta_content = [];
                if ($params[$metadata_field] != '') {
                    $meta_content = json_decode($params[$metadata_field], true);
                }

                foreach ($meta_content as $item) {
                    if ($item == $post_id) {
                        return true;
                    }
                }
                $meta_content[] = $post_id;
                $params[$metadata_field] = json_encode($meta_content);

                $body = ['meta' => $params];
                $data = [
                    'headers' => $this->headers,
                    'method'  => 'PUT',
                    'body'        => json_encode($body)
                ];

                $response = wp_remote_request($file_robot_endpoint, $data);

                if (is_wp_error($response))
                {
                    return false;
                }
                return json_decode($response['body']);
            }
        } else {
            return false;
        }
    }

    public function check_existence($uuid)
    {
        $api_path            = '/v4/get/';
        $file_robot_endpoint = $this->endpoint . $this->token . $api_path . $uuid;
        $response            = wp_remote_head($file_robot_endpoint);

        if (is_wp_error($response))
        {
            return false;
        }

        $httpcode = wp_remote_retrieve_response_code($response);

        return ($httpcode === 200);
    }

    public function check_connection()
    {
        //Limit with 1 file for speed optimization, added additional "&" to solve conflicts and edge cases
        $api_path = '/v4/files?folder=/&limit=1&';
        $api_path = str_replace('//', '/', $api_path);

        return $this->list_assets($api_path);
    }
    public function view_list()
    {
        $api_path = '/v4/files?folder=' . $this->container;
        $api_path = str_replace('//', '/', $api_path);
        $response = $this->list_assets($api_path);

        foreach ($response->files as &$file)
        {
            $file->url->cdn = $this->strip_param_from_url($file->url->cdn, 'vh');
        }

        return $response;
    }
    /**
     * 
     * https://docs.filerobot.com/go/filerobot-documentation/en/dam-api/file-api/get-file-details
     * 
     */
    public function get_file($uuid)
    {
        $api_path = '/v4/files/' . $uuid;
        $api_path = str_replace('//', '/', $api_path);
        $response = $this->list_assets($api_path);
        $response->file->url->cdn = $this->strip_param_from_url($response->file->url->cdn, 'vh');

        return $response;
    }
    /**
     * 
     * https://docs.filerobot.com/go/filerobot-documentation/en/dam-api/file-api/list-and-search-files
     * 
     */
    private function list_assets($api_path)
    {
        if (!$this->headers['x-filerobot-key'])
        {
            return false;
        }
        
        $file_robot_endpoint = $this->endpoint . $this->token . $api_path;

        $data = [
            'method'      => "GET",
            'timeout'     => 30,
            'redirection' => 5,
            'headers'     => $this->headers,
        ];

        $response = wp_remote_get($file_robot_endpoint, $data);

        if (is_wp_error($response))
        {
            return false;
        }

        return json_decode($response['body']);
    }

    /**
     * 
     * https://filerobot.opendocs.cc/go/filerobot-internal/en/core-collaboration-features/comments-annotations#od_7005c7ac
     * Forget this for now
     * 
     */
    public function get_file_comments($uuid)
    {
        if (!$this->headers['x-filerobot-key'])
        {
            return false;
        }
        
        $api_path            = "/v3/file/{$uuid}/comments";
        $file_robot_endpoint = $this->endpoint . $this->token . $api_path;

        $data = [
            'method'      => "GET",
            'timeout'     => 30,
            'redirection' => 5,
            'headers'     => $this->headers,
        ];

        $response = wp_remote_get($file_robot_endpoint, $data);

        if (is_wp_error($response))
        {
            return false;
        }

        return json_decode($response['body']);
    }

    /**
     * 
     * https://stackoverflow.com/questions/4937478/strip-off-url-parameter-with-php/45713333#45713333
     * Usage: strip_param_from_url('{DOMAIN}?width=90&height=32&vh=1aacvh', 'vh');
     * 
     */
    function strip_param_from_url($url, $param) 
    {
        $base_url = strtok($url, '?');              
        $parsed_url = parse_url($url);              
        $query = $parsed_url['query'];              
        parse_str( $query, $parameters );           
        unset( $parameters[$param] );               
        $new_query = http_build_query($parameters); 

        return $new_query ? "{$base_url}?{$new_query}" : $base_url;            
    }
}
