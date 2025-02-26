<?php

namespace SeoThatMatters;

use WP_Sitemaps_Provider;
use WP_Query;

if (!defined('WPINC')) { die; }

add_action('init', function() {
    
    $provider = new Custom_Sitemap_Attachments();
    wp_register_sitemap_provider('attachments', $provider);
    
});

class Custom_Sitemap_Attachments extends WP_Sitemaps_Provider {
    
    public $postTypes = array('attachment');

    public function __construct() {
        
        $this->name = 'attachments';
        $this->postTypes = array('attachment');
        $this->object_type = 'attachment';
        
    }

    private function queryArgs() {
        
        return array(
            'post_type'      => $this->postTypes,
            'post_status'    => 'inherit',
            'posts_per_page' => -1,
        );
        
    }

    public function get_url_list($page_num, $post_type = '') {
        $query = new WP_Query($this->queryArgs());
        $urlList = array();

        foreach ($query->posts as $post) {
            $exclude = get_post_meta($post->ID, '_exclude_from_sitemap', true);

            if ($exclude === '1') {
                continue; // Skip this attachment
            }

            $attachment_url = wp_get_attachment_url($post->ID);

            if (!$attachment_url) {
                continue;
            }

            $sitemapEntry = array(
                'loc' => $attachment_url,
            );

            $sitemapEntry = apply_filters('wp_sitemaps_attachments_entry', $sitemapEntry, $post, $post_type);
            $urlList[] = $sitemapEntry;
        }

        return $urlList;
    }

    public function get_max_num_pages($post_type = '') {
        
        return 1;
        
    }
}