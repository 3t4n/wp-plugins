<?php
/*
   Plugin Name: Show Event for Rosadigitale
   Requires Plugins: map-in-each-post
   description: Show Event for Rosadigitale for Map in Each Post
   Version: 1.2
   Author: Matteo Enna
   Author URI: https://matteoenna.it
   Text Domain: show-event-for-rosadigitale
   License: GPL2
   */

if ( ! defined( 'ABSPATH' ) ) exit;

class ShowEventForRosadigitale {
    private $json_url = 'https://rosadigitaleweek.com/wp-json/external-events/v1/posts/';

    public function __construct() {
        add_filter('map_in_each_post_localized_data', [$this, 'add_custom_json_points'], 10, 2);
    }

    public function add_custom_json_points($localized_data, $atts) {
    
        if (isset($atts['rosadigitale']) && $atts['rosadigitale'] === 'true') {
            $json_data = $this->fetch_json_data();
            $year_filter = isset($atts['year']) ? $atts['year'] : null;
            if (!empty($json_data)) {
                foreach ($json_data as $event) {
                    if (isset($event['lat']) && isset($event['lon'])) {
                        if ($year_filter === null || (isset($event['published']) && $event['published'] == $year_filter)) {

                            $localized_data['locations'][] = [
                                'title' => $event['title'],
                                'lat' => $event['lat'],
                                'lon' => $event['lon'],
                                'link' => $event['link']
                            ];
                        }
                    }
                }
            }   
        }    
        return $localized_data;
    }

    private function fetch_json_data() {
        $response = wp_remote_get($this->json_url);
    
        if (is_wp_error($response)) {
            return [];
        }
    
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }
    
        return $data;
    }
    
}

new ShowEventForRosadigitale();
