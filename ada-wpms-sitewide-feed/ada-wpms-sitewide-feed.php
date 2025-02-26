<?php
/*
Plugin Name: Ada WPMS Sitewide Feed
Plugin URI: http://1uthavi.adadaa.com/ada-wpmu-sitewide-feed-plugin/
Description: Creates four rss 2.0 feeds showing recent posts, comments, pages, and one combined [posts and pages] from all blogs.  This will skip the first comment and page of a blog; also will not include spam, mature and deleted blogs.
Author:  Adadaa
Author URI: http://1uthavi.adadaa.com/
Version: 0.5.5
License: GPL
*/

/*--------------------------------------------------------------------------------------------------
 Ver                Name                     Description
 ===================================================================================================
 0.5.2              CAPitalZ				Made it to work both in WPMU and WP 3.0
 0.5.1              Cyril AKNINE			Fixed many bug issues with WP 3.0
 0.5.0				CAPitalZ				Optimized, bug fixed WP Object Cache, added display of 
 											site logo, inclution of author avatars
 0.4.0				CAPitalZ				Optimized, bug fixed WP Object Cache, added an additional feed
 0.3.2              I.T. Damager			Original creator        
--------------------------------------------------------------------------------------------------*/

// ******* NEED TO REMOVE THE EXCLUDE ID 50 $excl_blogs
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
class adadaawsf_sitewidefeed {

	public $version = '0.5.5';
    public $triggerblog;
    public $triggerurl;
    public $commentsurl;
    public $pagesurl;
    public $postsurl;
    public $feedtitle;
    public $feeddesc;
    public $feedcount;
    public $excerpt;
    public $mincontentchars;
    public $siteimageurl;
    public $showavatar;
    public $showstats;
    public $cache;
    public $etag;
    public $expiretime;
    public $commentstamilurl;
    public $domainpath;  // Added to resolve the deprecated warning
    public $blogname;    // Added to resolve the deprecated warning
		
	function __construct() {
		add_action('init', array(&$this, 'adadaawsf_sitewidefeed_init'));
	}
	//if (!function_exists('is_subdomain_install')) :
	function is_subdomain_install() {
		if ( defined('SUBDOMAIN_INSTALL') )
			return SUBDOMAIN_INSTALL;

		if ( defined('VHOST') && VHOST == 'yes' )
			return true;

		return false;
	}
	//endif;


	function adadaawsf_sitewidefeed_init() {
		$this->apply_settings();
		if ($this->cache) $this->cache = $this->check_cache();
		if ($this->trigger('fullfeed')) return $this->outputfeed('fullfeed');
		//CAPitalZ{REMOVE
		//elseif ($this->trigger('commentstamil')) return $this->outputfeed('commentstamil');
		//CAPitalZ}REMOVE
		elseif ($this->trigger('posts')) return $this->outputfeed('posts');
		elseif ($this->trigger('comments')) return $this->outputfeed('comments');
		elseif ($this->trigger('pages')) return $this->outputfeed('pages');
		add_action('publish_post', array(&$this, 'expire_post_feeds'));
		add_action('delete_post', array(&$this, 'expire_post_feeds'));
		add_action('private_to_published', array(&$this, 'expire_post_feeds'));
		add_action('comment_post', array(&$this, 'expire_comments_feed'));
		add_action('delete_comment', array(&$this, 'expire_comments_feed'));
		add_action('trackback_post', array(&$this, 'expire_comments_feed'));
		add_action('wp_set_comment_status', array(&$this, 'expire_comments_feed'));
		add_action('wpmuadminedit', array(&$this, 'expire_feeds')); // in case the admin deletes a blog
		
		if ( defined('MULTISITE') )
			add_action('network_admin_menu', array(&$this, 'add_submenu'));
		else
			add_action('admin_menu', array(&$this, 'add_submenu'));
	}

	function trigger($type) {
    global $wpdb;

    // Verify nonce if this function is intended to handle form submissions or actions
    if (isset($_POST['_wpnonce'])) {
    $nonce = sanitize_text_field(wp_unslash($_POST['_wpnonce']));
    if (!wp_verify_nonce($nonce, 'your_nonce_action')) {
        return false; // Nonce verification failed
    }
}


    if ($wpdb->blogid != $this->triggerblog) {
        return false;
    }

    if ($type == 'fullfeed') {
        $url = $this->triggerurl;
    } elseif ($type == 'commentstamil') {
        $url = $this->triggerurl . $this->commentstamilurl;
    } elseif ($type == 'posts') {
        $url = $this->triggerurl . $this->postsurl;
    } elseif ($type == 'comments') {
        $url = $this->triggerurl . $this->commentsurl;
    } elseif ($type == 'pages') {
        $url = $this->triggerurl . $this->pagesurl;
    } else {
        return false;
    }

   if ($this->is_subdomain_install()) {
    if (isset($_SERVER['REQUEST_URI'])) {
        $request_uri = sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI']));
        return (substr($request_uri, -strlen($url)) == $url) ? true : false;
    }
    return false; // Return false if $_SERVER['REQUEST_URI'] is not set
} else {
    $wpmu_feed = isset($_GET['wpmu-feed']) ? sanitize_text_field(wp_unslash($_GET['wpmu-feed'])) : '';

    if ($type == 'fullfeed' && $wpmu_feed == 'full-feed') return true;
    elseif ($type == 'posts' && $wpmu_feed == 'posts') return true;
    elseif ($type == 'comments' && $wpmu_feed == 'comments') return true;
    elseif ($type == 'pages' && $wpmu_feed == 'pages') return true;

    return false;
}


}


	function check_cache() {
		global $wp_object_cache;
		//return (is_object($wp_object_cache) && $wp_object_cache->cache_enabled == true) ? true : false;
		return (is_object($wp_object_cache)) ? true : false;
	}

	function cache_expire_time() {
		global $wp_object_cache;
		if(property_exists('wp_object_cache', 'expiration_time'))
			return ($wp_object_cache->expiration_time/60);
		else
			return (15);
	}

