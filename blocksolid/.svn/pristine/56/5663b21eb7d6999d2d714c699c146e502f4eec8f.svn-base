<?php

global $blocksolid_minimum_wordpress_version;

$blocksolid_minimum_wordpress_version = 5.5;

$blocksolid_options = get_option( 'blocksolid_options' );

// ---------------------------------------------------------------------------------------------------------------------------------------------

function blocksolid_enqueue_settings_scripts($hook) {
    if(is_admin()){
		// Also works with "add_editor_style" instead of "wp_enqueue_style"
		wp_enqueue_style( 'blocksolid-settings-styles', plugins_url( '/css/blocksolid-settings-styles.css', __FILE__ ), '', filemtime(plugin_dir_path(__FILE__).'css/blocksolid-settings-styles.css'));
		wp_register_script( 'blocksolid-settings',
			plugins_url( '/js/blocksolid-settings.js', __FILE__ ),
			array('jquery'),
			filemtime(plugin_dir_path(__FILE__).'js/blocksolid-settings.js'),
			true
		);
	    wp_enqueue_script('blocksolid-settings');
	}
}
if(is_admin()){
	add_action( 'admin_enqueue_scripts', 'blocksolid_enqueue_settings_scripts' );
	//add_action('enqueue_block_assets', 'blocksolid_enqueue_settings_scripts');
}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Block Editor Overlay

function blocksolid_check_size_units($size){
	if ($size != ""){

		$float_check = preg_match_all('!\d+(?:\.\d+)?!', $size, $matches);
		$bare_float = array_map('floatval', $matches[0]);

		if (is_array($bare_float)){
			$bare_float = $bare_float[0];
		}

		if (strpos($size, '%') !== false) {
			return($bare_float.'vw'); // Change % to vw
		}elseif (strpos($size, 'vw') !== false) {
			return($bare_float.'vw');
		}else{
			return($bare_float.'px');
		}
	}else{
		return(false);	// No value
	}
}

// Overlay

add_theme_support( 'wp-block-styles' );
add_theme_support( 'align-wide' );
add_theme_support( 'responsive-embeds' );

function blocksolid_admin_styles() {
    wp_enqueue_style( 'blocksolid-admin-styles', plugins_url( '/css/blocksolid-admin-styles.css', __FILE__ ), '', filemtime(plugin_dir_path(__FILE__).'css/blocksolid-admin-styles.css'));
    global $wp_version;
    if ( (version_compare( floatval($wp_version), 6.0, '>=' ) )) {
        wp_enqueue_style( 'blocksolid-admin-styles-6', plugins_url( '/css/blocksolid-admin-styles-6.css', __FILE__ ), '', filemtime(plugin_dir_path(__FILE__).'css/blocksolid-admin-styles-6.css'));
    }

}
//add_action('admin_enqueue_scripts', 'blocksolid_admin_styles');
if(is_admin()){
	add_action('enqueue_block_assets', 'blocksolid_admin_styles');
}

// Load some more CSS to make the editor easier to use
add_action('admin_head', 'blocksolid_admin_styles_embed');
function blocksolid_admin_styles_embed() {

$block_admin_styles = '<style>';
$block_admin_styles .= '';

$blocksolid_options = get_option( 'blocksolid_options' );

if (is_array($blocksolid_options)){
    if (count($blocksolid_options)){
        if (isset($blocksolid_options['blocksolid_field_main_column_width'])){
        	if ($blocksolid_options['blocksolid_field_main_column_width'] > 1){
        		global $wp_version;
        		if ( (version_compare( floatval($wp_version), 5.8, '>=' ) )) {
        			$block_admin_styles .= 'body.blocksolid-overlay .editor-styles-wrapper .edit-post-visual-editor__post-title-wrapper > [data-align="wide"], .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > [data-align="wide"]{max-width: '.blocksolid_check_size_units($blocksolid_options['blocksolid_field_main_column_width']).'!important;}';
        		}else{
        			$block_admin_styles .= 'body.blocksolid-overlay .wp-block-columns.block-editor-block-list__block.wp-block.block-editor-block-list__layout{max-width: '.blocksolid_check_size_units($blocksolid_options['blocksolid_field_main_column_width']).'!important;}';
        		}
        	}
        }
    }
}

$block_admin_styles .= '</style>';

echo $block_admin_styles;
}

// Default Website Setup

add_action( 'wp_enqueue_scripts', 'blocksolid_enqueue' );
function blocksolid_enqueue() {
    wp_enqueue_style( 'blocksolid', plugins_url( '/css/blocksolid.css', __FILE__ ), '', filemtime(plugin_dir_path(__FILE__).'css/blocksolid.css'));
    wp_register_script( 'blocksolid_document_ready',
    plugins_url( '/js/document_ready.js', __FILE__ ),
    array('jquery'),
    filemtime(plugin_dir_path(__FILE__).'js/document_ready.js'),
    true
    );
    wp_enqueue_script('blocksolid_document_ready');
}



// ---------------------------------------------------------------------------------------------------------------------------------------------

// Background Images

if (isset($blocksolid_options['blocksolid_field_allow_background_images'])){

    add_action( 'wp_enqueue_scripts', 'blocksolid_enqueue_backgrounds' );
    function blocksolid_enqueue_backgrounds() {
        wp_register_script( 'blocksolid_document_ready_backgrounds',
            plugins_url( '/js/document_ready_backgrounds.js', __FILE__ ),
            array('jquery'),
            filemtime(plugin_dir_path(__FILE__).'js/document_ready_backgrounds.js'),
            true
        );
        wp_enqueue_script('blocksolid_document_ready_backgrounds');
    }

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Stretched Row Backgrounds

if (isset($blocksolid_options['blocksolid_field_allow_stretched_rows'])){

	if ($blocksolid_options['blocksolid_field_main_column_width'] > 1){

	    add_action( 'wp_enqueue_scripts', 'blocksolid_enqueue_stretched_rows' );
	    function blocksolid_enqueue_stretched_rows() {
	        wp_register_script( 'blocksolid_document_ready_stretched_rows',
	            plugins_url( '/js/document_ready_stretch_row.js', __FILE__ ),
	            array('jquery'),
	            filemtime(plugin_dir_path(__FILE__).'js/document_ready_stretch_row.js'),
	            true
	        );
	        wp_enqueue_script('blocksolid_document_ready_stretched_rows');
	    }

	}

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Colors

if (isset($blocksolid_options['blocksolid_field_allow_palette_control'])){

    add_action('admin_init', 'blocksolid_admin_blocksolid_color_styles');
	function blocksolid_admin_blocksolid_color_styles() {

        $theme_support_array = blocksolid_get_admin_and_website_blocksolid_styles();

        add_theme_support( 'editor-color-palette', $theme_support_array['colors']);

		// Color picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
		wp_enqueue_script( 'blocksolid-color-picker', plugins_url('/js/blocksolid-color-picker.js', __FILE__), array('jquery'), '', true );
		wp_enqueue_script( 'blocksolid-color-matcher', plugins_url('/js/blocksolid-color-matcher.js', __FILE__), array('jquery'), '', true );

		$blocksolid_output_admin_blocksolid_color_styles = blocksolid_output_admin_blocksolid_color_styles();

    }

    add_action( 'admin_head', 'blocksolid_admin_class_blocksolid_color_styles' );
    function blocksolid_admin_class_blocksolid_color_styles() {
        $inline_style_admin = blocksolid_output_admin_blocksolid_color_styles();
        echo $inline_style_admin;
    }

    function blocksolid_get_classes_list(){
        $blocksolid_options = get_option( 'blocksolid_options' );
        $classes_list = false;
        if (isset($blocksolid_options['blocksolid_field_classes_list'])){
            if ($blocksolid_options['blocksolid_field_classes_list'] != "" ){
                $classes_list = explode(' ',$blocksolid_options['blocksolid_field_classes_list']);
            }
        }
        return $classes_list;
    }

	function blocksolid_output_admin_blocksolid_color_styles(){

		$blocksolid_options = get_option( 'blocksolid_options' );
        $inline_style_admin = "";
        $inline_style_admin .= "<style>".PHP_EOL;
        $inline_style_admin .= '

		/*  */
		body.blocksolid-overlay .block-editor-block-list__block.wp-block.wp-block-image.alignfull > div {
			max-width: none;
		}

		/*  */
		body.blocksolid-overlay .editor-post-featured-image__preview .components-responsive-wrapper__content {
		    max-height: auto;
		    margin: 0 auto;
			object-fit: cover;
			height: auto;
		    width: 100%;
		}

		/* Defaults for rows/cols without a row- class */
		body.blocksolid-overlay .wp-block-column:not([class*="row-"]),
		body.blocksolid-overlay .wp-block-columns:not([class*="row-"]){
			background-color: transparent;
		}

		/* Defaults for rows at highest level without a row- class */
		body.blocksolid-overlay .wp-block-post-content > .wp-block-columns:not([class*="row-"]) {
			background-color: #f7f7f7;
		}

		/* This sorts background colour of images */
		body.blocksolid-overlay .wp-block-column:not([class*="row-"]) figure.wp-block-image,
		body.blocksolid-overlay .wp-block-columns:not([class*="row-"]) figure.wp-block-image {
			background-color: transparent;
		}
		';

    	// - Color Settings
        $classes_list = blocksolid_get_classes_list();

        if (is_array($classes_list)){

            if (count($classes_list)){

                $found_colors = blocksolid_get_color_scheme();

                foreach ($classes_list as $class) {

                    if (isset($blocksolid_options['blocksolid_field_color_assignment_rows_columns_'.$class])){

                        // Rows and Columns
                        if ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_'.$class] != ""){

                        	$color_id = $blocksolid_options['blocksolid_field_color_assignment_rows_columns_'.$class];
                        	//$color_name = $found_colors[$color_id]['name'];
                        	$color_slug = $found_colors[$color_id]['slug'];
                        	$color_hex  = $found_colors[$color_id]['color'];
                        	$color_rgb_vals = list($r, $g, $b) = sscanf($color_hex, "#%02x%02x%02x");

                            $opacity_one_hundred = true;
                            // Opacity check
                            if (isset($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class])){
	                            if ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class] != ""){
	                                if ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class] != "100"){
	                                    if (is_numeric($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class])){
	                                        $opacity_one_hundred = false;
	                                        $opacity = ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class] / 100);
	                                    }
	                                }
	                            }
                            }

                            if ($opacity_one_hundred){
                                $back_col = 'var(--wp--preset--color--'.$color_slug.')';
                                $back_col_margins = 'rgba('.$r.', '.$g.', '.$b.', 0.9)';
                            }else{
                                $margins_opacity = $opacity - 0.1;
                                if ($margins_opacity <= 0){
                                    $margins_opacity = 0.1;
                                }
                                $back_col         = 'rgba('.$r.', '.$g.', '.$b.', '.$opacity.')';
                                $back_col_margins = 'rgba('.$r.', '.$g.', '.$b.', '.$margins_opacity.')';
                            }

	        $inline_style_admin .= '
body.blocksolid-overlay .wp-block-columns > .wp-block-column.'.$class.',
body.blocksolid-overlay .wp-block-columns.block-editor-block-list__block.'.$class.' {
	background-color: '.$back_col.';
}
body.blocksolid-overlay .wp-block-columns.'.$class.'.stretch-row {
	box-shadow: 100px 0 0 0 '.$back_col_margins.', -100px 0 0 0 '.$back_col_margins.';
}';
								}

								// Text
								if($blocksolid_options['blocksolid_field_color_assignment_text_'.$class] != ""){

									$color_id = $blocksolid_options['blocksolid_field_color_assignment_text_'.$class];
									//$color_name = $found_colors[$color_id]['name'];
									$color_slug = $found_colors[$color_id]['slug'];
									//$color_hex  = $found_colors[$color_id]['color'];

	        $inline_style_admin .= '
body.blocksolid-overlay .wp-block-columns > .wp-block-column.'.$class.',
body.blocksolid-overlay .wp-block-columns.block-editor-block-list__block.'.$class.' {
	color: var(--wp--preset--color--'.$color_slug.');
}';
								}

								// Links
								if($blocksolid_options['blocksolid_field_color_assignment_links_'.$class] != ""){

									$color_id = $blocksolid_options['blocksolid_field_color_assignment_links_'.$class];
									//$color_name = $found_colors[$color_id]['name'];
									$color_slug = $found_colors[$color_id]['slug'];
									//$color_hex  = $found_colors[$color_id]['color'];

	        $inline_style_admin .= '
body.blocksolid-overlay .wp-block-columns > .wp-block-column.'.$class.' .wp-block-freeform .block-library-rich-text__tinymce p a:link,
body.blocksolid-overlay .wp-block-columns > .wp-block-column.'.$class.' .wp-block-freeform .block-library-rich-text__tinymce p a:visited,
body.blocksolid-overlay .wp-block-columns.block-editor-block-list__block.'.$class.' .wp-block-freeform .block-library-rich-text__tinymce p a:link,
body.blocksolid-overlay .wp-block-columns.block-editor-block-list__block.'.$class.' .wp-block-freeform .block-library-rich-text__tinymce p a:visited {
	color: var(--wp--preset--color--'.$color_slug.');
}';
						}
		    		}
                }
            }
        }


        $inline_style_admin .= PHP_EOL."</style>";
        return $inline_style_admin;

	}

    function blocksolid_output_website_blocksolid_color_styles(){

  		$blocksolid_options = get_option( 'blocksolid_options' );

        $theme_support_array = blocksolid_get_admin_and_website_blocksolid_styles();
        $website_block_color_styles = "";
        $website_body_color_styles = "";
        $theme_colors = $theme_support_array['colors'];
        $theme_colors_found = false;
        $theme_options_found = false;

        if (is_array($theme_colors)){
            if (count($theme_colors)){

                $theme_colors_found = true;

                foreach ($theme_colors as $theme){

                    $website_body_color_styles .= '--'.$theme['slug'].': '.$theme['color'].';'.PHP_EOL;
                    $website_block_color_styles .= ':root .has-'.$theme['slug'].'-background-color {background-color: '.$theme['color'].';}';
                    $website_block_color_styles .= ':root .has-'.$theme['slug'].'-color {color: '.$theme['color'].';}';

                }
            }
        }

        $inline_style = "";

        if ($theme_colors_found){
            $inline_style .= "<style>".PHP_EOL;
        }

        if ($theme_colors_found){
       		// Add colors to front-end website body as usuable CSS variables
       		$inline_style .= "body {".PHP_EOL."".$website_body_color_styles."}".PHP_EOL."".$website_block_color_styles."";
        }

/* ---------------------------------------------------------------------------------------------------------------------- */

        // Color Assignments

        $inline_style_color_assignments = "";

    	// - Color Settings
        $classes_list = blocksolid_get_classes_list();

        if (is_array($classes_list)){

            if (count($classes_list)){

                $found_colors = blocksolid_get_color_scheme();

                foreach ($classes_list as $class) {

		            if (isset($blocksolid_options['blocksolid_field_color_assignment_front_end_'.$class])){

			            if (isset($blocksolid_options['blocksolid_field_color_assignment_rows_columns_'.$class])){

            				// Rows and Columns
            				if ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_'.$class] != ""){

            					$color_id = $blocksolid_options['blocksolid_field_color_assignment_rows_columns_'.$class];
            					$color_slug = $found_colors[$color_id]['slug'];

                                $opacity_one_hundred = true;
                                // Opacity check
                                if ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class] != ""){
                                    if ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class] != "100"){
                                        if (is_numeric($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class])){
                                            $opacity_one_hundred = false;
                                            $opacity = ($blocksolid_options['blocksolid_field_color_assignment_rows_columns_opacity_'.$class] / 100);
                                        }
                                    }
                                }

                                if ($opacity_one_hundred){
                                    $back_col = 'var(--'.$color_slug.')';
                                }else{
                                	$color_hex  = $found_colors[$color_id]['color'];
                                	$color_rgb_vals = list($r, $g, $b) = sscanf($color_hex, "#%02x%02x%02x");
                                    $back_col = 'rgba('.$r.', '.$g.', '.$b.', '.$opacity.')';
                                }



    	        $inline_style_color_assignments .= '
.wp-block-columns.'.$class.',
.wp-block-column.'.$class.' {
	background-color: '.$back_col.';
}';
    								}

    								// Text
    								if($blocksolid_options['blocksolid_field_color_assignment_text_'.$class] != ""){

    									$color_id = $blocksolid_options['blocksolid_field_color_assignment_text_'.$class];
    									$color_slug = $found_colors[$color_id]['slug'];

    	        $inline_style_color_assignments .= '
.wp-block-columns.'.$class.',
.wp-block-column.'.$class.' {
	color: var(--'.$color_slug.');
}';
    								}

    								// Links
    								if($blocksolid_options['blocksolid_field_color_assignment_links_'.$class] != ""){

    									$color_id = $blocksolid_options['blocksolid_field_color_assignment_links_'.$class];
    									$color_slug = $found_colors[$color_id]['slug'];

    	        $inline_style_color_assignments .= '
.wp-block-columns.'.$class.' a:link,
.wp-block-columns.'.$class.' a:visited,
.wp-block-column.'.$class.' a:link,
.wp-block-column.'.$class.' a:visited {
	color: var(--'.$color_slug.');
}';

				            }
			            }
                    }
                }

                $inline_style .= $inline_style_color_assignments;
            }
        }



