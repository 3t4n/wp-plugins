<?php  
/*
Plugin Name: Atomic Penguins Scroll&Reveal
Description: Customize your scroll and reveal website with our plugin. (Free Version)
Author: Atomic Penguin
Author URL: http://atomicpenguins.com/
Version: 1.1.2
Version
*/

function main_function() {
    include('scroll_reveal.php');
}

function add_asr() {
    add_menu_page("Scroll and Reveal", "Scroll and Reveal", 1,"Scroll and Reveal", "main_function",plugins_url('atomic penguin.png',__FILE__));
}

add_action('admin_menu', 'add_asr');


add_action('admin_enqueue_scripts', 'mind_blown_my_admin_scriptss');
function mind_blown_my_admin_scriptss() {
    if (isset($_GET['page']) && $_GET['page'] == 'Scroll and Reveal') {
        wp_enqueue_media();
        snr_admin_init();
    }
}

function theme_name_scripts() {

  wp_enqueue_script( 'script',plugins_url('for_actual_page.js', __FILE__), array('jquery'), '1.0.0', true );
  wp_localize_script( 'script', 'MyAjax', array('ajaxurl' => admin_url( 'admin-ajax.php' ),

    'security' => wp_create_nonce( 'my-special-string' )
  ));
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

//The function that handles the AJAX request
// function my_action_callback() {
//   check_ajax_referer( 'my-special-string', 'security' );

//             global $wpdb;
//             $table_name = $wpdb->prefix . "snr";
//             $sql = 'select * from ' . $table_name . 'where selected = 1';

//             $results = $wpdb->get_results($sql);
//             $json = json_encode($results);

//             header('Content-type: application/json');
//             echo $json;
//             exit;
// }
// add_action( 'wp_ajax_my_action', 'my_action_callback' );


function snr_admin_init() {
    /* Register bootstrap and custom stylesheet and js for admin view */
    wp_register_script('the_admin_js', plugins_url('snr.js', __FILE__));
    wp_register_style('the_admin_style', plugins_url('snr.css', __FILE__));
    wp_register_style('the_admin_style_tab', plugins_url('tab.css', __FILE__));

    wp_enqueue_style('the_admin_style');
    wp_enqueue_style('the_admin_style_tab');
    wp_enqueue_script('the_admin_js');
}

add_action('wp_enqueue_scripts', 'the_snr_page');
function the_snr_page() {
    /* Register bootstrap and custom stylesheet and js for admin view */
    wp_register_style('the_animations', plugins_url('animate.css', __FILE__));
    wp_register_script('the_js', plugins_url('wow.js', __FILE__), array('jquery'));


  
    wp_enqueue_style('the_animations');
    wp_enqueue_script('the_js');
}





add_action('wp_ajax_GET_NAMES', 'get_combo_names');
function get_combo_names() {
            global $wpdb;
            $table_name = $wpdb->prefix . "snr";
            $sql = 'select id,combo_name from ' . $table_name;

            $results = $wpdb->get_results($sql);
            $json = json_encode($results);

            header('Content-type: application/json');
            echo $json;
            exit;
}
add_action( 'wp_ajax_nopriv_GET_SELECTED_COMBO', 'get_selected_combo' );
add_action( 'wp_ajax_GET_SELECTED_COMBO', 'get_selected_combo' );
function get_selected_combo() {
            global $wpdb;
            $table_name = $wpdb->prefix . "snr";
            $sql = 'select * from ' . $table_name . ' where selected = 1';

            $results = $wpdb->get_results($sql);
            $json = json_encode($results);

            header('Content-type: application/json');
            echo $json;
            exit;
}

add_action('wp_ajax_nopriv_GET_CUSTOM','get_custom_animations');
add_action('wp_ajax_GET_CUSTOM','get_custom_animations');
function get_custom_animations()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "snr_custom";
    $sql = 'select * from ' . $table_name;

    $results = $wpdb->get_results($sql);
    $json = json_encode($results);

    header('Content-type: application/json');
    echo $json;
    exit;
}



add_action('wp_ajax_GET_SNR', 'get_one_snr');
function get_one_snr() {
        global $wpdb;
        $table_name = $wpdb->prefix . "snr";
        $id = $_POST['id'];
        //$sql = 'select * from ' . $table_name . ' where id=' . $id . '';
        $results = $wpdb->get_results($wpdb->prepare("Select * from $table_name where id = %d",$id));
        $json = json_encode($results);

        header('Content-type: application/json');
        echo $json;
        exit;
}

