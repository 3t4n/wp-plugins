<?php
/**
 * Plugin Name: AMP Sidebar Hamburger Menu
 * Plugin URI: https://github.com/jamesozzie/ampsidebar-wp
 * Description: Easily implement an amp-sidebar into your site using a shortcode or theme insertion. Great for non AMP compatible themes.
 * Version: 1.2.0
 * Author: James Osborne
 * Author URI: http://www.jamesozz.ie
 */

define('JOZZ_AMPSIDEBAR_PLUGIN_DIR', plugin_dir_path(__FILE__));

// include options file
include plugin_dir_path(__FILE__) . '/options.php';

// create custom plugin settings menu
add_action('admin_menu', 'jozz_ampsidebar_custom_settings');
function jozz_ampsidebar_custom_settings()
{
    $page_title = 'AMP Sidebar';
    $menu_title = 'AMP Sidebar';
    $capability = 'manage_options';
    $slug = 'jozz-ampsidebar-settings';
    $start = 'jozz_ampsidebar_custom_settings_start';
    add_options_page($page_title, $menu_title, $capability, $slug, $start);
}

// create link to the settings page from plugins page
function jozz_ampsidebar_settings_link($links)
{
    $settings_link =
        '<a href="options-general.php?page=jozz-ampsidebar-settings.php">Settings</a>';
    array_push($links, $settings_link);
    return $links; 
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'jozz_ampsidebar_settings_link');


// Create option settings
add_action('admin_init', 'jozz_ampsidebar_field');
function jozz_ampsidebar_field()
{
    register_setting('jozz-ampsidebar-settings', 'ampsidebar_color');
	register_setting('jozz-ampsidebar-settings', 'jz_ampsidebar_viewoption');
	register_setting('jozz-ampsidebar-settings', 'jz_ampsidebar_mobiledisplay');

}

// add native WP colour picker
if (is_admin()) {
    add_action('admin_enqueue_scripts', 'jozz_ampsidebar_colors_script');
}
function jozz_ampsidebar_colors_script($hook_suffix)
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
}

// Set the CSS & defaults
add_action('wp_head', 'jozz_ampsidebarvariablecolor_cssdefaults');
function jozz_ampsidebarvariablecolor_cssdefaults()
{
	$jz_ampsidebar_mobiledisplay = esc_attr(get_option('jz_ampsidebar_mobiledisplay'));
    $ampsidebar_color = esc_attr(get_option('ampsidebar_color', '#314a5e')); ?>
<style>
.jzsidebar_container svg   {
	stroke: <?= $ampsidebar_color ?>;
 
} 

<?php  if  ($jz_ampsidebar_mobiledisplay == "Mobile only") { ?>

	@media only screen and (min-width: 768px){ 
.jzsidebar_container{
	display:none; 
}}

<?php } ?>
 
</style>
<?php
}

// Load CSS
function jz_ampsidebar_load_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'jz_sidebar', $plugin_url . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'jz_ampsidebar_load_css' );

// Register the nav menu location  
register_nav_menus( array(
    'amp_sidebar_menu' => 'AMP sidebar menu',
) );

// Create shortcode, including optional rendering for AMP
	function jz_ampsidebar_shortcode() { 
    $jz_ampsidebar_viewoption = esc_attr(get_option('jz_ampsidebar_viewoption', 'AMP & Canonical'));

    if  ($jz_ampsidebar_viewoption == "AMP only"){
		
		if (function_exists('is_amp_endpoint') && is_amp_endpoint()) {
			$ampsidebar_message = ' <div class="jzsidebar_container">
			<svg class="sidenav-btn" on="tap:sidenav.open" role="button" tabindex="0" width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.5 24.5">
				<g stroke-linecap="round" stroke-miterlimit="10" stroke-width="3.5px">
					<line x1="1.25" y1="1.25" x2="29.25" y2="1.25"></line>
					<line x1="1.25" y1="12.25" x2="29.25" y2="12.25"></line>
					<line x1="1.25" y1="23.25" x2="29.25" y2="23.25"></line>
				</g>
			</svg>
			</div>	'; 
		} else {
			$ampsidebar_message = '   	'; 
		}
		
		
	
	} else{
		$ampsidebar_message =	'<div class="jzsidebar_container">
		<svg class="sidenav-btn" on="tap:sidenav.open" role="button" tabindex="0" width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.5 24.5">
			<g stroke-linecap="round" stroke-miterlimit="10" stroke-width="3.5px">
				<line x1="1.25" y1="1.25" x2="29.25" y2="1.25"></line>
				<line x1="1.25" y1="12.25" x2="29.25" y2="12.25"></line>
				<line x1="1.25" y1="23.25" x2="29.25" y2="23.25"></line>
			</g>
		</svg>
		</div>
		';
	}
	
	return $ampsidebar_message;
}
add_shortcode('jz-sidebar', 'jz_ampsidebar_shortcode');


// Create data attribute shortcode 
function jzampsidebar_dataattribute_shortcode() { 
 
	if (function_exists('is_amp_endpoint')&& is_amp_endpoint()) {
	$navbarattribute = ' on="tap:sidenav.open" role="button" tabindex="0" '; 
	return $navbarattribute; 
	}else{
		$navbarattribute = '';
	return; 
	} 
}
add_shortcode('jz-navbarattribute', 'jzampsidebar_dataattribute_shortcode');


 // Custom menu walker - to set the dropdown toggles to the right using amp-accordion

 class jozzamp_slidemenu_Walker extends Walker_Nav_Menu {
    
    public function jozz_start_lvl( &$output, $depth = 0, $args = array() ) {
    		$output .= ' <amp-carousel height="1.8rem" layout="fixed-height" controls type="carousel" class="primary-nav fade">';
    }
	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;

      $output .= "<span'" .  implode(" ", $item->classes) . "'>";
        
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<span>';
      }
       
      $output .= $title;

      if( $description != '' && $depth == 0 ) {
      	$output .= '<small class="description">' . $description . '</small>';
      }

      if( $permalink && $permalink != '#' ) {
      	$output .= '</a>';
      } else {
      	$output .= '</span>';
      }
    }

     function end_el( &$output, $item, $depth = 0, $args = array() ) {
     		$output .= '</span>';
     }

     public function end_lvl( &$output, $depth = 0, $args = array() ) {
     		$output .= '</amp-carousel>';
     }
}

