<?php
/*
Plugin Name: Disqus Latest Comments Addon
Description: Displays the latest Disqus comments for a website.
Version: 2.3.1
Author: Adrian Gordon
Author URI: http://www.itsupportguides.com
License: GPL2
Text Domain: disqus-latest-comments

------------------------------------------------------------------------
Copyright 2014 Adrian Gordon

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'ITSG_Disqus_Latest_Comments_Addon' ) ) {
	class ITSG_Disqus_Latest_Comments_Addon {
		protected $_version = '2.3.0';
		protected $_options = array();

		/**
		* Construct the plugin object
		*/

		public function __construct() {
			$this->_options = $this->get_options();

			// register actions

			/** Back end - register menu */
			add_action( 'admin_menu', array( $this,'register_admin_menu' ) );

			/** register shortcode 'disqus-latest' **/
			add_shortcode( 'disqus-latest', array( $this,'register_shortcode' ) );

			add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'plugin_action_links' ) );

			add_action( 'admin_init' , array( $this, 'settings_api_init' ) );

			add_action( 'admin_notices', array( $this, 'setup_required_notice' ) );

			add_action( 'wp_ajax_disqus_latest_ajax', array( $this, 'disqus_latest_ajax' ) );
			add_action( 'wp_ajax_nopriv_disqus_latest_ajax', array( $this, 'disqus_latest_ajax' ) );

		}

		function disqus_latest_ajax() {
			$response = "";

			$attr = isset( $_POST['attr'] ) ? $_POST['attr'] : null;

			$attr_config = get_transient( 'itsg_dlc_cache_' . $attr );

			if ( $attr_config ) {
				$forum_name = esc_attr( $attr_config['forum_name'] );
				$api_key = esc_attr( $attr_config['api_key'] );

				$response = $this->get_data( $forum_name, $api_key );
			}

			die( $response );
		}

		function setup_required_notice() {
			if( !( isset( $_GET['page'] ) && 'itsg_disqus_lastest_comments' == $_GET['page'] ) && ( empty( $this->_options['api_key'] ) || empty( $this->_options['disqus_shortname'] ) ) ) {
				echo '<div class="notice notice-error"><p><strong>' . __( 'Setup Required', 'disqus-latest-comments' ) . ':</strong> ' . sprintf( __( "The 'Disqus latest comments addon' plugin requires setup. See <a href='%s'>Disqus Latest Comments - Options</a>.", 'disqus-latest-comments' ), admin_url( 'options-general.php?page=itsg_disqus_lastest_comments' ) ) . '</p></div>';
			}
		}

		public function register_admin_menu() {
			/** LEGACY Back end - menu */
			add_comments_page( __( 'Disqus Latest Comments', 'disqus-latest-comments' ), __( 'Disqus Latest Comments', 'disqus-latest-comments' ), 'manage_options', 'disqus-latest-comments', array( $this,'itsg_disqus_lastest_comments_addon_options' ) );

			add_options_page( __( 'Disqus Latest Comments', 'disqus-latest-comments' ), __( 'Disqus Latest Comments', 'disqus-latest-comments' ), 'manage_options', 'itsg_disqus_lastest_comments', array( $this, 'itsg_disqus_lastest_comments_display_settings' ) );
		}

		/*
		 * Add 'Settings' link to plugin in WordPress installed plugins page
		 */
		function plugin_action_links( $links ) {
			$action_links = array(
				'settings' => '<a href="' . admin_url( 'options-general.php?page=itsg_disqus_lastest_comments' ) . '">' . __( 'Settings', 'disqus-latest-comments' ) . '</a>',
			);

			return array_merge( $action_links, $links );
		} // END plugin_action_links

		/*
		 *   Handles the plugin options.
		 *   Default values are stored in an array.
		 */
		public function get_options(){
			$defaults = array(
				'disqus_shortname' => '',
				'api_key' => null,
				'number_of_comments' => '5',
				'hide_avatars' => false,
				'hide_moderator' => false,
				'avatar_size' => 'small',
				'excerpt_length' => '200',
				'style' => 'grey',
				'use_relative_time' => false,
				'custom_css' => '',
				'cache_time' => '30',
				'bypass_cache' => false,
				'cache_buster' => false,
				'target_blank' => false,
				'do_activation_redirect' => '1',
				'show_errors' => false,
			);

			// merge legacy settings

			if ( get_option( 'disqus_shortname' ) ) {
				$defaults['disqus_shortname'] = get_option( 'disqus_shortname' );
				update_option( 'disqus_shortname_old', $defaults['disqus_shortname'] );
				delete_option( 'disqus_shortname' );
			}

			if ( get_option( 'num_items' ) ) {
				$defaults['number_of_comments'] = get_option( 'num_items' );
				update_option( 'num_items_old', $defaults['num_items'] );
				delete_option( 'num_items' );
			}

			if ( get_option( 'hide_avatars' ) ) {
				$defaults['hide_avatars'] = get_option( 'hide_avatars' ) == "1" ? true : false;
				update_option( 'hide_avatars_old', $defaults['hide_avatars'] );
				delete_option( 'hide_avatars' );
			}

			if ( get_option( 'hide_moderator' ) ) {
				$defaults['hide_moderator'] = get_option( 'hide_moderator' ) == "1" ? true : false;
				update_option( 'hide_moderator_old', $defaults['hide_moderator'] );
				delete_option( 'hide_moderator' );
			}

			// migrate legacy avatar size options to new
			if ( get_option( 'avatar_size' ) ) {
				if ( '92' == get_option( 'avatar_size' ) ) {
					$defaults['avatar_size'] = 'large';
				} else {
					$defaults['avatar_size'] = 'small';
				}
				update_option( 'avatar_size_old', $defaults['avatar_size'] );
				delete_option( 'avatar_size' );
			}

			if ( get_option( 'excerpt_length' ) ) {
				$defaults['excerpt_length'] = get_option( 'excerpt_length' );
				update_option( 'excerpt_length_old', $defaults['excerpt_length'] );
				delete_option( 'excerpt_length' );
			}

			if ( get_option( 'style' ) ) {
				$defaults['style'] = strtolower( get_option( 'style' ) );
				update_option( 'style_old', $defaults['style'] );
				delete_option( 'style' );
			}

			if ( get_option( 'disqus_custom_css' ) ) {
				$defaults['custom_css'] = get_option( 'disqus_custom_css' );
				update_option( 'disqus_custom_css_old', $defaults['custom_css'] );
				delete_option( 'disqus_custom_css' );
			}

			if ( get_option( 'bypass_cache' ) ) {
				$defaults['bypass_cache'] = get_option( 'bypass_cache' ) == "1" ? true : false;
				update_option( 'bypass_cache_old', $defaults['bypass_cache'] );
				delete_option( 'bypass_cache' );
			}

			if ( get_option( 'disqus_target_blank' ) ) {
				$defaults['target_blank'] = get_option( 'disqus_target_blank' ) == "1" ? true : false;
				update_option( 'disqus_target_blank_old', $defaults['target_blank'] );
				delete_option( 'disqus_target_blank' );
			}

			$options = wp_parse_args( get_option( 'itsg_disqus_lastest_comments_addon_settings' ), $defaults );
			return $options;
		}

		/*
		*   Front end - what is rendered when shortcode is used
		*/
		public function register_shortcode( $atts = [], $content = null, $tag = '' ) {

			// normalize attribute keys, lowercase
			$atts = array_change_key_case( ( array )$atts, CASE_LOWER );

			// override default attributes with user attributes
			$shortcode_attributes = shortcode_atts(
				array(
					'forum_name' => esc_attr( $this->_options['disqus_shortname'] ),
					'api_key' => esc_attr( $this->_options['api_key'] ),
				), $atts, $tag);

			$forum_name = esc_attr( $shortcode_attributes['forum_name'] );
			$api_key = esc_attr( $shortcode_attributes['api_key'] );

			$html = '';

			if ( '1' == $this->_options['cache_buster']  ) { // if use ajax cache buster
				wp_enqueue_script( 'jquery' );
				add_action( 'wp_footer', array( $this,'css_styles' ) );

				// we're going to store these details in a transient to support the attributes
				$attr = array(
					'forum_name' => $forum_name,
					'api_key' => $api_key
				   );

				$transient_key = wp_generate_uuid4(); // random key for transient
				set_transient( 'itsg_dlc_cache_' . $transient_key , $attr, MONTH_IN_SECONDS ); // transient will live for a month

				$admin_url = admin_url( 'admin-ajax.php' );

				$html .= "<script>";
				$html .= "document.addEventListener( 'DOMContentLoaded', function( event ) {";
				$html .= "	var data = {";
				$html .= "		action: 'disqus_latest_ajax',";
				$html .= "		attr: '".$transient_key."',";
				$html .= "	};";
				$html .= "	jQuery.post( '" . $admin_url . "', data, function( response ) {";
				$html .= "		jQuery( '.dsq-widget-list-wrapper." . $transient_key . "' ).html( response );";
				$html .= "	});";
				$html .= "})";
				$html .= "</script>";
				$html .= "<div class='dsq-widget-list-wrapper " . $transient_key . "'></div>";

				return $html;

			} else {
				$html .= $this->get_data( $forum_name, $api_key );
			}

			return $html;
		}

		public function get_data( $forum_name, $api_key ) {
			$output = '';
			try {
				$comment_limit = ( float ) $this->_options['number_of_comments'] * ( $this->_options['number_of_comments'] ? 2 : 0 ); // getting twice as required when moderator excluded

				$comment_length = ( float ) $this->_options['excerpt_length'];

				$use_relative_time = ( bool ) $this->_options['use_relative_time'];

				$response = $this->get_disqus_data(
					'posts/list',
					array(
						"api_key" => $api_key,
						"forum" => $forum_name,
						"limit" =>  $comment_limit
					)
				);

				//check response
				if ( false != $response ) {
					// get comment items from response
					$comments = $response;
					//check comment count

					if( count( $comments ) > 0 ) {
						if( 'You have exceeded your hourly limit of requests' != $comments ) {
							$output = $this->echo_comments(
								$comments
							);
						} else {
							$output = $this->no_comments( 'limit_reached' );
						}
					} else {
						$output = $this->no_comments( 'no_comments' );
					}
				} else {
					$output = $this->no_comments( 'request_failed' );
				}

			} catch( Exception $error ) {
				$output = $this->no_comments( 'error', $error );
			}
			return $output;
		}

		/**
		 * Actually echo out the comments
		 *
		 * @param $comment
		 * @return output
		 */
		protected function echo_comments( $comments ) {
			$api_key = esc_attr( $this->_options['api_key'] );
			add_action( 'wp_footer', array( $this,'css_styles' ) );

			$comment_counter = 0;

			$output = '';

			$output .= '<ul class="dsq-widget-list ' . esc_attr( $this->_options['style'] ) . '">'; // ITSG

			if( 'Invalid API key' !== $comments && is_array( $comments ) ) {

				// if 'Hide Moderator' enabled - check if Disqus account founder id equals comment author id
				// skips loop later in foreach
				if ( $this->_options['hide_moderator'] ) {

					$forum_info = $this->get_disqus_data(
						"forums/details",
						array(
							"api_key" => $api_key,
							"forum" => $this->_options['disqus_shortname'],
						)
					);

					$founder_user_id = $forum_info['founder'];

				}

				foreach( $comments as $comment ) {

					$author_name = $comment['author']['name'];

					//get rest of comment data
					$author_profile = $comment['author']['profileUrl'];

					if ( 'large' == $this->_options['avatar_size'] ) {
						$author_avatar = $comment['author']['avatar']['large']['cache'];
					} else {
						$author_avatar = $comment['author']['avatar']['small']['cache'];
					}

					$allowed_html = array(
						'a' => array(
							'href' => array(),
							'title' => array()
						),
						'strong' => array(),
						'blockquote' => array(),
						'caption' => array(),
						'cite' => array(),
						'em' => array(),
						'p' => array(),
						'span' => array(),
						's' => array(),
						'strike' => array(),
						'br' => array(),
					);

					$message = wp_kses( $comment['raw_message'], $allowed_html );

					$comment_id = '#comment-' . $comment['id'];

					if( $this->_options['use_relative_time'] ) {
						$post_time = $this->relative_time( strtotime( $comment['createdAt'] ) );
					} else {
						$post_time = date(
							$date_format = get_option('date_format'),
							strtotime( $comment['createdAt'] )
						); // WordPress date format setting from wp-admin -> Settings -> General
					}

					$thread_info = $this->get_disqus_data(
						"threads/details",
						array(
							"api_key" => $api_key,
							"forum" => $this->_options['disqus_shortname'],
							"thread" => $comment['thread'],
						)
					);

					$thread_title = $thread_info['title'];
					$thread_link = $thread_info['link'];

					// shorten comment
					$message = $this->enforce_comment_length(
						$message
					);

					// if 'Hide Moderator' enabled - check if Disqus account founder id equals comment author id
					// skips loop here
					if ( $this->_options['hide_moderator'] ) {

						if ( ! empty ( $comment['author']['id'] ) ) {
							if ( $founder_user_id == $comment['author']['id'] ) continue;
						}
					}

					// other restrictions could happen here, similar to above ...

					$skip_thread = apply_filters( 'itsg_dlc_skip_thread', false, $thread_info, $comment );

					if ( $skip_thread ) {
						continue;
					}

					$comment_counter++;

					$comment_html_format = '';

					if ( empty( $author_profile ) ) {
						$comment_html_format .= '<li class="dsq-widget-item">';

						if ( ! $this->_options['hide_avatars'] ) {
							$comment_html_format .= '<img class="dsq-widget-avatar" src="%1$s" alt="%2$s">';
						}

						$comment_html_format .= '%2$s
							<span class="dsq-widget-comment">%8$s</span>
							<p class="dsq-widget-meta"><a href="%5$s">%6$s</a>&nbsp;·&nbsp;
							<a href="%5$s%7$s" target="_blank">%4$s</a>
							</p>';

						$comment_html = sprintf( $comment_html_format, $author_avatar, $author_name, $author_profile, $post_time, $thread_link, $thread_title, $comment_id, $message );
					} else {
						$target_string = $this->_options['target_blank'] ? 'target="_blank"' : '';

						$comment_html_format .= '<li class="dsq-widget-item">';

						if ( ! $this->_options['hide_avatars'] ) {
						$comment_html_format .= '<a href="%3$s" %9$s >
							<img class="dsq-widget-avatar" src="%1$s" alt="%2$s">
							</a>';
						}

						$comment_html_format .= '<a class="dsq-widget-user" href="%3$s" %9$s >%2$s</a>
							<span class="dsq-widget-comment">%8$s</span>
							<p class="dsq-widget-meta"><a href="%5$s">%6$s</a>&nbsp;·&nbsp;
							<a href="%5$s%7$s" target="_blank">%4$s</a>
							</p>';

						$comment_html = sprintf( $comment_html_format, $author_avatar, $author_name, $author_profile, $post_time, $thread_link, $thread_title, $comment_id, $message, $target_string );
					}

					$output .= $comment_html;

					// stop loop when we reach the limit
					if( $comment_counter == $this->_options['number_of_comments'] ) break;
				}

			} else {
				$output .= __( 'Invalid API Key', 'disqus-latest-comments' );
				$this->delete_transients();
			}

			$output .= '</ul>';

			return $output;
		}

		/**
		 * Display a no comments message if none were found and/or the user has reached their hourly limit
		 *
		 * @param string $comment
		 */
		protected function no_comments( $status, $error = '' ) {
			$output = '';
			if ( $this->_options['show_errors'] ) {
				if ( 'limit_reached' == $status ) {
					$output .= __( 'Disqus API request limit reached', 'disqus-latest-comments' );
				} elseif ( 'no_comments' == $status ) {
					$output .= __( 'No comments found', 'disqus-latest-comments' );
				} elseif ( 'request_failed' == $status ) {
					$output .= __( 'Request failed', 'disqus-latest-comments' );
				} elseif ( 'error' == $status ) {
					$output .= __( 'Exception thrown', 'disqus-latest-comments' ) . ' - ' . $error;
				} else {
					$output .= __( 'Unknown error', 'disqus-latest-comments' );
				}
			}

			return $output;
		}

		protected function relative_time( $date ) {
			$now = time();
			$diff = $now - $date;

			if ( $diff < 60 ) {
				return sprintf( $diff > 1 ? __( '%s seconds ago', 'disqus-latest-comments' ) : __( 'a second ago', 'disqus-latest-comments' ), $diff );
			}

			$diff = floor( $diff / 60 );

			if ( $diff < 60 ) {
				return sprintf( $diff > 1 ? __( '%s minutes ago', 'disqus-latest-comments' ) : __( 'one minute ago', 'disqus-latest-comments' ), $diff );
			}

			$diff = floor( $diff / 60 );

			if ( $diff < 24 ) {
				return sprintf( $diff > 1 ? __( '%s hours ago', 'disqus-latest-comments' ) : __( 'an hour ago', 'disqus-latest-comments' ), $diff );
			}

			$diff = floor( $diff / 24 );

			if ( $diff < 7 ) {
				return sprintf( $diff > 1 ? __( '%s days ago', 'disqus-latest-comments' ) : __( 'yesterday', 'disqus-latest-comments' ), $diff );
			}

			if ( $diff < 30 ) {
				$diff = floor( $diff / 7 );
				return sprintf( $diff > 1 ? __( '%s weeks ago', 'disqus-latest-comments' ) : __( 'one week ago', 'disqus-latest-comments' ), $diff );
			}

			$diff = floor( $diff / 30 );

			if ( $diff < 12 ) {
				return sprintf( $diff > 1 ? __( '%s months ago', 'disqus-latest-comments' ) : __( 'last month', 'disqus-latest-comments' ), $diff );
			}

			$diff = date( 'Y', $now ) - date( 'Y', $date );

			return sprintf( $diff > 1 ? __( '%s years ago', 'disqus-latest-comments' ) : __( 'last year', 'disqus-latest-comments' ), $diff );
		}


		/**
		 * Make our request to disqus
		 *
		 * @param string $resource
		 * @param array $parameters
		 * @return array
		 */
		protected function get_disqus_data( $resource, $parameters ) {
			$response = array();
			$transient_key = $resource . '_' .  $parameters['forum'];
			if ( 'threads/details' == $resource ) {
				$transient_key .= '_' . $parameters['thread'];
			}

			$api_version = '3.0';
			$output_type = 'json';
			$url = 'https://disqus.com/api/' . $api_version . '/' .$resource . '.' . $output_type;

			$request = add_query_arg(
				$parameters,
				$url
			);

			if ( '1' !== $this->_options['bypass_cache']  ) {
				$cache_time = ( float ) $this->_options['cache_time'] * MINUTE_IN_SECONDS;
				$response = get_transient( 'itsg_dlc_cache_' . $transient_key );
				if( false === $response ) {
					$response = $this->do_wp_remote_get( $request );
					if( false != $response ) {
						set_transient( 'itsg_dlc_cache_' . $transient_key , $response, $cache_time );
					}
				} else {
					$response = maybe_unserialize( $response );
				}
			} else {
				$response = $this->do_wp_remote_get( $request );
			}

			return $response;
		}

		/**
		 * Wrapped for wp_remote_get
		 */
		protected function do_wp_remote_get( $url ) {
			$request = wp_remote_get( $url, array( 'timeout' => 120 ) );

			// If there is an error
			if( is_wp_error( $request ) ) {
				return false;
			}
			// Get response body
			$data = wp_remote_retrieve_body( $request );

			if( $data !== false ) {
				$data = @json_decode( $data, true );
				$data = $data['response'];
			}

			return $data;
		}

		/**
		 * Enforce the comment length
		 *
		 * @param $comment
		 * @return string
		 */
		protected function enforce_comment_length( $comment ) {
			$comment_length = esc_attr( $this->_options['excerpt_length'] );
			if( $comment_length != 0 ) {
				if( strlen( $comment ) > $comment_length ) {

					$comment = preg_replace(
							'/\s+?(\S+)?$/', '',
							substr( $comment, 0, $comment_length + 1 )
						) . '...';
				}
			}
			return $comment;
		}

		protected function delete_transients( $transients = array( 'threads/details', 'forum/details', 'posts/list' ) ) {
			foreach( $transients as $transient ) {
				delete_transient( 'itsg_dlc_cache_' . $transient );
			}
		}

		/*
		* CSS Styles placed in footer
		*/
		public function css_styles() {
			$min = defined( 'WP_DEBUG' ) && WP_DEBUG || isset( $_GET['debug'] ) ? '' : '.min';
			$version = defined( 'WP_DEBUG' ) && WP_DEBUG || isset( $_GET['debug'] ) ? mt_rand() : $this->_version;

			if ( "custom" == $this->_options['style'] ) {
				?>
				<style>
				<?php echo esc_html( $this->_options['custom_css'] ) ?>
				</style>
				<?php
			} elseif ( "0" !== $this->_options['style'] ) {
				wp_enqueue_style( 'disqus-latest-comments-css', plugins_url( "/css/disqus-latest-comments-css{$min}.css", __FILE__ ), array(), $version );
			}
		} // END css_styles

		/*
		* Enqueue required scripts
		*/
		public function enqueue_scripts() {
			wp_enqueue_script( 'jquery' );
		} // END enqueue_scripts

		public function load_custom_wp_admin_style( $hook ) {
			if ( 'settings_page_itsg_disqus_lastest_comments' == $hook ) {
				wp_enqueue_style( 'disqus-latest-comments-css-admin', plugin_dir_url( __FILE__ ) . 'css/disqus-latest-comments-css-admin.css' );
				wp_enqueue_script( 'disqus-latest-comments-js-admin', plugin_dir_url( __FILE__ ) . 'js/disqus-latest-comments-js-admin.js' );
			}
		}

		public function settings_api_init() {
			global $pagenow;

			// redirect legacy menu to new menu
			if( 'edit-comments.php' == $pagenow && isset( $_GET['page'] ) && 'disqus-latest-comments' == $_GET['page'] ){
				wp_redirect( admin_url( 'options-general.php?page=itsg_disqus_lastest_comments' ) );
				exit;
			}

			if ( $this->_options['do_activation_redirect'] ) {
				// remove redirect trigger
				$options = $this->_options;

				$options['do_activation_redirect'] = false;

				update_option( 'itsg_disqus_lastest_comments_addon_settings', $options );

				wp_redirect( admin_url( 'options-general.php?page=itsg_disqus_lastest_comments' ) );
				exit;
			}

			// clear the cache when changing settings
			if ( 'options-general.php' == $pagenow && isset( $_GET['page'] ) && 'itsg_disqus_lastest_comments' == $_GET['page'] && isset( $_GET['settings-updated'] ) ) {
				$this->delete_transients();
			}

			add_action( 'admin_enqueue_scripts', array( $this , 'load_custom_wp_admin_style' ) );

			$option_name  = 'itsg_disqus_lastest_comments_addon';
			$section_id = 'itsg_disqus_lastest_comments_settings_section';
			$section_page = 'itsg_disqus_lastest_comments';

			add_settings_section(
				$section_id,
				'',
				array( $this , 'itsg_disqus_lastest_comments_instructions_callback' ),
				$section_page
			);

			register_setting(
				'itsg_disqus_lastest_comments_settings_group',
				'itsg_disqus_lastest_comments_addon_settings',
				$option_name
			);

			add_settings_field(
				'disqus_shortname',
				__( 'Disqus Short Name' , 'disqus-latest-comments' ),
				array( $this , 'forum_name_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'disqus_shortname'
				)
			);

			add_settings_field(
				'api_key',
				__( 'API Key' , 'disqus-latest-comments' ),
				array( $this , 'api_key_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'api_key'
				)
			);

			add_settings_field(
				'number_of_comments',
				__( 'Number of Comments' , 'disqus-latest-comments' ),
				array( $this , 'number_of_comments_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'number_of_comments'
				)
			);

			add_settings_field(
				'hide_avatars',
				__( 'Hide Avatars' , 'disqus-latest-comments' ),
				array( $this , 'hide_avatars_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'hide_avatars'
				)
			);

			add_settings_field(
				'hide_moderator',
				__( 'Hide Moderator Comments' , 'disqus-latest-comments' ),
				array( $this, 'hide_moderator_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'hide_moderator'
				)
			);

			add_settings_field(
				'avatar_size',
				__( 'Avatar size' , 'disqus-latest-comments' ),
				array( $this, 'avatar_size_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'avatar_size'
				)
			);

			add_settings_field(
				'excerpt_length',
				__( 'Comment Length' , 'disqus-latest-comments' ),
				array( $this, 'excerpt_length_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'excerpt_length'
				)
			);

			add_settings_field(
				'style',
				__( 'Style' , 'disqus-latest-comments' ),
				array( $this, 'style_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'style'
				)
			);

			add_settings_field(
				'custom_css',
				__( 'Custom CSS' , 'disqus-latest-comments' ),
				array( $this, 'custom_css_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'custom_css'
				)
			);

			add_settings_field(
				'use_relative_time',
				__( 'Use Relative Time' , 'disqus-latest-comments' ),
				array( $this, 'use_relative_time_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'use_relative_time'
				)
			);

			add_settings_field(
				'cache_time',
				__( 'Cache Time', 'disqus-latest-comments' ),
				array( $this, 'cache_time_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'cache_time'
				)
			);

			add_settings_field(
				'bypass_cache',
				__( 'Bypass Cache', 'disqus-latest-comments' ),
				array( $this, 'bypass_cache_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'bypass_cache'
				)
			);

			add_settings_field(
				'cache_buster',
				__( 'Use Cache Buster', 'disqus-latest-comments' ),
				array( $this, 'cache_buster_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'cache_buster'
				)
			);

			add_settings_field(
				'target_blank',
				__( "Open links in new windows", 'disqus-latest-comments' ),
				array( $this, 'target_blank_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'target_blank'
				)
			);

			add_settings_field(
				'show_errors',
				__( "Show Disqus API error messages on front end", 'disqus-latest-comments' ),
				array( $this, 'show_errors_callback' ),
				$section_page,
				$section_id,
				array(
					'label_for' => 'show_errors'
				)
			);
		}

		public function itsg_disqus_lastest_comments_display_settings() {
			?>
			<div class="wrap">
				<h2><?php _e( 'Disqus Latest Comments - Options' , 'disqus-latest-comments' ); ?></h2>
				<form action="options.php" method="post">
					<?php settings_fields( 'itsg_disqus_lastest_comments_settings_group' ); ?>
					<?php do_settings_sections( 'itsg_disqus_lastest_comments' ); ?>
					<?php submit_button(); ?>
				</form>
			</div>
		<?php
		}

		public function itsg_disqus_lastest_comments_instructions_callback() {
			echo '<p>' . __( 'This plugin will allow you to list your websites latest comments in a page, post, text widget or html widget.', 'disqus-latest-comments' ) . '</p>';
			echo '<p>' . __( 'Instructions', 'disqus-latest-comments' ) . ':</p>';
			if ( empty( $this->_options['disqus_shortname'] ) || empty( $this->_options['api_key'] ) ) {
				echo '<div class="notice notice-error"><p><strong>' . __( 'Setup Required', 'disqus-latest-comments' ) . ':</strong> ' . __( 'Settings are required in the fields below.', 'disqus-latest-comments' ) . '</p></div>';
			}
			printf( '<ol>
				<li>%s</li>
				<li>%s</li>
				<li>%s</li>
				<li>%s</li>
				</ol>',
				__( 'Enter your Disqus shortname and API Key below and save the changes.', 'disqus-latest-comments' ),
				__( 'Open or create the post, page, text or html widget you want the comments to be displayed in.', 'disqus-latest-comments' ),
				__( 'Enter the shortcode <strong>[disqus-latest]</strong> into the content area and save the changes.', 'disqus-latest-comments' ),
				__( 'The comments will now be displayed where the shortcode was entered.', 'disqus-latest-comments' ) );
			echo '<span class="notice update-nag"><p><strong>' . __( 'Shortcode parameters', 'disqus-latest-comments' ) . ':</strong> '. __( "the shortcode accepts 'forum_name' and 'api_key'. These will override the settings entered below.", 'disqus-latest-comments' ) .'</p></span>';
		}

		public function forum_name_callback() {
			$disqus_shortname = esc_attr( $this->_options['disqus_shortname'] );

			$output = '';
			if ( empty( $disqus_shortname ) ) $output .= '<span class="notice-empty">';

			$output .= '<input id="disqus_shortname" type="text" name="itsg_disqus_lastest_comments_addon_settings[disqus_shortname]" value="' . $disqus_shortname .'">';

			if ( empty( $disqus_shortname ) ) {
				$output .= '<p><strong>' . __( 'Required', 'disqus-latest-comments' ) . ':</strong> ' . __( 'Short Name is required.', 'disqus-latest-comments' ) . '</p>';
				$output .= '<p><strong>' . __( 'Where do I find my Disqus shortname?', 'disqus-latest-comments' ) . '</strong></p>';
				$output .= sprintf( '<ol>
									<li>%s</li>
									<li>%s</li>
									<li>%s</li>
									<li>%s</li>
								</ol>',
								sprintf( __( 'Go to the <a href="%s" target="_blank">Disqus website</a> and log in', 'disqus-latest-comments' ), 'https://www.disqus.com' ),
								__( "Click on your avatar icon at the top right of the screen and select 'Settings'", 'disqus-latest-comments' ),
								__( "Click on the settings icon (a cog) at the top right of the screen and select 'Admin'", 'disqus-latest-comments' ),
								__( "In the 'General' page you'll see 'Shortname' - this is your Disqus shortname for enterering above.", 'disqus-latest-comments' ) );
				$output .= '</span>';
			}

			echo $output;
		}

		public function api_key_callback() {
			$api_key = esc_attr( $this->_options['api_key'] );

			$output = '';
			if ( empty( $api_key ) ) $output .= '<span class="notice-empty">';

			$output .= '<input id="api_key" type="text" name="itsg_disqus_lastest_comments_addon_settings[api_key]" size="90" value="' . $api_key .'">';

			if ( empty( $api_key ) ) {
				$output .= '<p><strong>' . __( 'Required', 'disqus-latest-comments' ) . ':</strong> ' . __( 'API Key is required.', 'disqus-latest-comments' ) . '</p>';
				$output .= '<p><strong>' . __( 'Where do I find my API Key?', 'disqus-latest-comments' ) . '</strong></p>';
				$output .= sprintf( '<ol>
									<li>%s</li>
									<li>%s</li>
									<li>%s</li>
									<li>%s</li>
									<li>%s</li>
									<li>%s</li>
								</ol>',
								sprintf( __( 'Go to the <a href="%s" target="_blank">Disqus applications website</a> and log in', 'disqus-latest-comments' ), 'http://disqus.com/api/applications/' ),
								__( "Click on the 'Register new application' button", 'disqus-latest-comments' ),
								__( "Enter the required information - label, description and website", 'disqus-latest-comments' ),
								__( "Click the 'Register my application' button", 'disqus-latest-comments' ),
								__( "Click on the 'Details' link at the top of the page", 'disqus-latest-comments' ),
								__( "Scroll down to the 'API Key' field and copy the value into the setting above", 'disqus-latest-comments' ) );
				$output .= '</span>';
			}

			echo $output;
		}

		public function number_of_comments_callback() {
			$number_of_comments = esc_attr( $this->_options['number_of_comments'] );

			echo '<input id="number_of_comments" type="text" name="itsg_disqus_lastest_comments_addon_settings[number_of_comments]" value="' . $number_of_comments .'">';
		}

		public function hide_avatars_callback() {
			$hide_avatars = esc_attr( $this->_options['hide_avatars'] );

			echo '<input id="hide_avatars" ' . checked( $hide_avatars, true, false ) .' type="checkbox" name="itsg_disqus_lastest_comments_addon_settings[hide_avatars]" value="1" >';

		}

		public function hide_moderator_callback() {
			$hide_moderator = esc_attr( $this->_options['hide_moderator'] );

			echo '<input id="hide_moderator" ' . checked( $hide_moderator, true, false ) .' type="checkbox" name="itsg_disqus_lastest_comments_addon_settings[hide_moderator]" value="1" >';
		}

		public function avatar_size_callback() {
			$avatar_size = esc_attr( $this->_options['avatar_size'] );

			echo '<select id="avatar_size" name="itsg_disqus_lastest_comments_addon_settings[avatar_size]">';
			echo '<option ' . selected( $avatar_size, 'small' ) . 'value="small">Small</option>';
			echo '<option ' . selected( $avatar_size, 'large' ) . 'value="large">Large</option>';
			echo '</select>';
		}

		public function excerpt_length_callback() {
			$output = '';

			$excerpt_length = esc_attr( $this->_options['excerpt_length'] );

			$output .= '<input id="excerpt_length" type="number" name="itsg_disqus_lastest_comments_addon_settings[excerpt_length]" value="' . $excerpt_length .'">';
			$output .= '<div><p>' . __( 'Number of characters to limit comments to.', 'disqus-latest-comments' ) . '</p></div>';

			echo $output;
		}

		public function style_callback() {
			$style = esc_attr( $this->_options['style'] );

			echo '<select id="style" onclick="ToggleDisqusStyle();" onblur="ToggleDisqusStyle();"  onchange="ResetDisqusStyle();" name="itsg_disqus_lastest_comments_addon_settings[style]">';
			echo '<option ' . selected( $style, '0' ) . 'value="0">' . __( 'None', 'disqus-latest-comments' ) . '</option>';
			echo '<option ' . selected( $style, 'custom' ) . 'value="custom">' . __( 'Custom', 'disqus-latest-comments' ) . '</option>';
			echo '<option ' . selected( $style, 'blue' ) . 'value="blue">' . __( 'Blue', 'disqus-latest-comments' ) . '</option>';
			echo '<option ' . selected( $style, 'green' ) . 'value="green">' . __( 'Green', 'disqus-latest-comments' ) . '</option>';
			echo '<option ' . selected( $style, 'grey' ) . 'value="grey">' . __( 'Grey', 'disqus-latest-comments' ) . '</option>';
			echo '</select>';
		}

		public function use_relative_time_callback() {
			$use_relative_time = esc_attr( $this->_options['use_relative_time'] );

			echo '<input id="use_relative_time" ' . checked( $use_relative_time, true, false ) .' type="checkbox" name="itsg_disqus_lastest_comments_addon_settings[use_relative_time]" value="1" >';
		}

		public function custom_css_callback() {
			$custom_css = esc_attr( $this->_options['custom_css'] );

			?><p><?php _e( 'Use the box below to enter your custom CSS styles - <strong>do not include the &#60;style&#62; tags</strong>.', 'disqus-latest-comments' ); ?></p>
			<p><?php _e( 'Classes available include:', 'disqus-latest-comments' ); ?></p><?php
			printf( '<ol>
				<li>%s</li>
				<li>%s</li>
				<li>%s</li>
				<li>%s</li>
				<li>%s</li>
				<li>%s</li>
				</ol>',
				__( ".dsq-widget-list - the entire list", 'disqus-latest-comments' ),
				__( ".dsq-widget-item - each comment item", 'disqus-latest-comments' ),
				__( ".dsq-widget-avatar - the avatar image in each comment item", 'disqus-latest-comments' ),
				__( ".dsq-widget-user - the Disqus user name", 'disqus-latest-comments' ),
				__( ".dsq-widget-comment - the comment", 'disqus-latest-comments' ),
				__( ".dsq-widget-meta - paragraph that contains the link to the post and day", 'disqus-latest-comments' ) ) ?>
			<p><?php printf( __( 'See <a href="%s" target="_blank" >plugin frequently asked questions</a> for examples.', 'disqus-latest-comments' ), 'https://wordpress.org/plugins/disqus-latest-comments/faq/' )?></p><?php

			echo '<textarea id="custom_css" name="itsg_disqus_lastest_comments_addon_settings[custom_css]"  style="width:100%" rows="10" cols="50">' . $custom_css  . '</textarea>';
		}

		public function target_blank_callback() {
			$target_blank = esc_attr( $this->_options['target_blank'] );

			echo '<input id="target_blank" ' . checked( $target_blank, true, false ) .' type="checkbox" name="itsg_disqus_lastest_comments_addon_settings[target_blank]" value="1" >';
		}

		public function show_errors_callback() {
			$show_errors = esc_attr( $this->_options['show_errors'] );

			echo '<input id="show_errors" ' . checked( $show_errors, true, false ) .' type="checkbox" name="itsg_disqus_lastest_comments_addon_settings[show_errors]" value="1" >';
		}

		public function cache_time_callback() {
			$output = '';

			$cache_time = esc_attr( $this->_options['cache_time'] );

			$output .= '<input id="cache_time" type="numbers" name="itsg_disqus_lastest_comments_addon_settings[cache_time]" value="' . $cache_time .'">';
			$output .= '<div><p>' . __( 'Number of minutes WordPress will cache comments before checking for new comments.', 'disqus-latest-comments' ) . '</p></div>';

			echo $output;
		}

		public function bypass_cache_callback() {
			$output = '';

			$bypass_cache = esc_attr( $this->_options['bypass_cache'] );

			$output .= '<input id="bypass_cache" ' . checked( $bypass_cache, true, false ) .' type="checkbox" name="itsg_disqus_lastest_comments_addon_settings[bypass_cache]" value="1" >';
			$output .= '<div><p><strong>' . __( 'Not recommended', 'disqus-latest-comments' ) . '</strong> - ' . __( 'Disqus limits the number of requests allowed to their API. Disabling the cache may lead to excessive API requests.', 'disqus-latest-comments' ) . '</p></div>';

			echo $output;
		}

		public function cache_buster_callback() {
			$output = '';

			$cache_buster = esc_attr( $this->_options['cache_buster'] );

			$output .= '<input id="cache_buster" ' . checked( $cache_buster, true, false ) .' type="checkbox" name="itsg_disqus_lastest_comments_addon_settings[cache_buster]" value="1" >';
			$output .= '<div><p>' . __( 'Bypasses caching plugins by using ajax request to display comments.' ) . '</p></div>';

			echo $output;
		}
	}
	$ITSG_Disqus_Latest_Comments_Addon = new ITSG_Disqus_Latest_Comments_Addon();
}