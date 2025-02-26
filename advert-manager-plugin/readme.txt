=== Advert Manager ===
Contributors: joshme21
Donate link: http://isitesolution.com
Tags: adverts manager, sponsor ads manager, adsense
Requires at least: 2.0.2
Tested up to: 3.1
Stable tag: 1.0

Manage your adverts, sponsor ads, or even adsense easily on every posts or pages. it's simple.

== Description ==

Do you have to manually insert your advert and sponsor ads on the posts/articles? This plugin will help you
on managing your adverts, sponsor ads and adsense.

Manage your adverts, sponsor ads, or even adsense easily on every posts or pages. it's simple.


== Installation ==

This section describes how to install the plugin and get it working.

e.g.
1. Download the plugin
2. Extract the ZIP archive
3. Upload `advert-manager` to the `/wp-content/plugins/` directory
4. Activate the plugin through the 'Plugins' menu in WordPress
5. Please see the  added "Advert Manager" in the "Settings Menu" after activating it.
6. Insert this function where you want to show the advert, sponsor ads or adsense  <?php if(function_exists('get_adverthere')){ echo get_adverthere(); } ?>
7. PLEASE README.txt for for details on installation.
 
== Frequently Asked Questions ==

What function to insert?

you can insert this anywhre u want to show the advert on the post or article

"php begins"
if(function_exists('get_adverthere')){

$advert = get_adverthere();

/*ADVERT TITLE*/

echo $advert[post_title];

/*ADVERT DESCRIPTION*/

echo $advert[advert_description];

/*ADVERT IMAGE*/

echo $advert[advert_img];

/*ADVERT URL*/

echo $advert[advert_url];

}		

"php ends


just manipulate the output, u can assign varible of the image and description , or u can do wat ever you want.


like $img = $advert->advert_img;

<  img src=$img / >


== Screenshots ==

1. Advert Manager
2. Code

== Changelog ==

== Upgrade Notice ==