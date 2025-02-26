<?php
/*
Plugin Name: KB Easy PicasaWeb
Description: The simplest plugin to display a PicasaWeb album inside a page or post. Just put a link to a PicasaWeb album in a post (on a line by itself); this plugin does the rest. Remember to use the <a href="options-general.php?page=kb-inline-picasaweb.php">KB Picasa options page</a>.
Author: Adam R. Brown
Version: 1.3.3
Plugin URI: http://adambrown.info/b/widgets/category/kb-easy-picasaweb/
Author URI: http://adambrown.info/
*/

/* CHANGELOG
	1.0		initial
	1.1		no longer requires PHP 5
		1.11	no longer requires allow_url_fopen, IF you have (1) curl or (2) snoopy works.
	1.2		lots of new display options
		1.2.1	prepared for WP 2.5
		1.2.2	minor cosmetic fixes for WP 2.7. Also, now recognizes google.**, not just google.com.
	1.3 
		- now accommodates unlisted albums (with ?authkey= paramater)
		- by default, wraps photos in the same css classes as WordPress does. If you've got a recentish theme, this is a nice thing to have.
		- you can now set it to display only 5 (for example) photos per album.
		1.3.1	If there's a stray "#" on the end of your URL (happens a lot), the plugin removes it instead of failing.
		1.3.2	Picasaweb now uses https everywhere instead of http when you're logged in. This will recognize the https and switch to http.
		1.3.3	Very minor tweaks to make this plugin interact nicely with another plugin I'm developing. Stay tuned.
*/

// defaults for optiosn
$kb_inlinePicasa_defaults = array(	// defaults
	'showcaptions'=>1,	// 1 if we'll show captions under each photo
	'linkpics'=>0,		// 1 if we'll link pics to picasaweb (full-size view)
	'linktitles'=>1,	// 1 if we'll link album titles to picasaweb
	'twocolumn'=>0,		// 1 to display pics in two columns
	'noDefaultStyles'=>0, // 1 to suppress the styles that this pluging inserts via wp_head()
	'noWPCaption'=>0, 	// 0 to wrap photos in the default WP css classes, 1 to use different classes
	'numpics'=>0,		// set to an integer 1 or higher to limit number of pics shown per album
);


// looks for a link to a picasaweb album on a line by itself.
// link must be of the form http://picasaweb.google.com/username/albumname (or else it won't get processed)--no whitespace in username or albumname
// filtering function
function kb_inlinePicasa($content){
	if ( false===strpos($content, 'http://picasaweb.google.') && false===strpos($content, 'https://picasaweb.google.') )
		return $content;
	require_once('kb-inline-picasaweb-functions.php');
	// build our regex:
	$preg = '~(?:\n+|<p>)\s*';	// look for a new line, possibly with leading whitespace
	$preg .= '(?:\s*|<!--\s*more\s*-->|<span id="more-[0-9]+"></span>)'; // in case there's a <!--more--> at the beginning of the line (or, after processing, <span id="more-7"></span>)
	$preg .= '<a\s*([^>]*)\s+'; // look for opening <a, possibly with some attributes before href=
	$preg .= 'href=["\']https?://picasaweb\.google\.(co\.uk|[a-z]{2,4})/([^/\s]+)/([^/"\'\s]+)/?["\']'; // the URL; grab the username and album name.
	$preg .= '\s*([^>]*)\s*>'; // grab any remaining attributes, then the closing >
	$preg .= '([^>]+)';	// the link text. There must not be any tags within the link text.
	$preg .= '</a\s*>';	// the closing </a> tag, possibly with whitespace
	$preg .= '\s*(?:\n+|</p>)~i';	// the end of the line, possibly with whitespace
	// do it:
	return preg_replace_callback($preg, 'kb_inlinePicasa_display', $content);	// note that we force the trigger to be on its own line.
}
add_filter('the_content', 'kb_inlinePicasa');




// admin page
function kb_inlinePicasa_admin(){
	require_once('kb-inline-picasaweb-admin.php');
	$admin = new kb_inlinePicasa_options();
}
function kb_inlinePicasa_adminHook(){
	add_submenu_page('options-general.php', 'KB Picasa', 'KB Picasa', 7, 'kb-inline-picasaweb.php', 'kb_inlinePicasa_admin');
}
add_action('admin_menu', 'kb_inlinePicasa_adminHook');



// prefix to use on all our options
define('KB_INLINEPICASA_OPTION', 'kbipw_');



// some styles. This is optional. Uncheck the box on the admin screen to kill it.
function kb_inlinePicasa_head(){
	$opt = get_option( KB_INLINEPICASA_OPTION . 'other' );
	if ( $opt['noDefaultStyles'] )
		return;
	echo '
<style type="text/css">
.kb-inlinePicasa{text-align:center;}
.kb-inlinePicasa a img{border:none;}
.kb-inlinePicasa-wrap{margin:1em auto;}
.kb-inlinePicasa-table{margin:auto;}
.kb-inlinePicasa-table .kb-inlinePicasa-wrap{margin:0.3em auto;}
.kb-inlinePicasa-image{}
.kb-inlinePicasa-caption{}
</style>
';
}
add_action('wp_head', 'kb_inlinePicasa_head');
?>