	function add_submenu() {
		if (!is_super_admin()) return false;
	
		if ( defined('MULTISITE') )
			add_submenu_page('settings.php', 'Ada Sitewide Feed Configuration', 'Ada Sitewide Feed', 'manage_options', 'wpmu_sitewide_feed', array(&$this,'config_page'));
		else
			add_submenu_page('wpmu-admin.php', 'Ada Sitewide Feed Configuration', 'Ada Sitewide Feed', 'manage_options', 'wpmu_sitewide_feed', array(&$this,'config_page'));
		

	}

	function save_settings() {
    global $wpdb, $wp_db_version, $adadaawsf_updated, $adadaawsf_config_error;
    $changed = false;

    check_admin_referer('update_settings_action');

    // Validate and sanitize inputs, with default fallback values
    $triggerblog = isset($_POST['triggerblog']) ? sanitize_text_field(wp_unslash($_POST['triggerblog'])) : '1';
    if (!preg_match('/^[0-9]+$/', $triggerblog) || intval($triggerblog) <= 0) {
        $adadaawsf_config_error[] = 'Trigger blog must be a numeric blog ID. Default: 1';
    } else {
        $triggerblog = intval($triggerblog);
    }

    $triggerurl = isset($_POST['triggerurl']) ? sanitize_text_field(wp_unslash($_POST['triggerurl'])) : '/full-feed/';
    if (!preg_match('/^\/[a-zA-Z0-9_\/\-]+\/$/', $triggerurl) && $this->is_subdomain_install()) {
        $adadaawsf_config_error[] = 'Invalid trigger URL. Must be a relative path beginning and ending with "/". Default: /full-feed/';
    }

    $postsurl = isset($_POST['postsurl']) ? sanitize_text_field(wp_unslash($_POST['postsurl'])) : 'posts/';
    if (!preg_match('/^[a-zA-Z0-9_\-]+\/$/', $postsurl) && $this->is_subdomain_install()) {
        $adadaawsf_config_error[] = 'Invalid posts URL. Must be a relative path ending with "/". Default: posts/';
    }

    $commentsurl = isset($_POST['commentsurl']) ? sanitize_text_field(wp_unslash($_POST['commentsurl'])) : 'comments/';
    if (!preg_match('/^[a-zA-Z0-9_\-]+\/$/', $commentsurl) && $this->is_subdomain_install()) {
        $adadaawsf_config_error[] = 'Invalid comments URL. Must be a relative path ending with "/". Default: comments/';
    }

    $pagesurl = isset($_POST['pagesurl']) ? sanitize_text_field(wp_unslash($_POST['pagesurl'])) : 'pages/';
    if (!preg_match('/^[a-zA-Z0-9_\-]+\/$/', $pagesurl) && $this->is_subdomain_install()) {
        $adadaawsf_config_error[] = 'Invalid pages URL. Must be a relative path ending with "/". Default: pages/';
    }

    $feedcount = isset($_POST['feedcount']) ? sanitize_text_field(wp_unslash($_POST['feedcount'])) : '20';
    if (!preg_match('/^[0-9]+$/', $feedcount) || intval($feedcount) <= 0) {
        $adadaawsf_config_error[] = 'Post count must be a number greater than zero. Default: 20';
    } else {
        $feedcount = intval($feedcount);
    }

    $feedtitle = isset($_POST['feedtitle']) ? wp_strip_all_tags(wp_unslash($_POST['feedtitle'])) : '';
    if (empty($feedtitle)) {
        $adadaawsf_config_error[] = 'Feed title is not set.';
    }

    $feeddesc = isset($_POST['feeddesc']) ? wp_strip_all_tags(wp_unslash($_POST['feeddesc'])) : '';
    if (empty($feeddesc)) {
        $adadaawsf_config_error[] = 'Feed description is not set.';
    }

    $mincontentchars = isset($_POST['mincontentchars']) ? intval(wp_unslash($_POST['mincontentchars'])) : 0;
    if ($mincontentchars < 0) {
        $adadaawsf_config_error[] = 'Minimum content characters must be a positive integer.';
    }

    $siteimageurl = isset($_POST['siteimageurl']) ? sanitize_text_field(wp_unslash($_POST['siteimageurl'])) : '';
    if (!preg_match('/^[a-zA-Z0-9_\-:%\/\.]*$/', $siteimageurl) && $siteimageurl !== '') {
        $adadaawsf_config_error[] = 'Invalid image URL. Must be a full path or left blank.';
    }

    $showavatar = !empty($_POST['showavatar']) ? 1 : 0;
    $showstats = !empty($_POST['showstats']) ? 1 : 0;
    $etag = !empty($_POST['etag']) ? 1 : 0;
    $cache = !empty($_POST['cache']) ? 1 : 0;

    $excerpt = isset($_POST['excerpt']) && ($_POST['excerpt'] == 0 || $_POST['excerpt'] == 1) ? intval($_POST['excerpt']) : 1;

    $expiretime = isset($_POST['expiretime']) ? sanitize_text_field(wp_unslash($_POST['expiretime'])) : '0';
    if (!preg_match('/^[0-9]+$/', $expiretime) || intval($expiretime) < 0) {
        $adadaawsf_config_error[] = 'Expire time must be a number equal to or greater than zero. Default: 0 (expire only when needed).';
    } else {
        $expiretime = intval($expiretime);
    }

    if ($_POST['expiretime'] > $this->cache_expire_time()) {
        $adadaawsf_config_error[] = 'Expire Minutes: Cannot exceed WP Object Cache expiration time of ' . $this->cache_expire_time() . ' minutes.';
    }

    if (is_array($adadaawsf_config_error) && !empty($adadaawsf_config_error)) {
        return $adadaawsf_config_error;
    }

    $settings = compact(
        'triggerblog',
        'triggerurl',
        'commentsurl',
        'pagesurl',
        'postsurl',
        'feedtitle',
        'feeddesc',
        'feedcount',
        'excerpt',
        'mincontentchars',
        'siteimageurl',
        'showavatar',
        'showstats',
        'cache',
        'etag',
        'expiretime'
    );

    foreach ($settings as $setting => $value) {
        if ($this->$setting != $value) $changed = true;
    }

    if ($changed) {
        update_site_option('adadaawsf_sitewidefeed_settings', $settings);
        $this->expire_feeds();
        $this->apply_settings($settings);
        return $adadaawsf_updated = true;
    }
}


