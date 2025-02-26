<?php
/**
 * Class AWRPG_Handle_Options
 *
 * This class is responsible for handling and rendering gallery options 
 * for the Awesome Responsive Photo Gallery plugin.
 * 
 * Main Features:
 * - Dynamically generates CSS for various gallery layouts and configurations.
 * - Supports customization of margins, borders, shadow effects, and overlay colors.
 * - Applies CSS rules conditionally based on user-defined settings.
 * 
 * Key Methods:
 * - Constructor: Initializes the class and sets default values.
 * - generate_css: Generates and returns dynamic CSS based on user-provided settings.
 * 
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('AWRPG_Handle_Options')) {
    class AWRPG_Handle_Options {

		private $awrpg_init;

        public function __construct() {
        }

		/**
		 * Convert hex color to rgba format with optional opacity.
		 *
		 * @param string $color   Hex color code.
		 * @param int    $opacity Opacity value (0 to 100).
		 *
		 * @return string RGBA color string.
		 */
		function awrpg_hex2rgba($color, $opacity = false) {
			$default = 'rgb(0, 0, 0)';

			//Return default if no color provided
			if ( empty( $color ) ) {
				return $default;
			}

			//Sanitize $color if "#" is provided
			if ( $color[0] === '#' ) {
				$color = substr( $color, 1 );
			}

			//Check if color has 6 or 3 characters and get values
			if ( strlen($color) == 6 ) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
				return $default;
			}

			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);

			//Check if opacity is set(rgba or rgb)
			if ( $opacity !== false ) {
				$opacity = abs($opacity) / 100;
			
				$opacity = max(0, min(1, $opacity)); // Ensure opacity is within valid range

				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgba('.implode(",",$rgb).', 0)';
			}

			//Return rgb(a) color string
			return $output;
		}

		public function awrpg_process_option($id, $gallery_name, $gallery, $size) {
			// Sanitize $id using absint to ensure it is an integer
			$id = isset( $id ) ? absint( $id ) : 1;

			// Get the gallery options stored in the database
			$gallery_options = get_option($gallery_name . '_options', array());

			// Validate and sanitize text field
			$hover_effect = isset($gallery_options['hveft']) && $gallery_options['hveft'] != '' ? sanitize_text_field($gallery_options['hveft']) : 'none';
			$overlay_effect = isset($gallery_options['oveft']) && $gallery_options['oveft'] != '' ? sanitize_text_field($gallery_options['oveft']) : 'none';
			$border_style = isset($gallery_options['brsle']) && $gallery_options['brsle'] != '' ? sanitize_text_field($gallery_options['brsle']) : 'none';
			$thumb_shadow = isset($gallery_options['shade']) && $gallery_options['shade'] != '' ? sanitize_text_field($gallery_options['shade']) : 'false';

			// Validate and sanitize number field
			$container = isset($gallery_options['cwdth']) && $gallery_options['cwdth'] != '' ? absint($gallery_options['cwdth']) . '%' : '100%';
			$top_space = isset($gallery_options['tpspc']) && $gallery_options['tpspc'] != '' ? absint($gallery_options['tpspc']) . 'px' : '0px';
			$bottom_space = isset($gallery_options['btspc']) && $gallery_options['btspc'] != '' ? absint($gallery_options['btspc']) . 'px' : '0px';
			$margin = isset($gallery_options['mrgin']) && $gallery_options['mrgin'] != '' ? absint($gallery_options['mrgin']) . 'px' : '0';
			$border_width = isset($gallery_options['brwdh']) && $gallery_options['brwdh'] != '' ? absint($gallery_options['brwdh']) . 'px' : '1px';
			$shadow_length = isset($gallery_options['shlen']) && $gallery_options['shlen'] != '' ? absint($gallery_options['shlen']) . 'px' : '0';
			$blur_radius = isset($gallery_options['blrad']) && $gallery_options['blrad'] != '' ? absint($gallery_options['blrad']) . 'px' : '0';
			$spread_radius = isset($gallery_options['sprad']) && $gallery_options['sprad'] != '' ? absint($gallery_options['sprad']) . 'px' : '0';
			$thumb_radius = isset($gallery_options['thrad']) && $gallery_options['thrad'] != '' ? absint($gallery_options['thrad']) : 0;

			// Validate and sanitize floating field
			$opacity_caption = isset($gallery_options['opccp']) && $gallery_options['opccp'] != '' ? filter_var($gallery_options['opccp'], FILTER_VALIDATE_FLOAT) : 92;
			$shadow_opacity = isset($gallery_options['shopc']) && $gallery_options['shopc'] != '' ? filter_var($gallery_options['shopc'], FILTER_VALIDATE_FLOAT) : 100;

			// Validate and sanitize hex field
			$thumblay = isset($gallery_options['thlay']) && $gallery_options['thlay'] != '' ? sanitize_hex_color($gallery_options['thlay']) : '#666666';
			$border_color = isset($gallery_options['brclr']) && $gallery_options['brclr'] != '' ? sanitize_hex_color($gallery_options['brclr']) : '#000';
			$shadow_color = isset($gallery_options['shclr']) && $gallery_options['shclr'] != '' ? sanitize_hex_color($gallery_options['shclr']) : '#000';
			$info_bg = isset($gallery_options['infbg']) && $gallery_options['infbg'] != '' ? sanitize_hex_color($gallery_options['infbg']) : '#2c3f52';
			$info_title = isset($gallery_options['inftt']) && $gallery_options['inftt'] != '' ? sanitize_hex_color($gallery_options['inftt']) : '#fff';
			$info_caption = isset($gallery_options['infcp']) && $gallery_options['infcp'] != '' ? sanitize_hex_color($gallery_options['infcp']) : '#fff';

			// Use custom functions to convert to rgba
			$overlay_color = $this->awrpg_hex2rgba($thumblay, 10);
			$box_shadow = $this->awrpg_hex2rgba($shadow_color, $shadow_opacity);
			$caption_opc = $this->awrpg_hex2rgba($info_bg, $opacity_caption);
			$title_border = $this->awrpg_hex2rgba($info_title, 80);

			// Escape margin values before use
			$margin_b = esc_html($margin);
			$margin_r = esc_html($margin);

			// Transition logic based on hover effect
			if ($hover_effect == "slideleft") {
				// Slide-left effect transitions
				$transition = "max-width: none;width: -webkit-calc(100% + 50px);width: calc(100% + 50px);-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;transition: opacity 0.35s, transform 0.35s;-webkit-transform: translate3d(-40px,0, 0);transform: translate3d(-40px,0,0);";
				$transition_hover = "-webkit-transform: translate3d(0,0,0);transform: translate3d(0,0,0);";
			} elseif ($hover_effect == "zoompan") {
				// Zoom and pan effect transitions
				$transition = "-webkit-transition: all 0.4s linear;-moz-transition: all 0.4s linear;-o-transition: all 0.4s linear;-ms-transition: all 0.4s linear;transition: all 0.4s linear";
				$transition_hover = "-webkit-transform: scale(1.1,1.1);-moz-transform: scale(1.1,1.1);-o-transform: scale(1.1,1.1);-ms-transform: scale(1.1,1.1);transform: scale(1.1,1.1)";
			} elseif ($hover_effect == "shrink") {
				// Shrink effect transitions
				$transition = "-webkit-transition: opacity 0.85s, -webkit-transform 0.85s;transition: opacity 0.85s, transform 0.85s;-webkit-transform: scale(1.15);transform: scale(1.15)";
				$transition_hover = "-webkit-transform: scale(1);transform: scale(1)";
			} else {
				// Default transition
				$transition = $transition_hover = "";
			}

			// Overlay effect logic
			if ($overlay_effect == "lefttoright") {
				// Left to right overlay effect
				$figcaption = "right: 50%;left: unset;width: 100%;height: 100%;background: $caption_opc;text-align: center;-ms-filter: 'progid: DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity: 0;opacity: 0;-webkit-transition: all .5s ease;-moz-transition: all .5s ease;-o-transition: all .5s ease;transition: all .5s ease;";
				$figcaption_hover = "background-color: $caption_opc;right: 0;-ms-filter: 'progid: DXImageTransform.Microsoft.Alpha(Opacity=100)';filter: alpha(opacity=100);-moz-opacity: 1;-khtml-opacity: 1;opacity: 1;";
				$imgtitle = "color: $info_title;";
				$imgcap = "color: $info_caption;";
				$imgtitle_hover = $imgdetails = $imgdetails_hover = $imgcap_hover = "";
			} elseif ($overlay_effect == "fadeinmid") {
				// Fade-in middle overlay effect
				$figcaption = "width: 100%;height: 100%;background-color: $caption_opc;-webkit-transition: all 0.5s linear;-moz-transition: all 0.5s linear;-o-transition: all 0.5s linear;-ms-transition: all 0.5s linear;transition: all 0.5s linear;-ms-filter: 'progid: DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);opacity: 0;";
				$figcaption_hover = "-ms-filter: 'progid: DXImageTransform.Microsoft.Alpha(Opacity=100)';filter: alpha(opacity=100);opacity: 1;";
				$imgtitle = "color: $info_title;border-bottom: 1px solid $title_border;background: transparent;margin: 0 15px;-webkit-transform: scale(0);-moz-transform: scale(0);-o-transform: scale(0);-ms-transform: scale(0);transform: scale(0);-ms-filter: 'progid: DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);opacity: 0;";
				$imgtitle_hover = "";
				$imgdetails = "text-align: center;-webkit-transition: all 0.5s linear;-moz-transition: all 0.5s linear;-o-transition: all 0.5s linear;-ms-transition: all 0.5s linear;transition: all 0.5s linear;";
				$imgdetails_hover = "-webkit-transform: scale(1);-moz-transform: scale(1);-o-transform: scale(1);-ms-transform: scale(1);transform: scale(1);-ms-filter: 'progid: DXImageTransform.Microsoft.Alpha(Opacity=100)';filter: alpha(opacity=100);opacity: 1;";
				$imgcap = "color: $info_caption;-ms-filter: 'progid: DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);opacity: 0;-webkit-transform: scale(0);-moz-transform: scale(0);-o-transform: scale(0);-ms-transform: scale(0);transform: scale(0);";
				$imgcap_hover = "";
			} elseif ($overlay_effect == "capfadeleft") {
				// Caption fade left overlay effect
				$figcaption = "width: 100%;height: 100%;";
				$figcaption_hover = "background-color: $caption_opc;";
				$imgtitle = "color: $info_title;position: absolute;right: 0;bottom: 0;padding: 1em 1.2em;";
				$imgtitle_hover = $imgdetails = $imgdetails_hover = "";
				$imgcap = "color: $info_caption;padding: 15px;width: 50%;border-right: 1px solid #fff;text-align: right;opacity: 0;-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;transition: opacity 0.35s, transform 0.35s;-webkit-transform: translate3d(-40px,0,0);transform: translate3d(-40px,0,0);";
				$imgcap_hover = "opacity: 1;-webkit-transform: translate3d(0,0,0);transform: translate3d(0,0,0);";
			} else {
				// Default case for no overlay effect
				$figcaption = $figcaption_hover = $imgtitle = $imgtitle_hover = $imgdetails = $imgdetails_hover = $imgcap = $imgcap_hover = "display:none;";
			}

			// Check if the gallery is not 'jgallery'
			if ($gallery !== 'jgallery') {
				// Start building the gallery CSS
				$gallery_div = "#arpGallery$id { width: " . esc_attr($container) . "; margin: 0 auto; }" . PHP_EOL;
			
				// Add top and bottom margins if specified
				if ($top_space !== '0px' || $bottom_space !== '0px') {
					$gallery_div .= "#arpGallery$id {" . PHP_EOL;
					if ($top_space !== '0px') {
						$gallery_div .= "    margin-top: " . esc_attr($top_space) . " !important;" . PHP_EOL;
					}
					if ($bottom_space !== '0px') {
						$gallery_div .= "    margin-bottom: " . esc_attr($bottom_space) . " !important;" . PHP_EOL;
					}
					$gallery_div .= "}" . PHP_EOL;
				}

				// If the size is custom, add specific styles
				if ($size === 'custom') {
					$gallery_div .= "#arpGallery$id > li .awesome-gallery-poster, #arpGallery$id > li .awesome-video-poster {" . PHP_EOL;
					$gallery_div .= "    background-color: " . esc_attr($overlay_color) . ";" . PHP_EOL;
					$gallery_div .= "}" . PHP_EOL;
					$gallery_div .= "#arpGallery$id > li {" . PHP_EOL;

					// Add border styles if set
					if ($border_style !== 'none') {
						$gallery_div .= "    border: " . esc_attr($border_width) . " " . esc_attr($border_style) . " " . esc_attr($border_color) . ";" . PHP_EOL;
					}

					// Add border-radius if specified
					if ($thumb_radius != 0) {
						$gallery_div .= "    -moz-border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
						$gallery_div .= "    -webkit-border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
						$gallery_div .= "    border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
					}

					// Add margin and box shadow if enabled
					$gallery_div .= "    margin: 0 " . esc_attr($margin) . " " . esc_attr($margin_b) . " 0;" . PHP_EOL;
					if ($thumb_shadow === 'true') {
						$gallery_div .= "    -webkit-box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
						$gallery_div .= "    -moz-box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
						$gallery_div .= "    box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
					}
					$gallery_div .= "}" . PHP_EOL;

					// Add transition effects
					$gallery_div .= "#arpGallery$id > li img.ag-thumbnail { " . esc_attr($transition) . " }" . PHP_EOL;
					$gallery_div .= "#arpGallery$id > li:hover > img.ag-thumbnail { " . esc_attr($transition_hover) . " }" . PHP_EOL;

					// Add figcaption styles if specified
					if ($figcaption !== '') {
						$gallery_div .= "#arpGallery$id > li .awesome-gallery-poster > figcaption," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li .awesome-video-poster > figcaption { " . esc_attr($figcaption) . " }" . PHP_EOL;
					}
					if ($figcaption_hover !== '') {
						$gallery_div .= "#arpGallery$id > li:hover .awesome-gallery-poster > figcaption," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li:hover .awesome-video-poster > figcaption { " . esc_attr($figcaption_hover) . " }" . PHP_EOL;
					}

					// Add image details styles if specified
					if ($imgdetails !== '') {
						$gallery_div .= "#arpGallery$id > li .awesome-gallery-poster > figcaption h2," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li .awesome-video-poster > figcaption h2," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li .awesome-gallery-poster > figcaption p," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li .awesome-video-poster > figcaption p { " . esc_attr($imgdetails) . " }" . PHP_EOL;
					}
					if ($imgdetails_hover !== '') {
						$gallery_div .= "#arpGallery$id > li:hover .awesome-gallery-poster > figcaption h2," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li:hover .awesome-video-poster > figcaption h2," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li:hover .awesome-gallery-poster > figcaption p," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li:hover .awesome-video-poster > figcaption p { " . esc_attr($imgdetails_hover) . " }" . PHP_EOL;
					}

					// Add image title styles
					$gallery_div .= "#arpGallery$id > li .awesome-gallery-poster > figcaption h2," . PHP_EOL;
					$gallery_div .= "#arpGallery$id > li .awesome-video-poster > figcaption h2 { " . esc_attr($imgtitle) . " }" . PHP_EOL;
					if ($imgtitle_hover !== '') {
						$gallery_div .= "#arpGallery$id > li:hover .awesome-gallery-poster > figcaption h2," . PHP_EOL;
						$gallery_div .= "#arpGallery$id > li:hover .awesome-video-poster > figcaption h2 { " . esc_attr($imgtitle_hover) . " }" . PHP_EOL;
					}
			
					// Add image caption styles
					$gallery_div .= "#arpGallery$id > li .awesome-gallery-poster > figcaption p," . PHP_EOL;
					$gallery_div .= "#arpGallery$id > li .awesome-video-poster > figcaption p { " . esc_attr($imgcap) . " }" . PHP_EOL;
					$gallery_div .= "#arpGallery$id > li:hover .awesome-gallery-poster > figcaption p," . PHP_EOL;
					$gallery_div .= "#arpGallery$id > li:hover .awesome-video-poster > figcaption p { " . esc_attr($imgcap_hover) . " }" . PHP_EOL;
				} else {
					$gallery_div .= esc_html("
						#arpGallery" . esc_attr($id) . " > .awesome-gallery, 
						#arpGallery" . esc_attr($id) . " > .awesome-video {" . PHP_EOL);
				
					// Check and apply border styles
					if (isset($border_style) && $border_style != 'none') {
						$gallery_div .= "border: " . esc_attr($border_width) . " " . esc_attr($border_style) . " " . esc_attr($border_color) . ";" . PHP_EOL;
					}

					// Check and apply border radius
					if (isset($thumb_radius) && $thumb_radius != 0) {
						$gallery_div .= "-moz-border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
						$gallery_div .= "-webkit-border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
						$gallery_div .= "border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
					}
				
					// Apply margins
					$gallery_div .= "margin: 0 " . esc_attr($margin) . " " . esc_attr($margin) . " 0;" . PHP_EOL;
				
					// Apply shadow styles
					if (isset($thumb_shadow) && $thumb_shadow == 'true') {
						$gallery_div .= "-webkit-box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
						$gallery_div .= "-moz-box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
						$gallery_div .= "box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
					}

					// Overlay thumb background color
					if (isset($overlay_color)) {
						$gallery_div .= "}" . PHP_EOL;
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery .overlay_thumb, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video .overlay_thumb { 
										 background-color: " . esc_attr($overlay_color) . ";" . PHP_EOL;
					}
				
					// Apply transitions
					if (isset($transition)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery a > img, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video a > img {" . esc_attr($transition) . ";" . PHP_EOL;
					}
					if (isset($transition_hover)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery:hover a > img, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video:hover a > img {" . esc_attr($transition_hover) . ";" . PHP_EOL;
					}

					// Apply figcaption styles
					if (isset($figcaption)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery > figcaption, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video > figcaption {" . esc_attr($figcaption) . ";" . PHP_EOL;
					}
					if (isset($figcaption_hover)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery:hover > figcaption, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video:hover > figcaption {" . esc_attr($figcaption_hover) . ";" . PHP_EOL;
					}
				
					// Apply image details styles
					if (isset($imgdetails)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery > figcaption h2, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video > figcaption h2, 
										 #arpGallery" . esc_attr($id) . " > .awesome-gallery > figcaption p, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video > figcaption p {" . esc_attr($imgdetails) . ";" . PHP_EOL;
					}

					if (isset($imgdetails_hover)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery:hover > figcaption h2, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video:hover > figcaption h2, 
										 #arpGallery" . esc_attr($id) . " > .awesome-gallery:hover > figcaption p, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video:hover > figcaption p {" . esc_attr($imgdetails_hover) . ";" . PHP_EOL;
					}
				
					// Apply title styles
					if (isset($imgtitle)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery > figcaption h2, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video > figcaption h2 {" . esc_attr($imgtitle) . ";" . PHP_EOL;
					}
					if (isset($imgtitle_hover)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery:hover > figcaption h2, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video:hover > figcaption h2 {" . esc_attr($imgtitle_hover) . ";" . PHP_EOL;
					}

					// Apply caption styles
					if (isset($imgcap)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery > figcaption p, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video > figcaption p {" . esc_attr($imgcap) . ";" . PHP_EOL;
					}
					if (isset($imgcap_hover)) {
						$gallery_div .= "#arpGallery" . esc_attr($id) . " > .awesome-gallery:hover > figcaption p, 
										 #arpGallery" . esc_attr($id) . " > .awesome-video:hover > figcaption p {" . esc_attr($imgcap_hover) . ";" . PHP_EOL;
					}
				}
				$gallery_div .= esc_html(
					";"
				);
			} else {
				// Initialize the gallery div for media queries
				$gallery_div = esc_html(
					"@media (min-width: 991px) {#arpGallery" . esc_attr($id) . "{width:" . esc_attr($container) . ";}}"
				) . PHP_EOL;
			
				// Add top and bottom space styles if set
				if (isset($top_space) && $top_space !== '0px' || isset($bottom_space) && $bottom_space !== '0px') {
					$gallery_div .= "#arpGallery" . esc_attr($id) . "{" . PHP_EOL;
					if (isset($top_space) && $top_space !== '0px') {
						$gallery_div .= "margin-top: " . esc_attr($top_space) . ";" . PHP_EOL;
					}
					if (isset($bottom_space) && $bottom_space !== '0px') {
						$gallery_div .= "margin-bottom: " . esc_attr($bottom_space) . ";" . PHP_EOL;
					}
					$gallery_div .= "}" . PHP_EOL;
				}

				// Add anchor styles
				$gallery_div .= "#arpGallery" . esc_attr($id) . " > a {" . PHP_EOL;
				if (isset($border_style) && $border_style !== 'none') {
					$gallery_div .= "border: " . esc_attr($border_width) . " " . esc_attr($border_style) . " " . esc_attr($border_color) . ";" . PHP_EOL;
				}
				if (isset($thumb_radius) && $thumb_radius != 0) {
					$gallery_div .= "-moz-border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
					$gallery_div .= "-webkit-border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
					$gallery_div .= "border-radius: " . esc_attr($thumb_radius) . "%;" . PHP_EOL;
				}
				$gallery_div .= "margin: 0 " . esc_attr($margin_r) . " " . esc_attr($margin_b) . " 0;" . PHP_EOL;
			
				// Add shadow styles if enabled
				if (isset($thumb_shadow) && $thumb_shadow === 'true') {
					$gallery_div .= "-webkit-box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
					$gallery_div .= "-moz-box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
					$gallery_div .= "box-shadow: " . esc_attr($shadow_length) . " " . esc_attr($shadow_length) . " " . esc_attr($blur_radius) . " " . esc_attr($spread_radius) . " " . esc_attr($box_shadow) . ";" . PHP_EOL;
				}
				$gallery_div .= "}" . PHP_EOL;

				// Add overlay color styles
				$gallery_div .= "#arpGallery" . esc_attr($id) . " > a .awesome-gallery-poster {background-color: " . esc_attr($overlay_color) . ";}" . PHP_EOL;
			
				// Add thumbnail transition styles
				$gallery_div .= "#arpGallery" . esc_attr($id) . " > a img.ag-thumbnail { " . esc_html($transition) . "}" . PHP_EOL;
				$gallery_div .= "#arpGallery" . esc_attr($id) . " > a:hover > img.ag-thumbnail { " . esc_html($transition_hover) . "}" . PHP_EOL;
			
				// Add figcaption styles if set
				if (isset($figcaption) && $figcaption !== '') {
					$gallery_div .= "#arpGallery" . esc_attr($id) . " > a .awesome-gallery-poster > figcaption { " . esc_html($figcaption) . "}" . PHP_EOL;
				}
				if (isset($figcaption_hover) && $figcaption_hover !== '') {
					$gallery_div .= "#arpGallery" . esc_attr($id) . " > a:hover .awesome-gallery-poster > figcaption { " . esc_html($figcaption_hover) . "}" . PHP_EOL;
				}

				// Add image details styles if set
				if (isset($imgdetails) && $imgdetails !== '') {
					$gallery_div .= "#arpGallery" . esc_attr($id) . " > a .awesome-gallery-poster > figcaption h2," . PHP_EOL;
					$gallery_div .= "#arpGallery" . esc_attr($id) . " > a .awesome-gallery-poster > figcaption p { " . esc_html($imgdetails) . "}" . PHP_EOL;
				}
				if (isset($imgdetails_hover) && $imgdetails_hover !== '') {
					$gallery_div .= "#arpGallery" . esc_attr($id) . " > a:hover .awesome-gallery-poster > figcaption h2," . PHP_EOL;
					$gallery_div .= "#arpGallery" . esc_attr($id) . " > a:hover .awesome-gallery-poster > figcaption p { " . esc_html($imgdetails_hover) . "}" . PHP_EOL;
				}
			
				// Add image title styles
				$gallery_div .= "#arpGallery" . esc_attr($id) . " > a .awesome-gallery-poster > figcaption h2 { " . esc_html($imgtitle) . "}" . PHP_EOL;
				if (isset($imgtitle_hover) && $imgtitle_hover !== '') {
					$gallery_div .= "#arpGallery" . esc_attr($id) . " > a:hover .awesome-gallery-poster > figcaption h2 { " . esc_html($imgtitle_hover) . "}" . PHP_EOL;
				}
			
				// Add image caption styles
				$gallery_div .= "#arpGallery" . esc_attr($id) . " > a .awesome-gallery-poster > figcaption p { " . esc_html($imgcap) . "}" . PHP_EOL;
				$gallery_div .= "#arpGallery" . esc_attr($id) . " > a:hover .awesome-gallery-poster > figcaption p { " . esc_html($imgcap_hover) . "}" . PHP_EOL;
			}

			return $gallery_div;
		}
	}
}

new AWRPG_Handle_Options();