class jozz_ampsidebar_dropdown_walker extends Walker_Nav_Menu {
    static $count=0;
    public function jozz_start_lvl( &$output, $depth = 0, $args = array() ) {
    		

    }
	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
	
	// Can't change function name, https://developer.wordpress.org/reference/classes/walker_nav_menu_edit/start_el/
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
  	if($depth == 0 and $args->walker->has_children)
  	{
  			$output .= '<li class="sidebar-parent-container"><amp-accordion disable-session-states><section><h3 class="nested-accordion"><a href='. $item->url.' role="button" aria-expanded="false" tabindex="0">'.$item->title.'</a></h3><ul>';
  	}
  	else
  	{
  		$output .= '<li><a href='. $item->url.'>'.$item->title.'</a>';
  	}	
 
  }
  function end_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
  	if($depth == 0 )
  	{
  			$output .= ' </section>';
  	}
  	else
  	{
  		$output .= '</li>';
  	}	
  

  }
     public function end_lvl( &$output, $depth = 0, $args = array() ) {
     		if($args->walker->has_children)
     	{
     		$output .= '</amp-accordion> </li>';
     	}
     	$output .= '</li>';
     }
}

// add menu markup 
function jozz_ampsidebar_add_head_html() { 
?>
<div id="jozz_sidemenu">
<amp-sidebar class="af_sidebar" id="sidenav" layout="nodisplay" side="left">
    <div class="closex"> <svg class="sidenav-close" xmlns="http://www.w3.org/2000/svg" width="26" height="26" on="tap:sidenav.close"
        role="button" tabindex="0" viewBox="0 0 21.97 21.97">
        <title>Close sidebar</title>
        <path fill="none" stroke="#222" stroke-width="4.5" stroke-miterlimit="10"
            d="M1.25 20.72L20.72 1.25m-19.47 0l19.47 19.47" stroke-linecap="round" />
    </svg></div>
    <nav>
	 
        <?php
				wp_nav_menu( array(
					'theme_location' => 'amp_sidebar_menu' ,
					'menu_class'     => 'jozz-menu',
					'fallback_cb'    => 'jozz_ampsidebar_menufallback',
					'walker' => new jozz_ampsidebar_dropdown_walker()
				 ) );
			?>
  </nav>
</amp-sidebar>
 </div>

<?php } 


// Add a fallback message, informing users if they didn't assign a menu to the menu location
  function jozz_ampsidebar_menufallback() {
  	echo '<div class="jozz_nomenu">No menu assigned! <br> Please assign your menu to the "AMP sidebar" menu location  </div>  ';
	}

// Add menu markup between amp-sidebar - with fallback for older non wp_body_open themes
  if ( function_exists( 'wp_body_open' ) ) {
    add_action( 'wp_body_open', 'jozz_ampsidebar_add_head_html' );
} else {
    add_action( 'wp_footer', 'jozz_ampsidebar_add_head_html' );
}

// Add sidebar component script for reader mode rendering
add_filter(
	'amp_post_template_data',
	function( $data ) {
		$data['amp_component_scripts'] = array_merge(
			$data['amp_component_scripts'],
			array(
				'amp-sidebar' => true,
				'amp-accordion' => true
			)
		);
		return $data;
	}
);

	// Make it work without the AMP plugin by calling AMP library scripts
	add_action('wp_head', 'jozz_sidebar_request_components');
	function jozz_sidebar_request_components(){

// Makes sure the plugin is defined before trying to use it
if ( ! function_exists( 'is_plugin_inactive' ) ) {
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}
 
if ( is_plugin_inactive( 'amp/amp.php' ) || function_exists( 'is_amp_endpoint' ) && ! is_amp_endpoint() ) {
    //plugin is not activated

		?>   
  <script async src="https://cdn.ampproject.org/v0.js"></script>  
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
  <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>

	 <?php 
 } 

};

// Add header override (to include custom bar with button)
add_filter(
	'amp_post_template_file',
	function ( $template_file ) {
		if ( basename( $template_file ) === 'header-bar.php' ) {
			$template_file = __DIR__ . '/header-bar.php';
		}
		return $template_file;
		
		
		
	}
 );

// Add button markup
add_action( 'amp_post_template_footer', 'jozz_ampsidebar_add_head_html', 99  );
 
add_filter( 'amp_post_template_data', function( $data ) {
	$data['amp_component_scripts'] = array_merge(
		$data['amp_component_scripts'],
		array(
			'amp-sidebar' => true,
			'amp-accordion' => true,
		)
	);
	return $data;
} );

 


 
add_action( 'amp_post_template_css', 'xyz_amp_additional_css_styles' );

function xyz_amp_additional_css_styles( $amp_template ) {
	$ampsidebar_color = esc_attr(get_option('ampsidebar_color', '#314a5e'));  
	$fullcss = include("style.css");
	$dfdf = '.jzsidebar_container svg { stroke:'.$ampsidebar_color .' ;}';
	echo $dfdf . $fullcss;
	?>
 
	<?php
}


 











 