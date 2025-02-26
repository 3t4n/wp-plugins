<?php
/**
* This function will enque our script to login page.
*
*/
add_action( 'login_enqueue_scripts', 'advance_login_style_enque_script', 1 );

function advance_login_style_enque_script(){
	
	$options=get_advance_login_style_options();
	
	$css_login_form='#login form {';
	if(isset($options['Login_form1_Background_Clore']) && !empty($options['Login_form1_Background_Clore']))
	{
		$css_login_form.='background-color:'.$options['Login_form1_Background_Clore'].';';
	}
	
	if(isset($options['form_shadow']) && isset($options['Login_form1_Box_shadow_Clore']))
	{
		$css_login_form.='box-shadow:'.$options['form_shadow'].''.$options['Login_form1_Box_shadow_Clore'].';';
	}
	
	if(isset($options['Login_form_Background_Image']))
	{
		$css_login_form.='background-image:url('.$options['Login_form_Background_Image'].');';
	}
	
	if(isset($options['form_position']))
	{
		$css_login_form.='background-position:'.$options['form_position'].';';
	}
	
	if(isset($options['form_background_repeat']))
	{
		$css_login_form.='background-repeat:'.$options['form_background_repeat'].';';

	}
	
	if(isset($options['form_border_size']))
	{
		$css_login_form.='border:'.$options['form_border_size'].'px solid '.$options['Login_form1_Background_border_Clore'].';';
	}
	if(isset($options['form_border_radius']))
	{
		$css_login_form.='border-radius:'.$options['form_border_radius']. 'px;';
	}
	
	$css_login_form.="}";
	
	$css_login_form_label='.login label{';
	if(isset($options['Login_form1_Background_lebel_Clore']))
	{
		$css_login_form_label.='color:'.$options['Login_form1_Background_lebel_Clore'].';';
		
		$css_login_form_label.='font-size:'.$options['form_lebal_font_size'].'px;';
	}
	
	$css_login_form_label.="}";
	
	
	$button='.wp-core-ui .button-primary{';
	if(isset($options['button_color']))
	{
		$button.='background-color:'.$options['button_color'].';';
		$button.='border-color:'.$options['button_border_color'].';';

	}
	if(isset($options['button_text_color']))
	{
	 	$button.='color:'.$options['button_text_color'].';';
	}
	$button.="}";
	
	$button_onhover='.wp-core-ui .button-primary:hover{';
	if(isset($options['button_color']))
	{
		$button_onhover.='background-color:'.$options['onhover_button_color'].';';
	}
	 
	$button_onhover.="}";
	
	
	$logo='.login h1 a {';
	if(isset($options['Login_logo_Image']) && !empty($options['Login_logo_Image']))
	{
		$logo.='background-image:url('.$options['Login_logo_Image'].');';
		
	}
	else
	{
		 $logo.='background-image:url('.advance_login_style_URL . 'images/advance-login-style80x80.png'.') !important;';
	}
	
	if(isset($options['logo_height']))
	{
		$logo.='height:'.$options['logo_height'].'px !important;';
	}
	
	if(isset($options['logo_width']))
	{
		$logo.='width:'.$options['logo_width'].'px !important;';
	}
	
					  
	if(isset($options['background_size']))
	{
		$logo.='background-size:'.$options['background_size'].'px '.$options['background_size'].'px;';
	}
					  
	if(isset($options['logo_logo__repeat']))
	{	
		$logo.='background-repeat:'.$options['logo_logo__repeat'].';';
	}  
	
	$logo.="}";
	
	$body='body, html {';
	if(isset($options['Login_Background_Image']))
	{
		$body.='background-image:url('.$options['Login_Background_Image'].') !important;';
    }
	
	if(isset($options['background_repeat']))
	{	
		$body.='background-repeat:'.$options['background_repeat'].';';
	} 
	 
	if(isset($options['Login_Background_Clore']))
	{	
		$body.='background-color:'.$options['Login_Background_Clore'].';';
	} 

	if(isset($options['position']))
	{	
		$body.='background-position:'.$options['position'].';';
	} 
					  
	if(isset($options['bgheight']))
	{	
		$body.='background-size:'.$options['bgheight'].'px;'.$options['bgwidth'].'px;';
	} 
	
	$body.="}";
	
	
	$bodylink='.login #nav a{';
	if(isset($options['link_text_color']))
	{
		$bodylink.='color:'.$options['link_text_color'].';';
	}
	$bodylink.="}";
	
	$bodylink1='.login #backtoblog a, .login #nav a{';
	if(isset($options['link_text_color']))
	{
		$bodylink1.='color:'.$options['link_text_color'].';';
	}
	$bodylink1.="}";

	$advance_textmessage='.advance_textlogo{';
	
	if(isset($options['text_font_color']))
	{
		$advance_textmessage.='color:'.$options['text_font_color'].';';
	}
	
	if(isset($options['text_font_size']))
	{
		$advance_textmessage.='font-size:'.$options['text_font_size'].'px;';
		$advance_textmessage.='text-align: center;';
	}
	
	if(isset($options['text_shadow_size']))
	{
	     $advance_textmessage.='text-shadow:'.$options['text_shadow_size'].'px '.$options['text_shadow_size'].'px  '.$options['text_font_shadow_color'].'';
	}
	$advance_textmessage.="}";

	echo '<style type="text/css">'.$css_login_form.''.$css_login_form_label.''.$button.''.$button_onhover.''.$logo.''.$body.''.$bodylink.''.$bodylink1.''.$advance_textmessage.'</style>';

}
	