/* ---------------------------------------------------------------------------------------------------------------------- */

        if (($theme_colors_found) || ($theme_options_found)){
            $inline_style .= PHP_EOL."</style>";
        }

        return $inline_style;

    }

    add_action( 'wp_enqueue_scripts', 'blocksolid_website_blocksolid_color_styles' );
    function blocksolid_website_blocksolid_color_styles() {
        $inline_style = blocksolid_output_website_blocksolid_color_styles();
        echo $inline_style;
    }

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Links

if (isset($blocksolid_options['blocksolid_field_allow_row_and_column_links'])){

    add_action( 'wp_enqueue_scripts', 'blocksolid_enqueue_links' );
    function blocksolid_enqueue_links() {
        wp_register_script( 'blocksolid_document_ready_links',
            plugins_url( '/js/document_ready_links.js', __FILE__ ),
            array('jquery'),
            filemtime(plugin_dir_path(__FILE__).'js/document_ready_links.js'),
            true
        );
        wp_enqueue_script('blocksolid_document_ready_links');
    }

}

function blocksolid_is_hex_light($hexcolor) {
    $hexcolor = str_replace('#','',$hexcolor);
    return (hexdec($hexcolor) > 0xffffff/2) ? true : false;
}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// VB Converter (Beta)

if (isset($blocksolid_options['blocksolid_field_allow_vc_converter'])){

	function blocksolid_vcconvert_add_to_page_row_actions($actions, $page_object){
		$nonce = wp_create_nonce( 'blocksolid_vcconvert_convert_page_'.$page_object->ID );
	    $actions['blocksolid_vcconverter_link'] = '<a href="'.admin_url('admin-ajax.php?action=blocksolid_vcconvert_convert_page&post_id='.$page_object->ID).'&headless=false&_wpnonce='.$nonce.'" class="vc_convert_link">' . __('Copy to Gutenberg') . '</a>';
	    return $actions;
	}
	add_filter('page_row_actions', 'blocksolid_vcconvert_add_to_page_row_actions', 50, 2);

	// Handler function...
	add_action( 'wp_ajax_blocksolid_vcconvert_convert_page', 'blocksolid_vcconvert_convert_page' );
	function blocksolid_vcconvert_convert_page($post_id,$headless=false,$wpnonce=false) {

		if ($post_id == ""){
			$post_id = $_GET['post_id'];
		}

		if ($headless || (wp_verify_nonce( $_REQUEST['_wpnonce'], 'blocksolid_vcconvert_convert_page_'.$post_id ))){

		    // Get the original page
		    $original_page = get_post($post_id);

		    // Create a copy of the original page
		    $new_page = array(
		        'post_title' => $original_page->post_title . ' - Converted',
		        'post_content' => blocksolid_vcconvert_convert_bakery_to_gutenberg($original_page->post_content),
		        'post_status' => 'draft',
		        'post_type' => $original_page->post_type,
		        'post_author' => $original_page->post_author,
		        'post_parent' => $original_page->post_parent
		    );
		    $new_page_id = wp_insert_post($new_page);

		    // Redirect to the new page if being called from the Pages list
			if (!($headless)){
				echo '
					<script>
			        blocksolid_vcconvert_move_to_converted_page(); //function name of jscript
			        function blocksolid_vcconvert_move_to_converted_page() {
			            window.location="/wp-admin/post.php?post='.$new_page_id.'&action=edit";
			        }
			       </script>
				';

				exit;
			}
		}
	}

	function blocksolid_vcconvert_convert_bakery_to_gutenberg($content) {

		/*

		// Converted:

		vc_column_inner
		vc_column
		vc_column_text
		vc_row_inner
		vc_row
		vc_toggle
		vc_btn
		vc_video
		vc_separator
		vc_single_image
		vc_carousel
		vc_gallery
		vc_empty_space
		vc_accordion
		vc_tta_tabs
		vc_tta_tour
		vc_tta_section

		*/

		// Find all instances of the [vc_column_text] shortcode in the HTML
		preg_match_all('/\[vc_column_text(\s+[^\]]+)?\](.*?)\[\/vc_column_text\]/s', $content, $matches, PREG_SET_ORDER);

		// Loop through each match and replace the shortcode with the desired output
		foreach ($matches as $match) {
		    // Remove any attributes or CSS classes from the shortcode
		    //$shortcode = preg_replace('/\s*\S+=[\'\"][^\'\"]*[\'\"]/', '', $match[0]);
		    $shortcode = $match[0];

		    // Replace the shortcode with the desired output
		    $output = preg_replace('/\[vc_column_text(\s+[^\]]+)?\]/', '<!-- wp:freeform -->', $shortcode);
		    // Replace the match in the original HTML with the new output
		    $content = str_replace($match[0], $output, $content);
		}

	    $content = preg_replace('/\[\/vc_column_text\]/', '<!-- /wp:freeform -->', $content);

		// Video
	    $content = preg_replace_callback(
	        '/\[vc_video([^\]]*)\]/',
	        function($matches) {
	            $atts = shortcode_parse_atts($matches[1]);
	            if (isset($atts['link'])){
					$link = $atts['link'];
				}

				$link_construct = '';

				if ((strpos($link, 'youtube') !== false) || (strpos($link, 'youtu.be') !== false)){

		            $link_construct = '<!-- wp:embed {"url":"'.$link.'","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
					<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
					'.$link.'
					</div></figure>
					<!-- /wp:embed -->';

				}elseif (strpos($link, 'vimeo.com') !== false){

		            $link_construct = '<!-- wp:embed {"url":"'.$link.'","type":"video","providerNameSlug":"vimeo","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
					<figure class="wp-block-embed is-type-video is-provider-vimeo wp-block-embed-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
					'.$link.'
					</div></figure>
					<!-- /wp:embed -->';

				}

				return $link_construct;

	        },
	        $content
	    );

		// Single image
	    $content = preg_replace_callback(
	        '/\[vc_single_image([^\]]*)\]/',
	        function($matches) {
	            $atts = shortcode_parse_atts($matches[1]);
	            if (isset($atts['image'])){
					$id = $atts['image'];
				}else{
					$id = 0;
				}
	            $size = isset($atts['img_size']) ? $atts['img_size'] : '';

	            return '<!-- wp:image {"id":' . $id . ',"sizeSlug":"' . $size . '"} --><figure class="wp-block-image size-' . $size . '"><img src="'.wp_get_attachment_image_url($id,'full').'" alt="" class="wp-image-'.$id.'"/></figure><!-- /wp:image -->';
	        },
	        $content
	    );

		// Button
	    $content = preg_replace_callback(
	        '/\[vc_btn([^\]]*)\]/',
	        function($matches) {
	            $atts = shortcode_parse_atts($matches[1]);
	            if (isset($atts['title'])){
					$title = $atts['image'];
				}else{
					$title = 'Title for button';
				}
	            if (isset($atts['link'])){
					$link = $atts['link'];

					$url = '#';
					$url_title = 'Button Title';
					$url_target = false;

					$pieces = explode("|", $link);

					if (is_array($pieces)){
						if (count($pieces)){

							if (isset($pieces[0])){
								if (strpos($pieces[0], 'url:') !== false) {
									$url = urldecode(str_replace('url:','',$pieces[0]));
								}
								if (strpos($pieces[0], 'title:') !== false) {
									if (str_replace('title:','',$pieces[0]) != ""){
										$url_title = urldecode(str_replace('title:','',$pieces[0]));
									}
								}

							}

							if (isset($pieces[1])){
								if (strpos($pieces[1], 'title:') !== false) {
									if (str_replace('title:','',$pieces[1]) != ""){
										$url_title = urldecode(str_replace('title:','',$pieces[1]));
									}
								}
							}

							if (isset($pieces[2])){
								if (strpos($pieces[2], 'target:') !== false) {
									$url_target = urldecode(str_replace('target:','',$pieces[2]));
								}
							}

						}
					}
				}

				$button_construct = '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="'. $url . '"';

				if ($url_target){
					$button_construct .= ' target="'.$url_target.'"';
				}

				if ($url_title == ""){
					$url_title = 'Button Title';
				}

				$button_construct .= '>'.$url_title.'</a></div><!-- /wp:button --></div><!-- /wp:buttons -->';

				return ($button_construct);

	        },
	        $content
	    );

		// Gallery
	    $content = preg_replace_callback(
	        '/\[vc_gallery([^\]]*)\]/',
	        function($matches) {
	            $atts = shortcode_parse_atts($matches[1]);
				$images = false;
				$gallery_construct = '';

	            if (isset($atts['images'])){
					$images = $atts['images'];

					$pieces = explode(",", $images);

					if (is_array($pieces)){
						if (count($pieces)){
							$gallery_construct .= '<!-- wp:gallery --><figure class="wp-block-gallery has-nested-images columns-default is-cropped">';

							foreach ($pieces as $image_id){
								$img_src = wp_get_attachment_image_url($image_id,'full');
								$gallery_construct .= '<!-- wp:image {"id":'.$image_id.',"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="'.$img_src.'" alt="" class="wp-image-'.$image_id.'"/></figure><!-- /wp:image -->';
							}
							$gallery_construct .= '</figure><!-- /wp:gallery -->';
						}
					}
				}
				return $gallery_construct;
	        },
	        $content
	    );

		// Carousel
	    $content = preg_replace_callback(
	        '/\[vc_images_carousel([^\]]*)\]/',
	        function($matches) {
	            $atts = shortcode_parse_atts($matches[1]);
				$images = false;
				$gallery_construct = '';

	            if (isset($atts['images'])){
					$images = $atts['images'];

					$pieces = explode(",", $images);

					if (is_array($pieces)){
						if (count($pieces)){
							$gallery_construct .= '<!-- wp:gallery --><figure class="wp-block-gallery has-nested-images columns-default is-cropped">';

							foreach ($pieces as $image_id){
								$img_src = wp_get_attachment_image_url($image_id,'full');
								$gallery_construct .= '<!-- wp:image {"id":'.$image_id.',"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="'.$img_src.'" alt="" class="wp-image-'.$image_id.'"/></figure><!-- /wp:image -->';
							}
							$gallery_construct .= '</figure><!-- /wp:gallery -->';
						}
					}
				}
				return $gallery_construct;
	        },
	        $content
	    );

		// Toggle
		// Find all instances of the [vc_toggle] shortcode in the HTML - turn into two nested rows with specific classes
		preg_match_all('/\[vc_toggle(\s+[^\]]+)?\](.*?)\[\/vc_toggle\]/s', $content, $matches, PREG_SET_ORDER);

		// Loop through each match and replace the shortcode with the desired output
		foreach ($matches as $match) {
		    $shortcode = $match[0];
			$title = false;
			if (isset($match[1])){
	            $atts = shortcode_parse_atts($match[1]);
	            if (isset($atts['title'])){
					$title = $atts['title'];
				}
			}
		    // Replace the shortcode with the desired output
		    $output = preg_replace('/\[vc_toggle(\s+[^\]]+)?\]/', '<!-- wp:columns {"className":"toggle"} --><div class="wp-block-columns toggle"><!-- wp:column --><div class="wp-block-column"><!-- wp:columns {"className":"toggle-title"} --><div class="wp-block-columns toggle-title"><!-- wp:column --><div class="wp-block-column"><!-- wp:freeform --><p>'.$title.'</p><!-- /wp:freeform --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:columns {"className":"toggle-content"} --><div class="wp-block-columns toggle-content"><!-- wp:column --><div class="wp-block-column"><!-- wp:freeform -->', $shortcode);
		    // Replace the match in the original HTML with the new output
		    $content = str_replace($match[0], $output, $content);
		}
	    $content = preg_replace('/\[\/vc_toggle\]/', '<!-- /wp:freeform --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:column --></div><!-- /wp:columns -->', $content);

		// Accordion and tab Sections
		// Find all instances of the [vc_tta_section] shortcode in the HTML - turn into two nested rows with specific classes
		preg_match_all('/\[vc_tta_section(\s+[^\]]+)?\](.*?)\[\/vc_tta_section\]/s', $content, $matches, PREG_SET_ORDER);

		// Loop through each match and replace the shortcode with the desired output
		foreach ($matches as $match) {
		    $shortcode = $match[0];
            $atts = shortcode_parse_atts($shortcode);
			$title = false;
			$tab_id = false;
            if (isset($atts['title'])){
				$title = $atts['title'];
			}
			if (isset($atts['tab_id'])){
				$tab_id = $atts['tab_id'];
			}
		    // Replace the shortcode with the desired output
			$replacement = '<!-- wp:columns {"className":"inner-section"} --><div class="wp-block-columns inner-section"';

			if ($title){
				$new_tab_id = preg_replace('/[^a-z0-9_]/', '', strtolower(str_replace(' ','_',$title)));	// Make a tab_id by converting the title to lowercase letters plus the underscore
				$replacement .= ' id="'.$new_tab_id.'"';
			}

			$replacement .= '><!-- wp:column --><div class="wp-block-column"><!-- wp:columns {"className":"inner-section-header"} --><div class="wp-block-columns inner-section-header"><!-- wp:column --><div class="wp-block-column"><!-- wp:freeform --><p>'.$title.'</p><!-- /wp:freeform --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:columns {"className":"inner-section-body"} --><div class="wp-block-columns inner-section-body"><!-- wp:column --><div class="wp-block-column">';

		    $output = preg_replace('/\[vc_tta_section(\s+[^\]]+)?\]/', $replacement, $shortcode);
		    // Replace the match in the original HTML with the new output
		    $content = str_replace($match[0], $output, $content);
		}
	    $content = preg_replace('/\[\/vc_tta_section\]/', '</div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:column --></div><!-- /wp:columns -->', $content);

	    // Convert [vc_tta_accordion] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_tta_accordion([^\]]*)\]/', '<!-- wp:columns {"className":"accordion"} --><div class="wp-block-columns accordion"><!-- wp:column --><div class="wp-block-column">', $content);
	    $content = preg_replace('/\[\/vc_tta_accordion\]/', '</div><!-- /wp:column --></div><!-- /wp:columns -->', $content);

	    // Convert [vc_tta_tabs] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_tta_tabs([^\]]*)\]/', '<!-- wp:columns {"className":"tabs"} --><div class="wp-block-columns tabs"><!-- wp:column --><div class="wp-block-column"><!-- wp:columns {"className":"tab-list"} --><div class="wp-block-columns tab-list"><!-- wp:column --><div class="wp-block-column"><!-- wp:freeform --><p>Tab List - Replace with tabs using jQuery</p><!-- /wp:freeform --></div><!-- /wp:column --></div><!-- /wp:columns -->', $content);
	    $content = preg_replace('/\[\/vc_tta_tabs\]/', '</div><!-- /wp:column --></div><!-- /wp:columns -->', $content);

	    // Convert [vc_tta_tour] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_tta_tour([^\]]*)\]/', '<!-- wp:columns {"className":"tour"} --><div class="wp-block-columns tour"><!-- wp:column --><div class="wp-block-column"><!-- wp:columns {"className":"tab-list"} --><div class="wp-block-columns tab-list"><!-- wp:column --><div class="wp-block-column"><!-- wp:freeform --><p>Tour List - Replace with tour section titles using jQuery</p><!-- /wp:freeform --></div><!-- /wp:column --></div><!-- /wp:columns -->', $content);
	    $content = preg_replace('/\[\/vc_tta_tour\]/', '</div><!-- /wp:column --></div><!-- /wp:columns -->', $content);

	    // Convert [vc_row] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_row([^\]]*)\]/', '<!-- wp:columns --><div class="wp-block-columns">', $content);
	    $content = preg_replace('/\[\/vc_row\]/', '</div><!-- /wp:columns -->', $content);

	    // Convert [vc_column] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_column([^\]]*)\]/', '<!-- wp:column --><div class="wp-block-column">', $content);
	    $content = preg_replace('/\[\/vc_column\]/', '</div><!-- /wp:column -->', $content);

	    // Convert [vc_row_inner] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_row_inner([^\]]*)\]/', '<!-- wp:columns --><div class="wp-block-columns">', $content);
	    $content = preg_replace('/\[\/vc_row_inner\]/', '</div><!-- /wp:columns -->', $content);

	    // Convert [vc_column_inner] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_column_inner([^\]]*)\]/', '<!-- wp:column --><div class="wp-block-column">', $content);
	    $content = preg_replace('/\[\/vc_column_inner\]/', '</div><!-- /wp:columns -->', $content);

	    // Convert [vc_raw_html] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_raw_html([^\]]*)\]/', '<!-- wp:html -->', $content);
	    $content = preg_replace('/\[\/vc_raw_html\]/', '<!-- /wp:html -->', $content);

	    // Convert [vc_empty_space] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_empty_space([^\]]*)\]/', '<!-- wp:spacer --><div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->', $content);

	    // Convert [vc_separator] shortcodes to Gutenberg comment tags
	    $content = preg_replace('/\[vc_separator([^\]]*)\]/', '<!-- wp:separator {"className":"is-style-wide"} --><hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/><!-- /wp:separator -->', $content);

	    // Convert any remaining shortcodes to empty Gutenberg comment tags
	    $content = preg_replace('/\[(.*?)\]/', '<!-- -->', $content);

		// And then bin those too!
		$content = str_replace('<!-- -->','',$content);

		//$content = normalize_whitespace($content);
		$content = blocksolid_vcconvert_fix_ascii_issues($content);
		$content = utf8_encode($content);

	    return $content;

		/*

		// Not converted yet - will be removed automatically

		layerslider_vc
		rev_slider_vc
		vc_accordion_tab
		vc_basic_grid_filter
		vc_basic_grid
		vc_button2
		vc_button
		vc_cta_button2
		vc_cta_button
		vc_cta
		vc_custom_field
		vc_custom_heading
		vc_facebook
		vc_flickr
		vc_gitem_animated_block
		vc_gitem_block
		vc_gitem_col
		vc_gitem_image
		vc_gitem
		vc_gitem_post_author
		vc_gitem_post_categories
		vc_gitem_post_data
		vc_gitem_post_meta
		vc_gitem_row
		vc_gitem_zone_c
		vc_gitem_zone
		vc_gmaps
		vc_googleplus
		vc_icon
		vc_images_carousel
		vc_item
		vc_items
		vc_line_chart
		vc_message
		vc_pie
		vc_pinterest
		vc_posts_grid
		vc_posts_slider
		vc_progress_bar
		vc_raw_html
		vc_round_chart
		vc_tab
		vc_text_separator
		vc_tta_global
		vc_tta_pageable_section
		vc_tweetmeme
		vc_widget_sidebar
		vc_wp_archives
		vc_wp_calendar
		vc_wp_categories
		vc_wp_custommenu
		vc_wp_links
		vc_wp_meta
		vc_wp_pages
		vc_wp_posts
		vc_wp_recentcomments
		vc_wp_rss
		vc_wp_search
		vc_wp_tagcloud
		vc_wp_text

		*/

	}

	function blocksolid_vcconvert_fix_ascii_issues($string) {

	    /*$map = Array(
	        '33' => '!', '34' => '"', '35' => '#', '36' => '$', '37' => '%', '38' => '&', '39' => "'", '40' => '(', '41' => ')', '42' => '*',
	        '43' => '+', '44' => ',', '45' => '-', '46' => '.', '47' => '/', '48' => '0', '49' => '1', '50' => '2', '51' => '3', '52' => '4',
	        '53' => '5', '54' => '6', '55' => '7', '56' => '8', '57' => '9', '58' => ':', '59' => ';', '60' => '<', '61' => '=', '62' => '>',
	        '63' => '?', '64' => '@', '65' => 'A', '66' => 'B', '67' => 'C', '68' => 'D', '69' => 'E', '70' => 'F', '71' => 'G', '72' => 'H',
	        '73' => 'I', '74' => 'J', '75' => 'K', '76' => 'L', '77' => 'M', '78' => 'N', '79' => 'O', '80' => 'P', '81' => 'Q', '82' => 'R',
	        '83' => 'S', '84' => 'T', '85' => 'U', '86' => 'V', '87' => 'W', '88' => 'X', '89' => 'Y', '90' => 'Z', '91' => '[', '92' => '\\',
	        '93' => ']', '94' => '^', '95' => '_', '96' => '`', '97' => 'a', '98' => 'b', '99' => 'c', '100'=> 'd', '101'=> 'e', '102'=> 'f',
	        '103'=> 'g', '104'=> 'h', '105'=> 'i', '106'=> 'j', '107'=> 'k', '108'=> 'l', '109'=> 'm', '110'=> 'n', '111'=> 'o', '112'=> 'p',
	        '113'=> 'q', '114'=> 'r', '115'=> 's', '116'=> 't', '117'=> 'u', '118'=> 'v', '119'=> 'w', '120'=> 'x', '121'=> 'y', '122'=> 'z',
	        '123'=> '{', '124'=> '|', '125'=> '}', '126'=> '~', '127'=> ' ', '128'=> '&#8364;', '129'=> ' ', '130'=> ',', '131'=> ' ', '132'=> '"',
	        '133'=> '.', '134'=> ' ', '135'=> ' ', '136'=> '^', '137'=> ' ', '138'=> ' ', '139'=> '<', '140'=> ' ', '141'=> ' ', '142'=> ' ',
	        '143'=> ' ', '144'=> ' ', '145'=> "'", '146'=> "'", '147'=> '"', '148'=> '"', '149'=> '.', '150'=> '-', '151'=> '-', '152'=> '~',
	        '153'=> ' ', '154'=> ' ', '155'=> '>', '156'=> ' ', '157'=> ' ', '158'=> ' ', '159'=> ' ', '160'=> ' ', '161'=> '¡', '162'=> '¢',
	        '163'=> '£', '164'=> '¤', '165'=> '¥', '166'=> '¦', '167'=> '§', '168'=> '¨', '169'=> '©', '170'=> 'ª', '171'=> '«', '172'=> '¬',
	        '173'=> '­', '174'=> '®', '175'=> '¯', '176'=> '°', '177'=> '±', '178'=> '²', '179'=> '³', '180'=> '´', '181'=> 'µ', '182'=> '¶',
	        '183'=> '·', '184'=> '¸', '185'=> '¹', '186'=> 'º', '187'=> '»', '188'=> '¼', '189'=> '½', '190'=> '¾', '191'=> '¿', '192'=> 'À',
	        '193'=> 'Á', '194'=> 'Â', '195'=> 'Ã', '196'=> 'Ä', '197'=> 'Å', '198'=> 'Æ', '199'=> 'Ç', '200'=> 'È', '201'=> 'É', '202'=> 'Ê',
	        '203'=> 'Ë', '204'=> 'Ì', '205'=> 'Í', '206'=> 'Î', '207'=> 'Ï', '208'=> 'Ð', '209'=> 'Ñ', '210'=> 'Ò', '211'=> 'Ó', '212'=> 'Ô',
	        '213'=> 'Õ', '214'=> 'Ö', '215'=> '×', '216'=> 'Ø', '217'=> 'Ù', '218'=> 'Ú', '219'=> 'Û', '220'=> 'Ü', '221'=> 'Ý', '222'=> 'Þ',
	        '223'=> 'ß', '224'=> 'à', '225'=> 'á', '226'=> 'â', '227'=> 'ã', '228'=> 'ä', '229'=> 'å', '230'=> 'æ', '231'=> 'ç', '232'=> 'è',
	        '233'=> 'é', '234'=> 'ê', '235'=> 'ë', '236'=> 'ì', '237'=> 'í', '238'=> 'î', '239'=> 'ï', '240'=> 'ð', '241'=> 'ñ', '242'=> 'ò',
	        '243'=> 'ó', '244'=> 'ô', '245'=> 'õ', '246'=> 'ö', '247'=> '÷', '248'=> 'ø', '249'=> 'ù', '250'=> 'ú', '251'=> 'û', '252'=> 'ü',
	        '253'=> 'ý', '254'=> 'þ', '255'=> 'ÿ'
	    );

	    $search = Array();
	    $replace = Array();

	    foreach ($map as $s => $r) {
	        $search[] = chr((int)$s);
	        $replace[] = $r;
	    }

	    $string = str_replace($search, $replace, $string);*/

		/*$string = str_replace('“', '"', $string);
		$string = str_replace('”', '"', $string);
		$string = str_replace(' ', ' ', $string);*/

		if (function_exists('mb_convert_encoding')){
			$string = mb_convert_encoding($string, "HTML-ENTITIES", "UTF-8");
		}

		return($string);

	}

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Theme Options

/*
From WP 5.8 moving these to theme.json
https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/
https://make.wordpress.org/core/2021/06/25/introducing-theme-json-in-wordpress-5-8/
*/

if (isset($blocksolid_options['blocksolid_field_allow_theme_options'])){

	add_theme_support( 'custom-spacing' );
	add_theme_support( 'disable-custom-font-sizes' );
	//add_theme_support( 'editor-font-sizes' ); // Disable font sizes - removed in 1.0.10 due to Gutenberg change - if this option used as empty array Gutenberg throws a warning - use theme.json instead
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-gradients' );
	add_theme_support( 'custom-units', 'rem', 'em' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'dark-editor-style' );
	add_theme_support( '__experimental-editor-gradient-presets', array() );

	function blocksolid_admin_styles_gradients() {
		wp_enqueue_style( 'blocksolid-admin-styles-gradients', plugins_url( '/css/blocksolid-admin-styles-gradients.css', __FILE__ ), '', filemtime(plugin_dir_path(__FILE__).'css/blocksolid-admin-styles-gradients.css'));
	}

	//add_action('admin_enqueue_scripts', 'blocksolid_admin_styles_gradients');
	if(is_admin()){
		add_action('enqueue_block_assets', 'blocksolid_admin_styles_gradients');
	}

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Vertical & Horizontal Spacings

if (isset($blocksolid_options['blocksolid_field_allow_spacing_controls'])){

	// https://github.com/WordPress/gutenberg/issues/31980
	function blocksolid_filter_block_type_metadata( $metadata ) {
		/**
		 * Disable the layout panel for all blocks.
		 */
		if ( isset( $metadata['supports']['__experimentalLayout'] ) ) {
			$metadata['supports']['__experimentalLayout'] = false;
		}
		return $metadata;
	}

	global $wp_version;
	if ( (version_compare( floatval($wp_version), 5.8, '=' ) )) {
		add_filter( 'block_type_metadata', 'blocksolid_filter_block_type_metadata' );
	}

	function blocksolid_output_website_blocksolid_spacing_styles(){

		global $wp_version;

	    $theme_support_array = blocksolid_get_admin_and_website_blocksolid_styles();
	    $website_body_color_styles = "";
		$website_option_styles = "";
		$theme_options = $theme_support_array['theme_options'];
		$theme_options_found = false;

	    if (is_array($theme_options)){
	        if (count($theme_options)){
				$theme_options_found = true;
			}
		}

		$inline_style = "";

		if ($theme_options_found){
			$inline_style .= "<style>".PHP_EOL;
		}

		if ($theme_options_found){
	   		// Add options to front-end website body
			if ($theme_options['blocksolid_field_main_column_width'] > 1){


				if ( (version_compare( floatval($wp_version), 5.8, '>=' ) )) {
					$inline_style .= "section.alignundefined {margin: 0 auto;max-width: ".blocksolid_check_size_units($theme_options['blocksolid_field_main_column_width']).";}";
					$inline_style .= ".wp-block-columns:not(.alignfull){max-width: ".blocksolid_check_size_units($theme_options['blocksolid_field_main_column_width'])."!important; margin-left: auto; margin-right: auto;}";
					$inline_style .= "
					:root {
						--responsive--aligndefault-width: ".blocksolid_check_size_units($theme_options['blocksolid_field_main_column_width'])."!important;
					}";
				}else{
					$inline_style .= "section.alignundefined {margin: 0 auto;max-width: ".blocksolid_check_size_units($theme_options['blocksolid_field_main_column_width']).";}";
					$inline_style .= ".wp-block-columns:not(.alignwide):not(.alignfull){max-width: ".blocksolid_check_size_units($theme_options['blocksolid_field_main_column_width'])."!important; margin-left: auto; margin-right: auto;}";
				}
			}

	        $inline_style .= ".wp-block-columns.margin-top-small,.wp-block-column.margin-top-small {margin-top: ".$theme_options['blocksolid_field_style_margin_top_small']."!important;}";
	        $inline_style .= ".wp-block-columns.margin-top-medium,.wp-block-column.margin-top-medium {margin-top: ".$theme_options['blocksolid_field_style_margin_top_medium']."!important;}";
	        $inline_style .= ".wp-block-columns.margin-top-large,.wp-block-column.margin-top-large {margin-top: ".$theme_options['blocksolid_field_style_margin_top_large']."!important;}";
	        $inline_style .= ".wp-block-columns.margin-top-none,.wp-block-column.margin-top-none {margin-top: 0;}";

	        $inline_style .= ".wp-block-columns.margin-bottom-small,.wp-block-column.margin-bottom-small {margin-bottom: ".$theme_options['blocksolid_field_style_margin_bottom_small']."!important;}";
	        $inline_style .= ".wp-block-columns.margin-bottom-medium,.wp-block-column.margin-bottom-medium {margin-bottom: ".$theme_options['blocksolid_field_style_margin_bottom_medium']."!important;}";
	        $inline_style .= ".wp-block-columns.margin-bottom-large,.wp-block-column.margin-bottom-large {margin-bottom: ".$theme_options['blocksolid_field_style_margin_bottom_large']."!important;}";
	        $inline_style .= ".wp-block-columns.margin-bottom-none,.wp-block-column.margin-bottom-none {margin-bottom: 0;}";

	        $inline_style .= ".wp-block-columns.padding-top-small,.wp-block-column.padding-top-small {padding-top: ".$theme_options['blocksolid_field_style_padding_top_small']."!important;}";
	        $inline_style .= ".wp-block-columns.padding-top-medium,.wp-block-column.padding-top-medium {padding-top: ".$theme_options['blocksolid_field_style_padding_top_medium']."!important;}";
	        $inline_style .= ".wp-block-columns.padding-top-large,.wp-block-column.padding-top-large {padding-top: ".$theme_options['blocksolid_field_style_padding_top_large']."!important;}";
	        $inline_style .= ".wp-block-columns.padding-top-none,.wp-block-column.padding-top-none {padding-top: 0;}";

	        $inline_style .= ".wp-block-columns.padding-bottom-small,.wp-block-column.padding-bottom-small {padding-bottom: ".$theme_options['blocksolid_field_style_padding_bottom_small']."!important;}";
	        $inline_style .= ".wp-block-columns.padding-bottom-medium,.wp-block-column.padding-bottom-medium {padding-bottom: ".$theme_options['blocksolid_field_style_padding_bottom_medium']."!important;}";
	        $inline_style .= ".wp-block-columns.padding-bottom-large,.wp-block-column.padding-bottom-large {padding-bottom: ".$theme_options['blocksolid_field_style_padding_bottom_large']."!important;}";
	        $inline_style .= ".wp-block-columns.padding-bottom-none,.wp-block-column.padding-bottom-none {padding-bottom: 0;}";

	        $inline_style .= ".wp-block-column.padding-left-small {padding-left: ".$theme_options['blocksolid_field_style_padding_left_small']."!important;}";
	        $inline_style .= ".wp-block-column.padding-left-medium {padding-left: ".$theme_options['blocksolid_field_style_padding_left_medium']."!important;}";
	        $inline_style .= ".wp-block-column.padding-left-large {padding-left: ".$theme_options['blocksolid_field_style_padding_left_large']."!important;}";
	        $inline_style .= ".wp-block-column.padding-left-none {padding-left: 0;}";

	        $inline_style .= ".wp-block-column.padding-right-small {padding-right: ".$theme_options['blocksolid_field_style_padding_right_small']."!important;}";
	        $inline_style .= ".wp-block-column.padding-right-medium {padding-right: ".$theme_options['blocksolid_field_style_padding_right_medium']."!important;}";
	        $inline_style .= ".wp-block-column.padding-right-large {padding-right: ".$theme_options['blocksolid_field_style_padding_right_large']."!important;}";
	        $inline_style .= ".wp-block-column.padding-right-none {padding-right: 0;}";

		}

		if ($theme_options_found){
			$inline_style .= PHP_EOL."</style>";
		}

		return $inline_style;

	}

	add_action( 'wp_enqueue_scripts', 'blocksolid_website_blocksolid_spacing_styles' );
	function blocksolid_website_blocksolid_spacing_styles() {
	    $inline_style = blocksolid_output_website_blocksolid_spacing_styles();
	    echo $inline_style;
	}

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Default Content

if (isset($blocksolid_options['blocksolid_field_allow_default_content'])){

	function blocksolid_default_content( $content, $post ) {

	    switch( $post->post_type ) {
	        case 'page':
	            $content = '<!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"></div><!-- /wp:column --></div><!-- /wp:columns -->';
	        break;
	        default:
	            $content = '';
	        break;
	    }

	    return $content;
	}

	add_filter( 'default_content', 'blocksolid_default_content', 10, 2 );

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

//Common functions

function blocksolid_show_all_features(){
    $blocksolid_show_all_features = true;

    global $wp_version;
    global $blocksolid_minimum_wordpress_version;
    if ( !(version_compare( $wp_version, $blocksolid_minimum_wordpress_version, '>=' ) )) {
        $blocksolid_show_all_features = false;
    }

    return ($blocksolid_show_all_features);

}

function blocksolid_generate_code($limit){
    $code = '';
    for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
    return $code;
}

function blocksolid_admin_styles_spacings() {
	wp_enqueue_style( 'blocksolid-admin-styles-spacings', plugins_url( '/css/blocksolid-admin-styles-spacings.css', __FILE__ ), '', filemtime(plugin_dir_path(__FILE__).'css/blocksolid-admin-styles-spacings.css'));
}
//add_action('admin_enqueue_scripts', 'blocksolid_admin_styles_spacings');
if(is_admin()){
	add_action('enqueue_block_assets', 'blocksolid_admin_styles_spacings');
}

function blocksolid_sanitize_text($string){
	$string = esc_html(sanitize_text_field(wp_unslash($string)));
	return($string);
}

function blocksolid_get_admin_and_website_blocksolid_styles(){

    $blocksolid_options = get_option( 'blocksolid_options' );

    $theme_support_array = false;

    if (is_array($blocksolid_options)){
        if (count($blocksolid_options)){

            $k = 0;
            $theme_color_array = array();
			$theme_options_array = array();

			if (isset($blocksolid_options['blocksolid_field_main_column_width'])){
				$theme_options_array['blocksolid_field_main_column_width'] = $blocksolid_options['blocksolid_field_main_column_width'];
			}

			if (isset($blocksolid_options['blocksolid_field_style_margin_top_small'])){
				$theme_options_array['blocksolid_field_style_margin_top_small'] = $blocksolid_options['blocksolid_field_style_margin_top_small'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_margin_bottom_small'])){
                $theme_options_array['blocksolid_field_style_margin_bottom_small'] = $blocksolid_options['blocksolid_field_style_margin_bottom_small'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_margin_top_medium'])){
				$theme_options_array['blocksolid_field_style_margin_top_medium'] = $blocksolid_options['blocksolid_field_style_margin_top_medium'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_margin_bottom_medium'])){
                $theme_options_array['blocksolid_field_style_margin_bottom_medium'] = $blocksolid_options['blocksolid_field_style_margin_bottom_medium'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_margin_top_large'])){
				$theme_options_array['blocksolid_field_style_margin_top_large'] = $blocksolid_options['blocksolid_field_style_margin_top_large'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_margin_bottom_large'])){
                $theme_options_array['blocksolid_field_style_margin_bottom_large'] = $blocksolid_options['blocksolid_field_style_margin_bottom_large'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_padding_top_small'])){
				$theme_options_array['blocksolid_field_style_padding_top_small'] = $blocksolid_options['blocksolid_field_style_padding_top_small'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_padding_bottom_small'])){
                $theme_options_array['blocksolid_field_style_padding_bottom_small'] = $blocksolid_options['blocksolid_field_style_padding_bottom_small'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_padding_top_medium'])){
				$theme_options_array['blocksolid_field_style_padding_top_medium'] = $blocksolid_options['blocksolid_field_style_padding_top_medium'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_padding_bottom_medium'])){
                $theme_options_array['blocksolid_field_style_padding_bottom_medium'] = $blocksolid_options['blocksolid_field_style_padding_bottom_medium'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_padding_top_large'])){
				$theme_options_array['blocksolid_field_style_padding_top_large'] = $blocksolid_options['blocksolid_field_style_padding_top_large'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_padding_bottom_large'])){
                $theme_options_array['blocksolid_field_style_padding_bottom_large'] = $blocksolid_options['blocksolid_field_style_padding_bottom_large'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_padding_left_small'])){
				$theme_options_array['blocksolid_field_style_padding_left_small'] = $blocksolid_options['blocksolid_field_style_padding_left_small'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_padding_right_small'])){
                $theme_options_array['blocksolid_field_style_padding_right_small'] = $blocksolid_options['blocksolid_field_style_padding_right_small'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_padding_left_medium'])){
				$theme_options_array['blocksolid_field_style_padding_left_medium'] = $blocksolid_options['blocksolid_field_style_padding_left_medium'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_padding_right_medium'])){
                $theme_options_array['blocksolid_field_style_padding_right_medium'] = $blocksolid_options['blocksolid_field_style_padding_right_medium'];
            }

			if (isset($blocksolid_options['blocksolid_field_style_padding_left_large'])){
				$theme_options_array['blocksolid_field_style_padding_left_large'] = $blocksolid_options['blocksolid_field_style_padding_left_large'];
			}

            if (isset($blocksolid_options['blocksolid_field_style_padding_right_large'])){
                $theme_options_array['blocksolid_field_style_padding_right_large'] = $blocksolid_options['blocksolid_field_style_padding_right_large'];
            }

            foreach($blocksolid_options as $blocksolid_option){

	            if (isset($blocksolid_options['blocksolid_field_name'.$k])){
                  	if ($blocksolid_options['blocksolid_field_name'.$k] != ""){

	                    $theme_color_array[] = array(
	                    	'name' => __( $blocksolid_options['blocksolid_field_name'.$k], 'themeLangDomain' ),
	                    	'slug' => $blocksolid_options['blocksolid_field_slug'.$k],
	                    	'color' => $blocksolid_options['blocksolid_field_color'.$k]
	                    );

	                }
		            $k++;
	            }
            }
            return array('theme_options' => $theme_options_array, 'colors' => $theme_color_array);
        }
    }
}

// ---------------------------------------------------------------------------------------------------------------------------------------------

/**
 * Check if Block Editor is active.
 * Must only be used after plugins_loaded action is fired.
 *
 * @return bool
 */
function blocksolid_is_gutenberg_active() {
    // Gutenberg plugin is installed and activated.
    $gutenberg = ! ( false === has_filter( 'replace_editor', 'gutenberg_init' ) );

    // Block editor since 5.0.
    $block_editor = version_compare( $GLOBALS['wp_version'], '5.0-beta', '>' );

    if ( ! $gutenberg && ! $block_editor ) {
        return false;
    }

    if ( blocksolid_is_classic_editor_plugin_active() ) {
        $editor_option       = get_option( 'classic-editor-replace' );
        $block_editor_active = array( 'no-replace', 'block' );

        return in_array( $editor_option, $block_editor_active, true );
    }

    return true;
}

/**
 * Check if Classic Editor plugin is active.
 *
 * @return bool
 */
function blocksolid_is_classic_editor_plugin_active() {
    if ( ! function_exists( 'is_plugin_active' ) ) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    if ( is_plugin_active( 'classic-editor/classic-editor.php' ) ) {
        return true;
    }

    return false;
}

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Settings Screen

function blocksolid_get_default_blocksolid_option($blocksolid_option){

	$default_values = array(

		"blocksolid_field_name" 		=> "Very dark blue",
		"blocksolid_field_slug" 		=> "very-dark-blue",
		"blocksolid_field_color" 		=> "#123456",
		"blocksolid_row_spacing_small" 	=> "2vh",
		"blocksolid_row_spacing_medium" => "5vh",
		"blocksolid_row_spacing_large" 	=> "9vh",
		"blocksolid_column_padding_small" 	=> "2vw",
		"blocksolid_column_padding_medium" => "5vw",
		"blocksolid_column_padding_large" 	=> "9vw"

	);
	return($default_values[$blocksolid_option]);
}

/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * custom option and settings
 */

function blocksolid_settings_init() {

  $show_blocksolid_settings = true;

  if (is_multisite()){
    if ( !(current_user_can( 'setup_network' ) )) {
      $show_blocksolid_settings = false;
    }
  }else{
    if ( !(current_user_can( 'manage_options' ) )) {
      $show_blocksolid_settings = false;
    }
  }

  if ($show_blocksolid_settings){

    $blocksolid_options = get_option( 'blocksolid_options' );

    // register a new setting for "blocksolid" page
    register_setting( 'blocksolid', 'blocksolid_options' );

    // register new sections in the "blocksolid" page

    add_settings_section(
     'blocksolid_section_main_settings',
     __( '', 'blocksolid' ),
     'blocksolid_section_main_settings_cb',
     'blocksolid'
    );

    if (blocksolid_show_all_features()){

    	if (isset($blocksolid_options['blocksolid_field_allow_spacing_controls'])){

            add_settings_section(
             'blocksolid_section_spacing_settings',
             __( '', 'blocksolid' ),
             'blocksolid_section_spacing_settings_cb',
             'blocksolid'
            );

        }

	    if (isset($blocksolid_options['blocksolid_field_allow_palette_control'])) {

	        add_settings_section(
	         'blocksolid_section_color_settings',
	         __( '', 'blocksolid' ),
	         'blocksolid_section_color_settings_cb',
	         'blocksolid'
	        );

            // If there are any classes

            $classes_list = blocksolid_get_classes_list();

            if (is_array($classes_list)){
                if (count($classes_list)){
        	        add_settings_section(
        	         'blocksolid_section_color_assignment_settings',
        	         __( '', 'blocksolid' ),
        	         'blocksolid_section_color_assignment_settings_cb',
        	         'blocksolid'
        	        );
                }
            }
	    }

		// Back-end AJAX

		add_action( 'admin_enqueue_scripts', 'blocksolid_enqueue_admin_ajax_scripts' );

		function blocksolid_enqueue_admin_ajax_scripts($hook) {
		    if (is_admin()){
				wp_enqueue_script( 'blocksolid-settings-ajax', plugins_url( '/js/blocksolid-settings-ajax.js', __FILE__ ), array('jquery'), '1.0', true );
				wp_localize_script( 'blocksolid-settings-ajax', 'blocksolid_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'security' => wp_create_nonce( 'blocksolid-admin' ), 'whatever' => 1200 ) );
			}
		}

		// Handler function...
		add_action( 'wp_ajax_get_current_blocksolid_controlled_palette', 'get_current_blocksolid_controlled_palette' );

		function get_current_blocksolid_controlled_palette(){

			check_ajax_referer( 'blocksolid-admin', 'security' );

			$response_message = "";

		    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

			    $blocksolid_options = get_option( 'blocksolid_options' );

				$response_message = 'No palette found!';

	 		    if (isset($blocksolid_options['blocksolid_field_allow_palette_control'])){

			        $i = 0;

			        if (is_array($blocksolid_options)){
			            if (count($blocksolid_options)){

							$response_message = '';

			                foreach ($blocksolid_options as $blocksolid_option) {
			                    if (isset($blocksolid_options['blocksolid_field_color'.$i])){
			                        if ($blocksolid_options['blocksolid_field_color'.$i] != ""){
										$response_message .= '.'.$blocksolid_options['blocksolid_field_slug'.$i].' {color:'.$blocksolid_options['blocksolid_field_color'.$i].';}'.PHP_EOL;
			                        }
			                    }
			                    $i++;
			                }
			            }
			        }

			    }

		    }else{
		   		$response_message = "Sorry AJAX capability was not available so we cannot supply the required data";
			}

			echo $response_message ;

		    wp_die();

		}

		// Handler function...
		add_action( 'wp_ajax_blocksolid_import_settings', 'blocksolid_import_settings' );

		function blocksolid_import_settings(){

			check_ajax_referer( 'blocksolid-admin', 'security' );

			$response_message = "No settings found!";

		    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

                $response_message = 'No settings found!';

                if ($_FILES['file_0']['error'] == UPLOAD_ERR_OK  && is_uploaded_file($_FILES['file_0']['tmp_name'])) {

                    $response_message = 'File uploaded but no data found';

                    $blocksolid_json_file_data = file_get_contents($_FILES['file_0']['tmp_name']);

                    if ($blocksolid_json_file_data){

                        $response_message = 'File uploaded but data not as expected';

                        $blocksolid_file_data = json_decode($blocksolid_json_file_data,true); // An array

                        if (update_option( 'blocksolid_options', $blocksolid_file_data)){
                            $response_message = "Success";
                        }else{
                            $response_message = 'Uploaded options are same as current, no changes made!';
                        }
                    }
                }

		    }else{
		   		$response_message = "Sorry AJAX capability was not available so we cannot supply the required data";
			}

			echo $response_message ;

		    wp_die();

		}

		// Handler function...
		add_action( 'wp_ajax_blocksolid_export_settings', 'blocksolid_export_settings' );

		function blocksolid_export_settings(){

			check_ajax_referer( 'blocksolid-admin', 'security' );

			$response_message = "";

		    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

			    $blocksolid_options = get_option( 'blocksolid_options' );

				$response_message = 'No settings found!';

	 		    if (isset($blocksolid_options)){

			        if (is_array($blocksolid_options)){
			            if (count($blocksolid_options)){
							$response_message = json_encode($blocksolid_options);
			            }
			        }

			    }

		    }else{
		   		$response_message = "Sorry AJAX capability was not available so we cannot supply the required data";
			}

			echo $response_message ;

		    wp_die();

		}

    }

    $blocksolid_options_found = false;

	// Register fields

	// - General Settings

    $settings_field_array = array('reset_id' => 'blocksolid_field_main_column_width', 'label_for' => 'blocksolid_field_main_column_width', 'class' => 'blocksolid_row first', 'blocksolid_custom_data' => 'custom_main_column_width'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_main_column_width',
     __( 'Main Column Width', 'blocksolid' ),'blocksolid_field_main_column_width_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_editor_overlay', 'label_for' => 'blocksolid_field_allow_editor_overlay', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_editor_overlay'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_editor_overlay',
     __( 'Editor Overlay On By Default', 'blocksolid' ),'blocksolid_field_allow_editor_overlay_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_default_content', 'label_for' => 'blocksolid_field_allow_default_content', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_default_content'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_default_content',
     __( 'Default Page Content', 'blocksolid' ),'blocksolid_field_allow_default_content_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_theme_options', 'label_for' => 'blocksolid_field_allow_theme_options', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_theme_options'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_theme_options',
     __( 'Theme options', 'blocksolid' ),'blocksolid_field_allow_theme_options_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_stretched_rows', 'label_for' => 'blocksolid_field_allow_stretched_rows', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_stretched_rows'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_stretched_rows',
     __( 'Stretched Row Backgrounds', 'blocksolid' ),'blocksolid_field_allow_stretched_rows_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_mobile_hide', 'label_for' => 'blocksolid_field_allow_mobile_hide', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_mobile_hide'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_mobile_hide',
     __( 'Mobile hiding', 'blocksolid' ),'blocksolid_field_allow_mobile_hide_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_disabled_rows', 'label_for' => 'blocksolid_field_allow_disabled_rows', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_disabled_rows'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_disabled_rows',
     __( 'Disabled rows', 'blocksolid' ),'blocksolid_field_allow_disabled_rows_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_background_images', 'label_for' => 'blocksolid_field_allow_background_images', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_background_images'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_background_images',
     __( 'Background images', 'blocksolid' ),'blocksolid_field_allow_background_images_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_row_and_column_links', 'label_for' => 'blocksolid_field_allow_row_and_column_links', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_row_and_column_links'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_row_and_column_links',
     __( 'Layout box links', 'blocksolid' ),'blocksolid_field_allow_row_and_column_links_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    if (blocksolid_show_all_features()){

        $settings_field_array = array('reset_id' => 'blocksolid_field_allow_spacing_controls', 'label_for' => 'blocksolid_field_allow_spacing_controls', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_spacing_controls'); //Mod to below code to allow older PHP
         add_settings_field(
         'blocksolid_field_allow_spacing_controls',
         __( 'Spacing controls', 'blocksolid' ),'blocksolid_field_allow_spacing_controls_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

    	// - Spacing Settings

    	if (isset($blocksolid_options['blocksolid_field_allow_spacing_controls'])){

            $settings_field_array = array('reset_id_1' => 'blocksolid_field_style_margin_top_small', 'reset_id_2' => 'blocksolid_field_style_margin_top_medium', 'reset_id_3' => 'blocksolid_field_style_margin_top_large', 'label_for_1' => 'blocksolid_field_style_margin_top_small', 'label_for_2' => 'blocksolid_field_style_margin_top_medium', 'label_for_3' => 'blocksolid_field_style_margin_top_large', 'class' => 'blocksolid_row first thin', 'blocksolid_custom_data_1' => 'custom_style_margin_top_small', 'blocksolid_custom_data_2' => 'custom_style_margin_top_medium', 'blocksolid_custom_data_3' => 'custom_style_margin_top_large'); //Mod to below code to allow older PHP
             add_settings_field(
             'blocksolid_field_style_margin_top_small',
             __( 'Margin Top', 'blocksolid' ),'blocksolid_field_style_margin_top_cb','blocksolid','blocksolid_section_spacing_settings',$settings_field_array);

            $settings_field_array = array('reset_id_1' => 'blocksolid_field_style_margin_bottom_small', 'reset_id_2' => 'blocksolid_field_style_margin_bottom_medium', 'reset_id_3' => 'blocksolid_field_style_margin_bottom_large', 'label_for_1' => 'blocksolid_field_style_margin_bottom_small', 'label_for_2' => 'blocksolid_field_style_margin_bottom_medium', 'label_for_3' => 'blocksolid_field_style_margin_bottom_large', 'class' => 'blocksolid_row first thin', 'blocksolid_custom_data_1' => 'custom_style_margin_bottom_small', 'blocksolid_custom_data_2' => 'custom_style_margin_bottom_medium', 'blocksolid_custom_data_3' => 'custom_style_margin_bottom_large'); //Mod to below code to allow older PHP
             add_settings_field(
             'blocksolid_field_style_margin_bottom_small',
             __( 'Margin Bottom', 'blocksolid' ),'blocksolid_field_style_margin_bottom_cb','blocksolid','blocksolid_section_spacing_settings',$settings_field_array);

            $settings_field_array = array('reset_id_1' => 'blocksolid_field_style_padding_top_small', 'reset_id_2' => 'blocksolid_field_style_padding_top_medium', 'reset_id_3' => 'blocksolid_field_style_padding_top_large', 'label_for_1' => 'blocksolid_field_style_padding_top_small', 'label_for_2' => 'blocksolid_field_style_padding_top_medium', 'label_for_3' => 'blocksolid_field_style_padding_top_large', 'class' => 'blocksolid_row first thin', 'blocksolid_custom_data_1' => 'custom_style_padding_top_small', 'blocksolid_custom_data_2' => 'custom_style_padding_top_medium', 'blocksolid_custom_data_3' => 'custom_style_padding_top_large'); //Mod to below code to allow older PHP
             add_settings_field(
             'blocksolid_field_style_padding_top_small',
             __( 'Padding Top', 'blocksolid' ),'blocksolid_field_style_padding_top_cb','blocksolid','blocksolid_section_spacing_settings',$settings_field_array);

            $settings_field_array = array('reset_id_1' => 'blocksolid_field_style_padding_bottom_small', 'reset_id_2' => 'blocksolid_field_style_padding_bottom_medium', 'reset_id_3' => 'blocksolid_field_style_padding_bottom_large', 'label_for_1' => 'blocksolid_field_style_padding_bottom_small', 'label_for_2' => 'blocksolid_field_style_padding_bottom_medium', 'label_for_3' => 'blocksolid_field_style_padding_bottom_large', 'class' => 'blocksolid_row first thin', 'blocksolid_custom_data_1' => 'custom_style_padding_bottom_small', 'blocksolid_custom_data_2' => 'custom_style_padding_bottom_medium', 'blocksolid_custom_data_3' => 'custom_style_padding_bottom_large'); //Mod to below code to allow older PHP
             add_settings_field(
             'blocksolid_field_style_padding_bottom_small',
             __( 'Padding Bottom', 'blocksolid' ),'blocksolid_field_style_padding_bottom_cb','blocksolid','blocksolid_section_spacing_settings',$settings_field_array);

            $settings_field_array = array('reset_id_1' => 'blocksolid_field_style_padding_left_small', 'reset_id_2' => 'blocksolid_field_style_padding_left_medium', 'reset_id_3' => 'blocksolid_field_style_padding_left_large', 'label_for_1' => 'blocksolid_field_style_padding_left_small', 'label_for_2' => 'blocksolid_field_style_padding_left_medium', 'label_for_3' => 'blocksolid_field_style_padding_left_large', 'class' => 'blocksolid_row first thin', 'blocksolid_custom_data_1' => 'custom_style_padding_left_small', 'blocksolid_custom_data_2' => 'custom_style_padding_left_medium', 'blocksolid_custom_data_3' => 'custom_style_padding_left_large'); //Mod to below code to allow older PHP
             add_settings_field(
             'blocksolid_field_style_padding_left_small',
             __( 'Padding Left', 'blocksolid' ),'blocksolid_field_style_padding_left_cb','blocksolid','blocksolid_section_spacing_settings',$settings_field_array);

            $settings_field_array = array('reset_id_1' => 'blocksolid_field_style_padding_right_small', 'reset_id_2' => 'blocksolid_field_style_padding_right_medium', 'reset_id_3' => 'blocksolid_field_style_padding_right_large', 'label_for_1' => 'blocksolid_field_style_padding_right_small', 'label_for_2' => 'blocksolid_field_style_padding_right_medium', 'label_for_3' => 'blocksolid_field_style_padding_right_large', 'class' => 'blocksolid_row first thin', 'blocksolid_custom_data_1' => 'custom_style_padding_right_small', 'blocksolid_custom_data_2' => 'custom_style_padding_right_medium', 'blocksolid_custom_data_3' => 'custom_style_padding_right_large'); //Mod to below code to allow older PHP
             add_settings_field(
             'blocksolid_field_style_padding_right_small',
             __( 'Padding Right', 'blocksolid' ),'blocksolid_field_style_padding_right_cb','blocksolid','blocksolid_section_spacing_settings',$settings_field_array);

        }

	    $settings_field_array = array('reset_id' => 'blocksolid_field_allow_palette_control', 'label_for' => 'blocksolid_field_allow_palette_control', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_palette_control'); //Mod to below code to allow older PHP
	     add_settings_field(
	     'blocksolid_field_allow_palette_control',
	     __( 'Controlled palette', 'blocksolid' ),'blocksolid_field_allow_palette_control_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

	    if (isset($blocksolid_options['blocksolid_field_allow_palette_control'])){

	    	// - Color Settings

	        $i = 0;
	        $j = 0;

	        if (is_array($blocksolid_options)){

	            if (count($blocksolid_options)){

	                foreach ($blocksolid_options as $blocksolid_option) {

	                    if (isset($blocksolid_options['blocksolid_field_color'.$i])){
	                        if ($blocksolid_options['blocksolid_field_color'.$i] != ""){

	                            $settings_field_array = array('reset_id' => $j, 'label_for' => 'blocksolid_field_color'.$i.'', 'class' => 'blocksolid_row third', 'blocksolid_custom_data' => 'custom_color'.$j.'',  'final_color_in_list' => false); //Mod to below code to allow older PHP
	                             add_settings_field(
	                             'blocksolid_field_color'.$j.'',
	                             __( 'Color '.($j+1).'', 'blocksolid' ),'blocksolid_field_color_cb','blocksolid','blocksolid_section_color_settings',$settings_field_array);
	                            $j++;
	                        }
	                    }

	                    $i++;
	                }
	            }
	        }

	        $settings_field_array = array('reset_id' => $j, 'label_for' => 'blocksolid_field_color'.$i.'', 'class' => 'blocksolid_row', 'blocksolid_custom_data' => 'custom_color'.$j.'',  'final_color_in_list' => true); //Mod to below code to allow older PHP
	         add_settings_field(
	         'blocksolid_field_color'.$j.'',
	         __( 'Add a color ', 'blocksolid' ),'blocksolid_field_color_cb','blocksolid','blocksolid_section_color_settings',$settings_field_array);

	    }

        /* ----------------------------------------------------------------------------------------------- */

        if (isset($blocksolid_options['blocksolid_field_allow_palette_control'])){

        	// - Color Settings

            $i = 0;
            $j = 0;

            $classes_list = blocksolid_get_classes_list();

            if (is_array($classes_list)){

                if (count($classes_list)){

                    foreach ($classes_list as $blocksolid_option) {

                        $settings_field_array = array('reset_id' => $blocksolid_option, 'label_for' => 'blocksolid_field_color_assignment_'.$blocksolid_option.'', 'class' => 'blocksolid_row third', 'blocksolid_custom_data' => 'custom_color_assignment_'.$blocksolid_option.''); //Mod to below code to allow older PHP
                         add_settings_field(
                         'blocksolid_field_color_assignment'.$j.'',
                         __( ''.$blocksolid_option.'', 'blocksolid' ),'blocksolid_field_color_assignment_cb','blocksolid','blocksolid_section_color_assignment_settings',$settings_field_array);
                        $j++;

                    }

                }
            }
        }


        /* ----------------------------------------------------------------------------------------------- */

    }

    $settings_field_array = array('reset_id' => 'blocksolid_field_classes_list', 'label_for' => 'blocksolid_field_classes_list', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_classes_list'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_classes_list',
     __( 'Classes List', 'blocksolid' ),'blocksolid_field_classes_list_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

	$settings_field_array = array('reset_id' => 'blocksolid_field_allow_vc_converter', 'label_for' => 'blocksolid_field_allow_vc_converter', 'class' => 'blocksolid_row second', 'blocksolid_custom_data' => 'custom_allow_vc_converter'); //Mod to below code to allow older PHP
     add_settings_field(
     'blocksolid_field_allow_vc_converter',
     __( 'VC / WP Bakery Converter', 'blocksolid' ),'blocksolid_field_allow_vc_converter_cb','blocksolid','blocksolid_section_main_settings',$settings_field_array);

  }

}

/**
 * register our blocksolid_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'blocksolid_settings_init' );

/**
 * custom option and settings:
 * callback functions
 */

// developers section cb


function blocksolid_section_main_settings_cb( $args ) {

    if ( !(blocksolid_show_all_features())) {
        $blocksolid_show_all_features = false;
	}

	$blocksolid_setup_steps_remaining = blocksolid_check_setup_steps_remaining();

	if (is_array($blocksolid_setup_steps_remaining)){
		if (count($blocksolid_setup_steps_remaining)){
			foreach ($blocksolid_setup_steps_remaining as $blocksolid_setup_step_message){
    		   ?><div class="notice notice-error"><p><?php echo $blocksolid_setup_step_message; ?></p></div><p>&nbsp;</p><?php
			}
		}
	}

	$blocksolid_options = get_option( 'blocksolid_options');

	$jump_links = '';
	$jump_links .= '[<a href="#general-settings">General Settings</a>] ';

	if (isset($blocksolid_options['blocksolid_field_allow_spacing_controls'])){
		$jump_links .= '[<a href="#spacing-settings">Spacing Settings</a>] ';
	}

	if (isset($blocksolid_options['blocksolid_field_allow_palette_control'])) {
		$jump_links .= '[<a href="#color-settings">Color Settings</a>] ';
	}

	if (
		(isset($blocksolid_options['blocksolid_field_allow_animations'])) ||
		(isset($blocksolid_options['blocksolid_field_allow_background_images'])) ||
		(isset($blocksolid_options['blocksolid_field_allow_full_height_rows'])) ||
		(isset($blocksolid_options['blocksolid_field_allow_enhanced_gallery'])) ||
		(isset($blocksolid_options['blocksolid_field_allow_embed_limiting']))
	){
		$jump_links .= '[<a href="#pro-features">Pro Features</a>] ';
	}

	$jump_links .= '[<a href="#bottom-of-screen">Import &amp; Export</a>] ';

 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p style="text-align: center;"><img src="'.plugins_url( '/media/blocksolid-170.png', __FILE__ ).'" /></p>', 'blocksolid' ); ?></p>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p>&nbsp;</p>', 'blocksolid' ); ?></p>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p style="text-align: center;">Here you can manage settings that will be available in the Block Editor and your website.<br><br>Choose your settings and then click "<strong>Save Settings</strong>" to start using Blocksolid.<br><br><strong>Skip to:</strong> '.$jump_links.'<p><a name="general-settings"></a>&nbsp;</p><h2 class="blocksolid_section_heading">General Settings</h2>', 'blocksolid' ); ?></p>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p>&nbsp;</p>', 'blocksolid' ); ?></p>
<?php
}

function blocksolid_section_spacing_settings_cb( $args ) {
	if (blocksolid_show_all_features()){ ?>
		 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p><a name="spacing-settings"></a>&nbsp;</p><h2 class="blocksolid_section_heading">Spacing Settings <small>(Requires "Spacing controls")</small></h2><p>Set the available row and column vertical margins and paddings and column horizontal paddings for use in the Block Editor.  Ensure you include valid units (vh, %, px, em, or rem).  <span class="blocksolid_options_setting_link" id="blocksolid_options_set_defaults">[ Click here to set some typical values ]</span></p>', 'blocksolid' ); ?></p>
		 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p>You may set default spacings for your rows and columns within your theme\'s styles as in the CSS example below where a default value of 50px has been set for all spacings.</p>', 'blocksolid' ); ?></p>
		 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p>When used in the block editor your Spacing Settings allow you to vary your page layout by overriding the default values you have set within your theme\'s styles.</p>', 'blocksolid' ); ?></p>
		 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p>---------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>', 'blocksolid' ); ?></p>
		 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p><strong>.wp-block-columns {margin-top: 50px; margin-bottom: 50px; padding-top: 50px; padding-bottom: 50px;}</strong></p>', 'blocksolid' ); ?></p>
		 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p><strong>.wp-block-column {margin-top: 50px; margin-bottom: 50px; padding-top: 50px; padding-bottom: 50px; padding-left: 50px; padding-right: 50px;}</strong></p>', 'blocksolid' ); ?></p>
		 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p>---------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>', 'blocksolid' ); ?></p>
		<?php
	}
}

function blocksolid_field_allow_palette_control_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <label class="bs-switch"><input type='checkbox' class='blocksolid_option blocksolid_field_allow_palette_control' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Limit the available color palette to your specified colors and make these available as styles for your theme.</label>
<?php }


// name0 field cb

// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.

function blocksolid_field_main_column_width_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  <input type="text" placeholder="In px or vw" maxlength="10" size="15" id="<?php echo esc_attr( $args['reset_id'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for']]) : ""; ?>" />

	<?php global $wp_version;
    if ( (version_compare( floatval($wp_version), 5.8, '>=' ) )) {
		?><p><br>The maximum width of rows if set to "Wide Width" in the Block Editor e.g. 1480px or 90vw<br><br>If you want to use WordPress 5.8 and above's <a href="https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/" target="_blank">theme.json</a> to control this instead set the value to <strong>0</strong> and it will be ignored in favour of any theme.json found.  Note that doing this will disable <strong>Stretched Row Backgrounds</strong>.</p><?php
    } ?>

<?php }

function blocksolid_field_allow_editor_overlay_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  <label class="bs-switch"><input type='checkbox' class='blocksolid_option' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>This setting dictates if the default state for users is having the overlay on or off.<br><br>The overlay adds styles to the block editor core blocks to make block boundaries stand out, including:</label><br><br>
	<p>Working space wider.  Blocks gain thin visible borders.  Rows and column blocks gain visible borders with grab handles.  'Add Title' block takes up less screen space.  Buttons take up less space.  Font sizes reduced and sans-serif.  Spacing block stands out. Reusable block inline tools hidden (they remain accessible in the context menu).</p>

<?php }

function blocksolid_field_allow_spacing_controls_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  <label class="bs-switch"><input type='checkbox' class='blocksolid_option' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Rows and columns have controls for top and bottom margin and padding.  Columns have controls for left and right padding.  Margins between columns can be hidden.  The Layout panel is hidden.</label>
<?php }

function blocksolid_field_allow_default_content_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  <label class="bs-switch"><input type='checkbox' class='blocksolid_option' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>By default when a new empty page is added in the editor it contains a columns block ready to add new content.</label><br><br>
<?php }

function blocksolid_field_allow_theme_options_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  <label class="bs-switch"><input type='checkbox' class='blocksolid_option' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Set specific editor and theme options including:</label><br><br>
  <p>Hide gradient options, add theme support for "custom-spacing", "disable-custom-colors", "disable-custom-gradients", "custom-units", "editor-styles", "dark-editor-style", remove "experimental-editor-gradient-presets"</p>

  <?php global $wp_version;
    if ( (version_compare( floatval($wp_version), 5.8, '>=' ) )) {
		?><p><br>Consider using WordPress 5.8 and above's <a href="https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/" target="_blank">theme.json</a> to control these within your theme instead.<br><br><a href="<?php echo plugins_url( '/media/theme.json', __FILE__ ); ?>" target="_blank"><strong>Download a default strict theme.json</strong></a> to use with your theme which implements many of the above controls and also allows the use of the controlled palette.</p><?php
    } ?>

<?php }

function blocksolid_field_allow_stretched_rows_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <label class="bs-switch"><input type='checkbox' class='blocksolid_option' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Row backgrounds can be stretched horizontally to fill the viewport (if your theme allows this).<br><br>This option will be ignored if the Main Column Width is set to 0.</label>
<?php }

function blocksolid_field_allow_mobile_hide_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <label class="bs-switch"><input type='checkbox' class='blocksolid_option_pro' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Rows and columns can be hidden on mobile - adds a CSS class of <strong>mobile-hide</strong> to the row or column to which you can set a CSS rule such as <strong>@media (max-width: 768px) {.mobile-hide {display: none;}}</strong>.</label>
<?php }

function blocksolid_field_allow_background_images_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <label class="bs-switch"><input type='checkbox' class='blocksolid_option_pro' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Rows can have background images.</label>
<?php }

function blocksolid_field_allow_disabled_rows_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <label class="bs-switch"><input type='checkbox' class='blocksolid_option_pro' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Rows can be disabled - adds a CSS class of <strong>row-disabled</strong> to the row to which you can set a CSS rule such as <strong>.row-disabled {display: none;}</strong>.</label>
<?php }

function blocksolid_field_allow_row_and_column_links_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <label class="bs-switch"><input type='checkbox' class='blocksolid_option_pro' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Rows and columns can be links.</label>
<?php }

function blocksolid_field_style_margin_top_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  &nbsp; Small <input class="pwd-vertical-spacing-option small" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_1'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_1'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_1'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_1']]) : ""; ?>" />
  &nbsp; Medium <input class="pwd-vertical-spacing-option medium" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_2'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_2'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_2'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_2']]) : ""; ?>" />
  &nbsp; Large <input class="pwd-vertical-spacing-option large" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_3'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_3'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_3'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_3']]) : ""; ?>" />
 <?php }

