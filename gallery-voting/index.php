<?php

/*
Plugin Name: Gallery Voting
Plugin URI: https://tribulant.com
Description: Voting/likes for the WordPress <code>[gallery]</code> shortcode photos/images.
Author: Tribulant Software
Version: 1.3
Author URI: https://tribulant.com
Text Domain: gallery-voting
Domain Path: /languages
*/

if (!class_exists('GalleryVoting')) {
	class GalleryVoting {
		
		function __construct() {
			$this -> initialize_options();
			return;
		}
		
		function initialize_options() {
			add_option('gallery_voting_css', '
			@media (max-width: 768px) {
				.gallery-item {
					width: 50% !important;
				}
			}
			
			@media (max-width: 480px) { 
				.gallery-item {
					width: 100% !important;
				}
			}
			
			.gallery {
				margin: auto;
			}
			.gallery-item {
				float: left;
				margin-top: 10px;
				text-align: center;
			/*	width: {$itemwidth}%; */
			}
			.gallery img {
				border: 2px solid #cfcfcf;
			}
			.gallery-caption {
				margin-left: 0;
				}');
				
			add_option('gallery_voting_usersallowed', "all");
			add_option('gallery_voting_max_all', "3");
			add_option('gallery_voting_max_same', "1");
			add_option('gallery_voting_tracking', "ipaddress");
	
			global $wpdb;
			$name = $wpdb -> prefix . 'galleryvotes';
			$query = "SHOW TABLES LIKE '" . $name . "'";
			if (!$wpdb -> get_var($query)) {
				$query = "CREATE TABLE `" . $name . "` (";
				$query .= "`id` INT NOT NULL AUTO_INCREMENT,";
				$query .= "`ip_address` VARCHAR(100) NOT NULL DEFAULT '',";
				$query .= "`attachment_id` INT(11) NOT NULL DEFAULT '0',";
				$query .= "`created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',";
				$query .= "`modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',";
				$query .= "PRIMARY KEY (`id`)";
				$query .= ") ENGINE=MyISAM AUTO_INCREMENT=1 CHARSET=UTF8 COLLATE=utf8_general_ci;";
				
				$wpdb -> query($query);
			}
		}
		
		function debug($var = null) {
			echo '<pre>' . print_r($var, true) . '</pre>';
		}
		
		function gallery_shortcode( $attr ) {
			$post = get_post();
		
			static $instance = 0;
			$instance++;
		
			if ( ! empty( $attr['ids'] ) ) {
				// 'ids' is explicitly ordered, unless you specify otherwise.
				if ( empty( $attr['orderby'] ) ) {
					$attr['orderby'] = 'post__in';
				}
				$attr['include'] = $attr['ids'];
			}
		
			/**
			 * Filters the default gallery shortcode output.
			 *
			 * If the filtered output isn't empty, it will be used instead of generating
			 * the default gallery template.
			 *
			 * @since 2.5.0
			 * @since 4.2.0 The `$instance` parameter was added.
			 *
			 * @see gallery_shortcode()
			 *
			 * @param string $output   The gallery output. Default empty.
			 * @param array  $attr     Attributes of the gallery shortcode.
			 * @param int    $instance Unique numeric ID of this gallery shortcode instance.
			 */
			//$output = apply_filters( 'post_gallery', '', $attr, $instance );
			if (!empty($output) ) {
				return $output;
			}
		
			$html5 = current_theme_supports( 'html5', 'gallery' );
			$atts  = shortcode_atts(
				array(
					'order'      => 'ASC',
					'orderby'    => 'menu_order ID',
					'id'         => $post ? $post->ID : 0,
					'itemtag'    => $html5 ? 'figure' : 'dl',
					'icontag'    => $html5 ? 'div' : 'dt',
					'captiontag' => $html5 ? 'figcaption' : 'dd',
					'columns'    => 3,
					'size'       => 'thumbnail',
					'include'    => '',
					'exclude'    => '',
					'link'       => '',
				),
				$attr,
				'gallery'
			);
		
			$id = intval( $atts['id'] );
		
			if ( ! empty( $atts['include'] ) ) {
				$_attachments = get_posts(
					array(
						'include'        => $atts['include'],
						'post_status'    => 'inherit',
						'post_type'      => 'attachment',
						'post_mime_type' => 'image',
						'order'          => $atts['order'],
						'orderby'        => $atts['orderby'],
					)
				);
		
				$attachments = array();
				foreach ( $_attachments as $key => $val ) {
					$attachments[ $val->ID ] = $_attachments[ $key ];
				}
			} elseif ( ! empty( $atts['exclude'] ) ) {
				$attachments = get_children(
					array(
						'post_parent'    => $id,
						'exclude'        => $atts['exclude'],
						'post_status'    => 'inherit',
						'post_type'      => 'attachment',
						'post_mime_type' => 'image',
						'order'          => $atts['order'],
						'orderby'        => $atts['orderby'],
					)
				);
			} else {
				$attachments = get_children(
					array(
						'post_parent'    => $id,
						'post_status'    => 'inherit',
						'post_type'      => 'attachment',
						'post_mime_type' => 'image',
						'order'          => $atts['order'],
						'orderby'        => $atts['orderby'],
					)
				);
			}
		
			if ( empty( $attachments ) ) {
				return '';
			}
		
			if ( is_feed() ) {
				$output = "\n";
				foreach ( $attachments as $att_id => $attachment ) {
					$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
				}
				return $output;
			}
		
			$itemtag    = tag_escape( $atts['itemtag'] );
			$captiontag = tag_escape( $atts['captiontag'] );
			$icontag    = tag_escape( $atts['icontag'] );
			$valid_tags = wp_kses_allowed_html( 'post' );
			if ( ! isset( $valid_tags[ $itemtag ] ) ) {
				$itemtag = 'dl';
			}
			if ( ! isset( $valid_tags[ $captiontag ] ) ) {
				$captiontag = 'dd';
			}
			if ( ! isset( $valid_tags[ $icontag ] ) ) {
				$icontag = 'dt';
			}
		
			$columns   = intval( $atts['columns'] );
			$itemwidth = $columns > 0 ? floor( 100 / $columns ) : 100;
			$float     = is_rtl() ? 'right' : 'left';
		
			$selector = "gallery-{$instance}";
		
			$gallery_style = '';
		
			/**
			 * Filters whether to print default gallery styles.
			 *
			 * @since 3.1.0
			 *
			 * @param bool $print Whether to print default gallery styles.
			 *                    Defaults to false if the theme supports HTML5 galleries.
			 *                    Otherwise, defaults to true.
			 */
			if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
				$gallery_style = "
				<style type='text/css'>
					#{$selector} {
						margin: auto;
					}
					#{$selector} .gallery-item {
						float: {$float};
						margin-top: 10px;
						text-align: center;
						width: {$itemwidth}%;
					}
					#{$selector} img {
						border: 2px solid #cfcfcf;
					}
					#{$selector} .gallery-caption {
						margin-left: 0;
					}
					/* see gallery_shortcode() in wp-includes/media.php */
				</style>\n\t\t";
			}
		
			$size_class  = sanitize_html_class( $atts['size'] );
			$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
		
			/**
			 * Filters the default gallery shortcode CSS styles.
			 *
			 * @since 2.5.0
			 *
			 * @param string $gallery_style Default CSS styles and opening HTML div container
			 *                              for the gallery shortcode output.
			 */
			$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
		
			$i = 0;
			foreach ( $attachments as $id => $attachment ) {
		
				$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
				if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
					$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
				} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
					$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
				} else {
					$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
				}
				$image_meta = wp_get_attachment_metadata( $id );
		
				$orientation = '';
				if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
					$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
				}
				$output .= "<{$itemtag} class='gallery-item'>";
				$output .= "
					<{$icontag} class='gallery-icon {$orientation}'>
						$image_output
					</{$icontag}>";
				if ( $captiontag && trim( $attachment->post_excerpt ) ) {
					$output .= "
						<{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
						" . wptexturize( $attachment->post_excerpt ) . "
						</{$captiontag}>";
				}
				
				global $wpdb;
				$countquery = "SELECT COUNT(`id`) FROM `" . $wpdb -> prefix . "galleryvotes` WHERE `attachment_id` = '" . $attachment -> ID . "'";
				$count = $wpdb -> get_var($countquery);
				if (empty($count)) { $count = 0; }
				$output .= '<p><a href="#" onclick="gallery_voting_vote(\'' . $attachment -> ID . '\'); return false;"><span class="gallery-voting-count" id="gallery-voting-count-' . $attachment -> ID . '">' . $count . '</span> <i class="fa fas fa-thumbs-up fa-thumbs-o-up fw"></i> Vote <span style="display:none;" id="gallery-voting-loading-' . $attachment -> ID . '"><i class="fa fas fa-refresh fa-sync fa-spin"></i></span></a></p>';
				
				$output .= "</{$itemtag}>";
				if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
					$output .= '<br style="clear: both" />';
				}
			}
		
			if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
				$output .= "
					<br style='clear: both' />";
			}
		
			$output .= "
				</div>\n";
		
			return $output;
		}
		
		function post_gallery($output = null, $atts = null, $instance = null) {
			$usersallowed = get_option('gallery_voting_usersallowed');
			if (!empty($usersallowed) && ($usersallowed == "all" || ($usersallowed == "loggedin" && is_user_logged_in()))) {
				$output = $this -> gallery_shortcode($atts);
			}
						
			return $output;
		}
		
		// Add settings link on plugin page
		function plugin_action_links($links = array()) { 
		  $settings_link = '<a href="' . admin_url('options-general.php?page=gallery-voting') . '"><i class="fa fas fa-cog fa-fw"></i> ' . __('Settings', "gallery-voting") . '</a>'; 
		  array_unshift($links, $settings_link); 
		  return $links; 
		}
		
		function gallery_style($style = null) {
			return $style;
		}
		
		function wp_enqueue_scripts() {
			wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', false, '5.8.1', "all");
			wp_enqueue_style('gallery-voting', plugins_url('/css/style.css', __FILE__), false, (isset($this -> version)), "all");
		}
		
		function wp_head() {
			echo '<style type="text/css">';
			echo stripslashes(get_option('gallery_voting_css'));
			echo '</style>';
			
			?>

            <script type="text/javascript">
                // You’ll still need to echo out the admin URL in PHP
                var galleryvotingajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

                function gallery_voting_vote(attachment_id) {
                    // Show the loading indicator
                    var loadingSpan = document.getElementById('gallery-voting-loading-' + attachment_id);
                    if (loadingSpan) {
                        loadingSpan.style.display = 'inline';
                    }

                    // Prepare the POST data
                    var formData = new FormData();
                    formData.append('attachment_id', attachment_id);

                    // Make the AJAX call with Fetch
                    fetch(galleryvotingajaxurl + '?action=galleryvotingvote', {
                        method: 'POST',
                        body: formData
                    })
                        .then(function(response) {
                            // Parse response as JSON
                            return response.json();
                        })
                        .then(function(data) {
                            // Hide the loading indicator
                            if (loadingSpan) {
                                loadingSpan.style.display = 'none';
                            }

                            // Check if the request was successful
                            if (data.success === true) {
                                // Update the vote count
                                var countSpan = document.getElementById('gallery-voting-count-' + attachment_id);
                                if (countSpan) {
                                    countSpan.textContent = data.count;
                                }
                            } else {
                                // Show any errors
                                alert(data.error);
                            }
                        })
                        .catch(function(error) {
                            // Hide the loading indicator even if there's an error
                            if (loadingSpan) {
                                loadingSpan.style.display = 'none';
                            }
                            console.error('Error:', error);
                        });
                }
            </script>


            <?php
		}
        function vote() {
            global $wpdb;

            // Validate the IP address (fallback to 0.0.0.0 if invalid)
            $ip_address = $_SERVER['REMOTE_ADDR'];
            if ( false === filter_var( $ip_address, FILTER_VALIDATE_IP ) ) {
                $ip_address = '0.0.0.0';
            }

            // Make sure our options are integers
            $max_all  = intval( get_option( 'gallery_voting_max_all' ) );
            $max_same = intval( get_option( 'gallery_voting_max_same' ) );
            $tracking = get_option( 'gallery_voting_tracking' );

            $error = false;
            $success = false;
            $attachment_id = 0;

            // Check if data was posted
            if ( ! empty( $_POST ) ) {
                // Ensure attachment_id is present and integer
                if ( ! empty( $_POST['attachment_id'] ) ) {
                    $attachment_id = absint( $_POST['attachment_id'] );

                    switch ( $tracking ) {
                        case 'cookie':
                            // Get vote counts from cookies (no DB read)
                            $votecount     = isset( $_COOKIE['gallery_voting_all'] ) ? absint( $_COOKIE['gallery_voting_all'] ) : 0;
                            $votecountsame = isset( $_COOKIE[ 'gallery_voting_same_' . $attachment_id ] )
                                ? absint( $_COOKIE[ 'gallery_voting_same_' . $attachment_id ] )
                                : 0;

                            if ( $votecount < $max_all ) {
                                if ( $votecountsame < $max_same ) {
                                    // Use prepare for safe DB insert
                                    $insert_query = $wpdb->prepare(
                                        "INSERT INTO `{$wpdb->prefix}galleryvotes` (`ip_address`, `attachment_id`, `created`, `modified`)
                                 VALUES ( %s, %d, %s, %s )",
                                        $ip_address,
                                        $attachment_id,
                                        date("Y-m-d H:i:s"),
                                        date("Y-m-d H:i:s")
                                    );

                                    if ( $wpdb->query( $insert_query ) !== false ) {
                                        $success = true;
                                        // Set cookies
                                        setcookie( 'gallery_voting_all', $votecount + 1, time() + 60 * 60 * 24 * 30 );
                                        setcookie( 'gallery_voting_same_' . $attachment_id, $votecountsame + 1, time() + 60 * 60 * 24 * 30 );
                                    } else {
                                        $error = "Database could not be updated";
                                    }
                                } else {
                                    // Exceeded max votes for the same photo
                                    $error = ( $max_same == 1 )
                                        ? "You have voted for this photo already"
                                        : sprintf( "You have already voted %s times for this photo", $max_same );
                                }
                            } else {
                                // Exceeded max overall votes
                                $error = sprintf( "You have already voted %s times", $max_all );
                            }
                            break;

                        case 'ipaddress':
                        default:
                            // Get vote count by IP
                            $votecountquery = $wpdb->prepare(
                                "SELECT COUNT(`id`) FROM `{$wpdb->prefix}galleryvotes` WHERE `ip_address` = %s",
                                $ip_address
                            );
                            $votecount = $wpdb->get_var( $votecountquery );

                            if ( $votecount < $max_all ) {
                                // Check votes for the same photo by IP
                                $votecountsamequery = $wpdb->prepare(
                                    "SELECT COUNT(`id`) FROM `{$wpdb->prefix}galleryvotes` 
                             WHERE `ip_address` = %s AND `attachment_id` = %d",
                                    $ip_address,
                                    $attachment_id
                                );
                                $votecountsame = $wpdb->get_var( $votecountsamequery );

                                if ( $votecountsame < $max_same ) {
                                    // Insert new vote safely
                                    $insert_query = $wpdb->prepare(
                                        "INSERT INTO `{$wpdb->prefix}galleryvotes` (`ip_address`, `attachment_id`, `created`, `modified`)
                                 VALUES ( %s, %d, %s, %s )",
                                        $ip_address,
                                        $attachment_id,
                                        date("Y-m-d H:i:s"),
                                        date("Y-m-d H:i:s")
                                    );
                                    if ( $wpdb->query( $insert_query ) !== false ) {
                                        $success = true;
                                    } else {
                                        $error = "Database could not be updated";
                                    }
                                } else {
                                    // Exceeded max votes for the same photo
                                    $error = ( $max_same == 1 )
                                        ? "You have voted for this photo already"
                                        : sprintf( "You have already voted %s times for this photo", $max_same );
                                }
                            } else {
                                // Exceeded max overall votes
                                $error = sprintf( "You have already voted %s times", $max_all );
                            }
                            break;
                    }
                } else {
                    $error = "No photo was specified";
                }
            } else {
                $error = "No data was posted";
            }

            // Query total votes for that attachment
            $countquery = $wpdb->prepare(
                "SELECT COUNT(`id`) FROM `{$wpdb->prefix}galleryvotes` WHERE `attachment_id` = %d",
                $attachment_id
            );
            $count = $wpdb->get_var( $countquery );

            // Prepare response
            if ( ! $error ) {
                $data = array(
                    'success' => true,
                    'count'   => intval( $count ),
                );
            } else {
                $data = array(
                    'success' => false,
                    'error'   => $error,
                    'count'   => intval( $count ),
                );
            }

            // Output JSON with correct header
            header("Content-Type: application/json; charset=utf-8");
            echo json_encode( $data );

            // Use wp_die() in WordPress AJAX instead of raw exit/die
            wp_die();
        }

        function admin_menu() {
			add_options_page("Gallery Voting", "Gallery Voting", "manage_options", "gallery-voting", array($this, 'admin'));
		}


		public function admin() {

			// Make sure the user has the capability to manage options
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			// Process the form when the "Save Settings" button is clicked
			if ( isset( $_POST['save'] ) ) {

				// Verify this request came from our form (nonce check)
				check_admin_referer( 'gallery_voting_settings_nonce' );

				// Sanitize incoming data
				$usersallowed = isset( $_POST['usersallowed'] ) ? sanitize_text_field( $_POST['usersallowed'] ) : '';
				$max_all      = isset( $_POST['max_all'] ) ? intval( $_POST['max_all'] ) : 0;
				$max_same     = isset( $_POST['max_same'] ) ? intval( $_POST['max_same'] ) : 0;
				$tracking     = isset( $_POST['tracking'] ) ? sanitize_text_field( $_POST['tracking'] ) : '';
				// In order to allow certain HTML in the CSS, we can use wp_kses_post instead of sanitize_text_field.
				$css          = isset( $_POST['css'] ) ? wp_kses_post( $_POST['css'] ) : '';

				// Update the options
				update_option( 'gallery_voting_usersallowed', $usersallowed );
				update_option( 'gallery_voting_max_all', $max_all );
				update_option( 'gallery_voting_max_same', $max_same );
				update_option( 'gallery_voting_tracking', $tracking );
				update_option( 'gallery_voting_css', $css );

				// Optional: Add admin notice or redirect after saving
				add_settings_error( 'gallery_voting_settings', 'settings_updated', 'Settings saved.', 'updated' );
				//settings_errors( 'gallery_voting_settings' );
			}

			// Retrieve the current values for display
			$usersallowed = get_option( 'gallery_voting_usersallowed' );
			$max_all      = get_option( 'gallery_voting_max_all' );
			$max_same     = get_option( 'gallery_voting_max_same' );
			$tracking     = get_option( 'gallery_voting_tracking' );
			$css          = get_option( 'gallery_voting_css' );

			?>
            <div class="wrap gallery-voting">
                <h2>Gallery Voting Settings</h2>

                <!-- Display any settings errors here (if using add_settings_error above) -->
				<?php settings_errors( 'gallery_voting_settings' ); ?>

                <form action="" method="post">
                    <!-- Add a nonce field for security -->
					<?php wp_nonce_field( 'gallery_voting_settings_nonce' ); ?>

                    <table class="form-table">
                        <tbody>
                        <tr>
                            <th><label for="usersallowed">Users Allowed</label></th>
                            <td>
                                <label>
                                    <input
                                            type="radio"
                                            name="usersallowed"
                                            value="all"
										<?php checked( $usersallowed, 'all' ); ?>
                                    />
                                    All Users
                                </label>
                                <label>
                                    <input
                                            type="radio"
                                            name="usersallowed"
                                            value="loggedin"
										<?php checked( $usersallowed, 'loggedin' ); ?>
                                    />
                                    Logged In Only
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="max_all">Max Votes Overall</label></th>
                            <td>
                                <input
                                        type="number"
                                        name="max_all"
                                        value="<?php echo esc_attr( $max_all ); ?>"
                                        id="max_all"
                                        class="widefat"
                                        style="width:165px;"
                                />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="max_same">Max Votes Per Photo</label></th>
                            <td>
                                <input
                                        type="number"
                                        name="max_same"
                                        value="<?php echo esc_attr( $max_same ); ?>"
                                        id="max_same"
                                        class="widefat"
                                        style="width:165px;"
                                />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="tracking_ipaddress">Tracking</label></th>
                            <td>
                                <label>
                                    <input
                                            type="radio"
                                            name="tracking"
                                            value="cookie"
										<?php checked( $tracking, 'cookie' ); ?>
                                    />
                                    Cookie
                                </label>
                                <label>
                                    <input
                                            type="radio"
                                            name="tracking"
                                            value="ipaddress"
										<?php checked( $tracking, 'ipaddress' ); ?>
                                    />
                                    IP Address
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th><label>Custom CSS</label></th>
                            <td>
                                <textarea
                                        class="widefat"
                                        cols="100%"
                                        rows="10"
                                        name="css"
                                ><?php echo esc_textarea( $css ); ?></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p class="submit">
                        <input
                                type="submit"
                                name="save"
                                value="Save Settings"
                                class="button button-primary"
                        />
                    </p>
                </form>
            </div>
			<?php
		}

	}
	
	$plugin_file = plugin_basename(__FILE__);
	$GalleryVoting = new GalleryVoting();
	
	add_shortcode('galleryvoting', array($GalleryVoting, 'gallery_shortcode'));
	add_filter('plugin_action_links_' . $plugin_file, array($GalleryVoting, 'plugin_action_links'), 10, 1);
	add_filter('post_gallery', array($GalleryVoting, 'post_gallery'), 9999, 3);
	add_filter('gallery_style', array($GalleryVoting, 'gallery_style'), 10, 1);
	add_action('wp_enqueue_scripts', array($GalleryVoting, 'wp_enqueue_scripts'), 10, 1);
	add_action('wp_head', array($GalleryVoting, 'wp_head'), 10, 1);
	add_action('admin_menu', array($GalleryVoting, 'admin_menu'), 10, 1);
	add_action('wp_ajax_galleryvotingvote', array($GalleryVoting, 'vote'), 10, 1);
	add_action('wp_ajax_nopriv_galleryvotingvote', array($GalleryVoting, 'vote'), 10, 1);
}

?>