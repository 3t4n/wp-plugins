<?php

function acfw30_styles(){
	
	$args = array(
        'post_type' => 'acfw30_forms',
        'numberposts' => -1,
    );

    $posts = get_posts( $args );

	echo '<style type="text/css">';

	foreach( $posts as $post ){

		$bg_spcolor = get_post_meta($post->ID, 'acfw30_form_bg_spcolor', true);
		$font_spcolor = get_post_meta($post->ID, 'acfw30_form_font_spcolor', true);
		$btn_spcolor = get_post_meta($post->ID, 'acfw30_form_btn_spcolor', true);
		$border_spcolor = get_post_meta($post->ID, 'acfw30_form_border_spcolor', true);
		$btn_text_spcolor = get_post_meta($post->ID, 'acfw30_form_btn_text_spcolor', true);
		$placeholder_spcolor = get_post_meta($post->ID, 'acfw30_form_placeholder_spcolor', true);

		echo'
		#acfw30_'.$post->ID.' {background: rgba(51,51,51,0.9);}
		#acfw30_'.$post->ID.':target {transform: scale(1);opacity: 1;transition: opacity 0.3s linear 0.1s, transform 0.1s linear, background 0.3s linear;}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form {background:'.$bg_spcolor.'; color:'.$font_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form p{color:'.$font_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form a{color:'.$font_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form button{background:'.$btn_spcolor.'; color:'.$btn_text_spcolor.'}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form input{border-color: '.$border_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form textarea{border-color: '.$border_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form input::-webkit-input-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form input:-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form input::-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form input:-ms-input-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form textarea::-webkit-input-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form textarea:-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form textarea::-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_'.$post->ID.' .acfw30_popup_contact_form textarea:-ms-input-placeholder{color: '.$placeholder_spcolor.';}
		';

		echo'
		#acfw30_contact_form_'.$post->ID.':target {transform: scale(1);opacity: 1;transition: opacity 0.3s linear 0.1s, transform 0.1s linear, background 0.3s linear;}
		#acfw30_contact_form_'.$post->ID.' {background:'.$bg_spcolor.'; color:'.$font_spcolor.'; border: solid 1px '.$border_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' p{color:'.$font_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' a{color:'.$font_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' button{background:'.$btn_spcolor.'; color:'.$btn_text_spcolor.'}
		#acfw30_contact_form_'.$post->ID.' input{border-color: '.$border_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' textarea{border-color: '.$border_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' input::-webkit-input-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' input:-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' input::-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' input:-ms-input-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' textarea::-webkit-input-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' textarea:-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' textarea::-moz-placeholder{color: '.$placeholder_spcolor.';}
		#acfw30_contact_form_'.$post->ID.' textarea:-ms-input-placeholder{color: '.$placeholder_spcolor.';}
		';
	}	

	echo '</style>';
}

add_action('wp_head', 'acfw30_styles');

function acfw30_core(){

 	$args = array(
        'post_type' => 'acfw30_forms',
        'numberposts' => -1,
    );

    $posts = get_posts( $args );

    foreach( $posts as $post ){
    	
		$acfw30_form_fields = get_post_meta($post->ID, 'acfw30_form_fields', true);
		$acfw30_form_fields = wp_specialchars_decode($acfw30_form_fields, ENT_QUOTES);
	
		$acfw30_template_file = plugin_dir_path(__FILE__).'/templates/custom-popup-form.php';
		
		if (file_exists($acfw30_template_file)){ 
			require($acfw30_template_file);
		} else {
			require(plugin_dir_path(__FILE__).'/templates/popup-form.php');
		}

	}
	
}
add_action('wp_footer', 'acfw30_core');

//shortcode 
add_shortcode('acfw30', 'acfw30_shortcode');
function acfw30_shortcode($atts, $content = null) {
	extract( shortcode_atts(array(
        "id" => '',
    ), $atts ) );

    $form = '';

	if(!empty($id)){

		$args = array(
	        'post_type' => 'acfw30_forms',
	        'include' => $id,
	        'numberposts' => 1,
	    );

	    $posts = get_posts( $args );

	    foreach( $posts as $post ){
		    $bg_spcolor = get_post_meta($post->ID, 'acfw30_form_bg_spcolor', true);
			$font_spcolor = get_post_meta($post->ID, 'acfw30_form_font_spcolor', true);
			$btn_spcolor = get_post_meta($post->ID, 'acfw30_form_btn_spcolor', true);
			$border_spcolor = get_post_meta($post->ID, 'acfw30_form_border_spcolor', true);
			$btn_text_spcolor = get_post_meta($post->ID, 'acfw30_form_btn_text_spcolor', true);
			$placeholder_spcolor = get_post_meta($post->ID, 'acfw30_form_placeholder_spcolor', true);
			
			$acfw30_form_fields = get_post_meta($post->ID, 'acfw30_form_fields', true);
			$acfw30_form_fields = wp_specialchars_decode($acfw30_form_fields, ENT_QUOTES);
		
			$acfw30_template_file = plugin_dir_path(__FILE__).'/templates/custom-form.php';
			
			if (file_exists($acfw30_template_file)){ 
				require($acfw30_template_file);
			} else {
				require(plugin_dir_path(__FILE__).'/templates/form.php');
			}
		}
		return $form;
	} else {
		return $form;
	}

}


?>