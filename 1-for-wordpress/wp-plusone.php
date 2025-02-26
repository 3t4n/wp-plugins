<?php
/*
Plugin Name: +1 for Wordpress
Version: 1.0
Plugin URI: http://nothing.golddave.com/plugins/1-for-wordpress/
Description: Adds a Google +1 button in the footer of the current post or page.
Author: David Goldstein
Author URI: http://nothing.golddave.com/
*/

/*
Change Log

1.0
  * First public release.
*/ 

function plusone($data = ''){
	global $post;
	global $wp_query;
	$current_options = get_option('plusone_options');
	$data .= "<g:plusone href='".get_permalink()."'></g:plusone>";
	return $data;
}

function activate_plusone(){
	global $post;
	$current_options = get_option('plusone_options');
	$insertiontype = $current_options['insertion_type'];	
	if ($insertiontype !== 'template'){
		add_filter('the_content', 'plusone', 10);
		add_filter('the_excerpt', 'plusone', 10);
	}
}

activate_plusone();

function footer() {
    echo '<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>';
}
add_action('wp_footer', 'footer');

function plusone_template(){
	global $post;
	$current_options = get_option('plusone');
	$insertiontype = $current_options['insertion_type'];
	$pagetype = $current_options["page_type"];
	if ($insertiontype !== 'auto'){
		echo plusone();
	}
}

// Create the options page
function plusone_options_page() {
	$current_options = get_option('plusone_options');
	$insert = $current_options["insertion_type"];
	$pagetype = $current_options["page_type"];
	if ($_POST['action']){ ?>
		<div id="message" class="updated fade"><p><strong>Options saved.</strong></p></div>
	<?php } ?>
	<div class="wrap" id="plusone-options">
		<h2>+1 for Wordpress Options</h2>

		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<fieldset>
				<legend>Options:</legend>
				<input type="hidden" name="action" value="save_plusone_options" />
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr>
						<th valign="top" scope="row"><label for="insertion_type">Insertion Type:</label></th>
						<td><select name="insertion_type">
						<option value ="auto" <?php if ($insert === "auto") echo 'selected="selected"';?>>Auto</option>
						<option value ="template"<?php if ($insert === "template") echo 'selected="selected"';?>>Template</option>
						</select></td>
					</tr>
					<tr>
						<th valign="top" scope="row"><label for="page_type">Page Type:</label></th>
						<td><select name="page_type">
						<option value="posts" <?php if ($pagetype === "posts") echo 'selected="selected"';?>>Posts Only</option>
						<option value="pages" <?php if ($pagetype === "pages") echo 'selected="selected"';?>>Pages Only</option>
						<option value ="both" <?php if ($pagetype === "both") echo 'selected="selected"';?>>Posts and Pages</option>
						</select></td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" value="Update Options &raquo;" />
			</p>
		</form>
	</div>
<?php
}

function plusone_add_options_page() {
	// Add a new menu under Options:
	add_options_page('+1 For Wordpress', '+1 For Wordpress', 10, __FILE__, 'plusone_options_page');
}

function plusone_save_options() {
	// create array
	$plusone_options["insertion_type"] = $_POST["insertion_type"];
	$plusone_options["page_type"] = $_POST["page_type"];

	update_option('plusone_options', $plusone_options);
	$options_saved = true;
}

add_action('admin_menu', 'plusone_add_options_page');

if (!get_option('plusone_options')){
	// create default options
	$share_on_facebook_options["insertion_type"] = 'auto';
	$share_on_facebook_options["page_type"] = 'posts';

	update_option('plusone_options', $plusone_options);
}

if ($_POST['action'] == 'save_plusone_options'){
	plusone_save_options();
}
?>