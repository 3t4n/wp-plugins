<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	// Build Shortcode
	add_action('wp_ajax_itls_shortcode_builder', 'itls_shortcode_builder');

	function itls_shortcode_builder()
	{
		//Convert String of post date to separate index
		parse_str($_POST['postdata'], $my_array_of_vars);
		$shortcode = '[itls_logo_showcase';
		foreach($my_array_of_vars as $field_name => $value)
		{
			$name = str_ireplace(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX ,'' ,$field_name);
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
    add_action('wp_ajax_itls_preview', 'itls_preview');
    function itls_preview()
    {
        //Convert String of post date to separate index
        parse_str($_POST['postdata'], $my_array_of_vars);
        $atts = array();
        foreach($my_array_of_vars as $field_name => $value)
        {
            $name = str_ireplace(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX ,'' ,$field_name);
            if($name == 'category')
            {
                $value = implode(',',$value);
            }
            $atts[$name] = $value;
        }
        echo itls_preview_shortcode($atts);
        die();
    }