function blocksolid_field_style_margin_bottom_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  &nbsp; Small <input class="pwd-vertical-spacing-option small" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_1'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_1'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_1'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_1']]) : ""; ?>" />
  &nbsp; Medium <input class="pwd-vertical-spacing-option medium" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_2'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_2'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_2'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_2']]) : ""; ?>" />
  &nbsp; Large <input class="pwd-vertical-spacing-option large" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_3'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_3'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_3'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_3']]) : ""; ?>" />
 <?php }

function blocksolid_field_style_padding_top_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  &nbsp; Small <input class="pwd-vertical-spacing-option small" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_1'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_1'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_1'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_1']]) : ""; ?>" />
  &nbsp; Medium <input class="pwd-vertical-spacing-option medium" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_2'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_2'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_2'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_2']]) : ""; ?>" />
  &nbsp; Large <input class="pwd-vertical-spacing-option large" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_3'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_3'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_3'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_3']]) : ""; ?>" />
 <?php }

function blocksolid_field_style_padding_bottom_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  &nbsp; Small <input class="pwd-vertical-spacing-option small" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_1'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_1'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_1'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_1']]) : ""; ?>" />
  &nbsp; Medium <input class="pwd-vertical-spacing-option medium" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_2'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_2'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_2'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_2']]) : ""; ?>" />
  &nbsp; Large <input class="pwd-vertical-spacing-option large" type="text" placeholder="In px, em or vh" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_3'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_3'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_3'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_3']]) : ""; ?>" />
 <?php }

