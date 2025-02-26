<?php
/*
Plugin Name: outside.in StoryMap
Description: StoryMaps geotag your blog posts and plot them on a nifty map widget to help readers navigate your stories by location. This plugin allows you to embed a StoryMap on your WordPress blog.
Author: outside.in
Version: 1.0
Author URI: http://outside.in
Licensing: GNU General Public License (http://www.gnu.org/licenses/gpl.html)

*/


function widget_storymap_init() {

	// check to see required Widget API functions are defined...
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return; // ...and if not, exit gracefully from the script

	// print the sidebar widget
	function widget_storymap($args) {

		extract($args);

		// collect widget options
		$options = get_option('widget_storymap');
		$title = empty($options['title']) ? 'outside.in StoryMap' : $options['title'];
		$code = empty($options['code']) ? 'To get started, <a href="http://outside.in/geotoolkit">sign up for GeoToolkit</a>, grab code for your StoryMap, and paste it into your widget editor form.' : $options['code'];
		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo $code;
		echo $after_widget;
	}

	// create widget editing form
	function widget_storymap_control() {

		// collect widget options
		$options = get_option('widget_storymap');

		// handle form submissions
		if ( $_POST['storymap-submit'] ) {
			// clean up submissions
			$newoptions['title'] = strip_tags(stripslashes($_POST['storymap-title']));
			$newoptions['code'] = stripslashes($_POST['storymap-code']);
	
		// update defaults with user submitted options
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_storymap', $options);
		}
}
		// format options
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$code = htmlspecialchars($options['code'], ENT_QUOTES);

// print editing form
?>
		<div>
<p>StoryMaps geotag your blog posts and plot them on a nifty map widget to help readers navigate your stories by location. This plugin allows you to embed a StoryMap onto your WordPress blog.</p>

<p>To get started, <a href="http://outside.in/geotoolkit">sign up for outside.in's GeoToolkit</a>, grab code for your StoryMap, and paste it below.</p>
		<label for="storymap-title" style="line-height:35px;display:block;">Widget title: <input type="text" id="storymap-title" name="storymap-title" value="<?php echo $title; ?>" /></label>
		<label for="storymap-code" style="line-height:35px;display:block;">Embed code:<br/> <textarea cols="20" rows="15" id="storymap-code" name="storymap-code"><?php echo $code; ?></textarea></label>
		<input type="hidden" name="storymap-submit" id="storymap-submit" value="1" />
		</div>
	<?php
	// end of widget_storymap_control()
	}

	// register the widget
	register_sidebar_widget('outside.in StoryMap', 'widget_storymap');

	// register the widget editing form
	register_widget_control('outside.in StoryMap', 'widget_storymap_control');
}

// Delays plugin execution until Dynamic Sidebar has loaded first.
add_action('plugins_loaded', 'widget_storymap_init');
?>