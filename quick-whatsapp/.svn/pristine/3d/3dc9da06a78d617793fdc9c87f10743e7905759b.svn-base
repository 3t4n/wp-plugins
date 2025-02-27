<?php

/*
Floating WhatsApp Button
*/

//CSS Einhängen
add_action( 'wp_enqueue_scripts', 'quick_whatsapp_floating_button_css_style_include' );
function quick_whatsapp_floating_button_css_style_include() {
	wp_register_style( 'quick_whatsapp_floating_button_css_style', plugins_url('css/quick-whatsapp-floating-button.php', __FILE__) );
	wp_enqueue_style( 'quick_whatsapp_floating_button_css_style' );

}


//Code in Footer einbauen
add_action('wp_footer', 'quick_whatsapp_floating_button_footer');
function quick_whatsapp_floating_button_footer() {
    $custom_items = get_option( 'option_name' );



/* ########################## ONLINE ###################*/
$quickwhatsapp_tel = get_option('quickwhatsapp');
$quickwhatsapps_greetings = get_option('quickwhatsapps_greetings');
	
//button
$floating_button_img = '<img src="' . plugins_url( 'images/whatsapp-floatingbutton-w.png', __FILE__ ) . '" >';
		

	
if (wp_is_mobile())
	
{
 //header('Location: https://api.whatsapp.com/send?phone=YOURNUMBER&text=YOURTEXT');
 //OR
$whatsapp_floating_button = "<a href='https://api.whatsapp.com/send?phone=$quickwhatsapp_tel&text=$quickwhatsapps_greetings' class='simplewebchat_float' target='_blank'>$floating_button_img</a>";

}
// all others
else {
 //header('Location: https://web.whatsapp.com/send?phone=YOURNUMBER&text=YOURTEXT');
 //OR
 //echo "https://web.whatsapp.com/send?phone=YOURNUMBER&text=YOURTEXT";
$whatsapp_floating_button = "<a href='https://web.whatsapp.com/send?phone=$quickwhatsapp_tel&text=$quickwhatsapps_greetings' class='simplewebchat_float' target='_blank'>$floating_button_img</a>";
}

echo $whatsapp_floating_button;

/* #####################################################*/	
	
	
}
?>