=== Adminbar Post Menus ===
Contributors: shawnsandy.com
Donate link: http://autoloadmanager.shawnsandy.com/
Tags: adminbar, menu, quickjump
Requires at least: 3.3.2
Tested up to: 3.5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds menu list of post by status to your WP admin bar, quickly jump to and and from post, easily from the admin menu.

== Description ==

Features

* Simple and easy to use
* No complicated options menu(s)
* Easy to customize in your theme functions
* Modular
* Stand Alone (Removed AL.Manager dependency)

= Usage =

On install post and page menus are automatically created.

To customize your Adminbar Post Menus drop this code in your functions.php file or the now popular way in you own "theme-plugin". Don't forget to modify the post_type array to match your custom post types. More documentation will be coming soon.

`/**
 * Customize your Adminbar Post Menus
 *
 */
function apm_menus() {

    //Add a single item to the menu
    Adminbar_Menu::factory()->node_item('item-id', 'http://mysite.com/test-page', 'Menu Title');


    //create an post_type array(post_type, menu_title);
    $post_types  =  array('post' => 'Posts', 'page' => 'Pages','cwp_article' => 'Articles','cwp_faq' => "FAQ(s)");

    Adminbar_PostMenus::factory()->set_post_types($post_types)->create_nodes('test', 'http://mysite.com/test-page', 'Test Page');


    //load and run the class the old way
    AdminbarPostMenus::add_menus()->set_post_types($post_types)->nodes();
}
// run the function on init;

add_action('init', 'apm_menus');

`


== Version 0.2 ==

Adminbar Post Menus 0.2 is finally here, this release has been built using the new wp.autoload (al.manager) drop-in Adminbar component from ( http://autoloadmanager.shawnsandy.com ) the code has been completely rewritten the syntax is dead simple to use and should make adding items to the menubar a breeze.


== Version 0.1.2 ==

I really tried to keep this plugin simple and modular, no plugin options; roll your own if thats you thing or modify it in your theme functions file.

== Usage ==

Customize your Adminbar Post Menus drop this code in your functions.php file or the now popular way in you own "theme-plugin". Don't forget to modify the post_type array to match your custom post types. More documentation will be coming soon.

`/**
 * Customize your Adminbar Post Menus
 *
 */
function apm_menus() {

    //Add a single item to the menu
    Adminbar_Menu::factory()->node_item('item-id', 'http://mysite.com/test-page', 'Menu Title');


    //create an post_type array(post_type, menu_title);
    $post_types  =  array('post' => 'Posts', 'page' => 'Pages','cwp_article' => 'Articles','cwp_faq' => "FAQ(s)");

    Adminbar_PostMenus::factory()->set_post_types($post_types)->create_nodes('test', 'http://mysite.com/test-page', 'Test Page');


    //load and run the class the old way
    AdminbarPostMenus::add_menus()->set_post_types($post_types)->nodes();
}
// run the function on init;
add_action('init', 'apm_menus');

`


== Installation ==

1. Upload plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress



== Screenshots ==

1. Default Adminbar post menu


== Changelog ==

= 0.2 =
New Adminbar class
Removed AL.Manager dependency

= 0.1 =
Beta release version.

== Arbitrary section ==

***
