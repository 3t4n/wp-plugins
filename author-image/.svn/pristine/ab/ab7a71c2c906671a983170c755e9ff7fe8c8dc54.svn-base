<?php
/*
Plugin Name: WP Custom Author Image
Plugin URI: https://profiles.wordpress.org/p4wparamjeet
Description: Add Custom authors images to your site, which individual users can configure in their profile.
Version: 1.0
Author: Paramjeet Kumawat
Author URI: https://www.upwork.com/freelancers/~01fc348f42626d2077
Text Domain: wp-custom-author-image
Domain Path: /lang
License: GPL2
*/


if ( !defined('wp_custom_wp_custom_author_image_debug') )
	define('wp_custom_wp_custom_author_image_debug', false);

if (!defined('wp_custom_wp_custom_author_image_WIDTH'))
	define('wp_custom_wp_custom_author_image_WIDTH', 250);

if (!defined('wp_custom_wp_custom_author_image_HEIGHT'))
	define('wp_custom_wp_custom_author_image_HEIGHT', 250);


/**
 * wp_custom_author_image
 *
 * @property int|string alt_option_name
 * @package Author Image
 **/

class wp_custom_author_image extends WP_Widget {
	/**
	 * Plugin instance.
	 *
	 * @see get_instance()
	 * @type object
	 */
	protected static $instance = NULL;

	/**
	 * URL to this plugin's directory.
	 *
	 * @type string
	 */
	public $plugin_url = '';

	/**
	 * Path to this plugin's directory.
	 *
	 * @type string
	 */
	public $plugin_path = '';

	/**
	 * Access this plugin’s working instance
	 *
	 * @wp-hook plugins_loaded
	 * @return  object of this class
	 */
	public static function get_instance()
	{
		NULL === self::$instance and self::$instance = new self;

		return self::$instance;
	}

	/**
	 * Loads translation file.
	 *
	 * Accessible to other classes to load different language files (admin and
	 * front-end for example).
	 *
	 * @wp-hook init
	 * @param   string $domain
	 * @return  void
	 */
	public function load_language( $domain )
	{
		load_plugin_textdomain(
			$domain,
			FALSE,
			dirname(plugin_basename(__FILE__)) . '/lang'
		);
	}

	/**
	 * Constructor.
	 *
	 *
	 */

	public function __construct() {
		$this->plugin_url    = plugins_url( '/', __FILE__ );
		$this->plugin_path   = plugin_dir_path( __FILE__ );
		$this->load_language( 'wp-custom-author-image' );

		add_action( 'plugins_loaded', array ( $this, 'init' ) );

   		$widget_ops = array(
   			'classname' => 'wp_custom_author_image',
   			'description' => __('Displays the post author\'s image', 'wp-custom-author-image'),
   			);

   		parent::__construct('wp_custom_author_image', __('WP Custom Author Image', 'wp-custom-author-image'), $widget_ops);
   	} # wp_custom_author_image()


	/**
	 * init()
	 *
	 * @return void
	 **/

	function init() {
		if ( get_option('widget_wp_custom_author_image') === false ) {
			foreach ( array(
				'wp_custom_author_image_widgets' => 'upgrade',
				) as $ops => $method ) {
				if ( get_option($ops) !== false ) {
					$this->alt_option_name = $ops;
					add_filter('option_' . $ops, array(get_class($this), $method));
					break;
				}
			}
		}

		// more stuff: register actions and filters
		add_action( 'widgets_init', array($this, 'widgets_init') );

		if ( is_admin() ) {
			foreach ( array('profile', 'user-edit') as $hook ) {
				add_action("load-$hook.php", array($this, 'wp_custom_author_image_admin'));
			}
		}
	} # init()
	

	/**
	 * wp_custom_author_image_admin()
	 *
	 * @return void
	 **/
	function wp_custom_author_image_admin() {
		include_once $this->plugin_path . '/wp-custom-author-image-admin.php';
	} # wp_custom_author_image_admin()

	/**
	 * widgets_init()
	 *
	 * @return void
	 **/

