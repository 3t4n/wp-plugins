<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 include 'form.php';
 function save_threemasmart() {
  adminForm_threemasmart();
 }




function QGA_threemasmart() {
	add_options_page('Smart Threema', 'Smart Threema', 'manage_options', 'QGA_threemasmart', 'save_threemasmart');
}
add_action( 'admin_menu', 'QGA_threemasmart' );
?>