<?php
/*
Plugin Name: AW Simple Sorter
Plugin URI: https://github.com/andywarren/aw_simple_sorter
Description: Simple sorting of a post type to be used in a portfolio type scenario 
Version: 0.5
Author: Andy Warren
Author URI: http://www.andy-warren.net

License:

	Copyright 2015  Andy Warren  (email : andy@andy-warren.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    
Or:

        DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
      Version 2, December 2004 - http://www.wtfpl.net/ 

 Copyright (C) 2015 Andy Warren <andy@andy-warren.net> 

 Everyone is permitted to copy and distribute verbatim or modified 
 copies of this license document, and changing it is allowed as long 
 as the name is changed. 

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION 

  0. You just DO WHAT THE FUCK YOU WANT TO.


*******************************  
Whichever license you prefer ;-)
*******************************

*/

// Add the plugin's frontend CSS file
function aw_ss_stylesheet() {
	wp_register_style('aw_simple_sorter_css', plugins_url('/css/aw_simple_sorter.css', __FILE__));
	wp_enqueue_style('aw_simple_sorter_css');		
}
add_action( 'wp_enqueue_scripts', 'aw_ss_stylesheet');


// Add a custom image size for the post's featured image
add_image_size( 'aw_ss_featured_image_480x320', 512, 341, true );

// Run aw_ss_activate() when plugin is activated
register_activation_hook(__FILE__,'aw_ss_activate');

// Function to create new database field in wp_options
function aw_ss_activate() {
	add_option('aw_ss_customPermalinkSlug', 'aw-simple-sorter', '', 'no');
}

$aw_ss_optionCheck = get_option('aw_ss_customPermalinkSlug');

if ($aw_ss_optionCheck == 'aw-simple-sorter') {

	// Run aw_ss_deactivate() when plugin is deactivated
	register_deactivation_hook( __FILE__, 'aw_ss_deactivate' );

}

// Delete the aw_ss_customPermalinkSlug database field in wp_options
function aw_ss_deactivate() {
	delete_option('aw_ss_customPermalinkSlug');
}

if (isset($_POST["aw_ss_issetChecker"])) {
	$awSScustomPermalink = $_POST["aw_ss_custPerm"];
	$awSScustomPermalink = preg_replace('/\s+/', '', $awSScustomPermalink);  
	update_option('aw_ss_customPermalinkSlug', $awSScustomPermalink);
}


if ( ! function_exists('register_awsimplesorter_posttype') ) {

	// Register Custom Post Type
	function register_awsimplesorter_posttype() {
		$labels = array(
			'name' 				=> _x( 'AW SS Posts', 'post type general name' ),
			'singular_name'		=> _x( 'AW SS Post', 'post type singular name' ),
			'add_new' 			=> __( 'Add New' ),
			'add_new_item' 		=> __( 'Add New AW SS Post' ),
			'edit_item' 		=> __( 'Edit AW SS Post' ),
			'new_item' 			=> __( 'New AW SS Post' ),
			'view_item' 		=> __( 'View AW SS Post' ),
			'search_items' 		=> __( 'Search AW SS Posts' ),
			'not_found' 		=> __( 'No AW SS Posts found' ),
			'not_found_in_trash'=> __( 'No AW SS Posts found in the trash' ),
			'parent_item_colon' => __( '' ),
			'menu_name'			=> __( 'Simple Sorter' )
		);
		
		$taxonomies = array();
	
		$supports = array('title','editor','thumbnail','revisions');
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('AW SS Post'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'publicly_queryable'=> true,
			'query_var'			=> true,
			'exclude_from_search'=> false,
			'show_in_nav_menus'	=> false,
			'capability_type' 	=> 'post',
			'has_archive' 		=> false,
			'hierarchical' 		=> false,
			'rewrite' 			=> array('slug' => get_option('aw_ss_customPermalinkSlug'), 'with_front' => false ),
			'supports' 			=> $supports,
			'menu_position' 	=> 25,
			'menu_icon' 		=> plugins_url('/img/layers.png', __FILE__),
			'taxonomies'		=> $taxonomies
		 );
		 register_post_type('awsimplesorter',$post_type_args);
	}
		
	add_action('init', 'register_awsimplesorter_posttype');

}
	

if ( ! function_exists( 'register_awsscategories_tax' ) ) {

// Register Custom Taxonomy
	function register_awsscategories_tax() {
		$labels = array(
			'name' 					=> _x( 'AW SS Categories', 'taxonomy general name' ),
			'singular_name' 		=> _x( 'AW SS Category', 'taxonomy singular name' ),
			'add_new' 				=> _x( 'Add New AW SS Category', 'AW SS Category'),
			'add_new_item' 			=> __( 'Add New AW SS Category' ),
			'edit_item' 			=> __( 'Edit AW SS Category' ),
			'new_item' 				=> __( 'New AW SS Category' ),
			'view_item' 			=> __( 'View AW SS Category' ),
			'search_items' 			=> __( 'Search AW SS Categories' ),
			'not_found' 			=> __( 'No AW SS Category found' ),
			'not_found_in_trash' 	=> __( 'No AW SS Category found in Trash' ),
		);
		
		$pages = array('awsimplesorter');
		
		$args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('AW SS Category'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'hierarchical' 		=> true,
			'show_tagcloud' 	=> false,
			'show_in_nav_menus' => false,
			'rewrite' 			=> array('slug' => 'awsscategories', 'with_front' => false ),
		 );
		register_taxonomy('awsscategories', $pages, $args);
	}

	add_action('init', 'register_awsscategories_tax');

}

