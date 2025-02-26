<?php
/* 
Plugin Name: Answering Contact Form FAQ Page Add-on
Plugin URI: http://answeringcontactform.com
Description: Turn your Answering Contact Form answers into a beautiful FAQ page. Paste the shortcode [acf_faq_page] into a page of your choice to display the questions and answers.
Version: 1.0
Author: Mattias Jönsson
Author URI: http://answeringcontact.com
License: GPL2 
*/

add_action( 'wp_enqueue_scripts', 'acf_faq_scripts' );

function acf_faq_scripts() {
        wp_register_style( 'acfFaqStyle', plugins_url('css/acfFaqStyle.css', __FILE__) );
		wp_enqueue_style( 'acfFaqStyle' );

		wp_register_script( 'acf-faq-jquery', plugins_url('js/acf-faq-jquery.js',__FILE__ ), array( 'jquery' ));
        wp_enqueue_script('acf-faq-jquery');
}

function acf_answer_page() {
$answers_args = array(
                'post_type'=> 'answer',
                'post_status'=> 'publish',
    );
	
    $posts_answers_gallery = get_posts( $answers_args ); 
    foreach($posts_answers_gallery as $rows){
        $post_titles = $rows->post_title;
		$post_content = $rows->post_content;
		echo '<div class="acf-faq-answers">' . '<div class="acf-faq-toggle">' . '<h4>' . $post_titles . '</h4>' . '<div class="acf-faq-toggle-info">' . '<p>' . $post_content . '</p>' . '</div>' . '</div>' . '</div>';
    }
}
    
add_shortcode('acf_faq_page', 'acf_answer_page');
?>