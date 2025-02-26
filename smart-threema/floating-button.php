<?php

/*
Floating WhatsApp Button
*/

//CSS Einhängen
add_action( 'wp_enqueue_scripts', 'threemasmart_floating_button_css_style_include' );
function threemasmart_floating_button_css_style_include() {
	wp_register_style( 'threemasmart_floating_button_css_style', plugins_url('css/threemasmart_floating_button.php', __FILE__) );
	wp_enqueue_style( 'threemasmart_floating_button_css_style' );

}



//Code in Footer einbauen
add_action('wp_footer', 'threemasmart_floating_button_footer');
function threemasmart_floating_button_footer() {
    

	/*
	ECHO "
	<a href='https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202.' class='float' target='_blank'><i class='fa fa-whatsapp my-float'></i></a>
	";
	*/

/* ########################## ONLINE ###################*/
$threemasmart_id = get_option('threemasmart_id');

	
//button
$floating_button_img = '<img src="' . plugins_url( 'images/floating-button-threema-klein.png', __FILE__ ) . '" >';
		
$check_iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$check_android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$check_palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$check_berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$check_ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
// check if is a mobile
if ($check_iphone || $check_android || $check_palmpre || $check_ipod || $check_berry == true)
{
 //header('Location: https://api.whatsapp.com/send?phone=YOURNUMBER&text=YOURTEXT');
 //OR
//$whatsapp_floating_button = "<a href='https://api.whatsapp.com/send?phone=$threemasmart_tel&text=Hi' class='threemafloat' target='_blank'>$floating_button_img</a>";
 $whatsapp_floating_button = "<a href='threema://compose?id=$threemasmart_id&text=hi' target='_blank' class='threemafloat'>$floating_button_img</a>";

}
// all others
else {
 //header('Location: https://web.whatsapp.com/send?phone=YOURNUMBER&text=YOURTEXT');
 //OR
 //echo "https://web.whatsapp.com/send?phone=YOURNUMBER&text=YOURTEXT";
//$whatsapp_floating_button = "<a href='https://web.whatsapp.com/send?phone=$threemasmart_tel&text=Hi' class='threemafloat' target='_blank'>$floating_button_img</a>";
$whatsapp_floating_button = "<a href='https://three.ma/$threemasmart_id' target='_blank' class='threemafloat'>$floating_button_img</a>";
}

echo $whatsapp_floating_button;

/* #####################################################*/	
	
	
}
?>