add_action('wp_ajax_SELECT_COMBO','update_snr');
function update_snr(){
    global $wpdb;
    $table_name = $wpdb->prefix . "snr";
    $id = $_POST['id'];
    if ($id != 1){
        $sql = $wpdb->query($wpdb->prepare("UPDATE $table_name SET selected='0' WHERE selected='1'"));
        $sql = $wpdb->query($wpdb->prepare("UPDATE $table_name SET selected='1' WHERE ID = %d",$id));
    }
    else{
        $wpdb->update( $table_name,array( 'selected' => 0),array('selected'=>1));
        }
    $json = json_encode(array(
            'Type' => 'success'
            ));
    header('Content-type: application/json');
    echo $json;
    exit;
}
add_action('wp_ajax_GET_SELECTED','get_selected');
function get_selected(){
        global $wpdb;
        $table_name = $wpdb->prefix . "snr";
        $sql = 'select * from ' . $table_name . ' where selected = 1';
        $results = $wpdb->get_results($sql);
        $json = json_encode($results);

        header('Content-type: application/json');
        echo $json;
        exit;
}
add_action('wp_ajax_UPDATE_COMBO','update_combo');
function update_combo()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "snr";
    $id = $_POST['id'];
    
    $safe_img_delay = intval( $_POST['data']['combo']['img_delay']);
        if ( ! $safe_img_delay )
        {
            $safe_img_delay = '';
            if ( strlen( $safe_img_delay ) > 3 )
            $safe_img_delay = substr( $safe_img_delay, 0, 3 );
        }
    $safe_img_offset = intval( $_POST['data']['combo']['img_offset']);
        if ( ! $safe_img_offset )
        {
            $safe_img_offset = '';
            if ( strlen( $safe_img_offset ) > 3 )
            $safe_img_offset = substr( $safe_img_offset, 0, 3 );
        }
    $safe_div_delay = intval( $_POST['data']['combo']['div_delay']);
        if ( ! $safe_div_delay )
        {
            $safe_div_delay = '';
            if ( strlen( $safe_div_delay ) > 3 )
            $safe_div_delay = substr( $safe_div_delay, 0, 3 );
        }
    $safe_div_offset = intval( $_POST['data']['combo']['div_offset']);
        if ( ! $safe_div_offset )
        {
            $safe_div_offset = '';
            if ( strlen( $safe_div_offset ) > 3 )
            $safe_div_offset = substr( $safe_div_offset, 0, 3 );
        }
    $safe_p_delay = intval( $_POST['data']['combo']['p_delay']);
        if ( ! $safe_p_delay )
        {
            $safe_p_delay = '';
            if ( strlen( $safe_p_delay ) > 3 )
            $safe_p_delay = substr( $safe_p_delay, 0, 3 );
        }
    $safe_p_offset = intval( $_POST['data']['combo']['p_offset']);
        if ( ! $safe_p_offset )
        {
            $safe_p_offset = '';
            if ( strlen( $safe_p_offset ) > 3 )
            $safe_p_offset = substr( $safe_p_offset, 0, 3 );
        }
    function sanitize_drop_down($input) {
            $valid = array(
                'None' => 'None',
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
                'Zoom In Left' => 'Zoom In Left');
            if (array_key_exists($input, $valid)) 
            {
                   return $input;
            } 
            else 
            {
                   return 'None';
            }
    }
    function sanitize_drop_down_effect($input) {
            $valid = array(
                'none' => 'none',
                'lightSpeedIn' => 'lightSpeedIn',
                'rollIn' => 'rollIn',
                'wobble' => 'wobble',
                'tada' => 'tada',
                'swing' => 'swing',
                'shake' => 'shake',
                'rubberBand' => 'rubberBand',
                'pulse' => 'pulse',
                'flash' => 'flash',
                'fadeIn' => 'fadeIn',
                'fadeInUp' => 'fadeInUp',
                'fadeInDown' => 'fadeInDown',
                'fadeInRight' => 'fadeInRight',
                'fadeInLeft' => 'fadeInLeft',
                'bounceIn' => 'bounceIn',
                'bounceInDown' => 'bounceInDown',
                'bounceInLeft' => 'bounceInLeft',
                'bounceInUp' => 'bounceInUp',
                'flipInX' => 'flipInX',
                'flipInY' => 'flipInY',
                'rotateIn' => 'rotateIn',
                'rotateInDownLeft' => 'rotateInDownLeft',
                'rotateInDownRight' => 'rotateInDownRight',
                'rotateInUpLeft' => 'rotateInUpLeft',
                'rotateInUpRight' => 'rotateInUpRight',
                'zoomIn' => 'zoomIn',
                'zoomInDown' => 'zoomInDown',
                'zoomInUp' => 'zoomInUp',
                'zoomInRight' => 'zoomInRight',
                'zoomInLeft' => 'zoomInLeft');
            if (array_key_exists($input, $valid)) 
            {
                   return $input;
            } 
            else 
            {
                   return 'none';
            }
    }

    $safeImgEffectName = sanitize_drop_down($_POST['data']['combo']['img_effect_name']);
    $safeImgEffect = sanitize_drop_down_effect($_POST['data']['combo']['img_effect']);
    $safeDivEffectName = sanitize_drop_down($_POST['data']['combo']['div_effect_name']);
    $safeDivEffect = sanitize_drop_down_effect($_POST['data']['combo']['div_effect']);
    $safePEffectName = sanitize_drop_down($_POST['data']['combo']['p_effect_name']);
    $safePEffect = sanitize_drop_down_effect($_POST['data']['combo']['p_effect']);




    $data = array(
        'img_effect' => $safeImgEffect,
        'img_effect_name' => $safeImgEffectName,
        'img_delay' => $safe_img_delay,
        'img_offset' => $safe_img_offset,
        'div_effect' => $safeDivEffect,
        'div_effect_name' => $safeDivEffectName,
        'div_delay' => $safe_div_delay,
        'div_offset' => $safe_div_offset,
        'p_effect' => $safePEffect,
        'p_effect_name' => $safePEffectName,
        'p_delay' => $safe_p_delay,
        'p_offset' => $safe_p_offset
        );

    $where = array('id' => $id);

    $wpdb->update($table_name, $data, $where);
    $json = json_encode(array(
        'Type' => 'success'
    ));
    header('Content-type: application/json');
    echo $json;
    exit;
}

