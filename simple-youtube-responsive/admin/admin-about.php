<?php 
/**********************************************************
 * Simple YouTube Responsive
 * About Page, Since version 2.0.0
 *
 ***********************************************************/
if (!defined('ABSPATH')) {
    exit;
}

class eirudo_ytresponsive_plugin_about {
	
	
    public function __construct() {
		add_action( 'admin_menu', array( $this, 'menus' ) );
		//add_action( 'admin_init', array( $this, 'sections' ) );
		//add_action( 'admin_init', array( $this, 'fields' ) );
	}
	
	// Add Menu & Submenu
	public function menus() {
		// Add the menu item and page
		$parent_slug = 'eirudo_ytresponsive_options';
		$page_title = 'About Simple YouTube Responsive';
		$menu_title = 'About';
		$capability = 'manage_options';
		$slug = 'eirudo_ytresponsive_about';
		$callback = array( $this, 'option_page' );

		// Add sub menu
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $slug, $callback );
	}

	
	// Content of Option Page / Menu
	public function option_page() { ?>
	
<div class="wrap about-wrap full-width-layout">
		<h1>Simple YouTube Responsive</h1>

		<p class="about-text">
			Thanks for installing Simple YouTube Responsive.<br/>Please give me a <a href="https://wordpress.org/support/plugin/simple-youtube-responsive/reviews/" target="_blank">review</a> on Wordpress plugin directory if you think this plugin is useful.</p>

		<div class="wp-badge" style="background-image:url(https://ps.w.org/simple-youtube-responsive/assets/icon-256x256.png);background-color:#bb0000;">
			Version <?php echo EIRUDO_YTRESPONSIVE_VER; ?>		</div>


		<div class="changelog point-releases">
			<h3>Maintenance and Security Releases</h3>
			
<p>
<strong>Version 3.2.5</strong>
<ul>
<li>- Small fixes on Cover alt attributes when the title="" has been set</li>
</ul>
</p>
<p>
<strong>Version 3.2.4</strong>
<ul>
<li>- Small fixes: Add title="" attributes to the iframe</li>
</ul>
</p>	
<p>
<strong>Version 3.2.3</strong>
<ul>
<li>- Small fixes: Fix shortcode documentation (thanks to dbrossa).</li>
</ul>
</p>		
<p>
<strong>Version 3.2.1</strong>
<ul>
<li>- Small fixes: Missing double quote from HTML. Now has been fixed.</li>
</ul>
</p>
<p>
<strong>Version 3.2</strong>
<ul>
<li>- Small fixes: Missing inline CSS attributes. Now has been fixed.</li>
</ul>
</p>
<p>
<strong>Version 3.1</strong>
<ul>
<li>- Small fixes: Remove double slashes from Javascript link</li>
</ul>
</p>
<p>
<strong>Version 3.0</strong>
<ul>
<li>- Prevent XSS attacks via Shortcode (thanks to <strong>Darius Sveikauskas</strong> and <strong>yuyudhn</strong> from Patchstack for notifying)</li>
<li>- Optimized database usage</li>
</ul>
</p>
<p>
<strong>Version 2.5</strong>
<ul>
<li>- Bug Fixes: On Lazy Load mode, sometimes the width of video not full 100% as it's container element (as default), caused by Elementor's CSS</li>
</ul>
</p>
<p>
<strong>Version 2.4</strong>
<ul>
<li>- Bug Fixes: video player floated to the left on mobile devices</li>
</ul>
</p>
<p>
<strong>Version 2.3</strong>
<ul>
<li>- Now you can add your own supported parameters on each shortcode (for advanced use only).<br/>See <a href="https://developers.google.com/youtube/player_parameters#Parameters" target="_blank">https://developers.google.com/youtube/player_parameters#Parameters</a> for complete list parameters.</li>
</ul>
</p>
<p>
<strong>Version 2.2.2</strong>
<ul>
<li>- More custom parameters added: Loop, Fullscreen, Show video controls bar, Start at, End at</li>
</ul>
</p>
<p>
<strong>Version 2.2.1</strong>
<ul>
<li>- Little optimization and remove unecessary codes.</li>
</ul>
</p>
<p>
<strong>Version 2.2.0</strong>
<ul>
<li>- Bug Fixes break Wordpress after last update.</li>
</ul>
</p>
<p>
<strong>Version 2.1.0</strong>
<ul>
<li>- Bug Fixes on JavaScript Conflict with another plugin. Special thanks to <a href="https://wordpress.org/support/users/jkeasley2/" target="_blank">@jkeasley2</a> for helping resolve this bugs.</li>
</ul>
</p>
<p>
<strong>Version 2.0.1</strong>
<ul>
<li>- Bug Fixes on AMP</li>
<li>- Added Troubleshoot options: Javascript placing (sometimes YouTube not working if you using Elementor Pro and using Custom Footer Section)</li>
<li>- Correcting typo on Shortcodes guide</li>
<li>- Placing Stylesheet on Header (previously on footer)</li>
</ul>
        </p>
			<p>
				<strong>Version 2.0.0</strong> -  Plugin options page and Lazy Load mode!</p>
        
		</div>

		<h3 class="aligncenter">New on Simple YouTube Responsive</h3>

		<div class="has-2-columns">
			<div class="column aligncenter">
				<h4>Plugin Options</h4>
				<p>Choose a default settings for YouTube embed. All these settings always can be overided using custom attributes on your shortcodes.</p>
			</div>
			<div class="column aligncenter">
				<h4>Lazy Load</h4>
				<p>Lazy Load supported. Make your site load faster even you placing multiple YouTube videos on single page.</p>
			</div>
		</div>

		<hr>


	</div>	

 <?php
	}

}

// Run Option Page
new eirudo_ytresponsive_plugin_about();