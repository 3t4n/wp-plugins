<?php  
/*
Plugin Name: Atomic Penguins Mind-Blowing Hover Effects
Description: Customize your own hover element and add them to your page.
Author: Atomic Penguin
Author URL: http://atomicpenguins.com/
Version: 1.1.3
*/
function the_admin() {
    include('the_admin.php');
}

function mind_blown() {
    add_menu_page("Atomic Penguins Mind-Blowing Hover Effects", "Hover Effect", 1, "Atomic Penguins Mind-Blowing Hover Effects", "the_admin",plugins_url('atomic penguin.png',__FILE__));
}

add_action('admin_menu', 'mind_blown');
add_action('admin_enqueue_scripts', 'mind_blown_my_admin_scripts');


function mind_blown_my_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'Atomic Penguins Mind-Blowing Hover Effects') {
        wp_enqueue_media();
        mind_blown_admin_init();
    }
}

function mind_blown_page() {
    /* Register bootstrap and custom stylesheet and js for admin view */
    wp_register_style('the_admin_style', plugins_url('the_admin.css', __FILE__));
    wp_register_style('page_animations', plugins_url('animations.css', __FILE__));
    wp_register_script('page_js', plugins_url('/js/mind_blown.js', __FILE__), array('jquery'),1.0);
  
    wp_enqueue_style('the_admin_style');
    wp_enqueue_style('page_animations');
    wp_enqueue_script('page_js');
}
add_action('wp_enqueue_scripts', 'mind_blown_page');

function mind_blown_admin_init() {
    /* Register bootstrap and custom stylesheet and js for admin view */
    wp_register_style('the_admin_style', plugins_url('the_admin.css', __FILE__));
    wp_register_style('the_animations', plugins_url('animations.css', __FILE__));
    wp_register_script('the_admin_js', plugins_url('/js/the_admin.js', __FILE__));
  
    wp_enqueue_style('the_admin_style');
    wp_enqueue_style('the_animations');
    wp_enqueue_script('the_admin_js');
}