add_action('wp_ajax_SAVE_CUSTOM', 'save_custom');
function save_custom()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "snr_custom";
     function sanitize_drop_down($input) {
            $valid = array(
                'None' => 'None',
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
                'Zoom In Left' => 'Zoom In Left');
            if (array_key_exists($input, $valid)) 
            {
                   return $input;
            } 
            else 
            {
                   return 'None';
            }
    }
    function sanitize_drop_down_effect($input) {
            $valid = array(
                'none' => 'none',
                'lightSpeedIn' => 'lightSpeedIn',
                'rollIn' => 'rollIn',
                'wobble' => 'wobble',
                'tada' => 'tada',
                'swing' => 'swing',
                'shake' => 'shake',
                'rubberBand' => 'rubberBand',
                'pulse' => 'pulse',
                'flash' => 'flash',
                'fadeIn' => 'fadeIn',
                'fadeInUp' => 'fadeInUp',
                'fadeInDown' => 'fadeInDown',
                'fadeInRight' => 'fadeInRight',
                'fadeInLeft' => 'fadeInLeft',
                'bounceIn' => 'bounceIn',
                'bounceInDown' => 'bounceInDown',
                'bounceInLeft' => 'bounceInLeft',
                'bounceInUp' => 'bounceInUp',
                'flipInX' => 'flipInX',
                'flipInY' => 'flipInY',
                'rotateIn' => 'rotateIn',
                'rotateInDownLeft' => 'rotateInDownLeft',
                'rotateInDownRight' => 'rotateInDownRight',
                'rotateInUpLeft' => 'rotateInUpLeft',
                'rotateInUpRight' => 'rotateInUpRight',
                'zoomIn' => 'zoomIn',
                'zoomInDown' => 'zoomInDown',
                'zoomInUp' => 'zoomInUp',
                'zoomInRight' => 'zoomInRight',
                'zoomInLeft' => 'zoomInLeft');
            if (array_key_exists($input, $valid)) 
            {
                   return $input;
            } 
            else 
            {
                   return 'none';
            }
    }

    $safe_custom_delay = intval( $_POST['data']['custom']['custom_delay']);
        if ( ! $safe_custom_delay )
        {
            $safe_custom_delay = '';
            if ( strlen( $safe_custom_delay ) > 3 )
            $safe_custom_delay = substr( $safe_custom_delay, 0, 3 );
        }
    $safe_custom_offset = intval( $_POST['data']['custom']['custom_offset']);
        if ( ! $safe_custom_offset )
        {
            $safe_custom_offset = '';
            if ( strlen( $safe_custom_offset ) > 3 )
            $safe_custom_offset = substr( $safe_custom_offset, 0, 3 );
        }

    $safeCustomEffect = sanitize_drop_down_effect($_POST['data']['custom']['custom_effect']);
    $safeCustomEffectName = sanitize_drop_down($_POST['data']['custom']['custom_effect_name']);


    $data = array(
        'custom_class' => sanitize_text_field($_POST['data']['custom']['custom_class']),
        'custom_effect' => $safeCustomEffect,
        'custom_effect_name' => $safeCustomEffectName,
        'custom_delay' => $safe_custom_delay,
        'custom_offset' => $safe_custom_offset

        );
    $rows_affected = $wpdb->insert($table_name, $data);

    $sql = "select * from " .$table_name . ' order by id desc limit 1 ';

    $results = $wpdb->get_results($sql);
    $json = json_encode($results);

    header('Content-type: application/json');
    echo $json;
    exit;
}
add_action('wp_ajax_DISPLAY_CUSTOM','get_all_custom');
function get_all_custom()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "snr_custom";

    $sql = "select * from " . $table_name;

    $results = $wpdb->get_results($sql);
    $json = json_encode($results);

    header('Content-type: application/json');
    echo $json;
    exit;

}
add_action('wp_ajax_DELETE_CUSTOM','delete_custom');
function delete_custom()
{
        global $wpdb;
        $table_name = $wpdb->prefix . "snr_custom";
        $id = $_POST['id'];
        $wpdb->delete($table_name, array('id' => $id), array('%d'));

        $json = json_encode(array(
            'Type' => 'hooray'
         ));
        header('Content-type: application/json');
        echo $json;
        die;
}
add_action('wp_ajax_GET_CUSTOM_FOR_EDIT','get_custom_for_edit');
function get_custom_for_edit()
{
        global $wpdb;
        $table_name = $wpdb->prefix . "snr_custom";
        $id = $_POST['id'];

        $sql = $wpdb->prepare("Select * from $table_name where id = %d",$id);

        $results = $wpdb->get_results($sql);
        $json = json_encode($results);

    header('Content-type: application/json');
    echo $json;
    exit;
}

