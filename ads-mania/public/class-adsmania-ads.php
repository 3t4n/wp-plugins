<?php
/**
 * The public-facing functionality of the plugin.
 * @since      1.0.0
 *
 * @package    ADSMANIA
 * @subpackage adsmania/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    ADSMANIA
 * @subpackage adsmania/public
 * @author     Abu Bakr Soliman <bakrianoo@gmail.com>
 */
class ADSMANIA_ads {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * This function for getting current active ads.
	 *
	 * @since    1.0.0
	 */         
        public function get_active_ads($type, $order = 'ads_start_at') {
            $query = array();
            // set query based on type of ads
            if($type == 'intro')
            {
                $query = array(
                        'relation' => 'AND',
                        array(
                                'key' => 'ads_type',
                                'value' => 'ads_content',
                                'compare' => '!='
                        ),
                        // select based on start and end dates
                        array(
                                'key' => 'ads_start_at',
                                'value' => time(),
                                'type' => 'NUMERIC',
                                'compare' => '<='
                        ),
                        array(
                                'key' => 'ads_end_at',
                                'value' => time(),
                                'type' => 'NUMERIC',
                                'compare' => '>='
                        ));
            }
            else if($type == 'content')
            {
                $query = array(
                        'relation' => 'AND',
                        array(
                                'key' => 'ads_type',
                                'value' => 'ads_content',
                                'compare' => '='
                        ),
                        array(
                                'key' => 'ads_start_at',
                                'value' => time(),
                                'type' => 'NUMERIC',
                                'compare' => '<='
                        ),
                        array(
                                'key' => 'ads_end_at',
                                'value' => time(),
                                'type' => 'NUMERIC',
                                'compare' => '>='
                        ));
            }

            // other WP_Query arguments
            $args = array(
                    'post_type'   => 'ads_post',
                    'post_status' => 'publish',

                    'order'               => 'DESC',
                    'orderby'             => $order, // order by date or randomly

                    'meta_query' => $query
            );

            return new WP_Query( $args );
        }
         
        /**
	 * This function for checking if the ads can be displayed in current page.
	 *
	 * @since    1.0.0
	 */
        public function is_allowed($ads_id) {
		$view_in = get_post_meta($ads_id,'ads_view_in');
		$ret = false;
		switch($view_in[0]) {
                    case 'all':
				$ret = true; break;
                                    
                    case 'home':
				if(is_home()) $ret = true; break;
                                    
                    case 'post':
				if(is_single()) $ret = true; break;
                                    
                    case 'page':
				if(is_page()) $ret = true; break;
                                    
                    case 'category':
				if(is_category()) $ret = true; break;
                                    
                    case 'author':
				if(is_author()) $ret = true; break;
                                    
                    case 'archive':
				if(is_archive()) $ret = true; break;
                                    
                    case 'search':
				if(is_search()) $ret = true; break;
                                    
                    case '404':
				if(is_404()) $ret = true; break;
                                    
                    case 'posts':
				$view_posts = explode(',', get_post_meta($ads_id,'ads_post_ids')[0]);
				if(is_single($view_posts)) {
					 $ret = true; 
				}  break;
                                    
                    case 'pages':
				$view_pages = explode(',', get_post_meta($ads_id,'ads_page_ids')[0]);
				if(is_page($view_pages)) {
					 $ret = true; 
				}  break;
                                    
                    case 'spec_category':
				$view_cats = explode(',', get_post_meta($ads_id,'ads_categories')[0]);
				if(in_category($view_cats)) {
					 $ret = true; 
				}  break;
		}
		return $ret;
	}
        
