<?php
/*
Plugin Name: Amazing Team Member Carousel
Plugin URI: http://www.wpvalueclub.com/
Description: Amazing Team Member Carousel is a super modern team member plugin. 100% responsive, automatic resize images, flexible, unlimited items, shortcode powered, custom link and more
Author: Noor-E-Alam
Author URI: http://www.wpvalueclub.com/
Version: 2.0
*/

//Loading CSS and JS
function amazing_team_member_carousel_scripts() {

	wp_enqueue_script('jquery');
	wp_enqueue_script('amazing_team_member_carousel_owl_js', plugins_url( '/js/owl.carousel.js' , __FILE__ ) );
	//wp_enqueue_script('amazing_team_member_carousel_modal_js', plugins_url( '/js/modal.js' , __FILE__ ) );
	wp_enqueue_style('amazing_team_member_owl_main_css', plugins_url( '/css/owl.carousel.css' , __FILE__ ) );
	wp_enqueue_style('amazing_team_member_owl_theme_css', plugins_url( '/css/owl.theme.css' , __FILE__ ) );
	wp_enqueue_style('amazing_team_member_carousel_main_css', plugins_url( '/css/atmc.css' , __FILE__ ) );
	//wp_enqueue_style('amazing_team_member_carousel_modal_css', plugins_url( '/css/modal.css' , __FILE__ ) );
	wp_enqueue_style('amazing_team_member_carousel_css2', plugins_url( '/css/atmc2.css' , __FILE__ ) );


}

add_action( 'wp_enqueue_scripts', 'amazing_team_member_carousel_scripts' );

//Enqueue Font Awesome Stylesheet from MaxCDN
add_action( 'wp_enqueue_scripts', 'amazing_team_member_carousel_font_awesome', 99 );
function amazing_team_member_carousel_font_awesome() {
if ( ! is_admin() ) {
 
wp_enqueue_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css', null, '4.0.1' );
 
}
 
}


if(!class_exists('TEAM_AutoLoader')){
// Setup Contants
defined( 'VP_TEAM_VERSION' ) or define( 'VP_TEAM_VERSION', '2.0' );
defined( 'VP_TEAM_URL' )     or define( 'VP_TEAM_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_TEAM_DIR' )     or define( 'VP_TEAM_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_TEAM_FILE' )    or define( 'VP_TEAM_FILE', __FILE__ );

// Load Languages
add_action('plugins_loaded', 'amazing_team_member_carousel_load_textdomain');

function amazing_team_member_carousel_load_textdomain()
{
	load_plugin_textdomain( 'vp_textdomain', false, dirname( plugin_basename( __FILE__ ) . '/vafpress-framework/lang/' ) ); 
}

// Lood Bootstrap
require 'framework/bootstrap.php';

}


// Registering Custom Post
add_action( 'init', 'amazing_team_member_carousel_custom_post' );
function amazing_team_member_carousel_custom_post() {
	register_post_type( 'ateam-member',
		array(
			'labels' => array(
				'name' => __( 'Team Members' ),
				'singular_name' => __( 'Team Member' ),
				'add_new_item' => __( 'Add New Team Member' )
			),
			'public' => true,
			'supports' => array('title'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'ateam-member'),
			'menu_icon' => '',
			//'menu_position' => 5,
		)
	);
	
}

// Registering Custom post's category
add_action( 'init', 'amazing_team_member_carousel_custom_post_taxonomy'); 
function amazing_team_member_carousel_custom_post_taxonomy() {
	register_taxonomy(
		'ateam_member_cat',  
		'ateam-member',
		array(
			'hierarchical'          => true,
			'label'                         => 'Team Members Category',
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'ateam-member-category',
				'with_front'    => true
				)
			)
	);
}
  

require 'admin/metabox/icon.php';

// Load Metaboxes 

