<?php
/*
Plugin Name: A better prezi - Wordprezi
Plugin URI: http://SocialBlogsiteWebDesign.com/plugins/a-better-prezi
Description: Prezi makes ugly your presentation if embedded in your site, to save bandwith and make titles read-able in thumbnails view. To prevent a GIANT title blocking half of it, a nasty lwo-res thumbnail and waiting for a click to load, this plugin…
Version: 1.1
Author: Sergio Zambrano
Author URI: http://SocialBlogsiteWebDesign.com/about
License: GPL2
*/

/*  Copyright 2011  SERGIO ZAMBRANO  (email : sergio@socialblogsitewebdesign.com)

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

/*
You won't realize how ugly a prezi presentation looks when embedded 
in your website until you actually invest hours, even days, in designing
the ultimate presentation, learn all the basics and more, get the file
to play in your site, and then… it hits you: Something is wrong
and no matter what parameters you use for your embed it NEVER looks
as nice as it does on prezi.com explore section.

This plugin helps WordPress finding your presentation no matter what page
you embedded it, when using the only prezi player in the market that gets
rid of the GIANT title box and the ugly low-res thumbnail, by auto-loading
and even auto-playing your presentation. Developed by Slidynamic.com
that player uploaded to your server, along with the standalone (off-line)
version of your prezi presentation, makes possible to make the time
you invested on making your presentation attractive worth it,
playing it as beautifully and even more functionally than in prezi's
own website. It even supports different delays for each slide!

The only bump that incredibly better prezi player solution finds is
the standalone player was designed to "look" for the required files 
in the SAME directory as the page it's on, searching for those files
in EVERY directory you are at only.
You'll notice that once your prezi looks pretty again, it fails because
of missing files if embedded in several pages (like in WordPress header)
and uploading those files (around 20MB) to every directory your pages
are in is not an option.
Just install this plugin and all your prezi presentation will run 
smoothly no matter how many pages you embedded it in,
by using advanced apache redirection rules in your server.
 
 (Only compatible with Linux hostings, for now. 
 You'll know if your wordpress is running on Linux
 if your articles urls look like name-of-article, 
 rather than index.php?p=308)
*/


function find_prezi_anywhere( $rules ) {
return "#BEGIN Fix Prezi
RewriteEngine On
RewriteBase /
Options +FollowSymlinks

RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*slidedynamic\.xml$ /_prezi/slidedynamic.xml [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*textdynamic\.txt$ /_prezi/textdynamic.txt [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*testdynamic\.txt$ /_prezi/testdynamic.txt [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*content\.xml$ /_prezi/data/content.xml [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*data/fonts/(.*)$ /_prezi/data/fonts/$1 [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*data/repo/(.*)$ /_prezi/data/repo/$1 [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*prezi\.app(.*)/$ /_prezi/prezi.app/$1 [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*movie.swf$ /_prezi/prezi.app/Contents/Resources/movie.swf [R=301,L]
RewriteCond %{REQUEST_URI} !_prezi/
RewriteRule ^.*data/main.swf$ /_prezi/data/main.swf [R=301,L]\n
#END Fix Prezi\n\n" . $rules;
}

function prezi_flush_rewrites() {
 global $wp_rewrite;
 $wp_rewrite->flush_rules();
}

/*function prezi_add_rewrites() {
 global $wp_rewrite;
 $ftc_new_non_wp_rules = array(
	'.*?(!_prezi/)testdynamic\.txt' => '_prezi/testdynamic.txt',
 );

 $wp_rewrite->non_wp_rules = $ftc_new_non_wp_rules + $wp_rewrite->non_wp_rules;
}

add_action('generate_rewrite_rules', 'prezi_add_rewrites');*/
add_action('admin_init', 'prezi_flush_rewrites');
add_filter('mod_rewrite_rules', 'find_prezi_anywhere');
?>
