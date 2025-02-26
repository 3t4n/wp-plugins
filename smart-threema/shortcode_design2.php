<?php
function threemasmart_shortcode_4() { 
	
/* ############################################################################################ */

$content = '';
	$threemasmart_id = get_option('threemasmart_id');
	$bilderurl = '<img src="' . plugins_url( 'images/floating-button-threema.png', __FILE__ ) . '" alt="Contact" title="Contact" > ';
	
	$permalink = get_permalink();
	
    //$beforecontent = "This goes before the content. Isn\'t that awesome!";
	//$aftercontent = "<a href='threema://compose?id=$threemasmart_id&text=$permalink' target='_blank'>$bilderurl</a>";
	
	
	if ( wp_is_mobile() ) {

		$plugins_url = plugins_url();	
		
		
	
			$aftercontent = "<div class='smartthreema_box_v4'><a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='smartthreema_link'><img src='$plugins_url/smart-threema/images/floating-button-threema-invers.gif' class='smartthreema_img'></a></div><br /><br />";
		
	
		
		
		
	}
	
	
	/* ist nicht mobile */
	else
	{
		$plugins_url = plugins_url();

			$aftercontent = "<div class='smartthreema_box_v4'><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'><img src='$plugins_url/smart-threema/images/floating-button-threema-invers.gif' class='smartthreema_img'></a></div><br /><br />";
		

		
		
	}

	//$fullcontent = $beforecontent . $content . $aftercontent;
	$fullcontent = $content . $aftercontent;
    
    return $fullcontent;


	
	
}

add_shortcode( 'threema_design2', 'threemasmart_shortcode_4' );
/* ############################################################################################ */

?>