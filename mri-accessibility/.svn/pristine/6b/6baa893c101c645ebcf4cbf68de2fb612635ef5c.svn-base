<?php
/**********************************************
***   Add front body classes                ***
**********************************************/
if ( ! function_exists( 'miah_access_helper_body_classs' ) ) {

    function miah_access_helper_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if( $is_lynx ) $classes[] = 'lynx';
        elseif( $is_gecko ) $classes[] = 'gecko';
        elseif( $is_opera ) $classes[] = 'opera';
        elseif( $is_NS4 ) $classes[] = 'ns4';
        elseif( $is_safari ) $classes[] = 'safari';
        elseif( $is_chrome ) $classes[] = 'chrome';
        elseif( $is_IE ) {
            $classes[] = 'ie';
            if( preg_match( '/MSIE ( [0-11]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
            $classes[] = 'ie' . $browser_version[1];
        } else $classes[] = 'unknown';
        if( $is_iphone ) $classes[] = 'iphone';

        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
            $classes[] = 'osx';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
            $classes[] = 'linux';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
            $classes[] = 'windows';
        }

        $classes[]             = 'wp-accessibility-helper';
        $contrast_setup        = get_option('org_contrast_setup') ? get_option('org_contrast_setup') : 0;
        $font_setup_type       = get_option('org_font_setup_type') ? get_option('org_font_setup_type') : 'script';
        $remove_styles_setup   = get_option('org_remove_styles_setup') ? get_option('org_remove_styles_setup') : 0;
        $location_setup        = get_option('org_left_side') ? 'left' : 'right';
        $underline_links_setup = get_option('org_underline_links_setup') ? get_option('org_underline_links_setup') : 0;
        $org_left_side         = get_option('org_left_side');

        if( $contrast_setup ) { $classes[]        = 'accessibility-contrast_mode_on'; }
        if( $font_setup_type ) { $classes[]       = 'org_fstype_'.$font_setup_type; }
        if( $remove_styles_setup ) { $classes[]   = 'accessibility-remove-styles-setup'; }
        if( $underline_links_setup ) { $classes[] = 'accessibility-underline-setup'; }
        if( $location_setup == 'left' ) {
            $classes[] = 'accessibility-location-left';
        } else {
            $classes[] = 'accessibility-location-right';
        }
    	return $classes;
    }
    add_filter('body_class','miah_access_helper_body_class');
}
/****************************************************
****   ORG Analyzer                              ***
****************************************************/
add_action('wp','miah_organalyzer');
if ( ! function_exists( 'miah_organalyzer' ) ) {
function miah_organalyzer(){
    if( miah_organalyzer_isset() && miah_admin_only() ) {
        miah_run_front_dom_scanner();
    } elseif( miah_organalyzer_isset() && !miah_admin_only() ) {
        echo "<h1 style='text-align:center;'>".__("You do NOT have permissions to access this page","wp-accessibility-helper")."</h1>";
        echo "<h3 style='text-align:center;'>".__("Please contact site administrator.","wp-accessibility-helper")."</h3>";
        die();
    }
}
}
if ( ! function_exists( 'miah_run_front_dom_scanner' ) ) {
function miah_run_front_dom_scanner() {
    wp_register_style( 'org_analyzer-styles',  plugins_url('admin/org-analyzer/style.css', __FILE__) );
    wp_enqueue_style( 'org_analyzer-styles' );

    wp_localize_script( 'org_analyzer-js', 'ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
    wp_register_script( 'org_analyzer-js', plugins_url('admin/org-analyzer/org_analyzer.js', __FILE__ , array('jquery'), '', true) );
    wp_enqueue_script( 'org_analyzer-js' );
}
}
/****************************************************
****   Get attachment id by image source         ***
****************************************************/
function miah_get_attachment_id( $url ) {

	$attachment_id = 0;
	$dir           = wp_upload_dir();

	if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?

		$file = basename( $url );
		$query_args = array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			'fields'      => 'ids',
			'meta_query'  => array(
				array(
					'value'   => $file,
					'compare' => 'LIKE',
					'key'     => '_wp_attachment_metadata',
				),
			)
		);

		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) {
			foreach ( $query->posts as $post_id ) {

				$meta = wp_get_attachment_metadata( $post_id );
				$original_file       = basename( $meta['file'] );
				$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );

				if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
					$attachment_id = $post_id;
					break;
				}
			}
		}

	}
	return $attachment_id;
}
/***********************************************
****   Analyzer Access                      ***
***********************************************/
function miah_organalyzer_isset(){
    if( isset($_GET['org_analyzer']) && $_GET['org_analyzer'] == 'wah' ) {
        return true;
    }
    return false;
}
function miah_admin_only(){
    if( current_user_can('administrator') ){
        return true;
    }
    return false;
}
/**********************************************
***     Widgets                             ***
**********************************************/
function miah_get_front_widgets_list(){

    //Get all vars
    $font_setup_title = get_option('org_font_setup_title') ? get_option('org_font_setup_title'): __("Font Resize","wp-accessibility-helper");
    $reset_font_size_title = get_option('org_reset_font_size') ? get_option('org_reset_font_size') : __("Reset font size","wp-accessibility-helper");
    $font_setup_type = get_option('org_font_setup_type') ? get_option('org_font_setup_type') : 'zoom';
    $reset_button = '';
    if( $font_setup_type == 'script' ) {
        $reset_button = '<button tabindex="-1" type="button" class="org-action-button org-font-reset orgout" title="'.__("Reset font size","wp-accessibility-helper").'"
            aria-label="'.__("Reset font size","wp-accessibility-helper").'">'. $reset_font_size_title .'</button>';
    }

    $contrast_setup = get_option('org_contrast_setup');
    $contrast_setup_title = get_option('org_contrast_setup_title') ? get_option('org_contrast_setup_title'):               __("Contrast","wp-accessibility-helper");
    $choose_color_title = get_option('org_choose_color_title') ? get_option('org_choose_color_title') : __("Choose color","wp-accessibility-helper");
    $custom_contrast_variations = get_option('org_enable_custom_contrast');

    $underline_links_setup = get_option('org_underline_links_setup');
    $underline_links_setup_title = get_option('org_underline_links_setup_title') ? get_option('org_underline_links_setup_title'): __("Underline links","wp-accessibility-helper");
    $role_links_setup = get_option('org_role_links_setup');
    $remove_link_titles = get_option('org_remove_link_titles');
    $remove_styles_setup = get_option('org_remove_styles_setup');
    $remove_styles_setup_title = get_option('org_remove_styles_setup_title') ? get_option('org_remove_styles_setup_title'):     __("Remove styles","wp-accessibility-helper");
    $close_button_title = get_option('org_close_button_title') ? get_option('org_close_button_title') : __("Close","wp-accessibility-helper");

    $org_clear_cookies_title = get_option('org_clear_cookies_title') ? get_option('org_clear_cookies_title') : __("Clear cookies","wp-accessibility-helper");

    $org_greyscale_enable = get_option('org_greyscale_enable');
    $org_greyscale_title = get_option('org_greyscale_title') ? get_option('org_greyscale_title') : __("Images Greyscale","wp-accessibility-helper");

    $org_highlight_links_enable = get_option('org_highlight_links_enable');
    $org_highlight_title = get_option('org_highlight_links_title') ? get_option('org_highlight_links_title'): __("Highlight Links","wp-accessibility-helper");

    $org_invert_enable = get_option('org_invert_enable');
    $org_invert_title = get_option('org_invert_title') ? get_option('org_invert_title'): __("Invert Colors","wp-accessibility-helper");

    $org_remove_animations_setup = get_option('org_remove_animations_setup');
    $org_remove_animations_title = get_option('org_remove_animations_title') ? get_option('org_remove_animations_title'): __("Remove Animations","wp-accessibility-helper");

    $org_readable_fonts_setup = get_option('org_readable_fonts_setup');
    $org_readable_fonts_title = get_option('org_readable_fonts_title') ? get_option('org_readable_fonts_title'): __("Readable Font","wp-accessibility-helper");

    $org_keyboard_navigation_setup = get_option('org_keyboard_navigation_setup');
    $org_keyboard_navigation_title = get_option('org_keyboard_navigation_title') ? get_option('org_keyboard_navigation_title'): __("Keyboard navigation","wp-accessibility-helper");

    

    //Build widgets array
    $org_default_front_widget["widget-1"] = array(
        "active" => 1,
        "html"   => '<div class="a_module org_font_resize">
            <div class="a_module_title">'.$font_setup_title.'</div>
            <div class="a_module_exe font_resizer">
                <button tabindex="-1" type="button" class="org-action-button smaller orgout" title="'.__("smaller font size","wp-accessibility-helper").'"
                    aria-label="'.__("smaller font size","wp-accessibility-helper").'">A-</button>
                <button tabindex="-1" type="button" class="org-action-button larger orgout" title="'.__("larger font size","wp-accessibility-helper").'"
                    aria-label="'.__("larger font size","wp-accessibility-helper").'">A+</button>'. $reset_button . '
            </div>
        </div>'
    );
    $org_default_front_widget["widget-2"] = array(
        "active"    => $org_keyboard_navigation_setup,
        "html"      => '<div class="a_module org_keyboard_navigation">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" class="org-action-button orgout org-call-keyboard-navigation"
                aria-label="'.$org_keyboard_navigation_title.'" title="'.$org_keyboard_navigation_title.'">'.$org_keyboard_navigation_title.'</button>
            </div>
        </div>'
    );
    $org_default_front_widget["widget-3"] = array(
        "active"    => $org_readable_fonts_setup,
        "html"      => '<div class="a_module org_readable_fonts">
            <div class="a_module_exe readable_fonts">
                <button tabindex="-1" type="button" class="org-action-button orgout org-call-readable-fonts" aria-label="'.$org_readable_fonts_title.'" title="'.$org_readable_fonts_title.'">'.$org_readable_fonts_title.'</button>
            </div>
        </div>'
    );
    if($custom_contrast_variations){
        $org_default_front_widget["widget-4"] = array(
            "active"    => $contrast_setup
        );
        $org_default_front_widget["widget-4"]["html"] = miah_custom_contrast_variations($contrast_setup_title,$choose_color_title);
    } else {
        $org_default_front_widget["widget-4"] = array(
            "active"    => $contrast_setup,
            "html"      => '<div class="a_module org_contrast_trigger">
                <div class="a_module_title">'.$contrast_setup_title.'</div>
                <div class="a_module_exe">
                    <button tabindex="-1" type="button" id="contrast_trigger" class="contrast_trigger org-action-button orgout org-call-contrast-trigger" title="Contrast">'.$choose_color_title.'</button>
                    <div class="color_selector" aria-hidden="true">
                        <button type="button" class="convar black orgout" data-bgcolor="#000" data-color="#FFF"
                        title="'.__("black","wp-accessibility-helper").'">'.__("black","wp-accessibility-helper").'</button>
                        <button type="button" class="convar white orgout" data-bgcolor="#FFF" data-color="#000"
                        title="'.__("white","wp-accessibility-helper").'">'.__("white","wp-accessibility-helper").'</button>
                        <button type="button" class="convar green orgout" data-bgcolor="#00FF21" data-color="#000"
                        title="'.__("green","wp-accessibility-helper").'">'.__("green","wp-accessibility-helper").'</button>
                        <button type="button" class="convar blue orgout" data-bgcolor="#0FF" data-color="#000"
                        title="'.__("blue","wp-accessibility-helper").'">'.__("blue","wp-accessibility-helper").'</button>
                        <button type="button" class="convar red orgout" data-bgcolor="#F00" data-color="#000"
                        title="'.__("red","wp-accessibility-helper").'">'.__("red","wp-accessibility-helper").'</button>
                        <button type="button" class="convar orange orgout" data-bgcolor="#FF6A00" data-color="#000" title="'.__("orange","wp-accessibility-helper").'">'.__("orange","wp-accessibility-helper").'</button>
                        <button type="button" class="convar yellow orgout" data-bgcolor="#FFD800" data-color="#000"
                        title="'.__("yellow","wp-accessibility-helper").'">'.__("yellow","wp-accessibility-helper").'</button>
                        <button type="button" class="convar navi orgout" data-bgcolor="#B200FF" data-color="#000"
                        title="'.__("navi","wp-accessibility-helper").'">'.__("navi","wp-accessibility-helper").'</button>
                    </div>
                </div>
            </div>'
        );
    }

    $org_default_front_widget["widget-5"] = array(
        "active"    => $underline_links_setup,
        "html"      => '<div class="a_module org_underline_links">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" class="org-action-button orgout org-call-underline-links" aria-label="'.$underline_links_setup_title.'" title="'.$underline_links_setup_title.'">'.$underline_links_setup_title.'</button>
            </div>
        </div>'
    );
    $org_default_front_widget["widget-6"] = array(
        "active"    => $org_highlight_links_enable,
        "html"      => '<div class="a_module org_highlight_links">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" class="org-action-button orgout org-call-highlight-links" aria-label="'.$org_highlight_title.'" title="'.$org_highlight_title.'">'.$org_highlight_title.'</button>
            </div>
        </div>'
    );
    $org_default_front_widget["widget-7"] = array(
        "active"    => 1,
        "html"      => '<div class="a_module org_clear_cookies">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" class="org-action-button orgout org-call-clear-cookies"
                aria-label="'.$org_clear_cookies_title.'" title="'.$org_clear_cookies_title.'">'.$org_clear_cookies_title.'</button>
            </div>
        </div>'
    );
    $org_default_front_widget["widget-8"] = array(
        "active"    => $org_greyscale_enable,
        "html"      => '<div class="a_module org_greyscale">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" id="greyscale" class="greyscale org-action-button orgout org-call-greyscale"
                aria-label="'.$org_greyscale_title.'" title="'.$org_greyscale_title.'">'.$org_greyscale_title.'</button>
            </div>
        </div>'
    );
    $org_default_front_widget["widget-9"] = array(
        "active"    => $org_invert_enable,
        "html"      => '<div class="a_module org_invert">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" class="org-action-button orgout org-call-invert"
                aria-label="'.$org_invert_title.'" title="'.$org_invert_title.'">'.$org_invert_title.'</button>
            </div>
        </div>'
    );
    $org_default_front_widget["widget-10"] = array(
        "active"    => $org_remove_animations_setup,
        "html"      => '<div class="a_module org_remove_animations">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" accesskey="'.apply_filters( 'org_remove_animations_accesskey', 'a' ).'" class="org-action-button orgout org-call-remove-animations"
                aria-label="'.$org_remove_animations_title.'" title="'.$org_remove_animations_title.'">'.$org_remove_animations_title.'</button>
            </div>
        </div>'
    );
    $org_default_front_widget["widget-11"] = array(
        "active"    => $remove_styles_setup,
        "html"      => '<div class="a_module org_remove_styles">
            <div class="a_module_exe">
                <button tabindex="-1" type="button" class="org-action-button orgout org-call-remove-styles"
                aria-label="'.$remove_styles_setup_title.'" title="'.$remove_styles_setup_title.'">'.$remove_styles_setup_title.'</button>
            </div>
        </div>'
    );
  
    return $org_default_front_widget;
}

