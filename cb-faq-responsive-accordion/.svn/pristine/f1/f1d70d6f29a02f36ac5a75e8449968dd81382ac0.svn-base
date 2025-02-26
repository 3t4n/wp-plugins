<?php 
/*
Plugin Name: CB FAQ Responsive Accordion
Plugin URI: http://www.codingbank.com/plugins/cb-faq-responsive-accordion
Description: This is full responsive Accordion or FAQ Plugin for wordpress theme with shortcode support. shortcode is [cb_faq].
Version: 1.1
Author: Md Abul Bashar
Author URI: http://www.codingbank.com/

*/


function cb_accordion_post() {
	register_post_type( 'accordions', 
		array(
		'labels' => array(
			'name' => __( 'Accordions', 'cb_accordion' ),
			'singular_name' => __( 'Accordion', 'cb_accordion' ),
			'add_new' => __( 'Add New Accordion', 'cb_accordion' ),
			'add_new_item' => __( 'Add New Accordion', 'cb_accordion' ),
			'edit_item'		=> __('Edit Accordion Info', 'cb_accordion'),
			'view_item'		=> __('View Accordion Info', 'cb_accordion'), 				
			'not_found' => __( 'Sorry, we couldn\'t find the Accordion you are looking for.', 'cb_accordion' )
		),
		'public' => true,
		'menu_icon'	=> 'dashicons-welcome-write-blog',
		'supports' => array('title', 'editor'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'accordion'),
		'capability_type' => 'page', 
	)


);

}
add_action('after_setup_theme', 'cb_accordion_post');
  
// Change Default Title Place holder in custom post
function cb_change_accordion_title( $title ){
	
     $screen = get_current_screen();		
     if  ( $screen->post_type == 'accordions' ) {
          return 'Enter Your New Accordion OR FAQ Title';
     } 	
}
 
add_filter( 'enter_title_here', 'cb_change_accordion_title' );

function cb_accordion_script(){
	
	wp_enqueue_style( 'cb_accordion_css',  plugin_dir_url( __FILE__ ) . 'css/style.css', array(), '1.0' );
	wp_enqueue_script( 'cb_accordion-js',   plugin_dir_url( __FILE__ ) . '/js/script.js', array( 'jquery' ), '1.1', true );

	wp_enqueue_script('jquery');
	
}
add_action('wp_enqueue_scripts', 'cb_accordion_script');




function cb_faq_shortcode($atts){
	extract( shortcode_atts( array(
		'count' => 10,
		'posttype' => 'accordions',
	), $atts ) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $posttype)
        );		
		
		
	$list = '<div class="container cb_accordion"><section><div id="container_buttons"><ul>';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$cb_slider_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'cb_slider_img' );
		$list .= '
		
		
						<li class="toggle">
							<a href="#'.$idd.'">'.get_the_title().'</a>
							<p id="'.$idd.'">
								'.get_the_content().'
							</p>
						</li>			
		
		
		';        
	endwhile;
	$list.= '</ul></div></section></div>';
	wp_reset_query();
	return $list;
}
add_shortcode('cb_faq', 'cb_faq_shortcode');	


  
?>