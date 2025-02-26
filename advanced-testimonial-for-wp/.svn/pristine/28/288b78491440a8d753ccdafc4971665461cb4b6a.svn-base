<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Build Shortcode
add_action('wp_ajax_itt_testimonial_shortcode_builder', 'itt_testimonial_shortcode_builder');

function itt_testimonial_shortcode_builder()
{
    //Convert String of post date to separate index
    parse_str($_POST['postdata'], $my_array_of_vars);
    $shortcode = '[itt_testimonial';

    foreach($my_array_of_vars as $field_name => $value)
    {
        $name = str_ireplace(ITT_TESTIMONIAL_FIELDS_PERFIX ,'' ,$field_name);

        if($name == 'category')
        {
            $arr = $value;
            $value = implode(',',$arr);
        }
        if($value != 'none' && $value != '' && $value != '0')
            $shortcode .= ' '.$name.'="'.$value.'" ';
    }
    $shortcode .= ']';
    echo $shortcode;
    wp_die();
}

// ajax shortcode preview
add_action('wp_ajax_itt_testimonial_preview', 'itt_testimonial_preview');
function itt_testimonial_preview()
{
    //Convert String of post date to separate index
    parse_str($_POST['postdata'], $my_array_of_vars);
    $atts = array();
    foreach($my_array_of_vars as $field_name => $value)
    {
        $name = str_ireplace(ITT_TESTIMONIAL_FIELDS_PERFIX ,'' ,$field_name);
        if($name == 'category')
        {
            $value = implode(',',$value);
        }
        $atts[$name] = $value;
    }
    echo itt_testimonial_preview_shortcode($atts);
    die();
}