add_action('wp_ajax_UPDATE_CUSTOM','update_custom');
function update_custom()
{
        global $wpdb;
        $table_name = $wpdb->prefix . "snr_custom";
        $id = $_POST['id'];

        function sanitize_drop_down($input) {
                $valid = array(
                    'None' => 'None',
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
                    'Zoom In Left' => 'Zoom In Left');
                if (array_key_exists($input, $valid)) 
                {
                       return $input;
                } 
                else 
                {
                       return 'None';
                }
        }
        function sanitize_drop_down_effect($input) {
                $valid = array(
                    'none' => 'none',
                    'lightSpeedIn' => 'lightSpeedIn',
                    'rollIn' => 'rollIn',
                    'wobble' => 'wobble',
                    'tada' => 'tada',
                    'swing' => 'swing',
                    'shake' => 'shake',
                    'rubberBand' => 'rubberBand',
                    'pulse' => 'pulse',
                    'flash' => 'flash',
                    'fadeIn' => 'fadeIn',
                    'fadeInUp' => 'fadeInUp',
                    'fadeInDown' => 'fadeInDown',
                    'fadeInRight' => 'fadeInRight',
                    'fadeInLeft' => 'fadeInLeft',
                    'bounceIn' => 'bounceIn',
                    'bounceInDown' => 'bounceInDown',
                    'bounceInLeft' => 'bounceInLeft',
                    'bounceInUp' => 'bounceInUp',
                    'flipInX' => 'flipInX',
                    'flipInY' => 'flipInY',
                    'rotateIn' => 'rotateIn',
                    'rotateInDownLeft' => 'rotateInDownLeft',
                    'rotateInDownRight' => 'rotateInDownRight',
                    'rotateInUpLeft' => 'rotateInUpLeft',
                    'rotateInUpRight' => 'rotateInUpRight',
                    'zoomIn' => 'zoomIn',
                    'zoomInDown' => 'zoomInDown',
                    'zoomInUp' => 'zoomInUp',
                    'zoomInRight' => 'zoomInRight',
                    'zoomInLeft' => 'zoomInLeft');
                if (array_key_exists($input, $valid)) 
                {
                       return $input;
                } 
                else 
                {
                       return 'none';
                }
        }

        $safe_custom_delay = intval( $_POST['data']['custom']['custom_delay']);
            if ( ! $safe_custom_delay )
            {
                $safe_custom_delay = '';
                if ( strlen( $safe_custom_delay ) > 3 )
                $safe_custom_delay = substr( $safe_custom_delay, 0, 3 );
            }
        $safe_custom_offset = intval( $_POST['data']['custom']['custom_offset']);
            if ( ! $safe_custom_offset )
            {
                $safe_custom_offset = '';
                if ( strlen( $safe_custom_offset ) > 3 )
                $safe_custom_offset = substr( $safe_custom_offset, 0, 3 );
            }

        $safeCustomEffect = sanitize_drop_down_effect($_POST['data']['custom']['custom_effect']);
        $safeCustomEffectName = sanitize_drop_down($_POST['data']['custom']['custom_effect_name']);


        $data = array(
            'custom_class' => sanitize_text_field($_POST['data']['custom']['custom_class']),
            'custom_effect' => $safeCustomEffect,
            'custom_effect_name' => $safeCustomEffectName,
            'custom_delay' => $safe_custom_delay,
            'custom_offset' => $safe_custom_offset
        );

        $where = array('id' => $id);
        $wpdb->update($table_name, $data, $where);

            // $sql = "select * from " . $table_name . " where id = " .$id;
            // $results = $wpdb->get_results($sql);
        $json = json_encode(array(
                'Type' => 'success'
        ));

        header('Content-type: application/json');
        echo $json;
        exit;
}

