<?php
/*
Plugin Name: Autocomplete Post Search
Plugin URI: http://www.netattingo.com/
Description: This plugin provides search form that will search any post with autocomplete functionility.  
Author: NetAttingo Technologies
Version: 1.0.0
Author URI: http://www.netattingo.com/
*/

define('WP_DEBUG', true);

//
define('APS_DIR', plugin_dir_path(__FILE__));
define('APS_URL', plugin_dir_url(__FILE__));
define('APS_INCLUDE_DIR', plugin_dir_path(__FILE__).'pages/');
define('APS_INCLUDE_URL', plugin_dir_url(__FILE__).'pages/');

// plugin activation hook called	
function aps_install() {
   	global $wpdb;
}
register_activation_hook(__FILE__, 'aps_install');

// plugin deactivation hook called	
function aps_uninstall() {	
	global $wpdb;
}
register_deactivation_hook(__FILE__, 'aps_uninstall');

//Include css and js file at particular location
function aps_js_css_files() {
	wp_enqueue_style( 'aps_css', plugins_url('includes/aps-style.css',__FILE__ ));
	wp_enqueue_script( 'aps_js', plugins_url('includes/aps-script.js',__FILE__ ));
}
add_action( 'wp_enqueue_scripts','aps_js_css_files');

//add admin css
function aps_admin_css() {
  wp_register_style('admin_css', plugins_url('includes/admin-style.css',__FILE__ ));
  wp_enqueue_style('admin_css');
}
add_action( 'admin_init','aps_admin_css');


// admin menu
function aps_menus() {
	add_menu_page("Autocomplete Post Search", "Autocomplete Post Search", "administrator", "autocomplete-post-search-setting", "aps_pages", "dashicons-search", 31);
	add_submenu_page("autocomplete-post-search-setting", "About Us", "About Us", "administrator", "about-us", "aps_pages");
}
add_action("admin_menu", "aps_menus");


//function menu pages
function aps_pages() {

   $setting = APS_INCLUDE_DIR.$_GET["page"].'.php';
   include($setting);

}

//function to shortcode
function aps_shortcode() {
	$post_ids = array();
	//all post types array
	$post_type_to_exclude=array('attachment','revision' , 'nav_menu_item');
	$aps_exclude_post_types= get_option('aps_exclude_post_types');
	if($aps_exclude_post_types != ''){
		$exploded_post_types = explode(",",$aps_exclude_post_types);
		foreach($exploded_post_types as $toexplode){
		 $post_type_to_exclude[]=$toexplode;
		}
	}
	
	$post_type_to_include=array();
	$all_post_types = get_post_types( '', 'names' ); 
	foreach ( $all_post_types as $post_type ) {
		 if ( !in_array($post_type, $post_type_to_exclude)) {
			$post_type_to_include[]= $post_type;
		 }
	}
	
	$args = array(
		   'post_type' => $post_type_to_include,
		   'post_status'       => 'publish',
		   'posts_per_page' => -1,
		 );
	
	
	$query = new WP_Query( $args );
	$action= get_option('home').'/';
	

	while ($query->have_posts()) : $query->the_post();
		$post_ids[] = get_the_title();
	endwhile;
	$post_ids = "'" . implode("', '", $post_ids) . "'";
	
    $apsContent = '<div class="aps-search-form"><form role="search" method="get" class="pure-form" action="'.$action.'" >
        <input id="type-post-name" autofocus type="text" name="s" placeholder="Search Post...">
		<input type="submit" value="Go" class="search-submit">
    </form></div>';
	
	$apsContent.= "<script>
        var demo1 = new autoComplete({
            selector: '#type-post-name',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = [".$post_ids."];
                var suggestions = [];
				var noresult = 'No post found';
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            }
        });
    </script>";
	
	return $apsContent;
}

// hook to add shortcode
add_shortcode('autocomplete-post-search', 'aps_shortcode');