function miah_calculate_enabled_widgets(){
    $front_widgets     = miah_get_front_widgets_list();
    $enabled_widgets   = array();
    $org_widgets_order = get_option('org_sidebar_widgets_order');
    if($org_widgets_order){
        $org_widgets       = unserialize($org_widgets_order);
        if( $org_widgets ){
            foreach ($org_widgets as $id=>$value) {
                if($value["active"] && $value["active"] == 1){
                    $enabled_widgets[$id] = $front_widgets[$id];
                }
            }
        }
    } else {
        if( $front_widgets ){
            foreach ($front_widgets as $id=>$value) {
                if($value["active"] && $value["active"] == 1){
                    $enabled_widgets[$id] = $front_widgets[$id];
                }
            }
        }
    }

	return apply_filters('org_enabled_widgets',$enabled_widgets);
}

function miah_render_enabled_widgets_list(){
    $enabled_widgets = miah_calculate_enabled_widgets();
    if( $enabled_widgets ){
        foreach($enabled_widgets as $org_widget){
            echo $org_widget["html"];
        }
    }
}

function miah_default_contrast_options(){
    $contrast_array = array();
    $contrast_array["contrast-1"] = array(
        "label"   => "black",
        "bgcolor" => "#000",
        "color"   => "#FFF"
    );
    $contrast_array["contrast-2"] = array(
        "label"   => "white",
        "bgcolor" => "#FFF",
        "color"   => "#000"
    );
    $contrast_array["contrast-3"] = array(
        "label"   => "green",
        "bgcolor" => "#00FF21",
        "color"   => "#000"
    );
    $contrast_array["contrast-4"] = array(
        "label"   => "blue",
        "bgcolor" => "#0FF",
        "color"   => "#000"
    );
    $contrast_array["contrast-5"] = array(
        "label"   => "red",
        "bgcolor" => "#F00",
        "color"   => "#000"
    );
    $contrast_array["contrast-6"] = array(
        "label"   => "orange",
        "bgcolor" => "#FF6A00",
        "color"   => "#000"
    );
    $contrast_array["contrast-7"] = array(
        "label"   => "yellow",
        "bgcolor" => "#FFD800",
        "color"   => "#000"
    );
    $contrast_array["contrast-8"] = array(
        "label"   => "navi",
        "bgcolor" => "#B200FF",
        "color"   => "#000"
    );

    return $contrast_array;
}

