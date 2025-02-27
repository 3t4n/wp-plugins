<?php

function quickwhatsapp_shortcode_gruppe() {

$quickwhatsapp_groupelink = get_option('quickwhatsapps_groupelink');
$quickwhatsapps_groupelink_imgurl = get_option('quickwhatsapps_groupelink_imgurl');
	
$quickwhatsapp_groupelink_button0 = '<img src="quickwhatsapps_groupelink_imgurl" > ';
	
$quickwhatsapp_groupelink_button1 = '<img src="' . plugins_url( 'images/whatsapp-gruppe.png', __FILE__ ) . '" > ';
	
	
if ($quickwhatsapp_groupelink == '') {
	//keine anzeige
	$ausgabe = '';
}
	else
	{	
	
//button anzeigen	
if ($quickwhatsapps_groupelink_imgurl == ''){
	$ausgabe = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink' target='_blank'>$quickwhatsapp_groupelink_button1</a>"; 
}
else {

	$ausgabe = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink' target='_blank'><img src='$quickwhatsapps_groupelink_imgurl'></a>"; 
}

	
	
	
}
		
	
	
	//$ausgabe = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink' target='_blank'>$quickwhatsapp_groupelink_button1</a>"; 
	
	

	
	return $ausgabe;
}
add_shortcode('quickwhatsapp_group', 'quickwhatsapp_shortcode_gruppe');





function quickwhatsapp_shortcode_gruppe2() {

	$quickwhatsapp_groupelink2 = get_option('quickwhatsapps_groupelink2');
	$quickwhatsapps_groupelink_imgurl2 = get_option('quickwhatsapps_groupelink_imgurl2');
		
	$quickwhatsapp_groupelink_button0_2 = '<img src="quickwhatsapps_groupelink_imgurl2" > ';
		
	$quickwhatsapp_groupelink_button1_2 = '<img src="' . plugins_url( 'images/whatsapp-gruppe.png', __FILE__ ) . '" > ';
		
		
	if ($quickwhatsapp_groupelink2 == '') {
		//keine anzeige
		$ausgabe2 = '';
	}
		else
		{	
		
	//button anzeigen	
	if ($quickwhatsapps_groupelink_imgurl2 == ''){
		$ausgabe2 = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink2' target='_blank'>$quickwhatsapp_groupelink_button1_2</a>"; 
	}
	else {
	
		$ausgabe2 = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink2' target='_blank'><img src='$quickwhatsapps_groupelink_imgurl2'></a>"; 
	}
	
		
		
		
	}
			
		
		
		//$ausgabe = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink' target='_blank'>$quickwhatsapp_groupelink_button1</a>"; 
		
		
	
		
		return $ausgabe2;
	}
	add_shortcode('quickwhatsapp_group2', 'quickwhatsapp_shortcode_gruppe2');




	function quickwhatsapp_shortcode_gruppe3() {

		$quickwhatsapp_groupelink3 = get_option('quickwhatsapps_groupelink3');
		$quickwhatsapps_groupelink_imgurl3 = get_option('quickwhatsapps_groupelink_imgurl3');
			
		$quickwhatsapp_groupelink_button0_3 = '<img src="quickwhatsapps_groupelink_imgurl3" > ';
			
		$quickwhatsapp_groupelink_button1_3 = '<img src="' . plugins_url( 'images/whatsapp-gruppe.png', __FILE__ ) . '" > ';
			
			
		if ($quickwhatsapp_groupelink3 == '') {
			//keine anzeige
			$ausgabe3 = '';
		}
			else
			{	
			
		//button anzeigen	
		if ($quickwhatsapps_groupelink_imgurl3 == ''){
			$ausgabe3 = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink3' target='_blank'>$quickwhatsapp_groupelink_button1_3</a>"; 
		}
		else {
		
			$ausgabe3 = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink3' target='_blank'><img src='$quickwhatsapps_groupelink_imgurl3'></a>"; 
		}
		
			
			
			
		}
				
			
			
			//$ausgabe = "<a href='https://chat.whatsapp.com/$quickwhatsapp_groupelink' target='_blank'>$quickwhatsapp_groupelink_button1</a>"; 
			
			
		
			
			return $ausgabe3;
		}
		add_shortcode('quickwhatsapp_group3', 'quickwhatsapp_shortcode_gruppe3');
	
	
?>