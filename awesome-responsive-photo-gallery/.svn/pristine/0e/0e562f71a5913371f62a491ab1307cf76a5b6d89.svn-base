<?php
/**
 * Class AWRPG_Gallery_Scripts
 *
 * This class is responsible for managing and generating the JavaScript and jQuery code 
 * for the Awesome Responsive Photo Gallery plugin. It includes functionality for 
 * different gallery types, such as Lightbox, Lightcase, and jGallery, allowing 
 * customization of features and behaviors for each gallery type.
 *
 * Usage:
 * - This class is typically used to render the necessary JavaScript for a gallery 
 *   on the front-end based on the settings configured in the WordPress admin panel.
 * - It provides default values for settings if not explicitly configured.
 *
 * Security:
 * - All dynamic output is sanitized and escaped using appropriate WordPress functions 
 *   such as esc_js(), esc_attr(), and intval().
 * - All input data is validated using isset() and type-checking to ensure proper format.
 *
 * Dependencies:
 * - This class relies on WordPress functions for options retrieval and data sanitization.
 * - It integrates jQuery for rendering gallery-specific scripts.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('AWRPG_Gallery_Scripts')) {
    class AWRPG_Gallery_Scripts {

		/**
		 * Processes gallery options and configurations for the specified gallery.
		 *
		 * @param int    $id           Gallery ID.
		 * @param string $gallery_name Gallery name for fetching options.
		 * @param string $gallery      Type of gallery ('awesome' or others).
		 *
		 * @return void
		 */
		public function awrpg_process_gallery($id, $gallery_name, $gallery) {
			// Sanitize and validate gallery ID
			$id = isset( $id ) ? absint( $id ) : 1;

			// Get gallery options
        	// $gallery_options = get_option(sanitize_text_field($gallery_name . '_options'));

			// Process 'awesome' gallery-specific options
			if ($gallery === 'awesome') {
				// Get specific 'awesome' gallery options
				$gallery_awesome = get_option(sanitize_text_field($gallery_name . '_awesome'));

				// Process each option with validation and defaults
				$transition_effect = isset($gallery_awesome['treft']) && $gallery_awesome['treft'] != '' 
					? sanitize_text_field($gallery_awesome['treft']) 
					: 'slide';

				$loop_back = isset($gallery_awesome['loop']) && $gallery_awesome['loop'] !== '' 
					? filter_var($gallery_awesome['loop'], FILTER_VALIDATE_BOOLEAN) 
					: true;

				$tran_duration = isset($gallery_awesome['speed']) && $gallery_awesome['speed'] !== '' 
					? absint($gallery_awesome['speed']) 
					: 1000;

				$download = isset($gallery_awesome['dload']) && $gallery_awesome['dload'] !== '' 
					? filter_var($gallery_awesome['dload'], FILTER_VALIDATE_BOOLEAN) 
					: true;

				$fullscreen = isset($gallery_awesome['fscrn']) && $gallery_awesome['fscrn'] !== '' 
					? filter_var($gallery_awesome['fscrn'], FILTER_VALIDATE_BOOLEAN) 
					: true;
	
				$index_number = isset($gallery_awesome['index']) && $gallery_awesome['index'] !== '' 
					? filter_var($gallery_awesome['index'], FILTER_VALIDATE_BOOLEAN) 
					: true;
	
				$shareimg = isset($gallery_awesome['share']) && $gallery_awesome['share'] !== '' 
					? filter_var($gallery_awesome['share'], FILTER_VALIDATE_BOOLEAN) 
					: true;
	
				$facebook = isset($gallery_awesome['fbook']) && $gallery_awesome['fbook'] !== '' 
					? absint($gallery_awesome['fbook']) 
					: 0;
	
				$linkedin = isset($gallery_awesome['lnkin']) && $gallery_awesome['lnkin'] !== '' 
					? absint($gallery_awesome['lnkin']) 
					: 0;
	
				$twitter = isset($gallery_awesome['twter']) && $gallery_awesome['twter'] !== '' 
					? absint($gallery_awesome['twter']) 
					: 0;
	
				$pinterest = isset($gallery_awesome['pntrs']) && $gallery_awesome['pntrs'] !== '' 
					? absint($gallery_awesome['pntrs']) 
					: 0;
	
				$thumbnails = isset($gallery_awesome['thumb']) && $gallery_awesome['thumb'] !== '' 
					? filter_var($gallery_awesome['thumb'], FILTER_VALIDATE_BOOLEAN) 
					: true;
	
				$videomax_width = isset($gallery_awesome['vmaxw']) && $gallery_awesome['vmaxw'] !== '' 
					? absint($gallery_awesome['vmaxw']) . 'px' 
					: '855px';

				// Construct the JavaScript for initializing the gallery
				$gallery_div = "
				jQuery(document).ready(function($) {
					$('#arpGallery" . esc_js($id) . "').arpGallery({
						mode: '" . esc_js($transition_effect) . "',"; 

				// Add options conditionally to the JavaScript configuration
				if ($loop_back !== true) {
					$gallery_div .= "
						loop: " . json_encode($loop_back) . ",";
				}

				if ($tran_duration !== 1000) {
					$gallery_div .= "
						speed: " . esc_js($tran_duration) . ",";
				}

				if ($index_number !== true) {
					$gallery_div .= "
						counter: " . json_encode($index_number) . ",";
				}

				if ($download !== true) {
					$gallery_div .= "
						download: " . json_encode($download) . ",";
				}
				
				if ($fullscreen !== true) {
					$gallery_div .= "
						fullScreen: " . json_encode($fullscreen) . ",";
				}

				if ($shareimg !== true) {
					$gallery_div .= "
						share: " . json_encode($shareimg) . ",";
				} else {
					// Include social media share options only if enabled
					if ($facebook !== 1) {
						$gallery_div .= "
						facebook: " . esc_js($facebook) . ",";
					}
				
					if ($linkedin !== 1) {
						$gallery_div .= "
						linkedin: " . esc_js($linkedin) . ",";
					}
				
					if ($twitter !== 1) {
						$gallery_div .= "
						twitter: " . esc_js($twitter) . ",";
					}
				
					if ($pinterest !== 1) {
						$gallery_div .= "
						pinterest: " . esc_js($pinterest) . ",";
					}
				}

				if ($thumbnails !== true) {
					$gallery_div .= "
						thumbnail: " . json_encode($thumbnails) . ",";
				}
				
				if ($videomax_width !== '855px') {
					$gallery_div .= "
						videoMaxWidth: '" . esc_js($videomax_width) . "',";
				}

				// Finalize the configuration
				$gallery_div .= "
						currentPagerPosition: 'left'
					});
				});";

			// Process 'lightcase' gallery-specific options
			} elseif($gallery == 'lightcase') {
				// Get specific 'lightcase' gallery options
				$gallery_lightcs = get_option(sanitize_text_field($gallery_name . '_lightcs'));

				// Process each option with validation and defaults
				$lc_effect = isset($gallery_lightcs['lctrn']) && $gallery_lightcs['lctrn'] != '' 
					? sanitize_text_field($gallery_lightcs['lctrn']) 
					: 'fade';

				$lc_maxwidth = isset($gallery_lightcs['lmaxw']) && $gallery_lightcs['lmaxw'] != '' 
					? absint($gallery_lightcs['lmaxw']) 
					: 800;

				$lc_maxheight = isset($gallery_lightcs['lmaxh']) && $gallery_lightcs['lmaxh'] != '' 
					? absint($gallery_lightcs['lmaxh']) 
					: 500;

				$lc_title = isset($gallery_lightcs['lcttl']) && $gallery_lightcs['lcttl'] != '' 
					? filter_var($gallery_lightcs['lcttl'], FILTER_VALIDATE_BOOLEAN) 
					: true;

				$lc_desc = isset($gallery_lightcs['lcdsc']) && $gallery_lightcs['lcdsc'] != '' 
					? filter_var($gallery_lightcs['lcdsc'], FILTER_VALIDATE_BOOLEAN) 
					: true;

				$lc_seqinfo = isset($gallery_lightcs['sinfo']) && $gallery_lightcs['sinfo'] != '' 
					? filter_var($gallery_lightcs['sinfo'], FILTER_VALIDATE_BOOLEAN) 
					: true;

				$lc_iframe = isset($gallery_lightcs['lcfrm']) && $gallery_lightcs['lcfrm'] != '' 
					? filter_var($gallery_lightcs['lcfrm'], FILTER_VALIDATE_BOOLEAN) 
					: false;

				$frame_width = isset($gallery_lightcs['fwdth']) && $gallery_lightcs['fwdth'] != '' 
					? absint($gallery_lightcs['fwdth']) 
					: 800;

				$frame_height = isset($gallery_lightcs['fhigh']) && $gallery_lightcs['fhigh'] != '' 
					? absint($gallery_lightcs['fhigh']) 
					: 500;

				$lc_voption = isset($gallery_lightcs['lvopt']) && $gallery_lightcs['lvopt'] != '' 
					? filter_var($gallery_lightcs['lvopt'], FILTER_VALIDATE_BOOLEAN) 
					: false;

				$lc_vwidth = isset($gallery_lightcs['lvwdh']) && $gallery_lightcs['lvwdh'] != '' 
					? absint($gallery_lightcs['lvwdh']) 
					: 400;

				$lc_vheight = isset($gallery_lightcs['lvhgt']) && $gallery_lightcs['lvhgt'] != '' 
					? absint($gallery_lightcs['lvhgt']) 
					: 225;

				// Initialize the gallery div with the lightcase configuration
				$gallery_div = "
				jQuery(document).ready(function($) {
					$('#arpGallery" . esc_js($id) . " li[data-rel^=lightcase]').lightcase({";

				// Add configurations conditionally based on validated values
				if ($lc_effect !== 'none') {
					$gallery_div .= "
						transition: '" . esc_js($lc_effect) . "',";
				}
			
				if ($lc_maxwidth !== 800) {
					$gallery_div .= "
						maxWidth: " . esc_js($lc_maxwidth) . ",";
				}
			
				if ($lc_maxheight !== 500) {
					$gallery_div .= "
						maxHeight: " . esc_js($lc_maxheight) . ",";
				}
			
				if ($lc_title !== 'true') {
					$gallery_div .= "
						showTitle: " . json_encode($lc_title) . ",";
				}
			
				if ($lc_desc !== 'true') {
					$gallery_div .= "
						showCaption: " . json_encode($lc_desc) . ",";
				}
			
				if ($lc_seqinfo !== 'true') {
					$gallery_div .= "
						showSequenceInfo: " . json_encode($lc_seqinfo) . ",";
				}
			
				if ($lc_iframe !== 'false') {
					$gallery_div .= "
						iframe: {
							width: " . esc_js($frame_width) . ",
							height: " . esc_js($frame_height) . ",
						},";
				}
			
				if ($lc_voption !== 'false') {
					$gallery_div .= "
						video: {
							width: " . esc_js($lc_vwidth) . ",
							height: " . esc_js($lc_vheight) . ",
						}";
				}
			
				// Finalize the gallery configuration
				$gallery_div .= "
					});
				});";

			// Process 'jgallery' gallery-specific options
			} else {
				// Get specific 'jgallery' gallery options
				$gallery_jgalery = get_option(sanitize_text_field($gallery_name . '_jgalery'));

				// Set default values with validation
				$jg_transition = isset($gallery_jgalery['jgtrn']) && $gallery_jgalery['jgtrn'] !== '' 
					? esc_js($gallery_jgalery['jgtrn']) 
					: 'moveToLeft_moveFromRight';
			
				$tran_interval = isset($gallery_jgalery['trivl']) && is_numeric($gallery_jgalery['trivl']) 
					? esc_js($gallery_jgalery['trivl'] / 10 . 's') 
					: '0.7s';
			
				$max_mobile = isset($gallery_jgalery['maxmb']) && is_numeric($gallery_jgalery['maxmb']) 
					? intval($gallery_jgalery['maxmb']) 
					: 767;
			
				$can_close = isset($gallery_jgalery['close']) && $gallery_jgalery['close'] !== '' 
					? esc_js($gallery_jgalery['close']) 
					: 'true';
			
				$can_zoom = isset($gallery_jgalery['czoom']) && $gallery_jgalery['czoom'] !== '' 
					? esc_js($gallery_jgalery['czoom']) 
					: 'true';
			
				$show_title = isset($gallery_jgalery['imttl']) && $gallery_jgalery['imttl'] !== '' 
					? esc_js($gallery_jgalery['imttl']) 
					: 'true';
			
				$jg_thumbnail = isset($gallery_jgalery['jthum']) && $gallery_jgalery['jthum'] !== '' 
					? esc_js($gallery_jgalery['jthum']) 
					: 'true';
			
				$mobile_thumb = isset($gallery_jgalery['mobth']) && $gallery_jgalery['mobth'] !== '' 
					? esc_js($gallery_jgalery['mobth']) 
					: 'true';
			
				$thumb_position = isset($gallery_jgalery['thpos']) && $gallery_jgalery['thpos'] !== '' 
					? esc_js($gallery_jgalery['thpos']) 
					: 'bottom';

				// Initialize the gallery configuration script
				$gallery_div = "
				jQuery(document).ready(function($) {
					$('#arpGallery" . esc_js($id) . "').jGallery({";

				// Add configurations based on validated and sanitized values
				if ($jg_transition !== 'moveToLeft_moveFromRight') {
					$gallery_div .= "
						transition: '$jg_transition',";
				}

				if ($tran_interval !== '0.7s') {
					$gallery_div .= "
						transitionDuration: '$tran_interval',";
				}

				if ($max_mobile !== 767) {
					$gallery_div .= "
						maxMobileWidth: $max_mobile,";
				}

				if ($can_close !== 'false') {
					$gallery_div .= "
						canClose: $can_close,";
				}

				if ($can_zoom !== 'true') {
					$gallery_div .= "
						canZoom: $can_zoom,";
				}

				if ($show_title !== 'true') {
					$gallery_div .= "
						title: $show_title,";
				}

				if ($jg_thumbnail !== 'true') {
					$gallery_div .= "
						thumbnails: $jg_thumbnail,";
				}

				if ($mobile_thumb !== 'true') {
					$gallery_div .= "
						thumbnailsHideOnMobile: $mobile_thumb,";
				}

				if ($thumb_position !== 'bottom') {
					$gallery_div .= "
						thumbnailsPosition: '$thumb_position',";
				}

				// Close the configuration and script
				$gallery_div .= "
					});
				});";
			}

			// Return the generated gallery script
			return $gallery_div;
		}
	}
}