register_activation_hook(__FILE__, 'install_scroll_and_reveal');

function install_scroll_and_reveal()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "snr";

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
    {

         $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            combo_name VARCHAR(50),
            img_effect VARCHAR(50),
            img_effect_name VARCHAR(50),
            img_duration int(5),
            img_delay int(5),
            img_offset int(5),
            img_iteration int(5),
            div_effect VARCHAR(50),
            div_effect_name VARCHAR(50),
            div_duration int(5),
            div_delay int(5),
            div_offset int(5),
            div_iteration int(5),
            p_effect VARCHAR(50),
            p_effect_name VARCHAR(50),
            p_duration int(5),
            p_delay int(5),
            p_offset int(5),
            p_iteration int(5),
            selected int(2),
            UNIQUE KEY id (id)
            );";
            
    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}  




register_activation_hook(__FILE__, 'disable_combo');
  function disable_combo(){


     global $wpdb;
     $table_name = $wpdb->prefix . "snr";

     $disable_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(combo_name) FROM $table_name where combo_name = %s","Disable"));

     if ($disable_count != 1){

      $combo_name = "Disable";
      $img_effect  = "none";
      $img_effect_name = "None";
      $img_duration = "0";
      $img_delay = "0";
      $img_offset = "0";
      $img_iteration = "0";
      $div_effect = "none";
      $div_effect_name = "None";
      $div_duration = "0";
      $div_delay = "0";
      $div_offset = "0";
      $div_iteration = "0";
      $p_effect = "none";
      $p_effect_name = "None";
      $p_duration = "0";
      $p_delay = "0";
      $p_offset = "0";
      $p_iteration = "0";
      $selected = "0";


      $rows_affected = $wpdb->insert( $table_name, array('id' => '0','combo_name' => $combo_name,'img_effect' => $img_effect,'img_effect_name' => $img_effect_name,
        'img_duration' => $img_duration,
        'img_delay' => $img_delay,
        'img_offset' => $img_offset,
        'img_iteration' => $img_iteration,
        'div_effect' => $div_effect,
        'div_effect_name' => $div_effect_name,
        'div_duration' => $div_duration,
        'div_delay' => $div_delay,
        'div_offset' => $div_offset,
        'div_iteration' => $div_iteration,
        'p_effect' => $p_effect,
        'p_effect_name' => $p_effect_name,
        'p_duration' => $p_duration,
        'p_delay' => $p_delay,
        'p_offset' => $p_offset,
        'p_iteration' => $p_iteration,
        'selected' => $selected
       ));
     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     dbDelta( $rows_affected );

       }
   }


       register_activation_hook(__FILE__, 'combo_one');
  function combo_one(){

    

     global $wpdb;
     $table_name = $wpdb->prefix . "snr";

     $combo1_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(combo_name) FROM $table_name where combo_name = %s","Combo 1"));

     if ($combo1_count != 1){

      $combo_name = "Combo 1";
      $img_effect  = "tada";
      $img_effect_name = "Tadaa!";
      $img_duration = "0";
      $img_delay = "0";
      $img_offset = "0";
      $img_iteration = "0";
      $div_effect = "tada";
      $div_effect_name = "Tadaa!";
      $div_duration = "0";
      $div_delay = "0";
      $div_offset = "0";
      $div_iteration = "0";
      $p_effect = "tada";
      $p_effect_name = "Tadaa!";
      $p_duration = "0";
      $p_delay = "0";
      $p_offset = "0";
      $p_iteration = "0";
      $selected = "0";


      $combo1 = $wpdb->insert( $table_name, array('combo_name' => $combo_name,'img_effect' => $img_effect,'img_effect_name' => $img_effect_name,
        'img_duration' => $img_duration,
        'img_delay' => $img_delay,
        'img_offset' => $img_offset,
        'img_iteration' => $img_iteration,
        'div_effect' => $div_effect,
        'div_effect_name' => $div_effect_name,
        'div_duration' => $div_duration,
        'div_delay' => $div_delay,
        'div_offset' => $div_offset,
        'div_iteration' => $div_iteration,
        'p_effect' => $p_effect,
        'p_effect_name' => $p_effect_name,
        'p_duration' => $p_duration,
        'p_delay' => $p_delay,
        'p_offset' => $p_offset,
        'p_iteration' => $p_iteration,
        'selected' => $selected
       ));
     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     dbDelta( $combo1 );

       }
   }