// Create an options page for the Simple Sorter Post Type
function aw_ss_add_options_page() {
	add_submenu_page('edit.php?post_type=awsimplesorter', 'AW Simple Sorter Documentation', 'Documentation', 'publish_posts', 'aw-simple-sorter/aw-ss-docs.php');
	add_submenu_page('edit.php?post_type=awsimplesorter', 'AW Simple Sorter Options', 'Options', 'publish_posts', 'aw-simple-sorter/aw-ss-options.php');
}




// Add the Simple Sorter options page to the admin area
add_action('admin_menu' , 'aw_ss_add_options_page');

function aw_simple_sorter_creator($atts) {
	
	$a = shortcode_atts( array(
		'show_posts' => '-1',
		'animation' => 'fade',
		'show_title' => '',
		'hover_overlay' => 'true',
	), $atts );
	
	// set variable from the show_posts shortcode attribute 
	$numberOfPosts = $a['show_posts'];
	if (empty($numberOfPosts)) {
		$numberOfPosts = '-1';
	}
	
	// set variable from the show_title shortcode attribute
	$showTitle = $a['show_title'];
	
	// set variable from the animation shortcode attribute
	$chosenUIeffect = strtolower($a['animation']);
	if (empty($chosenUIeffect) || $chosenUIeffect == 'scale' || $chosenUIeffect == 'size' || $chosenUIeffect == 'transfer') {
		$chosenUIeffect = 'fade';
	}
	
	// set variable from the hover_overlay shortcode attribute
	$hoverOverlay = $a['hover_overlay'];
	
	if (!wp_script_is('jquery-ui-core', $list = 'enqueued' )) {
		wp_enqueue_script('jquery-ui-core');	
	}
	
	if (!wp_script_is('jquery-effects-core', $list = 'enqueued' ) && !wp_script_is('jquery-ui-core', $list = 'enqueued' )) {
		wp_enqueue_script('jquery-effects-core');	
	}
	
	// include the switch statement that enqueues the proper UI Effect based on the chosen effect
	include_once 'aw-ss-effect-switch.php';	

	// enqueue custom jQuery and localize the script
	wp_enqueue_script('aw_simple_sorter_js', plugin_dir_url( __FILE__ ) . 'js/aw_simple_sorter.js');
	wp_localize_script('aw_simple_sorter_js', 'aw_ss_script_vars', array(
			'jQueryUIeffect' => __($chosenUIeffect),
		)
	);

	ob_start();

?>

<?php // start frontend html and WP loop ?>

	<div id="aw_ss_buttons">
		
		<ul id="aw_ss_button_list">
			<li class="aw_ss_button_li"><button class="aw_ss_button aw_ss_active_button" type="button" id="aw_ss_show_all">All</button></li>
			<?php
				$aw_ss_terms = get_terms('awsscategories');
			
				foreach ($aw_ss_terms as $aw_ss_term) {				
			    	echo '<li class="aw_ss_button_li"><button class="aw_ss_button" type="button" id="aw_ss_' . $aw_ss_term->slug . '">' . $aw_ss_term->name . '</button></li>';
			    } 			
			?>
		</ul>
		
		<div id="aw_ss_select_wrapper">
			<select id="aw_ss_select">
				<option value="aw_ss_show_all_select" id="aw_ss_show_all_select">Show All</option>
				<?php
					//$aw_ss_terms = get_terms('awsscategories');
				
					foreach ($aw_ss_terms as $aw_ss_term) {				
				    	echo '<option id="aw_ss_' . $aw_ss_term->slug . '" value="' . $aw_ss_term->slug . '">' . $aw_ss_term->name . '</option>';
				    } 			
				?>
			</select> 
		</div>
		
	</div> <!-- end #aw_ss_buttons -->
				
	<div id="aw_ss_wrapper">
	
		<?php 
			$query = new WP_Query(array('post_type' => 'awsimplesorter', 'posts_per_page' => $numberOfPosts, 'order' => 'ASC', 'orderby' => 'date',));
			while ( $query->have_posts() ) : $query->the_post();
		?>
		
			<?php $aw_ss_post_terms = get_the_terms($post->ID, 'awsscategories'); ?>	
			
			<div class="aw_ss_post_wrapper <?php foreach( $aw_ss_post_terms as $aw_ss_post_term ) echo ' aw_ss_' . $aw_ss_post_term->slug; ?>">
				
				<?php
					if ($hoverOverlay == 'true') { ?>
				
						<div class="aw_ss_hoverbox"><a class="aw_read_more" href="<?php the_permalink(); ?>">Read More</a></div>
					
					<?php }
				
					if ($showTitle == 'true') { ?>
						<div class="aw_title_wrapper">	
							<h3><?php the_title(); ?></3>
						</div> 
				<?php }
					
					if ($hoverOverlay != 'true') {	
					
				?>
				
				<a href="<?php the_permalink(); ?>">
					
					<?php } the_post_thumbnail('aw_ss_featured_image_480x320', array( 'class' => 'aw_ss_featured_image' ));
						
				if ($hoverOverlay != 'true') { ?> 
				
				</a>
				
				<?php }	?>
			
			</div>
			
		<?php endwhile; wp_reset_postdata(); ?>
	
	</div> <!-- end #aw_ss_wrapper --> 
	
<?php return ob_get_clean();
	
} // end aw_simple_sorter_creator()

// Add shortcode [aw_simple_sorter] to display the simple sorter
add_shortcode( 'aw_simple_sorter', 'aw_simple_sorter_creator' );


?>