<?php

namespace SeoThatMatters;

if (!defined('WPINC')) { die; }

class SeotmPluginMisc {

    private $options;

    public function __construct() {
        
        $this->options = get_option(SEOTM_PREFIX . '_options', []);

        // add img alt text to empty img alt text
        if ($this->options['seotm_use_img_alt_text']) {
            add_filter('wp_get_attachment_image_attributes', [$this, 'addImageAltText'], 10, 2);
			add_filter('the_content', [$this, 'addImageAltText3x']); // fallback if wp_get_attachment_image_attributes is not working, it will get the page title
        }
        
        if ($this->options['seotm_disable_feeds']) {  
            // disable feeds
            add_action('do_feed', [$this, 'disableFeeds'], 1);
            add_action('do_feed_rdf', [$this, 'disableFeeds'], 1);
            add_action('do_feed_rss', [$this, 'disableFeeds'], 1);
            add_action('do_feed_rss2', [$this, 'disableFeeds'], 1);
            add_action('do_feed_atom', [$this, 'disableFeeds'], 1);
            add_action('do_feed_rss2_comments', [$this, 'disableFeeds'], 1);
            add_action('do_feed_atom_comments', [$this, 'disableFeeds'], 1);
            // remove feed links
            remove_action('wp_head', 'feed_links', 2);
            remove_action('wp_head', 'feed_links_extra', 3);
        } 
    
    }
    
    public function addImageAltText($attributes, $attachment) {
        
        if (!isset($attributes['alt']) || empty($attributes['alt'])) {
            $attributes = $this->addImageAltText2x($attributes, null);
        }
        return $attributes;
        
    }
    
    private function addImageAltText2x($attributes, $attachment) {
        
        if (!isset($attributes['alt']) || empty($attributes['alt'])) {

            $alt = '';
            
            $alt = strtolower(get_the_title()); // use title of the post with prefix
    
            $attributes['alt'] = esc_html($alt);

        }
    
        return $attributes;
    }
	
	public function addImageAltText3x($content) {
        
        preg_match_all('/<img\s[^>]*>/', $content, $images);
        
        if(!is_null($images)) {
            
            foreach($images[0] as $index => $value) {
                preg_match('/alt="(.*?)"/', $value, $img);
                preg_match('/alt=\"(.*?)\"/', $value, $img2);
                
                preg_match('/data-src="(.*?)"/', $value, $imgurl1);
                preg_match('/src="(.*?)"/', $value, $imgurl2);
				
                $alt = "";
				
                $alt = strtolower(get_the_title()); // use title of the post with prefix
                
                if((!isset($img[1]) || $img[1] == '') || (!isset($img2[1]) || $img2[1] == '')) {
                    $new_img = str_replace('<img', '<img alt="'.esc_html($alt).'"', $value);
                    $content = str_replace($value, $new_img, $content);
                }
            }
            
        }
    
        return $content;
    }
    
    public function disableFeeds() {
        
        $error_message = 'Sorry, there are currently no feeds available for you.';
        status_header(401); // Set the 401 Unauthorized status header
        echo $error_message; // Output the error message
        exit;
        
    }
    
}