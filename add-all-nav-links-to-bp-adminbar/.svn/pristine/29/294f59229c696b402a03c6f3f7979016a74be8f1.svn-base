<?php

/*
Plugin Name: Add All Nav Links to BP Adminbar
Requires at least: WordPress 2.9.2 / BuddyPress 1.2.3
Tested up to: WordPress 3.0 / BuddyPress 1.2.5.2 (Should work anyway. Be sure to read the readme file for more on this.)
Plugin URI: http://wordpress.org/extend/plugins/add-all-nav-links-to-bp-adminbar/
Description: This plugin aggregates all Buddypress directory and Wordpress page links into the BP Adminbar. All BP pages are collected in a Community dropdown, and all WP pages appear in dropdowns that respect whatever page order you have set in your WP backend. As of this version, you can also use this plugin simply to style your adminbar without adding anything to it.
Version: 2.1.2
Author: Patrick Cohen (pcwriter)
Author URI: http://nowrecovery.com/justfunstuff/2010/08/15/add-all-nav-links-to-bp-adminbar/

Thanks and props to hnla for invaluable collaboration and tutoring on this plugin; to r-a-y, LPH2005 and DJPaul for some great contributions; to takeo, animeonsen, JediSthlm for the ideas and code snippets that inspired this plugin; and to all for helping me learn basic stuff and iron out the kinks in this code (whether they know it or not).

License : GPL2
Copyright 2010 Patrick Cohen  (email : info@nowrecovery.com)

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
*/

/*-------------------------- USER CONFIG OPTIONS --------------------------*/

// Configure wp_list_pages nav as horizontal(false) or vertical dropdown(true)
 $pageLinkDropdown = get_option(page_link_dropdown);

// Configure top level Nav bar label (wp_list_pages as vertical dropdown)
 $wpListPagesLabel = get_option(list_pages_dropdown);

// Configure label for 'Community' links default = 'Community'
if (get_option(bp_community_links))
 $bpCommunityLinks = get_option(bp_community_links);
else
 $bpCommunityLinks = 'Community';
 
 $hideMainNav = get_option(hide_main_nav);
 $hideSiteName = get_option(hide_site_name);
 $hideLoginStuff = get_option(hide_login_signup);
 $hideRandomMenu = get_option(hide_visit_random);
 $scrollWithPages = get_option(scroll_with_pages);
 $addWpPages = get_option(add_wp_pages);
 $addBpComponents = get_option(add_bp_components);
 $mainBackgroundColor = get_option(main_background_color);
 $subBackgroundColor = get_option(sub_background_color);
 $subItemWidth = get_option(sub_item_width);
 $mainTextColor = get_option(main_text_color);
 $linkHoverColor = get_option(link_hover_color);
 $navBackColor = get_option(nav_back_color);
 $mainItemPadding = get_option(main_item_padding);
 $menuBorderColor = get_option(menu_border_color);
 $overallNavbarWidth = get_option(overall_navbar_width);
 $overallItemHeight = get_option(overall_item_height);
 $submenuTopMargin = get_option(submenu_top_margin);
 $itemFontFamily = get_option(item_font_family);
 $itemFontSize = get_option(item_font_size);
 $itemFontStyle = get_option(item_font_style);
 $itemFontWeight = get_option(item_font_weight);
 $navbarVertOffset = get_option(navbar_vertical_offset);
 $navbarHorizOffset = get_option(navbar_horizontal_offset);


/*--------------------------  END USER CONFIG -----------------------------*/

// Register WP 3.0 nav menus regions
// Create regions for each user menu type
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
	  'bp_adminbar_pages1' => __( 'BP-WP-Navbar Menu 1'),
	  'bp_adminbar_pages2' => __( 'BP-WP-Navbar Menu 2'),
	  'bp_adminbar_pages3' => __( 'BP-WP-Navbar Menu 3'),
	  'bp_adminbar_pages4' => __( 'BP-WP-Navbar Menu 4'),
    'bp_adminbar_pages5' => __( 'BP-WP-Navbar Menu 5')
	) );
    }

// Begin 'pages' function