	function set_defaults() {
		global $wp_db_version;
		//, $current_site;
		// do not edit here - use the admin screen
		$this->feedcount = 20;
		$this->triggerblog = 1;
		if( $this->is_subdomain_install() ) {
			$this->triggerurl = '/full-feed/';
			//CAPitalZ{REMOVE
			//$this->commentstamilurl = 'commentstamil/';
			//CAPitalZ}REMOVE
			$this->commentsurl = 'comments/';
			$this->pagesurl = 'pages/';
			$this->postsurl = 'posts/';
		} else {
			$this->triggerurl = '?wpmu-feed=full-feed';
			//CAPitalZ{REMOVE
			//$this->commentstamilurl = '?wpmu-feed=commentstamil';
			//CAPitalZ}REMOVE
			$this->postsurl = '?wpmu-feed=posts';
			$this->commentsurl = '?wpmu-feed=comments';
			$this->pagesurl = '?wpmu-feed=pages';
		}
		$this->mincontentchars = 25;
		//--CAPitalZNEW--/
		if(is_multisite()){
			$this->domainpath = get_blog_option($this->triggerblog, 'siteurl');
			$this->blogname = get_blog_option($this->triggerblog, 'blogname');
		  }else{
			$this->domainpath = get_option($this->triggerblog, 'siteurl');
			$this->blogname = get_option($this->triggerblog, 'blogname');
		  }
		  //--/CAPitalZNEW--/
		
		$this->siteimageurl = untrailingslashit($this->domainpath) . '/favicon.ico';
		$this->showavatar = 1;
		$this->showstats = 1;
		$this->excerpt = 1;
		$this->cache = 1;
		$this->etag = 1;
		$this->feedtitle = $this->blogname .' Master Site Feed';
		$this->feeddesc = 'Shows all posts, comments, and pages from all blogs on this WordPress powered site';
		if ($wp_db_version > 3513) {
    $this->expiretime = 0;
} else {
    $this->expiretime = ($this->cache_expire_time() > 15) ? 15 : $this->cache_expire_time();
}

		//$this->expiretime = $this->cache_expire_time();
	}

	function apply_settings($settings = false) {
		if (!$settings) $settings = get_site_option('adadaawsf_sitewidefeed_settings');
		if (is_array($settings)) foreach($settings as $setting => $value) $this->$setting = $value;
		if (!isset($this->mincontentchars)) { $this->delete_settings(); $this->set_defaults(); }
//		else $this->set_defaults();
	}

/**
 * Suppress WordPress.DB.DirectDatabaseQuery.DirectQuery warning.
 *
 * @noinspection WordPress.DB.DirectDatabaseQuery.DirectQuery
 */
function delete_settings() {
    global $adadaawsf_updated;
    $settings = get_site_option('adadaawsf_sitewidefeed_settings');
    if ($settings) {
        // Use delete_site_option to safely remove the setting
        delete_site_option('adadaawsf_sitewidefeed_settings');

        if ($this->check_cache()) {
            wp_cache_delete('adadaawsf_sitewidefeed_settings', 'site-options');
        }

        $this->set_defaults();
        $this->expire_feeds();
        return $adadaawsf_updated = true;
    }
}
// ORIGINAL
	

function create_feedurl($type) {
    // Determine the URL based on the type
    if ($type == 'fullfeed') {
        $url = $this->triggerurl;
    } elseif ($type == 'posts') {
        $url = $this->postsurl;
    } elseif ($type == 'comments') {
        $url = $this->commentsurl;
    } elseif ($type == 'pages') {
        $url = $this->pagesurl;
    }

    // If the installation is a subdomain, adjust the URL
    if (in_array($type, ['posts', 'comments', 'pages']) && $this->is_subdomain_install()) {
        $url = $this->triggerurl . $url;
    }

    // Get the domain path and blog name
    $this->domainpath = get_blog_option($this->triggerblog, 'siteurl');
    $this->blogname = get_blog_option($this->triggerblog, 'blogname');

    // Return an error message if the domain path is not found
    if ($this->domainpath == '') {
        return 'Trigger blog ID was not found!';
    }

    // Return the constructed URL
    return untrailingslashit($this->domainpath) . $url;
}

function create_testlink($type) {
    // Create and return an escaped HTML link
    return '<a href="' . esc_url($this->create_feedurl($type)) . '" target="_blank">' . esc_html__('test link', 'ada-wpms-sitewide-feed') . '</a>';
}


	

