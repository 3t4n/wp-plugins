<?php
/**
 * Documentation Page
 */
add_action('admin_menu', 'ctrlv_documentation_page');

function ctrlv_documentation_page() {

	$parent_slug 	= 'edit.php?post_type=ctrlv_templates';
	$page_title 	= 'Documentation';
	$menu_title 	= 'Documentation';
	$capability 	= 'manage_options';
	$menu_slug 		= 'ctrlv-documentation';
	$function 		= 'ctrlv_output_documentation';

	add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

	function ctrlv_output_documentation() {
		echo '
		<div class="wrap">
			<div style="max-width:600px">
				<img src="'.plugins_url().'/control-v/imgs/liren-logo.png">
				<h2>Control V Documentation</h2>
				<p class="description">For support and feature requests please visit the <a href="http://wordpress.org/support/plugin/control-v" target="_blank">official WordPress repository</a>.</p>
				<br>
				<h3>What?</h3>
				<p>This plugin enables a simple way for web designers and developers to create page templates to ultimately be used by non-technical end users of a site or theme.</p>
				
				<h3>Why?</h3>
				<p>Most page builders are overly complex, sluggish and rely heavily on shortcodes. Shortcodes are powerful but like most powerful things they should be used wisely. When shortcodes are used to replace basic html, it\'s just wrong.</p>
				
				<h3>How?</h3>
				<p>
				<ol>
				<li>Click "<a href="'.get_site_url().'/wp-admin/post-new.php?post_type=ctrlv_templates">Add Template</a>" to create a Template.</li>
				<li>Create a super cool template.</li>
				<li>Click <a title="Liren Helper Window Button" class="button add_media" href="#" style="margin-right: 5px; margin-bottom: 4px; padding-left: 7px; padding-right: 7px;">
				<img style="padding: 0 4px; vertical-align: middle;"src="'.plugins_url().'/control-v/imgs/custom-post-icon.png">
				Templates</a> to use the template in a new Page.</li>
				</ol>
				
				</p>
				
				
				
			</div>
		</div>';
	}
}