function blocksolid_field_style_padding_left_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  &nbsp; Small <input class="pwd-horizontal-spacing-option small" type="text" placeholder="In px, em or vw" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_1'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_1'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_1'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_1']]) : ""; ?>" />
  &nbsp; Medium <input class="pwd-horizontal-spacing-option medium" type="text" placeholder="In px, em or vw" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_2'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_2'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_2'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_2']]) : ""; ?>" />
  &nbsp; Large <input class="pwd-horizontal-spacing-option large" type="text" placeholder="In px, em or vw" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_3'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_3'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_3'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_3']]) : ""; ?>" />
 <?php }

function blocksolid_field_style_padding_right_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  &nbsp; Small <input class="pwd-horizontal-spacing-option small" type="text" placeholder="In px, em or vw" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_1'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_1'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_1'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_1'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_1']]) : ""; ?>" />
  &nbsp; Medium <input class="pwd-horizontal-spacing-option medium" type="text" placeholder="In px, em or vw" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_2'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_2'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_2'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_2'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_2']]) : ""; ?>" />
  &nbsp; Large <input class="pwd-horizontal-spacing-option large" type="text" placeholder="In px, em or vw" maxlength="5" size="12" id="<?php echo esc_attr( $args['reset_id_3'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data_3'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" id="blocksolid_options[<?php echo esc_attr( $args['reset_id_3'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for_3'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for_3']]) : ""; ?>" />
 <?php }


