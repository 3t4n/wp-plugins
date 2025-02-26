<?php
/*
Plugin Name: AP Freeconet
Plugin URI: http://www.aronnet.com/ap-freeconet
Description: Ta wtyczka uaktywnia shortcode, który pozwala na włączenie flashowej aplikacji FlashCall pozwalającej na darmowe dzwonienie do wybranego abonenta w sieci FreecoNet.pl za free.
Version: 2.0
Author: ARONNET
Author URI: http://www.aronnet.com
*/

define( 'AP_FREECONET_PLUGIN_URL', plugins_url('/flashcall',__FILE__ ) );
define( 'AP_FREECONET_TEXTDOMAIN_PREFIX', 'ap_freeconet' );
define( 'AP_FREECONET_TEXTDOMAIN_PREFIX_PATH', 'ap-freeconet/languages/' );

define( 'AP_FREECONET_RTMP_HOST', 'rtmp://fp02.freeconet.pl' ); 
define( 'AP_FREECONET_DTMF_HOST', 'fp02.freeconet.pl' );
define( 'AP_FREECONET_AUTH_DOMAIN', 'sip.freeconet.pl' );


add_action( 'init', 'freeconet_init' );

function freeconet_init(){
	load_plugin_textdomain( AP_FREECONET_TEXTDOMAIN_PREFIX, false, AP_FREECONET_TEXTDOMAIN_PREFIX_PATH );
}

add_shortcode('freeconet-phone','generate_flash_freeconet');

function generate_flash_freeconet($attr,$content=null){
	
	
	$AP_FREECONET_DEFAULT_TEXT = __('Click on the green handset and you will be connected with us for free. Be sure to connect a microphone and headphones.',AP_FREECONET_TEXTDOMAIN_PREFIX) ;
	$AP_FREECONET_DEFAULT_INFO_TEXT = __('Connect for free!  more',AP_FREECONET_TEXTDOMAIN_PREFIX);
	$AP_FREECONET_DEFAULT_LABEL = __('Connect',AP_FREECONET_TEXTDOMAIN_PREFIX);
	
	$user = $attr['user'];
	
	if(isset($attr['id'])){
		$id = $attr['id'];
	}else{
		$id = $user;
	}
	
	$withKeyboard = false;	
	if($attr['keyboard'] == 'on'){
		$withKeyboard = true;
	}else
	

	$label = $AP_FREECONET_DEFAULT_LABEL;
	if(isset($attr['label'])){
		$label = $attr['label'];
	}
	
	$info_text = $AP_FREECONET_DEFAULT_INFO_TEXT;
	if(isset($attr['info_text'])){
		$info_text = $attr['info_text'];
	}
	
	$text = $AP_FREECONET_DEFAULT_TEXT;
	if(isset($attr['text'])){
		$text = $attr['text'];
	}
	
	
	if(WPLANG == 'en_US' || WPLANG == 'en_GB'){
		$lang = 'en';
	}else{
		$lang = 'pl';
	}

	$out = '<script type="text/javascript">
		function getLibPath() { return "'.AP_FREECONET_PLUGIN_URL.'"; } // sciezka do zasobow FlashCall\'a
		function widthChange(width, id) { document.getElementById(id).width = width + \'px\'; }
		function heightChange(height, id) { document.getElementById(id).height = height + \'px\'; }
		function widthChange_wo_k(width, id) { document.getElementById(id).width = width + \'px\'; }
		function heightChange_wo_k(height, id) { document.getElementById(id).height = height + \'px\'; }
	</script>
	<object type="application/x-shockwave-flash" data="'.AP_FREECONET_PLUGIN_URL.'/telephone.swf" id="flashcall_'.$id.'" name="flashcall_'.$id.'" width="150" height="58" style="position: absolute">
	    <param name="movie" value="telephone.swf">
	    <param name="flashvars" value="client=FCN&id=flashcall_'.$id.'&auth_domain='.AP_FREECONET_AUTH_DOMAIN.'&user='.$user.'&rtmp_host='.AP_FREECONET_RTMP_HOST.'&dtmf_host='.AP_FREECONET_DTMF_HOST.'&keyboard='.($withKeyboard?'on':'off').'&label='.$label.'&info_text='.$info_text.'&text='.$text.'&remote_ip='.$_SERVER['SERVER_ADDR'].'&remote_port='.$_SERVER['SERVER_PORT'].'&lang='.$lang.'">
    </object>';
	return $out;
}

/*
Opis parametrów

id=IDENTYFIKATOR
	Ustawia identyfikator kontrolki FlashCall. Musi on odpowiadać parametrom id oraz name znacznika <object>. W przypadku umieszczenia na stronie więcej niż jednej kontrolki FlashCall, ich identyfikatory muszą się różnić. Domyślnie generowanym identyfikatorem jest "flascall_NAZWAKONTA".

user=FREECONET_LOGIN
	Ustawia konto NAZWA_KONTA, z którym zostanie zestawione połączenie.

keyboard=on/off
	Ustawia, czy ma być widoczna klawiatura numeryczna po nawiązaniu połączenia. Ustaw "on" aby włączyć klawiaturę lub "off" aby ją wyłączyć.
	Domyślnie: off

label=TEKST_TYTUŁOWY
	Ustawia tekst tytułowy widoczny obok zielonego przycisku ze słuchawką.
	Domyślnie: 

info_text=TEKST_DODATKOWY
	Ustawia dodatkowy tekst widoczny pod zielonym przyciskiem ze słuchawką.
	Domyślnie: AP_FREECONET_DEFAULT_INFO_TEXT

text=TEKST_OPISU
	Ustawia dodatkowy tekst opisu, widoczny po kliknięciu na "więcej".
	Domyślnie: AP_FREECONET_DEFAULT_TEXT

*/
?>