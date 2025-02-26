<?php
//blocking direct access the file
if ( ! defined( 'ABSPATH' ) ) {
    die( '&ldquo;the door is shut it was made by those who are dead&rdquo;' );
}

/************************************/
//HOOKS
/************************************/
add_action("plugins_loaded",function(){
    if(is_admin()){
        include_once('class/cpt-admin.php');
    }else{
        include_once('class/class-gbql-button.php');
        include_once('class/class-frontend.php');
        GBQuickLaunch();
    }
});

add_filter('gbql_button_icon',function($button){

    //if $button is NOT GBQuickLaunch button
    if(!$button instanceof GBQuickLaunchButton)
        return false;

    //if the button is NOT a valid GBQuickLaunch button
    if(!$button->Status())
        return false;

    $val = '';
    switch ($button->get_type()){
        case 'facebook':
            $val = GBQLURL.'/images/gb-quick-launch-facebook.png';
            break;
        case 'twitter':
            $val = GBQLURL.'/images/gb-quick-launch-twitter.png';
            break;
        case 'googleplus':
            $val = GBQLURL.'/images/gb-quick-launch-googleplus.png';
            break;
        case 'pinterest':
            $val = GBQLURL.'/images/gb-quick-launch-pinterest.png';
            break;
        case 'email':
            $val = GBQLURL.'/images/gb-quick-launch-email.png';
            break;
        case 'googlegmail':
            $val = GBQLURL.'/images/gb-quick-launch-gmail.png';
            break;
        case 'wordpress':
            $val = GBQLURL.'/images/gb-quick-launch-wordpress.png';
            break;
        case 'whatsapp':
            $val = GBQLURL.'/images/gb-quick-launch-whatsapp.png';
            break;
        case 'linkedin':
            $val = GBQLURL.'/images/gb-quick-launch-linkedin.png';
            break;
        default:
            $val = get_the_post_thumbnail_url($button->get_post_id(),'full');
    }
    return $val;
},1,2);

add_filter('gbql_button_classes',function($classes,$btn){
    $classes[] = $btn->get_type();
    if($btn->get_type() == 'content'){
        $classes[] = 'code';
    }

    return $classes;
},5,2);

