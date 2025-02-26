<?php
/**
 * @package Custom Template Post 
 * @version 1.0
 */
/*
Plugin Name: Custom Template Post
Plugin URI: http://wordpress.org/extend/plugins/custom-template-post/
Description: Custom Template Post.
Author: Chung
Version: 1.0
Author URI: http://chung.web.id/
*/

class CustomTemplatePost {

	function displayOption() {
		$options = get_option('ch-post-template');
		
		if (isset($_POST['submit'])) {
			$template = $_POST['post-template'];
			$style = $_POST['post-template-style'];
			
			$options['template-editor'] = $template;
			$options['template-style'] = $style;
			
			update_option('ch-post-template', $options);
		}
		
		$out = '<div class="wrap">';
		$out .= '<div class="icon32" id="icon-options-general"><br></div>';
		$out .= '<h2>Custom Post Template Settings</h2>';
		$out .= '<form action="" method="post">';
		$out .= '<table class="form-table">';
		$out .= '<tr><th>Template Post</th>';
		$out .= '<td><textarea name="post-template" rows="15" style="width:100%;">'.$options['template-editor'].'</textarea></td></tr>';
		$out .= '<tr><th>Template Post Style</th>';
		$out .= '<td><textarea name="post-template-style" rows="15" style="width:100%;">'.$options['template-style'].'</textarea></td></tr>';
		$out .= '</table>';
		$out .= '<p class="submit"><input type="submit" value="Save Changes" class="button-primary" id="submit" name="submit"></p>';
		$out .= '</form>';
		$out .= '</div>';
		echo $out;
	}
	
	function customEditor($content) {
		global $current_screen;

		$options = get_option('ch-post-template');

		if ($current_screen->post_type == 'post') {
			$content = $options['template-editor'];
		}
		return $content;
	}
	
	function customEditorStyle() {
		global $current_screen;
	}
	
	function addAdminOption() {
		add_submenu_page('options-general.php', "Custom Post Template Option", "Custom Post Template", 7, "customPostTemplate", array(&$this, "displayOption"));
	}
}

$CustomTemplatePost = new CustomTemplatePost();
add_action('admin_menu', array(&$CustomTemplatePost, 'addAdminOption'));
add_filter('default_content', array(&$CustomTemplatePost, 'customEditor'));
add_action('admin_head', array(&$CustomTemplatePost, 'customEditorStyle'));

?>