	function widgets_init() {
		register_widget('wp_custom_author_image');
	} # widgets_init()

	
	/**
	 * widget()
	 *
	 * @param array $args
	 * @param array $instance
	 * @return void
	 **/

	function widget($args, $instance) {
		if ( is_admin() )
			return;
		
		extract($args, EXTR_SKIP);
		$instance = wp_parse_args($instance, wp_custom_author_image::defaults());
		extract($instance, EXTR_SKIP);
		
		if ( $always ) {
			$author_id = wp_custom_author_image::get_single_id();
		} elseif ( in_the_loop() ) {
			$author_id = get_the_author_meta('ID');
		} elseif ( is_singular() ) {
			global $wp_the_query;
			$author_id = $wp_the_query->posts[0]->post_author;
		} elseif ( is_author() ) {
			global $wp_the_query;
			$author_id = $wp_the_query->get_queried_object_id();
		} else {
			return;
		}
		
		if ( !$author_id )
			return;
		
		$image = wp_custom_author_image::get($author_id, $instance, $width, $height);
		
		if ( !$image )
			return;
		
		$desc = $bio ? trim(get_user_meta($author_id, 'description', true)) : false;
		
		$title = apply_filters('widget_title', $title);
		
		echo $before_widget;
		
		if ( $title )
			echo $before_title . $title . $after_title;
		
		echo $image . "\n";
		
		if ( $desc )
			echo apply_filters('wp_custom_author_image_bio', wpautop( $desc ));
		
		echo $after_widget;
	} # widget()
	
	
	/**
	 * get_single_id()
	 *
	 * @return int $author_id
	 **/
	
	static function get_single_id() {
		$author_id = get_transient('wp_custom_author_image_cache');
		
		if ( $author_id && !wp_custom_wp_custom_author_image_debug ) {
			return $author_id;
		} elseif ( $author_id === '' && !wp_custom_wp_custom_author_image_debug ) {
			return 0;
		} elseif ( !is_dir(WP_CONTENT_DIR . '/authors') ) {
			set_transient('wp_custom_author_image_cache', '');
			return 0;
		}
		
		# try the site admin first
		$user = get_user_by('email', get_option('admin_email'));
		if ( $user && $user->ID && wp_custom_author_image::get($user->ID) ) {
			set_transient('wp_custom_author_image_cache', $user->ID);
			return $user->ID;
		}
		
		global $wpdb;
		$author_id = 0;
		$i = 0;
		
		do {
			$offset = $i * 10;
			$limit = ( $i + 1 ) * 10;
			
			$authors = $wpdb->get_results("
				SELECT	$wpdb->users.ID,
						$wpdb->users.user_login
				FROM	$wpdb->users
				JOIN	$wpdb->usermeta
				ON		$wpdb->usermeta.user_id = $wpdb->users.ID
				AND		$wpdb->usermeta.meta_key = '" . $wpdb->prefix . "capabilities'
				JOIN	$wpdb->posts
				ON		$wpdb->posts.post_author = $wpdb->users.ID
				GROUP BY $wpdb->users.ID
				ORDER BY $wpdb->users.ID
				LIMIT $offset, $limit
				");
			
			if ( !$authors ) {
				set_transient('wp_custom_author_image_cache', '');
				return 0;
			}
			
			foreach ( $authors as $author ) {
				if ( defined('GLOB_BRACE') ) {
					$wp_custom_author_image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author->user_login . '{,-*}.{jpg,jpeg,png}', GLOB_BRACE);
				} else {
					$wp_custom_author_image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author->user_login . '-*.jpg');
				}

				if ( $wp_custom_author_image ) {
					$user = new WP_User($author->ID);
					if ( !$user->has_cap('publish_posts') && !$user->has_cap('publish_pages') )
						continue;
					$author_id = $author->ID;
					set_transient('wp_custom_author_image_cache', $author_id);
					return $author_id;
				}
			}
			
			$i++;
		} while ( !$author_id );
		
