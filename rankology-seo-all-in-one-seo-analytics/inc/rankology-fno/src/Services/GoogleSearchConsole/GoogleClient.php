<?php

namespace RankologyFno\Services\GoogleSearchConsole;

defined('ABSPATH') || exit;

class GoogleClient {
    protected $client = null;

    public function getClient() {
        if($this->client === null){
            $this->setup();
        }

        return $this->client;
    }

    public function setup() {
        require_once WP_PLUGIN_DIR . '/rankology-seo-all-in-one-seo-analytics/inc/rankology-fno/vendor/autoload.php';

        $client = new \Google_Client();

        //Get Google API Key
        $options = get_option('rankology_instant_indexing_option_name');
        $google_api_key = isset($options['rankology_instant_indexing_google_api_key']) ? $options['rankology_instant_indexing_google_api_key'] : '';

        //Check we have setup at least one API key
        if (empty($google_api_key)) {
            $data['inspect_url']['status'] = __('No API key defined from the settings tab', 'wp-rankology');
            update_post_meta($postId, '_rankology_gsc_inspect_url_data', $data);
            return false;
        }

        $client->setAuthConfig(json_decode($google_api_key, true));
        $client->setScopes('https://www.googleapis.com/auth/webmasters.readonly');

        $this->client = new \Google_Service_SearchConsole($client);

        return true;
    }
}
