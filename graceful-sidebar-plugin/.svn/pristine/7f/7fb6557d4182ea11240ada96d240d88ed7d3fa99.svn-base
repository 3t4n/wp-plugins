<?php
/*
Plugin Name: A Graceful Sidebar Plugin
Plugin URI: http://mlynn.org/graceful-sidebar-plugin
Tags: custom sidebar, pages sidebar, custom sidebar
Description: Creates a custom sidebar widget to display a custom field from a page.  Create a page or post, enable the widget in your sidebar and add content. Create custom fields called graceful_title and graceful_content. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KKFYUAMPCQHXQ">Donate</a>
Version: 1.0.15
Author: Michael Lynn
Author URI: http://www.mlynn.org/
*/

add_action("init", "gs_widget_init");
add_action("admin_init", "gs_widget_admininit");
add_action('save_post','gs_save_meta');

$useQTransLate = function_exists('qtrans_convertURL') && function_exists('qtrans_getAvailableLanguages');
global $q_config;

function gs_save_meta($post_id){
    global $post;
    // Clean up legacy

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	if (isset($_REQUEST['bulk_edit']))
		return;

    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $title_current= get_post_meta($post_id,'_graceful_title',true);
    $content_current= get_post_meta($post_id,'_graceful_content',true);

    $title_new = $_POST['graceful_title'];
    $content_new = $_POST['graceful_content'];
	if ($title_new != $title_current) {
		update_post_meta($post_id, "_graceful_title", $title_new);
	}
	if ($content_new != $content_current) {
		update_post_meta($post_id, "_graceful_content", $content_new);
	}
}

function gs_widget_init() {

	wp_register_sidebar_widget('graceful_sidebar','Graceful Sidebar Widget', 'gs_widget','');
	wp_register_widget_control('graceful_sidebar','Graceful Sidebar Widget', 'gs_widget_control', '500', '500');

}

function gs_widget_admininit() {

	//add_meta_box('gs_meta', 'Graceful Sidebar Options', 'gs_meta', 'post', 'normal', 'high'); 
	//add_meta_box('gs_meta', 'Graceful Sidebar Options', 'gs_meta', 'page', 'normal', 'high'); 
	$post_types = get_post_types();
	foreach ( $post_types as $post_type )
		add_meta_box( 'gs_meta', 'Graceful Sidebar Options', 'gs_meta', $post_type, 'normal', 'high' );

}

function gs_meta() {
    global $post;

    $title_current= get_post_meta($post->ID,'_graceful_title',true);
    $content_current= get_post_meta($post->ID,'_graceful_content',true);

    $title_legacy= get_post_meta($post->ID,'graceful_title',true);
    $content_legacy= get_post_meta($post->ID,'graceful_content',true);

	$title = $title_current;
	$content = $content_current;

// Clean up legacy
	// Don't do this!
	//if ($title_legacy!='' && $title_current=='') {
// this means we have a legacy custom field - need to move it to the new '_graceful' field to hide it from custom fields
		//update_post_meta($post->ID, "_graceful_title", $title_legacy);
		//delete_post_meta($post->ID, "graceful_title");
		//$title = $title_legacy;
	//} else {
		//$title = $title_current;
	//}
	//if ($content_legacy!='' && $content=='') {
		//// this means we have a legacy custom field - need to move it to the new '_graceful' field to hide it from custom fields
		//update_post_meta($post->ID, "_graceful_content", $content_legacy);
		//delete_post_meta($post->ID, "graceful_content");
		//$graceful_content = $content_legacy;
	//} else {
		//$content = $content_current;
	//}
		
	?>
	<p>This content will be displayed in the sidebar for this post or page - ONLY for this post or page.  Be certain that you enable the Graceful Sidebar Widget by dragging it to a sidebar area in your theme from the Appearances->Widgets administration panel.  <a href=http://www.mlynn.org/graceful-sidebar-plugin>More Information</a><p>
	<table class='widefat settings post'>
		<tr>
			<thead>
				<th valign=top><b>Graceful Sidebar Title:</b></th>
			</thead>
			<tbody>
				<td><input name='graceful_title' type=text size=80 value='<?php echo $title;?>'></td>
			</tbody>
		</tr>
		<tr>
			<thead>
				<th valign=top><b>Graceful Sidebar Content:</b></th>
			</thead>
			<tbody>
				<td><div id=editorcontainer><textarea id="content" name='graceful_content' rows=8 cols=90><?php echo $content;?></textarea></div></td>
			</tbody>
		</tr>
		</tbody>
	</table>
	<?php
}

///////////////////////////////////////////////////////////////
// gs_widget
// abstract: Displays widget content for current post or page 
// args    : 
// returns :
// globals : $post
///////////////////////////////////////////////////////////////
function gs_widget($args) {

	global $post;

    $title= get_post_meta($post->ID,'_graceful_title',true);
    $content= get_post_meta($post->ID,'_graceful_content',true);

	if (is_single() || is_page()) {
		extract($args);
		$gs_widget_options = unserialize(get_option('gs_widget_options'));

		if ( $title || $content ) {

			echo $before_widget;

			if ( $title != '') {
				echo $before_title;
				$title = do_shortcode($title);
				echo _e($title);
				echo $after_title;
			}

			if ( $content ) {
				$content = do_shortcode($content);
				echo _e($content);
			}

			echo $after_widget;
		}
	}
}

///////////////////////////////////////////////////////////////
// gs_widget_control
// abstract: Displays control panel item for widget 
// args    : 
// returns : 
// globals : 
///////////////////////////////////////////////////////////////
function gs_widget_control() {

	if(!get_option('custom_widget_options')) {
		add_option('gs_widget_options', serialize(array('title'=>'Graceful Sidebar', 'text'=>'')));
	}
	  echo 'This widget will display the content you specify in the title and content specified in the post or page edit screen.   If a post or page does not have these fields, this widget will not be displayed.<p>Like the plugin?  Consider <a href=mailto:merlynn@gmail.com>emailing the author</a> or <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KKFYUAMPCQHXQ">making a donation.</a>';

}  