new VP_Metabox(array
(
			'id'          => 'metatitle',
			'types'       => array('ateam-member'),
			'title'       => __('Team Carousel Title', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_TEAM_DIR . '/admin/metabox/metatitle.php'
));
new VP_Metabox(array
(
			'id'          => 'info',
			'types'       => array('ateam-member'),
			'title'       => __('Member Image, Name, Title, Social Links ', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_TEAM_DIR . '/admin/metabox/main.php'
));
new VP_Metabox(array
(
			'id'          => 'settingsmeta',
			'types'       => array('ateam-member'),
			'title'       => __('Carousel Settings', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_TEAM_DIR . '/admin/metabox/settings.php'
));


// Register Shortcode
function amazing_team_member_carousel_shortcode($atts){
	extract( shortcode_atts( array(
	
		'category' => '',	
		
	), $atts) );
	
		$q = new WP_Query(
        array('posts_per_page' => -1, 'post_type' => 'ateam-member')
        );
	
		while($q->have_posts()) : $q->the_post();
		$id = get_the_ID();	
		//$title = the_title();	
		
		
		
		$infos = vp_metabox('info.member_info', false);
		$metatitle = vp_metabox('metatitle.metatitle.0.metatitle', false);
		$items = vp_metabox('settingsmeta.settings.0.items', false);
		$autoplay = vp_metabox('settingsmeta.settings.0.autoplay', false);
		$theme_color = vp_metabox('settingsmeta.settings.0.theme_color', false);
		
	$output ='<script type="text/javascript">
	jQuery(document).ready(function(){
	jQuery("#owl-team_'.$id.'").owlCarousel({
		items : '.$items.',
		autoPlay : '.$autoplay.',
		lazyLoad : true,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,3],
		itemsTablet: [768,2],
		itemsTabletSmall: false,
		itemsMobile : [479,1],
		pagination: !1,
        navigation: !0,
        navigationText: !1
  });  
			  
});
</script>';		


			$output .='<style>
			
						.section-header {
						  border-left: 3px solid '.$theme_color.';
						  margin-left: 14px;
						}
				
						.team-horizontal .team .team-detail {
						  background-color: '.$theme_color.';
						  padding: 10px 20px;
						  position: relative;
						}
						.owl-theme .owl-controls .owl-buttons div{
							background: '.$theme_color.';
						}
					</style>';
		


		$i = 0;


		$output .= '<div class="section-header">
					<h2>'.$metatitle.'</h2>
					</div>';

		$output .= '<div class="team-horizontal" id="owl-team_'.$id.'">';
		
		foreach ($infos as $info) {	
						
		$output .= '<div class="team">
							<div class="team-pic"><img src="'.$info['member_image'].'" alt="'.$info['member_name'].'" class="img-full"></div>
							<div class="team-detail">
								<div class="detail-social">
									<ul class="social-icons nav-default inline clearfix">';
									
								if ($info['facebook_link']) {
									$output .='<li><a href="'.$info['facebook_link'].'" class="facebook"><i class="fa fa-facebook"></i></a></li>';
									}
								if ($info['twitter_link']) {
								$output .='<li><a href="'.$info['twitter_link'].'" class="twitter"><i class="fa fa-twitter"></i></a></li>';
									}
								if ($info['googleplus_link']) {
								$output .='<li><a href="'.$info['googleplus_link'].'" class="google"><i class="fa fa-google-plus"></i></a></li>';
									}
								if ($info['linkedin_link']) {
								}$output .='<li><a href="'.$info['linkedin_link'].'" class="linkedin"><i class="fa fa-linkedin"></i></a></li>';
							
							$output .='</ul>
								</div>
								<div class="detail-name text-bold"><a href="'.$info['member_link'].'">'.$info['member_name'].'</a></div>
								<div class="detail-title">'.$info['member_title'].'</div>
							</div>
					</div>';

		$i++;
	}

					
	endwhile;
	$output .='</div>';				
	wp_reset_query();
	return $output;
}

add_shortcode('atmc', 'amazing_team_member_carousel_shortcode');	

add_filter('widget_text', 'do_shortcode');


//Tinymce Button Add

add_action('admin_head', 'amazing_team_member_carousel_tc_button');

function amazing_team_member_carousel_tc_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
	// check if WYSIWYG is enabled
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "amazing_team_member_carousel_tc_button_add_tinymce_plugin");
		add_filter('mce_buttons', 'amazing_team_member_carousel_tc_button_add_tinymce_plugin_register_my_tc_button');
	}
}

function amazing_team_member_carousel_tc_button_add_tinymce_plugin($plugin_array) {
   	$plugin_array ['amazing_team_member_carousel_tc_button'] = plugins_url( '/admin/tinymce/button.js', __FILE__ );
   	return $plugin_array;
}


function amazing_team_member_carousel_tc_button_add_tinymce_plugin_register_my_tc_button($buttons) {
   array_push($buttons, "amazing_team_member_carousel_tc_button");
   return $buttons;
}


?>