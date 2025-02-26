<?php 

add_action('init', 'profilepro_enqueue_scripts_styles');

function profilepro_enqueue_scripts_styles(){
			wp_enqueue_script('jquery');
			wp_enqueue_style('profilepro_style', PROFILEPRO_URL.'assets/profilepro_style.css');
			wp_enqueue_style('profilepro_style', PROFILEPRO_URL.'assets/style.css');
			wp_enqueue_style('profilepro_style', PROFILEPRO_URL.'assets/responsive.css');
			wp_enqueue_script('upload_min_js', PROFILEPRO_URL.'assets/scripts/upload.min.js','','',true);
			wp_enqueue_script('profilepro_script', PROFILEPRO_URL.'assets/scripts/profilepro-script.js','','',true);
			wp_enqueue_script('profilepro-font-awesome', 'https://use.fontawesome.com/5ef9b46a6d.js');
			
		}





?>
