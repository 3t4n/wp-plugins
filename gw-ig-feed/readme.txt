=== GW-IG-Feed ===
Contributors: gwhitcher
Tags: instagram, bootstrap
Requires at least: 3.0.1
Tested up to: 4.6
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

GW-IG-Feed is an instagram plugin for Wordpress built to work with or without Bootstrap 3.


== Description ==

GW-IG-Feed is an instagram plugin for Wordpress built to work with or without Bootstrap 3.


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/gw-ig-feed` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the GW-IG-Feed page to configure the plugin
1. Click the sign in with Instagram plugin.
1. Click authorize the plugin with your Instagram account.
1. Fill in your username, count, and if you want bootstrap enabled.


= Shortcode =

A premade feed using Bootstrap 3 can be added by adding [GW-IG-Feed] to any page.  This requires Bootstrap 3 to be enabled in the GW-IG-Feed settings.


= PHP =

You can design your own feed by adding the below PHP to any PHP page.
`<?php 
$instagramgw = new InstagramGW();
$instaData = $instagramgw->instagram_gw_init();
foreach ($instaData->data as $instaPost) {
    echo '<a href="'.$instaPost->images->standard_resolution->url.'" target="blank">';
    echo '<img src="'.$instaPost->images->low_resolution->url.'" alt="'.$instaPost->caption->text.'" />';
    echo htmlentities($instaPost->caption->text).' | '.htmlentities(date("F j, Y, g:i a", $instaPost->caption->created_time));
    echo '</a>';
} 
?>`