function miah_custom_contrast_variations($contrast_setup_title,$choose_color_title){
    $contrast_variations = get_option('org_contrast_variations');
    $contrast_variations = unserialize($contrast_variations);
    $custom_contrast_html = '';
    ob_start();
    if($contrast_variations){  ?>
            <div class="a_module">
                <div class="a_module_title"><?php echo $contrast_setup_title; ?></div>
                <div class="a_module_exe">
                    <button type="button" id="contrast_trigger" class="contrast_trigger org-action-button orgout org-call-contrast-trigger">
                        <?php echo $choose_color_title; ?>
                    </button>
                    <div class="color_selector" aria-hidden="true">
                        <?php if( count($contrast_variations) >= miah_get_limit_contrast_variations() ) : ?>
                            <?php _e("Maximum 4 contrast variations","wp-accessibility-helper"); ?>
                        <?php else: ?>
                            <?php foreach($contrast_variations as $contrast) : ?>
                                <button type="button" class="convar orgout orgcolor" style="background:#<?php echo $contrast['bgcolor']; ?> !important;" data-bgcolor="#<?php echo $contrast['bgcolor']; ?>" data-color="#<?php echo $contrast['textcolor']; ?>"></button>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php }
    $custom_contrast_html = ob_get_clean();
    return $custom_contrast_html;

}

function miah_get_limit_contrast_variations(){
    return 5;
}

function miah_render_last_skiplink(){
    $close_button_title = get_option('org_close_button_title') ? get_option('org_close_button_title') : __("Close","wp-accessibility-helper");
?>
    <button type="button" title="<?php _e("Close sidebar","wp-accessibility-helper"); ?>" class="org-skip close-org-sidebar">
        <?php echo $close_button_title; ?>
    </button>
<?php }