add_action('wp_ajax_SAVE', 'save_new_project');
    function save_new_project(){
	global $wpdb;
    $table_name = $wpdb->prefix . "mindblown";
    if (isset($_POST['data']['container']['name'])) {
        $name = sanitize_text_field($_POST['data']['container']['name']);
        //$sql = "select * from " . $table_name . " where title=" . "'" . $name . "' LIMIT 1";
        $sql = $wpdb->get_row($wpdb->prepare("Select * from %s where name = %s",$table_name,$name));
        //$results = $wpdb->get_row($sql);
    }
        $safe_br_tl = intval( $_POST['data']['container']['br_tl']);
                if ( ! $safe_br_tl )
                {
                    $safe_br_tl = '';
                    if ( strlen( $safe_br_tl ) > 3 )
                    $safe_br_tl = substr( $safe_br_tl, 0, 3 );
                }
        $safe_br_tr = intval( $_POST['data']['container']['br_tr']);
                if ( ! $safe_br_tr )
                {
                    $safe_br_tr = '';
                    if ( strlen( $safe_br_tr ) > 3 )
                    $safe_br_tr = substr( $safe_br_tr, 0, 3 );
                }  
        $safe_br_bl = intval( $_POST['data']['container']['br_bl']);
                if ( ! $safe_br_bl )
                {
                    $safe_br_bl = '';
                    if ( strlen( $safe_br_bl ) > 3 )
                    $safe_br_bl = substr( $safe_br_bl, 0, 3 );
                }   
        $safe_br_br = intval( $_POST['data']['container']['br_br']);
                if ( ! $safe_br_br )
                {
                    $safe_br_br = '';
                    if ( strlen( $safe_br_br ) > 3 )
                    $safe_br_br = substr( $safe_br_br, 0, 3 );
                } 
        $safe_border = intval( $_POST['data']['container']['border']);
                if ( ! $safe_border )
                {
                    $safe_border = '';
                    if ( strlen( $safe_border ) > 3 )
                    $safe_border = substr( $safe_border, 0, 3 );
                } 
        $safe_width = intval( $_POST['data']['container']['width']);
                if ( ! $safe_width )
                {
                    $safe_width = '';
                    if ( strlen( $safe_width ) > 3 )
                    $safe_width = substr( $safe_width, 0, 3 );
                }
        $safe_height = intval( $_POST['data']['container']['height']);
                if ( ! $safe_height )
                {
                    $safe_height = '';
                    if ( strlen( $safe_height ) > 3 )
                    $safe_height = substr( $safe_height, 0, 3 );
                }
        function sanitize_hex_color( $color ) {
                if ( '' === $color )
                    return '';

                // 3 or 6 hex digits, or the empty string.
                if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
                    return $color;

                return null;}
        $safe_main_font = intval( $_POST['data']['container']['main_font']);
                if ( ! $safe_main_font )
                {
                    $safe_main_font = '';
                    if ( strlen( $safe_main_font ) > 3 )
                    $safe_main_font = substr( $safe_main_font, 0, 3 );
                }
        $safe_main_spacing = intval( $_POST['data']['container']['main_spacing']);
                if ( ! $safe_main_spacing )
                {
                    $safe_main_spacing = '';
                    if ( strlen( $safe_main_spacing ) > 3 )
                    $safe_main_spacing = substr( $safe_main_spacing, 0, 3 );
                }
        $safe_main_mar_t = intval( $_POST['data']['container']['main_mar_t']);
                if ( ! $safe_main_mar_t )
                {
                    $safe_main_mar_t = '';
                    if ( strlen( $safe_main_mar_t ) > 3 )
                    $safe_main_mar_t = substr( $safe_main_mar_t, 0, 3 );
                }
        $safe_main_mar_r = intval( $_POST['data']['container']['main_mar_r']);
                if ( ! $safe_main_mar_r )
                {
                    $safe_main_mar_r = '';
                    if ( strlen( $safe_main_mar_r ) > 3 )
                    $safe_main_mar_r = substr( $safe_main_mar_r, 0, 3 );
                }
        $safe_main_mar_l = intval( $_POST['data']['container']['main_mar_l']);
                if ( ! $safe_main_mar_l )
                {
                    $safe_main_mar_l = '';
                    if ( strlen( $safe_main_mar_l ) > 3 )
                    $safe_main_mar_l = substr( $safe_main_mar_l, 0, 3 );
                }
        $safe_main_mar_b = intval( $_POST['data']['container']['main_mar_b']);
                if ( ! $safe_main_mar_b )
                {
                    $safe_main_mar_b = '';
                    if ( strlen( $safe_main_mar_b ) > 3 )
                    $safe_main_mar_b = substr( $safe_main_mar_b, 0, 3 );
                }
        $safe_hov_opac = intval( $_POST['data']['hover']['hov_opac']);
                if ( ! $safe_hov_opac )
                {
                    $safe_hov_opac = '';
                    if ( strlen( $safe_hov_opac ) > 3 )
                    $safe_hov_opac = substr( $safe_hov_opac, 0, 3 );
                }
        $safe_hov_mar_t = intval( $_POST['data']['hover']['hov_mar_t']);
                if ( ! $safe_hov_mar_t )
                {
                    $safe_hov_mar_t = '';
                    if ( strlen( $safe_hov_mar_t ) > 3 )
                    $safe_hov_mar_t = substr( $safe_hov_mar_t, 0, 3 );
                }
        $safe_hov_mar_r = intval( $_POST['data']['hover']['hov_mar_r']);
                if ( ! $safe_hov_mar_r )
                {
                    $safe_hov_mar_r = '';
                    if ( strlen( $safe_hov_mar_r ) > 3 )
                    $safe_hov_mar_r = substr( $safe_hov_mar_r, 0, 3 );
                }
        $safe_hov_mar_b = intval( $_POST['data']['hover']['hov_mar_b']);
                if ( ! $safe_hov_mar_b )
                {
                    $safe_hov_mar_b = '';
                    if ( strlen( $safe_hov_mar_b ) > 3 )
                    $safe_hov_mar_b = substr( $safe_hov_mar_b, 0, 3 );
                }
        $safe_hov_mar_l = intval( $_POST['data']['hover']['hov_mar_l']);
                if ( ! $safe_hov_mar_l )
                {
                    $safe_hov_mar_l = '';
                    if ( strlen( $safe_hov_mar_l ) > 3 )
                    $safe_hov_mar_l = substr( $safe_hov_mar_l, 0, 3 );
                }
        $safe_hov_title_font_size = intval( $_POST['data']['hover']['hov_title_font_size']);
                if ( ! $safe_hov_title_font_size )
                {
                    $safe_hov_title_font_size = '';
                    if ( strlen( $safe_hov_title_font_size ) > 3 )
                    $safe_hov_title_font_size = substr( $safe_hov_title_font_size, 0, 3 );
                }
        $safe_hov_text_spacing = intval( $_POST['data']['hover']['hov_text_spacing']);
                if ( ! $safe_hov_text_spacing )
                {
                    $safe_hov_text_spacing = '';
                    if ( strlen( $safe_hov_text_spacing ) > 3 )
                    $safe_hov_text_spacing = substr( $safe_hov_text_spacing, 0, 3 );
                }
        $safe_hov_text_font_size = intval( $_POST['data']['hover']['hov_text_font_size']);
                if ( ! $safe_hov_text_font_size )
                {
                    $safe_hov_text_font_size = '';
                    if ( strlen( $safe_hov_text_font_size ) > 3 )
                    $safe_hov_text_font_size = substr( $safe_hov_text_font_size, 0, 3 );
                }
        function sanitize_drop_down($input) {
            $valid = array(
                'Slide' => 'Slide',
                'Light Speed' => 'Light Speed',
                'Roll' => 'Roll',
                'Wobble' => 'Wobble',
                'Tadaa!' => 'Tadaa!',
                'Swing' => 'Swing',
                'Shake' => 'Shake',
                'Rubberband' => 'Rubberband',
                'Pulse' => 'Pulse',
                'Flash' => 'Flash',
                'FadeIn' => 'FadeIn',
                'FadeUp' => 'FadeUp',
                'FadeDown' => 'FadeDown',
                'FadeRight' => 'FadeRight',
                'FadeLeft' => 'FadeLeft',
                'Bounce In' => 'Bounce In',
                'Bounce In Down' => 'Bounce In Down',
                'Bounce In Left' => 'Bounce In Left',
                'Bounce In Up' => 'Bounce In Up',
                'Flip X' => 'Flip X',
                'Flip Y' => 'Flip Y',
                'Rotate In' => 'Rotate In',
                'Rotate In Down Left' => 'Rotate In Down Left',
                'Rotate In Down Right' => 'Rotate In Down Right',
                'Rotate In Up Left' => 'Rotate In Up Left',
                'Rotate In Up Right' => 'Rotate In Up Right',
                'Zoom In' => 'Zoom In',
                'Zoom In Down' => 'Zoom In Down',
                'Zoom In Up' => 'Zoom In Up',
                'Zoom In Right' => 'Zoom In Right',
                'Zoom In Left' => 'Zoom In Left'
            );

            if (array_key_exists($input, $valid)) {
               return $input;
            } else {
               return 'Slide';
            }
        }
        function sanitize_align_select($input){
            $valid = array(
                'left' => 'feft',
                'right' => 'right',
                'center' => 'center'

                );
            if (array_key_exists($input, $valid))
            {
                return $input;
            }
            else
            {
                return 'center';
            }
        }

        $safeBox = force_balance_tags($_POST['data']['container']['box']);
        
        function check_checkbox($input)
        {
            if ($input == 'checked')
            {
                return $input;
            }
            else if ($input == null)
            {
                return null;
            }
            else
            {
                return 'checked';
            }
        }
    if (count($sql) == 0) {

        $data = array(
        	'box' => $safeBox,
        	'name' => sanitize_text_field($_POST['data']['container']['name']),
            'br_tl' => $safe_br_tl,
            'br_tr' => $safe_br_tr,
            'br_bl' => $safe_br_bl,
            'br_br' => $safe_br_br,
            'border' => $safe_border,
            'width' => $safe_width,
            'height' => $safe_height,
            'main_bg' => sanitize_hex_color($_POST['data']['container']['main_bg']),
            'main_brdr_clr' => sanitize_hex_color($_POST['data']['container']['main_brdr_clr']),
            'main_font_clr' => sanitize_hex_color($_POST['data']['container']['main_font_clr']),
            'main_font' => $safe_main_font,
            'main_spacing' => $safe_main_spacing,
            'main_mar_t' => $safe_main_mar_t,
            'main_mar_r' => $safe_main_mar_r,
            'main_mar_l' => $safe_main_mar_l,
            'main_mar_b' => $safe_main_mar_b,
            'main_text' => sanitize_text_field($_POST['data']['container']['main_text']),  
            //hover
            'hov_title' => sanitize_text_field($_POST['data']['hover']['hov_title']),
            'hov_title_link' => esc_html($_POST['data']['hover']['hov_title_link']),
            'hov_title_font_size' => $safe_hov_title_font_size,
            'hov_align' => sanitize_align_select($_POST['data']['hover']['hov_align']),
            'hov_effect' => sanitize_drop_down($_POST['data']['hover']['hov_effect']),
            'hov_opac' => $safe_hov_opac,
            'hov_bg' => sanitize_hex_color($_POST['data']['hover']['hov_bg']),
            'hov_divider_clr' => sanitize_hex_color($_POST['data']['hover']['hov_divider_clr']),
            'hov_divider_vis' => check_checkbox($_POST['data']['hover']['hov_divider_vis']),
            'hov_mar_t' => $safe_hov_mar_t,
            'hov_mar_r' => $safe_hov_mar_r,
            'hov_mar_b' => $safe_hov_mar_b,
            'hov_mar_l' => $safe_hov_mar_l,
            'hov_text_spacing' => $safe_hov_text_spacing,
            'hov_text_font_size' => $safe_hov_text_font_size,
            'hov_font_clr' => sanitize_hex_color($_POST['data']['hover']['hov_font_clr']),
            'hov_text' => sanitize_text_field($_POST['data']['hover']['hov_text']),
            'hov_title_color' => sanitize_hex_color($_POST['data']['hover']['hov_title_color']),


        	'short_code' => '[mind_blown id="test"]'
    	);
    	$rows_affected = $wpdb->insert($table_name, $data);
         $json = json_encode(array(
        'Type' => 'success'
    ));
    header('Content-type: application/json');
    echo $json;
    exit;
    }
    else
    {
        alert("Error");
    }
}

