<?php
/**
 * wp_custom_author_image_admin
 *
 * @package WP Custom Author Image
 **/

class wp_custom_author_image_admin {
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
	 * Constructor.
	 *
	 *
	 */

	public function __construct() {
		$this->plugin_url    = plugins_url( '/', __FILE__ );
		$this->plugin_path   = plugin_dir_path( __FILE__ );

		$this->init();
    }


	/**
	 * init()
	 *
	 * @return void
	 **/
	function init() {
		// more stuff: register actions and filters
		add_action('edit_user_profile', array($this, 'edit_image'));
        add_action('show_user_profile', array($this, 'edit_image'));
        add_action('profile_update', array($this, 'save_image'));
	}

    /**
	 * edit_image()
	 *
	 * @return void
	 **/
	
	function edit_image() {
		if ( !is_dir(WP_CONTENT_DIR . '/wp-custom-authors') && !wp_mkdir_p(WP_CONTENT_DIR . '/wp-custom-authors') ) {
			echo '<div class="error">'
				. '<p>'
				. sprintf(__('WP Custom Author Images requires that your %s folder be writable by the server', 'wp-custom-author-image'), 'wp-content')
				. '</p>'
				. '</div>' . "\n";
			return;
		} elseif ( !is_writable(WP_CONTENT_DIR . '/wp-custom-authors') ) {
			echo '<div class="error">'
				. '<p>'
				. sprintf(__('WP Custom Author Images requires that your %s folder be writable by the server', 'wp-custom-author-image'), 'wp-content/wp-custom-authors')
				. '</p>'
				. '</div>' . "\n";
			return;
		}
		
		echo '<h3>'
			. __('WP Custom Author Image', 'wp-custom-author-image')
			. '</h3>';
		
		global $profileuser;
		$author_id = $profileuser->ID;
		
		$wp_custom_author_image = wp_custom_author_image::get_meta($author_id);
		$wp_custom_author_image_url = content_url() . '/wp-custom-authors/' . str_replace(' ', rawurlencode(' '), $wp_custom_author_image);
		
		echo '<table class="form-table">';
		
		if ( $wp_custom_author_image ) {
			echo '<tr valign="top">'
				. '<td colspan="2">'
				. '<img src="' . esc_url($wp_custom_author_image_url) . '" alt="" />'
				. '<br />'. "\n";
			
			if ( is_writable(WP_CONTENT_DIR . '/wp-custom-authors/' . $wp_custom_author_image) ) {
				echo '<label for="delete_wp_custom_author_image">'
					. '<input type="checkbox"'
						. ' id="delete_wp_custom_author_image" name="delete_wp_custom_author_image"'
						. ' />'
					. '&nbsp;'
					. __('Delete WP Custom Author Image', 'wp-custom-author-image')
					. '</label>';
			} else {
				echo __('This WP Custom Author Image is not writable by the server.', 'wp-custom-author-image');
			}
			
			echo '</td></tr>' . "\n";
		}
		
		if ( !$wp_custom_author_image || is_writable(WP_CONTENT_DIR . '/wp-custom-authors/' . $wp_custom_author_image) ) {
			echo '<tr valign-"top">'
				. '<th scope="row">'
				. __('New Image', 'wp-custom-author-image')
				. '</th>'
				. '<td>';
			
			echo '<input type="file"'
				. ' id="wp_custom_author_image" name="wp_custom_author_image"'
				. ' />'
				. ' ';
			
			if ( defined('GLOB_BRACE') ) {
				echo __('(jpg, jpeg or png)', 'wp-custom-author-image') . "\n";
			} else {
				echo __('(jpg)', 'wp-custom-author-image') . "\n";
			}
			
			echo '</td>'
				. '</tr>' . "\n";
		}

        echo '<tr>'
      		. '<th><label for="wp_custom_aboutme_page">About Me Page</label></th>'
      		. '<td>'
      		. '<input type="text" name="wp_custom_aboutme_page" id="wp_custom_aboutme_page" value="' . esc_attr( get_the_author_meta( 'wp_custom_aboutme_page', $author_id ) ) .'" class="regular-text" /><br />'
      	    . '<span class="description">Please enter an external/internal About Me page full url for the image' . "'s url.</span>"
      		. '</td>'
      		. '</tr>';

		echo '</table>' . "\n";
	} # edit_image()