		set_transient('wp_custom_author_image_cache', '');
		return 0;
	} # get_single_id()


	/**
	 * get()
	 *
	 * @param bool $author_id
	 * @param array $instance
	 * @param int $width
	 * @param int $height
	 * @return string $image
	 */

	static function get($author_id = null, $instance = null, $width = null, $height = null) {

		if ( !$author_id ) {
			$author_id = wp_custom_author_image::get_author_id();
			if (!$author_id)
				return "";
		}

        $wp_custom_author_image = wp_custom_author_image::get_wp_custom_author_image($author_id, $width, $height);

        $instance = wp_parse_args($instance, wp_custom_author_image::defaults());
     	extract($instance, EXTR_SKIP);

		if ( $link ) {
			if ( !$always ) {
                $author_link = get_the_author_meta( 'wp_custom_aboutme_page', $author_id );
                if ($author_link == '')
				    $author_link = get_author_posts_url($author_id);
            }
			elseif ( get_option('show_on_front') != 'page' || !get_option('page_on_front') )
				$author_link = user_trailingslashit(get_option('home'));
			elseif ( $post_id = get_option('page_for_posts') )
				$author_link = apply_filters('the_permalink', get_permalink($post_id));
			else
				$author_link = user_trailingslashit(get_option('home'));
			
			$wp_custom_author_image = '<a href="' . esc_url($author_link) . '">'
				. $wp_custom_author_image
				. '</a>';
		}
		
		return '<div class="entry_wp_custom_author_image' . ($bio ? " alignleft" : "") . '">'
			. $wp_custom_author_image
			. '</div>' . "\n";
	} # get()

	/**
	 * get_author_id()
	 *

	 * @return int $image
	 */

	static function get_author_id() {

		$author_id = null;
		
		if ( in_the_loop() ) {
			$author_id = get_the_author_meta('ID');
		} elseif ( is_singular() ) {
			global $wp_the_query;
			$author_id = $wp_the_query->posts[0]->post_author;
		} elseif ( is_author() ) {
			global $wp_the_query;
			$author_id = $wp_the_query->get_queried_object_id();
		}else{
			$author_id = get_post_field( 'post_author', get_the_ID() ); 
		}
		return $author_id;
	} #get_author_id()

    /**
     * get_wp_custom_author_image()
     *
     * @param int $author_id
     * @param null $width
     * @param null $height
     * @return string $image
     */

	static function get_wp_custom_author_image($author_id, $width = null, $height = null, $avatar = false) {

   		$wp_custom_author_image = wp_custom_author_image::get_wp_custom_author_image_url($author_id);

	    if ( $wp_custom_author_image != '' ) {
		    $author_name = wp_custom_author_image::get_author_name($author_id);

		    $image_class = '';
		    if ($avatar) {
			    $image_class = 'class="avatar photo"';
		    }

	        if ( !empty($width) ) {
		        if ( empty ($height) )
			        $height = $width;
		            $wp_custom_author_image = '<img src="' . esc_url($wp_custom_author_image) . '" ' . $image_class . ' alt="' . $author_name
		               . '" width="'. $width . '" height="' . $height . '" />';
	        }
		    else {
	            $wp_custom_author_image = '<img src="' . esc_url($wp_custom_author_image) . '" ' . $image_class . ' alt="' . $author_name
	                . '" />';
		    }
	    }

        return $wp_custom_author_image;
    } #get_wp_custom_author_image()

	/**
	* get_wp_custom_author_image_url()
	*
	* @param int $author_id
	* @return string $image
	*/

	static function get_wp_custom_author_image_url($author_id = null) {
		if ( !$author_id ) {
			$author_id = wp_custom_author_image::get_author_id();

			if (!$author_id)
				return "";
		}

		$wp_custom_author_image = get_user_meta($author_id, 'wp_custom_author_image', true);
		if ( $wp_custom_author_image === '' || $wp_custom_author_image == '0' )
			$wp_custom_author_image = wp_custom_author_image::get_meta($author_id);

		if ( !$wp_custom_author_image )
			return "";

		$wp_custom_author_image = content_url() . '/wp-custom-authors/' . str_replace(' ', rawurlencode(' '), $wp_custom_author_image);

		return $wp_custom_author_image;
	} #get_wp_custom_author_image()


	/**
	 * update()
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array $instance
	 **/

	function update($new_instance, $old_instance) {
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['bio'] = isset($new_instance['bio']);
		$instance['link'] = isset($new_instance['link']);
		$instance['always'] = isset($new_instance['always']);
		$instance['width'] = min(max((int) $new_instance['width'], 0), 400);
		$instance['height'] = min(max((int) $new_instance['height'], 0), 400);

		delete_transient('wp_custom_author_image_cache');
		
		return $instance;
	} # update()
	
	
	/**
	 * form()
	 *
	 * @param array $instance
	 * @return void
	 **/

	function form($instance) {
		$instance = wp_parse_args($instance, wp_custom_author_image::defaults());
		extract($instance, EXTR_SKIP);
	
		echo '<p>'
			. '<label>'
			. __('Title:', 'wp-custom-author-image')
			. '<input type="text" id="' . $this->get_field_name('title') . '" class="widefat"'
			. ' name="'. $this->get_field_name('title') . '"'
			. ' value="' . esc_attr($title) . '"'
			. ' />'
			. '</label>'
			. '</p>' . "\n";
	
		echo '<p>'
			. '<label>'
			. __('Width: ', 'wp-custom-author-image')
			. '<input type="text" size="4" name="' . $this->get_field_name('width') . '"'
			. ' value="' . intval($width) . '"'
			. ' />'
			. '</label>'
			. "\n";

		echo '<label>'
			. __('Height: ', 'wp-custom-author-image')
			. '<input type="text" size="4" name="' . $this->get_field_name('height') . '"'
			. ' value="' . intval($height) . '"'
			. ' />'
			. '</label>'
			. '</p>' . "\n"
			. '<p><i>'
			. __('Leave width and height at 0 to use dimensions from the uploaded image itself.', 'wp-custom-author-image')
			. '</i></p>' . "\n";

		echo '<p>'
			. '<label>'
			. '<input type="checkbox"'
			. ' name="'. $this->get_field_name('bio') . '" '
			. checked($bio, true, false)
			. ' />'
			. '&nbsp;' . __('Display the author\'s bio', 'wp-custom-author-image')
			. '</label>'
			. '</p>' . "\n";
	
		echo '<p>'
			. '<label>'
			. '<input type="checkbox"'
			. ' name="'. $this->get_field_name('link') . '" '
			. checked($link, true, false)
			. ' />'
			. '&nbsp;' . __('Link to the author\'s posts', 'wp-custom-author-image')
			. '</label>'
			. '</p>' . "\n";
		
		echo '<p>'
			. '<label>'
			. '<input type="checkbox"'
			. ' name="'. $this->get_field_name('always') . '" '
			. checked($always, true, false)
			. ' />'
			. '&nbsp;' . __('This site has a single author', 'wp-custom-author-image')
			. '</label>'
			. '</p>' . "\n"
			. '<p><i>'
			. __('Normally, this widget will only output something when in the loop or on singular posts or pages. Check the above checkbox if a single author has an image.', 'wp-custom-author-image')
			. '</i></p>' . "\n";
	} # form()
	
	
	/**
	 * defaults()
	 *
	 * @return array $instance
	 **/
	
	static function defaults() {
		return array(
			'title' => '',
			'bio' => false,
			'link' => false,
			'always' => false,
			'widget_contexts' => array(
            'search' => false,
            '404_error' => false,
            ),
			'width' => 0,
			'height' => 0,
        );
	} # defaults()
	
	
	/**
	 * get_meta()
	 *
	 * @param int $author_id
	 * @return string $image
	 **/

	static function get_meta($author_id) {
		$user = get_userdata($author_id);
		$author_login = $user->user_login;

//		if ( empty( $user->user_login ) )
//			return false;

		if ( defined('GLOB_BRACE') ) {
			if ( $wp_custom_author_image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author_login . '{,-*}.{jpg,jpeg,png}', GLOB_BRACE) )
				$wp_custom_author_image = current($wp_custom_author_image);
			else
				$wp_custom_author_image = false;
		} else {
			if ( $wp_custom_author_image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author_login . '-*.jpg') )
				$wp_custom_author_image = current($wp_custom_author_image);
			else
				$wp_custom_author_image = false;
		}
		
		if ( $wp_custom_author_image ) {
			$wp_custom_author_image = basename($wp_custom_author_image);
			
			if ( !get_transient('wp_custom_author_image_cache') ) {
				$user = new WP_User($author_id);
				if ( $user->has_cap('publish_posts') || $user->has_cap('publish_pages') )
					set_transient('wp_custom_author_image_cache', $author_id);
			}
		} else {
			$wp_custom_author_image = '';
		}
		
		update_user_meta($author_id, 'wp_custom_author_image', $wp_custom_author_image);
		
		return $wp_custom_author_image;
	} # get_meta()
	

    /**
   	 * get_author_name()
   	 *
   	 * @param int $author_id
   	 * @return string $author_name
   	 **/

	static function get_author_name($author_id) {
   		$user = get_userdata($author_id);
   		$author_name = $user->display_name;

        return $author_name;
    }



	/**
	 * upgrade()
	 *
	 * @param array $ops
	 * @return array $ops
	 **/

	function upgrade($ops) {
		$widget_contexts = class_exists('widget_contexts')
			? get_option('widget_contexts')
			: false;
		
		foreach ( $ops as $k => $o ) {
			if ( isset($widget_contexts['wp_custom_author_image-' . $k]) ) {
				$ops[$k]['widget_contexts'] = $widget_contexts['wp_custom_author_image-' . $k];
			}
		}
		
		return $ops;
	} # upgrade()
} # wp_custom_author_image