add_action('wp_ajax_SHORT_CODE_DISP', 'short_code_display');
function short_code_display() {
    $id = $_POST['id'];
    echo '[mind_blown id=' . $id . ']';
}


add_shortcode('mind_blown', 'box_shortcodes');
function box_shortcodes($atts) {
    extract(shortcode_atts(array(
        'id' => '',
        'mode' => 'bottom-up-full',
        'class' => '',
        'title' => '',
        'desc' => '',
        'alt' => ''
                    ), $atts));
    global $wpdb;
    $table_name = $wpdb->prefix . "mindblown";
    $aBox = "13";
    $box = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id =%d",$id));
    //exit(var_dump($wpdb->last_query));
    $html_1 = str_replace('\\', '', $box->box);
    $html_2 = str_replace('squareDemo', 'squareDemo squareDemo_production', $html_1);
    $html = str_replace('square_preview', 'square_preview', $html_2);
    return $html;
}

add_action('wp_ajax_GET_ALL_BOXES', 'get_all_mind');
function get_all_mind() {
		    global $wpdb;
		    $table_name = $wpdb->prefix . "mindblown";

		    $sql = "select * from " . $table_name;

		    $results = $wpdb->get_results($sql);
		    $json = json_encode($results);

		    header('Content-type: application/json');
		    echo $json;
		    exit;
}