function blocksolid_section_color_settings_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p><a name="color-settings"></a>&nbsp;</p><h2 class="blocksolid_section_heading">Color Settings <small>(Requires "Controlled palette")</small></h2><p>To add additional colors and make them available in the Block Editor and as styles in your website add a new color to the bottom of the list and save. Currently colors need to be added one at a time.<br><br>Delete a color value from the list and save to remove a color.<br><br>Color variables to use in your theme\'s stylesheet are shown next to each selected color.</p>', 'blocksolid' ); ?></p>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '', 'blocksolid' ); ?></p>
<?php
}

function blocksolid_field_color_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <input type="text" class="color-picker" placeholder="E.g. <?php echo blocksolid_get_default_blocksolid_option('blocksolid_field_color'); ?>" maxlength="7" size="10" id="blocksolid_field_color<?php echo esc_attr( $args['reset_id'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>" name="blocksolid_options[blocksolid_field_color<?php echo esc_attr( $args['reset_id'] ); ?>]" id="blocksolid_options[blocksolid_field_color<?php echo esc_attr( $args['reset_id'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for']]) : ""; ?>" /> <span class="blocksolid_color_block" id="blocksolid_color_block_<?php echo esc_attr( $args['reset_id'] ); ?>" style="">&nbsp;</span>
    <input type="hidden" class="blocksolid_color_name" maxlength="20" size="20" id="blocksolid_field_name<?php echo esc_attr( $args['reset_id'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>" name="blocksolid_options[blocksolid_field_name<?php echo esc_attr( $args['reset_id'] ); ?>]" id="blocksolid_options[blocksolid_field_name<?php echo esc_attr( $args['reset_id'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for']]) : ""; ?>" />
    <input type="hidden" class="blocksolid_color_slug" maxlength="20" size="20" id="blocksolid_field_slug<?php echo esc_attr( $args['reset_id'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>" name="blocksolid_options[blocksolid_field_slug<?php echo esc_attr( $args['reset_id'] ); ?>]" id="blocksolid_options[blocksolid_field_slug<?php echo esc_attr( $args['reset_id'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for']]) : ""; ?>" />

	<?php

	if (($args['final_color_in_list']) && ($args['reset_id'] > 0) ){ ?>
		<br><br><p class="description"><a href="#" id="save_controlled_palette"><?php esc_html_e( 'Download a stylesheet containing the current saved controlled palette that you could use in your theme', 'blocksolid' ); ?></a></p>
	<?php } ?>