$wp_custom_author_image = wp_custom_author_image::get_instance();


/**
 * the_wp_custom_author_image()
 *
 * This is the full html link wrapped in a div and echoed to the webpage
 *
 * @param int $author_id
 * @return void
 */

function the_wp_custom_author_image($author_id = null) {
	echo wp_custom_author_image::get($author_id, null);
} # the_wp_custom_author_image()


/**
 * get_wp_custom_author_image()
 *
 *  This is the full html link wrapped in a div and returned for further processing by a theme or plugin
 *
 * @param int $author_id
 * @return string
 */

function get_wp_custom_author_image($author_id = null) {
	return wp_custom_author_image::get($author_id, null);
}

/**
 * the_wp_custom_author_image_size()
 *
 *  This is the full html link wrapped in a div and echoed to the webpage.  The output size is passed in.
 *
 * @param int $width
 * @param int $height
 * @param null $author_id
 * @return void
 */

function the_wp_custom_author_image_size($width, $height, $author_id = null) {
	echo wp_custom_author_image::get($author_id, null, $width, $height);
} # the_wp_custom_author_image()


/**
 * the_wp_custom_author_image_url()
 *
 * This simply returns the url for the given author
 *
 * @param null $author_id
 * @return string
 */

function the_wp_custom_author_image_url($author_id = null) {
	return wp_custom_author_image::get_wp_custom_author_image_url($author_id);
} # the_wp_custom_author_image_url()