function pages(){
global $current_blog, $pageLinkDropdown, $wpListPagesLabel, $bpCommunityLinks, $addBpComponents, $addWpPages ;

?>

<?php if('BP_ROOT_BLOG') : ?>

<?php 
function return_wp_nav_title($menu_region) {
    $location_actual = get_nav_menu_locations(); // all the menu regions available and  the terms_id
    $menu_term_id = $location_actual[$menu_region]; // isolate a single region and menu term_id
    $menu_title = wp_get_nav_menu_object($menu_term_id); // feed the term_id to the menu object
    echo $menu_title = $menu_title->name; // return menu name object 
} ?>

<!-- Community Drop Down -->
<?php if($addBpComponents) : ?>
<li
<?php if (bp_is_page( BP_ACTIVITY_SLUG ) ||
bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ||
bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ||
bp_is_page( BP_FORUMS_SLUG ) ||
bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>

<a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" title="<?php _e( '', 'buddypress' ) ?>"><?php _e( $bpCommunityLinks, 'buddypress' ) ?></a>

<ul>

<?php if ( bp_is_active( 'activity' ) ) : ?>
<li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
<a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" title="<?php _e( 'Activity', 'buddypress' ) ?>"><?php _e( 'Activity', 'buddypress' ) ?></a>
</li>
<?php endif; ?>

<li<?php if ( bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ) : ?> class="selected"<?php endif; ?>>
<a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/" title="<?php _e( 'Members', 'buddypress' ) ?>"><?php _e( 'Members', 'buddypress' ) ?></a>
</li>

<?php if ( bp_is_active( 'blogs' ) && bp_core_is_multisite() ) : ?>
<li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
<a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" title="<?php _e( 'Member Blogs', 'buddypress' ) ?>"><?php _e( 'Member Blogs', 'buddypress' ) ?></a>
</li>
<?php endif; ?>

<?php if ( bp_is_active( 'groups' ) ) : ?>
<li<?php if ( bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ) : ?> class="selected"<?php endif; ?>>
<a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/" title="<?php _e( 'Groups', 'buddypress' ) ?>"><?php _e( 'Groups', 'buddypress' ) ?></a>
</li>

<?php if ( bp_is_active( 'forums' ) && bp_is_active( 'groups' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) get_site_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
<li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
<a href="<?php echo site_url() ?>/<?php echo BP_FORUMS_SLUG ?>/" title="<?php _e( 'Group Forums', 'buddypress' ) ?>"><?php _e( 'Group Forums', 'buddypress' ) ?></a>
</li>
<?php endif; ?>
<?php endif; ?>

<?php do_action( 'bp_nav_items' ); ?>

</ul>
</li>
<?php endif; ?><!--addBpComponents-->

<?php if($addWpPages) : ?>
<?php if(!function_exists( 'wp_nav_menu' ) ): ?>
<?php ### Don't show wp_list_pages if WP 3.0 use New wp_nav_menus instead ### ?>
<?php if($pageLinkDropdown) : ?>
<li><a href="/"><?php echo $wpListPagesLabel; ?></a>
  <ul>
<?php endif; ?>

 <li>
   <?php wp_list_pages( 'title_li=&depth=20&exclude=' ); ?>
 </li>

<?php if($pageLinkDropdown) : ?>
 </ul>
</li>
<?php endif; ?>
<?php endif; ?>


<?php ##################### Add call to WP Nav Menus ####################### ?>
<?php if ( function_exists( 'wp_nav_menu' ) ): ?>
<?php if(has_nav_menu('bp_adminbar_pages1')): ?>
<li><a href="<?php site_url() ?>"><?php  return_wp_nav_title('bp_adminbar_pages1') ?></a>
  <?php wp_nav_menu(array('sort_column' => 'menu_order', 'container' => '', 'fallback_cb' => '', 'theme_location' => 'bp_adminbar_pages1')) ?>
</li>
<?php endif; ?>

<?php if(has_nav_menu('bp_adminbar_pages2')): ?>
<li><a href="<?php site_url() ?>"><?php  return_wp_nav_title('bp_adminbar_pages2') ?></a>
  <?php wp_nav_menu(array('sort_column' => 'menu_order', 'container' => '', 'fallback_cb' => '', 'theme_location' => 'bp_adminbar_pages2')) ?>
</li>
<?php endif; ?>

<?php if(has_nav_menu('bp_adminbar_pages3')): ?>
<li><a href="<?php site_url() ?>"><?php  return_wp_nav_title('bp_adminbar_pages3') ?></a>
  <?php wp_nav_menu(array('sort_column' => 'menu_order', 'container' => '', 'fallback_cb' => '', 'theme_location' => 'bp_adminbar_pages3')) ?>
</li>
<?php endif; ?>

<?php if(has_nav_menu('bp_adminbar_pages4')): ?>
<li><a href="<?php site_url() ?>"><?php  return_wp_nav_title('bp_adminbar_pages4') ?></a>
  <?php wp_nav_menu(array('sort_column' => 'menu_order', 'container' => '', 'fallback_cb' => '', 'theme_location' => 'bp_adminbar_pages4')) ?>
</li>
<?php endif; ?>

<?php if(has_nav_menu('bp_adminbar_pages5')): ?>
<li><a href="<?php site_url() ?>"><?php  return_wp_nav_title('bp_adminbar_pages5') ?></a>
  <?php wp_nav_menu(array('sort_column' => 'menu_order', 'container' => '', 'fallback_cb' => '', 'theme_location' => 'bp_adminbar_pages5')) ?>
</li>
<?php endif; ?>
<?php endif; // end check for wp 3.0 ?>
<?php  ################# end WP 3.0 wp_nav_menus ########################### ?>

<?php endif; ?><!--addWpPages-->
<?php endif; ?>

<?php 
}

add_action( 'bp_adminbar_menus', 'pages', 15 );

include 'bp-wp-navbar-admin.php';

if ( $hideMainNav ):
function hide_main_nav() { ?>
<style type="text/css">
 /*<![CDATA[*/
 /* bp-wp-navbar - hide main site navigation */
 ul#nav {display:none;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'hide_main_nav'); 
endif;


function bp_adminbar_elements() {
global $hideRandomMenu, $hideLoginStuff, $hideSiteName, $bp ;

if ( $hideSiteName ):
    remove_action('bp_adminbar_logo', 'bp_adminbar_logo');
endif;

if ( $hideLoginStuff ):
    remove_action('bp_adminbar_menus', 'bp_adminbar_login_menu', 2); 
    	if ( function_exists( 'bl_adminbar_login_menu' ) ):
 	    remove_action('bp_adminbar_menus', 'bl_adminbar_login_menu', 2); 
			endif;
endif;

if ( $hideRandomMenu ): 
    remove_action('bp_adminbar_menus', 'bp_adminbar_random_menu', 100);
endif;

}// close function bp_adminbar_elements

if ( defined( 'BP_VERSION' ) || did_action( 'bp_init' ) )
	bp_adminbar_elements();
else
	add_action( 'bp_init', 'bp_adminbar_elements' );


/**************** Custom Navbar CSS *******************/
if ( $mainBackgroundColor ):
function color_main_back() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar ul li {background:<?php echo get_option('main_background_color'); ?>;}

 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'color_main_back');
endif;

if ( $subBackgroundColor ):
function color_sub_back() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar ul li ul, #wp-admin-bar ul li ul li {background:<?php echo get_option('sub_background_color'); ?>;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'color_sub_back');
endif;

if ( $menuBorderColor ):
function color_menu_border() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar ul li ul {border:1px solid <?php echo get_option('menu_border_color'); ?>;border-top:none;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'color_menu_border');
endif;

if ( $mainTextColor ):
function color_main_text() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar li a, #wp-admin-bar ul li ul a, #wp-admin-bar ul li ul li ul li:hover a, #wp-admin-bar ul li ul li:hover a, #wp-admin-bar ul li ul li:hover ul li a, #admin-bar-logo {color:<?php echo get_option('main_text_color'); ?>;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'color_main_text');
endif;

if ( $linkHoverColor ):
function color_link_hover() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar ul.main-nav li:hover, #wp-admin-bar ul.main-nav li.sfhover, #wp-admin-bar ul.main-nav li ul li.sfhover {background-color:<?php echo get_option('link_hover_color'); ?>;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'color_link_hover');
endif;

if ( $navBackColor ):
function color_nav_back() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar .padder {background:<?php echo get_option('nav_back_color'); ?>;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'color_nav_back');
endif;

if ( $overallNavbarWidth ):
function navbar_width_overall() { ?>
<style type="text/css">
 /*<![CDATA[*/
body#bp-default #wp-admin-bar .padder, body#bp-default.activity-permalink #wp-admin-bar .padder {max-width:<?php echo get_option('overall_navbar_width'); ?>px;min-width:<?php echo get_option('overall_navbar_width'); ?>px;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'navbar_width_overall');
endif;

if ( $overallItemHeight ):
function item_height_overall() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar li {line-height:<?php echo get_option('overall_item_height'); ?>px;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'item_height_overall');
endif;

if ( $submenuTopMargin ):
function top_margin_submenu() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar ul li ul ul {margin-top:<?php echo get_option('submenu_top_margin'); ?>px;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'top_margin_submenu');
endif;

if ( $mainItemPadding ):
function padding_main_item() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar ul li a {padding-right:<?php echo get_option('main_item_padding'); ?>px;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'padding_main_item');
endif;

if ( $subItemWidth ):
function width_sub_item() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar ul li ul, #wp-admin-bar ul li ul li {width:<?php echo get_option('sub_item_width'); ?>px;}
#wp-admin-bar ul li ul ul {margin-left:<?php echo get_option('sub_item_width'); ?>px;}
#wp-admin-bar ul li {padding-right:0;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'width_sub_item');
endif;

if ( $navbarVertOffset ):
function offset_navbar_vert() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar {top:<?php echo get_option('navbar_vertical_offset'); ?>px;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'offset_navbar_vert');
endif;

if ( $navbarHorizOffset ):
function offset_navbar_horiz() { ?>
<style type="text/css">
 /*<![CDATA[*/
#bp-default #wp-admin-bar .padder {left:<?php echo get_option('navbar_horizontal_offset'); ?>px;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'offset_navbar_horiz');
endif;

if ( $scrollWithPages ):
function with_pages_scroll() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar {position:absolute;}
#bp-default #wp-admin-bar .padder {	position:relative;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'with_pages_scroll');
endif;

if ( $itemFontFamily ):
function font_family_item() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar li a {font-family:<?php echo get_option('item_font_family'); ?>;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'font_family_item');
endif;

if ( $itemFontSize ):
function font_size_item() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar li a {font-size:<?php echo get_option('item_font_size'); ?>px;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'font_size_item');
endif;

if ( $itemFontStyle ):
function font_style_item() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar li a {font-style:italic;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'font_style_item');
endif;

if ( $itemFontWeight ):
function font_weight_item() { ?>
<style type="text/css">
 /*<![CDATA[*/
#wp-admin-bar li a {font-weight:bold;}
 /*]]>*/
</style>
<?php } 
 add_action('wp_head', 'font_weight_item');
endif;

?>