<?php }

function blocksolid_field_classes_list_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
  <input type="text" placeholder="optionally supply string values separated by spaces" maxlength="250" size="100" id="<?php echo esc_attr( $args['reset_id'] ); ?>" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>" name="blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]" value="<?php echo isset( $blocksolid_options[ $args['label_for'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ $args['label_for']]) : ""; ?>" /><p><br>Set up a list of user-selectable classes for your rows and columns.  <strong>Leave blank if not required.</strong></p>
 <?php }

/* ------------------------------------------------------------------------------- */

function blocksolid_section_color_assignment_settings_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '<p><a name="color-assignment-settings"></a>&nbsp;</p><h2 class="blocksolid_section_heading">Color Assignment Settings <small>(Requires "Controlled palette")</small></h2><p>Optionally apply your styles to your columns blocks, column blocks or to the classic block text or link color within them.<br><br>These color choices will then be applied when your page is viewed in the editor with the Blocksolid Overlay.<br>You can choose to also reflect your styles in the front-end website rather than use your own styles for this. </p>', 'blocksolid' ); ?></p>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e( '', 'blocksolid' ); ?></p>
<?php
}

function blocksolid_get_color_scheme(){

	$blocksolid_options = get_option( 'blocksolid_options' );

    $found_colors = array();

    if (is_array($blocksolid_options)){
        if (count($blocksolid_options)){

            $k = 0;

            foreach($blocksolid_options as $blocksolid_option){

	            if (isset($blocksolid_options['blocksolid_field_name'.$k])){
                  	if ($blocksolid_options['blocksolid_field_name'.$k] != ""){
	                    $found_colors[$k] = array(
	                    	'id' => $k,
	                    	'name' => __( $blocksolid_options['blocksolid_field_name'.$k], 'themeLangDomain' ),
	                    	'slug' => $blocksolid_options['blocksolid_field_slug'.$k],
	                    	'color' => $blocksolid_options['blocksolid_field_color'.$k]
	                    );
                    }
                }
	            $k++;
            }

        }
    }

	return $found_colors;

}


