<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 include 'form.php';
 function save_dsgvovimeo() {
  adminForm_dsgvovimeo();
 }




function QGA_dsgvovimeo() {
	add_options_page('DSGVO Vimeo', 'DSGVO Vimeo', 'manage_options', 'QGA_dsgvovimeo', 'save_dsgvovimeo');
}
add_action( 'admin_menu', 'QGA_dsgvovimeo' );
?>