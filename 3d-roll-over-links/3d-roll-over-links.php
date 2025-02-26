<?php
/**
 * Plugin Name: 3D Roll Over Links
 * Plugin URI: http://www.richzendy.org/wordpress-plugins/3d-roll-over-links
 * Description: This plugin provides 3D roll over efect over links in to your post content
 * Version: 0.1.2
 * Author: Richzendy
 * Author URI: http://www.richzendy.org
 * License: GPLv3
 */

//1
function roll_over_links_menu(){
     add_options_page('3D Roll Over Links Options', '3D Roll Over Links', 'manage_options', 'roll_over_links_menu', 'roll_over_links_options');
//call register settings function
add_action( 'admin_init', 'register_mysettings' );
}

//2
add_action('admin_menu','roll_over_links_menu');
add_action( 'admin_enqueue_scripts', 'roll_over_links_scripts' );

 function roll_over_links_scripts() {
// load javascripts
     $pluginfolder = get_bloginfo('url') . '/' . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__));
     wp_enqueue_style('jquery_colorpickersliders_css', $pluginfolder.'/admin/jquery-colorpickersliders/jquery.colorpickersliders.css');
     wp_enqueue_script('jquery_colorpickersliders_script', $pluginfolder.'/admin/jquery-colorpickersliders/jquery.colorpickersliders.js', array( 'jquery' ));
     wp_enqueue_script('tinycolor_script', $pluginfolder.'/admin/libraries/tinycolor.js');
 }
//3
function roll_over_links_options(){
     include('admin/3d-roll-over-links-admin.php');
}

function register_mysettings() {

//register our settings
register_setting( '3d-roll-over-links-settings-group', '3d_rollover_background_color' );
}

function roll_over_links_class($content){
        $str = '<div class="rolloverlinks">';
	$newcontent = $str.$content."</div>";
	return $newcontent;
}

add_filter( 'the_content', 'roll_over_links_class' );

function insert_3d_roll_over_links() {
 $options = get_option('3d_rollover_background_color'); 
if (!$options) { $options = 'hsl(206,80%,30%)'; }

    echo '
<style type=\'text/css\'>
/* Start CSS to 3D rollover links plugin */
a {
	text-decoration: none;
	color: hsl(206,80%,50%);
}

.roll {
	display: inline-block;
	overflow: hidden;
	vertical-align: top;
	-webkit-perspective: 400px;
	-moz-perspective: 400px;
	-webkit-perspective-origin: 50% 50%;
	-moz-perspective-origin: 50% 50%;
}

.roll span {
	display: block;
	position: relative;
	padding: 0 2px;
	-webkit-transition: all 400ms ease;
	-moz-transition: all 400ms ease;
	-webkit-transform-origin: 50% 0;
	-moz-transform-origin: 50% 0;
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
}

.roll:hover span {
	background: #111;
	-webkit-transform: translate3d(0px,0px,-30px) rotateX(90deg);
	-moz-transform: translate3d(0px,0px,-30px) rotateX(90deg);
}

.roll span:after {
	content: attr(data-title);
	display: block;
	position: absolute;
	left: 0;
	top: 0;
	padding: 0 2px;
	color: #fff;

	background: '. $options . ';
	-webkit-transform-origin: 50% 0;
	-moz-transform-origin: 50% 0;
	-webkit-transform: translate3d(0px,105%,0px) rotateX(-90deg);
	-moz-transform: translate3d(0px,105%,0px) rotateX(-90deg);
}
/* End CSS to 3D rollover links plugin */
</style>


<script type=\'text/javascript\'>//<![CDATA[ 
window.onload=function(){
var supports3DTransforms =  document.body.style[\'webkitPerspective\'] !== undefined || 
                            document.body.style[\'MozPerspective\'] !== undefined;

function linkify( selector ) {
    if( supports3DTransforms ) {
        
        var nodes = document.querySelectorAll( selector );

        for( var i = 0, len = nodes.length; i < len; i++ ) {
            var node = nodes[i];
	    var sibling = node.firstChild;
	    if(sibling.nodeName != "IMG"){
             if( !node.className || !node.className.match( /roll/g ) ) {
                node.className += \' roll\';
                node.innerHTML = \'<span data-title="\'+ node.text +\'">\' + node.innerHTML + \'</span>\';
	        }
	     }		
        };
    }
}

linkify( \'.rolloverlinks a\' );
}//]]>  

</script>';

}

add_action('wp_head', 'insert_3d_roll_over_links');
?>
