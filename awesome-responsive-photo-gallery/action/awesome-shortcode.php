<?php
/**
 * Class AWRPG_Shortcode
 *
 * This class replaces the default WordPress [gallery] shortcode to enhance its functionality.
 * 
 * Enhancements include:
 * - Support for three different lightbox systems.
 * - Improved gallery rendering with additional customization options.
 * - Retains compatibility with existing [gallery] shortcodes in WordPress content.
 *
 * Key Features:
 * - Adds lightbox functionality to the gallery shortcode (default WordPress gallery does not include this).
 * - Provides an object-oriented approach for easy maintenance and extensibility.
 *
 * Proper sanitization, validation, and escaping are implemented to ensure security and WordPress coding standards.
 * 
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('AWRPG_Shortcode')) {
    class AWRPG_Shortcode {

		private $handle_opt;
		private $gallery_opt;
		private $gal_function;

        public function __construct() {
			// remove unnecessary data 
			remove_filter( 'the_content', array( $this, 'wptexturize' ) );
			remove_filter( 'the_content', array( $this, 'wpautop' ) );

			// Shortcode
			add_shortcode( 'gallery', array( $this, 'awesome_gallery_shortcode' ) );

            // Hook to enqueue styles for the plugin.
            add_action( 'wp_enqueue_scripts', array( $this, 'awesome_gallery_shortcode' ) );

			/* Include and initialize the handle option class. */
			$this->handle_opt = new AWRPG_Handle_Options();

			/* Include and initialize the gallery option class. */
			$this->gallery_opt = new AWRPG_Gallery_Scripts();

			/* Include and initialize the gallery functions class. */
			$this->gal_function = new AWRPG_Gallery_Functions();
		}

		// Registering Shortcode
		public function awesome_gallery_shortcode( $atts ) {
			$post = get_post();
			$sc_handle = $scid = '';

			static $instance = 0;
			$instance++;

			if ( ! empty( $atts['ids'] ) ) {
				// 'ids' is explicitly ordered, unless specified otherwise.
				if ( empty( $atts['orderby'] ) ) {
					$atts['orderby'] = 'post__in';
				}
				$atts['ids'] = sanitize_text_field( $atts['ids'] );
				$atts['include'] = $atts['ids'];
			}

			$output = apply_filters( 'post_gallery', '', $atts, $instance );
			if ( $output != '' ) {
				return wp_kses_post( $output );
			}
			
			$html5 = current_theme_supports( 'html5', 'gallery' );

			ob_start();

			$atts = shortcode_atts(
				array(
					'order'   => 'ASC',
					'orderby' => 'menu_order ID',
					'id'      => '',
					'size'    => 'thumbnail',
					'include' => '',
					'exclude' => '',
					'link'    => '',
					'columns' => '',
				),
				$atts,
				'gallery'
			);

			if ( ! isset( $atts['id'] ) || empty( $atts['id'] ) ) {
				$id_not_found = sprintf(
					__(
						'<div style="display:inline-block;margin:0;padding:15px;border-radius:5px;margin-bottom:10px;background-color:#f9d4d4;border:1px solid #e66464;color:#b63737;font-size:15px;line-height:24px">
							<h4>Gallery ID is not specified!</h4>
							<p>To display your gallery correctly, please add a <strong>unique ID</strong> to the gallery shortcode like below:</p>
							<p>[gallery <strong>id="1"</strong> ids="45,43,22,23,31,32,34,15"]</p>
							For step-by-step instructions, visit the <a href="%1$s" target="_blank"><strong>Help</strong></a> page.
						</div>',
						'awesome-responsive-photo-gallery'
					),
					esc_url( admin_url( 'admin.php?page=awrpg-help' ) )
				);
				return $id_not_found;
			}

			$scid = isset( $atts['id'] ) ? absint( $atts['id'] ) : 1;

			$gallery_lists = get_option( 'awrpg_galleryTables' );

			if ( ! isset( $gallery_lists ) || empty( $gallery_lists ) ) {
				$id_not_found = sprintf(
					__(
						'<div style="display:inline-block;margin:0;padding:15px;border-radius:5px;margin-bottom:10px;background-color:#f9d4d4;border:1px solid #e66464;color:#b63737;font-size:15px;line-height:24px">
							<h4>Gallery Data Not Found</h4>
							It seems no galleries have been created using the plugin yet. The system relies on the <strong>Gallery List</strong> to function correctly, but the required data is missing.<br>
							To resolve this issue, please create a gallery by following these steps:
							<ol>
								<li>Go to the <a href="%1$s" target="_blank"><strong>Gallery List</strong></a> page in your WordPress dashboard.</li>
								<li>Click on <strong>Add New</strong>.</li>
								<li>Enter the name of the gallery and click on <strong>Add Gallery</strong>.</li>
								<li>Hover over the gallery name and click on <strong>Add Options</strong> to configure your gallery settings.</li>
							</ol>
							Once a gallery has been created, the system will update automatically, and you can use the shortcode with the appropriate gallery ID to display it on your site.<br>
							For step-by-step instructions, visit the <a href="%2$s" target="_blank"><strong>Help Page</strong></a>.
						</div>',
						'awesome-responsive-photo-gallery'
					),
					esc_url( admin_url( 'admin.php?page=awrpg-lists' ) ),
					esc_url( admin_url( 'admin.php?page=awrpg-help' ) ),
				);
				return $id_not_found;
			}

			$gallery_lists = ! empty( $gallery_lists ) ? explode( ', ', sanitize_text_field( $gallery_lists ) ) : array();

			$gallery = isset( $gallery_lists[ $scid - 1 ] ) ? sanitize_text_field( $gallery_lists[ $scid - 1 ] ) : '';

			if ( ! isset( $gallery ) || empty( $gallery ) ) {
				$id_not_found = sprintf(
					__(
						'<div style="display:inline-block;margin:0;padding:15px;border-radius:5px;margin-bottom:10px;background-color:#fff3d1;border:1px solid #e6b800;color:#b58c00;font-size:15px;line-height:24px">
							<h4>Gallery Not Found!</h4>
							The specified gallery ID \'<code>'. $atts['id'] .'</code>\' does not exist. It seems you have added the gallery shortcode with an ID that hasn\'t been created yet using the Awesome Responsive Photo Gallery plugin.<br><br>
							<h4>What to Do?</h4>
							<ol>
								<li>Navigate to the <a href="%1$s" target="_blank"><strong>Gallery Management</strong></a> page in the plugin to create a new gallery.</li>
								<li>After creating the gallery, ensure that the ID matches the one you\'ve used in the shortcode.</li>
							</ol>
							If you need step-by-step instructions, please visit the <a href="%2$s" target="_blank"><strong>Help</strong></a> page for detailed guidance.
						</div>',
						'awesome-responsive-photo-gallery'
					),
					esc_url( admin_url( 'admin.php?page=awrpg-lists' ) ),
					esc_url( admin_url( 'admin.php?page=awrpg-help' ) ),
				);
				return $id_not_found;
			}
			// $gallery_id = esc_attr( strtolower( $gallery ) . '-' . $scid );

			$gallery_options = get_option( $gallery . '_options' );

			if ( ! isset( $gallery_options ) || empty( $gallery_options ) ) {
				wp_enqueue_style( 'awrpg-style' );
				$id_not_found = sprintf(
					__(
						'<div style="display:inline-block;margin:0;padding:15px;border-radius:5px;margin-bottom:10px;background-color:#e7f4fd;border:1px solid #5da4ff;color:#007bff;font-size:15px;line-height:24px">
							<h4>Gallery Options Not Configured</h4>
							It seems you\'ve created a gallery but haven\'t added any settings yet. To configure your gallery and obtain the unique <strong>SHORTCODE ID</strong>, please follow these steps:
							<ol>
								<li>Navigate to the <a href="%1$s" target="_blank"><strong>Gallery List</strong></a> page in your dashboard.</li>
								<li>Hover over the name of the gallery you just created.</li>
								<li>Click on <strong>Add Options</strong> to customize your gallery settings.</li>
								<li>After saving the settings, you will see the unique <strong>SHORTCODE ID</strong> assigned to your gallery.</li>
							</ol>
							Once you\'ve completed these steps, update your page with the correct <strong>ID</strong> in the shortcode to display the gallery properly.<br>
							For detailed guidance, visit the <a href="%2$s" target="_blank"><strong>Help Page</strong></a> or refer to the documentation.
						</div>',
						'awesome-responsive-photo-gallery'
					),
					esc_url( admin_url( 'admin.php?page=awrpg-lists' ) ),
					esc_url( admin_url( 'admin.php?page=awrpg-help' ) ),
				);
				return $id_not_found;
			}

			$my_gallery = ! empty( $gallery_options['mygal'] ) ? sanitize_text_field( $gallery_options['mygal'] ) : 'awesome';

			$image_width = ! empty( $gallery_options['imgwd'] ) ? absint( $gallery_options['imgwd'] ) : 250;
			$image_height = ! empty( $gallery_options['imght'] ) ? absint( $gallery_options['imght'] ) : 250;
			$thumb_title = ! empty( $gallery_options['thttl'] ) ? filter_var( $gallery_options['thttl'], FILTER_VALIDATE_BOOLEAN ) : false;
			$thumb_caption = ! empty( $gallery_options['thcap'] ) ? filter_var( $gallery_options['thcap'], FILTER_VALIDATE_BOOLEAN ) : false;

			// Get the current page ID
			$page_id = get_the_ID();

			$size = isset( $gallery_options['image'] ) && $gallery_options['image'] !== '' ? sanitize_text_field( $gallery_options['image'] ) : sanitize_text_field( $atts['size'] );

			if ( ! empty( $atts['include'] ) ) {
				$_attachments = get_posts( array( 
					'include' => sanitize_text_field( $atts['include'] ), 
					'post_status' => 'inherit', 
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'order' => sanitize_text_field( $atts['order'] ), 
					'orderby' => sanitize_text_field( $atts['orderby'] ) 
				));

				$attachments = array();
				foreach ( $_attachments as $key => $val ) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			} elseif ( ! empty( $atts['exclude'] ) ) {
				$attachments = get_children( array( 
					'post_parent' => $scid, 
					'exclude' => sanitize_text_field( $atts['exclude'] ), 
					'post_status' => 'inherit', 
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'order' => sanitize_text_field( $atts['order'] ), 
					'orderby' => sanitize_text_field( $atts['orderby'] ) 
				));
			} else {
				$attachments = get_children( array( 
					'post_parent' => $scid, 
					'post_status' => 'inherit', 
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'order' => sanitize_text_field( $atts['order'] ), 
					'orderby' => sanitize_text_field( $atts['orderby'] ) 
				));
			}

			if ( empty( $attachments ) ) {
				return '';
			}

			if ( is_feed() ) {
				$output = "\n";
				foreach ( $attachments as $att_id => $attachment ) {
					$output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
				}
				return $output;
			}

			$selector = "gallery-{$instance}";
			$imgdetails = $gallery_style = $gallery_div = '';
			$size_class = sanitize_html_class( $size );
			$cats = array();

			$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

			$gallery_class = '';
			if ( $my_gallery != 'jgallery' ) {
				if ( $my_gallery == 'awesome' ) {
					$gallery_class = 'arp_gallery';
				} else {
					$gallery_class = 'lcs_gallery';
				}
			} else {
				$gallery_class = 'j_gallery';
			}

			if ( $my_gallery != 'jgallery' ) {
				$output .= '<ul id="arpGallery' . $scid . '" class="' . esc_attr( $gallery_class ) . '">';
			} else {
				$output .= '<div id="arpGallery' . $scid . '" class="' . esc_attr( $gallery_class ) . '">';
			}

			$i = 0;
			$lcid = $scid;

			foreach ( $attachments as $key => $attachment ) {
				$atts = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$key" ) : '';
				$awesome_full_image = esc_url( wp_get_attachment_url( $key, 'full' ) );
				$awesome_big_image  = esc_url( wp_get_attachment_image_src( $key, 'large', false )[0] );
				$awesome_medium_image = esc_url( wp_get_attachment_image_src( $key, 'medium', false )[0] );
				$jgallery_thumb = esc_url( wp_get_attachment_image_src( $key, $size, false )[0] );
				$awesome_title = ! empty( $attachment->post_title ) ? esc_html( $attachment->post_title ) : '';
				$awesome_description = ! empty( $attachment->post_content ) ? esc_html( $attachment->post_content ) : '';
				$awesome_caption = ! empty( $attachment->post_excerpt ) ? esc_html( $attachment->post_excerpt ) : '';

				if ( $thumb_title != false || $thumb_caption != false ) {
					$imgdetails = "<figcaption>";
					if ( $thumb_title != false ) { 
						$imgdetails .= "<h2>" . esc_html( $awesome_title ) . "</h2>"; 
					}
					if ( $thumb_caption != false ) { 
						$imgdetails .= "<p>" . esc_html( $awesome_caption ) . "</p>"; 
					}
					$imgdetails .= "</figcaption>";
				}

				if ( $my_gallery == 'awesome' ) {
					$awesome_video = esc_url( get_post_meta( $key, '_awrpg_video_url', true ) );
				} else {
					$awesome_video = esc_url( get_post_meta( $key, '_awrpg_video_url', true ) );

					$video_format = $this->gal_function->awrpg_parseVideos( $lcid, $awesome_video );
					if ( $video_format ) {
						// print_r($video_format);
						foreach ( $video_format as $key => $video ) {
							if ( isset( $video['url'] ) ) {
								$video[$key] = esc_url( $video['url'] );
							}
						}

						$video_url = esc_url( $video['url'] );
					} else {
						$video_url = $awesome_video;
					}
				}

				if ( $size != 'custom' ) {
					if ( $my_gallery != 'jgallery' ) {
						if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
							$image_output = wp_get_attachment_link( $key, $size, false, false, false, $atts );
						} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
							$image_output = wp_get_attachment_image( $key, $size, false, $atts );
						} else {
							$image_output = wp_get_attachment_link( $key, $size, true, false, false, $atts );
						}
					} else {
						$img_src = sprintf(
							'<img class="ag-thumbnail" src="%s" alt="%s">
							<div class="awesome-gallery-poster">%s
								<img src="%sassets/images/zoom.png" alt="zoom">
							</div>',
							esc_url($jgallery_thumb),
							esc_attr($awesome_title),
							$imgdetails,
							esc_url(AWRPG_PLUGIN_URL)
						);						
						$image_output = $this->gal_function->awrpg_filter_image_send_to_editor( $key, $awesome_full_image, $img_src );
					}
				} else {
					$awesome_thumb = awrpg_aq_resize( $awesome_full_image, $image_width, $image_height, true, true, true );
					if ($awesome_video && $my_gallery != 'jgallery') {
						if($my_gallery == 'awesome') {
							$image_output = sprintf(
								'<li data-title="%s" data-desc="%s" data-responsive-src="%s" data-src="%s">
									<img class="ag-thumbnail" src="%s" alt="%s">
									<div class="awesome-video-poster">%s
										<img src="%sassets/images/play-button.png" alt="play">
									</div>
								</li>',
								esc_attr($awesome_title), 
								esc_attr($awesome_description), 
								esc_url($awesome_medium_image), 
								esc_url($awesome_video), 
								esc_url($awesome_thumb), 
								esc_attr($awesome_title), 
								$imgdetails, 
								esc_url(AWRPG_PLUGIN_URL)
							);							
						} else {
							$image_output = sprintf(
								'<li data-href="%s" data-rel="lightcase:myCollection%s" title="%s" data-caption="%s">
									<img class="ag-thumbnail" src="%s" alt="%s">
									<div class="awesome-video-poster">%s
										<img src="%sassets/images/play-button.png" alt="play">
									</div>
								</li>',
								esc_url($video_url), 
								esc_attr($lcid), 
								esc_attr($awesome_title), 
								esc_attr($awesome_description), 
								esc_url($awesome_thumb), 
								esc_attr($awesome_title), 
								$imgdetails, 
								esc_url(AWRPG_PLUGIN_URL)
							);							
						}
					} else {
						if($my_gallery == 'awesome') {
							$image_output = sprintf(
								'<li data-title="%s" data-desc="%s" data-responsive-src="%s" data-src="%s">
									<img class="ag-thumbnail" src="%s" alt="%s">
									<div class="awesome-gallery-poster">%s
										<img src="%sassets/images/zoom.png" alt="zoom">
									</div>
								</li>',
								esc_attr($awesome_title),
								esc_attr($awesome_description),
								esc_url($awesome_medium_image),
								esc_url($awesome_full_image),
								esc_url($awesome_thumb),
								esc_attr($awesome_title),
								$imgdetails,
								esc_url(AWRPG_PLUGIN_URL)
							);
						} elseif ( $my_gallery == 'lightcase' ) {
							$image_output = sprintf(
								'<li data-href="%s" data-rel="lightcase:myCollection%s" title="%s" data-caption="%s">
									<img class="ag-thumbnail" src="%s" alt="%s">
									<div class="awesome-gallery-poster">%s
										<img src="%sassets/images/zoom.png" alt="zoom">
									</div>
								</li>',
								esc_url($awesome_full_image),
								esc_attr($lcid),
								esc_attr($awesome_title),
								esc_attr($awesome_description),
								esc_url($awesome_thumb),
								esc_attr($awesome_title),
								$imgdetails,
								esc_url(AWRPG_PLUGIN_URL)
							);
						} else {
							$image_output = sprintf(
								'<a href="%s">
									<img class="ag-thumbnail" src="%s" alt="%s">
									<div class="awesome-gallery-poster">%s
										<img src="%sassets/images/zoom.png" alt="zoom">
									</div>
								</a>',
								esc_url($awesome_full_image),
								esc_url($awesome_thumb),
								esc_attr($awesome_title),
								$imgdetails,
								esc_url(AWRPG_PLUGIN_URL)
							);
						}
					}
				}

				$image_meta  = wp_get_attachment_metadata( $key );
				
				$orientation = '';
				if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
					$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
				}

				if($size == 'custom') {
					$output .= wp_kses_post( $image_output );
				} else {
					if ( $awesome_video && $my_gallery != 'jgallery' ) {
						if ( $my_gallery == 'awesome' ) {
							$output .= sprintf(
								"<li class='awesome-video' data-title='%s' data-desc='%s' data-responsive-src='%s' data-src='%s'>
									<div class='overlay_thumb'></div>
									<div class='awesome-video-icon'></div>%s
									%s
								</li>",
								esc_attr( $awesome_title ),
								esc_attr( $awesome_description ),
								esc_url( $awesome_medium_image ),
								esc_url( $awesome_video ),
								$imgdetails,
								$image_output
							);
						} else {
							$output .= sprintf(
								"<li class='awesome-video' data-href='%s' data-rel='lightcase:myCollection%s' title='%s' data-caption='%s'>
									<div class='overlay_thumb'></div>
									<div class='awesome-video-icon'></div>%s
									%s
								</li>",
								esc_url( $video_url ),
								esc_attr( $lcid ),
								esc_attr( $awesome_title ),
								esc_attr( $awesome_description ),
								$imgdetails,
								$image_output
							);
						}
					} else {
						if ( $my_gallery == 'awesome' ) {
							$output .= sprintf(
								"<li class='awesome-gallery' data-title='%s' data-desc='%s' data-responsive-src='%s' data-src='%s'>
									<div class='overlay_thumb'></div>
									<div class='awesome-gallery-icon'></div>%s
									%s
								</li>",
								esc_attr( $awesome_title ),
								esc_attr( $awesome_description ),
								esc_url( $awesome_medium_image ),
								esc_url( $awesome_big_image ),
								$imgdetails,
								$image_output
							);
						} elseif ( $my_gallery == 'lightcase' ) {
							$output .= sprintf(
								"<li class='awesome-gallery' data-href='%s' data-rel='lightcase:myCollection%s' title='%s' data-caption='%s'>
									<div class='overlay_thumb'></div>
									<div class='awesome-gallery-icon'></div>%s
									%s
								</li>",
								esc_url( $awesome_big_image ),
								$lcid,
								esc_attr( $awesome_title ),
								esc_attr( $awesome_description ),
								$imgdetails,
								$image_output
							);
						} else {
							$output .= wp_kses_post( $image_output );
						}
					}
				}
			}
			if ( $my_gallery != 'jgallery' ) {
				$output .= "</ul>\n";
			} else {
				$output .= "</div>\n";
			}

			if ( $my_gallery == 'awesome' ) {
				$sc_handle = 'awrpg-gallery';
			} elseif ( $my_gallery == 'lightcase' ) {
				$sc_handle = 'awrpg-lcase';
			} else {
				$sc_handle = 'awrpg-jgallery';
			}

			// Generate the file name for the team
			$output_filename = $sc_handle . '-' . $page_id . '.css';

			// Set the path to the output file
			$output_path = AWRPG_PLUGIN_PATH . '/assets/css/' . $output_filename;

			// Clear the file
			file_put_contents($output_path, '');

			// Read the new CSS content generated by the shortcode
			$css_code = $this->handle_opt->awrpg_process_option($lcid, $gallery, $my_gallery, $size);

			// Write the combined CSS code back to the output file
			file_put_contents($output_path, $css_code);

			do_action( 'awrpg_after_gallery' );

			$output .= ob_get_clean();

			$this->awrpg_load_media( $lcid );

			wp_add_inline_script( $sc_handle, $this->gallery_opt->awrpg_process_gallery( $lcid, $gallery, $my_gallery ) );

			return $output;
		}

        // Enqueue script & styles for the plugin.
        public function awrpg_load_media( $scid ) {
			$scid = isset( $scid ) ? absint( $scid ) : 1;

			$awrpg_ver = '1.0.5';

			// Get the current page ID
			$page_id = get_the_ID();

			$gallery_lists = get_option( 'awrpg_galleryTables' );
			$gallery_lists = ! empty( $gallery_lists ) ? explode( ', ', sanitize_text_field( $gallery_lists ) ) : array();
			$gallery = isset( $gallery_lists[ $scid - 1 ] ) ? sanitize_text_field( $gallery_lists[ $scid - 1 ] ) : '';
			$gallery_id = esc_attr( strtolower( $gallery ) . '-' . $scid );

			$gallery_options = get_option( $gallery . '_options' );
			$my_gallery = ! empty( $gallery_options['mygal'] ) ? sanitize_text_field( $gallery_options['mygal'] ) : 'awesome';

			if ( isset( $gallery_options ) && ! empty( $gallery_options ) ) {

				if ( $my_gallery === 'awesome' ) {
					wp_enqueue_script('awrpg-gallery', AWRPG_PLUGIN_URL . 'assets/js/awesomegallery.js', array('jquery'), $awrpg_ver, true);
					wp_enqueue_script('awrpg-mousewheel', AWRPG_PLUGIN_URL . 'assets/js/jquery.mousewheel.js', array('jquery'), '3.1.13', true);
					wp_enqueue_style('awrpg-gallery', AWRPG_PLUGIN_URL . 'assets/css/awesomegallery.css', array(), $awrpg_ver);
					wp_enqueue_style('awrpg-gallery-'.$page_id, AWRPG_PLUGIN_URL . 'assets/css/awrpg-gallery-'.$page_id.'.css', array(), $awrpg_ver);
				} elseif ( $my_gallery === 'lightcase' ) {
					wp_enqueue_script('awrpg-lcase', AWRPG_PLUGIN_URL . 'assets/js/lightcase.js', array('jquery'), '2.5.0', true);
					wp_enqueue_style('awrpg-lcase', AWRPG_PLUGIN_URL . 'assets/css/lightcase.css', array(), '2.5.0');
					wp_enqueue_style('awrpg-lcase-'.$page_id, AWRPG_PLUGIN_URL . 'assets/css/awrpg-lcase-'.$page_id.'.css', array(), $awrpg_ver);
				} else {
					wp_enqueue_script('awrpg-jgallery', AWRPG_PLUGIN_URL . 'assets/js/jgallery.js', array('jquery'), '1.6.4', true);
					wp_enqueue_script('awrpg-etouch', AWRPG_PLUGIN_URL . 'assets/js/jquery.events.touch.js', array('jquery'), '1.6.18', true);
					wp_enqueue_style('awrpg-jgallery', AWRPG_PLUGIN_URL . 'assets/css/jgallery.css', array(), '1.6.4');
					wp_enqueue_style('awrpg-jgallery-'.$page_id, AWRPG_PLUGIN_URL . 'assets/css/awrpg-jgallery-'.$page_id.'.css', array(), $awrpg_ver);
				}
				if ( $my_gallery == 'awesome' || $my_gallery == 'jgallery' ) {
					wp_enqueue_style('awrpg-fa-icon', AWRPG_PLUGIN_URL . 'assets/css/fontawesome.min.css', array(), '5.0.9');
				}
			}
        }
	}
}

new AWRPG_Shortcode();
