<?php
/*
Plugin Name: Display Remote Posts Block
Description: Block to display recent posts from a WordPress or Blogger blog
Author: Webd Ltd
Version: 1.1.0
Author URI: https://webd.uk
Text Domain: display-remote-posts-block
*/



if (!defined('ABSPATH')) {
    exit('This isn\'t the page you\'re looking for. Move along, move along.');
}



if (!class_exists('display_remote_posts_block_class')) {

	class display_remote_posts_block_class {

        public static $version = '1.1.0';

        function __construct() {

            add_action('init', array($this, 'init'));
            add_action('display_remote_posts_block_cron', array($this, 'display_remote_posts_block_cron'));

            if (!wp_next_scheduled('display_remote_posts_block_cron')) {

                wp_schedule_event(time(), 'hourly', 'display_remote_posts_block_cron');

            }

            register_deactivation_hook(__FILE__, array($this, 'display_remote_posts_block_deactivate')); 

            if (is_admin()) {

                add_action('admin_notices', 'drpbCommon::admin_notices');
                add_action('wp_ajax_dismiss_drpb_notice_handler', 'drpbCommon::ajax_notice_handler');
                add_filter('plugin_row_meta', 'drpbCommon::plugin_row_meta', 10, 4);

            }

        }

        public function init() {

            if (false === self::check_gutenberg()) {

                return false;

            }

            $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');
 
            wp_register_script(
                'display-remote-posts-block',
                plugins_url( 'build/index.js', __FILE__ ),
                $asset_file['dependencies'],
                $asset_file['version']
            );
 
            register_block_type( 'display-remote-posts-block/display-remote-posts', array(
                'apiVersion' => 3,
                'editor_script' => 'display-remote-posts-block',
                'render_callback' => array($this, 'render_display_remote_posts_block'),
                'textdomain'      => 'display-remote-posts-block',
                'attributes'      => array(
                    'url' => array(
                        'type'      => 'string',
                        'default'   => ''
                    ),
                    'title' => array(
                        'type'      => 'boolean',
                        'default'   => true
                    ),
                    'post_date' => array(
                        'type'      => 'boolean',
                        'default'   => false
                    ),
                    'posts' => array(
                        'type'      => 'number',
                        'default'   => 1
                    ),
                    'offset' => array(
                        'type'      => 'number',
                        'default'   => 0
                    ),
                    'featured_images' => array(
                        'type'      => 'boolean',
                        'default'   => true
                    ),
                    'excerpts' => array(
                        'type'      => 'boolean',
                        'default'   => true
                    ),
            		'target_blank' => array(
            			'type'      => 'boolean',
            			'default'   => false
	            	),
	            	'max_width' => array(
	            		'type'      => 'number',
	            		'default'   => 0
	               	)
                )
            ));

            wp_set_script_translations('display-remote-posts-block', 'display-remote-posts-block');

        }

        public function display_remote_posts_block_cron() {

            delete_option('display_remote_posts_block_cache');

        }

        public function display_remote_posts_block_deactivate() {

            $timestamp = wp_next_scheduled('display_remote_posts_block_cron');
            wp_unschedule_event($timestamp, 'display_remote_posts_block_cron');

        }

        public function render_display_remote_posts_block($attributes, $content) {

            $attributes = shortcode_atts(array(
                'url' => '',
                'title' => true,
                'post_date' => false,
                'posts' => 1,
                'offset' => 0,
                'featured_images' => true,
                'excerpts' => true,
                'target_blank' => false,
                'max_width' => 0
            ), $attributes);

            $content = '<div class="wp-block-display-remote-posts wp-block-display-remote-posts__inner-container">';

            $attributes['url'] = trailingslashit(sanitize_url($attributes['url']));

            if ('/' === $attributes['url']) {

                $attributes['url'] = get_home_url();

            }

            if (filter_var($attributes['url'], FILTER_VALIDATE_URL)) {

                $cached_data = get_option('display_remote_posts_block_cache', array());

                $url_hash = md5($attributes['url']);

                if (isset($cached_data[$url_hash])) {

                    $blog_data = $cached_data[$url_hash];

                } else {

                    $blog_data = $this->get_wordpress_com_data($attributes['url']);

                    if (is_wp_error($blog_data)) {

                        $blog_data = $this->get_wordpress_org_data($attributes['url']);

                    }

                    if (is_wp_error($blog_data)) {

                        $blog_data = $this->get_blogger_data($attributes['url']);

                    }

                    if (!is_wp_error($blog_data)) {

                        $cached_data[$url_hash] = $blog_data;

                        update_option('display_remote_posts_block_cache', $cached_data);

                    }

                }

                if (!is_wp_error($blog_data)) {

                    if ($attributes['title'] && isset($blog_data->name) && $blog_data->name) {

                        $content .= '<h3>' . esc_html($blog_data->name) . '</h3>' . PHP_EOL;

                    }

                    $post_counter = 0;

        		    foreach ($blog_data->posts as $single_post) {

                        $post_counter++;

                        if (($post_counter - 1) < absint($attributes['offset'])) { continue; }

                        if ($post_counter > (absint($attributes['posts']) + absint($attributes['offset']))) { break; }

                        If (isset($single_post->URL) && $single_post->URL) {

                		    $content .= '<h4><a href="' . esc_url($single_post->URL) . '" title="' . esc_attr( $single_post->title ) . '"' . ($attributes['target_blank'] ? ' target="_blank"': '') . '>' . esc_html($single_post->title) . '</a></h4>' . PHP_EOL;

                        } else {

                		    $content .= '<h4>' . esc_html($single_post->title) . '</h4>' . PHP_EOL;

                        }

                        If ($attributes['post_date'] && isset($single_post->post_date) && absint($single_post->post_date)) {

                		    $content .= '<div class="wp-block-post-date"><time datetime="' . date_i18n('c', absint($single_post->post_date)) . '">' . date_i18n(get_option('date_format'), absint($single_post->post_date)) . '</time></div>' . PHP_EOL;

                        }

                        if ($attributes['max_width'] && isset($single_post->srcset) && is_array($single_post->srcset) && $single_post->srcset) {

                            foreach ($single_post->srcset as $width => $url) {

                                $single_post->featured_image = $url;

                                if ($width <= $attributes['max_width']) {

                                    break;

                                }

                            }

                        }

                        if (isset($single_post->URL) && $single_post->URL && $attributes['featured_images'] && $single_post->featured_image) {

                			$content .= '<figure class="wp-block-image"><a title="' . esc_attr( $single_post->title ) . '" href="' . esc_url($single_post->URL) . '"' . ($attributes['target_blank'] ? ' target="_blank"': '') . '><img src="' . esc_url($single_post->featured_image) . '" alt="' . esc_attr($single_post->title ) . '"/></a></figure>' . PHP_EOL;

                        } elseif ($attributes['featured_images'] && $single_post->featured_image) {

                			$content .= '<figure class="wp-block-image"><img src="' . esc_url($single_post->featured_image) . '" alt="' . esc_attr($single_post->title ) . '"/></figure>' . PHP_EOL;

                        }

            			if ($attributes['excerpts'] && $single_post->excerpt) {

            				$content .= '<p>' . $single_post->excerpt . '</p>' . PHP_EOL;

            			}

            		}

                } else {

                    if (current_user_can('editor') || current_user_can('administrator')) {

                        $content .= '<h3>' . __('Display Remote Posts Error', 'display-remote-posts-block') . '</h3>
<h4>' . __('Error:', 'display-remote-posts-block') . ' ' . $blog_data->errors[$this->array_key_first($blog_data->errors)][0] . '</h4>
';

                        if (isset($blog_data->error_data[$this->array_key_first($blog_data->errors)])) {

                            $content .= '<p>' . $blog_data->error_data[$this->array_key_first($blog_data->errors)] . '</p>
';

                        }

                    }

                }

            } elseif ($attributes['url'] && !filter_var($attributes['url'], FILTER_VALIDATE_URL)) {

                if(current_user_can('editor') || current_user_can('administrator')) {

                    $content .= '<h3>' . __('Display Remote Posts Error', 'display-remote-posts-block') . '</h3>
<h4>' . __('You need to enter a valid blog URL!', 'display-remote-posts-block') . '</h4>
<p>' . __('Edit the block settings and provide a valid web address for the blog.', 'display-remote-posts-block') . '</p>
';

                }

            } else {

                if(current_user_can('editor') || current_user_can('administrator')) {

                    $content .= '<h3>' . __('Display Remote Posts', 'display-remote-posts-block') . '</h3>
<h4>' . __('Edit the block settings to get started!', 'display-remote-posts-block') . '</h4>
<p>' . __('To show posts from another blog, edit the block settings and provide the web address for the blog.', 'display-remote-posts-block') . '</p>
';

                }

            }

            $content .= '</div>';

            return $content;
  
        }

        private function array_key_first($array) {

            if (is_array($array)) {

                if (function_exists('array_key_first')) {

                    return array_key_first($array);

                } else {

                    foreach ($array as $key => $value) { 

                        return $key; 

                    }

                }

            }

            return false;

        }

        private function get_wordpress_com_data($url) {

            $blog_info = $this->remote_get_data('https://public-api.wordpress.com/rest/v1.1/sites/' . urlencode($url) . '?fields=ID,name');

            if (is_wp_error($blog_info)) { return $blog_info; }

            $blog_info = json_decode($blog_info);

            if (!$blog_info) {

    			return new WP_Error(
				    'no_body',
				    __('Invalid remote response.', 'display-remote-posts-block'),
				    __('Invalid JSON from remote.', 'display-remote-posts-block')
			    );

            }

		    if (isset($blog_info->error)) {

    			return new WP_Error(
				    'remote_error',
				    __('It looks like the WordPress site URL is incorrectly configured. Please check it in the block settings.', 'display-remote-posts-block'),
				    $blog_posts->error
			    );

    		}

            if (!isset($blog_info->ID) && !isset($blog_info->name)) {

    			return new WP_Error(
				    'no_data',
				    __('Incorrect data received!', 'display-remote-posts-block'),
				    __('No site ID and / or name returned', 'display-remote-posts-block')
			    );

            }

            $blog_info->ID = absint($blog_info->ID);
            $blog_info->name = sanitize_text_field((string) $blog_info->name);

            $blog_posts = $this->remote_get_data('https://public-api.wordpress.com/rest/v1.1/sites/' . absint($blog_info->ID) . '/posts/?fields=id,title,date,excerpt,URL,featured_image,content&number=10');

            if (is_wp_error($blog_posts)) { return $blog_posts; }

            $blog_posts = json_decode($blog_posts);

            if (!$blog_posts) {

    			return new WP_Error(
				    'no_body',
				    __('Invalid remote response.', 'display-remote-posts-block'),
				    __('Invalid JSON from remote.', 'display-remote-posts-block')
			    );

            }

		    if (isset($blog_posts->error)) {

    			return new WP_Error(
				    'remote_error',
				    __('It looks like the WordPress site URL is incorrectly configured. Please check it in the block settings.', 'display-remote-posts-block'),
				    $blog_posts->error
			    );

    		}

            if (!isset($blog_posts->posts)) {

    			return new WP_Error(
				    'no_data',
				    __('Incorrect data received!', 'display-remote-posts-block'),
				    __('No site ID and / or name returned', 'display-remote-posts-block')
			    );

            }

            $blog_info->posts = $blog_posts->posts;

            foreach ($blog_info->posts as $key => $single_post) {

                if (!(isset($single_post->title) && sanitize_text_field((string) $single_post->title))) { $blog_info->posts[$key]->title = __('Blog Post', 'display-remote-posts-block'); } else { $blog_info->posts[$key]->title = sanitize_text_field((string) $single_post->title); }

                $blog_info->posts[$key]->post_date = (isset($single_post->date) && absint(strtotime($single_post->date))) ? strtotime($single_post->date) : false;
                unset($blog_info->posts[$key]->date);
                $blog_info->posts[$key]->URL = (isset($single_post->URL) && sanitize_url($single_post->URL)) ? sanitize_url($single_post->URL) : false;

                if (!(isset($single_post->excerpt) && $single_post->excerpt)) { $blog_info->posts[$key]->excerpt = false; }

                $blog_info->posts[$key]->excerpt = strip_tags($blog_info->posts[$key]->excerpt);

                if (strpos($blog_info->posts[$key]->excerpt, ' [&hellip;]') === false) {

                    $blog_info->posts[$key]->excerpt = trim(substr($blog_info->posts[$key]->excerpt, 0, strpos(strip_tags($blog_info->posts[$key]->excerpt), '&hellip;'))) . ' [&hellip;]';

                }

                $blog_info->posts[$key]->srcset = false;

                preg_match_all('/<img.+?srcset=[\'"]([^\'"]+)[\'"].*?>/i', $single_post->content, $post_images);

    			if (isset($post_images[1][0])) {

                    $post_images = explode(', ', $post_images[1][0]);
                    $post_srcset = array();

                    foreach ($post_images as $post_image) {

                        $post_image = explode(' ', $post_image);
                        $post_srcset[absint($post_image[1])] = sanitize_url($post_image[0]);

                    }

                    krsort($post_srcset);
                    $blog_info->posts[$key]->srcset = $post_srcset;

                }

                $blog_info->posts[$key]->featured_image = (isset($single_post->featured_image) && sanitize_url($single_post->featured_image)) ? sanitize_url($single_post->featured_image) : false;

            }

            return $blog_info;

        }

        private function get_wordpress_org_data($url) {

            $blog_data = $this->remote_get_data($url . '/feed/');

            if (is_wp_error($blog_data)) { return $blog_data; }

            libxml_use_internal_errors(true);

            $blog_data = simplexml_load_string($blog_data);

            if (!$blog_data || !isset($blog_data->channel)) {

    			return new WP_Error(
				    'no_data',
				    __('No XML data received!', 'display-remote-posts-block'),
				    __('The data returned was not an XML feed', 'display-remote-posts-block')
			    );

            }

            $blog_data = $blog_data->channel;

            $blog_info = new stdClass();
            $blog_info->ID = false;

            if (isset($blog_data->title) && sanitize_text_field((string) $blog_data->title)) { $blog_info->name = sanitize_text_field((string) $blog_data->title); } else { $blog_info->name = false; }

            $blog_info->posts = array();
            $post_counter = 0;

		    foreach ($blog_data->item as $single_post) {

                $post_counter++;

                if ($post_counter > 10) { break; }

                $blog_post = new stdClass();
                $blog_post->title = (isset($single_post->title) && sanitize_text_field((string) $single_post->title)) ? sanitize_text_field((string) $single_post->title) : __('Blog Post', 'display-remote-posts-block');
                $blog_post->URL = (isset($single_post->link) && sanitize_url($single_post->link)) ? sanitize_url($single_post->link) : false;
                $blog_post->post_date = (isset($single_post->pubDate) && absint(strtotime($single_post->pubDate))) ? strtotime($single_post->pubDate) : false;

                if ($single_post->children("content", true)) {

                    $blog_post->excerpt = $this->get_excerpt($single_post->children("content", true));
                    preg_match_all('/<img.+?srcset=[\'"]([^\'"]+)[\'"].*?>/i', (string) $single_post->children("content", true), $post_images);

        			if (isset($post_images[1][0])) {

                        $post_images = explode(', ', $post_images[1][0]);
                        $post_srcset = array();

                        foreach ($post_images as $post_image) {

                            $post_image = explode(' ', $post_image);
                            $post_srcset[absint($post_image[1])] = sanitize_url($post_image[0]);

                        }

                        krsort($post_srcset);
                        $blog_post->srcset = $post_srcset;
                        $blog_post->featured_image = reset($post_srcset);

                    } else {

                        preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', (string) $single_post->children("content", true), $post_images);

            			if (isset($post_images[1][0])) {

                            $blog_post->srcset = false;
                            $blog_post->featured_image = sanitize_url($post_images[1][0]);

                        } else {

                            $blog_post->srcset = false;
                            $blog_post->featured_image = false;

                        }

                    }

                } elseif (isset($single_post->description) && $single_post->description) {

                    $blog_post->excerpt = $this->get_excerpt($single_post->description);
                    $blog_post->srcset = false;
                    $blog_post->featured_image = false;

                } else {

                    $blog_post->excerpt = false;
                    $blog_post->srcset = false;
                    $blog_post->featured_image = false;

                }

                $blog_info->posts[] = $blog_post;

    		}

            return $blog_info;

        }

        private function get_blogger_data($url) {

            $blog_data = $this->remote_get_data($url . '/feeds/posts/default');

            if (is_wp_error($blog_data)) { return $blog_data; }

            libxml_use_internal_errors(true);

            $blog_data = simplexml_load_string($blog_data);

            if (!$blog_data || !isset($blog_data->entry)) {

    			return new WP_Error(
				    'no_data',
				    __('No XML data received!', 'display-remote-posts-block'),
				    __('The data returned was not an XML feed', 'display-remote-posts-block')
			    );

            }

            $blog_info = new stdClass();
            $blog_info->ID = false;

            if (isset($blog_data->title) && sanitize_text_field((string) $blog_data->title)) { $blog_info->name = sanitize_text_field((string) $blog_data->title); } else { $blog_info->name = false; }

            $blog_info->posts = array();
            $post_counter = 0;

		    foreach ($blog_data->entry as $single_post) {

                $post_counter++;

                if ($post_counter > 10) { break; }

                $blog_post = new stdClass();
                $blog_post->title = (isset($single_post->title) && sanitize_text_field((string) $single_post->title)) ? sanitize_text_field((string) $single_post->title) : __('Blog Post', 'display-remote-posts-block');
                $blog_post->post_date = (isset($single_post->published) && absint(strtotime($single_post->published))) ? strtotime($single_post->published) : false;

                foreach ($single_post->link as $link_feed) {

                    if ((string) $link_feed['rel'] === 'alternate') {

                        $blog_post->URL = sanitize_url((string) $link_feed['href']);

                        break;

                    }

                }

                if (!isset($blog_post->URL)) { $blog_post->URL = false; }

                if (isset($single_post->content) && $single_post->content) {

                    $blog_post->excerpt = $this->get_excerpt($single_post->content);

                    preg_match_all('/<img.+?srcset=[\'"]([^\'"]+)[\'"].*?>/i', (string) $single_post->content, $post_images);

        			if (isset($post_images[1][0])) {

                        $post_images = explode(', ', $post_images[1][0]);
                        $post_srcset = array();

                        foreach ($post_images as $post_image) {
                            $post_image = explode(' ', $post_image);
                            $post_srcset[absint($post_image[1])] = sanitize_url($post_image[0]);
                        }

                        krsort($post_srcset);

                        $blog_post->srcset = $post_srcset;
                        $blog_post->featured_image = reset($post_srcset);

                    } else {

                        preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', (string) $single_post->content, $post_images);

            			if (isset($post_images[1][0])) {

                            $blog_post->srcset = false;
                            $blog_post->featured_image = sanitize_url($post_images[1][0]);

                        } else {

                            $blog_post->srcset = false;
                            $blog_post->featured_image = false;

                        }

                    }

                } else {

                    $blog_post->excerpt = false;
                    $blog_post->srcset = false;
                    $blog_post->featured_image = false;

                }

                $blog_info->posts[] = $blog_post;

    		}

            return $blog_info;

        }

        private function get_excerpt($text) {

            $text = strip_shortcodes( $text );
            $text = excerpt_remove_blocks( $text );
            $text = apply_filters( 'the_content', $text );
            $text = str_replace( ']]>', ']]&gt;', $text );
            $excerpt_length = (int) _x( '55', 'excerpt_length' );
            $excerpt_length = (int) apply_filters( 'excerpt_length', $excerpt_length );
            $text = ltrim(wp_trim_words( $text, $excerpt_length, ' […]' ), '&nbsp;');

            return $text;

        }

        private function remote_get_data($url) {

            $response = wp_remote_get( $url, array( 'timeout' => 15 ) );

    		if (is_wp_error($response)) {

			    return $response;

		    }

    		if (wp_remote_retrieve_response_code($response) !== 200) {

    			return new WP_Error(
    				'http_error',
    				__('An error occurred fetching the remote data.', 'display-remote-posts-block'),
    				wp_remote_retrieve_response_message($response)
    			);

    		}

            $response_body = wp_remote_retrieve_body($response);

		    if (!$response_body) {

    			return new WP_Error(
    				'no_body',
    				__('Invalid remote response.', 'display-remote-posts-block' ),
    				__('No body in response.', 'display-remote-posts-block')
    			);
    		} else {

                return $response_body;

    		}

        }

        static function check_gutenberg() {

            if (false === defined('GUTENBERG_VERSION') && false === version_compare(get_bloginfo('version'), '5.0', '>=')) {

                add_action('admin_notices', array(__CLASS__, 'notice_gutenberg_missing'));

                return false;

            }
 
        }

        static function notice_gutenberg_missing() {

            echo '<div class="error"><p><b>' . __('Display Remote Posts Block', 'display-remote-posts-block') . '</b> ' . __('plugin requires the Gutenberg plugin to work. It is after all a block for Gutenberg ;)', 'display-remote-posts-block') . '<br>' . __('Install the', 'display-remote-posts-block') . ' <a href="https://wordpress.org/plugins/gutenberg/" target="_blank">' . __('Gutenberg plugin', 'display-remote-posts-block') . '</a> ' . __('and this notice will go away.', 'display-remote-posts-block') . '</p></div>';

        }

    }

    if (!class_exists('drpbCommon')) {

        require_once(dirname(__FILE__) . '/includes/class-drpb-common.php');

    }

    $display_remote_posts_block_object= new display_remote_posts_block_class();

}

?>
