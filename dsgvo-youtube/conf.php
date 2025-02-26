<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 include 'form.php';
 function save_dsgvoyoutube() {
  adminForm_dsgvoyoutube();
 }


function QGA_dsgvoyoutube() {
	add_options_page('DSGVO Youtube', 'DSGVO Youtube', 'manage_options', 'QGA_dsgvoyoutube', 'save_dsgvoyoutube');
}
add_action( 'admin_menu', 'QGA_dsgvoyoutube' );
?>