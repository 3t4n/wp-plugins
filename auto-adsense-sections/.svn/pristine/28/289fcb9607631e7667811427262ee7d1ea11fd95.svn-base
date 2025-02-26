<?php
/*
Plugin Name: Auto AdSense Sections
Description: Automatically implement AdSense section targeting to improve the relevancy of your AdSense ads.
Version: 1.0
Date: March 16th, 2010
Author: Mathias Amnell
Author URI: http://blog.proliit.se
Plugin URI: http://blog.proliit.se/auto-adsense-sections/
*/

function add_adsense_sections($content) {
		$content = "<!-- google_ad_section_start -->".$content."<!-- google_ad_section_end -->";
	  return $content;
}

if(is_admin()) {
	add_action('admin_menu', 'add_adsense_sections_menu');
	add_action('admin_init', 'add_adsense_sections_register');
}

function add_adsense_sections_register() {
	register_setting('add_adsense_sections_optiongroup', 'aas_content');
	register_setting('add_adsense_sections_optiongroup', 'aas_comments');
	register_setting('add_adsense_sections_optiongroup', 'aas_excerpt');
}

function add_adsense_sections_menu() {
	add_options_page('Auto AdSense Sections', 'AdSense Sections', 8, 'auto_adsense_sections', 'add_adsense_sections_options');
}

function add_adsense_sections_options() { ?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2>Auto AdSense Sections</h2>
		<p>
			By default Google AdSense will show ads based on the content of your page. This may give you irrelevant ads that won't give you as many clicks. 
			To get more relevant ads you can tell Google what parts of your pages the ad selection should be based on.
		</p>
		
		<form method="post" action="options.php">
			<?php settings_fields('add_adsense_sections_optiongroup'); ?>
			<p>What do you want Google to base the Ads on?</p>
			<input type="checkbox" id="aas_content" name="aas_content" value="true" <?php if(get_option('aas_content') == TRUE) : ?>checked="true"<?php endif; ?> /> <label for="aas_content" />Post and page contet</label><br />
			<input type="checkbox" id="aas_excerpt" name="aas_excerpt"  value="true" <?php if(get_option('aas_excerpt') == TRUE) : ?>checked="true"<?php endif; ?> /> <label for="aas_excerpt" />Post and page excerpt</label><br />
			<input type="checkbox" id="aas_comments" name="aas_comments"  value="true" <?php if(get_option('aas_comments') == TRUE) : ?>checked="true"<?php endif; ?> /> <label for="aas_comments" />Comments (will not work if you are using plugins such as Disqus)</label><br />
			
			<p class="submit">
				<input type="submit" class="button-primary" value="Save Changes" />
			</p>
		</form>
	</div>
<?php
}

if(get_option('aas_content') == TRUE) {
	add_filter ('the_content', 'add_adsense_sections', 1000);
}

if(get_option('aas_comments') == TRUE) {
	add_filter ('comment_text', 'add_adsense_sections', 1000);
}

if(get_option('aas_excerpt') == TRUE) {
	add_filter ('the_excerpt', 'add_adsense_sections', 1000);
}



?>