        /**
	 * This function for generating the soundcloud embeded code.
	 *
	 * @since    1.0.0
	 */
	public function soundcloud($ads_id)
	{
            $link = get_post_meta($ads_id,'ads_sound_link')[0];
            $ret = "";
            if($this->is_valid_url($link))
            {
                $options = array(
                    'ads_sound_w' => (isset(get_post_meta($ads_id,'ads_sound_w')[0]) && !empty(get_post_meta($ads_id,'ads_sound_w')[0])) ? get_post_meta($ads_id,'ads_sound_w')[0] : '100%',
                    'ads_sound_h' => (isset(get_post_meta($ads_id,'ads_sound_h')[0]) && !empty(get_post_meta($ads_id,'ads_sound_h')[0])) ? get_post_meta($ads_id,'ads_sound_h')[0] : '450',
                    'ads_sound_autoplay' => (isset(get_post_meta($ads_id,'ads_sound_autoplay')[0]) && !empty(get_post_meta($ads_id,'ads_sound_autoplay')[0])) ? get_post_meta($ads_id,'ads_sound_autoplay')[0] : 'false',
                    'ads_sound_visual' => (isset(get_post_meta($ads_id,'ads_sound_visual')[0]) && !empty(get_post_meta($ads_id,'ads_sound_visual')[0])) ? get_post_meta($ads_id,'ads_sound_visual')[0] : 'false',
                    'ads_sound_comments' => (isset(get_post_meta($ads_id,'ads_sound_comments')[0]) && !empty(get_post_meta($ads_id,'ads_sound_comments')[0])) ? get_post_meta($ads_id,'')[0] : 'false',
                    'ads_sound_user' => (isset(get_post_meta($ads_id,'ads_sound_user')[0]) && !empty(get_post_meta($ads_id,'ads_sound_user')[0])) ? get_post_meta($ads_id,'ads_sound_user')[0] : 'false',
                    );
                $ret['code'] = "<iframe width='{$options['ads_sound_w']}' height='{$options['ads_sound_h']}' scrolling='no' frameborder='no' src='https://w.soundcloud.com/player/?url={$link}&amp;auto_play={$options['ads_sound_autoplay']}&amp;hide_related=false&amp;show_comments={$options['ads_sound_comments']}&amp;show_user={$options['ads_sound_user']}&amp;show_reposts=false&amp;visual={$options['ads_sound_visual']}'></iframe>";
                $ret['w'] = $options['ads_sound_w'];
                $ret['h'] = $options['ads_sound_h'];
            }
            return $ret;
	}
         
        /**
	 * This function for generating the youtube embeded code.
	 *
	 * @since    1.0.0
	 */
	public function youtube($ads_id)
	{
            
            $ret = "";

            $link = get_post_meta($ads_id,'ads_media_link')[0];
            $url = parse_url($link);
            if(isset($url['query']) && strpos($url['query'], 'v=') >= 0)
            {
                    $link = str_replace("v=", "", $url['query']);
                    $options = array(
                            'ads_media_w' => (isset(get_post_meta($ads_id,'ads_media_w')[0]) && !empty(get_post_meta($ads_id,'ads_media_w')[0])) ? get_post_meta($ads_id,'ads_media_w')[0] : '550',
                            'ads_media_h' => (isset(get_post_meta($ads_id,'ads_media_h')[0]) && !empty(get_post_meta($ads_id,'ads_media_h')[0])) ? get_post_meta($ads_id,'ads_media_h')[0] : '310'
                            );

                    $ret['code'] = "<iframe width='{$options['ads_media_w']}' height='{$options['ads_media_h']}' src='//www.youtube.com/embed/{$link}' frameborder='0' allowfullscreen></iframe>";
                    $ret['w'] = $options['ads_media_w'];
                    $ret['h'] = $options['ads_media_h'];
            }
            return $ret;
	}
        
        /**
	 * This function for generating the vimeo embeded code.
	 *
	 * @since    1.0.0
	 */
        public function vimeo($ads_id)
        {
            $ret = "";
            $link = get_post_meta($ads_id,'ads_media_link')[0];
            $url = parse_url($link);
            print_r($url);
            if(isset($url['path']) && strpos($url['path'], '/') >= 0)
            {
                $options = array(
                        'ads_media_w' => (isset(get_post_meta($ads_id,'ads_media_w')[0]) && !empty(get_post_meta($ads_id,'ads_media_w')[0])) ? get_post_meta($ads_id,'ads_media_w')[0] : '550',
                        'ads_media_h' => (isset(get_post_meta($ads_id,'ads_media_h')[0]) && !empty(get_post_meta($ads_id,'ads_media_h')[0])) ? get_post_meta($ads_id,'ads_media_h')[0] : '310'
                        );
                $ret['code'] = "<iframe src='//player.vimeo.com/video{$url['path']}' width='{$options['ads_media_w']}' height='{$options['ads_media_h']}' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
                $ret['w'] = $options['ads_media_w'];
                $ret['h'] = $options['ads_media_h'];
            }
            return $ret;
        }

