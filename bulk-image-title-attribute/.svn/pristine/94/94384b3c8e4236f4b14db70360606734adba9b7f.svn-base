<?php
namespace Pagup\Bigta\Traits;

use Pagup\Bigta\Core\Option;

trait DomHelper {

    public function setTitle($option, $node, $img_url)
    {
        if ( Option::check($option) ) 
        {

            switch ( Option::get($option) ) 
            {
                case Option::get($option) == 'focus_keyword':
                    $node->setAttribute("title", $this->focus_keyword() . $this->site_title());
                    break;

                case Option::get($option) == 'title':
                    $node->setAttribute("title", $this->post_title() . $this->site_title());
                    break;

                case Option::get($option) == 'image_name':
                    $node->setAttribute("title", $this->image_name($img_url) . $this->site_title());
                    break;

                case Option::get($option) == 'focus_keyword_and_title':
                    $node->setAttribute("title", $this->focus_keyword() . ', ' . $this->post_title() . $this->site_title());
                    break;
            }

        }

    }

    public function focus_keyword()
    {
        global $wpdb;
        $post_id = get_queried_object_id();

        $focus_keyword = "";
        
        if ( class_exists('WPSEO_Meta') ) {

            // define focus keyword for Yoast SEO
            $focus_keyword = \WPSEO_Meta::get_value('focuskw', $post_id);

        }
        
        elseif ( class_exists('RankMath') ) {
    
            // define focus keyword for Rank Math
            $focus_keyword = get_post_meta( $post_id, 'rank_math_focus_keyword', true );

        }

        elseif (function_exists('aioseo') && $wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}aioseo_posts'") === "{$wpdb->prefix}aioseo_posts") {

            // Define focus keyword for All in One SEO
            $query = $wpdb->prepare(
                "SELECT keyphrases FROM {$wpdb->prefix}aioseo_posts WHERE post_id = %d",
                $post_id
            );

            $keyphrases = $wpdb->get_var($query);

            if ($keyphrases) {

                $keyphrases_data = json_decode($keyphrases, true);

                if (isset($keyphrases_data['focus']['keyphrase'])) {
                    $focus_keyword = $keyphrases_data['focus']['keyphrase'];
                }
            }
        }

        return $focus_keyword;
    }

    public function post_title()
    {
        // global $post;
        $post_id = get_queried_object_id();
        return get_the_title( $post_id );
    }

    public function image_name($url)
    {
        $path = pathinfo($url);
        return $this->fileName($path['filename']);
    }

    public function site_title()
    {
        $site_title = "";
        
        if ( Option::check('add_site_title') ) {
            $site_title = ', ' . get_bloginfo( 'name' );
        }

        return $site_title;
        
    }

    public function fileName($string) {

        $string = preg_replace("/[\s-]+/", " ", $string); // clean dashes/whitespaces
        $string = preg_replace("/[_]/", " ", $string); // convert whitespaces/underscore to space
        $string = ucwords($string); // convert first letter of each word to capital
        return $string;
    }

    /**
     * Get the list of blacklist URL's string from Options, converts it to an array, and use the array map function to convert each URL to ID.
     * 
     * @return array
    */
    public function blacklist(): array
    {
        $blacklist = Option::check('blacklist') ? maybe_unserialize(Option::get('blacklist')) : [];

        if ( is_array($blacklist) ) {
            return $blacklist;
        }
        
        $urls_array = explode("\n", str_replace("\r", "", $blacklist));

        // Convert URL's to Id's, skipping URLs that don't return an ID
        $ids_array = array();
        foreach ($urls_array as $link) {
            $post_id = url_to_postid($link);
            if ($post_id > 0) {
                $ids_array[] = $post_id;
            }
        }

        return $ids_array;
    }
    
}