	function create_map($type) {
    global $wpdb;
    $excl_blogs = "50";  // Example, adjust as needed
    $multiplier = 100;

    // Convert excluded blogs to an array and ensure they're integers
    $excluded_blogs_array = array_map('intval', explode(',', $excl_blogs));

    // Fetch site IDs using get_sites()
    $args = array(
        'public'     => 1,
        'archived'   => 0,
        'spam'       => 0,
        'deleted'    => 0,
        'number'     => $this->feedcount * $multiplier,
        'orderby'    => 'last_updated',
        'order'      => 'DESC',
        'fields'     => 'ids'
    );

    // Apply exclusionary filter directly in the SQL query
    $sites = get_sites($args);

    // Filter out the excluded blogs
    $blogs = array_diff($sites, $excluded_blogs_array);

    if (empty($blogs)) return false;

    // Initialize the arrays to prevent "undefined variable" warning
    $map = [];
    $ID = [];
    $date_gmt = [];

    foreach ($blogs as $blogid) {
        // Prepare cache key for posts or comments
        $post_cache_key = "posts_feed_{$blogid}_{$type}_{$this->feedcount}";
        $results = wp_cache_get($post_cache_key, 'custom_cache_group');

        // If cache miss, query the database
        if ($results === false) {
            // Sanitize blog ID
            /*$table_name = esc_sql($wpdb->base_prefix . $blogid . '_posts');

            // Directly prepare and execute the query
            $results = $wpdb->get_results($wpdb->prepare("
                SELECT `ID`, `post_date_gmt`
                FROM `{$table_name}`
                WHERE `post_status` = %s
                    AND `post_password` = %s
                    AND `post_date_gmt` < %s
                    AND `ID` > %d
                    AND TRIM(`post_title`) != ''
                    AND LENGTH(TRIM(`post_content`)) > %d
                ORDER BY `post_date_gmt` DESC
                LIMIT %d
            ", 'publish', '', gmdate("Y-m-d H:i:s"), 2, $this->mincontentchars, $this->feedcount));*/



           /* $args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'post_password'  => '',
    'date_query'     => array(
        array(
            'before' => gmdate("Y-m-d H:i:s"),
        ),
    ),
    'post__in'       => array(2), // Replace with your actual IDs if needed
    'posts_per_page' => $this->feedcount,
    'orderby'        => 'date',
    'order'          => 'DESC',
    's'              => '', // You can add search terms here if needed
    'meta_query'     => array(
        array(
            'key'     => 'post_title',
            'value'   => '',
            'compare' => '!=',
        ),
    ),
);

$query = new WP_Query($args);

$results = $query->get_posts();*/



// Define the IDs of the posts you want to include
$post_ids_to_include = array(2); // Adjust this array based on your needs

$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'post_password'  => '',
    'date_query'     => array(
        array(
            'before' => gmdate("Y-m-d H:i:s"),
        ),
    ),
    'post__in'       => $post_ids_to_include, // Include specific IDs
    'posts_per_page' => $this->feedcount,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

// Execute the query
$query = new WP_Query($args);
$results = $query->get_posts();




            // Cache the results
            wp_cache_set($post_cache_key, $results, 'custom_cache_group');
        }

        if (is_array($results)) {
            foreach ($results as $result) {
                if ($type == 'fullfeed' || $type == 'posts' || $type == 'pages') {
                    $map[] = array($blogid, $result->ID, $result->post_date_gmt);
                    $ID[] = $result->ID;
                    $date_gmt[] = $result->post_date_gmt;
                } elseif ($type == 'commentstamil' || $type == 'comments') {
                    $map[] = array($blogid, $result->comment_ID, $result->comment_date_gmt);
                    $ID[] = $result->comment_ID;
                    $date_gmt[] = $result->comment_date_gmt;
                }
            }
        }
    }

    if (!empty($map)) {
        array_multisort($date_gmt, SORT_DESC, $ID, SORT_DESC, $map);

        if ($type == 'fullfeed' || $type == 'commentstamil') {
            return $map;  // Return full map for these types
        } else {
            return array_slice($map, 0, $this->feedcount);  // Return limited results for other types
        }
    }

    return [];  // Return an empty array if $map is empty
}



	function get_data($type) {
    global $wpdb;
    global $adadaawsf_core;

    // Initialize the $rows variable to prevent the "undefined variable" warning
    $rows = [];

    // Create a unique cache key based on query parameters
    $cache_key = "data_feed_{$type}_{$this->feedcount}";
    $cached_data = wp_cache_get($cache_key, 'custom_cache_group');

    // Return cached data if available
    if ($cached_data !== false) {
        return $cached_data;
    }

    // Create the map
    $map = $this->create_map($type);
    if (!is_array($map)) return false;

    foreach ($map as $item) {
        if (!isset($item[0]) || !isset($item[1])) {
            continue; // Skip if the expected indices are not set
        }

        // Sanitize blog ID and post/comment ID
        $blog_id = intval($item[0]);
        $object_id = intval($item[1]);

        if ($type == 'fullfeed' || $type == 'posts' || $type == 'pages') {
            // Use the sanitized blog ID for the table name
            $table_name = esc_sql($wpdb->base_prefix . $blog_id . '_posts');
            
            // Check if the row is already cached
            $cache_key_row = "post_{$blog_id}_{$object_id}";
            $row = wp_cache_get($cache_key_row, 'custom_cache_group');

            if ($row === false) {
                // Directly prepare and execute the query
                /*$row = $wpdb->get_row($wpdb->prepare(
                    "SELECT * FROM `{$table_name}` WHERE `ID` = %d", 
                    $object_id
                ));

 // Cache the row data
                wp_cache_set($cache_key_row, $row, 'custom_cache_group');
                */

                $row = get_post($object_id);

    // Check if the post exists
    if ($row) {
        // Cache the row data
        wp_cache_set($cache_key_row, $row, 'custom_cache_group');
    } else {
        // Handle the case where the post does not exist
        $row = null; // or some other fallback value
    }

               
            }

            if ($row && isset($row->ID)) {
                if ($type == 'fullfeed') {
                    if ($adadaawsf_core->containsTamil($row->post_title) && $adadaawsf_core->containsTamil($row->post_content)) {
                        $row->blogid = $blog_id;
                        $rows[] = $row;

                        if (count($rows) >= $this->feedcount) break;
                    }
                } else {
                    $row->blogid = $blog_id;
                    $rows[] = $row;
                }
            }
        } elseif ($type == 'commentstamil' || $type == 'comments') {
            // Use the sanitized blog ID for the table name
            $table_name = esc_sql($wpdb->base_prefix . $blog_id . '_comments');
            
            // Check if the row is already cached
            $cache_key_row = "comment_{$blog_id}_{$object_id}";
            $row = wp_cache_get($cache_key_row, 'custom_cache_group');

            if ($row === false) {
                // Directly prepare and execute the query
                /*$row = $wpdb->get_row($wpdb->prepare(
                    "SELECT * FROM `{$table_name}` WHERE `comment_ID` = %d", 
                    $object_id
                ));

                // Cache the row data
                wp_cache_set($cache_key_row, $row, 'custom_cache_group');*/
				$row = get_comment($object_id);

				    // Check if the comment exists
				    if ($row) {
				        // Cache the row data
				        wp_cache_set($cache_key_row, $row, 'custom_cache_group');
				    } else {
				        // Handle the case where the comment does not exist
				        $row = null; // or some other fallback value
				    }


            }

            if ($row && isset($row->comment_ID)) {
                if ($type == 'commentstamil') {
                    if ($adadaawsf_core->containsTamil($row->comment_content)) {
                        $row->blogid = $blog_id;
                        $rows[] = $row;

                        if (count($rows) >= $this->feedcount) break;
                    }
                } else {
                    $row->blogid = $blog_id;
                    $rows[] = $row;
                }
            }
        }
    }

    // Cache the results for 12 hours (43200 seconds)
    wp_cache_set($cache_key, $rows, 'custom_cache_group', 43200);

    if (!empty($rows)) {
        return $rows;
    }
    return false; // Return false if $rows is empty
}



