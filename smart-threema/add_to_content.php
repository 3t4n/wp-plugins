<?php

function threemasmart_addtocontent($content) {
	
	
	$threemasmart_position_nr = get_option('threemasmart_position');
	
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
		
		$threemasmart_position_nr = get_option('threemasmart_position');
	if ($threemasmart_position_nr == '1')
	{ 
		if (is_page()) {

			if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
			{
			$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='smartthreema_linkm'>Kontakte uns über Threema</a></div>";
			}
			else
			{
				$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='smartthreema_linkm'>Contact Us on Threema</a></div>";

			}
		
		
		
		}
		else {$aftercontent = "";}
	
	
	}
	elseif ($threemasmart_position_nr == '2')
	{
		if (is_single()) {
			if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
				{
			$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='smartthreema_linkm'>Kontakte uns über Threema</a></div>";
				}
				else
				{
					$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='smartthreema_linkm'>Contact Us on Threema</a></div>";
			
				}
		}
		else {$aftercontent = "";}
	}
	elseif ($threemasmart_position_nr == '3')
	{
			if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
				{
			$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='smartthreema_linkm'>Kontakte uns über Threema</a></div>";
				}
				else
				{
					$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='smartthreema_linkm'>Contact Us on Threema</a></div>";
			
				}
		
	}
	else {
		$aftercontent = " ";
	}	
    
		
		
		
	}
	
	
	/* ist nicht mobile */
	else
	{
		
		$plugins_url = plugins_url();

		

		/*
		$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><h3 id='smartthreema_h3'>Threema</h3><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'>Download Threema App</a></div>";
		*/
		if ($threemasmart_position_nr == '1')
	{ 
		if (is_page()) {

			if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
					{
						$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'>Bitte laden Sie die Threema App herunter</a><br><div class='smartthreema_minimsg'>und versuchen Sie es danach erneut</div></div>";
					}
					else
					{
						$aftercontent = "$themelang<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'>Please Download Threema App</a><br><div class='smartthreema_minimsg'>to your Mobile Device and click again</div></div>";
					}
			
		
			
		}
			else {$aftercontent = "";}
	
	
	}
	elseif ($threemasmart_position_nr == '2')
	{
		if (is_single()) {
			
			if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
			{
				$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'>Bitte laden Sie die Threema App herunter</a><br><div class='smartthreema_minimsg'>und versuchen Sie es danach erneut</div></div>";
			}
			else
			{
				$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'>Please Download Threema App</a><br><div class='smartthreema_minimsg'>to your Mobile Device and click again</div></div>";
			}
			
		}
		else {$aftercontent = "";}
	}
	elseif ($threemasmart_position_nr == '3')
	{
		if ($themelang == 'de-CH' OR $themelang == 'de-AT' OR $themelang == 'de-DE')
			{
				$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'>Bitte laden Sie die Threema App herunter</a><br><div class='smartthreema_minimsg'>und versuchen Sie es danach erneut</div></div>";
			}
			else
			{
				$aftercontent = "<div class='smartthreema_box'><img src='$plugins_url/smart-threema/images/floating-button-threema-klein.png' class='smartthreema_img'><a href='https://three.ma/$threemasmart_id' target='_blank' class='smartthreema_link'>Please Download Threema App</a><br><div class='smartthreema_minimsg'>to your Mobile Device and click again</div></div>";
	
			}
	}
	else {
		$aftercontent = " ";
	}
		
		
		
		
		
		
		
		
	}

	//$fullcontent = $beforecontent . $content . $aftercontent;
	$fullcontent = $content . $aftercontent ;
    
    return $fullcontent;
}

add_filter('the_content', 'threemasmart_addtocontent');

?>