add_filter( 'login_message', 'the_advance_login_style_message' );
function the_advance_login_style_message( $message )
	{
		if ( empty($message) ){
		$options=get_option( 'advance_login_style_logo' );
		if ( !empty($options['text_message']) )
		{
			return "<p class='advance_textlogo' >" . $options['text_message'] ."<br></p>";
		}
    }
	else 
	{
        return $message;
    }
}
	
add_action( 'init', 'advance_login_style_redirect' );
function advance_login_style_redirect()
	{
		$options=get_advance_login_style_options();
		if(isset($options['After_Logout_Redirect_Link']))
		{
			$options= $options['After_Logout_Redirect_Link'];
			if ( !empty($options) )
			{
				if( isset($_GET['loggedout']) == 'true' )
				{
					$redirect_link=$options;
					wp_redirect($redirect_link);
					exit;
				}
			}
		}	
		else return wp_login_url();
	}

add_filter( 'registration_redirect', 'advance_login_style_registration_redirect' );
function advance_login_style_registration_redirect()
	{
		$options=get_advance_login_style_options();
		$options= $options['After_Logout_Redirect_Link'];	
		if ( !empty($options) )
		{
		// Change this to the url to Updates page.
		return $options;
		}
	} 
	
add_filter( 'login_redirect', 'advance_login_style_login_redirect' );
function advance_login_style_login_redirect()
	{
		$options=get_advance_login_style_options();
		
			$options= $options['After_Login_Redirect_Link'];
			if ( !empty($options) )
			{
				// Change this to the url to Updates page.
				return $options;
			}
			else return admin_url();
		
	}


function advance_login_style_custom_link() {

		$options=get_advance_login_style_options();
		
		$options= $options['linkoflogo'];
			if ( !empty($options) )
			{
				$rlink=$options;
			
			} else {
				$rlink=get_site_url();
			}
		return $rlink;
}
add_filter('login_headerurl','advance_login_style_custom_link');

function advance_login_style_title_on_logo() {
	$options=get_advance_login_style_options();
		
	$options= $options['tooltiplogo'];
			if ( !empty($options) )
			{
				$tooltiplogo=$options;
			
			} else {
				$tooltiplogo=get_bloginfo ( 'description' );
			}
	return $tooltiplogo;
}
add_filter('login_headertitle', 'advance_login_style_title_on_logo');
