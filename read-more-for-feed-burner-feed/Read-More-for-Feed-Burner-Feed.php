<?php
/*
Plugin Name: Read More for Feed Burner Feed
Plugin URI: http://www.vinaypn.com
Description: Adds read more tag to feedburner feeds
Author: Vinay P.N.
Version: 1.0
Author URI: http://www.vinaypn.com
*/
register_activation_hook( __FILE__, 'read_more_install' );
//register_activation_hook( __FILE__, 'pu_insert_custom_table' );
register_deactivation_hook( __FILE__, 'read_more_remove' );
function read_more_install()
    {
       add_option("read_more_data", 'Read More', '', 'yes');
    }
function read_more_remove() {
/* Deletes the database field */
delete_option('read_more_data');
}
?>
<?php
if ( is_admin() ){
/* Call the html code */
add_action('admin_menu', 'hello_world_admin_menu');
function hello_world_admin_menu() {
add_options_page('Read More FeedBurner', 'Read More FeedBurner', 'administrator',
'hello-world', 'hello_world_html_page');
}
}
?>
<?php
function hello_world_html_page() {
?>
<div>
<h2>Read More for Feed Burner Posts by Vinay PN</h2>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<table width="510">
<tr valign="top">
<th width="92" scope="row">Enter Text</th>
<td width="406">
<input name="read_more_data" type="text" id="read_more_data"
value="<?php echo get_option('read_more_data'); ?>" />
(ex. Read More)</td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="read_more_data" />
<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
<?php
}
function read_more_rss_teaser( $content ){
	$variable = get_option('read_more_data');
$teaser = preg_split( '/<span id\="(more\-\d+)"><\/span>/', $content );
	$readmore = '<a href="'.get_permalink().'">echo $variable;</a>';
	$content = $teaser[0].$readmore;
	return $content;
}
add_filter( 'the_content_feed' ,'read_more_rss_teaser' );
?>
