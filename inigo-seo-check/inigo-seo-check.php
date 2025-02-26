<?php
/**
 * Plugin Name: Inigo SEO Check
 * Plugin URI: http://www.inigo.net/plugins/seo-check
 * Description: Check to see if search engines are blocked or not
 * Version: 1.0
 * Author: Paul @ Inigo 
 * Author URI: http://www.inigo.net
 */
 
	function ingio_seo_warning() {
		
		if(get_option('blog_public') == 0):
		
			echo '<div class="error">';
			echo '<p><strong>WARNING:</strong> This website is blocking search engine traffic.</p>';
			echo '</div>';
			
			// DON'T JUST SHOUT ABOUT IT, TELL SOMEONE
			$message = "Hey\n".get_site_url()." is blocking search engines.";
			wp_mail(get_option('admin_email'), '[WordPress] '.get_bloginfo('name').' is blocking search engines', $message);
			
		endif;

	}	
	
	add_action('admin_notices', 'ingio_seo_warning');
	
?>