<?php 
/**********************************************************
 * Simple YouTube Responsive
 * Shortcode Page, Since version 2.0.0
 *
 ***********************************************************/
if (!defined('ABSPATH')) {
    exit;
}

class eirudo_ytresponsive_plugin_shortcode {
	
	
    public function __construct() {
		add_action( 'admin_menu', array( $this, 'menus' ) );
		//add_action( 'admin_init', array( $this, 'sections' ) );
		//add_action( 'admin_init', array( $this, 'fields' ) );
	}
	
	// Add Menu & Submenu
	public function menus() {
		// Add the menu item and page
		$parent_slug = 'eirudo_ytresponsive_options';
		$page_title = 'YouTube Responsive Shortcode';
		$menu_title = 'Shortcode';
		$capability = 'manage_options';
		$slug = 'eirudo_ytresponsive_shortcode';
		$callback = array( $this, 'option_page' );

		// Add sub menu
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $slug, $callback );
	}

	
	// Content of Option Page / Menu
	public function option_page() { ?>
<style>
.erd-code{
    padding: 20px;
    margin: 0 0 5px;
    background-color: rgba(0,0,0,.05);
    max-width: 600px;
    font-family: 'Lucida Console';
    letter-spacing: .4px;
    text-shadow: 0 1px 1px #fff;
    font-weight: 600;
	font-size:15px;
}
p.description span.mark,.erd-code span{color:#bb0000;}
</style>
	
<div class="wrap about-wrap full-width-layout">
<h2 style="text-align:left;">Shortcode - Simple YouTube Responsive</h2>
<p class="about-text">Use these shortcode to using Responsive YouTube Video.</p>

<div class="changelog point-releases">
	<h3>Simple Shortcode for embedding YouTube video</h3>
<div class="erd-code">[youtube v="<span>XXXXXX</span>"]</div>
<p class="description">Change XXXXXX using ID of YouTube video. Get the ID from YouTube Video URL, example:<br/>
https://www.youtube.com/watch?v=<span class="mark">ZzpfucBZpmA</span> or<br/>
https://youtu.be/<span class="mark">ZzpfucBZpmA</span></p>
</div>


<div class="changelog point-releases">
	<h3>Custom Video Aspect Ratio</h3>
<div class="erd-code">[youtube v="XXXXXX" ratio="<span>16:9</span>"]</div>
<p class="description">Default is <strong>16:9</strong>, you can change it to any ratio. And the video keep the ratio on any resolution.<br/>Example, you can change it to <strong>4:3</strong> or <strong>2:1</strong>.</p>
</div>

<div class="changelog point-releases">
	<h3>Specify Maximum Width of video</h3>
<div class="erd-code">[youtube v="XXXXXX" maxwidth="<span>480px</span>"]</div>
<p class="description">Default is <strong>100%</strong> of it's container, you can change it to any size.<br/>Both of pixel or percent value are accepted.<br/>If the video / custom maximum width is larger than container, the video size wil adapt it to 100% of container and keep the aspect ratio.</p>
</div>

<div class="changelog point-releases">
	<h3>Add ID Attribute to Embed Code</h3>
<div class="erd-code">[youtube v="XXXXXX" id="<span>my-youtube-video</span>"]</div>
<p class="description">If you're working with JavaScript, or want to customize using CSS, you can add custom id attribute on embed code.</p>
</div>

<div class="changelog point-releases">
	<h3>Add additional Classes</h3>
<div class="erd-code">[youtube v="XXXXXX" class="<span>youtube-video custom-class</span>"]</div>
<p class="description">If you're working with JavaScript, or want to customize using CSS, you can add additional CSS Classes on embed code.<br/>Separate multiple classes using a space.</p>
</div>

<div class="changelog point-releases">
	<h3>Add additional CSS Codes</h3>
<div class="erd-code">[youtube v="XXXXXX" style="<span>border:2px solid red;</span>"]</div>
<p class="description">Add additional inline CSS codes on embed code.</p>
</div>

<div class="changelog point-releases">
	<h3>Automatically Centered of content or not</h3>
<div class="erd-code">[youtube v="XXXXXX" center="<span>yes</span>"]</div>
<p class="description">If the embed code smaller than it's container, the video always aligned-center so make your layout keeps beautiful.</p>
</div>

<div class="changelog point-releases">
	<h3>Enable Loop video</h3>
<div class="erd-code">[youtube v="XXXXXX" loop="<span>yes</span>"]</div>
<p class="description">Replay current video after it ends.<br/>!! This wont work/replaced if you using custom parameters. <a href="#customparam">See below</a>.</p>
</div>

<div class="changelog point-releases">
	<h3>Allow fullscreen</h3>
<div class="erd-code">[youtube v="XXXXXX" allowfullscreen="<span>yes</span>"]</div>
<p class="description">Enable toggle fullscreen on YouTube player so user can enable it.<br/>!! This wont work/replaced if you using custom parameters. <a href="#customparam">See below</a>.</p>
</div>

<div class="changelog point-releases">
	<h3>Show video player control bar?</h3>
<div class="erd-code">[youtube v="XXXXXX" controls="<span>yes</span>"]</div>
<p class="description">Show control bar or not.<br/>!! This wont work/replaced if you using custom parameters. <a href="#customparam">See below</a>.</p>
</div>

<div class="changelog point-releases">
	<h3>Custom Start </h3>
<div class="erd-code">[youtube v="XXXXXX" start="<span>34</span>"]</div>
<p class="description">Specify start point from video (in seconds). If you want to start video at 02:34, it's mean you should use in seconds = <strong>154</strong><br/>!! This wont work/replaced if you using custom parameters. <a href="#customparam">See below</a>.</p>
</div>

<div class="changelog point-releases">
	<h3>Custom End</h3>
<div class="erd-code">[youtube v="XXXXXX" end="<span>221</span>"]</div>
<p class="description">Specify time to stop the video. In seconds. If you want to stop video at 03:41, so use convert the time in seconds = <strong>221</strong><br/>!! This wont work/replaced if you using custom parameters. <a href="#customparam">See below</a>.</p>
</div>

<div class="changelog point-releases" id="customparam">
	<h3>Advanced parameters</h3>
<div class="erd-code">[youtube v="XXXXXX" param="<span>autoplay=1</span>&<span>fs=1</span>&<span>controls=1</span>&<span>rel=1</span>"]</div>
<p class="description">You can add custom parameters on each shortcode.<br/>See <a href="https://developers.google.com/youtube/player_parameters#Parameters" target="_blank">https://developers.google.com/youtube/player_parameters#Parameters</a> for complete list of supported parameters.<br/>Separate each parameter using <strong>&amp;</strong><br/>If you using this parameters, the previous shortcode attributes for loop, fullscreen, start, end, controls will replaced.<br/>So you must set them inside this parameters too.</p>
</div>


<div class="changelog point-releases">
	<h3>Make it Lazy Load</h3>
<div class="erd-code">[youtube v="XXXXXX" lazyload="<span>yes</span>"]</div>
<p class="description">Set the video as Lazy Load. So you can add multiple shortcodes and custom which video must be Lazy Loaded.<br/>If your shortcode using Lazyload, the video will always autoplayed after clicking the play button.</p>
</div>

<div class="changelog point-releases">
	<h3>Lazy Load Thumbnail Quality</h3>
<div class="erd-code">[youtube v="XXXXXX" imgq="<span>hqdefault</span>"]</div>
<p class="description">If you activate Lazy Load mode, as default the video will only show the YouTube image URL. You can choose the image quality.<br/>
<span class="mark">maxresdefault</span> - Maximum Resolution (1280x720)<br/>
<span class="mark">sddefault</span> - Standart Resolution (640x480)<br/>
<span class="mark">hqdefault</span> - High Resolution (480x360)<br/>
<span class="mark">mqdefault</span> - Medium Resolution (320x180)<br/>
<span class="mark">default</span> - Default / Low Resolution (120x90)<br/>
</p>
</div>

<div class="changelog point-releases">
	<h3>Custom Thumbnail Image for the Video</h3>
<div class="erd-code">[youtube v="XXXXXX" thumb="<span>https://eirudo.com/files/simple-youtube-responsive.png</span>"]</div>
<p class="description">Custom image thumbnail using your own image. Image only shown when you set Lazy Load mode turned on.</p>
</div>



	</div>	

 <?php
	}

}

// Run Option Page
new eirudo_ytresponsive_plugin_shortcode();