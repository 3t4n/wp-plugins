=== AMP Recent Posts ===
Contributors: nmvdvjr
Tags: AMP, recent posts
Requires at least: 4.5.3
Tested up to: 4.7
Stable tag: 3.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin to display recent posts in your AMP template, with links to AMP articles (visitor is not redirected to regular website).


== Description ==

Adds recent posts to your AMP content. Extends the AMP plugin (Automattic) via options page, works alongside all other AMP plugins by use of shortcode added to the plugins template. Shortcode allows to customize the endpoint of the links (to fit the AMP plugin you are using), add a title,  and set a limit to the total amount of links.

= NEW IN 2.0 = 
If you make use of the popular AMP plugin by Automattic you can now use of the new options page! The plugin uses the AMP footer hook to add Recent Posts to your AMP content and comes with a series of new functions:

- Post type support: return posts, pages or any other including custom post type

- Display featured images

- Display the date

- Exclude posts by ID

- Change the priority of the hook



As well the default options of setting a custom endpoint, heading and max number of posts.

> __With the 2.0 update we completely rewritten the plugin__ (better queries, better compatibility, bug fixes) with you in mind. Although we've tested 
> extensively something might have slipped through, kindly [let us know](https://jaaadesign.nl/en/blog/amp-recent-posts/) if you find any 
> inconsistencies, thank you!


This plugin is actively maintained but will not be supported. I will however try to answer any questions in the comment section of the [plugin website](https://jaaadesign.nl/en/blog/amp-recent-posts/) and create a FAQ here in the repository.



== Installation ==


= Using the AMP plugin by Automattic =
1. Upload and activate plugin
2. Visit the plugin options page and set your preferences


= Using shortcode =
1. Upload and activate plugin 
2. Place this code in your AMP template: 
 


__`<?php echo do_shortcode( "[amp-recent-posts]" ); ?>`__



**Shortcode: Customizing the display of the AMP Recent Posts plugin:**
 
- __append='amp'__ change the endpoint to suit your own. Depending on which AMP plugin you are using you can adjust the slug to direct to the AMP articles, standard: 'amp' (appropriate for the AMP plugin by Automattic).



Example: __append='amp-post'__  will generate a slug 'yourwebsite.nl/post/__amp-post__/'



- __heading='Recent Posts'__ will add an H3 heading, standard: none

- __max='5'__ will set a limit to the amount of posts displayed:, standard: 10

- The code can now look like this: 



__`<?php echo do_shortcode( "[amp-recent-posts append='amp' heading='Recent Posts' max='5']" ); ?>`__






= Depreciated and backwards compatibility =
If you are using the AMP plugin by Automattic you might have used a custom hook to implement the code in your theme's functions.php file. Since the 2.0 update this can now be handled by the plugin setting on the options page. If you wish to keep using the hook please update it like so:




`//* Add content to the AMP template footer (AMP plugin Automattic)
//* Place in your theme's functions.php



function add_rec_to_amp_footer() {
    
if ( function_exists('is_amp_endpoint') )
?>

    

<?php echo do_shortcode( "[amp-recent-posts append='amp' heading='Recent Posts' max='5']" ); ?>

<?php

}


add_action( 'amp_post_template_footer', 'add_rec_to_amp_footer', 3 );`


== Frequently Asked Questions ==

None yet.


== Changelog ==

= 1.0 =
Release date: July 4th, 2016

= 1.1 =
Release date: October 10th, 2016 

* Updated installation tips to new version AMP plugin

= 2.0 =
Release date: October 31st, 2016 

* Rewritten plugin with better queries
* Added functions post type support, featured images, display date, exclude posts and set hook priority for users of the AMP plugin by Automattic
* Various compatibility improvements

= 3.0 =
Release date: November 8th, 2016 

* Removed default settings in options page
* Small changes in CSS for better compatibility with our other plugins
* Various small bug fixes

= 3.1 =
Release date: December 20th, 2016 

* Update WP 4.7

== Upgrade Notice == 

== Screenshots == 

1. Rendering of plugin including featured image and date
2. Rendering of plugin including date 
3. Plugin options page

Live demo at the bottom of [this page](https://jaaadesign.nl/en/blog/amp-recent-posts/amp/) 