// add_action('wp_ajax_GET_BOX', 'get_one');
// function get_one() {
//         global $wpdb;
//         $table_name = $wpdb->prefix . "funbox";
//         $id = $_POST['id'];
//         $sql = 'select * from ' . $table_name . ' where id=' . $id . '';
//         $results = $wpdb->get_results($sql);
//         $json = json_encode($results);

//         header('Content-type: application/json');
//         echo $json;
//         exit;
// }

add_action('wp_ajax_GET_BLOWN', 'get_your_mindblown');
function get_your_mindblown()
 {
    global $wpdb;
    $table_name = $wpdb->prefix . "mindblown";
    $id = $_POST['id'];
    //$sql = 'select * from ' . $table_name . ' where id=' . $id . '';
    $results = $wpdb->get_results($wpdb->prepare("SELECT * from $table_name where id = %d",$id));
    $json = json_encode($results);

    header('Content-type: application/json');
    echo $json;
    exit;
}

add_action('wp_ajax_UPDATE', 'overwrite_mind');
function overwrite_mind(){
    global $wpdb;
    $table_name = $wpdb->prefix . "mindblown";
    $id = $_POST['id'];
    //$sql = "select * from " . $table_name . " where id=" . "'" . $name . "'";

    //$results = $wpdb->get_row($wpdb->prepare("Select * from $table_name where id = %d",$name));
    //$results = $wpdb->get_row($sql);
    //exit(var_dump($_POST));

    $safe_br_tl = intval( $_POST['data']['container']['br_tl']);
                if ( ! $safe_br_tl )
                {
                    $safe_br_tl = '';
                    if ( strlen( $safe_br_tl ) > 3 )
                    $safe_br_tl = substr( $safe_br_tl, 0, 3 );
                }
        $safe_br_tr = intval( $_POST['data']['container']['br_tr']);
                if ( ! $safe_br_tr )
                {
                    $safe_br_tr = '';
                    if ( strlen( $safe_br_tr ) > 3 )
                    $safe_br_tr = substr( $safe_br_tr, 0, 3 );
                }  
        $safe_br_bl = intval( $_POST['data']['container']['br_bl']);
                if ( ! $safe_br_bl )
                {
                    $safe_br_bl = '';
                    if ( strlen( $safe_br_bl ) > 3 )
                    $safe_br_bl = substr( $safe_br_bl, 0, 3 );
                }   
        $safe_br_br = intval( $_POST['data']['container']['br_br']);
                if ( ! $safe_br_br )
                {
                    $safe_br_br = '';
                    if ( strlen( $safe_br_br ) > 3 )
                    $safe_br_br = substr( $safe_br_br, 0, 3 );
                } 
        $safe_border = intval( $_POST['data']['container']['border']);
                if ( ! $safe_border )
                {
                    $safe_border = '';
                    if ( strlen( $safe_border ) > 3 )
                    $safe_border = substr( $safe_border, 0, 3 );
                } 
        $safe_width = intval( $_POST['data']['container']['width']);
                if ( ! $safe_width )
                {
                    $safe_width = '';
                    if ( strlen( $safe_width ) > 3 )
                    $safe_width = substr( $safe_width, 0, 3 );
                }
        $safe_height = intval( $_POST['data']['container']['height']);
                if ( ! $safe_height )
                {
                    $safe_height = '';
                    if ( strlen( $safe_height ) > 3 )
                    $safe_height = substr( $safe_height, 0, 3 );
                }
        function sanitize_hex_color( $color ) {
                if ( '' === $color )
                    return '';

                // 3 or 6 hex digits, or the empty string.
                if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
                    return $color;

                return null;}
        $safe_main_font = intval( $_POST['data']['container']['main_font']);
                if ( ! $safe_main_font )
                {
                    $safe_main_font = '';
                    if ( strlen( $safe_main_font ) > 3 )
                    $safe_main_font = substr( $safe_main_font, 0, 3 );
                }
        $safe_main_spacing = intval( $_POST['data']['container']['main_spacing']);
                if ( ! $safe_main_spacing )
                {
                    $safe_main_spacing = '';
                    if ( strlen( $safe_main_spacing ) > 3 )
                    $safe_main_spacing = substr( $safe_main_spacing, 0, 3 );
                }
        $safe_main_mar_t = intval( $_POST['data']['container']['main_mar_t']);
                if ( ! $safe_main_mar_t )
                {
                    $safe_main_mar_t = '';
                    if ( strlen( $safe_main_mar_t ) > 3 )
                    $safe_main_mar_t = substr( $safe_main_mar_t, 0, 3 );
                }
        $safe_main_mar_r = intval( $_POST['data']['container']['main_mar_r']);
                if ( ! $safe_main_mar_r )
                {
                    $safe_main_mar_r = '';
                    if ( strlen( $safe_main_mar_r ) > 3 )
                    $safe_main_mar_r = substr( $safe_main_mar_r, 0, 3 );
                }
        $safe_main_mar_l = intval( $_POST['data']['container']['main_mar_l']);
                if ( ! $safe_main_mar_l )
                {
                    $safe_main_mar_l = '';
                    if ( strlen( $safe_main_mar_l ) > 3 )
                    $safe_main_mar_l = substr( $safe_main_mar_l, 0, 3 );
                }
        $safe_main_mar_b = intval( $_POST['data']['container']['main_mar_b']);
                if ( ! $safe_main_mar_b )
                {
                    $safe_main_mar_b = '';
                    if ( strlen( $safe_main_mar_b ) > 3 )
                    $safe_main_mar_b = substr( $safe_main_mar_b, 0, 3 );
                }
        $safe_hov_opac = intval( $_POST['data']['hover']['hov_opac']);
                if ( ! $safe_hov_opac )
                {
                    $safe_hov_opac = '';
                    if ( strlen( $safe_hov_opac ) > 3 )
                    $safe_hov_opac = substr( $safe_hov_opac, 0, 3 );
                }
        $safe_hov_mar_t = intval( $_POST['data']['hover']['hov_mar_t']);
                if ( ! $safe_hov_mar_t )
                {
                    $safe_hov_mar_t = '';
                    if ( strlen( $safe_hov_mar_t ) > 3 )
                    $safe_hov_mar_t = substr( $safe_hov_mar_t, 0, 3 );
                }
        $safe_hov_mar_r = intval( $_POST['data']['hover']['hov_mar_r']);
                if ( ! $safe_hov_mar_r )
                {
                    $safe_hov_mar_r = '';
                    if ( strlen( $safe_hov_mar_r ) > 3 )
                    $safe_hov_mar_r = substr( $safe_hov_mar_r, 0, 3 );
                }
        $safe_hov_mar_b = intval( $_POST['data']['hover']['hov_mar_b']);
                if ( ! $safe_hov_mar_b )
                {
                    $safe_hov_mar_b = '';
                    if ( strlen( $safe_hov_mar_b ) > 3 )
                    $safe_hov_mar_b = substr( $safe_hov_mar_b, 0, 3 );
                }
        $safe_hov_mar_l = intval( $_POST['data']['hover']['hov_mar_l']);
                if ( ! $safe_hov_mar_l )
                {
                    $safe_hov_mar_l = '';
                    if ( strlen( $safe_hov_mar_l ) > 3 )
                    $safe_hov_mar_l = substr( $safe_hov_mar_l, 0, 3 );
                }
        $safe_hov_title_font_size = intval( $_POST['data']['hover']['hov_title_font_size']);
                if ( ! $safe_hov_title_font_size )
                {
                    $safe_hov_title_font_size = '';
                    if ( strlen( $safe_hov_title_font_size ) > 3 )
                    $safe_hov_title_font_size = substr( $safe_hov_title_font_size, 0, 3 );
                }
        $safe_hov_text_spacing = intval( $_POST['data']['hover']['hov_text_spacing']);
                if ( ! $safe_hov_text_spacing )
                {
                    $safe_hov_text_spacing = '';
                    if ( strlen( $safe_hov_text_spacing ) > 3 )
                    $safe_hov_text_spacing = substr( $safe_hov_text_spacing, 0, 3 );
                }
        $safe_hov_text_font_size = intval( $_POST['data']['hover']['hov_text_font_size']);
                if ( ! $safe_hov_text_font_size )
                {
                    $safe_hov_text_font_size = '';
                    if ( strlen( $safe_hov_text_font_size ) > 3 )
                    $safe_hov_text_font_size = substr( $safe_hov_text_font_size, 0, 3 );
                }
        function sanitize_drop_down($input) {
            $valid = array(
                'Slide' => 'Slide',
                'Light Speed' => 'Light Speed',
                'Roll' => 'Roll',
                'Wobble' => 'Wobble',
                'Tadaa!' => 'Tadaa!',
                'Swing' => 'Swing',
                'Shake' => 'Shake',
                'Rubberband' => 'Rubberband',
                'Pulse' => 'Pulse',
                'Flash' => 'Flash',
                'FadeIn' => 'FadeIn',
                'FadeUp' => 'FadeUp',
                'FadeDown' => 'FadeDown',
                'FadeRight' => 'FadeRight',
                'FadeLeft' => 'FadeLeft',
                'Bounce In' => 'Bounce In',
                'Bounce In Down' => 'Bounce In Down',
                'Bounce In Left' => 'Bounce In Left',
                'Bounce In Up' => 'Bounce In Up',
                'Flip X' => 'Flip X',
                'Flip Y' => 'Flip Y',
                'Rotate In' => 'Rotate In',
                'Rotate In Down Left' => 'Rotate In Down Left',
                'Rotate In Down Right' => 'Rotate In Down Right',
                'Rotate In Up Left' => 'Rotate In Up Left',
                'Rotate In Up Right' => 'Rotate In Up Right',
                'Zoom In' => 'Zoom In',
                'Zoom In Down' => 'Zoom In Down',
                'Zoom In Up' => 'Zoom In Up',
                'Zoom In Right' => 'Zoom In Right',
                'Zoom In Left' => 'Zoom In Left'
            );

            if (array_key_exists($input, $valid)) {
               return $input;
            } else {
               return 'Slide';
            }
        }
        function sanitize_align_select($input){
            $valid = array(
                'left' => 'feft',
                'right' => 'right',
                'center' => 'center'

                );
            if (array_key_exists($input, $valid))
            {
                return $input;
            }
            else
            {
                return 'center';
            }
        }
        $safeBox = force_balance_tags($_POST['data']['container']['box']);
        function check_checkbox($input)
        {
            if ($input == 'checked')
            {
                return $input;
            }
            else if ($input == null)
            {
                return null;
            }
            else
            {
                return 'checked';
            }
        }
    $data = array(
            'box' => $safeBox,
            'name' => sanitize_text_field($_POST['data']['container']['name']),
            'br_tl' => $safe_br_tl,
            'br_tr' => $safe_br_tr,
            'br_bl' => $safe_br_bl,
            'br_br' => $safe_br_br,
            'border' => $safe_border,
            'width' => $safe_width,
            'height' => $safe_height,
            'main_bg' => sanitize_hex_color($_POST['data']['container']['main_bg']),
            'main_brdr_clr' => sanitize_hex_color($_POST['data']['container']['main_brdr_clr']),
            'main_font_clr' => sanitize_hex_color($_POST['data']['container']['main_font_clr']),
            'main_font' => $safe_main_font,
            'main_spacing' => $safe_main_spacing,
            'main_mar_t' => $safe_main_mar_t,
            'main_mar_r' => $safe_main_mar_r,
            'main_mar_l' => $safe_main_mar_l,
            'main_mar_b' => $safe_main_mar_b,
            'main_text' => sanitize_text_field($_POST['data']['container']['main_text']),  
            //hover
            'hov_title' => sanitize_text_field($_POST['data']['hover']['hov_title']),
            'hov_title_link' => esc_url($_POST['data']['hover']['hov_title_link']),
            'hov_title_font_size' => $safe_hov_title_font_size,
            'hov_align' => sanitize_align_select($_POST['data']['hover']['hov_align']),
            'hov_effect' => sanitize_drop_down($_POST['data']['hover']['hov_effect']),
            'hov_opac' => $safe_hov_opac,
            'hov_bg' => sanitize_hex_color($_POST['data']['hover']['hov_bg']),
            'hov_divider_clr' => sanitize_hex_color($_POST['data']['hover']['hov_divider_clr']),
            'hov_divider_vis' => check_checkbox($_POST['data']['hover']['hov_divider_vis']),
            'hov_mar_t' => $safe_hov_mar_t,
            'hov_mar_r' => $safe_hov_mar_r,
            'hov_mar_b' => $safe_hov_mar_b,
            'hov_mar_l' => $safe_hov_mar_l,
            'hov_text_spacing' => $safe_hov_text_spacing,
            'hov_text_font_size' => $safe_hov_text_font_size, 
            'hov_font_clr' => sanitize_hex_color($_POST['data']['hover']['hov_font_clr']),
            'hov_text' => sanitize_text_field($_POST['data']['hover']['hov_text']),
            'hov_title_color' => sanitize_hex_color($_POST['data']['hover']['hov_title_color']),


            'short_code' => '[mind_blown id="test"]'
    );
    $where = array('id' => $id);

    $wpdb->update($table_name, $data, $where);

    //exit(var_dump($wpdb->last_query));
    $json = json_encode(array(
        'Type' => 'success'
    ));
    header('Content-type: application/json');
    echo $json;
    exit;
    }

    add_action('wp_ajax_DELETE_MIND','delete_mind');
    function delete_mind()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "mindblown";
        $id = $_POST['id'];
        $wpdb->delete($table_name, array('id' => $id), array('%d'));
}

register_activation_hook(__FILE__, 'install_mind');

function install_mind()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "mindblown";

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
    {

         $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name VARCHAR(200),
            box Text,
            br_tl int(5),
            br_tr int(5),
            br_bl int(5),
            br_br int(5),
            border int(5),
            width int(5),
            height int(5),
            main_bg varchar(50),
            main_brdr_clr varchar(50),
            main_font_clr varchar(50),
            main_font int(5),
            main_spacing int(5),
            main_mar_t int(5),
            main_mar_b int(5),
            main_mar_r int(5),
            main_mar_l int(5),
            main_text text,
            hov_title  varchar(100),
            hov_title_link varchar(255),
            hov_title_color varchar(50),
            hov_title_font_size int(5),
            hov_align text,
            hov_effect text,
            hov_opac decimal(5,2),
            hov_bg varchar(50),
            hov_divider_clr varchar(50),
            hov_font_clr varchar(50),
            hov_divider_vis text,
            hov_mar_t int(5),
            hov_mar_r int(5),
            hov_mar_b int(5),
            hov_mar_l int(5),
            hov_text_spacing int(5),
            hov_text_font_size int(5),
            hov_text text,
            short_code varchar(200),
            date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY id (id)
            );";
            
    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

?>