    /**
     * save_image()
     *
     * @param $user_ID
     * @return mixed
     */
	
	function save_image($user_ID) {
		if ( !$_POST || !current_user_can( 'edit_user', $user_ID ))
			return false;
		
		if ( isset($_FILES['wp_custom_author_image']['name']) && $_FILES['wp_custom_author_image']['name'] ) {
			$user = get_userdata($user_ID);
			$author_login = $user->user_login;
			
			if ( defined('GLOB_BRACE') ) {
				if ( $image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author_login . '{,-*}.{jpg,jpeg,png}', GLOB_BRACE) ) {
					foreach ( $image as $img ) {
						if ( preg_match("#/$author_login-\d+\.(?:jpe?g|png)$#", $img) ) {
							@unlink($img);
						}
					}
				}
			} else {
				if ( $image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author_login . '-*.jpg') ) {
					foreach ( $image as $img ) {
						if ( preg_match("#/$author_login-\d+\.jpg$#", $img) ) {
							@unlink($img);
						}
					}
				}
			}
			
			$tmp_name =& $_FILES['wp_custom_author_image']['tmp_name'];
			
			preg_match("/\.([^.]+)$/", $_FILES['wp_custom_author_image']['name'], $ext);
			$ext = end($ext);
			$ext = strtolower($ext);

			if ( !in_array($ext, array('jpg', 'jpeg', 'png')) ) {
				echo '<div class="error">'
					. "<p>"
						. "<strong>"
						. __('Invalid File Type.', 'wp-custom-author-image')
						. "</strong>"
					. "</p>\n"
					. "</div>\n";
			} else {
				$entropy = intval(get_site_option('wp_custom_entropy')) + 1;
				update_site_option('wp_custom_entropy', $entropy);

				$new_name = WP_CONTENT_DIR . '/wp-custom-authors/' . $author_login . '-' . $entropy . '.' . $ext;

				// Set a maximum height and width
				$width = wp_custom_wp_custom_author_image_WIDTH;
				$height = wp_custom_wp_custom_author_image_HEIGHT;

				// Get new dimensions
				list($width_orig, $height_orig) = getimagesize($tmp_name);

				if ( $width_orig > $width || $height_orig > $height ) {
					if ( $width_orig < $height_orig ) {
						$width = intval(($height / $height_orig) * $width_orig);
					} else {
						$height = intval(($width / $width_orig) * $height_orig);
					}

					// Resample
					$image_p = imagecreatetruecolor($width, $height);

					if ( $ext == 'png' ) {
						$image = imagecreatefrompng($tmp_name);
					} else {
						$image = imagecreatefromjpeg($tmp_name);
					}

					imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
					
					imagejpeg($image_p, $new_name, 75);
				} else {
					move_uploaded_file($tmp_name, $new_name);
				}
				
				$stat = stat(dirname($new_name));
				$perms = $stat['mode'] & 0000666;
				@chmod($new_name, $perms);
			}
		} elseif ( isset($_POST['delete_wp_custom_author_image']) ) {
			$user = get_userdata($user_ID);
			$author_login = $user->user_login;

			if ( defined('GLOB_BRACE') ) {
				if ( $image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author_login . '{,-*}.{jpg,jpeg,png}', GLOB_BRACE) ) {
					foreach ( $image as $img ) {
						if ( preg_match("#/$author_login-\d+\.(?:jpe?g|png)$#", $img) ) {
							unlink($img);
						}
					}
				}
			} else {
				if ( $image = glob(WP_CONTENT_DIR . '/wp-custom-authors/' . $author_login . '-*.jpg') ) {
					foreach ( $image as $img ) {
						if ( preg_match("#/$author_login-\d+\.jpg$#", $img) ) {
							unlink($img);
						}
					}
				}
			}
		}

		delete_transient('wp_custom_author_image_cache');
		delete_user_meta($user_ID, 'wp_custom_author_image_cache');

		$about_url = sanitize_text_field($_POST['wp_custom_aboutme_page']);
		update_user_meta( $user_ID, 'wp_custom_aboutme_page', $about_url );
		
		return $user_ID;
	} # save_image()
} # wp_custom_author_image_admin

$wp_custom_author_image_admin = wp_custom_author_image_admin::get_instance();