function blocksolid_field_color_assignment_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <?php

	$found_colors = blocksolid_get_color_scheme();

    if (is_array($found_colors)){
        if (count($found_colors)){

         // output the field
         ?>
         <label>Rows or columns</label>
         <select id="blocksolid_options[blocksolid_field_color_assignment_rows_columns_<?php echo esc_attr( $args['reset_id'] ); ?>]"
         data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>"
         name="blocksolid_options[blocksolid_field_color_assignment_rows_columns_<?php echo esc_attr( $args['reset_id'] ); ?>]"
         >
         <option value="">Default</option>
        <?php
        foreach ($found_colors as $found_color){
            if (blocksolid_is_hex_light($found_color['color'])){$contrast_color = '#202020';}else{$contrast_color = '#ffffff';}
        ?>
         <option style="color: <?php echo $contrast_color ?>; background-color: <?php echo $found_color['color']; ?>;" value="<?php echo $found_color['id']; ?>" <?php echo isset( $blocksolid_options[ 'blocksolid_field_color_assignment_rows_columns_'.$args['reset_id' ]] ) ? ( selected( $blocksolid_options[ 'blocksolid_field_color_assignment_rows_columns_'.$args['reset_id' ] ], $found_color['id'], false ) ) : ( '' ); ?>>
         <?php esc_html_e( $found_color['name'] ); ?>
         </option>
        <?php } ?>

        </select>

        <label>Opacity (%)</label>

        <input type="number" min="0" max="100" placeholder="%" maxlength="3" size="1" id="blocksolid_options[blocksolid_field_color_assignment_rows_columns_opacity_<?php echo esc_attr( $args['reset_id'] ); ?>]" data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>" name="blocksolid_options[blocksolid_field_color_assignment_rows_columns_opacity_<?php echo esc_attr( $args['reset_id'] ); ?>]" value="<?php echo isset( $blocksolid_options[ 'blocksolid_field_color_assignment_rows_columns_opacity_'.$args['reset_id'] ] ) ? blocksolid_sanitize_text($blocksolid_options[ 'blocksolid_field_color_assignment_rows_columns_opacity_'.$args['reset_id']]) : "100"; ?>" />

        <span>&nbsp; &nbsp; &nbsp; &nbsp;</span>

         <label>Text</label>
         <select id="blocksolid_options[blocksolid_field_color_assignment_text_<?php echo esc_attr( $args['reset_id'] ); ?>]"
         data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>"
         name="blocksolid_options[blocksolid_field_color_assignment_text_<?php echo esc_attr( $args['reset_id'] ); ?>]"
         >
         <option value="">Default</option>
        <?php
        foreach ($found_colors as $found_color){
            if (blocksolid_is_hex_light($found_color['color'])){$contrast_color = '#202020';}else{$contrast_color = '#ffffff';}
        ?>
         <option style="color: <?php echo $contrast_color ?>; background-color: <?php echo $found_color['color']; ?>;" value="<?php echo $found_color['id']; ?>" <?php echo isset( $blocksolid_options[ 'blocksolid_field_color_assignment_text_'.$args['reset_id'] ] ) ? ( selected( $blocksolid_options[ 'blocksolid_field_color_assignment_text_'.$args['reset_id'] ], $found_color['id'], false ) ) : ( '' ); ?>>
         <?php esc_html_e( $found_color['name'] ); ?>
         </option>
        <?php } ?>

        </select>

        <span>&nbsp; &nbsp;</span>

         <label>Links</label>
         <select id="blocksolid_options[blocksolid_field_color_assignment_links_<?php echo esc_attr( $args['reset_id'] ); ?>]"
         data-custom="<?php echo esc_attr( $args['blocksolid_custom_data'] ); ?>"
         name="blocksolid_options[blocksolid_field_color_assignment_links_<?php echo esc_attr( $args['reset_id'] ); ?>]"
         >
         <option value="">Default</option>
        <?php
        foreach ($found_colors as $found_color){
            if (blocksolid_is_hex_light($found_color['color'])){$contrast_color = '#202020';}else{$contrast_color = '#ffffff';}
        ?>
         <option style="color: <?php echo $contrast_color ?>; background-color: <?php echo $found_color['color']; ?>;" value="<?php echo $found_color['id']; ?>" <?php echo isset( $blocksolid_options[ 'blocksolid_field_color_assignment_links_'.$args['reset_id' ]] ) ? ( selected( $blocksolid_options[ 'blocksolid_field_color_assignment_links_'.$args['reset_id' ] ], $found_color['id'], false ) ) : ( '' ); ?>>
         <?php esc_html_e( $found_color['name'] ); ?>
         </option>
        <?php } ?>

        </select>

        <span>&nbsp; &nbsp;</span>

        <label class="bs-switch"><input type='checkbox' class='blocksolid_option blocksolid_field_color_assignment_front_end' name='blocksolid_options[blocksolid_field_color_assignment_front_end_<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[blocksolid_field_color_assignment_front_end_<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ 'blocksolid_field_color_assignment_front_end_'.$args['reset_id'] ] ) ? $blocksolid_options[ 'blocksolid_field_color_assignment_front_end_'.$args['reset_id']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'>Use on front-end?</label>

        <?php

        }
    }

    ?>

<?php }


/* ------------------------------------------------------------------------------- */

function blocksolid_field_allow_vc_converter_cb( $args ) {$blocksolid_options = get_option( 'blocksolid_options' ); ?>
    <label class="bs-switch"><input type='checkbox' class='blocksolid_option_pro' name='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' id='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]' <?php checked( isset( $blocksolid_options[ $args['label_for'] ] ) ? $blocksolid_options[ $args['label_for']] : "", 1 ); ?> value='1'><div class="bs-slider bs-round"></div></label> <label for='blocksolid_options[<?php echo esc_attr( $args['reset_id'] ); ?>]'><strong>Beta</strong> - Add a 'Copy to Gutenberg' link to row actions on the Admin Pages list.  This allows cloning of a page with conversion of some Visual Composer / WP Bakery shortcodes to Gutenberg blocks.</label>
<?php }

// Blocksolid systems check
function blocksolid_check_setup_steps_remaining(){

	$blocksolid_options = get_option( 'blocksolid_options');

	$blocksolid_setup_steps_remaining = array();

    if (!(blocksolid_show_all_features())) {
		global $blocksolid_minimum_wordpress_version;
		$blocksolid_setup_steps_remaining[] = "Wordpress version below ".$blocksolid_minimum_wordpress_version."! To use all features of Blocksolid you need to be using WordPress version 5.5 or above.  The Main Column Width, Block Editor Overlay and Theme options may work but with some cosmetic issues.  All other features will be disabled until you have upgraded WordPress.";
    }

    if (!(blocksolid_is_gutenberg_active())) {
    	$blocksolid_setup_steps_remaining[] = "Gutenberg not detected! To use Blocksolid you need to be using the WordPress Block Editor that is build into WordPress.  A theme or a plugin such as 'Classic Editor' has deactivated this.  Please check your themes and plugins and reactivate the Block Editor.";
    }

	if (!(is_array($blocksolid_options))){
		$blocksolid_setup_steps_remaining[] = "Please set some options for Blocksolid";
	}

	if (is_array($blocksolid_options)){

		if (($blocksolid_options['blocksolid_field_main_column_width']) == ""){
			$blocksolid_setup_steps_remaining[] = "Please set a Main Column Width e.g. 1480px or set it to 0";
		}

		if (isset($blocksolid_options['blocksolid_field_allow_palette_control'])){
			if ($blocksolid_options['blocksolid_field_allow_palette_control']){

				$controlled_palette_has_no_colors = false;

				if (!(isset($blocksolid_options['blocksolid_field_color0']))){
					$controlled_palette_has_no_colors = true;
				}elseif (!($blocksolid_options['blocksolid_field_color0'])){

					if (isset($blocksolid_options['blocksolid_field_color1'])){
						if (!($blocksolid_options['blocksolid_field_color1'])){
							$controlled_palette_has_no_colors = true;
						}
					}else{
						$controlled_palette_has_no_colors = true;
					}
				}

				if ($controlled_palette_has_no_colors){
					$blocksolid_setup_steps_remaining[] = "Please add at least one color to your Controlled Palette";
				}
			}
		}

		if (isset($blocksolid_options['blocksolid_field_allow_spacing_controls'])){
			if ($blocksolid_options['blocksolid_field_allow_spacing_controls']){

				$individual_spacing_controls_not_all_set = false;

				if (!(isset($blocksolid_options['blocksolid_field_style_margin_top_small']))){
					$individual_spacing_controls_not_all_set = true;
				}elseif (!(
					($blocksolid_options['blocksolid_field_style_margin_top_small']) &&
					($blocksolid_options['blocksolid_field_style_margin_top_medium']) &&
					($blocksolid_options['blocksolid_field_style_margin_top_large']) &&
					($blocksolid_options['blocksolid_field_style_margin_bottom_small']) &&
					($blocksolid_options['blocksolid_field_style_margin_bottom_medium']) &&
					($blocksolid_options['blocksolid_field_style_margin_bottom_large']) &&
					($blocksolid_options['blocksolid_field_style_padding_top_small']) &&
					($blocksolid_options['blocksolid_field_style_padding_top_medium']) &&
					($blocksolid_options['blocksolid_field_style_padding_top_large']) &&
					($blocksolid_options['blocksolid_field_style_padding_bottom_small']) &&
					($blocksolid_options['blocksolid_field_style_padding_bottom_medium']) &&
					($blocksolid_options['blocksolid_field_style_padding_bottom_large']) &&
					($blocksolid_options['blocksolid_field_style_padding_left_small']) &&
					($blocksolid_options['blocksolid_field_style_padding_left_medium']) &&
					($blocksolid_options['blocksolid_field_style_padding_left_large']) &&
					($blocksolid_options['blocksolid_field_style_padding_right_small']) &&
					($blocksolid_options['blocksolid_field_style_padding_right_medium']) &&
					($blocksolid_options['blocksolid_field_style_padding_right_large'])
				)){
					$individual_spacing_controls_not_all_set = true;
				}

				if ($individual_spacing_controls_not_all_set){
					$blocksolid_setup_steps_remaining[] = "Please supply all of your Spacing Settings";
				}
			}
		}
	}

	return $blocksolid_setup_steps_remaining;

}


add_action( 'admin_menu', function() {

	$blocksolid_setup_steps_remaining = blocksolid_check_setup_steps_remaining();

	if (is_array($blocksolid_setup_steps_remaining)){
		if (count($blocksolid_setup_steps_remaining)){

			global $menu;

			$count = 1;

			$menu_item = wp_list_filter(
				$menu,
				array( 2 => 'options-general.php' ) // 2 is the position of an array item which contains URL, it will always be 2!
			);

			if ( ! empty( $menu_item )  ) {
				$menu_item_position = key( $menu_item ); // get the array key (position) of the element
				$menu[ $menu_item_position ][0] .= ' <span class="awaiting-mod">' . $count . '</span>';
			}

		}
	}

});


/**
 * top level menu
 */
function blocksolid_options_page() {

  $show_blocksolid_settings = true;

  if (is_multisite()){
    if ( !(current_user_can( 'setup_network' ) )) {
      $show_blocksolid_settings = false;
    }
  }else{
    if ( !(current_user_can( 'manage_options' ) )) {
      $show_blocksolid_settings = false;
    }
  }

  if ($show_blocksolid_settings){

	$blocksolid_notification_count = 0;

	$blocksolid_setup_steps_remaining = blocksolid_check_setup_steps_remaining();

	if (is_array($blocksolid_setup_steps_remaining)){
		if (count($blocksolid_setup_steps_remaining)){
			$blocksolid_notification_count = count($blocksolid_setup_steps_remaining);
		}
	}

	$notification_bubble = "";

	if ($blocksolid_notification_count){
		$notification_bubble = ' <span class="awaiting-mod"><strong>' . $blocksolid_notification_count . '</strong></span>';
	}

    // add menu page under Settings
    add_options_page(
        '',
        'Blocksolid'.$notification_bubble,
        'manage_options',
        'blocksolid.php',
        'blocksolid_options_page_html'
    );

  }

}

