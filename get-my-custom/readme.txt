=== Plugin Name ===
Contributors: Paul Whitehead
Tags: custom field, outside loop, loop, custom
Requires at least: 2.7
Tested up to: 2.8
Stable tag: 1.0

Allows you to get a custom field from outside the loop

== Description ==

Custom fields are awsome, they can be anything you like, you can show your mood, or store a file location, or whatever you can imagine. Their only limit is that you have to know the post ID, so if your using templates you can mostly only use them inside the loop. This function allows you to use a pages/posts custom fields outside of the loop, e.g. in the header.php file allowing you to control the layout of a page before the loop has even run. 


== Installation ==

1. Upload `get_my_custom.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In your template file add `<?php get_my_custom('your-custom-field-name', TRUE); ?>`. 

its all pretty simple. 