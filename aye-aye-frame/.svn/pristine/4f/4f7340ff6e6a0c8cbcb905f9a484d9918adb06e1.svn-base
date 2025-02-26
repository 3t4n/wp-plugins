<?php
/*
Plugin Name: Aye Aye Frame
Plugin URI: http://www.utcwebdesign.co.uk/blog/development/aye-aye-frame-wordpress-plugin
Description: Simple plugin to enable the use of iFrames in Wordpress by using a shortcode [ayeframe]YOUR URL HERE[/ayeframe]
Author: Christian Senior
Version: 1
Author URI: http://www.utcwebdesign.co.uk
*/
add_action('admin_menu', 'aye_aye_frame_help');

function aye_aye_frame_help() {
	add_options_page('Aye Aye Frame Options', 'Aye Aye Frame', 'manage_options', 'aye-aye-frame-help', 'aye_aye_frame_options');
}

function aye_aye_frame_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	?>
    <div class="wrap">
    	<h1>Aye Aye Frame for Wordpress</h1>
        <h2>What does it do?</h2>
        <p>Wordpress is such an awesome tool that it even strips some HTML, such as iframes, as a security measure. Unfortunately sometimes we need to use iframes so Aye Aye Frame gives you back that freedom with the use of a shortcode [ayeframe]. For more information on Wordpress shortcodes click <a href="http://codex.wordpress.org/Shortcode">HERE</a>.</p>
        
        <h2>Usage</h2>
        <p>To use Aye Aye Frame simply insert the url or code you would like to appear in your iframe between these shortcode tags</p>
        
        <code>[ayeframe]YOUR URL HERE[/ayeframe]</code>
        <p>The code or url you insert between the shortcode tags is the equivalent of the 'src' section of the iframe code.</p>
        <h2>Customise your Aye Aye Frame</h2>
        <p>As with normal iframes, extra parameters can be added to customise the size, borders and other elements. Any, all or none of these parametres may be used.</p>
        <p><strong>Extra parameters</strong><br />
        'width' = Takes a number to customise the width of the iframe. Default = 250<br />
        'height' = Takes a number to customise the height of the iframe. Default = 250<br />
        'frameborder' = Specifies whether to add a border to the iframe (0 = no, 1 = yes). Default = 0<br />
        'marginheight' = Specifies the top and bottom margins of an iframe. Default = 0<br />
        'marginwidth' = Specifies the left and right margins of an iframe. Default = 0<br />
        'name' = Specifies the name of the iframe. Default = No default<br />
        'scrolling' = Specifies whether or not to display scrollbars in an iframe (yes, no, auto). Default = auto<br />
        'id'= Specifies the id of your iframe. No default<br />
        'class' = Specifies the class name of your iframe. Default = No default<br />
        'title' = Specifies the title of your iframe. No default<br />
        </p>
        <h3>Example usage of extra parameters</h3>
        <p>
        <code>[ayeframe width=500 height=500 frameborder=1 marginheight=5 marginwidth=5 name=myFrameName scrolling=0 id=myFrameID class=myFrameClass title=myFrameTitle]http://www.myframeurl[/ayeframe]</code></p>
        
        <h2>Any questions?</h2>
        <p>Aye Aye Frame was created just for fun (thats right, FUN!) by Christian Senior at <a href="http://www.utcwebdesign.co.uk">UTC Web Design</a> but if you have any questions or suggestions you are welcome to get in touch using the contact information on the website.</p>
        <p>Keep up to date with this plugin at <a href="http://www.utcwebdesign.co.uk/blog/development/aye-aye-frame-wordpress-plugin">Aye Aye Frame Wordpress Plugin</a></p>
        
        
    </div><!--wrap-->
<?php } //end options if

function ayeFrame($atts, $content = null) {
	extract(shortcode_atts(array(
		"width" => '250',
		"height" => '250',
		"frameborder" => '0',
		"marginheight" => '0', 
		"marginwidth" => '0',
		"name" => '', 
		"scrolling" => 'auto',
		"id" => '', 
		"class" => '',
		"title" => ''
	), $atts));
	
	return '<iframe width="' . $width . '" height="' . $height . '" frameborder="' . $frameborder . '" marginheight="' . $marginheight . '" marginwidth="' . $marginwidth . '" name="' . $name . '" scrolling="' . $scrolling . '" id="' . $id . '" class="' . $class . '" title="' . $title . '" src="' .$content. '"></iframe>';
}

add_shortcode("ayeframe", "ayeFrame");  
?>