	function latest_time() {
    global $posts, $comments;
    
    // Check if $posts is not null and has at least one element
    if ($posts && isset($posts[0]->post_date_gmt)) {
        return $posts[0]->post_date_gmt;
    }

    // Check if $comments is not null and has at least one element
    if ($comments && isset($comments[0]->comment_date_gmt)) {
        return $comments[0]->comment_date_gmt;
    }

    // Return null or a default value if neither $posts nor $comments have valid data
    return null;  // Or return a default timestamp like gmdate("Y-m-d H:i:s")
}


	function save_feed($name,$data) {
		/* no need to save the expire time manually.  Can set in expire time in wp_cache_set
		if ($this->cache) update_site_option($name.'_ts',time());
		return ($this->cache) ? wp_cache_set($name,$data,'site-options') : false;*/
		return ($this->cache) ? wp_cache_set($name,$data,'site-options',$this->expiretime*60) : false;
	}

	function fetch_feed($name) {
		/* no need to expire the feed manually. Expired cache will return false, when using wp_cache_get()
		if ($this->cache) {
			$expires = get_site_option($name.'_ts')+($this->expiretime*60);
			if ($expires <= time()) $this->expire_feed($name);
		}
		*/
		return ($this->cache) ? wp_cache_get($name,'site-options') : false;		
	}

	function expire_feed($name = 'adadaawsf_sitewidefeed_cache') {
		return ($this->check_cache()) ? wp_cache_delete($name,'site-options') : false;
	}

	function expire_comments_feed() {
		//CAPitalZ{REMOVE
		$this->expire_feed('wpmu_sitecommentstamil_cache');
		//CAPitalZ}REMOVE
		$this->expire_feed('wpmu_sitecomments_cache');
	}

	function expire_pages_feed() {
		return $this->expire_feed('wpmu_sitepages_cache');
	}

	function expire_post_feeds() {
		$this->expire_feed('wpmu_siteposts_cache');
		$this->expire_feed('wpmu_sitepages_cache');
	}

	function expire_feeds() {
		$this->expire_feed();	//to expire the full-feed
		$this->expire_comments_feed();
		//$this->expire_pages_feed();	//will also expire posts
		$this->expire_post_feeds();
	}

function outputfeed($type) {
    $cached = false;
    if ($type == 'fullfeed') {
        $name = 'adadaawsf_sitewidefeed_cache';
    } elseif ($type == 'commentstamil') {
        $name = 'wpmu_sitecommentstamil_cache';
    } elseif ($type == 'posts') {
        $name = 'wpmu_siteposts_cache';
    } elseif ($type == 'comments') {
        $name = 'wpmu_sitecomments_cache';
    } elseif ($type == 'pages') {
        $name = 'wpmu_sitepages_cache';
    }

    if ($this->cache) {
        $feed = $this->fetch_feed($name);
        if ($feed) {
            $cached = true;
        } else {
            $feed = $this->generate_feed($type);
            $saved = $this->save_feed($name, $feed);
        }
    } else {
        $feed = $this->generate_feed($type);
    }

    if ($this->showstats) {
        $feed .= "<!-- " . get_num_queries() . " queries " . number_format(timer_stop(), 3) . " seconds.";
        if ($cached) {
            $feed .= " (cached)";
        }
        $feed .= " -->\r\n";
    }

    // Check if <lastBuildDate> is found and prevent undefined array key warning
    if (preg_match('/<lastBuildDate>(.*)<\/lastBuildDate>/', $feed, $match)) {
        $lastmodified = gmdate("D, j M Y H:i:s", strtotime($match[1])) . " GMT";
    } else {
        $lastmodified = gmdate("D, j M Y H:i:s") . " GMT"; // Fallback to the current time if no match is found
    }
    
    $etag = md5($lastmodified);
    header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);

    if ($this->etag && (
            (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == '"' . $etag . '"') || 
            (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $lastmodified == $_SERVER['HTTP_IF_MODIFIED_SINCE'])
        )) {
        header('HTTP/1.1 304 Not Modified');
        header('Cache-Control: private');
        header('ETag: "' . $etag . '"');
    } else {
        if ($this->etag) {
            header('Last-Modified: ' . $lastmodified);
            header('ETag: "' . $etag . '"');
        }
        
        // Output feed directly, suppressing the escaping warning
        echo $feed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
    exit();
}




/**
 * Retrieve the avatar for a user who provided a user ID or email address.
 *
 * @since 2.5
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @param int $size Size of the avatar image
 * @param string $default URL to a default image to use if no avatar is available
 * @param string $alt Alternate text to use in image tag. Defaults to blank
 * @return string <img> tag for the user's avatar
*/
function adadaawsf_get_avatar_url( $id_or_email, $size = '96', $default = '', $alt = false ) {
	if ( ! get_option('show_avatars') )
		return false;

	if ( false === $alt)
		$safe_alt = '';
	else
		$safe_alt = esc_attr( $alt );

	if ( !is_numeric($size) )
		$size = '96';

	$email = '';
	if ( is_numeric($id_or_email) ) {
		$id = (int) $id_or_email;
		$user = get_userdata($id);
		if ( $user )
			$email = $user->user_email;
	} elseif ( is_object($id_or_email) ) {
		if ( isset($id_or_email->comment_type) && '' != $id_or_email->comment_type && 'comment' != $id_or_email->comment_type )
			return false; // No avatar for pingbacks or trackbacks

		if ( !empty($id_or_email->user_id) ) {
			$id = (int) $id_or_email->user_id;
			$user = get_userdata($id);
			if ( $user)
				$email = $user->user_email;
		} elseif ( !empty($id_or_email->comment_author_email) ) {
			$email = $id_or_email->comment_author_email;
		}
	} else {
		$email = $id_or_email;
	}

	if ( empty($default) ) {
		$avatar_default = get_option('avatar_default');
		if ( empty($avatar_default) )
			$default = 'mystery';
		else
			$default = $avatar_default;
	}

 	if ( is_ssl() )
		$host = 'https://secure.gravatar.com';
	else
		$host = 'http://www.gravatar.com';

	if ( 'mystery' == $default )
		$default = "$host/avatar/ad516503a11cd5ca435acc9bb6523536?s={$size}"; // ad516503a11cd5ca435acc9bb6523536 == md5('unknown@gravatar.com')
	elseif ( 'blank' == $default )
		$default = includes_url('images/blank.gif');
	elseif ( !empty($email) && 'gravatar_default' == $default )
		$default = '';
	elseif ( 'gravatar_default' == $default )
		$default = "$host/avatar/s={$size}";
	elseif ( empty($email) )
		$default = "$host/avatar/?d=$default&amp;s={$size}";
	elseif ( strpos($default, 'http://') === 0 )
		$default = add_query_arg( 's', $size, $default );

	if ( !empty($email) ) {
		$out = "$host/avatar/";
		$out .= md5( strtolower( $email ) );
		$out .= '?s='.$size;
		$out .= '&amp;d=' . urlencode( $default );

		$rating = get_option('avatar_rating');
		if ( !empty( $rating ) )
			$out .= "&amp;r={$rating}";

		$avatar_url = $out;
	} else {
		$avatar_url = $default;
	}

	return $avatar_url;
}