/**
 * register our blocksolid_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'blocksolid_options_page' );

/**
 * top level menu:
 * callback functions
 */
function blocksolid_options_page_html() {
   // check user capabilities
   if ( ! current_user_can( 'manage_options' ) ) {
   return;
   }

   // show error/update messages
   settings_errors( 'blocksolid_messages' );
   ?>
   <div class="wrap">
   <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
   <form action="options.php" method="post" id="blocksolid_options">
   <?php

   // output save settings button
   submit_button( 'Save Settings', 'button-primary ' );

   // output security fields for the registered setting "blocksolid"
   settings_fields( 'blocksolid' );
   // output setting sections and their fields
   // (sections are registered for "blocksolid", each field is registered to a specific section)
   do_settings_sections( 'blocksolid' );

   ?>

   <hr class="blocksolid-section-divider" />


   <?php

   // output save settings button
   submit_button( 'Save Settings', 'button-primary ' );
   ?>
   </form>

    <p><?php _e( '<p><a name="import-export"></a>&nbsp;</p><h2 class="blocksolid_section_heading">Import &amp; Export </h2><p>Click "Export settings" to save your current saved settings to a file.  Note that you must save your settings first.</p>', 'blocksolid' ); ?></p>

    <?php
    // output export settings button
    submit_button( 'Export Settings', 'button', 'blocksolid_export_settings' );
    ?>

    <hr class="blocksolid-section-divider" />

    <p><?php _e( '<p>Choose "Import Settings" to upload a file containing previously exported settings.</p>', 'blocksolid' ); ?></p>
    <p><?php _e( '&nbsp;', 'blocksolid' ); ?></p>

    <form id="blocksolid_settings_upload_form" action="" method="POST" class="" enctype="multipart/form-data">
		<input type="file" id="blocksolid_settings_input" class="blocksolid-settings-input" title="" />
        <input type="submit" name="blocksolid_import_settings" id="blocksolid_import_settings" class="button" value="Import Settings"  />
    </form>

    <div id="blocksolid_file_upload_message"></div><p>&nbsp;</p>

    <a name="bottom-of-screen"></a>

   </div>
   <?php
}

// -------------------------------------------------------------------------------------------------------------------------------

// Function for custom REST APIs and also Init function

function get_current_overlay_active_setting($current_user_id,$overlay_active_by_default) {

   	$current_user_overlay_active = false; // Default

    if ($current_user_id){

        if ( metadata_exists( 'user', $current_user_id, 'blocksolid_overlay_active' ) ) {

            $current_user_overlay_active_array = array();
            $current_user_overlay_active_array = get_user_meta( $current_user_id, 'blocksolid_overlay_active' );

            if ($current_user_overlay_active_array[0]){
                $current_user_overlay_active = true;
            }

        }else{
            update_user_meta($current_user_id, 'blocksolid_overlay_active', $overlay_active_by_default); // If not set at all set it to the default
            $current_user_overlay_active = $overlay_active_by_default;
        }

    }

    return $current_user_overlay_active;

}

// -------------------------------------------------------------------------------------------------------------------------------

// website.com/wp-json/blocksolid/v1/get_current_overlay_active_setting_rest/1

function get_current_overlay_active_setting_rest($request){ // Custom REST API Endpoint

    $current_user_id = $request['user_id'];

    if ( ! empty( $current_user_id ) ) {

        if (get_userdata( $current_user_id )){

        	$blocksolid_options = get_option( 'blocksolid_options');

        	$overlay_active_by_default = false;

        	if (isset($blocksolid_options['blocksolid_field_allow_editor_overlay'])){
        		if ($blocksolid_options['blocksolid_field_allow_editor_overlay']){
        			$overlay_active_by_default = true;
        		}
        	}

            $current_user_overlay_active = get_current_overlay_active_setting($current_user_id,$overlay_active_by_default);

            if ($current_user_overlay_active){
                return new WP_REST_Response( true, 200 );
            }else{
                return new WP_REST_Response( false, 200 );
            }
        }else{
    		return new WP_REST_Response( [
    			'message' => 'User not found',
    		], 400 );
        }

    } else {
		return new WP_REST_Response( [
			'message' => 'User not requested',
		], 400 );
	}

}
// change to methods and POST,GET

add_action('rest_api_init', function () {
    register_rest_route( 'blocksolid/v1', '/get_current_overlay_active_setting_rest/(?P<user_id>\d+)', array(
        'methods'  => 'POST,GET',
        'callback' => 'get_current_overlay_active_setting_rest',
		'permission_callback' => '__return_true',
		'args'                => array('user_id' => array(
        'validate_callback' => function($param, $request, $key) {
          return is_numeric( $param );
        }),),
    ));
});

// -------------------------------------------------------------------------------------------------------------------------------

// website.com/wp-json/blocksolid/v1/toggle_overlay_active_setting_rest/1

function toggle_overlay_active_setting_rest($request){ // Custom REST API Endpoint

    $current_user_id = $request['user_id'];

    if ( ! empty( $current_user_id ) ) {

        if (get_userdata( $current_user_id )){

        	$blocksolid_options = get_option( 'blocksolid_options');

        	$overlay_active_by_default = false;

        	if (isset($blocksolid_options['blocksolid_field_allow_editor_overlay'])){
        		if ($blocksolid_options['blocksolid_field_allow_editor_overlay']){
        			$overlay_active_by_default = true;
        		}
        	}

            $current_user_overlay_active = get_current_overlay_active_setting($current_user_id,$overlay_active_by_default);

            if ($current_user_overlay_active){
                update_user_meta($current_user_id, 'blocksolid_overlay_active', false);
                return new WP_REST_Response( false, 200 );
            }else{
                update_user_meta($current_user_id, 'blocksolid_overlay_active', true);
                return new WP_REST_Response( true, 200 );
            }
        }else{
    		return new WP_REST_Response( [
    			'message' => 'User not found',
    		], 400 );
        }

    } else {
		return new WP_REST_Response( [
			'message' => 'User not requested',
		], 400 );
	}

}
// change to methods and POST,GET

add_action('rest_api_init', function () {
    register_rest_route( 'blocksolid/v1', '/toggle_overlay_active_setting_rest/(?P<user_id>\d+)', array(
        'methods'  => 'POST,GET',
        'callback' => 'toggle_overlay_active_setting_rest',
		'permission_callback' => function() {
          return current_user_can('edit_posts');
      	},
		'args'                => array('user_id' => array(
        'validate_callback' => function($param, $request, $key) {
          return is_numeric( $param );
        }),),
    ));
});

// https://awhitepixel.com/blog/in-depth-guide-in-creating-and-fetching-custom-wp-rest-api-endpoints/
// https://stackoverflow.com/questions/47455745/
// https://wordpress.stackexchange.com/questions/388822/

// -------------------------------------------------------------------------------------------------------------------------------

// website.com/wp-json/blocksolid/v1/initiate_vc_converter/1

function initiate_vc_converter($request){ // Custom REST API Endpoint

    $current_post_id = $request['post_id'];
    $_wpnonce = $request['_wpnonce'];

    if ( ! empty( $current_post_id ) ) {

       	$blocksolid_options = get_option( 'blocksolid_options');

       	if (isset($blocksolid_options['blocksolid_field_allow_vc_converter'])){
			blocksolid_vcconvert_convert_page($current_post_id,true,$_wpnonce);
    		return new WP_REST_Response( [
    			'message' => 'A new page has been created from this one with any Visual Composer / WP Bakery shortcodes within it converted to blocks where possible.  The new page will be shown within the pages list and will have the same title as this page with "- Converted" tacked onto the end.',
    		], 200 );
       	}else{
    		return new WP_REST_Response( [
    			'message' => 'Setting turned off',
    		], 400 );
		}

    } else {
		return new WP_REST_Response( [
			'message' => 'Post id not requested',
		], 400 );
	}

}
// change to methods and POST,GET

add_action('rest_api_init', function () {
    register_rest_route( 'blocksolid/v1', '/initiate_vc_converter/(?P<post_id>\d+)', array(
        'methods'  => 'POST,GET',
        'callback' => 'initiate_vc_converter',
		'permission_callback' => function() {
          return current_user_can('edit_posts');
      	},
		'args'                => array('post_id' => array(
        'validate_callback' => function($param, $request, $key) {
          return is_numeric( $param );
        }),),
    ));
});

// -------------------------------------------------------------------------------------------------------------------------------

// Core Block Edits

add_action('init', function() {

	$blocksolid_options = get_option( 'blocksolid_options');

	$overlay_active_by_default = false; // We are passing this parameter to 'block-pwd-adjustment-document-settings-js' - we could send more!

	if (isset($blocksolid_options['blocksolid_field_allow_editor_overlay'])){
		if ($blocksolid_options['blocksolid_field_allow_editor_overlay']){
			$overlay_active_by_default = true;
		}
	}

	// Get preference of current user
	$current_user = wp_get_current_user();
	$current_user_id  = $current_user->ID; // The current user ID

	$current_user_overlay_active = get_current_overlay_active_setting($current_user_id,$overlay_active_by_default);

	global $wp_version;

	$blocksolid_wordpress_version_above_five_nine = false; // Sending for backward compatibility
	if ( (version_compare( floatval($wp_version), 5.9, '>=' ) )) {
		$blocksolid_wordpress_version_above_five_nine = true;
	}

	$blocksolid_allow_vc_converter = false;
    if (isset($blocksolid_options['blocksolid_field_allow_vc_converter'])){
		$blocksolid_allow_vc_converter = true;
    }

	$js_data = array(
		'blocksolid_field_allow_editor_overlay' => $overlay_active_by_default,
		'blocksolid_current_user_id' => $current_user_id,
		'blocksolid_wordpress_version_above_five_nine' => $blocksolid_wordpress_version_above_five_nine,
		'blocksolid_wordpress_version' => floatval($wp_version),
		'blocksolid_current_user_overlay_active' => $current_user_overlay_active,
		'blocksolid_allow_vc_converter' => $blocksolid_allow_vc_converter,
	);

    wp_register_script( 'block-pwd-adjustment-document-settings-js', plugins_url( '/gutenberg/block-pwd-adjustment-document-settings.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
    register_block_type('pwd/adjustment-document-settings', [
        'editor_script' => 'block-pwd-adjustment-document-settings-js'
    ]);

	wp_localize_script(
	  'block-pwd-adjustment-document-settings-js',
	  'jsData',
	  $js_data
	);

    if (isset($blocksolid_options['blocksolid_field_allow_mobile_hide'])){
        wp_register_script( 'block-pwd-adjustment-mobile-visibility-js', plugins_url( '/gutenberg/block-pwd-adjustment-mobile-visibility.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
        register_block_type('pwd/adjustment-mobile-visibility', [
            'editor_script' => 'block-pwd-adjustment-mobile-visibility-js',
        ]);
    }

    if (isset($blocksolid_options['blocksolid_field_allow_disabled_rows'])){
        wp_register_script( 'block-pwd-adjustment-disable-row-js', plugins_url( '/gutenberg/block-pwd-adjustment-disable-row.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
        register_block_type('pwd/adjustment-disable-row', [
            'editor_script' => 'block-pwd-adjustment-disable-row-js',
        ]);
    }

    if (isset($blocksolid_options['blocksolid_field_allow_background_images'])){
        wp_register_script( 'block-pwd-adjustment-row-background-image-js', plugins_url( '/gutenberg/block-pwd-adjustment-row-background-image.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
        register_block_type('pwd/adjustment-row-background-image', [
            'editor_script' => 'block-pwd-adjustment-row-background-image-js',
        ]);
    }

    if (isset($blocksolid_options['blocksolid_field_allow_row_and_column_links'])){
        wp_register_script( 'block-pwd-adjustment-link-wrap-js', plugins_url( '/gutenberg/block-pwd-adjustment-link-wrap.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
        register_block_type('pwd/adjustment-link-wrap', [
            'editor_script' => 'block-pwd-adjustment-link-wrap-js',
        ]);
    }

	if (isset($blocksolid_options['blocksolid_field_allow_spacing_controls'])){

	    wp_register_script( 'block-pwd-adjustment-column-margins-js', plugins_url( '/gutenberg/block-pwd-adjustment-column-margins.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
		register_block_type('pwd/adjustment-column-margins', [
			'editor_script' => 'block-pwd-adjustment-column-margins-js',
		]);

	    wp_register_script( 'block-pwd-adjustment-vertical-spacings-js', plugins_url( '/gutenberg/block-pwd-adjustment-vertical-spacings.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
		register_block_type('pwd/adjustment-vertical-spacings', [
			'editor_script' => 'block-pwd-adjustment-vertical-spacings-js',
		]);

	    wp_register_script( 'block-pwd-adjustment-horizontal-spacings-js', plugins_url( '/gutenberg/block-pwd-adjustment-horizontal-spacings.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
		register_block_type('pwd/adjustment-horizontal-spacings', [
			'editor_script' => 'block-pwd-adjustment-horizontal-spacings-js',
		]);

	    if (isset($blocksolid_options['blocksolid_field_allow_stretched_rows'])){
			if ($blocksolid_options['blocksolid_field_main_column_width'] > 1){
		        wp_register_script( 'block-pwd-adjustment-stretch-row-js', plugins_url( '/gutenberg/block-pwd-adjustment-stretch-row.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
		        register_block_type('pwd/adjustment-stretch-row', [
		            'editor_script' => 'block-pwd-adjustment-stretch-row-js',
		        ]);
		    }
	    }

	    wp_register_script( 'block-pwd-adjustment-image-alignfull-js', plugins_url( '/gutenberg/block-pwd-adjustment-image-alignfull.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
		register_block_type('pwd/adjustment-image-alignfull', [
			'editor_script' => 'block-pwd-adjustment-image-alignfull-js',
		]);

	}

   	if (isset($blocksolid_options['blocksolid_field_classes_list'])){

        if ($blocksolid_options['blocksolid_field_classes_list'] != "" ){

              $classes_list = explode(' ',$blocksolid_options['blocksolid_field_classes_list']);

              if (is_array($classes_list)){
                  wp_register_script( 'block-pwd-adjustment-classes-list-js', plugins_url( '/gutenberg/block-pwd-adjustment-classes-list.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
                  register_block_type('pwd/adjustment-classes-list', [
                      'editor_script' => 'block-pwd-adjustment-classes-list-js'
                  ]);

				  // Send the default values as held in the settings
                  wp_localize_script('block-pwd-adjustment-classes-list-js', 'locals', array(
                    'blocksolid_classes_available' => $classes_list
                  ));
              }
        }

   	}

});


?>