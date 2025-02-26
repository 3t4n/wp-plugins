<?php
/*
Plugin Name: Breukie's Pages Widget
Description: Breukie's Pages Widget is a wordPress widget, to replace the standard pages widget by Automattic. This widget displays links using the wp_list_pages function, utilizes several available parameters like sort and exclude pages in your menu. You can also set up to 9 intances of this widget in your sidebar(s). This widget will also work together with the Page Link Manager plugin by Garrett Murphey without modifying any code.
Author: Arnold Breukhoven
Version: 2.3
Author URI: http://www.arnoldbreukhoven.nl
Plugin URI: http://www.arnoldbreukhoven.nl/2007/03/breukies-pages-widget-for-wordpress
*/

function widget_breukiespages_init()
{
	// Check for the required API functions
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return;

function widget_breukiespages($args, $number = 1) {
	extract($args);
	$options = get_option('widget_breukiespages');
	$title = empty($options[$number]['title']) ? __('Pages') : $options[$number]['title'];
// Extraatjes
	$sort_column = empty($options[$number]['sort_column']) ? 'post_title' : $options[$number]['sort_column'];
	$sort_order = empty($options[$number]['sort_order']) ? 'ASC' : $options[$number]['sort_order'];
	$title_li = empty($options[$number]['title_li']) ? '' : $options[$number]['title_li'];
	$exclude = empty($options[$number]['exclude']) ? '' : $options[$number]['exclude'];
	$depth = empty($options[$number]['depth']) ? '0' : $options[$number]['depth'];
	$child_of  = empty($options[$number]['child_of ']) ? '0' : $options[$number]['child_of '];
	echo $before_widget . $before_title . $title . $after_title . "<ul>\n";
//	WORDPRESS CODE wp_list_pages("title_li=");
//  REPLACED BY gdm_list_selected_pages
//  CHECKJE OF FUNCTIE BESTAAT DUS ;-)
	if ( function_exists('gdm_list_selected_pages') )
	{
		gdm_list_selected_pages("sort_column="  . $sort_column . "&title_li=" . $title_li . "&exclude=" . $exclude . "&sort_order=" . $sort_order . "&depth=" . $depth . "&child_of=" . $child_of);
	}
	else
	{
		wp_list_pages("sort_column="  . $sort_column . "&title_li=" . $title_li . "&exclude=" . $exclude . "&sort_order=" . $sort_order . "&depth=" . $depth . "&child_of=" . $child_of);
	}
	echo "</ul>\n" . $after_widget;
}

function widget_breukiespages_control($number) {
	$options = $newoptions = get_option('widget_breukiespages');
	if ( $_POST["breukiespages-submit-$number"] ) {
		$newoptions[$number]['title'] = strip_tags(stripslashes($_POST["breukiespages-title-$number"]));
// Extraatjes
		$newoptions[$number]['sort_column'] = strip_tags(stripslashes($_POST["breukiespages-sort_column-$number"]));
		$newoptions[$number]['sort_order'] = strip_tags(stripslashes($_POST["breukiespages-sort_order-$number"]));
		$newoptions[$number]['title_li'] = stripslashes($_POST["breukiespages-title_li-$number"]);
		$newoptions[$number]['exclude'] = strip_tags(stripslashes($_POST["breukiespages-exclude-$number"]));
		$newoptions[$number]['depth'] = strip_tags(stripslashes($_POST["breukiespages-depth-$number"]));
		$newoptions[$number]['child_of'] = strip_tags(stripslashes($_POST["breukiespages-child_of-$number"]));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_breukiespages', $options);
	}
	$title = htmlspecialchars($options[$number]['title'], ENT_QUOTES);
// Extraatjes
	$sort_column = htmlspecialchars($options[$number]['sort_column'], ENT_QUOTES);
	$sort_order = htmlspecialchars($options[$number]['sort_order'], ENT_QUOTES);
	$title_li = htmlspecialchars($options[$number]['title_li'], ENT_QUOTES);
	$exclude = htmlspecialchars($options[$number]['exclude'], ENT_QUOTES);
	$depth = htmlspecialchars($options[$number]['depth'], ENT_QUOTES);
	$child_of = htmlspecialchars($options[$number]['child_of'], ENT_QUOTES);
?>
<center>Check <a href="http://codex.wordpress.org/wp_list_pages" target="_blank">wp_list_pages</a> for help with these parameters.</center>
<br />
<table align="center" cellpadding="1" cellspacing="1" width="400">
<tr>
<td align="left" valign="middle" width="90" nowrap="nowrap">
Title Widget:
</td>
<td align="left" valign="middle">
<input style="width: 300px;" id="breukiespages-title-<?php echo "$number"; ?>" name="breukiespages-title-<?php echo "$number"; ?>" type="text" value="<?php echo $title; ?>" />
</td>
</tr>
<tr>
<tr>
<td align="left" valign="middle" width="90" nowrap="nowrap">
Title li:
</td>
<td align="left" valign="middle">
<input style="width: 300px;" id="breukiespages-title_li-<?php echo "$number"; ?>" name="breukiespages-title_li-<?php echo "$number"; ?>" type="text" value="<?php echo $title_li; ?>" />
</td>
</tr>
<tr>
<td align="left" valign="middle" width="90" nowrap="nowrap">
Sort Options:
</td>
<td align="left" valign="middle">
<select id="breukiespages-sort_column-<?php echo "$number"; ?>" name="breukiespages-sort_column-<?php echo "$number"; ?>" value="<?php echo $options[$number]['sort_column']; ?>">
<?php echo "<option value=\"\">Select</option>"; ?>
<?php echo "<option value=\"post_title\"" . ($options[$number]['sort_column']=='post_title' ? " selected='selected'" : '') .">Title</option>"; ?>
<?php echo "<option value=\"menu_order\"" . ($options[$number]['sort_column']=='menu_order' ? " selected='selected'" : '') .">Menu Order</option>"; ?>
<?php echo "<option value=\"post_date\"" . ($options[$number]['sort_column']=='post_date' ? " selected='selected'" : '') .">Date</option>"; ?>
<?php echo "<option value=\"post_modified\"" . ($options[$number]['sort_column']=='post_modified' ? " selected='selected'" : '') .">Modified</option>"; ?>
<?php echo "<option value=\"ID\"" . ($options[$number]['sort_column']=='id' ? " selected='selected'" : '') .">ID</option>"; ?>
<?php echo "<option value=\"post_author\"" . ($options[$number]['sort_column']=='post_author' ? " selected='selected'" : '') .">Author</option>"; ?>
<?php echo "<option value=\"post_name\"" . ($options[$number]['sort_column']=='post_name' ? " selected='selected'" : '') .">Name</option>"; ?>
</select>&nbsp; <select id="breukiespages-sort_order-<?php echo "$number"; ?>" name="breukiespages-sort_order-<?php echo "$number"; ?>" value="<?php echo $options[$number]['sort_order']; ?>">
<?php echo "<option value=\"\">Select</option>"; ?>
<?php echo "<option value=\"ASC\"" . ($options[$number]['sort_order']=='ASC' ? " selected='selected'" : '') .">ASC</option>"; ?>
<?php echo "<option value=\"DESC\"" . ($options[$number]['sort_order']=='DESC' ? " selected='selected'" : '') .">DESC</option>"; ?>
</select>
</td>
</tr>
<tr>
<td align="left" valign="middle" width="90" nowrap="nowrap">
Exclude Pages:
</td>
<td align="left" valign="middle">
<input style="width: 300px;" id="breukiespages-exclude-<?php echo "$number"; ?>" name="breukiespages-exclude-<?php echo "$number"; ?>" type="text" value="<?php echo $exclude; ?>" />
</td>
</tr>
<tr>
<td align="left" valign="middle" width="90" nowrap="nowrap">
Child of:
</td>
<td align="left" valign="middle">
<input style="width: 300px;" id="breukiespages-child_of-<?php echo "$number"; ?>" name="breukiespages-child_of-<?php echo "$number"; ?>" type="text" value="<?php echo $child_of; ?>" />
</td>
</tr>
<tr>
<td align="left" valign="middle" width="90" nowrap="nowrap">
Depth:
</td>
<td align="left" valign="middle">
<input style="width: 300px;" id="breukiespages-depth-<?php echo "$number"; ?>" name="breukiespages-depth-<?php echo "$number"; ?>" type="text" value="<?php echo $depth; ?>" />
<input type="hidden" id="breukiespages-submit-<?php echo "$number"; ?>" name="breukiespages-submit-<?php echo "$number"; ?>" value="1" />
</td>
</tr>
</table>
<br />
<center>Breukie's Pages Widget is made by: <a href="http://www.arnoldbreukhoven.nl" target="_blank">Arnold Breukhoven</a>.</center>
<?php
}

function widget_breukiespages_setup() {
	$options = $newoptions = get_option('widget_breukiespages');
	if ( isset($_POST['breukiespages-number-submit']) ) {
		$number = (int) $_POST['breukiespages-number'];
		if ( $number > 9 ) $number = 9;
		if ( $number < 1 ) $number = 1;
		$newoptions['number'] = $number;
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_breukiespages', $options);
		widget_breukiespages_register($options['number']);
	}
}

function widget_breukiespages_page() {
	$options = $newoptions = get_option('widget_breukiespages');
?>
	<div class="wrap">
		<form method="POST">
			<h2>Breukie's Pages Widgets</h2>
			<p style="line-height: 30px;"><?php _e('How many Breukie\'s Pages widgets would you like?'); ?>
			<select id="breukiespages-number" name="breukiespages-number" value="<?php echo $options['number']; ?>">
<?php for ( $i = 1; $i < 10; ++$i ) echo "<option value='$i' ".($options['number']==$i ? "selected='selected'" : '').">$i</option>"; ?>
			</select>
			<span class="submit"><input type="submit" name="breukiespages-number-submit" id="breukiespages-number-submit" value="<?php _e('Save'); ?>" /></span></p>
		</form>
	</div>
<?php
}

function widget_breukiespages_register() {
	$options = get_option('widget_breukiespages');
	$number = $options['number'];
	if ( $number < 1 ) $number = 1;
	if ( $number > 9 ) $number = 9;
	for ($i = 1; $i <= 9; $i++) {
		$name = array('Breukie\'s Pages %s', null, $i);
		register_sidebar_widget($name, $i <= $number ? 'widget_breukiespages' : /* unregister */ '', '', $i);
		register_widget_control($name, $i <= $number ? 'widget_breukiespages_control' : /* unregister */ '', 460, 260, $i);
	}
	add_action('sidebar_admin_setup', 'widget_breukiespages_setup');
	add_action('sidebar_admin_page', 'widget_breukiespages_page');
}
// Delay plugin execution to ensure Dynamic Sidebar has a chance to load first
widget_breukiespages_register();
}

// Tell Dynamic Sidebar about our new widget and its control
add_action('plugins_loaded', 'widget_breukiespages_init');

?>