	function generate_feed($type) {
    global $posts, $comments;

    // Initialize the variable with a default value
    $feedtitlefull = esc_html($this->feedtitle . __(' Feed', 'ada-wpms-sitewide-feed'));

    if ($type == 'fullfeed') {
        $posts = $this->get_data($type);
        $feedtitlefull = esc_html($this->feedtitle . __(' Posts & Pages', 'ada-wpms-sitewide-feed'));
    } elseif ($type == 'comments') {
        $comments = $this->get_data($type);
        $feedtitlefull = esc_html($this->feedtitle . __(' Comments', 'ada-wpms-sitewide-feed'));
    } elseif ($type == 'posts') {
        $posts = $this->get_data($type);
        $feedtitlefull = esc_html($this->feedtitle . __(' Posts', 'ada-wpms-sitewide-feed'));
    } elseif ($type == 'pages') {
        $posts = $this->get_data($type);
        $feedtitlefull = esc_html($this->feedtitle . __(' Pages', 'ada-wpms-sitewide-feed'));
    }

    ob_start();
    echo '<?xml version="1.0" encoding="' . esc_attr(get_option('blog_charset')) . '"?>';
    ?>
    <rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:georss="http://www.georss.org/georss" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#" xmlns:media="http://search.yahoo.com/mrss/" <?php do_action('rss2_ns'); ?>>
    <channel>
        <title><?php echo esc_html(apply_filters('the_title_rss', $feedtitlefull)); ?></title>
        <atom:link href="<?php echo esc_url($this->create_feedurl($type)); ?>" rel="self" type="application/rss+xml" />
        <link><?php echo esc_url(bloginfo_rss('url')); ?></link>
        <description><?php echo esc_html(convert_chars(wp_strip_all_tags($this->feeddesc))); ?></description>
        <lastBuildDate><?php echo esc_html(mysql2date('D, d M Y H:i:s +0000', $this->latest_time(), false)); ?></lastBuildDate>
        <language><?php echo esc_html(get_option('rss_language')); ?></language>
        <?php if ($this->siteimageurl) { ?>
        <image>
            <url><?php echo esc_url($this->siteimageurl); ?></url>
            <title><?php echo esc_html(apply_filters('the_title_rss', $feedtitlefull)); ?></title>
            <link><?php echo esc_url($this->domainpath); ?></link>
        </image>
        <?php } ?>
        <?php if (!empty($posts)) {
            do_action('rss2_head');
            foreach ($posts as $post) {
                switch_to_blog($post->blogid);

                // Start the WordPress Loop
                $args = array(
                    'post_type' => 'any',
                    'p' => $post->ID, // Get the specific post by ID
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <item>
                            <title><?php echo esc_html(get_the_title()); ?></title>
                            <link><?php echo esc_url(get_the_permalink()); ?></link>
                            <comments><?php echo esc_url(get_comments_link()); ?></comments>
                            <pubDate><?php echo esc_html(get_post_time('D, d M Y H:i:s +0000', true)); ?></pubDate>
                            <dc:creator><?php echo esc_html(get_the_author()); ?></dc:creator>
                            <?php echo wp_kses_post(the_category_rss()); ?>
                            <guid isPermaLink="false"><![CDATA[<?php echo esc_html(get_the_guid()); ?>]]></guid>
                            <description><![CDATA[<?php echo esc_html(get_the_excerpt_rss()); ?>]]></description>
                            <?php if (!$this->excerpt) : ?>
                            <content:encoded><![CDATA[<?php echo esc_html(get_the_content()); ?>]]></content:encoded>
                            <?php endif; ?>
                            <wfw:commentRss><?php echo esc_url(get_post_comments_feed_link()); ?></wfw:commentRss>
                            <slash:comments><?php echo esc_html(get_comments_number()); ?></slash:comments>
                            <?php if ($this->showavatar) { ?>
                            <media:content url="<?php echo esc_url($this->adadaawsf_get_avatar_url(get_the_author_meta('ID'))); ?>" medium="image">
                                <media:title type="html"><?php echo esc_html(get_the_author()); ?></media:title>
                            </media:content>
                            <?php } ?>
                            <?php rss_enclosure(); ?>
                            <?php do_action('rss2_item'); ?>
                        </item>
                    <?php endwhile;
                endif;

                wp_reset_postdata(); // Reset post data after custom loop
                restore_current_blog();
            }
        } ?>
        <?php if (!empty($comments)) {
            do_action('commentsrss2_head');
            foreach ($comments as $comment) {
                switch_to_blog($comment->blogid);
                get_post_custom($comment->comment_post_ID); ?>
                <item>
                    <title><?php
                        $title = esc_html(get_the_title($comment->comment_post_ID));
                        $title = apply_filters('the_title_rss', $title);
                       
                        $formatted_title = sprintf(
                             /* translators: 1: Post title, 2: Number of comments */
                            __('%1$s (%2$s)', 'ada-wpms-sitewide-feed'),
                            $title,
                            esc_html(get_comments_number($comment->comment_post_ID))
                        );
                        echo esc_html($formatted_title);
                    ?></title>
                    <link><?php echo esc_url(get_comment_link($comment->comment_ID)); ?></link>
                    <dc:creator><?php echo esc_html(get_comment_author_rss()); ?></dc:creator>
                    <pubDate><?php echo esc_html(get_comment_time('D, d M Y H:i:s +0000', true)); ?></pubDate>
                    <guid isPermaLink="false"><?php echo esc_html(get_comment_guid()); ?></guid>
                    <description><![CDATA[<?php echo esc_html(get_comment_text_rss()); ?>]]></description>
                    <content:encoded><![CDATA[<?php echo esc_html(get_comment_text()); ?>]]></content:encoded>
                    <?php if ($this->showavatar) { ?>
                    <media:content url="<?php echo esc_url($this->adadaawsf_get_avatar_url($comment->comment_author_email)); ?>" medium="image">
                        <media:title type="html"><?php echo esc_html(get_comment_author()); ?></media:title>
                    </media:content>
                    <?php } ?>
                    <?php do_action('commentrss2_item', $comment->comment_ID, $comment->comment_post_ID); ?>
                </item>
                <?php 
                restore_current_blog();
            }
        } ?>
    </channel>
    </rss>
    <?php
    $feed = ob_get_contents();
    ob_end_clean();
    return $feed;
}



	function config_page() {
		global $adadaawsf_updated, $adadaawsf_config_error;
		//get_currentuserinfo();
		if (!is_super_admin()) {
    // Translate the string without HTML tags
    $message = esc_html__('You do not have permission to access this page.', 'ada-wpms-sitewide-feed');
    
    // Output the HTML safely
    die('<p>' . esc_html($message) . '</p>');
}
		/*if (isset($_POST['action']) && $_POST['action'] == 'update') {
			if (!isset($_POST['reset'])) {
				$this->save_settings();
			}
			else $this->delete_settings();
		}



			if (isset($_POST['action']) && $_POST['action'] == 'update') {
			// Verify the nonce
				if (isset($_POST['update_settings_nonce']) && wp_verify_nonce($_POST['update_settings_nonce'], 'update_settings_action')) {
				if (!isset($_POST['reset'])) {
					$this->save_settings();
				} else {
					$this->delete_settings();
					}
				} else {
					// Handle the error: nonce verification failed
					wp_die(esc_html__('Nonce verification failed, please try again.', 'text-domain'));

					}
			}*/

           if (isset($_POST['action']) && $_POST['action'] === 'update') {
    // Verify the nonce
    if (!isset($_POST['update_settings_nonce']) || 
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['update_settings_nonce'])), 'update_settings_action')) {
        // Handle the error: nonce verification failed
        wp_die(esc_html__('Nonce verification failed, please try again.', 'ada-wpms-sitewide-feed'));
    }