/**
 * wp_custom_author_image_admin()
 *
 * @return void
 **/

/**
 * shortcode_callback()
 *
 * @return void
 **/
function shortcode_callback() {

	the_wp_custom_author_image();
}

add_shortcode( 'wp-custom-author-image', 'shortcode_callback' );


if ( !function_exists( 'get_avatar' ) ) :
/**
 * get_avatar()
 *
 * Cloned from WP core.  Retrieve the avatar for a user who provided a user ID or email address.
 *
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @param int $size Size of the avatar image
 * @param string $default URL to a default image to use if no avatar is available
 * @param string $alt Alternative text to use in image tag. Defaults to blank
 * @return string <img> tag for the user's avatar
*/
function get_avatar( $id_or_email, $size = 96, $default = '', $alt = '', $args = null ) {
	if ( ! get_option('show_avatars') )
		return false;

	if ( false === $alt)
		$safe_alt = '';
	else
		$safe_alt = esc_attr( $alt );

	if ( !is_numeric($size) )
		$size = '96';

	// find avatar for user
	$email = '';
    $id = '';
	if ( is_numeric($id_or_email) ) {
		$id = (int) $id_or_email;
		$user = get_userdata($id);
		if ( $user )
			$email = $user->user_email;
	} elseif ( is_object($id_or_email) ) {
		// No avatar for pingbacks or trackbacks
		$allowed_comment_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );
		if ( ! empty( $id_or_email->comment_type ) && ! in_array( $id_or_email->comment_type, (array) $allowed_comment_types ) )
			return false;

		if ( !empty($id_or_email->user_id) ) {
			$id = (int) $id_or_email->user_id;
			$user = get_userdata($id);
			if ( $user)
				$email = $user->user_email;
		}

		if ( ! $email && ! empty( $id_or_email->comment_author_email ) )
			$email = $id_or_email->comment_author_email;

	} else {
		$email = $id_or_email;
	}

    if ( empty($id) ) {
        $user = get_user_by( 'email', $email );
        if ( !empty($user) )
            $id = $user->ID;
    }

	if ( ! $args['force_display'] && ! get_option( 'show_avatars' ) ) {
		return false;
	}

    $avatar = '';
    if ( $id && !is_admin() ) {
        $avatar = wp_custom_author_image::get_instance()->get_wp_custom_author_image($id, $size, $size, true);
    }

    if ( empty($avatar) ) {
	    if ( empty($default) ) {
	     $avatar_default = get_option('avatar_default');
	     if ( empty($avatar_default) )
	         $default = 'mystery';
	     else
	         $default = $avatar_default;
	    }

		if ( !empty($email) )
	        $email_hash = md5( strtolower( trim( $email ) ) );

		if ( is_ssl() ) {
		    $host = 'https://secure.gravatar.com';
		} else {
		    if ( !empty($email) )
		        $host = sprintf( "http://%d.gravatar.com", ( hexdec( $email_hash[0] ) % 2 ) );
		    else
		         $host = 'http://0.gravatar.com';
		}

		if ( 'mystery' == $default )
		    $default = "$host/avatar/ad516503a11cd5ca435acc9bb6523536?s={$size}"; // ad516503a11cd5ca435acc9bb6523536 == md5('unknown@gravatar.com')
		elseif ( 'blank' == $default )
		    $default = $email ? 'blank' : includes_url( 'images/blank.gif' );
		elseif ( !empty($email) && 'gravatar_default' == $default )
		    $default = '';
		elseif ( 'gravatar_default' == $default )
		    $default = "$host/avatar/?s={$size}";
		elseif ( empty($email) )
		    $default = "$host/avatar/?d=$default&amp;s={$size}";
		elseif ( strpos($default, 'http://') === 0 )
		    $default = esc_url( add_query_arg( 's', $size, $default ) );

		if ( !empty($email) ) {
		    $out = "$host/avatar/";
		    $out .= $email_hash;
		    $out .= '?s='.$size;
		    $out .= '&amp;d=' . urlencode( $default );

		    $rating = get_option('avatar_rating');
		    if ( !empty( $rating ) )
		        $out .= "&amp;r={$rating}";

			$out = str_replace( '&#038;', '&amp;', esc_url( $out ) );
		        $avatar = "<img alt='{$safe_alt}' src='{$out}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
		} else {
			$out = esc_url( $default );
		    $avatar = "<img alt='{$safe_alt}' src='{$out}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
		}
    }

	/**
	 * Filter the avatar to retrieve.
	 *
	 * @since 2.5.0
	 *
	 * @param string            $avatar      Image tag for the user's avatar.
	 * @param int|object|string $id_or_email A user ID, email address, or comment object.
	 * @param int               $size        Square avatar width and height in pixels to retrieve.
	 * @param string            $alt         Alternative text to use in the avatar image tag.
	 *                                       Default empty.
	 */
	return apply_filters( 'get_avatar', $avatar, $id_or_email, $size, $default, $alt );
}
endif;


if ( !function_exists('wp_custom_load_multipart_user') ) :
function wp_custom_load_multipart_user() {
	include_once dirname(__FILE__) . '/multipart-user/multipart-user.php';
} # load_multipart_user()
endif;

if ( is_admin() ) {
	foreach ( array('profile', 'user-edit') as $hook )
		add_action("load-$hook.php", 'wp_custom_load_multipart_user');
}