add_filter('gbql_button_code',function($button){

    //if $button is NOT GBQuickLaunch button
    if(!$button instanceof GBQuickLaunchButton)
        return false;

    //if the button is NOT a valid GBQuickLaunch button
    if(!$button->Status())
        return false;

    $val = "";
    switch ($button->get_type()){
        case 'url':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url($button->get_code()).'">'.$button->get_icon().'</a>';
            break;
        case 'facebook':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url('https://www.facebook.com/'.esc_attr($button->get_code())).'">'.$button->get_icon().'</a>';
            break;
        case 'twitter':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url('https://twitter.com/'.esc_attr($button->get_code())).'">'.$button->get_icon().'</a>';
            break;
        case 'googleplus':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url('https://plus.google.com/+'.esc_attr($button->get_code())).'">'.$button->get_icon().'</a>';
            break;
        case 'pinterest':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url('https://www.pinterest.com/'.esc_attr($button->get_code())).'">'.$button->get_icon().'</a>';
            break;
        case 'email':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" href="mailto:'.sanitize_email($button->get_code()).'">'.$button->get_icon().'</a>';
            break;
        case 'googlegmail':
            if(wp_is_mobile()){
                $url = "mailto:";
            }else{
                $url = "https://mail.google.com/mail/u/0/?view=cm&to=";
            }
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.$url.sanitize_email($button->get_code()).'">'.$button->get_icon().'</a>';
            break;
        case 'linkedin':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url('https://www.linkedin.com/in/'.esc_attr($button->get_code())).'">'.$button->get_icon().'</a>';
            break;
        case 'wordpress':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url('https://profiles.wordpress.org/'.esc_attr($button->get_code())).'">'.$button->get_icon().'</a>';
            break;
        case 'whatsapp':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" target="_blank" href="'.esc_url('https://wa.me/'.esc_attr($button->get_code())).'">'.$button->get_icon().'</a>';
            break;
        case 'innerLink':
            $val = '<a class="gbql-button-link '.esc_attr($button->get_type()).'" href="'.esc_url(get_permalink(intval($button->get_code()))).'">'.$button->get_icon().'</a>';
            break;
        case 'code':
            $buttons_settings = get_option("gbql_settings");

            if(isset($buttons_settings["gbql_main_position"]) && ($buttons_settings["gbql_main_position"] == "BL" || $buttons_settings["gbql_main_position"] == "BR" || $buttons_settings["gbql_main_position"] == "custom")){
                $val = '<div class="gbql-code-con"><div class="gbql-scroller-wrap"><div class="gbql-scroller-inner">'. do_shortcode($button->get_code()).'</div></div></div>';
            }

            $val .= '<a class="gbql-button-link '.esc_attr($button->get_type()).'" href="#">'.$button->get_icon().'</a>';
            if(isset($buttons_settings["gbql_main_position"]) && ($buttons_settings["gbql_main_position"] == "TL" || $buttons_settings["gbql_main_position"] == "TR" || $buttons_settings["gbql_main_position"] == "custom")){
                $val .= '<div class="gbql-code-con"><div class="gbql-scroller-wrap"><div class="gbql-scroller-inner">'. do_shortcode($button->get_code()).'</div></div></div>';
            }

            break;
        default:
            $buttons_settings = get_option("gbql_settings");

            if(isset($buttons_settings["gbql_main_position"]) && ($buttons_settings["gbql_main_position"] == "BL" || $buttons_settings["gbql_main_position"] == "BR" ||  ($buttons_settings["gbql_main_position"] == "custom") && $buttons_settings["custom-css-top"] >= '50')){
                $val = '<div class="gbql-code-con"><div class="gbql-scroller-wrap"><div class="gbql-scroller-inner">'. apply_filters('the_content',$button->get_code()) .'</div></div></div>';
            }

            $val .= '<a class="gbql-button-link '.esc_attr($button->get_type()).'" href="#">'.$button->get_icon().'</a>';

            if(isset($buttons_settings["gbql_main_position"]) && ($buttons_settings["gbql_main_position"] == "TL" || $buttons_settings["gbql_main_position"] == "TR" ||  ($buttons_settings["gbql_main_position"] == "custom") && $buttons_settings["custom-css-top"] < '50')){
                $val .= '<div class="gbql-code-con"><div class="gbql-scroller-wrap"><div class="gbql-scroller-inner">'. apply_filters('the_content',$button->get_code()) .'</div></div></div>';
            }
            break;
    }
    $val = $val . $button->get_area_style();
    return $val;
},1,1);


/************************************/
//FUNCTIONS
/************************************/

/*
 * do : search the GBQuickLaunch buttons array by key,value or both
 */
function gbql_search_buttons($key,$val,$all = true) {
    $GBQuickLaunch = GBQuickLaunchAdmin();
    $types = $GBQuickLaunch->get_button_types();

    if(!$types)
        return false;

    $results = array();
    foreach ($types as $index => $type){
        if(!is_array($type))
            continue;
        if(!empty($key) && $val !== ''){
            if(isset($type[$key]) && $type[$key] === $val){
                if(!$all){
                    return $type;
                }else{
                    $results[] = $type;
                }
            }

        }else if(empty($key) && $val !== ''){
            if(array_search($val,$type)){
                if(!$all){
                    return $type;
                }else{
                    $results[] = $type;
                }
            }
        }else if(!empty($key) && $val !== ''){
            if(array_key_exists($key,$type)){
                if(!$all){
                    return $type;
                }else{
                    $results[] = $type;
                }
            }
        }
    }

    if(!empty($results)){
        return $results;
    }
    return false;
}

/************************************/
//DEBUG
/************************************/
if ( ! function_exists( 'gb_print_r' ) ):
    function gb_print_r($array, $var_dump = false, $place = ''){
        if(isset($_GET['gbweb'])){
            //die(print_r(debug_backtrace(),true));
            if($place == ''){
                $place_array = debug_backtrace();
                $place = $place_array[0]['file'].' - Line:'.$place_array[0]['line'];
            }

            if(is_bool($array) || !$array || empty($array)){
                $var_dump = true;
            }

            if(!$var_dump){
                die($place.' = <pre style="direction:ltr;text-align: left;">'.print_r($array,true).'</pre>');
            }else{
                ob_start();
                var_dump($array);
                $result = ob_get_clean();
                die($place.' = <pre style="direction:ltr;text-align: left;">'.print_r($result,true).'</pre>');
            }
        }
    }
endif;
