<?php
function threemasmart_shortcode1() { 
	
/* ############################################################################################ */

$content = '';
	$threemasmart_id = get_option('threemasmart_id');
	$bilderurl = '<img src="' . plugins_url( 'images/floating-button-threema.png', __FILE__ ) . '" alt="Contact" title="Contact" > ';
	
	$permalink = get_permalink();
	
    //$beforecontent = "This goes before the content. Isn\'t that awesome!";
	//$aftercontent = "<a href='threema://compose?id=$threemasmart_id&text=$permalink' target='_blank'>$bilderurl</a>";
	
	$themelang = get_bloginfo("language");
		// en-US / de-CH
		//de-AT de-DE
		//( $themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
	
	if ( wp_is_mobile() ) {

		$plugins_url = plugins_url();	
		
		if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
			{	
			$aftercontent = "<div class='smartthreema_container'>
			<a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank'>
			<img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png'>
			</a>
			<h4 class='smartthreema_container_h4'>Threema</h4>
			<a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank'>
			<div class='smartthreema_container_txt'>Kontakte uns über Threema</div></a></div><br /><br />";
			}
			else
			{
				$aftercontent = "<div class='smartthreema_container'>
				<a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank'>
				<img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png'>
				</a>
				<h4 class='smartthreema_container_h4'>Threema</h4>
				<a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank'>
				<div class='smartthreema_container_txt'>Contact Us on Threema</div></a></div><br /><br />";

			}
		
	
		
		
		
	}
	
	
	/* ist nicht mobile */
	else
	{
		$plugins_url = plugins_url();

		if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
		{
        
		   $aftercontent = "<div class='smartthreema_container'>
			<a href='https://three.ma/$threemasmart_id' target='_blank'>
			<img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png'>
			</a><a href='https://three.ma/$threemasmart_id' target='_blank'><h4 class='smartthreema_container_h4'>Threema</h4>
			<div class='smartthreema_container_txt'>Threema App<br>herunterladen</div></a></div><br /><br />";


		}
		else
		{
			$aftercontent = "<div class='smartthreema_container'>
			<a href='https://three.ma/$threemasmart_id' target='_blank'>
			<img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png'>
			</a><a href='https://three.ma/$threemasmart_id' target='_blank'><h4 class='smartthreema_container_h4'>Threema</h4>
			<div class='smartthreema_container_txt'>Download Threema App</div></a></div><br /><br />";
		}
		

		
		
	}

	//$fullcontent = $beforecontent . $content . $aftercontent;
	$fullcontent = $content . $aftercontent;
    
    return $fullcontent;


	
	
}

add_shortcode( 'threema', 'threemasmart_shortcode1' );
/* ############################################################################################ */

?>