        /**
	 * This function for generating the facebook like box embeded code.
	 *
	 * @since    1.0.0
	 */
        public function facebook($ads_id)
        {
            $ret = "";
            $link = get_post_meta($ads_id,'ads_fb_link')[0];
            if($this->is_valid_url($link))
            {
                $options = array(
                    'ads_fb_theme' => (isset(get_post_meta($ads_id,'ads_fb_theme')[0]) && !empty(get_post_meta($ads_id,'ads_fb_theme')[0])) ? get_post_meta($ads_id,'ads_fb_theme')[0] : 'light',
                    'ads_fb_w' => (isset(get_post_meta($ads_id,'ads_fb_w')[0]) && !empty(get_post_meta($ads_id,'ads_fb_w')[0])) ? get_post_meta($ads_id,'ads_fb_w')[0] : '310',
                    'ads_fb_h' => (isset(get_post_meta($ads_id,'ads_fb_h')[0]) && !empty(get_post_meta($ads_id,'ads_fb_h')[0])) ? get_post_meta($ads_id,'ads_fb_h')[0] : '310',
                    'ads_fb_friends' => (isset(get_post_meta($ads_id,'ads_fb_friends')[0]) && !empty(get_post_meta($ads_id,'ads_fb_friends')[0])) ? get_post_meta($ads_id,'ads_fb_friends')[0] : 'false',
                    'ads_fb_header' => (isset(get_post_meta($ads_id,'ads_fb_header')[0]) && !empty(get_post_meta($ads_id,'ads_fb_header')[0])) ? get_post_meta($ads_id,'ads_fb_header')[0] : 'false',
                    'ads_fb_posts' => (isset(get_post_meta($ads_id,'ads_fb_posts')[0]) && !empty(get_post_meta($ads_id,'ads_fb_posts')[0])) ? get_post_meta($ads_id,'ads_fb_posts')[0] : 'false',
                    'ads_fb_border' => (isset(get_post_meta($ads_id,'ads_fb_border')[0]) && !empty(get_post_meta($ads_id,'ads_fb_border')[0])) ? get_post_meta($ads_id,'ads_fb_border')[0] : 'false'
                );

                $ret['code'] = "<iframe src='//www.facebook.com/plugins/likebox.php?href=".urlencode($link)."&amp;width={$options['ads_fb_w']}&amp;height={$options['ads_fb_h']}&amp;colorscheme={$options['ads_fb_theme']}&amp;show_faces={$options['ads_fb_friends']}&amp;header={$options['ads_fb_header']}&amp;stream={$options['ads_fb_posts']}&amp;show_border={$options['ads_fb_border']}&amp;' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:{$options['ads_fb_w']}px; height:{$options['ads_fb_h']}px;' allowTransparency='true'></iframe>";
                $ret['w'] = $options['ads_fb_w'];
                $ret['h'] = $options['ads_fb_h'];
            }
            return $ret;
        }
        
        /**
	 * This function for generating any custom code.
	 *
	 * @since    1.0.0
	 */
        function code($ads_id, $adsense = false)
        {
                $ret = "";
                if($adsense) { $code = get_post_meta($ads_id,'ads_adsense')[0]; }
                else { $code = get_post_meta($ads_id,'ads_code')[0]; }

                if(!empty($code))
                {
                    $ret['code'] = $code;
                    $ret['w'] = 0;
                    $ret['h'] = 0;
                }
                return $ret;
        }
        