register_activation_hook(__FILE__, 'combo_two');
  function combo_two(){

     global $wpdb;
     $table_name = $wpdb->prefix . "snr";

     $combo2_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(combo_name) FROM $table_name where combo_name = %s","Combo 2"));

     if ($combo2_count != 1){

      $combo_name = "Combo 2";
      $img_effect  = "swing";
      $img_effect_name = "Swing";
      $img_duration = "0";
      $img_delay = "0";
      $img_offset = "0";
      $img_iteration = "0";
      $div_effect = "swing";
      $div_effect_name = "Swing";
      $div_duration = "0";
      $div_delay = "0";
      $div_offset = "0";
      $div_iteration = "0";
      $p_effect = "swing";
      $p_effect_name = "Swing";
      $p_duration = "0";
      $p_delay = "0";
      $p_offset = "0";
      $p_iteration = "0";
      $selected = "0";


      $combo2 = $wpdb->insert( $table_name, array('combo_name' => $combo_name,'img_effect' => $img_effect,'img_effect_name' => $img_effect_name,
        'img_duration' => $img_duration,
        'img_delay' => $img_delay,
        'img_offset' => $img_offset,
        'img_iteration' => $img_iteration,
        'div_effect' => $div_effect,
        'div_effect_name' => $div_effect_name,
        'div_duration' => $div_duration,
        'div_delay' => $div_delay,
        'div_offset' => $div_offset,
        'div_iteration' => $div_iteration,
        'p_effect' => $p_effect,
        'p_effect_name' => $p_effect_name,
        'p_duration' => $p_duration,
        'p_delay' => $p_delay,
        'p_offset' => $p_offset,
        'p_iteration' => $p_iteration,
        'selected' => $selected
       ));
     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     dbDelta( $combo2 );

       }
}


register_activation_hook(__FILE__, 'install_custom_scroll_and_reveal');

function install_custom_scroll_and_reveal()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "snr_custom";

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
    {

         $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            custom_class VARCHAR(50),
            custom_effect VARCHAR(50),
            custom_effect_name VARCHAR(50),
            custom_delay int(5),
            custom_offset int(5),
            date_created TIMESTAMP default CURRENT_TIMESTAMP,
            UNIQUE KEY id (id)
            );";
            
    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}   


?>