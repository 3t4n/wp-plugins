<?php 
if ( ! class_exists( 'Whatsapphelpshortclass' ) ) {
	class Whatsapphelpshortclass {
		// Defines the property of shortcode button.
		public static function shortbutton() {
			$textbuthelp = get_option( 'Waiowhatsapphelpbut' );

			$call = new Waiowhatsapphelp();

			$call->setprops();

			$phno = $call->waphone;

			$text = $call->watext;// chat message without woocommerce

			wp_register_style( 'whatsappshortlogo', WAIO_URL_PATH . 'assets/fontawesome/css/font-awesome.min.css', array(), '6.66' );

			wp_enqueue_style( 'whatsappshortlogo' );

			wp_register_style( 'whatsapphelpcss', WAIO_URL_PATH . 'assets/washare.css', array(), '6.66' );

			wp_enqueue_style( 'whatsapphelpcss' );

			$waiosharebutclass = 'sharebutcss';

			$waiosharebutclass = 'sharebut';
			
			$wbutton = '<a href="https://api.whatsapp.com/send?phone=' . esc_html( $phno ) . '&text=' . esc_html( $text ) . '"
			class="' . esc_html( $waiosharebutclass ) . '"><center>' . esc_html( $textbuthelp ) .
				'<i class="fa fa-whatsapp my-float" ></i></center></a>';

			return $wbutton;
		}
	}
}

if ( ! class_exists( 'Waiowhatsappsupport' ) ) {
	class Waiowhatsappsupport {
		// initiates the whatsapp floating support icon.
		public static function wabutton() {

			$cell = new Waiowhatsapphelp();

			$cell->setprops();

			$cello = $cell->waphone;

			$texts = $cell->watext;// this is the chat message text without woocommerce

			wp_register_style( 'whatsappsupportcss', WAIO_URL_PATH . 'assets/wat.css', array(), '6.66' );

			wp_enqueue_style( 'whatsappsupportcss' );

			wp_register_style( 'whatsappiconcss', WAIO_URL_PATH . 'assets/fontawesome/css/font-awesome.min.css', array(), '6.66' );

			wp_enqueue_style( 'whatsappiconcss' );

			echo '<a href="https://api.whatsapp.com/send?phone=' . esc_html( $cello ) . '&text=' . esc_html( $texts ) .
			'" class="ninad"	target="_blank">
			<i class="fa fa-whatsapp my-float" ></i>
			</a>';
		}
	}
}