        /**
	 * This function for generating any custom code inside a bordered box.
	 *
	 * @since    1.0.0
	 */
        function code_box($ads_id)
        {
                $ret = "";
                $code = get_post_meta($ads_id,'ads_code_box')[0];

                if(!empty($code))
                {
                    $options = array(
                        'ads_code_box_w' => (isset(get_post_meta($ads_id,'ads_code_box_w')[0]) && !empty(get_post_meta($ads_id,'ads_code_box_w')[0])) ? get_post_meta($ads_id,'ads_code_box_w')[0] : '300px',
                        'ads_code_box_h' => (isset(get_post_meta($ads_id,'ads_code_box_h')[0]) && !empty(get_post_meta($ads_id,'ads_code_box_h')[0])) ? get_post_meta($ads_id,'ads_code_box_h')[0] : '550px',
                        'ads_code_box_b_w' => (isset(get_post_meta($ads_id,'ads_code_box_b_w')[0]) && !empty(get_post_meta($ads_id,'ads_code_box_b_w')[0])) ? get_post_meta($ads_id,'ads_code_box_b_w')[0] : '0px',
                        'ads_code_box_b_c' => (isset(get_post_meta($ads_id,'ads_code_box_b_c')[0]) && !empty(get_post_meta($ads_id,'ads_code_box_b_c')[0])) ? get_post_meta($ads_id,'ads_code_box_b_c')[0] : 'none'
                        );
                    $ret['code'] = "<div id='ads_code_box_container' style='display: table; width: {$options['ads_code_box_w']}; height: {$options['ads_code_box_h']}; border: solid {$options['ads_code_box_b_w']} {$options['ads_code_box_b_c']}; margin: 0 auto;'>{$code}</div>";
                    $ret['w'] = $options['ads_code_box_w'];
                    $ret['h'] = $options['ads_code_box_h'];
                }
                return $ret;
        }
        
        /**
	 * This function for generating the image box.
	 *
	 * @since    1.0.0
	 */
        function image($ads_id)
        {
                $ret = "";
                $img = get_post_meta($ads_id,'ads_image_file')[0];

                if($this->is_valid_url($img))
                {
                    $options = array(
                        'ads_image_link' => (isset(get_post_meta($ads_id,'ads_image_link')[0]) && !empty(get_post_meta($ads_id,'ads_image_link')[0]) && $this->is_valid_url(get_post_meta($ads_id,'ads_image_link')[0])) ? get_post_meta($ads_id,'ads_image_link')[0] : '',
                        'ads_image_width' => (isset(get_post_meta($ads_id,'ads_image_width')[0]) && !empty(get_post_meta($ads_id,'ads_image_width')[0])) ? get_post_meta($ads_id,'ads_image_width')[0] : '500',
                        'ads_image_height' => (isset(get_post_meta($ads_id,'ads_image_height')[0]) && !empty(get_post_meta($ads_id,'ads_image_height')[0])) ? get_post_meta($ads_id,'ads_image_height')[0] : '200'
                        );
                    $ret['code'] = "<img src='{$img}' width='{$options['ads_image_width']}' height='{$options['ads_image_height']}' />";
                    if(!empty($options['ads_image_link'])) {
                            $ret['code'] = "<a href='{$options['ads_image_link']}' target='_blank'>{$ret['code']}</a>";
                    }
                    // set inside div
                    $ret['code'] = "<div id='ads_image_container' style='margin: 0 auto; display: table;'>{$ret['code']}</div>";
                    $ret['w'] = $options['ads_image_width'];
                    $ret['h'] = $options['ads_image_height'];
                }
                return $ret;
        }
        
        /**
	 * This function detects which type of the ads, then return the required code.
	 *
	 * @since    1.0.0
	 */
        public function prepare_content($ads_id)
        {

                $content = get_post_meta($ads_id,'ads_content')[0];

                $ret = "";
                switch($content) {
                    case 'soundcloud':
                            $ret = $this->soundcloud($ads_id); break;
                    case 'vimeo':
                            $ret = $this->vimeo($ads_id); break;
                    case 'yt':
                            $ret = $this->youtube($ads_id); break;
                    case 'fb':
                            $ret = $this->facebook($ads_id); break;
                    case 'twt':
                            $ret = $this->twitter($ads_id); break;
                    case 'code':
                            $ret = $this->code($ads_id); break;
                    case 'adsense':
                            $ret = $this->code($ads_id, true); break;
                    case 'code_box':
                            $ret = $this->code_box($ads_id); break;
                    case 'image':
                            $ret = $this->image($ads_id); break;
                }
                // set required width and height
                if(isset($ret['w']) && !strstr($ret['w'],'%')) {$ret['w'] .= "px";}
                if(isset($ret['h']) && !strstr($ret['h'],'%')) {$ret['h'] .= "px";}
                // set default code
                if(!isset($ret['code'])) {$ret['code'] = "";}

                return $ret;
        }
        
        /**
	 * This function checks if a string is a valid url.
	 *
	 * @since    1.0.0
	 */
        public function is_valid_url($url) {
                   return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
        }
}