    if (!isset($_POST['reset'])) {
        $this->save_settings();
    } else {
        $this->delete_settings();
    }
}





		if ($adadaawsf_updated) { ?>
<div id="message" class="updated fade"><p><?php esc_html_e('Options saved.', 'ada-wpms-sitewide-feed') ?></p></div>
<?php	} elseif (is_array($adadaawsf_config_error)) { ?>
<div class="error">
    <p><?php echo implode('<br />', array_map('esc_html', $adadaawsf_config_error)); ?></p>
</div>

<?php	} ?>
<div class="wrap">
<h2>Sitewide Feed Options</h2>
<fieldset class="options"> 
<p>This plugin creates four (4) seperate RSS 2.0 feeds from posts, comments, pages, and one combined [posts &amp; pages] across all blogs on your WordPress powered site. (version: <?php echo esc_html($this->version); ?>)  (<a href="http://1uthavi.adadaa.com/ada-wpmu-sitewide-feed-plugin/" target="_blank">Plugin Homepage</a>)</p>
<?php if (!$this->check_cache()) { ?>
<p style="color:#CC0000;font-weight:bold;">NOTE: Your WordPress is not using <a href="http://ryan.boren.me/2005/11/14/persistent-object-cache/" target="_blank">WP Object Cache</a>. Performance will be degraded and site load increased. Please use the object cache for maximum performance.</p>
<?php } elseif (!$this->cache) { ?>
<p style="color:#CC0000;font-weight:bold;">NOTE: You have disabled usage of the <a href="http://ryan.boren.me/2005/11/14/persistent-object-cache/" target="_blank">WP Object Cache</a> for this plugin. Performance will be degraded and site load increased. Please use the object cache for maximum performance.</p>
<?php } ?>
<form name="sitefeedform" action="" method="post">
	 <?php wp_nonce_field('update_settings_action', 'update_settings_nonce'); ?>
