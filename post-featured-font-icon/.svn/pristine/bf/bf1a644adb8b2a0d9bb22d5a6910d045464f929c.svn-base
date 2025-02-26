=== Post Featured Font Icon ===
Contributors: kishores
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L5DAL9AXTAG8L
Tags: font-icon, title, featured-image, dashicons, genericons, font-awesome
Requires at least: 3.8
Tested up to: 5.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/quick-guide-gplv3.html

Post Featured Icon: Add font icon to post title, replace featured image with font icon. Currently
it supports dashicons, genericons, font-awesome.

== Description ==

Post Featured Icon: It allows to add font icons to post title, and there is option so that we can
replace post thumbnail with font icon.

It supports:

*   dashicons
*   genericons
*   font-awesome

Please check here: <a href="http://opentuteplus.com/post-featured-font-icon/">Demo 1</a> and <a href="http://blog.kishorechandra.co.in/project-fork-in-open-source/">Demo 2</a>

It supports post,page.But we can add to custom post types to. It provides hooks i.e icon_post_type .
<blockquote>
  <p><strong>Priority Support</strong></p>
  <p>If you are looking for more features, paid support or Custom WordPress Work, then you can hire me too. My email id : babunsahoo@gmail.com .</p>
</blockquote>

`// Our filter callback function
function icon_post_type_callback( $types ) {
    $types = array('post', 'page', 'product');
    return $types;
}
add_filter( 'icon_post_type', 'icon_post_type_callback', 10, 1 );
`

== Installation ==


This very simple like other wordpress plugin:
1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php the_post_font_icon( $post_id );?>` in your templates, to print font icon. [$post_id is optional and by default current post it]

== Frequently Asked Questions ==

= 1. font-awesome is loading two times =

Please deactivate your theme font-awesome css/js

== Screenshots ==

1. screenshot-1.jpg
2. screenshot-2.png

== Changelog ==

= 1.0.1 =
* Few small Bug Fix

= 1.0 =
* Added the new plugin

== Upgrade Notice ==

= 1.0 =
Added the new plugin