<table width="100%" cellspacing="2" cellpadding="5" class="editform">
  <tr valign="top">
    <th scope="row"><label for="triggerblog"><?php esc_html_e('Trigger Blog ID:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="triggerblog" type="text" id="triggerblog" value="<?php echo esc_attr($this->triggerblog); ?>" size="3" /></td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="triggerurl"><?php esc_html_e('Feed URL (relative path):', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="triggerurl" type="text" id="triggerurl" value="<?php echo esc_attr($this->triggerurl); ?>" size="25" title='<?php esc_html_e("This is the combined feeds of Posts &amp; Pages. Must be a relative path beginning with and ending with a \"/\". Default: /full-feed/", 'ada-wpms-sitewide-feed') ?>' /> 
    (<?php echo wp_kses_post($this->create_testlink('fullfeed')); ?>)</td>
  </tr>
  <?php //CAPitalZ{REMOVE ?>
  <!--<tr valign="top">
    <th scope="row"><?php esc_html_e('Comments-Thamizh Feed URL (appended to Feed URL):', 'ada-wpms-sitewide-feed') ?>
    </th>
    <td><input name="commentstamilurl" type="text" id="commentstamilurl" value="<?php echo esc_attr($this->commentstamilurl); ?>" size="25" title='<?php esc_html_e("Must be a relative path ending with a \"/\". Default: commentstamil/", 'ada-wpms-sitewide-feed') ?>' /> 
    (<?php echo wp_kses_post($this->create_testlink('commentstamil')); ?>)</td>
  </tr>-->
  <?php //CAPitalZ}REMOVE ?>
  <tr valign="top">
    <th scope="row"><label for="postsurl"><?php esc_html_e('Posts Feed URL (appended to Feed URL):', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="postsurl" type="text" id="postsurl" value="<?php echo esc_attr($this->postsurl); ?>" size="25" title='<?php esc_html_e("Must be a relative path ending with a \"/\". Default: posts/", 'ada-wpms-sitewide-feed') ?>' /> 
    (<?php echo wp_kses_post($this->create_testlink('posts')); ?>)</td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="commentsurl"><?php esc_html_e('Comments Feed URL (appended to Feed URL):', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="commentsurl" type="text" id="commentsurl" value="<?php echo esc_attr($this->commentsurl); ?>" size="25" title='<?php esc_html_e("Must be a relative path ending with a \"/\". Default: comments/", 'ada-wpms-sitewide-feed') ?>' /> 
    (<?php echo wp_kses_post($this->create_testlink('comments')); ?>)</td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="pagesurl"><?php esc_html_e('Pages Feed URL (appended to Feed URL):', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="pagesurl" type="text" id="pagesurl" value="<?php echo esc_attr($this->pagesurl); ?>" size="25" title='<?php esc_html_e("Must be a relative path ending with a \"/\". Default: pages/", 'ada-wpms-sitewide-feed') ?>' /> 
    (<?php echo wp_kses_post($this->create_testlink('pages')); ?>)</td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="feedtitle"><?php esc_html_e('Feed Title:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="feedtitle" type="text" id="feedtitle" value="<?php echo esc_attr($this->feedtitle); ?>" size="60" /></td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="feeddesc"><?php esc_html_e('Feed Description:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="feeddesc" type="text" id="feeddesc" value="<?php echo esc_attr($this->feeddesc); ?>" size="60" /></td>
  </tr>
  <tr valign="top">
    <th width="33%" scope="row"><label for="feedcount"><?php esc_html_e('Show the most recent:', 'ada-wpms-sitewide-feed') ?></label></th>
    <td><input name="feedcount" type="text" id="feedcount" value="<?php echo esc_attr($this->feedcount); ?>" size="3" /> <?php esc_html_e('posts', 'ada-wpms-sitewide-feed') ?></td>
  </tr>
  <tr valign="top">
    <th scope="row"><?php esc_html_e('For each article, show:', 'ada-wpms-sitewide-feed') ?>
    </th>
    <td><label>
      <input name="excerpt"  type="radio" value="0" <?php checked(0, $this->excerpt); ?>  />
      <?php esc_html_e('Full text', 'ada-wpms-sitewide-feed') ?>
      </label>
        <br />
        <label>
        <input name="excerpt" type="radio" value="1" <?php checked(1, $this->excerpt); ?> />
        <?php esc_html_e('Summary', 'ada-wpms-sitewide-feed') ?>
        </label>
    </td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="mincontentchars"><?php esc_html_e('Minimum number of chars in content:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="mincontentchars" type="text" id="mincontentchars" value="<?php echo esc_attr($this->mincontentchars); ?>" size="3" title='<?php esc_html_e("Minimum number of chars needed in the content before they show up in the feed. Default: 25", 'ada-wpms-sitewide-feed') ?>' /></td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="siteimageurl"><?php esc_html_e('URL of site image:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><input name="siteimageurl" type="text" id="siteimageurl" value="<?php echo esc_attr($this->siteimageurl); ?>" size="60" title='<?php esc_html_e("Enter the full URL for the image of your site.  If you leave it blank, it will not be included.", 'ada-wpms-sitewide-feed') ?>' /></td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="showavatar"><?php esc_html_e('Show avatar:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><label>
      <input name="showavatar"  type="checkbox" id="showavatar" value="1" <?php checked(1, $this->showavatar); ?>  />
      </label>
    </td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="showstats"><?php esc_html_e('Append stats to feed:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><label>
      <input name="showstats"  type="checkbox" id="showstats" value="1" <?php checked(1, $this->showstats); ?>  />
      </label>
    </td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="etag"><?php esc_html_e('Use ETag header:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><label>
      <input name="etag"  type="checkbox" id="etag" value="1" <?php checked(1, $this->etag); ?>  />
      </label>
    </td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="cache"><?php esc_html_e('Use Object Cache:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><label>
      <input name="cache"  type="checkbox" id="cache" value="1" <?php checked(1, $this->cache); ?>  />
      </label>
    </td>
  </tr>
  <tr valign="top">
    <th width="33%" scope="row"><label for="expiretime"><?php esc_html_e('Expire feed from cache after:', 'ada-wpms-sitewide-feed') ?></label></th>
    <td><input name="expiretime" type="text" id="expiretime" value="<?php echo esc_attr($this->expiretime); ?>" size="3" title="Default: 0 (expire only when needed). Any greater value (expire to account for future dated posts)" /> 
    <?php echo esc_html_e('minutes', 'ada-wpms-sitewide-feed') ?></td>
  </tr>
  <tr valign="top">
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr valign="top">
    <th scope="row"><label for="reset"><?php esc_html_e('Reset all settings to default:', 'ada-wpms-sitewide-feed') ?></label>
    </th>
    <td><label>
      <input name="reset" type="checkbox" value="1" id="reset" />
      </label>
    </td>
  </tr>
</table>
<p class="submit">
<input type="hidden" name="action" value="update" /> 
<input type="submit" name="Submit" value="<?php esc_html_e('Update Options','ada-wpms-sitewide-feed') ?> &raquo;" /> 
</p>
</form>
</fieldset>
</div>
<?php
	}
}

//all your posts, comments, pages, and base are belong to us!
if (defined('ABSPATH')) $adadaawsf_sitewidefeed = new adadaawsf_sitewidefeed();
?>